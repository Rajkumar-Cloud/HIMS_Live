<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientAnRegistrationGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_an_registrationgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_an_registrationgrid = new ew.Form("fpatient_an_registrationgrid", "grid");
    fpatient_an_registrationgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_an_registration")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_an_registration)
        ew.vars.tables.patient_an_registration = currentTable;
    fpatient_an_registrationgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["pid", [fields.pid.visible && fields.pid.required ? ew.Validators.required(fields.pid.caption) : null, ew.Validators.integer], fields.pid.isInvalid],
        ["fid", [fields.fid.visible && fields.fid.required ? ew.Validators.required(fields.fid.caption) : null, ew.Validators.integer], fields.fid.isInvalid],
        ["G", [fields.G.visible && fields.G.required ? ew.Validators.required(fields.G.caption) : null], fields.G.isInvalid],
        ["P", [fields.P.visible && fields.P.required ? ew.Validators.required(fields.P.caption) : null], fields.P.isInvalid],
        ["L", [fields.L.visible && fields.L.required ? ew.Validators.required(fields.L.caption) : null], fields.L.isInvalid],
        ["A", [fields.A.visible && fields.A.required ? ew.Validators.required(fields.A.caption) : null], fields.A.isInvalid],
        ["E", [fields.E.visible && fields.E.required ? ew.Validators.required(fields.E.caption) : null], fields.E.isInvalid],
        ["M", [fields.M.visible && fields.M.required ? ew.Validators.required(fields.M.caption) : null], fields.M.isInvalid],
        ["LMP", [fields.LMP.visible && fields.LMP.required ? ew.Validators.required(fields.LMP.caption) : null], fields.LMP.isInvalid],
        ["EDO", [fields.EDO.visible && fields.EDO.required ? ew.Validators.required(fields.EDO.caption) : null], fields.EDO.isInvalid],
        ["MenstrualHistory", [fields.MenstrualHistory.visible && fields.MenstrualHistory.required ? ew.Validators.required(fields.MenstrualHistory.caption) : null], fields.MenstrualHistory.isInvalid],
        ["MaritalHistory", [fields.MaritalHistory.visible && fields.MaritalHistory.required ? ew.Validators.required(fields.MaritalHistory.caption) : null], fields.MaritalHistory.isInvalid],
        ["ObstetricHistory", [fields.ObstetricHistory.visible && fields.ObstetricHistory.required ? ew.Validators.required(fields.ObstetricHistory.caption) : null], fields.ObstetricHistory.isInvalid],
        ["PreviousHistoryofGDM", [fields.PreviousHistoryofGDM.visible && fields.PreviousHistoryofGDM.required ? ew.Validators.required(fields.PreviousHistoryofGDM.caption) : null], fields.PreviousHistoryofGDM.isInvalid],
        ["PreviousHistorofPIH", [fields.PreviousHistorofPIH.visible && fields.PreviousHistorofPIH.required ? ew.Validators.required(fields.PreviousHistorofPIH.caption) : null], fields.PreviousHistorofPIH.isInvalid],
        ["PreviousHistoryofIUGR", [fields.PreviousHistoryofIUGR.visible && fields.PreviousHistoryofIUGR.required ? ew.Validators.required(fields.PreviousHistoryofIUGR.caption) : null], fields.PreviousHistoryofIUGR.isInvalid],
        ["PreviousHistoryofOligohydramnios", [fields.PreviousHistoryofOligohydramnios.visible && fields.PreviousHistoryofOligohydramnios.required ? ew.Validators.required(fields.PreviousHistoryofOligohydramnios.caption) : null], fields.PreviousHistoryofOligohydramnios.isInvalid],
        ["PreviousHistoryofPreterm", [fields.PreviousHistoryofPreterm.visible && fields.PreviousHistoryofPreterm.required ? ew.Validators.required(fields.PreviousHistoryofPreterm.caption) : null], fields.PreviousHistoryofPreterm.isInvalid],
        ["G1", [fields.G1.visible && fields.G1.required ? ew.Validators.required(fields.G1.caption) : null], fields.G1.isInvalid],
        ["G2", [fields.G2.visible && fields.G2.required ? ew.Validators.required(fields.G2.caption) : null], fields.G2.isInvalid],
        ["G3", [fields.G3.visible && fields.G3.required ? ew.Validators.required(fields.G3.caption) : null], fields.G3.isInvalid],
        ["DeliveryNDLSCS1", [fields.DeliveryNDLSCS1.visible && fields.DeliveryNDLSCS1.required ? ew.Validators.required(fields.DeliveryNDLSCS1.caption) : null], fields.DeliveryNDLSCS1.isInvalid],
        ["DeliveryNDLSCS2", [fields.DeliveryNDLSCS2.visible && fields.DeliveryNDLSCS2.required ? ew.Validators.required(fields.DeliveryNDLSCS2.caption) : null], fields.DeliveryNDLSCS2.isInvalid],
        ["DeliveryNDLSCS3", [fields.DeliveryNDLSCS3.visible && fields.DeliveryNDLSCS3.required ? ew.Validators.required(fields.DeliveryNDLSCS3.caption) : null], fields.DeliveryNDLSCS3.isInvalid],
        ["BabySexweight1", [fields.BabySexweight1.visible && fields.BabySexweight1.required ? ew.Validators.required(fields.BabySexweight1.caption) : null], fields.BabySexweight1.isInvalid],
        ["BabySexweight2", [fields.BabySexweight2.visible && fields.BabySexweight2.required ? ew.Validators.required(fields.BabySexweight2.caption) : null], fields.BabySexweight2.isInvalid],
        ["BabySexweight3", [fields.BabySexweight3.visible && fields.BabySexweight3.required ? ew.Validators.required(fields.BabySexweight3.caption) : null], fields.BabySexweight3.isInvalid],
        ["PastMedicalHistory", [fields.PastMedicalHistory.visible && fields.PastMedicalHistory.required ? ew.Validators.required(fields.PastMedicalHistory.caption) : null], fields.PastMedicalHistory.isInvalid],
        ["PastSurgicalHistory", [fields.PastSurgicalHistory.visible && fields.PastSurgicalHistory.required ? ew.Validators.required(fields.PastSurgicalHistory.caption) : null], fields.PastSurgicalHistory.isInvalid],
        ["FamilyHistory", [fields.FamilyHistory.visible && fields.FamilyHistory.required ? ew.Validators.required(fields.FamilyHistory.caption) : null], fields.FamilyHistory.isInvalid],
        ["Viability", [fields.Viability.visible && fields.Viability.required ? ew.Validators.required(fields.Viability.caption) : null], fields.Viability.isInvalid],
        ["ViabilityDATE", [fields.ViabilityDATE.visible && fields.ViabilityDATE.required ? ew.Validators.required(fields.ViabilityDATE.caption) : null], fields.ViabilityDATE.isInvalid],
        ["ViabilityREPORT", [fields.ViabilityREPORT.visible && fields.ViabilityREPORT.required ? ew.Validators.required(fields.ViabilityREPORT.caption) : null], fields.ViabilityREPORT.isInvalid],
        ["Viability2", [fields.Viability2.visible && fields.Viability2.required ? ew.Validators.required(fields.Viability2.caption) : null], fields.Viability2.isInvalid],
        ["Viability2DATE", [fields.Viability2DATE.visible && fields.Viability2DATE.required ? ew.Validators.required(fields.Viability2DATE.caption) : null], fields.Viability2DATE.isInvalid],
        ["Viability2REPORT", [fields.Viability2REPORT.visible && fields.Viability2REPORT.required ? ew.Validators.required(fields.Viability2REPORT.caption) : null], fields.Viability2REPORT.isInvalid],
        ["NTscan", [fields.NTscan.visible && fields.NTscan.required ? ew.Validators.required(fields.NTscan.caption) : null], fields.NTscan.isInvalid],
        ["NTscanDATE", [fields.NTscanDATE.visible && fields.NTscanDATE.required ? ew.Validators.required(fields.NTscanDATE.caption) : null], fields.NTscanDATE.isInvalid],
        ["NTscanREPORT", [fields.NTscanREPORT.visible && fields.NTscanREPORT.required ? ew.Validators.required(fields.NTscanREPORT.caption) : null], fields.NTscanREPORT.isInvalid],
        ["EarlyTarget", [fields.EarlyTarget.visible && fields.EarlyTarget.required ? ew.Validators.required(fields.EarlyTarget.caption) : null], fields.EarlyTarget.isInvalid],
        ["EarlyTargetDATE", [fields.EarlyTargetDATE.visible && fields.EarlyTargetDATE.required ? ew.Validators.required(fields.EarlyTargetDATE.caption) : null], fields.EarlyTargetDATE.isInvalid],
        ["EarlyTargetREPORT", [fields.EarlyTargetREPORT.visible && fields.EarlyTargetREPORT.required ? ew.Validators.required(fields.EarlyTargetREPORT.caption) : null], fields.EarlyTargetREPORT.isInvalid],
        ["Anomaly", [fields.Anomaly.visible && fields.Anomaly.required ? ew.Validators.required(fields.Anomaly.caption) : null], fields.Anomaly.isInvalid],
        ["AnomalyDATE", [fields.AnomalyDATE.visible && fields.AnomalyDATE.required ? ew.Validators.required(fields.AnomalyDATE.caption) : null], fields.AnomalyDATE.isInvalid],
        ["AnomalyREPORT", [fields.AnomalyREPORT.visible && fields.AnomalyREPORT.required ? ew.Validators.required(fields.AnomalyREPORT.caption) : null], fields.AnomalyREPORT.isInvalid],
        ["Growth", [fields.Growth.visible && fields.Growth.required ? ew.Validators.required(fields.Growth.caption) : null], fields.Growth.isInvalid],
        ["GrowthDATE", [fields.GrowthDATE.visible && fields.GrowthDATE.required ? ew.Validators.required(fields.GrowthDATE.caption) : null], fields.GrowthDATE.isInvalid],
        ["GrowthREPORT", [fields.GrowthREPORT.visible && fields.GrowthREPORT.required ? ew.Validators.required(fields.GrowthREPORT.caption) : null], fields.GrowthREPORT.isInvalid],
        ["Growth1", [fields.Growth1.visible && fields.Growth1.required ? ew.Validators.required(fields.Growth1.caption) : null], fields.Growth1.isInvalid],
        ["Growth1DATE", [fields.Growth1DATE.visible && fields.Growth1DATE.required ? ew.Validators.required(fields.Growth1DATE.caption) : null], fields.Growth1DATE.isInvalid],
        ["Growth1REPORT", [fields.Growth1REPORT.visible && fields.Growth1REPORT.required ? ew.Validators.required(fields.Growth1REPORT.caption) : null], fields.Growth1REPORT.isInvalid],
        ["ANProfile", [fields.ANProfile.visible && fields.ANProfile.required ? ew.Validators.required(fields.ANProfile.caption) : null], fields.ANProfile.isInvalid],
        ["ANProfileDATE", [fields.ANProfileDATE.visible && fields.ANProfileDATE.required ? ew.Validators.required(fields.ANProfileDATE.caption) : null], fields.ANProfileDATE.isInvalid],
        ["ANProfileINHOUSE", [fields.ANProfileINHOUSE.visible && fields.ANProfileINHOUSE.required ? ew.Validators.required(fields.ANProfileINHOUSE.caption) : null], fields.ANProfileINHOUSE.isInvalid],
        ["ANProfileREPORT", [fields.ANProfileREPORT.visible && fields.ANProfileREPORT.required ? ew.Validators.required(fields.ANProfileREPORT.caption) : null], fields.ANProfileREPORT.isInvalid],
        ["DualMarker", [fields.DualMarker.visible && fields.DualMarker.required ? ew.Validators.required(fields.DualMarker.caption) : null], fields.DualMarker.isInvalid],
        ["DualMarkerDATE", [fields.DualMarkerDATE.visible && fields.DualMarkerDATE.required ? ew.Validators.required(fields.DualMarkerDATE.caption) : null], fields.DualMarkerDATE.isInvalid],
        ["DualMarkerINHOUSE", [fields.DualMarkerINHOUSE.visible && fields.DualMarkerINHOUSE.required ? ew.Validators.required(fields.DualMarkerINHOUSE.caption) : null], fields.DualMarkerINHOUSE.isInvalid],
        ["DualMarkerREPORT", [fields.DualMarkerREPORT.visible && fields.DualMarkerREPORT.required ? ew.Validators.required(fields.DualMarkerREPORT.caption) : null], fields.DualMarkerREPORT.isInvalid],
        ["Quadruple", [fields.Quadruple.visible && fields.Quadruple.required ? ew.Validators.required(fields.Quadruple.caption) : null], fields.Quadruple.isInvalid],
        ["QuadrupleDATE", [fields.QuadrupleDATE.visible && fields.QuadrupleDATE.required ? ew.Validators.required(fields.QuadrupleDATE.caption) : null], fields.QuadrupleDATE.isInvalid],
        ["QuadrupleINHOUSE", [fields.QuadrupleINHOUSE.visible && fields.QuadrupleINHOUSE.required ? ew.Validators.required(fields.QuadrupleINHOUSE.caption) : null], fields.QuadrupleINHOUSE.isInvalid],
        ["QuadrupleREPORT", [fields.QuadrupleREPORT.visible && fields.QuadrupleREPORT.required ? ew.Validators.required(fields.QuadrupleREPORT.caption) : null], fields.QuadrupleREPORT.isInvalid],
        ["A5month", [fields.A5month.visible && fields.A5month.required ? ew.Validators.required(fields.A5month.caption) : null], fields.A5month.isInvalid],
        ["A5monthDATE", [fields.A5monthDATE.visible && fields.A5monthDATE.required ? ew.Validators.required(fields.A5monthDATE.caption) : null], fields.A5monthDATE.isInvalid],
        ["A5monthINHOUSE", [fields.A5monthINHOUSE.visible && fields.A5monthINHOUSE.required ? ew.Validators.required(fields.A5monthINHOUSE.caption) : null], fields.A5monthINHOUSE.isInvalid],
        ["A5monthREPORT", [fields.A5monthREPORT.visible && fields.A5monthREPORT.required ? ew.Validators.required(fields.A5monthREPORT.caption) : null], fields.A5monthREPORT.isInvalid],
        ["A7month", [fields.A7month.visible && fields.A7month.required ? ew.Validators.required(fields.A7month.caption) : null], fields.A7month.isInvalid],
        ["A7monthDATE", [fields.A7monthDATE.visible && fields.A7monthDATE.required ? ew.Validators.required(fields.A7monthDATE.caption) : null], fields.A7monthDATE.isInvalid],
        ["A7monthINHOUSE", [fields.A7monthINHOUSE.visible && fields.A7monthINHOUSE.required ? ew.Validators.required(fields.A7monthINHOUSE.caption) : null], fields.A7monthINHOUSE.isInvalid],
        ["A7monthREPORT", [fields.A7monthREPORT.visible && fields.A7monthREPORT.required ? ew.Validators.required(fields.A7monthREPORT.caption) : null], fields.A7monthREPORT.isInvalid],
        ["A9month", [fields.A9month.visible && fields.A9month.required ? ew.Validators.required(fields.A9month.caption) : null], fields.A9month.isInvalid],
        ["A9monthDATE", [fields.A9monthDATE.visible && fields.A9monthDATE.required ? ew.Validators.required(fields.A9monthDATE.caption) : null], fields.A9monthDATE.isInvalid],
        ["A9monthINHOUSE", [fields.A9monthINHOUSE.visible && fields.A9monthINHOUSE.required ? ew.Validators.required(fields.A9monthINHOUSE.caption) : null], fields.A9monthINHOUSE.isInvalid],
        ["A9monthREPORT", [fields.A9monthREPORT.visible && fields.A9monthREPORT.required ? ew.Validators.required(fields.A9monthREPORT.caption) : null], fields.A9monthREPORT.isInvalid],
        ["INJ", [fields.INJ.visible && fields.INJ.required ? ew.Validators.required(fields.INJ.caption) : null], fields.INJ.isInvalid],
        ["INJDATE", [fields.INJDATE.visible && fields.INJDATE.required ? ew.Validators.required(fields.INJDATE.caption) : null], fields.INJDATE.isInvalid],
        ["INJINHOUSE", [fields.INJINHOUSE.visible && fields.INJINHOUSE.required ? ew.Validators.required(fields.INJINHOUSE.caption) : null], fields.INJINHOUSE.isInvalid],
        ["INJREPORT", [fields.INJREPORT.visible && fields.INJREPORT.required ? ew.Validators.required(fields.INJREPORT.caption) : null], fields.INJREPORT.isInvalid],
        ["Bleeding", [fields.Bleeding.visible && fields.Bleeding.required ? ew.Validators.required(fields.Bleeding.caption) : null], fields.Bleeding.isInvalid],
        ["Hypothyroidism", [fields.Hypothyroidism.visible && fields.Hypothyroidism.required ? ew.Validators.required(fields.Hypothyroidism.caption) : null], fields.Hypothyroidism.isInvalid],
        ["PICMENumber", [fields.PICMENumber.visible && fields.PICMENumber.required ? ew.Validators.required(fields.PICMENumber.caption) : null], fields.PICMENumber.isInvalid],
        ["Outcome", [fields.Outcome.visible && fields.Outcome.required ? ew.Validators.required(fields.Outcome.caption) : null], fields.Outcome.isInvalid],
        ["DateofAdmission", [fields.DateofAdmission.visible && fields.DateofAdmission.required ? ew.Validators.required(fields.DateofAdmission.caption) : null], fields.DateofAdmission.isInvalid],
        ["DateodProcedure", [fields.DateodProcedure.visible && fields.DateodProcedure.required ? ew.Validators.required(fields.DateodProcedure.caption) : null], fields.DateodProcedure.isInvalid],
        ["Miscarriage", [fields.Miscarriage.visible && fields.Miscarriage.required ? ew.Validators.required(fields.Miscarriage.caption) : null], fields.Miscarriage.isInvalid],
        ["ModeOfDelivery", [fields.ModeOfDelivery.visible && fields.ModeOfDelivery.required ? ew.Validators.required(fields.ModeOfDelivery.caption) : null], fields.ModeOfDelivery.isInvalid],
        ["ND", [fields.ND.visible && fields.ND.required ? ew.Validators.required(fields.ND.caption) : null], fields.ND.isInvalid],
        ["NDS", [fields.NDS.visible && fields.NDS.required ? ew.Validators.required(fields.NDS.caption) : null], fields.NDS.isInvalid],
        ["NDP", [fields.NDP.visible && fields.NDP.required ? ew.Validators.required(fields.NDP.caption) : null], fields.NDP.isInvalid],
        ["Vaccum", [fields.Vaccum.visible && fields.Vaccum.required ? ew.Validators.required(fields.Vaccum.caption) : null], fields.Vaccum.isInvalid],
        ["VaccumS", [fields.VaccumS.visible && fields.VaccumS.required ? ew.Validators.required(fields.VaccumS.caption) : null], fields.VaccumS.isInvalid],
        ["VaccumP", [fields.VaccumP.visible && fields.VaccumP.required ? ew.Validators.required(fields.VaccumP.caption) : null], fields.VaccumP.isInvalid],
        ["Forceps", [fields.Forceps.visible && fields.Forceps.required ? ew.Validators.required(fields.Forceps.caption) : null], fields.Forceps.isInvalid],
        ["ForcepsS", [fields.ForcepsS.visible && fields.ForcepsS.required ? ew.Validators.required(fields.ForcepsS.caption) : null], fields.ForcepsS.isInvalid],
        ["ForcepsP", [fields.ForcepsP.visible && fields.ForcepsP.required ? ew.Validators.required(fields.ForcepsP.caption) : null], fields.ForcepsP.isInvalid],
        ["Elective", [fields.Elective.visible && fields.Elective.required ? ew.Validators.required(fields.Elective.caption) : null], fields.Elective.isInvalid],
        ["ElectiveS", [fields.ElectiveS.visible && fields.ElectiveS.required ? ew.Validators.required(fields.ElectiveS.caption) : null], fields.ElectiveS.isInvalid],
        ["ElectiveP", [fields.ElectiveP.visible && fields.ElectiveP.required ? ew.Validators.required(fields.ElectiveP.caption) : null], fields.ElectiveP.isInvalid],
        ["Emergency", [fields.Emergency.visible && fields.Emergency.required ? ew.Validators.required(fields.Emergency.caption) : null], fields.Emergency.isInvalid],
        ["EmergencyS", [fields.EmergencyS.visible && fields.EmergencyS.required ? ew.Validators.required(fields.EmergencyS.caption) : null], fields.EmergencyS.isInvalid],
        ["EmergencyP", [fields.EmergencyP.visible && fields.EmergencyP.required ? ew.Validators.required(fields.EmergencyP.caption) : null], fields.EmergencyP.isInvalid],
        ["Maturity", [fields.Maturity.visible && fields.Maturity.required ? ew.Validators.required(fields.Maturity.caption) : null], fields.Maturity.isInvalid],
        ["Baby1", [fields.Baby1.visible && fields.Baby1.required ? ew.Validators.required(fields.Baby1.caption) : null], fields.Baby1.isInvalid],
        ["Baby2", [fields.Baby2.visible && fields.Baby2.required ? ew.Validators.required(fields.Baby2.caption) : null], fields.Baby2.isInvalid],
        ["sex1", [fields.sex1.visible && fields.sex1.required ? ew.Validators.required(fields.sex1.caption) : null], fields.sex1.isInvalid],
        ["sex2", [fields.sex2.visible && fields.sex2.required ? ew.Validators.required(fields.sex2.caption) : null], fields.sex2.isInvalid],
        ["weight1", [fields.weight1.visible && fields.weight1.required ? ew.Validators.required(fields.weight1.caption) : null], fields.weight1.isInvalid],
        ["weight2", [fields.weight2.visible && fields.weight2.required ? ew.Validators.required(fields.weight2.caption) : null], fields.weight2.isInvalid],
        ["NICU1", [fields.NICU1.visible && fields.NICU1.required ? ew.Validators.required(fields.NICU1.caption) : null], fields.NICU1.isInvalid],
        ["NICU2", [fields.NICU2.visible && fields.NICU2.required ? ew.Validators.required(fields.NICU2.caption) : null], fields.NICU2.isInvalid],
        ["Jaundice1", [fields.Jaundice1.visible && fields.Jaundice1.required ? ew.Validators.required(fields.Jaundice1.caption) : null], fields.Jaundice1.isInvalid],
        ["Jaundice2", [fields.Jaundice2.visible && fields.Jaundice2.required ? ew.Validators.required(fields.Jaundice2.caption) : null], fields.Jaundice2.isInvalid],
        ["Others1", [fields.Others1.visible && fields.Others1.required ? ew.Validators.required(fields.Others1.caption) : null], fields.Others1.isInvalid],
        ["Others2", [fields.Others2.visible && fields.Others2.required ? ew.Validators.required(fields.Others2.caption) : null], fields.Others2.isInvalid],
        ["SpillOverReasons", [fields.SpillOverReasons.visible && fields.SpillOverReasons.required ? ew.Validators.required(fields.SpillOverReasons.caption) : null], fields.SpillOverReasons.isInvalid],
        ["ANClosed", [fields.ANClosed.visible && fields.ANClosed.required ? ew.Validators.required(fields.ANClosed.caption) : null], fields.ANClosed.isInvalid],
        ["ANClosedDATE", [fields.ANClosedDATE.visible && fields.ANClosedDATE.required ? ew.Validators.required(fields.ANClosedDATE.caption) : null], fields.ANClosedDATE.isInvalid],
        ["PastMedicalHistoryOthers", [fields.PastMedicalHistoryOthers.visible && fields.PastMedicalHistoryOthers.required ? ew.Validators.required(fields.PastMedicalHistoryOthers.caption) : null], fields.PastMedicalHistoryOthers.isInvalid],
        ["PastSurgicalHistoryOthers", [fields.PastSurgicalHistoryOthers.visible && fields.PastSurgicalHistoryOthers.required ? ew.Validators.required(fields.PastSurgicalHistoryOthers.caption) : null], fields.PastSurgicalHistoryOthers.isInvalid],
        ["FamilyHistoryOthers", [fields.FamilyHistoryOthers.visible && fields.FamilyHistoryOthers.required ? ew.Validators.required(fields.FamilyHistoryOthers.caption) : null], fields.FamilyHistoryOthers.isInvalid],
        ["PresentPregnancyComplicationsOthers", [fields.PresentPregnancyComplicationsOthers.visible && fields.PresentPregnancyComplicationsOthers.required ? ew.Validators.required(fields.PresentPregnancyComplicationsOthers.caption) : null], fields.PresentPregnancyComplicationsOthers.isInvalid],
        ["ETdate", [fields.ETdate.visible && fields.ETdate.required ? ew.Validators.required(fields.ETdate.caption) : null], fields.ETdate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_an_registrationgrid,
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
    fpatient_an_registrationgrid.validate = function () {
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
    fpatient_an_registrationgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "pid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "fid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "G", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "P", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "L", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "E", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "M", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LMP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EDO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MenstrualHistory", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MaritalHistory", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ObstetricHistory", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PreviousHistoryofGDM", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PreviousHistorofPIH", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PreviousHistoryofIUGR", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PreviousHistoryofOligohydramnios", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PreviousHistoryofPreterm", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "G1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "G2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "G3", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DeliveryNDLSCS1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DeliveryNDLSCS2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DeliveryNDLSCS3", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BabySexweight1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BabySexweight2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BabySexweight3", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PastMedicalHistory[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PastSurgicalHistory[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FamilyHistory[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Viability", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ViabilityDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ViabilityREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Viability2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Viability2DATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Viability2REPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NTscan", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NTscanDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NTscanREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EarlyTarget", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EarlyTargetDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EarlyTargetREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Anomaly", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AnomalyDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AnomalyREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Growth", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GrowthDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GrowthREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Growth1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Growth1DATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Growth1REPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ANProfile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ANProfileDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ANProfileINHOUSE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ANProfileREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DualMarker", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DualMarkerDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DualMarkerINHOUSE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DualMarkerREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Quadruple", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "QuadrupleDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "QuadrupleINHOUSE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "QuadrupleREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A5month", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A5monthDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A5monthINHOUSE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A5monthREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A7month", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A7monthDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A7monthINHOUSE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A7monthREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A9month", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A9monthDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A9monthINHOUSE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A9monthREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "INJ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "INJDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "INJINHOUSE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "INJREPORT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Bleeding[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Hypothyroidism", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PICMENumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Outcome", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DateofAdmission", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DateodProcedure", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Miscarriage", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModeOfDelivery", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ND", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NDS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NDP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Vaccum", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "VaccumS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "VaccumP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Forceps", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ForcepsS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ForcepsP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Elective", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ElectiveS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ElectiveP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Emergency", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EmergencyS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EmergencyP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Maturity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Baby1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Baby2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "sex1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "sex2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "weight1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "weight2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NICU1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NICU2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Jaundice1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Jaundice2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Others1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Others2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SpillOverReasons", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ANClosed[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ANClosedDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PastMedicalHistoryOthers", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PastSurgicalHistoryOthers", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FamilyHistoryOthers", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PresentPregnancyComplicationsOthers", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ETdate", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_an_registrationgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_an_registrationgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_an_registrationgrid.lists.MenstrualHistory = <?= $Grid->MenstrualHistory->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.PreviousHistoryofGDM = <?= $Grid->PreviousHistoryofGDM->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.PreviousHistorofPIH = <?= $Grid->PreviousHistorofPIH->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.PreviousHistoryofIUGR = <?= $Grid->PreviousHistoryofIUGR->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.PreviousHistoryofOligohydramnios = <?= $Grid->PreviousHistoryofOligohydramnios->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.PreviousHistoryofPreterm = <?= $Grid->PreviousHistoryofPreterm->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.PastMedicalHistory = <?= $Grid->PastMedicalHistory->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.PastSurgicalHistory = <?= $Grid->PastSurgicalHistory->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.FamilyHistory = <?= $Grid->FamilyHistory->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.Bleeding = <?= $Grid->Bleeding->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.Miscarriage = <?= $Grid->Miscarriage->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.ModeOfDelivery = <?= $Grid->ModeOfDelivery->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.NDS = <?= $Grid->NDS->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.NDP = <?= $Grid->NDP->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.VaccumS = <?= $Grid->VaccumS->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.VaccumP = <?= $Grid->VaccumP->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.ForcepsS = <?= $Grid->ForcepsS->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.ForcepsP = <?= $Grid->ForcepsP->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.ElectiveS = <?= $Grid->ElectiveS->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.ElectiveP = <?= $Grid->ElectiveP->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.EmergencyS = <?= $Grid->EmergencyS->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.EmergencyP = <?= $Grid->EmergencyP->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.Maturity = <?= $Grid->Maturity->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.SpillOverReasons = <?= $Grid->SpillOverReasons->toClientList($Grid) ?>;
    fpatient_an_registrationgrid.lists.ANClosed = <?= $Grid->ANClosed->toClientList($Grid) ?>;
    loadjs.done("fpatient_an_registrationgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_an_registration">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_an_registrationgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_an_registration" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_an_registrationgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_an_registration_id" class="patient_an_registration_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->pid->Visible) { // pid ?>
        <th data-name="pid" class="<?= $Grid->pid->headerCellClass() ?>"><div id="elh_patient_an_registration_pid" class="patient_an_registration_pid"><?= $Grid->renderSort($Grid->pid) ?></div></th>
<?php } ?>
<?php if ($Grid->fid->Visible) { // fid ?>
        <th data-name="fid" class="<?= $Grid->fid->headerCellClass() ?>"><div id="elh_patient_an_registration_fid" class="patient_an_registration_fid"><?= $Grid->renderSort($Grid->fid) ?></div></th>
<?php } ?>
<?php if ($Grid->G->Visible) { // G ?>
        <th data-name="G" class="<?= $Grid->G->headerCellClass() ?>"><div id="elh_patient_an_registration_G" class="patient_an_registration_G"><?= $Grid->renderSort($Grid->G) ?></div></th>
<?php } ?>
<?php if ($Grid->P->Visible) { // P ?>
        <th data-name="P" class="<?= $Grid->P->headerCellClass() ?>"><div id="elh_patient_an_registration_P" class="patient_an_registration_P"><?= $Grid->renderSort($Grid->P) ?></div></th>
<?php } ?>
<?php if ($Grid->L->Visible) { // L ?>
        <th data-name="L" class="<?= $Grid->L->headerCellClass() ?>"><div id="elh_patient_an_registration_L" class="patient_an_registration_L"><?= $Grid->renderSort($Grid->L) ?></div></th>
<?php } ?>
<?php if ($Grid->A->Visible) { // A ?>
        <th data-name="A" class="<?= $Grid->A->headerCellClass() ?>"><div id="elh_patient_an_registration_A" class="patient_an_registration_A"><?= $Grid->renderSort($Grid->A) ?></div></th>
<?php } ?>
<?php if ($Grid->E->Visible) { // E ?>
        <th data-name="E" class="<?= $Grid->E->headerCellClass() ?>"><div id="elh_patient_an_registration_E" class="patient_an_registration_E"><?= $Grid->renderSort($Grid->E) ?></div></th>
<?php } ?>
<?php if ($Grid->M->Visible) { // M ?>
        <th data-name="M" class="<?= $Grid->M->headerCellClass() ?>"><div id="elh_patient_an_registration_M" class="patient_an_registration_M"><?= $Grid->renderSort($Grid->M) ?></div></th>
<?php } ?>
<?php if ($Grid->LMP->Visible) { // LMP ?>
        <th data-name="LMP" class="<?= $Grid->LMP->headerCellClass() ?>"><div id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP"><?= $Grid->renderSort($Grid->LMP) ?></div></th>
<?php } ?>
<?php if ($Grid->EDO->Visible) { // EDO ?>
        <th data-name="EDO" class="<?= $Grid->EDO->headerCellClass() ?>"><div id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO"><?= $Grid->renderSort($Grid->EDO) ?></div></th>
<?php } ?>
<?php if ($Grid->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <th data-name="MenstrualHistory" class="<?= $Grid->MenstrualHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory"><?= $Grid->renderSort($Grid->MenstrualHistory) ?></div></th>
<?php } ?>
<?php if ($Grid->MaritalHistory->Visible) { // MaritalHistory ?>
        <th data-name="MaritalHistory" class="<?= $Grid->MaritalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory"><?= $Grid->renderSort($Grid->MaritalHistory) ?></div></th>
<?php } ?>
<?php if ($Grid->ObstetricHistory->Visible) { // ObstetricHistory ?>
        <th data-name="ObstetricHistory" class="<?= $Grid->ObstetricHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory"><?= $Grid->renderSort($Grid->ObstetricHistory) ?></div></th>
<?php } ?>
<?php if ($Grid->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
        <th data-name="PreviousHistoryofGDM" class="<?= $Grid->PreviousHistoryofGDM->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM"><?= $Grid->renderSort($Grid->PreviousHistoryofGDM) ?></div></th>
<?php } ?>
<?php if ($Grid->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
        <th data-name="PreviousHistorofPIH" class="<?= $Grid->PreviousHistorofPIH->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH"><?= $Grid->renderSort($Grid->PreviousHistorofPIH) ?></div></th>
<?php } ?>
<?php if ($Grid->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
        <th data-name="PreviousHistoryofIUGR" class="<?= $Grid->PreviousHistoryofIUGR->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR"><?= $Grid->renderSort($Grid->PreviousHistoryofIUGR) ?></div></th>
<?php } ?>
<?php if ($Grid->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
        <th data-name="PreviousHistoryofOligohydramnios" class="<?= $Grid->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios"><?= $Grid->renderSort($Grid->PreviousHistoryofOligohydramnios) ?></div></th>
<?php } ?>
<?php if ($Grid->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
        <th data-name="PreviousHistoryofPreterm" class="<?= $Grid->PreviousHistoryofPreterm->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm"><?= $Grid->renderSort($Grid->PreviousHistoryofPreterm) ?></div></th>
<?php } ?>
<?php if ($Grid->G1->Visible) { // G1 ?>
        <th data-name="G1" class="<?= $Grid->G1->headerCellClass() ?>"><div id="elh_patient_an_registration_G1" class="patient_an_registration_G1"><?= $Grid->renderSort($Grid->G1) ?></div></th>
<?php } ?>
<?php if ($Grid->G2->Visible) { // G2 ?>
        <th data-name="G2" class="<?= $Grid->G2->headerCellClass() ?>"><div id="elh_patient_an_registration_G2" class="patient_an_registration_G2"><?= $Grid->renderSort($Grid->G2) ?></div></th>
<?php } ?>
<?php if ($Grid->G3->Visible) { // G3 ?>
        <th data-name="G3" class="<?= $Grid->G3->headerCellClass() ?>"><div id="elh_patient_an_registration_G3" class="patient_an_registration_G3"><?= $Grid->renderSort($Grid->G3) ?></div></th>
<?php } ?>
<?php if ($Grid->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
        <th data-name="DeliveryNDLSCS1" class="<?= $Grid->DeliveryNDLSCS1->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1"><?= $Grid->renderSort($Grid->DeliveryNDLSCS1) ?></div></th>
<?php } ?>
<?php if ($Grid->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
        <th data-name="DeliveryNDLSCS2" class="<?= $Grid->DeliveryNDLSCS2->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2"><?= $Grid->renderSort($Grid->DeliveryNDLSCS2) ?></div></th>
<?php } ?>
<?php if ($Grid->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
        <th data-name="DeliveryNDLSCS3" class="<?= $Grid->DeliveryNDLSCS3->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3"><?= $Grid->renderSort($Grid->DeliveryNDLSCS3) ?></div></th>
<?php } ?>
<?php if ($Grid->BabySexweight1->Visible) { // BabySexweight1 ?>
        <th data-name="BabySexweight1" class="<?= $Grid->BabySexweight1->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1"><?= $Grid->renderSort($Grid->BabySexweight1) ?></div></th>
<?php } ?>
<?php if ($Grid->BabySexweight2->Visible) { // BabySexweight2 ?>
        <th data-name="BabySexweight2" class="<?= $Grid->BabySexweight2->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2"><?= $Grid->renderSort($Grid->BabySexweight2) ?></div></th>
<?php } ?>
<?php if ($Grid->BabySexweight3->Visible) { // BabySexweight3 ?>
        <th data-name="BabySexweight3" class="<?= $Grid->BabySexweight3->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3"><?= $Grid->renderSort($Grid->BabySexweight3) ?></div></th>
<?php } ?>
<?php if ($Grid->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
        <th data-name="PastMedicalHistory" class="<?= $Grid->PastMedicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory"><?= $Grid->renderSort($Grid->PastMedicalHistory) ?></div></th>
<?php } ?>
<?php if ($Grid->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
        <th data-name="PastSurgicalHistory" class="<?= $Grid->PastSurgicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory"><?= $Grid->renderSort($Grid->PastSurgicalHistory) ?></div></th>
<?php } ?>
<?php if ($Grid->FamilyHistory->Visible) { // FamilyHistory ?>
        <th data-name="FamilyHistory" class="<?= $Grid->FamilyHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory"><?= $Grid->renderSort($Grid->FamilyHistory) ?></div></th>
<?php } ?>
<?php if ($Grid->Viability->Visible) { // Viability ?>
        <th data-name="Viability" class="<?= $Grid->Viability->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability"><?= $Grid->renderSort($Grid->Viability) ?></div></th>
<?php } ?>
<?php if ($Grid->ViabilityDATE->Visible) { // ViabilityDATE ?>
        <th data-name="ViabilityDATE" class="<?= $Grid->ViabilityDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE"><?= $Grid->renderSort($Grid->ViabilityDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
        <th data-name="ViabilityREPORT" class="<?= $Grid->ViabilityREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT"><?= $Grid->renderSort($Grid->ViabilityREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->Viability2->Visible) { // Viability2 ?>
        <th data-name="Viability2" class="<?= $Grid->Viability2->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2"><?= $Grid->renderSort($Grid->Viability2) ?></div></th>
<?php } ?>
<?php if ($Grid->Viability2DATE->Visible) { // Viability2DATE ?>
        <th data-name="Viability2DATE" class="<?= $Grid->Viability2DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE"><?= $Grid->renderSort($Grid->Viability2DATE) ?></div></th>
<?php } ?>
<?php if ($Grid->Viability2REPORT->Visible) { // Viability2REPORT ?>
        <th data-name="Viability2REPORT" class="<?= $Grid->Viability2REPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT"><?= $Grid->renderSort($Grid->Viability2REPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->NTscan->Visible) { // NTscan ?>
        <th data-name="NTscan" class="<?= $Grid->NTscan->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan"><?= $Grid->renderSort($Grid->NTscan) ?></div></th>
<?php } ?>
<?php if ($Grid->NTscanDATE->Visible) { // NTscanDATE ?>
        <th data-name="NTscanDATE" class="<?= $Grid->NTscanDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE"><?= $Grid->renderSort($Grid->NTscanDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->NTscanREPORT->Visible) { // NTscanREPORT ?>
        <th data-name="NTscanREPORT" class="<?= $Grid->NTscanREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT"><?= $Grid->renderSort($Grid->NTscanREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->EarlyTarget->Visible) { // EarlyTarget ?>
        <th data-name="EarlyTarget" class="<?= $Grid->EarlyTarget->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget"><?= $Grid->renderSort($Grid->EarlyTarget) ?></div></th>
<?php } ?>
<?php if ($Grid->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
        <th data-name="EarlyTargetDATE" class="<?= $Grid->EarlyTargetDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE"><?= $Grid->renderSort($Grid->EarlyTargetDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
        <th data-name="EarlyTargetREPORT" class="<?= $Grid->EarlyTargetREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT"><?= $Grid->renderSort($Grid->EarlyTargetREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->Anomaly->Visible) { // Anomaly ?>
        <th data-name="Anomaly" class="<?= $Grid->Anomaly->headerCellClass() ?>"><div id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly"><?= $Grid->renderSort($Grid->Anomaly) ?></div></th>
<?php } ?>
<?php if ($Grid->AnomalyDATE->Visible) { // AnomalyDATE ?>
        <th data-name="AnomalyDATE" class="<?= $Grid->AnomalyDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE"><?= $Grid->renderSort($Grid->AnomalyDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
        <th data-name="AnomalyREPORT" class="<?= $Grid->AnomalyREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT"><?= $Grid->renderSort($Grid->AnomalyREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->Growth->Visible) { // Growth ?>
        <th data-name="Growth" class="<?= $Grid->Growth->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth"><?= $Grid->renderSort($Grid->Growth) ?></div></th>
<?php } ?>
<?php if ($Grid->GrowthDATE->Visible) { // GrowthDATE ?>
        <th data-name="GrowthDATE" class="<?= $Grid->GrowthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE"><?= $Grid->renderSort($Grid->GrowthDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->GrowthREPORT->Visible) { // GrowthREPORT ?>
        <th data-name="GrowthREPORT" class="<?= $Grid->GrowthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT"><?= $Grid->renderSort($Grid->GrowthREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->Growth1->Visible) { // Growth1 ?>
        <th data-name="Growth1" class="<?= $Grid->Growth1->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1"><?= $Grid->renderSort($Grid->Growth1) ?></div></th>
<?php } ?>
<?php if ($Grid->Growth1DATE->Visible) { // Growth1DATE ?>
        <th data-name="Growth1DATE" class="<?= $Grid->Growth1DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE"><?= $Grid->renderSort($Grid->Growth1DATE) ?></div></th>
<?php } ?>
<?php if ($Grid->Growth1REPORT->Visible) { // Growth1REPORT ?>
        <th data-name="Growth1REPORT" class="<?= $Grid->Growth1REPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT"><?= $Grid->renderSort($Grid->Growth1REPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->ANProfile->Visible) { // ANProfile ?>
        <th data-name="ANProfile" class="<?= $Grid->ANProfile->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile"><?= $Grid->renderSort($Grid->ANProfile) ?></div></th>
<?php } ?>
<?php if ($Grid->ANProfileDATE->Visible) { // ANProfileDATE ?>
        <th data-name="ANProfileDATE" class="<?= $Grid->ANProfileDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE"><?= $Grid->renderSort($Grid->ANProfileDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
        <th data-name="ANProfileINHOUSE" class="<?= $Grid->ANProfileINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE"><?= $Grid->renderSort($Grid->ANProfileINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Grid->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
        <th data-name="ANProfileREPORT" class="<?= $Grid->ANProfileREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT"><?= $Grid->renderSort($Grid->ANProfileREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->DualMarker->Visible) { // DualMarker ?>
        <th data-name="DualMarker" class="<?= $Grid->DualMarker->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker"><?= $Grid->renderSort($Grid->DualMarker) ?></div></th>
<?php } ?>
<?php if ($Grid->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
        <th data-name="DualMarkerDATE" class="<?= $Grid->DualMarkerDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE"><?= $Grid->renderSort($Grid->DualMarkerDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
        <th data-name="DualMarkerINHOUSE" class="<?= $Grid->DualMarkerINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE"><?= $Grid->renderSort($Grid->DualMarkerINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Grid->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
        <th data-name="DualMarkerREPORT" class="<?= $Grid->DualMarkerREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT"><?= $Grid->renderSort($Grid->DualMarkerREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->Quadruple->Visible) { // Quadruple ?>
        <th data-name="Quadruple" class="<?= $Grid->Quadruple->headerCellClass() ?>"><div id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple"><?= $Grid->renderSort($Grid->Quadruple) ?></div></th>
<?php } ?>
<?php if ($Grid->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
        <th data-name="QuadrupleDATE" class="<?= $Grid->QuadrupleDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE"><?= $Grid->renderSort($Grid->QuadrupleDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
        <th data-name="QuadrupleINHOUSE" class="<?= $Grid->QuadrupleINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE"><?= $Grid->renderSort($Grid->QuadrupleINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Grid->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
        <th data-name="QuadrupleREPORT" class="<?= $Grid->QuadrupleREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT"><?= $Grid->renderSort($Grid->QuadrupleREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->A5month->Visible) { // A5month ?>
        <th data-name="A5month" class="<?= $Grid->A5month->headerCellClass() ?>"><div id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month"><?= $Grid->renderSort($Grid->A5month) ?></div></th>
<?php } ?>
<?php if ($Grid->A5monthDATE->Visible) { // A5monthDATE ?>
        <th data-name="A5monthDATE" class="<?= $Grid->A5monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE"><?= $Grid->renderSort($Grid->A5monthDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
        <th data-name="A5monthINHOUSE" class="<?= $Grid->A5monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE"><?= $Grid->renderSort($Grid->A5monthINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Grid->A5monthREPORT->Visible) { // A5monthREPORT ?>
        <th data-name="A5monthREPORT" class="<?= $Grid->A5monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT"><?= $Grid->renderSort($Grid->A5monthREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->A7month->Visible) { // A7month ?>
        <th data-name="A7month" class="<?= $Grid->A7month->headerCellClass() ?>"><div id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month"><?= $Grid->renderSort($Grid->A7month) ?></div></th>
<?php } ?>
<?php if ($Grid->A7monthDATE->Visible) { // A7monthDATE ?>
        <th data-name="A7monthDATE" class="<?= $Grid->A7monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE"><?= $Grid->renderSort($Grid->A7monthDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
        <th data-name="A7monthINHOUSE" class="<?= $Grid->A7monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE"><?= $Grid->renderSort($Grid->A7monthINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Grid->A7monthREPORT->Visible) { // A7monthREPORT ?>
        <th data-name="A7monthREPORT" class="<?= $Grid->A7monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT"><?= $Grid->renderSort($Grid->A7monthREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->A9month->Visible) { // A9month ?>
        <th data-name="A9month" class="<?= $Grid->A9month->headerCellClass() ?>"><div id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month"><?= $Grid->renderSort($Grid->A9month) ?></div></th>
<?php } ?>
<?php if ($Grid->A9monthDATE->Visible) { // A9monthDATE ?>
        <th data-name="A9monthDATE" class="<?= $Grid->A9monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE"><?= $Grid->renderSort($Grid->A9monthDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
        <th data-name="A9monthINHOUSE" class="<?= $Grid->A9monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE"><?= $Grid->renderSort($Grid->A9monthINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Grid->A9monthREPORT->Visible) { // A9monthREPORT ?>
        <th data-name="A9monthREPORT" class="<?= $Grid->A9monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT"><?= $Grid->renderSort($Grid->A9monthREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->INJ->Visible) { // INJ ?>
        <th data-name="INJ" class="<?= $Grid->INJ->headerCellClass() ?>"><div id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ"><?= $Grid->renderSort($Grid->INJ) ?></div></th>
<?php } ?>
<?php if ($Grid->INJDATE->Visible) { // INJDATE ?>
        <th data-name="INJDATE" class="<?= $Grid->INJDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE"><?= $Grid->renderSort($Grid->INJDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->INJINHOUSE->Visible) { // INJINHOUSE ?>
        <th data-name="INJINHOUSE" class="<?= $Grid->INJINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE"><?= $Grid->renderSort($Grid->INJINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Grid->INJREPORT->Visible) { // INJREPORT ?>
        <th data-name="INJREPORT" class="<?= $Grid->INJREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT"><?= $Grid->renderSort($Grid->INJREPORT) ?></div></th>
<?php } ?>
<?php if ($Grid->Bleeding->Visible) { // Bleeding ?>
        <th data-name="Bleeding" class="<?= $Grid->Bleeding->headerCellClass() ?>"><div id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding"><?= $Grid->renderSort($Grid->Bleeding) ?></div></th>
<?php } ?>
<?php if ($Grid->Hypothyroidism->Visible) { // Hypothyroidism ?>
        <th data-name="Hypothyroidism" class="<?= $Grid->Hypothyroidism->headerCellClass() ?>"><div id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism"><?= $Grid->renderSort($Grid->Hypothyroidism) ?></div></th>
<?php } ?>
<?php if ($Grid->PICMENumber->Visible) { // PICMENumber ?>
        <th data-name="PICMENumber" class="<?= $Grid->PICMENumber->headerCellClass() ?>"><div id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber"><?= $Grid->renderSort($Grid->PICMENumber) ?></div></th>
<?php } ?>
<?php if ($Grid->Outcome->Visible) { // Outcome ?>
        <th data-name="Outcome" class="<?= $Grid->Outcome->headerCellClass() ?>"><div id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome"><?= $Grid->renderSort($Grid->Outcome) ?></div></th>
<?php } ?>
<?php if ($Grid->DateofAdmission->Visible) { // DateofAdmission ?>
        <th data-name="DateofAdmission" class="<?= $Grid->DateofAdmission->headerCellClass() ?>"><div id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission"><?= $Grid->renderSort($Grid->DateofAdmission) ?></div></th>
<?php } ?>
<?php if ($Grid->DateodProcedure->Visible) { // DateodProcedure ?>
        <th data-name="DateodProcedure" class="<?= $Grid->DateodProcedure->headerCellClass() ?>"><div id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure"><?= $Grid->renderSort($Grid->DateodProcedure) ?></div></th>
<?php } ?>
<?php if ($Grid->Miscarriage->Visible) { // Miscarriage ?>
        <th data-name="Miscarriage" class="<?= $Grid->Miscarriage->headerCellClass() ?>"><div id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage"><?= $Grid->renderSort($Grid->Miscarriage) ?></div></th>
<?php } ?>
<?php if ($Grid->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
        <th data-name="ModeOfDelivery" class="<?= $Grid->ModeOfDelivery->headerCellClass() ?>"><div id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery"><?= $Grid->renderSort($Grid->ModeOfDelivery) ?></div></th>
<?php } ?>
<?php if ($Grid->ND->Visible) { // ND ?>
        <th data-name="ND" class="<?= $Grid->ND->headerCellClass() ?>"><div id="elh_patient_an_registration_ND" class="patient_an_registration_ND"><?= $Grid->renderSort($Grid->ND) ?></div></th>
<?php } ?>
<?php if ($Grid->NDS->Visible) { // NDS ?>
        <th data-name="NDS" class="<?= $Grid->NDS->headerCellClass() ?>"><div id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS"><?= $Grid->renderSort($Grid->NDS) ?></div></th>
<?php } ?>
<?php if ($Grid->NDP->Visible) { // NDP ?>
        <th data-name="NDP" class="<?= $Grid->NDP->headerCellClass() ?>"><div id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP"><?= $Grid->renderSort($Grid->NDP) ?></div></th>
<?php } ?>
<?php if ($Grid->Vaccum->Visible) { // Vaccum ?>
        <th data-name="Vaccum" class="<?= $Grid->Vaccum->headerCellClass() ?>"><div id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum"><?= $Grid->renderSort($Grid->Vaccum) ?></div></th>
<?php } ?>
<?php if ($Grid->VaccumS->Visible) { // VaccumS ?>
        <th data-name="VaccumS" class="<?= $Grid->VaccumS->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS"><?= $Grid->renderSort($Grid->VaccumS) ?></div></th>
<?php } ?>
<?php if ($Grid->VaccumP->Visible) { // VaccumP ?>
        <th data-name="VaccumP" class="<?= $Grid->VaccumP->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP"><?= $Grid->renderSort($Grid->VaccumP) ?></div></th>
<?php } ?>
<?php if ($Grid->Forceps->Visible) { // Forceps ?>
        <th data-name="Forceps" class="<?= $Grid->Forceps->headerCellClass() ?>"><div id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps"><?= $Grid->renderSort($Grid->Forceps) ?></div></th>
<?php } ?>
<?php if ($Grid->ForcepsS->Visible) { // ForcepsS ?>
        <th data-name="ForcepsS" class="<?= $Grid->ForcepsS->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS"><?= $Grid->renderSort($Grid->ForcepsS) ?></div></th>
<?php } ?>
<?php if ($Grid->ForcepsP->Visible) { // ForcepsP ?>
        <th data-name="ForcepsP" class="<?= $Grid->ForcepsP->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP"><?= $Grid->renderSort($Grid->ForcepsP) ?></div></th>
<?php } ?>
<?php if ($Grid->Elective->Visible) { // Elective ?>
        <th data-name="Elective" class="<?= $Grid->Elective->headerCellClass() ?>"><div id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective"><?= $Grid->renderSort($Grid->Elective) ?></div></th>
<?php } ?>
<?php if ($Grid->ElectiveS->Visible) { // ElectiveS ?>
        <th data-name="ElectiveS" class="<?= $Grid->ElectiveS->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS"><?= $Grid->renderSort($Grid->ElectiveS) ?></div></th>
<?php } ?>
<?php if ($Grid->ElectiveP->Visible) { // ElectiveP ?>
        <th data-name="ElectiveP" class="<?= $Grid->ElectiveP->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP"><?= $Grid->renderSort($Grid->ElectiveP) ?></div></th>
<?php } ?>
<?php if ($Grid->Emergency->Visible) { // Emergency ?>
        <th data-name="Emergency" class="<?= $Grid->Emergency->headerCellClass() ?>"><div id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency"><?= $Grid->renderSort($Grid->Emergency) ?></div></th>
<?php } ?>
<?php if ($Grid->EmergencyS->Visible) { // EmergencyS ?>
        <th data-name="EmergencyS" class="<?= $Grid->EmergencyS->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS"><?= $Grid->renderSort($Grid->EmergencyS) ?></div></th>
<?php } ?>
<?php if ($Grid->EmergencyP->Visible) { // EmergencyP ?>
        <th data-name="EmergencyP" class="<?= $Grid->EmergencyP->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP"><?= $Grid->renderSort($Grid->EmergencyP) ?></div></th>
<?php } ?>
<?php if ($Grid->Maturity->Visible) { // Maturity ?>
        <th data-name="Maturity" class="<?= $Grid->Maturity->headerCellClass() ?>"><div id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity"><?= $Grid->renderSort($Grid->Maturity) ?></div></th>
<?php } ?>
<?php if ($Grid->Baby1->Visible) { // Baby1 ?>
        <th data-name="Baby1" class="<?= $Grid->Baby1->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1"><?= $Grid->renderSort($Grid->Baby1) ?></div></th>
<?php } ?>
<?php if ($Grid->Baby2->Visible) { // Baby2 ?>
        <th data-name="Baby2" class="<?= $Grid->Baby2->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2"><?= $Grid->renderSort($Grid->Baby2) ?></div></th>
<?php } ?>
<?php if ($Grid->sex1->Visible) { // sex1 ?>
        <th data-name="sex1" class="<?= $Grid->sex1->headerCellClass() ?>"><div id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1"><?= $Grid->renderSort($Grid->sex1) ?></div></th>
<?php } ?>
<?php if ($Grid->sex2->Visible) { // sex2 ?>
        <th data-name="sex2" class="<?= $Grid->sex2->headerCellClass() ?>"><div id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2"><?= $Grid->renderSort($Grid->sex2) ?></div></th>
<?php } ?>
<?php if ($Grid->weight1->Visible) { // weight1 ?>
        <th data-name="weight1" class="<?= $Grid->weight1->headerCellClass() ?>"><div id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1"><?= $Grid->renderSort($Grid->weight1) ?></div></th>
<?php } ?>
<?php if ($Grid->weight2->Visible) { // weight2 ?>
        <th data-name="weight2" class="<?= $Grid->weight2->headerCellClass() ?>"><div id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2"><?= $Grid->renderSort($Grid->weight2) ?></div></th>
<?php } ?>
<?php if ($Grid->NICU1->Visible) { // NICU1 ?>
        <th data-name="NICU1" class="<?= $Grid->NICU1->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1"><?= $Grid->renderSort($Grid->NICU1) ?></div></th>
<?php } ?>
<?php if ($Grid->NICU2->Visible) { // NICU2 ?>
        <th data-name="NICU2" class="<?= $Grid->NICU2->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2"><?= $Grid->renderSort($Grid->NICU2) ?></div></th>
<?php } ?>
<?php if ($Grid->Jaundice1->Visible) { // Jaundice1 ?>
        <th data-name="Jaundice1" class="<?= $Grid->Jaundice1->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1"><?= $Grid->renderSort($Grid->Jaundice1) ?></div></th>
<?php } ?>
<?php if ($Grid->Jaundice2->Visible) { // Jaundice2 ?>
        <th data-name="Jaundice2" class="<?= $Grid->Jaundice2->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2"><?= $Grid->renderSort($Grid->Jaundice2) ?></div></th>
<?php } ?>
<?php if ($Grid->Others1->Visible) { // Others1 ?>
        <th data-name="Others1" class="<?= $Grid->Others1->headerCellClass() ?>"><div id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1"><?= $Grid->renderSort($Grid->Others1) ?></div></th>
<?php } ?>
<?php if ($Grid->Others2->Visible) { // Others2 ?>
        <th data-name="Others2" class="<?= $Grid->Others2->headerCellClass() ?>"><div id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2"><?= $Grid->renderSort($Grid->Others2) ?></div></th>
<?php } ?>
<?php if ($Grid->SpillOverReasons->Visible) { // SpillOverReasons ?>
        <th data-name="SpillOverReasons" class="<?= $Grid->SpillOverReasons->headerCellClass() ?>"><div id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons"><?= $Grid->renderSort($Grid->SpillOverReasons) ?></div></th>
<?php } ?>
<?php if ($Grid->ANClosed->Visible) { // ANClosed ?>
        <th data-name="ANClosed" class="<?= $Grid->ANClosed->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed"><?= $Grid->renderSort($Grid->ANClosed) ?></div></th>
<?php } ?>
<?php if ($Grid->ANClosedDATE->Visible) { // ANClosedDATE ?>
        <th data-name="ANClosedDATE" class="<?= $Grid->ANClosedDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE"><?= $Grid->renderSort($Grid->ANClosedDATE) ?></div></th>
<?php } ?>
<?php if ($Grid->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
        <th data-name="PastMedicalHistoryOthers" class="<?= $Grid->PastMedicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers"><?= $Grid->renderSort($Grid->PastMedicalHistoryOthers) ?></div></th>
<?php } ?>
<?php if ($Grid->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
        <th data-name="PastSurgicalHistoryOthers" class="<?= $Grid->PastSurgicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers"><?= $Grid->renderSort($Grid->PastSurgicalHistoryOthers) ?></div></th>
<?php } ?>
<?php if ($Grid->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
        <th data-name="FamilyHistoryOthers" class="<?= $Grid->FamilyHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers"><?= $Grid->renderSort($Grid->FamilyHistoryOthers) ?></div></th>
<?php } ?>
<?php if ($Grid->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
        <th data-name="PresentPregnancyComplicationsOthers" class="<?= $Grid->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers"><?= $Grid->renderSort($Grid->PresentPregnancyComplicationsOthers) ?></div></th>
<?php } ?>
<?php if ($Grid->ETdate->Visible) { // ETdate ?>
        <th data-name="ETdate" class="<?= $Grid->ETdate->headerCellClass() ?>"><div id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate"><?= $Grid->renderSort($Grid->ETdate) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_an_registration", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_id" class="form-group"></span>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_id" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_an_registration" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->pid->Visible) { // pid ?>
        <td data-name="pid" <?= $Grid->pid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->pid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_pid" class="form-group">
<span<?= $Grid->pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->pid->getDisplayValue($Grid->pid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_pid" name="x<?= $Grid->RowIndex ?>_pid" value="<?= HtmlEncode($Grid->pid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_pid" class="form-group">
<input type="<?= $Grid->pid->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_pid" name="x<?= $Grid->RowIndex ?>_pid" id="x<?= $Grid->RowIndex ?>_pid" size="30" placeholder="<?= HtmlEncode($Grid->pid->getPlaceHolder()) ?>" value="<?= $Grid->pid->EditValue ?>"<?= $Grid->pid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->pid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_pid" id="o<?= $Grid->RowIndex ?>_pid" value="<?= HtmlEncode($Grid->pid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->pid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_pid" class="form-group">
<span<?= $Grid->pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->pid->getDisplayValue($Grid->pid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_pid" name="x<?= $Grid->RowIndex ?>_pid" value="<?= HtmlEncode($Grid->pid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_pid" class="form-group">
<input type="<?= $Grid->pid->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_pid" name="x<?= $Grid->RowIndex ?>_pid" id="x<?= $Grid->RowIndex ?>_pid" size="30" placeholder="<?= HtmlEncode($Grid->pid->getPlaceHolder()) ?>" value="<?= $Grid->pid->EditValue ?>"<?= $Grid->pid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->pid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_pid">
<span<?= $Grid->pid->viewAttributes() ?>>
<?= $Grid->pid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_pid" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_pid" value="<?= HtmlEncode($Grid->pid->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_pid" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_pid" value="<?= HtmlEncode($Grid->pid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->fid->Visible) { // fid ?>
        <td data-name="fid" <?= $Grid->fid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->fid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_fid" class="form-group">
<span<?= $Grid->fid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->fid->getDisplayValue($Grid->fid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_fid" name="x<?= $Grid->RowIndex ?>_fid" value="<?= HtmlEncode($Grid->fid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_fid" class="form-group">
<input type="<?= $Grid->fid->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_fid" name="x<?= $Grid->RowIndex ?>_fid" id="x<?= $Grid->RowIndex ?>_fid" size="30" placeholder="<?= HtmlEncode($Grid->fid->getPlaceHolder()) ?>" value="<?= $Grid->fid->EditValue ?>"<?= $Grid->fid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->fid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_fid" id="o<?= $Grid->RowIndex ?>_fid" value="<?= HtmlEncode($Grid->fid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->fid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_fid" class="form-group">
<span<?= $Grid->fid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->fid->getDisplayValue($Grid->fid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_fid" name="x<?= $Grid->RowIndex ?>_fid" value="<?= HtmlEncode($Grid->fid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_fid" class="form-group">
<input type="<?= $Grid->fid->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_fid" name="x<?= $Grid->RowIndex ?>_fid" id="x<?= $Grid->RowIndex ?>_fid" size="30" placeholder="<?= HtmlEncode($Grid->fid->getPlaceHolder()) ?>" value="<?= $Grid->fid->EditValue ?>"<?= $Grid->fid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->fid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_fid">
<span<?= $Grid->fid->viewAttributes() ?>>
<?= $Grid->fid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_fid" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_fid" value="<?= HtmlEncode($Grid->fid->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_fid" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_fid" value="<?= HtmlEncode($Grid->fid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->G->Visible) { // G ?>
        <td data-name="G" <?= $Grid->G->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G" class="form-group">
<input type="<?= $Grid->G->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G" name="x<?= $Grid->RowIndex ?>_G" id="x<?= $Grid->RowIndex ?>_G" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->G->getPlaceHolder()) ?>" value="<?= $Grid->G->EditValue ?>"<?= $Grid->G->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" data-hidden="1" name="o<?= $Grid->RowIndex ?>_G" id="o<?= $Grid->RowIndex ?>_G" value="<?= HtmlEncode($Grid->G->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G" class="form-group">
<input type="<?= $Grid->G->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G" name="x<?= $Grid->RowIndex ?>_G" id="x<?= $Grid->RowIndex ?>_G" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->G->getPlaceHolder()) ?>" value="<?= $Grid->G->EditValue ?>"<?= $Grid->G->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G">
<span<?= $Grid->G->viewAttributes() ?>>
<?= $Grid->G->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_G" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_G" value="<?= HtmlEncode($Grid->G->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_G" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_G" value="<?= HtmlEncode($Grid->G->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->P->Visible) { // P ?>
        <td data-name="P" <?= $Grid->P->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_P" class="form-group">
<input type="<?= $Grid->P->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_P" name="x<?= $Grid->RowIndex ?>_P" id="x<?= $Grid->RowIndex ?>_P" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->P->getPlaceHolder()) ?>" value="<?= $Grid->P->EditValue ?>"<?= $Grid->P->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->P->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" data-hidden="1" name="o<?= $Grid->RowIndex ?>_P" id="o<?= $Grid->RowIndex ?>_P" value="<?= HtmlEncode($Grid->P->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_P" class="form-group">
<input type="<?= $Grid->P->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_P" name="x<?= $Grid->RowIndex ?>_P" id="x<?= $Grid->RowIndex ?>_P" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->P->getPlaceHolder()) ?>" value="<?= $Grid->P->EditValue ?>"<?= $Grid->P->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->P->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_P">
<span<?= $Grid->P->viewAttributes() ?>>
<?= $Grid->P->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_P" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_P" value="<?= HtmlEncode($Grid->P->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_P" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_P" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_P" value="<?= HtmlEncode($Grid->P->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->L->Visible) { // L ?>
        <td data-name="L" <?= $Grid->L->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_L" class="form-group">
<input type="<?= $Grid->L->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_L" name="x<?= $Grid->RowIndex ?>_L" id="x<?= $Grid->RowIndex ?>_L" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->L->getPlaceHolder()) ?>" value="<?= $Grid->L->EditValue ?>"<?= $Grid->L->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->L->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" data-hidden="1" name="o<?= $Grid->RowIndex ?>_L" id="o<?= $Grid->RowIndex ?>_L" value="<?= HtmlEncode($Grid->L->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_L" class="form-group">
<input type="<?= $Grid->L->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_L" name="x<?= $Grid->RowIndex ?>_L" id="x<?= $Grid->RowIndex ?>_L" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->L->getPlaceHolder()) ?>" value="<?= $Grid->L->EditValue ?>"<?= $Grid->L->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->L->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_L">
<span<?= $Grid->L->viewAttributes() ?>>
<?= $Grid->L->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_L" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_L" value="<?= HtmlEncode($Grid->L->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_L" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_L" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_L" value="<?= HtmlEncode($Grid->L->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A->Visible) { // A ?>
        <td data-name="A" <?= $Grid->A->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A" class="form-group">
<input type="<?= $Grid->A->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A" name="x<?= $Grid->RowIndex ?>_A" id="x<?= $Grid->RowIndex ?>_A" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->A->getPlaceHolder()) ?>" value="<?= $Grid->A->EditValue ?>"<?= $Grid->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A" id="o<?= $Grid->RowIndex ?>_A" value="<?= HtmlEncode($Grid->A->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A" class="form-group">
<input type="<?= $Grid->A->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A" name="x<?= $Grid->RowIndex ?>_A" id="x<?= $Grid->RowIndex ?>_A" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->A->getPlaceHolder()) ?>" value="<?= $Grid->A->EditValue ?>"<?= $Grid->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A">
<span<?= $Grid->A->viewAttributes() ?>>
<?= $Grid->A->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A" value="<?= HtmlEncode($Grid->A->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A" value="<?= HtmlEncode($Grid->A->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->E->Visible) { // E ?>
        <td data-name="E" <?= $Grid->E->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_E" class="form-group">
<input type="<?= $Grid->E->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_E" name="x<?= $Grid->RowIndex ?>_E" id="x<?= $Grid->RowIndex ?>_E" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->E->getPlaceHolder()) ?>" value="<?= $Grid->E->EditValue ?>"<?= $Grid->E->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->E->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" data-hidden="1" name="o<?= $Grid->RowIndex ?>_E" id="o<?= $Grid->RowIndex ?>_E" value="<?= HtmlEncode($Grid->E->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_E" class="form-group">
<input type="<?= $Grid->E->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_E" name="x<?= $Grid->RowIndex ?>_E" id="x<?= $Grid->RowIndex ?>_E" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->E->getPlaceHolder()) ?>" value="<?= $Grid->E->EditValue ?>"<?= $Grid->E->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->E->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_E">
<span<?= $Grid->E->viewAttributes() ?>>
<?= $Grid->E->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_E" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_E" value="<?= HtmlEncode($Grid->E->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_E" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_E" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_E" value="<?= HtmlEncode($Grid->E->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->M->Visible) { // M ?>
        <td data-name="M" <?= $Grid->M->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_M" class="form-group">
<input type="<?= $Grid->M->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_M" name="x<?= $Grid->RowIndex ?>_M" id="x<?= $Grid->RowIndex ?>_M" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->M->getPlaceHolder()) ?>" value="<?= $Grid->M->EditValue ?>"<?= $Grid->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->M->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" data-hidden="1" name="o<?= $Grid->RowIndex ?>_M" id="o<?= $Grid->RowIndex ?>_M" value="<?= HtmlEncode($Grid->M->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_M" class="form-group">
<input type="<?= $Grid->M->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_M" name="x<?= $Grid->RowIndex ?>_M" id="x<?= $Grid->RowIndex ?>_M" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->M->getPlaceHolder()) ?>" value="<?= $Grid->M->EditValue ?>"<?= $Grid->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->M->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_M">
<span<?= $Grid->M->viewAttributes() ?>>
<?= $Grid->M->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_M" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_M" value="<?= HtmlEncode($Grid->M->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_M" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_M" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_M" value="<?= HtmlEncode($Grid->M->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->LMP->Visible) { // LMP ?>
        <td data-name="LMP" <?= $Grid->LMP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_LMP" class="form-group">
<input type="<?= $Grid->LMP->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_LMP" name="x<?= $Grid->RowIndex ?>_LMP" id="x<?= $Grid->RowIndex ?>_LMP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->LMP->getPlaceHolder()) ?>" value="<?= $Grid->LMP->EditValue ?>"<?= $Grid->LMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->LMP->getErrorMessage() ?></div>
<?php if (!$Grid->LMP->ReadOnly && !$Grid->LMP->Disabled && !isset($Grid->LMP->EditAttrs["readonly"]) && !isset($Grid->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LMP" id="o<?= $Grid->RowIndex ?>_LMP" value="<?= HtmlEncode($Grid->LMP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_LMP" class="form-group">
<input type="<?= $Grid->LMP->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_LMP" name="x<?= $Grid->RowIndex ?>_LMP" id="x<?= $Grid->RowIndex ?>_LMP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->LMP->getPlaceHolder()) ?>" value="<?= $Grid->LMP->EditValue ?>"<?= $Grid->LMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->LMP->getErrorMessage() ?></div>
<?php if (!$Grid->LMP->ReadOnly && !$Grid->LMP->Disabled && !isset($Grid->LMP->EditAttrs["readonly"]) && !isset($Grid->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_LMP">
<span<?= $Grid->LMP->viewAttributes() ?>>
<?= $Grid->LMP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_LMP" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_LMP" value="<?= HtmlEncode($Grid->LMP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_LMP" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_LMP" value="<?= HtmlEncode($Grid->LMP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EDO->Visible) { // EDO ?>
        <td data-name="EDO" <?= $Grid->EDO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EDO" class="form-group">
<input type="<?= $Grid->EDO->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EDO" name="x<?= $Grid->RowIndex ?>_EDO" id="x<?= $Grid->RowIndex ?>_EDO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EDO->getPlaceHolder()) ?>" value="<?= $Grid->EDO->EditValue ?>"<?= $Grid->EDO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EDO->getErrorMessage() ?></div>
<?php if (!$Grid->EDO->ReadOnly && !$Grid->EDO->Disabled && !isset($Grid->EDO->EditAttrs["readonly"]) && !isset($Grid->EDO->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EDO" id="o<?= $Grid->RowIndex ?>_EDO" value="<?= HtmlEncode($Grid->EDO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EDO" class="form-group">
<input type="<?= $Grid->EDO->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EDO" name="x<?= $Grid->RowIndex ?>_EDO" id="x<?= $Grid->RowIndex ?>_EDO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EDO->getPlaceHolder()) ?>" value="<?= $Grid->EDO->EditValue ?>"<?= $Grid->EDO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EDO->getErrorMessage() ?></div>
<?php if (!$Grid->EDO->ReadOnly && !$Grid->EDO->Disabled && !isset($Grid->EDO->EditAttrs["readonly"]) && !isset($Grid->EDO->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EDO">
<span<?= $Grid->EDO->viewAttributes() ?>>
<?= $Grid->EDO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EDO" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EDO" value="<?= HtmlEncode($Grid->EDO->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EDO" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EDO" value="<?= HtmlEncode($Grid->EDO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <td data-name="MenstrualHistory" <?= $Grid->MenstrualHistory->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_MenstrualHistory" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_MenstrualHistory"
        name="x<?= $Grid->RowIndex ?>_MenstrualHistory"
        class="form-control ew-select<?= $Grid->MenstrualHistory->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_MenstrualHistory"
        data-table="patient_an_registration"
        data-field="x_MenstrualHistory"
        data-value-separator="<?= $Grid->MenstrualHistory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->MenstrualHistory->getPlaceHolder()) ?>"
        <?= $Grid->MenstrualHistory->editAttributes() ?>>
        <?= $Grid->MenstrualHistory->selectOptionListHtml("x{$Grid->RowIndex}_MenstrualHistory") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->MenstrualHistory->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_MenstrualHistory']"),
        options = { name: "x<?= $Grid->RowIndex ?>_MenstrualHistory", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_MenstrualHistory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.MenstrualHistory.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.MenstrualHistory.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MenstrualHistory" id="o<?= $Grid->RowIndex ?>_MenstrualHistory" value="<?= HtmlEncode($Grid->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_MenstrualHistory" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_MenstrualHistory"
        name="x<?= $Grid->RowIndex ?>_MenstrualHistory"
        class="form-control ew-select<?= $Grid->MenstrualHistory->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_MenstrualHistory"
        data-table="patient_an_registration"
        data-field="x_MenstrualHistory"
        data-value-separator="<?= $Grid->MenstrualHistory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->MenstrualHistory->getPlaceHolder()) ?>"
        <?= $Grid->MenstrualHistory->editAttributes() ?>>
        <?= $Grid->MenstrualHistory->selectOptionListHtml("x{$Grid->RowIndex}_MenstrualHistory") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->MenstrualHistory->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_MenstrualHistory']"),
        options = { name: "x<?= $Grid->RowIndex ?>_MenstrualHistory", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_MenstrualHistory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.MenstrualHistory.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.MenstrualHistory.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_MenstrualHistory">
<span<?= $Grid->MenstrualHistory->viewAttributes() ?>>
<?= $Grid->MenstrualHistory->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_MenstrualHistory" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_MenstrualHistory" value="<?= HtmlEncode($Grid->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_MenstrualHistory" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_MenstrualHistory" value="<?= HtmlEncode($Grid->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MaritalHistory->Visible) { // MaritalHistory ?>
        <td data-name="MaritalHistory" <?= $Grid->MaritalHistory->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_MaritalHistory" class="form-group">
<input type="<?= $Grid->MaritalHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?= $Grid->RowIndex ?>_MaritalHistory" id="x<?= $Grid->RowIndex ?>_MaritalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MaritalHistory->getPlaceHolder()) ?>" value="<?= $Grid->MaritalHistory->EditValue ?>"<?= $Grid->MaritalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MaritalHistory->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MaritalHistory" id="o<?= $Grid->RowIndex ?>_MaritalHistory" value="<?= HtmlEncode($Grid->MaritalHistory->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_MaritalHistory" class="form-group">
<input type="<?= $Grid->MaritalHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?= $Grid->RowIndex ?>_MaritalHistory" id="x<?= $Grid->RowIndex ?>_MaritalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MaritalHistory->getPlaceHolder()) ?>" value="<?= $Grid->MaritalHistory->EditValue ?>"<?= $Grid->MaritalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MaritalHistory->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_MaritalHistory">
<span<?= $Grid->MaritalHistory->viewAttributes() ?>>
<?= $Grid->MaritalHistory->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_MaritalHistory" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_MaritalHistory" value="<?= HtmlEncode($Grid->MaritalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_MaritalHistory" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_MaritalHistory" value="<?= HtmlEncode($Grid->MaritalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ObstetricHistory->Visible) { // ObstetricHistory ?>
        <td data-name="ObstetricHistory" <?= $Grid->ObstetricHistory->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ObstetricHistory" class="form-group">
<input type="<?= $Grid->ObstetricHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?= $Grid->RowIndex ?>_ObstetricHistory" id="x<?= $Grid->RowIndex ?>_ObstetricHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ObstetricHistory->getPlaceHolder()) ?>" value="<?= $Grid->ObstetricHistory->EditValue ?>"<?= $Grid->ObstetricHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ObstetricHistory->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ObstetricHistory" id="o<?= $Grid->RowIndex ?>_ObstetricHistory" value="<?= HtmlEncode($Grid->ObstetricHistory->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ObstetricHistory" class="form-group">
<input type="<?= $Grid->ObstetricHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?= $Grid->RowIndex ?>_ObstetricHistory" id="x<?= $Grid->RowIndex ?>_ObstetricHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ObstetricHistory->getPlaceHolder()) ?>" value="<?= $Grid->ObstetricHistory->EditValue ?>"<?= $Grid->ObstetricHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ObstetricHistory->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ObstetricHistory">
<span<?= $Grid->ObstetricHistory->viewAttributes() ?>>
<?= $Grid->ObstetricHistory->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ObstetricHistory" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ObstetricHistory" value="<?= HtmlEncode($Grid->ObstetricHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ObstetricHistory" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ObstetricHistory" value="<?= HtmlEncode($Grid->ObstetricHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
        <td data-name="PreviousHistoryofGDM" <?= $Grid->PreviousHistoryofGDM->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofGDM" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM"
        class="form-control ew-select<?= $Grid->PreviousHistoryofGDM->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofGDM"
        data-value-separator="<?= $Grid->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofGDM->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofGDM->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofGDM->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofGDM") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofGDM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofGDM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofGDM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreviousHistoryofGDM" id="o<?= $Grid->RowIndex ?>_PreviousHistoryofGDM" value="<?= HtmlEncode($Grid->PreviousHistoryofGDM->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofGDM" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM"
        class="form-control ew-select<?= $Grid->PreviousHistoryofGDM->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofGDM"
        data-value-separator="<?= $Grid->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofGDM->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofGDM->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofGDM->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofGDM") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofGDM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofGDM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofGDM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofGDM">
<span<?= $Grid->PreviousHistoryofGDM->viewAttributes() ?>>
<?= $Grid->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM" value="<?= HtmlEncode($Grid->PreviousHistoryofGDM->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PreviousHistoryofGDM" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PreviousHistoryofGDM" value="<?= HtmlEncode($Grid->PreviousHistoryofGDM->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
        <td data-name="PreviousHistorofPIH" <?= $Grid->PreviousHistorofPIH->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistorofPIH" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistorofPIH"
        name="x<?= $Grid->RowIndex ?>_PreviousHistorofPIH"
        class="form-control ew-select<?= $Grid->PreviousHistorofPIH->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistorofPIH"
        data-table="patient_an_registration"
        data-field="x_PreviousHistorofPIH"
        data-value-separator="<?= $Grid->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistorofPIH->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistorofPIH->editAttributes() ?>>
        <?= $Grid->PreviousHistorofPIH->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistorofPIH") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistorofPIH->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistorofPIH']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistorofPIH", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistorofPIH", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistorofPIH.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistorofPIH.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreviousHistorofPIH" id="o<?= $Grid->RowIndex ?>_PreviousHistorofPIH" value="<?= HtmlEncode($Grid->PreviousHistorofPIH->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistorofPIH" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistorofPIH"
        name="x<?= $Grid->RowIndex ?>_PreviousHistorofPIH"
        class="form-control ew-select<?= $Grid->PreviousHistorofPIH->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistorofPIH"
        data-table="patient_an_registration"
        data-field="x_PreviousHistorofPIH"
        data-value-separator="<?= $Grid->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistorofPIH->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistorofPIH->editAttributes() ?>>
        <?= $Grid->PreviousHistorofPIH->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistorofPIH") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistorofPIH->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistorofPIH']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistorofPIH", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistorofPIH", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistorofPIH.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistorofPIH.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistorofPIH">
<span<?= $Grid->PreviousHistorofPIH->viewAttributes() ?>>
<?= $Grid->PreviousHistorofPIH->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PreviousHistorofPIH" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PreviousHistorofPIH" value="<?= HtmlEncode($Grid->PreviousHistorofPIH->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PreviousHistorofPIH" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PreviousHistorofPIH" value="<?= HtmlEncode($Grid->PreviousHistorofPIH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
        <td data-name="PreviousHistoryofIUGR" <?= $Grid->PreviousHistoryofIUGR->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofIUGR" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR"
        class="form-control ew-select<?= $Grid->PreviousHistoryofIUGR->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofIUGR"
        data-value-separator="<?= $Grid->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofIUGR->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofIUGR->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofIUGR->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofIUGR") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofIUGR->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofIUGR.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofIUGR.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR" id="o<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?= HtmlEncode($Grid->PreviousHistoryofIUGR->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofIUGR" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR"
        class="form-control ew-select<?= $Grid->PreviousHistoryofIUGR->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofIUGR"
        data-value-separator="<?= $Grid->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofIUGR->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofIUGR->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofIUGR->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofIUGR") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofIUGR->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofIUGR.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofIUGR.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofIUGR">
<span<?= $Grid->PreviousHistoryofIUGR->viewAttributes() ?>>
<?= $Grid->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?= HtmlEncode($Grid->PreviousHistoryofIUGR->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?= HtmlEncode($Grid->PreviousHistoryofIUGR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
        <td data-name="PreviousHistoryofOligohydramnios" <?= $Grid->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios"
        class="form-control ew-select<?= $Grid->PreviousHistoryofOligohydramnios->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofOligohydramnios"
        data-value-separator="<?= $Grid->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofOligohydramnios->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofOligohydramnios->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofOligohydramnios->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofOligohydramnios") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofOligohydramnios->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofOligohydramnios.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofOligohydramnios.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="o<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?= HtmlEncode($Grid->PreviousHistoryofOligohydramnios->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios"
        class="form-control ew-select<?= $Grid->PreviousHistoryofOligohydramnios->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofOligohydramnios"
        data-value-separator="<?= $Grid->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofOligohydramnios->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofOligohydramnios->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofOligohydramnios->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofOligohydramnios") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofOligohydramnios->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofOligohydramnios.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofOligohydramnios.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?= $Grid->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?= $Grid->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?= HtmlEncode($Grid->PreviousHistoryofOligohydramnios->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?= HtmlEncode($Grid->PreviousHistoryofOligohydramnios->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
        <td data-name="PreviousHistoryofPreterm" <?= $Grid->PreviousHistoryofPreterm->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofPreterm" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm"
        class="form-control ew-select<?= $Grid->PreviousHistoryofPreterm->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofPreterm"
        data-value-separator="<?= $Grid->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofPreterm->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofPreterm->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofPreterm->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofPreterm") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofPreterm->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofPreterm.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofPreterm.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm" id="o<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?= HtmlEncode($Grid->PreviousHistoryofPreterm->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofPreterm" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm"
        class="form-control ew-select<?= $Grid->PreviousHistoryofPreterm->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofPreterm"
        data-value-separator="<?= $Grid->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofPreterm->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofPreterm->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofPreterm->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofPreterm") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofPreterm->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofPreterm.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofPreterm.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PreviousHistoryofPreterm">
<span<?= $Grid->PreviousHistoryofPreterm->viewAttributes() ?>>
<?= $Grid->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?= HtmlEncode($Grid->PreviousHistoryofPreterm->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?= HtmlEncode($Grid->PreviousHistoryofPreterm->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->G1->Visible) { // G1 ?>
        <td data-name="G1" <?= $Grid->G1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G1" class="form-group">
<input type="<?= $Grid->G1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G1" name="x<?= $Grid->RowIndex ?>_G1" id="x<?= $Grid->RowIndex ?>_G1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->G1->getPlaceHolder()) ?>" value="<?= $Grid->G1->EditValue ?>"<?= $Grid->G1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_G1" id="o<?= $Grid->RowIndex ?>_G1" value="<?= HtmlEncode($Grid->G1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G1" class="form-group">
<input type="<?= $Grid->G1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G1" name="x<?= $Grid->RowIndex ?>_G1" id="x<?= $Grid->RowIndex ?>_G1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->G1->getPlaceHolder()) ?>" value="<?= $Grid->G1->EditValue ?>"<?= $Grid->G1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G1">
<span<?= $Grid->G1->viewAttributes() ?>>
<?= $Grid->G1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_G1" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_G1" value="<?= HtmlEncode($Grid->G1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_G1" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_G1" value="<?= HtmlEncode($Grid->G1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->G2->Visible) { // G2 ?>
        <td data-name="G2" <?= $Grid->G2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G2" class="form-group">
<input type="<?= $Grid->G2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G2" name="x<?= $Grid->RowIndex ?>_G2" id="x<?= $Grid->RowIndex ?>_G2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->G2->getPlaceHolder()) ?>" value="<?= $Grid->G2->EditValue ?>"<?= $Grid->G2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_G2" id="o<?= $Grid->RowIndex ?>_G2" value="<?= HtmlEncode($Grid->G2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G2" class="form-group">
<input type="<?= $Grid->G2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G2" name="x<?= $Grid->RowIndex ?>_G2" id="x<?= $Grid->RowIndex ?>_G2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->G2->getPlaceHolder()) ?>" value="<?= $Grid->G2->EditValue ?>"<?= $Grid->G2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G2">
<span<?= $Grid->G2->viewAttributes() ?>>
<?= $Grid->G2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_G2" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_G2" value="<?= HtmlEncode($Grid->G2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_G2" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_G2" value="<?= HtmlEncode($Grid->G2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->G3->Visible) { // G3 ?>
        <td data-name="G3" <?= $Grid->G3->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G3" class="form-group">
<input type="<?= $Grid->G3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G3" name="x<?= $Grid->RowIndex ?>_G3" id="x<?= $Grid->RowIndex ?>_G3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->G3->getPlaceHolder()) ?>" value="<?= $Grid->G3->EditValue ?>"<?= $Grid->G3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G3->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_G3" id="o<?= $Grid->RowIndex ?>_G3" value="<?= HtmlEncode($Grid->G3->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G3" class="form-group">
<input type="<?= $Grid->G3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G3" name="x<?= $Grid->RowIndex ?>_G3" id="x<?= $Grid->RowIndex ?>_G3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->G3->getPlaceHolder()) ?>" value="<?= $Grid->G3->EditValue ?>"<?= $Grid->G3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G3->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_G3">
<span<?= $Grid->G3->viewAttributes() ?>>
<?= $Grid->G3->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_G3" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_G3" value="<?= HtmlEncode($Grid->G3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_G3" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_G3" value="<?= HtmlEncode($Grid->G3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
        <td data-name="DeliveryNDLSCS1" <?= $Grid->DeliveryNDLSCS1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS1" class="form-group">
<input type="<?= $Grid->DeliveryNDLSCS1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryNDLSCS1->EditValue ?>"<?= $Grid->DeliveryNDLSCS1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryNDLSCS1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" id="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" value="<?= HtmlEncode($Grid->DeliveryNDLSCS1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS1" class="form-group">
<input type="<?= $Grid->DeliveryNDLSCS1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryNDLSCS1->EditValue ?>"<?= $Grid->DeliveryNDLSCS1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryNDLSCS1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS1">
<span<?= $Grid->DeliveryNDLSCS1->viewAttributes() ?>>
<?= $Grid->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" value="<?= HtmlEncode($Grid->DeliveryNDLSCS1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" value="<?= HtmlEncode($Grid->DeliveryNDLSCS1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
        <td data-name="DeliveryNDLSCS2" <?= $Grid->DeliveryNDLSCS2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS2" class="form-group">
<input type="<?= $Grid->DeliveryNDLSCS2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryNDLSCS2->EditValue ?>"<?= $Grid->DeliveryNDLSCS2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryNDLSCS2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" id="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" value="<?= HtmlEncode($Grid->DeliveryNDLSCS2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS2" class="form-group">
<input type="<?= $Grid->DeliveryNDLSCS2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryNDLSCS2->EditValue ?>"<?= $Grid->DeliveryNDLSCS2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryNDLSCS2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS2">
<span<?= $Grid->DeliveryNDLSCS2->viewAttributes() ?>>
<?= $Grid->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" value="<?= HtmlEncode($Grid->DeliveryNDLSCS2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" value="<?= HtmlEncode($Grid->DeliveryNDLSCS2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
        <td data-name="DeliveryNDLSCS3" <?= $Grid->DeliveryNDLSCS3->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS3" class="form-group">
<input type="<?= $Grid->DeliveryNDLSCS3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryNDLSCS3->EditValue ?>"<?= $Grid->DeliveryNDLSCS3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryNDLSCS3->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" id="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" value="<?= HtmlEncode($Grid->DeliveryNDLSCS3->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS3" class="form-group">
<input type="<?= $Grid->DeliveryNDLSCS3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryNDLSCS3->EditValue ?>"<?= $Grid->DeliveryNDLSCS3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryNDLSCS3->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS3">
<span<?= $Grid->DeliveryNDLSCS3->viewAttributes() ?>>
<?= $Grid->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" value="<?= HtmlEncode($Grid->DeliveryNDLSCS3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" value="<?= HtmlEncode($Grid->DeliveryNDLSCS3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BabySexweight1->Visible) { // BabySexweight1 ?>
        <td data-name="BabySexweight1" <?= $Grid->BabySexweight1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_BabySexweight1" class="form-group">
<input type="<?= $Grid->BabySexweight1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?= $Grid->RowIndex ?>_BabySexweight1" id="x<?= $Grid->RowIndex ?>_BabySexweight1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BabySexweight1->getPlaceHolder()) ?>" value="<?= $Grid->BabySexweight1->EditValue ?>"<?= $Grid->BabySexweight1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BabySexweight1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BabySexweight1" id="o<?= $Grid->RowIndex ?>_BabySexweight1" value="<?= HtmlEncode($Grid->BabySexweight1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_BabySexweight1" class="form-group">
<input type="<?= $Grid->BabySexweight1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?= $Grid->RowIndex ?>_BabySexweight1" id="x<?= $Grid->RowIndex ?>_BabySexweight1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BabySexweight1->getPlaceHolder()) ?>" value="<?= $Grid->BabySexweight1->EditValue ?>"<?= $Grid->BabySexweight1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BabySexweight1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_BabySexweight1">
<span<?= $Grid->BabySexweight1->viewAttributes() ?>>
<?= $Grid->BabySexweight1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_BabySexweight1" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_BabySexweight1" value="<?= HtmlEncode($Grid->BabySexweight1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_BabySexweight1" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_BabySexweight1" value="<?= HtmlEncode($Grid->BabySexweight1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BabySexweight2->Visible) { // BabySexweight2 ?>
        <td data-name="BabySexweight2" <?= $Grid->BabySexweight2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_BabySexweight2" class="form-group">
<input type="<?= $Grid->BabySexweight2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?= $Grid->RowIndex ?>_BabySexweight2" id="x<?= $Grid->RowIndex ?>_BabySexweight2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BabySexweight2->getPlaceHolder()) ?>" value="<?= $Grid->BabySexweight2->EditValue ?>"<?= $Grid->BabySexweight2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BabySexweight2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BabySexweight2" id="o<?= $Grid->RowIndex ?>_BabySexweight2" value="<?= HtmlEncode($Grid->BabySexweight2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_BabySexweight2" class="form-group">
<input type="<?= $Grid->BabySexweight2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?= $Grid->RowIndex ?>_BabySexweight2" id="x<?= $Grid->RowIndex ?>_BabySexweight2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BabySexweight2->getPlaceHolder()) ?>" value="<?= $Grid->BabySexweight2->EditValue ?>"<?= $Grid->BabySexweight2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BabySexweight2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_BabySexweight2">
<span<?= $Grid->BabySexweight2->viewAttributes() ?>>
<?= $Grid->BabySexweight2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_BabySexweight2" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_BabySexweight2" value="<?= HtmlEncode($Grid->BabySexweight2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_BabySexweight2" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_BabySexweight2" value="<?= HtmlEncode($Grid->BabySexweight2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BabySexweight3->Visible) { // BabySexweight3 ?>
        <td data-name="BabySexweight3" <?= $Grid->BabySexweight3->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_BabySexweight3" class="form-group">
<input type="<?= $Grid->BabySexweight3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?= $Grid->RowIndex ?>_BabySexweight3" id="x<?= $Grid->RowIndex ?>_BabySexweight3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BabySexweight3->getPlaceHolder()) ?>" value="<?= $Grid->BabySexweight3->EditValue ?>"<?= $Grid->BabySexweight3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BabySexweight3->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BabySexweight3" id="o<?= $Grid->RowIndex ?>_BabySexweight3" value="<?= HtmlEncode($Grid->BabySexweight3->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_BabySexweight3" class="form-group">
<input type="<?= $Grid->BabySexweight3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?= $Grid->RowIndex ?>_BabySexweight3" id="x<?= $Grid->RowIndex ?>_BabySexweight3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BabySexweight3->getPlaceHolder()) ?>" value="<?= $Grid->BabySexweight3->EditValue ?>"<?= $Grid->BabySexweight3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BabySexweight3->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_BabySexweight3">
<span<?= $Grid->BabySexweight3->viewAttributes() ?>>
<?= $Grid->BabySexweight3->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_BabySexweight3" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_BabySexweight3" value="<?= HtmlEncode($Grid->BabySexweight3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_BabySexweight3" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_BabySexweight3" value="<?= HtmlEncode($Grid->BabySexweight3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
        <td data-name="PastMedicalHistory" <?= $Grid->PastMedicalHistory->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastMedicalHistory" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_PastMedicalHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="x<?= $Grid->RowIndex ?>_PastMedicalHistory" id="x<?= $Grid->RowIndex ?>_PastMedicalHistory"<?= $Grid->PastMedicalHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PastMedicalHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PastMedicalHistory[]"
    name="x<?= $Grid->RowIndex ?>_PastMedicalHistory[]"
    value="<?= HtmlEncode($Grid->PastMedicalHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_PastMedicalHistory"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PastMedicalHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PastMedicalHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_PastMedicalHistory"
    data-value-separator="<?= $Grid->PastMedicalHistory->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PastMedicalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastMedicalHistory->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PastMedicalHistory[]" id="o<?= $Grid->RowIndex ?>_PastMedicalHistory[]" value="<?= HtmlEncode($Grid->PastMedicalHistory->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastMedicalHistory" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_PastMedicalHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="x<?= $Grid->RowIndex ?>_PastMedicalHistory" id="x<?= $Grid->RowIndex ?>_PastMedicalHistory"<?= $Grid->PastMedicalHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PastMedicalHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PastMedicalHistory[]"
    name="x<?= $Grid->RowIndex ?>_PastMedicalHistory[]"
    value="<?= HtmlEncode($Grid->PastMedicalHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_PastMedicalHistory"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PastMedicalHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PastMedicalHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_PastMedicalHistory"
    data-value-separator="<?= $Grid->PastMedicalHistory->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PastMedicalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastMedicalHistory->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastMedicalHistory">
<span<?= $Grid->PastMedicalHistory->viewAttributes() ?>>
<?= $Grid->PastMedicalHistory->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PastMedicalHistory" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PastMedicalHistory" value="<?= HtmlEncode($Grid->PastMedicalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PastMedicalHistory[]" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PastMedicalHistory[]" value="<?= HtmlEncode($Grid->PastMedicalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
        <td data-name="PastSurgicalHistory" <?= $Grid->PastSurgicalHistory->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastSurgicalHistory" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_PastSurgicalHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="x<?= $Grid->RowIndex ?>_PastSurgicalHistory" id="x<?= $Grid->RowIndex ?>_PastSurgicalHistory"<?= $Grid->PastSurgicalHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PastSurgicalHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PastSurgicalHistory[]"
    name="x<?= $Grid->RowIndex ?>_PastSurgicalHistory[]"
    value="<?= HtmlEncode($Grid->PastSurgicalHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_PastSurgicalHistory"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PastSurgicalHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PastSurgicalHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_PastSurgicalHistory"
    data-value-separator="<?= $Grid->PastSurgicalHistory->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PastSurgicalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastSurgicalHistory->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PastSurgicalHistory[]" id="o<?= $Grid->RowIndex ?>_PastSurgicalHistory[]" value="<?= HtmlEncode($Grid->PastSurgicalHistory->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastSurgicalHistory" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_PastSurgicalHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="x<?= $Grid->RowIndex ?>_PastSurgicalHistory" id="x<?= $Grid->RowIndex ?>_PastSurgicalHistory"<?= $Grid->PastSurgicalHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PastSurgicalHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PastSurgicalHistory[]"
    name="x<?= $Grid->RowIndex ?>_PastSurgicalHistory[]"
    value="<?= HtmlEncode($Grid->PastSurgicalHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_PastSurgicalHistory"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PastSurgicalHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PastSurgicalHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_PastSurgicalHistory"
    data-value-separator="<?= $Grid->PastSurgicalHistory->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PastSurgicalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastSurgicalHistory->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastSurgicalHistory">
<span<?= $Grid->PastSurgicalHistory->viewAttributes() ?>>
<?= $Grid->PastSurgicalHistory->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PastSurgicalHistory" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PastSurgicalHistory" value="<?= HtmlEncode($Grid->PastSurgicalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PastSurgicalHistory[]" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PastSurgicalHistory[]" value="<?= HtmlEncode($Grid->PastSurgicalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FamilyHistory->Visible) { // FamilyHistory ?>
        <td data-name="FamilyHistory" <?= $Grid->FamilyHistory->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_FamilyHistory" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_FamilyHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_FamilyHistory" name="x<?= $Grid->RowIndex ?>_FamilyHistory" id="x<?= $Grid->RowIndex ?>_FamilyHistory"<?= $Grid->FamilyHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_FamilyHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_FamilyHistory[]"
    name="x<?= $Grid->RowIndex ?>_FamilyHistory[]"
    value="<?= HtmlEncode($Grid->FamilyHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_FamilyHistory"
    data-target="dsl_x<?= $Grid->RowIndex ?>_FamilyHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->FamilyHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_FamilyHistory"
    data-value-separator="<?= $Grid->FamilyHistory->displayValueSeparatorAttribute() ?>"
    <?= $Grid->FamilyHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FamilyHistory->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FamilyHistory[]" id="o<?= $Grid->RowIndex ?>_FamilyHistory[]" value="<?= HtmlEncode($Grid->FamilyHistory->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_FamilyHistory" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_FamilyHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_FamilyHistory" name="x<?= $Grid->RowIndex ?>_FamilyHistory" id="x<?= $Grid->RowIndex ?>_FamilyHistory"<?= $Grid->FamilyHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_FamilyHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_FamilyHistory[]"
    name="x<?= $Grid->RowIndex ?>_FamilyHistory[]"
    value="<?= HtmlEncode($Grid->FamilyHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_FamilyHistory"
    data-target="dsl_x<?= $Grid->RowIndex ?>_FamilyHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->FamilyHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_FamilyHistory"
    data-value-separator="<?= $Grid->FamilyHistory->displayValueSeparatorAttribute() ?>"
    <?= $Grid->FamilyHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FamilyHistory->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_FamilyHistory">
<span<?= $Grid->FamilyHistory->viewAttributes() ?>>
<?= $Grid->FamilyHistory->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_FamilyHistory" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_FamilyHistory" value="<?= HtmlEncode($Grid->FamilyHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_FamilyHistory[]" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_FamilyHistory[]" value="<?= HtmlEncode($Grid->FamilyHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Viability->Visible) { // Viability ?>
        <td data-name="Viability" <?= $Grid->Viability->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability" class="form-group">
<input type="<?= $Grid->Viability->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability" name="x<?= $Grid->RowIndex ?>_Viability" id="x<?= $Grid->RowIndex ?>_Viability" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability->getPlaceHolder()) ?>" value="<?= $Grid->Viability->EditValue ?>"<?= $Grid->Viability->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Viability" id="o<?= $Grid->RowIndex ?>_Viability" value="<?= HtmlEncode($Grid->Viability->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability" class="form-group">
<input type="<?= $Grid->Viability->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability" name="x<?= $Grid->RowIndex ?>_Viability" id="x<?= $Grid->RowIndex ?>_Viability" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability->getPlaceHolder()) ?>" value="<?= $Grid->Viability->EditValue ?>"<?= $Grid->Viability->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability">
<span<?= $Grid->Viability->viewAttributes() ?>>
<?= $Grid->Viability->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Viability" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Viability" value="<?= HtmlEncode($Grid->Viability->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Viability" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Viability" value="<?= HtmlEncode($Grid->Viability->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ViabilityDATE->Visible) { // ViabilityDATE ?>
        <td data-name="ViabilityDATE" <?= $Grid->ViabilityDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ViabilityDATE" class="form-group">
<input type="<?= $Grid->ViabilityDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?= $Grid->RowIndex ?>_ViabilityDATE" id="x<?= $Grid->RowIndex ?>_ViabilityDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ViabilityDATE->getPlaceHolder()) ?>" value="<?= $Grid->ViabilityDATE->EditValue ?>"<?= $Grid->ViabilityDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ViabilityDATE->getErrorMessage() ?></div>
<?php if (!$Grid->ViabilityDATE->ReadOnly && !$Grid->ViabilityDATE->Disabled && !isset($Grid->ViabilityDATE->EditAttrs["readonly"]) && !isset($Grid->ViabilityDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ViabilityDATE" id="o<?= $Grid->RowIndex ?>_ViabilityDATE" value="<?= HtmlEncode($Grid->ViabilityDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ViabilityDATE" class="form-group">
<input type="<?= $Grid->ViabilityDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?= $Grid->RowIndex ?>_ViabilityDATE" id="x<?= $Grid->RowIndex ?>_ViabilityDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ViabilityDATE->getPlaceHolder()) ?>" value="<?= $Grid->ViabilityDATE->EditValue ?>"<?= $Grid->ViabilityDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ViabilityDATE->getErrorMessage() ?></div>
<?php if (!$Grid->ViabilityDATE->ReadOnly && !$Grid->ViabilityDATE->Disabled && !isset($Grid->ViabilityDATE->EditAttrs["readonly"]) && !isset($Grid->ViabilityDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ViabilityDATE">
<span<?= $Grid->ViabilityDATE->viewAttributes() ?>>
<?= $Grid->ViabilityDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ViabilityDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ViabilityDATE" value="<?= HtmlEncode($Grid->ViabilityDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ViabilityDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ViabilityDATE" value="<?= HtmlEncode($Grid->ViabilityDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
        <td data-name="ViabilityREPORT" <?= $Grid->ViabilityREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ViabilityREPORT" class="form-group">
<input type="<?= $Grid->ViabilityREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?= $Grid->RowIndex ?>_ViabilityREPORT" id="x<?= $Grid->RowIndex ?>_ViabilityREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ViabilityREPORT->getPlaceHolder()) ?>" value="<?= $Grid->ViabilityREPORT->EditValue ?>"<?= $Grid->ViabilityREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ViabilityREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ViabilityREPORT" id="o<?= $Grid->RowIndex ?>_ViabilityREPORT" value="<?= HtmlEncode($Grid->ViabilityREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ViabilityREPORT" class="form-group">
<input type="<?= $Grid->ViabilityREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?= $Grid->RowIndex ?>_ViabilityREPORT" id="x<?= $Grid->RowIndex ?>_ViabilityREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ViabilityREPORT->getPlaceHolder()) ?>" value="<?= $Grid->ViabilityREPORT->EditValue ?>"<?= $Grid->ViabilityREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ViabilityREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ViabilityREPORT">
<span<?= $Grid->ViabilityREPORT->viewAttributes() ?>>
<?= $Grid->ViabilityREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ViabilityREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ViabilityREPORT" value="<?= HtmlEncode($Grid->ViabilityREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ViabilityREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ViabilityREPORT" value="<?= HtmlEncode($Grid->ViabilityREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Viability2->Visible) { // Viability2 ?>
        <td data-name="Viability2" <?= $Grid->Viability2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability2" class="form-group">
<input type="<?= $Grid->Viability2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2" name="x<?= $Grid->RowIndex ?>_Viability2" id="x<?= $Grid->RowIndex ?>_Viability2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability2->getPlaceHolder()) ?>" value="<?= $Grid->Viability2->EditValue ?>"<?= $Grid->Viability2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Viability2" id="o<?= $Grid->RowIndex ?>_Viability2" value="<?= HtmlEncode($Grid->Viability2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability2" class="form-group">
<input type="<?= $Grid->Viability2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2" name="x<?= $Grid->RowIndex ?>_Viability2" id="x<?= $Grid->RowIndex ?>_Viability2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability2->getPlaceHolder()) ?>" value="<?= $Grid->Viability2->EditValue ?>"<?= $Grid->Viability2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability2">
<span<?= $Grid->Viability2->viewAttributes() ?>>
<?= $Grid->Viability2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Viability2" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Viability2" value="<?= HtmlEncode($Grid->Viability2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Viability2" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Viability2" value="<?= HtmlEncode($Grid->Viability2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Viability2DATE->Visible) { // Viability2DATE ?>
        <td data-name="Viability2DATE" <?= $Grid->Viability2DATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability2DATE" class="form-group">
<input type="<?= $Grid->Viability2DATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?= $Grid->RowIndex ?>_Viability2DATE" id="x<?= $Grid->RowIndex ?>_Viability2DATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability2DATE->getPlaceHolder()) ?>" value="<?= $Grid->Viability2DATE->EditValue ?>"<?= $Grid->Viability2DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability2DATE->getErrorMessage() ?></div>
<?php if (!$Grid->Viability2DATE->ReadOnly && !$Grid->Viability2DATE->Disabled && !isset($Grid->Viability2DATE->EditAttrs["readonly"]) && !isset($Grid->Viability2DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Viability2DATE" id="o<?= $Grid->RowIndex ?>_Viability2DATE" value="<?= HtmlEncode($Grid->Viability2DATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability2DATE" class="form-group">
<input type="<?= $Grid->Viability2DATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?= $Grid->RowIndex ?>_Viability2DATE" id="x<?= $Grid->RowIndex ?>_Viability2DATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability2DATE->getPlaceHolder()) ?>" value="<?= $Grid->Viability2DATE->EditValue ?>"<?= $Grid->Viability2DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability2DATE->getErrorMessage() ?></div>
<?php if (!$Grid->Viability2DATE->ReadOnly && !$Grid->Viability2DATE->Disabled && !isset($Grid->Viability2DATE->EditAttrs["readonly"]) && !isset($Grid->Viability2DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability2DATE">
<span<?= $Grid->Viability2DATE->viewAttributes() ?>>
<?= $Grid->Viability2DATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Viability2DATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Viability2DATE" value="<?= HtmlEncode($Grid->Viability2DATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Viability2DATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Viability2DATE" value="<?= HtmlEncode($Grid->Viability2DATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Viability2REPORT->Visible) { // Viability2REPORT ?>
        <td data-name="Viability2REPORT" <?= $Grid->Viability2REPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability2REPORT" class="form-group">
<input type="<?= $Grid->Viability2REPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?= $Grid->RowIndex ?>_Viability2REPORT" id="x<?= $Grid->RowIndex ?>_Viability2REPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability2REPORT->getPlaceHolder()) ?>" value="<?= $Grid->Viability2REPORT->EditValue ?>"<?= $Grid->Viability2REPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability2REPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Viability2REPORT" id="o<?= $Grid->RowIndex ?>_Viability2REPORT" value="<?= HtmlEncode($Grid->Viability2REPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability2REPORT" class="form-group">
<input type="<?= $Grid->Viability2REPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?= $Grid->RowIndex ?>_Viability2REPORT" id="x<?= $Grid->RowIndex ?>_Viability2REPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability2REPORT->getPlaceHolder()) ?>" value="<?= $Grid->Viability2REPORT->EditValue ?>"<?= $Grid->Viability2REPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability2REPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Viability2REPORT">
<span<?= $Grid->Viability2REPORT->viewAttributes() ?>>
<?= $Grid->Viability2REPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Viability2REPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Viability2REPORT" value="<?= HtmlEncode($Grid->Viability2REPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Viability2REPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Viability2REPORT" value="<?= HtmlEncode($Grid->Viability2REPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NTscan->Visible) { // NTscan ?>
        <td data-name="NTscan" <?= $Grid->NTscan->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NTscan" class="form-group">
<input type="<?= $Grid->NTscan->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscan" name="x<?= $Grid->RowIndex ?>_NTscan" id="x<?= $Grid->RowIndex ?>_NTscan" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NTscan->getPlaceHolder()) ?>" value="<?= $Grid->NTscan->EditValue ?>"<?= $Grid->NTscan->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NTscan->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NTscan" id="o<?= $Grid->RowIndex ?>_NTscan" value="<?= HtmlEncode($Grid->NTscan->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NTscan" class="form-group">
<input type="<?= $Grid->NTscan->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscan" name="x<?= $Grid->RowIndex ?>_NTscan" id="x<?= $Grid->RowIndex ?>_NTscan" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NTscan->getPlaceHolder()) ?>" value="<?= $Grid->NTscan->EditValue ?>"<?= $Grid->NTscan->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NTscan->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NTscan">
<span<?= $Grid->NTscan->viewAttributes() ?>>
<?= $Grid->NTscan->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NTscan" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NTscan" value="<?= HtmlEncode($Grid->NTscan->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NTscan" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NTscan" value="<?= HtmlEncode($Grid->NTscan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NTscanDATE->Visible) { // NTscanDATE ?>
        <td data-name="NTscanDATE" <?= $Grid->NTscanDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NTscanDATE" class="form-group">
<input type="<?= $Grid->NTscanDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?= $Grid->RowIndex ?>_NTscanDATE" id="x<?= $Grid->RowIndex ?>_NTscanDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NTscanDATE->getPlaceHolder()) ?>" value="<?= $Grid->NTscanDATE->EditValue ?>"<?= $Grid->NTscanDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NTscanDATE->getErrorMessage() ?></div>
<?php if (!$Grid->NTscanDATE->ReadOnly && !$Grid->NTscanDATE->Disabled && !isset($Grid->NTscanDATE->EditAttrs["readonly"]) && !isset($Grid->NTscanDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NTscanDATE" id="o<?= $Grid->RowIndex ?>_NTscanDATE" value="<?= HtmlEncode($Grid->NTscanDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NTscanDATE" class="form-group">
<input type="<?= $Grid->NTscanDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?= $Grid->RowIndex ?>_NTscanDATE" id="x<?= $Grid->RowIndex ?>_NTscanDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NTscanDATE->getPlaceHolder()) ?>" value="<?= $Grid->NTscanDATE->EditValue ?>"<?= $Grid->NTscanDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NTscanDATE->getErrorMessage() ?></div>
<?php if (!$Grid->NTscanDATE->ReadOnly && !$Grid->NTscanDATE->Disabled && !isset($Grid->NTscanDATE->EditAttrs["readonly"]) && !isset($Grid->NTscanDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NTscanDATE">
<span<?= $Grid->NTscanDATE->viewAttributes() ?>>
<?= $Grid->NTscanDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NTscanDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NTscanDATE" value="<?= HtmlEncode($Grid->NTscanDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NTscanDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NTscanDATE" value="<?= HtmlEncode($Grid->NTscanDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NTscanREPORT->Visible) { // NTscanREPORT ?>
        <td data-name="NTscanREPORT" <?= $Grid->NTscanREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NTscanREPORT" class="form-group">
<input type="<?= $Grid->NTscanREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?= $Grid->RowIndex ?>_NTscanREPORT" id="x<?= $Grid->RowIndex ?>_NTscanREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NTscanREPORT->getPlaceHolder()) ?>" value="<?= $Grid->NTscanREPORT->EditValue ?>"<?= $Grid->NTscanREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NTscanREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NTscanREPORT" id="o<?= $Grid->RowIndex ?>_NTscanREPORT" value="<?= HtmlEncode($Grid->NTscanREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NTscanREPORT" class="form-group">
<input type="<?= $Grid->NTscanREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?= $Grid->RowIndex ?>_NTscanREPORT" id="x<?= $Grid->RowIndex ?>_NTscanREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NTscanREPORT->getPlaceHolder()) ?>" value="<?= $Grid->NTscanREPORT->EditValue ?>"<?= $Grid->NTscanREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NTscanREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NTscanREPORT">
<span<?= $Grid->NTscanREPORT->viewAttributes() ?>>
<?= $Grid->NTscanREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NTscanREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NTscanREPORT" value="<?= HtmlEncode($Grid->NTscanREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NTscanREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NTscanREPORT" value="<?= HtmlEncode($Grid->NTscanREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EarlyTarget->Visible) { // EarlyTarget ?>
        <td data-name="EarlyTarget" <?= $Grid->EarlyTarget->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EarlyTarget" class="form-group">
<input type="<?= $Grid->EarlyTarget->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?= $Grid->RowIndex ?>_EarlyTarget" id="x<?= $Grid->RowIndex ?>_EarlyTarget" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EarlyTarget->getPlaceHolder()) ?>" value="<?= $Grid->EarlyTarget->EditValue ?>"<?= $Grid->EarlyTarget->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EarlyTarget->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EarlyTarget" id="o<?= $Grid->RowIndex ?>_EarlyTarget" value="<?= HtmlEncode($Grid->EarlyTarget->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EarlyTarget" class="form-group">
<input type="<?= $Grid->EarlyTarget->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?= $Grid->RowIndex ?>_EarlyTarget" id="x<?= $Grid->RowIndex ?>_EarlyTarget" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EarlyTarget->getPlaceHolder()) ?>" value="<?= $Grid->EarlyTarget->EditValue ?>"<?= $Grid->EarlyTarget->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EarlyTarget->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EarlyTarget">
<span<?= $Grid->EarlyTarget->viewAttributes() ?>>
<?= $Grid->EarlyTarget->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EarlyTarget" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EarlyTarget" value="<?= HtmlEncode($Grid->EarlyTarget->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EarlyTarget" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EarlyTarget" value="<?= HtmlEncode($Grid->EarlyTarget->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
        <td data-name="EarlyTargetDATE" <?= $Grid->EarlyTargetDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EarlyTargetDATE" class="form-group">
<input type="<?= $Grid->EarlyTargetDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?= $Grid->RowIndex ?>_EarlyTargetDATE" id="x<?= $Grid->RowIndex ?>_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?= $Grid->EarlyTargetDATE->EditValue ?>"<?= $Grid->EarlyTargetDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EarlyTargetDATE->getErrorMessage() ?></div>
<?php if (!$Grid->EarlyTargetDATE->ReadOnly && !$Grid->EarlyTargetDATE->Disabled && !isset($Grid->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($Grid->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EarlyTargetDATE" id="o<?= $Grid->RowIndex ?>_EarlyTargetDATE" value="<?= HtmlEncode($Grid->EarlyTargetDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EarlyTargetDATE" class="form-group">
<input type="<?= $Grid->EarlyTargetDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?= $Grid->RowIndex ?>_EarlyTargetDATE" id="x<?= $Grid->RowIndex ?>_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?= $Grid->EarlyTargetDATE->EditValue ?>"<?= $Grid->EarlyTargetDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EarlyTargetDATE->getErrorMessage() ?></div>
<?php if (!$Grid->EarlyTargetDATE->ReadOnly && !$Grid->EarlyTargetDATE->Disabled && !isset($Grid->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($Grid->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EarlyTargetDATE">
<span<?= $Grid->EarlyTargetDATE->viewAttributes() ?>>
<?= $Grid->EarlyTargetDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EarlyTargetDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EarlyTargetDATE" value="<?= HtmlEncode($Grid->EarlyTargetDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EarlyTargetDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EarlyTargetDATE" value="<?= HtmlEncode($Grid->EarlyTargetDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
        <td data-name="EarlyTargetREPORT" <?= $Grid->EarlyTargetREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EarlyTargetREPORT" class="form-group">
<input type="<?= $Grid->EarlyTargetREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?= $Grid->RowIndex ?>_EarlyTargetREPORT" id="x<?= $Grid->RowIndex ?>_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?= $Grid->EarlyTargetREPORT->EditValue ?>"<?= $Grid->EarlyTargetREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EarlyTargetREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EarlyTargetREPORT" id="o<?= $Grid->RowIndex ?>_EarlyTargetREPORT" value="<?= HtmlEncode($Grid->EarlyTargetREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EarlyTargetREPORT" class="form-group">
<input type="<?= $Grid->EarlyTargetREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?= $Grid->RowIndex ?>_EarlyTargetREPORT" id="x<?= $Grid->RowIndex ?>_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?= $Grid->EarlyTargetREPORT->EditValue ?>"<?= $Grid->EarlyTargetREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EarlyTargetREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EarlyTargetREPORT">
<span<?= $Grid->EarlyTargetREPORT->viewAttributes() ?>>
<?= $Grid->EarlyTargetREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EarlyTargetREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EarlyTargetREPORT" value="<?= HtmlEncode($Grid->EarlyTargetREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EarlyTargetREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EarlyTargetREPORT" value="<?= HtmlEncode($Grid->EarlyTargetREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Anomaly->Visible) { // Anomaly ?>
        <td data-name="Anomaly" <?= $Grid->Anomaly->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Anomaly" class="form-group">
<input type="<?= $Grid->Anomaly->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?= $Grid->RowIndex ?>_Anomaly" id="x<?= $Grid->RowIndex ?>_Anomaly" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Anomaly->getPlaceHolder()) ?>" value="<?= $Grid->Anomaly->EditValue ?>"<?= $Grid->Anomaly->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Anomaly->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Anomaly" id="o<?= $Grid->RowIndex ?>_Anomaly" value="<?= HtmlEncode($Grid->Anomaly->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Anomaly" class="form-group">
<input type="<?= $Grid->Anomaly->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?= $Grid->RowIndex ?>_Anomaly" id="x<?= $Grid->RowIndex ?>_Anomaly" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Anomaly->getPlaceHolder()) ?>" value="<?= $Grid->Anomaly->EditValue ?>"<?= $Grid->Anomaly->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Anomaly->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Anomaly">
<span<?= $Grid->Anomaly->viewAttributes() ?>>
<?= $Grid->Anomaly->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Anomaly" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Anomaly" value="<?= HtmlEncode($Grid->Anomaly->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Anomaly" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Anomaly" value="<?= HtmlEncode($Grid->Anomaly->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AnomalyDATE->Visible) { // AnomalyDATE ?>
        <td data-name="AnomalyDATE" <?= $Grid->AnomalyDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_AnomalyDATE" class="form-group">
<input type="<?= $Grid->AnomalyDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?= $Grid->RowIndex ?>_AnomalyDATE" id="x<?= $Grid->RowIndex ?>_AnomalyDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnomalyDATE->getPlaceHolder()) ?>" value="<?= $Grid->AnomalyDATE->EditValue ?>"<?= $Grid->AnomalyDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnomalyDATE->getErrorMessage() ?></div>
<?php if (!$Grid->AnomalyDATE->ReadOnly && !$Grid->AnomalyDATE->Disabled && !isset($Grid->AnomalyDATE->EditAttrs["readonly"]) && !isset($Grid->AnomalyDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnomalyDATE" id="o<?= $Grid->RowIndex ?>_AnomalyDATE" value="<?= HtmlEncode($Grid->AnomalyDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_AnomalyDATE" class="form-group">
<input type="<?= $Grid->AnomalyDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?= $Grid->RowIndex ?>_AnomalyDATE" id="x<?= $Grid->RowIndex ?>_AnomalyDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnomalyDATE->getPlaceHolder()) ?>" value="<?= $Grid->AnomalyDATE->EditValue ?>"<?= $Grid->AnomalyDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnomalyDATE->getErrorMessage() ?></div>
<?php if (!$Grid->AnomalyDATE->ReadOnly && !$Grid->AnomalyDATE->Disabled && !isset($Grid->AnomalyDATE->EditAttrs["readonly"]) && !isset($Grid->AnomalyDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_AnomalyDATE">
<span<?= $Grid->AnomalyDATE->viewAttributes() ?>>
<?= $Grid->AnomalyDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_AnomalyDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_AnomalyDATE" value="<?= HtmlEncode($Grid->AnomalyDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_AnomalyDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_AnomalyDATE" value="<?= HtmlEncode($Grid->AnomalyDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
        <td data-name="AnomalyREPORT" <?= $Grid->AnomalyREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_AnomalyREPORT" class="form-group">
<input type="<?= $Grid->AnomalyREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?= $Grid->RowIndex ?>_AnomalyREPORT" id="x<?= $Grid->RowIndex ?>_AnomalyREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnomalyREPORT->getPlaceHolder()) ?>" value="<?= $Grid->AnomalyREPORT->EditValue ?>"<?= $Grid->AnomalyREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnomalyREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnomalyREPORT" id="o<?= $Grid->RowIndex ?>_AnomalyREPORT" value="<?= HtmlEncode($Grid->AnomalyREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_AnomalyREPORT" class="form-group">
<input type="<?= $Grid->AnomalyREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?= $Grid->RowIndex ?>_AnomalyREPORT" id="x<?= $Grid->RowIndex ?>_AnomalyREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnomalyREPORT->getPlaceHolder()) ?>" value="<?= $Grid->AnomalyREPORT->EditValue ?>"<?= $Grid->AnomalyREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnomalyREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_AnomalyREPORT">
<span<?= $Grid->AnomalyREPORT->viewAttributes() ?>>
<?= $Grid->AnomalyREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_AnomalyREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_AnomalyREPORT" value="<?= HtmlEncode($Grid->AnomalyREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_AnomalyREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_AnomalyREPORT" value="<?= HtmlEncode($Grid->AnomalyREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Growth->Visible) { // Growth ?>
        <td data-name="Growth" <?= $Grid->Growth->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth" class="form-group">
<input type="<?= $Grid->Growth->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth" name="x<?= $Grid->RowIndex ?>_Growth" id="x<?= $Grid->RowIndex ?>_Growth" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth->getPlaceHolder()) ?>" value="<?= $Grid->Growth->EditValue ?>"<?= $Grid->Growth->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Growth" id="o<?= $Grid->RowIndex ?>_Growth" value="<?= HtmlEncode($Grid->Growth->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth" class="form-group">
<input type="<?= $Grid->Growth->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth" name="x<?= $Grid->RowIndex ?>_Growth" id="x<?= $Grid->RowIndex ?>_Growth" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth->getPlaceHolder()) ?>" value="<?= $Grid->Growth->EditValue ?>"<?= $Grid->Growth->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth">
<span<?= $Grid->Growth->viewAttributes() ?>>
<?= $Grid->Growth->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Growth" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Growth" value="<?= HtmlEncode($Grid->Growth->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Growth" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Growth" value="<?= HtmlEncode($Grid->Growth->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GrowthDATE->Visible) { // GrowthDATE ?>
        <td data-name="GrowthDATE" <?= $Grid->GrowthDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_GrowthDATE" class="form-group">
<input type="<?= $Grid->GrowthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?= $Grid->RowIndex ?>_GrowthDATE" id="x<?= $Grid->RowIndex ?>_GrowthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GrowthDATE->getPlaceHolder()) ?>" value="<?= $Grid->GrowthDATE->EditValue ?>"<?= $Grid->GrowthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrowthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->GrowthDATE->ReadOnly && !$Grid->GrowthDATE->Disabled && !isset($Grid->GrowthDATE->EditAttrs["readonly"]) && !isset($Grid->GrowthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GrowthDATE" id="o<?= $Grid->RowIndex ?>_GrowthDATE" value="<?= HtmlEncode($Grid->GrowthDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_GrowthDATE" class="form-group">
<input type="<?= $Grid->GrowthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?= $Grid->RowIndex ?>_GrowthDATE" id="x<?= $Grid->RowIndex ?>_GrowthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GrowthDATE->getPlaceHolder()) ?>" value="<?= $Grid->GrowthDATE->EditValue ?>"<?= $Grid->GrowthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrowthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->GrowthDATE->ReadOnly && !$Grid->GrowthDATE->Disabled && !isset($Grid->GrowthDATE->EditAttrs["readonly"]) && !isset($Grid->GrowthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_GrowthDATE">
<span<?= $Grid->GrowthDATE->viewAttributes() ?>>
<?= $Grid->GrowthDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_GrowthDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_GrowthDATE" value="<?= HtmlEncode($Grid->GrowthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_GrowthDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_GrowthDATE" value="<?= HtmlEncode($Grid->GrowthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GrowthREPORT->Visible) { // GrowthREPORT ?>
        <td data-name="GrowthREPORT" <?= $Grid->GrowthREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_GrowthREPORT" class="form-group">
<input type="<?= $Grid->GrowthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?= $Grid->RowIndex ?>_GrowthREPORT" id="x<?= $Grid->RowIndex ?>_GrowthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GrowthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->GrowthREPORT->EditValue ?>"<?= $Grid->GrowthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrowthREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GrowthREPORT" id="o<?= $Grid->RowIndex ?>_GrowthREPORT" value="<?= HtmlEncode($Grid->GrowthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_GrowthREPORT" class="form-group">
<input type="<?= $Grid->GrowthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?= $Grid->RowIndex ?>_GrowthREPORT" id="x<?= $Grid->RowIndex ?>_GrowthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GrowthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->GrowthREPORT->EditValue ?>"<?= $Grid->GrowthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrowthREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_GrowthREPORT">
<span<?= $Grid->GrowthREPORT->viewAttributes() ?>>
<?= $Grid->GrowthREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_GrowthREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_GrowthREPORT" value="<?= HtmlEncode($Grid->GrowthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_GrowthREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_GrowthREPORT" value="<?= HtmlEncode($Grid->GrowthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Growth1->Visible) { // Growth1 ?>
        <td data-name="Growth1" <?= $Grid->Growth1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth1" class="form-group">
<input type="<?= $Grid->Growth1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1" name="x<?= $Grid->RowIndex ?>_Growth1" id="x<?= $Grid->RowIndex ?>_Growth1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth1->getPlaceHolder()) ?>" value="<?= $Grid->Growth1->EditValue ?>"<?= $Grid->Growth1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Growth1" id="o<?= $Grid->RowIndex ?>_Growth1" value="<?= HtmlEncode($Grid->Growth1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth1" class="form-group">
<input type="<?= $Grid->Growth1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1" name="x<?= $Grid->RowIndex ?>_Growth1" id="x<?= $Grid->RowIndex ?>_Growth1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth1->getPlaceHolder()) ?>" value="<?= $Grid->Growth1->EditValue ?>"<?= $Grid->Growth1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth1">
<span<?= $Grid->Growth1->viewAttributes() ?>>
<?= $Grid->Growth1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Growth1" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Growth1" value="<?= HtmlEncode($Grid->Growth1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Growth1" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Growth1" value="<?= HtmlEncode($Grid->Growth1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Growth1DATE->Visible) { // Growth1DATE ?>
        <td data-name="Growth1DATE" <?= $Grid->Growth1DATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth1DATE" class="form-group">
<input type="<?= $Grid->Growth1DATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?= $Grid->RowIndex ?>_Growth1DATE" id="x<?= $Grid->RowIndex ?>_Growth1DATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth1DATE->getPlaceHolder()) ?>" value="<?= $Grid->Growth1DATE->EditValue ?>"<?= $Grid->Growth1DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth1DATE->getErrorMessage() ?></div>
<?php if (!$Grid->Growth1DATE->ReadOnly && !$Grid->Growth1DATE->Disabled && !isset($Grid->Growth1DATE->EditAttrs["readonly"]) && !isset($Grid->Growth1DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Growth1DATE" id="o<?= $Grid->RowIndex ?>_Growth1DATE" value="<?= HtmlEncode($Grid->Growth1DATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth1DATE" class="form-group">
<input type="<?= $Grid->Growth1DATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?= $Grid->RowIndex ?>_Growth1DATE" id="x<?= $Grid->RowIndex ?>_Growth1DATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth1DATE->getPlaceHolder()) ?>" value="<?= $Grid->Growth1DATE->EditValue ?>"<?= $Grid->Growth1DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth1DATE->getErrorMessage() ?></div>
<?php if (!$Grid->Growth1DATE->ReadOnly && !$Grid->Growth1DATE->Disabled && !isset($Grid->Growth1DATE->EditAttrs["readonly"]) && !isset($Grid->Growth1DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth1DATE">
<span<?= $Grid->Growth1DATE->viewAttributes() ?>>
<?= $Grid->Growth1DATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Growth1DATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Growth1DATE" value="<?= HtmlEncode($Grid->Growth1DATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Growth1DATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Growth1DATE" value="<?= HtmlEncode($Grid->Growth1DATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Growth1REPORT->Visible) { // Growth1REPORT ?>
        <td data-name="Growth1REPORT" <?= $Grid->Growth1REPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth1REPORT" class="form-group">
<input type="<?= $Grid->Growth1REPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?= $Grid->RowIndex ?>_Growth1REPORT" id="x<?= $Grid->RowIndex ?>_Growth1REPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth1REPORT->getPlaceHolder()) ?>" value="<?= $Grid->Growth1REPORT->EditValue ?>"<?= $Grid->Growth1REPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth1REPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Growth1REPORT" id="o<?= $Grid->RowIndex ?>_Growth1REPORT" value="<?= HtmlEncode($Grid->Growth1REPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth1REPORT" class="form-group">
<input type="<?= $Grid->Growth1REPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?= $Grid->RowIndex ?>_Growth1REPORT" id="x<?= $Grid->RowIndex ?>_Growth1REPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth1REPORT->getPlaceHolder()) ?>" value="<?= $Grid->Growth1REPORT->EditValue ?>"<?= $Grid->Growth1REPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth1REPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Growth1REPORT">
<span<?= $Grid->Growth1REPORT->viewAttributes() ?>>
<?= $Grid->Growth1REPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Growth1REPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Growth1REPORT" value="<?= HtmlEncode($Grid->Growth1REPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Growth1REPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Growth1REPORT" value="<?= HtmlEncode($Grid->Growth1REPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ANProfile->Visible) { // ANProfile ?>
        <td data-name="ANProfile" <?= $Grid->ANProfile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfile" class="form-group">
<input type="<?= $Grid->ANProfile->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?= $Grid->RowIndex ?>_ANProfile" id="x<?= $Grid->RowIndex ?>_ANProfile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfile->getPlaceHolder()) ?>" value="<?= $Grid->ANProfile->EditValue ?>"<?= $Grid->ANProfile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANProfile" id="o<?= $Grid->RowIndex ?>_ANProfile" value="<?= HtmlEncode($Grid->ANProfile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfile" class="form-group">
<input type="<?= $Grid->ANProfile->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?= $Grid->RowIndex ?>_ANProfile" id="x<?= $Grid->RowIndex ?>_ANProfile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfile->getPlaceHolder()) ?>" value="<?= $Grid->ANProfile->EditValue ?>"<?= $Grid->ANProfile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfile">
<span<?= $Grid->ANProfile->viewAttributes() ?>>
<?= $Grid->ANProfile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANProfile" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANProfile" value="<?= HtmlEncode($Grid->ANProfile->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANProfile" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANProfile" value="<?= HtmlEncode($Grid->ANProfile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ANProfileDATE->Visible) { // ANProfileDATE ?>
        <td data-name="ANProfileDATE" <?= $Grid->ANProfileDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfileDATE" class="form-group">
<input type="<?= $Grid->ANProfileDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?= $Grid->RowIndex ?>_ANProfileDATE" id="x<?= $Grid->RowIndex ?>_ANProfileDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfileDATE->getPlaceHolder()) ?>" value="<?= $Grid->ANProfileDATE->EditValue ?>"<?= $Grid->ANProfileDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfileDATE->getErrorMessage() ?></div>
<?php if (!$Grid->ANProfileDATE->ReadOnly && !$Grid->ANProfileDATE->Disabled && !isset($Grid->ANProfileDATE->EditAttrs["readonly"]) && !isset($Grid->ANProfileDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANProfileDATE" id="o<?= $Grid->RowIndex ?>_ANProfileDATE" value="<?= HtmlEncode($Grid->ANProfileDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfileDATE" class="form-group">
<input type="<?= $Grid->ANProfileDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?= $Grid->RowIndex ?>_ANProfileDATE" id="x<?= $Grid->RowIndex ?>_ANProfileDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfileDATE->getPlaceHolder()) ?>" value="<?= $Grid->ANProfileDATE->EditValue ?>"<?= $Grid->ANProfileDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfileDATE->getErrorMessage() ?></div>
<?php if (!$Grid->ANProfileDATE->ReadOnly && !$Grid->ANProfileDATE->Disabled && !isset($Grid->ANProfileDATE->EditAttrs["readonly"]) && !isset($Grid->ANProfileDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfileDATE">
<span<?= $Grid->ANProfileDATE->viewAttributes() ?>>
<?= $Grid->ANProfileDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANProfileDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANProfileDATE" value="<?= HtmlEncode($Grid->ANProfileDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANProfileDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANProfileDATE" value="<?= HtmlEncode($Grid->ANProfileDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
        <td data-name="ANProfileINHOUSE" <?= $Grid->ANProfileINHOUSE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfileINHOUSE" class="form-group">
<input type="<?= $Grid->ANProfileINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?= $Grid->RowIndex ?>_ANProfileINHOUSE" id="x<?= $Grid->RowIndex ?>_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->ANProfileINHOUSE->EditValue ?>"<?= $Grid->ANProfileINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfileINHOUSE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANProfileINHOUSE" id="o<?= $Grid->RowIndex ?>_ANProfileINHOUSE" value="<?= HtmlEncode($Grid->ANProfileINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfileINHOUSE" class="form-group">
<input type="<?= $Grid->ANProfileINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?= $Grid->RowIndex ?>_ANProfileINHOUSE" id="x<?= $Grid->RowIndex ?>_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->ANProfileINHOUSE->EditValue ?>"<?= $Grid->ANProfileINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfileINHOUSE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfileINHOUSE">
<span<?= $Grid->ANProfileINHOUSE->viewAttributes() ?>>
<?= $Grid->ANProfileINHOUSE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANProfileINHOUSE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANProfileINHOUSE" value="<?= HtmlEncode($Grid->ANProfileINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANProfileINHOUSE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANProfileINHOUSE" value="<?= HtmlEncode($Grid->ANProfileINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
        <td data-name="ANProfileREPORT" <?= $Grid->ANProfileREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfileREPORT" class="form-group">
<input type="<?= $Grid->ANProfileREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?= $Grid->RowIndex ?>_ANProfileREPORT" id="x<?= $Grid->RowIndex ?>_ANProfileREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfileREPORT->getPlaceHolder()) ?>" value="<?= $Grid->ANProfileREPORT->EditValue ?>"<?= $Grid->ANProfileREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfileREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANProfileREPORT" id="o<?= $Grid->RowIndex ?>_ANProfileREPORT" value="<?= HtmlEncode($Grid->ANProfileREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfileREPORT" class="form-group">
<input type="<?= $Grid->ANProfileREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?= $Grid->RowIndex ?>_ANProfileREPORT" id="x<?= $Grid->RowIndex ?>_ANProfileREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfileREPORT->getPlaceHolder()) ?>" value="<?= $Grid->ANProfileREPORT->EditValue ?>"<?= $Grid->ANProfileREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfileREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANProfileREPORT">
<span<?= $Grid->ANProfileREPORT->viewAttributes() ?>>
<?= $Grid->ANProfileREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANProfileREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANProfileREPORT" value="<?= HtmlEncode($Grid->ANProfileREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANProfileREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANProfileREPORT" value="<?= HtmlEncode($Grid->ANProfileREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DualMarker->Visible) { // DualMarker ?>
        <td data-name="DualMarker" <?= $Grid->DualMarker->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarker" class="form-group">
<input type="<?= $Grid->DualMarker->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?= $Grid->RowIndex ?>_DualMarker" id="x<?= $Grid->RowIndex ?>_DualMarker" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarker->getPlaceHolder()) ?>" value="<?= $Grid->DualMarker->EditValue ?>"<?= $Grid->DualMarker->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarker->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DualMarker" id="o<?= $Grid->RowIndex ?>_DualMarker" value="<?= HtmlEncode($Grid->DualMarker->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarker" class="form-group">
<input type="<?= $Grid->DualMarker->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?= $Grid->RowIndex ?>_DualMarker" id="x<?= $Grid->RowIndex ?>_DualMarker" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarker->getPlaceHolder()) ?>" value="<?= $Grid->DualMarker->EditValue ?>"<?= $Grid->DualMarker->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarker->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarker">
<span<?= $Grid->DualMarker->viewAttributes() ?>>
<?= $Grid->DualMarker->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DualMarker" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DualMarker" value="<?= HtmlEncode($Grid->DualMarker->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DualMarker" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DualMarker" value="<?= HtmlEncode($Grid->DualMarker->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
        <td data-name="DualMarkerDATE" <?= $Grid->DualMarkerDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarkerDATE" class="form-group">
<input type="<?= $Grid->DualMarkerDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?= $Grid->RowIndex ?>_DualMarkerDATE" id="x<?= $Grid->RowIndex ?>_DualMarkerDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarkerDATE->getPlaceHolder()) ?>" value="<?= $Grid->DualMarkerDATE->EditValue ?>"<?= $Grid->DualMarkerDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarkerDATE->getErrorMessage() ?></div>
<?php if (!$Grid->DualMarkerDATE->ReadOnly && !$Grid->DualMarkerDATE->Disabled && !isset($Grid->DualMarkerDATE->EditAttrs["readonly"]) && !isset($Grid->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DualMarkerDATE" id="o<?= $Grid->RowIndex ?>_DualMarkerDATE" value="<?= HtmlEncode($Grid->DualMarkerDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarkerDATE" class="form-group">
<input type="<?= $Grid->DualMarkerDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?= $Grid->RowIndex ?>_DualMarkerDATE" id="x<?= $Grid->RowIndex ?>_DualMarkerDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarkerDATE->getPlaceHolder()) ?>" value="<?= $Grid->DualMarkerDATE->EditValue ?>"<?= $Grid->DualMarkerDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarkerDATE->getErrorMessage() ?></div>
<?php if (!$Grid->DualMarkerDATE->ReadOnly && !$Grid->DualMarkerDATE->Disabled && !isset($Grid->DualMarkerDATE->EditAttrs["readonly"]) && !isset($Grid->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarkerDATE">
<span<?= $Grid->DualMarkerDATE->viewAttributes() ?>>
<?= $Grid->DualMarkerDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DualMarkerDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DualMarkerDATE" value="<?= HtmlEncode($Grid->DualMarkerDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DualMarkerDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DualMarkerDATE" value="<?= HtmlEncode($Grid->DualMarkerDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
        <td data-name="DualMarkerINHOUSE" <?= $Grid->DualMarkerINHOUSE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarkerINHOUSE" class="form-group">
<input type="<?= $Grid->DualMarkerINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->DualMarkerINHOUSE->EditValue ?>"<?= $Grid->DualMarkerINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarkerINHOUSE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" id="o<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" value="<?= HtmlEncode($Grid->DualMarkerINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarkerINHOUSE" class="form-group">
<input type="<?= $Grid->DualMarkerINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->DualMarkerINHOUSE->EditValue ?>"<?= $Grid->DualMarkerINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarkerINHOUSE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarkerINHOUSE">
<span<?= $Grid->DualMarkerINHOUSE->viewAttributes() ?>>
<?= $Grid->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" value="<?= HtmlEncode($Grid->DualMarkerINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" value="<?= HtmlEncode($Grid->DualMarkerINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
        <td data-name="DualMarkerREPORT" <?= $Grid->DualMarkerREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarkerREPORT" class="form-group">
<input type="<?= $Grid->DualMarkerREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?= $Grid->RowIndex ?>_DualMarkerREPORT" id="x<?= $Grid->RowIndex ?>_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?= $Grid->DualMarkerREPORT->EditValue ?>"<?= $Grid->DualMarkerREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarkerREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DualMarkerREPORT" id="o<?= $Grid->RowIndex ?>_DualMarkerREPORT" value="<?= HtmlEncode($Grid->DualMarkerREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarkerREPORT" class="form-group">
<input type="<?= $Grid->DualMarkerREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?= $Grid->RowIndex ?>_DualMarkerREPORT" id="x<?= $Grid->RowIndex ?>_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?= $Grid->DualMarkerREPORT->EditValue ?>"<?= $Grid->DualMarkerREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarkerREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DualMarkerREPORT">
<span<?= $Grid->DualMarkerREPORT->viewAttributes() ?>>
<?= $Grid->DualMarkerREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DualMarkerREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DualMarkerREPORT" value="<?= HtmlEncode($Grid->DualMarkerREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DualMarkerREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DualMarkerREPORT" value="<?= HtmlEncode($Grid->DualMarkerREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Quadruple->Visible) { // Quadruple ?>
        <td data-name="Quadruple" <?= $Grid->Quadruple->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Quadruple" class="form-group">
<input type="<?= $Grid->Quadruple->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?= $Grid->RowIndex ?>_Quadruple" id="x<?= $Grid->RowIndex ?>_Quadruple" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Quadruple->getPlaceHolder()) ?>" value="<?= $Grid->Quadruple->EditValue ?>"<?= $Grid->Quadruple->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quadruple->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quadruple" id="o<?= $Grid->RowIndex ?>_Quadruple" value="<?= HtmlEncode($Grid->Quadruple->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Quadruple" class="form-group">
<input type="<?= $Grid->Quadruple->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?= $Grid->RowIndex ?>_Quadruple" id="x<?= $Grid->RowIndex ?>_Quadruple" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Quadruple->getPlaceHolder()) ?>" value="<?= $Grid->Quadruple->EditValue ?>"<?= $Grid->Quadruple->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quadruple->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Quadruple">
<span<?= $Grid->Quadruple->viewAttributes() ?>>
<?= $Grid->Quadruple->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Quadruple" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Quadruple" value="<?= HtmlEncode($Grid->Quadruple->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Quadruple" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Quadruple" value="<?= HtmlEncode($Grid->Quadruple->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
        <td data-name="QuadrupleDATE" <?= $Grid->QuadrupleDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_QuadrupleDATE" class="form-group">
<input type="<?= $Grid->QuadrupleDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?= $Grid->RowIndex ?>_QuadrupleDATE" id="x<?= $Grid->RowIndex ?>_QuadrupleDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->QuadrupleDATE->getPlaceHolder()) ?>" value="<?= $Grid->QuadrupleDATE->EditValue ?>"<?= $Grid->QuadrupleDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QuadrupleDATE->getErrorMessage() ?></div>
<?php if (!$Grid->QuadrupleDATE->ReadOnly && !$Grid->QuadrupleDATE->Disabled && !isset($Grid->QuadrupleDATE->EditAttrs["readonly"]) && !isset($Grid->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_QuadrupleDATE" id="o<?= $Grid->RowIndex ?>_QuadrupleDATE" value="<?= HtmlEncode($Grid->QuadrupleDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_QuadrupleDATE" class="form-group">
<input type="<?= $Grid->QuadrupleDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?= $Grid->RowIndex ?>_QuadrupleDATE" id="x<?= $Grid->RowIndex ?>_QuadrupleDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->QuadrupleDATE->getPlaceHolder()) ?>" value="<?= $Grid->QuadrupleDATE->EditValue ?>"<?= $Grid->QuadrupleDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QuadrupleDATE->getErrorMessage() ?></div>
<?php if (!$Grid->QuadrupleDATE->ReadOnly && !$Grid->QuadrupleDATE->Disabled && !isset($Grid->QuadrupleDATE->EditAttrs["readonly"]) && !isset($Grid->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_QuadrupleDATE">
<span<?= $Grid->QuadrupleDATE->viewAttributes() ?>>
<?= $Grid->QuadrupleDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_QuadrupleDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_QuadrupleDATE" value="<?= HtmlEncode($Grid->QuadrupleDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_QuadrupleDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_QuadrupleDATE" value="<?= HtmlEncode($Grid->QuadrupleDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
        <td data-name="QuadrupleINHOUSE" <?= $Grid->QuadrupleINHOUSE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_QuadrupleINHOUSE" class="form-group">
<input type="<?= $Grid->QuadrupleINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->QuadrupleINHOUSE->EditValue ?>"<?= $Grid->QuadrupleINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QuadrupleINHOUSE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" id="o<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" value="<?= HtmlEncode($Grid->QuadrupleINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_QuadrupleINHOUSE" class="form-group">
<input type="<?= $Grid->QuadrupleINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->QuadrupleINHOUSE->EditValue ?>"<?= $Grid->QuadrupleINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QuadrupleINHOUSE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_QuadrupleINHOUSE">
<span<?= $Grid->QuadrupleINHOUSE->viewAttributes() ?>>
<?= $Grid->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" value="<?= HtmlEncode($Grid->QuadrupleINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" value="<?= HtmlEncode($Grid->QuadrupleINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
        <td data-name="QuadrupleREPORT" <?= $Grid->QuadrupleREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_QuadrupleREPORT" class="form-group">
<input type="<?= $Grid->QuadrupleREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?= $Grid->RowIndex ?>_QuadrupleREPORT" id="x<?= $Grid->RowIndex ?>_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?= $Grid->QuadrupleREPORT->EditValue ?>"<?= $Grid->QuadrupleREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QuadrupleREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_QuadrupleREPORT" id="o<?= $Grid->RowIndex ?>_QuadrupleREPORT" value="<?= HtmlEncode($Grid->QuadrupleREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_QuadrupleREPORT" class="form-group">
<input type="<?= $Grid->QuadrupleREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?= $Grid->RowIndex ?>_QuadrupleREPORT" id="x<?= $Grid->RowIndex ?>_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?= $Grid->QuadrupleREPORT->EditValue ?>"<?= $Grid->QuadrupleREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QuadrupleREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_QuadrupleREPORT">
<span<?= $Grid->QuadrupleREPORT->viewAttributes() ?>>
<?= $Grid->QuadrupleREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_QuadrupleREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_QuadrupleREPORT" value="<?= HtmlEncode($Grid->QuadrupleREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_QuadrupleREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_QuadrupleREPORT" value="<?= HtmlEncode($Grid->QuadrupleREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A5month->Visible) { // A5month ?>
        <td data-name="A5month" <?= $Grid->A5month->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5month" class="form-group">
<input type="<?= $Grid->A5month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5month" name="x<?= $Grid->RowIndex ?>_A5month" id="x<?= $Grid->RowIndex ?>_A5month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5month->getPlaceHolder()) ?>" value="<?= $Grid->A5month->EditValue ?>"<?= $Grid->A5month->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5month->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A5month" id="o<?= $Grid->RowIndex ?>_A5month" value="<?= HtmlEncode($Grid->A5month->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5month" class="form-group">
<input type="<?= $Grid->A5month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5month" name="x<?= $Grid->RowIndex ?>_A5month" id="x<?= $Grid->RowIndex ?>_A5month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5month->getPlaceHolder()) ?>" value="<?= $Grid->A5month->EditValue ?>"<?= $Grid->A5month->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5month->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5month">
<span<?= $Grid->A5month->viewAttributes() ?>>
<?= $Grid->A5month->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A5month" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A5month" value="<?= HtmlEncode($Grid->A5month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A5month" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A5month" value="<?= HtmlEncode($Grid->A5month->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A5monthDATE->Visible) { // A5monthDATE ?>
        <td data-name="A5monthDATE" <?= $Grid->A5monthDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5monthDATE" class="form-group">
<input type="<?= $Grid->A5monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?= $Grid->RowIndex ?>_A5monthDATE" id="x<?= $Grid->RowIndex ?>_A5monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5monthDATE->getPlaceHolder()) ?>" value="<?= $Grid->A5monthDATE->EditValue ?>"<?= $Grid->A5monthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5monthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->A5monthDATE->ReadOnly && !$Grid->A5monthDATE->Disabled && !isset($Grid->A5monthDATE->EditAttrs["readonly"]) && !isset($Grid->A5monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A5monthDATE" id="o<?= $Grid->RowIndex ?>_A5monthDATE" value="<?= HtmlEncode($Grid->A5monthDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5monthDATE" class="form-group">
<input type="<?= $Grid->A5monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?= $Grid->RowIndex ?>_A5monthDATE" id="x<?= $Grid->RowIndex ?>_A5monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5monthDATE->getPlaceHolder()) ?>" value="<?= $Grid->A5monthDATE->EditValue ?>"<?= $Grid->A5monthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5monthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->A5monthDATE->ReadOnly && !$Grid->A5monthDATE->Disabled && !isset($Grid->A5monthDATE->EditAttrs["readonly"]) && !isset($Grid->A5monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5monthDATE">
<span<?= $Grid->A5monthDATE->viewAttributes() ?>>
<?= $Grid->A5monthDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A5monthDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A5monthDATE" value="<?= HtmlEncode($Grid->A5monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A5monthDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A5monthDATE" value="<?= HtmlEncode($Grid->A5monthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
        <td data-name="A5monthINHOUSE" <?= $Grid->A5monthINHOUSE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5monthINHOUSE" class="form-group">
<input type="<?= $Grid->A5monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?= $Grid->RowIndex ?>_A5monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->A5monthINHOUSE->EditValue ?>"<?= $Grid->A5monthINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5monthINHOUSE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A5monthINHOUSE" id="o<?= $Grid->RowIndex ?>_A5monthINHOUSE" value="<?= HtmlEncode($Grid->A5monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5monthINHOUSE" class="form-group">
<input type="<?= $Grid->A5monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?= $Grid->RowIndex ?>_A5monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->A5monthINHOUSE->EditValue ?>"<?= $Grid->A5monthINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5monthINHOUSE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5monthINHOUSE">
<span<?= $Grid->A5monthINHOUSE->viewAttributes() ?>>
<?= $Grid->A5monthINHOUSE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A5monthINHOUSE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A5monthINHOUSE" value="<?= HtmlEncode($Grid->A5monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A5monthINHOUSE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A5monthINHOUSE" value="<?= HtmlEncode($Grid->A5monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A5monthREPORT->Visible) { // A5monthREPORT ?>
        <td data-name="A5monthREPORT" <?= $Grid->A5monthREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5monthREPORT" class="form-group">
<input type="<?= $Grid->A5monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?= $Grid->RowIndex ?>_A5monthREPORT" id="x<?= $Grid->RowIndex ?>_A5monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5monthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->A5monthREPORT->EditValue ?>"<?= $Grid->A5monthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5monthREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A5monthREPORT" id="o<?= $Grid->RowIndex ?>_A5monthREPORT" value="<?= HtmlEncode($Grid->A5monthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5monthREPORT" class="form-group">
<input type="<?= $Grid->A5monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?= $Grid->RowIndex ?>_A5monthREPORT" id="x<?= $Grid->RowIndex ?>_A5monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5monthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->A5monthREPORT->EditValue ?>"<?= $Grid->A5monthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5monthREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A5monthREPORT">
<span<?= $Grid->A5monthREPORT->viewAttributes() ?>>
<?= $Grid->A5monthREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A5monthREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A5monthREPORT" value="<?= HtmlEncode($Grid->A5monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A5monthREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A5monthREPORT" value="<?= HtmlEncode($Grid->A5monthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A7month->Visible) { // A7month ?>
        <td data-name="A7month" <?= $Grid->A7month->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7month" class="form-group">
<input type="<?= $Grid->A7month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7month" name="x<?= $Grid->RowIndex ?>_A7month" id="x<?= $Grid->RowIndex ?>_A7month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7month->getPlaceHolder()) ?>" value="<?= $Grid->A7month->EditValue ?>"<?= $Grid->A7month->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7month->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A7month" id="o<?= $Grid->RowIndex ?>_A7month" value="<?= HtmlEncode($Grid->A7month->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7month" class="form-group">
<input type="<?= $Grid->A7month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7month" name="x<?= $Grid->RowIndex ?>_A7month" id="x<?= $Grid->RowIndex ?>_A7month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7month->getPlaceHolder()) ?>" value="<?= $Grid->A7month->EditValue ?>"<?= $Grid->A7month->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7month->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7month">
<span<?= $Grid->A7month->viewAttributes() ?>>
<?= $Grid->A7month->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A7month" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A7month" value="<?= HtmlEncode($Grid->A7month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A7month" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A7month" value="<?= HtmlEncode($Grid->A7month->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A7monthDATE->Visible) { // A7monthDATE ?>
        <td data-name="A7monthDATE" <?= $Grid->A7monthDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7monthDATE" class="form-group">
<input type="<?= $Grid->A7monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?= $Grid->RowIndex ?>_A7monthDATE" id="x<?= $Grid->RowIndex ?>_A7monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7monthDATE->getPlaceHolder()) ?>" value="<?= $Grid->A7monthDATE->EditValue ?>"<?= $Grid->A7monthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7monthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->A7monthDATE->ReadOnly && !$Grid->A7monthDATE->Disabled && !isset($Grid->A7monthDATE->EditAttrs["readonly"]) && !isset($Grid->A7monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A7monthDATE" id="o<?= $Grid->RowIndex ?>_A7monthDATE" value="<?= HtmlEncode($Grid->A7monthDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7monthDATE" class="form-group">
<input type="<?= $Grid->A7monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?= $Grid->RowIndex ?>_A7monthDATE" id="x<?= $Grid->RowIndex ?>_A7monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7monthDATE->getPlaceHolder()) ?>" value="<?= $Grid->A7monthDATE->EditValue ?>"<?= $Grid->A7monthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7monthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->A7monthDATE->ReadOnly && !$Grid->A7monthDATE->Disabled && !isset($Grid->A7monthDATE->EditAttrs["readonly"]) && !isset($Grid->A7monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7monthDATE">
<span<?= $Grid->A7monthDATE->viewAttributes() ?>>
<?= $Grid->A7monthDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A7monthDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A7monthDATE" value="<?= HtmlEncode($Grid->A7monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A7monthDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A7monthDATE" value="<?= HtmlEncode($Grid->A7monthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
        <td data-name="A7monthINHOUSE" <?= $Grid->A7monthINHOUSE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7monthINHOUSE" class="form-group">
<input type="<?= $Grid->A7monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?= $Grid->RowIndex ?>_A7monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->A7monthINHOUSE->EditValue ?>"<?= $Grid->A7monthINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7monthINHOUSE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A7monthINHOUSE" id="o<?= $Grid->RowIndex ?>_A7monthINHOUSE" value="<?= HtmlEncode($Grid->A7monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7monthINHOUSE" class="form-group">
<input type="<?= $Grid->A7monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?= $Grid->RowIndex ?>_A7monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->A7monthINHOUSE->EditValue ?>"<?= $Grid->A7monthINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7monthINHOUSE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7monthINHOUSE">
<span<?= $Grid->A7monthINHOUSE->viewAttributes() ?>>
<?= $Grid->A7monthINHOUSE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A7monthINHOUSE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A7monthINHOUSE" value="<?= HtmlEncode($Grid->A7monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A7monthINHOUSE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A7monthINHOUSE" value="<?= HtmlEncode($Grid->A7monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A7monthREPORT->Visible) { // A7monthREPORT ?>
        <td data-name="A7monthREPORT" <?= $Grid->A7monthREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7monthREPORT" class="form-group">
<input type="<?= $Grid->A7monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?= $Grid->RowIndex ?>_A7monthREPORT" id="x<?= $Grid->RowIndex ?>_A7monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7monthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->A7monthREPORT->EditValue ?>"<?= $Grid->A7monthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7monthREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A7monthREPORT" id="o<?= $Grid->RowIndex ?>_A7monthREPORT" value="<?= HtmlEncode($Grid->A7monthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7monthREPORT" class="form-group">
<input type="<?= $Grid->A7monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?= $Grid->RowIndex ?>_A7monthREPORT" id="x<?= $Grid->RowIndex ?>_A7monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7monthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->A7monthREPORT->EditValue ?>"<?= $Grid->A7monthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7monthREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A7monthREPORT">
<span<?= $Grid->A7monthREPORT->viewAttributes() ?>>
<?= $Grid->A7monthREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A7monthREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A7monthREPORT" value="<?= HtmlEncode($Grid->A7monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A7monthREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A7monthREPORT" value="<?= HtmlEncode($Grid->A7monthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A9month->Visible) { // A9month ?>
        <td data-name="A9month" <?= $Grid->A9month->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9month" class="form-group">
<input type="<?= $Grid->A9month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9month" name="x<?= $Grid->RowIndex ?>_A9month" id="x<?= $Grid->RowIndex ?>_A9month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9month->getPlaceHolder()) ?>" value="<?= $Grid->A9month->EditValue ?>"<?= $Grid->A9month->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9month->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A9month" id="o<?= $Grid->RowIndex ?>_A9month" value="<?= HtmlEncode($Grid->A9month->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9month" class="form-group">
<input type="<?= $Grid->A9month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9month" name="x<?= $Grid->RowIndex ?>_A9month" id="x<?= $Grid->RowIndex ?>_A9month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9month->getPlaceHolder()) ?>" value="<?= $Grid->A9month->EditValue ?>"<?= $Grid->A9month->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9month->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9month">
<span<?= $Grid->A9month->viewAttributes() ?>>
<?= $Grid->A9month->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A9month" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A9month" value="<?= HtmlEncode($Grid->A9month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A9month" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A9month" value="<?= HtmlEncode($Grid->A9month->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A9monthDATE->Visible) { // A9monthDATE ?>
        <td data-name="A9monthDATE" <?= $Grid->A9monthDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9monthDATE" class="form-group">
<input type="<?= $Grid->A9monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?= $Grid->RowIndex ?>_A9monthDATE" id="x<?= $Grid->RowIndex ?>_A9monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9monthDATE->getPlaceHolder()) ?>" value="<?= $Grid->A9monthDATE->EditValue ?>"<?= $Grid->A9monthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9monthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->A9monthDATE->ReadOnly && !$Grid->A9monthDATE->Disabled && !isset($Grid->A9monthDATE->EditAttrs["readonly"]) && !isset($Grid->A9monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A9monthDATE" id="o<?= $Grid->RowIndex ?>_A9monthDATE" value="<?= HtmlEncode($Grid->A9monthDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9monthDATE" class="form-group">
<input type="<?= $Grid->A9monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?= $Grid->RowIndex ?>_A9monthDATE" id="x<?= $Grid->RowIndex ?>_A9monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9monthDATE->getPlaceHolder()) ?>" value="<?= $Grid->A9monthDATE->EditValue ?>"<?= $Grid->A9monthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9monthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->A9monthDATE->ReadOnly && !$Grid->A9monthDATE->Disabled && !isset($Grid->A9monthDATE->EditAttrs["readonly"]) && !isset($Grid->A9monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9monthDATE">
<span<?= $Grid->A9monthDATE->viewAttributes() ?>>
<?= $Grid->A9monthDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A9monthDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A9monthDATE" value="<?= HtmlEncode($Grid->A9monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A9monthDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A9monthDATE" value="<?= HtmlEncode($Grid->A9monthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
        <td data-name="A9monthINHOUSE" <?= $Grid->A9monthINHOUSE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9monthINHOUSE" class="form-group">
<input type="<?= $Grid->A9monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?= $Grid->RowIndex ?>_A9monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->A9monthINHOUSE->EditValue ?>"<?= $Grid->A9monthINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9monthINHOUSE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A9monthINHOUSE" id="o<?= $Grid->RowIndex ?>_A9monthINHOUSE" value="<?= HtmlEncode($Grid->A9monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9monthINHOUSE" class="form-group">
<input type="<?= $Grid->A9monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?= $Grid->RowIndex ?>_A9monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->A9monthINHOUSE->EditValue ?>"<?= $Grid->A9monthINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9monthINHOUSE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9monthINHOUSE">
<span<?= $Grid->A9monthINHOUSE->viewAttributes() ?>>
<?= $Grid->A9monthINHOUSE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A9monthINHOUSE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A9monthINHOUSE" value="<?= HtmlEncode($Grid->A9monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A9monthINHOUSE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A9monthINHOUSE" value="<?= HtmlEncode($Grid->A9monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A9monthREPORT->Visible) { // A9monthREPORT ?>
        <td data-name="A9monthREPORT" <?= $Grid->A9monthREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9monthREPORT" class="form-group">
<input type="<?= $Grid->A9monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?= $Grid->RowIndex ?>_A9monthREPORT" id="x<?= $Grid->RowIndex ?>_A9monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9monthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->A9monthREPORT->EditValue ?>"<?= $Grid->A9monthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9monthREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A9monthREPORT" id="o<?= $Grid->RowIndex ?>_A9monthREPORT" value="<?= HtmlEncode($Grid->A9monthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9monthREPORT" class="form-group">
<input type="<?= $Grid->A9monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?= $Grid->RowIndex ?>_A9monthREPORT" id="x<?= $Grid->RowIndex ?>_A9monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9monthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->A9monthREPORT->EditValue ?>"<?= $Grid->A9monthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9monthREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_A9monthREPORT">
<span<?= $Grid->A9monthREPORT->viewAttributes() ?>>
<?= $Grid->A9monthREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A9monthREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_A9monthREPORT" value="<?= HtmlEncode($Grid->A9monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A9monthREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_A9monthREPORT" value="<?= HtmlEncode($Grid->A9monthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->INJ->Visible) { // INJ ?>
        <td data-name="INJ" <?= $Grid->INJ->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJ" class="form-group">
<input type="<?= $Grid->INJ->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJ" name="x<?= $Grid->RowIndex ?>_INJ" id="x<?= $Grid->RowIndex ?>_INJ" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJ->getPlaceHolder()) ?>" value="<?= $Grid->INJ->EditValue ?>"<?= $Grid->INJ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INJ" id="o<?= $Grid->RowIndex ?>_INJ" value="<?= HtmlEncode($Grid->INJ->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJ" class="form-group">
<input type="<?= $Grid->INJ->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJ" name="x<?= $Grid->RowIndex ?>_INJ" id="x<?= $Grid->RowIndex ?>_INJ" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJ->getPlaceHolder()) ?>" value="<?= $Grid->INJ->EditValue ?>"<?= $Grid->INJ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJ">
<span<?= $Grid->INJ->viewAttributes() ?>>
<?= $Grid->INJ->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_INJ" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_INJ" value="<?= HtmlEncode($Grid->INJ->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_INJ" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_INJ" value="<?= HtmlEncode($Grid->INJ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->INJDATE->Visible) { // INJDATE ?>
        <td data-name="INJDATE" <?= $Grid->INJDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJDATE" class="form-group">
<input type="<?= $Grid->INJDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?= $Grid->RowIndex ?>_INJDATE" id="x<?= $Grid->RowIndex ?>_INJDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJDATE->getPlaceHolder()) ?>" value="<?= $Grid->INJDATE->EditValue ?>"<?= $Grid->INJDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJDATE->getErrorMessage() ?></div>
<?php if (!$Grid->INJDATE->ReadOnly && !$Grid->INJDATE->Disabled && !isset($Grid->INJDATE->EditAttrs["readonly"]) && !isset($Grid->INJDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INJDATE" id="o<?= $Grid->RowIndex ?>_INJDATE" value="<?= HtmlEncode($Grid->INJDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJDATE" class="form-group">
<input type="<?= $Grid->INJDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?= $Grid->RowIndex ?>_INJDATE" id="x<?= $Grid->RowIndex ?>_INJDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJDATE->getPlaceHolder()) ?>" value="<?= $Grid->INJDATE->EditValue ?>"<?= $Grid->INJDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJDATE->getErrorMessage() ?></div>
<?php if (!$Grid->INJDATE->ReadOnly && !$Grid->INJDATE->Disabled && !isset($Grid->INJDATE->EditAttrs["readonly"]) && !isset($Grid->INJDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJDATE">
<span<?= $Grid->INJDATE->viewAttributes() ?>>
<?= $Grid->INJDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_INJDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_INJDATE" value="<?= HtmlEncode($Grid->INJDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_INJDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_INJDATE" value="<?= HtmlEncode($Grid->INJDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->INJINHOUSE->Visible) { // INJINHOUSE ?>
        <td data-name="INJINHOUSE" <?= $Grid->INJINHOUSE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJINHOUSE" class="form-group">
<input type="<?= $Grid->INJINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?= $Grid->RowIndex ?>_INJINHOUSE" id="x<?= $Grid->RowIndex ?>_INJINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->INJINHOUSE->EditValue ?>"<?= $Grid->INJINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJINHOUSE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INJINHOUSE" id="o<?= $Grid->RowIndex ?>_INJINHOUSE" value="<?= HtmlEncode($Grid->INJINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJINHOUSE" class="form-group">
<input type="<?= $Grid->INJINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?= $Grid->RowIndex ?>_INJINHOUSE" id="x<?= $Grid->RowIndex ?>_INJINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->INJINHOUSE->EditValue ?>"<?= $Grid->INJINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJINHOUSE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJINHOUSE">
<span<?= $Grid->INJINHOUSE->viewAttributes() ?>>
<?= $Grid->INJINHOUSE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_INJINHOUSE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_INJINHOUSE" value="<?= HtmlEncode($Grid->INJINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_INJINHOUSE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_INJINHOUSE" value="<?= HtmlEncode($Grid->INJINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->INJREPORT->Visible) { // INJREPORT ?>
        <td data-name="INJREPORT" <?= $Grid->INJREPORT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJREPORT" class="form-group">
<input type="<?= $Grid->INJREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?= $Grid->RowIndex ?>_INJREPORT" id="x<?= $Grid->RowIndex ?>_INJREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJREPORT->getPlaceHolder()) ?>" value="<?= $Grid->INJREPORT->EditValue ?>"<?= $Grid->INJREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJREPORT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INJREPORT" id="o<?= $Grid->RowIndex ?>_INJREPORT" value="<?= HtmlEncode($Grid->INJREPORT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJREPORT" class="form-group">
<input type="<?= $Grid->INJREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?= $Grid->RowIndex ?>_INJREPORT" id="x<?= $Grid->RowIndex ?>_INJREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJREPORT->getPlaceHolder()) ?>" value="<?= $Grid->INJREPORT->EditValue ?>"<?= $Grid->INJREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJREPORT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_INJREPORT">
<span<?= $Grid->INJREPORT->viewAttributes() ?>>
<?= $Grid->INJREPORT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_INJREPORT" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_INJREPORT" value="<?= HtmlEncode($Grid->INJREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_INJREPORT" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_INJREPORT" value="<?= HtmlEncode($Grid->INJREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Bleeding->Visible) { // Bleeding ?>
        <td data-name="Bleeding" <?= $Grid->Bleeding->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Bleeding" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Bleeding">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_Bleeding" name="x<?= $Grid->RowIndex ?>_Bleeding" id="x<?= $Grid->RowIndex ?>_Bleeding"<?= $Grid->Bleeding->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Bleeding" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Bleeding[]"
    name="x<?= $Grid->RowIndex ?>_Bleeding[]"
    value="<?= HtmlEncode($Grid->Bleeding->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Bleeding"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Bleeding"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Bleeding->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_Bleeding"
    data-value-separator="<?= $Grid->Bleeding->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Bleeding->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Bleeding->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Bleeding[]" id="o<?= $Grid->RowIndex ?>_Bleeding[]" value="<?= HtmlEncode($Grid->Bleeding->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Bleeding" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Bleeding">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_Bleeding" name="x<?= $Grid->RowIndex ?>_Bleeding" id="x<?= $Grid->RowIndex ?>_Bleeding"<?= $Grid->Bleeding->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Bleeding" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Bleeding[]"
    name="x<?= $Grid->RowIndex ?>_Bleeding[]"
    value="<?= HtmlEncode($Grid->Bleeding->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Bleeding"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Bleeding"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Bleeding->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_Bleeding"
    data-value-separator="<?= $Grid->Bleeding->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Bleeding->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Bleeding->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Bleeding">
<span<?= $Grid->Bleeding->viewAttributes() ?>>
<?= $Grid->Bleeding->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Bleeding" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Bleeding" value="<?= HtmlEncode($Grid->Bleeding->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Bleeding[]" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Bleeding[]" value="<?= HtmlEncode($Grid->Bleeding->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Hypothyroidism->Visible) { // Hypothyroidism ?>
        <td data-name="Hypothyroidism" <?= $Grid->Hypothyroidism->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Hypothyroidism" class="form-group">
<input type="<?= $Grid->Hypothyroidism->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?= $Grid->RowIndex ?>_Hypothyroidism" id="x<?= $Grid->RowIndex ?>_Hypothyroidism" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Hypothyroidism->getPlaceHolder()) ?>" value="<?= $Grid->Hypothyroidism->EditValue ?>"<?= $Grid->Hypothyroidism->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Hypothyroidism->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Hypothyroidism" id="o<?= $Grid->RowIndex ?>_Hypothyroidism" value="<?= HtmlEncode($Grid->Hypothyroidism->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Hypothyroidism" class="form-group">
<input type="<?= $Grid->Hypothyroidism->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?= $Grid->RowIndex ?>_Hypothyroidism" id="x<?= $Grid->RowIndex ?>_Hypothyroidism" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Hypothyroidism->getPlaceHolder()) ?>" value="<?= $Grid->Hypothyroidism->EditValue ?>"<?= $Grid->Hypothyroidism->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Hypothyroidism->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Hypothyroidism">
<span<?= $Grid->Hypothyroidism->viewAttributes() ?>>
<?= $Grid->Hypothyroidism->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Hypothyroidism" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Hypothyroidism" value="<?= HtmlEncode($Grid->Hypothyroidism->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Hypothyroidism" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Hypothyroidism" value="<?= HtmlEncode($Grid->Hypothyroidism->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PICMENumber->Visible) { // PICMENumber ?>
        <td data-name="PICMENumber" <?= $Grid->PICMENumber->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PICMENumber" class="form-group">
<input type="<?= $Grid->PICMENumber->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?= $Grid->RowIndex ?>_PICMENumber" id="x<?= $Grid->RowIndex ?>_PICMENumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PICMENumber->getPlaceHolder()) ?>" value="<?= $Grid->PICMENumber->EditValue ?>"<?= $Grid->PICMENumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PICMENumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PICMENumber" id="o<?= $Grid->RowIndex ?>_PICMENumber" value="<?= HtmlEncode($Grid->PICMENumber->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PICMENumber" class="form-group">
<input type="<?= $Grid->PICMENumber->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?= $Grid->RowIndex ?>_PICMENumber" id="x<?= $Grid->RowIndex ?>_PICMENumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PICMENumber->getPlaceHolder()) ?>" value="<?= $Grid->PICMENumber->EditValue ?>"<?= $Grid->PICMENumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PICMENumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PICMENumber">
<span<?= $Grid->PICMENumber->viewAttributes() ?>>
<?= $Grid->PICMENumber->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PICMENumber" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PICMENumber" value="<?= HtmlEncode($Grid->PICMENumber->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PICMENumber" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PICMENumber" value="<?= HtmlEncode($Grid->PICMENumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Outcome->Visible) { // Outcome ?>
        <td data-name="Outcome" <?= $Grid->Outcome->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Outcome" class="form-group">
<input type="<?= $Grid->Outcome->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Outcome" name="x<?= $Grid->RowIndex ?>_Outcome" id="x<?= $Grid->RowIndex ?>_Outcome" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Outcome->getPlaceHolder()) ?>" value="<?= $Grid->Outcome->EditValue ?>"<?= $Grid->Outcome->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Outcome->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Outcome" id="o<?= $Grid->RowIndex ?>_Outcome" value="<?= HtmlEncode($Grid->Outcome->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Outcome" class="form-group">
<input type="<?= $Grid->Outcome->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Outcome" name="x<?= $Grid->RowIndex ?>_Outcome" id="x<?= $Grid->RowIndex ?>_Outcome" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Outcome->getPlaceHolder()) ?>" value="<?= $Grid->Outcome->EditValue ?>"<?= $Grid->Outcome->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Outcome->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Outcome">
<span<?= $Grid->Outcome->viewAttributes() ?>>
<?= $Grid->Outcome->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Outcome" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Outcome" value="<?= HtmlEncode($Grid->Outcome->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Outcome" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Outcome" value="<?= HtmlEncode($Grid->Outcome->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DateofAdmission->Visible) { // DateofAdmission ?>
        <td data-name="DateofAdmission" <?= $Grid->DateofAdmission->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DateofAdmission" class="form-group">
<input type="<?= $Grid->DateofAdmission->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?= $Grid->RowIndex ?>_DateofAdmission" id="x<?= $Grid->RowIndex ?>_DateofAdmission" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DateofAdmission->getPlaceHolder()) ?>" value="<?= $Grid->DateofAdmission->EditValue ?>"<?= $Grid->DateofAdmission->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DateofAdmission->getErrorMessage() ?></div>
<?php if (!$Grid->DateofAdmission->ReadOnly && !$Grid->DateofAdmission->Disabled && !isset($Grid->DateofAdmission->EditAttrs["readonly"]) && !isset($Grid->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DateofAdmission" id="o<?= $Grid->RowIndex ?>_DateofAdmission" value="<?= HtmlEncode($Grid->DateofAdmission->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DateofAdmission" class="form-group">
<input type="<?= $Grid->DateofAdmission->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?= $Grid->RowIndex ?>_DateofAdmission" id="x<?= $Grid->RowIndex ?>_DateofAdmission" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DateofAdmission->getPlaceHolder()) ?>" value="<?= $Grid->DateofAdmission->EditValue ?>"<?= $Grid->DateofAdmission->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DateofAdmission->getErrorMessage() ?></div>
<?php if (!$Grid->DateofAdmission->ReadOnly && !$Grid->DateofAdmission->Disabled && !isset($Grid->DateofAdmission->EditAttrs["readonly"]) && !isset($Grid->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DateofAdmission">
<span<?= $Grid->DateofAdmission->viewAttributes() ?>>
<?= $Grid->DateofAdmission->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DateofAdmission" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DateofAdmission" value="<?= HtmlEncode($Grid->DateofAdmission->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DateofAdmission" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DateofAdmission" value="<?= HtmlEncode($Grid->DateofAdmission->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DateodProcedure->Visible) { // DateodProcedure ?>
        <td data-name="DateodProcedure" <?= $Grid->DateodProcedure->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DateodProcedure" class="form-group">
<input type="<?= $Grid->DateodProcedure->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?= $Grid->RowIndex ?>_DateodProcedure" id="x<?= $Grid->RowIndex ?>_DateodProcedure" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DateodProcedure->getPlaceHolder()) ?>" value="<?= $Grid->DateodProcedure->EditValue ?>"<?= $Grid->DateodProcedure->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DateodProcedure->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DateodProcedure" id="o<?= $Grid->RowIndex ?>_DateodProcedure" value="<?= HtmlEncode($Grid->DateodProcedure->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DateodProcedure" class="form-group">
<input type="<?= $Grid->DateodProcedure->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?= $Grid->RowIndex ?>_DateodProcedure" id="x<?= $Grid->RowIndex ?>_DateodProcedure" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DateodProcedure->getPlaceHolder()) ?>" value="<?= $Grid->DateodProcedure->EditValue ?>"<?= $Grid->DateodProcedure->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DateodProcedure->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_DateodProcedure">
<span<?= $Grid->DateodProcedure->viewAttributes() ?>>
<?= $Grid->DateodProcedure->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DateodProcedure" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_DateodProcedure" value="<?= HtmlEncode($Grid->DateodProcedure->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DateodProcedure" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_DateodProcedure" value="<?= HtmlEncode($Grid->DateodProcedure->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Miscarriage->Visible) { // Miscarriage ?>
        <td data-name="Miscarriage" <?= $Grid->Miscarriage->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Miscarriage" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Miscarriage"
        name="x<?= $Grid->RowIndex ?>_Miscarriage"
        class="form-control ew-select<?= $Grid->Miscarriage->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_Miscarriage"
        data-table="patient_an_registration"
        data-field="x_Miscarriage"
        data-value-separator="<?= $Grid->Miscarriage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Miscarriage->getPlaceHolder()) ?>"
        <?= $Grid->Miscarriage->editAttributes() ?>>
        <?= $Grid->Miscarriage->selectOptionListHtml("x{$Grid->RowIndex}_Miscarriage") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Miscarriage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_Miscarriage']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Miscarriage", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_Miscarriage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.Miscarriage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.Miscarriage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Miscarriage" id="o<?= $Grid->RowIndex ?>_Miscarriage" value="<?= HtmlEncode($Grid->Miscarriage->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Miscarriage" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Miscarriage"
        name="x<?= $Grid->RowIndex ?>_Miscarriage"
        class="form-control ew-select<?= $Grid->Miscarriage->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_Miscarriage"
        data-table="patient_an_registration"
        data-field="x_Miscarriage"
        data-value-separator="<?= $Grid->Miscarriage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Miscarriage->getPlaceHolder()) ?>"
        <?= $Grid->Miscarriage->editAttributes() ?>>
        <?= $Grid->Miscarriage->selectOptionListHtml("x{$Grid->RowIndex}_Miscarriage") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Miscarriage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_Miscarriage']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Miscarriage", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_Miscarriage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.Miscarriage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.Miscarriage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Miscarriage">
<span<?= $Grid->Miscarriage->viewAttributes() ?>>
<?= $Grid->Miscarriage->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Miscarriage" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Miscarriage" value="<?= HtmlEncode($Grid->Miscarriage->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Miscarriage" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Miscarriage" value="<?= HtmlEncode($Grid->Miscarriage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
        <td data-name="ModeOfDelivery" <?= $Grid->ModeOfDelivery->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ModeOfDelivery" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ModeOfDelivery"
        name="x<?= $Grid->RowIndex ?>_ModeOfDelivery"
        class="form-control ew-select<?= $Grid->ModeOfDelivery->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ModeOfDelivery"
        data-table="patient_an_registration"
        data-field="x_ModeOfDelivery"
        data-value-separator="<?= $Grid->ModeOfDelivery->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ModeOfDelivery->getPlaceHolder()) ?>"
        <?= $Grid->ModeOfDelivery->editAttributes() ?>>
        <?= $Grid->ModeOfDelivery->selectOptionListHtml("x{$Grid->RowIndex}_ModeOfDelivery") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ModeOfDelivery->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ModeOfDelivery']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ModeOfDelivery", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ModeOfDelivery", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ModeOfDelivery.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ModeOfDelivery.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModeOfDelivery" id="o<?= $Grid->RowIndex ?>_ModeOfDelivery" value="<?= HtmlEncode($Grid->ModeOfDelivery->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ModeOfDelivery" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ModeOfDelivery"
        name="x<?= $Grid->RowIndex ?>_ModeOfDelivery"
        class="form-control ew-select<?= $Grid->ModeOfDelivery->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ModeOfDelivery"
        data-table="patient_an_registration"
        data-field="x_ModeOfDelivery"
        data-value-separator="<?= $Grid->ModeOfDelivery->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ModeOfDelivery->getPlaceHolder()) ?>"
        <?= $Grid->ModeOfDelivery->editAttributes() ?>>
        <?= $Grid->ModeOfDelivery->selectOptionListHtml("x{$Grid->RowIndex}_ModeOfDelivery") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ModeOfDelivery->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ModeOfDelivery']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ModeOfDelivery", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ModeOfDelivery", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ModeOfDelivery.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ModeOfDelivery.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ModeOfDelivery">
<span<?= $Grid->ModeOfDelivery->viewAttributes() ?>>
<?= $Grid->ModeOfDelivery->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ModeOfDelivery" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ModeOfDelivery" value="<?= HtmlEncode($Grid->ModeOfDelivery->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ModeOfDelivery" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ModeOfDelivery" value="<?= HtmlEncode($Grid->ModeOfDelivery->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ND->Visible) { // ND ?>
        <td data-name="ND" <?= $Grid->ND->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ND" class="form-group">
<input type="<?= $Grid->ND->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ND" name="x<?= $Grid->RowIndex ?>_ND" id="x<?= $Grid->RowIndex ?>_ND" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ND->getPlaceHolder()) ?>" value="<?= $Grid->ND->EditValue ?>"<?= $Grid->ND->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ND->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ND" id="o<?= $Grid->RowIndex ?>_ND" value="<?= HtmlEncode($Grid->ND->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ND" class="form-group">
<input type="<?= $Grid->ND->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ND" name="x<?= $Grid->RowIndex ?>_ND" id="x<?= $Grid->RowIndex ?>_ND" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ND->getPlaceHolder()) ?>" value="<?= $Grid->ND->EditValue ?>"<?= $Grid->ND->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ND->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ND">
<span<?= $Grid->ND->viewAttributes() ?>>
<?= $Grid->ND->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ND" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ND" value="<?= HtmlEncode($Grid->ND->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ND" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ND" value="<?= HtmlEncode($Grid->ND->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NDS->Visible) { // NDS ?>
        <td data-name="NDS" <?= $Grid->NDS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NDS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_NDS"
        name="x<?= $Grid->RowIndex ?>_NDS"
        class="form-control ew-select<?= $Grid->NDS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_NDS"
        data-table="patient_an_registration"
        data-field="x_NDS"
        data-value-separator="<?= $Grid->NDS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->NDS->getPlaceHolder()) ?>"
        <?= $Grid->NDS->editAttributes() ?>>
        <?= $Grid->NDS->selectOptionListHtml("x{$Grid->RowIndex}_NDS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->NDS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_NDS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_NDS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_NDS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.NDS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.NDS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NDS" id="o<?= $Grid->RowIndex ?>_NDS" value="<?= HtmlEncode($Grid->NDS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NDS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_NDS"
        name="x<?= $Grid->RowIndex ?>_NDS"
        class="form-control ew-select<?= $Grid->NDS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_NDS"
        data-table="patient_an_registration"
        data-field="x_NDS"
        data-value-separator="<?= $Grid->NDS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->NDS->getPlaceHolder()) ?>"
        <?= $Grid->NDS->editAttributes() ?>>
        <?= $Grid->NDS->selectOptionListHtml("x{$Grid->RowIndex}_NDS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->NDS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_NDS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_NDS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_NDS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.NDS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.NDS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NDS">
<span<?= $Grid->NDS->viewAttributes() ?>>
<?= $Grid->NDS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NDS" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NDS" value="<?= HtmlEncode($Grid->NDS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NDS" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NDS" value="<?= HtmlEncode($Grid->NDS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NDP->Visible) { // NDP ?>
        <td data-name="NDP" <?= $Grid->NDP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NDP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_NDP"
        name="x<?= $Grid->RowIndex ?>_NDP"
        class="form-control ew-select<?= $Grid->NDP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_NDP"
        data-table="patient_an_registration"
        data-field="x_NDP"
        data-value-separator="<?= $Grid->NDP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->NDP->getPlaceHolder()) ?>"
        <?= $Grid->NDP->editAttributes() ?>>
        <?= $Grid->NDP->selectOptionListHtml("x{$Grid->RowIndex}_NDP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->NDP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_NDP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_NDP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_NDP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.NDP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.NDP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NDP" id="o<?= $Grid->RowIndex ?>_NDP" value="<?= HtmlEncode($Grid->NDP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NDP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_NDP"
        name="x<?= $Grid->RowIndex ?>_NDP"
        class="form-control ew-select<?= $Grid->NDP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_NDP"
        data-table="patient_an_registration"
        data-field="x_NDP"
        data-value-separator="<?= $Grid->NDP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->NDP->getPlaceHolder()) ?>"
        <?= $Grid->NDP->editAttributes() ?>>
        <?= $Grid->NDP->selectOptionListHtml("x{$Grid->RowIndex}_NDP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->NDP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_NDP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_NDP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_NDP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.NDP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.NDP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NDP">
<span<?= $Grid->NDP->viewAttributes() ?>>
<?= $Grid->NDP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NDP" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NDP" value="<?= HtmlEncode($Grid->NDP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NDP" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NDP" value="<?= HtmlEncode($Grid->NDP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Vaccum->Visible) { // Vaccum ?>
        <td data-name="Vaccum" <?= $Grid->Vaccum->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Vaccum" class="form-group">
<input type="<?= $Grid->Vaccum->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?= $Grid->RowIndex ?>_Vaccum" id="x<?= $Grid->RowIndex ?>_Vaccum" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Vaccum->getPlaceHolder()) ?>" value="<?= $Grid->Vaccum->EditValue ?>"<?= $Grid->Vaccum->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Vaccum->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Vaccum" id="o<?= $Grid->RowIndex ?>_Vaccum" value="<?= HtmlEncode($Grid->Vaccum->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Vaccum" class="form-group">
<input type="<?= $Grid->Vaccum->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?= $Grid->RowIndex ?>_Vaccum" id="x<?= $Grid->RowIndex ?>_Vaccum" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Vaccum->getPlaceHolder()) ?>" value="<?= $Grid->Vaccum->EditValue ?>"<?= $Grid->Vaccum->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Vaccum->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Vaccum">
<span<?= $Grid->Vaccum->viewAttributes() ?>>
<?= $Grid->Vaccum->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Vaccum" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Vaccum" value="<?= HtmlEncode($Grid->Vaccum->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Vaccum" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Vaccum" value="<?= HtmlEncode($Grid->Vaccum->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->VaccumS->Visible) { // VaccumS ?>
        <td data-name="VaccumS" <?= $Grid->VaccumS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_VaccumS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_VaccumS"
        name="x<?= $Grid->RowIndex ?>_VaccumS"
        class="form-control ew-select<?= $Grid->VaccumS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumS"
        data-table="patient_an_registration"
        data-field="x_VaccumS"
        data-value-separator="<?= $Grid->VaccumS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->VaccumS->getPlaceHolder()) ?>"
        <?= $Grid->VaccumS->editAttributes() ?>>
        <?= $Grid->VaccumS->selectOptionListHtml("x{$Grid->RowIndex}_VaccumS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->VaccumS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_VaccumS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.VaccumS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.VaccumS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_VaccumS" id="o<?= $Grid->RowIndex ?>_VaccumS" value="<?= HtmlEncode($Grid->VaccumS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_VaccumS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_VaccumS"
        name="x<?= $Grid->RowIndex ?>_VaccumS"
        class="form-control ew-select<?= $Grid->VaccumS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumS"
        data-table="patient_an_registration"
        data-field="x_VaccumS"
        data-value-separator="<?= $Grid->VaccumS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->VaccumS->getPlaceHolder()) ?>"
        <?= $Grid->VaccumS->editAttributes() ?>>
        <?= $Grid->VaccumS->selectOptionListHtml("x{$Grid->RowIndex}_VaccumS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->VaccumS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_VaccumS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.VaccumS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.VaccumS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_VaccumS">
<span<?= $Grid->VaccumS->viewAttributes() ?>>
<?= $Grid->VaccumS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_VaccumS" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_VaccumS" value="<?= HtmlEncode($Grid->VaccumS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_VaccumS" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_VaccumS" value="<?= HtmlEncode($Grid->VaccumS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->VaccumP->Visible) { // VaccumP ?>
        <td data-name="VaccumP" <?= $Grid->VaccumP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_VaccumP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_VaccumP"
        name="x<?= $Grid->RowIndex ?>_VaccumP"
        class="form-control ew-select<?= $Grid->VaccumP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumP"
        data-table="patient_an_registration"
        data-field="x_VaccumP"
        data-value-separator="<?= $Grid->VaccumP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->VaccumP->getPlaceHolder()) ?>"
        <?= $Grid->VaccumP->editAttributes() ?>>
        <?= $Grid->VaccumP->selectOptionListHtml("x{$Grid->RowIndex}_VaccumP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->VaccumP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_VaccumP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.VaccumP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.VaccumP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_VaccumP" id="o<?= $Grid->RowIndex ?>_VaccumP" value="<?= HtmlEncode($Grid->VaccumP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_VaccumP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_VaccumP"
        name="x<?= $Grid->RowIndex ?>_VaccumP"
        class="form-control ew-select<?= $Grid->VaccumP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumP"
        data-table="patient_an_registration"
        data-field="x_VaccumP"
        data-value-separator="<?= $Grid->VaccumP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->VaccumP->getPlaceHolder()) ?>"
        <?= $Grid->VaccumP->editAttributes() ?>>
        <?= $Grid->VaccumP->selectOptionListHtml("x{$Grid->RowIndex}_VaccumP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->VaccumP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_VaccumP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.VaccumP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.VaccumP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_VaccumP">
<span<?= $Grid->VaccumP->viewAttributes() ?>>
<?= $Grid->VaccumP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_VaccumP" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_VaccumP" value="<?= HtmlEncode($Grid->VaccumP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_VaccumP" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_VaccumP" value="<?= HtmlEncode($Grid->VaccumP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Forceps->Visible) { // Forceps ?>
        <td data-name="Forceps" <?= $Grid->Forceps->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Forceps" class="form-group">
<input type="<?= $Grid->Forceps->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Forceps" name="x<?= $Grid->RowIndex ?>_Forceps" id="x<?= $Grid->RowIndex ?>_Forceps" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Forceps->getPlaceHolder()) ?>" value="<?= $Grid->Forceps->EditValue ?>"<?= $Grid->Forceps->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Forceps->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Forceps" id="o<?= $Grid->RowIndex ?>_Forceps" value="<?= HtmlEncode($Grid->Forceps->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Forceps" class="form-group">
<input type="<?= $Grid->Forceps->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Forceps" name="x<?= $Grid->RowIndex ?>_Forceps" id="x<?= $Grid->RowIndex ?>_Forceps" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Forceps->getPlaceHolder()) ?>" value="<?= $Grid->Forceps->EditValue ?>"<?= $Grid->Forceps->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Forceps->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Forceps">
<span<?= $Grid->Forceps->viewAttributes() ?>>
<?= $Grid->Forceps->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Forceps" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Forceps" value="<?= HtmlEncode($Grid->Forceps->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Forceps" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Forceps" value="<?= HtmlEncode($Grid->Forceps->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ForcepsS->Visible) { // ForcepsS ?>
        <td data-name="ForcepsS" <?= $Grid->ForcepsS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ForcepsS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ForcepsS"
        name="x<?= $Grid->RowIndex ?>_ForcepsS"
        class="form-control ew-select<?= $Grid->ForcepsS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsS"
        data-table="patient_an_registration"
        data-field="x_ForcepsS"
        data-value-separator="<?= $Grid->ForcepsS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ForcepsS->getPlaceHolder()) ?>"
        <?= $Grid->ForcepsS->editAttributes() ?>>
        <?= $Grid->ForcepsS->selectOptionListHtml("x{$Grid->RowIndex}_ForcepsS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ForcepsS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ForcepsS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ForcepsS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ForcepsS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ForcepsS" id="o<?= $Grid->RowIndex ?>_ForcepsS" value="<?= HtmlEncode($Grid->ForcepsS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ForcepsS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ForcepsS"
        name="x<?= $Grid->RowIndex ?>_ForcepsS"
        class="form-control ew-select<?= $Grid->ForcepsS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsS"
        data-table="patient_an_registration"
        data-field="x_ForcepsS"
        data-value-separator="<?= $Grid->ForcepsS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ForcepsS->getPlaceHolder()) ?>"
        <?= $Grid->ForcepsS->editAttributes() ?>>
        <?= $Grid->ForcepsS->selectOptionListHtml("x{$Grid->RowIndex}_ForcepsS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ForcepsS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ForcepsS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ForcepsS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ForcepsS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ForcepsS">
<span<?= $Grid->ForcepsS->viewAttributes() ?>>
<?= $Grid->ForcepsS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ForcepsS" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ForcepsS" value="<?= HtmlEncode($Grid->ForcepsS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ForcepsS" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ForcepsS" value="<?= HtmlEncode($Grid->ForcepsS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ForcepsP->Visible) { // ForcepsP ?>
        <td data-name="ForcepsP" <?= $Grid->ForcepsP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ForcepsP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ForcepsP"
        name="x<?= $Grid->RowIndex ?>_ForcepsP"
        class="form-control ew-select<?= $Grid->ForcepsP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsP"
        data-table="patient_an_registration"
        data-field="x_ForcepsP"
        data-value-separator="<?= $Grid->ForcepsP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ForcepsP->getPlaceHolder()) ?>"
        <?= $Grid->ForcepsP->editAttributes() ?>>
        <?= $Grid->ForcepsP->selectOptionListHtml("x{$Grid->RowIndex}_ForcepsP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ForcepsP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ForcepsP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ForcepsP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ForcepsP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ForcepsP" id="o<?= $Grid->RowIndex ?>_ForcepsP" value="<?= HtmlEncode($Grid->ForcepsP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ForcepsP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ForcepsP"
        name="x<?= $Grid->RowIndex ?>_ForcepsP"
        class="form-control ew-select<?= $Grid->ForcepsP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsP"
        data-table="patient_an_registration"
        data-field="x_ForcepsP"
        data-value-separator="<?= $Grid->ForcepsP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ForcepsP->getPlaceHolder()) ?>"
        <?= $Grid->ForcepsP->editAttributes() ?>>
        <?= $Grid->ForcepsP->selectOptionListHtml("x{$Grid->RowIndex}_ForcepsP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ForcepsP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ForcepsP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ForcepsP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ForcepsP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ForcepsP">
<span<?= $Grid->ForcepsP->viewAttributes() ?>>
<?= $Grid->ForcepsP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ForcepsP" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ForcepsP" value="<?= HtmlEncode($Grid->ForcepsP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ForcepsP" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ForcepsP" value="<?= HtmlEncode($Grid->ForcepsP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Elective->Visible) { // Elective ?>
        <td data-name="Elective" <?= $Grid->Elective->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Elective" class="form-group">
<input type="<?= $Grid->Elective->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Elective" name="x<?= $Grid->RowIndex ?>_Elective" id="x<?= $Grid->RowIndex ?>_Elective" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Elective->getPlaceHolder()) ?>" value="<?= $Grid->Elective->EditValue ?>"<?= $Grid->Elective->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Elective->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Elective" id="o<?= $Grid->RowIndex ?>_Elective" value="<?= HtmlEncode($Grid->Elective->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Elective" class="form-group">
<input type="<?= $Grid->Elective->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Elective" name="x<?= $Grid->RowIndex ?>_Elective" id="x<?= $Grid->RowIndex ?>_Elective" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Elective->getPlaceHolder()) ?>" value="<?= $Grid->Elective->EditValue ?>"<?= $Grid->Elective->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Elective->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Elective">
<span<?= $Grid->Elective->viewAttributes() ?>>
<?= $Grid->Elective->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Elective" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Elective" value="<?= HtmlEncode($Grid->Elective->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Elective" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Elective" value="<?= HtmlEncode($Grid->Elective->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ElectiveS->Visible) { // ElectiveS ?>
        <td data-name="ElectiveS" <?= $Grid->ElectiveS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ElectiveS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ElectiveS"
        name="x<?= $Grid->RowIndex ?>_ElectiveS"
        class="form-control ew-select<?= $Grid->ElectiveS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveS"
        data-table="patient_an_registration"
        data-field="x_ElectiveS"
        data-value-separator="<?= $Grid->ElectiveS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ElectiveS->getPlaceHolder()) ?>"
        <?= $Grid->ElectiveS->editAttributes() ?>>
        <?= $Grid->ElectiveS->selectOptionListHtml("x{$Grid->RowIndex}_ElectiveS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ElectiveS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ElectiveS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ElectiveS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ElectiveS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ElectiveS" id="o<?= $Grid->RowIndex ?>_ElectiveS" value="<?= HtmlEncode($Grid->ElectiveS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ElectiveS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ElectiveS"
        name="x<?= $Grid->RowIndex ?>_ElectiveS"
        class="form-control ew-select<?= $Grid->ElectiveS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveS"
        data-table="patient_an_registration"
        data-field="x_ElectiveS"
        data-value-separator="<?= $Grid->ElectiveS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ElectiveS->getPlaceHolder()) ?>"
        <?= $Grid->ElectiveS->editAttributes() ?>>
        <?= $Grid->ElectiveS->selectOptionListHtml("x{$Grid->RowIndex}_ElectiveS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ElectiveS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ElectiveS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ElectiveS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ElectiveS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ElectiveS">
<span<?= $Grid->ElectiveS->viewAttributes() ?>>
<?= $Grid->ElectiveS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ElectiveS" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ElectiveS" value="<?= HtmlEncode($Grid->ElectiveS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ElectiveS" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ElectiveS" value="<?= HtmlEncode($Grid->ElectiveS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ElectiveP->Visible) { // ElectiveP ?>
        <td data-name="ElectiveP" <?= $Grid->ElectiveP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ElectiveP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ElectiveP"
        name="x<?= $Grid->RowIndex ?>_ElectiveP"
        class="form-control ew-select<?= $Grid->ElectiveP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveP"
        data-table="patient_an_registration"
        data-field="x_ElectiveP"
        data-value-separator="<?= $Grid->ElectiveP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ElectiveP->getPlaceHolder()) ?>"
        <?= $Grid->ElectiveP->editAttributes() ?>>
        <?= $Grid->ElectiveP->selectOptionListHtml("x{$Grid->RowIndex}_ElectiveP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ElectiveP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ElectiveP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ElectiveP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ElectiveP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ElectiveP" id="o<?= $Grid->RowIndex ?>_ElectiveP" value="<?= HtmlEncode($Grid->ElectiveP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ElectiveP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ElectiveP"
        name="x<?= $Grid->RowIndex ?>_ElectiveP"
        class="form-control ew-select<?= $Grid->ElectiveP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveP"
        data-table="patient_an_registration"
        data-field="x_ElectiveP"
        data-value-separator="<?= $Grid->ElectiveP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ElectiveP->getPlaceHolder()) ?>"
        <?= $Grid->ElectiveP->editAttributes() ?>>
        <?= $Grid->ElectiveP->selectOptionListHtml("x{$Grid->RowIndex}_ElectiveP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ElectiveP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ElectiveP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ElectiveP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ElectiveP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ElectiveP">
<span<?= $Grid->ElectiveP->viewAttributes() ?>>
<?= $Grid->ElectiveP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ElectiveP" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ElectiveP" value="<?= HtmlEncode($Grid->ElectiveP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ElectiveP" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ElectiveP" value="<?= HtmlEncode($Grid->ElectiveP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Emergency->Visible) { // Emergency ?>
        <td data-name="Emergency" <?= $Grid->Emergency->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Emergency" class="form-group">
<input type="<?= $Grid->Emergency->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Emergency" name="x<?= $Grid->RowIndex ?>_Emergency" id="x<?= $Grid->RowIndex ?>_Emergency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Emergency->getPlaceHolder()) ?>" value="<?= $Grid->Emergency->EditValue ?>"<?= $Grid->Emergency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Emergency->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Emergency" id="o<?= $Grid->RowIndex ?>_Emergency" value="<?= HtmlEncode($Grid->Emergency->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Emergency" class="form-group">
<input type="<?= $Grid->Emergency->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Emergency" name="x<?= $Grid->RowIndex ?>_Emergency" id="x<?= $Grid->RowIndex ?>_Emergency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Emergency->getPlaceHolder()) ?>" value="<?= $Grid->Emergency->EditValue ?>"<?= $Grid->Emergency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Emergency->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Emergency">
<span<?= $Grid->Emergency->viewAttributes() ?>>
<?= $Grid->Emergency->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Emergency" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Emergency" value="<?= HtmlEncode($Grid->Emergency->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Emergency" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Emergency" value="<?= HtmlEncode($Grid->Emergency->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EmergencyS->Visible) { // EmergencyS ?>
        <td data-name="EmergencyS" <?= $Grid->EmergencyS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EmergencyS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_EmergencyS"
        name="x<?= $Grid->RowIndex ?>_EmergencyS"
        class="form-control ew-select<?= $Grid->EmergencyS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyS"
        data-table="patient_an_registration"
        data-field="x_EmergencyS"
        data-value-separator="<?= $Grid->EmergencyS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EmergencyS->getPlaceHolder()) ?>"
        <?= $Grid->EmergencyS->editAttributes() ?>>
        <?= $Grid->EmergencyS->selectOptionListHtml("x{$Grid->RowIndex}_EmergencyS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EmergencyS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EmergencyS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.EmergencyS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.EmergencyS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EmergencyS" id="o<?= $Grid->RowIndex ?>_EmergencyS" value="<?= HtmlEncode($Grid->EmergencyS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EmergencyS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_EmergencyS"
        name="x<?= $Grid->RowIndex ?>_EmergencyS"
        class="form-control ew-select<?= $Grid->EmergencyS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyS"
        data-table="patient_an_registration"
        data-field="x_EmergencyS"
        data-value-separator="<?= $Grid->EmergencyS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EmergencyS->getPlaceHolder()) ?>"
        <?= $Grid->EmergencyS->editAttributes() ?>>
        <?= $Grid->EmergencyS->selectOptionListHtml("x{$Grid->RowIndex}_EmergencyS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EmergencyS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EmergencyS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.EmergencyS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.EmergencyS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EmergencyS">
<span<?= $Grid->EmergencyS->viewAttributes() ?>>
<?= $Grid->EmergencyS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EmergencyS" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EmergencyS" value="<?= HtmlEncode($Grid->EmergencyS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EmergencyS" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EmergencyS" value="<?= HtmlEncode($Grid->EmergencyS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EmergencyP->Visible) { // EmergencyP ?>
        <td data-name="EmergencyP" <?= $Grid->EmergencyP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EmergencyP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_EmergencyP"
        name="x<?= $Grid->RowIndex ?>_EmergencyP"
        class="form-control ew-select<?= $Grid->EmergencyP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyP"
        data-table="patient_an_registration"
        data-field="x_EmergencyP"
        data-value-separator="<?= $Grid->EmergencyP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EmergencyP->getPlaceHolder()) ?>"
        <?= $Grid->EmergencyP->editAttributes() ?>>
        <?= $Grid->EmergencyP->selectOptionListHtml("x{$Grid->RowIndex}_EmergencyP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EmergencyP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EmergencyP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.EmergencyP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.EmergencyP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EmergencyP" id="o<?= $Grid->RowIndex ?>_EmergencyP" value="<?= HtmlEncode($Grid->EmergencyP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EmergencyP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_EmergencyP"
        name="x<?= $Grid->RowIndex ?>_EmergencyP"
        class="form-control ew-select<?= $Grid->EmergencyP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyP"
        data-table="patient_an_registration"
        data-field="x_EmergencyP"
        data-value-separator="<?= $Grid->EmergencyP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EmergencyP->getPlaceHolder()) ?>"
        <?= $Grid->EmergencyP->editAttributes() ?>>
        <?= $Grid->EmergencyP->selectOptionListHtml("x{$Grid->RowIndex}_EmergencyP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EmergencyP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EmergencyP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.EmergencyP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.EmergencyP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_EmergencyP">
<span<?= $Grid->EmergencyP->viewAttributes() ?>>
<?= $Grid->EmergencyP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EmergencyP" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_EmergencyP" value="<?= HtmlEncode($Grid->EmergencyP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EmergencyP" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_EmergencyP" value="<?= HtmlEncode($Grid->EmergencyP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Maturity->Visible) { // Maturity ?>
        <td data-name="Maturity" <?= $Grid->Maturity->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Maturity" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Maturity"
        name="x<?= $Grid->RowIndex ?>_Maturity"
        class="form-control ew-select<?= $Grid->Maturity->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_Maturity"
        data-table="patient_an_registration"
        data-field="x_Maturity"
        data-value-separator="<?= $Grid->Maturity->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Maturity->getPlaceHolder()) ?>"
        <?= $Grid->Maturity->editAttributes() ?>>
        <?= $Grid->Maturity->selectOptionListHtml("x{$Grid->RowIndex}_Maturity") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Maturity->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_Maturity']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Maturity", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_Maturity", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.Maturity.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.Maturity.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Maturity" id="o<?= $Grid->RowIndex ?>_Maturity" value="<?= HtmlEncode($Grid->Maturity->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Maturity" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Maturity"
        name="x<?= $Grid->RowIndex ?>_Maturity"
        class="form-control ew-select<?= $Grid->Maturity->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_Maturity"
        data-table="patient_an_registration"
        data-field="x_Maturity"
        data-value-separator="<?= $Grid->Maturity->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Maturity->getPlaceHolder()) ?>"
        <?= $Grid->Maturity->editAttributes() ?>>
        <?= $Grid->Maturity->selectOptionListHtml("x{$Grid->RowIndex}_Maturity") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Maturity->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_Maturity']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Maturity", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_Maturity", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.Maturity.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.Maturity.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Maturity">
<span<?= $Grid->Maturity->viewAttributes() ?>>
<?= $Grid->Maturity->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Maturity" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Maturity" value="<?= HtmlEncode($Grid->Maturity->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Maturity" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Maturity" value="<?= HtmlEncode($Grid->Maturity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Baby1->Visible) { // Baby1 ?>
        <td data-name="Baby1" <?= $Grid->Baby1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Baby1" class="form-group">
<input type="<?= $Grid->Baby1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Baby1" name="x<?= $Grid->RowIndex ?>_Baby1" id="x<?= $Grid->RowIndex ?>_Baby1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Baby1->getPlaceHolder()) ?>" value="<?= $Grid->Baby1->EditValue ?>"<?= $Grid->Baby1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Baby1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Baby1" id="o<?= $Grid->RowIndex ?>_Baby1" value="<?= HtmlEncode($Grid->Baby1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Baby1" class="form-group">
<input type="<?= $Grid->Baby1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Baby1" name="x<?= $Grid->RowIndex ?>_Baby1" id="x<?= $Grid->RowIndex ?>_Baby1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Baby1->getPlaceHolder()) ?>" value="<?= $Grid->Baby1->EditValue ?>"<?= $Grid->Baby1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Baby1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Baby1">
<span<?= $Grid->Baby1->viewAttributes() ?>>
<?= $Grid->Baby1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Baby1" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Baby1" value="<?= HtmlEncode($Grid->Baby1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Baby1" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Baby1" value="<?= HtmlEncode($Grid->Baby1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Baby2->Visible) { // Baby2 ?>
        <td data-name="Baby2" <?= $Grid->Baby2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Baby2" class="form-group">
<input type="<?= $Grid->Baby2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Baby2" name="x<?= $Grid->RowIndex ?>_Baby2" id="x<?= $Grid->RowIndex ?>_Baby2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Baby2->getPlaceHolder()) ?>" value="<?= $Grid->Baby2->EditValue ?>"<?= $Grid->Baby2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Baby2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Baby2" id="o<?= $Grid->RowIndex ?>_Baby2" value="<?= HtmlEncode($Grid->Baby2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Baby2" class="form-group">
<input type="<?= $Grid->Baby2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Baby2" name="x<?= $Grid->RowIndex ?>_Baby2" id="x<?= $Grid->RowIndex ?>_Baby2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Baby2->getPlaceHolder()) ?>" value="<?= $Grid->Baby2->EditValue ?>"<?= $Grid->Baby2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Baby2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Baby2">
<span<?= $Grid->Baby2->viewAttributes() ?>>
<?= $Grid->Baby2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Baby2" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Baby2" value="<?= HtmlEncode($Grid->Baby2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Baby2" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Baby2" value="<?= HtmlEncode($Grid->Baby2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->sex1->Visible) { // sex1 ?>
        <td data-name="sex1" <?= $Grid->sex1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_sex1" class="form-group">
<input type="<?= $Grid->sex1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_sex1" name="x<?= $Grid->RowIndex ?>_sex1" id="x<?= $Grid->RowIndex ?>_sex1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->sex1->getPlaceHolder()) ?>" value="<?= $Grid->sex1->EditValue ?>"<?= $Grid->sex1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sex1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sex1" id="o<?= $Grid->RowIndex ?>_sex1" value="<?= HtmlEncode($Grid->sex1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_sex1" class="form-group">
<input type="<?= $Grid->sex1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_sex1" name="x<?= $Grid->RowIndex ?>_sex1" id="x<?= $Grid->RowIndex ?>_sex1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->sex1->getPlaceHolder()) ?>" value="<?= $Grid->sex1->EditValue ?>"<?= $Grid->sex1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sex1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_sex1">
<span<?= $Grid->sex1->viewAttributes() ?>>
<?= $Grid->sex1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_sex1" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_sex1" value="<?= HtmlEncode($Grid->sex1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_sex1" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_sex1" value="<?= HtmlEncode($Grid->sex1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->sex2->Visible) { // sex2 ?>
        <td data-name="sex2" <?= $Grid->sex2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_sex2" class="form-group">
<input type="<?= $Grid->sex2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_sex2" name="x<?= $Grid->RowIndex ?>_sex2" id="x<?= $Grid->RowIndex ?>_sex2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->sex2->getPlaceHolder()) ?>" value="<?= $Grid->sex2->EditValue ?>"<?= $Grid->sex2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sex2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sex2" id="o<?= $Grid->RowIndex ?>_sex2" value="<?= HtmlEncode($Grid->sex2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_sex2" class="form-group">
<input type="<?= $Grid->sex2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_sex2" name="x<?= $Grid->RowIndex ?>_sex2" id="x<?= $Grid->RowIndex ?>_sex2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->sex2->getPlaceHolder()) ?>" value="<?= $Grid->sex2->EditValue ?>"<?= $Grid->sex2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sex2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_sex2">
<span<?= $Grid->sex2->viewAttributes() ?>>
<?= $Grid->sex2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_sex2" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_sex2" value="<?= HtmlEncode($Grid->sex2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_sex2" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_sex2" value="<?= HtmlEncode($Grid->sex2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->weight1->Visible) { // weight1 ?>
        <td data-name="weight1" <?= $Grid->weight1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_weight1" class="form-group">
<input type="<?= $Grid->weight1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_weight1" name="x<?= $Grid->RowIndex ?>_weight1" id="x<?= $Grid->RowIndex ?>_weight1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->weight1->getPlaceHolder()) ?>" value="<?= $Grid->weight1->EditValue ?>"<?= $Grid->weight1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->weight1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_weight1" id="o<?= $Grid->RowIndex ?>_weight1" value="<?= HtmlEncode($Grid->weight1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_weight1" class="form-group">
<input type="<?= $Grid->weight1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_weight1" name="x<?= $Grid->RowIndex ?>_weight1" id="x<?= $Grid->RowIndex ?>_weight1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->weight1->getPlaceHolder()) ?>" value="<?= $Grid->weight1->EditValue ?>"<?= $Grid->weight1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->weight1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_weight1">
<span<?= $Grid->weight1->viewAttributes() ?>>
<?= $Grid->weight1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_weight1" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_weight1" value="<?= HtmlEncode($Grid->weight1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_weight1" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_weight1" value="<?= HtmlEncode($Grid->weight1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->weight2->Visible) { // weight2 ?>
        <td data-name="weight2" <?= $Grid->weight2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_weight2" class="form-group">
<input type="<?= $Grid->weight2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_weight2" name="x<?= $Grid->RowIndex ?>_weight2" id="x<?= $Grid->RowIndex ?>_weight2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->weight2->getPlaceHolder()) ?>" value="<?= $Grid->weight2->EditValue ?>"<?= $Grid->weight2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->weight2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_weight2" id="o<?= $Grid->RowIndex ?>_weight2" value="<?= HtmlEncode($Grid->weight2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_weight2" class="form-group">
<input type="<?= $Grid->weight2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_weight2" name="x<?= $Grid->RowIndex ?>_weight2" id="x<?= $Grid->RowIndex ?>_weight2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->weight2->getPlaceHolder()) ?>" value="<?= $Grid->weight2->EditValue ?>"<?= $Grid->weight2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->weight2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_weight2">
<span<?= $Grid->weight2->viewAttributes() ?>>
<?= $Grid->weight2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_weight2" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_weight2" value="<?= HtmlEncode($Grid->weight2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_weight2" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_weight2" value="<?= HtmlEncode($Grid->weight2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NICU1->Visible) { // NICU1 ?>
        <td data-name="NICU1" <?= $Grid->NICU1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NICU1" class="form-group">
<input type="<?= $Grid->NICU1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NICU1" name="x<?= $Grid->RowIndex ?>_NICU1" id="x<?= $Grid->RowIndex ?>_NICU1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NICU1->getPlaceHolder()) ?>" value="<?= $Grid->NICU1->EditValue ?>"<?= $Grid->NICU1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NICU1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NICU1" id="o<?= $Grid->RowIndex ?>_NICU1" value="<?= HtmlEncode($Grid->NICU1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NICU1" class="form-group">
<input type="<?= $Grid->NICU1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NICU1" name="x<?= $Grid->RowIndex ?>_NICU1" id="x<?= $Grid->RowIndex ?>_NICU1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NICU1->getPlaceHolder()) ?>" value="<?= $Grid->NICU1->EditValue ?>"<?= $Grid->NICU1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NICU1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NICU1">
<span<?= $Grid->NICU1->viewAttributes() ?>>
<?= $Grid->NICU1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NICU1" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NICU1" value="<?= HtmlEncode($Grid->NICU1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NICU1" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NICU1" value="<?= HtmlEncode($Grid->NICU1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NICU2->Visible) { // NICU2 ?>
        <td data-name="NICU2" <?= $Grid->NICU2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NICU2" class="form-group">
<input type="<?= $Grid->NICU2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NICU2" name="x<?= $Grid->RowIndex ?>_NICU2" id="x<?= $Grid->RowIndex ?>_NICU2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NICU2->getPlaceHolder()) ?>" value="<?= $Grid->NICU2->EditValue ?>"<?= $Grid->NICU2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NICU2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NICU2" id="o<?= $Grid->RowIndex ?>_NICU2" value="<?= HtmlEncode($Grid->NICU2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NICU2" class="form-group">
<input type="<?= $Grid->NICU2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NICU2" name="x<?= $Grid->RowIndex ?>_NICU2" id="x<?= $Grid->RowIndex ?>_NICU2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NICU2->getPlaceHolder()) ?>" value="<?= $Grid->NICU2->EditValue ?>"<?= $Grid->NICU2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NICU2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_NICU2">
<span<?= $Grid->NICU2->viewAttributes() ?>>
<?= $Grid->NICU2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NICU2" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_NICU2" value="<?= HtmlEncode($Grid->NICU2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NICU2" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_NICU2" value="<?= HtmlEncode($Grid->NICU2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Jaundice1->Visible) { // Jaundice1 ?>
        <td data-name="Jaundice1" <?= $Grid->Jaundice1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Jaundice1" class="form-group">
<input type="<?= $Grid->Jaundice1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?= $Grid->RowIndex ?>_Jaundice1" id="x<?= $Grid->RowIndex ?>_Jaundice1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Jaundice1->getPlaceHolder()) ?>" value="<?= $Grid->Jaundice1->EditValue ?>"<?= $Grid->Jaundice1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Jaundice1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Jaundice1" id="o<?= $Grid->RowIndex ?>_Jaundice1" value="<?= HtmlEncode($Grid->Jaundice1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Jaundice1" class="form-group">
<input type="<?= $Grid->Jaundice1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?= $Grid->RowIndex ?>_Jaundice1" id="x<?= $Grid->RowIndex ?>_Jaundice1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Jaundice1->getPlaceHolder()) ?>" value="<?= $Grid->Jaundice1->EditValue ?>"<?= $Grid->Jaundice1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Jaundice1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Jaundice1">
<span<?= $Grid->Jaundice1->viewAttributes() ?>>
<?= $Grid->Jaundice1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Jaundice1" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Jaundice1" value="<?= HtmlEncode($Grid->Jaundice1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Jaundice1" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Jaundice1" value="<?= HtmlEncode($Grid->Jaundice1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Jaundice2->Visible) { // Jaundice2 ?>
        <td data-name="Jaundice2" <?= $Grid->Jaundice2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Jaundice2" class="form-group">
<input type="<?= $Grid->Jaundice2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?= $Grid->RowIndex ?>_Jaundice2" id="x<?= $Grid->RowIndex ?>_Jaundice2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Jaundice2->getPlaceHolder()) ?>" value="<?= $Grid->Jaundice2->EditValue ?>"<?= $Grid->Jaundice2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Jaundice2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Jaundice2" id="o<?= $Grid->RowIndex ?>_Jaundice2" value="<?= HtmlEncode($Grid->Jaundice2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Jaundice2" class="form-group">
<input type="<?= $Grid->Jaundice2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?= $Grid->RowIndex ?>_Jaundice2" id="x<?= $Grid->RowIndex ?>_Jaundice2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Jaundice2->getPlaceHolder()) ?>" value="<?= $Grid->Jaundice2->EditValue ?>"<?= $Grid->Jaundice2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Jaundice2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Jaundice2">
<span<?= $Grid->Jaundice2->viewAttributes() ?>>
<?= $Grid->Jaundice2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Jaundice2" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Jaundice2" value="<?= HtmlEncode($Grid->Jaundice2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Jaundice2" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Jaundice2" value="<?= HtmlEncode($Grid->Jaundice2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Others1->Visible) { // Others1 ?>
        <td data-name="Others1" <?= $Grid->Others1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Others1" class="form-group">
<input type="<?= $Grid->Others1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Others1" name="x<?= $Grid->RowIndex ?>_Others1" id="x<?= $Grid->RowIndex ?>_Others1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Others1->getPlaceHolder()) ?>" value="<?= $Grid->Others1->EditValue ?>"<?= $Grid->Others1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Others1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Others1" id="o<?= $Grid->RowIndex ?>_Others1" value="<?= HtmlEncode($Grid->Others1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Others1" class="form-group">
<input type="<?= $Grid->Others1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Others1" name="x<?= $Grid->RowIndex ?>_Others1" id="x<?= $Grid->RowIndex ?>_Others1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Others1->getPlaceHolder()) ?>" value="<?= $Grid->Others1->EditValue ?>"<?= $Grid->Others1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Others1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Others1">
<span<?= $Grid->Others1->viewAttributes() ?>>
<?= $Grid->Others1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Others1" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Others1" value="<?= HtmlEncode($Grid->Others1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Others1" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Others1" value="<?= HtmlEncode($Grid->Others1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Others2->Visible) { // Others2 ?>
        <td data-name="Others2" <?= $Grid->Others2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Others2" class="form-group">
<input type="<?= $Grid->Others2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Others2" name="x<?= $Grid->RowIndex ?>_Others2" id="x<?= $Grid->RowIndex ?>_Others2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Others2->getPlaceHolder()) ?>" value="<?= $Grid->Others2->EditValue ?>"<?= $Grid->Others2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Others2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Others2" id="o<?= $Grid->RowIndex ?>_Others2" value="<?= HtmlEncode($Grid->Others2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Others2" class="form-group">
<input type="<?= $Grid->Others2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Others2" name="x<?= $Grid->RowIndex ?>_Others2" id="x<?= $Grid->RowIndex ?>_Others2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Others2->getPlaceHolder()) ?>" value="<?= $Grid->Others2->EditValue ?>"<?= $Grid->Others2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Others2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_Others2">
<span<?= $Grid->Others2->viewAttributes() ?>>
<?= $Grid->Others2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Others2" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_Others2" value="<?= HtmlEncode($Grid->Others2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Others2" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_Others2" value="<?= HtmlEncode($Grid->Others2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SpillOverReasons->Visible) { // SpillOverReasons ?>
        <td data-name="SpillOverReasons" <?= $Grid->SpillOverReasons->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_SpillOverReasons" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_SpillOverReasons"
        name="x<?= $Grid->RowIndex ?>_SpillOverReasons"
        class="form-control ew-select<?= $Grid->SpillOverReasons->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_SpillOverReasons"
        data-table="patient_an_registration"
        data-field="x_SpillOverReasons"
        data-value-separator="<?= $Grid->SpillOverReasons->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SpillOverReasons->getPlaceHolder()) ?>"
        <?= $Grid->SpillOverReasons->editAttributes() ?>>
        <?= $Grid->SpillOverReasons->selectOptionListHtml("x{$Grid->RowIndex}_SpillOverReasons") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SpillOverReasons->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_SpillOverReasons']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SpillOverReasons", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_SpillOverReasons", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.SpillOverReasons.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.SpillOverReasons.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SpillOverReasons" id="o<?= $Grid->RowIndex ?>_SpillOverReasons" value="<?= HtmlEncode($Grid->SpillOverReasons->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_SpillOverReasons" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_SpillOverReasons"
        name="x<?= $Grid->RowIndex ?>_SpillOverReasons"
        class="form-control ew-select<?= $Grid->SpillOverReasons->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_SpillOverReasons"
        data-table="patient_an_registration"
        data-field="x_SpillOverReasons"
        data-value-separator="<?= $Grid->SpillOverReasons->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SpillOverReasons->getPlaceHolder()) ?>"
        <?= $Grid->SpillOverReasons->editAttributes() ?>>
        <?= $Grid->SpillOverReasons->selectOptionListHtml("x{$Grid->RowIndex}_SpillOverReasons") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SpillOverReasons->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_SpillOverReasons']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SpillOverReasons", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_SpillOverReasons", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.SpillOverReasons.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.SpillOverReasons.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_SpillOverReasons">
<span<?= $Grid->SpillOverReasons->viewAttributes() ?>>
<?= $Grid->SpillOverReasons->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_SpillOverReasons" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_SpillOverReasons" value="<?= HtmlEncode($Grid->SpillOverReasons->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_SpillOverReasons" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_SpillOverReasons" value="<?= HtmlEncode($Grid->SpillOverReasons->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ANClosed->Visible) { // ANClosed ?>
        <td data-name="ANClosed" <?= $Grid->ANClosed->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANClosed" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_ANClosed">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_ANClosed" name="x<?= $Grid->RowIndex ?>_ANClosed" id="x<?= $Grid->RowIndex ?>_ANClosed"<?= $Grid->ANClosed->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ANClosed" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ANClosed[]"
    name="x<?= $Grid->RowIndex ?>_ANClosed[]"
    value="<?= HtmlEncode($Grid->ANClosed->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_ANClosed"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ANClosed"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ANClosed->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_ANClosed"
    data-value-separator="<?= $Grid->ANClosed->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ANClosed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANClosed->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANClosed[]" id="o<?= $Grid->RowIndex ?>_ANClosed[]" value="<?= HtmlEncode($Grid->ANClosed->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANClosed" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_ANClosed">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_ANClosed" name="x<?= $Grid->RowIndex ?>_ANClosed" id="x<?= $Grid->RowIndex ?>_ANClosed"<?= $Grid->ANClosed->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ANClosed" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ANClosed[]"
    name="x<?= $Grid->RowIndex ?>_ANClosed[]"
    value="<?= HtmlEncode($Grid->ANClosed->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_ANClosed"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ANClosed"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ANClosed->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_ANClosed"
    data-value-separator="<?= $Grid->ANClosed->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ANClosed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANClosed->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANClosed">
<span<?= $Grid->ANClosed->viewAttributes() ?>>
<?= $Grid->ANClosed->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANClosed" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANClosed" value="<?= HtmlEncode($Grid->ANClosed->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANClosed[]" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANClosed[]" value="<?= HtmlEncode($Grid->ANClosed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ANClosedDATE->Visible) { // ANClosedDATE ?>
        <td data-name="ANClosedDATE" <?= $Grid->ANClosedDATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANClosedDATE" class="form-group">
<input type="<?= $Grid->ANClosedDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?= $Grid->RowIndex ?>_ANClosedDATE" id="x<?= $Grid->RowIndex ?>_ANClosedDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANClosedDATE->getPlaceHolder()) ?>" value="<?= $Grid->ANClosedDATE->EditValue ?>"<?= $Grid->ANClosedDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANClosedDATE->getErrorMessage() ?></div>
<?php if (!$Grid->ANClosedDATE->ReadOnly && !$Grid->ANClosedDATE->Disabled && !isset($Grid->ANClosedDATE->EditAttrs["readonly"]) && !isset($Grid->ANClosedDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANClosedDATE" id="o<?= $Grid->RowIndex ?>_ANClosedDATE" value="<?= HtmlEncode($Grid->ANClosedDATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANClosedDATE" class="form-group">
<input type="<?= $Grid->ANClosedDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?= $Grid->RowIndex ?>_ANClosedDATE" id="x<?= $Grid->RowIndex ?>_ANClosedDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANClosedDATE->getPlaceHolder()) ?>" value="<?= $Grid->ANClosedDATE->EditValue ?>"<?= $Grid->ANClosedDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANClosedDATE->getErrorMessage() ?></div>
<?php if (!$Grid->ANClosedDATE->ReadOnly && !$Grid->ANClosedDATE->Disabled && !isset($Grid->ANClosedDATE->EditAttrs["readonly"]) && !isset($Grid->ANClosedDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ANClosedDATE">
<span<?= $Grid->ANClosedDATE->viewAttributes() ?>>
<?= $Grid->ANClosedDATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANClosedDATE" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ANClosedDATE" value="<?= HtmlEncode($Grid->ANClosedDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANClosedDATE" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ANClosedDATE" value="<?= HtmlEncode($Grid->ANClosedDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
        <td data-name="PastMedicalHistoryOthers" <?= $Grid->PastMedicalHistoryOthers->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastMedicalHistoryOthers" class="form-group">
<input type="<?= $Grid->PastMedicalHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?= $Grid->PastMedicalHistoryOthers->EditValue ?>"<?= $Grid->PastMedicalHistoryOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastMedicalHistoryOthers->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" id="o<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?= HtmlEncode($Grid->PastMedicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastMedicalHistoryOthers" class="form-group">
<input type="<?= $Grid->PastMedicalHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?= $Grid->PastMedicalHistoryOthers->EditValue ?>"<?= $Grid->PastMedicalHistoryOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastMedicalHistoryOthers->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastMedicalHistoryOthers">
<span<?= $Grid->PastMedicalHistoryOthers->viewAttributes() ?>>
<?= $Grid->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?= HtmlEncode($Grid->PastMedicalHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?= HtmlEncode($Grid->PastMedicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
        <td data-name="PastSurgicalHistoryOthers" <?= $Grid->PastSurgicalHistoryOthers->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastSurgicalHistoryOthers" class="form-group">
<input type="<?= $Grid->PastSurgicalHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?= $Grid->PastSurgicalHistoryOthers->EditValue ?>"<?= $Grid->PastSurgicalHistoryOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastSurgicalHistoryOthers->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" id="o<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?= HtmlEncode($Grid->PastSurgicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastSurgicalHistoryOthers" class="form-group">
<input type="<?= $Grid->PastSurgicalHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?= $Grid->PastSurgicalHistoryOthers->EditValue ?>"<?= $Grid->PastSurgicalHistoryOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastSurgicalHistoryOthers->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PastSurgicalHistoryOthers">
<span<?= $Grid->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?= $Grid->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?= HtmlEncode($Grid->PastSurgicalHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?= HtmlEncode($Grid->PastSurgicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
        <td data-name="FamilyHistoryOthers" <?= $Grid->FamilyHistoryOthers->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_FamilyHistoryOthers" class="form-group">
<input type="<?= $Grid->FamilyHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?= $Grid->RowIndex ?>_FamilyHistoryOthers" id="x<?= $Grid->RowIndex ?>_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?= $Grid->FamilyHistoryOthers->EditValue ?>"<?= $Grid->FamilyHistoryOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FamilyHistoryOthers->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FamilyHistoryOthers" id="o<?= $Grid->RowIndex ?>_FamilyHistoryOthers" value="<?= HtmlEncode($Grid->FamilyHistoryOthers->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_FamilyHistoryOthers" class="form-group">
<input type="<?= $Grid->FamilyHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?= $Grid->RowIndex ?>_FamilyHistoryOthers" id="x<?= $Grid->RowIndex ?>_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?= $Grid->FamilyHistoryOthers->EditValue ?>"<?= $Grid->FamilyHistoryOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FamilyHistoryOthers->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_FamilyHistoryOthers">
<span<?= $Grid->FamilyHistoryOthers->viewAttributes() ?>>
<?= $Grid->FamilyHistoryOthers->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_FamilyHistoryOthers" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_FamilyHistoryOthers" value="<?= HtmlEncode($Grid->FamilyHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_FamilyHistoryOthers" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_FamilyHistoryOthers" value="<?= HtmlEncode($Grid->FamilyHistoryOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
        <td data-name="PresentPregnancyComplicationsOthers" <?= $Grid->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group">
<input type="<?= $Grid->PresentPregnancyComplicationsOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?= $Grid->PresentPregnancyComplicationsOthers->EditValue ?>"<?= $Grid->PresentPregnancyComplicationsOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PresentPregnancyComplicationsOthers->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="o<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?= HtmlEncode($Grid->PresentPregnancyComplicationsOthers->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group">
<input type="<?= $Grid->PresentPregnancyComplicationsOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?= $Grid->PresentPregnancyComplicationsOthers->EditValue ?>"<?= $Grid->PresentPregnancyComplicationsOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PresentPregnancyComplicationsOthers->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?= $Grid->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?= $Grid->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?= HtmlEncode($Grid->PresentPregnancyComplicationsOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?= HtmlEncode($Grid->PresentPregnancyComplicationsOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ETdate->Visible) { // ETdate ?>
        <td data-name="ETdate" <?= $Grid->ETdate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ETdate" class="form-group">
<input type="<?= $Grid->ETdate->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ETdate" name="x<?= $Grid->RowIndex ?>_ETdate" id="x<?= $Grid->RowIndex ?>_ETdate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETdate->getPlaceHolder()) ?>" value="<?= $Grid->ETdate->EditValue ?>"<?= $Grid->ETdate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETdate->getErrorMessage() ?></div>
<?php if (!$Grid->ETdate->ReadOnly && !$Grid->ETdate->Disabled && !isset($Grid->ETdate->EditAttrs["readonly"]) && !isset($Grid->ETdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETdate" id="o<?= $Grid->RowIndex ?>_ETdate" value="<?= HtmlEncode($Grid->ETdate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ETdate" class="form-group">
<input type="<?= $Grid->ETdate->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ETdate" name="x<?= $Grid->RowIndex ?>_ETdate" id="x<?= $Grid->RowIndex ?>_ETdate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETdate->getPlaceHolder()) ?>" value="<?= $Grid->ETdate->EditValue ?>"<?= $Grid->ETdate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETdate->getErrorMessage() ?></div>
<?php if (!$Grid->ETdate->ReadOnly && !$Grid->ETdate->Disabled && !isset($Grid->ETdate->EditAttrs["readonly"]) && !isset($Grid->ETdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_an_registration_ETdate">
<span<?= $Grid->ETdate->viewAttributes() ?>>
<?= $Grid->ETdate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" data-hidden="1" name="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ETdate" id="fpatient_an_registrationgrid$x<?= $Grid->RowIndex ?>_ETdate" value="<?= HtmlEncode($Grid->ETdate->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" data-hidden="1" name="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ETdate" id="fpatient_an_registrationgrid$o<?= $Grid->RowIndex ?>_ETdate" value="<?= HtmlEncode($Grid->ETdate->OldValue) ?>">
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
loadjs.ready(["fpatient_an_registrationgrid","load"], function () {
    fpatient_an_registrationgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_an_registration", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_patient_an_registration_id" class="form-group patient_an_registration_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_id" class="form-group patient_an_registration_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->pid->Visible) { // pid ?>
        <td data-name="pid">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->pid->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<span<?= $Grid->pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->pid->getDisplayValue($Grid->pid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_pid" name="x<?= $Grid->RowIndex ?>_pid" value="<?= HtmlEncode($Grid->pid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<input type="<?= $Grid->pid->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_pid" name="x<?= $Grid->RowIndex ?>_pid" id="x<?= $Grid->RowIndex ?>_pid" size="30" placeholder="<?= HtmlEncode($Grid->pid->getPlaceHolder()) ?>" value="<?= $Grid->pid->EditValue ?>"<?= $Grid->pid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->pid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<span<?= $Grid->pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->pid->getDisplayValue($Grid->pid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_pid" id="x<?= $Grid->RowIndex ?>_pid" value="<?= HtmlEncode($Grid->pid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_pid" id="o<?= $Grid->RowIndex ?>_pid" value="<?= HtmlEncode($Grid->pid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->fid->Visible) { // fid ?>
        <td data-name="fid">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->fid->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<span<?= $Grid->fid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->fid->getDisplayValue($Grid->fid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_fid" name="x<?= $Grid->RowIndex ?>_fid" value="<?= HtmlEncode($Grid->fid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<input type="<?= $Grid->fid->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_fid" name="x<?= $Grid->RowIndex ?>_fid" id="x<?= $Grid->RowIndex ?>_fid" size="30" placeholder="<?= HtmlEncode($Grid->fid->getPlaceHolder()) ?>" value="<?= $Grid->fid->EditValue ?>"<?= $Grid->fid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->fid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<span<?= $Grid->fid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->fid->getDisplayValue($Grid->fid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_fid" id="x<?= $Grid->RowIndex ?>_fid" value="<?= HtmlEncode($Grid->fid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_fid" id="o<?= $Grid->RowIndex ?>_fid" value="<?= HtmlEncode($Grid->fid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->G->Visible) { // G ?>
        <td data-name="G">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G" class="form-group patient_an_registration_G">
<input type="<?= $Grid->G->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G" name="x<?= $Grid->RowIndex ?>_G" id="x<?= $Grid->RowIndex ?>_G" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->G->getPlaceHolder()) ?>" value="<?= $Grid->G->EditValue ?>"<?= $Grid->G->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G" class="form-group patient_an_registration_G">
<span<?= $Grid->G->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->G->getDisplayValue($Grid->G->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" data-hidden="1" name="x<?= $Grid->RowIndex ?>_G" id="x<?= $Grid->RowIndex ?>_G" value="<?= HtmlEncode($Grid->G->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" data-hidden="1" name="o<?= $Grid->RowIndex ?>_G" id="o<?= $Grid->RowIndex ?>_G" value="<?= HtmlEncode($Grid->G->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->P->Visible) { // P ?>
        <td data-name="P">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_P" class="form-group patient_an_registration_P">
<input type="<?= $Grid->P->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_P" name="x<?= $Grid->RowIndex ?>_P" id="x<?= $Grid->RowIndex ?>_P" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->P->getPlaceHolder()) ?>" value="<?= $Grid->P->EditValue ?>"<?= $Grid->P->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->P->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_P" class="form-group patient_an_registration_P">
<span<?= $Grid->P->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->P->getDisplayValue($Grid->P->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" data-hidden="1" name="x<?= $Grid->RowIndex ?>_P" id="x<?= $Grid->RowIndex ?>_P" value="<?= HtmlEncode($Grid->P->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" data-hidden="1" name="o<?= $Grid->RowIndex ?>_P" id="o<?= $Grid->RowIndex ?>_P" value="<?= HtmlEncode($Grid->P->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->L->Visible) { // L ?>
        <td data-name="L">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_L" class="form-group patient_an_registration_L">
<input type="<?= $Grid->L->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_L" name="x<?= $Grid->RowIndex ?>_L" id="x<?= $Grid->RowIndex ?>_L" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->L->getPlaceHolder()) ?>" value="<?= $Grid->L->EditValue ?>"<?= $Grid->L->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->L->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_L" class="form-group patient_an_registration_L">
<span<?= $Grid->L->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->L->getDisplayValue($Grid->L->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" data-hidden="1" name="x<?= $Grid->RowIndex ?>_L" id="x<?= $Grid->RowIndex ?>_L" value="<?= HtmlEncode($Grid->L->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" data-hidden="1" name="o<?= $Grid->RowIndex ?>_L" id="o<?= $Grid->RowIndex ?>_L" value="<?= HtmlEncode($Grid->L->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A->Visible) { // A ?>
        <td data-name="A">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A" class="form-group patient_an_registration_A">
<input type="<?= $Grid->A->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A" name="x<?= $Grid->RowIndex ?>_A" id="x<?= $Grid->RowIndex ?>_A" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->A->getPlaceHolder()) ?>" value="<?= $Grid->A->EditValue ?>"<?= $Grid->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A" class="form-group patient_an_registration_A">
<span<?= $Grid->A->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A->getDisplayValue($Grid->A->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A" id="x<?= $Grid->RowIndex ?>_A" value="<?= HtmlEncode($Grid->A->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A" id="o<?= $Grid->RowIndex ?>_A" value="<?= HtmlEncode($Grid->A->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->E->Visible) { // E ?>
        <td data-name="E">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_E" class="form-group patient_an_registration_E">
<input type="<?= $Grid->E->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_E" name="x<?= $Grid->RowIndex ?>_E" id="x<?= $Grid->RowIndex ?>_E" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->E->getPlaceHolder()) ?>" value="<?= $Grid->E->EditValue ?>"<?= $Grid->E->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->E->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_E" class="form-group patient_an_registration_E">
<span<?= $Grid->E->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->E->getDisplayValue($Grid->E->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" data-hidden="1" name="x<?= $Grid->RowIndex ?>_E" id="x<?= $Grid->RowIndex ?>_E" value="<?= HtmlEncode($Grid->E->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" data-hidden="1" name="o<?= $Grid->RowIndex ?>_E" id="o<?= $Grid->RowIndex ?>_E" value="<?= HtmlEncode($Grid->E->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->M->Visible) { // M ?>
        <td data-name="M">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_M" class="form-group patient_an_registration_M">
<input type="<?= $Grid->M->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_M" name="x<?= $Grid->RowIndex ?>_M" id="x<?= $Grid->RowIndex ?>_M" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->M->getPlaceHolder()) ?>" value="<?= $Grid->M->EditValue ?>"<?= $Grid->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->M->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_M" class="form-group patient_an_registration_M">
<span<?= $Grid->M->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->M->getDisplayValue($Grid->M->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" data-hidden="1" name="x<?= $Grid->RowIndex ?>_M" id="x<?= $Grid->RowIndex ?>_M" value="<?= HtmlEncode($Grid->M->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" data-hidden="1" name="o<?= $Grid->RowIndex ?>_M" id="o<?= $Grid->RowIndex ?>_M" value="<?= HtmlEncode($Grid->M->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->LMP->Visible) { // LMP ?>
        <td data-name="LMP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_LMP" class="form-group patient_an_registration_LMP">
<input type="<?= $Grid->LMP->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_LMP" name="x<?= $Grid->RowIndex ?>_LMP" id="x<?= $Grid->RowIndex ?>_LMP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->LMP->getPlaceHolder()) ?>" value="<?= $Grid->LMP->EditValue ?>"<?= $Grid->LMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->LMP->getErrorMessage() ?></div>
<?php if (!$Grid->LMP->ReadOnly && !$Grid->LMP->Disabled && !isset($Grid->LMP->EditAttrs["readonly"]) && !isset($Grid->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_LMP" class="form-group patient_an_registration_LMP">
<span<?= $Grid->LMP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->LMP->getDisplayValue($Grid->LMP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_LMP" id="x<?= $Grid->RowIndex ?>_LMP" value="<?= HtmlEncode($Grid->LMP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LMP" id="o<?= $Grid->RowIndex ?>_LMP" value="<?= HtmlEncode($Grid->LMP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EDO->Visible) { // EDO ?>
        <td data-name="EDO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EDO" class="form-group patient_an_registration_EDO">
<input type="<?= $Grid->EDO->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EDO" name="x<?= $Grid->RowIndex ?>_EDO" id="x<?= $Grid->RowIndex ?>_EDO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EDO->getPlaceHolder()) ?>" value="<?= $Grid->EDO->EditValue ?>"<?= $Grid->EDO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EDO->getErrorMessage() ?></div>
<?php if (!$Grid->EDO->ReadOnly && !$Grid->EDO->Disabled && !isset($Grid->EDO->EditAttrs["readonly"]) && !isset($Grid->EDO->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EDO" class="form-group patient_an_registration_EDO">
<span<?= $Grid->EDO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EDO->getDisplayValue($Grid->EDO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EDO" id="x<?= $Grid->RowIndex ?>_EDO" value="<?= HtmlEncode($Grid->EDO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EDO" id="o<?= $Grid->RowIndex ?>_EDO" value="<?= HtmlEncode($Grid->EDO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <td data-name="MenstrualHistory">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_MenstrualHistory" class="form-group patient_an_registration_MenstrualHistory">
    <select
        id="x<?= $Grid->RowIndex ?>_MenstrualHistory"
        name="x<?= $Grid->RowIndex ?>_MenstrualHistory"
        class="form-control ew-select<?= $Grid->MenstrualHistory->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_MenstrualHistory"
        data-table="patient_an_registration"
        data-field="x_MenstrualHistory"
        data-value-separator="<?= $Grid->MenstrualHistory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->MenstrualHistory->getPlaceHolder()) ?>"
        <?= $Grid->MenstrualHistory->editAttributes() ?>>
        <?= $Grid->MenstrualHistory->selectOptionListHtml("x{$Grid->RowIndex}_MenstrualHistory") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->MenstrualHistory->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_MenstrualHistory']"),
        options = { name: "x<?= $Grid->RowIndex ?>_MenstrualHistory", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_MenstrualHistory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.MenstrualHistory.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.MenstrualHistory.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_MenstrualHistory" class="form-group patient_an_registration_MenstrualHistory">
<span<?= $Grid->MenstrualHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MenstrualHistory->getDisplayValue($Grid->MenstrualHistory->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MenstrualHistory" id="x<?= $Grid->RowIndex ?>_MenstrualHistory" value="<?= HtmlEncode($Grid->MenstrualHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MenstrualHistory" id="o<?= $Grid->RowIndex ?>_MenstrualHistory" value="<?= HtmlEncode($Grid->MenstrualHistory->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MaritalHistory->Visible) { // MaritalHistory ?>
        <td data-name="MaritalHistory">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_MaritalHistory" class="form-group patient_an_registration_MaritalHistory">
<input type="<?= $Grid->MaritalHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?= $Grid->RowIndex ?>_MaritalHistory" id="x<?= $Grid->RowIndex ?>_MaritalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MaritalHistory->getPlaceHolder()) ?>" value="<?= $Grid->MaritalHistory->EditValue ?>"<?= $Grid->MaritalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MaritalHistory->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_MaritalHistory" class="form-group patient_an_registration_MaritalHistory">
<span<?= $Grid->MaritalHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MaritalHistory->getDisplayValue($Grid->MaritalHistory->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MaritalHistory" id="x<?= $Grid->RowIndex ?>_MaritalHistory" value="<?= HtmlEncode($Grid->MaritalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MaritalHistory" id="o<?= $Grid->RowIndex ?>_MaritalHistory" value="<?= HtmlEncode($Grid->MaritalHistory->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ObstetricHistory->Visible) { // ObstetricHistory ?>
        <td data-name="ObstetricHistory">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ObstetricHistory" class="form-group patient_an_registration_ObstetricHistory">
<input type="<?= $Grid->ObstetricHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?= $Grid->RowIndex ?>_ObstetricHistory" id="x<?= $Grid->RowIndex ?>_ObstetricHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ObstetricHistory->getPlaceHolder()) ?>" value="<?= $Grid->ObstetricHistory->EditValue ?>"<?= $Grid->ObstetricHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ObstetricHistory->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ObstetricHistory" class="form-group patient_an_registration_ObstetricHistory">
<span<?= $Grid->ObstetricHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ObstetricHistory->getDisplayValue($Grid->ObstetricHistory->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ObstetricHistory" id="x<?= $Grid->RowIndex ?>_ObstetricHistory" value="<?= HtmlEncode($Grid->ObstetricHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ObstetricHistory" id="o<?= $Grid->RowIndex ?>_ObstetricHistory" value="<?= HtmlEncode($Grid->ObstetricHistory->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
        <td data-name="PreviousHistoryofGDM">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofGDM" class="form-group patient_an_registration_PreviousHistoryofGDM">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM"
        class="form-control ew-select<?= $Grid->PreviousHistoryofGDM->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofGDM"
        data-value-separator="<?= $Grid->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofGDM->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofGDM->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofGDM->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofGDM") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofGDM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofGDM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofGDM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofGDM" class="form-group patient_an_registration_PreviousHistoryofGDM">
<span<?= $Grid->PreviousHistoryofGDM->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PreviousHistoryofGDM->getDisplayValue($Grid->PreviousHistoryofGDM->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM" id="x<?= $Grid->RowIndex ?>_PreviousHistoryofGDM" value="<?= HtmlEncode($Grid->PreviousHistoryofGDM->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreviousHistoryofGDM" id="o<?= $Grid->RowIndex ?>_PreviousHistoryofGDM" value="<?= HtmlEncode($Grid->PreviousHistoryofGDM->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
        <td data-name="PreviousHistorofPIH">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistorofPIH" class="form-group patient_an_registration_PreviousHistorofPIH">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistorofPIH"
        name="x<?= $Grid->RowIndex ?>_PreviousHistorofPIH"
        class="form-control ew-select<?= $Grid->PreviousHistorofPIH->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistorofPIH"
        data-table="patient_an_registration"
        data-field="x_PreviousHistorofPIH"
        data-value-separator="<?= $Grid->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistorofPIH->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistorofPIH->editAttributes() ?>>
        <?= $Grid->PreviousHistorofPIH->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistorofPIH") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistorofPIH->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistorofPIH']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistorofPIH", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistorofPIH", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistorofPIH.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistorofPIH.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistorofPIH" class="form-group patient_an_registration_PreviousHistorofPIH">
<span<?= $Grid->PreviousHistorofPIH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PreviousHistorofPIH->getDisplayValue($Grid->PreviousHistorofPIH->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PreviousHistorofPIH" id="x<?= $Grid->RowIndex ?>_PreviousHistorofPIH" value="<?= HtmlEncode($Grid->PreviousHistorofPIH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreviousHistorofPIH" id="o<?= $Grid->RowIndex ?>_PreviousHistorofPIH" value="<?= HtmlEncode($Grid->PreviousHistorofPIH->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
        <td data-name="PreviousHistoryofIUGR">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofIUGR" class="form-group patient_an_registration_PreviousHistoryofIUGR">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR"
        class="form-control ew-select<?= $Grid->PreviousHistoryofIUGR->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofIUGR"
        data-value-separator="<?= $Grid->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofIUGR->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofIUGR->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofIUGR->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofIUGR") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofIUGR->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofIUGR.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofIUGR.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofIUGR" class="form-group patient_an_registration_PreviousHistoryofIUGR">
<span<?= $Grid->PreviousHistoryofIUGR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PreviousHistoryofIUGR->getDisplayValue($Grid->PreviousHistoryofIUGR->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR" id="x<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?= HtmlEncode($Grid->PreviousHistoryofIUGR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR" id="o<?= $Grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?= HtmlEncode($Grid->PreviousHistoryofIUGR->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
        <td data-name="PreviousHistoryofOligohydramnios">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group patient_an_registration_PreviousHistoryofOligohydramnios">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios"
        class="form-control ew-select<?= $Grid->PreviousHistoryofOligohydramnios->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofOligohydramnios"
        data-value-separator="<?= $Grid->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofOligohydramnios->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofOligohydramnios->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofOligohydramnios->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofOligohydramnios") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofOligohydramnios->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofOligohydramnios.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofOligohydramnios.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?= $Grid->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PreviousHistoryofOligohydramnios->getDisplayValue($Grid->PreviousHistoryofOligohydramnios->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="x<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?= HtmlEncode($Grid->PreviousHistoryofOligohydramnios->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="o<?= $Grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?= HtmlEncode($Grid->PreviousHistoryofOligohydramnios->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
        <td data-name="PreviousHistoryofPreterm">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofPreterm" class="form-group patient_an_registration_PreviousHistoryofPreterm">
    <select
        id="x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm"
        name="x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm"
        class="form-control ew-select<?= $Grid->PreviousHistoryofPreterm->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofPreterm"
        data-value-separator="<?= $Grid->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PreviousHistoryofPreterm->getPlaceHolder()) ?>"
        <?= $Grid->PreviousHistoryofPreterm->editAttributes() ?>>
        <?= $Grid->PreviousHistoryofPreterm->selectOptionListHtml("x{$Grid->RowIndex}_PreviousHistoryofPreterm") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PreviousHistoryofPreterm->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofPreterm.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofPreterm.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofPreterm" class="form-group patient_an_registration_PreviousHistoryofPreterm">
<span<?= $Grid->PreviousHistoryofPreterm->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PreviousHistoryofPreterm->getDisplayValue($Grid->PreviousHistoryofPreterm->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm" id="x<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?= HtmlEncode($Grid->PreviousHistoryofPreterm->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm" id="o<?= $Grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?= HtmlEncode($Grid->PreviousHistoryofPreterm->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->G1->Visible) { // G1 ?>
        <td data-name="G1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G1" class="form-group patient_an_registration_G1">
<input type="<?= $Grid->G1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G1" name="x<?= $Grid->RowIndex ?>_G1" id="x<?= $Grid->RowIndex ?>_G1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->G1->getPlaceHolder()) ?>" value="<?= $Grid->G1->EditValue ?>"<?= $Grid->G1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G1" class="form-group patient_an_registration_G1">
<span<?= $Grid->G1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->G1->getDisplayValue($Grid->G1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_G1" id="x<?= $Grid->RowIndex ?>_G1" value="<?= HtmlEncode($Grid->G1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_G1" id="o<?= $Grid->RowIndex ?>_G1" value="<?= HtmlEncode($Grid->G1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->G2->Visible) { // G2 ?>
        <td data-name="G2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G2" class="form-group patient_an_registration_G2">
<input type="<?= $Grid->G2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G2" name="x<?= $Grid->RowIndex ?>_G2" id="x<?= $Grid->RowIndex ?>_G2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->G2->getPlaceHolder()) ?>" value="<?= $Grid->G2->EditValue ?>"<?= $Grid->G2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G2" class="form-group patient_an_registration_G2">
<span<?= $Grid->G2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->G2->getDisplayValue($Grid->G2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_G2" id="x<?= $Grid->RowIndex ?>_G2" value="<?= HtmlEncode($Grid->G2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_G2" id="o<?= $Grid->RowIndex ?>_G2" value="<?= HtmlEncode($Grid->G2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->G3->Visible) { // G3 ?>
        <td data-name="G3">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G3" class="form-group patient_an_registration_G3">
<input type="<?= $Grid->G3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G3" name="x<?= $Grid->RowIndex ?>_G3" id="x<?= $Grid->RowIndex ?>_G3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->G3->getPlaceHolder()) ?>" value="<?= $Grid->G3->EditValue ?>"<?= $Grid->G3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->G3->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G3" class="form-group patient_an_registration_G3">
<span<?= $Grid->G3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->G3->getDisplayValue($Grid->G3->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" data-hidden="1" name="x<?= $Grid->RowIndex ?>_G3" id="x<?= $Grid->RowIndex ?>_G3" value="<?= HtmlEncode($Grid->G3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_G3" id="o<?= $Grid->RowIndex ?>_G3" value="<?= HtmlEncode($Grid->G3->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
        <td data-name="DeliveryNDLSCS1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS1" class="form-group patient_an_registration_DeliveryNDLSCS1">
<input type="<?= $Grid->DeliveryNDLSCS1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryNDLSCS1->EditValue ?>"<?= $Grid->DeliveryNDLSCS1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryNDLSCS1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS1" class="form-group patient_an_registration_DeliveryNDLSCS1">
<span<?= $Grid->DeliveryNDLSCS1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DeliveryNDLSCS1->getDisplayValue($Grid->DeliveryNDLSCS1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" value="<?= HtmlEncode($Grid->DeliveryNDLSCS1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" id="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS1" value="<?= HtmlEncode($Grid->DeliveryNDLSCS1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
        <td data-name="DeliveryNDLSCS2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS2" class="form-group patient_an_registration_DeliveryNDLSCS2">
<input type="<?= $Grid->DeliveryNDLSCS2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryNDLSCS2->EditValue ?>"<?= $Grid->DeliveryNDLSCS2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryNDLSCS2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS2" class="form-group patient_an_registration_DeliveryNDLSCS2">
<span<?= $Grid->DeliveryNDLSCS2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DeliveryNDLSCS2->getDisplayValue($Grid->DeliveryNDLSCS2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" value="<?= HtmlEncode($Grid->DeliveryNDLSCS2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" id="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS2" value="<?= HtmlEncode($Grid->DeliveryNDLSCS2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
        <td data-name="DeliveryNDLSCS3">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS3" class="form-group patient_an_registration_DeliveryNDLSCS3">
<input type="<?= $Grid->DeliveryNDLSCS3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?= $Grid->DeliveryNDLSCS3->EditValue ?>"<?= $Grid->DeliveryNDLSCS3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeliveryNDLSCS3->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS3" class="form-group patient_an_registration_DeliveryNDLSCS3">
<span<?= $Grid->DeliveryNDLSCS3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DeliveryNDLSCS3->getDisplayValue($Grid->DeliveryNDLSCS3->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" value="<?= HtmlEncode($Grid->DeliveryNDLSCS3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" id="o<?= $Grid->RowIndex ?>_DeliveryNDLSCS3" value="<?= HtmlEncode($Grid->DeliveryNDLSCS3->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BabySexweight1->Visible) { // BabySexweight1 ?>
        <td data-name="BabySexweight1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight1" class="form-group patient_an_registration_BabySexweight1">
<input type="<?= $Grid->BabySexweight1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?= $Grid->RowIndex ?>_BabySexweight1" id="x<?= $Grid->RowIndex ?>_BabySexweight1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BabySexweight1->getPlaceHolder()) ?>" value="<?= $Grid->BabySexweight1->EditValue ?>"<?= $Grid->BabySexweight1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BabySexweight1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight1" class="form-group patient_an_registration_BabySexweight1">
<span<?= $Grid->BabySexweight1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BabySexweight1->getDisplayValue($Grid->BabySexweight1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BabySexweight1" id="x<?= $Grid->RowIndex ?>_BabySexweight1" value="<?= HtmlEncode($Grid->BabySexweight1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BabySexweight1" id="o<?= $Grid->RowIndex ?>_BabySexweight1" value="<?= HtmlEncode($Grid->BabySexweight1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BabySexweight2->Visible) { // BabySexweight2 ?>
        <td data-name="BabySexweight2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight2" class="form-group patient_an_registration_BabySexweight2">
<input type="<?= $Grid->BabySexweight2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?= $Grid->RowIndex ?>_BabySexweight2" id="x<?= $Grid->RowIndex ?>_BabySexweight2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BabySexweight2->getPlaceHolder()) ?>" value="<?= $Grid->BabySexweight2->EditValue ?>"<?= $Grid->BabySexweight2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BabySexweight2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight2" class="form-group patient_an_registration_BabySexweight2">
<span<?= $Grid->BabySexweight2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BabySexweight2->getDisplayValue($Grid->BabySexweight2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BabySexweight2" id="x<?= $Grid->RowIndex ?>_BabySexweight2" value="<?= HtmlEncode($Grid->BabySexweight2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BabySexweight2" id="o<?= $Grid->RowIndex ?>_BabySexweight2" value="<?= HtmlEncode($Grid->BabySexweight2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BabySexweight3->Visible) { // BabySexweight3 ?>
        <td data-name="BabySexweight3">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight3" class="form-group patient_an_registration_BabySexweight3">
<input type="<?= $Grid->BabySexweight3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?= $Grid->RowIndex ?>_BabySexweight3" id="x<?= $Grid->RowIndex ?>_BabySexweight3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BabySexweight3->getPlaceHolder()) ?>" value="<?= $Grid->BabySexweight3->EditValue ?>"<?= $Grid->BabySexweight3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BabySexweight3->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight3" class="form-group patient_an_registration_BabySexweight3">
<span<?= $Grid->BabySexweight3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BabySexweight3->getDisplayValue($Grid->BabySexweight3->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BabySexweight3" id="x<?= $Grid->RowIndex ?>_BabySexweight3" value="<?= HtmlEncode($Grid->BabySexweight3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BabySexweight3" id="o<?= $Grid->RowIndex ?>_BabySexweight3" value="<?= HtmlEncode($Grid->BabySexweight3->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
        <td data-name="PastMedicalHistory">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistory" class="form-group patient_an_registration_PastMedicalHistory">
<template id="tp_x<?= $Grid->RowIndex ?>_PastMedicalHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="x<?= $Grid->RowIndex ?>_PastMedicalHistory" id="x<?= $Grid->RowIndex ?>_PastMedicalHistory"<?= $Grid->PastMedicalHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PastMedicalHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PastMedicalHistory[]"
    name="x<?= $Grid->RowIndex ?>_PastMedicalHistory[]"
    value="<?= HtmlEncode($Grid->PastMedicalHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_PastMedicalHistory"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PastMedicalHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PastMedicalHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_PastMedicalHistory"
    data-value-separator="<?= $Grid->PastMedicalHistory->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PastMedicalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastMedicalHistory->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistory" class="form-group patient_an_registration_PastMedicalHistory">
<span<?= $Grid->PastMedicalHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PastMedicalHistory->getDisplayValue($Grid->PastMedicalHistory->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PastMedicalHistory" id="x<?= $Grid->RowIndex ?>_PastMedicalHistory" value="<?= HtmlEncode($Grid->PastMedicalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PastMedicalHistory[]" id="o<?= $Grid->RowIndex ?>_PastMedicalHistory[]" value="<?= HtmlEncode($Grid->PastMedicalHistory->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
        <td data-name="PastSurgicalHistory">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistory" class="form-group patient_an_registration_PastSurgicalHistory">
<template id="tp_x<?= $Grid->RowIndex ?>_PastSurgicalHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="x<?= $Grid->RowIndex ?>_PastSurgicalHistory" id="x<?= $Grid->RowIndex ?>_PastSurgicalHistory"<?= $Grid->PastSurgicalHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PastSurgicalHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PastSurgicalHistory[]"
    name="x<?= $Grid->RowIndex ?>_PastSurgicalHistory[]"
    value="<?= HtmlEncode($Grid->PastSurgicalHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_PastSurgicalHistory"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PastSurgicalHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PastSurgicalHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_PastSurgicalHistory"
    data-value-separator="<?= $Grid->PastSurgicalHistory->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PastSurgicalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastSurgicalHistory->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistory" class="form-group patient_an_registration_PastSurgicalHistory">
<span<?= $Grid->PastSurgicalHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PastSurgicalHistory->getDisplayValue($Grid->PastSurgicalHistory->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PastSurgicalHistory" id="x<?= $Grid->RowIndex ?>_PastSurgicalHistory" value="<?= HtmlEncode($Grid->PastSurgicalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PastSurgicalHistory[]" id="o<?= $Grid->RowIndex ?>_PastSurgicalHistory[]" value="<?= HtmlEncode($Grid->PastSurgicalHistory->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FamilyHistory->Visible) { // FamilyHistory ?>
        <td data-name="FamilyHistory">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistory" class="form-group patient_an_registration_FamilyHistory">
<template id="tp_x<?= $Grid->RowIndex ?>_FamilyHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_FamilyHistory" name="x<?= $Grid->RowIndex ?>_FamilyHistory" id="x<?= $Grid->RowIndex ?>_FamilyHistory"<?= $Grid->FamilyHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_FamilyHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_FamilyHistory[]"
    name="x<?= $Grid->RowIndex ?>_FamilyHistory[]"
    value="<?= HtmlEncode($Grid->FamilyHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_FamilyHistory"
    data-target="dsl_x<?= $Grid->RowIndex ?>_FamilyHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->FamilyHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_FamilyHistory"
    data-value-separator="<?= $Grid->FamilyHistory->displayValueSeparatorAttribute() ?>"
    <?= $Grid->FamilyHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FamilyHistory->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistory" class="form-group patient_an_registration_FamilyHistory">
<span<?= $Grid->FamilyHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FamilyHistory->getDisplayValue($Grid->FamilyHistory->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FamilyHistory" id="x<?= $Grid->RowIndex ?>_FamilyHistory" value="<?= HtmlEncode($Grid->FamilyHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FamilyHistory[]" id="o<?= $Grid->RowIndex ?>_FamilyHistory[]" value="<?= HtmlEncode($Grid->FamilyHistory->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Viability->Visible) { // Viability ?>
        <td data-name="Viability">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability" class="form-group patient_an_registration_Viability">
<input type="<?= $Grid->Viability->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability" name="x<?= $Grid->RowIndex ?>_Viability" id="x<?= $Grid->RowIndex ?>_Viability" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability->getPlaceHolder()) ?>" value="<?= $Grid->Viability->EditValue ?>"<?= $Grid->Viability->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability" class="form-group patient_an_registration_Viability">
<span<?= $Grid->Viability->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Viability->getDisplayValue($Grid->Viability->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Viability" id="x<?= $Grid->RowIndex ?>_Viability" value="<?= HtmlEncode($Grid->Viability->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Viability" id="o<?= $Grid->RowIndex ?>_Viability" value="<?= HtmlEncode($Grid->Viability->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ViabilityDATE->Visible) { // ViabilityDATE ?>
        <td data-name="ViabilityDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityDATE" class="form-group patient_an_registration_ViabilityDATE">
<input type="<?= $Grid->ViabilityDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?= $Grid->RowIndex ?>_ViabilityDATE" id="x<?= $Grid->RowIndex ?>_ViabilityDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ViabilityDATE->getPlaceHolder()) ?>" value="<?= $Grid->ViabilityDATE->EditValue ?>"<?= $Grid->ViabilityDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ViabilityDATE->getErrorMessage() ?></div>
<?php if (!$Grid->ViabilityDATE->ReadOnly && !$Grid->ViabilityDATE->Disabled && !isset($Grid->ViabilityDATE->EditAttrs["readonly"]) && !isset($Grid->ViabilityDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityDATE" class="form-group patient_an_registration_ViabilityDATE">
<span<?= $Grid->ViabilityDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ViabilityDATE->getDisplayValue($Grid->ViabilityDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ViabilityDATE" id="x<?= $Grid->RowIndex ?>_ViabilityDATE" value="<?= HtmlEncode($Grid->ViabilityDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ViabilityDATE" id="o<?= $Grid->RowIndex ?>_ViabilityDATE" value="<?= HtmlEncode($Grid->ViabilityDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
        <td data-name="ViabilityREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityREPORT" class="form-group patient_an_registration_ViabilityREPORT">
<input type="<?= $Grid->ViabilityREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?= $Grid->RowIndex ?>_ViabilityREPORT" id="x<?= $Grid->RowIndex ?>_ViabilityREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ViabilityREPORT->getPlaceHolder()) ?>" value="<?= $Grid->ViabilityREPORT->EditValue ?>"<?= $Grid->ViabilityREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ViabilityREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityREPORT" class="form-group patient_an_registration_ViabilityREPORT">
<span<?= $Grid->ViabilityREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ViabilityREPORT->getDisplayValue($Grid->ViabilityREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ViabilityREPORT" id="x<?= $Grid->RowIndex ?>_ViabilityREPORT" value="<?= HtmlEncode($Grid->ViabilityREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ViabilityREPORT" id="o<?= $Grid->RowIndex ?>_ViabilityREPORT" value="<?= HtmlEncode($Grid->ViabilityREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Viability2->Visible) { // Viability2 ?>
        <td data-name="Viability2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability2" class="form-group patient_an_registration_Viability2">
<input type="<?= $Grid->Viability2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2" name="x<?= $Grid->RowIndex ?>_Viability2" id="x<?= $Grid->RowIndex ?>_Viability2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability2->getPlaceHolder()) ?>" value="<?= $Grid->Viability2->EditValue ?>"<?= $Grid->Viability2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability2" class="form-group patient_an_registration_Viability2">
<span<?= $Grid->Viability2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Viability2->getDisplayValue($Grid->Viability2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Viability2" id="x<?= $Grid->RowIndex ?>_Viability2" value="<?= HtmlEncode($Grid->Viability2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Viability2" id="o<?= $Grid->RowIndex ?>_Viability2" value="<?= HtmlEncode($Grid->Viability2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Viability2DATE->Visible) { // Viability2DATE ?>
        <td data-name="Viability2DATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability2DATE" class="form-group patient_an_registration_Viability2DATE">
<input type="<?= $Grid->Viability2DATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?= $Grid->RowIndex ?>_Viability2DATE" id="x<?= $Grid->RowIndex ?>_Viability2DATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability2DATE->getPlaceHolder()) ?>" value="<?= $Grid->Viability2DATE->EditValue ?>"<?= $Grid->Viability2DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability2DATE->getErrorMessage() ?></div>
<?php if (!$Grid->Viability2DATE->ReadOnly && !$Grid->Viability2DATE->Disabled && !isset($Grid->Viability2DATE->EditAttrs["readonly"]) && !isset($Grid->Viability2DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability2DATE" class="form-group patient_an_registration_Viability2DATE">
<span<?= $Grid->Viability2DATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Viability2DATE->getDisplayValue($Grid->Viability2DATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Viability2DATE" id="x<?= $Grid->RowIndex ?>_Viability2DATE" value="<?= HtmlEncode($Grid->Viability2DATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Viability2DATE" id="o<?= $Grid->RowIndex ?>_Viability2DATE" value="<?= HtmlEncode($Grid->Viability2DATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Viability2REPORT->Visible) { // Viability2REPORT ?>
        <td data-name="Viability2REPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability2REPORT" class="form-group patient_an_registration_Viability2REPORT">
<input type="<?= $Grid->Viability2REPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?= $Grid->RowIndex ?>_Viability2REPORT" id="x<?= $Grid->RowIndex ?>_Viability2REPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Viability2REPORT->getPlaceHolder()) ?>" value="<?= $Grid->Viability2REPORT->EditValue ?>"<?= $Grid->Viability2REPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Viability2REPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability2REPORT" class="form-group patient_an_registration_Viability2REPORT">
<span<?= $Grid->Viability2REPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Viability2REPORT->getDisplayValue($Grid->Viability2REPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Viability2REPORT" id="x<?= $Grid->RowIndex ?>_Viability2REPORT" value="<?= HtmlEncode($Grid->Viability2REPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Viability2REPORT" id="o<?= $Grid->RowIndex ?>_Viability2REPORT" value="<?= HtmlEncode($Grid->Viability2REPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NTscan->Visible) { // NTscan ?>
        <td data-name="NTscan">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NTscan" class="form-group patient_an_registration_NTscan">
<input type="<?= $Grid->NTscan->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscan" name="x<?= $Grid->RowIndex ?>_NTscan" id="x<?= $Grid->RowIndex ?>_NTscan" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NTscan->getPlaceHolder()) ?>" value="<?= $Grid->NTscan->EditValue ?>"<?= $Grid->NTscan->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NTscan->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NTscan" class="form-group patient_an_registration_NTscan">
<span<?= $Grid->NTscan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NTscan->getDisplayValue($Grid->NTscan->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NTscan" id="x<?= $Grid->RowIndex ?>_NTscan" value="<?= HtmlEncode($Grid->NTscan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NTscan" id="o<?= $Grid->RowIndex ?>_NTscan" value="<?= HtmlEncode($Grid->NTscan->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NTscanDATE->Visible) { // NTscanDATE ?>
        <td data-name="NTscanDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NTscanDATE" class="form-group patient_an_registration_NTscanDATE">
<input type="<?= $Grid->NTscanDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?= $Grid->RowIndex ?>_NTscanDATE" id="x<?= $Grid->RowIndex ?>_NTscanDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NTscanDATE->getPlaceHolder()) ?>" value="<?= $Grid->NTscanDATE->EditValue ?>"<?= $Grid->NTscanDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NTscanDATE->getErrorMessage() ?></div>
<?php if (!$Grid->NTscanDATE->ReadOnly && !$Grid->NTscanDATE->Disabled && !isset($Grid->NTscanDATE->EditAttrs["readonly"]) && !isset($Grid->NTscanDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NTscanDATE" class="form-group patient_an_registration_NTscanDATE">
<span<?= $Grid->NTscanDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NTscanDATE->getDisplayValue($Grid->NTscanDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NTscanDATE" id="x<?= $Grid->RowIndex ?>_NTscanDATE" value="<?= HtmlEncode($Grid->NTscanDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NTscanDATE" id="o<?= $Grid->RowIndex ?>_NTscanDATE" value="<?= HtmlEncode($Grid->NTscanDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NTscanREPORT->Visible) { // NTscanREPORT ?>
        <td data-name="NTscanREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NTscanREPORT" class="form-group patient_an_registration_NTscanREPORT">
<input type="<?= $Grid->NTscanREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?= $Grid->RowIndex ?>_NTscanREPORT" id="x<?= $Grid->RowIndex ?>_NTscanREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NTscanREPORT->getPlaceHolder()) ?>" value="<?= $Grid->NTscanREPORT->EditValue ?>"<?= $Grid->NTscanREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NTscanREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NTscanREPORT" class="form-group patient_an_registration_NTscanREPORT">
<span<?= $Grid->NTscanREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NTscanREPORT->getDisplayValue($Grid->NTscanREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NTscanREPORT" id="x<?= $Grid->RowIndex ?>_NTscanREPORT" value="<?= HtmlEncode($Grid->NTscanREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NTscanREPORT" id="o<?= $Grid->RowIndex ?>_NTscanREPORT" value="<?= HtmlEncode($Grid->NTscanREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EarlyTarget->Visible) { // EarlyTarget ?>
        <td data-name="EarlyTarget">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTarget" class="form-group patient_an_registration_EarlyTarget">
<input type="<?= $Grid->EarlyTarget->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?= $Grid->RowIndex ?>_EarlyTarget" id="x<?= $Grid->RowIndex ?>_EarlyTarget" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EarlyTarget->getPlaceHolder()) ?>" value="<?= $Grid->EarlyTarget->EditValue ?>"<?= $Grid->EarlyTarget->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EarlyTarget->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTarget" class="form-group patient_an_registration_EarlyTarget">
<span<?= $Grid->EarlyTarget->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EarlyTarget->getDisplayValue($Grid->EarlyTarget->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EarlyTarget" id="x<?= $Grid->RowIndex ?>_EarlyTarget" value="<?= HtmlEncode($Grid->EarlyTarget->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EarlyTarget" id="o<?= $Grid->RowIndex ?>_EarlyTarget" value="<?= HtmlEncode($Grid->EarlyTarget->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
        <td data-name="EarlyTargetDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetDATE" class="form-group patient_an_registration_EarlyTargetDATE">
<input type="<?= $Grid->EarlyTargetDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?= $Grid->RowIndex ?>_EarlyTargetDATE" id="x<?= $Grid->RowIndex ?>_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?= $Grid->EarlyTargetDATE->EditValue ?>"<?= $Grid->EarlyTargetDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EarlyTargetDATE->getErrorMessage() ?></div>
<?php if (!$Grid->EarlyTargetDATE->ReadOnly && !$Grid->EarlyTargetDATE->Disabled && !isset($Grid->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($Grid->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetDATE" class="form-group patient_an_registration_EarlyTargetDATE">
<span<?= $Grid->EarlyTargetDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EarlyTargetDATE->getDisplayValue($Grid->EarlyTargetDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EarlyTargetDATE" id="x<?= $Grid->RowIndex ?>_EarlyTargetDATE" value="<?= HtmlEncode($Grid->EarlyTargetDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EarlyTargetDATE" id="o<?= $Grid->RowIndex ?>_EarlyTargetDATE" value="<?= HtmlEncode($Grid->EarlyTargetDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
        <td data-name="EarlyTargetREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetREPORT" class="form-group patient_an_registration_EarlyTargetREPORT">
<input type="<?= $Grid->EarlyTargetREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?= $Grid->RowIndex ?>_EarlyTargetREPORT" id="x<?= $Grid->RowIndex ?>_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?= $Grid->EarlyTargetREPORT->EditValue ?>"<?= $Grid->EarlyTargetREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EarlyTargetREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetREPORT" class="form-group patient_an_registration_EarlyTargetREPORT">
<span<?= $Grid->EarlyTargetREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EarlyTargetREPORT->getDisplayValue($Grid->EarlyTargetREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EarlyTargetREPORT" id="x<?= $Grid->RowIndex ?>_EarlyTargetREPORT" value="<?= HtmlEncode($Grid->EarlyTargetREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EarlyTargetREPORT" id="o<?= $Grid->RowIndex ?>_EarlyTargetREPORT" value="<?= HtmlEncode($Grid->EarlyTargetREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Anomaly->Visible) { // Anomaly ?>
        <td data-name="Anomaly">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Anomaly" class="form-group patient_an_registration_Anomaly">
<input type="<?= $Grid->Anomaly->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?= $Grid->RowIndex ?>_Anomaly" id="x<?= $Grid->RowIndex ?>_Anomaly" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Anomaly->getPlaceHolder()) ?>" value="<?= $Grid->Anomaly->EditValue ?>"<?= $Grid->Anomaly->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Anomaly->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Anomaly" class="form-group patient_an_registration_Anomaly">
<span<?= $Grid->Anomaly->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Anomaly->getDisplayValue($Grid->Anomaly->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Anomaly" id="x<?= $Grid->RowIndex ?>_Anomaly" value="<?= HtmlEncode($Grid->Anomaly->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Anomaly" id="o<?= $Grid->RowIndex ?>_Anomaly" value="<?= HtmlEncode($Grid->Anomaly->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AnomalyDATE->Visible) { // AnomalyDATE ?>
        <td data-name="AnomalyDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyDATE" class="form-group patient_an_registration_AnomalyDATE">
<input type="<?= $Grid->AnomalyDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?= $Grid->RowIndex ?>_AnomalyDATE" id="x<?= $Grid->RowIndex ?>_AnomalyDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnomalyDATE->getPlaceHolder()) ?>" value="<?= $Grid->AnomalyDATE->EditValue ?>"<?= $Grid->AnomalyDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnomalyDATE->getErrorMessage() ?></div>
<?php if (!$Grid->AnomalyDATE->ReadOnly && !$Grid->AnomalyDATE->Disabled && !isset($Grid->AnomalyDATE->EditAttrs["readonly"]) && !isset($Grid->AnomalyDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyDATE" class="form-group patient_an_registration_AnomalyDATE">
<span<?= $Grid->AnomalyDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AnomalyDATE->getDisplayValue($Grid->AnomalyDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AnomalyDATE" id="x<?= $Grid->RowIndex ?>_AnomalyDATE" value="<?= HtmlEncode($Grid->AnomalyDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnomalyDATE" id="o<?= $Grid->RowIndex ?>_AnomalyDATE" value="<?= HtmlEncode($Grid->AnomalyDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
        <td data-name="AnomalyREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyREPORT" class="form-group patient_an_registration_AnomalyREPORT">
<input type="<?= $Grid->AnomalyREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?= $Grid->RowIndex ?>_AnomalyREPORT" id="x<?= $Grid->RowIndex ?>_AnomalyREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnomalyREPORT->getPlaceHolder()) ?>" value="<?= $Grid->AnomalyREPORT->EditValue ?>"<?= $Grid->AnomalyREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnomalyREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyREPORT" class="form-group patient_an_registration_AnomalyREPORT">
<span<?= $Grid->AnomalyREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AnomalyREPORT->getDisplayValue($Grid->AnomalyREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AnomalyREPORT" id="x<?= $Grid->RowIndex ?>_AnomalyREPORT" value="<?= HtmlEncode($Grid->AnomalyREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnomalyREPORT" id="o<?= $Grid->RowIndex ?>_AnomalyREPORT" value="<?= HtmlEncode($Grid->AnomalyREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Growth->Visible) { // Growth ?>
        <td data-name="Growth">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth" class="form-group patient_an_registration_Growth">
<input type="<?= $Grid->Growth->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth" name="x<?= $Grid->RowIndex ?>_Growth" id="x<?= $Grid->RowIndex ?>_Growth" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth->getPlaceHolder()) ?>" value="<?= $Grid->Growth->EditValue ?>"<?= $Grid->Growth->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth" class="form-group patient_an_registration_Growth">
<span<?= $Grid->Growth->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Growth->getDisplayValue($Grid->Growth->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Growth" id="x<?= $Grid->RowIndex ?>_Growth" value="<?= HtmlEncode($Grid->Growth->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Growth" id="o<?= $Grid->RowIndex ?>_Growth" value="<?= HtmlEncode($Grid->Growth->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GrowthDATE->Visible) { // GrowthDATE ?>
        <td data-name="GrowthDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_GrowthDATE" class="form-group patient_an_registration_GrowthDATE">
<input type="<?= $Grid->GrowthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?= $Grid->RowIndex ?>_GrowthDATE" id="x<?= $Grid->RowIndex ?>_GrowthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GrowthDATE->getPlaceHolder()) ?>" value="<?= $Grid->GrowthDATE->EditValue ?>"<?= $Grid->GrowthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrowthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->GrowthDATE->ReadOnly && !$Grid->GrowthDATE->Disabled && !isset($Grid->GrowthDATE->EditAttrs["readonly"]) && !isset($Grid->GrowthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_GrowthDATE" class="form-group patient_an_registration_GrowthDATE">
<span<?= $Grid->GrowthDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GrowthDATE->getDisplayValue($Grid->GrowthDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GrowthDATE" id="x<?= $Grid->RowIndex ?>_GrowthDATE" value="<?= HtmlEncode($Grid->GrowthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GrowthDATE" id="o<?= $Grid->RowIndex ?>_GrowthDATE" value="<?= HtmlEncode($Grid->GrowthDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GrowthREPORT->Visible) { // GrowthREPORT ?>
        <td data-name="GrowthREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_GrowthREPORT" class="form-group patient_an_registration_GrowthREPORT">
<input type="<?= $Grid->GrowthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?= $Grid->RowIndex ?>_GrowthREPORT" id="x<?= $Grid->RowIndex ?>_GrowthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GrowthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->GrowthREPORT->EditValue ?>"<?= $Grid->GrowthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrowthREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_GrowthREPORT" class="form-group patient_an_registration_GrowthREPORT">
<span<?= $Grid->GrowthREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GrowthREPORT->getDisplayValue($Grid->GrowthREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GrowthREPORT" id="x<?= $Grid->RowIndex ?>_GrowthREPORT" value="<?= HtmlEncode($Grid->GrowthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GrowthREPORT" id="o<?= $Grid->RowIndex ?>_GrowthREPORT" value="<?= HtmlEncode($Grid->GrowthREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Growth1->Visible) { // Growth1 ?>
        <td data-name="Growth1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth1" class="form-group patient_an_registration_Growth1">
<input type="<?= $Grid->Growth1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1" name="x<?= $Grid->RowIndex ?>_Growth1" id="x<?= $Grid->RowIndex ?>_Growth1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth1->getPlaceHolder()) ?>" value="<?= $Grid->Growth1->EditValue ?>"<?= $Grid->Growth1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth1" class="form-group patient_an_registration_Growth1">
<span<?= $Grid->Growth1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Growth1->getDisplayValue($Grid->Growth1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Growth1" id="x<?= $Grid->RowIndex ?>_Growth1" value="<?= HtmlEncode($Grid->Growth1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Growth1" id="o<?= $Grid->RowIndex ?>_Growth1" value="<?= HtmlEncode($Grid->Growth1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Growth1DATE->Visible) { // Growth1DATE ?>
        <td data-name="Growth1DATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth1DATE" class="form-group patient_an_registration_Growth1DATE">
<input type="<?= $Grid->Growth1DATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?= $Grid->RowIndex ?>_Growth1DATE" id="x<?= $Grid->RowIndex ?>_Growth1DATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth1DATE->getPlaceHolder()) ?>" value="<?= $Grid->Growth1DATE->EditValue ?>"<?= $Grid->Growth1DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth1DATE->getErrorMessage() ?></div>
<?php if (!$Grid->Growth1DATE->ReadOnly && !$Grid->Growth1DATE->Disabled && !isset($Grid->Growth1DATE->EditAttrs["readonly"]) && !isset($Grid->Growth1DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth1DATE" class="form-group patient_an_registration_Growth1DATE">
<span<?= $Grid->Growth1DATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Growth1DATE->getDisplayValue($Grid->Growth1DATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Growth1DATE" id="x<?= $Grid->RowIndex ?>_Growth1DATE" value="<?= HtmlEncode($Grid->Growth1DATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Growth1DATE" id="o<?= $Grid->RowIndex ?>_Growth1DATE" value="<?= HtmlEncode($Grid->Growth1DATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Growth1REPORT->Visible) { // Growth1REPORT ?>
        <td data-name="Growth1REPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth1REPORT" class="form-group patient_an_registration_Growth1REPORT">
<input type="<?= $Grid->Growth1REPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?= $Grid->RowIndex ?>_Growth1REPORT" id="x<?= $Grid->RowIndex ?>_Growth1REPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Growth1REPORT->getPlaceHolder()) ?>" value="<?= $Grid->Growth1REPORT->EditValue ?>"<?= $Grid->Growth1REPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Growth1REPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth1REPORT" class="form-group patient_an_registration_Growth1REPORT">
<span<?= $Grid->Growth1REPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Growth1REPORT->getDisplayValue($Grid->Growth1REPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Growth1REPORT" id="x<?= $Grid->RowIndex ?>_Growth1REPORT" value="<?= HtmlEncode($Grid->Growth1REPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Growth1REPORT" id="o<?= $Grid->RowIndex ?>_Growth1REPORT" value="<?= HtmlEncode($Grid->Growth1REPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ANProfile->Visible) { // ANProfile ?>
        <td data-name="ANProfile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfile" class="form-group patient_an_registration_ANProfile">
<input type="<?= $Grid->ANProfile->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?= $Grid->RowIndex ?>_ANProfile" id="x<?= $Grid->RowIndex ?>_ANProfile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfile->getPlaceHolder()) ?>" value="<?= $Grid->ANProfile->EditValue ?>"<?= $Grid->ANProfile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfile" class="form-group patient_an_registration_ANProfile">
<span<?= $Grid->ANProfile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ANProfile->getDisplayValue($Grid->ANProfile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ANProfile" id="x<?= $Grid->RowIndex ?>_ANProfile" value="<?= HtmlEncode($Grid->ANProfile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANProfile" id="o<?= $Grid->RowIndex ?>_ANProfile" value="<?= HtmlEncode($Grid->ANProfile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ANProfileDATE->Visible) { // ANProfileDATE ?>
        <td data-name="ANProfileDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileDATE" class="form-group patient_an_registration_ANProfileDATE">
<input type="<?= $Grid->ANProfileDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?= $Grid->RowIndex ?>_ANProfileDATE" id="x<?= $Grid->RowIndex ?>_ANProfileDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfileDATE->getPlaceHolder()) ?>" value="<?= $Grid->ANProfileDATE->EditValue ?>"<?= $Grid->ANProfileDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfileDATE->getErrorMessage() ?></div>
<?php if (!$Grid->ANProfileDATE->ReadOnly && !$Grid->ANProfileDATE->Disabled && !isset($Grid->ANProfileDATE->EditAttrs["readonly"]) && !isset($Grid->ANProfileDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileDATE" class="form-group patient_an_registration_ANProfileDATE">
<span<?= $Grid->ANProfileDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ANProfileDATE->getDisplayValue($Grid->ANProfileDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ANProfileDATE" id="x<?= $Grid->RowIndex ?>_ANProfileDATE" value="<?= HtmlEncode($Grid->ANProfileDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANProfileDATE" id="o<?= $Grid->RowIndex ?>_ANProfileDATE" value="<?= HtmlEncode($Grid->ANProfileDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
        <td data-name="ANProfileINHOUSE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileINHOUSE" class="form-group patient_an_registration_ANProfileINHOUSE">
<input type="<?= $Grid->ANProfileINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?= $Grid->RowIndex ?>_ANProfileINHOUSE" id="x<?= $Grid->RowIndex ?>_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->ANProfileINHOUSE->EditValue ?>"<?= $Grid->ANProfileINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfileINHOUSE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileINHOUSE" class="form-group patient_an_registration_ANProfileINHOUSE">
<span<?= $Grid->ANProfileINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ANProfileINHOUSE->getDisplayValue($Grid->ANProfileINHOUSE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ANProfileINHOUSE" id="x<?= $Grid->RowIndex ?>_ANProfileINHOUSE" value="<?= HtmlEncode($Grid->ANProfileINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANProfileINHOUSE" id="o<?= $Grid->RowIndex ?>_ANProfileINHOUSE" value="<?= HtmlEncode($Grid->ANProfileINHOUSE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
        <td data-name="ANProfileREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileREPORT" class="form-group patient_an_registration_ANProfileREPORT">
<input type="<?= $Grid->ANProfileREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?= $Grid->RowIndex ?>_ANProfileREPORT" id="x<?= $Grid->RowIndex ?>_ANProfileREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANProfileREPORT->getPlaceHolder()) ?>" value="<?= $Grid->ANProfileREPORT->EditValue ?>"<?= $Grid->ANProfileREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANProfileREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileREPORT" class="form-group patient_an_registration_ANProfileREPORT">
<span<?= $Grid->ANProfileREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ANProfileREPORT->getDisplayValue($Grid->ANProfileREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ANProfileREPORT" id="x<?= $Grid->RowIndex ?>_ANProfileREPORT" value="<?= HtmlEncode($Grid->ANProfileREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANProfileREPORT" id="o<?= $Grid->RowIndex ?>_ANProfileREPORT" value="<?= HtmlEncode($Grid->ANProfileREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DualMarker->Visible) { // DualMarker ?>
        <td data-name="DualMarker">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarker" class="form-group patient_an_registration_DualMarker">
<input type="<?= $Grid->DualMarker->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?= $Grid->RowIndex ?>_DualMarker" id="x<?= $Grid->RowIndex ?>_DualMarker" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarker->getPlaceHolder()) ?>" value="<?= $Grid->DualMarker->EditValue ?>"<?= $Grid->DualMarker->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarker->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarker" class="form-group patient_an_registration_DualMarker">
<span<?= $Grid->DualMarker->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DualMarker->getDisplayValue($Grid->DualMarker->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DualMarker" id="x<?= $Grid->RowIndex ?>_DualMarker" value="<?= HtmlEncode($Grid->DualMarker->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DualMarker" id="o<?= $Grid->RowIndex ?>_DualMarker" value="<?= HtmlEncode($Grid->DualMarker->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
        <td data-name="DualMarkerDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerDATE" class="form-group patient_an_registration_DualMarkerDATE">
<input type="<?= $Grid->DualMarkerDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?= $Grid->RowIndex ?>_DualMarkerDATE" id="x<?= $Grid->RowIndex ?>_DualMarkerDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarkerDATE->getPlaceHolder()) ?>" value="<?= $Grid->DualMarkerDATE->EditValue ?>"<?= $Grid->DualMarkerDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarkerDATE->getErrorMessage() ?></div>
<?php if (!$Grid->DualMarkerDATE->ReadOnly && !$Grid->DualMarkerDATE->Disabled && !isset($Grid->DualMarkerDATE->EditAttrs["readonly"]) && !isset($Grid->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerDATE" class="form-group patient_an_registration_DualMarkerDATE">
<span<?= $Grid->DualMarkerDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DualMarkerDATE->getDisplayValue($Grid->DualMarkerDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DualMarkerDATE" id="x<?= $Grid->RowIndex ?>_DualMarkerDATE" value="<?= HtmlEncode($Grid->DualMarkerDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DualMarkerDATE" id="o<?= $Grid->RowIndex ?>_DualMarkerDATE" value="<?= HtmlEncode($Grid->DualMarkerDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
        <td data-name="DualMarkerINHOUSE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerINHOUSE" class="form-group patient_an_registration_DualMarkerINHOUSE">
<input type="<?= $Grid->DualMarkerINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->DualMarkerINHOUSE->EditValue ?>"<?= $Grid->DualMarkerINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarkerINHOUSE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerINHOUSE" class="form-group patient_an_registration_DualMarkerINHOUSE">
<span<?= $Grid->DualMarkerINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DualMarkerINHOUSE->getDisplayValue($Grid->DualMarkerINHOUSE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" value="<?= HtmlEncode($Grid->DualMarkerINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" id="o<?= $Grid->RowIndex ?>_DualMarkerINHOUSE" value="<?= HtmlEncode($Grid->DualMarkerINHOUSE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
        <td data-name="DualMarkerREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerREPORT" class="form-group patient_an_registration_DualMarkerREPORT">
<input type="<?= $Grid->DualMarkerREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?= $Grid->RowIndex ?>_DualMarkerREPORT" id="x<?= $Grid->RowIndex ?>_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?= $Grid->DualMarkerREPORT->EditValue ?>"<?= $Grid->DualMarkerREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DualMarkerREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerREPORT" class="form-group patient_an_registration_DualMarkerREPORT">
<span<?= $Grid->DualMarkerREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DualMarkerREPORT->getDisplayValue($Grid->DualMarkerREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DualMarkerREPORT" id="x<?= $Grid->RowIndex ?>_DualMarkerREPORT" value="<?= HtmlEncode($Grid->DualMarkerREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DualMarkerREPORT" id="o<?= $Grid->RowIndex ?>_DualMarkerREPORT" value="<?= HtmlEncode($Grid->DualMarkerREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Quadruple->Visible) { // Quadruple ?>
        <td data-name="Quadruple">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Quadruple" class="form-group patient_an_registration_Quadruple">
<input type="<?= $Grid->Quadruple->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?= $Grid->RowIndex ?>_Quadruple" id="x<?= $Grid->RowIndex ?>_Quadruple" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Quadruple->getPlaceHolder()) ?>" value="<?= $Grid->Quadruple->EditValue ?>"<?= $Grid->Quadruple->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quadruple->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Quadruple" class="form-group patient_an_registration_Quadruple">
<span<?= $Grid->Quadruple->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Quadruple->getDisplayValue($Grid->Quadruple->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Quadruple" id="x<?= $Grid->RowIndex ?>_Quadruple" value="<?= HtmlEncode($Grid->Quadruple->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quadruple" id="o<?= $Grid->RowIndex ?>_Quadruple" value="<?= HtmlEncode($Grid->Quadruple->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
        <td data-name="QuadrupleDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleDATE" class="form-group patient_an_registration_QuadrupleDATE">
<input type="<?= $Grid->QuadrupleDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?= $Grid->RowIndex ?>_QuadrupleDATE" id="x<?= $Grid->RowIndex ?>_QuadrupleDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->QuadrupleDATE->getPlaceHolder()) ?>" value="<?= $Grid->QuadrupleDATE->EditValue ?>"<?= $Grid->QuadrupleDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QuadrupleDATE->getErrorMessage() ?></div>
<?php if (!$Grid->QuadrupleDATE->ReadOnly && !$Grid->QuadrupleDATE->Disabled && !isset($Grid->QuadrupleDATE->EditAttrs["readonly"]) && !isset($Grid->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleDATE" class="form-group patient_an_registration_QuadrupleDATE">
<span<?= $Grid->QuadrupleDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->QuadrupleDATE->getDisplayValue($Grid->QuadrupleDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_QuadrupleDATE" id="x<?= $Grid->RowIndex ?>_QuadrupleDATE" value="<?= HtmlEncode($Grid->QuadrupleDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_QuadrupleDATE" id="o<?= $Grid->RowIndex ?>_QuadrupleDATE" value="<?= HtmlEncode($Grid->QuadrupleDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
        <td data-name="QuadrupleINHOUSE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleINHOUSE" class="form-group patient_an_registration_QuadrupleINHOUSE">
<input type="<?= $Grid->QuadrupleINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->QuadrupleINHOUSE->EditValue ?>"<?= $Grid->QuadrupleINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QuadrupleINHOUSE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleINHOUSE" class="form-group patient_an_registration_QuadrupleINHOUSE">
<span<?= $Grid->QuadrupleINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->QuadrupleINHOUSE->getDisplayValue($Grid->QuadrupleINHOUSE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" value="<?= HtmlEncode($Grid->QuadrupleINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" id="o<?= $Grid->RowIndex ?>_QuadrupleINHOUSE" value="<?= HtmlEncode($Grid->QuadrupleINHOUSE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
        <td data-name="QuadrupleREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleREPORT" class="form-group patient_an_registration_QuadrupleREPORT">
<input type="<?= $Grid->QuadrupleREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?= $Grid->RowIndex ?>_QuadrupleREPORT" id="x<?= $Grid->RowIndex ?>_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?= $Grid->QuadrupleREPORT->EditValue ?>"<?= $Grid->QuadrupleREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QuadrupleREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleREPORT" class="form-group patient_an_registration_QuadrupleREPORT">
<span<?= $Grid->QuadrupleREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->QuadrupleREPORT->getDisplayValue($Grid->QuadrupleREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_QuadrupleREPORT" id="x<?= $Grid->RowIndex ?>_QuadrupleREPORT" value="<?= HtmlEncode($Grid->QuadrupleREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_QuadrupleREPORT" id="o<?= $Grid->RowIndex ?>_QuadrupleREPORT" value="<?= HtmlEncode($Grid->QuadrupleREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A5month->Visible) { // A5month ?>
        <td data-name="A5month">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5month" class="form-group patient_an_registration_A5month">
<input type="<?= $Grid->A5month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5month" name="x<?= $Grid->RowIndex ?>_A5month" id="x<?= $Grid->RowIndex ?>_A5month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5month->getPlaceHolder()) ?>" value="<?= $Grid->A5month->EditValue ?>"<?= $Grid->A5month->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5month->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5month" class="form-group patient_an_registration_A5month">
<span<?= $Grid->A5month->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A5month->getDisplayValue($Grid->A5month->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A5month" id="x<?= $Grid->RowIndex ?>_A5month" value="<?= HtmlEncode($Grid->A5month->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A5month" id="o<?= $Grid->RowIndex ?>_A5month" value="<?= HtmlEncode($Grid->A5month->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A5monthDATE->Visible) { // A5monthDATE ?>
        <td data-name="A5monthDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5monthDATE" class="form-group patient_an_registration_A5monthDATE">
<input type="<?= $Grid->A5monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?= $Grid->RowIndex ?>_A5monthDATE" id="x<?= $Grid->RowIndex ?>_A5monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5monthDATE->getPlaceHolder()) ?>" value="<?= $Grid->A5monthDATE->EditValue ?>"<?= $Grid->A5monthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5monthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->A5monthDATE->ReadOnly && !$Grid->A5monthDATE->Disabled && !isset($Grid->A5monthDATE->EditAttrs["readonly"]) && !isset($Grid->A5monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5monthDATE" class="form-group patient_an_registration_A5monthDATE">
<span<?= $Grid->A5monthDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A5monthDATE->getDisplayValue($Grid->A5monthDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A5monthDATE" id="x<?= $Grid->RowIndex ?>_A5monthDATE" value="<?= HtmlEncode($Grid->A5monthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A5monthDATE" id="o<?= $Grid->RowIndex ?>_A5monthDATE" value="<?= HtmlEncode($Grid->A5monthDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
        <td data-name="A5monthINHOUSE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5monthINHOUSE" class="form-group patient_an_registration_A5monthINHOUSE">
<input type="<?= $Grid->A5monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?= $Grid->RowIndex ?>_A5monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->A5monthINHOUSE->EditValue ?>"<?= $Grid->A5monthINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5monthINHOUSE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5monthINHOUSE" class="form-group patient_an_registration_A5monthINHOUSE">
<span<?= $Grid->A5monthINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A5monthINHOUSE->getDisplayValue($Grid->A5monthINHOUSE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A5monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A5monthINHOUSE" value="<?= HtmlEncode($Grid->A5monthINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A5monthINHOUSE" id="o<?= $Grid->RowIndex ?>_A5monthINHOUSE" value="<?= HtmlEncode($Grid->A5monthINHOUSE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A5monthREPORT->Visible) { // A5monthREPORT ?>
        <td data-name="A5monthREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5monthREPORT" class="form-group patient_an_registration_A5monthREPORT">
<input type="<?= $Grid->A5monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?= $Grid->RowIndex ?>_A5monthREPORT" id="x<?= $Grid->RowIndex ?>_A5monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A5monthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->A5monthREPORT->EditValue ?>"<?= $Grid->A5monthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A5monthREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5monthREPORT" class="form-group patient_an_registration_A5monthREPORT">
<span<?= $Grid->A5monthREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A5monthREPORT->getDisplayValue($Grid->A5monthREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A5monthREPORT" id="x<?= $Grid->RowIndex ?>_A5monthREPORT" value="<?= HtmlEncode($Grid->A5monthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A5monthREPORT" id="o<?= $Grid->RowIndex ?>_A5monthREPORT" value="<?= HtmlEncode($Grid->A5monthREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A7month->Visible) { // A7month ?>
        <td data-name="A7month">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7month" class="form-group patient_an_registration_A7month">
<input type="<?= $Grid->A7month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7month" name="x<?= $Grid->RowIndex ?>_A7month" id="x<?= $Grid->RowIndex ?>_A7month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7month->getPlaceHolder()) ?>" value="<?= $Grid->A7month->EditValue ?>"<?= $Grid->A7month->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7month->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7month" class="form-group patient_an_registration_A7month">
<span<?= $Grid->A7month->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A7month->getDisplayValue($Grid->A7month->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A7month" id="x<?= $Grid->RowIndex ?>_A7month" value="<?= HtmlEncode($Grid->A7month->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A7month" id="o<?= $Grid->RowIndex ?>_A7month" value="<?= HtmlEncode($Grid->A7month->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A7monthDATE->Visible) { // A7monthDATE ?>
        <td data-name="A7monthDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7monthDATE" class="form-group patient_an_registration_A7monthDATE">
<input type="<?= $Grid->A7monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?= $Grid->RowIndex ?>_A7monthDATE" id="x<?= $Grid->RowIndex ?>_A7monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7monthDATE->getPlaceHolder()) ?>" value="<?= $Grid->A7monthDATE->EditValue ?>"<?= $Grid->A7monthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7monthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->A7monthDATE->ReadOnly && !$Grid->A7monthDATE->Disabled && !isset($Grid->A7monthDATE->EditAttrs["readonly"]) && !isset($Grid->A7monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7monthDATE" class="form-group patient_an_registration_A7monthDATE">
<span<?= $Grid->A7monthDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A7monthDATE->getDisplayValue($Grid->A7monthDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A7monthDATE" id="x<?= $Grid->RowIndex ?>_A7monthDATE" value="<?= HtmlEncode($Grid->A7monthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A7monthDATE" id="o<?= $Grid->RowIndex ?>_A7monthDATE" value="<?= HtmlEncode($Grid->A7monthDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
        <td data-name="A7monthINHOUSE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7monthINHOUSE" class="form-group patient_an_registration_A7monthINHOUSE">
<input type="<?= $Grid->A7monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?= $Grid->RowIndex ?>_A7monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->A7monthINHOUSE->EditValue ?>"<?= $Grid->A7monthINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7monthINHOUSE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7monthINHOUSE" class="form-group patient_an_registration_A7monthINHOUSE">
<span<?= $Grid->A7monthINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A7monthINHOUSE->getDisplayValue($Grid->A7monthINHOUSE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A7monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A7monthINHOUSE" value="<?= HtmlEncode($Grid->A7monthINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A7monthINHOUSE" id="o<?= $Grid->RowIndex ?>_A7monthINHOUSE" value="<?= HtmlEncode($Grid->A7monthINHOUSE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A7monthREPORT->Visible) { // A7monthREPORT ?>
        <td data-name="A7monthREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7monthREPORT" class="form-group patient_an_registration_A7monthREPORT">
<input type="<?= $Grid->A7monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?= $Grid->RowIndex ?>_A7monthREPORT" id="x<?= $Grid->RowIndex ?>_A7monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A7monthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->A7monthREPORT->EditValue ?>"<?= $Grid->A7monthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A7monthREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7monthREPORT" class="form-group patient_an_registration_A7monthREPORT">
<span<?= $Grid->A7monthREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A7monthREPORT->getDisplayValue($Grid->A7monthREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A7monthREPORT" id="x<?= $Grid->RowIndex ?>_A7monthREPORT" value="<?= HtmlEncode($Grid->A7monthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A7monthREPORT" id="o<?= $Grid->RowIndex ?>_A7monthREPORT" value="<?= HtmlEncode($Grid->A7monthREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A9month->Visible) { // A9month ?>
        <td data-name="A9month">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9month" class="form-group patient_an_registration_A9month">
<input type="<?= $Grid->A9month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9month" name="x<?= $Grid->RowIndex ?>_A9month" id="x<?= $Grid->RowIndex ?>_A9month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9month->getPlaceHolder()) ?>" value="<?= $Grid->A9month->EditValue ?>"<?= $Grid->A9month->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9month->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9month" class="form-group patient_an_registration_A9month">
<span<?= $Grid->A9month->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A9month->getDisplayValue($Grid->A9month->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A9month" id="x<?= $Grid->RowIndex ?>_A9month" value="<?= HtmlEncode($Grid->A9month->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A9month" id="o<?= $Grid->RowIndex ?>_A9month" value="<?= HtmlEncode($Grid->A9month->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A9monthDATE->Visible) { // A9monthDATE ?>
        <td data-name="A9monthDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9monthDATE" class="form-group patient_an_registration_A9monthDATE">
<input type="<?= $Grid->A9monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?= $Grid->RowIndex ?>_A9monthDATE" id="x<?= $Grid->RowIndex ?>_A9monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9monthDATE->getPlaceHolder()) ?>" value="<?= $Grid->A9monthDATE->EditValue ?>"<?= $Grid->A9monthDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9monthDATE->getErrorMessage() ?></div>
<?php if (!$Grid->A9monthDATE->ReadOnly && !$Grid->A9monthDATE->Disabled && !isset($Grid->A9monthDATE->EditAttrs["readonly"]) && !isset($Grid->A9monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9monthDATE" class="form-group patient_an_registration_A9monthDATE">
<span<?= $Grid->A9monthDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A9monthDATE->getDisplayValue($Grid->A9monthDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A9monthDATE" id="x<?= $Grid->RowIndex ?>_A9monthDATE" value="<?= HtmlEncode($Grid->A9monthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A9monthDATE" id="o<?= $Grid->RowIndex ?>_A9monthDATE" value="<?= HtmlEncode($Grid->A9monthDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
        <td data-name="A9monthINHOUSE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9monthINHOUSE" class="form-group patient_an_registration_A9monthINHOUSE">
<input type="<?= $Grid->A9monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?= $Grid->RowIndex ?>_A9monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->A9monthINHOUSE->EditValue ?>"<?= $Grid->A9monthINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9monthINHOUSE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9monthINHOUSE" class="form-group patient_an_registration_A9monthINHOUSE">
<span<?= $Grid->A9monthINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A9monthINHOUSE->getDisplayValue($Grid->A9monthINHOUSE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A9monthINHOUSE" id="x<?= $Grid->RowIndex ?>_A9monthINHOUSE" value="<?= HtmlEncode($Grid->A9monthINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A9monthINHOUSE" id="o<?= $Grid->RowIndex ?>_A9monthINHOUSE" value="<?= HtmlEncode($Grid->A9monthINHOUSE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A9monthREPORT->Visible) { // A9monthREPORT ?>
        <td data-name="A9monthREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9monthREPORT" class="form-group patient_an_registration_A9monthREPORT">
<input type="<?= $Grid->A9monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?= $Grid->RowIndex ?>_A9monthREPORT" id="x<?= $Grid->RowIndex ?>_A9monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->A9monthREPORT->getPlaceHolder()) ?>" value="<?= $Grid->A9monthREPORT->EditValue ?>"<?= $Grid->A9monthREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A9monthREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9monthREPORT" class="form-group patient_an_registration_A9monthREPORT">
<span<?= $Grid->A9monthREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A9monthREPORT->getDisplayValue($Grid->A9monthREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A9monthREPORT" id="x<?= $Grid->RowIndex ?>_A9monthREPORT" value="<?= HtmlEncode($Grid->A9monthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A9monthREPORT" id="o<?= $Grid->RowIndex ?>_A9monthREPORT" value="<?= HtmlEncode($Grid->A9monthREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->INJ->Visible) { // INJ ?>
        <td data-name="INJ">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJ" class="form-group patient_an_registration_INJ">
<input type="<?= $Grid->INJ->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJ" name="x<?= $Grid->RowIndex ?>_INJ" id="x<?= $Grid->RowIndex ?>_INJ" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJ->getPlaceHolder()) ?>" value="<?= $Grid->INJ->EditValue ?>"<?= $Grid->INJ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJ->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJ" class="form-group patient_an_registration_INJ">
<span<?= $Grid->INJ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->INJ->getDisplayValue($Grid->INJ->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" data-hidden="1" name="x<?= $Grid->RowIndex ?>_INJ" id="x<?= $Grid->RowIndex ?>_INJ" value="<?= HtmlEncode($Grid->INJ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INJ" id="o<?= $Grid->RowIndex ?>_INJ" value="<?= HtmlEncode($Grid->INJ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->INJDATE->Visible) { // INJDATE ?>
        <td data-name="INJDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJDATE" class="form-group patient_an_registration_INJDATE">
<input type="<?= $Grid->INJDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?= $Grid->RowIndex ?>_INJDATE" id="x<?= $Grid->RowIndex ?>_INJDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJDATE->getPlaceHolder()) ?>" value="<?= $Grid->INJDATE->EditValue ?>"<?= $Grid->INJDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJDATE->getErrorMessage() ?></div>
<?php if (!$Grid->INJDATE->ReadOnly && !$Grid->INJDATE->Disabled && !isset($Grid->INJDATE->EditAttrs["readonly"]) && !isset($Grid->INJDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJDATE" class="form-group patient_an_registration_INJDATE">
<span<?= $Grid->INJDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->INJDATE->getDisplayValue($Grid->INJDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_INJDATE" id="x<?= $Grid->RowIndex ?>_INJDATE" value="<?= HtmlEncode($Grid->INJDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INJDATE" id="o<?= $Grid->RowIndex ?>_INJDATE" value="<?= HtmlEncode($Grid->INJDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->INJINHOUSE->Visible) { // INJINHOUSE ?>
        <td data-name="INJINHOUSE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJINHOUSE" class="form-group patient_an_registration_INJINHOUSE">
<input type="<?= $Grid->INJINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?= $Grid->RowIndex ?>_INJINHOUSE" id="x<?= $Grid->RowIndex ?>_INJINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJINHOUSE->getPlaceHolder()) ?>" value="<?= $Grid->INJINHOUSE->EditValue ?>"<?= $Grid->INJINHOUSE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJINHOUSE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJINHOUSE" class="form-group patient_an_registration_INJINHOUSE">
<span<?= $Grid->INJINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->INJINHOUSE->getDisplayValue($Grid->INJINHOUSE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_INJINHOUSE" id="x<?= $Grid->RowIndex ?>_INJINHOUSE" value="<?= HtmlEncode($Grid->INJINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INJINHOUSE" id="o<?= $Grid->RowIndex ?>_INJINHOUSE" value="<?= HtmlEncode($Grid->INJINHOUSE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->INJREPORT->Visible) { // INJREPORT ?>
        <td data-name="INJREPORT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJREPORT" class="form-group patient_an_registration_INJREPORT">
<input type="<?= $Grid->INJREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?= $Grid->RowIndex ?>_INJREPORT" id="x<?= $Grid->RowIndex ?>_INJREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->INJREPORT->getPlaceHolder()) ?>" value="<?= $Grid->INJREPORT->EditValue ?>"<?= $Grid->INJREPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->INJREPORT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJREPORT" class="form-group patient_an_registration_INJREPORT">
<span<?= $Grid->INJREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->INJREPORT->getDisplayValue($Grid->INJREPORT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_INJREPORT" id="x<?= $Grid->RowIndex ?>_INJREPORT" value="<?= HtmlEncode($Grid->INJREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_INJREPORT" id="o<?= $Grid->RowIndex ?>_INJREPORT" value="<?= HtmlEncode($Grid->INJREPORT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Bleeding->Visible) { // Bleeding ?>
        <td data-name="Bleeding">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Bleeding" class="form-group patient_an_registration_Bleeding">
<template id="tp_x<?= $Grid->RowIndex ?>_Bleeding">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_Bleeding" name="x<?= $Grid->RowIndex ?>_Bleeding" id="x<?= $Grid->RowIndex ?>_Bleeding"<?= $Grid->Bleeding->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Bleeding" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Bleeding[]"
    name="x<?= $Grid->RowIndex ?>_Bleeding[]"
    value="<?= HtmlEncode($Grid->Bleeding->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Bleeding"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Bleeding"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Bleeding->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_Bleeding"
    data-value-separator="<?= $Grid->Bleeding->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Bleeding->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Bleeding->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Bleeding" class="form-group patient_an_registration_Bleeding">
<span<?= $Grid->Bleeding->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Bleeding->getDisplayValue($Grid->Bleeding->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Bleeding" id="x<?= $Grid->RowIndex ?>_Bleeding" value="<?= HtmlEncode($Grid->Bleeding->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Bleeding[]" id="o<?= $Grid->RowIndex ?>_Bleeding[]" value="<?= HtmlEncode($Grid->Bleeding->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Hypothyroidism->Visible) { // Hypothyroidism ?>
        <td data-name="Hypothyroidism">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Hypothyroidism" class="form-group patient_an_registration_Hypothyroidism">
<input type="<?= $Grid->Hypothyroidism->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?= $Grid->RowIndex ?>_Hypothyroidism" id="x<?= $Grid->RowIndex ?>_Hypothyroidism" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Hypothyroidism->getPlaceHolder()) ?>" value="<?= $Grid->Hypothyroidism->EditValue ?>"<?= $Grid->Hypothyroidism->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Hypothyroidism->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Hypothyroidism" class="form-group patient_an_registration_Hypothyroidism">
<span<?= $Grid->Hypothyroidism->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Hypothyroidism->getDisplayValue($Grid->Hypothyroidism->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Hypothyroidism" id="x<?= $Grid->RowIndex ?>_Hypothyroidism" value="<?= HtmlEncode($Grid->Hypothyroidism->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Hypothyroidism" id="o<?= $Grid->RowIndex ?>_Hypothyroidism" value="<?= HtmlEncode($Grid->Hypothyroidism->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PICMENumber->Visible) { // PICMENumber ?>
        <td data-name="PICMENumber">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PICMENumber" class="form-group patient_an_registration_PICMENumber">
<input type="<?= $Grid->PICMENumber->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?= $Grid->RowIndex ?>_PICMENumber" id="x<?= $Grid->RowIndex ?>_PICMENumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PICMENumber->getPlaceHolder()) ?>" value="<?= $Grid->PICMENumber->EditValue ?>"<?= $Grid->PICMENumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PICMENumber->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PICMENumber" class="form-group patient_an_registration_PICMENumber">
<span<?= $Grid->PICMENumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PICMENumber->getDisplayValue($Grid->PICMENumber->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PICMENumber" id="x<?= $Grid->RowIndex ?>_PICMENumber" value="<?= HtmlEncode($Grid->PICMENumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PICMENumber" id="o<?= $Grid->RowIndex ?>_PICMENumber" value="<?= HtmlEncode($Grid->PICMENumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Outcome->Visible) { // Outcome ?>
        <td data-name="Outcome">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Outcome" class="form-group patient_an_registration_Outcome">
<input type="<?= $Grid->Outcome->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Outcome" name="x<?= $Grid->RowIndex ?>_Outcome" id="x<?= $Grid->RowIndex ?>_Outcome" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Outcome->getPlaceHolder()) ?>" value="<?= $Grid->Outcome->EditValue ?>"<?= $Grid->Outcome->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Outcome->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Outcome" class="form-group patient_an_registration_Outcome">
<span<?= $Grid->Outcome->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Outcome->getDisplayValue($Grid->Outcome->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Outcome" id="x<?= $Grid->RowIndex ?>_Outcome" value="<?= HtmlEncode($Grid->Outcome->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Outcome" id="o<?= $Grid->RowIndex ?>_Outcome" value="<?= HtmlEncode($Grid->Outcome->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DateofAdmission->Visible) { // DateofAdmission ?>
        <td data-name="DateofAdmission">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DateofAdmission" class="form-group patient_an_registration_DateofAdmission">
<input type="<?= $Grid->DateofAdmission->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?= $Grid->RowIndex ?>_DateofAdmission" id="x<?= $Grid->RowIndex ?>_DateofAdmission" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DateofAdmission->getPlaceHolder()) ?>" value="<?= $Grid->DateofAdmission->EditValue ?>"<?= $Grid->DateofAdmission->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DateofAdmission->getErrorMessage() ?></div>
<?php if (!$Grid->DateofAdmission->ReadOnly && !$Grid->DateofAdmission->Disabled && !isset($Grid->DateofAdmission->EditAttrs["readonly"]) && !isset($Grid->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DateofAdmission" class="form-group patient_an_registration_DateofAdmission">
<span<?= $Grid->DateofAdmission->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DateofAdmission->getDisplayValue($Grid->DateofAdmission->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DateofAdmission" id="x<?= $Grid->RowIndex ?>_DateofAdmission" value="<?= HtmlEncode($Grid->DateofAdmission->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DateofAdmission" id="o<?= $Grid->RowIndex ?>_DateofAdmission" value="<?= HtmlEncode($Grid->DateofAdmission->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DateodProcedure->Visible) { // DateodProcedure ?>
        <td data-name="DateodProcedure">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DateodProcedure" class="form-group patient_an_registration_DateodProcedure">
<input type="<?= $Grid->DateodProcedure->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?= $Grid->RowIndex ?>_DateodProcedure" id="x<?= $Grid->RowIndex ?>_DateodProcedure" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DateodProcedure->getPlaceHolder()) ?>" value="<?= $Grid->DateodProcedure->EditValue ?>"<?= $Grid->DateodProcedure->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DateodProcedure->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DateodProcedure" class="form-group patient_an_registration_DateodProcedure">
<span<?= $Grid->DateodProcedure->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DateodProcedure->getDisplayValue($Grid->DateodProcedure->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DateodProcedure" id="x<?= $Grid->RowIndex ?>_DateodProcedure" value="<?= HtmlEncode($Grid->DateodProcedure->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DateodProcedure" id="o<?= $Grid->RowIndex ?>_DateodProcedure" value="<?= HtmlEncode($Grid->DateodProcedure->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Miscarriage->Visible) { // Miscarriage ?>
        <td data-name="Miscarriage">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Miscarriage" class="form-group patient_an_registration_Miscarriage">
    <select
        id="x<?= $Grid->RowIndex ?>_Miscarriage"
        name="x<?= $Grid->RowIndex ?>_Miscarriage"
        class="form-control ew-select<?= $Grid->Miscarriage->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_Miscarriage"
        data-table="patient_an_registration"
        data-field="x_Miscarriage"
        data-value-separator="<?= $Grid->Miscarriage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Miscarriage->getPlaceHolder()) ?>"
        <?= $Grid->Miscarriage->editAttributes() ?>>
        <?= $Grid->Miscarriage->selectOptionListHtml("x{$Grid->RowIndex}_Miscarriage") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Miscarriage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_Miscarriage']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Miscarriage", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_Miscarriage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.Miscarriage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.Miscarriage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Miscarriage" class="form-group patient_an_registration_Miscarriage">
<span<?= $Grid->Miscarriage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Miscarriage->getDisplayValue($Grid->Miscarriage->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Miscarriage" id="x<?= $Grid->RowIndex ?>_Miscarriage" value="<?= HtmlEncode($Grid->Miscarriage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Miscarriage" id="o<?= $Grid->RowIndex ?>_Miscarriage" value="<?= HtmlEncode($Grid->Miscarriage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
        <td data-name="ModeOfDelivery">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ModeOfDelivery" class="form-group patient_an_registration_ModeOfDelivery">
    <select
        id="x<?= $Grid->RowIndex ?>_ModeOfDelivery"
        name="x<?= $Grid->RowIndex ?>_ModeOfDelivery"
        class="form-control ew-select<?= $Grid->ModeOfDelivery->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ModeOfDelivery"
        data-table="patient_an_registration"
        data-field="x_ModeOfDelivery"
        data-value-separator="<?= $Grid->ModeOfDelivery->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ModeOfDelivery->getPlaceHolder()) ?>"
        <?= $Grid->ModeOfDelivery->editAttributes() ?>>
        <?= $Grid->ModeOfDelivery->selectOptionListHtml("x{$Grid->RowIndex}_ModeOfDelivery") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ModeOfDelivery->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ModeOfDelivery']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ModeOfDelivery", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ModeOfDelivery", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ModeOfDelivery.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ModeOfDelivery.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ModeOfDelivery" class="form-group patient_an_registration_ModeOfDelivery">
<span<?= $Grid->ModeOfDelivery->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModeOfDelivery->getDisplayValue($Grid->ModeOfDelivery->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ModeOfDelivery" id="x<?= $Grid->RowIndex ?>_ModeOfDelivery" value="<?= HtmlEncode($Grid->ModeOfDelivery->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModeOfDelivery" id="o<?= $Grid->RowIndex ?>_ModeOfDelivery" value="<?= HtmlEncode($Grid->ModeOfDelivery->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ND->Visible) { // ND ?>
        <td data-name="ND">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ND" class="form-group patient_an_registration_ND">
<input type="<?= $Grid->ND->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ND" name="x<?= $Grid->RowIndex ?>_ND" id="x<?= $Grid->RowIndex ?>_ND" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ND->getPlaceHolder()) ?>" value="<?= $Grid->ND->EditValue ?>"<?= $Grid->ND->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ND->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ND" class="form-group patient_an_registration_ND">
<span<?= $Grid->ND->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ND->getDisplayValue($Grid->ND->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ND" id="x<?= $Grid->RowIndex ?>_ND" value="<?= HtmlEncode($Grid->ND->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ND" id="o<?= $Grid->RowIndex ?>_ND" value="<?= HtmlEncode($Grid->ND->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NDS->Visible) { // NDS ?>
        <td data-name="NDS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NDS" class="form-group patient_an_registration_NDS">
    <select
        id="x<?= $Grid->RowIndex ?>_NDS"
        name="x<?= $Grid->RowIndex ?>_NDS"
        class="form-control ew-select<?= $Grid->NDS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_NDS"
        data-table="patient_an_registration"
        data-field="x_NDS"
        data-value-separator="<?= $Grid->NDS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->NDS->getPlaceHolder()) ?>"
        <?= $Grid->NDS->editAttributes() ?>>
        <?= $Grid->NDS->selectOptionListHtml("x{$Grid->RowIndex}_NDS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->NDS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_NDS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_NDS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_NDS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.NDS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.NDS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NDS" class="form-group patient_an_registration_NDS">
<span<?= $Grid->NDS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NDS->getDisplayValue($Grid->NDS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NDS" id="x<?= $Grid->RowIndex ?>_NDS" value="<?= HtmlEncode($Grid->NDS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NDS" id="o<?= $Grid->RowIndex ?>_NDS" value="<?= HtmlEncode($Grid->NDS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NDP->Visible) { // NDP ?>
        <td data-name="NDP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NDP" class="form-group patient_an_registration_NDP">
    <select
        id="x<?= $Grid->RowIndex ?>_NDP"
        name="x<?= $Grid->RowIndex ?>_NDP"
        class="form-control ew-select<?= $Grid->NDP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_NDP"
        data-table="patient_an_registration"
        data-field="x_NDP"
        data-value-separator="<?= $Grid->NDP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->NDP->getPlaceHolder()) ?>"
        <?= $Grid->NDP->editAttributes() ?>>
        <?= $Grid->NDP->selectOptionListHtml("x{$Grid->RowIndex}_NDP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->NDP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_NDP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_NDP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_NDP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.NDP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.NDP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NDP" class="form-group patient_an_registration_NDP">
<span<?= $Grid->NDP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NDP->getDisplayValue($Grid->NDP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NDP" id="x<?= $Grid->RowIndex ?>_NDP" value="<?= HtmlEncode($Grid->NDP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NDP" id="o<?= $Grid->RowIndex ?>_NDP" value="<?= HtmlEncode($Grid->NDP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Vaccum->Visible) { // Vaccum ?>
        <td data-name="Vaccum">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Vaccum" class="form-group patient_an_registration_Vaccum">
<input type="<?= $Grid->Vaccum->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?= $Grid->RowIndex ?>_Vaccum" id="x<?= $Grid->RowIndex ?>_Vaccum" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Vaccum->getPlaceHolder()) ?>" value="<?= $Grid->Vaccum->EditValue ?>"<?= $Grid->Vaccum->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Vaccum->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Vaccum" class="form-group patient_an_registration_Vaccum">
<span<?= $Grid->Vaccum->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Vaccum->getDisplayValue($Grid->Vaccum->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Vaccum" id="x<?= $Grid->RowIndex ?>_Vaccum" value="<?= HtmlEncode($Grid->Vaccum->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Vaccum" id="o<?= $Grid->RowIndex ?>_Vaccum" value="<?= HtmlEncode($Grid->Vaccum->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->VaccumS->Visible) { // VaccumS ?>
        <td data-name="VaccumS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_VaccumS" class="form-group patient_an_registration_VaccumS">
    <select
        id="x<?= $Grid->RowIndex ?>_VaccumS"
        name="x<?= $Grid->RowIndex ?>_VaccumS"
        class="form-control ew-select<?= $Grid->VaccumS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumS"
        data-table="patient_an_registration"
        data-field="x_VaccumS"
        data-value-separator="<?= $Grid->VaccumS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->VaccumS->getPlaceHolder()) ?>"
        <?= $Grid->VaccumS->editAttributes() ?>>
        <?= $Grid->VaccumS->selectOptionListHtml("x{$Grid->RowIndex}_VaccumS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->VaccumS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_VaccumS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.VaccumS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.VaccumS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_VaccumS" class="form-group patient_an_registration_VaccumS">
<span<?= $Grid->VaccumS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->VaccumS->getDisplayValue($Grid->VaccumS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_VaccumS" id="x<?= $Grid->RowIndex ?>_VaccumS" value="<?= HtmlEncode($Grid->VaccumS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_VaccumS" id="o<?= $Grid->RowIndex ?>_VaccumS" value="<?= HtmlEncode($Grid->VaccumS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->VaccumP->Visible) { // VaccumP ?>
        <td data-name="VaccumP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_VaccumP" class="form-group patient_an_registration_VaccumP">
    <select
        id="x<?= $Grid->RowIndex ?>_VaccumP"
        name="x<?= $Grid->RowIndex ?>_VaccumP"
        class="form-control ew-select<?= $Grid->VaccumP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumP"
        data-table="patient_an_registration"
        data-field="x_VaccumP"
        data-value-separator="<?= $Grid->VaccumP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->VaccumP->getPlaceHolder()) ?>"
        <?= $Grid->VaccumP->editAttributes() ?>>
        <?= $Grid->VaccumP->selectOptionListHtml("x{$Grid->RowIndex}_VaccumP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->VaccumP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_VaccumP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_VaccumP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.VaccumP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.VaccumP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_VaccumP" class="form-group patient_an_registration_VaccumP">
<span<?= $Grid->VaccumP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->VaccumP->getDisplayValue($Grid->VaccumP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_VaccumP" id="x<?= $Grid->RowIndex ?>_VaccumP" value="<?= HtmlEncode($Grid->VaccumP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_VaccumP" id="o<?= $Grid->RowIndex ?>_VaccumP" value="<?= HtmlEncode($Grid->VaccumP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Forceps->Visible) { // Forceps ?>
        <td data-name="Forceps">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Forceps" class="form-group patient_an_registration_Forceps">
<input type="<?= $Grid->Forceps->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Forceps" name="x<?= $Grid->RowIndex ?>_Forceps" id="x<?= $Grid->RowIndex ?>_Forceps" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Forceps->getPlaceHolder()) ?>" value="<?= $Grid->Forceps->EditValue ?>"<?= $Grid->Forceps->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Forceps->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Forceps" class="form-group patient_an_registration_Forceps">
<span<?= $Grid->Forceps->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Forceps->getDisplayValue($Grid->Forceps->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Forceps" id="x<?= $Grid->RowIndex ?>_Forceps" value="<?= HtmlEncode($Grid->Forceps->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Forceps" id="o<?= $Grid->RowIndex ?>_Forceps" value="<?= HtmlEncode($Grid->Forceps->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ForcepsS->Visible) { // ForcepsS ?>
        <td data-name="ForcepsS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsS" class="form-group patient_an_registration_ForcepsS">
    <select
        id="x<?= $Grid->RowIndex ?>_ForcepsS"
        name="x<?= $Grid->RowIndex ?>_ForcepsS"
        class="form-control ew-select<?= $Grid->ForcepsS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsS"
        data-table="patient_an_registration"
        data-field="x_ForcepsS"
        data-value-separator="<?= $Grid->ForcepsS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ForcepsS->getPlaceHolder()) ?>"
        <?= $Grid->ForcepsS->editAttributes() ?>>
        <?= $Grid->ForcepsS->selectOptionListHtml("x{$Grid->RowIndex}_ForcepsS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ForcepsS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ForcepsS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ForcepsS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ForcepsS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsS" class="form-group patient_an_registration_ForcepsS">
<span<?= $Grid->ForcepsS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ForcepsS->getDisplayValue($Grid->ForcepsS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ForcepsS" id="x<?= $Grid->RowIndex ?>_ForcepsS" value="<?= HtmlEncode($Grid->ForcepsS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ForcepsS" id="o<?= $Grid->RowIndex ?>_ForcepsS" value="<?= HtmlEncode($Grid->ForcepsS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ForcepsP->Visible) { // ForcepsP ?>
        <td data-name="ForcepsP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsP" class="form-group patient_an_registration_ForcepsP">
    <select
        id="x<?= $Grid->RowIndex ?>_ForcepsP"
        name="x<?= $Grid->RowIndex ?>_ForcepsP"
        class="form-control ew-select<?= $Grid->ForcepsP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsP"
        data-table="patient_an_registration"
        data-field="x_ForcepsP"
        data-value-separator="<?= $Grid->ForcepsP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ForcepsP->getPlaceHolder()) ?>"
        <?= $Grid->ForcepsP->editAttributes() ?>>
        <?= $Grid->ForcepsP->selectOptionListHtml("x{$Grid->RowIndex}_ForcepsP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ForcepsP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ForcepsP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ForcepsP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ForcepsP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ForcepsP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsP" class="form-group patient_an_registration_ForcepsP">
<span<?= $Grid->ForcepsP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ForcepsP->getDisplayValue($Grid->ForcepsP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ForcepsP" id="x<?= $Grid->RowIndex ?>_ForcepsP" value="<?= HtmlEncode($Grid->ForcepsP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ForcepsP" id="o<?= $Grid->RowIndex ?>_ForcepsP" value="<?= HtmlEncode($Grid->ForcepsP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Elective->Visible) { // Elective ?>
        <td data-name="Elective">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Elective" class="form-group patient_an_registration_Elective">
<input type="<?= $Grid->Elective->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Elective" name="x<?= $Grid->RowIndex ?>_Elective" id="x<?= $Grid->RowIndex ?>_Elective" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Elective->getPlaceHolder()) ?>" value="<?= $Grid->Elective->EditValue ?>"<?= $Grid->Elective->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Elective->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Elective" class="form-group patient_an_registration_Elective">
<span<?= $Grid->Elective->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Elective->getDisplayValue($Grid->Elective->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Elective" id="x<?= $Grid->RowIndex ?>_Elective" value="<?= HtmlEncode($Grid->Elective->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Elective" id="o<?= $Grid->RowIndex ?>_Elective" value="<?= HtmlEncode($Grid->Elective->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ElectiveS->Visible) { // ElectiveS ?>
        <td data-name="ElectiveS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveS" class="form-group patient_an_registration_ElectiveS">
    <select
        id="x<?= $Grid->RowIndex ?>_ElectiveS"
        name="x<?= $Grid->RowIndex ?>_ElectiveS"
        class="form-control ew-select<?= $Grid->ElectiveS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveS"
        data-table="patient_an_registration"
        data-field="x_ElectiveS"
        data-value-separator="<?= $Grid->ElectiveS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ElectiveS->getPlaceHolder()) ?>"
        <?= $Grid->ElectiveS->editAttributes() ?>>
        <?= $Grid->ElectiveS->selectOptionListHtml("x{$Grid->RowIndex}_ElectiveS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ElectiveS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ElectiveS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ElectiveS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ElectiveS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveS" class="form-group patient_an_registration_ElectiveS">
<span<?= $Grid->ElectiveS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ElectiveS->getDisplayValue($Grid->ElectiveS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ElectiveS" id="x<?= $Grid->RowIndex ?>_ElectiveS" value="<?= HtmlEncode($Grid->ElectiveS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ElectiveS" id="o<?= $Grid->RowIndex ?>_ElectiveS" value="<?= HtmlEncode($Grid->ElectiveS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ElectiveP->Visible) { // ElectiveP ?>
        <td data-name="ElectiveP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveP" class="form-group patient_an_registration_ElectiveP">
    <select
        id="x<?= $Grid->RowIndex ?>_ElectiveP"
        name="x<?= $Grid->RowIndex ?>_ElectiveP"
        class="form-control ew-select<?= $Grid->ElectiveP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveP"
        data-table="patient_an_registration"
        data-field="x_ElectiveP"
        data-value-separator="<?= $Grid->ElectiveP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ElectiveP->getPlaceHolder()) ?>"
        <?= $Grid->ElectiveP->editAttributes() ?>>
        <?= $Grid->ElectiveP->selectOptionListHtml("x{$Grid->RowIndex}_ElectiveP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ElectiveP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ElectiveP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_ElectiveP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ElectiveP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ElectiveP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveP" class="form-group patient_an_registration_ElectiveP">
<span<?= $Grid->ElectiveP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ElectiveP->getDisplayValue($Grid->ElectiveP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ElectiveP" id="x<?= $Grid->RowIndex ?>_ElectiveP" value="<?= HtmlEncode($Grid->ElectiveP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ElectiveP" id="o<?= $Grid->RowIndex ?>_ElectiveP" value="<?= HtmlEncode($Grid->ElectiveP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Emergency->Visible) { // Emergency ?>
        <td data-name="Emergency">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Emergency" class="form-group patient_an_registration_Emergency">
<input type="<?= $Grid->Emergency->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Emergency" name="x<?= $Grid->RowIndex ?>_Emergency" id="x<?= $Grid->RowIndex ?>_Emergency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Emergency->getPlaceHolder()) ?>" value="<?= $Grid->Emergency->EditValue ?>"<?= $Grid->Emergency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Emergency->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Emergency" class="form-group patient_an_registration_Emergency">
<span<?= $Grid->Emergency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Emergency->getDisplayValue($Grid->Emergency->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Emergency" id="x<?= $Grid->RowIndex ?>_Emergency" value="<?= HtmlEncode($Grid->Emergency->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Emergency" id="o<?= $Grid->RowIndex ?>_Emergency" value="<?= HtmlEncode($Grid->Emergency->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EmergencyS->Visible) { // EmergencyS ?>
        <td data-name="EmergencyS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyS" class="form-group patient_an_registration_EmergencyS">
    <select
        id="x<?= $Grid->RowIndex ?>_EmergencyS"
        name="x<?= $Grid->RowIndex ?>_EmergencyS"
        class="form-control ew-select<?= $Grid->EmergencyS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyS"
        data-table="patient_an_registration"
        data-field="x_EmergencyS"
        data-value-separator="<?= $Grid->EmergencyS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EmergencyS->getPlaceHolder()) ?>"
        <?= $Grid->EmergencyS->editAttributes() ?>>
        <?= $Grid->EmergencyS->selectOptionListHtml("x{$Grid->RowIndex}_EmergencyS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EmergencyS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EmergencyS", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.EmergencyS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.EmergencyS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyS" class="form-group patient_an_registration_EmergencyS">
<span<?= $Grid->EmergencyS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EmergencyS->getDisplayValue($Grid->EmergencyS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EmergencyS" id="x<?= $Grid->RowIndex ?>_EmergencyS" value="<?= HtmlEncode($Grid->EmergencyS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EmergencyS" id="o<?= $Grid->RowIndex ?>_EmergencyS" value="<?= HtmlEncode($Grid->EmergencyS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EmergencyP->Visible) { // EmergencyP ?>
        <td data-name="EmergencyP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyP" class="form-group patient_an_registration_EmergencyP">
    <select
        id="x<?= $Grid->RowIndex ?>_EmergencyP"
        name="x<?= $Grid->RowIndex ?>_EmergencyP"
        class="form-control ew-select<?= $Grid->EmergencyP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyP"
        data-table="patient_an_registration"
        data-field="x_EmergencyP"
        data-value-separator="<?= $Grid->EmergencyP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EmergencyP->getPlaceHolder()) ?>"
        <?= $Grid->EmergencyP->editAttributes() ?>>
        <?= $Grid->EmergencyP->selectOptionListHtml("x{$Grid->RowIndex}_EmergencyP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EmergencyP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EmergencyP", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_EmergencyP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.EmergencyP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.EmergencyP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyP" class="form-group patient_an_registration_EmergencyP">
<span<?= $Grid->EmergencyP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EmergencyP->getDisplayValue($Grid->EmergencyP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EmergencyP" id="x<?= $Grid->RowIndex ?>_EmergencyP" value="<?= HtmlEncode($Grid->EmergencyP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EmergencyP" id="o<?= $Grid->RowIndex ?>_EmergencyP" value="<?= HtmlEncode($Grid->EmergencyP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Maturity->Visible) { // Maturity ?>
        <td data-name="Maturity">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Maturity" class="form-group patient_an_registration_Maturity">
    <select
        id="x<?= $Grid->RowIndex ?>_Maturity"
        name="x<?= $Grid->RowIndex ?>_Maturity"
        class="form-control ew-select<?= $Grid->Maturity->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_Maturity"
        data-table="patient_an_registration"
        data-field="x_Maturity"
        data-value-separator="<?= $Grid->Maturity->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Maturity->getPlaceHolder()) ?>"
        <?= $Grid->Maturity->editAttributes() ?>>
        <?= $Grid->Maturity->selectOptionListHtml("x{$Grid->RowIndex}_Maturity") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Maturity->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_Maturity']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Maturity", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_Maturity", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.Maturity.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.Maturity.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Maturity" class="form-group patient_an_registration_Maturity">
<span<?= $Grid->Maturity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Maturity->getDisplayValue($Grid->Maturity->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Maturity" id="x<?= $Grid->RowIndex ?>_Maturity" value="<?= HtmlEncode($Grid->Maturity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Maturity" id="o<?= $Grid->RowIndex ?>_Maturity" value="<?= HtmlEncode($Grid->Maturity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Baby1->Visible) { // Baby1 ?>
        <td data-name="Baby1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Baby1" class="form-group patient_an_registration_Baby1">
<input type="<?= $Grid->Baby1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Baby1" name="x<?= $Grid->RowIndex ?>_Baby1" id="x<?= $Grid->RowIndex ?>_Baby1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Baby1->getPlaceHolder()) ?>" value="<?= $Grid->Baby1->EditValue ?>"<?= $Grid->Baby1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Baby1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Baby1" class="form-group patient_an_registration_Baby1">
<span<?= $Grid->Baby1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Baby1->getDisplayValue($Grid->Baby1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Baby1" id="x<?= $Grid->RowIndex ?>_Baby1" value="<?= HtmlEncode($Grid->Baby1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Baby1" id="o<?= $Grid->RowIndex ?>_Baby1" value="<?= HtmlEncode($Grid->Baby1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Baby2->Visible) { // Baby2 ?>
        <td data-name="Baby2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Baby2" class="form-group patient_an_registration_Baby2">
<input type="<?= $Grid->Baby2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Baby2" name="x<?= $Grid->RowIndex ?>_Baby2" id="x<?= $Grid->RowIndex ?>_Baby2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Baby2->getPlaceHolder()) ?>" value="<?= $Grid->Baby2->EditValue ?>"<?= $Grid->Baby2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Baby2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Baby2" class="form-group patient_an_registration_Baby2">
<span<?= $Grid->Baby2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Baby2->getDisplayValue($Grid->Baby2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Baby2" id="x<?= $Grid->RowIndex ?>_Baby2" value="<?= HtmlEncode($Grid->Baby2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Baby2" id="o<?= $Grid->RowIndex ?>_Baby2" value="<?= HtmlEncode($Grid->Baby2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->sex1->Visible) { // sex1 ?>
        <td data-name="sex1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_sex1" class="form-group patient_an_registration_sex1">
<input type="<?= $Grid->sex1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_sex1" name="x<?= $Grid->RowIndex ?>_sex1" id="x<?= $Grid->RowIndex ?>_sex1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->sex1->getPlaceHolder()) ?>" value="<?= $Grid->sex1->EditValue ?>"<?= $Grid->sex1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sex1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_sex1" class="form-group patient_an_registration_sex1">
<span<?= $Grid->sex1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->sex1->getDisplayValue($Grid->sex1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_sex1" id="x<?= $Grid->RowIndex ?>_sex1" value="<?= HtmlEncode($Grid->sex1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sex1" id="o<?= $Grid->RowIndex ?>_sex1" value="<?= HtmlEncode($Grid->sex1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->sex2->Visible) { // sex2 ?>
        <td data-name="sex2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_sex2" class="form-group patient_an_registration_sex2">
<input type="<?= $Grid->sex2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_sex2" name="x<?= $Grid->RowIndex ?>_sex2" id="x<?= $Grid->RowIndex ?>_sex2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->sex2->getPlaceHolder()) ?>" value="<?= $Grid->sex2->EditValue ?>"<?= $Grid->sex2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sex2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_sex2" class="form-group patient_an_registration_sex2">
<span<?= $Grid->sex2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->sex2->getDisplayValue($Grid->sex2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_sex2" id="x<?= $Grid->RowIndex ?>_sex2" value="<?= HtmlEncode($Grid->sex2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sex2" id="o<?= $Grid->RowIndex ?>_sex2" value="<?= HtmlEncode($Grid->sex2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->weight1->Visible) { // weight1 ?>
        <td data-name="weight1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_weight1" class="form-group patient_an_registration_weight1">
<input type="<?= $Grid->weight1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_weight1" name="x<?= $Grid->RowIndex ?>_weight1" id="x<?= $Grid->RowIndex ?>_weight1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->weight1->getPlaceHolder()) ?>" value="<?= $Grid->weight1->EditValue ?>"<?= $Grid->weight1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->weight1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_weight1" class="form-group patient_an_registration_weight1">
<span<?= $Grid->weight1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->weight1->getDisplayValue($Grid->weight1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_weight1" id="x<?= $Grid->RowIndex ?>_weight1" value="<?= HtmlEncode($Grid->weight1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_weight1" id="o<?= $Grid->RowIndex ?>_weight1" value="<?= HtmlEncode($Grid->weight1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->weight2->Visible) { // weight2 ?>
        <td data-name="weight2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_weight2" class="form-group patient_an_registration_weight2">
<input type="<?= $Grid->weight2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_weight2" name="x<?= $Grid->RowIndex ?>_weight2" id="x<?= $Grid->RowIndex ?>_weight2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->weight2->getPlaceHolder()) ?>" value="<?= $Grid->weight2->EditValue ?>"<?= $Grid->weight2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->weight2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_weight2" class="form-group patient_an_registration_weight2">
<span<?= $Grid->weight2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->weight2->getDisplayValue($Grid->weight2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_weight2" id="x<?= $Grid->RowIndex ?>_weight2" value="<?= HtmlEncode($Grid->weight2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_weight2" id="o<?= $Grid->RowIndex ?>_weight2" value="<?= HtmlEncode($Grid->weight2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NICU1->Visible) { // NICU1 ?>
        <td data-name="NICU1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NICU1" class="form-group patient_an_registration_NICU1">
<input type="<?= $Grid->NICU1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NICU1" name="x<?= $Grid->RowIndex ?>_NICU1" id="x<?= $Grid->RowIndex ?>_NICU1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NICU1->getPlaceHolder()) ?>" value="<?= $Grid->NICU1->EditValue ?>"<?= $Grid->NICU1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NICU1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NICU1" class="form-group patient_an_registration_NICU1">
<span<?= $Grid->NICU1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NICU1->getDisplayValue($Grid->NICU1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NICU1" id="x<?= $Grid->RowIndex ?>_NICU1" value="<?= HtmlEncode($Grid->NICU1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NICU1" id="o<?= $Grid->RowIndex ?>_NICU1" value="<?= HtmlEncode($Grid->NICU1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NICU2->Visible) { // NICU2 ?>
        <td data-name="NICU2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NICU2" class="form-group patient_an_registration_NICU2">
<input type="<?= $Grid->NICU2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NICU2" name="x<?= $Grid->RowIndex ?>_NICU2" id="x<?= $Grid->RowIndex ?>_NICU2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NICU2->getPlaceHolder()) ?>" value="<?= $Grid->NICU2->EditValue ?>"<?= $Grid->NICU2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NICU2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NICU2" class="form-group patient_an_registration_NICU2">
<span<?= $Grid->NICU2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NICU2->getDisplayValue($Grid->NICU2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NICU2" id="x<?= $Grid->RowIndex ?>_NICU2" value="<?= HtmlEncode($Grid->NICU2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NICU2" id="o<?= $Grid->RowIndex ?>_NICU2" value="<?= HtmlEncode($Grid->NICU2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Jaundice1->Visible) { // Jaundice1 ?>
        <td data-name="Jaundice1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice1" class="form-group patient_an_registration_Jaundice1">
<input type="<?= $Grid->Jaundice1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?= $Grid->RowIndex ?>_Jaundice1" id="x<?= $Grid->RowIndex ?>_Jaundice1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Jaundice1->getPlaceHolder()) ?>" value="<?= $Grid->Jaundice1->EditValue ?>"<?= $Grid->Jaundice1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Jaundice1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice1" class="form-group patient_an_registration_Jaundice1">
<span<?= $Grid->Jaundice1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Jaundice1->getDisplayValue($Grid->Jaundice1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Jaundice1" id="x<?= $Grid->RowIndex ?>_Jaundice1" value="<?= HtmlEncode($Grid->Jaundice1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Jaundice1" id="o<?= $Grid->RowIndex ?>_Jaundice1" value="<?= HtmlEncode($Grid->Jaundice1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Jaundice2->Visible) { // Jaundice2 ?>
        <td data-name="Jaundice2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice2" class="form-group patient_an_registration_Jaundice2">
<input type="<?= $Grid->Jaundice2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?= $Grid->RowIndex ?>_Jaundice2" id="x<?= $Grid->RowIndex ?>_Jaundice2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Jaundice2->getPlaceHolder()) ?>" value="<?= $Grid->Jaundice2->EditValue ?>"<?= $Grid->Jaundice2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Jaundice2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice2" class="form-group patient_an_registration_Jaundice2">
<span<?= $Grid->Jaundice2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Jaundice2->getDisplayValue($Grid->Jaundice2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Jaundice2" id="x<?= $Grid->RowIndex ?>_Jaundice2" value="<?= HtmlEncode($Grid->Jaundice2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Jaundice2" id="o<?= $Grid->RowIndex ?>_Jaundice2" value="<?= HtmlEncode($Grid->Jaundice2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Others1->Visible) { // Others1 ?>
        <td data-name="Others1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Others1" class="form-group patient_an_registration_Others1">
<input type="<?= $Grid->Others1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Others1" name="x<?= $Grid->RowIndex ?>_Others1" id="x<?= $Grid->RowIndex ?>_Others1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Others1->getPlaceHolder()) ?>" value="<?= $Grid->Others1->EditValue ?>"<?= $Grid->Others1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Others1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Others1" class="form-group patient_an_registration_Others1">
<span<?= $Grid->Others1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Others1->getDisplayValue($Grid->Others1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Others1" id="x<?= $Grid->RowIndex ?>_Others1" value="<?= HtmlEncode($Grid->Others1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Others1" id="o<?= $Grid->RowIndex ?>_Others1" value="<?= HtmlEncode($Grid->Others1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Others2->Visible) { // Others2 ?>
        <td data-name="Others2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Others2" class="form-group patient_an_registration_Others2">
<input type="<?= $Grid->Others2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Others2" name="x<?= $Grid->RowIndex ?>_Others2" id="x<?= $Grid->RowIndex ?>_Others2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Others2->getPlaceHolder()) ?>" value="<?= $Grid->Others2->EditValue ?>"<?= $Grid->Others2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Others2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Others2" class="form-group patient_an_registration_Others2">
<span<?= $Grid->Others2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Others2->getDisplayValue($Grid->Others2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Others2" id="x<?= $Grid->RowIndex ?>_Others2" value="<?= HtmlEncode($Grid->Others2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Others2" id="o<?= $Grid->RowIndex ?>_Others2" value="<?= HtmlEncode($Grid->Others2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SpillOverReasons->Visible) { // SpillOverReasons ?>
        <td data-name="SpillOverReasons">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_SpillOverReasons" class="form-group patient_an_registration_SpillOverReasons">
    <select
        id="x<?= $Grid->RowIndex ?>_SpillOverReasons"
        name="x<?= $Grid->RowIndex ?>_SpillOverReasons"
        class="form-control ew-select<?= $Grid->SpillOverReasons->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x<?= $Grid->RowIndex ?>_SpillOverReasons"
        data-table="patient_an_registration"
        data-field="x_SpillOverReasons"
        data-value-separator="<?= $Grid->SpillOverReasons->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SpillOverReasons->getPlaceHolder()) ?>"
        <?= $Grid->SpillOverReasons->editAttributes() ?>>
        <?= $Grid->SpillOverReasons->selectOptionListHtml("x{$Grid->RowIndex}_SpillOverReasons") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SpillOverReasons->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x<?= $Grid->RowIndex ?>_SpillOverReasons']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SpillOverReasons", selectId: "patient_an_registration_x<?= $Grid->RowIndex ?>_SpillOverReasons", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.SpillOverReasons.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.SpillOverReasons.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_SpillOverReasons" class="form-group patient_an_registration_SpillOverReasons">
<span<?= $Grid->SpillOverReasons->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SpillOverReasons->getDisplayValue($Grid->SpillOverReasons->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SpillOverReasons" id="x<?= $Grid->RowIndex ?>_SpillOverReasons" value="<?= HtmlEncode($Grid->SpillOverReasons->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SpillOverReasons" id="o<?= $Grid->RowIndex ?>_SpillOverReasons" value="<?= HtmlEncode($Grid->SpillOverReasons->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ANClosed->Visible) { // ANClosed ?>
        <td data-name="ANClosed">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANClosed" class="form-group patient_an_registration_ANClosed">
<template id="tp_x<?= $Grid->RowIndex ?>_ANClosed">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_ANClosed" name="x<?= $Grid->RowIndex ?>_ANClosed" id="x<?= $Grid->RowIndex ?>_ANClosed"<?= $Grid->ANClosed->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ANClosed" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ANClosed[]"
    name="x<?= $Grid->RowIndex ?>_ANClosed[]"
    value="<?= HtmlEncode($Grid->ANClosed->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_ANClosed"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ANClosed"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ANClosed->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_ANClosed"
    data-value-separator="<?= $Grid->ANClosed->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ANClosed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANClosed->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANClosed" class="form-group patient_an_registration_ANClosed">
<span<?= $Grid->ANClosed->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ANClosed->getDisplayValue($Grid->ANClosed->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ANClosed" id="x<?= $Grid->RowIndex ?>_ANClosed" value="<?= HtmlEncode($Grid->ANClosed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANClosed[]" id="o<?= $Grid->RowIndex ?>_ANClosed[]" value="<?= HtmlEncode($Grid->ANClosed->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ANClosedDATE->Visible) { // ANClosedDATE ?>
        <td data-name="ANClosedDATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANClosedDATE" class="form-group patient_an_registration_ANClosedDATE">
<input type="<?= $Grid->ANClosedDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?= $Grid->RowIndex ?>_ANClosedDATE" id="x<?= $Grid->RowIndex ?>_ANClosedDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ANClosedDATE->getPlaceHolder()) ?>" value="<?= $Grid->ANClosedDATE->EditValue ?>"<?= $Grid->ANClosedDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ANClosedDATE->getErrorMessage() ?></div>
<?php if (!$Grid->ANClosedDATE->ReadOnly && !$Grid->ANClosedDATE->Disabled && !isset($Grid->ANClosedDATE->EditAttrs["readonly"]) && !isset($Grid->ANClosedDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANClosedDATE" class="form-group patient_an_registration_ANClosedDATE">
<span<?= $Grid->ANClosedDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ANClosedDATE->getDisplayValue($Grid->ANClosedDATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ANClosedDATE" id="x<?= $Grid->RowIndex ?>_ANClosedDATE" value="<?= HtmlEncode($Grid->ANClosedDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ANClosedDATE" id="o<?= $Grid->RowIndex ?>_ANClosedDATE" value="<?= HtmlEncode($Grid->ANClosedDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
        <td data-name="PastMedicalHistoryOthers">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistoryOthers" class="form-group patient_an_registration_PastMedicalHistoryOthers">
<input type="<?= $Grid->PastMedicalHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?= $Grid->PastMedicalHistoryOthers->EditValue ?>"<?= $Grid->PastMedicalHistoryOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastMedicalHistoryOthers->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistoryOthers" class="form-group patient_an_registration_PastMedicalHistoryOthers">
<span<?= $Grid->PastMedicalHistoryOthers->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PastMedicalHistoryOthers->getDisplayValue($Grid->PastMedicalHistoryOthers->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?= HtmlEncode($Grid->PastMedicalHistoryOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" id="o<?= $Grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?= HtmlEncode($Grid->PastMedicalHistoryOthers->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
        <td data-name="PastSurgicalHistoryOthers">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistoryOthers" class="form-group patient_an_registration_PastSurgicalHistoryOthers">
<input type="<?= $Grid->PastSurgicalHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?= $Grid->PastSurgicalHistoryOthers->EditValue ?>"<?= $Grid->PastSurgicalHistoryOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PastSurgicalHistoryOthers->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistoryOthers" class="form-group patient_an_registration_PastSurgicalHistoryOthers">
<span<?= $Grid->PastSurgicalHistoryOthers->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PastSurgicalHistoryOthers->getDisplayValue($Grid->PastSurgicalHistoryOthers->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?= HtmlEncode($Grid->PastSurgicalHistoryOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" id="o<?= $Grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?= HtmlEncode($Grid->PastSurgicalHistoryOthers->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
        <td data-name="FamilyHistoryOthers">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistoryOthers" class="form-group patient_an_registration_FamilyHistoryOthers">
<input type="<?= $Grid->FamilyHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?= $Grid->RowIndex ?>_FamilyHistoryOthers" id="x<?= $Grid->RowIndex ?>_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?= $Grid->FamilyHistoryOthers->EditValue ?>"<?= $Grid->FamilyHistoryOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FamilyHistoryOthers->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistoryOthers" class="form-group patient_an_registration_FamilyHistoryOthers">
<span<?= $Grid->FamilyHistoryOthers->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FamilyHistoryOthers->getDisplayValue($Grid->FamilyHistoryOthers->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FamilyHistoryOthers" id="x<?= $Grid->RowIndex ?>_FamilyHistoryOthers" value="<?= HtmlEncode($Grid->FamilyHistoryOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FamilyHistoryOthers" id="o<?= $Grid->RowIndex ?>_FamilyHistoryOthers" value="<?= HtmlEncode($Grid->FamilyHistoryOthers->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
        <td data-name="PresentPregnancyComplicationsOthers">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group patient_an_registration_PresentPregnancyComplicationsOthers">
<input type="<?= $Grid->PresentPregnancyComplicationsOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?= $Grid->PresentPregnancyComplicationsOthers->EditValue ?>"<?= $Grid->PresentPregnancyComplicationsOthers->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PresentPregnancyComplicationsOthers->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?= $Grid->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PresentPregnancyComplicationsOthers->getDisplayValue($Grid->PresentPregnancyComplicationsOthers->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?= HtmlEncode($Grid->PresentPregnancyComplicationsOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="o<?= $Grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?= HtmlEncode($Grid->PresentPregnancyComplicationsOthers->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ETdate->Visible) { // ETdate ?>
        <td data-name="ETdate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ETdate" class="form-group patient_an_registration_ETdate">
<input type="<?= $Grid->ETdate->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ETdate" name="x<?= $Grid->RowIndex ?>_ETdate" id="x<?= $Grid->RowIndex ?>_ETdate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETdate->getPlaceHolder()) ?>" value="<?= $Grid->ETdate->EditValue ?>"<?= $Grid->ETdate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETdate->getErrorMessage() ?></div>
<?php if (!$Grid->ETdate->ReadOnly && !$Grid->ETdate->Disabled && !isset($Grid->ETdate->EditAttrs["readonly"]) && !isset($Grid->ETdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?= $Grid->RowIndex ?>_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ETdate" class="form-group patient_an_registration_ETdate">
<span<?= $Grid->ETdate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ETdate->getDisplayValue($Grid->ETdate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ETdate" id="x<?= $Grid->RowIndex ?>_ETdate" value="<?= HtmlEncode($Grid->ETdate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETdate" id="o<?= $Grid->RowIndex ?>_ETdate" value="<?= HtmlEncode($Grid->ETdate->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_an_registrationgrid","load"], function() {
    fpatient_an_registrationgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpatient_an_registrationgrid">
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
    ew.addEventHandlers("patient_an_registration");
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
        container: "gmp_patient_an_registration",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

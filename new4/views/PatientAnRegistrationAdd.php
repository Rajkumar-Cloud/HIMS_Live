<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientAnRegistrationAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_an_registrationadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_an_registrationadd = currentForm = new ew.Form("fpatient_an_registrationadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_an_registration")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_an_registration)
        ew.vars.tables.patient_an_registration = currentTable;
    fpatient_an_registrationadd.addFields([
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
        var f = fpatient_an_registrationadd,
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
    fpatient_an_registrationadd.validate = function () {
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
    fpatient_an_registrationadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_an_registrationadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_an_registrationadd.lists.MenstrualHistory = <?= $Page->MenstrualHistory->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.PreviousHistoryofGDM = <?= $Page->PreviousHistoryofGDM->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.PreviousHistorofPIH = <?= $Page->PreviousHistorofPIH->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.PreviousHistoryofIUGR = <?= $Page->PreviousHistoryofIUGR->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.PreviousHistoryofOligohydramnios = <?= $Page->PreviousHistoryofOligohydramnios->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.PreviousHistoryofPreterm = <?= $Page->PreviousHistoryofPreterm->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.PastMedicalHistory = <?= $Page->PastMedicalHistory->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.PastSurgicalHistory = <?= $Page->PastSurgicalHistory->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.FamilyHistory = <?= $Page->FamilyHistory->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.Bleeding = <?= $Page->Bleeding->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.Miscarriage = <?= $Page->Miscarriage->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.ModeOfDelivery = <?= $Page->ModeOfDelivery->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.NDS = <?= $Page->NDS->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.NDP = <?= $Page->NDP->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.VaccumS = <?= $Page->VaccumS->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.VaccumP = <?= $Page->VaccumP->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.ForcepsS = <?= $Page->ForcepsS->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.ForcepsP = <?= $Page->ForcepsP->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.ElectiveS = <?= $Page->ElectiveS->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.ElectiveP = <?= $Page->ElectiveP->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.EmergencyS = <?= $Page->EmergencyS->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.EmergencyP = <?= $Page->EmergencyP->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.Maturity = <?= $Page->Maturity->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.SpillOverReasons = <?= $Page->SpillOverReasons->toClientList($Page) ?>;
    fpatient_an_registrationadd.lists.ANClosed = <?= $Page->ANClosed->toClientList($Page) ?>;
    loadjs.done("fpatient_an_registrationadd");
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
<form name="fpatient_an_registrationadd" id="fpatient_an_registrationadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "patient_opd_follow_up") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="patient_opd_follow_up">
<input type="hidden" name="fk_PatientId" value="<?= HtmlEncode($Page->pid->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->fid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->pid->Visible) { // pid ?>
    <div id="r_pid" class="form-group row">
        <label id="elh_patient_an_registration_pid" for="x_pid" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_pid"><?= $Page->pid->caption() ?><?= $Page->pid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pid->cellAttributes() ?>>
<?php if ($Page->pid->getSessionValue() != "") { ?>
<template id="tpx_patient_an_registration_pid"><span id="el_patient_an_registration_pid">
<span<?= $Page->pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->pid->getDisplayValue($Page->pid->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_pid" name="x_pid" value="<?= HtmlEncode($Page->pid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_an_registration_pid"><span id="el_patient_an_registration_pid">
<input type="<?= $Page->pid->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_pid" name="x_pid" id="x_pid" size="30" placeholder="<?= HtmlEncode($Page->pid->getPlaceHolder()) ?>" value="<?= $Page->pid->EditValue ?>"<?= $Page->pid->editAttributes() ?> aria-describedby="x_pid_help">
<?= $Page->pid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pid->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fid->Visible) { // fid ?>
    <div id="r_fid" class="form-group row">
        <label id="elh_patient_an_registration_fid" for="x_fid" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_fid"><?= $Page->fid->caption() ?><?= $Page->fid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->fid->cellAttributes() ?>>
<?php if ($Page->fid->getSessionValue() != "") { ?>
<template id="tpx_patient_an_registration_fid"><span id="el_patient_an_registration_fid">
<span<?= $Page->fid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->fid->getDisplayValue($Page->fid->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_fid" name="x_fid" value="<?= HtmlEncode($Page->fid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_an_registration_fid"><span id="el_patient_an_registration_fid">
<input type="<?= $Page->fid->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_fid" name="x_fid" id="x_fid" size="30" placeholder="<?= HtmlEncode($Page->fid->getPlaceHolder()) ?>" value="<?= $Page->fid->EditValue ?>"<?= $Page->fid->editAttributes() ?> aria-describedby="x_fid_help">
<?= $Page->fid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fid->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->G->Visible) { // G ?>
    <div id="r_G" class="form-group row">
        <label id="elh_patient_an_registration_G" for="x_G" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_G"><?= $Page->G->caption() ?><?= $Page->G->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->G->cellAttributes() ?>>
<template id="tpx_patient_an_registration_G"><span id="el_patient_an_registration_G">
<input type="<?= $Page->G->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G" name="x_G" id="x_G" size="8" maxlength="45" placeholder="<?= HtmlEncode($Page->G->getPlaceHolder()) ?>" value="<?= $Page->G->EditValue ?>"<?= $Page->G->editAttributes() ?> aria-describedby="x_G_help">
<?= $Page->G->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->G->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P->Visible) { // P ?>
    <div id="r_P" class="form-group row">
        <label id="elh_patient_an_registration_P" for="x_P" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_P"><?= $Page->P->caption() ?><?= $Page->P->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P->cellAttributes() ?>>
<template id="tpx_patient_an_registration_P"><span id="el_patient_an_registration_P">
<input type="<?= $Page->P->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_P" name="x_P" id="x_P" size="8" maxlength="45" placeholder="<?= HtmlEncode($Page->P->getPlaceHolder()) ?>" value="<?= $Page->P->EditValue ?>"<?= $Page->P->editAttributes() ?> aria-describedby="x_P_help">
<?= $Page->P->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->L->Visible) { // L ?>
    <div id="r_L" class="form-group row">
        <label id="elh_patient_an_registration_L" for="x_L" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_L"><?= $Page->L->caption() ?><?= $Page->L->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->L->cellAttributes() ?>>
<template id="tpx_patient_an_registration_L"><span id="el_patient_an_registration_L">
<input type="<?= $Page->L->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_L" name="x_L" id="x_L" size="8" maxlength="45" placeholder="<?= HtmlEncode($Page->L->getPlaceHolder()) ?>" value="<?= $Page->L->EditValue ?>"<?= $Page->L->editAttributes() ?> aria-describedby="x_L_help">
<?= $Page->L->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->L->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <div id="r_A" class="form-group row">
        <label id="elh_patient_an_registration_A" for="x_A" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A"><?= $Page->A->caption() ?><?= $Page->A->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A"><span id="el_patient_an_registration_A">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A" name="x_A" id="x_A" size="8" maxlength="45" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?> aria-describedby="x_A_help">
<?= $Page->A->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E->Visible) { // E ?>
    <div id="r_E" class="form-group row">
        <label id="elh_patient_an_registration_E" for="x_E" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_E"><?= $Page->E->caption() ?><?= $Page->E->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E->cellAttributes() ?>>
<template id="tpx_patient_an_registration_E"><span id="el_patient_an_registration_E">
<input type="<?= $Page->E->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_E" name="x_E" id="x_E" size="8" maxlength="45" placeholder="<?= HtmlEncode($Page->E->getPlaceHolder()) ?>" value="<?= $Page->E->EditValue ?>"<?= $Page->E->editAttributes() ?> aria-describedby="x_E_help">
<?= $Page->E->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <div id="r_M" class="form-group row">
        <label id="elh_patient_an_registration_M" for="x_M" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_M"><?= $Page->M->caption() ?><?= $Page->M->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->M->cellAttributes() ?>>
<template id="tpx_patient_an_registration_M"><span id="el_patient_an_registration_M">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_M" name="x_M" id="x_M" size="8" maxlength="45" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?> aria-describedby="x_M_help">
<?= $Page->M->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label id="elh_patient_an_registration_LMP" for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_LMP"><?= $Page->LMP->caption() ?><?= $Page->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_LMP"><span id="el_patient_an_registration_LMP">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_LMP" name="x_LMP" id="x_LMP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?> aria-describedby="x_LMP_help">
<?= $Page->LMP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage() ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EDO->Visible) { // EDO ?>
    <div id="r_EDO" class="form-group row">
        <label id="elh_patient_an_registration_EDO" for="x_EDO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_EDO"><?= $Page->EDO->caption() ?><?= $Page->EDO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDO->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EDO"><span id="el_patient_an_registration_EDO">
<input type="<?= $Page->EDO->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EDO" name="x_EDO" id="x_EDO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EDO->getPlaceHolder()) ?>" value="<?= $Page->EDO->EditValue ?>"<?= $Page->EDO->editAttributes() ?> aria-describedby="x_EDO_help">
<?= $Page->EDO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EDO->getErrorMessage() ?></div>
<?php if (!$Page->EDO->ReadOnly && !$Page->EDO->Disabled && !isset($Page->EDO->EditAttrs["readonly"]) && !isset($Page->EDO->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <div id="r_MenstrualHistory" class="form-group row">
        <label id="elh_patient_an_registration_MenstrualHistory" for="x_MenstrualHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?><?= $Page->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MenstrualHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_MenstrualHistory"><span id="el_patient_an_registration_MenstrualHistory">
    <select
        id="x_MenstrualHistory"
        name="x_MenstrualHistory"
        class="form-control ew-select<?= $Page->MenstrualHistory->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_MenstrualHistory"
        data-table="patient_an_registration"
        data-field="x_MenstrualHistory"
        data-value-separator="<?= $Page->MenstrualHistory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->MenstrualHistory->getPlaceHolder()) ?>"
        <?= $Page->MenstrualHistory->editAttributes() ?>>
        <?= $Page->MenstrualHistory->selectOptionListHtml("x_MenstrualHistory") ?>
    </select>
    <?= $Page->MenstrualHistory->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->MenstrualHistory->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_MenstrualHistory']"),
        options = { name: "x_MenstrualHistory", selectId: "patient_an_registration_x_MenstrualHistory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.MenstrualHistory.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.MenstrualHistory.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
    <div id="r_MaritalHistory" class="form-group row">
        <label id="elh_patient_an_registration_MaritalHistory" for="x_MaritalHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_MaritalHistory"><?= $Page->MaritalHistory->caption() ?><?= $Page->MaritalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaritalHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_MaritalHistory"><span id="el_patient_an_registration_MaritalHistory">
<input type="<?= $Page->MaritalHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x_MaritalHistory" id="x_MaritalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MaritalHistory->getPlaceHolder()) ?>" value="<?= $Page->MaritalHistory->EditValue ?>"<?= $Page->MaritalHistory->editAttributes() ?> aria-describedby="x_MaritalHistory_help">
<?= $Page->MaritalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaritalHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <div id="r_ObstetricHistory" class="form-group row">
        <label id="elh_patient_an_registration_ObstetricHistory" for="x_ObstetricHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ObstetricHistory"><?= $Page->ObstetricHistory->caption() ?><?= $Page->ObstetricHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ObstetricHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ObstetricHistory"><span id="el_patient_an_registration_ObstetricHistory">
<input type="<?= $Page->ObstetricHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ObstetricHistory->getPlaceHolder()) ?>" value="<?= $Page->ObstetricHistory->EditValue ?>"<?= $Page->ObstetricHistory->editAttributes() ?> aria-describedby="x_ObstetricHistory_help">
<?= $Page->ObstetricHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ObstetricHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
    <div id="r_PreviousHistoryofGDM" class="form-group row">
        <label id="elh_patient_an_registration_PreviousHistoryofGDM" for="x_PreviousHistoryofGDM" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PreviousHistoryofGDM"><?= $Page->PreviousHistoryofGDM->caption() ?><?= $Page->PreviousHistoryofGDM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreviousHistoryofGDM->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PreviousHistoryofGDM"><span id="el_patient_an_registration_PreviousHistoryofGDM">
    <select
        id="x_PreviousHistoryofGDM"
        name="x_PreviousHistoryofGDM"
        class="form-control ew-select<?= $Page->PreviousHistoryofGDM->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_PreviousHistoryofGDM"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofGDM"
        data-value-separator="<?= $Page->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PreviousHistoryofGDM->getPlaceHolder()) ?>"
        <?= $Page->PreviousHistoryofGDM->editAttributes() ?>>
        <?= $Page->PreviousHistoryofGDM->selectOptionListHtml("x_PreviousHistoryofGDM") ?>
    </select>
    <?= $Page->PreviousHistoryofGDM->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PreviousHistoryofGDM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_PreviousHistoryofGDM']"),
        options = { name: "x_PreviousHistoryofGDM", selectId: "patient_an_registration_x_PreviousHistoryofGDM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofGDM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofGDM.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
    <div id="r_PreviousHistorofPIH" class="form-group row">
        <label id="elh_patient_an_registration_PreviousHistorofPIH" for="x_PreviousHistorofPIH" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PreviousHistorofPIH"><?= $Page->PreviousHistorofPIH->caption() ?><?= $Page->PreviousHistorofPIH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreviousHistorofPIH->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PreviousHistorofPIH"><span id="el_patient_an_registration_PreviousHistorofPIH">
    <select
        id="x_PreviousHistorofPIH"
        name="x_PreviousHistorofPIH"
        class="form-control ew-select<?= $Page->PreviousHistorofPIH->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_PreviousHistorofPIH"
        data-table="patient_an_registration"
        data-field="x_PreviousHistorofPIH"
        data-value-separator="<?= $Page->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PreviousHistorofPIH->getPlaceHolder()) ?>"
        <?= $Page->PreviousHistorofPIH->editAttributes() ?>>
        <?= $Page->PreviousHistorofPIH->selectOptionListHtml("x_PreviousHistorofPIH") ?>
    </select>
    <?= $Page->PreviousHistorofPIH->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PreviousHistorofPIH->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_PreviousHistorofPIH']"),
        options = { name: "x_PreviousHistorofPIH", selectId: "patient_an_registration_x_PreviousHistorofPIH", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistorofPIH.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistorofPIH.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
    <div id="r_PreviousHistoryofIUGR" class="form-group row">
        <label id="elh_patient_an_registration_PreviousHistoryofIUGR" for="x_PreviousHistoryofIUGR" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PreviousHistoryofIUGR"><?= $Page->PreviousHistoryofIUGR->caption() ?><?= $Page->PreviousHistoryofIUGR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreviousHistoryofIUGR->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PreviousHistoryofIUGR"><span id="el_patient_an_registration_PreviousHistoryofIUGR">
    <select
        id="x_PreviousHistoryofIUGR"
        name="x_PreviousHistoryofIUGR"
        class="form-control ew-select<?= $Page->PreviousHistoryofIUGR->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_PreviousHistoryofIUGR"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofIUGR"
        data-value-separator="<?= $Page->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PreviousHistoryofIUGR->getPlaceHolder()) ?>"
        <?= $Page->PreviousHistoryofIUGR->editAttributes() ?>>
        <?= $Page->PreviousHistoryofIUGR->selectOptionListHtml("x_PreviousHistoryofIUGR") ?>
    </select>
    <?= $Page->PreviousHistoryofIUGR->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PreviousHistoryofIUGR->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_PreviousHistoryofIUGR']"),
        options = { name: "x_PreviousHistoryofIUGR", selectId: "patient_an_registration_x_PreviousHistoryofIUGR", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofIUGR.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofIUGR.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
    <div id="r_PreviousHistoryofOligohydramnios" class="form-group row">
        <label id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" for="x_PreviousHistoryofOligohydramnios" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PreviousHistoryofOligohydramnios"><?= $Page->PreviousHistoryofOligohydramnios->caption() ?><?= $Page->PreviousHistoryofOligohydramnios->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PreviousHistoryofOligohydramnios"><span id="el_patient_an_registration_PreviousHistoryofOligohydramnios">
    <select
        id="x_PreviousHistoryofOligohydramnios"
        name="x_PreviousHistoryofOligohydramnios"
        class="form-control ew-select<?= $Page->PreviousHistoryofOligohydramnios->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_PreviousHistoryofOligohydramnios"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofOligohydramnios"
        data-value-separator="<?= $Page->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PreviousHistoryofOligohydramnios->getPlaceHolder()) ?>"
        <?= $Page->PreviousHistoryofOligohydramnios->editAttributes() ?>>
        <?= $Page->PreviousHistoryofOligohydramnios->selectOptionListHtml("x_PreviousHistoryofOligohydramnios") ?>
    </select>
    <?= $Page->PreviousHistoryofOligohydramnios->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PreviousHistoryofOligohydramnios->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_PreviousHistoryofOligohydramnios']"),
        options = { name: "x_PreviousHistoryofOligohydramnios", selectId: "patient_an_registration_x_PreviousHistoryofOligohydramnios", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofOligohydramnios.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofOligohydramnios.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
    <div id="r_PreviousHistoryofPreterm" class="form-group row">
        <label id="elh_patient_an_registration_PreviousHistoryofPreterm" for="x_PreviousHistoryofPreterm" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PreviousHistoryofPreterm"><?= $Page->PreviousHistoryofPreterm->caption() ?><?= $Page->PreviousHistoryofPreterm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreviousHistoryofPreterm->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PreviousHistoryofPreterm"><span id="el_patient_an_registration_PreviousHistoryofPreterm">
    <select
        id="x_PreviousHistoryofPreterm"
        name="x_PreviousHistoryofPreterm"
        class="form-control ew-select<?= $Page->PreviousHistoryofPreterm->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_PreviousHistoryofPreterm"
        data-table="patient_an_registration"
        data-field="x_PreviousHistoryofPreterm"
        data-value-separator="<?= $Page->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PreviousHistoryofPreterm->getPlaceHolder()) ?>"
        <?= $Page->PreviousHistoryofPreterm->editAttributes() ?>>
        <?= $Page->PreviousHistoryofPreterm->selectOptionListHtml("x_PreviousHistoryofPreterm") ?>
    </select>
    <?= $Page->PreviousHistoryofPreterm->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PreviousHistoryofPreterm->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_PreviousHistoryofPreterm']"),
        options = { name: "x_PreviousHistoryofPreterm", selectId: "patient_an_registration_x_PreviousHistoryofPreterm", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.PreviousHistoryofPreterm.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.PreviousHistoryofPreterm.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->G1->Visible) { // G1 ?>
    <div id="r_G1" class="form-group row">
        <label id="elh_patient_an_registration_G1" for="x_G1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_G1"><?= $Page->G1->caption() ?><?= $Page->G1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->G1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_G1"><span id="el_patient_an_registration_G1">
<input type="<?= $Page->G1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G1" name="x_G1" id="x_G1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->G1->getPlaceHolder()) ?>" value="<?= $Page->G1->EditValue ?>"<?= $Page->G1->editAttributes() ?> aria-describedby="x_G1_help">
<?= $Page->G1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->G1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->G2->Visible) { // G2 ?>
    <div id="r_G2" class="form-group row">
        <label id="elh_patient_an_registration_G2" for="x_G2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_G2"><?= $Page->G2->caption() ?><?= $Page->G2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->G2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_G2"><span id="el_patient_an_registration_G2">
<input type="<?= $Page->G2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G2" name="x_G2" id="x_G2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->G2->getPlaceHolder()) ?>" value="<?= $Page->G2->EditValue ?>"<?= $Page->G2->editAttributes() ?> aria-describedby="x_G2_help">
<?= $Page->G2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->G2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->G3->Visible) { // G3 ?>
    <div id="r_G3" class="form-group row">
        <label id="elh_patient_an_registration_G3" for="x_G3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_G3"><?= $Page->G3->caption() ?><?= $Page->G3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->G3->cellAttributes() ?>>
<template id="tpx_patient_an_registration_G3"><span id="el_patient_an_registration_G3">
<input type="<?= $Page->G3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G3" name="x_G3" id="x_G3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->G3->getPlaceHolder()) ?>" value="<?= $Page->G3->EditValue ?>"<?= $Page->G3->editAttributes() ?> aria-describedby="x_G3_help">
<?= $Page->G3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->G3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
    <div id="r_DeliveryNDLSCS1" class="form-group row">
        <label id="elh_patient_an_registration_DeliveryNDLSCS1" for="x_DeliveryNDLSCS1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_DeliveryNDLSCS1"><?= $Page->DeliveryNDLSCS1->caption() ?><?= $Page->DeliveryNDLSCS1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryNDLSCS1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DeliveryNDLSCS1"><span id="el_patient_an_registration_DeliveryNDLSCS1">
<input type="<?= $Page->DeliveryNDLSCS1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x_DeliveryNDLSCS1" id="x_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?= $Page->DeliveryNDLSCS1->EditValue ?>"<?= $Page->DeliveryNDLSCS1->editAttributes() ?> aria-describedby="x_DeliveryNDLSCS1_help">
<?= $Page->DeliveryNDLSCS1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryNDLSCS1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
    <div id="r_DeliveryNDLSCS2" class="form-group row">
        <label id="elh_patient_an_registration_DeliveryNDLSCS2" for="x_DeliveryNDLSCS2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_DeliveryNDLSCS2"><?= $Page->DeliveryNDLSCS2->caption() ?><?= $Page->DeliveryNDLSCS2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryNDLSCS2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DeliveryNDLSCS2"><span id="el_patient_an_registration_DeliveryNDLSCS2">
<input type="<?= $Page->DeliveryNDLSCS2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x_DeliveryNDLSCS2" id="x_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?= $Page->DeliveryNDLSCS2->EditValue ?>"<?= $Page->DeliveryNDLSCS2->editAttributes() ?> aria-describedby="x_DeliveryNDLSCS2_help">
<?= $Page->DeliveryNDLSCS2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryNDLSCS2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
    <div id="r_DeliveryNDLSCS3" class="form-group row">
        <label id="elh_patient_an_registration_DeliveryNDLSCS3" for="x_DeliveryNDLSCS3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_DeliveryNDLSCS3"><?= $Page->DeliveryNDLSCS3->caption() ?><?= $Page->DeliveryNDLSCS3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryNDLSCS3->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DeliveryNDLSCS3"><span id="el_patient_an_registration_DeliveryNDLSCS3">
<input type="<?= $Page->DeliveryNDLSCS3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x_DeliveryNDLSCS3" id="x_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?= $Page->DeliveryNDLSCS3->EditValue ?>"<?= $Page->DeliveryNDLSCS3->editAttributes() ?> aria-describedby="x_DeliveryNDLSCS3_help">
<?= $Page->DeliveryNDLSCS3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryNDLSCS3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BabySexweight1->Visible) { // BabySexweight1 ?>
    <div id="r_BabySexweight1" class="form-group row">
        <label id="elh_patient_an_registration_BabySexweight1" for="x_BabySexweight1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_BabySexweight1"><?= $Page->BabySexweight1->caption() ?><?= $Page->BabySexweight1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BabySexweight1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_BabySexweight1"><span id="el_patient_an_registration_BabySexweight1">
<input type="<?= $Page->BabySexweight1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x_BabySexweight1" id="x_BabySexweight1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BabySexweight1->getPlaceHolder()) ?>" value="<?= $Page->BabySexweight1->EditValue ?>"<?= $Page->BabySexweight1->editAttributes() ?> aria-describedby="x_BabySexweight1_help">
<?= $Page->BabySexweight1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BabySexweight1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BabySexweight2->Visible) { // BabySexweight2 ?>
    <div id="r_BabySexweight2" class="form-group row">
        <label id="elh_patient_an_registration_BabySexweight2" for="x_BabySexweight2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_BabySexweight2"><?= $Page->BabySexweight2->caption() ?><?= $Page->BabySexweight2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BabySexweight2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_BabySexweight2"><span id="el_patient_an_registration_BabySexweight2">
<input type="<?= $Page->BabySexweight2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x_BabySexweight2" id="x_BabySexweight2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BabySexweight2->getPlaceHolder()) ?>" value="<?= $Page->BabySexweight2->EditValue ?>"<?= $Page->BabySexweight2->editAttributes() ?> aria-describedby="x_BabySexweight2_help">
<?= $Page->BabySexweight2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BabySexweight2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BabySexweight3->Visible) { // BabySexweight3 ?>
    <div id="r_BabySexweight3" class="form-group row">
        <label id="elh_patient_an_registration_BabySexweight3" for="x_BabySexweight3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_BabySexweight3"><?= $Page->BabySexweight3->caption() ?><?= $Page->BabySexweight3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BabySexweight3->cellAttributes() ?>>
<template id="tpx_patient_an_registration_BabySexweight3"><span id="el_patient_an_registration_BabySexweight3">
<input type="<?= $Page->BabySexweight3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x_BabySexweight3" id="x_BabySexweight3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BabySexweight3->getPlaceHolder()) ?>" value="<?= $Page->BabySexweight3->EditValue ?>"<?= $Page->BabySexweight3->editAttributes() ?> aria-describedby="x_BabySexweight3_help">
<?= $Page->BabySexweight3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BabySexweight3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
    <div id="r_PastMedicalHistory" class="form-group row">
        <label id="elh_patient_an_registration_PastMedicalHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PastMedicalHistory"><?= $Page->PastMedicalHistory->caption() ?><?= $Page->PastMedicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastMedicalHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PastMedicalHistory"><span id="el_patient_an_registration_PastMedicalHistory">
<template id="tp_x_PastMedicalHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="x_PastMedicalHistory" id="x_PastMedicalHistory"<?= $Page->PastMedicalHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_PastMedicalHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_PastMedicalHistory[]"
    name="x_PastMedicalHistory[]"
    value="<?= HtmlEncode($Page->PastMedicalHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_PastMedicalHistory"
    data-target="dsl_x_PastMedicalHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PastMedicalHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_PastMedicalHistory"
    data-value-separator="<?= $Page->PastMedicalHistory->displayValueSeparatorAttribute() ?>"
    <?= $Page->PastMedicalHistory->editAttributes() ?>>
<?= $Page->PastMedicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastMedicalHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
    <div id="r_PastSurgicalHistory" class="form-group row">
        <label id="elh_patient_an_registration_PastSurgicalHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PastSurgicalHistory"><?= $Page->PastSurgicalHistory->caption() ?><?= $Page->PastSurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastSurgicalHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PastSurgicalHistory"><span id="el_patient_an_registration_PastSurgicalHistory">
<template id="tp_x_PastSurgicalHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="x_PastSurgicalHistory" id="x_PastSurgicalHistory"<?= $Page->PastSurgicalHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_PastSurgicalHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_PastSurgicalHistory[]"
    name="x_PastSurgicalHistory[]"
    value="<?= HtmlEncode($Page->PastSurgicalHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_PastSurgicalHistory"
    data-target="dsl_x_PastSurgicalHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PastSurgicalHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_PastSurgicalHistory"
    data-value-separator="<?= $Page->PastSurgicalHistory->displayValueSeparatorAttribute() ?>"
    <?= $Page->PastSurgicalHistory->editAttributes() ?>>
<?= $Page->PastSurgicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastSurgicalHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <div id="r_FamilyHistory" class="form-group row">
        <label id="elh_patient_an_registration_FamilyHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_FamilyHistory"><?= $Page->FamilyHistory->caption() ?><?= $Page->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FamilyHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_FamilyHistory"><span id="el_patient_an_registration_FamilyHistory">
<template id="tp_x_FamilyHistory">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory"<?= $Page->FamilyHistory->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_FamilyHistory" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_FamilyHistory[]"
    name="x_FamilyHistory[]"
    value="<?= HtmlEncode($Page->FamilyHistory->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_FamilyHistory"
    data-target="dsl_x_FamilyHistory"
    data-repeatcolumn="5"
    class="form-control<?= $Page->FamilyHistory->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_FamilyHistory"
    data-value-separator="<?= $Page->FamilyHistory->displayValueSeparatorAttribute() ?>"
    <?= $Page->FamilyHistory->editAttributes() ?>>
<?= $Page->FamilyHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FamilyHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Viability->Visible) { // Viability ?>
    <div id="r_Viability" class="form-group row">
        <label id="elh_patient_an_registration_Viability" for="x_Viability" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Viability"><?= $Page->Viability->caption() ?><?= $Page->Viability->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Viability->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Viability"><span id="el_patient_an_registration_Viability">
<input type="<?= $Page->Viability->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability" name="x_Viability" id="x_Viability" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Viability->getPlaceHolder()) ?>" value="<?= $Page->Viability->EditValue ?>"<?= $Page->Viability->editAttributes() ?> aria-describedby="x_Viability_help">
<?= $Page->Viability->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Viability->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ViabilityDATE->Visible) { // ViabilityDATE ?>
    <div id="r_ViabilityDATE" class="form-group row">
        <label id="elh_patient_an_registration_ViabilityDATE" for="x_ViabilityDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ViabilityDATE"><?= $Page->ViabilityDATE->caption() ?><?= $Page->ViabilityDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ViabilityDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ViabilityDATE"><span id="el_patient_an_registration_ViabilityDATE">
<input type="<?= $Page->ViabilityDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x_ViabilityDATE" id="x_ViabilityDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ViabilityDATE->getPlaceHolder()) ?>" value="<?= $Page->ViabilityDATE->EditValue ?>"<?= $Page->ViabilityDATE->editAttributes() ?> aria-describedby="x_ViabilityDATE_help">
<?= $Page->ViabilityDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ViabilityDATE->getErrorMessage() ?></div>
<?php if (!$Page->ViabilityDATE->ReadOnly && !$Page->ViabilityDATE->Disabled && !isset($Page->ViabilityDATE->EditAttrs["readonly"]) && !isset($Page->ViabilityDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
    <div id="r_ViabilityREPORT" class="form-group row">
        <label id="elh_patient_an_registration_ViabilityREPORT" for="x_ViabilityREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ViabilityREPORT"><?= $Page->ViabilityREPORT->caption() ?><?= $Page->ViabilityREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ViabilityREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ViabilityREPORT"><span id="el_patient_an_registration_ViabilityREPORT">
<input type="<?= $Page->ViabilityREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x_ViabilityREPORT" id="x_ViabilityREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ViabilityREPORT->getPlaceHolder()) ?>" value="<?= $Page->ViabilityREPORT->EditValue ?>"<?= $Page->ViabilityREPORT->editAttributes() ?> aria-describedby="x_ViabilityREPORT_help">
<?= $Page->ViabilityREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ViabilityREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Viability2->Visible) { // Viability2 ?>
    <div id="r_Viability2" class="form-group row">
        <label id="elh_patient_an_registration_Viability2" for="x_Viability2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Viability2"><?= $Page->Viability2->caption() ?><?= $Page->Viability2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Viability2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Viability2"><span id="el_patient_an_registration_Viability2">
<input type="<?= $Page->Viability2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2" name="x_Viability2" id="x_Viability2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Viability2->getPlaceHolder()) ?>" value="<?= $Page->Viability2->EditValue ?>"<?= $Page->Viability2->editAttributes() ?> aria-describedby="x_Viability2_help">
<?= $Page->Viability2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Viability2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Viability2DATE->Visible) { // Viability2DATE ?>
    <div id="r_Viability2DATE" class="form-group row">
        <label id="elh_patient_an_registration_Viability2DATE" for="x_Viability2DATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Viability2DATE"><?= $Page->Viability2DATE->caption() ?><?= $Page->Viability2DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Viability2DATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Viability2DATE"><span id="el_patient_an_registration_Viability2DATE">
<input type="<?= $Page->Viability2DATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x_Viability2DATE" id="x_Viability2DATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Viability2DATE->getPlaceHolder()) ?>" value="<?= $Page->Viability2DATE->EditValue ?>"<?= $Page->Viability2DATE->editAttributes() ?> aria-describedby="x_Viability2DATE_help">
<?= $Page->Viability2DATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Viability2DATE->getErrorMessage() ?></div>
<?php if (!$Page->Viability2DATE->ReadOnly && !$Page->Viability2DATE->Disabled && !isset($Page->Viability2DATE->EditAttrs["readonly"]) && !isset($Page->Viability2DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Viability2REPORT->Visible) { // Viability2REPORT ?>
    <div id="r_Viability2REPORT" class="form-group row">
        <label id="elh_patient_an_registration_Viability2REPORT" for="x_Viability2REPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Viability2REPORT"><?= $Page->Viability2REPORT->caption() ?><?= $Page->Viability2REPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Viability2REPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Viability2REPORT"><span id="el_patient_an_registration_Viability2REPORT">
<input type="<?= $Page->Viability2REPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x_Viability2REPORT" id="x_Viability2REPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Viability2REPORT->getPlaceHolder()) ?>" value="<?= $Page->Viability2REPORT->EditValue ?>"<?= $Page->Viability2REPORT->editAttributes() ?> aria-describedby="x_Viability2REPORT_help">
<?= $Page->Viability2REPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Viability2REPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NTscan->Visible) { // NTscan ?>
    <div id="r_NTscan" class="form-group row">
        <label id="elh_patient_an_registration_NTscan" for="x_NTscan" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_NTscan"><?= $Page->NTscan->caption() ?><?= $Page->NTscan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NTscan->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NTscan"><span id="el_patient_an_registration_NTscan">
<input type="<?= $Page->NTscan->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscan" name="x_NTscan" id="x_NTscan" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NTscan->getPlaceHolder()) ?>" value="<?= $Page->NTscan->EditValue ?>"<?= $Page->NTscan->editAttributes() ?> aria-describedby="x_NTscan_help">
<?= $Page->NTscan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NTscan->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NTscanDATE->Visible) { // NTscanDATE ?>
    <div id="r_NTscanDATE" class="form-group row">
        <label id="elh_patient_an_registration_NTscanDATE" for="x_NTscanDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_NTscanDATE"><?= $Page->NTscanDATE->caption() ?><?= $Page->NTscanDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NTscanDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NTscanDATE"><span id="el_patient_an_registration_NTscanDATE">
<input type="<?= $Page->NTscanDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x_NTscanDATE" id="x_NTscanDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NTscanDATE->getPlaceHolder()) ?>" value="<?= $Page->NTscanDATE->EditValue ?>"<?= $Page->NTscanDATE->editAttributes() ?> aria-describedby="x_NTscanDATE_help">
<?= $Page->NTscanDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NTscanDATE->getErrorMessage() ?></div>
<?php if (!$Page->NTscanDATE->ReadOnly && !$Page->NTscanDATE->Disabled && !isset($Page->NTscanDATE->EditAttrs["readonly"]) && !isset($Page->NTscanDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NTscanREPORT->Visible) { // NTscanREPORT ?>
    <div id="r_NTscanREPORT" class="form-group row">
        <label id="elh_patient_an_registration_NTscanREPORT" for="x_NTscanREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_NTscanREPORT"><?= $Page->NTscanREPORT->caption() ?><?= $Page->NTscanREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NTscanREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NTscanREPORT"><span id="el_patient_an_registration_NTscanREPORT">
<input type="<?= $Page->NTscanREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x_NTscanREPORT" id="x_NTscanREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NTscanREPORT->getPlaceHolder()) ?>" value="<?= $Page->NTscanREPORT->EditValue ?>"<?= $Page->NTscanREPORT->editAttributes() ?> aria-describedby="x_NTscanREPORT_help">
<?= $Page->NTscanREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NTscanREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EarlyTarget->Visible) { // EarlyTarget ?>
    <div id="r_EarlyTarget" class="form-group row">
        <label id="elh_patient_an_registration_EarlyTarget" for="x_EarlyTarget" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_EarlyTarget"><?= $Page->EarlyTarget->caption() ?><?= $Page->EarlyTarget->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EarlyTarget->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EarlyTarget"><span id="el_patient_an_registration_EarlyTarget">
<input type="<?= $Page->EarlyTarget->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x_EarlyTarget" id="x_EarlyTarget" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EarlyTarget->getPlaceHolder()) ?>" value="<?= $Page->EarlyTarget->EditValue ?>"<?= $Page->EarlyTarget->editAttributes() ?> aria-describedby="x_EarlyTarget_help">
<?= $Page->EarlyTarget->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EarlyTarget->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
    <div id="r_EarlyTargetDATE" class="form-group row">
        <label id="elh_patient_an_registration_EarlyTargetDATE" for="x_EarlyTargetDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_EarlyTargetDATE"><?= $Page->EarlyTargetDATE->caption() ?><?= $Page->EarlyTargetDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EarlyTargetDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EarlyTargetDATE"><span id="el_patient_an_registration_EarlyTargetDATE">
<input type="<?= $Page->EarlyTargetDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x_EarlyTargetDATE" id="x_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?= $Page->EarlyTargetDATE->EditValue ?>"<?= $Page->EarlyTargetDATE->editAttributes() ?> aria-describedby="x_EarlyTargetDATE_help">
<?= $Page->EarlyTargetDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EarlyTargetDATE->getErrorMessage() ?></div>
<?php if (!$Page->EarlyTargetDATE->ReadOnly && !$Page->EarlyTargetDATE->Disabled && !isset($Page->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($Page->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
    <div id="r_EarlyTargetREPORT" class="form-group row">
        <label id="elh_patient_an_registration_EarlyTargetREPORT" for="x_EarlyTargetREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_EarlyTargetREPORT"><?= $Page->EarlyTargetREPORT->caption() ?><?= $Page->EarlyTargetREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EarlyTargetREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EarlyTargetREPORT"><span id="el_patient_an_registration_EarlyTargetREPORT">
<input type="<?= $Page->EarlyTargetREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x_EarlyTargetREPORT" id="x_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?= $Page->EarlyTargetREPORT->EditValue ?>"<?= $Page->EarlyTargetREPORT->editAttributes() ?> aria-describedby="x_EarlyTargetREPORT_help">
<?= $Page->EarlyTargetREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EarlyTargetREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anomaly->Visible) { // Anomaly ?>
    <div id="r_Anomaly" class="form-group row">
        <label id="elh_patient_an_registration_Anomaly" for="x_Anomaly" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Anomaly"><?= $Page->Anomaly->caption() ?><?= $Page->Anomaly->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anomaly->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Anomaly"><span id="el_patient_an_registration_Anomaly">
<input type="<?= $Page->Anomaly->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Anomaly" name="x_Anomaly" id="x_Anomaly" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Anomaly->getPlaceHolder()) ?>" value="<?= $Page->Anomaly->EditValue ?>"<?= $Page->Anomaly->editAttributes() ?> aria-describedby="x_Anomaly_help">
<?= $Page->Anomaly->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anomaly->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnomalyDATE->Visible) { // AnomalyDATE ?>
    <div id="r_AnomalyDATE" class="form-group row">
        <label id="elh_patient_an_registration_AnomalyDATE" for="x_AnomalyDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_AnomalyDATE"><?= $Page->AnomalyDATE->caption() ?><?= $Page->AnomalyDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnomalyDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_AnomalyDATE"><span id="el_patient_an_registration_AnomalyDATE">
<input type="<?= $Page->AnomalyDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x_AnomalyDATE" id="x_AnomalyDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnomalyDATE->getPlaceHolder()) ?>" value="<?= $Page->AnomalyDATE->EditValue ?>"<?= $Page->AnomalyDATE->editAttributes() ?> aria-describedby="x_AnomalyDATE_help">
<?= $Page->AnomalyDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnomalyDATE->getErrorMessage() ?></div>
<?php if (!$Page->AnomalyDATE->ReadOnly && !$Page->AnomalyDATE->Disabled && !isset($Page->AnomalyDATE->EditAttrs["readonly"]) && !isset($Page->AnomalyDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
    <div id="r_AnomalyREPORT" class="form-group row">
        <label id="elh_patient_an_registration_AnomalyREPORT" for="x_AnomalyREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_AnomalyREPORT"><?= $Page->AnomalyREPORT->caption() ?><?= $Page->AnomalyREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnomalyREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_AnomalyREPORT"><span id="el_patient_an_registration_AnomalyREPORT">
<input type="<?= $Page->AnomalyREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x_AnomalyREPORT" id="x_AnomalyREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnomalyREPORT->getPlaceHolder()) ?>" value="<?= $Page->AnomalyREPORT->EditValue ?>"<?= $Page->AnomalyREPORT->editAttributes() ?> aria-describedby="x_AnomalyREPORT_help">
<?= $Page->AnomalyREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnomalyREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Growth->Visible) { // Growth ?>
    <div id="r_Growth" class="form-group row">
        <label id="elh_patient_an_registration_Growth" for="x_Growth" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Growth"><?= $Page->Growth->caption() ?><?= $Page->Growth->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Growth->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Growth"><span id="el_patient_an_registration_Growth">
<input type="<?= $Page->Growth->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth" name="x_Growth" id="x_Growth" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Growth->getPlaceHolder()) ?>" value="<?= $Page->Growth->EditValue ?>"<?= $Page->Growth->editAttributes() ?> aria-describedby="x_Growth_help">
<?= $Page->Growth->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Growth->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrowthDATE->Visible) { // GrowthDATE ?>
    <div id="r_GrowthDATE" class="form-group row">
        <label id="elh_patient_an_registration_GrowthDATE" for="x_GrowthDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_GrowthDATE"><?= $Page->GrowthDATE->caption() ?><?= $Page->GrowthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrowthDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_GrowthDATE"><span id="el_patient_an_registration_GrowthDATE">
<input type="<?= $Page->GrowthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x_GrowthDATE" id="x_GrowthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GrowthDATE->getPlaceHolder()) ?>" value="<?= $Page->GrowthDATE->EditValue ?>"<?= $Page->GrowthDATE->editAttributes() ?> aria-describedby="x_GrowthDATE_help">
<?= $Page->GrowthDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrowthDATE->getErrorMessage() ?></div>
<?php if (!$Page->GrowthDATE->ReadOnly && !$Page->GrowthDATE->Disabled && !isset($Page->GrowthDATE->EditAttrs["readonly"]) && !isset($Page->GrowthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrowthREPORT->Visible) { // GrowthREPORT ?>
    <div id="r_GrowthREPORT" class="form-group row">
        <label id="elh_patient_an_registration_GrowthREPORT" for="x_GrowthREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_GrowthREPORT"><?= $Page->GrowthREPORT->caption() ?><?= $Page->GrowthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrowthREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_GrowthREPORT"><span id="el_patient_an_registration_GrowthREPORT">
<input type="<?= $Page->GrowthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x_GrowthREPORT" id="x_GrowthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GrowthREPORT->getPlaceHolder()) ?>" value="<?= $Page->GrowthREPORT->EditValue ?>"<?= $Page->GrowthREPORT->editAttributes() ?> aria-describedby="x_GrowthREPORT_help">
<?= $Page->GrowthREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrowthREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Growth1->Visible) { // Growth1 ?>
    <div id="r_Growth1" class="form-group row">
        <label id="elh_patient_an_registration_Growth1" for="x_Growth1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Growth1"><?= $Page->Growth1->caption() ?><?= $Page->Growth1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Growth1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Growth1"><span id="el_patient_an_registration_Growth1">
<input type="<?= $Page->Growth1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1" name="x_Growth1" id="x_Growth1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Growth1->getPlaceHolder()) ?>" value="<?= $Page->Growth1->EditValue ?>"<?= $Page->Growth1->editAttributes() ?> aria-describedby="x_Growth1_help">
<?= $Page->Growth1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Growth1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Growth1DATE->Visible) { // Growth1DATE ?>
    <div id="r_Growth1DATE" class="form-group row">
        <label id="elh_patient_an_registration_Growth1DATE" for="x_Growth1DATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Growth1DATE"><?= $Page->Growth1DATE->caption() ?><?= $Page->Growth1DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Growth1DATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Growth1DATE"><span id="el_patient_an_registration_Growth1DATE">
<input type="<?= $Page->Growth1DATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x_Growth1DATE" id="x_Growth1DATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Growth1DATE->getPlaceHolder()) ?>" value="<?= $Page->Growth1DATE->EditValue ?>"<?= $Page->Growth1DATE->editAttributes() ?> aria-describedby="x_Growth1DATE_help">
<?= $Page->Growth1DATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Growth1DATE->getErrorMessage() ?></div>
<?php if (!$Page->Growth1DATE->ReadOnly && !$Page->Growth1DATE->Disabled && !isset($Page->Growth1DATE->EditAttrs["readonly"]) && !isset($Page->Growth1DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Growth1REPORT->Visible) { // Growth1REPORT ?>
    <div id="r_Growth1REPORT" class="form-group row">
        <label id="elh_patient_an_registration_Growth1REPORT" for="x_Growth1REPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Growth1REPORT"><?= $Page->Growth1REPORT->caption() ?><?= $Page->Growth1REPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Growth1REPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Growth1REPORT"><span id="el_patient_an_registration_Growth1REPORT">
<input type="<?= $Page->Growth1REPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x_Growth1REPORT" id="x_Growth1REPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Growth1REPORT->getPlaceHolder()) ?>" value="<?= $Page->Growth1REPORT->EditValue ?>"<?= $Page->Growth1REPORT->editAttributes() ?> aria-describedby="x_Growth1REPORT_help">
<?= $Page->Growth1REPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Growth1REPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANProfile->Visible) { // ANProfile ?>
    <div id="r_ANProfile" class="form-group row">
        <label id="elh_patient_an_registration_ANProfile" for="x_ANProfile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ANProfile"><?= $Page->ANProfile->caption() ?><?= $Page->ANProfile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANProfile->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANProfile"><span id="el_patient_an_registration_ANProfile">
<input type="<?= $Page->ANProfile->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfile" name="x_ANProfile" id="x_ANProfile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANProfile->getPlaceHolder()) ?>" value="<?= $Page->ANProfile->EditValue ?>"<?= $Page->ANProfile->editAttributes() ?> aria-describedby="x_ANProfile_help">
<?= $Page->ANProfile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANProfile->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANProfileDATE->Visible) { // ANProfileDATE ?>
    <div id="r_ANProfileDATE" class="form-group row">
        <label id="elh_patient_an_registration_ANProfileDATE" for="x_ANProfileDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ANProfileDATE"><?= $Page->ANProfileDATE->caption() ?><?= $Page->ANProfileDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANProfileDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANProfileDATE"><span id="el_patient_an_registration_ANProfileDATE">
<input type="<?= $Page->ANProfileDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x_ANProfileDATE" id="x_ANProfileDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANProfileDATE->getPlaceHolder()) ?>" value="<?= $Page->ANProfileDATE->EditValue ?>"<?= $Page->ANProfileDATE->editAttributes() ?> aria-describedby="x_ANProfileDATE_help">
<?= $Page->ANProfileDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANProfileDATE->getErrorMessage() ?></div>
<?php if (!$Page->ANProfileDATE->ReadOnly && !$Page->ANProfileDATE->Disabled && !isset($Page->ANProfileDATE->EditAttrs["readonly"]) && !isset($Page->ANProfileDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
    <div id="r_ANProfileINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_ANProfileINHOUSE" for="x_ANProfileINHOUSE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ANProfileINHOUSE"><?= $Page->ANProfileINHOUSE->caption() ?><?= $Page->ANProfileINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANProfileINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANProfileINHOUSE"><span id="el_patient_an_registration_ANProfileINHOUSE">
<input type="<?= $Page->ANProfileINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x_ANProfileINHOUSE" id="x_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->ANProfileINHOUSE->EditValue ?>"<?= $Page->ANProfileINHOUSE->editAttributes() ?> aria-describedby="x_ANProfileINHOUSE_help">
<?= $Page->ANProfileINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANProfileINHOUSE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
    <div id="r_ANProfileREPORT" class="form-group row">
        <label id="elh_patient_an_registration_ANProfileREPORT" for="x_ANProfileREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ANProfileREPORT"><?= $Page->ANProfileREPORT->caption() ?><?= $Page->ANProfileREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANProfileREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANProfileREPORT"><span id="el_patient_an_registration_ANProfileREPORT">
<input type="<?= $Page->ANProfileREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x_ANProfileREPORT" id="x_ANProfileREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANProfileREPORT->getPlaceHolder()) ?>" value="<?= $Page->ANProfileREPORT->EditValue ?>"<?= $Page->ANProfileREPORT->editAttributes() ?> aria-describedby="x_ANProfileREPORT_help">
<?= $Page->ANProfileREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANProfileREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DualMarker->Visible) { // DualMarker ?>
    <div id="r_DualMarker" class="form-group row">
        <label id="elh_patient_an_registration_DualMarker" for="x_DualMarker" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_DualMarker"><?= $Page->DualMarker->caption() ?><?= $Page->DualMarker->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DualMarker->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DualMarker"><span id="el_patient_an_registration_DualMarker">
<input type="<?= $Page->DualMarker->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarker" name="x_DualMarker" id="x_DualMarker" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DualMarker->getPlaceHolder()) ?>" value="<?= $Page->DualMarker->EditValue ?>"<?= $Page->DualMarker->editAttributes() ?> aria-describedby="x_DualMarker_help">
<?= $Page->DualMarker->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DualMarker->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
    <div id="r_DualMarkerDATE" class="form-group row">
        <label id="elh_patient_an_registration_DualMarkerDATE" for="x_DualMarkerDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_DualMarkerDATE"><?= $Page->DualMarkerDATE->caption() ?><?= $Page->DualMarkerDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DualMarkerDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DualMarkerDATE"><span id="el_patient_an_registration_DualMarkerDATE">
<input type="<?= $Page->DualMarkerDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x_DualMarkerDATE" id="x_DualMarkerDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DualMarkerDATE->getPlaceHolder()) ?>" value="<?= $Page->DualMarkerDATE->EditValue ?>"<?= $Page->DualMarkerDATE->editAttributes() ?> aria-describedby="x_DualMarkerDATE_help">
<?= $Page->DualMarkerDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DualMarkerDATE->getErrorMessage() ?></div>
<?php if (!$Page->DualMarkerDATE->ReadOnly && !$Page->DualMarkerDATE->Disabled && !isset($Page->DualMarkerDATE->EditAttrs["readonly"]) && !isset($Page->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
    <div id="r_DualMarkerINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_DualMarkerINHOUSE" for="x_DualMarkerINHOUSE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_DualMarkerINHOUSE"><?= $Page->DualMarkerINHOUSE->caption() ?><?= $Page->DualMarkerINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DualMarkerINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DualMarkerINHOUSE"><span id="el_patient_an_registration_DualMarkerINHOUSE">
<input type="<?= $Page->DualMarkerINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x_DualMarkerINHOUSE" id="x_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->DualMarkerINHOUSE->EditValue ?>"<?= $Page->DualMarkerINHOUSE->editAttributes() ?> aria-describedby="x_DualMarkerINHOUSE_help">
<?= $Page->DualMarkerINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DualMarkerINHOUSE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
    <div id="r_DualMarkerREPORT" class="form-group row">
        <label id="elh_patient_an_registration_DualMarkerREPORT" for="x_DualMarkerREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_DualMarkerREPORT"><?= $Page->DualMarkerREPORT->caption() ?><?= $Page->DualMarkerREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DualMarkerREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DualMarkerREPORT"><span id="el_patient_an_registration_DualMarkerREPORT">
<input type="<?= $Page->DualMarkerREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x_DualMarkerREPORT" id="x_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?= $Page->DualMarkerREPORT->EditValue ?>"<?= $Page->DualMarkerREPORT->editAttributes() ?> aria-describedby="x_DualMarkerREPORT_help">
<?= $Page->DualMarkerREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DualMarkerREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Quadruple->Visible) { // Quadruple ?>
    <div id="r_Quadruple" class="form-group row">
        <label id="elh_patient_an_registration_Quadruple" for="x_Quadruple" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Quadruple"><?= $Page->Quadruple->caption() ?><?= $Page->Quadruple->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Quadruple->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Quadruple"><span id="el_patient_an_registration_Quadruple">
<input type="<?= $Page->Quadruple->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Quadruple" name="x_Quadruple" id="x_Quadruple" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Quadruple->getPlaceHolder()) ?>" value="<?= $Page->Quadruple->EditValue ?>"<?= $Page->Quadruple->editAttributes() ?> aria-describedby="x_Quadruple_help">
<?= $Page->Quadruple->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Quadruple->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
    <div id="r_QuadrupleDATE" class="form-group row">
        <label id="elh_patient_an_registration_QuadrupleDATE" for="x_QuadrupleDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_QuadrupleDATE"><?= $Page->QuadrupleDATE->caption() ?><?= $Page->QuadrupleDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QuadrupleDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_QuadrupleDATE"><span id="el_patient_an_registration_QuadrupleDATE">
<input type="<?= $Page->QuadrupleDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x_QuadrupleDATE" id="x_QuadrupleDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->QuadrupleDATE->getPlaceHolder()) ?>" value="<?= $Page->QuadrupleDATE->EditValue ?>"<?= $Page->QuadrupleDATE->editAttributes() ?> aria-describedby="x_QuadrupleDATE_help">
<?= $Page->QuadrupleDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->QuadrupleDATE->getErrorMessage() ?></div>
<?php if (!$Page->QuadrupleDATE->ReadOnly && !$Page->QuadrupleDATE->Disabled && !isset($Page->QuadrupleDATE->EditAttrs["readonly"]) && !isset($Page->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
    <div id="r_QuadrupleINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_QuadrupleINHOUSE" for="x_QuadrupleINHOUSE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_QuadrupleINHOUSE"><?= $Page->QuadrupleINHOUSE->caption() ?><?= $Page->QuadrupleINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QuadrupleINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_QuadrupleINHOUSE"><span id="el_patient_an_registration_QuadrupleINHOUSE">
<input type="<?= $Page->QuadrupleINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x_QuadrupleINHOUSE" id="x_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->QuadrupleINHOUSE->EditValue ?>"<?= $Page->QuadrupleINHOUSE->editAttributes() ?> aria-describedby="x_QuadrupleINHOUSE_help">
<?= $Page->QuadrupleINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->QuadrupleINHOUSE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
    <div id="r_QuadrupleREPORT" class="form-group row">
        <label id="elh_patient_an_registration_QuadrupleREPORT" for="x_QuadrupleREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_QuadrupleREPORT"><?= $Page->QuadrupleREPORT->caption() ?><?= $Page->QuadrupleREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QuadrupleREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_QuadrupleREPORT"><span id="el_patient_an_registration_QuadrupleREPORT">
<input type="<?= $Page->QuadrupleREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x_QuadrupleREPORT" id="x_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?= $Page->QuadrupleREPORT->EditValue ?>"<?= $Page->QuadrupleREPORT->editAttributes() ?> aria-describedby="x_QuadrupleREPORT_help">
<?= $Page->QuadrupleREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->QuadrupleREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A5month->Visible) { // A5month ?>
    <div id="r_A5month" class="form-group row">
        <label id="elh_patient_an_registration_A5month" for="x_A5month" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A5month"><?= $Page->A5month->caption() ?><?= $Page->A5month->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A5month->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A5month"><span id="el_patient_an_registration_A5month">
<input type="<?= $Page->A5month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5month" name="x_A5month" id="x_A5month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A5month->getPlaceHolder()) ?>" value="<?= $Page->A5month->EditValue ?>"<?= $Page->A5month->editAttributes() ?> aria-describedby="x_A5month_help">
<?= $Page->A5month->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A5month->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A5monthDATE->Visible) { // A5monthDATE ?>
    <div id="r_A5monthDATE" class="form-group row">
        <label id="elh_patient_an_registration_A5monthDATE" for="x_A5monthDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A5monthDATE"><?= $Page->A5monthDATE->caption() ?><?= $Page->A5monthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A5monthDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A5monthDATE"><span id="el_patient_an_registration_A5monthDATE">
<input type="<?= $Page->A5monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x_A5monthDATE" id="x_A5monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A5monthDATE->getPlaceHolder()) ?>" value="<?= $Page->A5monthDATE->EditValue ?>"<?= $Page->A5monthDATE->editAttributes() ?> aria-describedby="x_A5monthDATE_help">
<?= $Page->A5monthDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A5monthDATE->getErrorMessage() ?></div>
<?php if (!$Page->A5monthDATE->ReadOnly && !$Page->A5monthDATE->Disabled && !isset($Page->A5monthDATE->EditAttrs["readonly"]) && !isset($Page->A5monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
    <div id="r_A5monthINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_A5monthINHOUSE" for="x_A5monthINHOUSE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A5monthINHOUSE"><?= $Page->A5monthINHOUSE->caption() ?><?= $Page->A5monthINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A5monthINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A5monthINHOUSE"><span id="el_patient_an_registration_A5monthINHOUSE">
<input type="<?= $Page->A5monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x_A5monthINHOUSE" id="x_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->A5monthINHOUSE->EditValue ?>"<?= $Page->A5monthINHOUSE->editAttributes() ?> aria-describedby="x_A5monthINHOUSE_help">
<?= $Page->A5monthINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A5monthINHOUSE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A5monthREPORT->Visible) { // A5monthREPORT ?>
    <div id="r_A5monthREPORT" class="form-group row">
        <label id="elh_patient_an_registration_A5monthREPORT" for="x_A5monthREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A5monthREPORT"><?= $Page->A5monthREPORT->caption() ?><?= $Page->A5monthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A5monthREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A5monthREPORT"><span id="el_patient_an_registration_A5monthREPORT">
<input type="<?= $Page->A5monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x_A5monthREPORT" id="x_A5monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A5monthREPORT->getPlaceHolder()) ?>" value="<?= $Page->A5monthREPORT->EditValue ?>"<?= $Page->A5monthREPORT->editAttributes() ?> aria-describedby="x_A5monthREPORT_help">
<?= $Page->A5monthREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A5monthREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A7month->Visible) { // A7month ?>
    <div id="r_A7month" class="form-group row">
        <label id="elh_patient_an_registration_A7month" for="x_A7month" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A7month"><?= $Page->A7month->caption() ?><?= $Page->A7month->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A7month->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A7month"><span id="el_patient_an_registration_A7month">
<input type="<?= $Page->A7month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7month" name="x_A7month" id="x_A7month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A7month->getPlaceHolder()) ?>" value="<?= $Page->A7month->EditValue ?>"<?= $Page->A7month->editAttributes() ?> aria-describedby="x_A7month_help">
<?= $Page->A7month->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A7month->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A7monthDATE->Visible) { // A7monthDATE ?>
    <div id="r_A7monthDATE" class="form-group row">
        <label id="elh_patient_an_registration_A7monthDATE" for="x_A7monthDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A7monthDATE"><?= $Page->A7monthDATE->caption() ?><?= $Page->A7monthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A7monthDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A7monthDATE"><span id="el_patient_an_registration_A7monthDATE">
<input type="<?= $Page->A7monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x_A7monthDATE" id="x_A7monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A7monthDATE->getPlaceHolder()) ?>" value="<?= $Page->A7monthDATE->EditValue ?>"<?= $Page->A7monthDATE->editAttributes() ?> aria-describedby="x_A7monthDATE_help">
<?= $Page->A7monthDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A7monthDATE->getErrorMessage() ?></div>
<?php if (!$Page->A7monthDATE->ReadOnly && !$Page->A7monthDATE->Disabled && !isset($Page->A7monthDATE->EditAttrs["readonly"]) && !isset($Page->A7monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
    <div id="r_A7monthINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_A7monthINHOUSE" for="x_A7monthINHOUSE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A7monthINHOUSE"><?= $Page->A7monthINHOUSE->caption() ?><?= $Page->A7monthINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A7monthINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A7monthINHOUSE"><span id="el_patient_an_registration_A7monthINHOUSE">
<input type="<?= $Page->A7monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x_A7monthINHOUSE" id="x_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->A7monthINHOUSE->EditValue ?>"<?= $Page->A7monthINHOUSE->editAttributes() ?> aria-describedby="x_A7monthINHOUSE_help">
<?= $Page->A7monthINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A7monthINHOUSE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A7monthREPORT->Visible) { // A7monthREPORT ?>
    <div id="r_A7monthREPORT" class="form-group row">
        <label id="elh_patient_an_registration_A7monthREPORT" for="x_A7monthREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A7monthREPORT"><?= $Page->A7monthREPORT->caption() ?><?= $Page->A7monthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A7monthREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A7monthREPORT"><span id="el_patient_an_registration_A7monthREPORT">
<input type="<?= $Page->A7monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x_A7monthREPORT" id="x_A7monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A7monthREPORT->getPlaceHolder()) ?>" value="<?= $Page->A7monthREPORT->EditValue ?>"<?= $Page->A7monthREPORT->editAttributes() ?> aria-describedby="x_A7monthREPORT_help">
<?= $Page->A7monthREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A7monthREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A9month->Visible) { // A9month ?>
    <div id="r_A9month" class="form-group row">
        <label id="elh_patient_an_registration_A9month" for="x_A9month" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A9month"><?= $Page->A9month->caption() ?><?= $Page->A9month->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A9month->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A9month"><span id="el_patient_an_registration_A9month">
<input type="<?= $Page->A9month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9month" name="x_A9month" id="x_A9month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A9month->getPlaceHolder()) ?>" value="<?= $Page->A9month->EditValue ?>"<?= $Page->A9month->editAttributes() ?> aria-describedby="x_A9month_help">
<?= $Page->A9month->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A9month->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A9monthDATE->Visible) { // A9monthDATE ?>
    <div id="r_A9monthDATE" class="form-group row">
        <label id="elh_patient_an_registration_A9monthDATE" for="x_A9monthDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A9monthDATE"><?= $Page->A9monthDATE->caption() ?><?= $Page->A9monthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A9monthDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A9monthDATE"><span id="el_patient_an_registration_A9monthDATE">
<input type="<?= $Page->A9monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x_A9monthDATE" id="x_A9monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A9monthDATE->getPlaceHolder()) ?>" value="<?= $Page->A9monthDATE->EditValue ?>"<?= $Page->A9monthDATE->editAttributes() ?> aria-describedby="x_A9monthDATE_help">
<?= $Page->A9monthDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A9monthDATE->getErrorMessage() ?></div>
<?php if (!$Page->A9monthDATE->ReadOnly && !$Page->A9monthDATE->Disabled && !isset($Page->A9monthDATE->EditAttrs["readonly"]) && !isset($Page->A9monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
    <div id="r_A9monthINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_A9monthINHOUSE" for="x_A9monthINHOUSE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A9monthINHOUSE"><?= $Page->A9monthINHOUSE->caption() ?><?= $Page->A9monthINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A9monthINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A9monthINHOUSE"><span id="el_patient_an_registration_A9monthINHOUSE">
<input type="<?= $Page->A9monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x_A9monthINHOUSE" id="x_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->A9monthINHOUSE->EditValue ?>"<?= $Page->A9monthINHOUSE->editAttributes() ?> aria-describedby="x_A9monthINHOUSE_help">
<?= $Page->A9monthINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A9monthINHOUSE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A9monthREPORT->Visible) { // A9monthREPORT ?>
    <div id="r_A9monthREPORT" class="form-group row">
        <label id="elh_patient_an_registration_A9monthREPORT" for="x_A9monthREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_A9monthREPORT"><?= $Page->A9monthREPORT->caption() ?><?= $Page->A9monthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A9monthREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A9monthREPORT"><span id="el_patient_an_registration_A9monthREPORT">
<input type="<?= $Page->A9monthREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x_A9monthREPORT" id="x_A9monthREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A9monthREPORT->getPlaceHolder()) ?>" value="<?= $Page->A9monthREPORT->EditValue ?>"<?= $Page->A9monthREPORT->editAttributes() ?> aria-describedby="x_A9monthREPORT_help">
<?= $Page->A9monthREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A9monthREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INJ->Visible) { // INJ ?>
    <div id="r_INJ" class="form-group row">
        <label id="elh_patient_an_registration_INJ" for="x_INJ" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_INJ"><?= $Page->INJ->caption() ?><?= $Page->INJ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJ->cellAttributes() ?>>
<template id="tpx_patient_an_registration_INJ"><span id="el_patient_an_registration_INJ">
<input type="<?= $Page->INJ->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJ" name="x_INJ" id="x_INJ" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INJ->getPlaceHolder()) ?>" value="<?= $Page->INJ->EditValue ?>"<?= $Page->INJ->editAttributes() ?> aria-describedby="x_INJ_help">
<?= $Page->INJ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INJ->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INJDATE->Visible) { // INJDATE ?>
    <div id="r_INJDATE" class="form-group row">
        <label id="elh_patient_an_registration_INJDATE" for="x_INJDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_INJDATE"><?= $Page->INJDATE->caption() ?><?= $Page->INJDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_INJDATE"><span id="el_patient_an_registration_INJDATE">
<input type="<?= $Page->INJDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJDATE" name="x_INJDATE" id="x_INJDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INJDATE->getPlaceHolder()) ?>" value="<?= $Page->INJDATE->EditValue ?>"<?= $Page->INJDATE->editAttributes() ?> aria-describedby="x_INJDATE_help">
<?= $Page->INJDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INJDATE->getErrorMessage() ?></div>
<?php if (!$Page->INJDATE->ReadOnly && !$Page->INJDATE->Disabled && !isset($Page->INJDATE->EditAttrs["readonly"]) && !isset($Page->INJDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INJINHOUSE->Visible) { // INJINHOUSE ?>
    <div id="r_INJINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_INJINHOUSE" for="x_INJINHOUSE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_INJINHOUSE"><?= $Page->INJINHOUSE->caption() ?><?= $Page->INJINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_INJINHOUSE"><span id="el_patient_an_registration_INJINHOUSE">
<input type="<?= $Page->INJINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x_INJINHOUSE" id="x_INJINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INJINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->INJINHOUSE->EditValue ?>"<?= $Page->INJINHOUSE->editAttributes() ?> aria-describedby="x_INJINHOUSE_help">
<?= $Page->INJINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INJINHOUSE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INJREPORT->Visible) { // INJREPORT ?>
    <div id="r_INJREPORT" class="form-group row">
        <label id="elh_patient_an_registration_INJREPORT" for="x_INJREPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_INJREPORT"><?= $Page->INJREPORT->caption() ?><?= $Page->INJREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_INJREPORT"><span id="el_patient_an_registration_INJREPORT">
<input type="<?= $Page->INJREPORT->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJREPORT" name="x_INJREPORT" id="x_INJREPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INJREPORT->getPlaceHolder()) ?>" value="<?= $Page->INJREPORT->EditValue ?>"<?= $Page->INJREPORT->editAttributes() ?> aria-describedby="x_INJREPORT_help">
<?= $Page->INJREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INJREPORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Bleeding->Visible) { // Bleeding ?>
    <div id="r_Bleeding" class="form-group row">
        <label id="elh_patient_an_registration_Bleeding" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Bleeding"><?= $Page->Bleeding->caption() ?><?= $Page->Bleeding->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Bleeding->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Bleeding"><span id="el_patient_an_registration_Bleeding">
<template id="tp_x_Bleeding">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_Bleeding" name="x_Bleeding" id="x_Bleeding"<?= $Page->Bleeding->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Bleeding" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Bleeding[]"
    name="x_Bleeding[]"
    value="<?= HtmlEncode($Page->Bleeding->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Bleeding"
    data-target="dsl_x_Bleeding"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Bleeding->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_Bleeding"
    data-value-separator="<?= $Page->Bleeding->displayValueSeparatorAttribute() ?>"
    <?= $Page->Bleeding->editAttributes() ?>>
<?= $Page->Bleeding->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Bleeding->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Hypothyroidism->Visible) { // Hypothyroidism ?>
    <div id="r_Hypothyroidism" class="form-group row">
        <label id="elh_patient_an_registration_Hypothyroidism" for="x_Hypothyroidism" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Hypothyroidism"><?= $Page->Hypothyroidism->caption() ?><?= $Page->Hypothyroidism->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Hypothyroidism->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Hypothyroidism"><span id="el_patient_an_registration_Hypothyroidism">
<input type="<?= $Page->Hypothyroidism->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x_Hypothyroidism" id="x_Hypothyroidism" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Hypothyroidism->getPlaceHolder()) ?>" value="<?= $Page->Hypothyroidism->EditValue ?>"<?= $Page->Hypothyroidism->editAttributes() ?> aria-describedby="x_Hypothyroidism_help">
<?= $Page->Hypothyroidism->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Hypothyroidism->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PICMENumber->Visible) { // PICMENumber ?>
    <div id="r_PICMENumber" class="form-group row">
        <label id="elh_patient_an_registration_PICMENumber" for="x_PICMENumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PICMENumber"><?= $Page->PICMENumber->caption() ?><?= $Page->PICMENumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PICMENumber->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PICMENumber"><span id="el_patient_an_registration_PICMENumber">
<input type="<?= $Page->PICMENumber->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PICMENumber" name="x_PICMENumber" id="x_PICMENumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PICMENumber->getPlaceHolder()) ?>" value="<?= $Page->PICMENumber->EditValue ?>"<?= $Page->PICMENumber->editAttributes() ?> aria-describedby="x_PICMENumber_help">
<?= $Page->PICMENumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PICMENumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Outcome->Visible) { // Outcome ?>
    <div id="r_Outcome" class="form-group row">
        <label id="elh_patient_an_registration_Outcome" for="x_Outcome" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Outcome"><?= $Page->Outcome->caption() ?><?= $Page->Outcome->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Outcome->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Outcome"><span id="el_patient_an_registration_Outcome">
<input type="<?= $Page->Outcome->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Outcome" name="x_Outcome" id="x_Outcome" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Outcome->getPlaceHolder()) ?>" value="<?= $Page->Outcome->EditValue ?>"<?= $Page->Outcome->editAttributes() ?> aria-describedby="x_Outcome_help">
<?= $Page->Outcome->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Outcome->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
    <div id="r_DateofAdmission" class="form-group row">
        <label id="elh_patient_an_registration_DateofAdmission" for="x_DateofAdmission" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_DateofAdmission"><?= $Page->DateofAdmission->caption() ?><?= $Page->DateofAdmission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofAdmission->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DateofAdmission"><span id="el_patient_an_registration_DateofAdmission">
<input type="<?= $Page->DateofAdmission->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x_DateofAdmission" id="x_DateofAdmission" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DateofAdmission->getPlaceHolder()) ?>" value="<?= $Page->DateofAdmission->EditValue ?>"<?= $Page->DateofAdmission->editAttributes() ?> aria-describedby="x_DateofAdmission_help">
<?= $Page->DateofAdmission->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofAdmission->getErrorMessage() ?></div>
<?php if (!$Page->DateofAdmission->ReadOnly && !$Page->DateofAdmission->Disabled && !isset($Page->DateofAdmission->EditAttrs["readonly"]) && !isset($Page->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateodProcedure->Visible) { // DateodProcedure ?>
    <div id="r_DateodProcedure" class="form-group row">
        <label id="elh_patient_an_registration_DateodProcedure" for="x_DateodProcedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_DateodProcedure"><?= $Page->DateodProcedure->caption() ?><?= $Page->DateodProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateodProcedure->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DateodProcedure"><span id="el_patient_an_registration_DateodProcedure">
<input type="<?= $Page->DateodProcedure->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x_DateodProcedure" id="x_DateodProcedure" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DateodProcedure->getPlaceHolder()) ?>" value="<?= $Page->DateodProcedure->EditValue ?>"<?= $Page->DateodProcedure->editAttributes() ?> aria-describedby="x_DateodProcedure_help">
<?= $Page->DateodProcedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateodProcedure->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
    <div id="r_Miscarriage" class="form-group row">
        <label id="elh_patient_an_registration_Miscarriage" for="x_Miscarriage" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Miscarriage"><?= $Page->Miscarriage->caption() ?><?= $Page->Miscarriage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Miscarriage->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Miscarriage"><span id="el_patient_an_registration_Miscarriage">
    <select
        id="x_Miscarriage"
        name="x_Miscarriage"
        class="form-control ew-select<?= $Page->Miscarriage->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_Miscarriage"
        data-table="patient_an_registration"
        data-field="x_Miscarriage"
        data-value-separator="<?= $Page->Miscarriage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Miscarriage->getPlaceHolder()) ?>"
        <?= $Page->Miscarriage->editAttributes() ?>>
        <?= $Page->Miscarriage->selectOptionListHtml("x_Miscarriage") ?>
    </select>
    <?= $Page->Miscarriage->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Miscarriage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_Miscarriage']"),
        options = { name: "x_Miscarriage", selectId: "patient_an_registration_x_Miscarriage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.Miscarriage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.Miscarriage.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
    <div id="r_ModeOfDelivery" class="form-group row">
        <label id="elh_patient_an_registration_ModeOfDelivery" for="x_ModeOfDelivery" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ModeOfDelivery"><?= $Page->ModeOfDelivery->caption() ?><?= $Page->ModeOfDelivery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeOfDelivery->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ModeOfDelivery"><span id="el_patient_an_registration_ModeOfDelivery">
    <select
        id="x_ModeOfDelivery"
        name="x_ModeOfDelivery"
        class="form-control ew-select<?= $Page->ModeOfDelivery->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_ModeOfDelivery"
        data-table="patient_an_registration"
        data-field="x_ModeOfDelivery"
        data-value-separator="<?= $Page->ModeOfDelivery->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ModeOfDelivery->getPlaceHolder()) ?>"
        <?= $Page->ModeOfDelivery->editAttributes() ?>>
        <?= $Page->ModeOfDelivery->selectOptionListHtml("x_ModeOfDelivery") ?>
    </select>
    <?= $Page->ModeOfDelivery->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ModeOfDelivery->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_ModeOfDelivery']"),
        options = { name: "x_ModeOfDelivery", selectId: "patient_an_registration_x_ModeOfDelivery", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ModeOfDelivery.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ModeOfDelivery.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ND->Visible) { // ND ?>
    <div id="r_ND" class="form-group row">
        <label id="elh_patient_an_registration_ND" for="x_ND" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ND"><?= $Page->ND->caption() ?><?= $Page->ND->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ND->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ND"><span id="el_patient_an_registration_ND">
<input type="<?= $Page->ND->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ND" name="x_ND" id="x_ND" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ND->getPlaceHolder()) ?>" value="<?= $Page->ND->EditValue ?>"<?= $Page->ND->editAttributes() ?> aria-describedby="x_ND_help">
<?= $Page->ND->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ND->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NDS->Visible) { // NDS ?>
    <div id="r_NDS" class="form-group row">
        <label id="elh_patient_an_registration_NDS" for="x_NDS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_NDS"><?= $Page->NDS->caption() ?><?= $Page->NDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NDS->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NDS"><span id="el_patient_an_registration_NDS">
    <select
        id="x_NDS"
        name="x_NDS"
        class="form-control ew-select<?= $Page->NDS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_NDS"
        data-table="patient_an_registration"
        data-field="x_NDS"
        data-value-separator="<?= $Page->NDS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->NDS->getPlaceHolder()) ?>"
        <?= $Page->NDS->editAttributes() ?>>
        <?= $Page->NDS->selectOptionListHtml("x_NDS") ?>
    </select>
    <?= $Page->NDS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->NDS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_NDS']"),
        options = { name: "x_NDS", selectId: "patient_an_registration_x_NDS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.NDS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.NDS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NDP->Visible) { // NDP ?>
    <div id="r_NDP" class="form-group row">
        <label id="elh_patient_an_registration_NDP" for="x_NDP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_NDP"><?= $Page->NDP->caption() ?><?= $Page->NDP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NDP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NDP"><span id="el_patient_an_registration_NDP">
    <select
        id="x_NDP"
        name="x_NDP"
        class="form-control ew-select<?= $Page->NDP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_NDP"
        data-table="patient_an_registration"
        data-field="x_NDP"
        data-value-separator="<?= $Page->NDP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->NDP->getPlaceHolder()) ?>"
        <?= $Page->NDP->editAttributes() ?>>
        <?= $Page->NDP->selectOptionListHtml("x_NDP") ?>
    </select>
    <?= $Page->NDP->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->NDP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_NDP']"),
        options = { name: "x_NDP", selectId: "patient_an_registration_x_NDP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.NDP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.NDP.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Vaccum->Visible) { // Vaccum ?>
    <div id="r_Vaccum" class="form-group row">
        <label id="elh_patient_an_registration_Vaccum" for="x_Vaccum" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Vaccum"><?= $Page->Vaccum->caption() ?><?= $Page->Vaccum->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Vaccum->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Vaccum"><span id="el_patient_an_registration_Vaccum">
<input type="<?= $Page->Vaccum->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Vaccum" name="x_Vaccum" id="x_Vaccum" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Vaccum->getPlaceHolder()) ?>" value="<?= $Page->Vaccum->EditValue ?>"<?= $Page->Vaccum->editAttributes() ?> aria-describedby="x_Vaccum_help">
<?= $Page->Vaccum->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Vaccum->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VaccumS->Visible) { // VaccumS ?>
    <div id="r_VaccumS" class="form-group row">
        <label id="elh_patient_an_registration_VaccumS" for="x_VaccumS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_VaccumS"><?= $Page->VaccumS->caption() ?><?= $Page->VaccumS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VaccumS->cellAttributes() ?>>
<template id="tpx_patient_an_registration_VaccumS"><span id="el_patient_an_registration_VaccumS">
    <select
        id="x_VaccumS"
        name="x_VaccumS"
        class="form-control ew-select<?= $Page->VaccumS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_VaccumS"
        data-table="patient_an_registration"
        data-field="x_VaccumS"
        data-value-separator="<?= $Page->VaccumS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->VaccumS->getPlaceHolder()) ?>"
        <?= $Page->VaccumS->editAttributes() ?>>
        <?= $Page->VaccumS->selectOptionListHtml("x_VaccumS") ?>
    </select>
    <?= $Page->VaccumS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->VaccumS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_VaccumS']"),
        options = { name: "x_VaccumS", selectId: "patient_an_registration_x_VaccumS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.VaccumS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.VaccumS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VaccumP->Visible) { // VaccumP ?>
    <div id="r_VaccumP" class="form-group row">
        <label id="elh_patient_an_registration_VaccumP" for="x_VaccumP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_VaccumP"><?= $Page->VaccumP->caption() ?><?= $Page->VaccumP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VaccumP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_VaccumP"><span id="el_patient_an_registration_VaccumP">
    <select
        id="x_VaccumP"
        name="x_VaccumP"
        class="form-control ew-select<?= $Page->VaccumP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_VaccumP"
        data-table="patient_an_registration"
        data-field="x_VaccumP"
        data-value-separator="<?= $Page->VaccumP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->VaccumP->getPlaceHolder()) ?>"
        <?= $Page->VaccumP->editAttributes() ?>>
        <?= $Page->VaccumP->selectOptionListHtml("x_VaccumP") ?>
    </select>
    <?= $Page->VaccumP->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->VaccumP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_VaccumP']"),
        options = { name: "x_VaccumP", selectId: "patient_an_registration_x_VaccumP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.VaccumP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.VaccumP.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Forceps->Visible) { // Forceps ?>
    <div id="r_Forceps" class="form-group row">
        <label id="elh_patient_an_registration_Forceps" for="x_Forceps" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Forceps"><?= $Page->Forceps->caption() ?><?= $Page->Forceps->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Forceps->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Forceps"><span id="el_patient_an_registration_Forceps">
<input type="<?= $Page->Forceps->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Forceps" name="x_Forceps" id="x_Forceps" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Forceps->getPlaceHolder()) ?>" value="<?= $Page->Forceps->EditValue ?>"<?= $Page->Forceps->editAttributes() ?> aria-describedby="x_Forceps_help">
<?= $Page->Forceps->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Forceps->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ForcepsS->Visible) { // ForcepsS ?>
    <div id="r_ForcepsS" class="form-group row">
        <label id="elh_patient_an_registration_ForcepsS" for="x_ForcepsS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ForcepsS"><?= $Page->ForcepsS->caption() ?><?= $Page->ForcepsS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ForcepsS->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ForcepsS"><span id="el_patient_an_registration_ForcepsS">
    <select
        id="x_ForcepsS"
        name="x_ForcepsS"
        class="form-control ew-select<?= $Page->ForcepsS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_ForcepsS"
        data-table="patient_an_registration"
        data-field="x_ForcepsS"
        data-value-separator="<?= $Page->ForcepsS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ForcepsS->getPlaceHolder()) ?>"
        <?= $Page->ForcepsS->editAttributes() ?>>
        <?= $Page->ForcepsS->selectOptionListHtml("x_ForcepsS") ?>
    </select>
    <?= $Page->ForcepsS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ForcepsS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_ForcepsS']"),
        options = { name: "x_ForcepsS", selectId: "patient_an_registration_x_ForcepsS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ForcepsS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ForcepsS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ForcepsP->Visible) { // ForcepsP ?>
    <div id="r_ForcepsP" class="form-group row">
        <label id="elh_patient_an_registration_ForcepsP" for="x_ForcepsP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ForcepsP"><?= $Page->ForcepsP->caption() ?><?= $Page->ForcepsP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ForcepsP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ForcepsP"><span id="el_patient_an_registration_ForcepsP">
    <select
        id="x_ForcepsP"
        name="x_ForcepsP"
        class="form-control ew-select<?= $Page->ForcepsP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_ForcepsP"
        data-table="patient_an_registration"
        data-field="x_ForcepsP"
        data-value-separator="<?= $Page->ForcepsP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ForcepsP->getPlaceHolder()) ?>"
        <?= $Page->ForcepsP->editAttributes() ?>>
        <?= $Page->ForcepsP->selectOptionListHtml("x_ForcepsP") ?>
    </select>
    <?= $Page->ForcepsP->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ForcepsP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_ForcepsP']"),
        options = { name: "x_ForcepsP", selectId: "patient_an_registration_x_ForcepsP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ForcepsP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ForcepsP.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Elective->Visible) { // Elective ?>
    <div id="r_Elective" class="form-group row">
        <label id="elh_patient_an_registration_Elective" for="x_Elective" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Elective"><?= $Page->Elective->caption() ?><?= $Page->Elective->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Elective->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Elective"><span id="el_patient_an_registration_Elective">
<input type="<?= $Page->Elective->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Elective" name="x_Elective" id="x_Elective" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Elective->getPlaceHolder()) ?>" value="<?= $Page->Elective->EditValue ?>"<?= $Page->Elective->editAttributes() ?> aria-describedby="x_Elective_help">
<?= $Page->Elective->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Elective->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ElectiveS->Visible) { // ElectiveS ?>
    <div id="r_ElectiveS" class="form-group row">
        <label id="elh_patient_an_registration_ElectiveS" for="x_ElectiveS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ElectiveS"><?= $Page->ElectiveS->caption() ?><?= $Page->ElectiveS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ElectiveS->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ElectiveS"><span id="el_patient_an_registration_ElectiveS">
    <select
        id="x_ElectiveS"
        name="x_ElectiveS"
        class="form-control ew-select<?= $Page->ElectiveS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_ElectiveS"
        data-table="patient_an_registration"
        data-field="x_ElectiveS"
        data-value-separator="<?= $Page->ElectiveS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ElectiveS->getPlaceHolder()) ?>"
        <?= $Page->ElectiveS->editAttributes() ?>>
        <?= $Page->ElectiveS->selectOptionListHtml("x_ElectiveS") ?>
    </select>
    <?= $Page->ElectiveS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ElectiveS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_ElectiveS']"),
        options = { name: "x_ElectiveS", selectId: "patient_an_registration_x_ElectiveS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ElectiveS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ElectiveS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ElectiveP->Visible) { // ElectiveP ?>
    <div id="r_ElectiveP" class="form-group row">
        <label id="elh_patient_an_registration_ElectiveP" for="x_ElectiveP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ElectiveP"><?= $Page->ElectiveP->caption() ?><?= $Page->ElectiveP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ElectiveP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ElectiveP"><span id="el_patient_an_registration_ElectiveP">
    <select
        id="x_ElectiveP"
        name="x_ElectiveP"
        class="form-control ew-select<?= $Page->ElectiveP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_ElectiveP"
        data-table="patient_an_registration"
        data-field="x_ElectiveP"
        data-value-separator="<?= $Page->ElectiveP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ElectiveP->getPlaceHolder()) ?>"
        <?= $Page->ElectiveP->editAttributes() ?>>
        <?= $Page->ElectiveP->selectOptionListHtml("x_ElectiveP") ?>
    </select>
    <?= $Page->ElectiveP->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ElectiveP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_ElectiveP']"),
        options = { name: "x_ElectiveP", selectId: "patient_an_registration_x_ElectiveP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.ElectiveP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.ElectiveP.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Emergency->Visible) { // Emergency ?>
    <div id="r_Emergency" class="form-group row">
        <label id="elh_patient_an_registration_Emergency" for="x_Emergency" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Emergency"><?= $Page->Emergency->caption() ?><?= $Page->Emergency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Emergency->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Emergency"><span id="el_patient_an_registration_Emergency">
<input type="<?= $Page->Emergency->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Emergency" name="x_Emergency" id="x_Emergency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Emergency->getPlaceHolder()) ?>" value="<?= $Page->Emergency->EditValue ?>"<?= $Page->Emergency->editAttributes() ?> aria-describedby="x_Emergency_help">
<?= $Page->Emergency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Emergency->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmergencyS->Visible) { // EmergencyS ?>
    <div id="r_EmergencyS" class="form-group row">
        <label id="elh_patient_an_registration_EmergencyS" for="x_EmergencyS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_EmergencyS"><?= $Page->EmergencyS->caption() ?><?= $Page->EmergencyS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmergencyS->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EmergencyS"><span id="el_patient_an_registration_EmergencyS">
    <select
        id="x_EmergencyS"
        name="x_EmergencyS"
        class="form-control ew-select<?= $Page->EmergencyS->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_EmergencyS"
        data-table="patient_an_registration"
        data-field="x_EmergencyS"
        data-value-separator="<?= $Page->EmergencyS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EmergencyS->getPlaceHolder()) ?>"
        <?= $Page->EmergencyS->editAttributes() ?>>
        <?= $Page->EmergencyS->selectOptionListHtml("x_EmergencyS") ?>
    </select>
    <?= $Page->EmergencyS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->EmergencyS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_EmergencyS']"),
        options = { name: "x_EmergencyS", selectId: "patient_an_registration_x_EmergencyS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.EmergencyS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.EmergencyS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmergencyP->Visible) { // EmergencyP ?>
    <div id="r_EmergencyP" class="form-group row">
        <label id="elh_patient_an_registration_EmergencyP" for="x_EmergencyP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_EmergencyP"><?= $Page->EmergencyP->caption() ?><?= $Page->EmergencyP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmergencyP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EmergencyP"><span id="el_patient_an_registration_EmergencyP">
    <select
        id="x_EmergencyP"
        name="x_EmergencyP"
        class="form-control ew-select<?= $Page->EmergencyP->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_EmergencyP"
        data-table="patient_an_registration"
        data-field="x_EmergencyP"
        data-value-separator="<?= $Page->EmergencyP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EmergencyP->getPlaceHolder()) ?>"
        <?= $Page->EmergencyP->editAttributes() ?>>
        <?= $Page->EmergencyP->selectOptionListHtml("x_EmergencyP") ?>
    </select>
    <?= $Page->EmergencyP->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->EmergencyP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_EmergencyP']"),
        options = { name: "x_EmergencyP", selectId: "patient_an_registration_x_EmergencyP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.EmergencyP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.EmergencyP.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Maturity->Visible) { // Maturity ?>
    <div id="r_Maturity" class="form-group row">
        <label id="elh_patient_an_registration_Maturity" for="x_Maturity" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Maturity"><?= $Page->Maturity->caption() ?><?= $Page->Maturity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Maturity->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Maturity"><span id="el_patient_an_registration_Maturity">
    <select
        id="x_Maturity"
        name="x_Maturity"
        class="form-control ew-select<?= $Page->Maturity->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_Maturity"
        data-table="patient_an_registration"
        data-field="x_Maturity"
        data-value-separator="<?= $Page->Maturity->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Maturity->getPlaceHolder()) ?>"
        <?= $Page->Maturity->editAttributes() ?>>
        <?= $Page->Maturity->selectOptionListHtml("x_Maturity") ?>
    </select>
    <?= $Page->Maturity->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Maturity->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_Maturity']"),
        options = { name: "x_Maturity", selectId: "patient_an_registration_x_Maturity", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.Maturity.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.Maturity.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Baby1->Visible) { // Baby1 ?>
    <div id="r_Baby1" class="form-group row">
        <label id="elh_patient_an_registration_Baby1" for="x_Baby1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Baby1"><?= $Page->Baby1->caption() ?><?= $Page->Baby1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Baby1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Baby1"><span id="el_patient_an_registration_Baby1">
<input type="<?= $Page->Baby1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Baby1" name="x_Baby1" id="x_Baby1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Baby1->getPlaceHolder()) ?>" value="<?= $Page->Baby1->EditValue ?>"<?= $Page->Baby1->editAttributes() ?> aria-describedby="x_Baby1_help">
<?= $Page->Baby1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Baby1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Baby2->Visible) { // Baby2 ?>
    <div id="r_Baby2" class="form-group row">
        <label id="elh_patient_an_registration_Baby2" for="x_Baby2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Baby2"><?= $Page->Baby2->caption() ?><?= $Page->Baby2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Baby2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Baby2"><span id="el_patient_an_registration_Baby2">
<input type="<?= $Page->Baby2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Baby2" name="x_Baby2" id="x_Baby2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Baby2->getPlaceHolder()) ?>" value="<?= $Page->Baby2->EditValue ?>"<?= $Page->Baby2->editAttributes() ?> aria-describedby="x_Baby2_help">
<?= $Page->Baby2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Baby2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sex1->Visible) { // sex1 ?>
    <div id="r_sex1" class="form-group row">
        <label id="elh_patient_an_registration_sex1" for="x_sex1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_sex1"><?= $Page->sex1->caption() ?><?= $Page->sex1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sex1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_sex1"><span id="el_patient_an_registration_sex1">
<input type="<?= $Page->sex1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_sex1" name="x_sex1" id="x_sex1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->sex1->getPlaceHolder()) ?>" value="<?= $Page->sex1->EditValue ?>"<?= $Page->sex1->editAttributes() ?> aria-describedby="x_sex1_help">
<?= $Page->sex1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sex1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sex2->Visible) { // sex2 ?>
    <div id="r_sex2" class="form-group row">
        <label id="elh_patient_an_registration_sex2" for="x_sex2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_sex2"><?= $Page->sex2->caption() ?><?= $Page->sex2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sex2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_sex2"><span id="el_patient_an_registration_sex2">
<input type="<?= $Page->sex2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_sex2" name="x_sex2" id="x_sex2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->sex2->getPlaceHolder()) ?>" value="<?= $Page->sex2->EditValue ?>"<?= $Page->sex2->editAttributes() ?> aria-describedby="x_sex2_help">
<?= $Page->sex2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sex2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->weight1->Visible) { // weight1 ?>
    <div id="r_weight1" class="form-group row">
        <label id="elh_patient_an_registration_weight1" for="x_weight1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_weight1"><?= $Page->weight1->caption() ?><?= $Page->weight1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->weight1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_weight1"><span id="el_patient_an_registration_weight1">
<input type="<?= $Page->weight1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_weight1" name="x_weight1" id="x_weight1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->weight1->getPlaceHolder()) ?>" value="<?= $Page->weight1->EditValue ?>"<?= $Page->weight1->editAttributes() ?> aria-describedby="x_weight1_help">
<?= $Page->weight1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->weight1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->weight2->Visible) { // weight2 ?>
    <div id="r_weight2" class="form-group row">
        <label id="elh_patient_an_registration_weight2" for="x_weight2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_weight2"><?= $Page->weight2->caption() ?><?= $Page->weight2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->weight2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_weight2"><span id="el_patient_an_registration_weight2">
<input type="<?= $Page->weight2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_weight2" name="x_weight2" id="x_weight2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->weight2->getPlaceHolder()) ?>" value="<?= $Page->weight2->EditValue ?>"<?= $Page->weight2->editAttributes() ?> aria-describedby="x_weight2_help">
<?= $Page->weight2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->weight2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NICU1->Visible) { // NICU1 ?>
    <div id="r_NICU1" class="form-group row">
        <label id="elh_patient_an_registration_NICU1" for="x_NICU1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_NICU1"><?= $Page->NICU1->caption() ?><?= $Page->NICU1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NICU1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NICU1"><span id="el_patient_an_registration_NICU1">
<input type="<?= $Page->NICU1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NICU1" name="x_NICU1" id="x_NICU1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NICU1->getPlaceHolder()) ?>" value="<?= $Page->NICU1->EditValue ?>"<?= $Page->NICU1->editAttributes() ?> aria-describedby="x_NICU1_help">
<?= $Page->NICU1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NICU1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NICU2->Visible) { // NICU2 ?>
    <div id="r_NICU2" class="form-group row">
        <label id="elh_patient_an_registration_NICU2" for="x_NICU2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_NICU2"><?= $Page->NICU2->caption() ?><?= $Page->NICU2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NICU2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NICU2"><span id="el_patient_an_registration_NICU2">
<input type="<?= $Page->NICU2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NICU2" name="x_NICU2" id="x_NICU2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NICU2->getPlaceHolder()) ?>" value="<?= $Page->NICU2->EditValue ?>"<?= $Page->NICU2->editAttributes() ?> aria-describedby="x_NICU2_help">
<?= $Page->NICU2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NICU2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Jaundice1->Visible) { // Jaundice1 ?>
    <div id="r_Jaundice1" class="form-group row">
        <label id="elh_patient_an_registration_Jaundice1" for="x_Jaundice1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Jaundice1"><?= $Page->Jaundice1->caption() ?><?= $Page->Jaundice1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Jaundice1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Jaundice1"><span id="el_patient_an_registration_Jaundice1">
<input type="<?= $Page->Jaundice1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Jaundice1" name="x_Jaundice1" id="x_Jaundice1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Jaundice1->getPlaceHolder()) ?>" value="<?= $Page->Jaundice1->EditValue ?>"<?= $Page->Jaundice1->editAttributes() ?> aria-describedby="x_Jaundice1_help">
<?= $Page->Jaundice1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Jaundice1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Jaundice2->Visible) { // Jaundice2 ?>
    <div id="r_Jaundice2" class="form-group row">
        <label id="elh_patient_an_registration_Jaundice2" for="x_Jaundice2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Jaundice2"><?= $Page->Jaundice2->caption() ?><?= $Page->Jaundice2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Jaundice2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Jaundice2"><span id="el_patient_an_registration_Jaundice2">
<input type="<?= $Page->Jaundice2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Jaundice2" name="x_Jaundice2" id="x_Jaundice2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Jaundice2->getPlaceHolder()) ?>" value="<?= $Page->Jaundice2->EditValue ?>"<?= $Page->Jaundice2->editAttributes() ?> aria-describedby="x_Jaundice2_help">
<?= $Page->Jaundice2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Jaundice2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
    <div id="r_Others1" class="form-group row">
        <label id="elh_patient_an_registration_Others1" for="x_Others1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Others1"><?= $Page->Others1->caption() ?><?= $Page->Others1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Others1"><span id="el_patient_an_registration_Others1">
<input type="<?= $Page->Others1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Others1" name="x_Others1" id="x_Others1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others1->getPlaceHolder()) ?>" value="<?= $Page->Others1->EditValue ?>"<?= $Page->Others1->editAttributes() ?> aria-describedby="x_Others1_help">
<?= $Page->Others1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
    <div id="r_Others2" class="form-group row">
        <label id="elh_patient_an_registration_Others2" for="x_Others2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_Others2"><?= $Page->Others2->caption() ?><?= $Page->Others2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Others2"><span id="el_patient_an_registration_Others2">
<input type="<?= $Page->Others2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Others2" name="x_Others2" id="x_Others2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others2->getPlaceHolder()) ?>" value="<?= $Page->Others2->EditValue ?>"<?= $Page->Others2->editAttributes() ?> aria-describedby="x_Others2_help">
<?= $Page->Others2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SpillOverReasons->Visible) { // SpillOverReasons ?>
    <div id="r_SpillOverReasons" class="form-group row">
        <label id="elh_patient_an_registration_SpillOverReasons" for="x_SpillOverReasons" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_SpillOverReasons"><?= $Page->SpillOverReasons->caption() ?><?= $Page->SpillOverReasons->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SpillOverReasons->cellAttributes() ?>>
<template id="tpx_patient_an_registration_SpillOverReasons"><span id="el_patient_an_registration_SpillOverReasons">
    <select
        id="x_SpillOverReasons"
        name="x_SpillOverReasons"
        class="form-control ew-select<?= $Page->SpillOverReasons->isInvalidClass() ?>"
        data-select2-id="patient_an_registration_x_SpillOverReasons"
        data-table="patient_an_registration"
        data-field="x_SpillOverReasons"
        data-value-separator="<?= $Page->SpillOverReasons->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SpillOverReasons->getPlaceHolder()) ?>"
        <?= $Page->SpillOverReasons->editAttributes() ?>>
        <?= $Page->SpillOverReasons->selectOptionListHtml("x_SpillOverReasons") ?>
    </select>
    <?= $Page->SpillOverReasons->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->SpillOverReasons->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_an_registration_x_SpillOverReasons']"),
        options = { name: "x_SpillOverReasons", selectId: "patient_an_registration_x_SpillOverReasons", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_an_registration.fields.SpillOverReasons.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_an_registration.fields.SpillOverReasons.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANClosed->Visible) { // ANClosed ?>
    <div id="r_ANClosed" class="form-group row">
        <label id="elh_patient_an_registration_ANClosed" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ANClosed"><?= $Page->ANClosed->caption() ?><?= $Page->ANClosed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANClosed->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANClosed"><span id="el_patient_an_registration_ANClosed">
<template id="tp_x_ANClosed">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_ANClosed" name="x_ANClosed" id="x_ANClosed"<?= $Page->ANClosed->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ANClosed" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ANClosed[]"
    name="x_ANClosed[]"
    value="<?= HtmlEncode($Page->ANClosed->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ANClosed"
    data-target="dsl_x_ANClosed"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ANClosed->isInvalidClass() ?>"
    data-table="patient_an_registration"
    data-field="x_ANClosed"
    data-value-separator="<?= $Page->ANClosed->displayValueSeparatorAttribute() ?>"
    <?= $Page->ANClosed->editAttributes() ?>>
<?= $Page->ANClosed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANClosed->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANClosedDATE->Visible) { // ANClosedDATE ?>
    <div id="r_ANClosedDATE" class="form-group row">
        <label id="elh_patient_an_registration_ANClosedDATE" for="x_ANClosedDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ANClosedDATE"><?= $Page->ANClosedDATE->caption() ?><?= $Page->ANClosedDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANClosedDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANClosedDATE"><span id="el_patient_an_registration_ANClosedDATE">
<input type="<?= $Page->ANClosedDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x_ANClosedDATE" id="x_ANClosedDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANClosedDATE->getPlaceHolder()) ?>" value="<?= $Page->ANClosedDATE->EditValue ?>"<?= $Page->ANClosedDATE->editAttributes() ?> aria-describedby="x_ANClosedDATE_help">
<?= $Page->ANClosedDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANClosedDATE->getErrorMessage() ?></div>
<?php if (!$Page->ANClosedDATE->ReadOnly && !$Page->ANClosedDATE->Disabled && !isset($Page->ANClosedDATE->EditAttrs["readonly"]) && !isset($Page->ANClosedDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
    <div id="r_PastMedicalHistoryOthers" class="form-group row">
        <label id="elh_patient_an_registration_PastMedicalHistoryOthers" for="x_PastMedicalHistoryOthers" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PastMedicalHistoryOthers"><?= $Page->PastMedicalHistoryOthers->caption() ?><?= $Page->PastMedicalHistoryOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastMedicalHistoryOthers->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PastMedicalHistoryOthers"><span id="el_patient_an_registration_PastMedicalHistoryOthers">
<input type="<?= $Page->PastMedicalHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x_PastMedicalHistoryOthers" id="x_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?= $Page->PastMedicalHistoryOthers->EditValue ?>"<?= $Page->PastMedicalHistoryOthers->editAttributes() ?> aria-describedby="x_PastMedicalHistoryOthers_help">
<?= $Page->PastMedicalHistoryOthers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastMedicalHistoryOthers->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
    <div id="r_PastSurgicalHistoryOthers" class="form-group row">
        <label id="elh_patient_an_registration_PastSurgicalHistoryOthers" for="x_PastSurgicalHistoryOthers" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PastSurgicalHistoryOthers"><?= $Page->PastSurgicalHistoryOthers->caption() ?><?= $Page->PastSurgicalHistoryOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastSurgicalHistoryOthers->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PastSurgicalHistoryOthers"><span id="el_patient_an_registration_PastSurgicalHistoryOthers">
<input type="<?= $Page->PastSurgicalHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x_PastSurgicalHistoryOthers" id="x_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?= $Page->PastSurgicalHistoryOthers->EditValue ?>"<?= $Page->PastSurgicalHistoryOthers->editAttributes() ?> aria-describedby="x_PastSurgicalHistoryOthers_help">
<?= $Page->PastSurgicalHistoryOthers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastSurgicalHistoryOthers->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
    <div id="r_FamilyHistoryOthers" class="form-group row">
        <label id="elh_patient_an_registration_FamilyHistoryOthers" for="x_FamilyHistoryOthers" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_FamilyHistoryOthers"><?= $Page->FamilyHistoryOthers->caption() ?><?= $Page->FamilyHistoryOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FamilyHistoryOthers->cellAttributes() ?>>
<template id="tpx_patient_an_registration_FamilyHistoryOthers"><span id="el_patient_an_registration_FamilyHistoryOthers">
<input type="<?= $Page->FamilyHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x_FamilyHistoryOthers" id="x_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?= $Page->FamilyHistoryOthers->EditValue ?>"<?= $Page->FamilyHistoryOthers->editAttributes() ?> aria-describedby="x_FamilyHistoryOthers_help">
<?= $Page->FamilyHistoryOthers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FamilyHistoryOthers->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
    <div id="r_PresentPregnancyComplicationsOthers" class="form-group row">
        <label id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" for="x_PresentPregnancyComplicationsOthers" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_PresentPregnancyComplicationsOthers"><?= $Page->PresentPregnancyComplicationsOthers->caption() ?><?= $Page->PresentPregnancyComplicationsOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PresentPregnancyComplicationsOthers"><span id="el_patient_an_registration_PresentPregnancyComplicationsOthers">
<input type="<?= $Page->PresentPregnancyComplicationsOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x_PresentPregnancyComplicationsOthers" id="x_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?= $Page->PresentPregnancyComplicationsOthers->EditValue ?>"<?= $Page->PresentPregnancyComplicationsOthers->editAttributes() ?> aria-describedby="x_PresentPregnancyComplicationsOthers_help">
<?= $Page->PresentPregnancyComplicationsOthers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PresentPregnancyComplicationsOthers->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETdate->Visible) { // ETdate ?>
    <div id="r_ETdate" class="form-group row">
        <label id="elh_patient_an_registration_ETdate" for="x_ETdate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_an_registration_ETdate"><?= $Page->ETdate->caption() ?><?= $Page->ETdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETdate->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ETdate"><span id="el_patient_an_registration_ETdate">
<input type="<?= $Page->ETdate->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ETdate" name="x_ETdate" id="x_ETdate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ETdate->getPlaceHolder()) ?>" value="<?= $Page->ETdate->EditValue ?>"<?= $Page->ETdate->editAttributes() ?> aria-describedby="x_ETdate_help">
<?= $Page->ETdate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETdate->getErrorMessage() ?></div>
<?php if (!$Page->ETdate->ReadOnly && !$Page->ETdate->Disabled && !isset($Page->ETdate->EditAttrs["readonly"]) && !isset($Page->ETdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_an_registrationadd", "x_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_an_registrationadd" class="ew-custom-template"></div>
<template id="tpm_patient_an_registrationadd">
<div id="ct_PatientAnRegistrationAdd"><style>
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
.input-group {
	position: relative;
	display: flex;
	flex-wrap: inherit;
	align-items: stretch;
	width: 100%;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
::placeholder {
  color: red;
  opacity: 1; /* Firefox */
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: red;
}
::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["fk_id"];//
$showmaster = $_GET["showmaster"] ;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_opd_follow_up where id='".$Tid."'; ";
$resultsA = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where CoupleID='".$resultsA[0]["PatID"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
if($results[0]["Female"] != '')
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
}else{
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$resultsA[0]["PatientId"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$results[0]["id"]."'; ";
$resultsVitalHistory = $dbhelper->ExecuteRows($sql);
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
$pageHeader = 'Stimulation Chart For ' . $resultsA[0]["ARTCYCLE"];
?>	
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
  ?>
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
<div class="row">
<?php echo $resultsVitalHistory[count($resultsVitalHistory)-1]["Chiefcomplaints"] ;?>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">AN Registration</h3>
			</div>
			<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_G"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_G"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_P"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_P"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_L"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_L"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_A"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_A"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_E"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_E"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_M"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_M"></slot></span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_LMP"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_LMP"></slot></span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_ETdate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_ETdate"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_EDO"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_EDO"></slot></span>
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_MenstrualHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_MenstrualHistory"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_ObstetricHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_ObstetricHistory"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PreviousHistoryofGDM"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PreviousHistoryofGDM"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PreviousHistorofPIH"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PreviousHistorofPIH"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PreviousHistoryofIUGR"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PreviousHistoryofIUGR"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PreviousHistoryofOligohydramnios"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PreviousHistoryofOligohydramnios"></slot></span>
				</td>
				<td>				
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PreviousHistoryofPreterm"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PreviousHistoryofPreterm"></slot></span>
				</td>
				<td>				
				</td>
				<td>					 
				</td>
		 </tr> 
	</tbody>
</table>
</div>
<div class="card-body">
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">G</span></th>
		  		<th><span class="ew-cell">AN Complication</span></th>
		  		<th><span class="ew-cell">Delivery – ND/ LSCS Place of delivery</span></th>
		  		<th><span class="ew-cell">Baby Sex/ weight/ problems</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_G1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DeliveryNDLSCS1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_BabySexweight1"></slot></span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_G2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DeliveryNDLSCS2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_BabySexweight2"></slot></span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">3</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_G3"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DeliveryNDLSCS3"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_BabySexweight3"></slot></span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PastMedicalHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PastMedicalHistory"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PastMedicalHistoryOthers"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PastMedicalHistoryOthers"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PastSurgicalHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PastSurgicalHistory"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PastSurgicalHistoryOthers"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PastSurgicalHistoryOthers"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_FamilyHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_FamilyHistory"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_FamilyHistoryOthers"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_FamilyHistoryOthers"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
	</tbody>
</table>
</div>
<div class="card-body">
Scan :
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">Scan Type</span></th>
		  		<th><span class="ew-cell">Done Date</span></th>
		  		<th><span class="ew-cell">Report</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ViabilityDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ViabilityREPORT"></slot></span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability2</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_Viability2DATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_Viability2REPORT"></slot></span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">NTscan</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_NTscanDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_NTscanREPORT"></slot></span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">EarlyTarget</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_EarlyTargetDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_EarlyTargetREPORT"></slot></span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Anomaly</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_AnomalyDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_AnomalyREPORT"></slot></span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Growth</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_GrowthDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_GrowthREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Growth1</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_Growth1DATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_Growth1REPORT"></slot></span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
<div class="card-body">
Investigation:
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">Investigation Type</span></th>
		  		<th><span class="ew-cell">Done date</span></th>
		  		<th><span class="ew-cell">Inhouse / Outside Lab</span></th>
		  		<th><span class="ew-cell">Report</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">AN Profile</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ANProfileDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ANProfileINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ANProfileREPORT"></slot></span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Dual Marker</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DualMarkerDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DualMarkerINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DualMarkerREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Quadruple Marker</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_QuadrupleDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_QuadrupleINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_QuadrupleREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">5 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A5monthDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A5monthINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A5monthREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">7 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A7monthDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A7monthINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A7monthREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">9 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A9monthDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A9monthINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A9monthREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Inj Dexamethasone</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_INJDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_INJINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_INJREPORT"></slot></span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
<div class="card-body">
Present Pregnancy Complications :
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Bleeding"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Bleeding"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PresentPregnancyComplicationsOthers"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PresentPregnancyComplicationsOthers"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PICMENumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PICMENumber"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Outcome"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Outcome"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
		 <tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_DateofAdmission"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_DateofAdmission"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_DateodProcedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_DateodProcedure"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Miscarriage"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Miscarriage"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_ModeOfDelivery"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_ModeOfDelivery"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
	</tbody>
</table>
</div>
<div class="card-body">
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">ND</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_NDS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_NDP"></slot></span></td>
		</tr> 
		<tr>
				<td><span class="ew-cell">Vaccum D</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_VaccumS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_VaccumP"></slot></span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">Forceps D</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ForcepsS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ForcepsP"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Elective LSCS</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ElectiveS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ElectiveP"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Emergency LSCS</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_EmergencyS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_EmergencyP"></slot></span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
<slot class="ew-slot" name="tpc_patient_an_registration_Maturity"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Maturity"></slot>
<div class="card-body">
Paediatric : 
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Baby1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Baby1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_sex1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_sex1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_weight1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_weight1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_NICU1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_NICU1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Jaundice1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Jaundice1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Others1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Others1"></slot></span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Baby2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Baby2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_sex2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_sex2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_weight2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_weight2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_NICU2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_NICU2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Jaundice2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Jaundice2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Others2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Others2"></slot></span></td>
		</tr> 
	</tbody>
</table>
 <!-- /.card-body -->
</div>
<slot class="ew-slot" name="tpc_patient_an_registration_SpillOverReasons"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_SpillOverReasons"></slot>
<slot class="ew-slot" name="tpc_patient_an_registration_ANClosed"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_ANClosed"></slot>
<slot class="ew-slot" name="tpc_patient_an_registration_ANClosedDATE"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_ANClosedDATE"></slot>
		</div>
	</div>
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
    ew.applyTemplate("tpd_patient_an_registrationadd", "tpm_patient_an_registrationadd", "patient_an_registrationadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("patient_an_registration");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

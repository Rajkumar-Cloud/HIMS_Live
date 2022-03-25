<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfStimulationChartEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_stimulation_chartedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fivf_stimulation_chartedit = currentForm = new ew.Form("fivf_stimulation_chartedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_stimulation_chart")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_stimulation_chart)
        ew.vars.tables.ivf_stimulation_chart = currentTable;
    fivf_stimulation_chartedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["ARTCycle", [fields.ARTCycle.visible && fields.ARTCycle.required ? ew.Validators.required(fields.ARTCycle.caption) : null], fields.ARTCycle.isInvalid],
        ["FemaleFactor", [fields.FemaleFactor.visible && fields.FemaleFactor.required ? ew.Validators.required(fields.FemaleFactor.caption) : null], fields.FemaleFactor.isInvalid],
        ["MaleFactor", [fields.MaleFactor.visible && fields.MaleFactor.required ? ew.Validators.required(fields.MaleFactor.caption) : null], fields.MaleFactor.isInvalid],
        ["Protocol", [fields.Protocol.visible && fields.Protocol.required ? ew.Validators.required(fields.Protocol.caption) : null], fields.Protocol.isInvalid],
        ["SemenFrozen", [fields.SemenFrozen.visible && fields.SemenFrozen.required ? ew.Validators.required(fields.SemenFrozen.caption) : null], fields.SemenFrozen.isInvalid],
        ["A4ICSICycle", [fields.A4ICSICycle.visible && fields.A4ICSICycle.required ? ew.Validators.required(fields.A4ICSICycle.caption) : null], fields.A4ICSICycle.isInvalid],
        ["TotalICSICycle", [fields.TotalICSICycle.visible && fields.TotalICSICycle.required ? ew.Validators.required(fields.TotalICSICycle.caption) : null], fields.TotalICSICycle.isInvalid],
        ["TypeOfInfertility", [fields.TypeOfInfertility.visible && fields.TypeOfInfertility.required ? ew.Validators.required(fields.TypeOfInfertility.caption) : null], fields.TypeOfInfertility.isInvalid],
        ["Duration", [fields.Duration.visible && fields.Duration.required ? ew.Validators.required(fields.Duration.caption) : null], fields.Duration.isInvalid],
        ["LMP", [fields.LMP.visible && fields.LMP.required ? ew.Validators.required(fields.LMP.caption) : null], fields.LMP.isInvalid],
        ["RelevantHistory", [fields.RelevantHistory.visible && fields.RelevantHistory.required ? ew.Validators.required(fields.RelevantHistory.caption) : null], fields.RelevantHistory.isInvalid],
        ["IUICycles", [fields.IUICycles.visible && fields.IUICycles.required ? ew.Validators.required(fields.IUICycles.caption) : null], fields.IUICycles.isInvalid],
        ["AFC", [fields.AFC.visible && fields.AFC.required ? ew.Validators.required(fields.AFC.caption) : null], fields.AFC.isInvalid],
        ["AMH", [fields.AMH.visible && fields.AMH.required ? ew.Validators.required(fields.AMH.caption) : null], fields.AMH.isInvalid],
        ["FBMI", [fields.FBMI.visible && fields.FBMI.required ? ew.Validators.required(fields.FBMI.caption) : null], fields.FBMI.isInvalid],
        ["MBMI", [fields.MBMI.visible && fields.MBMI.required ? ew.Validators.required(fields.MBMI.caption) : null], fields.MBMI.isInvalid],
        ["OvarianVolumeRT", [fields.OvarianVolumeRT.visible && fields.OvarianVolumeRT.required ? ew.Validators.required(fields.OvarianVolumeRT.caption) : null], fields.OvarianVolumeRT.isInvalid],
        ["OvarianVolumeLT", [fields.OvarianVolumeLT.visible && fields.OvarianVolumeLT.required ? ew.Validators.required(fields.OvarianVolumeLT.caption) : null], fields.OvarianVolumeLT.isInvalid],
        ["DAYSOFSTIMULATION", [fields.DAYSOFSTIMULATION.visible && fields.DAYSOFSTIMULATION.required ? ew.Validators.required(fields.DAYSOFSTIMULATION.caption) : null], fields.DAYSOFSTIMULATION.isInvalid],
        ["DOSEOFGONADOTROPINS", [fields.DOSEOFGONADOTROPINS.visible && fields.DOSEOFGONADOTROPINS.required ? ew.Validators.required(fields.DOSEOFGONADOTROPINS.caption) : null], fields.DOSEOFGONADOTROPINS.isInvalid],
        ["INJTYPE", [fields.INJTYPE.visible && fields.INJTYPE.required ? ew.Validators.required(fields.INJTYPE.caption) : null], fields.INJTYPE.isInvalid],
        ["ANTAGONISTDAYS", [fields.ANTAGONISTDAYS.visible && fields.ANTAGONISTDAYS.required ? ew.Validators.required(fields.ANTAGONISTDAYS.caption) : null], fields.ANTAGONISTDAYS.isInvalid],
        ["ANTAGONISTSTARTDAY", [fields.ANTAGONISTSTARTDAY.visible && fields.ANTAGONISTSTARTDAY.required ? ew.Validators.required(fields.ANTAGONISTSTARTDAY.caption) : null], fields.ANTAGONISTSTARTDAY.isInvalid],
        ["GROWTHHORMONE", [fields.GROWTHHORMONE.visible && fields.GROWTHHORMONE.required ? ew.Validators.required(fields.GROWTHHORMONE.caption) : null], fields.GROWTHHORMONE.isInvalid],
        ["PRETREATMENT", [fields.PRETREATMENT.visible && fields.PRETREATMENT.required ? ew.Validators.required(fields.PRETREATMENT.caption) : null], fields.PRETREATMENT.isInvalid],
        ["SerumP4", [fields.SerumP4.visible && fields.SerumP4.required ? ew.Validators.required(fields.SerumP4.caption) : null], fields.SerumP4.isInvalid],
        ["FORT", [fields.FORT.visible && fields.FORT.required ? ew.Validators.required(fields.FORT.caption) : null], fields.FORT.isInvalid],
        ["MedicalFactors", [fields.MedicalFactors.visible && fields.MedicalFactors.required ? ew.Validators.required(fields.MedicalFactors.caption) : null], fields.MedicalFactors.isInvalid],
        ["SCDate", [fields.SCDate.visible && fields.SCDate.required ? ew.Validators.required(fields.SCDate.caption) : null], fields.SCDate.isInvalid],
        ["OvarianSurgery", [fields.OvarianSurgery.visible && fields.OvarianSurgery.required ? ew.Validators.required(fields.OvarianSurgery.caption) : null], fields.OvarianSurgery.isInvalid],
        ["PreProcedureOrder", [fields.PreProcedureOrder.visible && fields.PreProcedureOrder.required ? ew.Validators.required(fields.PreProcedureOrder.caption) : null], fields.PreProcedureOrder.isInvalid],
        ["TRIGGERR", [fields.TRIGGERR.visible && fields.TRIGGERR.required ? ew.Validators.required(fields.TRIGGERR.caption) : null], fields.TRIGGERR.isInvalid],
        ["TRIGGERDATE", [fields.TRIGGERDATE.visible && fields.TRIGGERDATE.required ? ew.Validators.required(fields.TRIGGERDATE.caption) : null], fields.TRIGGERDATE.isInvalid],
        ["ATHOMEorCLINIC", [fields.ATHOMEorCLINIC.visible && fields.ATHOMEorCLINIC.required ? ew.Validators.required(fields.ATHOMEorCLINIC.caption) : null], fields.ATHOMEorCLINIC.isInvalid],
        ["OPUDATE", [fields.OPUDATE.visible && fields.OPUDATE.required ? ew.Validators.required(fields.OPUDATE.caption) : null], fields.OPUDATE.isInvalid],
        ["ALLFREEZEINDICATION", [fields.ALLFREEZEINDICATION.visible && fields.ALLFREEZEINDICATION.required ? ew.Validators.required(fields.ALLFREEZEINDICATION.caption) : null], fields.ALLFREEZEINDICATION.isInvalid],
        ["ERA", [fields.ERA.visible && fields.ERA.required ? ew.Validators.required(fields.ERA.caption) : null], fields.ERA.isInvalid],
        ["PGTA", [fields.PGTA.visible && fields.PGTA.required ? ew.Validators.required(fields.PGTA.caption) : null], fields.PGTA.isInvalid],
        ["PGD", [fields.PGD.visible && fields.PGD.required ? ew.Validators.required(fields.PGD.caption) : null], fields.PGD.isInvalid],
        ["DATEOFET", [fields.DATEOFET.visible && fields.DATEOFET.required ? ew.Validators.required(fields.DATEOFET.caption) : null], fields.DATEOFET.isInvalid],
        ["ET", [fields.ET.visible && fields.ET.required ? ew.Validators.required(fields.ET.caption) : null], fields.ET.isInvalid],
        ["ESET", [fields.ESET.visible && fields.ESET.required ? ew.Validators.required(fields.ESET.caption) : null], fields.ESET.isInvalid],
        ["DOET", [fields.DOET.visible && fields.DOET.required ? ew.Validators.required(fields.DOET.caption) : null], fields.DOET.isInvalid],
        ["SEMENPREPARATION", [fields.SEMENPREPARATION.visible && fields.SEMENPREPARATION.required ? ew.Validators.required(fields.SEMENPREPARATION.caption) : null], fields.SEMENPREPARATION.isInvalid],
        ["REASONFORESET", [fields.REASONFORESET.visible && fields.REASONFORESET.required ? ew.Validators.required(fields.REASONFORESET.caption) : null], fields.REASONFORESET.isInvalid],
        ["Expectedoocytes", [fields.Expectedoocytes.visible && fields.Expectedoocytes.required ? ew.Validators.required(fields.Expectedoocytes.caption) : null], fields.Expectedoocytes.isInvalid],
        ["StChDate1", [fields.StChDate1.visible && fields.StChDate1.required ? ew.Validators.required(fields.StChDate1.caption) : null], fields.StChDate1.isInvalid],
        ["StChDate2", [fields.StChDate2.visible && fields.StChDate2.required ? ew.Validators.required(fields.StChDate2.caption) : null], fields.StChDate2.isInvalid],
        ["StChDate3", [fields.StChDate3.visible && fields.StChDate3.required ? ew.Validators.required(fields.StChDate3.caption) : null], fields.StChDate3.isInvalid],
        ["StChDate4", [fields.StChDate4.visible && fields.StChDate4.required ? ew.Validators.required(fields.StChDate4.caption) : null], fields.StChDate4.isInvalid],
        ["StChDate5", [fields.StChDate5.visible && fields.StChDate5.required ? ew.Validators.required(fields.StChDate5.caption) : null], fields.StChDate5.isInvalid],
        ["StChDate6", [fields.StChDate6.visible && fields.StChDate6.required ? ew.Validators.required(fields.StChDate6.caption) : null], fields.StChDate6.isInvalid],
        ["StChDate7", [fields.StChDate7.visible && fields.StChDate7.required ? ew.Validators.required(fields.StChDate7.caption) : null], fields.StChDate7.isInvalid],
        ["StChDate8", [fields.StChDate8.visible && fields.StChDate8.required ? ew.Validators.required(fields.StChDate8.caption) : null], fields.StChDate8.isInvalid],
        ["StChDate9", [fields.StChDate9.visible && fields.StChDate9.required ? ew.Validators.required(fields.StChDate9.caption) : null], fields.StChDate9.isInvalid],
        ["StChDate10", [fields.StChDate10.visible && fields.StChDate10.required ? ew.Validators.required(fields.StChDate10.caption) : null], fields.StChDate10.isInvalid],
        ["StChDate11", [fields.StChDate11.visible && fields.StChDate11.required ? ew.Validators.required(fields.StChDate11.caption) : null], fields.StChDate11.isInvalid],
        ["StChDate12", [fields.StChDate12.visible && fields.StChDate12.required ? ew.Validators.required(fields.StChDate12.caption) : null], fields.StChDate12.isInvalid],
        ["StChDate13", [fields.StChDate13.visible && fields.StChDate13.required ? ew.Validators.required(fields.StChDate13.caption) : null], fields.StChDate13.isInvalid],
        ["CycleDay1", [fields.CycleDay1.visible && fields.CycleDay1.required ? ew.Validators.required(fields.CycleDay1.caption) : null], fields.CycleDay1.isInvalid],
        ["CycleDay2", [fields.CycleDay2.visible && fields.CycleDay2.required ? ew.Validators.required(fields.CycleDay2.caption) : null], fields.CycleDay2.isInvalid],
        ["CycleDay3", [fields.CycleDay3.visible && fields.CycleDay3.required ? ew.Validators.required(fields.CycleDay3.caption) : null], fields.CycleDay3.isInvalid],
        ["CycleDay4", [fields.CycleDay4.visible && fields.CycleDay4.required ? ew.Validators.required(fields.CycleDay4.caption) : null], fields.CycleDay4.isInvalid],
        ["CycleDay5", [fields.CycleDay5.visible && fields.CycleDay5.required ? ew.Validators.required(fields.CycleDay5.caption) : null], fields.CycleDay5.isInvalid],
        ["CycleDay6", [fields.CycleDay6.visible && fields.CycleDay6.required ? ew.Validators.required(fields.CycleDay6.caption) : null], fields.CycleDay6.isInvalid],
        ["CycleDay7", [fields.CycleDay7.visible && fields.CycleDay7.required ? ew.Validators.required(fields.CycleDay7.caption) : null], fields.CycleDay7.isInvalid],
        ["CycleDay8", [fields.CycleDay8.visible && fields.CycleDay8.required ? ew.Validators.required(fields.CycleDay8.caption) : null], fields.CycleDay8.isInvalid],
        ["CycleDay9", [fields.CycleDay9.visible && fields.CycleDay9.required ? ew.Validators.required(fields.CycleDay9.caption) : null], fields.CycleDay9.isInvalid],
        ["CycleDay10", [fields.CycleDay10.visible && fields.CycleDay10.required ? ew.Validators.required(fields.CycleDay10.caption) : null], fields.CycleDay10.isInvalid],
        ["CycleDay11", [fields.CycleDay11.visible && fields.CycleDay11.required ? ew.Validators.required(fields.CycleDay11.caption) : null], fields.CycleDay11.isInvalid],
        ["CycleDay12", [fields.CycleDay12.visible && fields.CycleDay12.required ? ew.Validators.required(fields.CycleDay12.caption) : null], fields.CycleDay12.isInvalid],
        ["CycleDay13", [fields.CycleDay13.visible && fields.CycleDay13.required ? ew.Validators.required(fields.CycleDay13.caption) : null], fields.CycleDay13.isInvalid],
        ["StimulationDay1", [fields.StimulationDay1.visible && fields.StimulationDay1.required ? ew.Validators.required(fields.StimulationDay1.caption) : null], fields.StimulationDay1.isInvalid],
        ["StimulationDay2", [fields.StimulationDay2.visible && fields.StimulationDay2.required ? ew.Validators.required(fields.StimulationDay2.caption) : null], fields.StimulationDay2.isInvalid],
        ["StimulationDay3", [fields.StimulationDay3.visible && fields.StimulationDay3.required ? ew.Validators.required(fields.StimulationDay3.caption) : null], fields.StimulationDay3.isInvalid],
        ["StimulationDay4", [fields.StimulationDay4.visible && fields.StimulationDay4.required ? ew.Validators.required(fields.StimulationDay4.caption) : null], fields.StimulationDay4.isInvalid],
        ["StimulationDay5", [fields.StimulationDay5.visible && fields.StimulationDay5.required ? ew.Validators.required(fields.StimulationDay5.caption) : null], fields.StimulationDay5.isInvalid],
        ["StimulationDay6", [fields.StimulationDay6.visible && fields.StimulationDay6.required ? ew.Validators.required(fields.StimulationDay6.caption) : null], fields.StimulationDay6.isInvalid],
        ["StimulationDay7", [fields.StimulationDay7.visible && fields.StimulationDay7.required ? ew.Validators.required(fields.StimulationDay7.caption) : null], fields.StimulationDay7.isInvalid],
        ["StimulationDay8", [fields.StimulationDay8.visible && fields.StimulationDay8.required ? ew.Validators.required(fields.StimulationDay8.caption) : null], fields.StimulationDay8.isInvalid],
        ["StimulationDay9", [fields.StimulationDay9.visible && fields.StimulationDay9.required ? ew.Validators.required(fields.StimulationDay9.caption) : null], fields.StimulationDay9.isInvalid],
        ["StimulationDay10", [fields.StimulationDay10.visible && fields.StimulationDay10.required ? ew.Validators.required(fields.StimulationDay10.caption) : null], fields.StimulationDay10.isInvalid],
        ["StimulationDay11", [fields.StimulationDay11.visible && fields.StimulationDay11.required ? ew.Validators.required(fields.StimulationDay11.caption) : null], fields.StimulationDay11.isInvalid],
        ["StimulationDay12", [fields.StimulationDay12.visible && fields.StimulationDay12.required ? ew.Validators.required(fields.StimulationDay12.caption) : null], fields.StimulationDay12.isInvalid],
        ["StimulationDay13", [fields.StimulationDay13.visible && fields.StimulationDay13.required ? ew.Validators.required(fields.StimulationDay13.caption) : null], fields.StimulationDay13.isInvalid],
        ["Tablet1", [fields.Tablet1.visible && fields.Tablet1.required ? ew.Validators.required(fields.Tablet1.caption) : null], fields.Tablet1.isInvalid],
        ["Tablet2", [fields.Tablet2.visible && fields.Tablet2.required ? ew.Validators.required(fields.Tablet2.caption) : null], fields.Tablet2.isInvalid],
        ["Tablet3", [fields.Tablet3.visible && fields.Tablet3.required ? ew.Validators.required(fields.Tablet3.caption) : null], fields.Tablet3.isInvalid],
        ["Tablet4", [fields.Tablet4.visible && fields.Tablet4.required ? ew.Validators.required(fields.Tablet4.caption) : null], fields.Tablet4.isInvalid],
        ["Tablet5", [fields.Tablet5.visible && fields.Tablet5.required ? ew.Validators.required(fields.Tablet5.caption) : null], fields.Tablet5.isInvalid],
        ["Tablet6", [fields.Tablet6.visible && fields.Tablet6.required ? ew.Validators.required(fields.Tablet6.caption) : null], fields.Tablet6.isInvalid],
        ["Tablet7", [fields.Tablet7.visible && fields.Tablet7.required ? ew.Validators.required(fields.Tablet7.caption) : null], fields.Tablet7.isInvalid],
        ["Tablet8", [fields.Tablet8.visible && fields.Tablet8.required ? ew.Validators.required(fields.Tablet8.caption) : null], fields.Tablet8.isInvalid],
        ["Tablet9", [fields.Tablet9.visible && fields.Tablet9.required ? ew.Validators.required(fields.Tablet9.caption) : null], fields.Tablet9.isInvalid],
        ["Tablet10", [fields.Tablet10.visible && fields.Tablet10.required ? ew.Validators.required(fields.Tablet10.caption) : null], fields.Tablet10.isInvalid],
        ["Tablet11", [fields.Tablet11.visible && fields.Tablet11.required ? ew.Validators.required(fields.Tablet11.caption) : null], fields.Tablet11.isInvalid],
        ["Tablet12", [fields.Tablet12.visible && fields.Tablet12.required ? ew.Validators.required(fields.Tablet12.caption) : null], fields.Tablet12.isInvalid],
        ["Tablet13", [fields.Tablet13.visible && fields.Tablet13.required ? ew.Validators.required(fields.Tablet13.caption) : null], fields.Tablet13.isInvalid],
        ["RFSH1", [fields.RFSH1.visible && fields.RFSH1.required ? ew.Validators.required(fields.RFSH1.caption) : null], fields.RFSH1.isInvalid],
        ["RFSH2", [fields.RFSH2.visible && fields.RFSH2.required ? ew.Validators.required(fields.RFSH2.caption) : null], fields.RFSH2.isInvalid],
        ["RFSH3", [fields.RFSH3.visible && fields.RFSH3.required ? ew.Validators.required(fields.RFSH3.caption) : null], fields.RFSH3.isInvalid],
        ["RFSH4", [fields.RFSH4.visible && fields.RFSH4.required ? ew.Validators.required(fields.RFSH4.caption) : null], fields.RFSH4.isInvalid],
        ["RFSH5", [fields.RFSH5.visible && fields.RFSH5.required ? ew.Validators.required(fields.RFSH5.caption) : null], fields.RFSH5.isInvalid],
        ["RFSH6", [fields.RFSH6.visible && fields.RFSH6.required ? ew.Validators.required(fields.RFSH6.caption) : null], fields.RFSH6.isInvalid],
        ["RFSH7", [fields.RFSH7.visible && fields.RFSH7.required ? ew.Validators.required(fields.RFSH7.caption) : null], fields.RFSH7.isInvalid],
        ["RFSH8", [fields.RFSH8.visible && fields.RFSH8.required ? ew.Validators.required(fields.RFSH8.caption) : null], fields.RFSH8.isInvalid],
        ["RFSH9", [fields.RFSH9.visible && fields.RFSH9.required ? ew.Validators.required(fields.RFSH9.caption) : null], fields.RFSH9.isInvalid],
        ["RFSH10", [fields.RFSH10.visible && fields.RFSH10.required ? ew.Validators.required(fields.RFSH10.caption) : null], fields.RFSH10.isInvalid],
        ["RFSH11", [fields.RFSH11.visible && fields.RFSH11.required ? ew.Validators.required(fields.RFSH11.caption) : null], fields.RFSH11.isInvalid],
        ["RFSH12", [fields.RFSH12.visible && fields.RFSH12.required ? ew.Validators.required(fields.RFSH12.caption) : null], fields.RFSH12.isInvalid],
        ["RFSH13", [fields.RFSH13.visible && fields.RFSH13.required ? ew.Validators.required(fields.RFSH13.caption) : null], fields.RFSH13.isInvalid],
        ["HMG1", [fields.HMG1.visible && fields.HMG1.required ? ew.Validators.required(fields.HMG1.caption) : null], fields.HMG1.isInvalid],
        ["HMG2", [fields.HMG2.visible && fields.HMG2.required ? ew.Validators.required(fields.HMG2.caption) : null], fields.HMG2.isInvalid],
        ["HMG3", [fields.HMG3.visible && fields.HMG3.required ? ew.Validators.required(fields.HMG3.caption) : null], fields.HMG3.isInvalid],
        ["HMG4", [fields.HMG4.visible && fields.HMG4.required ? ew.Validators.required(fields.HMG4.caption) : null], fields.HMG4.isInvalid],
        ["HMG5", [fields.HMG5.visible && fields.HMG5.required ? ew.Validators.required(fields.HMG5.caption) : null], fields.HMG5.isInvalid],
        ["HMG6", [fields.HMG6.visible && fields.HMG6.required ? ew.Validators.required(fields.HMG6.caption) : null], fields.HMG6.isInvalid],
        ["HMG7", [fields.HMG7.visible && fields.HMG7.required ? ew.Validators.required(fields.HMG7.caption) : null], fields.HMG7.isInvalid],
        ["HMG8", [fields.HMG8.visible && fields.HMG8.required ? ew.Validators.required(fields.HMG8.caption) : null], fields.HMG8.isInvalid],
        ["HMG9", [fields.HMG9.visible && fields.HMG9.required ? ew.Validators.required(fields.HMG9.caption) : null], fields.HMG9.isInvalid],
        ["HMG10", [fields.HMG10.visible && fields.HMG10.required ? ew.Validators.required(fields.HMG10.caption) : null], fields.HMG10.isInvalid],
        ["HMG11", [fields.HMG11.visible && fields.HMG11.required ? ew.Validators.required(fields.HMG11.caption) : null], fields.HMG11.isInvalid],
        ["HMG12", [fields.HMG12.visible && fields.HMG12.required ? ew.Validators.required(fields.HMG12.caption) : null], fields.HMG12.isInvalid],
        ["HMG13", [fields.HMG13.visible && fields.HMG13.required ? ew.Validators.required(fields.HMG13.caption) : null], fields.HMG13.isInvalid],
        ["GnRH1", [fields.GnRH1.visible && fields.GnRH1.required ? ew.Validators.required(fields.GnRH1.caption) : null], fields.GnRH1.isInvalid],
        ["GnRH2", [fields.GnRH2.visible && fields.GnRH2.required ? ew.Validators.required(fields.GnRH2.caption) : null], fields.GnRH2.isInvalid],
        ["GnRH3", [fields.GnRH3.visible && fields.GnRH3.required ? ew.Validators.required(fields.GnRH3.caption) : null], fields.GnRH3.isInvalid],
        ["GnRH4", [fields.GnRH4.visible && fields.GnRH4.required ? ew.Validators.required(fields.GnRH4.caption) : null], fields.GnRH4.isInvalid],
        ["GnRH5", [fields.GnRH5.visible && fields.GnRH5.required ? ew.Validators.required(fields.GnRH5.caption) : null], fields.GnRH5.isInvalid],
        ["GnRH6", [fields.GnRH6.visible && fields.GnRH6.required ? ew.Validators.required(fields.GnRH6.caption) : null], fields.GnRH6.isInvalid],
        ["GnRH7", [fields.GnRH7.visible && fields.GnRH7.required ? ew.Validators.required(fields.GnRH7.caption) : null], fields.GnRH7.isInvalid],
        ["GnRH8", [fields.GnRH8.visible && fields.GnRH8.required ? ew.Validators.required(fields.GnRH8.caption) : null], fields.GnRH8.isInvalid],
        ["GnRH9", [fields.GnRH9.visible && fields.GnRH9.required ? ew.Validators.required(fields.GnRH9.caption) : null], fields.GnRH9.isInvalid],
        ["GnRH10", [fields.GnRH10.visible && fields.GnRH10.required ? ew.Validators.required(fields.GnRH10.caption) : null], fields.GnRH10.isInvalid],
        ["GnRH11", [fields.GnRH11.visible && fields.GnRH11.required ? ew.Validators.required(fields.GnRH11.caption) : null], fields.GnRH11.isInvalid],
        ["GnRH12", [fields.GnRH12.visible && fields.GnRH12.required ? ew.Validators.required(fields.GnRH12.caption) : null], fields.GnRH12.isInvalid],
        ["GnRH13", [fields.GnRH13.visible && fields.GnRH13.required ? ew.Validators.required(fields.GnRH13.caption) : null], fields.GnRH13.isInvalid],
        ["E21", [fields.E21.visible && fields.E21.required ? ew.Validators.required(fields.E21.caption) : null], fields.E21.isInvalid],
        ["E22", [fields.E22.visible && fields.E22.required ? ew.Validators.required(fields.E22.caption) : null], fields.E22.isInvalid],
        ["E23", [fields.E23.visible && fields.E23.required ? ew.Validators.required(fields.E23.caption) : null], fields.E23.isInvalid],
        ["E24", [fields.E24.visible && fields.E24.required ? ew.Validators.required(fields.E24.caption) : null], fields.E24.isInvalid],
        ["E25", [fields.E25.visible && fields.E25.required ? ew.Validators.required(fields.E25.caption) : null], fields.E25.isInvalid],
        ["E26", [fields.E26.visible && fields.E26.required ? ew.Validators.required(fields.E26.caption) : null], fields.E26.isInvalid],
        ["E27", [fields.E27.visible && fields.E27.required ? ew.Validators.required(fields.E27.caption) : null], fields.E27.isInvalid],
        ["E28", [fields.E28.visible && fields.E28.required ? ew.Validators.required(fields.E28.caption) : null], fields.E28.isInvalid],
        ["E29", [fields.E29.visible && fields.E29.required ? ew.Validators.required(fields.E29.caption) : null], fields.E29.isInvalid],
        ["E210", [fields.E210.visible && fields.E210.required ? ew.Validators.required(fields.E210.caption) : null], fields.E210.isInvalid],
        ["E211", [fields.E211.visible && fields.E211.required ? ew.Validators.required(fields.E211.caption) : null], fields.E211.isInvalid],
        ["E212", [fields.E212.visible && fields.E212.required ? ew.Validators.required(fields.E212.caption) : null], fields.E212.isInvalid],
        ["E213", [fields.E213.visible && fields.E213.required ? ew.Validators.required(fields.E213.caption) : null], fields.E213.isInvalid],
        ["P41", [fields.P41.visible && fields.P41.required ? ew.Validators.required(fields.P41.caption) : null], fields.P41.isInvalid],
        ["P42", [fields.P42.visible && fields.P42.required ? ew.Validators.required(fields.P42.caption) : null], fields.P42.isInvalid],
        ["P43", [fields.P43.visible && fields.P43.required ? ew.Validators.required(fields.P43.caption) : null], fields.P43.isInvalid],
        ["P44", [fields.P44.visible && fields.P44.required ? ew.Validators.required(fields.P44.caption) : null], fields.P44.isInvalid],
        ["P45", [fields.P45.visible && fields.P45.required ? ew.Validators.required(fields.P45.caption) : null], fields.P45.isInvalid],
        ["P46", [fields.P46.visible && fields.P46.required ? ew.Validators.required(fields.P46.caption) : null], fields.P46.isInvalid],
        ["P47", [fields.P47.visible && fields.P47.required ? ew.Validators.required(fields.P47.caption) : null], fields.P47.isInvalid],
        ["P48", [fields.P48.visible && fields.P48.required ? ew.Validators.required(fields.P48.caption) : null], fields.P48.isInvalid],
        ["P49", [fields.P49.visible && fields.P49.required ? ew.Validators.required(fields.P49.caption) : null], fields.P49.isInvalid],
        ["P410", [fields.P410.visible && fields.P410.required ? ew.Validators.required(fields.P410.caption) : null], fields.P410.isInvalid],
        ["P411", [fields.P411.visible && fields.P411.required ? ew.Validators.required(fields.P411.caption) : null], fields.P411.isInvalid],
        ["P412", [fields.P412.visible && fields.P412.required ? ew.Validators.required(fields.P412.caption) : null], fields.P412.isInvalid],
        ["P413", [fields.P413.visible && fields.P413.required ? ew.Validators.required(fields.P413.caption) : null], fields.P413.isInvalid],
        ["USGRt1", [fields.USGRt1.visible && fields.USGRt1.required ? ew.Validators.required(fields.USGRt1.caption) : null], fields.USGRt1.isInvalid],
        ["USGRt2", [fields.USGRt2.visible && fields.USGRt2.required ? ew.Validators.required(fields.USGRt2.caption) : null], fields.USGRt2.isInvalid],
        ["USGRt3", [fields.USGRt3.visible && fields.USGRt3.required ? ew.Validators.required(fields.USGRt3.caption) : null], fields.USGRt3.isInvalid],
        ["USGRt4", [fields.USGRt4.visible && fields.USGRt4.required ? ew.Validators.required(fields.USGRt4.caption) : null], fields.USGRt4.isInvalid],
        ["USGRt5", [fields.USGRt5.visible && fields.USGRt5.required ? ew.Validators.required(fields.USGRt5.caption) : null], fields.USGRt5.isInvalid],
        ["USGRt6", [fields.USGRt6.visible && fields.USGRt6.required ? ew.Validators.required(fields.USGRt6.caption) : null], fields.USGRt6.isInvalid],
        ["USGRt7", [fields.USGRt7.visible && fields.USGRt7.required ? ew.Validators.required(fields.USGRt7.caption) : null], fields.USGRt7.isInvalid],
        ["USGRt8", [fields.USGRt8.visible && fields.USGRt8.required ? ew.Validators.required(fields.USGRt8.caption) : null], fields.USGRt8.isInvalid],
        ["USGRt9", [fields.USGRt9.visible && fields.USGRt9.required ? ew.Validators.required(fields.USGRt9.caption) : null], fields.USGRt9.isInvalid],
        ["USGRt10", [fields.USGRt10.visible && fields.USGRt10.required ? ew.Validators.required(fields.USGRt10.caption) : null], fields.USGRt10.isInvalid],
        ["USGRt11", [fields.USGRt11.visible && fields.USGRt11.required ? ew.Validators.required(fields.USGRt11.caption) : null], fields.USGRt11.isInvalid],
        ["USGRt12", [fields.USGRt12.visible && fields.USGRt12.required ? ew.Validators.required(fields.USGRt12.caption) : null], fields.USGRt12.isInvalid],
        ["USGRt13", [fields.USGRt13.visible && fields.USGRt13.required ? ew.Validators.required(fields.USGRt13.caption) : null], fields.USGRt13.isInvalid],
        ["USGLt1", [fields.USGLt1.visible && fields.USGLt1.required ? ew.Validators.required(fields.USGLt1.caption) : null], fields.USGLt1.isInvalid],
        ["USGLt2", [fields.USGLt2.visible && fields.USGLt2.required ? ew.Validators.required(fields.USGLt2.caption) : null], fields.USGLt2.isInvalid],
        ["USGLt3", [fields.USGLt3.visible && fields.USGLt3.required ? ew.Validators.required(fields.USGLt3.caption) : null], fields.USGLt3.isInvalid],
        ["USGLt4", [fields.USGLt4.visible && fields.USGLt4.required ? ew.Validators.required(fields.USGLt4.caption) : null], fields.USGLt4.isInvalid],
        ["USGLt5", [fields.USGLt5.visible && fields.USGLt5.required ? ew.Validators.required(fields.USGLt5.caption) : null], fields.USGLt5.isInvalid],
        ["USGLt6", [fields.USGLt6.visible && fields.USGLt6.required ? ew.Validators.required(fields.USGLt6.caption) : null], fields.USGLt6.isInvalid],
        ["USGLt7", [fields.USGLt7.visible && fields.USGLt7.required ? ew.Validators.required(fields.USGLt7.caption) : null], fields.USGLt7.isInvalid],
        ["USGLt8", [fields.USGLt8.visible && fields.USGLt8.required ? ew.Validators.required(fields.USGLt8.caption) : null], fields.USGLt8.isInvalid],
        ["USGLt9", [fields.USGLt9.visible && fields.USGLt9.required ? ew.Validators.required(fields.USGLt9.caption) : null], fields.USGLt9.isInvalid],
        ["USGLt10", [fields.USGLt10.visible && fields.USGLt10.required ? ew.Validators.required(fields.USGLt10.caption) : null], fields.USGLt10.isInvalid],
        ["USGLt11", [fields.USGLt11.visible && fields.USGLt11.required ? ew.Validators.required(fields.USGLt11.caption) : null], fields.USGLt11.isInvalid],
        ["USGLt12", [fields.USGLt12.visible && fields.USGLt12.required ? ew.Validators.required(fields.USGLt12.caption) : null], fields.USGLt12.isInvalid],
        ["USGLt13", [fields.USGLt13.visible && fields.USGLt13.required ? ew.Validators.required(fields.USGLt13.caption) : null], fields.USGLt13.isInvalid],
        ["EM1", [fields.EM1.visible && fields.EM1.required ? ew.Validators.required(fields.EM1.caption) : null], fields.EM1.isInvalid],
        ["EM2", [fields.EM2.visible && fields.EM2.required ? ew.Validators.required(fields.EM2.caption) : null], fields.EM2.isInvalid],
        ["EM3", [fields.EM3.visible && fields.EM3.required ? ew.Validators.required(fields.EM3.caption) : null], fields.EM3.isInvalid],
        ["EM4", [fields.EM4.visible && fields.EM4.required ? ew.Validators.required(fields.EM4.caption) : null], fields.EM4.isInvalid],
        ["EM5", [fields.EM5.visible && fields.EM5.required ? ew.Validators.required(fields.EM5.caption) : null], fields.EM5.isInvalid],
        ["EM6", [fields.EM6.visible && fields.EM6.required ? ew.Validators.required(fields.EM6.caption) : null], fields.EM6.isInvalid],
        ["EM7", [fields.EM7.visible && fields.EM7.required ? ew.Validators.required(fields.EM7.caption) : null], fields.EM7.isInvalid],
        ["EM8", [fields.EM8.visible && fields.EM8.required ? ew.Validators.required(fields.EM8.caption) : null], fields.EM8.isInvalid],
        ["EM9", [fields.EM9.visible && fields.EM9.required ? ew.Validators.required(fields.EM9.caption) : null], fields.EM9.isInvalid],
        ["EM10", [fields.EM10.visible && fields.EM10.required ? ew.Validators.required(fields.EM10.caption) : null], fields.EM10.isInvalid],
        ["EM11", [fields.EM11.visible && fields.EM11.required ? ew.Validators.required(fields.EM11.caption) : null], fields.EM11.isInvalid],
        ["EM12", [fields.EM12.visible && fields.EM12.required ? ew.Validators.required(fields.EM12.caption) : null], fields.EM12.isInvalid],
        ["EM13", [fields.EM13.visible && fields.EM13.required ? ew.Validators.required(fields.EM13.caption) : null], fields.EM13.isInvalid],
        ["Others1", [fields.Others1.visible && fields.Others1.required ? ew.Validators.required(fields.Others1.caption) : null], fields.Others1.isInvalid],
        ["Others2", [fields.Others2.visible && fields.Others2.required ? ew.Validators.required(fields.Others2.caption) : null], fields.Others2.isInvalid],
        ["Others3", [fields.Others3.visible && fields.Others3.required ? ew.Validators.required(fields.Others3.caption) : null], fields.Others3.isInvalid],
        ["Others4", [fields.Others4.visible && fields.Others4.required ? ew.Validators.required(fields.Others4.caption) : null], fields.Others4.isInvalid],
        ["Others5", [fields.Others5.visible && fields.Others5.required ? ew.Validators.required(fields.Others5.caption) : null], fields.Others5.isInvalid],
        ["Others6", [fields.Others6.visible && fields.Others6.required ? ew.Validators.required(fields.Others6.caption) : null], fields.Others6.isInvalid],
        ["Others7", [fields.Others7.visible && fields.Others7.required ? ew.Validators.required(fields.Others7.caption) : null], fields.Others7.isInvalid],
        ["Others8", [fields.Others8.visible && fields.Others8.required ? ew.Validators.required(fields.Others8.caption) : null], fields.Others8.isInvalid],
        ["Others9", [fields.Others9.visible && fields.Others9.required ? ew.Validators.required(fields.Others9.caption) : null], fields.Others9.isInvalid],
        ["Others10", [fields.Others10.visible && fields.Others10.required ? ew.Validators.required(fields.Others10.caption) : null], fields.Others10.isInvalid],
        ["Others11", [fields.Others11.visible && fields.Others11.required ? ew.Validators.required(fields.Others11.caption) : null], fields.Others11.isInvalid],
        ["Others12", [fields.Others12.visible && fields.Others12.required ? ew.Validators.required(fields.Others12.caption) : null], fields.Others12.isInvalid],
        ["Others13", [fields.Others13.visible && fields.Others13.required ? ew.Validators.required(fields.Others13.caption) : null], fields.Others13.isInvalid],
        ["DR1", [fields.DR1.visible && fields.DR1.required ? ew.Validators.required(fields.DR1.caption) : null], fields.DR1.isInvalid],
        ["DR2", [fields.DR2.visible && fields.DR2.required ? ew.Validators.required(fields.DR2.caption) : null], fields.DR2.isInvalid],
        ["DR3", [fields.DR3.visible && fields.DR3.required ? ew.Validators.required(fields.DR3.caption) : null], fields.DR3.isInvalid],
        ["DR4", [fields.DR4.visible && fields.DR4.required ? ew.Validators.required(fields.DR4.caption) : null], fields.DR4.isInvalid],
        ["DR5", [fields.DR5.visible && fields.DR5.required ? ew.Validators.required(fields.DR5.caption) : null], fields.DR5.isInvalid],
        ["DR6", [fields.DR6.visible && fields.DR6.required ? ew.Validators.required(fields.DR6.caption) : null], fields.DR6.isInvalid],
        ["DR7", [fields.DR7.visible && fields.DR7.required ? ew.Validators.required(fields.DR7.caption) : null], fields.DR7.isInvalid],
        ["DR8", [fields.DR8.visible && fields.DR8.required ? ew.Validators.required(fields.DR8.caption) : null], fields.DR8.isInvalid],
        ["DR9", [fields.DR9.visible && fields.DR9.required ? ew.Validators.required(fields.DR9.caption) : null], fields.DR9.isInvalid],
        ["DR10", [fields.DR10.visible && fields.DR10.required ? ew.Validators.required(fields.DR10.caption) : null], fields.DR10.isInvalid],
        ["DR11", [fields.DR11.visible && fields.DR11.required ? ew.Validators.required(fields.DR11.caption) : null], fields.DR11.isInvalid],
        ["DR12", [fields.DR12.visible && fields.DR12.required ? ew.Validators.required(fields.DR12.caption) : null], fields.DR12.isInvalid],
        ["DR13", [fields.DR13.visible && fields.DR13.required ? ew.Validators.required(fields.DR13.caption) : null], fields.DR13.isInvalid],
        ["DOCTORRESPONSIBLE", [fields.DOCTORRESPONSIBLE.visible && fields.DOCTORRESPONSIBLE.required ? ew.Validators.required(fields.DOCTORRESPONSIBLE.caption) : null], fields.DOCTORRESPONSIBLE.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["Convert", [fields.Convert.visible && fields.Convert.required ? ew.Validators.required(fields.Convert.caption) : null], fields.Convert.isInvalid],
        ["Consultant", [fields.Consultant.visible && fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["InseminatinTechnique", [fields.InseminatinTechnique.visible && fields.InseminatinTechnique.required ? ew.Validators.required(fields.InseminatinTechnique.caption) : null], fields.InseminatinTechnique.isInvalid],
        ["IndicationForART", [fields.IndicationForART.visible && fields.IndicationForART.required ? ew.Validators.required(fields.IndicationForART.caption) : null], fields.IndicationForART.isInvalid],
        ["Hysteroscopy", [fields.Hysteroscopy.visible && fields.Hysteroscopy.required ? ew.Validators.required(fields.Hysteroscopy.caption) : null], fields.Hysteroscopy.isInvalid],
        ["EndometrialScratching", [fields.EndometrialScratching.visible && fields.EndometrialScratching.required ? ew.Validators.required(fields.EndometrialScratching.caption) : null], fields.EndometrialScratching.isInvalid],
        ["TrialCannulation", [fields.TrialCannulation.visible && fields.TrialCannulation.required ? ew.Validators.required(fields.TrialCannulation.caption) : null], fields.TrialCannulation.isInvalid],
        ["CYCLETYPE", [fields.CYCLETYPE.visible && fields.CYCLETYPE.required ? ew.Validators.required(fields.CYCLETYPE.caption) : null], fields.CYCLETYPE.isInvalid],
        ["HRTCYCLE", [fields.HRTCYCLE.visible && fields.HRTCYCLE.required ? ew.Validators.required(fields.HRTCYCLE.caption) : null], fields.HRTCYCLE.isInvalid],
        ["OralEstrogenDosage", [fields.OralEstrogenDosage.visible && fields.OralEstrogenDosage.required ? ew.Validators.required(fields.OralEstrogenDosage.caption) : null], fields.OralEstrogenDosage.isInvalid],
        ["VaginalEstrogen", [fields.VaginalEstrogen.visible && fields.VaginalEstrogen.required ? ew.Validators.required(fields.VaginalEstrogen.caption) : null], fields.VaginalEstrogen.isInvalid],
        ["GCSF", [fields.GCSF.visible && fields.GCSF.required ? ew.Validators.required(fields.GCSF.caption) : null], fields.GCSF.isInvalid],
        ["ActivatedPRP", [fields.ActivatedPRP.visible && fields.ActivatedPRP.required ? ew.Validators.required(fields.ActivatedPRP.caption) : null], fields.ActivatedPRP.isInvalid],
        ["UCLcm", [fields.UCLcm.visible && fields.UCLcm.required ? ew.Validators.required(fields.UCLcm.caption) : null], fields.UCLcm.isInvalid],
        ["DATOFEMBRYOTRANSFER", [fields.DATOFEMBRYOTRANSFER.visible && fields.DATOFEMBRYOTRANSFER.required ? ew.Validators.required(fields.DATOFEMBRYOTRANSFER.caption) : null], fields.DATOFEMBRYOTRANSFER.isInvalid],
        ["DAYOFEMBRYOTRANSFER", [fields.DAYOFEMBRYOTRANSFER.visible && fields.DAYOFEMBRYOTRANSFER.required ? ew.Validators.required(fields.DAYOFEMBRYOTRANSFER.caption) : null], fields.DAYOFEMBRYOTRANSFER.isInvalid],
        ["NOOFEMBRYOSTHAWED", [fields.NOOFEMBRYOSTHAWED.visible && fields.NOOFEMBRYOSTHAWED.required ? ew.Validators.required(fields.NOOFEMBRYOSTHAWED.caption) : null], fields.NOOFEMBRYOSTHAWED.isInvalid],
        ["NOOFEMBRYOSTRANSFERRED", [fields.NOOFEMBRYOSTRANSFERRED.visible && fields.NOOFEMBRYOSTRANSFERRED.required ? ew.Validators.required(fields.NOOFEMBRYOSTRANSFERRED.caption) : null], fields.NOOFEMBRYOSTRANSFERRED.isInvalid],
        ["DAYOFEMBRYOS", [fields.DAYOFEMBRYOS.visible && fields.DAYOFEMBRYOS.required ? ew.Validators.required(fields.DAYOFEMBRYOS.caption) : null], fields.DAYOFEMBRYOS.isInvalid],
        ["CRYOPRESERVEDEMBRYOS", [fields.CRYOPRESERVEDEMBRYOS.visible && fields.CRYOPRESERVEDEMBRYOS.required ? ew.Validators.required(fields.CRYOPRESERVEDEMBRYOS.caption) : null], fields.CRYOPRESERVEDEMBRYOS.isInvalid],
        ["ViaAdmin", [fields.ViaAdmin.visible && fields.ViaAdmin.required ? ew.Validators.required(fields.ViaAdmin.caption) : null], fields.ViaAdmin.isInvalid],
        ["ViaStartDateTime", [fields.ViaStartDateTime.visible && fields.ViaStartDateTime.required ? ew.Validators.required(fields.ViaStartDateTime.caption) : null, ew.Validators.datetime(0)], fields.ViaStartDateTime.isInvalid],
        ["ViaDose", [fields.ViaDose.visible && fields.ViaDose.required ? ew.Validators.required(fields.ViaDose.caption) : null], fields.ViaDose.isInvalid],
        ["AllFreeze", [fields.AllFreeze.visible && fields.AllFreeze.required ? ew.Validators.required(fields.AllFreeze.caption) : null], fields.AllFreeze.isInvalid],
        ["TreatmentCancel", [fields.TreatmentCancel.visible && fields.TreatmentCancel.required ? ew.Validators.required(fields.TreatmentCancel.caption) : null], fields.TreatmentCancel.isInvalid],
        ["Reason", [fields.Reason.visible && fields.Reason.required ? ew.Validators.required(fields.Reason.caption) : null], fields.Reason.isInvalid],
        ["ProgesteroneAdmin", [fields.ProgesteroneAdmin.visible && fields.ProgesteroneAdmin.required ? ew.Validators.required(fields.ProgesteroneAdmin.caption) : null], fields.ProgesteroneAdmin.isInvalid],
        ["ProgesteroneStart", [fields.ProgesteroneStart.visible && fields.ProgesteroneStart.required ? ew.Validators.required(fields.ProgesteroneStart.caption) : null], fields.ProgesteroneStart.isInvalid],
        ["ProgesteroneDose", [fields.ProgesteroneDose.visible && fields.ProgesteroneDose.required ? ew.Validators.required(fields.ProgesteroneDose.caption) : null], fields.ProgesteroneDose.isInvalid],
        ["Projectron", [fields.Projectron.visible && fields.Projectron.required ? ew.Validators.required(fields.Projectron.caption) : null], fields.Projectron.isInvalid],
        ["StChDate14", [fields.StChDate14.visible && fields.StChDate14.required ? ew.Validators.required(fields.StChDate14.caption) : null, ew.Validators.datetime(7)], fields.StChDate14.isInvalid],
        ["StChDate15", [fields.StChDate15.visible && fields.StChDate15.required ? ew.Validators.required(fields.StChDate15.caption) : null, ew.Validators.datetime(7)], fields.StChDate15.isInvalid],
        ["StChDate16", [fields.StChDate16.visible && fields.StChDate16.required ? ew.Validators.required(fields.StChDate16.caption) : null, ew.Validators.datetime(7)], fields.StChDate16.isInvalid],
        ["StChDate17", [fields.StChDate17.visible && fields.StChDate17.required ? ew.Validators.required(fields.StChDate17.caption) : null, ew.Validators.datetime(7)], fields.StChDate17.isInvalid],
        ["StChDate18", [fields.StChDate18.visible && fields.StChDate18.required ? ew.Validators.required(fields.StChDate18.caption) : null, ew.Validators.datetime(7)], fields.StChDate18.isInvalid],
        ["StChDate19", [fields.StChDate19.visible && fields.StChDate19.required ? ew.Validators.required(fields.StChDate19.caption) : null, ew.Validators.datetime(7)], fields.StChDate19.isInvalid],
        ["StChDate20", [fields.StChDate20.visible && fields.StChDate20.required ? ew.Validators.required(fields.StChDate20.caption) : null, ew.Validators.datetime(7)], fields.StChDate20.isInvalid],
        ["StChDate21", [fields.StChDate21.visible && fields.StChDate21.required ? ew.Validators.required(fields.StChDate21.caption) : null, ew.Validators.datetime(7)], fields.StChDate21.isInvalid],
        ["StChDate22", [fields.StChDate22.visible && fields.StChDate22.required ? ew.Validators.required(fields.StChDate22.caption) : null, ew.Validators.datetime(7)], fields.StChDate22.isInvalid],
        ["StChDate23", [fields.StChDate23.visible && fields.StChDate23.required ? ew.Validators.required(fields.StChDate23.caption) : null, ew.Validators.datetime(7)], fields.StChDate23.isInvalid],
        ["StChDate24", [fields.StChDate24.visible && fields.StChDate24.required ? ew.Validators.required(fields.StChDate24.caption) : null, ew.Validators.datetime(7)], fields.StChDate24.isInvalid],
        ["StChDate25", [fields.StChDate25.visible && fields.StChDate25.required ? ew.Validators.required(fields.StChDate25.caption) : null, ew.Validators.datetime(7)], fields.StChDate25.isInvalid],
        ["CycleDay14", [fields.CycleDay14.visible && fields.CycleDay14.required ? ew.Validators.required(fields.CycleDay14.caption) : null], fields.CycleDay14.isInvalid],
        ["CycleDay15", [fields.CycleDay15.visible && fields.CycleDay15.required ? ew.Validators.required(fields.CycleDay15.caption) : null], fields.CycleDay15.isInvalid],
        ["CycleDay16", [fields.CycleDay16.visible && fields.CycleDay16.required ? ew.Validators.required(fields.CycleDay16.caption) : null], fields.CycleDay16.isInvalid],
        ["CycleDay17", [fields.CycleDay17.visible && fields.CycleDay17.required ? ew.Validators.required(fields.CycleDay17.caption) : null], fields.CycleDay17.isInvalid],
        ["CycleDay18", [fields.CycleDay18.visible && fields.CycleDay18.required ? ew.Validators.required(fields.CycleDay18.caption) : null], fields.CycleDay18.isInvalid],
        ["CycleDay19", [fields.CycleDay19.visible && fields.CycleDay19.required ? ew.Validators.required(fields.CycleDay19.caption) : null], fields.CycleDay19.isInvalid],
        ["CycleDay20", [fields.CycleDay20.visible && fields.CycleDay20.required ? ew.Validators.required(fields.CycleDay20.caption) : null], fields.CycleDay20.isInvalid],
        ["CycleDay21", [fields.CycleDay21.visible && fields.CycleDay21.required ? ew.Validators.required(fields.CycleDay21.caption) : null], fields.CycleDay21.isInvalid],
        ["CycleDay22", [fields.CycleDay22.visible && fields.CycleDay22.required ? ew.Validators.required(fields.CycleDay22.caption) : null], fields.CycleDay22.isInvalid],
        ["CycleDay23", [fields.CycleDay23.visible && fields.CycleDay23.required ? ew.Validators.required(fields.CycleDay23.caption) : null], fields.CycleDay23.isInvalid],
        ["CycleDay24", [fields.CycleDay24.visible && fields.CycleDay24.required ? ew.Validators.required(fields.CycleDay24.caption) : null], fields.CycleDay24.isInvalid],
        ["CycleDay25", [fields.CycleDay25.visible && fields.CycleDay25.required ? ew.Validators.required(fields.CycleDay25.caption) : null], fields.CycleDay25.isInvalid],
        ["StimulationDay14", [fields.StimulationDay14.visible && fields.StimulationDay14.required ? ew.Validators.required(fields.StimulationDay14.caption) : null], fields.StimulationDay14.isInvalid],
        ["StimulationDay15", [fields.StimulationDay15.visible && fields.StimulationDay15.required ? ew.Validators.required(fields.StimulationDay15.caption) : null], fields.StimulationDay15.isInvalid],
        ["StimulationDay16", [fields.StimulationDay16.visible && fields.StimulationDay16.required ? ew.Validators.required(fields.StimulationDay16.caption) : null], fields.StimulationDay16.isInvalid],
        ["StimulationDay17", [fields.StimulationDay17.visible && fields.StimulationDay17.required ? ew.Validators.required(fields.StimulationDay17.caption) : null], fields.StimulationDay17.isInvalid],
        ["StimulationDay18", [fields.StimulationDay18.visible && fields.StimulationDay18.required ? ew.Validators.required(fields.StimulationDay18.caption) : null], fields.StimulationDay18.isInvalid],
        ["StimulationDay19", [fields.StimulationDay19.visible && fields.StimulationDay19.required ? ew.Validators.required(fields.StimulationDay19.caption) : null], fields.StimulationDay19.isInvalid],
        ["StimulationDay20", [fields.StimulationDay20.visible && fields.StimulationDay20.required ? ew.Validators.required(fields.StimulationDay20.caption) : null], fields.StimulationDay20.isInvalid],
        ["StimulationDay21", [fields.StimulationDay21.visible && fields.StimulationDay21.required ? ew.Validators.required(fields.StimulationDay21.caption) : null], fields.StimulationDay21.isInvalid],
        ["StimulationDay22", [fields.StimulationDay22.visible && fields.StimulationDay22.required ? ew.Validators.required(fields.StimulationDay22.caption) : null], fields.StimulationDay22.isInvalid],
        ["StimulationDay23", [fields.StimulationDay23.visible && fields.StimulationDay23.required ? ew.Validators.required(fields.StimulationDay23.caption) : null], fields.StimulationDay23.isInvalid],
        ["StimulationDay24", [fields.StimulationDay24.visible && fields.StimulationDay24.required ? ew.Validators.required(fields.StimulationDay24.caption) : null], fields.StimulationDay24.isInvalid],
        ["StimulationDay25", [fields.StimulationDay25.visible && fields.StimulationDay25.required ? ew.Validators.required(fields.StimulationDay25.caption) : null], fields.StimulationDay25.isInvalid],
        ["Tablet14", [fields.Tablet14.visible && fields.Tablet14.required ? ew.Validators.required(fields.Tablet14.caption) : null], fields.Tablet14.isInvalid],
        ["Tablet15", [fields.Tablet15.visible && fields.Tablet15.required ? ew.Validators.required(fields.Tablet15.caption) : null], fields.Tablet15.isInvalid],
        ["Tablet16", [fields.Tablet16.visible && fields.Tablet16.required ? ew.Validators.required(fields.Tablet16.caption) : null], fields.Tablet16.isInvalid],
        ["Tablet17", [fields.Tablet17.visible && fields.Tablet17.required ? ew.Validators.required(fields.Tablet17.caption) : null], fields.Tablet17.isInvalid],
        ["Tablet18", [fields.Tablet18.visible && fields.Tablet18.required ? ew.Validators.required(fields.Tablet18.caption) : null], fields.Tablet18.isInvalid],
        ["Tablet19", [fields.Tablet19.visible && fields.Tablet19.required ? ew.Validators.required(fields.Tablet19.caption) : null], fields.Tablet19.isInvalid],
        ["Tablet20", [fields.Tablet20.visible && fields.Tablet20.required ? ew.Validators.required(fields.Tablet20.caption) : null], fields.Tablet20.isInvalid],
        ["Tablet21", [fields.Tablet21.visible && fields.Tablet21.required ? ew.Validators.required(fields.Tablet21.caption) : null], fields.Tablet21.isInvalid],
        ["Tablet22", [fields.Tablet22.visible && fields.Tablet22.required ? ew.Validators.required(fields.Tablet22.caption) : null], fields.Tablet22.isInvalid],
        ["Tablet23", [fields.Tablet23.visible && fields.Tablet23.required ? ew.Validators.required(fields.Tablet23.caption) : null], fields.Tablet23.isInvalid],
        ["Tablet24", [fields.Tablet24.visible && fields.Tablet24.required ? ew.Validators.required(fields.Tablet24.caption) : null], fields.Tablet24.isInvalid],
        ["Tablet25", [fields.Tablet25.visible && fields.Tablet25.required ? ew.Validators.required(fields.Tablet25.caption) : null], fields.Tablet25.isInvalid],
        ["RFSH14", [fields.RFSH14.visible && fields.RFSH14.required ? ew.Validators.required(fields.RFSH14.caption) : null], fields.RFSH14.isInvalid],
        ["RFSH15", [fields.RFSH15.visible && fields.RFSH15.required ? ew.Validators.required(fields.RFSH15.caption) : null], fields.RFSH15.isInvalid],
        ["RFSH16", [fields.RFSH16.visible && fields.RFSH16.required ? ew.Validators.required(fields.RFSH16.caption) : null], fields.RFSH16.isInvalid],
        ["RFSH17", [fields.RFSH17.visible && fields.RFSH17.required ? ew.Validators.required(fields.RFSH17.caption) : null], fields.RFSH17.isInvalid],
        ["RFSH18", [fields.RFSH18.visible && fields.RFSH18.required ? ew.Validators.required(fields.RFSH18.caption) : null], fields.RFSH18.isInvalid],
        ["RFSH19", [fields.RFSH19.visible && fields.RFSH19.required ? ew.Validators.required(fields.RFSH19.caption) : null], fields.RFSH19.isInvalid],
        ["RFSH20", [fields.RFSH20.visible && fields.RFSH20.required ? ew.Validators.required(fields.RFSH20.caption) : null], fields.RFSH20.isInvalid],
        ["RFSH21", [fields.RFSH21.visible && fields.RFSH21.required ? ew.Validators.required(fields.RFSH21.caption) : null], fields.RFSH21.isInvalid],
        ["RFSH22", [fields.RFSH22.visible && fields.RFSH22.required ? ew.Validators.required(fields.RFSH22.caption) : null], fields.RFSH22.isInvalid],
        ["RFSH23", [fields.RFSH23.visible && fields.RFSH23.required ? ew.Validators.required(fields.RFSH23.caption) : null], fields.RFSH23.isInvalid],
        ["RFSH24", [fields.RFSH24.visible && fields.RFSH24.required ? ew.Validators.required(fields.RFSH24.caption) : null], fields.RFSH24.isInvalid],
        ["RFSH25", [fields.RFSH25.visible && fields.RFSH25.required ? ew.Validators.required(fields.RFSH25.caption) : null], fields.RFSH25.isInvalid],
        ["HMG14", [fields.HMG14.visible && fields.HMG14.required ? ew.Validators.required(fields.HMG14.caption) : null], fields.HMG14.isInvalid],
        ["HMG15", [fields.HMG15.visible && fields.HMG15.required ? ew.Validators.required(fields.HMG15.caption) : null], fields.HMG15.isInvalid],
        ["HMG16", [fields.HMG16.visible && fields.HMG16.required ? ew.Validators.required(fields.HMG16.caption) : null], fields.HMG16.isInvalid],
        ["HMG17", [fields.HMG17.visible && fields.HMG17.required ? ew.Validators.required(fields.HMG17.caption) : null], fields.HMG17.isInvalid],
        ["HMG18", [fields.HMG18.visible && fields.HMG18.required ? ew.Validators.required(fields.HMG18.caption) : null], fields.HMG18.isInvalid],
        ["HMG19", [fields.HMG19.visible && fields.HMG19.required ? ew.Validators.required(fields.HMG19.caption) : null], fields.HMG19.isInvalid],
        ["HMG20", [fields.HMG20.visible && fields.HMG20.required ? ew.Validators.required(fields.HMG20.caption) : null], fields.HMG20.isInvalid],
        ["HMG21", [fields.HMG21.visible && fields.HMG21.required ? ew.Validators.required(fields.HMG21.caption) : null], fields.HMG21.isInvalid],
        ["HMG22", [fields.HMG22.visible && fields.HMG22.required ? ew.Validators.required(fields.HMG22.caption) : null], fields.HMG22.isInvalid],
        ["HMG23", [fields.HMG23.visible && fields.HMG23.required ? ew.Validators.required(fields.HMG23.caption) : null], fields.HMG23.isInvalid],
        ["HMG24", [fields.HMG24.visible && fields.HMG24.required ? ew.Validators.required(fields.HMG24.caption) : null], fields.HMG24.isInvalid],
        ["HMG25", [fields.HMG25.visible && fields.HMG25.required ? ew.Validators.required(fields.HMG25.caption) : null], fields.HMG25.isInvalid],
        ["GnRH14", [fields.GnRH14.visible && fields.GnRH14.required ? ew.Validators.required(fields.GnRH14.caption) : null], fields.GnRH14.isInvalid],
        ["GnRH15", [fields.GnRH15.visible && fields.GnRH15.required ? ew.Validators.required(fields.GnRH15.caption) : null], fields.GnRH15.isInvalid],
        ["GnRH16", [fields.GnRH16.visible && fields.GnRH16.required ? ew.Validators.required(fields.GnRH16.caption) : null], fields.GnRH16.isInvalid],
        ["GnRH17", [fields.GnRH17.visible && fields.GnRH17.required ? ew.Validators.required(fields.GnRH17.caption) : null], fields.GnRH17.isInvalid],
        ["GnRH18", [fields.GnRH18.visible && fields.GnRH18.required ? ew.Validators.required(fields.GnRH18.caption) : null], fields.GnRH18.isInvalid],
        ["GnRH19", [fields.GnRH19.visible && fields.GnRH19.required ? ew.Validators.required(fields.GnRH19.caption) : null], fields.GnRH19.isInvalid],
        ["GnRH20", [fields.GnRH20.visible && fields.GnRH20.required ? ew.Validators.required(fields.GnRH20.caption) : null], fields.GnRH20.isInvalid],
        ["GnRH21", [fields.GnRH21.visible && fields.GnRH21.required ? ew.Validators.required(fields.GnRH21.caption) : null], fields.GnRH21.isInvalid],
        ["GnRH22", [fields.GnRH22.visible && fields.GnRH22.required ? ew.Validators.required(fields.GnRH22.caption) : null], fields.GnRH22.isInvalid],
        ["GnRH23", [fields.GnRH23.visible && fields.GnRH23.required ? ew.Validators.required(fields.GnRH23.caption) : null], fields.GnRH23.isInvalid],
        ["GnRH24", [fields.GnRH24.visible && fields.GnRH24.required ? ew.Validators.required(fields.GnRH24.caption) : null], fields.GnRH24.isInvalid],
        ["GnRH25", [fields.GnRH25.visible && fields.GnRH25.required ? ew.Validators.required(fields.GnRH25.caption) : null], fields.GnRH25.isInvalid],
        ["P414", [fields.P414.visible && fields.P414.required ? ew.Validators.required(fields.P414.caption) : null], fields.P414.isInvalid],
        ["P415", [fields.P415.visible && fields.P415.required ? ew.Validators.required(fields.P415.caption) : null], fields.P415.isInvalid],
        ["P416", [fields.P416.visible && fields.P416.required ? ew.Validators.required(fields.P416.caption) : null], fields.P416.isInvalid],
        ["P417", [fields.P417.visible && fields.P417.required ? ew.Validators.required(fields.P417.caption) : null], fields.P417.isInvalid],
        ["P418", [fields.P418.visible && fields.P418.required ? ew.Validators.required(fields.P418.caption) : null], fields.P418.isInvalid],
        ["P419", [fields.P419.visible && fields.P419.required ? ew.Validators.required(fields.P419.caption) : null], fields.P419.isInvalid],
        ["P420", [fields.P420.visible && fields.P420.required ? ew.Validators.required(fields.P420.caption) : null], fields.P420.isInvalid],
        ["P421", [fields.P421.visible && fields.P421.required ? ew.Validators.required(fields.P421.caption) : null], fields.P421.isInvalid],
        ["P422", [fields.P422.visible && fields.P422.required ? ew.Validators.required(fields.P422.caption) : null], fields.P422.isInvalid],
        ["P423", [fields.P423.visible && fields.P423.required ? ew.Validators.required(fields.P423.caption) : null], fields.P423.isInvalid],
        ["P424", [fields.P424.visible && fields.P424.required ? ew.Validators.required(fields.P424.caption) : null], fields.P424.isInvalid],
        ["P425", [fields.P425.visible && fields.P425.required ? ew.Validators.required(fields.P425.caption) : null], fields.P425.isInvalid],
        ["USGRt14", [fields.USGRt14.visible && fields.USGRt14.required ? ew.Validators.required(fields.USGRt14.caption) : null], fields.USGRt14.isInvalid],
        ["USGRt15", [fields.USGRt15.visible && fields.USGRt15.required ? ew.Validators.required(fields.USGRt15.caption) : null], fields.USGRt15.isInvalid],
        ["USGRt16", [fields.USGRt16.visible && fields.USGRt16.required ? ew.Validators.required(fields.USGRt16.caption) : null], fields.USGRt16.isInvalid],
        ["USGRt17", [fields.USGRt17.visible && fields.USGRt17.required ? ew.Validators.required(fields.USGRt17.caption) : null], fields.USGRt17.isInvalid],
        ["USGRt18", [fields.USGRt18.visible && fields.USGRt18.required ? ew.Validators.required(fields.USGRt18.caption) : null], fields.USGRt18.isInvalid],
        ["USGRt19", [fields.USGRt19.visible && fields.USGRt19.required ? ew.Validators.required(fields.USGRt19.caption) : null], fields.USGRt19.isInvalid],
        ["USGRt20", [fields.USGRt20.visible && fields.USGRt20.required ? ew.Validators.required(fields.USGRt20.caption) : null], fields.USGRt20.isInvalid],
        ["USGRt21", [fields.USGRt21.visible && fields.USGRt21.required ? ew.Validators.required(fields.USGRt21.caption) : null], fields.USGRt21.isInvalid],
        ["USGRt22", [fields.USGRt22.visible && fields.USGRt22.required ? ew.Validators.required(fields.USGRt22.caption) : null], fields.USGRt22.isInvalid],
        ["USGRt23", [fields.USGRt23.visible && fields.USGRt23.required ? ew.Validators.required(fields.USGRt23.caption) : null], fields.USGRt23.isInvalid],
        ["USGRt24", [fields.USGRt24.visible && fields.USGRt24.required ? ew.Validators.required(fields.USGRt24.caption) : null], fields.USGRt24.isInvalid],
        ["USGRt25", [fields.USGRt25.visible && fields.USGRt25.required ? ew.Validators.required(fields.USGRt25.caption) : null], fields.USGRt25.isInvalid],
        ["USGLt14", [fields.USGLt14.visible && fields.USGLt14.required ? ew.Validators.required(fields.USGLt14.caption) : null], fields.USGLt14.isInvalid],
        ["USGLt15", [fields.USGLt15.visible && fields.USGLt15.required ? ew.Validators.required(fields.USGLt15.caption) : null], fields.USGLt15.isInvalid],
        ["USGLt16", [fields.USGLt16.visible && fields.USGLt16.required ? ew.Validators.required(fields.USGLt16.caption) : null], fields.USGLt16.isInvalid],
        ["USGLt17", [fields.USGLt17.visible && fields.USGLt17.required ? ew.Validators.required(fields.USGLt17.caption) : null], fields.USGLt17.isInvalid],
        ["USGLt18", [fields.USGLt18.visible && fields.USGLt18.required ? ew.Validators.required(fields.USGLt18.caption) : null], fields.USGLt18.isInvalid],
        ["USGLt19", [fields.USGLt19.visible && fields.USGLt19.required ? ew.Validators.required(fields.USGLt19.caption) : null], fields.USGLt19.isInvalid],
        ["USGLt20", [fields.USGLt20.visible && fields.USGLt20.required ? ew.Validators.required(fields.USGLt20.caption) : null], fields.USGLt20.isInvalid],
        ["USGLt21", [fields.USGLt21.visible && fields.USGLt21.required ? ew.Validators.required(fields.USGLt21.caption) : null], fields.USGLt21.isInvalid],
        ["USGLt22", [fields.USGLt22.visible && fields.USGLt22.required ? ew.Validators.required(fields.USGLt22.caption) : null], fields.USGLt22.isInvalid],
        ["USGLt23", [fields.USGLt23.visible && fields.USGLt23.required ? ew.Validators.required(fields.USGLt23.caption) : null], fields.USGLt23.isInvalid],
        ["USGLt24", [fields.USGLt24.visible && fields.USGLt24.required ? ew.Validators.required(fields.USGLt24.caption) : null], fields.USGLt24.isInvalid],
        ["USGLt25", [fields.USGLt25.visible && fields.USGLt25.required ? ew.Validators.required(fields.USGLt25.caption) : null], fields.USGLt25.isInvalid],
        ["EM14", [fields.EM14.visible && fields.EM14.required ? ew.Validators.required(fields.EM14.caption) : null], fields.EM14.isInvalid],
        ["EM15", [fields.EM15.visible && fields.EM15.required ? ew.Validators.required(fields.EM15.caption) : null], fields.EM15.isInvalid],
        ["EM16", [fields.EM16.visible && fields.EM16.required ? ew.Validators.required(fields.EM16.caption) : null], fields.EM16.isInvalid],
        ["EM17", [fields.EM17.visible && fields.EM17.required ? ew.Validators.required(fields.EM17.caption) : null], fields.EM17.isInvalid],
        ["EM18", [fields.EM18.visible && fields.EM18.required ? ew.Validators.required(fields.EM18.caption) : null], fields.EM18.isInvalid],
        ["EM19", [fields.EM19.visible && fields.EM19.required ? ew.Validators.required(fields.EM19.caption) : null], fields.EM19.isInvalid],
        ["EM20", [fields.EM20.visible && fields.EM20.required ? ew.Validators.required(fields.EM20.caption) : null], fields.EM20.isInvalid],
        ["EM21", [fields.EM21.visible && fields.EM21.required ? ew.Validators.required(fields.EM21.caption) : null], fields.EM21.isInvalid],
        ["EM22", [fields.EM22.visible && fields.EM22.required ? ew.Validators.required(fields.EM22.caption) : null], fields.EM22.isInvalid],
        ["EM23", [fields.EM23.visible && fields.EM23.required ? ew.Validators.required(fields.EM23.caption) : null], fields.EM23.isInvalid],
        ["EM24", [fields.EM24.visible && fields.EM24.required ? ew.Validators.required(fields.EM24.caption) : null], fields.EM24.isInvalid],
        ["EM25", [fields.EM25.visible && fields.EM25.required ? ew.Validators.required(fields.EM25.caption) : null], fields.EM25.isInvalid],
        ["Others14", [fields.Others14.visible && fields.Others14.required ? ew.Validators.required(fields.Others14.caption) : null], fields.Others14.isInvalid],
        ["Others15", [fields.Others15.visible && fields.Others15.required ? ew.Validators.required(fields.Others15.caption) : null], fields.Others15.isInvalid],
        ["Others16", [fields.Others16.visible && fields.Others16.required ? ew.Validators.required(fields.Others16.caption) : null], fields.Others16.isInvalid],
        ["Others17", [fields.Others17.visible && fields.Others17.required ? ew.Validators.required(fields.Others17.caption) : null], fields.Others17.isInvalid],
        ["Others18", [fields.Others18.visible && fields.Others18.required ? ew.Validators.required(fields.Others18.caption) : null], fields.Others18.isInvalid],
        ["Others19", [fields.Others19.visible && fields.Others19.required ? ew.Validators.required(fields.Others19.caption) : null], fields.Others19.isInvalid],
        ["Others20", [fields.Others20.visible && fields.Others20.required ? ew.Validators.required(fields.Others20.caption) : null], fields.Others20.isInvalid],
        ["Others21", [fields.Others21.visible && fields.Others21.required ? ew.Validators.required(fields.Others21.caption) : null], fields.Others21.isInvalid],
        ["Others22", [fields.Others22.visible && fields.Others22.required ? ew.Validators.required(fields.Others22.caption) : null], fields.Others22.isInvalid],
        ["Others23", [fields.Others23.visible && fields.Others23.required ? ew.Validators.required(fields.Others23.caption) : null], fields.Others23.isInvalid],
        ["Others24", [fields.Others24.visible && fields.Others24.required ? ew.Validators.required(fields.Others24.caption) : null], fields.Others24.isInvalid],
        ["Others25", [fields.Others25.visible && fields.Others25.required ? ew.Validators.required(fields.Others25.caption) : null], fields.Others25.isInvalid],
        ["DR14", [fields.DR14.visible && fields.DR14.required ? ew.Validators.required(fields.DR14.caption) : null], fields.DR14.isInvalid],
        ["DR15", [fields.DR15.visible && fields.DR15.required ? ew.Validators.required(fields.DR15.caption) : null], fields.DR15.isInvalid],
        ["DR16", [fields.DR16.visible && fields.DR16.required ? ew.Validators.required(fields.DR16.caption) : null], fields.DR16.isInvalid],
        ["DR17", [fields.DR17.visible && fields.DR17.required ? ew.Validators.required(fields.DR17.caption) : null], fields.DR17.isInvalid],
        ["DR18", [fields.DR18.visible && fields.DR18.required ? ew.Validators.required(fields.DR18.caption) : null], fields.DR18.isInvalid],
        ["DR19", [fields.DR19.visible && fields.DR19.required ? ew.Validators.required(fields.DR19.caption) : null], fields.DR19.isInvalid],
        ["DR20", [fields.DR20.visible && fields.DR20.required ? ew.Validators.required(fields.DR20.caption) : null], fields.DR20.isInvalid],
        ["DR21", [fields.DR21.visible && fields.DR21.required ? ew.Validators.required(fields.DR21.caption) : null], fields.DR21.isInvalid],
        ["DR22", [fields.DR22.visible && fields.DR22.required ? ew.Validators.required(fields.DR22.caption) : null], fields.DR22.isInvalid],
        ["DR23", [fields.DR23.visible && fields.DR23.required ? ew.Validators.required(fields.DR23.caption) : null], fields.DR23.isInvalid],
        ["DR24", [fields.DR24.visible && fields.DR24.required ? ew.Validators.required(fields.DR24.caption) : null], fields.DR24.isInvalid],
        ["DR25", [fields.DR25.visible && fields.DR25.required ? ew.Validators.required(fields.DR25.caption) : null], fields.DR25.isInvalid],
        ["E214", [fields.E214.visible && fields.E214.required ? ew.Validators.required(fields.E214.caption) : null], fields.E214.isInvalid],
        ["E215", [fields.E215.visible && fields.E215.required ? ew.Validators.required(fields.E215.caption) : null], fields.E215.isInvalid],
        ["E216", [fields.E216.visible && fields.E216.required ? ew.Validators.required(fields.E216.caption) : null], fields.E216.isInvalid],
        ["E217", [fields.E217.visible && fields.E217.required ? ew.Validators.required(fields.E217.caption) : null], fields.E217.isInvalid],
        ["E218", [fields.E218.visible && fields.E218.required ? ew.Validators.required(fields.E218.caption) : null], fields.E218.isInvalid],
        ["E219", [fields.E219.visible && fields.E219.required ? ew.Validators.required(fields.E219.caption) : null], fields.E219.isInvalid],
        ["E220", [fields.E220.visible && fields.E220.required ? ew.Validators.required(fields.E220.caption) : null], fields.E220.isInvalid],
        ["E221", [fields.E221.visible && fields.E221.required ? ew.Validators.required(fields.E221.caption) : null], fields.E221.isInvalid],
        ["E222", [fields.E222.visible && fields.E222.required ? ew.Validators.required(fields.E222.caption) : null], fields.E222.isInvalid],
        ["E223", [fields.E223.visible && fields.E223.required ? ew.Validators.required(fields.E223.caption) : null], fields.E223.isInvalid],
        ["E224", [fields.E224.visible && fields.E224.required ? ew.Validators.required(fields.E224.caption) : null], fields.E224.isInvalid],
        ["E225", [fields.E225.visible && fields.E225.required ? ew.Validators.required(fields.E225.caption) : null], fields.E225.isInvalid],
        ["EEETTTDTE", [fields.EEETTTDTE.visible && fields.EEETTTDTE.required ? ew.Validators.required(fields.EEETTTDTE.caption) : null, ew.Validators.datetime(7)], fields.EEETTTDTE.isInvalid],
        ["bhcgdate", [fields.bhcgdate.visible && fields.bhcgdate.required ? ew.Validators.required(fields.bhcgdate.caption) : null, ew.Validators.datetime(7)], fields.bhcgdate.isInvalid],
        ["TUBAL_PATENCY", [fields.TUBAL_PATENCY.visible && fields.TUBAL_PATENCY.required ? ew.Validators.required(fields.TUBAL_PATENCY.caption) : null], fields.TUBAL_PATENCY.isInvalid],
        ["HSG", [fields.HSG.visible && fields.HSG.required ? ew.Validators.required(fields.HSG.caption) : null], fields.HSG.isInvalid],
        ["DHL", [fields.DHL.visible && fields.DHL.required ? ew.Validators.required(fields.DHL.caption) : null], fields.DHL.isInvalid],
        ["UTERINE_PROBLEMS", [fields.UTERINE_PROBLEMS.visible && fields.UTERINE_PROBLEMS.required ? ew.Validators.required(fields.UTERINE_PROBLEMS.caption) : null], fields.UTERINE_PROBLEMS.isInvalid],
        ["W_COMORBIDS", [fields.W_COMORBIDS.visible && fields.W_COMORBIDS.required ? ew.Validators.required(fields.W_COMORBIDS.caption) : null], fields.W_COMORBIDS.isInvalid],
        ["H_COMORBIDS", [fields.H_COMORBIDS.visible && fields.H_COMORBIDS.required ? ew.Validators.required(fields.H_COMORBIDS.caption) : null], fields.H_COMORBIDS.isInvalid],
        ["SEXUAL_DYSFUNCTION", [fields.SEXUAL_DYSFUNCTION.visible && fields.SEXUAL_DYSFUNCTION.required ? ew.Validators.required(fields.SEXUAL_DYSFUNCTION.caption) : null], fields.SEXUAL_DYSFUNCTION.isInvalid],
        ["TABLETS", [fields.TABLETS.visible && fields.TABLETS.required ? ew.Validators.required(fields.TABLETS.caption) : null], fields.TABLETS.isInvalid],
        ["FOLLICLE_STATUS", [fields.FOLLICLE_STATUS.visible && fields.FOLLICLE_STATUS.required ? ew.Validators.required(fields.FOLLICLE_STATUS.caption) : null], fields.FOLLICLE_STATUS.isInvalid],
        ["NUMBER_OF_IUI", [fields.NUMBER_OF_IUI.visible && fields.NUMBER_OF_IUI.required ? ew.Validators.required(fields.NUMBER_OF_IUI.caption) : null], fields.NUMBER_OF_IUI.isInvalid],
        ["PROCEDURE", [fields.PROCEDURE.visible && fields.PROCEDURE.required ? ew.Validators.required(fields.PROCEDURE.caption) : null], fields.PROCEDURE.isInvalid],
        ["LUTEAL_SUPPORT", [fields.LUTEAL_SUPPORT.visible && fields.LUTEAL_SUPPORT.required ? ew.Validators.required(fields.LUTEAL_SUPPORT.caption) : null], fields.LUTEAL_SUPPORT.isInvalid],
        ["SPECIFIC_MATERNAL_PROBLEMS", [fields.SPECIFIC_MATERNAL_PROBLEMS.visible && fields.SPECIFIC_MATERNAL_PROBLEMS.required ? ew.Validators.required(fields.SPECIFIC_MATERNAL_PROBLEMS.caption) : null], fields.SPECIFIC_MATERNAL_PROBLEMS.isInvalid],
        ["ONGOING_PREG", [fields.ONGOING_PREG.visible && fields.ONGOING_PREG.required ? ew.Validators.required(fields.ONGOING_PREG.caption) : null], fields.ONGOING_PREG.isInvalid],
        ["EDD_Date", [fields.EDD_Date.visible && fields.EDD_Date.required ? ew.Validators.required(fields.EDD_Date.caption) : null, ew.Validators.datetime(0)], fields.EDD_Date.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_stimulation_chartedit,
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
    fivf_stimulation_chartedit.validate = function () {
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
    fivf_stimulation_chartedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_stimulation_chartedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_stimulation_chartedit.lists.ARTCycle = <?= $Page->ARTCycle->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.FemaleFactor = <?= $Page->FemaleFactor->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.MaleFactor = <?= $Page->MaleFactor->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Protocol = <?= $Page->Protocol->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.SemenFrozen = <?= $Page->SemenFrozen->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.A4ICSICycle = <?= $Page->A4ICSICycle->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.TotalICSICycle = <?= $Page->TotalICSICycle->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.TypeOfInfertility = <?= $Page->TypeOfInfertility->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.INJTYPE = <?= $Page->INJTYPE->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.ANTAGONISTSTARTDAY = <?= $Page->ANTAGONISTSTARTDAY->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.PRETREATMENT = <?= $Page->PRETREATMENT->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.MedicalFactors = <?= $Page->MedicalFactors->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.TRIGGERR = <?= $Page->TRIGGERR->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.ATHOMEorCLINIC = <?= $Page->ATHOMEorCLINIC->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.ALLFREEZEINDICATION = <?= $Page->ALLFREEZEINDICATION->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.ERA = <?= $Page->ERA->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.ET = <?= $Page->ET->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.SEMENPREPARATION = <?= $Page->SEMENPREPARATION->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.REASONFORESET = <?= $Page->REASONFORESET->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet1 = <?= $Page->Tablet1->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet2 = <?= $Page->Tablet2->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet3 = <?= $Page->Tablet3->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet4 = <?= $Page->Tablet4->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet5 = <?= $Page->Tablet5->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet6 = <?= $Page->Tablet6->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet7 = <?= $Page->Tablet7->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet8 = <?= $Page->Tablet8->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet9 = <?= $Page->Tablet9->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet10 = <?= $Page->Tablet10->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet11 = <?= $Page->Tablet11->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet12 = <?= $Page->Tablet12->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet13 = <?= $Page->Tablet13->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH1 = <?= $Page->RFSH1->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH2 = <?= $Page->RFSH2->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH3 = <?= $Page->RFSH3->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH4 = <?= $Page->RFSH4->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH5 = <?= $Page->RFSH5->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH6 = <?= $Page->RFSH6->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH7 = <?= $Page->RFSH7->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH8 = <?= $Page->RFSH8->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH9 = <?= $Page->RFSH9->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH10 = <?= $Page->RFSH10->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH11 = <?= $Page->RFSH11->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH12 = <?= $Page->RFSH12->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH13 = <?= $Page->RFSH13->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG1 = <?= $Page->HMG1->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG2 = <?= $Page->HMG2->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG3 = <?= $Page->HMG3->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG4 = <?= $Page->HMG4->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG5 = <?= $Page->HMG5->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG6 = <?= $Page->HMG6->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG7 = <?= $Page->HMG7->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG8 = <?= $Page->HMG8->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG9 = <?= $Page->HMG9->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG10 = <?= $Page->HMG10->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG11 = <?= $Page->HMG11->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG12 = <?= $Page->HMG12->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG13 = <?= $Page->HMG13->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH1 = <?= $Page->GnRH1->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH2 = <?= $Page->GnRH2->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH3 = <?= $Page->GnRH3->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH4 = <?= $Page->GnRH4->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH5 = <?= $Page->GnRH5->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH6 = <?= $Page->GnRH6->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH7 = <?= $Page->GnRH7->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH8 = <?= $Page->GnRH8->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH9 = <?= $Page->GnRH9->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH10 = <?= $Page->GnRH10->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH11 = <?= $Page->GnRH11->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH12 = <?= $Page->GnRH12->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH13 = <?= $Page->GnRH13->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Convert = <?= $Page->Convert->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.InseminatinTechnique = <?= $Page->InseminatinTechnique->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.IndicationForART = <?= $Page->IndicationForART->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Hysteroscopy = <?= $Page->Hysteroscopy->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.EndometrialScratching = <?= $Page->EndometrialScratching->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.TrialCannulation = <?= $Page->TrialCannulation->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.CYCLETYPE = <?= $Page->CYCLETYPE->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.OralEstrogenDosage = <?= $Page->OralEstrogenDosage->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GCSF = <?= $Page->GCSF->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.ActivatedPRP = <?= $Page->ActivatedPRP->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.AllFreeze = <?= $Page->AllFreeze->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.TreatmentCancel = <?= $Page->TreatmentCancel->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Projectron = <?= $Page->Projectron->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet14 = <?= $Page->Tablet14->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet15 = <?= $Page->Tablet15->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet16 = <?= $Page->Tablet16->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet17 = <?= $Page->Tablet17->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet18 = <?= $Page->Tablet18->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet19 = <?= $Page->Tablet19->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet20 = <?= $Page->Tablet20->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet21 = <?= $Page->Tablet21->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet22 = <?= $Page->Tablet22->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet23 = <?= $Page->Tablet23->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet24 = <?= $Page->Tablet24->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.Tablet25 = <?= $Page->Tablet25->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH14 = <?= $Page->RFSH14->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH15 = <?= $Page->RFSH15->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH16 = <?= $Page->RFSH16->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH17 = <?= $Page->RFSH17->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH18 = <?= $Page->RFSH18->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH19 = <?= $Page->RFSH19->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH20 = <?= $Page->RFSH20->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH21 = <?= $Page->RFSH21->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH22 = <?= $Page->RFSH22->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH23 = <?= $Page->RFSH23->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH24 = <?= $Page->RFSH24->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.RFSH25 = <?= $Page->RFSH25->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG14 = <?= $Page->HMG14->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG15 = <?= $Page->HMG15->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG16 = <?= $Page->HMG16->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG17 = <?= $Page->HMG17->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG18 = <?= $Page->HMG18->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG19 = <?= $Page->HMG19->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG20 = <?= $Page->HMG20->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG21 = <?= $Page->HMG21->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG22 = <?= $Page->HMG22->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG23 = <?= $Page->HMG23->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG24 = <?= $Page->HMG24->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HMG25 = <?= $Page->HMG25->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH14 = <?= $Page->GnRH14->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH15 = <?= $Page->GnRH15->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH16 = <?= $Page->GnRH16->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH17 = <?= $Page->GnRH17->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH18 = <?= $Page->GnRH18->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH19 = <?= $Page->GnRH19->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH20 = <?= $Page->GnRH20->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH21 = <?= $Page->GnRH21->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH22 = <?= $Page->GnRH22->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH23 = <?= $Page->GnRH23->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH24 = <?= $Page->GnRH24->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.GnRH25 = <?= $Page->GnRH25->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.TUBAL_PATENCY = <?= $Page->TUBAL_PATENCY->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.HSG = <?= $Page->HSG->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.DHL = <?= $Page->DHL->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.UTERINE_PROBLEMS = <?= $Page->UTERINE_PROBLEMS->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.W_COMORBIDS = <?= $Page->W_COMORBIDS->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.H_COMORBIDS = <?= $Page->H_COMORBIDS->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.SEXUAL_DYSFUNCTION = <?= $Page->SEXUAL_DYSFUNCTION->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.FOLLICLE_STATUS = <?= $Page->FOLLICLE_STATUS->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.NUMBER_OF_IUI = <?= $Page->NUMBER_OF_IUI->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.PROCEDURE = <?= $Page->PROCEDURE->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.LUTEAL_SUPPORT = <?= $Page->LUTEAL_SUPPORT->toClientList($Page) ?>;
    fivf_stimulation_chartedit.lists.SPECIFIC_MATERNAL_PROBLEMS = <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->toClientList($Page) ?>;
    loadjs.done("fivf_stimulation_chartedit");
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
<form name="fivf_stimulation_chartedit" id="fivf_stimulation_chartedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?= HtmlEncode($Page->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?= HtmlEncode($Page->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->TidNo->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_stimulation_chart_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_id"><span id="el_ivf_stimulation_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="ivf_stimulation_chart" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RIDNo"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<?php if ($Page->RIDNo->getSessionValue() != "") { ?>
<template id="tpx_ivf_stimulation_chart_RIDNo"><span id="el_ivf_stimulation_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNo->getDisplayValue($Page->RIDNo->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_RIDNo" name="x_RIDNo" value="<?= HtmlEncode($Page->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_ivf_stimulation_chart_RIDNo"><span id="el_ivf_stimulation_chart_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<?php if ($Page->Name->getSessionValue() != "") { ?>
<template id="tpx_ivf_stimulation_chart_Name"><span id="el_ivf_stimulation_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Name->getDisplayValue($Page->Name->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_Name" name="x_Name" value="<?= HtmlEncode($Page->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_ivf_stimulation_chart_Name"><span id="el_ivf_stimulation_chart_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <div id="r_ARTCycle" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ARTCycle" for="x_ARTCycle" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?><?= $Page->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCycle->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ARTCycle"><span id="el_ivf_stimulation_chart_ARTCycle">
    <select
        id="x_ARTCycle"
        name="x_ARTCycle"
        class="form-control ew-select<?= $Page->ARTCycle->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_ARTCycle"
        data-table="ivf_stimulation_chart"
        data-field="x_ARTCycle"
        data-value-separator="<?= $Page->ARTCycle->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>"
        <?= $Page->ARTCycle->editAttributes() ?>>
        <?= $Page->ARTCycle->selectOptionListHtml("x_ARTCycle") ?>
    </select>
    <?= $Page->ARTCycle->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_ARTCycle']"),
        options = { name: "x_ARTCycle", selectId: "ivf_stimulation_chart_x_ARTCycle", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.ARTCycle.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.ARTCycle.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FemaleFactor->Visible) { // FemaleFactor ?>
    <div id="r_FemaleFactor" class="form-group row">
        <label id="elh_ivf_stimulation_chart_FemaleFactor" for="x_FemaleFactor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_FemaleFactor"><?= $Page->FemaleFactor->caption() ?><?= $Page->FemaleFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FemaleFactor->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_FemaleFactor"><span id="el_ivf_stimulation_chart_FemaleFactor">
    <select
        id="x_FemaleFactor"
        name="x_FemaleFactor"
        class="form-control ew-select<?= $Page->FemaleFactor->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_FemaleFactor"
        data-table="ivf_stimulation_chart"
        data-field="x_FemaleFactor"
        data-value-separator="<?= $Page->FemaleFactor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->FemaleFactor->getPlaceHolder()) ?>"
        <?= $Page->FemaleFactor->editAttributes() ?>>
        <?= $Page->FemaleFactor->selectOptionListHtml("x_FemaleFactor") ?>
    </select>
    <?= $Page->FemaleFactor->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->FemaleFactor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_FemaleFactor']"),
        options = { name: "x_FemaleFactor", selectId: "ivf_stimulation_chart_x_FemaleFactor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.FemaleFactor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.FemaleFactor.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaleFactor->Visible) { // MaleFactor ?>
    <div id="r_MaleFactor" class="form-group row">
        <label id="elh_ivf_stimulation_chart_MaleFactor" for="x_MaleFactor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_MaleFactor"><?= $Page->MaleFactor->caption() ?><?= $Page->MaleFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaleFactor->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_MaleFactor"><span id="el_ivf_stimulation_chart_MaleFactor">
    <select
        id="x_MaleFactor"
        name="x_MaleFactor"
        class="form-control ew-select<?= $Page->MaleFactor->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_MaleFactor"
        data-table="ivf_stimulation_chart"
        data-field="x_MaleFactor"
        data-value-separator="<?= $Page->MaleFactor->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->MaleFactor->getPlaceHolder()) ?>"
        <?= $Page->MaleFactor->editAttributes() ?>>
        <?= $Page->MaleFactor->selectOptionListHtml("x_MaleFactor") ?>
    </select>
    <?= $Page->MaleFactor->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->MaleFactor->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_MaleFactor']"),
        options = { name: "x_MaleFactor", selectId: "ivf_stimulation_chart_x_MaleFactor", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.MaleFactor.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.MaleFactor.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
    <div id="r_Protocol" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Protocol" for="x_Protocol" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Protocol"><?= $Page->Protocol->caption() ?><?= $Page->Protocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Protocol->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Protocol"><span id="el_ivf_stimulation_chart_Protocol">
    <select
        id="x_Protocol"
        name="x_Protocol"
        class="form-control ew-select<?= $Page->Protocol->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Protocol"
        data-table="ivf_stimulation_chart"
        data-field="x_Protocol"
        data-value-separator="<?= $Page->Protocol->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Protocol->getPlaceHolder()) ?>"
        <?= $Page->Protocol->editAttributes() ?>>
        <?= $Page->Protocol->selectOptionListHtml("x_Protocol") ?>
    </select>
    <?= $Page->Protocol->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Protocol->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Protocol']"),
        options = { name: "x_Protocol", selectId: "ivf_stimulation_chart_x_Protocol", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.Protocol.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Protocol.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SemenFrozen->Visible) { // SemenFrozen ?>
    <div id="r_SemenFrozen" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SemenFrozen" for="x_SemenFrozen" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_SemenFrozen"><?= $Page->SemenFrozen->caption() ?><?= $Page->SemenFrozen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SemenFrozen->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SemenFrozen"><span id="el_ivf_stimulation_chart_SemenFrozen">
    <select
        id="x_SemenFrozen"
        name="x_SemenFrozen"
        class="form-control ew-select<?= $Page->SemenFrozen->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_SemenFrozen"
        data-table="ivf_stimulation_chart"
        data-field="x_SemenFrozen"
        data-value-separator="<?= $Page->SemenFrozen->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SemenFrozen->getPlaceHolder()) ?>"
        <?= $Page->SemenFrozen->editAttributes() ?>>
        <?= $Page->SemenFrozen->selectOptionListHtml("x_SemenFrozen") ?>
    </select>
    <?= $Page->SemenFrozen->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->SemenFrozen->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_SemenFrozen']"),
        options = { name: "x_SemenFrozen", selectId: "ivf_stimulation_chart_x_SemenFrozen", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.SemenFrozen.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.SemenFrozen.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
    <div id="r_A4ICSICycle" class="form-group row">
        <label id="elh_ivf_stimulation_chart_A4ICSICycle" for="x_A4ICSICycle" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_A4ICSICycle"><?= $Page->A4ICSICycle->caption() ?><?= $Page->A4ICSICycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A4ICSICycle->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_A4ICSICycle"><span id="el_ivf_stimulation_chart_A4ICSICycle">
    <select
        id="x_A4ICSICycle"
        name="x_A4ICSICycle"
        class="form-control ew-select<?= $Page->A4ICSICycle->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_A4ICSICycle"
        data-table="ivf_stimulation_chart"
        data-field="x_A4ICSICycle"
        data-value-separator="<?= $Page->A4ICSICycle->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->A4ICSICycle->getPlaceHolder()) ?>"
        <?= $Page->A4ICSICycle->editAttributes() ?>>
        <?= $Page->A4ICSICycle->selectOptionListHtml("x_A4ICSICycle") ?>
    </select>
    <?= $Page->A4ICSICycle->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->A4ICSICycle->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_A4ICSICycle']"),
        options = { name: "x_A4ICSICycle", selectId: "ivf_stimulation_chart_x_A4ICSICycle", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.A4ICSICycle.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.A4ICSICycle.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
    <div id="r_TotalICSICycle" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TotalICSICycle" for="x_TotalICSICycle" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_TotalICSICycle"><?= $Page->TotalICSICycle->caption() ?><?= $Page->TotalICSICycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalICSICycle->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TotalICSICycle"><span id="el_ivf_stimulation_chart_TotalICSICycle">
    <select
        id="x_TotalICSICycle"
        name="x_TotalICSICycle"
        class="form-control ew-select<?= $Page->TotalICSICycle->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_TotalICSICycle"
        data-table="ivf_stimulation_chart"
        data-field="x_TotalICSICycle"
        data-value-separator="<?= $Page->TotalICSICycle->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TotalICSICycle->getPlaceHolder()) ?>"
        <?= $Page->TotalICSICycle->editAttributes() ?>>
        <?= $Page->TotalICSICycle->selectOptionListHtml("x_TotalICSICycle") ?>
    </select>
    <?= $Page->TotalICSICycle->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TotalICSICycle->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_TotalICSICycle']"),
        options = { name: "x_TotalICSICycle", selectId: "ivf_stimulation_chart_x_TotalICSICycle", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.TotalICSICycle.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.TotalICSICycle.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
    <div id="r_TypeOfInfertility" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TypeOfInfertility" for="x_TypeOfInfertility" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_TypeOfInfertility"><?= $Page->TypeOfInfertility->caption() ?><?= $Page->TypeOfInfertility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeOfInfertility->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TypeOfInfertility"><span id="el_ivf_stimulation_chart_TypeOfInfertility">
    <select
        id="x_TypeOfInfertility"
        name="x_TypeOfInfertility"
        class="form-control ew-select<?= $Page->TypeOfInfertility->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_TypeOfInfertility"
        data-table="ivf_stimulation_chart"
        data-field="x_TypeOfInfertility"
        data-value-separator="<?= $Page->TypeOfInfertility->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TypeOfInfertility->getPlaceHolder()) ?>"
        <?= $Page->TypeOfInfertility->editAttributes() ?>>
        <?= $Page->TypeOfInfertility->selectOptionListHtml("x_TypeOfInfertility") ?>
    </select>
    <?= $Page->TypeOfInfertility->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TypeOfInfertility->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_TypeOfInfertility']"),
        options = { name: "x_TypeOfInfertility", selectId: "ivf_stimulation_chart_x_TypeOfInfertility", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.TypeOfInfertility.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.TypeOfInfertility.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <div id="r_Duration" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Duration" for="x_Duration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Duration"><?= $Page->Duration->caption() ?><?= $Page->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Duration->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Duration"><span id="el_ivf_stimulation_chart_Duration">
<input type="<?= $Page->Duration->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Duration->getPlaceHolder()) ?>" value="<?= $Page->Duration->EditValue ?>"<?= $Page->Duration->editAttributes() ?> aria-describedby="x_Duration_help">
<?= $Page->Duration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Duration->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label id="elh_ivf_stimulation_chart_LMP" for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_LMP"><?= $Page->LMP->caption() ?><?= $Page->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_LMP"><span id="el_ivf_stimulation_chart_LMP">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?> aria-describedby="x_LMP_help">
<?= $Page->LMP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage() ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
    <div id="r_RelevantHistory" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RelevantHistory" for="x_RelevantHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RelevantHistory"><?= $Page->RelevantHistory->caption() ?><?= $Page->RelevantHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RelevantHistory->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RelevantHistory"><span id="el_ivf_stimulation_chart_RelevantHistory">
<input type="<?= $Page->RelevantHistory->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RelevantHistory" name="x_RelevantHistory" id="x_RelevantHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RelevantHistory->getPlaceHolder()) ?>" value="<?= $Page->RelevantHistory->EditValue ?>"<?= $Page->RelevantHistory->editAttributes() ?> aria-describedby="x_RelevantHistory_help">
<?= $Page->RelevantHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RelevantHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUICycles->Visible) { // IUICycles ?>
    <div id="r_IUICycles" class="form-group row">
        <label id="elh_ivf_stimulation_chart_IUICycles" for="x_IUICycles" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_IUICycles"><?= $Page->IUICycles->caption() ?><?= $Page->IUICycles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUICycles->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_IUICycles"><span id="el_ivf_stimulation_chart_IUICycles">
<input type="<?= $Page->IUICycles->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_IUICycles" name="x_IUICycles" id="x_IUICycles" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IUICycles->getPlaceHolder()) ?>" value="<?= $Page->IUICycles->EditValue ?>"<?= $Page->IUICycles->editAttributes() ?> aria-describedby="x_IUICycles_help">
<?= $Page->IUICycles->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUICycles->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AFC->Visible) { // AFC ?>
    <div id="r_AFC" class="form-group row">
        <label id="elh_ivf_stimulation_chart_AFC" for="x_AFC" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_AFC"><?= $Page->AFC->caption() ?><?= $Page->AFC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AFC->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_AFC"><span id="el_ivf_stimulation_chart_AFC">
<input type="<?= $Page->AFC->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_AFC" name="x_AFC" id="x_AFC" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AFC->getPlaceHolder()) ?>" value="<?= $Page->AFC->EditValue ?>"<?= $Page->AFC->editAttributes() ?> aria-describedby="x_AFC_help">
<?= $Page->AFC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AFC->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AMH->Visible) { // AMH ?>
    <div id="r_AMH" class="form-group row">
        <label id="elh_ivf_stimulation_chart_AMH" for="x_AMH" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_AMH"><?= $Page->AMH->caption() ?><?= $Page->AMH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AMH->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_AMH"><span id="el_ivf_stimulation_chart_AMH">
<input type="<?= $Page->AMH->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_AMH" name="x_AMH" id="x_AMH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AMH->getPlaceHolder()) ?>" value="<?= $Page->AMH->EditValue ?>"<?= $Page->AMH->editAttributes() ?> aria-describedby="x_AMH_help">
<?= $Page->AMH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AMH->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
    <div id="r_FBMI" class="form-group row">
        <label id="elh_ivf_stimulation_chart_FBMI" for="x_FBMI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_FBMI"><?= $Page->FBMI->caption() ?><?= $Page->FBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBMI->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_FBMI"><span id="el_ivf_stimulation_chart_FBMI">
<input type="<?= $Page->FBMI->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_FBMI" name="x_FBMI" id="x_FBMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FBMI->getPlaceHolder()) ?>" value="<?= $Page->FBMI->EditValue ?>"<?= $Page->FBMI->editAttributes() ?> aria-describedby="x_FBMI_help">
<?= $Page->FBMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBMI->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
    <div id="r_MBMI" class="form-group row">
        <label id="elh_ivf_stimulation_chart_MBMI" for="x_MBMI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_MBMI"><?= $Page->MBMI->caption() ?><?= $Page->MBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MBMI->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_MBMI"><span id="el_ivf_stimulation_chart_MBMI">
<input type="<?= $Page->MBMI->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_MBMI" name="x_MBMI" id="x_MBMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MBMI->getPlaceHolder()) ?>" value="<?= $Page->MBMI->EditValue ?>"<?= $Page->MBMI->editAttributes() ?> aria-describedby="x_MBMI_help">
<?= $Page->MBMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MBMI->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
    <div id="r_OvarianVolumeRT" class="form-group row">
        <label id="elh_ivf_stimulation_chart_OvarianVolumeRT" for="x_OvarianVolumeRT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_OvarianVolumeRT"><?= $Page->OvarianVolumeRT->caption() ?><?= $Page->OvarianVolumeRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OvarianVolumeRT->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_OvarianVolumeRT"><span id="el_ivf_stimulation_chart_OvarianVolumeRT">
<input type="<?= $Page->OvarianVolumeRT->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_OvarianVolumeRT" name="x_OvarianVolumeRT" id="x_OvarianVolumeRT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OvarianVolumeRT->getPlaceHolder()) ?>" value="<?= $Page->OvarianVolumeRT->EditValue ?>"<?= $Page->OvarianVolumeRT->editAttributes() ?> aria-describedby="x_OvarianVolumeRT_help">
<?= $Page->OvarianVolumeRT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OvarianVolumeRT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
    <div id="r_OvarianVolumeLT" class="form-group row">
        <label id="elh_ivf_stimulation_chart_OvarianVolumeLT" for="x_OvarianVolumeLT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_OvarianVolumeLT"><?= $Page->OvarianVolumeLT->caption() ?><?= $Page->OvarianVolumeLT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OvarianVolumeLT->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_OvarianVolumeLT"><span id="el_ivf_stimulation_chart_OvarianVolumeLT">
<input type="<?= $Page->OvarianVolumeLT->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_OvarianVolumeLT" name="x_OvarianVolumeLT" id="x_OvarianVolumeLT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OvarianVolumeLT->getPlaceHolder()) ?>" value="<?= $Page->OvarianVolumeLT->EditValue ?>"<?= $Page->OvarianVolumeLT->editAttributes() ?> aria-describedby="x_OvarianVolumeLT_help">
<?= $Page->OvarianVolumeLT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OvarianVolumeLT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
    <div id="r_DAYSOFSTIMULATION" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION" for="x_DAYSOFSTIMULATION" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DAYSOFSTIMULATION"><?= $Page->DAYSOFSTIMULATION->caption() ?><?= $Page->DAYSOFSTIMULATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAYSOFSTIMULATION->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DAYSOFSTIMULATION"><span id="el_ivf_stimulation_chart_DAYSOFSTIMULATION">
<input type="<?= $Page->DAYSOFSTIMULATION->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DAYSOFSTIMULATION" name="x_DAYSOFSTIMULATION" id="x_DAYSOFSTIMULATION" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DAYSOFSTIMULATION->getPlaceHolder()) ?>" value="<?= $Page->DAYSOFSTIMULATION->EditValue ?>"<?= $Page->DAYSOFSTIMULATION->editAttributes() ?> aria-describedby="x_DAYSOFSTIMULATION_help">
<?= $Page->DAYSOFSTIMULATION->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAYSOFSTIMULATION->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
    <div id="r_DOSEOFGONADOTROPINS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS" for="x_DOSEOFGONADOTROPINS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DOSEOFGONADOTROPINS"><?= $Page->DOSEOFGONADOTROPINS->caption() ?><?= $Page->DOSEOFGONADOTROPINS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DOSEOFGONADOTROPINS"><span id="el_ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<input type="<?= $Page->DOSEOFGONADOTROPINS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DOSEOFGONADOTROPINS" name="x_DOSEOFGONADOTROPINS" id="x_DOSEOFGONADOTROPINS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DOSEOFGONADOTROPINS->getPlaceHolder()) ?>" value="<?= $Page->DOSEOFGONADOTROPINS->EditValue ?>"<?= $Page->DOSEOFGONADOTROPINS->editAttributes() ?> aria-describedby="x_DOSEOFGONADOTROPINS_help">
<?= $Page->DOSEOFGONADOTROPINS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DOSEOFGONADOTROPINS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
    <div id="r_INJTYPE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_INJTYPE" for="x_INJTYPE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_INJTYPE"><?= $Page->INJTYPE->caption() ?><?= $Page->INJTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJTYPE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_INJTYPE"><span id="el_ivf_stimulation_chart_INJTYPE">
<div class="input-group flex-nowrap">
    <select
        id="x_INJTYPE"
        name="x_INJTYPE"
        class="form-control ew-select<?= $Page->INJTYPE->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_INJTYPE"
        data-table="ivf_stimulation_chart"
        data-field="x_INJTYPE"
        data-value-separator="<?= $Page->INJTYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->INJTYPE->getPlaceHolder()) ?>"
        <?= $Page->INJTYPE->editAttributes() ?>>
        <?= $Page->INJTYPE->selectOptionListHtml("x_INJTYPE") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_inj") && !$Page->INJTYPE->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_INJTYPE" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->INJTYPE->caption() ?>" data-title="<?= $Page->INJTYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_INJTYPE',url:'<?= GetUrl("IvfStimulationInjAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->INJTYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INJTYPE->getErrorMessage() ?></div>
<?= $Page->INJTYPE->Lookup->getParamTag($Page, "p_x_INJTYPE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_INJTYPE']"),
        options = { name: "x_INJTYPE", selectId: "ivf_stimulation_chart_x_INJTYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.INJTYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
    <div id="r_ANTAGONISTDAYS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ANTAGONISTDAYS" for="x_ANTAGONISTDAYS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ANTAGONISTDAYS"><?= $Page->ANTAGONISTDAYS->caption() ?><?= $Page->ANTAGONISTDAYS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANTAGONISTDAYS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ANTAGONISTDAYS"><span id="el_ivf_stimulation_chart_ANTAGONISTDAYS">
<input type="<?= $Page->ANTAGONISTDAYS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ANTAGONISTDAYS" name="x_ANTAGONISTDAYS" id="x_ANTAGONISTDAYS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANTAGONISTDAYS->getPlaceHolder()) ?>" value="<?= $Page->ANTAGONISTDAYS->EditValue ?>"<?= $Page->ANTAGONISTDAYS->editAttributes() ?> aria-describedby="x_ANTAGONISTDAYS_help">
<?= $Page->ANTAGONISTDAYS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANTAGONISTDAYS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
    <div id="r_ANTAGONISTSTARTDAY" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY" for="x_ANTAGONISTSTARTDAY" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ANTAGONISTSTARTDAY"><?= $Page->ANTAGONISTSTARTDAY->caption() ?><?= $Page->ANTAGONISTSTARTDAY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ANTAGONISTSTARTDAY"><span id="el_ivf_stimulation_chart_ANTAGONISTSTARTDAY">
    <select
        id="x_ANTAGONISTSTARTDAY"
        name="x_ANTAGONISTSTARTDAY"
        class="form-control ew-select<?= $Page->ANTAGONISTSTARTDAY->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_ANTAGONISTSTARTDAY"
        data-table="ivf_stimulation_chart"
        data-field="x_ANTAGONISTSTARTDAY"
        data-value-separator="<?= $Page->ANTAGONISTSTARTDAY->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ANTAGONISTSTARTDAY->getPlaceHolder()) ?>"
        <?= $Page->ANTAGONISTSTARTDAY->editAttributes() ?>>
        <?= $Page->ANTAGONISTSTARTDAY->selectOptionListHtml("x_ANTAGONISTSTARTDAY") ?>
    </select>
    <?= $Page->ANTAGONISTSTARTDAY->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ANTAGONISTSTARTDAY->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_ANTAGONISTSTARTDAY']"),
        options = { name: "x_ANTAGONISTSTARTDAY", selectId: "ivf_stimulation_chart_x_ANTAGONISTSTARTDAY", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.ANTAGONISTSTARTDAY.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.ANTAGONISTSTARTDAY.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
    <div id="r_GROWTHHORMONE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GROWTHHORMONE" for="x_GROWTHHORMONE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GROWTHHORMONE"><?= $Page->GROWTHHORMONE->caption() ?><?= $Page->GROWTHHORMONE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GROWTHHORMONE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GROWTHHORMONE"><span id="el_ivf_stimulation_chart_GROWTHHORMONE">
<input type="<?= $Page->GROWTHHORMONE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GROWTHHORMONE" name="x_GROWTHHORMONE" id="x_GROWTHHORMONE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GROWTHHORMONE->getPlaceHolder()) ?>" value="<?= $Page->GROWTHHORMONE->EditValue ?>"<?= $Page->GROWTHHORMONE->editAttributes() ?> aria-describedby="x_GROWTHHORMONE_help">
<?= $Page->GROWTHHORMONE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GROWTHHORMONE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRETREATMENT->Visible) { // PRETREATMENT ?>
    <div id="r_PRETREATMENT" class="form-group row">
        <label id="elh_ivf_stimulation_chart_PRETREATMENT" for="x_PRETREATMENT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_PRETREATMENT"><?= $Page->PRETREATMENT->caption() ?><?= $Page->PRETREATMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRETREATMENT->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_PRETREATMENT"><span id="el_ivf_stimulation_chart_PRETREATMENT">
    <select
        id="x_PRETREATMENT"
        name="x_PRETREATMENT"
        class="form-control ew-select<?= $Page->PRETREATMENT->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_PRETREATMENT"
        data-table="ivf_stimulation_chart"
        data-field="x_PRETREATMENT"
        data-value-separator="<?= $Page->PRETREATMENT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PRETREATMENT->getPlaceHolder()) ?>"
        <?= $Page->PRETREATMENT->editAttributes() ?>>
        <?= $Page->PRETREATMENT->selectOptionListHtml("x_PRETREATMENT") ?>
    </select>
    <?= $Page->PRETREATMENT->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PRETREATMENT->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_PRETREATMENT']"),
        options = { name: "x_PRETREATMENT", selectId: "ivf_stimulation_chart_x_PRETREATMENT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.PRETREATMENT.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.PRETREATMENT.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
    <div id="r_SerumP4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SerumP4" for="x_SerumP4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_SerumP4"><?= $Page->SerumP4->caption() ?><?= $Page->SerumP4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerumP4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SerumP4"><span id="el_ivf_stimulation_chart_SerumP4">
<input type="<?= $Page->SerumP4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_SerumP4" name="x_SerumP4" id="x_SerumP4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SerumP4->getPlaceHolder()) ?>" value="<?= $Page->SerumP4->EditValue ?>"<?= $Page->SerumP4->editAttributes() ?> aria-describedby="x_SerumP4_help">
<?= $Page->SerumP4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SerumP4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
    <div id="r_FORT" class="form-group row">
        <label id="elh_ivf_stimulation_chart_FORT" for="x_FORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_FORT"><?= $Page->FORT->caption() ?><?= $Page->FORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FORT->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_FORT"><span id="el_ivf_stimulation_chart_FORT">
<input type="<?= $Page->FORT->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_FORT" name="x_FORT" id="x_FORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FORT->getPlaceHolder()) ?>" value="<?= $Page->FORT->EditValue ?>"<?= $Page->FORT->editAttributes() ?> aria-describedby="x_FORT_help">
<?= $Page->FORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MedicalFactors->Visible) { // MedicalFactors ?>
    <div id="r_MedicalFactors" class="form-group row">
        <label id="elh_ivf_stimulation_chart_MedicalFactors" for="x_MedicalFactors" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_MedicalFactors"><?= $Page->MedicalFactors->caption() ?><?= $Page->MedicalFactors->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MedicalFactors->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_MedicalFactors"><span id="el_ivf_stimulation_chart_MedicalFactors">
    <select
        id="x_MedicalFactors"
        name="x_MedicalFactors"
        class="form-control ew-select<?= $Page->MedicalFactors->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_MedicalFactors"
        data-table="ivf_stimulation_chart"
        data-field="x_MedicalFactors"
        data-value-separator="<?= $Page->MedicalFactors->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->MedicalFactors->getPlaceHolder()) ?>"
        <?= $Page->MedicalFactors->editAttributes() ?>>
        <?= $Page->MedicalFactors->selectOptionListHtml("x_MedicalFactors") ?>
    </select>
    <?= $Page->MedicalFactors->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->MedicalFactors->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_MedicalFactors']"),
        options = { name: "x_MedicalFactors", selectId: "ivf_stimulation_chart_x_MedicalFactors", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.MedicalFactors.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.MedicalFactors.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SCDate->Visible) { // SCDate ?>
    <div id="r_SCDate" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SCDate" for="x_SCDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_SCDate"><?= $Page->SCDate->caption() ?><?= $Page->SCDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCDate->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SCDate"><span id="el_ivf_stimulation_chart_SCDate">
<input type="<?= $Page->SCDate->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_SCDate" data-format="7" name="x_SCDate" id="x_SCDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SCDate->getPlaceHolder()) ?>" value="<?= $Page->SCDate->EditValue ?>"<?= $Page->SCDate->editAttributes() ?> aria-describedby="x_SCDate_help">
<?= $Page->SCDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SCDate->getErrorMessage() ?></div>
<?php if (!$Page->SCDate->ReadOnly && !$Page->SCDate->Disabled && !isset($Page->SCDate->EditAttrs["readonly"]) && !isset($Page->SCDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_SCDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
    <div id="r_OvarianSurgery" class="form-group row">
        <label id="elh_ivf_stimulation_chart_OvarianSurgery" for="x_OvarianSurgery" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_OvarianSurgery"><?= $Page->OvarianSurgery->caption() ?><?= $Page->OvarianSurgery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OvarianSurgery->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_OvarianSurgery"><span id="el_ivf_stimulation_chart_OvarianSurgery">
<input type="<?= $Page->OvarianSurgery->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_OvarianSurgery" name="x_OvarianSurgery" id="x_OvarianSurgery" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OvarianSurgery->getPlaceHolder()) ?>" value="<?= $Page->OvarianSurgery->EditValue ?>"<?= $Page->OvarianSurgery->editAttributes() ?> aria-describedby="x_OvarianSurgery_help">
<?= $Page->OvarianSurgery->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OvarianSurgery->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
    <div id="r_PreProcedureOrder" class="form-group row">
        <label id="elh_ivf_stimulation_chart_PreProcedureOrder" for="x_PreProcedureOrder" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_PreProcedureOrder"><?= $Page->PreProcedureOrder->caption() ?><?= $Page->PreProcedureOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreProcedureOrder->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_PreProcedureOrder"><span id="el_ivf_stimulation_chart_PreProcedureOrder">
<input type="<?= $Page->PreProcedureOrder->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_PreProcedureOrder" name="x_PreProcedureOrder" id="x_PreProcedureOrder" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreProcedureOrder->getPlaceHolder()) ?>" value="<?= $Page->PreProcedureOrder->EditValue ?>"<?= $Page->PreProcedureOrder->editAttributes() ?> aria-describedby="x_PreProcedureOrder_help">
<?= $Page->PreProcedureOrder->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreProcedureOrder->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
    <div id="r_TRIGGERR" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TRIGGERR" for="x_TRIGGERR" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_TRIGGERR"><?= $Page->TRIGGERR->caption() ?><?= $Page->TRIGGERR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TRIGGERR->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TRIGGERR"><span id="el_ivf_stimulation_chart_TRIGGERR">
<div class="input-group flex-nowrap">
    <select
        id="x_TRIGGERR"
        name="x_TRIGGERR"
        class="form-control ew-select<?= $Page->TRIGGERR->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_TRIGGERR"
        data-table="ivf_stimulation_chart"
        data-field="x_TRIGGERR"
        data-value-separator="<?= $Page->TRIGGERR->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TRIGGERR->getPlaceHolder()) ?>"
        <?= $Page->TRIGGERR->editAttributes() ?>>
        <?= $Page->TRIGGERR->selectOptionListHtml("x_TRIGGERR") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_trigger") && !$Page->TRIGGERR->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TRIGGERR" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TRIGGERR->caption() ?>" data-title="<?= $Page->TRIGGERR->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TRIGGERR',url:'<?= GetUrl("IvfStimulationTriggerAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TRIGGERR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TRIGGERR->getErrorMessage() ?></div>
<?= $Page->TRIGGERR->Lookup->getParamTag($Page, "p_x_TRIGGERR") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_TRIGGERR']"),
        options = { name: "x_TRIGGERR", selectId: "ivf_stimulation_chart_x_TRIGGERR", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.TRIGGERR.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
    <div id="r_TRIGGERDATE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TRIGGERDATE" for="x_TRIGGERDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_TRIGGERDATE"><?= $Page->TRIGGERDATE->caption() ?><?= $Page->TRIGGERDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TRIGGERDATE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TRIGGERDATE"><span id="el_ivf_stimulation_chart_TRIGGERDATE">
<input type="<?= $Page->TRIGGERDATE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TRIGGERDATE" data-format="11" name="x_TRIGGERDATE" id="x_TRIGGERDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TRIGGERDATE->getPlaceHolder()) ?>" value="<?= $Page->TRIGGERDATE->EditValue ?>"<?= $Page->TRIGGERDATE->editAttributes() ?> aria-describedby="x_TRIGGERDATE_help">
<?= $Page->TRIGGERDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TRIGGERDATE->getErrorMessage() ?></div>
<?php if (!$Page->TRIGGERDATE->ReadOnly && !$Page->TRIGGERDATE->Disabled && !isset($Page->TRIGGERDATE->EditAttrs["readonly"]) && !isset($Page->TRIGGERDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_TRIGGERDATE", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
    <div id="r_ATHOMEorCLINIC" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ATHOMEorCLINIC" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ATHOMEorCLINIC"><?= $Page->ATHOMEorCLINIC->caption() ?><?= $Page->ATHOMEorCLINIC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ATHOMEorCLINIC->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ATHOMEorCLINIC"><span id="el_ivf_stimulation_chart_ATHOMEorCLINIC">
<template id="tp_x_ATHOMEorCLINIC">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_ATHOMEorCLINIC" name="x_ATHOMEorCLINIC" id="x_ATHOMEorCLINIC"<?= $Page->ATHOMEorCLINIC->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ATHOMEorCLINIC" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ATHOMEorCLINIC"
    name="x_ATHOMEorCLINIC"
    value="<?= HtmlEncode($Page->ATHOMEorCLINIC->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_ATHOMEorCLINIC"
    data-target="dsl_x_ATHOMEorCLINIC"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ATHOMEorCLINIC->isInvalidClass() ?>"
    data-table="ivf_stimulation_chart"
    data-field="x_ATHOMEorCLINIC"
    data-value-separator="<?= $Page->ATHOMEorCLINIC->displayValueSeparatorAttribute() ?>"
    <?= $Page->ATHOMEorCLINIC->editAttributes() ?>>
<?= $Page->ATHOMEorCLINIC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ATHOMEorCLINIC->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
    <div id="r_OPUDATE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_OPUDATE" for="x_OPUDATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_OPUDATE"><?= $Page->OPUDATE->caption() ?><?= $Page->OPUDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPUDATE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_OPUDATE"><span id="el_ivf_stimulation_chart_OPUDATE">
<input type="<?= $Page->OPUDATE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_OPUDATE" data-format="11" name="x_OPUDATE" id="x_OPUDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OPUDATE->getPlaceHolder()) ?>" value="<?= $Page->OPUDATE->EditValue ?>"<?= $Page->OPUDATE->editAttributes() ?> aria-describedby="x_OPUDATE_help">
<?= $Page->OPUDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPUDATE->getErrorMessage() ?></div>
<?php if (!$Page->OPUDATE->ReadOnly && !$Page->OPUDATE->Disabled && !isset($Page->OPUDATE->EditAttrs["readonly"]) && !isset($Page->OPUDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_OPUDATE", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
    <div id="r_ALLFREEZEINDICATION" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION" for="x_ALLFREEZEINDICATION" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ALLFREEZEINDICATION"><?= $Page->ALLFREEZEINDICATION->caption() ?><?= $Page->ALLFREEZEINDICATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ALLFREEZEINDICATION->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ALLFREEZEINDICATION"><span id="el_ivf_stimulation_chart_ALLFREEZEINDICATION">
    <select
        id="x_ALLFREEZEINDICATION"
        name="x_ALLFREEZEINDICATION"
        class="form-control ew-select<?= $Page->ALLFREEZEINDICATION->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_ALLFREEZEINDICATION"
        data-table="ivf_stimulation_chart"
        data-field="x_ALLFREEZEINDICATION"
        data-value-separator="<?= $Page->ALLFREEZEINDICATION->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ALLFREEZEINDICATION->getPlaceHolder()) ?>"
        <?= $Page->ALLFREEZEINDICATION->editAttributes() ?>>
        <?= $Page->ALLFREEZEINDICATION->selectOptionListHtml("x_ALLFREEZEINDICATION") ?>
    </select>
    <?= $Page->ALLFREEZEINDICATION->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ALLFREEZEINDICATION->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_ALLFREEZEINDICATION']"),
        options = { name: "x_ALLFREEZEINDICATION", selectId: "ivf_stimulation_chart_x_ALLFREEZEINDICATION", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.ALLFREEZEINDICATION.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.ALLFREEZEINDICATION.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
    <div id="r_ERA" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ERA" for="x_ERA" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ERA"><?= $Page->ERA->caption() ?><?= $Page->ERA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ERA->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ERA"><span id="el_ivf_stimulation_chart_ERA">
    <select
        id="x_ERA"
        name="x_ERA"
        class="form-control ew-select<?= $Page->ERA->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_ERA"
        data-table="ivf_stimulation_chart"
        data-field="x_ERA"
        data-value-separator="<?= $Page->ERA->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ERA->getPlaceHolder()) ?>"
        <?= $Page->ERA->editAttributes() ?>>
        <?= $Page->ERA->selectOptionListHtml("x_ERA") ?>
    </select>
    <?= $Page->ERA->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ERA->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_ERA']"),
        options = { name: "x_ERA", selectId: "ivf_stimulation_chart_x_ERA", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.ERA.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.ERA.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PGTA->Visible) { // PGTA ?>
    <div id="r_PGTA" class="form-group row">
        <label id="elh_ivf_stimulation_chart_PGTA" for="x_PGTA" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_PGTA"><?= $Page->PGTA->caption() ?><?= $Page->PGTA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PGTA->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_PGTA"><span id="el_ivf_stimulation_chart_PGTA">
<input type="<?= $Page->PGTA->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_PGTA" name="x_PGTA" id="x_PGTA" placeholder="<?= HtmlEncode($Page->PGTA->getPlaceHolder()) ?>" value="<?= $Page->PGTA->EditValue ?>"<?= $Page->PGTA->editAttributes() ?> aria-describedby="x_PGTA_help">
<?= $Page->PGTA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PGTA->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PGD->Visible) { // PGD ?>
    <div id="r_PGD" class="form-group row">
        <label id="elh_ivf_stimulation_chart_PGD" for="x_PGD" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_PGD"><?= $Page->PGD->caption() ?><?= $Page->PGD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PGD->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_PGD"><span id="el_ivf_stimulation_chart_PGD">
<input type="<?= $Page->PGD->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_PGD" name="x_PGD" id="x_PGD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PGD->getPlaceHolder()) ?>" value="<?= $Page->PGD->EditValue ?>"<?= $Page->PGD->editAttributes() ?> aria-describedby="x_PGD_help">
<?= $Page->PGD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PGD->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DATEOFET->Visible) { // DATEOFET ?>
    <div id="r_DATEOFET" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DATEOFET" for="x_DATEOFET" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DATEOFET"><?= $Page->DATEOFET->caption() ?><?= $Page->DATEOFET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DATEOFET->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DATEOFET"><span id="el_ivf_stimulation_chart_DATEOFET">
<input type="<?= $Page->DATEOFET->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DATEOFET" data-format="11" name="x_DATEOFET" id="x_DATEOFET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DATEOFET->getPlaceHolder()) ?>" value="<?= $Page->DATEOFET->EditValue ?>"<?= $Page->DATEOFET->editAttributes() ?> aria-describedby="x_DATEOFET_help">
<?= $Page->DATEOFET->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DATEOFET->getErrorMessage() ?></div>
<?php if (!$Page->DATEOFET->ReadOnly && !$Page->DATEOFET->Disabled && !isset($Page->DATEOFET->EditAttrs["readonly"]) && !isset($Page->DATEOFET->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_DATEOFET", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ET->Visible) { // ET ?>
    <div id="r_ET" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ET" for="x_ET" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ET"><?= $Page->ET->caption() ?><?= $Page->ET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ET->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ET"><span id="el_ivf_stimulation_chart_ET">
    <select
        id="x_ET"
        name="x_ET"
        class="form-control ew-select<?= $Page->ET->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_ET"
        data-table="ivf_stimulation_chart"
        data-field="x_ET"
        data-value-separator="<?= $Page->ET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ET->getPlaceHolder()) ?>"
        <?= $Page->ET->editAttributes() ?>>
        <?= $Page->ET->selectOptionListHtml("x_ET") ?>
    </select>
    <?= $Page->ET->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_ET']"),
        options = { name: "x_ET", selectId: "ivf_stimulation_chart_x_ET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.ET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.ET.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ESET->Visible) { // ESET ?>
    <div id="r_ESET" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ESET" for="x_ESET" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ESET"><?= $Page->ESET->caption() ?><?= $Page->ESET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ESET->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ESET"><span id="el_ivf_stimulation_chart_ESET">
<input type="<?= $Page->ESET->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ESET" name="x_ESET" id="x_ESET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ESET->getPlaceHolder()) ?>" value="<?= $Page->ESET->EditValue ?>"<?= $Page->ESET->editAttributes() ?> aria-describedby="x_ESET_help">
<?= $Page->ESET->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ESET->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DOET->Visible) { // DOET ?>
    <div id="r_DOET" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DOET" for="x_DOET" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DOET"><?= $Page->DOET->caption() ?><?= $Page->DOET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DOET->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DOET"><span id="el_ivf_stimulation_chart_DOET">
<input type="<?= $Page->DOET->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DOET" name="x_DOET" id="x_DOET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DOET->getPlaceHolder()) ?>" value="<?= $Page->DOET->EditValue ?>"<?= $Page->DOET->editAttributes() ?> aria-describedby="x_DOET_help">
<?= $Page->DOET->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DOET->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
    <div id="r_SEMENPREPARATION" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SEMENPREPARATION" for="x_SEMENPREPARATION" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_SEMENPREPARATION"><?= $Page->SEMENPREPARATION->caption() ?><?= $Page->SEMENPREPARATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SEMENPREPARATION->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SEMENPREPARATION"><span id="el_ivf_stimulation_chart_SEMENPREPARATION">
    <select
        id="x_SEMENPREPARATION"
        name="x_SEMENPREPARATION"
        class="form-control ew-select<?= $Page->SEMENPREPARATION->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_SEMENPREPARATION"
        data-table="ivf_stimulation_chart"
        data-field="x_SEMENPREPARATION"
        data-value-separator="<?= $Page->SEMENPREPARATION->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SEMENPREPARATION->getPlaceHolder()) ?>"
        <?= $Page->SEMENPREPARATION->editAttributes() ?>>
        <?= $Page->SEMENPREPARATION->selectOptionListHtml("x_SEMENPREPARATION") ?>
    </select>
    <?= $Page->SEMENPREPARATION->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->SEMENPREPARATION->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_SEMENPREPARATION']"),
        options = { name: "x_SEMENPREPARATION", selectId: "ivf_stimulation_chart_x_SEMENPREPARATION", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.SEMENPREPARATION.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.SEMENPREPARATION.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->REASONFORESET->Visible) { // REASONFORESET ?>
    <div id="r_REASONFORESET" class="form-group row">
        <label id="elh_ivf_stimulation_chart_REASONFORESET" for="x_REASONFORESET" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_REASONFORESET"><?= $Page->REASONFORESET->caption() ?><?= $Page->REASONFORESET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->REASONFORESET->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_REASONFORESET"><span id="el_ivf_stimulation_chart_REASONFORESET">
    <select
        id="x_REASONFORESET"
        name="x_REASONFORESET"
        class="form-control ew-select<?= $Page->REASONFORESET->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_REASONFORESET"
        data-table="ivf_stimulation_chart"
        data-field="x_REASONFORESET"
        data-value-separator="<?= $Page->REASONFORESET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->REASONFORESET->getPlaceHolder()) ?>"
        <?= $Page->REASONFORESET->editAttributes() ?>>
        <?= $Page->REASONFORESET->selectOptionListHtml("x_REASONFORESET") ?>
    </select>
    <?= $Page->REASONFORESET->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->REASONFORESET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_REASONFORESET']"),
        options = { name: "x_REASONFORESET", selectId: "ivf_stimulation_chart_x_REASONFORESET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.REASONFORESET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.REASONFORESET.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Expectedoocytes->Visible) { // Expectedoocytes ?>
    <div id="r_Expectedoocytes" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Expectedoocytes" for="x_Expectedoocytes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Expectedoocytes"><?= $Page->Expectedoocytes->caption() ?><?= $Page->Expectedoocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Expectedoocytes->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Expectedoocytes"><span id="el_ivf_stimulation_chart_Expectedoocytes">
<input type="<?= $Page->Expectedoocytes->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Expectedoocytes" name="x_Expectedoocytes" id="x_Expectedoocytes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Expectedoocytes->getPlaceHolder()) ?>" value="<?= $Page->Expectedoocytes->EditValue ?>"<?= $Page->Expectedoocytes->editAttributes() ?> aria-describedby="x_Expectedoocytes_help">
<?= $Page->Expectedoocytes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Expectedoocytes->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate1->Visible) { // StChDate1 ?>
    <div id="r_StChDate1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate1" for="x_StChDate1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate1"><?= $Page->StChDate1->caption() ?><?= $Page->StChDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate1"><span id="el_ivf_stimulation_chart_StChDate1">
<input type="<?= $Page->StChDate1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate1" data-format="7" name="x_StChDate1" id="x_StChDate1" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate1->getPlaceHolder()) ?>" value="<?= $Page->StChDate1->EditValue ?>"<?= $Page->StChDate1->editAttributes() ?> aria-describedby="x_StChDate1_help">
<?= $Page->StChDate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate1->getErrorMessage() ?></div>
<?php if (!$Page->StChDate1->ReadOnly && !$Page->StChDate1->Disabled && !isset($Page->StChDate1->EditAttrs["readonly"]) && !isset($Page->StChDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate1", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate2->Visible) { // StChDate2 ?>
    <div id="r_StChDate2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate2" for="x_StChDate2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate2"><?= $Page->StChDate2->caption() ?><?= $Page->StChDate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate2"><span id="el_ivf_stimulation_chart_StChDate2">
<input type="<?= $Page->StChDate2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate2" data-format="7" name="x_StChDate2" id="x_StChDate2" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate2->getPlaceHolder()) ?>" value="<?= $Page->StChDate2->EditValue ?>"<?= $Page->StChDate2->editAttributes() ?> aria-describedby="x_StChDate2_help">
<?= $Page->StChDate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate2->getErrorMessage() ?></div>
<?php if (!$Page->StChDate2->ReadOnly && !$Page->StChDate2->Disabled && !isset($Page->StChDate2->EditAttrs["readonly"]) && !isset($Page->StChDate2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate2", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate3->Visible) { // StChDate3 ?>
    <div id="r_StChDate3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate3" for="x_StChDate3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate3"><?= $Page->StChDate3->caption() ?><?= $Page->StChDate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate3"><span id="el_ivf_stimulation_chart_StChDate3">
<input type="<?= $Page->StChDate3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate3" data-format="7" name="x_StChDate3" id="x_StChDate3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate3->getPlaceHolder()) ?>" value="<?= $Page->StChDate3->EditValue ?>"<?= $Page->StChDate3->editAttributes() ?> aria-describedby="x_StChDate3_help">
<?= $Page->StChDate3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate3->getErrorMessage() ?></div>
<?php if (!$Page->StChDate3->ReadOnly && !$Page->StChDate3->Disabled && !isset($Page->StChDate3->EditAttrs["readonly"]) && !isset($Page->StChDate3->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate3", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate4->Visible) { // StChDate4 ?>
    <div id="r_StChDate4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate4" for="x_StChDate4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate4"><?= $Page->StChDate4->caption() ?><?= $Page->StChDate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate4"><span id="el_ivf_stimulation_chart_StChDate4">
<input type="<?= $Page->StChDate4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate4" data-format="7" name="x_StChDate4" id="x_StChDate4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate4->getPlaceHolder()) ?>" value="<?= $Page->StChDate4->EditValue ?>"<?= $Page->StChDate4->editAttributes() ?> aria-describedby="x_StChDate4_help">
<?= $Page->StChDate4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate4->getErrorMessage() ?></div>
<?php if (!$Page->StChDate4->ReadOnly && !$Page->StChDate4->Disabled && !isset($Page->StChDate4->EditAttrs["readonly"]) && !isset($Page->StChDate4->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate4", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate5->Visible) { // StChDate5 ?>
    <div id="r_StChDate5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate5" for="x_StChDate5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate5"><?= $Page->StChDate5->caption() ?><?= $Page->StChDate5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate5"><span id="el_ivf_stimulation_chart_StChDate5">
<input type="<?= $Page->StChDate5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate5" data-format="7" name="x_StChDate5" id="x_StChDate5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate5->getPlaceHolder()) ?>" value="<?= $Page->StChDate5->EditValue ?>"<?= $Page->StChDate5->editAttributes() ?> aria-describedby="x_StChDate5_help">
<?= $Page->StChDate5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate5->getErrorMessage() ?></div>
<?php if (!$Page->StChDate5->ReadOnly && !$Page->StChDate5->Disabled && !isset($Page->StChDate5->EditAttrs["readonly"]) && !isset($Page->StChDate5->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate5", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate6->Visible) { // StChDate6 ?>
    <div id="r_StChDate6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate6" for="x_StChDate6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate6"><?= $Page->StChDate6->caption() ?><?= $Page->StChDate6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate6"><span id="el_ivf_stimulation_chart_StChDate6">
<input type="<?= $Page->StChDate6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate6" data-format="7" name="x_StChDate6" id="x_StChDate6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate6->getPlaceHolder()) ?>" value="<?= $Page->StChDate6->EditValue ?>"<?= $Page->StChDate6->editAttributes() ?> aria-describedby="x_StChDate6_help">
<?= $Page->StChDate6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate6->getErrorMessage() ?></div>
<?php if (!$Page->StChDate6->ReadOnly && !$Page->StChDate6->Disabled && !isset($Page->StChDate6->EditAttrs["readonly"]) && !isset($Page->StChDate6->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate6", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate7->Visible) { // StChDate7 ?>
    <div id="r_StChDate7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate7" for="x_StChDate7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate7"><?= $Page->StChDate7->caption() ?><?= $Page->StChDate7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate7"><span id="el_ivf_stimulation_chart_StChDate7">
<input type="<?= $Page->StChDate7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate7" data-format="7" name="x_StChDate7" id="x_StChDate7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate7->getPlaceHolder()) ?>" value="<?= $Page->StChDate7->EditValue ?>"<?= $Page->StChDate7->editAttributes() ?> aria-describedby="x_StChDate7_help">
<?= $Page->StChDate7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate7->getErrorMessage() ?></div>
<?php if (!$Page->StChDate7->ReadOnly && !$Page->StChDate7->Disabled && !isset($Page->StChDate7->EditAttrs["readonly"]) && !isset($Page->StChDate7->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate7", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate8->Visible) { // StChDate8 ?>
    <div id="r_StChDate8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate8" for="x_StChDate8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate8"><?= $Page->StChDate8->caption() ?><?= $Page->StChDate8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate8"><span id="el_ivf_stimulation_chart_StChDate8">
<input type="<?= $Page->StChDate8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate8" data-format="7" name="x_StChDate8" id="x_StChDate8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate8->getPlaceHolder()) ?>" value="<?= $Page->StChDate8->EditValue ?>"<?= $Page->StChDate8->editAttributes() ?> aria-describedby="x_StChDate8_help">
<?= $Page->StChDate8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate8->getErrorMessage() ?></div>
<?php if (!$Page->StChDate8->ReadOnly && !$Page->StChDate8->Disabled && !isset($Page->StChDate8->EditAttrs["readonly"]) && !isset($Page->StChDate8->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate8", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate9->Visible) { // StChDate9 ?>
    <div id="r_StChDate9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate9" for="x_StChDate9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate9"><?= $Page->StChDate9->caption() ?><?= $Page->StChDate9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate9"><span id="el_ivf_stimulation_chart_StChDate9">
<input type="<?= $Page->StChDate9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate9" data-format="7" name="x_StChDate9" id="x_StChDate9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate9->getPlaceHolder()) ?>" value="<?= $Page->StChDate9->EditValue ?>"<?= $Page->StChDate9->editAttributes() ?> aria-describedby="x_StChDate9_help">
<?= $Page->StChDate9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate9->getErrorMessage() ?></div>
<?php if (!$Page->StChDate9->ReadOnly && !$Page->StChDate9->Disabled && !isset($Page->StChDate9->EditAttrs["readonly"]) && !isset($Page->StChDate9->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate9", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate10->Visible) { // StChDate10 ?>
    <div id="r_StChDate10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate10" for="x_StChDate10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate10"><?= $Page->StChDate10->caption() ?><?= $Page->StChDate10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate10"><span id="el_ivf_stimulation_chart_StChDate10">
<input type="<?= $Page->StChDate10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate10" data-format="7" name="x_StChDate10" id="x_StChDate10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate10->getPlaceHolder()) ?>" value="<?= $Page->StChDate10->EditValue ?>"<?= $Page->StChDate10->editAttributes() ?> aria-describedby="x_StChDate10_help">
<?= $Page->StChDate10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate10->getErrorMessage() ?></div>
<?php if (!$Page->StChDate10->ReadOnly && !$Page->StChDate10->Disabled && !isset($Page->StChDate10->EditAttrs["readonly"]) && !isset($Page->StChDate10->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate10", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate11->Visible) { // StChDate11 ?>
    <div id="r_StChDate11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate11" for="x_StChDate11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate11"><?= $Page->StChDate11->caption() ?><?= $Page->StChDate11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate11"><span id="el_ivf_stimulation_chart_StChDate11">
<input type="<?= $Page->StChDate11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate11" data-format="7" name="x_StChDate11" id="x_StChDate11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate11->getPlaceHolder()) ?>" value="<?= $Page->StChDate11->EditValue ?>"<?= $Page->StChDate11->editAttributes() ?> aria-describedby="x_StChDate11_help">
<?= $Page->StChDate11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate11->getErrorMessage() ?></div>
<?php if (!$Page->StChDate11->ReadOnly && !$Page->StChDate11->Disabled && !isset($Page->StChDate11->EditAttrs["readonly"]) && !isset($Page->StChDate11->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate11", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate12->Visible) { // StChDate12 ?>
    <div id="r_StChDate12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate12" for="x_StChDate12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate12"><?= $Page->StChDate12->caption() ?><?= $Page->StChDate12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate12"><span id="el_ivf_stimulation_chart_StChDate12">
<input type="<?= $Page->StChDate12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate12" data-format="7" name="x_StChDate12" id="x_StChDate12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate12->getPlaceHolder()) ?>" value="<?= $Page->StChDate12->EditValue ?>"<?= $Page->StChDate12->editAttributes() ?> aria-describedby="x_StChDate12_help">
<?= $Page->StChDate12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate12->getErrorMessage() ?></div>
<?php if (!$Page->StChDate12->ReadOnly && !$Page->StChDate12->Disabled && !isset($Page->StChDate12->EditAttrs["readonly"]) && !isset($Page->StChDate12->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate12", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate13->Visible) { // StChDate13 ?>
    <div id="r_StChDate13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate13" for="x_StChDate13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate13"><?= $Page->StChDate13->caption() ?><?= $Page->StChDate13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate13"><span id="el_ivf_stimulation_chart_StChDate13">
<input type="<?= $Page->StChDate13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate13" data-format="7" name="x_StChDate13" id="x_StChDate13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StChDate13->getPlaceHolder()) ?>" value="<?= $Page->StChDate13->EditValue ?>"<?= $Page->StChDate13->editAttributes() ?> aria-describedby="x_StChDate13_help">
<?= $Page->StChDate13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate13->getErrorMessage() ?></div>
<?php if (!$Page->StChDate13->ReadOnly && !$Page->StChDate13->Disabled && !isset($Page->StChDate13->EditAttrs["readonly"]) && !isset($Page->StChDate13->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate13", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay1->Visible) { // CycleDay1 ?>
    <div id="r_CycleDay1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay1" for="x_CycleDay1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay1"><?= $Page->CycleDay1->caption() ?><?= $Page->CycleDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay1"><span id="el_ivf_stimulation_chart_CycleDay1">
<input type="<?= $Page->CycleDay1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay1" name="x_CycleDay1" id="x_CycleDay1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay1->getPlaceHolder()) ?>" value="<?= $Page->CycleDay1->EditValue ?>"<?= $Page->CycleDay1->editAttributes() ?> aria-describedby="x_CycleDay1_help">
<?= $Page->CycleDay1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay2->Visible) { // CycleDay2 ?>
    <div id="r_CycleDay2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay2" for="x_CycleDay2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay2"><?= $Page->CycleDay2->caption() ?><?= $Page->CycleDay2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay2"><span id="el_ivf_stimulation_chart_CycleDay2">
<input type="<?= $Page->CycleDay2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay2" name="x_CycleDay2" id="x_CycleDay2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay2->getPlaceHolder()) ?>" value="<?= $Page->CycleDay2->EditValue ?>"<?= $Page->CycleDay2->editAttributes() ?> aria-describedby="x_CycleDay2_help">
<?= $Page->CycleDay2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay3->Visible) { // CycleDay3 ?>
    <div id="r_CycleDay3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay3" for="x_CycleDay3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay3"><?= $Page->CycleDay3->caption() ?><?= $Page->CycleDay3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay3"><span id="el_ivf_stimulation_chart_CycleDay3">
<input type="<?= $Page->CycleDay3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay3" name="x_CycleDay3" id="x_CycleDay3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay3->getPlaceHolder()) ?>" value="<?= $Page->CycleDay3->EditValue ?>"<?= $Page->CycleDay3->editAttributes() ?> aria-describedby="x_CycleDay3_help">
<?= $Page->CycleDay3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay4->Visible) { // CycleDay4 ?>
    <div id="r_CycleDay4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay4" for="x_CycleDay4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay4"><?= $Page->CycleDay4->caption() ?><?= $Page->CycleDay4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay4"><span id="el_ivf_stimulation_chart_CycleDay4">
<input type="<?= $Page->CycleDay4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay4" name="x_CycleDay4" id="x_CycleDay4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay4->getPlaceHolder()) ?>" value="<?= $Page->CycleDay4->EditValue ?>"<?= $Page->CycleDay4->editAttributes() ?> aria-describedby="x_CycleDay4_help">
<?= $Page->CycleDay4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay5->Visible) { // CycleDay5 ?>
    <div id="r_CycleDay5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay5" for="x_CycleDay5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay5"><?= $Page->CycleDay5->caption() ?><?= $Page->CycleDay5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay5"><span id="el_ivf_stimulation_chart_CycleDay5">
<input type="<?= $Page->CycleDay5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay5" name="x_CycleDay5" id="x_CycleDay5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay5->getPlaceHolder()) ?>" value="<?= $Page->CycleDay5->EditValue ?>"<?= $Page->CycleDay5->editAttributes() ?> aria-describedby="x_CycleDay5_help">
<?= $Page->CycleDay5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay5->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay6->Visible) { // CycleDay6 ?>
    <div id="r_CycleDay6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay6" for="x_CycleDay6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay6"><?= $Page->CycleDay6->caption() ?><?= $Page->CycleDay6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay6"><span id="el_ivf_stimulation_chart_CycleDay6">
<input type="<?= $Page->CycleDay6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay6" name="x_CycleDay6" id="x_CycleDay6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay6->getPlaceHolder()) ?>" value="<?= $Page->CycleDay6->EditValue ?>"<?= $Page->CycleDay6->editAttributes() ?> aria-describedby="x_CycleDay6_help">
<?= $Page->CycleDay6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay6->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay7->Visible) { // CycleDay7 ?>
    <div id="r_CycleDay7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay7" for="x_CycleDay7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay7"><?= $Page->CycleDay7->caption() ?><?= $Page->CycleDay7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay7"><span id="el_ivf_stimulation_chart_CycleDay7">
<input type="<?= $Page->CycleDay7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay7" name="x_CycleDay7" id="x_CycleDay7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay7->getPlaceHolder()) ?>" value="<?= $Page->CycleDay7->EditValue ?>"<?= $Page->CycleDay7->editAttributes() ?> aria-describedby="x_CycleDay7_help">
<?= $Page->CycleDay7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay7->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay8->Visible) { // CycleDay8 ?>
    <div id="r_CycleDay8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay8" for="x_CycleDay8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay8"><?= $Page->CycleDay8->caption() ?><?= $Page->CycleDay8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay8"><span id="el_ivf_stimulation_chart_CycleDay8">
<input type="<?= $Page->CycleDay8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay8" name="x_CycleDay8" id="x_CycleDay8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay8->getPlaceHolder()) ?>" value="<?= $Page->CycleDay8->EditValue ?>"<?= $Page->CycleDay8->editAttributes() ?> aria-describedby="x_CycleDay8_help">
<?= $Page->CycleDay8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay8->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay9->Visible) { // CycleDay9 ?>
    <div id="r_CycleDay9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay9" for="x_CycleDay9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay9"><?= $Page->CycleDay9->caption() ?><?= $Page->CycleDay9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay9"><span id="el_ivf_stimulation_chart_CycleDay9">
<input type="<?= $Page->CycleDay9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay9" name="x_CycleDay9" id="x_CycleDay9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay9->getPlaceHolder()) ?>" value="<?= $Page->CycleDay9->EditValue ?>"<?= $Page->CycleDay9->editAttributes() ?> aria-describedby="x_CycleDay9_help">
<?= $Page->CycleDay9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay9->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay10->Visible) { // CycleDay10 ?>
    <div id="r_CycleDay10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay10" for="x_CycleDay10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay10"><?= $Page->CycleDay10->caption() ?><?= $Page->CycleDay10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay10"><span id="el_ivf_stimulation_chart_CycleDay10">
<input type="<?= $Page->CycleDay10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay10" name="x_CycleDay10" id="x_CycleDay10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay10->getPlaceHolder()) ?>" value="<?= $Page->CycleDay10->EditValue ?>"<?= $Page->CycleDay10->editAttributes() ?> aria-describedby="x_CycleDay10_help">
<?= $Page->CycleDay10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay10->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay11->Visible) { // CycleDay11 ?>
    <div id="r_CycleDay11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay11" for="x_CycleDay11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay11"><?= $Page->CycleDay11->caption() ?><?= $Page->CycleDay11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay11"><span id="el_ivf_stimulation_chart_CycleDay11">
<input type="<?= $Page->CycleDay11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay11" name="x_CycleDay11" id="x_CycleDay11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay11->getPlaceHolder()) ?>" value="<?= $Page->CycleDay11->EditValue ?>"<?= $Page->CycleDay11->editAttributes() ?> aria-describedby="x_CycleDay11_help">
<?= $Page->CycleDay11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay11->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay12->Visible) { // CycleDay12 ?>
    <div id="r_CycleDay12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay12" for="x_CycleDay12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay12"><?= $Page->CycleDay12->caption() ?><?= $Page->CycleDay12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay12"><span id="el_ivf_stimulation_chart_CycleDay12">
<input type="<?= $Page->CycleDay12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay12" name="x_CycleDay12" id="x_CycleDay12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay12->getPlaceHolder()) ?>" value="<?= $Page->CycleDay12->EditValue ?>"<?= $Page->CycleDay12->editAttributes() ?> aria-describedby="x_CycleDay12_help">
<?= $Page->CycleDay12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay12->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay13->Visible) { // CycleDay13 ?>
    <div id="r_CycleDay13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay13" for="x_CycleDay13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay13"><?= $Page->CycleDay13->caption() ?><?= $Page->CycleDay13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay13"><span id="el_ivf_stimulation_chart_CycleDay13">
<input type="<?= $Page->CycleDay13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay13" name="x_CycleDay13" id="x_CycleDay13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay13->getPlaceHolder()) ?>" value="<?= $Page->CycleDay13->EditValue ?>"<?= $Page->CycleDay13->editAttributes() ?> aria-describedby="x_CycleDay13_help">
<?= $Page->CycleDay13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay13->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay1->Visible) { // StimulationDay1 ?>
    <div id="r_StimulationDay1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay1" for="x_StimulationDay1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay1"><?= $Page->StimulationDay1->caption() ?><?= $Page->StimulationDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay1"><span id="el_ivf_stimulation_chart_StimulationDay1">
<input type="<?= $Page->StimulationDay1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay1" name="x_StimulationDay1" id="x_StimulationDay1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay1->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay1->EditValue ?>"<?= $Page->StimulationDay1->editAttributes() ?> aria-describedby="x_StimulationDay1_help">
<?= $Page->StimulationDay1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay2->Visible) { // StimulationDay2 ?>
    <div id="r_StimulationDay2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay2" for="x_StimulationDay2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay2"><?= $Page->StimulationDay2->caption() ?><?= $Page->StimulationDay2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay2"><span id="el_ivf_stimulation_chart_StimulationDay2">
<input type="<?= $Page->StimulationDay2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay2" name="x_StimulationDay2" id="x_StimulationDay2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay2->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay2->EditValue ?>"<?= $Page->StimulationDay2->editAttributes() ?> aria-describedby="x_StimulationDay2_help">
<?= $Page->StimulationDay2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay3->Visible) { // StimulationDay3 ?>
    <div id="r_StimulationDay3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay3" for="x_StimulationDay3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay3"><?= $Page->StimulationDay3->caption() ?><?= $Page->StimulationDay3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay3"><span id="el_ivf_stimulation_chart_StimulationDay3">
<input type="<?= $Page->StimulationDay3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay3" name="x_StimulationDay3" id="x_StimulationDay3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay3->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay3->EditValue ?>"<?= $Page->StimulationDay3->editAttributes() ?> aria-describedby="x_StimulationDay3_help">
<?= $Page->StimulationDay3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay4->Visible) { // StimulationDay4 ?>
    <div id="r_StimulationDay4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay4" for="x_StimulationDay4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay4"><?= $Page->StimulationDay4->caption() ?><?= $Page->StimulationDay4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay4"><span id="el_ivf_stimulation_chart_StimulationDay4">
<input type="<?= $Page->StimulationDay4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay4" name="x_StimulationDay4" id="x_StimulationDay4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay4->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay4->EditValue ?>"<?= $Page->StimulationDay4->editAttributes() ?> aria-describedby="x_StimulationDay4_help">
<?= $Page->StimulationDay4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay5->Visible) { // StimulationDay5 ?>
    <div id="r_StimulationDay5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay5" for="x_StimulationDay5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay5"><?= $Page->StimulationDay5->caption() ?><?= $Page->StimulationDay5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay5"><span id="el_ivf_stimulation_chart_StimulationDay5">
<input type="<?= $Page->StimulationDay5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay5" name="x_StimulationDay5" id="x_StimulationDay5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay5->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay5->EditValue ?>"<?= $Page->StimulationDay5->editAttributes() ?> aria-describedby="x_StimulationDay5_help">
<?= $Page->StimulationDay5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay5->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay6->Visible) { // StimulationDay6 ?>
    <div id="r_StimulationDay6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay6" for="x_StimulationDay6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay6"><?= $Page->StimulationDay6->caption() ?><?= $Page->StimulationDay6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay6"><span id="el_ivf_stimulation_chart_StimulationDay6">
<input type="<?= $Page->StimulationDay6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay6" name="x_StimulationDay6" id="x_StimulationDay6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay6->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay6->EditValue ?>"<?= $Page->StimulationDay6->editAttributes() ?> aria-describedby="x_StimulationDay6_help">
<?= $Page->StimulationDay6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay6->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay7->Visible) { // StimulationDay7 ?>
    <div id="r_StimulationDay7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay7" for="x_StimulationDay7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay7"><?= $Page->StimulationDay7->caption() ?><?= $Page->StimulationDay7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay7"><span id="el_ivf_stimulation_chart_StimulationDay7">
<input type="<?= $Page->StimulationDay7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay7" name="x_StimulationDay7" id="x_StimulationDay7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay7->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay7->EditValue ?>"<?= $Page->StimulationDay7->editAttributes() ?> aria-describedby="x_StimulationDay7_help">
<?= $Page->StimulationDay7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay7->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay8->Visible) { // StimulationDay8 ?>
    <div id="r_StimulationDay8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay8" for="x_StimulationDay8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay8"><?= $Page->StimulationDay8->caption() ?><?= $Page->StimulationDay8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay8"><span id="el_ivf_stimulation_chart_StimulationDay8">
<input type="<?= $Page->StimulationDay8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay8" name="x_StimulationDay8" id="x_StimulationDay8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay8->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay8->EditValue ?>"<?= $Page->StimulationDay8->editAttributes() ?> aria-describedby="x_StimulationDay8_help">
<?= $Page->StimulationDay8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay8->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay9->Visible) { // StimulationDay9 ?>
    <div id="r_StimulationDay9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay9" for="x_StimulationDay9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay9"><?= $Page->StimulationDay9->caption() ?><?= $Page->StimulationDay9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay9"><span id="el_ivf_stimulation_chart_StimulationDay9">
<input type="<?= $Page->StimulationDay9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay9" name="x_StimulationDay9" id="x_StimulationDay9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay9->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay9->EditValue ?>"<?= $Page->StimulationDay9->editAttributes() ?> aria-describedby="x_StimulationDay9_help">
<?= $Page->StimulationDay9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay9->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay10->Visible) { // StimulationDay10 ?>
    <div id="r_StimulationDay10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay10" for="x_StimulationDay10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay10"><?= $Page->StimulationDay10->caption() ?><?= $Page->StimulationDay10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay10"><span id="el_ivf_stimulation_chart_StimulationDay10">
<input type="<?= $Page->StimulationDay10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay10" name="x_StimulationDay10" id="x_StimulationDay10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay10->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay10->EditValue ?>"<?= $Page->StimulationDay10->editAttributes() ?> aria-describedby="x_StimulationDay10_help">
<?= $Page->StimulationDay10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay10->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay11->Visible) { // StimulationDay11 ?>
    <div id="r_StimulationDay11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay11" for="x_StimulationDay11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay11"><?= $Page->StimulationDay11->caption() ?><?= $Page->StimulationDay11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay11"><span id="el_ivf_stimulation_chart_StimulationDay11">
<input type="<?= $Page->StimulationDay11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay11" name="x_StimulationDay11" id="x_StimulationDay11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay11->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay11->EditValue ?>"<?= $Page->StimulationDay11->editAttributes() ?> aria-describedby="x_StimulationDay11_help">
<?= $Page->StimulationDay11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay11->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay12->Visible) { // StimulationDay12 ?>
    <div id="r_StimulationDay12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay12" for="x_StimulationDay12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay12"><?= $Page->StimulationDay12->caption() ?><?= $Page->StimulationDay12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay12"><span id="el_ivf_stimulation_chart_StimulationDay12">
<input type="<?= $Page->StimulationDay12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay12" name="x_StimulationDay12" id="x_StimulationDay12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay12->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay12->EditValue ?>"<?= $Page->StimulationDay12->editAttributes() ?> aria-describedby="x_StimulationDay12_help">
<?= $Page->StimulationDay12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay12->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay13->Visible) { // StimulationDay13 ?>
    <div id="r_StimulationDay13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay13" for="x_StimulationDay13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay13"><?= $Page->StimulationDay13->caption() ?><?= $Page->StimulationDay13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay13"><span id="el_ivf_stimulation_chart_StimulationDay13">
<input type="<?= $Page->StimulationDay13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay13" name="x_StimulationDay13" id="x_StimulationDay13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay13->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay13->EditValue ?>"<?= $Page->StimulationDay13->editAttributes() ?> aria-describedby="x_StimulationDay13_help">
<?= $Page->StimulationDay13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay13->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet1->Visible) { // Tablet1 ?>
    <div id="r_Tablet1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet1" for="x_Tablet1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet1"><?= $Page->Tablet1->caption() ?><?= $Page->Tablet1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet1"><span id="el_ivf_stimulation_chart_Tablet1">
<div class="input-group flex-nowrap">
    <select
        id="x_Tablet1"
        name="x_Tablet1"
        class="form-control ew-select<?= $Page->Tablet1->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet1"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet1"
        data-value-separator="<?= $Page->Tablet1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet1->getPlaceHolder()) ?>"
        <?= $Page->Tablet1->editAttributes() ?>>
        <?= $Page->Tablet1->selectOptionListHtml("x_Tablet1") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_tablet") && !$Page->Tablet1->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Tablet1" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Tablet1->caption() ?>" data-title="<?= $Page->Tablet1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Tablet1',url:'<?= GetUrl("IvfStimulationTabletAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->Tablet1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet1->getErrorMessage() ?></div>
<?= $Page->Tablet1->Lookup->getParamTag($Page, "p_x_Tablet1") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet1']"),
        options = { name: "x_Tablet1", selectId: "ivf_stimulation_chart_x_Tablet1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet2->Visible) { // Tablet2 ?>
    <div id="r_Tablet2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet2" for="x_Tablet2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet2"><?= $Page->Tablet2->caption() ?><?= $Page->Tablet2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet2"><span id="el_ivf_stimulation_chart_Tablet2">
    <select
        id="x_Tablet2"
        name="x_Tablet2"
        class="form-control ew-select<?= $Page->Tablet2->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet2"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet2"
        data-value-separator="<?= $Page->Tablet2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet2->getPlaceHolder()) ?>"
        <?= $Page->Tablet2->editAttributes() ?>>
        <?= $Page->Tablet2->selectOptionListHtml("x_Tablet2") ?>
    </select>
    <?= $Page->Tablet2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet2->getErrorMessage() ?></div>
<?= $Page->Tablet2->Lookup->getParamTag($Page, "p_x_Tablet2") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet2']"),
        options = { name: "x_Tablet2", selectId: "ivf_stimulation_chart_x_Tablet2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet3->Visible) { // Tablet3 ?>
    <div id="r_Tablet3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet3" for="x_Tablet3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet3"><?= $Page->Tablet3->caption() ?><?= $Page->Tablet3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet3"><span id="el_ivf_stimulation_chart_Tablet3">
    <select
        id="x_Tablet3"
        name="x_Tablet3"
        class="form-control ew-select<?= $Page->Tablet3->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet3"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet3"
        data-value-separator="<?= $Page->Tablet3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet3->getPlaceHolder()) ?>"
        <?= $Page->Tablet3->editAttributes() ?>>
        <?= $Page->Tablet3->selectOptionListHtml("x_Tablet3") ?>
    </select>
    <?= $Page->Tablet3->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet3->getErrorMessage() ?></div>
<?= $Page->Tablet3->Lookup->getParamTag($Page, "p_x_Tablet3") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet3']"),
        options = { name: "x_Tablet3", selectId: "ivf_stimulation_chart_x_Tablet3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet3.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet4->Visible) { // Tablet4 ?>
    <div id="r_Tablet4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet4" for="x_Tablet4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet4"><?= $Page->Tablet4->caption() ?><?= $Page->Tablet4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet4"><span id="el_ivf_stimulation_chart_Tablet4">
    <select
        id="x_Tablet4"
        name="x_Tablet4"
        class="form-control ew-select<?= $Page->Tablet4->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet4"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet4"
        data-value-separator="<?= $Page->Tablet4->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet4->getPlaceHolder()) ?>"
        <?= $Page->Tablet4->editAttributes() ?>>
        <?= $Page->Tablet4->selectOptionListHtml("x_Tablet4") ?>
    </select>
    <?= $Page->Tablet4->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet4->getErrorMessage() ?></div>
<?= $Page->Tablet4->Lookup->getParamTag($Page, "p_x_Tablet4") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet4']"),
        options = { name: "x_Tablet4", selectId: "ivf_stimulation_chart_x_Tablet4", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet4.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet5->Visible) { // Tablet5 ?>
    <div id="r_Tablet5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet5" for="x_Tablet5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet5"><?= $Page->Tablet5->caption() ?><?= $Page->Tablet5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet5"><span id="el_ivf_stimulation_chart_Tablet5">
    <select
        id="x_Tablet5"
        name="x_Tablet5"
        class="form-control ew-select<?= $Page->Tablet5->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet5"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet5"
        data-value-separator="<?= $Page->Tablet5->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet5->getPlaceHolder()) ?>"
        <?= $Page->Tablet5->editAttributes() ?>>
        <?= $Page->Tablet5->selectOptionListHtml("x_Tablet5") ?>
    </select>
    <?= $Page->Tablet5->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet5->getErrorMessage() ?></div>
<?= $Page->Tablet5->Lookup->getParamTag($Page, "p_x_Tablet5") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet5']"),
        options = { name: "x_Tablet5", selectId: "ivf_stimulation_chart_x_Tablet5", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet5.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet6->Visible) { // Tablet6 ?>
    <div id="r_Tablet6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet6" for="x_Tablet6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet6"><?= $Page->Tablet6->caption() ?><?= $Page->Tablet6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet6"><span id="el_ivf_stimulation_chart_Tablet6">
    <select
        id="x_Tablet6"
        name="x_Tablet6"
        class="form-control ew-select<?= $Page->Tablet6->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet6"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet6"
        data-value-separator="<?= $Page->Tablet6->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet6->getPlaceHolder()) ?>"
        <?= $Page->Tablet6->editAttributes() ?>>
        <?= $Page->Tablet6->selectOptionListHtml("x_Tablet6") ?>
    </select>
    <?= $Page->Tablet6->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet6->getErrorMessage() ?></div>
<?= $Page->Tablet6->Lookup->getParamTag($Page, "p_x_Tablet6") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet6']"),
        options = { name: "x_Tablet6", selectId: "ivf_stimulation_chart_x_Tablet6", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet6.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet7->Visible) { // Tablet7 ?>
    <div id="r_Tablet7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet7" for="x_Tablet7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet7"><?= $Page->Tablet7->caption() ?><?= $Page->Tablet7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet7"><span id="el_ivf_stimulation_chart_Tablet7">
    <select
        id="x_Tablet7"
        name="x_Tablet7"
        class="form-control ew-select<?= $Page->Tablet7->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet7"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet7"
        data-value-separator="<?= $Page->Tablet7->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet7->getPlaceHolder()) ?>"
        <?= $Page->Tablet7->editAttributes() ?>>
        <?= $Page->Tablet7->selectOptionListHtml("x_Tablet7") ?>
    </select>
    <?= $Page->Tablet7->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet7->getErrorMessage() ?></div>
<?= $Page->Tablet7->Lookup->getParamTag($Page, "p_x_Tablet7") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet7']"),
        options = { name: "x_Tablet7", selectId: "ivf_stimulation_chart_x_Tablet7", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet7.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet8->Visible) { // Tablet8 ?>
    <div id="r_Tablet8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet8" for="x_Tablet8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet8"><?= $Page->Tablet8->caption() ?><?= $Page->Tablet8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet8"><span id="el_ivf_stimulation_chart_Tablet8">
    <select
        id="x_Tablet8"
        name="x_Tablet8"
        class="form-control ew-select<?= $Page->Tablet8->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet8"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet8"
        data-value-separator="<?= $Page->Tablet8->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet8->getPlaceHolder()) ?>"
        <?= $Page->Tablet8->editAttributes() ?>>
        <?= $Page->Tablet8->selectOptionListHtml("x_Tablet8") ?>
    </select>
    <?= $Page->Tablet8->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet8->getErrorMessage() ?></div>
<?= $Page->Tablet8->Lookup->getParamTag($Page, "p_x_Tablet8") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet8']"),
        options = { name: "x_Tablet8", selectId: "ivf_stimulation_chart_x_Tablet8", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet8.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet9->Visible) { // Tablet9 ?>
    <div id="r_Tablet9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet9" for="x_Tablet9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet9"><?= $Page->Tablet9->caption() ?><?= $Page->Tablet9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet9"><span id="el_ivf_stimulation_chart_Tablet9">
    <select
        id="x_Tablet9"
        name="x_Tablet9"
        class="form-control ew-select<?= $Page->Tablet9->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet9"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet9"
        data-value-separator="<?= $Page->Tablet9->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet9->getPlaceHolder()) ?>"
        <?= $Page->Tablet9->editAttributes() ?>>
        <?= $Page->Tablet9->selectOptionListHtml("x_Tablet9") ?>
    </select>
    <?= $Page->Tablet9->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet9->getErrorMessage() ?></div>
<?= $Page->Tablet9->Lookup->getParamTag($Page, "p_x_Tablet9") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet9']"),
        options = { name: "x_Tablet9", selectId: "ivf_stimulation_chart_x_Tablet9", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet9.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet10->Visible) { // Tablet10 ?>
    <div id="r_Tablet10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet10" for="x_Tablet10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet10"><?= $Page->Tablet10->caption() ?><?= $Page->Tablet10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet10"><span id="el_ivf_stimulation_chart_Tablet10">
    <select
        id="x_Tablet10"
        name="x_Tablet10"
        class="form-control ew-select<?= $Page->Tablet10->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet10"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet10"
        data-value-separator="<?= $Page->Tablet10->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet10->getPlaceHolder()) ?>"
        <?= $Page->Tablet10->editAttributes() ?>>
        <?= $Page->Tablet10->selectOptionListHtml("x_Tablet10") ?>
    </select>
    <?= $Page->Tablet10->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet10->getErrorMessage() ?></div>
<?= $Page->Tablet10->Lookup->getParamTag($Page, "p_x_Tablet10") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet10']"),
        options = { name: "x_Tablet10", selectId: "ivf_stimulation_chart_x_Tablet10", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet10.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet11->Visible) { // Tablet11 ?>
    <div id="r_Tablet11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet11" for="x_Tablet11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet11"><?= $Page->Tablet11->caption() ?><?= $Page->Tablet11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet11"><span id="el_ivf_stimulation_chart_Tablet11">
    <select
        id="x_Tablet11"
        name="x_Tablet11"
        class="form-control ew-select<?= $Page->Tablet11->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet11"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet11"
        data-value-separator="<?= $Page->Tablet11->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet11->getPlaceHolder()) ?>"
        <?= $Page->Tablet11->editAttributes() ?>>
        <?= $Page->Tablet11->selectOptionListHtml("x_Tablet11") ?>
    </select>
    <?= $Page->Tablet11->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet11->getErrorMessage() ?></div>
<?= $Page->Tablet11->Lookup->getParamTag($Page, "p_x_Tablet11") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet11']"),
        options = { name: "x_Tablet11", selectId: "ivf_stimulation_chart_x_Tablet11", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet11.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet12->Visible) { // Tablet12 ?>
    <div id="r_Tablet12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet12" for="x_Tablet12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet12"><?= $Page->Tablet12->caption() ?><?= $Page->Tablet12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet12"><span id="el_ivf_stimulation_chart_Tablet12">
    <select
        id="x_Tablet12"
        name="x_Tablet12"
        class="form-control ew-select<?= $Page->Tablet12->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet12"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet12"
        data-value-separator="<?= $Page->Tablet12->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet12->getPlaceHolder()) ?>"
        <?= $Page->Tablet12->editAttributes() ?>>
        <?= $Page->Tablet12->selectOptionListHtml("x_Tablet12") ?>
    </select>
    <?= $Page->Tablet12->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet12->getErrorMessage() ?></div>
<?= $Page->Tablet12->Lookup->getParamTag($Page, "p_x_Tablet12") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet12']"),
        options = { name: "x_Tablet12", selectId: "ivf_stimulation_chart_x_Tablet12", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet12.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet13->Visible) { // Tablet13 ?>
    <div id="r_Tablet13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet13" for="x_Tablet13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet13"><?= $Page->Tablet13->caption() ?><?= $Page->Tablet13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet13"><span id="el_ivf_stimulation_chart_Tablet13">
    <select
        id="x_Tablet13"
        name="x_Tablet13"
        class="form-control ew-select<?= $Page->Tablet13->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet13"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet13"
        data-value-separator="<?= $Page->Tablet13->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet13->getPlaceHolder()) ?>"
        <?= $Page->Tablet13->editAttributes() ?>>
        <?= $Page->Tablet13->selectOptionListHtml("x_Tablet13") ?>
    </select>
    <?= $Page->Tablet13->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet13->getErrorMessage() ?></div>
<?= $Page->Tablet13->Lookup->getParamTag($Page, "p_x_Tablet13") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet13']"),
        options = { name: "x_Tablet13", selectId: "ivf_stimulation_chart_x_Tablet13", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet13.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
    <div id="r_RFSH1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH1" for="x_RFSH1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH1"><?= $Page->RFSH1->caption() ?><?= $Page->RFSH1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH1"><span id="el_ivf_stimulation_chart_RFSH1">
<div class="input-group flex-nowrap">
    <select
        id="x_RFSH1"
        name="x_RFSH1"
        class="form-control ew-select<?= $Page->RFSH1->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH1"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH1"
        data-value-separator="<?= $Page->RFSH1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH1->getPlaceHolder()) ?>"
        <?= $Page->RFSH1->editAttributes() ?>>
        <?= $Page->RFSH1->selectOptionListHtml("x_RFSH1") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_rfsh") && !$Page->RFSH1->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RFSH1" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->RFSH1->caption() ?>" data-title="<?= $Page->RFSH1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RFSH1',url:'<?= GetUrl("IvfStimulationRfshAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->RFSH1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH1->getErrorMessage() ?></div>
<?= $Page->RFSH1->Lookup->getParamTag($Page, "p_x_RFSH1") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH1']"),
        options = { name: "x_RFSH1", selectId: "ivf_stimulation_chart_x_RFSH1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
    <div id="r_RFSH2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH2" for="x_RFSH2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH2"><?= $Page->RFSH2->caption() ?><?= $Page->RFSH2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH2"><span id="el_ivf_stimulation_chart_RFSH2">
    <select
        id="x_RFSH2"
        name="x_RFSH2"
        class="form-control ew-select<?= $Page->RFSH2->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH2"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH2"
        data-value-separator="<?= $Page->RFSH2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH2->getPlaceHolder()) ?>"
        <?= $Page->RFSH2->editAttributes() ?>>
        <?= $Page->RFSH2->selectOptionListHtml("x_RFSH2") ?>
    </select>
    <?= $Page->RFSH2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH2->getErrorMessage() ?></div>
<?= $Page->RFSH2->Lookup->getParamTag($Page, "p_x_RFSH2") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH2']"),
        options = { name: "x_RFSH2", selectId: "ivf_stimulation_chart_x_RFSH2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
    <div id="r_RFSH3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH3" for="x_RFSH3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH3"><?= $Page->RFSH3->caption() ?><?= $Page->RFSH3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH3"><span id="el_ivf_stimulation_chart_RFSH3">
    <select
        id="x_RFSH3"
        name="x_RFSH3"
        class="form-control ew-select<?= $Page->RFSH3->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH3"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH3"
        data-value-separator="<?= $Page->RFSH3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH3->getPlaceHolder()) ?>"
        <?= $Page->RFSH3->editAttributes() ?>>
        <?= $Page->RFSH3->selectOptionListHtml("x_RFSH3") ?>
    </select>
    <?= $Page->RFSH3->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH3->getErrorMessage() ?></div>
<?= $Page->RFSH3->Lookup->getParamTag($Page, "p_x_RFSH3") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH3']"),
        options = { name: "x_RFSH3", selectId: "ivf_stimulation_chart_x_RFSH3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH3.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH4->Visible) { // RFSH4 ?>
    <div id="r_RFSH4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH4" for="x_RFSH4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH4"><?= $Page->RFSH4->caption() ?><?= $Page->RFSH4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH4"><span id="el_ivf_stimulation_chart_RFSH4">
    <select
        id="x_RFSH4"
        name="x_RFSH4"
        class="form-control ew-select<?= $Page->RFSH4->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH4"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH4"
        data-value-separator="<?= $Page->RFSH4->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH4->getPlaceHolder()) ?>"
        <?= $Page->RFSH4->editAttributes() ?>>
        <?= $Page->RFSH4->selectOptionListHtml("x_RFSH4") ?>
    </select>
    <?= $Page->RFSH4->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH4->getErrorMessage() ?></div>
<?= $Page->RFSH4->Lookup->getParamTag($Page, "p_x_RFSH4") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH4']"),
        options = { name: "x_RFSH4", selectId: "ivf_stimulation_chart_x_RFSH4", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH4.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH5->Visible) { // RFSH5 ?>
    <div id="r_RFSH5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH5" for="x_RFSH5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH5"><?= $Page->RFSH5->caption() ?><?= $Page->RFSH5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH5"><span id="el_ivf_stimulation_chart_RFSH5">
    <select
        id="x_RFSH5"
        name="x_RFSH5"
        class="form-control ew-select<?= $Page->RFSH5->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH5"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH5"
        data-value-separator="<?= $Page->RFSH5->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH5->getPlaceHolder()) ?>"
        <?= $Page->RFSH5->editAttributes() ?>>
        <?= $Page->RFSH5->selectOptionListHtml("x_RFSH5") ?>
    </select>
    <?= $Page->RFSH5->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH5->getErrorMessage() ?></div>
<?= $Page->RFSH5->Lookup->getParamTag($Page, "p_x_RFSH5") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH5']"),
        options = { name: "x_RFSH5", selectId: "ivf_stimulation_chart_x_RFSH5", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH5.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH6->Visible) { // RFSH6 ?>
    <div id="r_RFSH6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH6" for="x_RFSH6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH6"><?= $Page->RFSH6->caption() ?><?= $Page->RFSH6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH6"><span id="el_ivf_stimulation_chart_RFSH6">
    <select
        id="x_RFSH6"
        name="x_RFSH6"
        class="form-control ew-select<?= $Page->RFSH6->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH6"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH6"
        data-value-separator="<?= $Page->RFSH6->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH6->getPlaceHolder()) ?>"
        <?= $Page->RFSH6->editAttributes() ?>>
        <?= $Page->RFSH6->selectOptionListHtml("x_RFSH6") ?>
    </select>
    <?= $Page->RFSH6->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH6->getErrorMessage() ?></div>
<?= $Page->RFSH6->Lookup->getParamTag($Page, "p_x_RFSH6") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH6']"),
        options = { name: "x_RFSH6", selectId: "ivf_stimulation_chart_x_RFSH6", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH6.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH7->Visible) { // RFSH7 ?>
    <div id="r_RFSH7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH7" for="x_RFSH7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH7"><?= $Page->RFSH7->caption() ?><?= $Page->RFSH7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH7"><span id="el_ivf_stimulation_chart_RFSH7">
    <select
        id="x_RFSH7"
        name="x_RFSH7"
        class="form-control ew-select<?= $Page->RFSH7->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH7"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH7"
        data-value-separator="<?= $Page->RFSH7->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH7->getPlaceHolder()) ?>"
        <?= $Page->RFSH7->editAttributes() ?>>
        <?= $Page->RFSH7->selectOptionListHtml("x_RFSH7") ?>
    </select>
    <?= $Page->RFSH7->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH7->getErrorMessage() ?></div>
<?= $Page->RFSH7->Lookup->getParamTag($Page, "p_x_RFSH7") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH7']"),
        options = { name: "x_RFSH7", selectId: "ivf_stimulation_chart_x_RFSH7", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH7.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH8->Visible) { // RFSH8 ?>
    <div id="r_RFSH8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH8" for="x_RFSH8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH8"><?= $Page->RFSH8->caption() ?><?= $Page->RFSH8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH8"><span id="el_ivf_stimulation_chart_RFSH8">
    <select
        id="x_RFSH8"
        name="x_RFSH8"
        class="form-control ew-select<?= $Page->RFSH8->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH8"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH8"
        data-value-separator="<?= $Page->RFSH8->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH8->getPlaceHolder()) ?>"
        <?= $Page->RFSH8->editAttributes() ?>>
        <?= $Page->RFSH8->selectOptionListHtml("x_RFSH8") ?>
    </select>
    <?= $Page->RFSH8->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH8->getErrorMessage() ?></div>
<?= $Page->RFSH8->Lookup->getParamTag($Page, "p_x_RFSH8") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH8']"),
        options = { name: "x_RFSH8", selectId: "ivf_stimulation_chart_x_RFSH8", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH8.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH9->Visible) { // RFSH9 ?>
    <div id="r_RFSH9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH9" for="x_RFSH9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH9"><?= $Page->RFSH9->caption() ?><?= $Page->RFSH9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH9"><span id="el_ivf_stimulation_chart_RFSH9">
    <select
        id="x_RFSH9"
        name="x_RFSH9"
        class="form-control ew-select<?= $Page->RFSH9->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH9"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH9"
        data-value-separator="<?= $Page->RFSH9->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH9->getPlaceHolder()) ?>"
        <?= $Page->RFSH9->editAttributes() ?>>
        <?= $Page->RFSH9->selectOptionListHtml("x_RFSH9") ?>
    </select>
    <?= $Page->RFSH9->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH9->getErrorMessage() ?></div>
<?= $Page->RFSH9->Lookup->getParamTag($Page, "p_x_RFSH9") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH9']"),
        options = { name: "x_RFSH9", selectId: "ivf_stimulation_chart_x_RFSH9", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH9.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH10->Visible) { // RFSH10 ?>
    <div id="r_RFSH10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH10" for="x_RFSH10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH10"><?= $Page->RFSH10->caption() ?><?= $Page->RFSH10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH10"><span id="el_ivf_stimulation_chart_RFSH10">
    <select
        id="x_RFSH10"
        name="x_RFSH10"
        class="form-control ew-select<?= $Page->RFSH10->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH10"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH10"
        data-value-separator="<?= $Page->RFSH10->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH10->getPlaceHolder()) ?>"
        <?= $Page->RFSH10->editAttributes() ?>>
        <?= $Page->RFSH10->selectOptionListHtml("x_RFSH10") ?>
    </select>
    <?= $Page->RFSH10->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH10->getErrorMessage() ?></div>
<?= $Page->RFSH10->Lookup->getParamTag($Page, "p_x_RFSH10") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH10']"),
        options = { name: "x_RFSH10", selectId: "ivf_stimulation_chart_x_RFSH10", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH10.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH11->Visible) { // RFSH11 ?>
    <div id="r_RFSH11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH11" for="x_RFSH11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH11"><?= $Page->RFSH11->caption() ?><?= $Page->RFSH11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH11"><span id="el_ivf_stimulation_chart_RFSH11">
    <select
        id="x_RFSH11"
        name="x_RFSH11"
        class="form-control ew-select<?= $Page->RFSH11->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH11"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH11"
        data-value-separator="<?= $Page->RFSH11->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH11->getPlaceHolder()) ?>"
        <?= $Page->RFSH11->editAttributes() ?>>
        <?= $Page->RFSH11->selectOptionListHtml("x_RFSH11") ?>
    </select>
    <?= $Page->RFSH11->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH11->getErrorMessage() ?></div>
<?= $Page->RFSH11->Lookup->getParamTag($Page, "p_x_RFSH11") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH11']"),
        options = { name: "x_RFSH11", selectId: "ivf_stimulation_chart_x_RFSH11", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH11.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH12->Visible) { // RFSH12 ?>
    <div id="r_RFSH12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH12" for="x_RFSH12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH12"><?= $Page->RFSH12->caption() ?><?= $Page->RFSH12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH12"><span id="el_ivf_stimulation_chart_RFSH12">
    <select
        id="x_RFSH12"
        name="x_RFSH12"
        class="form-control ew-select<?= $Page->RFSH12->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH12"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH12"
        data-value-separator="<?= $Page->RFSH12->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH12->getPlaceHolder()) ?>"
        <?= $Page->RFSH12->editAttributes() ?>>
        <?= $Page->RFSH12->selectOptionListHtml("x_RFSH12") ?>
    </select>
    <?= $Page->RFSH12->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH12->getErrorMessage() ?></div>
<?= $Page->RFSH12->Lookup->getParamTag($Page, "p_x_RFSH12") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH12']"),
        options = { name: "x_RFSH12", selectId: "ivf_stimulation_chart_x_RFSH12", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH12.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH13->Visible) { // RFSH13 ?>
    <div id="r_RFSH13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH13" for="x_RFSH13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH13"><?= $Page->RFSH13->caption() ?><?= $Page->RFSH13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH13"><span id="el_ivf_stimulation_chart_RFSH13">
    <select
        id="x_RFSH13"
        name="x_RFSH13"
        class="form-control ew-select<?= $Page->RFSH13->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH13"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH13"
        data-value-separator="<?= $Page->RFSH13->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH13->getPlaceHolder()) ?>"
        <?= $Page->RFSH13->editAttributes() ?>>
        <?= $Page->RFSH13->selectOptionListHtml("x_RFSH13") ?>
    </select>
    <?= $Page->RFSH13->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH13->getErrorMessage() ?></div>
<?= $Page->RFSH13->Lookup->getParamTag($Page, "p_x_RFSH13") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH13']"),
        options = { name: "x_RFSH13", selectId: "ivf_stimulation_chart_x_RFSH13", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH13.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG1->Visible) { // HMG1 ?>
    <div id="r_HMG1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG1" for="x_HMG1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG1"><?= $Page->HMG1->caption() ?><?= $Page->HMG1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG1"><span id="el_ivf_stimulation_chart_HMG1">
<div class="input-group flex-nowrap">
    <select
        id="x_HMG1"
        name="x_HMG1"
        class="form-control ew-select<?= $Page->HMG1->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG1"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG1"
        data-value-separator="<?= $Page->HMG1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG1->getPlaceHolder()) ?>"
        <?= $Page->HMG1->editAttributes() ?>>
        <?= $Page->HMG1->selectOptionListHtml("x_HMG1") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_hmg") && !$Page->HMG1->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_HMG1" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->HMG1->caption() ?>" data-title="<?= $Page->HMG1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_HMG1',url:'<?= GetUrl("IvfStimulationHmgAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->HMG1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG1->getErrorMessage() ?></div>
<?= $Page->HMG1->Lookup->getParamTag($Page, "p_x_HMG1") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG1']"),
        options = { name: "x_HMG1", selectId: "ivf_stimulation_chart_x_HMG1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG2->Visible) { // HMG2 ?>
    <div id="r_HMG2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG2" for="x_HMG2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG2"><?= $Page->HMG2->caption() ?><?= $Page->HMG2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG2"><span id="el_ivf_stimulation_chart_HMG2">
    <select
        id="x_HMG2"
        name="x_HMG2"
        class="form-control ew-select<?= $Page->HMG2->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG2"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG2"
        data-value-separator="<?= $Page->HMG2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG2->getPlaceHolder()) ?>"
        <?= $Page->HMG2->editAttributes() ?>>
        <?= $Page->HMG2->selectOptionListHtml("x_HMG2") ?>
    </select>
    <?= $Page->HMG2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG2->getErrorMessage() ?></div>
<?= $Page->HMG2->Lookup->getParamTag($Page, "p_x_HMG2") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG2']"),
        options = { name: "x_HMG2", selectId: "ivf_stimulation_chart_x_HMG2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG3->Visible) { // HMG3 ?>
    <div id="r_HMG3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG3" for="x_HMG3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG3"><?= $Page->HMG3->caption() ?><?= $Page->HMG3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG3"><span id="el_ivf_stimulation_chart_HMG3">
    <select
        id="x_HMG3"
        name="x_HMG3"
        class="form-control ew-select<?= $Page->HMG3->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG3"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG3"
        data-value-separator="<?= $Page->HMG3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG3->getPlaceHolder()) ?>"
        <?= $Page->HMG3->editAttributes() ?>>
        <?= $Page->HMG3->selectOptionListHtml("x_HMG3") ?>
    </select>
    <?= $Page->HMG3->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG3->getErrorMessage() ?></div>
<?= $Page->HMG3->Lookup->getParamTag($Page, "p_x_HMG3") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG3']"),
        options = { name: "x_HMG3", selectId: "ivf_stimulation_chart_x_HMG3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG3.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG4->Visible) { // HMG4 ?>
    <div id="r_HMG4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG4" for="x_HMG4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG4"><?= $Page->HMG4->caption() ?><?= $Page->HMG4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG4"><span id="el_ivf_stimulation_chart_HMG4">
    <select
        id="x_HMG4"
        name="x_HMG4"
        class="form-control ew-select<?= $Page->HMG4->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG4"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG4"
        data-value-separator="<?= $Page->HMG4->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG4->getPlaceHolder()) ?>"
        <?= $Page->HMG4->editAttributes() ?>>
        <?= $Page->HMG4->selectOptionListHtml("x_HMG4") ?>
    </select>
    <?= $Page->HMG4->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG4->getErrorMessage() ?></div>
<?= $Page->HMG4->Lookup->getParamTag($Page, "p_x_HMG4") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG4']"),
        options = { name: "x_HMG4", selectId: "ivf_stimulation_chart_x_HMG4", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG4.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG5->Visible) { // HMG5 ?>
    <div id="r_HMG5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG5" for="x_HMG5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG5"><?= $Page->HMG5->caption() ?><?= $Page->HMG5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG5"><span id="el_ivf_stimulation_chart_HMG5">
    <select
        id="x_HMG5"
        name="x_HMG5"
        class="form-control ew-select<?= $Page->HMG5->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG5"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG5"
        data-value-separator="<?= $Page->HMG5->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG5->getPlaceHolder()) ?>"
        <?= $Page->HMG5->editAttributes() ?>>
        <?= $Page->HMG5->selectOptionListHtml("x_HMG5") ?>
    </select>
    <?= $Page->HMG5->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG5->getErrorMessage() ?></div>
<?= $Page->HMG5->Lookup->getParamTag($Page, "p_x_HMG5") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG5']"),
        options = { name: "x_HMG5", selectId: "ivf_stimulation_chart_x_HMG5", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG5.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG6->Visible) { // HMG6 ?>
    <div id="r_HMG6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG6" for="x_HMG6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG6"><?= $Page->HMG6->caption() ?><?= $Page->HMG6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG6"><span id="el_ivf_stimulation_chart_HMG6">
    <select
        id="x_HMG6"
        name="x_HMG6"
        class="form-control ew-select<?= $Page->HMG6->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG6"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG6"
        data-value-separator="<?= $Page->HMG6->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG6->getPlaceHolder()) ?>"
        <?= $Page->HMG6->editAttributes() ?>>
        <?= $Page->HMG6->selectOptionListHtml("x_HMG6") ?>
    </select>
    <?= $Page->HMG6->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG6->getErrorMessage() ?></div>
<?= $Page->HMG6->Lookup->getParamTag($Page, "p_x_HMG6") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG6']"),
        options = { name: "x_HMG6", selectId: "ivf_stimulation_chart_x_HMG6", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG6.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG7->Visible) { // HMG7 ?>
    <div id="r_HMG7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG7" for="x_HMG7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG7"><?= $Page->HMG7->caption() ?><?= $Page->HMG7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG7"><span id="el_ivf_stimulation_chart_HMG7">
    <select
        id="x_HMG7"
        name="x_HMG7"
        class="form-control ew-select<?= $Page->HMG7->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG7"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG7"
        data-value-separator="<?= $Page->HMG7->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG7->getPlaceHolder()) ?>"
        <?= $Page->HMG7->editAttributes() ?>>
        <?= $Page->HMG7->selectOptionListHtml("x_HMG7") ?>
    </select>
    <?= $Page->HMG7->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG7->getErrorMessage() ?></div>
<?= $Page->HMG7->Lookup->getParamTag($Page, "p_x_HMG7") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG7']"),
        options = { name: "x_HMG7", selectId: "ivf_stimulation_chart_x_HMG7", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG7.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG8->Visible) { // HMG8 ?>
    <div id="r_HMG8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG8" for="x_HMG8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG8"><?= $Page->HMG8->caption() ?><?= $Page->HMG8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG8"><span id="el_ivf_stimulation_chart_HMG8">
    <select
        id="x_HMG8"
        name="x_HMG8"
        class="form-control ew-select<?= $Page->HMG8->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG8"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG8"
        data-value-separator="<?= $Page->HMG8->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG8->getPlaceHolder()) ?>"
        <?= $Page->HMG8->editAttributes() ?>>
        <?= $Page->HMG8->selectOptionListHtml("x_HMG8") ?>
    </select>
    <?= $Page->HMG8->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG8->getErrorMessage() ?></div>
<?= $Page->HMG8->Lookup->getParamTag($Page, "p_x_HMG8") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG8']"),
        options = { name: "x_HMG8", selectId: "ivf_stimulation_chart_x_HMG8", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG8.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG9->Visible) { // HMG9 ?>
    <div id="r_HMG9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG9" for="x_HMG9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG9"><?= $Page->HMG9->caption() ?><?= $Page->HMG9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG9"><span id="el_ivf_stimulation_chart_HMG9">
    <select
        id="x_HMG9"
        name="x_HMG9"
        class="form-control ew-select<?= $Page->HMG9->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG9"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG9"
        data-value-separator="<?= $Page->HMG9->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG9->getPlaceHolder()) ?>"
        <?= $Page->HMG9->editAttributes() ?>>
        <?= $Page->HMG9->selectOptionListHtml("x_HMG9") ?>
    </select>
    <?= $Page->HMG9->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG9->getErrorMessage() ?></div>
<?= $Page->HMG9->Lookup->getParamTag($Page, "p_x_HMG9") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG9']"),
        options = { name: "x_HMG9", selectId: "ivf_stimulation_chart_x_HMG9", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG9.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG10->Visible) { // HMG10 ?>
    <div id="r_HMG10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG10" for="x_HMG10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG10"><?= $Page->HMG10->caption() ?><?= $Page->HMG10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG10"><span id="el_ivf_stimulation_chart_HMG10">
    <select
        id="x_HMG10"
        name="x_HMG10"
        class="form-control ew-select<?= $Page->HMG10->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG10"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG10"
        data-value-separator="<?= $Page->HMG10->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG10->getPlaceHolder()) ?>"
        <?= $Page->HMG10->editAttributes() ?>>
        <?= $Page->HMG10->selectOptionListHtml("x_HMG10") ?>
    </select>
    <?= $Page->HMG10->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG10->getErrorMessage() ?></div>
<?= $Page->HMG10->Lookup->getParamTag($Page, "p_x_HMG10") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG10']"),
        options = { name: "x_HMG10", selectId: "ivf_stimulation_chart_x_HMG10", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG10.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG11->Visible) { // HMG11 ?>
    <div id="r_HMG11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG11" for="x_HMG11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG11"><?= $Page->HMG11->caption() ?><?= $Page->HMG11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG11"><span id="el_ivf_stimulation_chart_HMG11">
    <select
        id="x_HMG11"
        name="x_HMG11"
        class="form-control ew-select<?= $Page->HMG11->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG11"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG11"
        data-value-separator="<?= $Page->HMG11->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG11->getPlaceHolder()) ?>"
        <?= $Page->HMG11->editAttributes() ?>>
        <?= $Page->HMG11->selectOptionListHtml("x_HMG11") ?>
    </select>
    <?= $Page->HMG11->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG11->getErrorMessage() ?></div>
<?= $Page->HMG11->Lookup->getParamTag($Page, "p_x_HMG11") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG11']"),
        options = { name: "x_HMG11", selectId: "ivf_stimulation_chart_x_HMG11", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG11.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG12->Visible) { // HMG12 ?>
    <div id="r_HMG12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG12" for="x_HMG12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG12"><?= $Page->HMG12->caption() ?><?= $Page->HMG12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG12"><span id="el_ivf_stimulation_chart_HMG12">
    <select
        id="x_HMG12"
        name="x_HMG12"
        class="form-control ew-select<?= $Page->HMG12->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG12"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG12"
        data-value-separator="<?= $Page->HMG12->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG12->getPlaceHolder()) ?>"
        <?= $Page->HMG12->editAttributes() ?>>
        <?= $Page->HMG12->selectOptionListHtml("x_HMG12") ?>
    </select>
    <?= $Page->HMG12->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG12->getErrorMessage() ?></div>
<?= $Page->HMG12->Lookup->getParamTag($Page, "p_x_HMG12") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG12']"),
        options = { name: "x_HMG12", selectId: "ivf_stimulation_chart_x_HMG12", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG12.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG13->Visible) { // HMG13 ?>
    <div id="r_HMG13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG13" for="x_HMG13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG13"><?= $Page->HMG13->caption() ?><?= $Page->HMG13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG13"><span id="el_ivf_stimulation_chart_HMG13">
    <select
        id="x_HMG13"
        name="x_HMG13"
        class="form-control ew-select<?= $Page->HMG13->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG13"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG13"
        data-value-separator="<?= $Page->HMG13->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG13->getPlaceHolder()) ?>"
        <?= $Page->HMG13->editAttributes() ?>>
        <?= $Page->HMG13->selectOptionListHtml("x_HMG13") ?>
    </select>
    <?= $Page->HMG13->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG13->getErrorMessage() ?></div>
<?= $Page->HMG13->Lookup->getParamTag($Page, "p_x_HMG13") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG13']"),
        options = { name: "x_HMG13", selectId: "ivf_stimulation_chart_x_HMG13", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG13.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH1->Visible) { // GnRH1 ?>
    <div id="r_GnRH1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH1" for="x_GnRH1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH1"><?= $Page->GnRH1->caption() ?><?= $Page->GnRH1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH1"><span id="el_ivf_stimulation_chart_GnRH1">
<div class="input-group flex-nowrap">
    <select
        id="x_GnRH1"
        name="x_GnRH1"
        class="form-control ew-select<?= $Page->GnRH1->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH1"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH1"
        data-value-separator="<?= $Page->GnRH1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH1->getPlaceHolder()) ?>"
        <?= $Page->GnRH1->editAttributes() ?>>
        <?= $Page->GnRH1->selectOptionListHtml("x_GnRH1") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_gnrh") && !$Page->GnRH1->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_GnRH1" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->GnRH1->caption() ?>" data-title="<?= $Page->GnRH1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_GnRH1',url:'<?= GetUrl("IvfStimulationGnrhAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->GnRH1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH1->getErrorMessage() ?></div>
<?= $Page->GnRH1->Lookup->getParamTag($Page, "p_x_GnRH1") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH1']"),
        options = { name: "x_GnRH1", selectId: "ivf_stimulation_chart_x_GnRH1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH2->Visible) { // GnRH2 ?>
    <div id="r_GnRH2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH2" for="x_GnRH2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH2"><?= $Page->GnRH2->caption() ?><?= $Page->GnRH2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH2"><span id="el_ivf_stimulation_chart_GnRH2">
    <select
        id="x_GnRH2"
        name="x_GnRH2"
        class="form-control ew-select<?= $Page->GnRH2->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH2"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH2"
        data-value-separator="<?= $Page->GnRH2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH2->getPlaceHolder()) ?>"
        <?= $Page->GnRH2->editAttributes() ?>>
        <?= $Page->GnRH2->selectOptionListHtml("x_GnRH2") ?>
    </select>
    <?= $Page->GnRH2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH2->getErrorMessage() ?></div>
<?= $Page->GnRH2->Lookup->getParamTag($Page, "p_x_GnRH2") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH2']"),
        options = { name: "x_GnRH2", selectId: "ivf_stimulation_chart_x_GnRH2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH3->Visible) { // GnRH3 ?>
    <div id="r_GnRH3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH3" for="x_GnRH3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH3"><?= $Page->GnRH3->caption() ?><?= $Page->GnRH3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH3"><span id="el_ivf_stimulation_chart_GnRH3">
    <select
        id="x_GnRH3"
        name="x_GnRH3"
        class="form-control ew-select<?= $Page->GnRH3->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH3"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH3"
        data-value-separator="<?= $Page->GnRH3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH3->getPlaceHolder()) ?>"
        <?= $Page->GnRH3->editAttributes() ?>>
        <?= $Page->GnRH3->selectOptionListHtml("x_GnRH3") ?>
    </select>
    <?= $Page->GnRH3->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH3->getErrorMessage() ?></div>
<?= $Page->GnRH3->Lookup->getParamTag($Page, "p_x_GnRH3") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH3']"),
        options = { name: "x_GnRH3", selectId: "ivf_stimulation_chart_x_GnRH3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH3.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH4->Visible) { // GnRH4 ?>
    <div id="r_GnRH4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH4" for="x_GnRH4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH4"><?= $Page->GnRH4->caption() ?><?= $Page->GnRH4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH4"><span id="el_ivf_stimulation_chart_GnRH4">
    <select
        id="x_GnRH4"
        name="x_GnRH4"
        class="form-control ew-select<?= $Page->GnRH4->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH4"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH4"
        data-value-separator="<?= $Page->GnRH4->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH4->getPlaceHolder()) ?>"
        <?= $Page->GnRH4->editAttributes() ?>>
        <?= $Page->GnRH4->selectOptionListHtml("x_GnRH4") ?>
    </select>
    <?= $Page->GnRH4->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH4->getErrorMessage() ?></div>
<?= $Page->GnRH4->Lookup->getParamTag($Page, "p_x_GnRH4") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH4']"),
        options = { name: "x_GnRH4", selectId: "ivf_stimulation_chart_x_GnRH4", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH4.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH5->Visible) { // GnRH5 ?>
    <div id="r_GnRH5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH5" for="x_GnRH5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH5"><?= $Page->GnRH5->caption() ?><?= $Page->GnRH5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH5"><span id="el_ivf_stimulation_chart_GnRH5">
    <select
        id="x_GnRH5"
        name="x_GnRH5"
        class="form-control ew-select<?= $Page->GnRH5->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH5"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH5"
        data-value-separator="<?= $Page->GnRH5->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH5->getPlaceHolder()) ?>"
        <?= $Page->GnRH5->editAttributes() ?>>
        <?= $Page->GnRH5->selectOptionListHtml("x_GnRH5") ?>
    </select>
    <?= $Page->GnRH5->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH5->getErrorMessage() ?></div>
<?= $Page->GnRH5->Lookup->getParamTag($Page, "p_x_GnRH5") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH5']"),
        options = { name: "x_GnRH5", selectId: "ivf_stimulation_chart_x_GnRH5", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH5.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH6->Visible) { // GnRH6 ?>
    <div id="r_GnRH6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH6" for="x_GnRH6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH6"><?= $Page->GnRH6->caption() ?><?= $Page->GnRH6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH6"><span id="el_ivf_stimulation_chart_GnRH6">
    <select
        id="x_GnRH6"
        name="x_GnRH6"
        class="form-control ew-select<?= $Page->GnRH6->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH6"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH6"
        data-value-separator="<?= $Page->GnRH6->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH6->getPlaceHolder()) ?>"
        <?= $Page->GnRH6->editAttributes() ?>>
        <?= $Page->GnRH6->selectOptionListHtml("x_GnRH6") ?>
    </select>
    <?= $Page->GnRH6->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH6->getErrorMessage() ?></div>
<?= $Page->GnRH6->Lookup->getParamTag($Page, "p_x_GnRH6") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH6']"),
        options = { name: "x_GnRH6", selectId: "ivf_stimulation_chart_x_GnRH6", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH6.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH7->Visible) { // GnRH7 ?>
    <div id="r_GnRH7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH7" for="x_GnRH7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH7"><?= $Page->GnRH7->caption() ?><?= $Page->GnRH7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH7"><span id="el_ivf_stimulation_chart_GnRH7">
    <select
        id="x_GnRH7"
        name="x_GnRH7"
        class="form-control ew-select<?= $Page->GnRH7->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH7"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH7"
        data-value-separator="<?= $Page->GnRH7->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH7->getPlaceHolder()) ?>"
        <?= $Page->GnRH7->editAttributes() ?>>
        <?= $Page->GnRH7->selectOptionListHtml("x_GnRH7") ?>
    </select>
    <?= $Page->GnRH7->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH7->getErrorMessage() ?></div>
<?= $Page->GnRH7->Lookup->getParamTag($Page, "p_x_GnRH7") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH7']"),
        options = { name: "x_GnRH7", selectId: "ivf_stimulation_chart_x_GnRH7", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH7.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH8->Visible) { // GnRH8 ?>
    <div id="r_GnRH8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH8" for="x_GnRH8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH8"><?= $Page->GnRH8->caption() ?><?= $Page->GnRH8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH8"><span id="el_ivf_stimulation_chart_GnRH8">
    <select
        id="x_GnRH8"
        name="x_GnRH8"
        class="form-control ew-select<?= $Page->GnRH8->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH8"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH8"
        data-value-separator="<?= $Page->GnRH8->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH8->getPlaceHolder()) ?>"
        <?= $Page->GnRH8->editAttributes() ?>>
        <?= $Page->GnRH8->selectOptionListHtml("x_GnRH8") ?>
    </select>
    <?= $Page->GnRH8->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH8->getErrorMessage() ?></div>
<?= $Page->GnRH8->Lookup->getParamTag($Page, "p_x_GnRH8") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH8']"),
        options = { name: "x_GnRH8", selectId: "ivf_stimulation_chart_x_GnRH8", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH8.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH9->Visible) { // GnRH9 ?>
    <div id="r_GnRH9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH9" for="x_GnRH9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH9"><?= $Page->GnRH9->caption() ?><?= $Page->GnRH9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH9"><span id="el_ivf_stimulation_chart_GnRH9">
    <select
        id="x_GnRH9"
        name="x_GnRH9"
        class="form-control ew-select<?= $Page->GnRH9->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH9"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH9"
        data-value-separator="<?= $Page->GnRH9->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH9->getPlaceHolder()) ?>"
        <?= $Page->GnRH9->editAttributes() ?>>
        <?= $Page->GnRH9->selectOptionListHtml("x_GnRH9") ?>
    </select>
    <?= $Page->GnRH9->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH9->getErrorMessage() ?></div>
<?= $Page->GnRH9->Lookup->getParamTag($Page, "p_x_GnRH9") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH9']"),
        options = { name: "x_GnRH9", selectId: "ivf_stimulation_chart_x_GnRH9", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH9.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH10->Visible) { // GnRH10 ?>
    <div id="r_GnRH10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH10" for="x_GnRH10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH10"><?= $Page->GnRH10->caption() ?><?= $Page->GnRH10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH10"><span id="el_ivf_stimulation_chart_GnRH10">
    <select
        id="x_GnRH10"
        name="x_GnRH10"
        class="form-control ew-select<?= $Page->GnRH10->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH10"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH10"
        data-value-separator="<?= $Page->GnRH10->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH10->getPlaceHolder()) ?>"
        <?= $Page->GnRH10->editAttributes() ?>>
        <?= $Page->GnRH10->selectOptionListHtml("x_GnRH10") ?>
    </select>
    <?= $Page->GnRH10->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH10->getErrorMessage() ?></div>
<?= $Page->GnRH10->Lookup->getParamTag($Page, "p_x_GnRH10") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH10']"),
        options = { name: "x_GnRH10", selectId: "ivf_stimulation_chart_x_GnRH10", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH10.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH11->Visible) { // GnRH11 ?>
    <div id="r_GnRH11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH11" for="x_GnRH11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH11"><?= $Page->GnRH11->caption() ?><?= $Page->GnRH11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH11"><span id="el_ivf_stimulation_chart_GnRH11">
    <select
        id="x_GnRH11"
        name="x_GnRH11"
        class="form-control ew-select<?= $Page->GnRH11->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH11"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH11"
        data-value-separator="<?= $Page->GnRH11->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH11->getPlaceHolder()) ?>"
        <?= $Page->GnRH11->editAttributes() ?>>
        <?= $Page->GnRH11->selectOptionListHtml("x_GnRH11") ?>
    </select>
    <?= $Page->GnRH11->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH11->getErrorMessage() ?></div>
<?= $Page->GnRH11->Lookup->getParamTag($Page, "p_x_GnRH11") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH11']"),
        options = { name: "x_GnRH11", selectId: "ivf_stimulation_chart_x_GnRH11", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH11.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH12->Visible) { // GnRH12 ?>
    <div id="r_GnRH12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH12" for="x_GnRH12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH12"><?= $Page->GnRH12->caption() ?><?= $Page->GnRH12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH12"><span id="el_ivf_stimulation_chart_GnRH12">
    <select
        id="x_GnRH12"
        name="x_GnRH12"
        class="form-control ew-select<?= $Page->GnRH12->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH12"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH12"
        data-value-separator="<?= $Page->GnRH12->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH12->getPlaceHolder()) ?>"
        <?= $Page->GnRH12->editAttributes() ?>>
        <?= $Page->GnRH12->selectOptionListHtml("x_GnRH12") ?>
    </select>
    <?= $Page->GnRH12->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH12->getErrorMessage() ?></div>
<?= $Page->GnRH12->Lookup->getParamTag($Page, "p_x_GnRH12") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH12']"),
        options = { name: "x_GnRH12", selectId: "ivf_stimulation_chart_x_GnRH12", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH12.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH13->Visible) { // GnRH13 ?>
    <div id="r_GnRH13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH13" for="x_GnRH13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH13"><?= $Page->GnRH13->caption() ?><?= $Page->GnRH13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH13"><span id="el_ivf_stimulation_chart_GnRH13">
    <select
        id="x_GnRH13"
        name="x_GnRH13"
        class="form-control ew-select<?= $Page->GnRH13->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH13"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH13"
        data-value-separator="<?= $Page->GnRH13->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH13->getPlaceHolder()) ?>"
        <?= $Page->GnRH13->editAttributes() ?>>
        <?= $Page->GnRH13->selectOptionListHtml("x_GnRH13") ?>
    </select>
    <?= $Page->GnRH13->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH13->getErrorMessage() ?></div>
<?= $Page->GnRH13->Lookup->getParamTag($Page, "p_x_GnRH13") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH13']"),
        options = { name: "x_GnRH13", selectId: "ivf_stimulation_chart_x_GnRH13", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH13.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E21->Visible) { // E21 ?>
    <div id="r_E21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E21" for="x_E21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E21"><?= $Page->E21->caption() ?><?= $Page->E21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E21"><span id="el_ivf_stimulation_chart_E21">
<input type="<?= $Page->E21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E21" name="x_E21" id="x_E21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E21->getPlaceHolder()) ?>" value="<?= $Page->E21->EditValue ?>"<?= $Page->E21->editAttributes() ?> aria-describedby="x_E21_help">
<?= $Page->E21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E21->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E22->Visible) { // E22 ?>
    <div id="r_E22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E22" for="x_E22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E22"><?= $Page->E22->caption() ?><?= $Page->E22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E22"><span id="el_ivf_stimulation_chart_E22">
<input type="<?= $Page->E22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E22" name="x_E22" id="x_E22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E22->getPlaceHolder()) ?>" value="<?= $Page->E22->EditValue ?>"<?= $Page->E22->editAttributes() ?> aria-describedby="x_E22_help">
<?= $Page->E22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E22->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E23->Visible) { // E23 ?>
    <div id="r_E23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E23" for="x_E23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E23"><?= $Page->E23->caption() ?><?= $Page->E23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E23"><span id="el_ivf_stimulation_chart_E23">
<input type="<?= $Page->E23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E23" name="x_E23" id="x_E23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E23->getPlaceHolder()) ?>" value="<?= $Page->E23->EditValue ?>"<?= $Page->E23->editAttributes() ?> aria-describedby="x_E23_help">
<?= $Page->E23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E23->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E24->Visible) { // E24 ?>
    <div id="r_E24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E24" for="x_E24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E24"><?= $Page->E24->caption() ?><?= $Page->E24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E24"><span id="el_ivf_stimulation_chart_E24">
<input type="<?= $Page->E24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E24" name="x_E24" id="x_E24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E24->getPlaceHolder()) ?>" value="<?= $Page->E24->EditValue ?>"<?= $Page->E24->editAttributes() ?> aria-describedby="x_E24_help">
<?= $Page->E24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E24->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E25->Visible) { // E25 ?>
    <div id="r_E25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E25" for="x_E25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E25"><?= $Page->E25->caption() ?><?= $Page->E25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E25"><span id="el_ivf_stimulation_chart_E25">
<input type="<?= $Page->E25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E25" name="x_E25" id="x_E25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E25->getPlaceHolder()) ?>" value="<?= $Page->E25->EditValue ?>"<?= $Page->E25->editAttributes() ?> aria-describedby="x_E25_help">
<?= $Page->E25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E25->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E26->Visible) { // E26 ?>
    <div id="r_E26" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E26" for="x_E26" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E26"><?= $Page->E26->caption() ?><?= $Page->E26->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E26->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E26"><span id="el_ivf_stimulation_chart_E26">
<input type="<?= $Page->E26->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E26" name="x_E26" id="x_E26" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E26->getPlaceHolder()) ?>" value="<?= $Page->E26->EditValue ?>"<?= $Page->E26->editAttributes() ?> aria-describedby="x_E26_help">
<?= $Page->E26->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E26->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E27->Visible) { // E27 ?>
    <div id="r_E27" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E27" for="x_E27" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E27"><?= $Page->E27->caption() ?><?= $Page->E27->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E27->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E27"><span id="el_ivf_stimulation_chart_E27">
<input type="<?= $Page->E27->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E27" name="x_E27" id="x_E27" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E27->getPlaceHolder()) ?>" value="<?= $Page->E27->EditValue ?>"<?= $Page->E27->editAttributes() ?> aria-describedby="x_E27_help">
<?= $Page->E27->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E27->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E28->Visible) { // E28 ?>
    <div id="r_E28" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E28" for="x_E28" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E28"><?= $Page->E28->caption() ?><?= $Page->E28->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E28->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E28"><span id="el_ivf_stimulation_chart_E28">
<input type="<?= $Page->E28->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E28" name="x_E28" id="x_E28" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E28->getPlaceHolder()) ?>" value="<?= $Page->E28->EditValue ?>"<?= $Page->E28->editAttributes() ?> aria-describedby="x_E28_help">
<?= $Page->E28->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E28->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E29->Visible) { // E29 ?>
    <div id="r_E29" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E29" for="x_E29" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E29"><?= $Page->E29->caption() ?><?= $Page->E29->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E29->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E29"><span id="el_ivf_stimulation_chart_E29">
<input type="<?= $Page->E29->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E29" name="x_E29" id="x_E29" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E29->getPlaceHolder()) ?>" value="<?= $Page->E29->EditValue ?>"<?= $Page->E29->editAttributes() ?> aria-describedby="x_E29_help">
<?= $Page->E29->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E29->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E210->Visible) { // E210 ?>
    <div id="r_E210" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E210" for="x_E210" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E210"><?= $Page->E210->caption() ?><?= $Page->E210->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E210->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E210"><span id="el_ivf_stimulation_chart_E210">
<input type="<?= $Page->E210->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E210" name="x_E210" id="x_E210" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E210->getPlaceHolder()) ?>" value="<?= $Page->E210->EditValue ?>"<?= $Page->E210->editAttributes() ?> aria-describedby="x_E210_help">
<?= $Page->E210->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E210->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E211->Visible) { // E211 ?>
    <div id="r_E211" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E211" for="x_E211" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E211"><?= $Page->E211->caption() ?><?= $Page->E211->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E211->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E211"><span id="el_ivf_stimulation_chart_E211">
<input type="<?= $Page->E211->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E211" name="x_E211" id="x_E211" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E211->getPlaceHolder()) ?>" value="<?= $Page->E211->EditValue ?>"<?= $Page->E211->editAttributes() ?> aria-describedby="x_E211_help">
<?= $Page->E211->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E211->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E212->Visible) { // E212 ?>
    <div id="r_E212" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E212" for="x_E212" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E212"><?= $Page->E212->caption() ?><?= $Page->E212->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E212->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E212"><span id="el_ivf_stimulation_chart_E212">
<input type="<?= $Page->E212->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E212" name="x_E212" id="x_E212" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E212->getPlaceHolder()) ?>" value="<?= $Page->E212->EditValue ?>"<?= $Page->E212->editAttributes() ?> aria-describedby="x_E212_help">
<?= $Page->E212->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E212->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E213->Visible) { // E213 ?>
    <div id="r_E213" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E213" for="x_E213" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E213"><?= $Page->E213->caption() ?><?= $Page->E213->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E213->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E213"><span id="el_ivf_stimulation_chart_E213">
<input type="<?= $Page->E213->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E213" name="x_E213" id="x_E213" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E213->getPlaceHolder()) ?>" value="<?= $Page->E213->EditValue ?>"<?= $Page->E213->editAttributes() ?> aria-describedby="x_E213_help">
<?= $Page->E213->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E213->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P41->Visible) { // P41 ?>
    <div id="r_P41" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P41" for="x_P41" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P41"><?= $Page->P41->caption() ?><?= $Page->P41->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P41->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P41"><span id="el_ivf_stimulation_chart_P41">
<input type="<?= $Page->P41->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P41" name="x_P41" id="x_P41" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P41->getPlaceHolder()) ?>" value="<?= $Page->P41->EditValue ?>"<?= $Page->P41->editAttributes() ?> aria-describedby="x_P41_help">
<?= $Page->P41->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P41->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P42->Visible) { // P42 ?>
    <div id="r_P42" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P42" for="x_P42" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P42"><?= $Page->P42->caption() ?><?= $Page->P42->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P42->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P42"><span id="el_ivf_stimulation_chart_P42">
<input type="<?= $Page->P42->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P42" name="x_P42" id="x_P42" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P42->getPlaceHolder()) ?>" value="<?= $Page->P42->EditValue ?>"<?= $Page->P42->editAttributes() ?> aria-describedby="x_P42_help">
<?= $Page->P42->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P42->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P43->Visible) { // P43 ?>
    <div id="r_P43" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P43" for="x_P43" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P43"><?= $Page->P43->caption() ?><?= $Page->P43->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P43->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P43"><span id="el_ivf_stimulation_chart_P43">
<input type="<?= $Page->P43->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P43" name="x_P43" id="x_P43" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P43->getPlaceHolder()) ?>" value="<?= $Page->P43->EditValue ?>"<?= $Page->P43->editAttributes() ?> aria-describedby="x_P43_help">
<?= $Page->P43->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P43->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P44->Visible) { // P44 ?>
    <div id="r_P44" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P44" for="x_P44" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P44"><?= $Page->P44->caption() ?><?= $Page->P44->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P44->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P44"><span id="el_ivf_stimulation_chart_P44">
<input type="<?= $Page->P44->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P44" name="x_P44" id="x_P44" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P44->getPlaceHolder()) ?>" value="<?= $Page->P44->EditValue ?>"<?= $Page->P44->editAttributes() ?> aria-describedby="x_P44_help">
<?= $Page->P44->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P44->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P45->Visible) { // P45 ?>
    <div id="r_P45" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P45" for="x_P45" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P45"><?= $Page->P45->caption() ?><?= $Page->P45->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P45->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P45"><span id="el_ivf_stimulation_chart_P45">
<input type="<?= $Page->P45->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P45" name="x_P45" id="x_P45" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P45->getPlaceHolder()) ?>" value="<?= $Page->P45->EditValue ?>"<?= $Page->P45->editAttributes() ?> aria-describedby="x_P45_help">
<?= $Page->P45->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P45->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P46->Visible) { // P46 ?>
    <div id="r_P46" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P46" for="x_P46" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P46"><?= $Page->P46->caption() ?><?= $Page->P46->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P46->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P46"><span id="el_ivf_stimulation_chart_P46">
<input type="<?= $Page->P46->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P46" name="x_P46" id="x_P46" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P46->getPlaceHolder()) ?>" value="<?= $Page->P46->EditValue ?>"<?= $Page->P46->editAttributes() ?> aria-describedby="x_P46_help">
<?= $Page->P46->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P46->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P47->Visible) { // P47 ?>
    <div id="r_P47" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P47" for="x_P47" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P47"><?= $Page->P47->caption() ?><?= $Page->P47->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P47->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P47"><span id="el_ivf_stimulation_chart_P47">
<input type="<?= $Page->P47->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P47" name="x_P47" id="x_P47" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P47->getPlaceHolder()) ?>" value="<?= $Page->P47->EditValue ?>"<?= $Page->P47->editAttributes() ?> aria-describedby="x_P47_help">
<?= $Page->P47->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P47->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P48->Visible) { // P48 ?>
    <div id="r_P48" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P48" for="x_P48" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P48"><?= $Page->P48->caption() ?><?= $Page->P48->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P48->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P48"><span id="el_ivf_stimulation_chart_P48">
<input type="<?= $Page->P48->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P48" name="x_P48" id="x_P48" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P48->getPlaceHolder()) ?>" value="<?= $Page->P48->EditValue ?>"<?= $Page->P48->editAttributes() ?> aria-describedby="x_P48_help">
<?= $Page->P48->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P48->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P49->Visible) { // P49 ?>
    <div id="r_P49" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P49" for="x_P49" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P49"><?= $Page->P49->caption() ?><?= $Page->P49->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P49->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P49"><span id="el_ivf_stimulation_chart_P49">
<input type="<?= $Page->P49->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P49" name="x_P49" id="x_P49" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P49->getPlaceHolder()) ?>" value="<?= $Page->P49->EditValue ?>"<?= $Page->P49->editAttributes() ?> aria-describedby="x_P49_help">
<?= $Page->P49->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P49->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P410->Visible) { // P410 ?>
    <div id="r_P410" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P410" for="x_P410" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P410"><?= $Page->P410->caption() ?><?= $Page->P410->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P410->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P410"><span id="el_ivf_stimulation_chart_P410">
<input type="<?= $Page->P410->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P410" name="x_P410" id="x_P410" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P410->getPlaceHolder()) ?>" value="<?= $Page->P410->EditValue ?>"<?= $Page->P410->editAttributes() ?> aria-describedby="x_P410_help">
<?= $Page->P410->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P410->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P411->Visible) { // P411 ?>
    <div id="r_P411" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P411" for="x_P411" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P411"><?= $Page->P411->caption() ?><?= $Page->P411->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P411->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P411"><span id="el_ivf_stimulation_chart_P411">
<input type="<?= $Page->P411->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P411" name="x_P411" id="x_P411" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P411->getPlaceHolder()) ?>" value="<?= $Page->P411->EditValue ?>"<?= $Page->P411->editAttributes() ?> aria-describedby="x_P411_help">
<?= $Page->P411->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P411->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P412->Visible) { // P412 ?>
    <div id="r_P412" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P412" for="x_P412" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P412"><?= $Page->P412->caption() ?><?= $Page->P412->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P412->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P412"><span id="el_ivf_stimulation_chart_P412">
<input type="<?= $Page->P412->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P412" name="x_P412" id="x_P412" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P412->getPlaceHolder()) ?>" value="<?= $Page->P412->EditValue ?>"<?= $Page->P412->editAttributes() ?> aria-describedby="x_P412_help">
<?= $Page->P412->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P412->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P413->Visible) { // P413 ?>
    <div id="r_P413" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P413" for="x_P413" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P413"><?= $Page->P413->caption() ?><?= $Page->P413->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P413->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P413"><span id="el_ivf_stimulation_chart_P413">
<input type="<?= $Page->P413->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P413" name="x_P413" id="x_P413" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P413->getPlaceHolder()) ?>" value="<?= $Page->P413->EditValue ?>"<?= $Page->P413->editAttributes() ?> aria-describedby="x_P413_help">
<?= $Page->P413->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P413->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt1->Visible) { // USGRt1 ?>
    <div id="r_USGRt1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt1" for="x_USGRt1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt1"><?= $Page->USGRt1->caption() ?><?= $Page->USGRt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt1"><span id="el_ivf_stimulation_chart_USGRt1">
<input type="<?= $Page->USGRt1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt1" name="x_USGRt1" id="x_USGRt1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt1->getPlaceHolder()) ?>" value="<?= $Page->USGRt1->EditValue ?>"<?= $Page->USGRt1->editAttributes() ?> aria-describedby="x_USGRt1_help">
<?= $Page->USGRt1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt2->Visible) { // USGRt2 ?>
    <div id="r_USGRt2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt2" for="x_USGRt2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt2"><?= $Page->USGRt2->caption() ?><?= $Page->USGRt2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt2"><span id="el_ivf_stimulation_chart_USGRt2">
<input type="<?= $Page->USGRt2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt2" name="x_USGRt2" id="x_USGRt2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt2->getPlaceHolder()) ?>" value="<?= $Page->USGRt2->EditValue ?>"<?= $Page->USGRt2->editAttributes() ?> aria-describedby="x_USGRt2_help">
<?= $Page->USGRt2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt3->Visible) { // USGRt3 ?>
    <div id="r_USGRt3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt3" for="x_USGRt3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt3"><?= $Page->USGRt3->caption() ?><?= $Page->USGRt3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt3"><span id="el_ivf_stimulation_chart_USGRt3">
<input type="<?= $Page->USGRt3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt3" name="x_USGRt3" id="x_USGRt3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt3->getPlaceHolder()) ?>" value="<?= $Page->USGRt3->EditValue ?>"<?= $Page->USGRt3->editAttributes() ?> aria-describedby="x_USGRt3_help">
<?= $Page->USGRt3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt4->Visible) { // USGRt4 ?>
    <div id="r_USGRt4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt4" for="x_USGRt4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt4"><?= $Page->USGRt4->caption() ?><?= $Page->USGRt4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt4"><span id="el_ivf_stimulation_chart_USGRt4">
<input type="<?= $Page->USGRt4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt4" name="x_USGRt4" id="x_USGRt4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt4->getPlaceHolder()) ?>" value="<?= $Page->USGRt4->EditValue ?>"<?= $Page->USGRt4->editAttributes() ?> aria-describedby="x_USGRt4_help">
<?= $Page->USGRt4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt5->Visible) { // USGRt5 ?>
    <div id="r_USGRt5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt5" for="x_USGRt5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt5"><?= $Page->USGRt5->caption() ?><?= $Page->USGRt5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt5"><span id="el_ivf_stimulation_chart_USGRt5">
<input type="<?= $Page->USGRt5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt5" name="x_USGRt5" id="x_USGRt5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt5->getPlaceHolder()) ?>" value="<?= $Page->USGRt5->EditValue ?>"<?= $Page->USGRt5->editAttributes() ?> aria-describedby="x_USGRt5_help">
<?= $Page->USGRt5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt5->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt6->Visible) { // USGRt6 ?>
    <div id="r_USGRt6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt6" for="x_USGRt6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt6"><?= $Page->USGRt6->caption() ?><?= $Page->USGRt6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt6"><span id="el_ivf_stimulation_chart_USGRt6">
<input type="<?= $Page->USGRt6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt6" name="x_USGRt6" id="x_USGRt6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt6->getPlaceHolder()) ?>" value="<?= $Page->USGRt6->EditValue ?>"<?= $Page->USGRt6->editAttributes() ?> aria-describedby="x_USGRt6_help">
<?= $Page->USGRt6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt6->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt7->Visible) { // USGRt7 ?>
    <div id="r_USGRt7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt7" for="x_USGRt7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt7"><?= $Page->USGRt7->caption() ?><?= $Page->USGRt7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt7"><span id="el_ivf_stimulation_chart_USGRt7">
<input type="<?= $Page->USGRt7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt7" name="x_USGRt7" id="x_USGRt7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt7->getPlaceHolder()) ?>" value="<?= $Page->USGRt7->EditValue ?>"<?= $Page->USGRt7->editAttributes() ?> aria-describedby="x_USGRt7_help">
<?= $Page->USGRt7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt7->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt8->Visible) { // USGRt8 ?>
    <div id="r_USGRt8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt8" for="x_USGRt8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt8"><?= $Page->USGRt8->caption() ?><?= $Page->USGRt8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt8"><span id="el_ivf_stimulation_chart_USGRt8">
<input type="<?= $Page->USGRt8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt8" name="x_USGRt8" id="x_USGRt8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt8->getPlaceHolder()) ?>" value="<?= $Page->USGRt8->EditValue ?>"<?= $Page->USGRt8->editAttributes() ?> aria-describedby="x_USGRt8_help">
<?= $Page->USGRt8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt8->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt9->Visible) { // USGRt9 ?>
    <div id="r_USGRt9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt9" for="x_USGRt9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt9"><?= $Page->USGRt9->caption() ?><?= $Page->USGRt9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt9"><span id="el_ivf_stimulation_chart_USGRt9">
<input type="<?= $Page->USGRt9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt9" name="x_USGRt9" id="x_USGRt9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt9->getPlaceHolder()) ?>" value="<?= $Page->USGRt9->EditValue ?>"<?= $Page->USGRt9->editAttributes() ?> aria-describedby="x_USGRt9_help">
<?= $Page->USGRt9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt9->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt10->Visible) { // USGRt10 ?>
    <div id="r_USGRt10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt10" for="x_USGRt10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt10"><?= $Page->USGRt10->caption() ?><?= $Page->USGRt10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt10"><span id="el_ivf_stimulation_chart_USGRt10">
<input type="<?= $Page->USGRt10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt10" name="x_USGRt10" id="x_USGRt10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt10->getPlaceHolder()) ?>" value="<?= $Page->USGRt10->EditValue ?>"<?= $Page->USGRt10->editAttributes() ?> aria-describedby="x_USGRt10_help">
<?= $Page->USGRt10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt10->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt11->Visible) { // USGRt11 ?>
    <div id="r_USGRt11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt11" for="x_USGRt11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt11"><?= $Page->USGRt11->caption() ?><?= $Page->USGRt11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt11"><span id="el_ivf_stimulation_chart_USGRt11">
<input type="<?= $Page->USGRt11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt11" name="x_USGRt11" id="x_USGRt11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt11->getPlaceHolder()) ?>" value="<?= $Page->USGRt11->EditValue ?>"<?= $Page->USGRt11->editAttributes() ?> aria-describedby="x_USGRt11_help">
<?= $Page->USGRt11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt11->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt12->Visible) { // USGRt12 ?>
    <div id="r_USGRt12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt12" for="x_USGRt12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt12"><?= $Page->USGRt12->caption() ?><?= $Page->USGRt12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt12"><span id="el_ivf_stimulation_chart_USGRt12">
<input type="<?= $Page->USGRt12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt12" name="x_USGRt12" id="x_USGRt12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt12->getPlaceHolder()) ?>" value="<?= $Page->USGRt12->EditValue ?>"<?= $Page->USGRt12->editAttributes() ?> aria-describedby="x_USGRt12_help">
<?= $Page->USGRt12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt12->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt13->Visible) { // USGRt13 ?>
    <div id="r_USGRt13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt13" for="x_USGRt13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt13"><?= $Page->USGRt13->caption() ?><?= $Page->USGRt13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt13"><span id="el_ivf_stimulation_chart_USGRt13">
<input type="<?= $Page->USGRt13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt13" name="x_USGRt13" id="x_USGRt13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt13->getPlaceHolder()) ?>" value="<?= $Page->USGRt13->EditValue ?>"<?= $Page->USGRt13->editAttributes() ?> aria-describedby="x_USGRt13_help">
<?= $Page->USGRt13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt13->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt1->Visible) { // USGLt1 ?>
    <div id="r_USGLt1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt1" for="x_USGLt1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt1"><?= $Page->USGLt1->caption() ?><?= $Page->USGLt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt1"><span id="el_ivf_stimulation_chart_USGLt1">
<input type="<?= $Page->USGLt1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt1" name="x_USGLt1" id="x_USGLt1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt1->getPlaceHolder()) ?>" value="<?= $Page->USGLt1->EditValue ?>"<?= $Page->USGLt1->editAttributes() ?> aria-describedby="x_USGLt1_help">
<?= $Page->USGLt1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt2->Visible) { // USGLt2 ?>
    <div id="r_USGLt2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt2" for="x_USGLt2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt2"><?= $Page->USGLt2->caption() ?><?= $Page->USGLt2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt2"><span id="el_ivf_stimulation_chart_USGLt2">
<input type="<?= $Page->USGLt2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt2" name="x_USGLt2" id="x_USGLt2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt2->getPlaceHolder()) ?>" value="<?= $Page->USGLt2->EditValue ?>"<?= $Page->USGLt2->editAttributes() ?> aria-describedby="x_USGLt2_help">
<?= $Page->USGLt2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt3->Visible) { // USGLt3 ?>
    <div id="r_USGLt3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt3" for="x_USGLt3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt3"><?= $Page->USGLt3->caption() ?><?= $Page->USGLt3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt3"><span id="el_ivf_stimulation_chart_USGLt3">
<input type="<?= $Page->USGLt3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt3" name="x_USGLt3" id="x_USGLt3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt3->getPlaceHolder()) ?>" value="<?= $Page->USGLt3->EditValue ?>"<?= $Page->USGLt3->editAttributes() ?> aria-describedby="x_USGLt3_help">
<?= $Page->USGLt3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt4->Visible) { // USGLt4 ?>
    <div id="r_USGLt4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt4" for="x_USGLt4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt4"><?= $Page->USGLt4->caption() ?><?= $Page->USGLt4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt4"><span id="el_ivf_stimulation_chart_USGLt4">
<input type="<?= $Page->USGLt4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt4" name="x_USGLt4" id="x_USGLt4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt4->getPlaceHolder()) ?>" value="<?= $Page->USGLt4->EditValue ?>"<?= $Page->USGLt4->editAttributes() ?> aria-describedby="x_USGLt4_help">
<?= $Page->USGLt4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt5->Visible) { // USGLt5 ?>
    <div id="r_USGLt5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt5" for="x_USGLt5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt5"><?= $Page->USGLt5->caption() ?><?= $Page->USGLt5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt5"><span id="el_ivf_stimulation_chart_USGLt5">
<input type="<?= $Page->USGLt5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt5" name="x_USGLt5" id="x_USGLt5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt5->getPlaceHolder()) ?>" value="<?= $Page->USGLt5->EditValue ?>"<?= $Page->USGLt5->editAttributes() ?> aria-describedby="x_USGLt5_help">
<?= $Page->USGLt5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt5->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt6->Visible) { // USGLt6 ?>
    <div id="r_USGLt6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt6" for="x_USGLt6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt6"><?= $Page->USGLt6->caption() ?><?= $Page->USGLt6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt6"><span id="el_ivf_stimulation_chart_USGLt6">
<input type="<?= $Page->USGLt6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt6" name="x_USGLt6" id="x_USGLt6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt6->getPlaceHolder()) ?>" value="<?= $Page->USGLt6->EditValue ?>"<?= $Page->USGLt6->editAttributes() ?> aria-describedby="x_USGLt6_help">
<?= $Page->USGLt6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt6->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt7->Visible) { // USGLt7 ?>
    <div id="r_USGLt7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt7" for="x_USGLt7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt7"><?= $Page->USGLt7->caption() ?><?= $Page->USGLt7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt7"><span id="el_ivf_stimulation_chart_USGLt7">
<input type="<?= $Page->USGLt7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt7" name="x_USGLt7" id="x_USGLt7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt7->getPlaceHolder()) ?>" value="<?= $Page->USGLt7->EditValue ?>"<?= $Page->USGLt7->editAttributes() ?> aria-describedby="x_USGLt7_help">
<?= $Page->USGLt7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt7->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt8->Visible) { // USGLt8 ?>
    <div id="r_USGLt8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt8" for="x_USGLt8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt8"><?= $Page->USGLt8->caption() ?><?= $Page->USGLt8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt8"><span id="el_ivf_stimulation_chart_USGLt8">
<input type="<?= $Page->USGLt8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt8" name="x_USGLt8" id="x_USGLt8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt8->getPlaceHolder()) ?>" value="<?= $Page->USGLt8->EditValue ?>"<?= $Page->USGLt8->editAttributes() ?> aria-describedby="x_USGLt8_help">
<?= $Page->USGLt8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt8->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt9->Visible) { // USGLt9 ?>
    <div id="r_USGLt9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt9" for="x_USGLt9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt9"><?= $Page->USGLt9->caption() ?><?= $Page->USGLt9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt9"><span id="el_ivf_stimulation_chart_USGLt9">
<input type="<?= $Page->USGLt9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt9" name="x_USGLt9" id="x_USGLt9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt9->getPlaceHolder()) ?>" value="<?= $Page->USGLt9->EditValue ?>"<?= $Page->USGLt9->editAttributes() ?> aria-describedby="x_USGLt9_help">
<?= $Page->USGLt9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt9->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt10->Visible) { // USGLt10 ?>
    <div id="r_USGLt10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt10" for="x_USGLt10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt10"><?= $Page->USGLt10->caption() ?><?= $Page->USGLt10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt10"><span id="el_ivf_stimulation_chart_USGLt10">
<input type="<?= $Page->USGLt10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt10" name="x_USGLt10" id="x_USGLt10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt10->getPlaceHolder()) ?>" value="<?= $Page->USGLt10->EditValue ?>"<?= $Page->USGLt10->editAttributes() ?> aria-describedby="x_USGLt10_help">
<?= $Page->USGLt10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt10->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt11->Visible) { // USGLt11 ?>
    <div id="r_USGLt11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt11" for="x_USGLt11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt11"><?= $Page->USGLt11->caption() ?><?= $Page->USGLt11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt11"><span id="el_ivf_stimulation_chart_USGLt11">
<input type="<?= $Page->USGLt11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt11" name="x_USGLt11" id="x_USGLt11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt11->getPlaceHolder()) ?>" value="<?= $Page->USGLt11->EditValue ?>"<?= $Page->USGLt11->editAttributes() ?> aria-describedby="x_USGLt11_help">
<?= $Page->USGLt11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt11->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt12->Visible) { // USGLt12 ?>
    <div id="r_USGLt12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt12" for="x_USGLt12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt12"><?= $Page->USGLt12->caption() ?><?= $Page->USGLt12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt12"><span id="el_ivf_stimulation_chart_USGLt12">
<input type="<?= $Page->USGLt12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt12" name="x_USGLt12" id="x_USGLt12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt12->getPlaceHolder()) ?>" value="<?= $Page->USGLt12->EditValue ?>"<?= $Page->USGLt12->editAttributes() ?> aria-describedby="x_USGLt12_help">
<?= $Page->USGLt12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt12->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt13->Visible) { // USGLt13 ?>
    <div id="r_USGLt13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt13" for="x_USGLt13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt13"><?= $Page->USGLt13->caption() ?><?= $Page->USGLt13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt13"><span id="el_ivf_stimulation_chart_USGLt13">
<input type="<?= $Page->USGLt13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt13" name="x_USGLt13" id="x_USGLt13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt13->getPlaceHolder()) ?>" value="<?= $Page->USGLt13->EditValue ?>"<?= $Page->USGLt13->editAttributes() ?> aria-describedby="x_USGLt13_help">
<?= $Page->USGLt13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt13->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM1->Visible) { // EM1 ?>
    <div id="r_EM1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM1" for="x_EM1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM1"><?= $Page->EM1->caption() ?><?= $Page->EM1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM1"><span id="el_ivf_stimulation_chart_EM1">
<input type="<?= $Page->EM1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM1" name="x_EM1" id="x_EM1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM1->getPlaceHolder()) ?>" value="<?= $Page->EM1->EditValue ?>"<?= $Page->EM1->editAttributes() ?> aria-describedby="x_EM1_help">
<?= $Page->EM1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM2->Visible) { // EM2 ?>
    <div id="r_EM2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM2" for="x_EM2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM2"><?= $Page->EM2->caption() ?><?= $Page->EM2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM2"><span id="el_ivf_stimulation_chart_EM2">
<input type="<?= $Page->EM2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM2" name="x_EM2" id="x_EM2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM2->getPlaceHolder()) ?>" value="<?= $Page->EM2->EditValue ?>"<?= $Page->EM2->editAttributes() ?> aria-describedby="x_EM2_help">
<?= $Page->EM2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM3->Visible) { // EM3 ?>
    <div id="r_EM3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM3" for="x_EM3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM3"><?= $Page->EM3->caption() ?><?= $Page->EM3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM3"><span id="el_ivf_stimulation_chart_EM3">
<input type="<?= $Page->EM3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM3" name="x_EM3" id="x_EM3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM3->getPlaceHolder()) ?>" value="<?= $Page->EM3->EditValue ?>"<?= $Page->EM3->editAttributes() ?> aria-describedby="x_EM3_help">
<?= $Page->EM3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM4->Visible) { // EM4 ?>
    <div id="r_EM4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM4" for="x_EM4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM4"><?= $Page->EM4->caption() ?><?= $Page->EM4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM4"><span id="el_ivf_stimulation_chart_EM4">
<input type="<?= $Page->EM4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM4" name="x_EM4" id="x_EM4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM4->getPlaceHolder()) ?>" value="<?= $Page->EM4->EditValue ?>"<?= $Page->EM4->editAttributes() ?> aria-describedby="x_EM4_help">
<?= $Page->EM4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM5->Visible) { // EM5 ?>
    <div id="r_EM5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM5" for="x_EM5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM5"><?= $Page->EM5->caption() ?><?= $Page->EM5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM5"><span id="el_ivf_stimulation_chart_EM5">
<input type="<?= $Page->EM5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM5" name="x_EM5" id="x_EM5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM5->getPlaceHolder()) ?>" value="<?= $Page->EM5->EditValue ?>"<?= $Page->EM5->editAttributes() ?> aria-describedby="x_EM5_help">
<?= $Page->EM5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM5->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM6->Visible) { // EM6 ?>
    <div id="r_EM6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM6" for="x_EM6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM6"><?= $Page->EM6->caption() ?><?= $Page->EM6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM6"><span id="el_ivf_stimulation_chart_EM6">
<input type="<?= $Page->EM6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM6" name="x_EM6" id="x_EM6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM6->getPlaceHolder()) ?>" value="<?= $Page->EM6->EditValue ?>"<?= $Page->EM6->editAttributes() ?> aria-describedby="x_EM6_help">
<?= $Page->EM6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM6->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM7->Visible) { // EM7 ?>
    <div id="r_EM7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM7" for="x_EM7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM7"><?= $Page->EM7->caption() ?><?= $Page->EM7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM7"><span id="el_ivf_stimulation_chart_EM7">
<input type="<?= $Page->EM7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM7" name="x_EM7" id="x_EM7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM7->getPlaceHolder()) ?>" value="<?= $Page->EM7->EditValue ?>"<?= $Page->EM7->editAttributes() ?> aria-describedby="x_EM7_help">
<?= $Page->EM7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM7->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM8->Visible) { // EM8 ?>
    <div id="r_EM8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM8" for="x_EM8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM8"><?= $Page->EM8->caption() ?><?= $Page->EM8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM8"><span id="el_ivf_stimulation_chart_EM8">
<input type="<?= $Page->EM8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM8" name="x_EM8" id="x_EM8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM8->getPlaceHolder()) ?>" value="<?= $Page->EM8->EditValue ?>"<?= $Page->EM8->editAttributes() ?> aria-describedby="x_EM8_help">
<?= $Page->EM8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM8->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM9->Visible) { // EM9 ?>
    <div id="r_EM9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM9" for="x_EM9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM9"><?= $Page->EM9->caption() ?><?= $Page->EM9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM9"><span id="el_ivf_stimulation_chart_EM9">
<input type="<?= $Page->EM9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM9" name="x_EM9" id="x_EM9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM9->getPlaceHolder()) ?>" value="<?= $Page->EM9->EditValue ?>"<?= $Page->EM9->editAttributes() ?> aria-describedby="x_EM9_help">
<?= $Page->EM9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM9->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM10->Visible) { // EM10 ?>
    <div id="r_EM10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM10" for="x_EM10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM10"><?= $Page->EM10->caption() ?><?= $Page->EM10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM10"><span id="el_ivf_stimulation_chart_EM10">
<input type="<?= $Page->EM10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM10" name="x_EM10" id="x_EM10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM10->getPlaceHolder()) ?>" value="<?= $Page->EM10->EditValue ?>"<?= $Page->EM10->editAttributes() ?> aria-describedby="x_EM10_help">
<?= $Page->EM10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM10->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM11->Visible) { // EM11 ?>
    <div id="r_EM11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM11" for="x_EM11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM11"><?= $Page->EM11->caption() ?><?= $Page->EM11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM11"><span id="el_ivf_stimulation_chart_EM11">
<input type="<?= $Page->EM11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM11" name="x_EM11" id="x_EM11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM11->getPlaceHolder()) ?>" value="<?= $Page->EM11->EditValue ?>"<?= $Page->EM11->editAttributes() ?> aria-describedby="x_EM11_help">
<?= $Page->EM11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM11->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM12->Visible) { // EM12 ?>
    <div id="r_EM12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM12" for="x_EM12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM12"><?= $Page->EM12->caption() ?><?= $Page->EM12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM12"><span id="el_ivf_stimulation_chart_EM12">
<input type="<?= $Page->EM12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM12" name="x_EM12" id="x_EM12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM12->getPlaceHolder()) ?>" value="<?= $Page->EM12->EditValue ?>"<?= $Page->EM12->editAttributes() ?> aria-describedby="x_EM12_help">
<?= $Page->EM12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM12->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM13->Visible) { // EM13 ?>
    <div id="r_EM13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM13" for="x_EM13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM13"><?= $Page->EM13->caption() ?><?= $Page->EM13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM13"><span id="el_ivf_stimulation_chart_EM13">
<input type="<?= $Page->EM13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM13" name="x_EM13" id="x_EM13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM13->getPlaceHolder()) ?>" value="<?= $Page->EM13->EditValue ?>"<?= $Page->EM13->editAttributes() ?> aria-describedby="x_EM13_help">
<?= $Page->EM13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM13->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
    <div id="r_Others1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others1" for="x_Others1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others1"><?= $Page->Others1->caption() ?><?= $Page->Others1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others1"><span id="el_ivf_stimulation_chart_Others1">
<input type="<?= $Page->Others1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others1" name="x_Others1" id="x_Others1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others1->getPlaceHolder()) ?>" value="<?= $Page->Others1->EditValue ?>"<?= $Page->Others1->editAttributes() ?> aria-describedby="x_Others1_help">
<?= $Page->Others1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
    <div id="r_Others2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others2" for="x_Others2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others2"><?= $Page->Others2->caption() ?><?= $Page->Others2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others2"><span id="el_ivf_stimulation_chart_Others2">
<input type="<?= $Page->Others2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others2" name="x_Others2" id="x_Others2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others2->getPlaceHolder()) ?>" value="<?= $Page->Others2->EditValue ?>"<?= $Page->Others2->editAttributes() ?> aria-describedby="x_Others2_help">
<?= $Page->Others2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others3->Visible) { // Others3 ?>
    <div id="r_Others3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others3" for="x_Others3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others3"><?= $Page->Others3->caption() ?><?= $Page->Others3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others3"><span id="el_ivf_stimulation_chart_Others3">
<input type="<?= $Page->Others3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others3" name="x_Others3" id="x_Others3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others3->getPlaceHolder()) ?>" value="<?= $Page->Others3->EditValue ?>"<?= $Page->Others3->editAttributes() ?> aria-describedby="x_Others3_help">
<?= $Page->Others3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others4->Visible) { // Others4 ?>
    <div id="r_Others4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others4" for="x_Others4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others4"><?= $Page->Others4->caption() ?><?= $Page->Others4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others4"><span id="el_ivf_stimulation_chart_Others4">
<input type="<?= $Page->Others4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others4" name="x_Others4" id="x_Others4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others4->getPlaceHolder()) ?>" value="<?= $Page->Others4->EditValue ?>"<?= $Page->Others4->editAttributes() ?> aria-describedby="x_Others4_help">
<?= $Page->Others4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others5->Visible) { // Others5 ?>
    <div id="r_Others5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others5" for="x_Others5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others5"><?= $Page->Others5->caption() ?><?= $Page->Others5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others5"><span id="el_ivf_stimulation_chart_Others5">
<input type="<?= $Page->Others5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others5" name="x_Others5" id="x_Others5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others5->getPlaceHolder()) ?>" value="<?= $Page->Others5->EditValue ?>"<?= $Page->Others5->editAttributes() ?> aria-describedby="x_Others5_help">
<?= $Page->Others5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others5->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others6->Visible) { // Others6 ?>
    <div id="r_Others6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others6" for="x_Others6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others6"><?= $Page->Others6->caption() ?><?= $Page->Others6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others6"><span id="el_ivf_stimulation_chart_Others6">
<input type="<?= $Page->Others6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others6" name="x_Others6" id="x_Others6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others6->getPlaceHolder()) ?>" value="<?= $Page->Others6->EditValue ?>"<?= $Page->Others6->editAttributes() ?> aria-describedby="x_Others6_help">
<?= $Page->Others6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others6->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others7->Visible) { // Others7 ?>
    <div id="r_Others7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others7" for="x_Others7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others7"><?= $Page->Others7->caption() ?><?= $Page->Others7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others7"><span id="el_ivf_stimulation_chart_Others7">
<input type="<?= $Page->Others7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others7" name="x_Others7" id="x_Others7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others7->getPlaceHolder()) ?>" value="<?= $Page->Others7->EditValue ?>"<?= $Page->Others7->editAttributes() ?> aria-describedby="x_Others7_help">
<?= $Page->Others7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others7->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others8->Visible) { // Others8 ?>
    <div id="r_Others8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others8" for="x_Others8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others8"><?= $Page->Others8->caption() ?><?= $Page->Others8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others8"><span id="el_ivf_stimulation_chart_Others8">
<input type="<?= $Page->Others8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others8" name="x_Others8" id="x_Others8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others8->getPlaceHolder()) ?>" value="<?= $Page->Others8->EditValue ?>"<?= $Page->Others8->editAttributes() ?> aria-describedby="x_Others8_help">
<?= $Page->Others8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others8->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others9->Visible) { // Others9 ?>
    <div id="r_Others9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others9" for="x_Others9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others9"><?= $Page->Others9->caption() ?><?= $Page->Others9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others9"><span id="el_ivf_stimulation_chart_Others9">
<input type="<?= $Page->Others9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others9" name="x_Others9" id="x_Others9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others9->getPlaceHolder()) ?>" value="<?= $Page->Others9->EditValue ?>"<?= $Page->Others9->editAttributes() ?> aria-describedby="x_Others9_help">
<?= $Page->Others9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others9->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others10->Visible) { // Others10 ?>
    <div id="r_Others10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others10" for="x_Others10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others10"><?= $Page->Others10->caption() ?><?= $Page->Others10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others10"><span id="el_ivf_stimulation_chart_Others10">
<input type="<?= $Page->Others10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others10" name="x_Others10" id="x_Others10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others10->getPlaceHolder()) ?>" value="<?= $Page->Others10->EditValue ?>"<?= $Page->Others10->editAttributes() ?> aria-describedby="x_Others10_help">
<?= $Page->Others10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others10->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others11->Visible) { // Others11 ?>
    <div id="r_Others11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others11" for="x_Others11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others11"><?= $Page->Others11->caption() ?><?= $Page->Others11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others11"><span id="el_ivf_stimulation_chart_Others11">
<input type="<?= $Page->Others11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others11" name="x_Others11" id="x_Others11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others11->getPlaceHolder()) ?>" value="<?= $Page->Others11->EditValue ?>"<?= $Page->Others11->editAttributes() ?> aria-describedby="x_Others11_help">
<?= $Page->Others11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others11->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others12->Visible) { // Others12 ?>
    <div id="r_Others12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others12" for="x_Others12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others12"><?= $Page->Others12->caption() ?><?= $Page->Others12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others12"><span id="el_ivf_stimulation_chart_Others12">
<input type="<?= $Page->Others12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others12" name="x_Others12" id="x_Others12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others12->getPlaceHolder()) ?>" value="<?= $Page->Others12->EditValue ?>"<?= $Page->Others12->editAttributes() ?> aria-describedby="x_Others12_help">
<?= $Page->Others12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others12->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others13->Visible) { // Others13 ?>
    <div id="r_Others13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others13" for="x_Others13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others13"><?= $Page->Others13->caption() ?><?= $Page->Others13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others13"><span id="el_ivf_stimulation_chart_Others13">
<input type="<?= $Page->Others13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others13" name="x_Others13" id="x_Others13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others13->getPlaceHolder()) ?>" value="<?= $Page->Others13->EditValue ?>"<?= $Page->Others13->editAttributes() ?> aria-describedby="x_Others13_help">
<?= $Page->Others13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others13->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR1->Visible) { // DR1 ?>
    <div id="r_DR1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR1" for="x_DR1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR1"><?= $Page->DR1->caption() ?><?= $Page->DR1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR1"><span id="el_ivf_stimulation_chart_DR1">
<input type="<?= $Page->DR1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR1" name="x_DR1" id="x_DR1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR1->getPlaceHolder()) ?>" value="<?= $Page->DR1->EditValue ?>"<?= $Page->DR1->editAttributes() ?> aria-describedby="x_DR1_help">
<?= $Page->DR1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR2->Visible) { // DR2 ?>
    <div id="r_DR2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR2" for="x_DR2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR2"><?= $Page->DR2->caption() ?><?= $Page->DR2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR2"><span id="el_ivf_stimulation_chart_DR2">
<input type="<?= $Page->DR2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR2" name="x_DR2" id="x_DR2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR2->getPlaceHolder()) ?>" value="<?= $Page->DR2->EditValue ?>"<?= $Page->DR2->editAttributes() ?> aria-describedby="x_DR2_help">
<?= $Page->DR2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR3->Visible) { // DR3 ?>
    <div id="r_DR3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR3" for="x_DR3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR3"><?= $Page->DR3->caption() ?><?= $Page->DR3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR3"><span id="el_ivf_stimulation_chart_DR3">
<input type="<?= $Page->DR3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR3" name="x_DR3" id="x_DR3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR3->getPlaceHolder()) ?>" value="<?= $Page->DR3->EditValue ?>"<?= $Page->DR3->editAttributes() ?> aria-describedby="x_DR3_help">
<?= $Page->DR3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR4->Visible) { // DR4 ?>
    <div id="r_DR4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR4" for="x_DR4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR4"><?= $Page->DR4->caption() ?><?= $Page->DR4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR4"><span id="el_ivf_stimulation_chart_DR4">
<input type="<?= $Page->DR4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR4" name="x_DR4" id="x_DR4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR4->getPlaceHolder()) ?>" value="<?= $Page->DR4->EditValue ?>"<?= $Page->DR4->editAttributes() ?> aria-describedby="x_DR4_help">
<?= $Page->DR4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR5->Visible) { // DR5 ?>
    <div id="r_DR5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR5" for="x_DR5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR5"><?= $Page->DR5->caption() ?><?= $Page->DR5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR5"><span id="el_ivf_stimulation_chart_DR5">
<input type="<?= $Page->DR5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR5" name="x_DR5" id="x_DR5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR5->getPlaceHolder()) ?>" value="<?= $Page->DR5->EditValue ?>"<?= $Page->DR5->editAttributes() ?> aria-describedby="x_DR5_help">
<?= $Page->DR5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR5->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR6->Visible) { // DR6 ?>
    <div id="r_DR6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR6" for="x_DR6" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR6"><?= $Page->DR6->caption() ?><?= $Page->DR6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR6"><span id="el_ivf_stimulation_chart_DR6">
<input type="<?= $Page->DR6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR6" name="x_DR6" id="x_DR6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR6->getPlaceHolder()) ?>" value="<?= $Page->DR6->EditValue ?>"<?= $Page->DR6->editAttributes() ?> aria-describedby="x_DR6_help">
<?= $Page->DR6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR6->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR7->Visible) { // DR7 ?>
    <div id="r_DR7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR7" for="x_DR7" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR7"><?= $Page->DR7->caption() ?><?= $Page->DR7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR7"><span id="el_ivf_stimulation_chart_DR7">
<input type="<?= $Page->DR7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR7" name="x_DR7" id="x_DR7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR7->getPlaceHolder()) ?>" value="<?= $Page->DR7->EditValue ?>"<?= $Page->DR7->editAttributes() ?> aria-describedby="x_DR7_help">
<?= $Page->DR7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR7->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR8->Visible) { // DR8 ?>
    <div id="r_DR8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR8" for="x_DR8" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR8"><?= $Page->DR8->caption() ?><?= $Page->DR8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR8"><span id="el_ivf_stimulation_chart_DR8">
<input type="<?= $Page->DR8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR8" name="x_DR8" id="x_DR8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR8->getPlaceHolder()) ?>" value="<?= $Page->DR8->EditValue ?>"<?= $Page->DR8->editAttributes() ?> aria-describedby="x_DR8_help">
<?= $Page->DR8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR8->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR9->Visible) { // DR9 ?>
    <div id="r_DR9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR9" for="x_DR9" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR9"><?= $Page->DR9->caption() ?><?= $Page->DR9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR9"><span id="el_ivf_stimulation_chart_DR9">
<input type="<?= $Page->DR9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR9" name="x_DR9" id="x_DR9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR9->getPlaceHolder()) ?>" value="<?= $Page->DR9->EditValue ?>"<?= $Page->DR9->editAttributes() ?> aria-describedby="x_DR9_help">
<?= $Page->DR9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR9->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR10->Visible) { // DR10 ?>
    <div id="r_DR10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR10" for="x_DR10" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR10"><?= $Page->DR10->caption() ?><?= $Page->DR10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR10"><span id="el_ivf_stimulation_chart_DR10">
<input type="<?= $Page->DR10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR10" name="x_DR10" id="x_DR10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR10->getPlaceHolder()) ?>" value="<?= $Page->DR10->EditValue ?>"<?= $Page->DR10->editAttributes() ?> aria-describedby="x_DR10_help">
<?= $Page->DR10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR10->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR11->Visible) { // DR11 ?>
    <div id="r_DR11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR11" for="x_DR11" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR11"><?= $Page->DR11->caption() ?><?= $Page->DR11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR11"><span id="el_ivf_stimulation_chart_DR11">
<input type="<?= $Page->DR11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR11" name="x_DR11" id="x_DR11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR11->getPlaceHolder()) ?>" value="<?= $Page->DR11->EditValue ?>"<?= $Page->DR11->editAttributes() ?> aria-describedby="x_DR11_help">
<?= $Page->DR11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR11->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR12->Visible) { // DR12 ?>
    <div id="r_DR12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR12" for="x_DR12" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR12"><?= $Page->DR12->caption() ?><?= $Page->DR12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR12"><span id="el_ivf_stimulation_chart_DR12">
<input type="<?= $Page->DR12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR12" name="x_DR12" id="x_DR12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR12->getPlaceHolder()) ?>" value="<?= $Page->DR12->EditValue ?>"<?= $Page->DR12->editAttributes() ?> aria-describedby="x_DR12_help">
<?= $Page->DR12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR12->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR13->Visible) { // DR13 ?>
    <div id="r_DR13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR13" for="x_DR13" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR13"><?= $Page->DR13->caption() ?><?= $Page->DR13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR13"><span id="el_ivf_stimulation_chart_DR13">
<input type="<?= $Page->DR13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR13" name="x_DR13" id="x_DR13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR13->getPlaceHolder()) ?>" value="<?= $Page->DR13->EditValue ?>"<?= $Page->DR13->editAttributes() ?> aria-describedby="x_DR13_help">
<?= $Page->DR13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR13->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DOCTORRESPONSIBLE->Visible) { // DOCTORRESPONSIBLE ?>
    <div id="r_DOCTORRESPONSIBLE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DOCTORRESPONSIBLE" for="x_DOCTORRESPONSIBLE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DOCTORRESPONSIBLE"><?= $Page->DOCTORRESPONSIBLE->caption() ?><?= $Page->DOCTORRESPONSIBLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DOCTORRESPONSIBLE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DOCTORRESPONSIBLE"><span id="el_ivf_stimulation_chart_DOCTORRESPONSIBLE">
<input type="<?= $Page->DOCTORRESPONSIBLE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DOCTORRESPONSIBLE" name="x_DOCTORRESPONSIBLE" id="x_DOCTORRESPONSIBLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DOCTORRESPONSIBLE->getPlaceHolder()) ?>" value="<?= $Page->DOCTORRESPONSIBLE->EditValue ?>"<?= $Page->DOCTORRESPONSIBLE->editAttributes() ?> aria-describedby="x_DOCTORRESPONSIBLE_help">
<?= $Page->DOCTORRESPONSIBLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DOCTORRESPONSIBLE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<?php if ($Page->TidNo->getSessionValue() != "") { ?>
<template id="tpx_ivf_stimulation_chart_TidNo"><span id="el_ivf_stimulation_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_ivf_stimulation_chart_TidNo"><span id="el_ivf_stimulation_chart_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Convert->Visible) { // Convert ?>
    <div id="r_Convert" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Convert" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Convert"><?= $Page->Convert->caption() ?><?= $Page->Convert->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Convert->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Convert"><span id="el_ivf_stimulation_chart_Convert">
<template id="tp_x_Convert">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_Convert" name="x_Convert" id="x_Convert"<?= $Page->Convert->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Convert" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Convert[]"
    name="x_Convert[]"
    value="<?= HtmlEncode($Page->Convert->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Convert"
    data-target="dsl_x_Convert"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Convert->isInvalidClass() ?>"
    data-table="ivf_stimulation_chart"
    data-field="x_Convert"
    data-value-separator="<?= $Page->Convert->displayValueSeparatorAttribute() ?>"
    <?= $Page->Convert->editAttributes() ?>>
<?= $Page->Convert->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Convert->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Consultant"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Consultant"><span id="el_ivf_stimulation_chart_Consultant">
<input type="<?= $Page->Consultant->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>" value="<?= $Page->Consultant->EditValue ?>"<?= $Page->Consultant->editAttributes() ?> aria-describedby="x_Consultant_help">
<?= $Page->Consultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <div id="r_InseminatinTechnique" class="form-group row">
        <label id="elh_ivf_stimulation_chart_InseminatinTechnique" for="x_InseminatinTechnique" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?><?= $Page->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_InseminatinTechnique"><span id="el_ivf_stimulation_chart_InseminatinTechnique">
    <select
        id="x_InseminatinTechnique"
        name="x_InseminatinTechnique"
        class="form-control ew-select<?= $Page->InseminatinTechnique->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_InseminatinTechnique"
        data-table="ivf_stimulation_chart"
        data-field="x_InseminatinTechnique"
        data-value-separator="<?= $Page->InseminatinTechnique->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->InseminatinTechnique->getPlaceHolder()) ?>"
        <?= $Page->InseminatinTechnique->editAttributes() ?>>
        <?= $Page->InseminatinTechnique->selectOptionListHtml("x_InseminatinTechnique") ?>
    </select>
    <?= $Page->InseminatinTechnique->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->InseminatinTechnique->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_InseminatinTechnique']"),
        options = { name: "x_InseminatinTechnique", selectId: "ivf_stimulation_chart_x_InseminatinTechnique", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.InseminatinTechnique.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.InseminatinTechnique.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <div id="r_IndicationForART" class="form-group row">
        <label id="elh_ivf_stimulation_chart_IndicationForART" for="x_IndicationForART" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_IndicationForART"><?= $Page->IndicationForART->caption() ?><?= $Page->IndicationForART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IndicationForART->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_IndicationForART"><span id="el_ivf_stimulation_chart_IndicationForART">
    <select
        id="x_IndicationForART"
        name="x_IndicationForART"
        class="form-control ew-select<?= $Page->IndicationForART->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_IndicationForART"
        data-table="ivf_stimulation_chart"
        data-field="x_IndicationForART"
        data-value-separator="<?= $Page->IndicationForART->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->IndicationForART->getPlaceHolder()) ?>"
        <?= $Page->IndicationForART->editAttributes() ?>>
        <?= $Page->IndicationForART->selectOptionListHtml("x_IndicationForART") ?>
    </select>
    <?= $Page->IndicationForART->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->IndicationForART->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_IndicationForART']"),
        options = { name: "x_IndicationForART", selectId: "ivf_stimulation_chart_x_IndicationForART", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.IndicationForART.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.IndicationForART.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
    <div id="r_Hysteroscopy" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Hysteroscopy" for="x_Hysteroscopy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Hysteroscopy"><?= $Page->Hysteroscopy->caption() ?><?= $Page->Hysteroscopy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Hysteroscopy->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Hysteroscopy"><span id="el_ivf_stimulation_chart_Hysteroscopy">
    <select
        id="x_Hysteroscopy"
        name="x_Hysteroscopy"
        class="form-control ew-select<?= $Page->Hysteroscopy->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Hysteroscopy"
        data-table="ivf_stimulation_chart"
        data-field="x_Hysteroscopy"
        data-value-separator="<?= $Page->Hysteroscopy->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Hysteroscopy->getPlaceHolder()) ?>"
        <?= $Page->Hysteroscopy->editAttributes() ?>>
        <?= $Page->Hysteroscopy->selectOptionListHtml("x_Hysteroscopy") ?>
    </select>
    <?= $Page->Hysteroscopy->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Hysteroscopy->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Hysteroscopy']"),
        options = { name: "x_Hysteroscopy", selectId: "ivf_stimulation_chart_x_Hysteroscopy", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.Hysteroscopy.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Hysteroscopy.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
    <div id="r_EndometrialScratching" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EndometrialScratching" for="x_EndometrialScratching" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EndometrialScratching"><?= $Page->EndometrialScratching->caption() ?><?= $Page->EndometrialScratching->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EndometrialScratching->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EndometrialScratching"><span id="el_ivf_stimulation_chart_EndometrialScratching">
    <select
        id="x_EndometrialScratching"
        name="x_EndometrialScratching"
        class="form-control ew-select<?= $Page->EndometrialScratching->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_EndometrialScratching"
        data-table="ivf_stimulation_chart"
        data-field="x_EndometrialScratching"
        data-value-separator="<?= $Page->EndometrialScratching->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndometrialScratching->getPlaceHolder()) ?>"
        <?= $Page->EndometrialScratching->editAttributes() ?>>
        <?= $Page->EndometrialScratching->selectOptionListHtml("x_EndometrialScratching") ?>
    </select>
    <?= $Page->EndometrialScratching->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->EndometrialScratching->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_EndometrialScratching']"),
        options = { name: "x_EndometrialScratching", selectId: "ivf_stimulation_chart_x_EndometrialScratching", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.EndometrialScratching.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.EndometrialScratching.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <div id="r_TrialCannulation" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TrialCannulation" for="x_TrialCannulation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?><?= $Page->TrialCannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TrialCannulation->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TrialCannulation"><span id="el_ivf_stimulation_chart_TrialCannulation">
    <select
        id="x_TrialCannulation"
        name="x_TrialCannulation"
        class="form-control ew-select<?= $Page->TrialCannulation->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_TrialCannulation"
        data-table="ivf_stimulation_chart"
        data-field="x_TrialCannulation"
        data-value-separator="<?= $Page->TrialCannulation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TrialCannulation->getPlaceHolder()) ?>"
        <?= $Page->TrialCannulation->editAttributes() ?>>
        <?= $Page->TrialCannulation->selectOptionListHtml("x_TrialCannulation") ?>
    </select>
    <?= $Page->TrialCannulation->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TrialCannulation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_TrialCannulation']"),
        options = { name: "x_TrialCannulation", selectId: "ivf_stimulation_chart_x_TrialCannulation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.TrialCannulation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.TrialCannulation.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
    <div id="r_CYCLETYPE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CYCLETYPE" for="x_CYCLETYPE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CYCLETYPE"><?= $Page->CYCLETYPE->caption() ?><?= $Page->CYCLETYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CYCLETYPE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CYCLETYPE"><span id="el_ivf_stimulation_chart_CYCLETYPE">
    <select
        id="x_CYCLETYPE"
        name="x_CYCLETYPE"
        class="form-control ew-select<?= $Page->CYCLETYPE->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_CYCLETYPE"
        data-table="ivf_stimulation_chart"
        data-field="x_CYCLETYPE"
        data-value-separator="<?= $Page->CYCLETYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CYCLETYPE->getPlaceHolder()) ?>"
        <?= $Page->CYCLETYPE->editAttributes() ?>>
        <?= $Page->CYCLETYPE->selectOptionListHtml("x_CYCLETYPE") ?>
    </select>
    <?= $Page->CYCLETYPE->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CYCLETYPE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_CYCLETYPE']"),
        options = { name: "x_CYCLETYPE", selectId: "ivf_stimulation_chart_x_CYCLETYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.CYCLETYPE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.CYCLETYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
    <div id="r_HRTCYCLE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HRTCYCLE" for="x_HRTCYCLE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HRTCYCLE"><?= $Page->HRTCYCLE->caption() ?><?= $Page->HRTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HRTCYCLE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HRTCYCLE"><span id="el_ivf_stimulation_chart_HRTCYCLE">
<input type="<?= $Page->HRTCYCLE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HRTCYCLE" name="x_HRTCYCLE" id="x_HRTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HRTCYCLE->getPlaceHolder()) ?>" value="<?= $Page->HRTCYCLE->EditValue ?>"<?= $Page->HRTCYCLE->editAttributes() ?> aria-describedby="x_HRTCYCLE_help">
<?= $Page->HRTCYCLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HRTCYCLE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
    <div id="r_OralEstrogenDosage" class="form-group row">
        <label id="elh_ivf_stimulation_chart_OralEstrogenDosage" for="x_OralEstrogenDosage" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_OralEstrogenDosage"><?= $Page->OralEstrogenDosage->caption() ?><?= $Page->OralEstrogenDosage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_OralEstrogenDosage"><span id="el_ivf_stimulation_chart_OralEstrogenDosage">
    <select
        id="x_OralEstrogenDosage"
        name="x_OralEstrogenDosage"
        class="form-control ew-select<?= $Page->OralEstrogenDosage->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_OralEstrogenDosage"
        data-table="ivf_stimulation_chart"
        data-field="x_OralEstrogenDosage"
        data-value-separator="<?= $Page->OralEstrogenDosage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->OralEstrogenDosage->getPlaceHolder()) ?>"
        <?= $Page->OralEstrogenDosage->editAttributes() ?>>
        <?= $Page->OralEstrogenDosage->selectOptionListHtml("x_OralEstrogenDosage") ?>
    </select>
    <?= $Page->OralEstrogenDosage->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->OralEstrogenDosage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_OralEstrogenDosage']"),
        options = { name: "x_OralEstrogenDosage", selectId: "ivf_stimulation_chart_x_OralEstrogenDosage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.OralEstrogenDosage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.OralEstrogenDosage.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
    <div id="r_VaginalEstrogen" class="form-group row">
        <label id="elh_ivf_stimulation_chart_VaginalEstrogen" for="x_VaginalEstrogen" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_VaginalEstrogen"><?= $Page->VaginalEstrogen->caption() ?><?= $Page->VaginalEstrogen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_VaginalEstrogen"><span id="el_ivf_stimulation_chart_VaginalEstrogen">
<input type="<?= $Page->VaginalEstrogen->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_VaginalEstrogen" name="x_VaginalEstrogen" id="x_VaginalEstrogen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VaginalEstrogen->getPlaceHolder()) ?>" value="<?= $Page->VaginalEstrogen->EditValue ?>"<?= $Page->VaginalEstrogen->editAttributes() ?> aria-describedby="x_VaginalEstrogen_help">
<?= $Page->VaginalEstrogen->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VaginalEstrogen->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
    <div id="r_GCSF" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GCSF" for="x_GCSF" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GCSF"><?= $Page->GCSF->caption() ?><?= $Page->GCSF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GCSF->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GCSF"><span id="el_ivf_stimulation_chart_GCSF">
    <select
        id="x_GCSF"
        name="x_GCSF"
        class="form-control ew-select<?= $Page->GCSF->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GCSF"
        data-table="ivf_stimulation_chart"
        data-field="x_GCSF"
        data-value-separator="<?= $Page->GCSF->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GCSF->getPlaceHolder()) ?>"
        <?= $Page->GCSF->editAttributes() ?>>
        <?= $Page->GCSF->selectOptionListHtml("x_GCSF") ?>
    </select>
    <?= $Page->GCSF->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GCSF->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GCSF']"),
        options = { name: "x_GCSF", selectId: "ivf_stimulation_chart_x_GCSF", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.GCSF.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GCSF.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
    <div id="r_ActivatedPRP" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ActivatedPRP" for="x_ActivatedPRP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ActivatedPRP"><?= $Page->ActivatedPRP->caption() ?><?= $Page->ActivatedPRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ActivatedPRP->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ActivatedPRP"><span id="el_ivf_stimulation_chart_ActivatedPRP">
    <select
        id="x_ActivatedPRP"
        name="x_ActivatedPRP"
        class="form-control ew-select<?= $Page->ActivatedPRP->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_ActivatedPRP"
        data-table="ivf_stimulation_chart"
        data-field="x_ActivatedPRP"
        data-value-separator="<?= $Page->ActivatedPRP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ActivatedPRP->getPlaceHolder()) ?>"
        <?= $Page->ActivatedPRP->editAttributes() ?>>
        <?= $Page->ActivatedPRP->selectOptionListHtml("x_ActivatedPRP") ?>
    </select>
    <?= $Page->ActivatedPRP->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ActivatedPRP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_ActivatedPRP']"),
        options = { name: "x_ActivatedPRP", selectId: "ivf_stimulation_chart_x_ActivatedPRP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.ActivatedPRP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.ActivatedPRP.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
    <div id="r_UCLcm" class="form-group row">
        <label id="elh_ivf_stimulation_chart_UCLcm" for="x_UCLcm" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_UCLcm"><?= $Page->UCLcm->caption() ?><?= $Page->UCLcm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UCLcm->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_UCLcm"><span id="el_ivf_stimulation_chart_UCLcm">
<input type="<?= $Page->UCLcm->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_UCLcm" name="x_UCLcm" id="x_UCLcm" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UCLcm->getPlaceHolder()) ?>" value="<?= $Page->UCLcm->EditValue ?>"<?= $Page->UCLcm->editAttributes() ?> aria-describedby="x_UCLcm_help">
<?= $Page->UCLcm->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UCLcm->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
    <div id="r_DATOFEMBRYOTRANSFER" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" for="x_DATOFEMBRYOTRANSFER" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><?= $Page->DATOFEMBRYOTRANSFER->caption() ?><?= $Page->DATOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><span id="el_ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<input type="<?= $Page->DATOFEMBRYOTRANSFER->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DATOFEMBRYOTRANSFER" name="x_DATOFEMBRYOTRANSFER" id="x_DATOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DATOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?= $Page->DATOFEMBRYOTRANSFER->EditValue ?>"<?= $Page->DATOFEMBRYOTRANSFER->editAttributes() ?> aria-describedby="x_DATOFEMBRYOTRANSFER_help">
<?= $Page->DATOFEMBRYOTRANSFER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DATOFEMBRYOTRANSFER->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
    <div id="r_DAYOFEMBRYOTRANSFER" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" for="x_DAYOFEMBRYOTRANSFER" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?><?= $Page->DAYOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><span id="el_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<input type="<?= $Page->DAYOFEMBRYOTRANSFER->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x_DAYOFEMBRYOTRANSFER" id="x_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?= $Page->DAYOFEMBRYOTRANSFER->EditValue ?>"<?= $Page->DAYOFEMBRYOTRANSFER->editAttributes() ?> aria-describedby="x_DAYOFEMBRYOTRANSFER_help">
<?= $Page->DAYOFEMBRYOTRANSFER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAYOFEMBRYOTRANSFER->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
    <div id="r_NOOFEMBRYOSTHAWED" class="form-group row">
        <label id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" for="x_NOOFEMBRYOSTHAWED" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?><?= $Page->NOOFEMBRYOSTHAWED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><span id="el_ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<input type="<?= $Page->NOOFEMBRYOSTHAWED->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x_NOOFEMBRYOSTHAWED" id="x_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?= $Page->NOOFEMBRYOSTHAWED->EditValue ?>"<?= $Page->NOOFEMBRYOSTHAWED->editAttributes() ?> aria-describedby="x_NOOFEMBRYOSTHAWED_help">
<?= $Page->NOOFEMBRYOSTHAWED->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NOOFEMBRYOSTHAWED->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
    <div id="r_NOOFEMBRYOSTRANSFERRED" class="form-group row">
        <label id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" for="x_NOOFEMBRYOSTRANSFERRED" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?><?= $Page->NOOFEMBRYOSTRANSFERRED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><span id="el_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<input type="<?= $Page->NOOFEMBRYOSTRANSFERRED->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x_NOOFEMBRYOSTRANSFERRED" id="x_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?= $Page->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?= $Page->NOOFEMBRYOSTRANSFERRED->editAttributes() ?> aria-describedby="x_NOOFEMBRYOSTRANSFERRED_help">
<?= $Page->NOOFEMBRYOSTRANSFERRED->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NOOFEMBRYOSTRANSFERRED->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
    <div id="r_DAYOFEMBRYOS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DAYOFEMBRYOS" for="x_DAYOFEMBRYOS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DAYOFEMBRYOS"><?= $Page->DAYOFEMBRYOS->caption() ?><?= $Page->DAYOFEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DAYOFEMBRYOS"><span id="el_ivf_stimulation_chart_DAYOFEMBRYOS">
<input type="<?= $Page->DAYOFEMBRYOS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DAYOFEMBRYOS" name="x_DAYOFEMBRYOS" id="x_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?= $Page->DAYOFEMBRYOS->EditValue ?>"<?= $Page->DAYOFEMBRYOS->editAttributes() ?> aria-describedby="x_DAYOFEMBRYOS_help">
<?= $Page->DAYOFEMBRYOS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAYOFEMBRYOS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
    <div id="r_CRYOPRESERVEDEMBRYOS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" for="x_CRYOPRESERVEDEMBRYOS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?><?= $Page->CRYOPRESERVEDEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><span id="el_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<input type="<?= $Page->CRYOPRESERVEDEMBRYOS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x_CRYOPRESERVEDEMBRYOS" id="x_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?= $Page->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?= $Page->CRYOPRESERVEDEMBRYOS->editAttributes() ?> aria-describedby="x_CRYOPRESERVEDEMBRYOS_help">
<?= $Page->CRYOPRESERVEDEMBRYOS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CRYOPRESERVEDEMBRYOS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ViaAdmin->Visible) { // ViaAdmin ?>
    <div id="r_ViaAdmin" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ViaAdmin" for="x_ViaAdmin" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ViaAdmin"><?= $Page->ViaAdmin->caption() ?><?= $Page->ViaAdmin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ViaAdmin->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ViaAdmin"><span id="el_ivf_stimulation_chart_ViaAdmin">
<input type="<?= $Page->ViaAdmin->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ViaAdmin" name="x_ViaAdmin" id="x_ViaAdmin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ViaAdmin->getPlaceHolder()) ?>" value="<?= $Page->ViaAdmin->EditValue ?>"<?= $Page->ViaAdmin->editAttributes() ?> aria-describedby="x_ViaAdmin_help">
<?= $Page->ViaAdmin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ViaAdmin->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
    <div id="r_ViaStartDateTime" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ViaStartDateTime" for="x_ViaStartDateTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ViaStartDateTime"><?= $Page->ViaStartDateTime->caption() ?><?= $Page->ViaStartDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ViaStartDateTime->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ViaStartDateTime"><span id="el_ivf_stimulation_chart_ViaStartDateTime">
<input type="<?= $Page->ViaStartDateTime->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ViaStartDateTime" name="x_ViaStartDateTime" id="x_ViaStartDateTime" placeholder="<?= HtmlEncode($Page->ViaStartDateTime->getPlaceHolder()) ?>" value="<?= $Page->ViaStartDateTime->EditValue ?>"<?= $Page->ViaStartDateTime->editAttributes() ?> aria-describedby="x_ViaStartDateTime_help">
<?= $Page->ViaStartDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ViaStartDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ViaStartDateTime->ReadOnly && !$Page->ViaStartDateTime->Disabled && !isset($Page->ViaStartDateTime->EditAttrs["readonly"]) && !isset($Page->ViaStartDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_ViaStartDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ViaDose->Visible) { // ViaDose ?>
    <div id="r_ViaDose" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ViaDose" for="x_ViaDose" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ViaDose"><?= $Page->ViaDose->caption() ?><?= $Page->ViaDose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ViaDose->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ViaDose"><span id="el_ivf_stimulation_chart_ViaDose">
<input type="<?= $Page->ViaDose->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ViaDose" name="x_ViaDose" id="x_ViaDose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ViaDose->getPlaceHolder()) ?>" value="<?= $Page->ViaDose->EditValue ?>"<?= $Page->ViaDose->editAttributes() ?> aria-describedby="x_ViaDose_help">
<?= $Page->ViaDose->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ViaDose->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AllFreeze->Visible) { // AllFreeze ?>
    <div id="r_AllFreeze" class="form-group row">
        <label id="elh_ivf_stimulation_chart_AllFreeze" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_AllFreeze"><?= $Page->AllFreeze->caption() ?><?= $Page->AllFreeze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AllFreeze->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_AllFreeze"><span id="el_ivf_stimulation_chart_AllFreeze">
<template id="tp_x_AllFreeze">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_AllFreeze" name="x_AllFreeze" id="x_AllFreeze"<?= $Page->AllFreeze->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_AllFreeze" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_AllFreeze"
    name="x_AllFreeze"
    value="<?= HtmlEncode($Page->AllFreeze->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_AllFreeze"
    data-target="dsl_x_AllFreeze"
    data-repeatcolumn="5"
    class="form-control<?= $Page->AllFreeze->isInvalidClass() ?>"
    data-table="ivf_stimulation_chart"
    data-field="x_AllFreeze"
    data-value-separator="<?= $Page->AllFreeze->displayValueSeparatorAttribute() ?>"
    <?= $Page->AllFreeze->editAttributes() ?>>
<?= $Page->AllFreeze->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AllFreeze->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatmentCancel->Visible) { // TreatmentCancel ?>
    <div id="r_TreatmentCancel" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TreatmentCancel" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_TreatmentCancel"><?= $Page->TreatmentCancel->caption() ?><?= $Page->TreatmentCancel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatmentCancel->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TreatmentCancel"><span id="el_ivf_stimulation_chart_TreatmentCancel">
<template id="tp_x_TreatmentCancel">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_TreatmentCancel" name="x_TreatmentCancel" id="x_TreatmentCancel"<?= $Page->TreatmentCancel->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_TreatmentCancel" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_TreatmentCancel"
    name="x_TreatmentCancel"
    value="<?= HtmlEncode($Page->TreatmentCancel->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_TreatmentCancel"
    data-target="dsl_x_TreatmentCancel"
    data-repeatcolumn="5"
    class="form-control<?= $Page->TreatmentCancel->isInvalidClass() ?>"
    data-table="ivf_stimulation_chart"
    data-field="x_TreatmentCancel"
    data-value-separator="<?= $Page->TreatmentCancel->displayValueSeparatorAttribute() ?>"
    <?= $Page->TreatmentCancel->editAttributes() ?>>
<?= $Page->TreatmentCancel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TreatmentCancel->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reason->Visible) { // Reason ?>
    <div id="r_Reason" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Reason" for="x_Reason" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Reason"><?= $Page->Reason->caption() ?><?= $Page->Reason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reason->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Reason"><span id="el_ivf_stimulation_chart_Reason">
<textarea data-table="ivf_stimulation_chart" data-field="x_Reason" name="x_Reason" id="x_Reason" cols="35" rows="1" placeholder="<?= HtmlEncode($Page->Reason->getPlaceHolder()) ?>"<?= $Page->Reason->editAttributes() ?> aria-describedby="x_Reason_help"><?= $Page->Reason->EditValue ?></textarea>
<?= $Page->Reason->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reason->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
    <div id="r_ProgesteroneAdmin" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ProgesteroneAdmin" for="x_ProgesteroneAdmin" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ProgesteroneAdmin"><?= $Page->ProgesteroneAdmin->caption() ?><?= $Page->ProgesteroneAdmin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgesteroneAdmin->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ProgesteroneAdmin"><span id="el_ivf_stimulation_chart_ProgesteroneAdmin">
<input type="<?= $Page->ProgesteroneAdmin->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneAdmin" name="x_ProgesteroneAdmin" id="x_ProgesteroneAdmin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgesteroneAdmin->getPlaceHolder()) ?>" value="<?= $Page->ProgesteroneAdmin->EditValue ?>"<?= $Page->ProgesteroneAdmin->editAttributes() ?> aria-describedby="x_ProgesteroneAdmin_help">
<?= $Page->ProgesteroneAdmin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgesteroneAdmin->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
    <div id="r_ProgesteroneStart" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ProgesteroneStart" for="x_ProgesteroneStart" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ProgesteroneStart"><?= $Page->ProgesteroneStart->caption() ?><?= $Page->ProgesteroneStart->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgesteroneStart->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ProgesteroneStart"><span id="el_ivf_stimulation_chart_ProgesteroneStart">
<input type="<?= $Page->ProgesteroneStart->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneStart" name="x_ProgesteroneStart" id="x_ProgesteroneStart" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgesteroneStart->getPlaceHolder()) ?>" value="<?= $Page->ProgesteroneStart->EditValue ?>"<?= $Page->ProgesteroneStart->editAttributes() ?> aria-describedby="x_ProgesteroneStart_help">
<?= $Page->ProgesteroneStart->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgesteroneStart->getErrorMessage() ?></div>
<?php if (!$Page->ProgesteroneStart->ReadOnly && !$Page->ProgesteroneStart->Disabled && !isset($Page->ProgesteroneStart->EditAttrs["readonly"]) && !isset($Page->ProgesteroneStart->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_ProgesteroneStart", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
    <div id="r_ProgesteroneDose" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ProgesteroneDose" for="x_ProgesteroneDose" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ProgesteroneDose"><?= $Page->ProgesteroneDose->caption() ?><?= $Page->ProgesteroneDose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgesteroneDose->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ProgesteroneDose"><span id="el_ivf_stimulation_chart_ProgesteroneDose">
<input type="<?= $Page->ProgesteroneDose->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneDose" name="x_ProgesteroneDose" id="x_ProgesteroneDose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgesteroneDose->getPlaceHolder()) ?>" value="<?= $Page->ProgesteroneDose->EditValue ?>"<?= $Page->ProgesteroneDose->editAttributes() ?> aria-describedby="x_ProgesteroneDose_help">
<?= $Page->ProgesteroneDose->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgesteroneDose->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Projectron->Visible) { // Projectron ?>
    <div id="r_Projectron" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Projectron" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Projectron"><?= $Page->Projectron->caption() ?><?= $Page->Projectron->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Projectron->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Projectron"><span id="el_ivf_stimulation_chart_Projectron">
<template id="tp_x_Projectron">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_Projectron" name="x_Projectron" id="x_Projectron"<?= $Page->Projectron->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Projectron" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Projectron"
    name="x_Projectron"
    value="<?= HtmlEncode($Page->Projectron->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_Projectron"
    data-target="dsl_x_Projectron"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Projectron->isInvalidClass() ?>"
    data-table="ivf_stimulation_chart"
    data-field="x_Projectron"
    data-value-separator="<?= $Page->Projectron->displayValueSeparatorAttribute() ?>"
    <?= $Page->Projectron->editAttributes() ?>>
<?= $Page->Projectron->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Projectron->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate14->Visible) { // StChDate14 ?>
    <div id="r_StChDate14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate14" for="x_StChDate14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate14"><?= $Page->StChDate14->caption() ?><?= $Page->StChDate14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate14"><span id="el_ivf_stimulation_chart_StChDate14">
<input type="<?= $Page->StChDate14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate14" data-format="7" name="x_StChDate14" id="x_StChDate14" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate14->getPlaceHolder()) ?>" value="<?= $Page->StChDate14->EditValue ?>"<?= $Page->StChDate14->editAttributes() ?> aria-describedby="x_StChDate14_help">
<?= $Page->StChDate14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate14->getErrorMessage() ?></div>
<?php if (!$Page->StChDate14->ReadOnly && !$Page->StChDate14->Disabled && !isset($Page->StChDate14->EditAttrs["readonly"]) && !isset($Page->StChDate14->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate14", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate15->Visible) { // StChDate15 ?>
    <div id="r_StChDate15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate15" for="x_StChDate15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate15"><?= $Page->StChDate15->caption() ?><?= $Page->StChDate15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate15"><span id="el_ivf_stimulation_chart_StChDate15">
<input type="<?= $Page->StChDate15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate15" data-format="7" name="x_StChDate15" id="x_StChDate15" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate15->getPlaceHolder()) ?>" value="<?= $Page->StChDate15->EditValue ?>"<?= $Page->StChDate15->editAttributes() ?> aria-describedby="x_StChDate15_help">
<?= $Page->StChDate15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate15->getErrorMessage() ?></div>
<?php if (!$Page->StChDate15->ReadOnly && !$Page->StChDate15->Disabled && !isset($Page->StChDate15->EditAttrs["readonly"]) && !isset($Page->StChDate15->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate15", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate16->Visible) { // StChDate16 ?>
    <div id="r_StChDate16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate16" for="x_StChDate16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate16"><?= $Page->StChDate16->caption() ?><?= $Page->StChDate16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate16"><span id="el_ivf_stimulation_chart_StChDate16">
<input type="<?= $Page->StChDate16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate16" data-format="7" name="x_StChDate16" id="x_StChDate16" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate16->getPlaceHolder()) ?>" value="<?= $Page->StChDate16->EditValue ?>"<?= $Page->StChDate16->editAttributes() ?> aria-describedby="x_StChDate16_help">
<?= $Page->StChDate16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate16->getErrorMessage() ?></div>
<?php if (!$Page->StChDate16->ReadOnly && !$Page->StChDate16->Disabled && !isset($Page->StChDate16->EditAttrs["readonly"]) && !isset($Page->StChDate16->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate16", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate17->Visible) { // StChDate17 ?>
    <div id="r_StChDate17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate17" for="x_StChDate17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate17"><?= $Page->StChDate17->caption() ?><?= $Page->StChDate17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate17"><span id="el_ivf_stimulation_chart_StChDate17">
<input type="<?= $Page->StChDate17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate17" data-format="7" name="x_StChDate17" id="x_StChDate17" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate17->getPlaceHolder()) ?>" value="<?= $Page->StChDate17->EditValue ?>"<?= $Page->StChDate17->editAttributes() ?> aria-describedby="x_StChDate17_help">
<?= $Page->StChDate17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate17->getErrorMessage() ?></div>
<?php if (!$Page->StChDate17->ReadOnly && !$Page->StChDate17->Disabled && !isset($Page->StChDate17->EditAttrs["readonly"]) && !isset($Page->StChDate17->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate17", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate18->Visible) { // StChDate18 ?>
    <div id="r_StChDate18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate18" for="x_StChDate18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate18"><?= $Page->StChDate18->caption() ?><?= $Page->StChDate18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate18"><span id="el_ivf_stimulation_chart_StChDate18">
<input type="<?= $Page->StChDate18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate18" data-format="7" name="x_StChDate18" id="x_StChDate18" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate18->getPlaceHolder()) ?>" value="<?= $Page->StChDate18->EditValue ?>"<?= $Page->StChDate18->editAttributes() ?> aria-describedby="x_StChDate18_help">
<?= $Page->StChDate18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate18->getErrorMessage() ?></div>
<?php if (!$Page->StChDate18->ReadOnly && !$Page->StChDate18->Disabled && !isset($Page->StChDate18->EditAttrs["readonly"]) && !isset($Page->StChDate18->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate18", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate19->Visible) { // StChDate19 ?>
    <div id="r_StChDate19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate19" for="x_StChDate19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate19"><?= $Page->StChDate19->caption() ?><?= $Page->StChDate19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate19"><span id="el_ivf_stimulation_chart_StChDate19">
<input type="<?= $Page->StChDate19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate19" data-format="7" name="x_StChDate19" id="x_StChDate19" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate19->getPlaceHolder()) ?>" value="<?= $Page->StChDate19->EditValue ?>"<?= $Page->StChDate19->editAttributes() ?> aria-describedby="x_StChDate19_help">
<?= $Page->StChDate19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate19->getErrorMessage() ?></div>
<?php if (!$Page->StChDate19->ReadOnly && !$Page->StChDate19->Disabled && !isset($Page->StChDate19->EditAttrs["readonly"]) && !isset($Page->StChDate19->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate19", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate20->Visible) { // StChDate20 ?>
    <div id="r_StChDate20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate20" for="x_StChDate20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate20"><?= $Page->StChDate20->caption() ?><?= $Page->StChDate20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate20"><span id="el_ivf_stimulation_chart_StChDate20">
<input type="<?= $Page->StChDate20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate20" data-format="7" name="x_StChDate20" id="x_StChDate20" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate20->getPlaceHolder()) ?>" value="<?= $Page->StChDate20->EditValue ?>"<?= $Page->StChDate20->editAttributes() ?> aria-describedby="x_StChDate20_help">
<?= $Page->StChDate20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate20->getErrorMessage() ?></div>
<?php if (!$Page->StChDate20->ReadOnly && !$Page->StChDate20->Disabled && !isset($Page->StChDate20->EditAttrs["readonly"]) && !isset($Page->StChDate20->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate20", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate21->Visible) { // StChDate21 ?>
    <div id="r_StChDate21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate21" for="x_StChDate21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate21"><?= $Page->StChDate21->caption() ?><?= $Page->StChDate21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate21"><span id="el_ivf_stimulation_chart_StChDate21">
<input type="<?= $Page->StChDate21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate21" data-format="7" name="x_StChDate21" id="x_StChDate21" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate21->getPlaceHolder()) ?>" value="<?= $Page->StChDate21->EditValue ?>"<?= $Page->StChDate21->editAttributes() ?> aria-describedby="x_StChDate21_help">
<?= $Page->StChDate21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate21->getErrorMessage() ?></div>
<?php if (!$Page->StChDate21->ReadOnly && !$Page->StChDate21->Disabled && !isset($Page->StChDate21->EditAttrs["readonly"]) && !isset($Page->StChDate21->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate21", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate22->Visible) { // StChDate22 ?>
    <div id="r_StChDate22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate22" for="x_StChDate22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate22"><?= $Page->StChDate22->caption() ?><?= $Page->StChDate22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate22"><span id="el_ivf_stimulation_chart_StChDate22">
<input type="<?= $Page->StChDate22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate22" data-format="7" name="x_StChDate22" id="x_StChDate22" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate22->getPlaceHolder()) ?>" value="<?= $Page->StChDate22->EditValue ?>"<?= $Page->StChDate22->editAttributes() ?> aria-describedby="x_StChDate22_help">
<?= $Page->StChDate22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate22->getErrorMessage() ?></div>
<?php if (!$Page->StChDate22->ReadOnly && !$Page->StChDate22->Disabled && !isset($Page->StChDate22->EditAttrs["readonly"]) && !isset($Page->StChDate22->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate22", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate23->Visible) { // StChDate23 ?>
    <div id="r_StChDate23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate23" for="x_StChDate23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate23"><?= $Page->StChDate23->caption() ?><?= $Page->StChDate23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate23"><span id="el_ivf_stimulation_chart_StChDate23">
<input type="<?= $Page->StChDate23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate23" data-format="7" name="x_StChDate23" id="x_StChDate23" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate23->getPlaceHolder()) ?>" value="<?= $Page->StChDate23->EditValue ?>"<?= $Page->StChDate23->editAttributes() ?> aria-describedby="x_StChDate23_help">
<?= $Page->StChDate23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate23->getErrorMessage() ?></div>
<?php if (!$Page->StChDate23->ReadOnly && !$Page->StChDate23->Disabled && !isset($Page->StChDate23->EditAttrs["readonly"]) && !isset($Page->StChDate23->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate23", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate24->Visible) { // StChDate24 ?>
    <div id="r_StChDate24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate24" for="x_StChDate24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate24"><?= $Page->StChDate24->caption() ?><?= $Page->StChDate24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate24"><span id="el_ivf_stimulation_chart_StChDate24">
<input type="<?= $Page->StChDate24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate24" data-format="7" name="x_StChDate24" id="x_StChDate24" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate24->getPlaceHolder()) ?>" value="<?= $Page->StChDate24->EditValue ?>"<?= $Page->StChDate24->editAttributes() ?> aria-describedby="x_StChDate24_help">
<?= $Page->StChDate24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate24->getErrorMessage() ?></div>
<?php if (!$Page->StChDate24->ReadOnly && !$Page->StChDate24->Disabled && !isset($Page->StChDate24->EditAttrs["readonly"]) && !isset($Page->StChDate24->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate24", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate25->Visible) { // StChDate25 ?>
    <div id="r_StChDate25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate25" for="x_StChDate25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StChDate25"><?= $Page->StChDate25->caption() ?><?= $Page->StChDate25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate25"><span id="el_ivf_stimulation_chart_StChDate25">
<input type="<?= $Page->StChDate25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate25" data-format="7" name="x_StChDate25" id="x_StChDate25" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->StChDate25->getPlaceHolder()) ?>" value="<?= $Page->StChDate25->EditValue ?>"<?= $Page->StChDate25->editAttributes() ?> aria-describedby="x_StChDate25_help">
<?= $Page->StChDate25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate25->getErrorMessage() ?></div>
<?php if (!$Page->StChDate25->ReadOnly && !$Page->StChDate25->Disabled && !isset($Page->StChDate25->EditAttrs["readonly"]) && !isset($Page->StChDate25->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate25", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay14->Visible) { // CycleDay14 ?>
    <div id="r_CycleDay14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay14" for="x_CycleDay14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay14"><?= $Page->CycleDay14->caption() ?><?= $Page->CycleDay14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay14"><span id="el_ivf_stimulation_chart_CycleDay14">
<input type="<?= $Page->CycleDay14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay14" name="x_CycleDay14" id="x_CycleDay14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay14->getPlaceHolder()) ?>" value="<?= $Page->CycleDay14->EditValue ?>"<?= $Page->CycleDay14->editAttributes() ?> aria-describedby="x_CycleDay14_help">
<?= $Page->CycleDay14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay14->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay15->Visible) { // CycleDay15 ?>
    <div id="r_CycleDay15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay15" for="x_CycleDay15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay15"><?= $Page->CycleDay15->caption() ?><?= $Page->CycleDay15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay15"><span id="el_ivf_stimulation_chart_CycleDay15">
<input type="<?= $Page->CycleDay15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay15" name="x_CycleDay15" id="x_CycleDay15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay15->getPlaceHolder()) ?>" value="<?= $Page->CycleDay15->EditValue ?>"<?= $Page->CycleDay15->editAttributes() ?> aria-describedby="x_CycleDay15_help">
<?= $Page->CycleDay15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay15->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay16->Visible) { // CycleDay16 ?>
    <div id="r_CycleDay16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay16" for="x_CycleDay16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay16"><?= $Page->CycleDay16->caption() ?><?= $Page->CycleDay16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay16"><span id="el_ivf_stimulation_chart_CycleDay16">
<input type="<?= $Page->CycleDay16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay16" name="x_CycleDay16" id="x_CycleDay16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay16->getPlaceHolder()) ?>" value="<?= $Page->CycleDay16->EditValue ?>"<?= $Page->CycleDay16->editAttributes() ?> aria-describedby="x_CycleDay16_help">
<?= $Page->CycleDay16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay16->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay17->Visible) { // CycleDay17 ?>
    <div id="r_CycleDay17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay17" for="x_CycleDay17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay17"><?= $Page->CycleDay17->caption() ?><?= $Page->CycleDay17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay17"><span id="el_ivf_stimulation_chart_CycleDay17">
<input type="<?= $Page->CycleDay17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay17" name="x_CycleDay17" id="x_CycleDay17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay17->getPlaceHolder()) ?>" value="<?= $Page->CycleDay17->EditValue ?>"<?= $Page->CycleDay17->editAttributes() ?> aria-describedby="x_CycleDay17_help">
<?= $Page->CycleDay17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay17->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay18->Visible) { // CycleDay18 ?>
    <div id="r_CycleDay18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay18" for="x_CycleDay18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay18"><?= $Page->CycleDay18->caption() ?><?= $Page->CycleDay18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay18"><span id="el_ivf_stimulation_chart_CycleDay18">
<input type="<?= $Page->CycleDay18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay18" name="x_CycleDay18" id="x_CycleDay18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay18->getPlaceHolder()) ?>" value="<?= $Page->CycleDay18->EditValue ?>"<?= $Page->CycleDay18->editAttributes() ?> aria-describedby="x_CycleDay18_help">
<?= $Page->CycleDay18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay18->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay19->Visible) { // CycleDay19 ?>
    <div id="r_CycleDay19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay19" for="x_CycleDay19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay19"><?= $Page->CycleDay19->caption() ?><?= $Page->CycleDay19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay19"><span id="el_ivf_stimulation_chart_CycleDay19">
<input type="<?= $Page->CycleDay19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay19" name="x_CycleDay19" id="x_CycleDay19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay19->getPlaceHolder()) ?>" value="<?= $Page->CycleDay19->EditValue ?>"<?= $Page->CycleDay19->editAttributes() ?> aria-describedby="x_CycleDay19_help">
<?= $Page->CycleDay19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay19->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay20->Visible) { // CycleDay20 ?>
    <div id="r_CycleDay20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay20" for="x_CycleDay20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay20"><?= $Page->CycleDay20->caption() ?><?= $Page->CycleDay20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay20"><span id="el_ivf_stimulation_chart_CycleDay20">
<input type="<?= $Page->CycleDay20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay20" name="x_CycleDay20" id="x_CycleDay20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay20->getPlaceHolder()) ?>" value="<?= $Page->CycleDay20->EditValue ?>"<?= $Page->CycleDay20->editAttributes() ?> aria-describedby="x_CycleDay20_help">
<?= $Page->CycleDay20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay20->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay21->Visible) { // CycleDay21 ?>
    <div id="r_CycleDay21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay21" for="x_CycleDay21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay21"><?= $Page->CycleDay21->caption() ?><?= $Page->CycleDay21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay21"><span id="el_ivf_stimulation_chart_CycleDay21">
<input type="<?= $Page->CycleDay21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay21" name="x_CycleDay21" id="x_CycleDay21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay21->getPlaceHolder()) ?>" value="<?= $Page->CycleDay21->EditValue ?>"<?= $Page->CycleDay21->editAttributes() ?> aria-describedby="x_CycleDay21_help">
<?= $Page->CycleDay21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay21->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay22->Visible) { // CycleDay22 ?>
    <div id="r_CycleDay22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay22" for="x_CycleDay22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay22"><?= $Page->CycleDay22->caption() ?><?= $Page->CycleDay22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay22"><span id="el_ivf_stimulation_chart_CycleDay22">
<input type="<?= $Page->CycleDay22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay22" name="x_CycleDay22" id="x_CycleDay22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay22->getPlaceHolder()) ?>" value="<?= $Page->CycleDay22->EditValue ?>"<?= $Page->CycleDay22->editAttributes() ?> aria-describedby="x_CycleDay22_help">
<?= $Page->CycleDay22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay22->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay23->Visible) { // CycleDay23 ?>
    <div id="r_CycleDay23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay23" for="x_CycleDay23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay23"><?= $Page->CycleDay23->caption() ?><?= $Page->CycleDay23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay23"><span id="el_ivf_stimulation_chart_CycleDay23">
<input type="<?= $Page->CycleDay23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay23" name="x_CycleDay23" id="x_CycleDay23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay23->getPlaceHolder()) ?>" value="<?= $Page->CycleDay23->EditValue ?>"<?= $Page->CycleDay23->editAttributes() ?> aria-describedby="x_CycleDay23_help">
<?= $Page->CycleDay23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay23->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay24->Visible) { // CycleDay24 ?>
    <div id="r_CycleDay24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay24" for="x_CycleDay24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay24"><?= $Page->CycleDay24->caption() ?><?= $Page->CycleDay24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay24"><span id="el_ivf_stimulation_chart_CycleDay24">
<input type="<?= $Page->CycleDay24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay24" name="x_CycleDay24" id="x_CycleDay24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay24->getPlaceHolder()) ?>" value="<?= $Page->CycleDay24->EditValue ?>"<?= $Page->CycleDay24->editAttributes() ?> aria-describedby="x_CycleDay24_help">
<?= $Page->CycleDay24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay24->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay25->Visible) { // CycleDay25 ?>
    <div id="r_CycleDay25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay25" for="x_CycleDay25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_CycleDay25"><?= $Page->CycleDay25->caption() ?><?= $Page->CycleDay25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay25"><span id="el_ivf_stimulation_chart_CycleDay25">
<input type="<?= $Page->CycleDay25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay25" name="x_CycleDay25" id="x_CycleDay25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay25->getPlaceHolder()) ?>" value="<?= $Page->CycleDay25->EditValue ?>"<?= $Page->CycleDay25->editAttributes() ?> aria-describedby="x_CycleDay25_help">
<?= $Page->CycleDay25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay25->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay14->Visible) { // StimulationDay14 ?>
    <div id="r_StimulationDay14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay14" for="x_StimulationDay14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay14"><?= $Page->StimulationDay14->caption() ?><?= $Page->StimulationDay14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay14"><span id="el_ivf_stimulation_chart_StimulationDay14">
<input type="<?= $Page->StimulationDay14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay14" name="x_StimulationDay14" id="x_StimulationDay14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay14->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay14->EditValue ?>"<?= $Page->StimulationDay14->editAttributes() ?> aria-describedby="x_StimulationDay14_help">
<?= $Page->StimulationDay14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay14->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay15->Visible) { // StimulationDay15 ?>
    <div id="r_StimulationDay15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay15" for="x_StimulationDay15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay15"><?= $Page->StimulationDay15->caption() ?><?= $Page->StimulationDay15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay15"><span id="el_ivf_stimulation_chart_StimulationDay15">
<input type="<?= $Page->StimulationDay15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay15" name="x_StimulationDay15" id="x_StimulationDay15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay15->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay15->EditValue ?>"<?= $Page->StimulationDay15->editAttributes() ?> aria-describedby="x_StimulationDay15_help">
<?= $Page->StimulationDay15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay15->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay16->Visible) { // StimulationDay16 ?>
    <div id="r_StimulationDay16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay16" for="x_StimulationDay16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay16"><?= $Page->StimulationDay16->caption() ?><?= $Page->StimulationDay16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay16"><span id="el_ivf_stimulation_chart_StimulationDay16">
<input type="<?= $Page->StimulationDay16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay16" name="x_StimulationDay16" id="x_StimulationDay16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay16->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay16->EditValue ?>"<?= $Page->StimulationDay16->editAttributes() ?> aria-describedby="x_StimulationDay16_help">
<?= $Page->StimulationDay16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay16->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay17->Visible) { // StimulationDay17 ?>
    <div id="r_StimulationDay17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay17" for="x_StimulationDay17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay17"><?= $Page->StimulationDay17->caption() ?><?= $Page->StimulationDay17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay17"><span id="el_ivf_stimulation_chart_StimulationDay17">
<input type="<?= $Page->StimulationDay17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay17" name="x_StimulationDay17" id="x_StimulationDay17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay17->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay17->EditValue ?>"<?= $Page->StimulationDay17->editAttributes() ?> aria-describedby="x_StimulationDay17_help">
<?= $Page->StimulationDay17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay17->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay18->Visible) { // StimulationDay18 ?>
    <div id="r_StimulationDay18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay18" for="x_StimulationDay18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay18"><?= $Page->StimulationDay18->caption() ?><?= $Page->StimulationDay18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay18"><span id="el_ivf_stimulation_chart_StimulationDay18">
<input type="<?= $Page->StimulationDay18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay18" name="x_StimulationDay18" id="x_StimulationDay18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay18->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay18->EditValue ?>"<?= $Page->StimulationDay18->editAttributes() ?> aria-describedby="x_StimulationDay18_help">
<?= $Page->StimulationDay18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay18->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay19->Visible) { // StimulationDay19 ?>
    <div id="r_StimulationDay19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay19" for="x_StimulationDay19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay19"><?= $Page->StimulationDay19->caption() ?><?= $Page->StimulationDay19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay19"><span id="el_ivf_stimulation_chart_StimulationDay19">
<input type="<?= $Page->StimulationDay19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay19" name="x_StimulationDay19" id="x_StimulationDay19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay19->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay19->EditValue ?>"<?= $Page->StimulationDay19->editAttributes() ?> aria-describedby="x_StimulationDay19_help">
<?= $Page->StimulationDay19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay19->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay20->Visible) { // StimulationDay20 ?>
    <div id="r_StimulationDay20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay20" for="x_StimulationDay20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay20"><?= $Page->StimulationDay20->caption() ?><?= $Page->StimulationDay20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay20"><span id="el_ivf_stimulation_chart_StimulationDay20">
<input type="<?= $Page->StimulationDay20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay20" name="x_StimulationDay20" id="x_StimulationDay20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay20->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay20->EditValue ?>"<?= $Page->StimulationDay20->editAttributes() ?> aria-describedby="x_StimulationDay20_help">
<?= $Page->StimulationDay20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay20->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay21->Visible) { // StimulationDay21 ?>
    <div id="r_StimulationDay21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay21" for="x_StimulationDay21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay21"><?= $Page->StimulationDay21->caption() ?><?= $Page->StimulationDay21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay21"><span id="el_ivf_stimulation_chart_StimulationDay21">
<input type="<?= $Page->StimulationDay21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay21" name="x_StimulationDay21" id="x_StimulationDay21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay21->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay21->EditValue ?>"<?= $Page->StimulationDay21->editAttributes() ?> aria-describedby="x_StimulationDay21_help">
<?= $Page->StimulationDay21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay21->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay22->Visible) { // StimulationDay22 ?>
    <div id="r_StimulationDay22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay22" for="x_StimulationDay22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay22"><?= $Page->StimulationDay22->caption() ?><?= $Page->StimulationDay22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay22"><span id="el_ivf_stimulation_chart_StimulationDay22">
<input type="<?= $Page->StimulationDay22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay22" name="x_StimulationDay22" id="x_StimulationDay22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay22->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay22->EditValue ?>"<?= $Page->StimulationDay22->editAttributes() ?> aria-describedby="x_StimulationDay22_help">
<?= $Page->StimulationDay22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay22->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay23->Visible) { // StimulationDay23 ?>
    <div id="r_StimulationDay23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay23" for="x_StimulationDay23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay23"><?= $Page->StimulationDay23->caption() ?><?= $Page->StimulationDay23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay23"><span id="el_ivf_stimulation_chart_StimulationDay23">
<input type="<?= $Page->StimulationDay23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay23" name="x_StimulationDay23" id="x_StimulationDay23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay23->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay23->EditValue ?>"<?= $Page->StimulationDay23->editAttributes() ?> aria-describedby="x_StimulationDay23_help">
<?= $Page->StimulationDay23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay23->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay24->Visible) { // StimulationDay24 ?>
    <div id="r_StimulationDay24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay24" for="x_StimulationDay24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay24"><?= $Page->StimulationDay24->caption() ?><?= $Page->StimulationDay24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay24"><span id="el_ivf_stimulation_chart_StimulationDay24">
<input type="<?= $Page->StimulationDay24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay24" name="x_StimulationDay24" id="x_StimulationDay24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay24->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay24->EditValue ?>"<?= $Page->StimulationDay24->editAttributes() ?> aria-describedby="x_StimulationDay24_help">
<?= $Page->StimulationDay24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay24->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay25->Visible) { // StimulationDay25 ?>
    <div id="r_StimulationDay25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay25" for="x_StimulationDay25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_StimulationDay25"><?= $Page->StimulationDay25->caption() ?><?= $Page->StimulationDay25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay25"><span id="el_ivf_stimulation_chart_StimulationDay25">
<input type="<?= $Page->StimulationDay25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay25" name="x_StimulationDay25" id="x_StimulationDay25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay25->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay25->EditValue ?>"<?= $Page->StimulationDay25->editAttributes() ?> aria-describedby="x_StimulationDay25_help">
<?= $Page->StimulationDay25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay25->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet14->Visible) { // Tablet14 ?>
    <div id="r_Tablet14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet14" for="x_Tablet14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet14"><?= $Page->Tablet14->caption() ?><?= $Page->Tablet14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet14"><span id="el_ivf_stimulation_chart_Tablet14">
    <select
        id="x_Tablet14"
        name="x_Tablet14"
        class="form-control ew-select<?= $Page->Tablet14->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet14"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet14"
        data-value-separator="<?= $Page->Tablet14->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet14->getPlaceHolder()) ?>"
        <?= $Page->Tablet14->editAttributes() ?>>
        <?= $Page->Tablet14->selectOptionListHtml("x_Tablet14") ?>
    </select>
    <?= $Page->Tablet14->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet14->getErrorMessage() ?></div>
<?= $Page->Tablet14->Lookup->getParamTag($Page, "p_x_Tablet14") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet14']"),
        options = { name: "x_Tablet14", selectId: "ivf_stimulation_chart_x_Tablet14", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet14.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet15->Visible) { // Tablet15 ?>
    <div id="r_Tablet15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet15" for="x_Tablet15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet15"><?= $Page->Tablet15->caption() ?><?= $Page->Tablet15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet15"><span id="el_ivf_stimulation_chart_Tablet15">
    <select
        id="x_Tablet15"
        name="x_Tablet15"
        class="form-control ew-select<?= $Page->Tablet15->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet15"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet15"
        data-value-separator="<?= $Page->Tablet15->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet15->getPlaceHolder()) ?>"
        <?= $Page->Tablet15->editAttributes() ?>>
        <?= $Page->Tablet15->selectOptionListHtml("x_Tablet15") ?>
    </select>
    <?= $Page->Tablet15->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet15->getErrorMessage() ?></div>
<?= $Page->Tablet15->Lookup->getParamTag($Page, "p_x_Tablet15") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet15']"),
        options = { name: "x_Tablet15", selectId: "ivf_stimulation_chart_x_Tablet15", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet15.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet16->Visible) { // Tablet16 ?>
    <div id="r_Tablet16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet16" for="x_Tablet16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet16"><?= $Page->Tablet16->caption() ?><?= $Page->Tablet16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet16"><span id="el_ivf_stimulation_chart_Tablet16">
    <select
        id="x_Tablet16"
        name="x_Tablet16"
        class="form-control ew-select<?= $Page->Tablet16->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet16"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet16"
        data-value-separator="<?= $Page->Tablet16->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet16->getPlaceHolder()) ?>"
        <?= $Page->Tablet16->editAttributes() ?>>
        <?= $Page->Tablet16->selectOptionListHtml("x_Tablet16") ?>
    </select>
    <?= $Page->Tablet16->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet16->getErrorMessage() ?></div>
<?= $Page->Tablet16->Lookup->getParamTag($Page, "p_x_Tablet16") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet16']"),
        options = { name: "x_Tablet16", selectId: "ivf_stimulation_chart_x_Tablet16", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet16.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet17->Visible) { // Tablet17 ?>
    <div id="r_Tablet17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet17" for="x_Tablet17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet17"><?= $Page->Tablet17->caption() ?><?= $Page->Tablet17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet17"><span id="el_ivf_stimulation_chart_Tablet17">
    <select
        id="x_Tablet17"
        name="x_Tablet17"
        class="form-control ew-select<?= $Page->Tablet17->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet17"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet17"
        data-value-separator="<?= $Page->Tablet17->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet17->getPlaceHolder()) ?>"
        <?= $Page->Tablet17->editAttributes() ?>>
        <?= $Page->Tablet17->selectOptionListHtml("x_Tablet17") ?>
    </select>
    <?= $Page->Tablet17->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet17->getErrorMessage() ?></div>
<?= $Page->Tablet17->Lookup->getParamTag($Page, "p_x_Tablet17") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet17']"),
        options = { name: "x_Tablet17", selectId: "ivf_stimulation_chart_x_Tablet17", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet17.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet18->Visible) { // Tablet18 ?>
    <div id="r_Tablet18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet18" for="x_Tablet18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet18"><?= $Page->Tablet18->caption() ?><?= $Page->Tablet18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet18"><span id="el_ivf_stimulation_chart_Tablet18">
    <select
        id="x_Tablet18"
        name="x_Tablet18"
        class="form-control ew-select<?= $Page->Tablet18->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet18"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet18"
        data-value-separator="<?= $Page->Tablet18->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet18->getPlaceHolder()) ?>"
        <?= $Page->Tablet18->editAttributes() ?>>
        <?= $Page->Tablet18->selectOptionListHtml("x_Tablet18") ?>
    </select>
    <?= $Page->Tablet18->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet18->getErrorMessage() ?></div>
<?= $Page->Tablet18->Lookup->getParamTag($Page, "p_x_Tablet18") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet18']"),
        options = { name: "x_Tablet18", selectId: "ivf_stimulation_chart_x_Tablet18", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet18.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet19->Visible) { // Tablet19 ?>
    <div id="r_Tablet19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet19" for="x_Tablet19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet19"><?= $Page->Tablet19->caption() ?><?= $Page->Tablet19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet19"><span id="el_ivf_stimulation_chart_Tablet19">
    <select
        id="x_Tablet19"
        name="x_Tablet19"
        class="form-control ew-select<?= $Page->Tablet19->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet19"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet19"
        data-value-separator="<?= $Page->Tablet19->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet19->getPlaceHolder()) ?>"
        <?= $Page->Tablet19->editAttributes() ?>>
        <?= $Page->Tablet19->selectOptionListHtml("x_Tablet19") ?>
    </select>
    <?= $Page->Tablet19->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet19->getErrorMessage() ?></div>
<?= $Page->Tablet19->Lookup->getParamTag($Page, "p_x_Tablet19") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet19']"),
        options = { name: "x_Tablet19", selectId: "ivf_stimulation_chart_x_Tablet19", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet19.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet20->Visible) { // Tablet20 ?>
    <div id="r_Tablet20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet20" for="x_Tablet20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet20"><?= $Page->Tablet20->caption() ?><?= $Page->Tablet20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet20"><span id="el_ivf_stimulation_chart_Tablet20">
    <select
        id="x_Tablet20"
        name="x_Tablet20"
        class="form-control ew-select<?= $Page->Tablet20->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet20"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet20"
        data-value-separator="<?= $Page->Tablet20->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet20->getPlaceHolder()) ?>"
        <?= $Page->Tablet20->editAttributes() ?>>
        <?= $Page->Tablet20->selectOptionListHtml("x_Tablet20") ?>
    </select>
    <?= $Page->Tablet20->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet20->getErrorMessage() ?></div>
<?= $Page->Tablet20->Lookup->getParamTag($Page, "p_x_Tablet20") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet20']"),
        options = { name: "x_Tablet20", selectId: "ivf_stimulation_chart_x_Tablet20", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet20.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet21->Visible) { // Tablet21 ?>
    <div id="r_Tablet21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet21" for="x_Tablet21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet21"><?= $Page->Tablet21->caption() ?><?= $Page->Tablet21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet21"><span id="el_ivf_stimulation_chart_Tablet21">
    <select
        id="x_Tablet21"
        name="x_Tablet21"
        class="form-control ew-select<?= $Page->Tablet21->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet21"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet21"
        data-value-separator="<?= $Page->Tablet21->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet21->getPlaceHolder()) ?>"
        <?= $Page->Tablet21->editAttributes() ?>>
        <?= $Page->Tablet21->selectOptionListHtml("x_Tablet21") ?>
    </select>
    <?= $Page->Tablet21->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet21->getErrorMessage() ?></div>
<?= $Page->Tablet21->Lookup->getParamTag($Page, "p_x_Tablet21") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet21']"),
        options = { name: "x_Tablet21", selectId: "ivf_stimulation_chart_x_Tablet21", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet21.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet22->Visible) { // Tablet22 ?>
    <div id="r_Tablet22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet22" for="x_Tablet22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet22"><?= $Page->Tablet22->caption() ?><?= $Page->Tablet22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet22"><span id="el_ivf_stimulation_chart_Tablet22">
    <select
        id="x_Tablet22"
        name="x_Tablet22"
        class="form-control ew-select<?= $Page->Tablet22->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet22"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet22"
        data-value-separator="<?= $Page->Tablet22->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet22->getPlaceHolder()) ?>"
        <?= $Page->Tablet22->editAttributes() ?>>
        <?= $Page->Tablet22->selectOptionListHtml("x_Tablet22") ?>
    </select>
    <?= $Page->Tablet22->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet22->getErrorMessage() ?></div>
<?= $Page->Tablet22->Lookup->getParamTag($Page, "p_x_Tablet22") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet22']"),
        options = { name: "x_Tablet22", selectId: "ivf_stimulation_chart_x_Tablet22", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet22.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet23->Visible) { // Tablet23 ?>
    <div id="r_Tablet23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet23" for="x_Tablet23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet23"><?= $Page->Tablet23->caption() ?><?= $Page->Tablet23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet23"><span id="el_ivf_stimulation_chart_Tablet23">
    <select
        id="x_Tablet23"
        name="x_Tablet23"
        class="form-control ew-select<?= $Page->Tablet23->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet23"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet23"
        data-value-separator="<?= $Page->Tablet23->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet23->getPlaceHolder()) ?>"
        <?= $Page->Tablet23->editAttributes() ?>>
        <?= $Page->Tablet23->selectOptionListHtml("x_Tablet23") ?>
    </select>
    <?= $Page->Tablet23->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet23->getErrorMessage() ?></div>
<?= $Page->Tablet23->Lookup->getParamTag($Page, "p_x_Tablet23") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet23']"),
        options = { name: "x_Tablet23", selectId: "ivf_stimulation_chart_x_Tablet23", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet23.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet24->Visible) { // Tablet24 ?>
    <div id="r_Tablet24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet24" for="x_Tablet24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet24"><?= $Page->Tablet24->caption() ?><?= $Page->Tablet24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet24"><span id="el_ivf_stimulation_chart_Tablet24">
    <select
        id="x_Tablet24"
        name="x_Tablet24"
        class="form-control ew-select<?= $Page->Tablet24->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet24"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet24"
        data-value-separator="<?= $Page->Tablet24->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet24->getPlaceHolder()) ?>"
        <?= $Page->Tablet24->editAttributes() ?>>
        <?= $Page->Tablet24->selectOptionListHtml("x_Tablet24") ?>
    </select>
    <?= $Page->Tablet24->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet24->getErrorMessage() ?></div>
<?= $Page->Tablet24->Lookup->getParamTag($Page, "p_x_Tablet24") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet24']"),
        options = { name: "x_Tablet24", selectId: "ivf_stimulation_chart_x_Tablet24", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet24.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet25->Visible) { // Tablet25 ?>
    <div id="r_Tablet25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet25" for="x_Tablet25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Tablet25"><?= $Page->Tablet25->caption() ?><?= $Page->Tablet25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet25"><span id="el_ivf_stimulation_chart_Tablet25">
    <select
        id="x_Tablet25"
        name="x_Tablet25"
        class="form-control ew-select<?= $Page->Tablet25->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_Tablet25"
        data-table="ivf_stimulation_chart"
        data-field="x_Tablet25"
        data-value-separator="<?= $Page->Tablet25->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Tablet25->getPlaceHolder()) ?>"
        <?= $Page->Tablet25->editAttributes() ?>>
        <?= $Page->Tablet25->selectOptionListHtml("x_Tablet25") ?>
    </select>
    <?= $Page->Tablet25->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Tablet25->getErrorMessage() ?></div>
<?= $Page->Tablet25->Lookup->getParamTag($Page, "p_x_Tablet25") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_Tablet25']"),
        options = { name: "x_Tablet25", selectId: "ivf_stimulation_chart_x_Tablet25", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.Tablet25.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH14->Visible) { // RFSH14 ?>
    <div id="r_RFSH14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH14" for="x_RFSH14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH14"><?= $Page->RFSH14->caption() ?><?= $Page->RFSH14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH14"><span id="el_ivf_stimulation_chart_RFSH14">
    <select
        id="x_RFSH14"
        name="x_RFSH14"
        class="form-control ew-select<?= $Page->RFSH14->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH14"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH14"
        data-value-separator="<?= $Page->RFSH14->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH14->getPlaceHolder()) ?>"
        <?= $Page->RFSH14->editAttributes() ?>>
        <?= $Page->RFSH14->selectOptionListHtml("x_RFSH14") ?>
    </select>
    <?= $Page->RFSH14->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH14->getErrorMessage() ?></div>
<?= $Page->RFSH14->Lookup->getParamTag($Page, "p_x_RFSH14") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH14']"),
        options = { name: "x_RFSH14", selectId: "ivf_stimulation_chart_x_RFSH14", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH14.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH15->Visible) { // RFSH15 ?>
    <div id="r_RFSH15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH15" for="x_RFSH15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH15"><?= $Page->RFSH15->caption() ?><?= $Page->RFSH15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH15"><span id="el_ivf_stimulation_chart_RFSH15">
    <select
        id="x_RFSH15"
        name="x_RFSH15"
        class="form-control ew-select<?= $Page->RFSH15->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH15"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH15"
        data-value-separator="<?= $Page->RFSH15->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH15->getPlaceHolder()) ?>"
        <?= $Page->RFSH15->editAttributes() ?>>
        <?= $Page->RFSH15->selectOptionListHtml("x_RFSH15") ?>
    </select>
    <?= $Page->RFSH15->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH15->getErrorMessage() ?></div>
<?= $Page->RFSH15->Lookup->getParamTag($Page, "p_x_RFSH15") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH15']"),
        options = { name: "x_RFSH15", selectId: "ivf_stimulation_chart_x_RFSH15", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH15.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH16->Visible) { // RFSH16 ?>
    <div id="r_RFSH16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH16" for="x_RFSH16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH16"><?= $Page->RFSH16->caption() ?><?= $Page->RFSH16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH16"><span id="el_ivf_stimulation_chart_RFSH16">
    <select
        id="x_RFSH16"
        name="x_RFSH16"
        class="form-control ew-select<?= $Page->RFSH16->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH16"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH16"
        data-value-separator="<?= $Page->RFSH16->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH16->getPlaceHolder()) ?>"
        <?= $Page->RFSH16->editAttributes() ?>>
        <?= $Page->RFSH16->selectOptionListHtml("x_RFSH16") ?>
    </select>
    <?= $Page->RFSH16->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH16->getErrorMessage() ?></div>
<?= $Page->RFSH16->Lookup->getParamTag($Page, "p_x_RFSH16") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH16']"),
        options = { name: "x_RFSH16", selectId: "ivf_stimulation_chart_x_RFSH16", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH16.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH17->Visible) { // RFSH17 ?>
    <div id="r_RFSH17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH17" for="x_RFSH17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH17"><?= $Page->RFSH17->caption() ?><?= $Page->RFSH17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH17"><span id="el_ivf_stimulation_chart_RFSH17">
    <select
        id="x_RFSH17"
        name="x_RFSH17"
        class="form-control ew-select<?= $Page->RFSH17->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH17"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH17"
        data-value-separator="<?= $Page->RFSH17->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH17->getPlaceHolder()) ?>"
        <?= $Page->RFSH17->editAttributes() ?>>
        <?= $Page->RFSH17->selectOptionListHtml("x_RFSH17") ?>
    </select>
    <?= $Page->RFSH17->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH17->getErrorMessage() ?></div>
<?= $Page->RFSH17->Lookup->getParamTag($Page, "p_x_RFSH17") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH17']"),
        options = { name: "x_RFSH17", selectId: "ivf_stimulation_chart_x_RFSH17", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH17.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH18->Visible) { // RFSH18 ?>
    <div id="r_RFSH18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH18" for="x_RFSH18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH18"><?= $Page->RFSH18->caption() ?><?= $Page->RFSH18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH18"><span id="el_ivf_stimulation_chart_RFSH18">
    <select
        id="x_RFSH18"
        name="x_RFSH18"
        class="form-control ew-select<?= $Page->RFSH18->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH18"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH18"
        data-value-separator="<?= $Page->RFSH18->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH18->getPlaceHolder()) ?>"
        <?= $Page->RFSH18->editAttributes() ?>>
        <?= $Page->RFSH18->selectOptionListHtml("x_RFSH18") ?>
    </select>
    <?= $Page->RFSH18->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH18->getErrorMessage() ?></div>
<?= $Page->RFSH18->Lookup->getParamTag($Page, "p_x_RFSH18") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH18']"),
        options = { name: "x_RFSH18", selectId: "ivf_stimulation_chart_x_RFSH18", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH18.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH19->Visible) { // RFSH19 ?>
    <div id="r_RFSH19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH19" for="x_RFSH19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH19"><?= $Page->RFSH19->caption() ?><?= $Page->RFSH19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH19"><span id="el_ivf_stimulation_chart_RFSH19">
    <select
        id="x_RFSH19"
        name="x_RFSH19"
        class="form-control ew-select<?= $Page->RFSH19->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH19"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH19"
        data-value-separator="<?= $Page->RFSH19->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH19->getPlaceHolder()) ?>"
        <?= $Page->RFSH19->editAttributes() ?>>
        <?= $Page->RFSH19->selectOptionListHtml("x_RFSH19") ?>
    </select>
    <?= $Page->RFSH19->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH19->getErrorMessage() ?></div>
<?= $Page->RFSH19->Lookup->getParamTag($Page, "p_x_RFSH19") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH19']"),
        options = { name: "x_RFSH19", selectId: "ivf_stimulation_chart_x_RFSH19", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH19.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH20->Visible) { // RFSH20 ?>
    <div id="r_RFSH20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH20" for="x_RFSH20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH20"><?= $Page->RFSH20->caption() ?><?= $Page->RFSH20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH20"><span id="el_ivf_stimulation_chart_RFSH20">
    <select
        id="x_RFSH20"
        name="x_RFSH20"
        class="form-control ew-select<?= $Page->RFSH20->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH20"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH20"
        data-value-separator="<?= $Page->RFSH20->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH20->getPlaceHolder()) ?>"
        <?= $Page->RFSH20->editAttributes() ?>>
        <?= $Page->RFSH20->selectOptionListHtml("x_RFSH20") ?>
    </select>
    <?= $Page->RFSH20->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH20->getErrorMessage() ?></div>
<?= $Page->RFSH20->Lookup->getParamTag($Page, "p_x_RFSH20") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH20']"),
        options = { name: "x_RFSH20", selectId: "ivf_stimulation_chart_x_RFSH20", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH20.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH21->Visible) { // RFSH21 ?>
    <div id="r_RFSH21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH21" for="x_RFSH21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH21"><?= $Page->RFSH21->caption() ?><?= $Page->RFSH21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH21"><span id="el_ivf_stimulation_chart_RFSH21">
    <select
        id="x_RFSH21"
        name="x_RFSH21"
        class="form-control ew-select<?= $Page->RFSH21->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH21"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH21"
        data-value-separator="<?= $Page->RFSH21->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH21->getPlaceHolder()) ?>"
        <?= $Page->RFSH21->editAttributes() ?>>
        <?= $Page->RFSH21->selectOptionListHtml("x_RFSH21") ?>
    </select>
    <?= $Page->RFSH21->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH21->getErrorMessage() ?></div>
<?= $Page->RFSH21->Lookup->getParamTag($Page, "p_x_RFSH21") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH21']"),
        options = { name: "x_RFSH21", selectId: "ivf_stimulation_chart_x_RFSH21", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH21.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH22->Visible) { // RFSH22 ?>
    <div id="r_RFSH22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH22" for="x_RFSH22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH22"><?= $Page->RFSH22->caption() ?><?= $Page->RFSH22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH22"><span id="el_ivf_stimulation_chart_RFSH22">
    <select
        id="x_RFSH22"
        name="x_RFSH22"
        class="form-control ew-select<?= $Page->RFSH22->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH22"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH22"
        data-value-separator="<?= $Page->RFSH22->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH22->getPlaceHolder()) ?>"
        <?= $Page->RFSH22->editAttributes() ?>>
        <?= $Page->RFSH22->selectOptionListHtml("x_RFSH22") ?>
    </select>
    <?= $Page->RFSH22->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH22->getErrorMessage() ?></div>
<?= $Page->RFSH22->Lookup->getParamTag($Page, "p_x_RFSH22") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH22']"),
        options = { name: "x_RFSH22", selectId: "ivf_stimulation_chart_x_RFSH22", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH22.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH23->Visible) { // RFSH23 ?>
    <div id="r_RFSH23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH23" for="x_RFSH23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH23"><?= $Page->RFSH23->caption() ?><?= $Page->RFSH23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH23"><span id="el_ivf_stimulation_chart_RFSH23">
    <select
        id="x_RFSH23"
        name="x_RFSH23"
        class="form-control ew-select<?= $Page->RFSH23->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH23"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH23"
        data-value-separator="<?= $Page->RFSH23->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH23->getPlaceHolder()) ?>"
        <?= $Page->RFSH23->editAttributes() ?>>
        <?= $Page->RFSH23->selectOptionListHtml("x_RFSH23") ?>
    </select>
    <?= $Page->RFSH23->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH23->getErrorMessage() ?></div>
<?= $Page->RFSH23->Lookup->getParamTag($Page, "p_x_RFSH23") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH23']"),
        options = { name: "x_RFSH23", selectId: "ivf_stimulation_chart_x_RFSH23", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH23.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH24->Visible) { // RFSH24 ?>
    <div id="r_RFSH24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH24" for="x_RFSH24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH24"><?= $Page->RFSH24->caption() ?><?= $Page->RFSH24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH24"><span id="el_ivf_stimulation_chart_RFSH24">
    <select
        id="x_RFSH24"
        name="x_RFSH24"
        class="form-control ew-select<?= $Page->RFSH24->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH24"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH24"
        data-value-separator="<?= $Page->RFSH24->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH24->getPlaceHolder()) ?>"
        <?= $Page->RFSH24->editAttributes() ?>>
        <?= $Page->RFSH24->selectOptionListHtml("x_RFSH24") ?>
    </select>
    <?= $Page->RFSH24->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH24->getErrorMessage() ?></div>
<?= $Page->RFSH24->Lookup->getParamTag($Page, "p_x_RFSH24") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH24']"),
        options = { name: "x_RFSH24", selectId: "ivf_stimulation_chart_x_RFSH24", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH24.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH25->Visible) { // RFSH25 ?>
    <div id="r_RFSH25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH25" for="x_RFSH25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_RFSH25"><?= $Page->RFSH25->caption() ?><?= $Page->RFSH25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH25"><span id="el_ivf_stimulation_chart_RFSH25">
    <select
        id="x_RFSH25"
        name="x_RFSH25"
        class="form-control ew-select<?= $Page->RFSH25->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_RFSH25"
        data-table="ivf_stimulation_chart"
        data-field="x_RFSH25"
        data-value-separator="<?= $Page->RFSH25->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RFSH25->getPlaceHolder()) ?>"
        <?= $Page->RFSH25->editAttributes() ?>>
        <?= $Page->RFSH25->selectOptionListHtml("x_RFSH25") ?>
    </select>
    <?= $Page->RFSH25->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RFSH25->getErrorMessage() ?></div>
<?= $Page->RFSH25->Lookup->getParamTag($Page, "p_x_RFSH25") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_RFSH25']"),
        options = { name: "x_RFSH25", selectId: "ivf_stimulation_chart_x_RFSH25", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.RFSH25.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG14->Visible) { // HMG14 ?>
    <div id="r_HMG14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG14" for="x_HMG14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG14"><?= $Page->HMG14->caption() ?><?= $Page->HMG14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG14"><span id="el_ivf_stimulation_chart_HMG14">
    <select
        id="x_HMG14"
        name="x_HMG14"
        class="form-control ew-select<?= $Page->HMG14->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG14"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG14"
        data-value-separator="<?= $Page->HMG14->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG14->getPlaceHolder()) ?>"
        <?= $Page->HMG14->editAttributes() ?>>
        <?= $Page->HMG14->selectOptionListHtml("x_HMG14") ?>
    </select>
    <?= $Page->HMG14->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG14->getErrorMessage() ?></div>
<?= $Page->HMG14->Lookup->getParamTag($Page, "p_x_HMG14") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG14']"),
        options = { name: "x_HMG14", selectId: "ivf_stimulation_chart_x_HMG14", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG14.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG15->Visible) { // HMG15 ?>
    <div id="r_HMG15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG15" for="x_HMG15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG15"><?= $Page->HMG15->caption() ?><?= $Page->HMG15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG15"><span id="el_ivf_stimulation_chart_HMG15">
    <select
        id="x_HMG15"
        name="x_HMG15"
        class="form-control ew-select<?= $Page->HMG15->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG15"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG15"
        data-value-separator="<?= $Page->HMG15->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG15->getPlaceHolder()) ?>"
        <?= $Page->HMG15->editAttributes() ?>>
        <?= $Page->HMG15->selectOptionListHtml("x_HMG15") ?>
    </select>
    <?= $Page->HMG15->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG15->getErrorMessage() ?></div>
<?= $Page->HMG15->Lookup->getParamTag($Page, "p_x_HMG15") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG15']"),
        options = { name: "x_HMG15", selectId: "ivf_stimulation_chart_x_HMG15", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG15.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG16->Visible) { // HMG16 ?>
    <div id="r_HMG16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG16" for="x_HMG16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG16"><?= $Page->HMG16->caption() ?><?= $Page->HMG16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG16"><span id="el_ivf_stimulation_chart_HMG16">
    <select
        id="x_HMG16"
        name="x_HMG16"
        class="form-control ew-select<?= $Page->HMG16->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG16"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG16"
        data-value-separator="<?= $Page->HMG16->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG16->getPlaceHolder()) ?>"
        <?= $Page->HMG16->editAttributes() ?>>
        <?= $Page->HMG16->selectOptionListHtml("x_HMG16") ?>
    </select>
    <?= $Page->HMG16->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG16->getErrorMessage() ?></div>
<?= $Page->HMG16->Lookup->getParamTag($Page, "p_x_HMG16") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG16']"),
        options = { name: "x_HMG16", selectId: "ivf_stimulation_chart_x_HMG16", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG16.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG17->Visible) { // HMG17 ?>
    <div id="r_HMG17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG17" for="x_HMG17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG17"><?= $Page->HMG17->caption() ?><?= $Page->HMG17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG17"><span id="el_ivf_stimulation_chart_HMG17">
    <select
        id="x_HMG17"
        name="x_HMG17"
        class="form-control ew-select<?= $Page->HMG17->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG17"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG17"
        data-value-separator="<?= $Page->HMG17->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG17->getPlaceHolder()) ?>"
        <?= $Page->HMG17->editAttributes() ?>>
        <?= $Page->HMG17->selectOptionListHtml("x_HMG17") ?>
    </select>
    <?= $Page->HMG17->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG17->getErrorMessage() ?></div>
<?= $Page->HMG17->Lookup->getParamTag($Page, "p_x_HMG17") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG17']"),
        options = { name: "x_HMG17", selectId: "ivf_stimulation_chart_x_HMG17", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG17.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG18->Visible) { // HMG18 ?>
    <div id="r_HMG18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG18" for="x_HMG18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG18"><?= $Page->HMG18->caption() ?><?= $Page->HMG18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG18"><span id="el_ivf_stimulation_chart_HMG18">
    <select
        id="x_HMG18"
        name="x_HMG18"
        class="form-control ew-select<?= $Page->HMG18->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG18"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG18"
        data-value-separator="<?= $Page->HMG18->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG18->getPlaceHolder()) ?>"
        <?= $Page->HMG18->editAttributes() ?>>
        <?= $Page->HMG18->selectOptionListHtml("x_HMG18") ?>
    </select>
    <?= $Page->HMG18->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG18->getErrorMessage() ?></div>
<?= $Page->HMG18->Lookup->getParamTag($Page, "p_x_HMG18") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG18']"),
        options = { name: "x_HMG18", selectId: "ivf_stimulation_chart_x_HMG18", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG18.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG19->Visible) { // HMG19 ?>
    <div id="r_HMG19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG19" for="x_HMG19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG19"><?= $Page->HMG19->caption() ?><?= $Page->HMG19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG19"><span id="el_ivf_stimulation_chart_HMG19">
    <select
        id="x_HMG19"
        name="x_HMG19"
        class="form-control ew-select<?= $Page->HMG19->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG19"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG19"
        data-value-separator="<?= $Page->HMG19->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG19->getPlaceHolder()) ?>"
        <?= $Page->HMG19->editAttributes() ?>>
        <?= $Page->HMG19->selectOptionListHtml("x_HMG19") ?>
    </select>
    <?= $Page->HMG19->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG19->getErrorMessage() ?></div>
<?= $Page->HMG19->Lookup->getParamTag($Page, "p_x_HMG19") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG19']"),
        options = { name: "x_HMG19", selectId: "ivf_stimulation_chart_x_HMG19", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG19.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG20->Visible) { // HMG20 ?>
    <div id="r_HMG20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG20" for="x_HMG20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG20"><?= $Page->HMG20->caption() ?><?= $Page->HMG20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG20"><span id="el_ivf_stimulation_chart_HMG20">
    <select
        id="x_HMG20"
        name="x_HMG20"
        class="form-control ew-select<?= $Page->HMG20->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG20"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG20"
        data-value-separator="<?= $Page->HMG20->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG20->getPlaceHolder()) ?>"
        <?= $Page->HMG20->editAttributes() ?>>
        <?= $Page->HMG20->selectOptionListHtml("x_HMG20") ?>
    </select>
    <?= $Page->HMG20->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG20->getErrorMessage() ?></div>
<?= $Page->HMG20->Lookup->getParamTag($Page, "p_x_HMG20") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG20']"),
        options = { name: "x_HMG20", selectId: "ivf_stimulation_chart_x_HMG20", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG20.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG21->Visible) { // HMG21 ?>
    <div id="r_HMG21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG21" for="x_HMG21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG21"><?= $Page->HMG21->caption() ?><?= $Page->HMG21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG21"><span id="el_ivf_stimulation_chart_HMG21">
    <select
        id="x_HMG21"
        name="x_HMG21"
        class="form-control ew-select<?= $Page->HMG21->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG21"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG21"
        data-value-separator="<?= $Page->HMG21->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG21->getPlaceHolder()) ?>"
        <?= $Page->HMG21->editAttributes() ?>>
        <?= $Page->HMG21->selectOptionListHtml("x_HMG21") ?>
    </select>
    <?= $Page->HMG21->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG21->getErrorMessage() ?></div>
<?= $Page->HMG21->Lookup->getParamTag($Page, "p_x_HMG21") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG21']"),
        options = { name: "x_HMG21", selectId: "ivf_stimulation_chart_x_HMG21", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG21.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG22->Visible) { // HMG22 ?>
    <div id="r_HMG22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG22" for="x_HMG22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG22"><?= $Page->HMG22->caption() ?><?= $Page->HMG22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG22"><span id="el_ivf_stimulation_chart_HMG22">
    <select
        id="x_HMG22"
        name="x_HMG22"
        class="form-control ew-select<?= $Page->HMG22->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG22"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG22"
        data-value-separator="<?= $Page->HMG22->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG22->getPlaceHolder()) ?>"
        <?= $Page->HMG22->editAttributes() ?>>
        <?= $Page->HMG22->selectOptionListHtml("x_HMG22") ?>
    </select>
    <?= $Page->HMG22->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG22->getErrorMessage() ?></div>
<?= $Page->HMG22->Lookup->getParamTag($Page, "p_x_HMG22") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG22']"),
        options = { name: "x_HMG22", selectId: "ivf_stimulation_chart_x_HMG22", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG22.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG23->Visible) { // HMG23 ?>
    <div id="r_HMG23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG23" for="x_HMG23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG23"><?= $Page->HMG23->caption() ?><?= $Page->HMG23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG23"><span id="el_ivf_stimulation_chart_HMG23">
    <select
        id="x_HMG23"
        name="x_HMG23"
        class="form-control ew-select<?= $Page->HMG23->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG23"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG23"
        data-value-separator="<?= $Page->HMG23->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG23->getPlaceHolder()) ?>"
        <?= $Page->HMG23->editAttributes() ?>>
        <?= $Page->HMG23->selectOptionListHtml("x_HMG23") ?>
    </select>
    <?= $Page->HMG23->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG23->getErrorMessage() ?></div>
<?= $Page->HMG23->Lookup->getParamTag($Page, "p_x_HMG23") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG23']"),
        options = { name: "x_HMG23", selectId: "ivf_stimulation_chart_x_HMG23", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG23.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG24->Visible) { // HMG24 ?>
    <div id="r_HMG24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG24" for="x_HMG24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG24"><?= $Page->HMG24->caption() ?><?= $Page->HMG24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG24"><span id="el_ivf_stimulation_chart_HMG24">
    <select
        id="x_HMG24"
        name="x_HMG24"
        class="form-control ew-select<?= $Page->HMG24->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG24"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG24"
        data-value-separator="<?= $Page->HMG24->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG24->getPlaceHolder()) ?>"
        <?= $Page->HMG24->editAttributes() ?>>
        <?= $Page->HMG24->selectOptionListHtml("x_HMG24") ?>
    </select>
    <?= $Page->HMG24->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG24->getErrorMessage() ?></div>
<?= $Page->HMG24->Lookup->getParamTag($Page, "p_x_HMG24") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG24']"),
        options = { name: "x_HMG24", selectId: "ivf_stimulation_chart_x_HMG24", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG24.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG25->Visible) { // HMG25 ?>
    <div id="r_HMG25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG25" for="x_HMG25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HMG25"><?= $Page->HMG25->caption() ?><?= $Page->HMG25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG25"><span id="el_ivf_stimulation_chart_HMG25">
    <select
        id="x_HMG25"
        name="x_HMG25"
        class="form-control ew-select<?= $Page->HMG25->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HMG25"
        data-table="ivf_stimulation_chart"
        data-field="x_HMG25"
        data-value-separator="<?= $Page->HMG25->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HMG25->getPlaceHolder()) ?>"
        <?= $Page->HMG25->editAttributes() ?>>
        <?= $Page->HMG25->selectOptionListHtml("x_HMG25") ?>
    </select>
    <?= $Page->HMG25->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HMG25->getErrorMessage() ?></div>
<?= $Page->HMG25->Lookup->getParamTag($Page, "p_x_HMG25") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HMG25']"),
        options = { name: "x_HMG25", selectId: "ivf_stimulation_chart_x_HMG25", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HMG25.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH14->Visible) { // GnRH14 ?>
    <div id="r_GnRH14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH14" for="x_GnRH14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH14"><?= $Page->GnRH14->caption() ?><?= $Page->GnRH14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH14"><span id="el_ivf_stimulation_chart_GnRH14">
    <select
        id="x_GnRH14"
        name="x_GnRH14"
        class="form-control ew-select<?= $Page->GnRH14->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH14"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH14"
        data-value-separator="<?= $Page->GnRH14->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH14->getPlaceHolder()) ?>"
        <?= $Page->GnRH14->editAttributes() ?>>
        <?= $Page->GnRH14->selectOptionListHtml("x_GnRH14") ?>
    </select>
    <?= $Page->GnRH14->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH14->getErrorMessage() ?></div>
<?= $Page->GnRH14->Lookup->getParamTag($Page, "p_x_GnRH14") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH14']"),
        options = { name: "x_GnRH14", selectId: "ivf_stimulation_chart_x_GnRH14", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH14.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH15->Visible) { // GnRH15 ?>
    <div id="r_GnRH15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH15" for="x_GnRH15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH15"><?= $Page->GnRH15->caption() ?><?= $Page->GnRH15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH15"><span id="el_ivf_stimulation_chart_GnRH15">
    <select
        id="x_GnRH15"
        name="x_GnRH15"
        class="form-control ew-select<?= $Page->GnRH15->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH15"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH15"
        data-value-separator="<?= $Page->GnRH15->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH15->getPlaceHolder()) ?>"
        <?= $Page->GnRH15->editAttributes() ?>>
        <?= $Page->GnRH15->selectOptionListHtml("x_GnRH15") ?>
    </select>
    <?= $Page->GnRH15->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH15->getErrorMessage() ?></div>
<?= $Page->GnRH15->Lookup->getParamTag($Page, "p_x_GnRH15") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH15']"),
        options = { name: "x_GnRH15", selectId: "ivf_stimulation_chart_x_GnRH15", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH15.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH16->Visible) { // GnRH16 ?>
    <div id="r_GnRH16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH16" for="x_GnRH16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH16"><?= $Page->GnRH16->caption() ?><?= $Page->GnRH16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH16"><span id="el_ivf_stimulation_chart_GnRH16">
    <select
        id="x_GnRH16"
        name="x_GnRH16"
        class="form-control ew-select<?= $Page->GnRH16->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH16"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH16"
        data-value-separator="<?= $Page->GnRH16->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH16->getPlaceHolder()) ?>"
        <?= $Page->GnRH16->editAttributes() ?>>
        <?= $Page->GnRH16->selectOptionListHtml("x_GnRH16") ?>
    </select>
    <?= $Page->GnRH16->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH16->getErrorMessage() ?></div>
<?= $Page->GnRH16->Lookup->getParamTag($Page, "p_x_GnRH16") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH16']"),
        options = { name: "x_GnRH16", selectId: "ivf_stimulation_chart_x_GnRH16", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH16.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH17->Visible) { // GnRH17 ?>
    <div id="r_GnRH17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH17" for="x_GnRH17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH17"><?= $Page->GnRH17->caption() ?><?= $Page->GnRH17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH17"><span id="el_ivf_stimulation_chart_GnRH17">
    <select
        id="x_GnRH17"
        name="x_GnRH17"
        class="form-control ew-select<?= $Page->GnRH17->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH17"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH17"
        data-value-separator="<?= $Page->GnRH17->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH17->getPlaceHolder()) ?>"
        <?= $Page->GnRH17->editAttributes() ?>>
        <?= $Page->GnRH17->selectOptionListHtml("x_GnRH17") ?>
    </select>
    <?= $Page->GnRH17->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH17->getErrorMessage() ?></div>
<?= $Page->GnRH17->Lookup->getParamTag($Page, "p_x_GnRH17") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH17']"),
        options = { name: "x_GnRH17", selectId: "ivf_stimulation_chart_x_GnRH17", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH17.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH18->Visible) { // GnRH18 ?>
    <div id="r_GnRH18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH18" for="x_GnRH18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH18"><?= $Page->GnRH18->caption() ?><?= $Page->GnRH18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH18"><span id="el_ivf_stimulation_chart_GnRH18">
    <select
        id="x_GnRH18"
        name="x_GnRH18"
        class="form-control ew-select<?= $Page->GnRH18->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH18"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH18"
        data-value-separator="<?= $Page->GnRH18->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH18->getPlaceHolder()) ?>"
        <?= $Page->GnRH18->editAttributes() ?>>
        <?= $Page->GnRH18->selectOptionListHtml("x_GnRH18") ?>
    </select>
    <?= $Page->GnRH18->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH18->getErrorMessage() ?></div>
<?= $Page->GnRH18->Lookup->getParamTag($Page, "p_x_GnRH18") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH18']"),
        options = { name: "x_GnRH18", selectId: "ivf_stimulation_chart_x_GnRH18", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH18.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH19->Visible) { // GnRH19 ?>
    <div id="r_GnRH19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH19" for="x_GnRH19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH19"><?= $Page->GnRH19->caption() ?><?= $Page->GnRH19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH19"><span id="el_ivf_stimulation_chart_GnRH19">
    <select
        id="x_GnRH19"
        name="x_GnRH19"
        class="form-control ew-select<?= $Page->GnRH19->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH19"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH19"
        data-value-separator="<?= $Page->GnRH19->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH19->getPlaceHolder()) ?>"
        <?= $Page->GnRH19->editAttributes() ?>>
        <?= $Page->GnRH19->selectOptionListHtml("x_GnRH19") ?>
    </select>
    <?= $Page->GnRH19->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH19->getErrorMessage() ?></div>
<?= $Page->GnRH19->Lookup->getParamTag($Page, "p_x_GnRH19") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH19']"),
        options = { name: "x_GnRH19", selectId: "ivf_stimulation_chart_x_GnRH19", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH19.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH20->Visible) { // GnRH20 ?>
    <div id="r_GnRH20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH20" for="x_GnRH20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH20"><?= $Page->GnRH20->caption() ?><?= $Page->GnRH20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH20"><span id="el_ivf_stimulation_chart_GnRH20">
    <select
        id="x_GnRH20"
        name="x_GnRH20"
        class="form-control ew-select<?= $Page->GnRH20->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH20"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH20"
        data-value-separator="<?= $Page->GnRH20->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH20->getPlaceHolder()) ?>"
        <?= $Page->GnRH20->editAttributes() ?>>
        <?= $Page->GnRH20->selectOptionListHtml("x_GnRH20") ?>
    </select>
    <?= $Page->GnRH20->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH20->getErrorMessage() ?></div>
<?= $Page->GnRH20->Lookup->getParamTag($Page, "p_x_GnRH20") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH20']"),
        options = { name: "x_GnRH20", selectId: "ivf_stimulation_chart_x_GnRH20", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH20.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH21->Visible) { // GnRH21 ?>
    <div id="r_GnRH21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH21" for="x_GnRH21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH21"><?= $Page->GnRH21->caption() ?><?= $Page->GnRH21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH21"><span id="el_ivf_stimulation_chart_GnRH21">
    <select
        id="x_GnRH21"
        name="x_GnRH21"
        class="form-control ew-select<?= $Page->GnRH21->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH21"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH21"
        data-value-separator="<?= $Page->GnRH21->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH21->getPlaceHolder()) ?>"
        <?= $Page->GnRH21->editAttributes() ?>>
        <?= $Page->GnRH21->selectOptionListHtml("x_GnRH21") ?>
    </select>
    <?= $Page->GnRH21->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH21->getErrorMessage() ?></div>
<?= $Page->GnRH21->Lookup->getParamTag($Page, "p_x_GnRH21") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH21']"),
        options = { name: "x_GnRH21", selectId: "ivf_stimulation_chart_x_GnRH21", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH21.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH22->Visible) { // GnRH22 ?>
    <div id="r_GnRH22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH22" for="x_GnRH22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH22"><?= $Page->GnRH22->caption() ?><?= $Page->GnRH22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH22"><span id="el_ivf_stimulation_chart_GnRH22">
    <select
        id="x_GnRH22"
        name="x_GnRH22"
        class="form-control ew-select<?= $Page->GnRH22->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH22"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH22"
        data-value-separator="<?= $Page->GnRH22->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH22->getPlaceHolder()) ?>"
        <?= $Page->GnRH22->editAttributes() ?>>
        <?= $Page->GnRH22->selectOptionListHtml("x_GnRH22") ?>
    </select>
    <?= $Page->GnRH22->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH22->getErrorMessage() ?></div>
<?= $Page->GnRH22->Lookup->getParamTag($Page, "p_x_GnRH22") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH22']"),
        options = { name: "x_GnRH22", selectId: "ivf_stimulation_chart_x_GnRH22", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH22.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH23->Visible) { // GnRH23 ?>
    <div id="r_GnRH23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH23" for="x_GnRH23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH23"><?= $Page->GnRH23->caption() ?><?= $Page->GnRH23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH23"><span id="el_ivf_stimulation_chart_GnRH23">
    <select
        id="x_GnRH23"
        name="x_GnRH23"
        class="form-control ew-select<?= $Page->GnRH23->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH23"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH23"
        data-value-separator="<?= $Page->GnRH23->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH23->getPlaceHolder()) ?>"
        <?= $Page->GnRH23->editAttributes() ?>>
        <?= $Page->GnRH23->selectOptionListHtml("x_GnRH23") ?>
    </select>
    <?= $Page->GnRH23->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH23->getErrorMessage() ?></div>
<?= $Page->GnRH23->Lookup->getParamTag($Page, "p_x_GnRH23") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH23']"),
        options = { name: "x_GnRH23", selectId: "ivf_stimulation_chart_x_GnRH23", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH23.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH24->Visible) { // GnRH24 ?>
    <div id="r_GnRH24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH24" for="x_GnRH24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH24"><?= $Page->GnRH24->caption() ?><?= $Page->GnRH24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH24"><span id="el_ivf_stimulation_chart_GnRH24">
    <select
        id="x_GnRH24"
        name="x_GnRH24"
        class="form-control ew-select<?= $Page->GnRH24->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH24"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH24"
        data-value-separator="<?= $Page->GnRH24->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH24->getPlaceHolder()) ?>"
        <?= $Page->GnRH24->editAttributes() ?>>
        <?= $Page->GnRH24->selectOptionListHtml("x_GnRH24") ?>
    </select>
    <?= $Page->GnRH24->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH24->getErrorMessage() ?></div>
<?= $Page->GnRH24->Lookup->getParamTag($Page, "p_x_GnRH24") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH24']"),
        options = { name: "x_GnRH24", selectId: "ivf_stimulation_chart_x_GnRH24", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH24.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH25->Visible) { // GnRH25 ?>
    <div id="r_GnRH25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH25" for="x_GnRH25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_GnRH25"><?= $Page->GnRH25->caption() ?><?= $Page->GnRH25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH25"><span id="el_ivf_stimulation_chart_GnRH25">
    <select
        id="x_GnRH25"
        name="x_GnRH25"
        class="form-control ew-select<?= $Page->GnRH25->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_GnRH25"
        data-table="ivf_stimulation_chart"
        data-field="x_GnRH25"
        data-value-separator="<?= $Page->GnRH25->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GnRH25->getPlaceHolder()) ?>"
        <?= $Page->GnRH25->editAttributes() ?>>
        <?= $Page->GnRH25->selectOptionListHtml("x_GnRH25") ?>
    </select>
    <?= $Page->GnRH25->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GnRH25->getErrorMessage() ?></div>
<?= $Page->GnRH25->Lookup->getParamTag($Page, "p_x_GnRH25") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_GnRH25']"),
        options = { name: "x_GnRH25", selectId: "ivf_stimulation_chart_x_GnRH25", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.GnRH25.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P414->Visible) { // P414 ?>
    <div id="r_P414" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P414" for="x_P414" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P414"><?= $Page->P414->caption() ?><?= $Page->P414->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P414->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P414"><span id="el_ivf_stimulation_chart_P414">
<input type="<?= $Page->P414->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P414" name="x_P414" id="x_P414" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P414->getPlaceHolder()) ?>" value="<?= $Page->P414->EditValue ?>"<?= $Page->P414->editAttributes() ?> aria-describedby="x_P414_help">
<?= $Page->P414->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P414->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P415->Visible) { // P415 ?>
    <div id="r_P415" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P415" for="x_P415" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P415"><?= $Page->P415->caption() ?><?= $Page->P415->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P415->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P415"><span id="el_ivf_stimulation_chart_P415">
<input type="<?= $Page->P415->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P415" name="x_P415" id="x_P415" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P415->getPlaceHolder()) ?>" value="<?= $Page->P415->EditValue ?>"<?= $Page->P415->editAttributes() ?> aria-describedby="x_P415_help">
<?= $Page->P415->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P415->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P416->Visible) { // P416 ?>
    <div id="r_P416" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P416" for="x_P416" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P416"><?= $Page->P416->caption() ?><?= $Page->P416->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P416->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P416"><span id="el_ivf_stimulation_chart_P416">
<input type="<?= $Page->P416->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P416" name="x_P416" id="x_P416" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P416->getPlaceHolder()) ?>" value="<?= $Page->P416->EditValue ?>"<?= $Page->P416->editAttributes() ?> aria-describedby="x_P416_help">
<?= $Page->P416->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P416->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P417->Visible) { // P417 ?>
    <div id="r_P417" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P417" for="x_P417" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P417"><?= $Page->P417->caption() ?><?= $Page->P417->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P417->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P417"><span id="el_ivf_stimulation_chart_P417">
<input type="<?= $Page->P417->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P417" name="x_P417" id="x_P417" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P417->getPlaceHolder()) ?>" value="<?= $Page->P417->EditValue ?>"<?= $Page->P417->editAttributes() ?> aria-describedby="x_P417_help">
<?= $Page->P417->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P417->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P418->Visible) { // P418 ?>
    <div id="r_P418" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P418" for="x_P418" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P418"><?= $Page->P418->caption() ?><?= $Page->P418->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P418->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P418"><span id="el_ivf_stimulation_chart_P418">
<input type="<?= $Page->P418->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P418" name="x_P418" id="x_P418" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P418->getPlaceHolder()) ?>" value="<?= $Page->P418->EditValue ?>"<?= $Page->P418->editAttributes() ?> aria-describedby="x_P418_help">
<?= $Page->P418->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P418->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P419->Visible) { // P419 ?>
    <div id="r_P419" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P419" for="x_P419" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P419"><?= $Page->P419->caption() ?><?= $Page->P419->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P419->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P419"><span id="el_ivf_stimulation_chart_P419">
<input type="<?= $Page->P419->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P419" name="x_P419" id="x_P419" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P419->getPlaceHolder()) ?>" value="<?= $Page->P419->EditValue ?>"<?= $Page->P419->editAttributes() ?> aria-describedby="x_P419_help">
<?= $Page->P419->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P419->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P420->Visible) { // P420 ?>
    <div id="r_P420" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P420" for="x_P420" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P420"><?= $Page->P420->caption() ?><?= $Page->P420->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P420->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P420"><span id="el_ivf_stimulation_chart_P420">
<input type="<?= $Page->P420->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P420" name="x_P420" id="x_P420" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P420->getPlaceHolder()) ?>" value="<?= $Page->P420->EditValue ?>"<?= $Page->P420->editAttributes() ?> aria-describedby="x_P420_help">
<?= $Page->P420->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P420->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P421->Visible) { // P421 ?>
    <div id="r_P421" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P421" for="x_P421" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P421"><?= $Page->P421->caption() ?><?= $Page->P421->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P421->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P421"><span id="el_ivf_stimulation_chart_P421">
<input type="<?= $Page->P421->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P421" name="x_P421" id="x_P421" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P421->getPlaceHolder()) ?>" value="<?= $Page->P421->EditValue ?>"<?= $Page->P421->editAttributes() ?> aria-describedby="x_P421_help">
<?= $Page->P421->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P421->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P422->Visible) { // P422 ?>
    <div id="r_P422" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P422" for="x_P422" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P422"><?= $Page->P422->caption() ?><?= $Page->P422->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P422->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P422"><span id="el_ivf_stimulation_chart_P422">
<input type="<?= $Page->P422->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P422" name="x_P422" id="x_P422" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P422->getPlaceHolder()) ?>" value="<?= $Page->P422->EditValue ?>"<?= $Page->P422->editAttributes() ?> aria-describedby="x_P422_help">
<?= $Page->P422->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P422->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P423->Visible) { // P423 ?>
    <div id="r_P423" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P423" for="x_P423" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P423"><?= $Page->P423->caption() ?><?= $Page->P423->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P423->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P423"><span id="el_ivf_stimulation_chart_P423">
<input type="<?= $Page->P423->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P423" name="x_P423" id="x_P423" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P423->getPlaceHolder()) ?>" value="<?= $Page->P423->EditValue ?>"<?= $Page->P423->editAttributes() ?> aria-describedby="x_P423_help">
<?= $Page->P423->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P423->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P424->Visible) { // P424 ?>
    <div id="r_P424" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P424" for="x_P424" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P424"><?= $Page->P424->caption() ?><?= $Page->P424->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P424->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P424"><span id="el_ivf_stimulation_chart_P424">
<input type="<?= $Page->P424->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P424" name="x_P424" id="x_P424" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P424->getPlaceHolder()) ?>" value="<?= $Page->P424->EditValue ?>"<?= $Page->P424->editAttributes() ?> aria-describedby="x_P424_help">
<?= $Page->P424->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P424->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P425->Visible) { // P425 ?>
    <div id="r_P425" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P425" for="x_P425" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_P425"><?= $Page->P425->caption() ?><?= $Page->P425->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P425->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P425"><span id="el_ivf_stimulation_chart_P425">
<input type="<?= $Page->P425->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P425" name="x_P425" id="x_P425" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P425->getPlaceHolder()) ?>" value="<?= $Page->P425->EditValue ?>"<?= $Page->P425->editAttributes() ?> aria-describedby="x_P425_help">
<?= $Page->P425->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P425->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt14->Visible) { // USGRt14 ?>
    <div id="r_USGRt14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt14" for="x_USGRt14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt14"><?= $Page->USGRt14->caption() ?><?= $Page->USGRt14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt14"><span id="el_ivf_stimulation_chart_USGRt14">
<input type="<?= $Page->USGRt14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt14" name="x_USGRt14" id="x_USGRt14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt14->getPlaceHolder()) ?>" value="<?= $Page->USGRt14->EditValue ?>"<?= $Page->USGRt14->editAttributes() ?> aria-describedby="x_USGRt14_help">
<?= $Page->USGRt14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt14->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt15->Visible) { // USGRt15 ?>
    <div id="r_USGRt15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt15" for="x_USGRt15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt15"><?= $Page->USGRt15->caption() ?><?= $Page->USGRt15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt15"><span id="el_ivf_stimulation_chart_USGRt15">
<input type="<?= $Page->USGRt15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt15" name="x_USGRt15" id="x_USGRt15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt15->getPlaceHolder()) ?>" value="<?= $Page->USGRt15->EditValue ?>"<?= $Page->USGRt15->editAttributes() ?> aria-describedby="x_USGRt15_help">
<?= $Page->USGRt15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt15->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt16->Visible) { // USGRt16 ?>
    <div id="r_USGRt16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt16" for="x_USGRt16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt16"><?= $Page->USGRt16->caption() ?><?= $Page->USGRt16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt16"><span id="el_ivf_stimulation_chart_USGRt16">
<input type="<?= $Page->USGRt16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt16" name="x_USGRt16" id="x_USGRt16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt16->getPlaceHolder()) ?>" value="<?= $Page->USGRt16->EditValue ?>"<?= $Page->USGRt16->editAttributes() ?> aria-describedby="x_USGRt16_help">
<?= $Page->USGRt16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt16->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt17->Visible) { // USGRt17 ?>
    <div id="r_USGRt17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt17" for="x_USGRt17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt17"><?= $Page->USGRt17->caption() ?><?= $Page->USGRt17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt17"><span id="el_ivf_stimulation_chart_USGRt17">
<input type="<?= $Page->USGRt17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt17" name="x_USGRt17" id="x_USGRt17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt17->getPlaceHolder()) ?>" value="<?= $Page->USGRt17->EditValue ?>"<?= $Page->USGRt17->editAttributes() ?> aria-describedby="x_USGRt17_help">
<?= $Page->USGRt17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt17->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt18->Visible) { // USGRt18 ?>
    <div id="r_USGRt18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt18" for="x_USGRt18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt18"><?= $Page->USGRt18->caption() ?><?= $Page->USGRt18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt18"><span id="el_ivf_stimulation_chart_USGRt18">
<input type="<?= $Page->USGRt18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt18" name="x_USGRt18" id="x_USGRt18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt18->getPlaceHolder()) ?>" value="<?= $Page->USGRt18->EditValue ?>"<?= $Page->USGRt18->editAttributes() ?> aria-describedby="x_USGRt18_help">
<?= $Page->USGRt18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt18->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt19->Visible) { // USGRt19 ?>
    <div id="r_USGRt19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt19" for="x_USGRt19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt19"><?= $Page->USGRt19->caption() ?><?= $Page->USGRt19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt19"><span id="el_ivf_stimulation_chart_USGRt19">
<input type="<?= $Page->USGRt19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt19" name="x_USGRt19" id="x_USGRt19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt19->getPlaceHolder()) ?>" value="<?= $Page->USGRt19->EditValue ?>"<?= $Page->USGRt19->editAttributes() ?> aria-describedby="x_USGRt19_help">
<?= $Page->USGRt19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt19->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt20->Visible) { // USGRt20 ?>
    <div id="r_USGRt20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt20" for="x_USGRt20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt20"><?= $Page->USGRt20->caption() ?><?= $Page->USGRt20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt20"><span id="el_ivf_stimulation_chart_USGRt20">
<input type="<?= $Page->USGRt20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt20" name="x_USGRt20" id="x_USGRt20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt20->getPlaceHolder()) ?>" value="<?= $Page->USGRt20->EditValue ?>"<?= $Page->USGRt20->editAttributes() ?> aria-describedby="x_USGRt20_help">
<?= $Page->USGRt20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt20->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt21->Visible) { // USGRt21 ?>
    <div id="r_USGRt21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt21" for="x_USGRt21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt21"><?= $Page->USGRt21->caption() ?><?= $Page->USGRt21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt21"><span id="el_ivf_stimulation_chart_USGRt21">
<input type="<?= $Page->USGRt21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt21" name="x_USGRt21" id="x_USGRt21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt21->getPlaceHolder()) ?>" value="<?= $Page->USGRt21->EditValue ?>"<?= $Page->USGRt21->editAttributes() ?> aria-describedby="x_USGRt21_help">
<?= $Page->USGRt21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt21->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt22->Visible) { // USGRt22 ?>
    <div id="r_USGRt22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt22" for="x_USGRt22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt22"><?= $Page->USGRt22->caption() ?><?= $Page->USGRt22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt22"><span id="el_ivf_stimulation_chart_USGRt22">
<input type="<?= $Page->USGRt22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt22" name="x_USGRt22" id="x_USGRt22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt22->getPlaceHolder()) ?>" value="<?= $Page->USGRt22->EditValue ?>"<?= $Page->USGRt22->editAttributes() ?> aria-describedby="x_USGRt22_help">
<?= $Page->USGRt22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt22->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt23->Visible) { // USGRt23 ?>
    <div id="r_USGRt23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt23" for="x_USGRt23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt23"><?= $Page->USGRt23->caption() ?><?= $Page->USGRt23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt23"><span id="el_ivf_stimulation_chart_USGRt23">
<input type="<?= $Page->USGRt23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt23" name="x_USGRt23" id="x_USGRt23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt23->getPlaceHolder()) ?>" value="<?= $Page->USGRt23->EditValue ?>"<?= $Page->USGRt23->editAttributes() ?> aria-describedby="x_USGRt23_help">
<?= $Page->USGRt23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt23->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt24->Visible) { // USGRt24 ?>
    <div id="r_USGRt24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt24" for="x_USGRt24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt24"><?= $Page->USGRt24->caption() ?><?= $Page->USGRt24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt24"><span id="el_ivf_stimulation_chart_USGRt24">
<input type="<?= $Page->USGRt24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt24" name="x_USGRt24" id="x_USGRt24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt24->getPlaceHolder()) ?>" value="<?= $Page->USGRt24->EditValue ?>"<?= $Page->USGRt24->editAttributes() ?> aria-describedby="x_USGRt24_help">
<?= $Page->USGRt24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt24->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt25->Visible) { // USGRt25 ?>
    <div id="r_USGRt25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt25" for="x_USGRt25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGRt25"><?= $Page->USGRt25->caption() ?><?= $Page->USGRt25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt25"><span id="el_ivf_stimulation_chart_USGRt25">
<input type="<?= $Page->USGRt25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt25" name="x_USGRt25" id="x_USGRt25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt25->getPlaceHolder()) ?>" value="<?= $Page->USGRt25->EditValue ?>"<?= $Page->USGRt25->editAttributes() ?> aria-describedby="x_USGRt25_help">
<?= $Page->USGRt25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt25->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt14->Visible) { // USGLt14 ?>
    <div id="r_USGLt14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt14" for="x_USGLt14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt14"><?= $Page->USGLt14->caption() ?><?= $Page->USGLt14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt14"><span id="el_ivf_stimulation_chart_USGLt14">
<input type="<?= $Page->USGLt14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt14" name="x_USGLt14" id="x_USGLt14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt14->getPlaceHolder()) ?>" value="<?= $Page->USGLt14->EditValue ?>"<?= $Page->USGLt14->editAttributes() ?> aria-describedby="x_USGLt14_help">
<?= $Page->USGLt14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt14->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt15->Visible) { // USGLt15 ?>
    <div id="r_USGLt15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt15" for="x_USGLt15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt15"><?= $Page->USGLt15->caption() ?><?= $Page->USGLt15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt15"><span id="el_ivf_stimulation_chart_USGLt15">
<input type="<?= $Page->USGLt15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt15" name="x_USGLt15" id="x_USGLt15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt15->getPlaceHolder()) ?>" value="<?= $Page->USGLt15->EditValue ?>"<?= $Page->USGLt15->editAttributes() ?> aria-describedby="x_USGLt15_help">
<?= $Page->USGLt15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt15->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt16->Visible) { // USGLt16 ?>
    <div id="r_USGLt16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt16" for="x_USGLt16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt16"><?= $Page->USGLt16->caption() ?><?= $Page->USGLt16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt16"><span id="el_ivf_stimulation_chart_USGLt16">
<input type="<?= $Page->USGLt16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt16" name="x_USGLt16" id="x_USGLt16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt16->getPlaceHolder()) ?>" value="<?= $Page->USGLt16->EditValue ?>"<?= $Page->USGLt16->editAttributes() ?> aria-describedby="x_USGLt16_help">
<?= $Page->USGLt16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt16->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt17->Visible) { // USGLt17 ?>
    <div id="r_USGLt17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt17" for="x_USGLt17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt17"><?= $Page->USGLt17->caption() ?><?= $Page->USGLt17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt17"><span id="el_ivf_stimulation_chart_USGLt17">
<input type="<?= $Page->USGLt17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt17" name="x_USGLt17" id="x_USGLt17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt17->getPlaceHolder()) ?>" value="<?= $Page->USGLt17->EditValue ?>"<?= $Page->USGLt17->editAttributes() ?> aria-describedby="x_USGLt17_help">
<?= $Page->USGLt17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt17->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt18->Visible) { // USGLt18 ?>
    <div id="r_USGLt18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt18" for="x_USGLt18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt18"><?= $Page->USGLt18->caption() ?><?= $Page->USGLt18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt18"><span id="el_ivf_stimulation_chart_USGLt18">
<input type="<?= $Page->USGLt18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt18" name="x_USGLt18" id="x_USGLt18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt18->getPlaceHolder()) ?>" value="<?= $Page->USGLt18->EditValue ?>"<?= $Page->USGLt18->editAttributes() ?> aria-describedby="x_USGLt18_help">
<?= $Page->USGLt18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt18->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt19->Visible) { // USGLt19 ?>
    <div id="r_USGLt19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt19" for="x_USGLt19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt19"><?= $Page->USGLt19->caption() ?><?= $Page->USGLt19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt19"><span id="el_ivf_stimulation_chart_USGLt19">
<input type="<?= $Page->USGLt19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt19" name="x_USGLt19" id="x_USGLt19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt19->getPlaceHolder()) ?>" value="<?= $Page->USGLt19->EditValue ?>"<?= $Page->USGLt19->editAttributes() ?> aria-describedby="x_USGLt19_help">
<?= $Page->USGLt19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt19->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt20->Visible) { // USGLt20 ?>
    <div id="r_USGLt20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt20" for="x_USGLt20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt20"><?= $Page->USGLt20->caption() ?><?= $Page->USGLt20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt20"><span id="el_ivf_stimulation_chart_USGLt20">
<input type="<?= $Page->USGLt20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt20" name="x_USGLt20" id="x_USGLt20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt20->getPlaceHolder()) ?>" value="<?= $Page->USGLt20->EditValue ?>"<?= $Page->USGLt20->editAttributes() ?> aria-describedby="x_USGLt20_help">
<?= $Page->USGLt20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt20->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt21->Visible) { // USGLt21 ?>
    <div id="r_USGLt21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt21" for="x_USGLt21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt21"><?= $Page->USGLt21->caption() ?><?= $Page->USGLt21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt21"><span id="el_ivf_stimulation_chart_USGLt21">
<input type="<?= $Page->USGLt21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt21" name="x_USGLt21" id="x_USGLt21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt21->getPlaceHolder()) ?>" value="<?= $Page->USGLt21->EditValue ?>"<?= $Page->USGLt21->editAttributes() ?> aria-describedby="x_USGLt21_help">
<?= $Page->USGLt21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt21->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt22->Visible) { // USGLt22 ?>
    <div id="r_USGLt22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt22" for="x_USGLt22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt22"><?= $Page->USGLt22->caption() ?><?= $Page->USGLt22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt22"><span id="el_ivf_stimulation_chart_USGLt22">
<input type="<?= $Page->USGLt22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt22" name="x_USGLt22" id="x_USGLt22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt22->getPlaceHolder()) ?>" value="<?= $Page->USGLt22->EditValue ?>"<?= $Page->USGLt22->editAttributes() ?> aria-describedby="x_USGLt22_help">
<?= $Page->USGLt22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt22->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt23->Visible) { // USGLt23 ?>
    <div id="r_USGLt23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt23" for="x_USGLt23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt23"><?= $Page->USGLt23->caption() ?><?= $Page->USGLt23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt23"><span id="el_ivf_stimulation_chart_USGLt23">
<input type="<?= $Page->USGLt23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt23" name="x_USGLt23" id="x_USGLt23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt23->getPlaceHolder()) ?>" value="<?= $Page->USGLt23->EditValue ?>"<?= $Page->USGLt23->editAttributes() ?> aria-describedby="x_USGLt23_help">
<?= $Page->USGLt23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt23->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt24->Visible) { // USGLt24 ?>
    <div id="r_USGLt24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt24" for="x_USGLt24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt24"><?= $Page->USGLt24->caption() ?><?= $Page->USGLt24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt24"><span id="el_ivf_stimulation_chart_USGLt24">
<input type="<?= $Page->USGLt24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt24" name="x_USGLt24" id="x_USGLt24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt24->getPlaceHolder()) ?>" value="<?= $Page->USGLt24->EditValue ?>"<?= $Page->USGLt24->editAttributes() ?> aria-describedby="x_USGLt24_help">
<?= $Page->USGLt24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt24->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt25->Visible) { // USGLt25 ?>
    <div id="r_USGLt25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt25" for="x_USGLt25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_USGLt25"><?= $Page->USGLt25->caption() ?><?= $Page->USGLt25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt25"><span id="el_ivf_stimulation_chart_USGLt25">
<input type="<?= $Page->USGLt25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt25" name="x_USGLt25" id="x_USGLt25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt25->getPlaceHolder()) ?>" value="<?= $Page->USGLt25->EditValue ?>"<?= $Page->USGLt25->editAttributes() ?> aria-describedby="x_USGLt25_help">
<?= $Page->USGLt25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt25->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM14->Visible) { // EM14 ?>
    <div id="r_EM14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM14" for="x_EM14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM14"><?= $Page->EM14->caption() ?><?= $Page->EM14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM14"><span id="el_ivf_stimulation_chart_EM14">
<input type="<?= $Page->EM14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM14" name="x_EM14" id="x_EM14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM14->getPlaceHolder()) ?>" value="<?= $Page->EM14->EditValue ?>"<?= $Page->EM14->editAttributes() ?> aria-describedby="x_EM14_help">
<?= $Page->EM14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM14->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM15->Visible) { // EM15 ?>
    <div id="r_EM15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM15" for="x_EM15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM15"><?= $Page->EM15->caption() ?><?= $Page->EM15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM15"><span id="el_ivf_stimulation_chart_EM15">
<input type="<?= $Page->EM15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM15" name="x_EM15" id="x_EM15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM15->getPlaceHolder()) ?>" value="<?= $Page->EM15->EditValue ?>"<?= $Page->EM15->editAttributes() ?> aria-describedby="x_EM15_help">
<?= $Page->EM15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM15->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM16->Visible) { // EM16 ?>
    <div id="r_EM16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM16" for="x_EM16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM16"><?= $Page->EM16->caption() ?><?= $Page->EM16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM16"><span id="el_ivf_stimulation_chart_EM16">
<input type="<?= $Page->EM16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM16" name="x_EM16" id="x_EM16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM16->getPlaceHolder()) ?>" value="<?= $Page->EM16->EditValue ?>"<?= $Page->EM16->editAttributes() ?> aria-describedby="x_EM16_help">
<?= $Page->EM16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM16->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM17->Visible) { // EM17 ?>
    <div id="r_EM17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM17" for="x_EM17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM17"><?= $Page->EM17->caption() ?><?= $Page->EM17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM17"><span id="el_ivf_stimulation_chart_EM17">
<input type="<?= $Page->EM17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM17" name="x_EM17" id="x_EM17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM17->getPlaceHolder()) ?>" value="<?= $Page->EM17->EditValue ?>"<?= $Page->EM17->editAttributes() ?> aria-describedby="x_EM17_help">
<?= $Page->EM17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM17->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM18->Visible) { // EM18 ?>
    <div id="r_EM18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM18" for="x_EM18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM18"><?= $Page->EM18->caption() ?><?= $Page->EM18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM18"><span id="el_ivf_stimulation_chart_EM18">
<input type="<?= $Page->EM18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM18" name="x_EM18" id="x_EM18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM18->getPlaceHolder()) ?>" value="<?= $Page->EM18->EditValue ?>"<?= $Page->EM18->editAttributes() ?> aria-describedby="x_EM18_help">
<?= $Page->EM18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM18->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM19->Visible) { // EM19 ?>
    <div id="r_EM19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM19" for="x_EM19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM19"><?= $Page->EM19->caption() ?><?= $Page->EM19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM19"><span id="el_ivf_stimulation_chart_EM19">
<input type="<?= $Page->EM19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM19" name="x_EM19" id="x_EM19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM19->getPlaceHolder()) ?>" value="<?= $Page->EM19->EditValue ?>"<?= $Page->EM19->editAttributes() ?> aria-describedby="x_EM19_help">
<?= $Page->EM19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM19->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM20->Visible) { // EM20 ?>
    <div id="r_EM20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM20" for="x_EM20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM20"><?= $Page->EM20->caption() ?><?= $Page->EM20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM20"><span id="el_ivf_stimulation_chart_EM20">
<input type="<?= $Page->EM20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM20" name="x_EM20" id="x_EM20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM20->getPlaceHolder()) ?>" value="<?= $Page->EM20->EditValue ?>"<?= $Page->EM20->editAttributes() ?> aria-describedby="x_EM20_help">
<?= $Page->EM20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM20->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM21->Visible) { // EM21 ?>
    <div id="r_EM21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM21" for="x_EM21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM21"><?= $Page->EM21->caption() ?><?= $Page->EM21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM21"><span id="el_ivf_stimulation_chart_EM21">
<input type="<?= $Page->EM21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM21" name="x_EM21" id="x_EM21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM21->getPlaceHolder()) ?>" value="<?= $Page->EM21->EditValue ?>"<?= $Page->EM21->editAttributes() ?> aria-describedby="x_EM21_help">
<?= $Page->EM21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM21->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM22->Visible) { // EM22 ?>
    <div id="r_EM22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM22" for="x_EM22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM22"><?= $Page->EM22->caption() ?><?= $Page->EM22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM22"><span id="el_ivf_stimulation_chart_EM22">
<input type="<?= $Page->EM22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM22" name="x_EM22" id="x_EM22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM22->getPlaceHolder()) ?>" value="<?= $Page->EM22->EditValue ?>"<?= $Page->EM22->editAttributes() ?> aria-describedby="x_EM22_help">
<?= $Page->EM22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM22->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM23->Visible) { // EM23 ?>
    <div id="r_EM23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM23" for="x_EM23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM23"><?= $Page->EM23->caption() ?><?= $Page->EM23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM23"><span id="el_ivf_stimulation_chart_EM23">
<input type="<?= $Page->EM23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM23" name="x_EM23" id="x_EM23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM23->getPlaceHolder()) ?>" value="<?= $Page->EM23->EditValue ?>"<?= $Page->EM23->editAttributes() ?> aria-describedby="x_EM23_help">
<?= $Page->EM23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM23->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM24->Visible) { // EM24 ?>
    <div id="r_EM24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM24" for="x_EM24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM24"><?= $Page->EM24->caption() ?><?= $Page->EM24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM24"><span id="el_ivf_stimulation_chart_EM24">
<input type="<?= $Page->EM24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM24" name="x_EM24" id="x_EM24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM24->getPlaceHolder()) ?>" value="<?= $Page->EM24->EditValue ?>"<?= $Page->EM24->editAttributes() ?> aria-describedby="x_EM24_help">
<?= $Page->EM24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM24->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM25->Visible) { // EM25 ?>
    <div id="r_EM25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM25" for="x_EM25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EM25"><?= $Page->EM25->caption() ?><?= $Page->EM25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM25"><span id="el_ivf_stimulation_chart_EM25">
<input type="<?= $Page->EM25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM25" name="x_EM25" id="x_EM25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM25->getPlaceHolder()) ?>" value="<?= $Page->EM25->EditValue ?>"<?= $Page->EM25->editAttributes() ?> aria-describedby="x_EM25_help">
<?= $Page->EM25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM25->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others14->Visible) { // Others14 ?>
    <div id="r_Others14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others14" for="x_Others14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others14"><?= $Page->Others14->caption() ?><?= $Page->Others14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others14"><span id="el_ivf_stimulation_chart_Others14">
<input type="<?= $Page->Others14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others14" name="x_Others14" id="x_Others14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others14->getPlaceHolder()) ?>" value="<?= $Page->Others14->EditValue ?>"<?= $Page->Others14->editAttributes() ?> aria-describedby="x_Others14_help">
<?= $Page->Others14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others14->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others15->Visible) { // Others15 ?>
    <div id="r_Others15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others15" for="x_Others15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others15"><?= $Page->Others15->caption() ?><?= $Page->Others15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others15"><span id="el_ivf_stimulation_chart_Others15">
<input type="<?= $Page->Others15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others15" name="x_Others15" id="x_Others15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others15->getPlaceHolder()) ?>" value="<?= $Page->Others15->EditValue ?>"<?= $Page->Others15->editAttributes() ?> aria-describedby="x_Others15_help">
<?= $Page->Others15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others15->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others16->Visible) { // Others16 ?>
    <div id="r_Others16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others16" for="x_Others16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others16"><?= $Page->Others16->caption() ?><?= $Page->Others16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others16"><span id="el_ivf_stimulation_chart_Others16">
<input type="<?= $Page->Others16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others16" name="x_Others16" id="x_Others16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others16->getPlaceHolder()) ?>" value="<?= $Page->Others16->EditValue ?>"<?= $Page->Others16->editAttributes() ?> aria-describedby="x_Others16_help">
<?= $Page->Others16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others16->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others17->Visible) { // Others17 ?>
    <div id="r_Others17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others17" for="x_Others17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others17"><?= $Page->Others17->caption() ?><?= $Page->Others17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others17"><span id="el_ivf_stimulation_chart_Others17">
<input type="<?= $Page->Others17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others17" name="x_Others17" id="x_Others17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others17->getPlaceHolder()) ?>" value="<?= $Page->Others17->EditValue ?>"<?= $Page->Others17->editAttributes() ?> aria-describedby="x_Others17_help">
<?= $Page->Others17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others17->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others18->Visible) { // Others18 ?>
    <div id="r_Others18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others18" for="x_Others18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others18"><?= $Page->Others18->caption() ?><?= $Page->Others18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others18"><span id="el_ivf_stimulation_chart_Others18">
<input type="<?= $Page->Others18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others18" name="x_Others18" id="x_Others18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others18->getPlaceHolder()) ?>" value="<?= $Page->Others18->EditValue ?>"<?= $Page->Others18->editAttributes() ?> aria-describedby="x_Others18_help">
<?= $Page->Others18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others18->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others19->Visible) { // Others19 ?>
    <div id="r_Others19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others19" for="x_Others19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others19"><?= $Page->Others19->caption() ?><?= $Page->Others19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others19"><span id="el_ivf_stimulation_chart_Others19">
<input type="<?= $Page->Others19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others19" name="x_Others19" id="x_Others19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others19->getPlaceHolder()) ?>" value="<?= $Page->Others19->EditValue ?>"<?= $Page->Others19->editAttributes() ?> aria-describedby="x_Others19_help">
<?= $Page->Others19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others19->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others20->Visible) { // Others20 ?>
    <div id="r_Others20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others20" for="x_Others20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others20"><?= $Page->Others20->caption() ?><?= $Page->Others20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others20"><span id="el_ivf_stimulation_chart_Others20">
<input type="<?= $Page->Others20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others20" name="x_Others20" id="x_Others20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others20->getPlaceHolder()) ?>" value="<?= $Page->Others20->EditValue ?>"<?= $Page->Others20->editAttributes() ?> aria-describedby="x_Others20_help">
<?= $Page->Others20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others20->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others21->Visible) { // Others21 ?>
    <div id="r_Others21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others21" for="x_Others21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others21"><?= $Page->Others21->caption() ?><?= $Page->Others21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others21"><span id="el_ivf_stimulation_chart_Others21">
<input type="<?= $Page->Others21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others21" name="x_Others21" id="x_Others21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others21->getPlaceHolder()) ?>" value="<?= $Page->Others21->EditValue ?>"<?= $Page->Others21->editAttributes() ?> aria-describedby="x_Others21_help">
<?= $Page->Others21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others21->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others22->Visible) { // Others22 ?>
    <div id="r_Others22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others22" for="x_Others22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others22"><?= $Page->Others22->caption() ?><?= $Page->Others22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others22"><span id="el_ivf_stimulation_chart_Others22">
<input type="<?= $Page->Others22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others22" name="x_Others22" id="x_Others22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others22->getPlaceHolder()) ?>" value="<?= $Page->Others22->EditValue ?>"<?= $Page->Others22->editAttributes() ?> aria-describedby="x_Others22_help">
<?= $Page->Others22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others22->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others23->Visible) { // Others23 ?>
    <div id="r_Others23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others23" for="x_Others23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others23"><?= $Page->Others23->caption() ?><?= $Page->Others23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others23"><span id="el_ivf_stimulation_chart_Others23">
<input type="<?= $Page->Others23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others23" name="x_Others23" id="x_Others23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others23->getPlaceHolder()) ?>" value="<?= $Page->Others23->EditValue ?>"<?= $Page->Others23->editAttributes() ?> aria-describedby="x_Others23_help">
<?= $Page->Others23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others23->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others24->Visible) { // Others24 ?>
    <div id="r_Others24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others24" for="x_Others24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others24"><?= $Page->Others24->caption() ?><?= $Page->Others24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others24"><span id="el_ivf_stimulation_chart_Others24">
<input type="<?= $Page->Others24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others24" name="x_Others24" id="x_Others24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others24->getPlaceHolder()) ?>" value="<?= $Page->Others24->EditValue ?>"<?= $Page->Others24->editAttributes() ?> aria-describedby="x_Others24_help">
<?= $Page->Others24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others24->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others25->Visible) { // Others25 ?>
    <div id="r_Others25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others25" for="x_Others25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_Others25"><?= $Page->Others25->caption() ?><?= $Page->Others25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others25"><span id="el_ivf_stimulation_chart_Others25">
<input type="<?= $Page->Others25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others25" name="x_Others25" id="x_Others25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others25->getPlaceHolder()) ?>" value="<?= $Page->Others25->EditValue ?>"<?= $Page->Others25->editAttributes() ?> aria-describedby="x_Others25_help">
<?= $Page->Others25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others25->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR14->Visible) { // DR14 ?>
    <div id="r_DR14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR14" for="x_DR14" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR14"><?= $Page->DR14->caption() ?><?= $Page->DR14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR14"><span id="el_ivf_stimulation_chart_DR14">
<input type="<?= $Page->DR14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR14" name="x_DR14" id="x_DR14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR14->getPlaceHolder()) ?>" value="<?= $Page->DR14->EditValue ?>"<?= $Page->DR14->editAttributes() ?> aria-describedby="x_DR14_help">
<?= $Page->DR14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR14->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR15->Visible) { // DR15 ?>
    <div id="r_DR15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR15" for="x_DR15" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR15"><?= $Page->DR15->caption() ?><?= $Page->DR15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR15"><span id="el_ivf_stimulation_chart_DR15">
<input type="<?= $Page->DR15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR15" name="x_DR15" id="x_DR15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR15->getPlaceHolder()) ?>" value="<?= $Page->DR15->EditValue ?>"<?= $Page->DR15->editAttributes() ?> aria-describedby="x_DR15_help">
<?= $Page->DR15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR15->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR16->Visible) { // DR16 ?>
    <div id="r_DR16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR16" for="x_DR16" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR16"><?= $Page->DR16->caption() ?><?= $Page->DR16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR16"><span id="el_ivf_stimulation_chart_DR16">
<input type="<?= $Page->DR16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR16" name="x_DR16" id="x_DR16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR16->getPlaceHolder()) ?>" value="<?= $Page->DR16->EditValue ?>"<?= $Page->DR16->editAttributes() ?> aria-describedby="x_DR16_help">
<?= $Page->DR16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR16->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR17->Visible) { // DR17 ?>
    <div id="r_DR17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR17" for="x_DR17" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR17"><?= $Page->DR17->caption() ?><?= $Page->DR17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR17"><span id="el_ivf_stimulation_chart_DR17">
<input type="<?= $Page->DR17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR17" name="x_DR17" id="x_DR17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR17->getPlaceHolder()) ?>" value="<?= $Page->DR17->EditValue ?>"<?= $Page->DR17->editAttributes() ?> aria-describedby="x_DR17_help">
<?= $Page->DR17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR17->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR18->Visible) { // DR18 ?>
    <div id="r_DR18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR18" for="x_DR18" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR18"><?= $Page->DR18->caption() ?><?= $Page->DR18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR18"><span id="el_ivf_stimulation_chart_DR18">
<input type="<?= $Page->DR18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR18" name="x_DR18" id="x_DR18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR18->getPlaceHolder()) ?>" value="<?= $Page->DR18->EditValue ?>"<?= $Page->DR18->editAttributes() ?> aria-describedby="x_DR18_help">
<?= $Page->DR18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR18->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR19->Visible) { // DR19 ?>
    <div id="r_DR19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR19" for="x_DR19" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR19"><?= $Page->DR19->caption() ?><?= $Page->DR19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR19"><span id="el_ivf_stimulation_chart_DR19">
<input type="<?= $Page->DR19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR19" name="x_DR19" id="x_DR19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR19->getPlaceHolder()) ?>" value="<?= $Page->DR19->EditValue ?>"<?= $Page->DR19->editAttributes() ?> aria-describedby="x_DR19_help">
<?= $Page->DR19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR19->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR20->Visible) { // DR20 ?>
    <div id="r_DR20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR20" for="x_DR20" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR20"><?= $Page->DR20->caption() ?><?= $Page->DR20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR20"><span id="el_ivf_stimulation_chart_DR20">
<input type="<?= $Page->DR20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR20" name="x_DR20" id="x_DR20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR20->getPlaceHolder()) ?>" value="<?= $Page->DR20->EditValue ?>"<?= $Page->DR20->editAttributes() ?> aria-describedby="x_DR20_help">
<?= $Page->DR20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR20->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR21->Visible) { // DR21 ?>
    <div id="r_DR21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR21" for="x_DR21" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR21"><?= $Page->DR21->caption() ?><?= $Page->DR21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR21"><span id="el_ivf_stimulation_chart_DR21">
<input type="<?= $Page->DR21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR21" name="x_DR21" id="x_DR21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR21->getPlaceHolder()) ?>" value="<?= $Page->DR21->EditValue ?>"<?= $Page->DR21->editAttributes() ?> aria-describedby="x_DR21_help">
<?= $Page->DR21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR21->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR22->Visible) { // DR22 ?>
    <div id="r_DR22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR22" for="x_DR22" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR22"><?= $Page->DR22->caption() ?><?= $Page->DR22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR22"><span id="el_ivf_stimulation_chart_DR22">
<input type="<?= $Page->DR22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR22" name="x_DR22" id="x_DR22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR22->getPlaceHolder()) ?>" value="<?= $Page->DR22->EditValue ?>"<?= $Page->DR22->editAttributes() ?> aria-describedby="x_DR22_help">
<?= $Page->DR22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR22->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR23->Visible) { // DR23 ?>
    <div id="r_DR23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR23" for="x_DR23" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR23"><?= $Page->DR23->caption() ?><?= $Page->DR23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR23"><span id="el_ivf_stimulation_chart_DR23">
<input type="<?= $Page->DR23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR23" name="x_DR23" id="x_DR23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR23->getPlaceHolder()) ?>" value="<?= $Page->DR23->EditValue ?>"<?= $Page->DR23->editAttributes() ?> aria-describedby="x_DR23_help">
<?= $Page->DR23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR23->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR24->Visible) { // DR24 ?>
    <div id="r_DR24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR24" for="x_DR24" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR24"><?= $Page->DR24->caption() ?><?= $Page->DR24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR24"><span id="el_ivf_stimulation_chart_DR24">
<input type="<?= $Page->DR24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR24" name="x_DR24" id="x_DR24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR24->getPlaceHolder()) ?>" value="<?= $Page->DR24->EditValue ?>"<?= $Page->DR24->editAttributes() ?> aria-describedby="x_DR24_help">
<?= $Page->DR24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR24->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR25->Visible) { // DR25 ?>
    <div id="r_DR25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR25" for="x_DR25" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DR25"><?= $Page->DR25->caption() ?><?= $Page->DR25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR25"><span id="el_ivf_stimulation_chart_DR25">
<input type="<?= $Page->DR25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR25" name="x_DR25" id="x_DR25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR25->getPlaceHolder()) ?>" value="<?= $Page->DR25->EditValue ?>"<?= $Page->DR25->editAttributes() ?> aria-describedby="x_DR25_help">
<?= $Page->DR25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR25->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E214->Visible) { // E214 ?>
    <div id="r_E214" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E214" for="x_E214" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E214"><?= $Page->E214->caption() ?><?= $Page->E214->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E214->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E214"><span id="el_ivf_stimulation_chart_E214">
<input type="<?= $Page->E214->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E214" name="x_E214" id="x_E214" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E214->getPlaceHolder()) ?>" value="<?= $Page->E214->EditValue ?>"<?= $Page->E214->editAttributes() ?> aria-describedby="x_E214_help">
<?= $Page->E214->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E214->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E215->Visible) { // E215 ?>
    <div id="r_E215" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E215" for="x_E215" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E215"><?= $Page->E215->caption() ?><?= $Page->E215->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E215->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E215"><span id="el_ivf_stimulation_chart_E215">
<input type="<?= $Page->E215->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E215" name="x_E215" id="x_E215" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E215->getPlaceHolder()) ?>" value="<?= $Page->E215->EditValue ?>"<?= $Page->E215->editAttributes() ?> aria-describedby="x_E215_help">
<?= $Page->E215->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E215->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E216->Visible) { // E216 ?>
    <div id="r_E216" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E216" for="x_E216" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E216"><?= $Page->E216->caption() ?><?= $Page->E216->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E216->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E216"><span id="el_ivf_stimulation_chart_E216">
<input type="<?= $Page->E216->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E216" name="x_E216" id="x_E216" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E216->getPlaceHolder()) ?>" value="<?= $Page->E216->EditValue ?>"<?= $Page->E216->editAttributes() ?> aria-describedby="x_E216_help">
<?= $Page->E216->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E216->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E217->Visible) { // E217 ?>
    <div id="r_E217" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E217" for="x_E217" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E217"><?= $Page->E217->caption() ?><?= $Page->E217->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E217->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E217"><span id="el_ivf_stimulation_chart_E217">
<input type="<?= $Page->E217->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E217" name="x_E217" id="x_E217" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E217->getPlaceHolder()) ?>" value="<?= $Page->E217->EditValue ?>"<?= $Page->E217->editAttributes() ?> aria-describedby="x_E217_help">
<?= $Page->E217->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E217->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E218->Visible) { // E218 ?>
    <div id="r_E218" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E218" for="x_E218" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E218"><?= $Page->E218->caption() ?><?= $Page->E218->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E218->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E218"><span id="el_ivf_stimulation_chart_E218">
<input type="<?= $Page->E218->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E218" name="x_E218" id="x_E218" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E218->getPlaceHolder()) ?>" value="<?= $Page->E218->EditValue ?>"<?= $Page->E218->editAttributes() ?> aria-describedby="x_E218_help">
<?= $Page->E218->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E218->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E219->Visible) { // E219 ?>
    <div id="r_E219" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E219" for="x_E219" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E219"><?= $Page->E219->caption() ?><?= $Page->E219->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E219->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E219"><span id="el_ivf_stimulation_chart_E219">
<input type="<?= $Page->E219->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E219" name="x_E219" id="x_E219" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E219->getPlaceHolder()) ?>" value="<?= $Page->E219->EditValue ?>"<?= $Page->E219->editAttributes() ?> aria-describedby="x_E219_help">
<?= $Page->E219->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E219->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E220->Visible) { // E220 ?>
    <div id="r_E220" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E220" for="x_E220" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E220"><?= $Page->E220->caption() ?><?= $Page->E220->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E220->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E220"><span id="el_ivf_stimulation_chart_E220">
<input type="<?= $Page->E220->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E220" name="x_E220" id="x_E220" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E220->getPlaceHolder()) ?>" value="<?= $Page->E220->EditValue ?>"<?= $Page->E220->editAttributes() ?> aria-describedby="x_E220_help">
<?= $Page->E220->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E220->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E221->Visible) { // E221 ?>
    <div id="r_E221" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E221" for="x_E221" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E221"><?= $Page->E221->caption() ?><?= $Page->E221->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E221->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E221"><span id="el_ivf_stimulation_chart_E221">
<input type="<?= $Page->E221->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E221" name="x_E221" id="x_E221" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E221->getPlaceHolder()) ?>" value="<?= $Page->E221->EditValue ?>"<?= $Page->E221->editAttributes() ?> aria-describedby="x_E221_help">
<?= $Page->E221->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E221->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E222->Visible) { // E222 ?>
    <div id="r_E222" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E222" for="x_E222" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E222"><?= $Page->E222->caption() ?><?= $Page->E222->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E222->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E222"><span id="el_ivf_stimulation_chart_E222">
<input type="<?= $Page->E222->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E222" name="x_E222" id="x_E222" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E222->getPlaceHolder()) ?>" value="<?= $Page->E222->EditValue ?>"<?= $Page->E222->editAttributes() ?> aria-describedby="x_E222_help">
<?= $Page->E222->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E222->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E223->Visible) { // E223 ?>
    <div id="r_E223" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E223" for="x_E223" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E223"><?= $Page->E223->caption() ?><?= $Page->E223->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E223->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E223"><span id="el_ivf_stimulation_chart_E223">
<input type="<?= $Page->E223->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E223" name="x_E223" id="x_E223" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E223->getPlaceHolder()) ?>" value="<?= $Page->E223->EditValue ?>"<?= $Page->E223->editAttributes() ?> aria-describedby="x_E223_help">
<?= $Page->E223->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E223->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E224->Visible) { // E224 ?>
    <div id="r_E224" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E224" for="x_E224" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E224"><?= $Page->E224->caption() ?><?= $Page->E224->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E224->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E224"><span id="el_ivf_stimulation_chart_E224">
<input type="<?= $Page->E224->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E224" name="x_E224" id="x_E224" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E224->getPlaceHolder()) ?>" value="<?= $Page->E224->EditValue ?>"<?= $Page->E224->editAttributes() ?> aria-describedby="x_E224_help">
<?= $Page->E224->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E224->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E225->Visible) { // E225 ?>
    <div id="r_E225" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E225" for="x_E225" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_E225"><?= $Page->E225->caption() ?><?= $Page->E225->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E225->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E225"><span id="el_ivf_stimulation_chart_E225">
<input type="<?= $Page->E225->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E225" name="x_E225" id="x_E225" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E225->getPlaceHolder()) ?>" value="<?= $Page->E225->EditValue ?>"<?= $Page->E225->editAttributes() ?> aria-describedby="x_E225_help">
<?= $Page->E225->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E225->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EEETTTDTE->Visible) { // EEETTTDTE ?>
    <div id="r_EEETTTDTE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EEETTTDTE" for="x_EEETTTDTE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EEETTTDTE"><?= $Page->EEETTTDTE->caption() ?><?= $Page->EEETTTDTE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EEETTTDTE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EEETTTDTE"><span id="el_ivf_stimulation_chart_EEETTTDTE">
<input type="<?= $Page->EEETTTDTE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EEETTTDTE" data-format="7" name="x_EEETTTDTE" id="x_EEETTTDTE" placeholder="<?= HtmlEncode($Page->EEETTTDTE->getPlaceHolder()) ?>" value="<?= $Page->EEETTTDTE->EditValue ?>"<?= $Page->EEETTTDTE->editAttributes() ?> aria-describedby="x_EEETTTDTE_help">
<?= $Page->EEETTTDTE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EEETTTDTE->getErrorMessage() ?></div>
<?php if (!$Page->EEETTTDTE->ReadOnly && !$Page->EEETTTDTE->Disabled && !isset($Page->EEETTTDTE->EditAttrs["readonly"]) && !isset($Page->EEETTTDTE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_EEETTTDTE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bhcgdate->Visible) { // bhcgdate ?>
    <div id="r_bhcgdate" class="form-group row">
        <label id="elh_ivf_stimulation_chart_bhcgdate" for="x_bhcgdate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_bhcgdate"><?= $Page->bhcgdate->caption() ?><?= $Page->bhcgdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bhcgdate->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_bhcgdate"><span id="el_ivf_stimulation_chart_bhcgdate">
<input type="<?= $Page->bhcgdate->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_bhcgdate" data-format="7" name="x_bhcgdate" id="x_bhcgdate" placeholder="<?= HtmlEncode($Page->bhcgdate->getPlaceHolder()) ?>" value="<?= $Page->bhcgdate->EditValue ?>"<?= $Page->bhcgdate->editAttributes() ?> aria-describedby="x_bhcgdate_help">
<?= $Page->bhcgdate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bhcgdate->getErrorMessage() ?></div>
<?php if (!$Page->bhcgdate->ReadOnly && !$Page->bhcgdate->Disabled && !isset($Page->bhcgdate->EditAttrs["readonly"]) && !isset($Page->bhcgdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_bhcgdate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
    <div id="r_TUBAL_PATENCY" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TUBAL_PATENCY" for="x_TUBAL_PATENCY" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_TUBAL_PATENCY"><?= $Page->TUBAL_PATENCY->caption() ?><?= $Page->TUBAL_PATENCY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TUBAL_PATENCY->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TUBAL_PATENCY"><span id="el_ivf_stimulation_chart_TUBAL_PATENCY">
    <select
        id="x_TUBAL_PATENCY"
        name="x_TUBAL_PATENCY"
        class="form-control ew-select<?= $Page->TUBAL_PATENCY->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_TUBAL_PATENCY"
        data-table="ivf_stimulation_chart"
        data-field="x_TUBAL_PATENCY"
        data-value-separator="<?= $Page->TUBAL_PATENCY->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TUBAL_PATENCY->getPlaceHolder()) ?>"
        <?= $Page->TUBAL_PATENCY->editAttributes() ?>>
        <?= $Page->TUBAL_PATENCY->selectOptionListHtml("x_TUBAL_PATENCY") ?>
    </select>
    <?= $Page->TUBAL_PATENCY->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TUBAL_PATENCY->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_TUBAL_PATENCY']"),
        options = { name: "x_TUBAL_PATENCY", selectId: "ivf_stimulation_chart_x_TUBAL_PATENCY", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.TUBAL_PATENCY.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.TUBAL_PATENCY.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
    <div id="r_HSG" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HSG" for="x_HSG" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_HSG"><?= $Page->HSG->caption() ?><?= $Page->HSG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HSG->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HSG"><span id="el_ivf_stimulation_chart_HSG">
    <select
        id="x_HSG"
        name="x_HSG"
        class="form-control ew-select<?= $Page->HSG->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_HSG"
        data-table="ivf_stimulation_chart"
        data-field="x_HSG"
        data-value-separator="<?= $Page->HSG->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HSG->getPlaceHolder()) ?>"
        <?= $Page->HSG->editAttributes() ?>>
        <?= $Page->HSG->selectOptionListHtml("x_HSG") ?>
    </select>
    <?= $Page->HSG->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HSG->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_HSG']"),
        options = { name: "x_HSG", selectId: "ivf_stimulation_chart_x_HSG", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.HSG.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.HSG.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
    <div id="r_DHL" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DHL" for="x_DHL" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_DHL"><?= $Page->DHL->caption() ?><?= $Page->DHL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DHL->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DHL"><span id="el_ivf_stimulation_chart_DHL">
    <select
        id="x_DHL"
        name="x_DHL"
        class="form-control ew-select<?= $Page->DHL->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_DHL"
        data-table="ivf_stimulation_chart"
        data-field="x_DHL"
        data-value-separator="<?= $Page->DHL->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DHL->getPlaceHolder()) ?>"
        <?= $Page->DHL->editAttributes() ?>>
        <?= $Page->DHL->selectOptionListHtml("x_DHL") ?>
    </select>
    <?= $Page->DHL->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->DHL->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_DHL']"),
        options = { name: "x_DHL", selectId: "ivf_stimulation_chart_x_DHL", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.DHL.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.DHL.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
    <div id="r_UTERINE_PROBLEMS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS" for="x_UTERINE_PROBLEMS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_UTERINE_PROBLEMS"><?= $Page->UTERINE_PROBLEMS->caption() ?><?= $Page->UTERINE_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UTERINE_PROBLEMS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_UTERINE_PROBLEMS"><span id="el_ivf_stimulation_chart_UTERINE_PROBLEMS">
    <select
        id="x_UTERINE_PROBLEMS"
        name="x_UTERINE_PROBLEMS"
        class="form-control ew-select<?= $Page->UTERINE_PROBLEMS->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_UTERINE_PROBLEMS"
        data-table="ivf_stimulation_chart"
        data-field="x_UTERINE_PROBLEMS"
        data-value-separator="<?= $Page->UTERINE_PROBLEMS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->UTERINE_PROBLEMS->getPlaceHolder()) ?>"
        <?= $Page->UTERINE_PROBLEMS->editAttributes() ?>>
        <?= $Page->UTERINE_PROBLEMS->selectOptionListHtml("x_UTERINE_PROBLEMS") ?>
    </select>
    <?= $Page->UTERINE_PROBLEMS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->UTERINE_PROBLEMS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_UTERINE_PROBLEMS']"),
        options = { name: "x_UTERINE_PROBLEMS", selectId: "ivf_stimulation_chart_x_UTERINE_PROBLEMS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.UTERINE_PROBLEMS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.UTERINE_PROBLEMS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
    <div id="r_W_COMORBIDS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_W_COMORBIDS" for="x_W_COMORBIDS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_W_COMORBIDS"><?= $Page->W_COMORBIDS->caption() ?><?= $Page->W_COMORBIDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->W_COMORBIDS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_W_COMORBIDS"><span id="el_ivf_stimulation_chart_W_COMORBIDS">
    <select
        id="x_W_COMORBIDS"
        name="x_W_COMORBIDS"
        class="form-control ew-select<?= $Page->W_COMORBIDS->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_W_COMORBIDS"
        data-table="ivf_stimulation_chart"
        data-field="x_W_COMORBIDS"
        data-value-separator="<?= $Page->W_COMORBIDS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->W_COMORBIDS->getPlaceHolder()) ?>"
        <?= $Page->W_COMORBIDS->editAttributes() ?>>
        <?= $Page->W_COMORBIDS->selectOptionListHtml("x_W_COMORBIDS") ?>
    </select>
    <?= $Page->W_COMORBIDS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->W_COMORBIDS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_W_COMORBIDS']"),
        options = { name: "x_W_COMORBIDS", selectId: "ivf_stimulation_chart_x_W_COMORBIDS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.W_COMORBIDS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.W_COMORBIDS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
    <div id="r_H_COMORBIDS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_H_COMORBIDS" for="x_H_COMORBIDS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_H_COMORBIDS"><?= $Page->H_COMORBIDS->caption() ?><?= $Page->H_COMORBIDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->H_COMORBIDS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_H_COMORBIDS"><span id="el_ivf_stimulation_chart_H_COMORBIDS">
    <select
        id="x_H_COMORBIDS"
        name="x_H_COMORBIDS"
        class="form-control ew-select<?= $Page->H_COMORBIDS->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_H_COMORBIDS"
        data-table="ivf_stimulation_chart"
        data-field="x_H_COMORBIDS"
        data-value-separator="<?= $Page->H_COMORBIDS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->H_COMORBIDS->getPlaceHolder()) ?>"
        <?= $Page->H_COMORBIDS->editAttributes() ?>>
        <?= $Page->H_COMORBIDS->selectOptionListHtml("x_H_COMORBIDS") ?>
    </select>
    <?= $Page->H_COMORBIDS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->H_COMORBIDS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_H_COMORBIDS']"),
        options = { name: "x_H_COMORBIDS", selectId: "ivf_stimulation_chart_x_H_COMORBIDS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.H_COMORBIDS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.H_COMORBIDS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
    <div id="r_SEXUAL_DYSFUNCTION" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" for="x_SEXUAL_DYSFUNCTION" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><?= $Page->SEXUAL_DYSFUNCTION->caption() ?><?= $Page->SEXUAL_DYSFUNCTION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><span id="el_ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
    <select
        id="x_SEXUAL_DYSFUNCTION"
        name="x_SEXUAL_DYSFUNCTION"
        class="form-control ew-select<?= $Page->SEXUAL_DYSFUNCTION->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_SEXUAL_DYSFUNCTION"
        data-table="ivf_stimulation_chart"
        data-field="x_SEXUAL_DYSFUNCTION"
        data-value-separator="<?= $Page->SEXUAL_DYSFUNCTION->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SEXUAL_DYSFUNCTION->getPlaceHolder()) ?>"
        <?= $Page->SEXUAL_DYSFUNCTION->editAttributes() ?>>
        <?= $Page->SEXUAL_DYSFUNCTION->selectOptionListHtml("x_SEXUAL_DYSFUNCTION") ?>
    </select>
    <?= $Page->SEXUAL_DYSFUNCTION->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->SEXUAL_DYSFUNCTION->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_SEXUAL_DYSFUNCTION']"),
        options = { name: "x_SEXUAL_DYSFUNCTION", selectId: "ivf_stimulation_chart_x_SEXUAL_DYSFUNCTION", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.SEXUAL_DYSFUNCTION.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.SEXUAL_DYSFUNCTION.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
    <div id="r_TABLETS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TABLETS" for="x_TABLETS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_TABLETS"><?= $Page->TABLETS->caption() ?><?= $Page->TABLETS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TABLETS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TABLETS"><span id="el_ivf_stimulation_chart_TABLETS">
<input type="<?= $Page->TABLETS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TABLETS" name="x_TABLETS" id="x_TABLETS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TABLETS->getPlaceHolder()) ?>" value="<?= $Page->TABLETS->EditValue ?>"<?= $Page->TABLETS->editAttributes() ?> aria-describedby="x_TABLETS_help">
<?= $Page->TABLETS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TABLETS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
    <div id="r_FOLLICLE_STATUS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_FOLLICLE_STATUS" for="x_FOLLICLE_STATUS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_FOLLICLE_STATUS"><?= $Page->FOLLICLE_STATUS->caption() ?><?= $Page->FOLLICLE_STATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FOLLICLE_STATUS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_FOLLICLE_STATUS"><span id="el_ivf_stimulation_chart_FOLLICLE_STATUS">
    <select
        id="x_FOLLICLE_STATUS"
        name="x_FOLLICLE_STATUS"
        class="form-control ew-select<?= $Page->FOLLICLE_STATUS->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_FOLLICLE_STATUS"
        data-table="ivf_stimulation_chart"
        data-field="x_FOLLICLE_STATUS"
        data-value-separator="<?= $Page->FOLLICLE_STATUS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->FOLLICLE_STATUS->getPlaceHolder()) ?>"
        <?= $Page->FOLLICLE_STATUS->editAttributes() ?>>
        <?= $Page->FOLLICLE_STATUS->selectOptionListHtml("x_FOLLICLE_STATUS") ?>
    </select>
    <?= $Page->FOLLICLE_STATUS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->FOLLICLE_STATUS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_FOLLICLE_STATUS']"),
        options = { name: "x_FOLLICLE_STATUS", selectId: "ivf_stimulation_chart_x_FOLLICLE_STATUS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.FOLLICLE_STATUS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.FOLLICLE_STATUS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
    <div id="r_NUMBER_OF_IUI" class="form-group row">
        <label id="elh_ivf_stimulation_chart_NUMBER_OF_IUI" for="x_NUMBER_OF_IUI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_NUMBER_OF_IUI"><?= $Page->NUMBER_OF_IUI->caption() ?><?= $Page->NUMBER_OF_IUI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NUMBER_OF_IUI->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_NUMBER_OF_IUI"><span id="el_ivf_stimulation_chart_NUMBER_OF_IUI">
    <select
        id="x_NUMBER_OF_IUI"
        name="x_NUMBER_OF_IUI"
        class="form-control ew-select<?= $Page->NUMBER_OF_IUI->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_NUMBER_OF_IUI"
        data-table="ivf_stimulation_chart"
        data-field="x_NUMBER_OF_IUI"
        data-value-separator="<?= $Page->NUMBER_OF_IUI->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->NUMBER_OF_IUI->getPlaceHolder()) ?>"
        <?= $Page->NUMBER_OF_IUI->editAttributes() ?>>
        <?= $Page->NUMBER_OF_IUI->selectOptionListHtml("x_NUMBER_OF_IUI") ?>
    </select>
    <?= $Page->NUMBER_OF_IUI->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->NUMBER_OF_IUI->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_NUMBER_OF_IUI']"),
        options = { name: "x_NUMBER_OF_IUI", selectId: "ivf_stimulation_chart_x_NUMBER_OF_IUI", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.NUMBER_OF_IUI.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.NUMBER_OF_IUI.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
    <div id="r_PROCEDURE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_PROCEDURE" for="x_PROCEDURE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_PROCEDURE"><?= $Page->PROCEDURE->caption() ?><?= $Page->PROCEDURE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PROCEDURE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_PROCEDURE"><span id="el_ivf_stimulation_chart_PROCEDURE">
    <select
        id="x_PROCEDURE"
        name="x_PROCEDURE"
        class="form-control ew-select<?= $Page->PROCEDURE->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_PROCEDURE"
        data-table="ivf_stimulation_chart"
        data-field="x_PROCEDURE"
        data-value-separator="<?= $Page->PROCEDURE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PROCEDURE->getPlaceHolder()) ?>"
        <?= $Page->PROCEDURE->editAttributes() ?>>
        <?= $Page->PROCEDURE->selectOptionListHtml("x_PROCEDURE") ?>
    </select>
    <?= $Page->PROCEDURE->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PROCEDURE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_PROCEDURE']"),
        options = { name: "x_PROCEDURE", selectId: "ivf_stimulation_chart_x_PROCEDURE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.PROCEDURE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.PROCEDURE.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
    <div id="r_LUTEAL_SUPPORT" class="form-group row">
        <label id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT" for="x_LUTEAL_SUPPORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_LUTEAL_SUPPORT"><?= $Page->LUTEAL_SUPPORT->caption() ?><?= $Page->LUTEAL_SUPPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LUTEAL_SUPPORT->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_LUTEAL_SUPPORT"><span id="el_ivf_stimulation_chart_LUTEAL_SUPPORT">
    <select
        id="x_LUTEAL_SUPPORT"
        name="x_LUTEAL_SUPPORT"
        class="form-control ew-select<?= $Page->LUTEAL_SUPPORT->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_LUTEAL_SUPPORT"
        data-table="ivf_stimulation_chart"
        data-field="x_LUTEAL_SUPPORT"
        data-value-separator="<?= $Page->LUTEAL_SUPPORT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->LUTEAL_SUPPORT->getPlaceHolder()) ?>"
        <?= $Page->LUTEAL_SUPPORT->editAttributes() ?>>
        <?= $Page->LUTEAL_SUPPORT->selectOptionListHtml("x_LUTEAL_SUPPORT") ?>
    </select>
    <?= $Page->LUTEAL_SUPPORT->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->LUTEAL_SUPPORT->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_LUTEAL_SUPPORT']"),
        options = { name: "x_LUTEAL_SUPPORT", selectId: "ivf_stimulation_chart_x_LUTEAL_SUPPORT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.LUTEAL_SUPPORT.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.LUTEAL_SUPPORT.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
    <div id="r_SPECIFIC_MATERNAL_PROBLEMS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" for="x_SPECIFIC_MATERNAL_PROBLEMS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->caption() ?><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><span id="el_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
    <select
        id="x_SPECIFIC_MATERNAL_PROBLEMS"
        name="x_SPECIFIC_MATERNAL_PROBLEMS"
        class="form-control ew-select<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->isInvalidClass() ?>"
        data-select2-id="ivf_stimulation_chart_x_SPECIFIC_MATERNAL_PROBLEMS"
        data-table="ivf_stimulation_chart"
        data-field="x_SPECIFIC_MATERNAL_PROBLEMS"
        data-value-separator="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SPECIFIC_MATERNAL_PROBLEMS->getPlaceHolder()) ?>"
        <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->editAttributes() ?>>
        <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->selectOptionListHtml("x_SPECIFIC_MATERNAL_PROBLEMS") ?>
    </select>
    <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_stimulation_chart_x_SPECIFIC_MATERNAL_PROBLEMS']"),
        options = { name: "x_SPECIFIC_MATERNAL_PROBLEMS", selectId: "ivf_stimulation_chart_x_SPECIFIC_MATERNAL_PROBLEMS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_stimulation_chart.fields.SPECIFIC_MATERNAL_PROBLEMS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_stimulation_chart.fields.SPECIFIC_MATERNAL_PROBLEMS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
    <div id="r_ONGOING_PREG" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ONGOING_PREG" for="x_ONGOING_PREG" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_ONGOING_PREG"><?= $Page->ONGOING_PREG->caption() ?><?= $Page->ONGOING_PREG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ONGOING_PREG->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ONGOING_PREG"><span id="el_ivf_stimulation_chart_ONGOING_PREG">
<input type="<?= $Page->ONGOING_PREG->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ONGOING_PREG" name="x_ONGOING_PREG" id="x_ONGOING_PREG" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ONGOING_PREG->getPlaceHolder()) ?>" value="<?= $Page->ONGOING_PREG->EditValue ?>"<?= $Page->ONGOING_PREG->editAttributes() ?> aria-describedby="x_ONGOING_PREG_help">
<?= $Page->ONGOING_PREG->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ONGOING_PREG->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
    <div id="r_EDD_Date" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EDD_Date" for="x_EDD_Date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_stimulation_chart_EDD_Date"><?= $Page->EDD_Date->caption() ?><?= $Page->EDD_Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDD_Date->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EDD_Date"><span id="el_ivf_stimulation_chart_EDD_Date">
<input type="<?= $Page->EDD_Date->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EDD_Date" name="x_EDD_Date" id="x_EDD_Date" placeholder="<?= HtmlEncode($Page->EDD_Date->getPlaceHolder()) ?>" value="<?= $Page->EDD_Date->EditValue ?>"<?= $Page->EDD_Date->editAttributes() ?> aria-describedby="x_EDD_Date_help">
<?= $Page->EDD_Date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EDD_Date->getErrorMessage() ?></div>
<?php if (!$Page->EDD_Date->ReadOnly && !$Page->EDD_Date->Disabled && !isset($Page->EDD_Date->EditAttrs["readonly"]) && !isset($Page->EDD_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_stimulation_chartedit" class="ew-custom-template"></div>
<template id="tpm_ivf_stimulation_chartedit">
<div id="ct_IvfStimulationChartEdit"><style>
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
.ew-export-table td {
	padding: .0rem;
	border-bottom: 1px solid;
	border-top: 1px solid;
	border-left: 1px solid;
	border-right: 1px solid;
	border-color: #cfcfcf;
}
.card-bodyya {
	flex: 1 1 auto;
	padding: 0.25rem;
}
.card-bodyyaa {
	flex: 1 1 auto;
	padding: 0.25rem;
}
.table {
	width: auto;
	margin-bottom: 1rem;
	background-color: transparent;
}
.content-header {
	padding: 0px .0rem;
}
.container-fluid {
	width: 100%;
	padding-right: 0px;
	padding-left: 0px;
	margin-right: auto;
	margin-left: auto;
}
.mb-2, .progress-group, .my-2 {
	margin-bottom: .0rem !important;
}
.content-header h1 {
	font-size: 1.2rem;
	margin: 0;
}
.mb-3, .small-box, .card, .info-box, .callout, .my-3 {
	margin-bottom: 0.1rem !important;
}
.widget-user .widget-user-header {
	padding: 0.4rem;
	height: 70px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 14px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgb(0 0 0 / 20%);
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
	margin-bottom: .05rem;
	font-family: inherit;
	font-weight: 500;
	line-height: 1.2;
	color: inherit;
}
.widget-user .widget-user-image {
	position: absolute;
	top: 1px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-image>img {
	width: 60px;
	height: auto;
	border: 3px solid #fff;
}
.description-block {
	display: block;
	margin: 0px 0;
	text-align: center;
}
.description-block>.description-header {
	margin: 0;
	padding: 0;
	font-weight: 400;
	font-size: 12px;
}
.card-header {
	position: relative;
	background-color: transparent;
	border-bottom: 1px solid #f4f4f4;
	border-top-left-radius: .025rem;
	border-top-right-radius: .025rem;
}
.card-body {
	flex: 1 1 auto;
	padding: 0.025rem;
}
.btn-app {
	border-radius: 3px;
	position: relative;
	padding: 0px 20px;
	margin: 0 0 0px 0px;
	min-width: 40px;
	height: 20px;
	text-align: center;
	color: #f1ecec;
	border: 1px solid #ddd;
	background-color: #28a745;
	font-size: 12px;
}
.card-header {
	padding: .075rem 0.025rem;
	margin-bottom: 0;
	background-color: rgba(17,17,17,0.03);
	border-bottom: 0 solid #f4f4f4;
}
.form-control {
	display: block;
	width: 100%;
	height: calc(1.7625rem + 2px);
	padding: .0375rem .075rem;
	font-size: .675rem;
	line-height: 1.5;
	color: #495057;
	background-color: #fff;
	background-clip: padding-box;
	border: 1px solid #ced4da;
	border-radius: .25rem;
	box-shadow: inset 0 0 0 rgb(17 17 17 / 0%);
	transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.table {
	width: auto;
	margin-bottom: 0.1rem;
	background-color: transparent;
}
a:not([href]):not([tabindex]) {
	color: aliceblue;
	text-decoration: none;
}
.input-group>.form-control, .input-group>.custom-select, .input-group>.custom-file {
	position: relative;
	flex: inherit;
	width: 1%;
	margin-bottom: 0;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["fk_id"];//
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$Tid."'; ";
$resultsA = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$resultsA[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"><?php echo $pageHeader; ?></h3>
			</div>
			<div class="card-body">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ARTCycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ARTCycle"></slot></span>
				 </td>
				<td id="fieldProtocol">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_Protocol"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Protocol"></slot></span>
				</td>
				<td id="fieldGROWTHHORMONE">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_GROWTHHORMONE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_GROWTHHORMONE"></slot></span>
				</td>
					<td id="fieldSemenFrozen">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_SemenFrozen"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_SemenFrozen"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TypeOfInfertility"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TypeOfInfertility"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_Duration"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Duration"></slot></span>
				</td>
		 </tr>
		  <tr id="rowTypeOfInfertility">
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TotalICSICycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TotalICSICycle"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_A4ICSICycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_A4ICSICycle"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_IUICycles"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_IUICycles"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_OvarianVolumeRT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_OvarianVolumeRT"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_RelevantHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_RelevantHistory"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_AFC"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_AFC"></slot></span>
				</td>
		 </tr>
		   <tr id="rowIUICycles">
		 </tr>
		  <tr id="rowMedicalFactors">
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_MedicalFactors"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_MedicalFactors"></slot></span>
				</td>
					<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_OvarianSurgery"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_OvarianSurgery"></slot></span>
				</td>
					<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_PRETREATMENT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_PRETREATMENT"></slot></span>
				</td>	
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_AMH"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_AMH"></slot></span>
				</td>
				<td id="fieldINJTYPE">
					<span  class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_INJTYPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_INJTYPE"></slot></span>
				</td>
				<td id="fieldLMP">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_LMP"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_LMP"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_SCDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_SCDate"></slot></span>
				</td>
	<td id="fieldANTAGONISTSTARTDAY">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ANTAGONISTSTARTDAY"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ANTAGONISTSTARTDAY"></slot></span>
				</td>
		 </tr>
		  <tr>
		 </tr> 
	</tbody>
</table>
</div>
<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_Consultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Consultant"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_InseminatinTechnique"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_InseminatinTechnique"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_IndicationForART"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_IndicationForART"></slot></span>
				</td>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_Hysteroscopy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Hysteroscopy"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_EndometrialScratching"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_EndometrialScratching"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TrialCannulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TrialCannulation"></slot></span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_CYCLETYPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_CYCLETYPE"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_HRTCYCLE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_HRTCYCLE"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_OralEstrogenDosage"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_OralEstrogenDosage"></slot></span>
				</td>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_VaginalEstrogen"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_VaginalEstrogen"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_GCSF"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_GCSF"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ActivatedPRP"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ActivatedPRP"></slot></span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_UCLcm"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_UCLcm"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"></slot></span>
				</td>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DAYOFEMBRYOS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DAYOFEMBRYOS"></slot></span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"></span>
				</td>
				<td>
					 <span class="ew-cell"></span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="ETTableStIIUUII" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TUBAL_PATENCY"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TUBAL_PATENCY"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_HSG"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_HSG"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DHL"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DHL"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_UTERINE_PROBLEMS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_UTERINE_PROBLEMS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_W_COMORBIDS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_W_COMORBIDS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_H_COMORBIDS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_H_COMORBIDS"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TABLETS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TABLETS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_FOLLICLE_STATUS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_FOLLICLE_STATUS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_PROCEDURE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_PROCEDURE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_LUTEAL_SUPPORT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_LUTEAL_SUPPORT"></slot></span></td>
		  		<td></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ONGOING_PREG"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ONGOING_PREG"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_EDD_Date"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_EDD_Date"></slot></span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table   class="table table-striped ew-table ew-export-table" >
	<tbody>
		<tr>
		<td>
<div id="IUIivfcONVERTTER" class="row">
<slot class="ew-slot" name="tpc_ivf_stimulation_chart_Convert"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Convert"></slot>
</div>
</td>
<td>
<div id="AllFreezeVisible" class="row">
	<slot class="ew-slot" name="tpc_ivf_stimulation_chart_AllFreeze"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_AllFreeze"></slot>
</div>
</td>
<td>
<div id="AllFreezeCancelReason" class="row">
	<slot class="ew-slot" name="tpc_ivf_stimulation_chart_TreatmentCancel"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TreatmentCancel"></slot>
</td>
<td>
	<div id='CancelReason' style="visibility: hidden" >
	<slot class="ew-slot" name="tpc_ivf_stimulation_chart_Reason"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Reason"></slot>
	</div>
</td>
<td>
<div id="ProjectronVisible" class="row">
	<slot class="ew-slot" name="tpc_ivf_stimulation_chart_Projectron"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Projectron"></slot>
</div>
</td>
<td>
<div id="ProgesteroneAdminTable"  class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Clinical Management</h3>
			</div>
			<div class="card-body"  style="overflow-x:auto;">
<table   class="table table-striped ew-table ew-export-table" style="width:40%;">
	<tbody>
		<tr><td>Detail Progesterone</td></tr>
		<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ProgesteroneAdmin"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ProgesteroneAdmin"></slot></span></td></tr>
	<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ProgesteroneStart"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ProgesteroneStart"></slot></span></td></tr>
		<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ProgesteroneDose"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ProgesteroneDose"></slot></span></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
		<tr><td><button type="button" onclick="ProgesteroneAccept()" class="btn btn-success">Accept</button>
<button type="button" onclick="ProgesteroneCancel()" class="btn btn-info">Cancel</button></td></tr>	
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-bodyya"  style="overflow-x:auto;">
<table id="tablechartadd"  class="table table-striped ew-table ew-export-table" >
	<thead>
		<tr>
				<td ><span class="ew-cell">Date</span></td>
				 <td ><span class="ew-cell">Cycle day</span></td>
				 <td id="tableStimulationday"><span class="ew-cell">Stimu day</span></td>
				<td id="tableTablet" ><span class="ew-cell">A/CC</span></td>
				 <td id="tableRFSH"><span class="ew-cell">R FSH</span></td>
				 <td id="tableHMG"><span class="ew-cell">HMG</span></td>
				<td><span class="ew-cell">GnRH</span></td>
				 <td id="tableE2"><span id="colE2" class="ew-cell">E2</span></td>
				 <td><span id="colP4" class="ew-cell">P4</span></td>
				<td><span id="colUSGRt" class="ew-cell">USG Rt</span></td>
				 <td ><span id="colUSGLt" class="ew-cell">USG Lt</span></td>
				 <td><span id="colET" class="ew-cell">ET</span></td>
				<td><span id="colOthers" class="ew-cell">Others</span></td>
				<td><span id="colDr" class="ew-cell">Dr</span></td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate1"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay1"></slot></td>
				 <td id="tableStimulationday1"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay1"></slot></td>
				<td id="tableTablet1"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet1"></slot></td>
				<td  id="tableRFSH1"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH1"></slot></td>				 
				<td id="tableHMG1"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG1"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH1"></slot></td>
				<td id="tableE21"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E21"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P41"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt1"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt1"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM1"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others1"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR1"></slot></td>
		 </tr>
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate2"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay2"></slot></td>
				 <td id="tableStimulationday2"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay2"></slot></td>
				<td id="tableTablet2"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet2"></slot></td>
				<td id="tableRFSH2"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH2"></slot></td>				 
				<td id="tableHMG2"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG2"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH2"></slot></td>
				<td id="tableE22"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E22"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P42"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt2"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt2"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM2"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others2"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR2"></slot></td>
		 </tr>
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate3"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay3"></slot></td>
				 <td id="tableStimulationday3"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay3"></slot></td>
				<td id="tableTablet3"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet3"></slot></td>
				<td id="tableRFSH3"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH3"></slot></td>				 
				<td id="tableHMG3"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG3"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH3"></slot></td>
				<td id="tableE23"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E23"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P43"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt3"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt3"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM3"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others3"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR3"></slot></td>
		 </tr>	
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate4"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay4"></slot></td>
				 <td id="tableStimulationday4"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay4"></slot></td>
				<td id="tableTablet4"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet4"></slot></td>
				<td id="tableRFSH4"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH4"></slot></td>				 
				<td id="tableHMG4"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG4"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH4"></slot></td>
				<td id="tableE24"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E24"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P44"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt4"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt4"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM4"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others4"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR4"></slot></td>
		 </tr>
	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate5"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay5"></slot></td>
				 <td id="tableStimulationday5"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay5"></slot></td>
				<td id="tableTablet5"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet5"></slot></td>
				<td id="tableRFSH5"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH5"></slot></td>				 
				<td id="tableHMG5"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG5"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH5"></slot></td>
				<td id="tableE25"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E25"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P45"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt5"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt5"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM5"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others5"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR5"></slot></td>
		 </tr>	
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate6"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay6"></slot></td>
				 <td id="tableStimulationday6"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay6"></slot></td>
				<td id="tableTablet6"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet6"></slot></td>
				<td id="tableRFSH6"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH6"></slot></td>				 
				<td id="tableHMG6"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG6"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH6"></slot></td>
				<td id="tableE26"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E26"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P46"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt6"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt6"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM6"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others6"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR6"></slot></td>
		 </tr>
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate7"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay7"></slot></td>
				 <td id="tableStimulationday7"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay7"></slot></td>
				<td id="tableTablet7"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet7"></slot></td>
				<td id="tableRFSH7"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH7"></slot></td>				 
				<td id="tableHMG7"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG7"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH7"></slot></td>
				<td id="tableE27"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E27"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P47"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt7"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt7"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM7"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others7"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR7"></slot></td>
		 </tr>
	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate8"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay8"></slot></td>
				 <td id="tableStimulationday8"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay8"></slot></td>
				<td id="tableTablet8"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet8"></slot></td>
				<td id="tableRFSH8"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH8"></slot></td>				 
				<td id="tableHMG8"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG8"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH8"></slot></td>
				<td id="tableE28"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E28"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P48"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt8"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt8"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM8"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others8"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR8"></slot></td>
		 </tr>	
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate9"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay9"></slot></td>
				 <td id="tableStimulationday9"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay9"></slot></td>
				<td id="tableTablet9"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet9"></slot></td>
				<td id="tableRFSH9"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH9"></slot></td>				 
				<td id="tableHMG9"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG9"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH9"></slot></td>
				<td id="tableE29"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E29"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P49"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt9"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt9"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM9"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others9"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR9"></slot></td>
		 </tr>
	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate10"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay10"></slot></td>
				 <td id="tableStimulationday10"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay10"></slot></td>
				<td id="tableTablet10"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet10"></slot></td>
				<td id="tableRFSH10"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH10"></slot></td>				 
				<td id="tableHMG10"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG10"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH10"></slot></td>
				<td id="tableE210"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E210"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P410"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt10"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt10"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM10"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others10"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR10"></slot></td>
		 </tr>	
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate11"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay11"></slot></td>
				 <td id="tableStimulationday11"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay11"></slot></td>
				<td id="tableTablet11"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet11"></slot></td>
				<td id="tableRFSH11"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH11"></slot></td>				 
				<td id="tableHMG11"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG11"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH11"></slot></td>
				<td id="tableE211"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E211"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P411"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt11"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt11"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM11"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others11"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR11"></slot></td>
		 </tr>
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate12"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay12"></slot></td>
				 <td id="tableStimulationday12"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay12"></slot></td>
				<td id="tableTablet12"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet12"></slot></td>
				<td id="tableRFSH12"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH12"></slot></td>				 
				<td id="tableHMG12"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG12"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH12"></slot></td>
				<td id="tableE212"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E212"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P412"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt12"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt12"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM12"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others12"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR12"></slot></td>
		 </tr>
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate13"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay13"></slot></td>
				 <td id="tableStimulationday13"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay13"></slot></td>
				<td id="tableTablet13"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet13"></slot></td>
				<td id="tableRFSH13"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH13"></slot></td>				 
				<td id="tableHMG13"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG13"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH13"></slot></td>
				<td id="tableE213"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E213"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P413"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt13"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt13"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM13"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others13"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR13"></slot></td>
		 </tr>
		 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate14"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay14"></slot></td>
				 <td id="tableStimulationday14"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay14"></slot></td>
				<td id="tableTablet14"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet14"></slot></td>
				<td  id="tableRFSH14"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH14"></slot></td>				 
				<td id="tableHMG14"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG14"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH14"></slot></td>
				<td id="tableE214"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E214"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P414"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt14"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt14"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM14"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others14"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR14"></slot></td>
		 </tr>
		 <tr  id="trrow15" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate15"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay15"></slot></td>
				 <td id="tableStimulationday15"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay15"></slot></td>
				<td id="tableTablet15"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet15"></slot></td>
				<td  id="tableRFSH15"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH15"></slot></td>				 
				<td id="tableHMG15"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG15"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH15"></slot></td>
				<td id="tableE215"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E215"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P415"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt15"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt15"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM15"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others15"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR15"></slot></td>
		 </tr>
		 <tr id="trrow16" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate16"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay16"></slot></td>
				 <td id="tableStimulationday16"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay16"></slot></td>
				<td id="tableTablet16"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet16"></slot></td>
				<td  id="tableRFSH16"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH16"></slot></td>				 
				<td id="tableHMG16"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG16"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH16"></slot></td>
				<td id="tableE216"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E216"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P416"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt16"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt16"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM16"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others16"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR16"></slot></td>
		 </tr>
		 <tr id="trrow17" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate17"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay17"></slot></td>
				 <td id="tableStimulationday17"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay17"></slot></td>
				<td id="tableTablet17"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet17"></slot></td>
				<td  id="tableRFSH17"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH17"></slot></td>				 
				<td id="tableHMG17"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG17"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH17"></slot></td>
				<td id="tableE217"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E217"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P417"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt17"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt17"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM17"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others17"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR17"></slot></td>
		 </tr>
		 <tr id="trrow18" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate18"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay18"></slot></td>
				 <td id="tableStimulationday18"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay18"></slot></td>
				<td id="tableTablet18"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet18"></slot></td>
				<td  id="tableRFSH18"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH18"></slot></td>				 
				<td id="tableHMG18"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG18"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH18"></slot></td>
				<td id="tableE218"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E218"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P418"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt18"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt18"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM18"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others18"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR18"></slot></td>
		 </tr>
		 <tr id="trrow19" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate19"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay19"></slot></td>
				 <td id="tableStimulationday19"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay19"></slot></td>
				<td id="tableTablet19"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet19"></slot></td>
				<td  id="tableRFSH19"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH19"></slot></td>				 
				<td id="tableHMG19"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG19"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH19"></slot></td>
				<td id="tableE219"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E219"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P419"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt19"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt19"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM19"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others19"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR19"></slot></td>
		 </tr>
		 <tr id="trrow20" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate20"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay20"></slot></td>
				 <td id="tableStimulationday20"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay20"></slot></td>
				<td id="tableTablet20"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet20"></slot></td>
				<td  id="tableRFSH20"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH20"></slot></td>				 
				<td id="tableHMG20"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG20"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH20"></slot></td>
				<td id="tableE220"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E220"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P420"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt20"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt20"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM20"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others20"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR20"></slot></td>
		 </tr>
		 <tr id="trrow21" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate21"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay21"></slot></td>
				 <td id="tableStimulationday21"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay21"></slot></td>
				<td id="tableTablet21"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet21"></slot></td>
				<td  id="tableRFSH21"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH21"></slot></td>				 
				<td id="tableHMG21"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG21"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH21"></slot></td>
				<td id="tableE221"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E221"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P421"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt21"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt21"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM21"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others21"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR21"></slot></td>
		 </tr>
		 <tr id="trrow22" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate22"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay22"></slot></td>
				 <td id="tableStimulationday22"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay22"></slot></td>
				<td id="tableTablet22"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet22"></slot></td>
				<td  id="tableRFSH22"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH22"></slot></td>				 
				<td id="tableHMG22"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG22"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH22"></slot></td>
				<td id="tableE222"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E222"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P422"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt22"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt22"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM22"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others22"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR22"></slot></td>
		 </tr>
		 <tr id="trrow23" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate23"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay23"></slot></td>
				 <td id="tableStimulationday23"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay23"></slot></td>
				<td id="tableTablet23"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet23"></slot></td>
				<td  id="tableRFSH23"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH23"></slot></td>				 
				<td id="tableHMG23"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG23"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH23"></slot></td>
				<td id="tableE223"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E223"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P423"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt23"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt23"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM23"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others23"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR23"></slot></td>
		 </tr>
		 <tr id="trrow24" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate24"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay24"></slot></td>
				 <td id="tableStimulationday24"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay24"></slot></td>
				<td id="tableTablet24"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet24"></slot></td>
				<td  id="tableRFSH24"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH24"></slot></td>				 
				<td id="tableHMG24"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG24"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH24"></slot></td>
				<td id="tableE224"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E224"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P424"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt24"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt24"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM24"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others24"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR24"></slot></td>
		 </tr>
		 <tr  id="trrow25" style="display: none;" >
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate25"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay25"></slot></td>
				 <td id="tableStimulationday25"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay25"></slot></td>
				<td id="tableTablet25"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet25"></slot></td>
				<td  id="tableRFSH25"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH25"></slot></td>				 
				<td id="tableHMG25"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG25"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH25"></slot></td>
				<td id="tableE225"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E225"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P425"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt25"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt25"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM25"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others25"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR25"></slot></td>
		 </tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><a class="btn btn-app" onclick="addrowsintable()"><i class="fas fa-plus"></i> Add</a></td>
				<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DAYSOFSTIMULATION"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DAYSOFSTIMULATION"></slot></span></td>	
				<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DOSEOFGONADOTROPINS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DOSEOFGONADOTROPINS"></slot></span></td>
				<td><span  id="ANTAGONISTDAYSstum"  class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ANTAGONISTDAYS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ANTAGONISTDAYS"></slot></span></td>
	   </tr>	
	</tbody>
</table>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Pre Procedure Order</h3>
			</div>
			<div class="card-body">
<table id="PreProcedureEEETTTDTE" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_EEETTTDTE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_EEETTTDTE"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_bhcgdate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_bhcgdate"></slot></span>
				</td>
				<td>
					<span class="ew-cell"></span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="PreProcedureOrderPPOOUU" class="ew-table" style="width:100%;">
	 <tbody>
		<tr id="RowPreProcedureOrder">
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_PreProcedureOrder"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_PreProcedureOrder"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_Expectedoocytes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Expectedoocytes"></slot></span>
				</td>
				<td>
					<span class="ew-cell"></span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				</td>
		 </tr>
		 <tr>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TRIGGERR"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TRIGGERR"></slot></span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TRIGGERDATE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TRIGGERDATE"></slot></span>
				 </td>
				 <td id="colATHOMEorCLINIC">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ATHOMEorCLINIC"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ATHOMEorCLINIC"></slot></span>
				 </td>
		 		 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_SEMENPREPARATION"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_SEMENPREPARATION"></slot></span>
				 </td>
				 <td>
					<span id="fieldOPUDATE" class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_OPUDATE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_OPUDATE"></slot></span>
				 </td>
		 		 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DOCTORRESPONSIBLE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DOCTORRESPONSIBLE"></slot></span>
				 </td>
		 </tr>
		 <tr id="RowALLFREEZEINDICATION"> 
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ALLFREEZEINDICATION"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ALLFREEZEINDICATION"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ERA"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ERA"></slot></span>
				 </td>
				 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_REASONFORESET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_REASONFORESET"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				 </td>
		 </tr>
  		  <tr id="RowDATEOFET">
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DATEOFET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DATEOFET"></slot></span>
				</td>
				 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ET"></slot></span>
				 </td>
				  <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ESET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ESET"></slot></span>
				 </td>
				 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DOET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DOET"></slot></span>
				 </td>
				 <td id="colPGTA">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_PGTA"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_PGTA"></slot></span>
				 </td>
				 <td id="colPGD">
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_PGD"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_PGD"></slot></span>
				 </td>
		 </tr>
		 <tr>
		 </tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
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
    ew.applyTemplate("tpd_ivf_stimulation_chartedit", "tpm_ivf_stimulation_chartedit", "ivf_stimulation_chartedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("ivf_stimulation_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    var mousedown,mouseup,keydownval,sorceEL,sourceROW,mouseUPEL,mouseUPROW;document.addEventListener("keydown",(function(e){keydownval=e.which,console.log(e)})),$(".text-muted").after('&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-app"  href="javascript:history.back()"><i class="fas fa-undo"></i> Back</a>'),$("#x_E21").mouseup((function(){mouseUPEL="x_E21",mouseUPROW=1;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E22").mouseup((function(){mouseUPEL="x_E22",mouseUPROW=2;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E23").mouseup((function(){mouseUPEL="x_E23",mouseUPROW=3;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E24").mouseup((function(){mouseUPEL="x_E24",mouseUPROW=4;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E25").mouseup((function(){mouseUPEL="x_E25",mouseUPROW=5;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E26").mouseup((function(){mouseUPEL="x_E26",mouseUPROW=6;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E27").mouseup((function(){mouseUPEL="x_E27",mouseUPROW=7;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E28").mouseup((function(){mouseUPEL="x_E28",mouseUPROW=8;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E29").mouseup((function(){mouseUPEL="x_E29",mouseUPROW=9;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E210").mouseup((function(){mouseUPEL="x_E210",mouseUPROW=10;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E211").mouseup((function(){mouseUPEL="x_E211",mouseUPROW=11;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E212").mouseup((function(){mouseUPEL="x_E212",mouseUPROW=12;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E213").mouseup((function(){mouseUPEL="x_E213",mouseUPROW=13;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E214").mouseup((function(){mouseUPEL="x_E214",mouseUPROW=14;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E215").mouseup((function(){mouseUPEL="x_E215",mouseUPROW=15;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E216").mouseup((function(){mouseUPEL="x_E216",mouseUPROW=16;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E217").mouseup((function(){mouseUPEL="x_E217",mouseUPROW=17;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E218").mouseup((function(){mouseUPEL="x_E218",mouseUPROW=18;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E219").mouseup((function(){mouseUPEL="x_E219",mouseUPROW=19;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E220").mouseup((function(){mouseUPEL="x_E220",mouseUPROW=20;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E221").mouseup((function(){mouseUPEL="x_E221",mouseUPROW=21;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E222").mouseup((function(){mouseUPEL="x_E222",mouseUPROW=22;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E223").mouseup((function(){mouseUPEL="x_E223",mouseUPROW=23;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E224").mouseup((function(){mouseUPEL="x_E224",mouseUPROW=24;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E225").mouseup((function(){mouseUPEL="x_E225",mouseUPROW=25;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E21").click((function(){sorceEL="x_E21",sourceROW=1})),$("#x_E22").click((function(){sorceEL="x_E22",sourceROW=2})),$("#x_E23").click((function(){sorceEL="x_E23",sourceROW=3})),$("#x_E24").click((function(){sorceEL="x_E24",sourceROW=4})),$("#x_E25").click((function(){sorceEL="x_E25",sourceROW=5})),$("#x_E26").click((function(){sorceEL="x_E26",sourceROW=6})),$("#x_E27").click((function(){sorceEL="x_E27",sourceROW=7})),$("#x_E28").click((function(){sorceEL="x_E28",sourceROW=8})),$("#x_E29").click((function(){sorceEL="x_E29",sourceROW=9})),$("#x_E210").click((function(){sorceEL="x_E210",sourceROW=10})),$("#x_E211").click((function(){sorceEL="x_E211",sourceROW=11})),$("#x_E212").click((function(){sorceEL="x_E212",sourceROW=12})),$("#x_E213").click((function(){sorceEL="x_E213",sourceROW=13})),$("#x_E214").click((function(){sorceEL="x_E214",sourceROW=14})),$("#x_E215").click((function(){sorceEL="x_E215",sourceROW=15})),$("#x_E216").click((function(){sorceEL="x_E216",sourceROW=16})),$("#x_E217").click((function(){sorceEL="x_E217",sourceROW=17})),$("#x_E218").click((function(){sorceEL="x_E218",sourceROW=18})),$("#x_E219").click((function(){sorceEL="x_E219",sourceROW=19})),$("#x_E220").click((function(){sorceEL="x_E220",sourceROW=20})),$("#x_E221").click((function(){sorceEL="x_E221",sourceROW=21})),$("#x_E222").click((function(){sorceEL="x_E222",sourceROW=22})),$("#x_E223").click((function(){sorceEL="x_E223",sourceROW=23})),$("#x_E224").click((function(){sorceEL="x_E224",sourceROW=24})),$("#x_E225").click((function(){sorceEL="x_E225",sourceROW=25})),$("#x_E21").mousedown((function(){sorceEL="x_E21",sourceROW=1})),$("#x_E22").mousedown((function(){sorceEL="x_E22",sourceROW=2})),$("#x_E23").mousedown((function(){sorceEL="x_E23",sourceROW=3})),$("#x_E24").mousedown((function(){sorceEL="x_E24",sourceROW=4})),$("#x_E25").mousedown((function(){sorceEL="x_E25",sourceROW=5})),$("#x_E26").mousedown((function(){sorceEL="x_E26",sourceROW=6})),$("#x_E27").mousedown((function(){sorceEL="x_E27",sourceROW=7})),$("#x_E28").mousedown((function(){sorceEL="x_E28",sourceROW=8})),$("#x_E29").mousedown((function(){sorceEL="x_E29",sourceROW=9})),$("#x_E210").mousedown((function(){sorceEL="x_E210",sourceROW=10})),$("#x_E211").mousedown((function(){sorceEL="x_E211",sourceROW=11})),$("#x_E212").mousedown((function(){sorceEL="x_E212",sourceROW=12})),$("#x_E213").mousedown((function(){sorceEL="x_E213",sourceROW=13})),$("#x_E214").mousedown((function(){sorceEL="x_E214",sourceROW=14})),$("#x_E215").mousedown((function(){sorceEL="x_E215",sourceROW=15})),$("#x_E216").mousedown((function(){sorceEL="x_E216",sourceROW=16})),$("#x_E217").mousedown((function(){sorceEL="x_E217",sourceROW=17})),$("#x_E218").mousedown((function(){sorceEL="x_E218",sourceROW=18})),$("#x_E219").mousedown((function(){sorceEL="x_E219",sourceROW=19})),$("#x_E220").mousedown((function(){sorceEL="x_E220",sourceROW=20})),$("#x_E221").mousedown((function(){sorceEL="x_E221",sourceROW=21})),$("#x_E222").mousedown((function(){sorceEL="x_E222",sourceROW=22})),$("#x_E223").mousedown((function(){sorceEL="x_E223",sourceROW=23})),$("#x_E224").mousedown((function(){sorceEL="x_E224",sourceROW=24})),$("#x_E225").mousedown((function(){sorceEL="x_E225",sourceROW=25})),$("#x_P41").mouseup((function(){mouseUPEL="x_P41",mouseUPROW=1;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P42").mouseup((function(){mouseUPEL="x_P42",mouseUPROW=2;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P43").mouseup((function(){mouseUPEL="x_P43",mouseUPROW=3;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P44").mouseup((function(){mouseUPEL="x_P44",mouseUPROW=4;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P45").mouseup((function(){mouseUPEL="x_P45",mouseUPROW=5;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P46").mouseup((function(){mouseUPEL="x_P46",mouseUPROW=6;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P47").mouseup((function(){mouseUPEL="x_P47",mouseUPROW=7;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P48").mouseup((function(){mouseUPEL="x_P48",mouseUPROW=8;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P49").mouseup((function(){mouseUPEL="x_P49",mouseUPROW=9;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P410").mouseup((function(){mouseUPEL="x_P410",mouseUPROW=10;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P411").mouseup((function(){mouseUPEL="x_P411",mouseUPROW=11;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P412").mouseup((function(){mouseUPEL="x_P412",mouseUPROW=12;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P413").mouseup((function(){mouseUPEL="x_P413",mouseUPROW=13;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P414").mouseup((function(){mouseUPEL="x_P414",mouseUPROW=14;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P415").mouseup((function(){mouseUPEL="x_P415",mouseUPROW=15;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P416").mouseup((function(){mouseUPEL="x_P416",mouseUPROW=16;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P417").mouseup((function(){mouseUPEL="x_P417",mouseUPROW=17;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P418").mouseup((function(){mouseUPEL="x_P418",mouseUPROW=18;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P419").mouseup((function(){mouseUPEL="x_P419",mouseUPROW=19;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P420").mouseup((function(){mouseUPEL="x_P420",mouseUPROW=20;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P421").mouseup((function(){mouseUPEL="x_P421",mouseUPROW=21;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P422").mouseup((function(){mouseUPEL="x_P422",mouseUPROW=22;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P423").mouseup((function(){mouseUPEL="x_P423",mouseUPROW=23;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P424").mouseup((function(){mouseUPEL="x_P424",mouseUPROW=24;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P425").mouseup((function(){mouseUPEL="x_P425",mouseUPROW=25;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P41").click((function(){sorceEL="x_P41",sourceROW=1})),$("#x_P42").click((function(){sorceEL="x_P42",sourceROW=2})),$("#x_P43").click((function(){sorceEL="x_P43",sourceROW=3})),$("#x_P44").click((function(){sorceEL="x_P44",sourceROW=4})),$("#x_P45").click((function(){sorceEL="x_P45",sourceROW=5})),$("#x_P46").click((function(){sorceEL="x_P46",sourceROW=6})),$("#x_P47").click((function(){sorceEL="x_P47",sourceROW=7})),$("#x_P48").click((function(){sorceEL="x_P48",sourceROW=8})),$("#x_P49").click((function(){sorceEL="x_P49",sourceROW=9})),$("#x_P410").click((function(){sorceEL="x_P410",sourceROW=10})),$("#x_P411").click((function(){sorceEL="x_P411",sourceROW=11})),$("#x_P412").click((function(){sorceEL="x_P412",sourceROW=12})),$("#x_P413").click((function(){sorceEL="x_P413",sourceROW=13})),$("#x_P414").click((function(){sorceEL="x_P414",sourceROW=14})),$("#x_P415").click((function(){sorceEL="x_P415",sourceROW=15})),$("#x_P416").click((function(){sorceEL="x_P416",sourceROW=16})),$("#x_P417").click((function(){sorceEL="x_P417",sourceROW=17})),$("#x_P418").click((function(){sorceEL="x_P418",sourceROW=18})),$("#x_P419").click((function(){sorceEL="x_P419",sourceROW=19})),$("#x_P420").click((function(){sorceEL="x_P420",sourceROW=20})),$("#x_P421").click((function(){sorceEL="x_P421",sourceROW=21})),$("#x_P422").click((function(){sorceEL="x_P422",sourceROW=22})),$("#x_P423").click((function(){sorceEL="x_P423",sourceROW=23})),$("#x_P424").click((function(){sorceEL="x_P424",sourceROW=24})),$("#x_P425").click((function(){sorceEL="x_P425",sourceROW=25})),$("#x_P41").mousedown((function(){sorceEL="x_P41",sourceROW=1})),$("#x_P42").mousedown((function(){sorceEL="x_P42",sourceROW=2})),$("#x_P43").mousedown((function(){sorceEL="x_P43",sourceROW=3})),$("#x_P44").mousedown((function(){sorceEL="x_P44",sourceROW=4})),$("#x_P45").mousedown((function(){sorceEL="x_P45",sourceROW=5})),$("#x_P46").mousedown((function(){sorceEL="x_P46",sourceROW=6})),$("#x_P47").mousedown((function(){sorceEL="x_P47",sourceROW=7})),$("#x_P48").mousedown((function(){sorceEL="x_P48",sourceROW=8})),$("#x_P49").mousedown((function(){sorceEL="x_P49",sourceROW=9})),$("#x_P410").mousedown((function(){sorceEL="x_P410",sourceROW=10})),$("#x_P411").mousedown((function(){sorceEL="x_P411",sourceROW=11})),$("#x_P412").mousedown((function(){sorceEL="x_P412",sourceROW=12})),$("#x_P413").mousedown((function(){sorceEL="x_P413",sourceROW=13})),$("#x_P414").mousedown((function(){sorceEL="x_P414",sourceROW=14})),$("#x_P415").mousedown((function(){sorceEL="x_P415",sourceROW=15})),$("#x_P416").mousedown((function(){sorceEL="x_P416",sourceROW=16})),$("#x_P417").mousedown((function(){sorceEL="x_P417",sourceROW=17})),$("#x_P418").mousedown((function(){sorceEL="x_P418",sourceROW=18})),$("#x_P419").mousedown((function(){sorceEL="x_P419",sourceROW=19})),$("#x_P420").mousedown((function(){sorceEL="x_P420",sourceROW=20})),$("#x_P421").mousedown((function(){sorceEL="x_P421",sourceROW=21})),$("#x_P422").mousedown((function(){sorceEL="x_P422",sourceROW=22})),$("#x_P423").mousedown((function(){sorceEL="x_P423",sourceROW=23})),$("#x_P424").mousedown((function(){sorceEL="x_P424",sourceROW=24})),$("#x_P425").mousedown((function(){sorceEL="x_P425",sourceROW=25})),$("#x_USGRt1").mouseup((function(){mouseUPEL="x_USGRt1",mouseUPROW=1;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt2").mouseup((function(){mouseUPEL="x_USGRt2",mouseUPROW=2;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt3").mouseup((function(){mouseUPEL="x_USGRt3",mouseUPROW=3;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt4").mouseup((function(){mouseUPEL="x_USGRt4",mouseUPROW=4;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt5").mouseup((function(){mouseUPEL="x_USGRt5",mouseUPROW=5;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt6").mouseup((function(){mouseUPEL="x_USGRt6",mouseUPROW=6;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt7").mouseup((function(){mouseUPEL="x_USGRt7",mouseUPROW=7;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt8").mouseup((function(){mouseUPEL="x_USGRt8",mouseUPROW=8;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt9").mouseup((function(){mouseUPEL="x_USGRt9",mouseUPROW=9;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt10").mouseup((function(){mouseUPEL="x_USGRt10",mouseUPROW=10;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt11").mouseup((function(){mouseUPEL="x_USGRt11",mouseUPROW=11;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt12").mouseup((function(){mouseUPEL="x_USGRt12",mouseUPROW=12;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt13").mouseup((function(){mouseUPEL="x_USGRt13",mouseUPROW=13;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt14").mouseup((function(){mouseUPEL="x_USGRt14",mouseUPROW=14;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt15").mouseup((function(){mouseUPEL="x_USGRt15",mouseUPROW=15;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt16").mouseup((function(){mouseUPEL="x_USGRt16",mouseUPROW=16;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt17").mouseup((function(){mouseUPEL="x_USGRt17",mouseUPROW=17;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt18").mouseup((function(){mouseUPEL="x_USGRt18",mouseUPROW=18;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt19").mouseup((function(){mouseUPEL="x_USGRt19",mouseUPROW=19;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt20").mouseup((function(){mouseUPEL="x_USGRt20",mouseUPROW=20;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt21").mouseup((function(){mouseUPEL="x_USGRt21",mouseUPROW=21;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt22").mouseup((function(){mouseUPEL="x_USGRt22",mouseUPROW=22;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt23").mouseup((function(){mouseUPEL="x_USGRt23",mouseUPROW=23;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt24").mouseup((function(){mouseUPEL="x_USGRt24",mouseUPROW=24;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt25").mouseup((function(){mouseUPEL="x_USGRt25",mouseUPROW=25;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt1").click((function(){sorceEL="x_USGRt1",sourceROW=1})),$("#x_USGRt2").click((function(){sorceEL="x_USGRt2",sourceROW=2})),$("#x_USGRt3").click((function(){sorceEL="x_USGRt3",sourceROW=3})),$("#x_USGRt4").click((function(){sorceEL="x_USGRt4",sourceROW=4})),$("#x_USGRt5").click((function(){sorceEL="x_USGRt5",sourceROW=5})),$("#x_USGRt6").click((function(){sorceEL="x_USGRt6",sourceROW=6})),$("#x_USGRt7").click((function(){sorceEL="x_USGRt7",sourceROW=7})),$("#x_USGRt8").click((function(){sorceEL="x_USGRt8",sourceROW=8})),$("#x_USGRt9").click((function(){sorceEL="x_USGRt9",sourceROW=9})),$("#x_USGRt10").click((function(){sorceEL="x_USGRt10",sourceROW=10})),$("#x_USGRt11").click((function(){sorceEL="x_USGRt11",sourceROW=11})),$("#x_USGRt12").click((function(){sorceEL="x_USGRt12",sourceROW=12})),$("#x_USGRt13").click((function(){sorceEL="x_USGRt13",sourceROW=13})),$("#x_USGRt14").click((function(){sorceEL="x_USGRt14",sourceROW=14})),$("#x_USGRt15").click((function(){sorceEL="x_USGRt15",sourceROW=15})),$("#x_USGRt16").click((function(){sorceEL="x_USGRt16",sourceROW=16})),$("#x_USGRt17").click((function(){sorceEL="x_USGRt17",sourceROW=17})),$("#x_USGRt18").click((function(){sorceEL="x_USGRt18",sourceROW=18})),$("#x_USGRt19").click((function(){sorceEL="x_USGRt19",sourceROW=19})),$("#x_USGRt20").click((function(){sorceEL="x_USGRt20",sourceROW=20})),$("#x_USGRt21").click((function(){sorceEL="x_USGRt21",sourceROW=21})),$("#x_USGRt22").click((function(){sorceEL="x_USGRt22",sourceROW=22})),$("#x_USGRt23").click((function(){sorceEL="x_USGRt23",sourceROW=23})),$("#x_USGRt24").click((function(){sorceEL="x_USGRt24",sourceROW=24})),$("#x_USGRt25").click((function(){sorceEL="x_USGRt25",sourceROW=25})),$("#x_USGRt1").mousedown((function(){sorceEL="x_USGRt1",sourceROW=1})),$("#x_USGRt2").mousedown((function(){sorceEL="x_USGRt2",sourceROW=2})),$("#x_USGRt3").mousedown((function(){sorceEL="x_USGRt3",sourceROW=3})),$("#x_USGRt4").mousedown((function(){sorceEL="x_USGRt4",sourceROW=4})),$("#x_USGRt5").mousedown((function(){sorceEL="x_USGRt5",sourceROW=5})),$("#x_USGRt6").mousedown((function(){sorceEL="x_USGRt6",sourceROW=6})),$("#x_USGRt7").mousedown((function(){sorceEL="x_USGRt7",sourceROW=7})),$("#x_USGRt8").mousedown((function(){sorceEL="x_USGRt8",sourceROW=8})),$("#x_USGRt9").mousedown((function(){sorceEL="x_USGRt9",sourceROW=9})),$("#x_USGRt10").mousedown((function(){sorceEL="x_USGRt10",sourceROW=10})),$("#x_USGRt11").mousedown((function(){sorceEL="x_USGRt11",sourceROW=11})),$("#x_USGRt12").mousedown((function(){sorceEL="x_USGRt12",sourceROW=12})),$("#x_USGRt13").mousedown((function(){sorceEL="x_USGRt13",sourceROW=13})),$("#x_USGRt14").mousedown((function(){sorceEL="x_USGRt14",sourceROW=14})),$("#x_USGRt15").mousedown((function(){sorceEL="x_USGRt15",sourceROW=15})),$("#x_USGRt16").mousedown((function(){sorceEL="x_USGRt16",sourceROW=16})),$("#x_USGRt17").mousedown((function(){sorceEL="x_USGRt17",sourceROW=17})),$("#x_USGRt18").mousedown((function(){sorceEL="x_USGRt18",sourceROW=18})),$("#x_USGRt19").mousedown((function(){sorceEL="x_USGRt19",sourceROW=19})),$("#x_USGRt20").mousedown((function(){sorceEL="x_USGRt20",sourceROW=20})),$("#x_USGRt21").mousedown((function(){sorceEL="x_USGRt21",sourceROW=21})),$("#x_USGRt22").mousedown((function(){sorceEL="x_USGRt22",sourceROW=22})),$("#x_USGRt23").mousedown((function(){sorceEL="x_USGRt23",sourceROW=23})),$("#x_USGRt24").mousedown((function(){sorceEL="x_USGRt24",sourceROW=24})),$("#x_USGRt25").mousedown((function(){sorceEL="x_USGRt25",sourceROW=25})),$("#x_Tablet1").mouseup((function(){mouseUPEL="x_Tablet1",mouseUPROW=1;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet2").mouseup((function(){mouseUPEL="x_Tablet2",mouseUPROW=2;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet3").mouseup((function(){mouseUPEL="x_Tablet3",mouseUPROW=3;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet4").mouseup((function(){mouseUPEL="x_Tablet4",mouseUPROW=4;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet5").mouseup((function(){mouseUPEL="x_Tablet5",mouseUPROW=5;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet6").mouseup((function(){mouseUPEL="x_Tablet6",mouseUPROW=6;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet7").mouseup((function(){mouseUPEL="x_Tablet7",mouseUPROW=7;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet8").mouseup((function(){mouseUPEL="x_Tablet8",mouseUPROW=8;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet9").mouseup((function(){mouseUPEL="x_Tablet9",mouseUPROW=9;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet10").mouseup((function(){mouseUPEL="x_Tablet10",mouseUPROW=10;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet11").mouseup((function(){mouseUPEL="x_Tablet11",mouseUPROW=11;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet12").mouseup((function(){mouseUPEL="x_Tablet12",mouseUPROW=12;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet13").mouseup((function(){mouseUPEL="x_Tablet13",mouseUPROW=13;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet14").mouseup((function(){mouseUPEL="x_Tablet14",mouseUPROW=14;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet15").mouseup((function(){mouseUPEL="x_Tablet15",mouseUPROW=15;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet16").mouseup((function(){mouseUPEL="x_Tablet16",mouseUPROW=16;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet17").mouseup((function(){mouseUPEL="x_Tablet17",mouseUPROW=17;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet18").mouseup((function(){mouseUPEL="x_Tablet18",mouseUPROW=18;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet19").mouseup((function(){mouseUPEL="x_Tablet19",mouseUPROW=19;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet20").mouseup((function(){mouseUPEL="x_Tablet20",mouseUPROW=20;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet21").mouseup((function(){mouseUPEL="x_Tablet21",mouseUPROW=21;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet22").mouseup((function(){mouseUPEL="x_Tablet22",mouseUPROW=22;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet23").mouseup((function(){mouseUPEL="x_Tablet23",mouseUPROW=23;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet24").mouseup((function(){mouseUPEL="x_Tablet24",mouseUPROW=24;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet25").mouseup((function(){mouseUPEL="x_Tablet25",mouseUPROW=25;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet1").click((function(){sorceEL="x_Tablet1",sourceROW=1})),$("#x_Tablet2").click((function(){sorceEL="x_Tablet2",sourceROW=2})),$("#x_Tablet3").click((function(){sorceEL="x_Tablet3",sourceROW=3})),$("#x_Tablet4").click((function(){sorceEL="x_Tablet4",sourceROW=4})),$("#x_Tablet5").click((function(){sorceEL="x_Tablet5",sourceROW=5})),$("#x_Tablet6").click((function(){sorceEL="x_Tablet6",sourceROW=6})),$("#x_Tablet7").click((function(){sorceEL="x_Tablet7",sourceROW=7})),$("#x_Tablet8").click((function(){sorceEL="x_Tablet8",sourceROW=8})),$("#x_Tablet9").click((function(){sorceEL="x_Tablet9",sourceROW=9})),$("#x_Tablet10").click((function(){sorceEL="x_Tablet10",sourceROW=10})),$("#x_Tablet11").click((function(){sorceEL="x_Tablet11",sourceROW=11})),$("#x_Tablet12").click((function(){sorceEL="x_Tablet12",sourceROW=12})),$("#x_Tablet13").click((function(){sorceEL="x_Tablet13",sourceROW=13})),$("#x_Tablet14").click((function(){sorceEL="x_Tablet14",sourceROW=14})),$("#x_Tablet15").click((function(){sorceEL="x_Tablet15",sourceROW=15})),$("#x_Tablet16").click((function(){sorceEL="x_Tablet16",sourceROW=16})),$("#x_Tablet17").click((function(){sorceEL="x_Tablet17",sourceROW=17})),$("#x_Tablet18").click((function(){sorceEL="x_Tablet18",sourceROW=18})),$("#x_Tablet19").click((function(){sorceEL="x_Tablet19",sourceROW=19})),$("#x_Tablet20").click((function(){sorceEL="x_Tablet20",sourceROW=20})),$("#x_Tablet21").click((function(){sorceEL="x_Tablet21",sourceROW=21})),$("#x_Tablet22").click((function(){sorceEL="x_Tablet22",sourceROW=22})),$("#x_Tablet23").click((function(){sorceEL="x_Tablet23",sourceROW=23})),$("#x_Tablet24").click((function(){sorceEL="x_Tablet24",sourceROW=24})),$("#x_Tablet25").click((function(){sorceEL="x_Tablet25",sourceROW=25})),$("#x_Tablet1").mousedown((function(){sorceEL="x_Tablet1",sourceROW=1})),$("#x_Tablet2").mousedown((function(){sorceEL="x_Tablet2",sourceROW=2})),$("#x_Tablet3").mousedown((function(){sorceEL="x_Tablet3",sourceROW=3})),$("#x_Tablet4").mousedown((function(){sorceEL="x_Tablet4",sourceROW=4})),$("#x_Tablet5").mousedown((function(){sorceEL="x_Tablet5",sourceROW=5})),$("#x_Tablet6").mousedown((function(){sorceEL="x_Tablet6",sourceROW=6})),$("#x_Tablet7").mousedown((function(){sorceEL="x_Tablet7",sourceROW=7})),$("#x_Tablet8").mousedown((function(){sorceEL="x_Tablet8",sourceROW=8})),$("#x_Tablet9").mousedown((function(){sorceEL="x_Tablet9",sourceROW=9})),$("#x_Tablet10").mousedown((function(){sorceEL="x_Tablet10",sourceROW=10})),$("#x_Tablet11").mousedown((function(){sorceEL="x_Tablet11",sourceROW=11})),$("#x_Tablet12").mousedown((function(){sorceEL="x_Tablet12",sourceROW=12})),$("#x_Tablet13").mousedown((function(){sorceEL="x_Tablet13",sourceROW=13})),$("#x_Tablet14").mousedown((function(){sorceEL="x_Tablet14",sourceROW=14})),$("#x_Tablet15").mousedown((function(){sorceEL="x_Tablet15",sourceROW=15})),$("#x_Tablet16").mousedown((function(){sorceEL="x_Tablet16",sourceROW=16})),$("#x_Tablet17").mousedown((function(){sorceEL="x_Tablet17",sourceROW=17})),$("#x_Tablet18").mousedown((function(){sorceEL="x_Tablet18",sourceROW=18})),$("#x_Tablet19").mousedown((function(){sorceEL="x_Tablet19",sourceROW=19})),$("#x_Tablet20").mousedown((function(){sorceEL="x_Tablet20",sourceROW=20})),$("#x_Tablet21").mousedown((function(){sorceEL="x_Tablet21",sourceROW=21})),$("#x_Tablet22").mousedown((function(){sorceEL="x_Tablet22",sourceROW=22})),$("#x_Tablet23").mousedown((function(){sorceEL="x_Tablet23",sourceROW=23})),$("#x_Tablet24").mousedown((function(){sorceEL="x_Tablet24",sourceROW=24})),$("#x_Tablet25").mousedown((function(){sorceEL="x_Tablet25",sourceROW=25})),$("#x_USGLt1").mouseup((function(){mouseUPEL="x_USGLt1",mouseUPROW=1;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt2").mouseup((function(){mouseUPEL="x_USGLt2",mouseUPROW=2;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt3").mouseup((function(){mouseUPEL="x_USGLt3",mouseUPROW=3;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt4").mouseup((function(){mouseUPEL="x_USGLt4",mouseUPROW=4;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt5").mouseup((function(){mouseUPEL="x_USGLt5",mouseUPROW=5;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt6").mouseup((function(){mouseUPEL="x_USGLt6",mouseUPROW=6;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt7").mouseup((function(){mouseUPEL="x_USGLt7",mouseUPROW=7;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt8").mouseup((function(){mouseUPEL="x_USGLt8",mouseUPROW=8;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt9").mouseup((function(){mouseUPEL="x_USGLt9",mouseUPROW=9;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt10").mouseup((function(){mouseUPEL="x_USGLt10",mouseUPROW=10;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt11").mouseup((function(){mouseUPEL="x_USGLt11",mouseUPROW=11;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt12").mouseup((function(){mouseUPEL="x_USGLt12",mouseUPROW=12;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt13").mouseup((function(){mouseUPEL="x_USGLt13",mouseUPROW=13;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt14").mouseup((function(){mouseUPEL="x_USGLt14",mouseUPROW=14;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt15").mouseup((function(){mouseUPEL="x_USGLt15",mouseUPROW=15;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt16").mouseup((function(){mouseUPEL="x_USGLt16",mouseUPROW=16;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt17").mouseup((function(){mouseUPEL="x_USGLt17",mouseUPROW=17;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt18").mouseup((function(){mouseUPEL="x_USGLt18",mouseUPROW=18;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt19").mouseup((function(){mouseUPEL="x_USGLt19",mouseUPROW=19;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt20").mouseup((function(){mouseUPEL="x_USGLt20",mouseUPROW=20;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt21").mouseup((function(){mouseUPEL="x_USGLt21",mouseUPROW=21;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt22").mouseup((function(){mouseUPEL="x_USGLt22",mouseUPROW=22;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt23").mouseup((function(){mouseUPEL="x_USGLt23",mouseUPROW=23;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt24").mouseup((function(){mouseUPEL="x_USGLt24",mouseUPROW=24;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt25").mouseup((function(){mouseUPEL="x_USGLt25",mouseUPROW=25;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt1").click((function(){sorceEL="x_USGLt1",sourceROW=1})),$("#x_USGLt2").click((function(){sorceEL="x_USGLt2",sourceROW=2})),$("#x_USGLt3").click((function(){sorceEL="x_USGLt3",sourceROW=3})),$("#x_USGLt4").click((function(){sorceEL="x_USGLt4",sourceROW=4})),$("#x_USGLt5").click((function(){sorceEL="x_USGLt5",sourceROW=5})),$("#x_USGLt6").click((function(){sorceEL="x_USGLt6",sourceROW=6})),$("#x_USGLt7").click((function(){sorceEL="x_USGLt7",sourceROW=7})),$("#x_USGLt8").click((function(){sorceEL="x_USGLt8",sourceROW=8})),$("#x_USGLt9").click((function(){sorceEL="x_USGLt9",sourceROW=9})),$("#x_USGLt10").click((function(){sorceEL="x_USGLt10",sourceROW=10})),$("#x_USGLt11").click((function(){sorceEL="x_USGLt11",sourceROW=11})),$("#x_USGLt12").click((function(){sorceEL="x_USGLt12",sourceROW=12})),$("#x_USGLt13").click((function(){sorceEL="x_USGLt13",sourceROW=13})),$("#x_USGLt14").click((function(){sorceEL="x_USGLt14",sourceROW=14})),$("#x_USGLt15").click((function(){sorceEL="x_USGLt15",sourceROW=15})),$("#x_USGLt16").click((function(){sorceEL="x_USGLt16",sourceROW=16})),$("#x_USGLt17").click((function(){sorceEL="x_USGLt17",sourceROW=17})),$("#x_USGLt18").click((function(){sorceEL="x_USGLt18",sourceROW=18})),$("#x_USGLt19").click((function(){sorceEL="x_USGLt19",sourceROW=19})),$("#x_USGLt20").click((function(){sorceEL="x_USGLt20",sourceROW=20})),$("#x_USGLt21").click((function(){sorceEL="x_USGLt21",sourceROW=21})),$("#x_USGLt22").click((function(){sorceEL="x_USGLt22",sourceROW=22})),$("#x_USGLt23").click((function(){sorceEL="x_USGLt23",sourceROW=23})),$("#x_USGLt24").click((function(){sorceEL="x_USGLt24",sourceROW=24})),$("#x_USGLt25").click((function(){sorceEL="x_USGLt25",sourceROW=25})),$("#x_USGLt1").mousedown((function(){sorceEL="x_USGLt1",sourceROW=1})),$("#x_USGLt2").mousedown((function(){sorceEL="x_USGLt2",sourceROW=2})),$("#x_USGLt3").mousedown((function(){sorceEL="x_USGLt3",sourceROW=3})),$("#x_USGLt4").mousedown((function(){sorceEL="x_USGLt4",sourceROW=4})),$("#x_USGLt5").mousedown((function(){sorceEL="x_USGLt5",sourceROW=5})),$("#x_USGLt6").mousedown((function(){sorceEL="x_USGLt6",sourceROW=6})),$("#x_USGLt7").mousedown((function(){sorceEL="x_USGLt7",sourceROW=7})),$("#x_USGLt8").mousedown((function(){sorceEL="x_USGLt8",sourceROW=8})),$("#x_USGLt9").mousedown((function(){sorceEL="x_USGLt9",sourceROW=9})),$("#x_USGLt10").mousedown((function(){sorceEL="x_USGLt10",sourceROW=10})),$("#x_USGLt11").mousedown((function(){sorceEL="x_USGLt11",sourceROW=11})),$("#x_USGLt12").mousedown((function(){sorceEL="x_USGLt12",sourceROW=12})),$("#x_USGLt13").mousedown((function(){sorceEL="x_USGLt13",sourceROW=13})),$("#x_USGLt14").mousedown((function(){sorceEL="x_USGLt14",sourceROW=14})),$("#x_USGLt15").mousedown((function(){sorceEL="x_USGLt15",sourceROW=15})),$("#x_USGLt16").mousedown((function(){sorceEL="x_USGLt16",sourceROW=16})),$("#x_USGLt17").mousedown((function(){sorceEL="x_USGLt17",sourceROW=17})),$("#x_USGLt18").mousedown((function(){sorceEL="x_USGLt18",sourceROW=18})),$("#x_USGLt19").mousedown((function(){sorceEL="x_USGLt19",sourceROW=19})),$("#x_USGLt20").mousedown((function(){sorceEL="x_USGLt20",sourceROW=20})),$("#x_USGLt21").mousedown((function(){sorceEL="x_USGLt21",sourceROW=21})),$("#x_USGLt22").mousedown((function(){sorceEL="x_USGLt22",sourceROW=22})),$("#x_USGLt23").mousedown((function(){sorceEL="x_USGLt23",sourceROW=23})),$("#x_USGLt24").mousedown((function(){sorceEL="x_USGLt24",sourceROW=24})),$("#x_USGLt25").mousedown((function(){sorceEL="x_USGLt25",sourceROW=25})),$("#x_EM1").mouseup((function(){mouseUPEL="x_EM1",mouseUPROW=1;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM2").mouseup((function(){mouseUPEL="x_EM2",mouseUPROW=2;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM3").mouseup((function(){mouseUPEL="x_EM3",mouseUPROW=3;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM4").mouseup((function(){mouseUPEL="x_EM4",mouseUPROW=4;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM5").mouseup((function(){mouseUPEL="x_EM5",mouseUPROW=5;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM6").mouseup((function(){mouseUPEL="x_EM6",mouseUPROW=6;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM7").mouseup((function(){mouseUPEL="x_EM7",mouseUPROW=7;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM8").mouseup((function(){mouseUPEL="x_EM8",mouseUPROW=8;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM9").mouseup((function(){mouseUPEL="x_EM9",mouseUPROW=9;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM10").mouseup((function(){mouseUPEL="x_EM10",mouseUPROW=10;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM11").mouseup((function(){mouseUPEL="x_EM11",mouseUPROW=11;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM12").mouseup((function(){mouseUPEL="x_EM12",mouseUPROW=12;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM13").mouseup((function(){mouseUPEL="x_EM13",mouseUPROW=13;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM14").mouseup((function(){mouseUPEL="x_EM14",mouseUPROW=14;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM15").mouseup((function(){mouseUPEL="x_EM15",mouseUPROW=15;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM16").mouseup((function(){mouseUPEL="x_EM16",mouseUPROW=16;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM17").mouseup((function(){mouseUPEL="x_EM17",mouseUPROW=17;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM18").mouseup((function(){mouseUPEL="x_EM18",mouseUPROW=18;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM19").mouseup((function(){mouseUPEL="x_EM19",mouseUPROW=19;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM20").mouseup((function(){mouseUPEL="x_EM20",mouseUPROW=20;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM21").mouseup((function(){mouseUPEL="x_EM21",mouseUPROW=21;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM22").mouseup((function(){mouseUPEL="x_EM22",mouseUPROW=22;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM23").mouseup((function(){mouseUPEL="x_EM23",mouseUPROW=23;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM24").mouseup((function(){mouseUPEL="x_EM24",mouseUPROW=24;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM25").mouseup((function(){mouseUPEL="x_EM25",mouseUPROW=25;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM1").click((function(){sorceEL="x_EM1",sourceROW=1})),$("#x_EM2").click((function(){sorceEL="x_EM2",sourceROW=2})),$("#x_EM3").click((function(){sorceEL="x_EM3",sourceROW=3})),$("#x_EM4").click((function(){sorceEL="x_EM4",sourceROW=4})),$("#x_EM5").click((function(){sorceEL="x_EM5",sourceROW=5})),$("#x_EM6").click((function(){sorceEL="x_EM6",sourceROW=6})),$("#x_EM7").click((function(){sorceEL="x_EM7",sourceROW=7})),$("#x_EM8").click((function(){sorceEL="x_EM8",sourceROW=8})),$("#x_EM9").click((function(){sorceEL="x_EM9",sourceROW=9})),$("#x_EM10").click((function(){sorceEL="x_EM10",sourceROW=10})),$("#x_EM11").click((function(){sorceEL="x_EM11",sourceROW=11})),$("#x_EM12").click((function(){sorceEL="x_EM12",sourceROW=12})),$("#x_EM13").click((function(){sorceEL="x_EM13",sourceROW=13})),$("#x_EM14").click((function(){sorceEL="x_EM14",sourceROW=14})),$("#x_EM15").click((function(){sorceEL="x_EM15",sourceROW=15})),$("#x_EM16").click((function(){sorceEL="x_EM16",sourceROW=16})),$("#x_EM17").click((function(){sorceEL="x_EM17",sourceROW=17})),$("#x_EM18").click((function(){sorceEL="x_EM18",sourceROW=18})),$("#x_EM19").click((function(){sorceEL="x_EM19",sourceROW=19})),$("#x_EM20").click((function(){sorceEL="x_EM20",sourceROW=20})),$("#x_EM21").click((function(){sorceEL="x_EM21",sourceROW=21})),$("#x_EM22").click((function(){sorceEL="x_EM22",sourceROW=22})),$("#x_EM23").click((function(){sorceEL="x_EM23",sourceROW=23})),$("#x_EM24").click((function(){sorceEL="x_EM24",sourceROW=24})),$("#x_EM25").click((function(){sorceEL="x_EM25",sourceROW=25})),$("#x_EM1").mousedown((function(){sorceEL="x_EM1",sourceROW=1})),$("#x_EM2").mousedown((function(){sorceEL="x_EM2",sourceROW=2})),$("#x_EM3").mousedown((function(){sorceEL="x_EM3",sourceROW=3})),$("#x_EM4").mousedown((function(){sorceEL="x_EM4",sourceROW=4})),$("#x_EM5").mousedown((function(){sorceEL="x_EM5",sourceROW=5})),$("#x_EM6").mousedown((function(){sorceEL="x_EM6",sourceROW=6})),$("#x_EM7").mousedown((function(){sorceEL="x_EM7",sourceROW=7})),$("#x_EM8").mousedown((function(){sorceEL="x_EM8",sourceROW=8})),$("#x_EM9").mousedown((function(){sorceEL="x_EM9",sourceROW=9})),$("#x_EM10").mousedown((function(){sorceEL="x_EM10",sourceROW=10})),$("#x_EM11").mousedown((function(){sorceEL="x_EM11",sourceROW=11})),$("#x_EM12").mousedown((function(){sorceEL="x_EM12",sourceROW=12})),$("#x_EM13").mousedown((function(){sorceEL="x_EM13",sourceROW=13})),$("#x_EM14").mousedown((function(){sorceEL="x_EM14",sourceROW=14})),$("#x_EM15").mousedown((function(){sorceEL="x_EM15",sourceROW=15})),$("#x_EM16").mousedown((function(){sorceEL="x_EM16",sourceROW=16})),$("#x_EM17").mousedown((function(){sorceEL="x_EM17",sourceROW=17})),$("#x_EM18").mousedown((function(){sorceEL="x_EM18",sourceROW=18})),$("#x_EM19").mousedown((function(){sorceEL="x_EM19",sourceROW=19})),$("#x_EM20").mousedown((function(){sorceEL="x_EM20",sourceROW=20})),$("#x_EM21").mousedown((function(){sorceEL="x_EM21",sourceROW=21})),$("#x_EM22").mousedown((function(){sorceEL="x_EM22",sourceROW=22})),$("#x_EM23").mousedown((function(){sorceEL="x_EM23",sourceROW=23})),$("#x_EM24").mousedown((function(){sorceEL="x_EM24",sourceROW=24})),$("#x_EM25").mousedown((function(){sorceEL="x_EM25",sourceROW=25})),$("#x_Others1").mouseup((function(){mouseUPEL="x_Others1",mouseUPROW=1;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others2").mouseup((function(){mouseUPEL="x_Others2",mouseUPROW=2;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others3").mouseup((function(){mouseUPEL="x_Others3",mouseUPROW=3;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others4").mouseup((function(){mouseUPEL="x_Others4",mouseUPROW=4;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others5").mouseup((function(){mouseUPEL="x_Others5",mouseUPROW=5;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others6").mouseup((function(){mouseUPEL="x_Others6",mouseUPROW=6;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others7").mouseup((function(){mouseUPEL="x_Others7",mouseUPROW=7;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others8").mouseup((function(){mouseUPEL="x_Others8",mouseUPROW=8;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others9").mouseup((function(){mouseUPEL="x_Others9",mouseUPROW=9;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others10").mouseup((function(){mouseUPEL="x_Others10",mouseUPROW=10;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others11").mouseup((function(){mouseUPEL="x_Others11",mouseUPROW=11;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others12").mouseup((function(){mouseUPEL="x_Others12",mouseUPROW=12;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others13").mouseup((function(){mouseUPEL="x_Others13",mouseUPROW=13;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others14").mouseup((function(){mouseUPEL="x_Others14",mouseUPROW=14;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others15").mouseup((function(){mouseUPEL="x_Others15",mouseUPROW=15;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others16").mouseup((function(){mouseUPEL="x_Others16",mouseUPROW=16;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others17").mouseup((function(){mouseUPEL="x_Others17",mouseUPROW=17;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others18").mouseup((function(){mouseUPEL="x_Others18",mouseUPROW=18;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others19").mouseup((function(){mouseUPEL="x_Others19",mouseUPROW=19;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others20").mouseup((function(){mouseUPEL="x_Others20",mouseUPROW=20;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others21").mouseup((function(){mouseUPEL="x_Others21",mouseUPROW=21;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others22").mouseup((function(){mouseUPEL="x_Others22",mouseUPROW=22;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others23").mouseup((function(){mouseUPEL="x_Others23",mouseUPROW=23;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others24").mouseup((function(){mouseUPEL="x_Others24",mouseUPROW=24;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others25").mouseup((function(){mouseUPEL="x_Others25",mouseUPROW=25;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others1").click((function(){sorceEL="x_Others1",sourceROW=1})),$("#x_Others2").click((function(){sorceEL="x_Others2",sourceROW=2})),$("#x_Others3").click((function(){sorceEL="x_Others3",sourceROW=3})),$("#x_Others4").click((function(){sorceEL="x_Others4",sourceROW=4})),$("#x_Others5").click((function(){sorceEL="x_Others5",sourceROW=5})),$("#x_Others6").click((function(){sorceEL="x_Others6",sourceROW=6})),$("#x_Others7").click((function(){sorceEL="x_Others7",sourceROW=7})),$("#x_Others8").click((function(){sorceEL="x_Others8",sourceROW=8})),$("#x_Others9").click((function(){sorceEL="x_Others9",sourceROW=9})),$("#x_Others10").click((function(){sorceEL="x_Others10",sourceROW=10})),$("#x_Others11").click((function(){sorceEL="x_Others11",sourceROW=11})),$("#x_Others12").click((function(){sorceEL="x_Others12",sourceROW=12})),$("#x_Others13").click((function(){sorceEL="x_Others13",sourceROW=13})),$("#x_Others14").click((function(){sorceEL="x_Others14",sourceROW=14})),$("#x_Others15").click((function(){sorceEL="x_Others15",sourceROW=15})),$("#x_Others16").click((function(){sorceEL="x_Others16",sourceROW=16})),$("#x_Others17").click((function(){sorceEL="x_Others17",sourceROW=17})),$("#x_Others18").click((function(){sorceEL="x_Others18",sourceROW=18})),$("#x_Others19").click((function(){sorceEL="x_Others19",sourceROW=19})),$("#x_Others20").click((function(){sorceEL="x_Others20",sourceROW=20})),$("#x_Others21").click((function(){sorceEL="x_Others21",sourceROW=21})),$("#x_Others22").click((function(){sorceEL="x_Others22",sourceROW=22})),$("#x_Others23").click((function(){sorceEL="x_Others23",sourceROW=23})),$("#x_Others24").click((function(){sorceEL="x_Others24",sourceROW=24})),$("#x_Others25").click((function(){sorceEL="x_Others25",sourceROW=25})),$("#x_Others1").mousedown((function(){sorceEL="x_Others1",sourceROW=1})),$("#x_Others2").mousedown((function(){sorceEL="x_Others2",sourceROW=2})),$("#x_Others3").mousedown((function(){sorceEL="x_Others3",sourceROW=3})),$("#x_Others4").mousedown((function(){sorceEL="x_Others4",sourceROW=4})),$("#x_Others5").mousedown((function(){sorceEL="x_Others5",sourceROW=5})),$("#x_Others6").mousedown((function(){sorceEL="x_Others6",sourceROW=6})),$("#x_Others7").mousedown((function(){sorceEL="x_Others7",sourceROW=7})),$("#x_Others8").mousedown((function(){sorceEL="x_Others8",sourceROW=8})),$("#x_Others9").mousedown((function(){sorceEL="x_Others9",sourceROW=9})),$("#x_Others10").mousedown((function(){sorceEL="x_Others10",sourceROW=10})),$("#x_Others11").mousedown((function(){sorceEL="x_Others11",sourceROW=11})),$("#x_Others12").mousedown((function(){sorceEL="x_Others12",sourceROW=12})),$("#x_Others13").mousedown((function(){sorceEL="x_Others13",sourceROW=13})),$("#x_Others14").mousedown((function(){sorceEL="x_Others14",sourceROW=14})),$("#x_Others15").mousedown((function(){sorceEL="x_Others15",sourceROW=15})),$("#x_Others16").mousedown((function(){sorceEL="x_Others16",sourceROW=16})),$("#x_Others17").mousedown((function(){sorceEL="x_Others17",sourceROW=17})),$("#x_Others18").mousedown((function(){sorceEL="x_Others18",sourceROW=18})),$("#x_Others19").mousedown((function(){sorceEL="x_Others19",sourceROW=19})),$("#x_Others20").mousedown((function(){sorceEL="x_Others20",sourceROW=20})),$("#x_Others21").mousedown((function(){sorceEL="x_Others21",sourceROW=21})),$("#x_Others22").mousedown((function(){sorceEL="x_Others22",sourceROW=22})),$("#x_Others23").mousedown((function(){sorceEL="x_Others23",sourceROW=23})),$("#x_Others24").mousedown((function(){sorceEL="x_Others24",sourceROW=24})),$("#x_Others25").mousedown((function(){sorceEL="x_Others25",sourceROW=25})),$("#x_DR1").mouseup((function(){mouseUPEL="x_DR1",mouseUPROW=1;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR2").mouseup((function(){mouseUPEL="x_DR2",mouseUPROW=2;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR3").mouseup((function(){mouseUPEL="x_DR3",mouseUPROW=3;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR4").mouseup((function(){mouseUPEL="x_DR4",mouseUPROW=4;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR5").mouseup((function(){mouseUPEL="x_DR5",mouseUPROW=5;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR6").mouseup((function(){mouseUPEL="x_DR6",mouseUPROW=6;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR7").mouseup((function(){mouseUPEL="x_DR7",mouseUPROW=7;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR8").mouseup((function(){mouseUPEL="x_DR8",mouseUPROW=8;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR9").mouseup((function(){mouseUPEL="x_DR9",mouseUPROW=9;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR10").mouseup((function(){mouseUPEL="x_DR10",mouseUPROW=10;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR11").mouseup((function(){mouseUPEL="x_DR11",mouseUPROW=11;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR12").mouseup((function(){mouseUPEL="x_DR12",mouseUPROW=12;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR13").mouseup((function(){mouseUPEL="x_DR13",mouseUPROW=13;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR14").mouseup((function(){mouseUPEL="x_DR14",mouseUPROW=14;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR15").mouseup((function(){mouseUPEL="x_DR15",mouseUPROW=15;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR16").mouseup((function(){mouseUPEL="x_DR16",mouseUPROW=16;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR17").mouseup((function(){mouseUPEL="x_DR17",mouseUPROW=17;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR18").mouseup((function(){mouseUPEL="x_DR18",mouseUPROW=18;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR19").mouseup((function(){mouseUPEL="x_DR19",mouseUPROW=19;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR20").mouseup((function(){mouseUPEL="x_DR20",mouseUPROW=20;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR21").mouseup((function(){mouseUPEL="x_DR21",mouseUPROW=21;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR22").mouseup((function(){mouseUPEL="x_DR22",mouseUPROW=22;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR23").mouseup((function(){mouseUPEL="x_DR23",mouseUPROW=23;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR24").mouseup((function(){mouseUPEL="x_DR24",mouseUPROW=24;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR25").mouseup((function(){mouseUPEL="x_DR25",mouseUPROW=25;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR1").click((function(){sorceEL="x_DR1",sourceROW=1})),$("#x_DR2").click((function(){sorceEL="x_DR2",sourceROW=2})),$("#x_DR3").click((function(){sorceEL="x_DR3",sourceROW=3})),$("#x_DR4").click((function(){sorceEL="x_DR4",sourceROW=4})),$("#x_DR5").click((function(){sorceEL="x_DR5",sourceROW=5})),$("#x_DR6").click((function(){sorceEL="x_DR6",sourceROW=6})),$("#x_DR7").click((function(){sorceEL="x_DR7",sourceROW=7})),$("#x_DR8").click((function(){sorceEL="x_DR8",sourceROW=8})),$("#x_DR9").click((function(){sorceEL="x_DR9",sourceROW=9})),$("#x_DR10").click((function(){sorceEL="x_DR10",sourceROW=10})),$("#x_DR11").click((function(){sorceEL="x_DR11",sourceROW=11})),$("#x_DR12").click((function(){sorceEL="x_DR12",sourceROW=12})),$("#x_DR13").click((function(){sorceEL="x_DR13",sourceROW=13})),$("#x_DR14").click((function(){sorceEL="x_DR14",sourceROW=14})),$("#x_DR15").click((function(){sorceEL="x_DR15",sourceROW=15})),$("#x_DR16").click((function(){sorceEL="x_DR16",sourceROW=16})),$("#x_DR17").click((function(){sorceEL="x_DR17",sourceROW=17})),$("#x_DR18").click((function(){sorceEL="x_DR18",sourceROW=18})),$("#x_DR19").click((function(){sorceEL="x_DR19",sourceROW=19})),$("#x_DR20").click((function(){sorceEL="x_DR20",sourceROW=20})),$("#x_DR21").click((function(){sorceEL="x_DR21",sourceROW=21})),$("#x_DR22").click((function(){sorceEL="x_DR22",sourceROW=22})),$("#x_DR23").click((function(){sorceEL="x_DR23",sourceROW=23})),$("#x_DR24").click((function(){sorceEL="x_DR24",sourceROW=24})),$("#x_DR25").click((function(){sorceEL="x_DR25",sourceROW=25})),$("#x_DR1").mousedown((function(){sorceEL="x_DR1",sourceROW=1})),$("#x_DR2").mousedown((function(){sorceEL="x_DR2",sourceROW=2})),$("#x_DR3").mousedown((function(){sorceEL="x_DR3",sourceROW=3})),$("#x_DR4").mousedown((function(){sorceEL="x_DR4",sourceROW=4})),$("#x_DR5").mousedown((function(){sorceEL="x_DR5",sourceROW=5})),$("#x_DR6").mousedown((function(){sorceEL="x_DR6",sourceROW=6})),$("#x_DR7").mousedown((function(){sorceEL="x_DR7",sourceROW=7})),$("#x_DR8").mousedown((function(){sorceEL="x_DR8",sourceROW=8})),$("#x_DR9").mousedown((function(){sorceEL="x_DR9",sourceROW=9})),$("#x_DR10").mousedown((function(){sorceEL="x_DR10",sourceROW=10})),$("#x_DR11").mousedown((function(){sorceEL="x_DR11",sourceROW=11})),$("#x_DR12").mousedown((function(){sorceEL="x_DR12",sourceROW=12})),$("#x_DR13").mousedown((function(){sorceEL="x_DR13",sourceROW=13})),$("#x_DR14").mousedown((function(){sorceEL="x_DR14",sourceROW=14})),$("#x_DR15").mousedown((function(){sorceEL="x_DR15",sourceROW=15})),$("#x_DR16").mousedown((function(){sorceEL="x_DR16",sourceROW=16})),$("#x_DR17").mousedown((function(){sorceEL="x_DR17",sourceROW=17})),$("#x_DR18").mousedown((function(){sorceEL="x_DR18",sourceROW=18})),$("#x_DR19").mousedown((function(){sorceEL="x_DR19",sourceROW=19})),$("#x_DR20").mousedown((function(){sorceEL="x_DR20",sourceROW=20})),$("#x_DR21").mousedown((function(){sorceEL="x_DR21",sourceROW=21})),$("#x_DR22").mousedown((function(){sorceEL="x_DR22",sourceROW=22})),$("#x_DR23").mousedown((function(){sorceEL="x_DR23",sourceROW=23})),$("#x_DR24").mousedown((function(){sorceEL="x_DR24",sourceROW=24})),$("#x_DR25").mousedown((function(){sorceEL="x_DR25",sourceROW=25})),$("#x_RFSH1").mouseup((function(){mouseUPEL="x_RFSH1",mouseUPROW=1;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH2").mouseup((function(){mouseUPEL="x_RFSH2",mouseUPROW=2;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH3").mouseup((function(){mouseUPEL="x_RFSH3",mouseUPROW=3;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH4").mouseup((function(){mouseUPEL="x_RFSH4",mouseUPROW=4;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH5").mouseup((function(){mouseUPEL="x_RFSH5",mouseUPROW=5;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH6").mouseup((function(){mouseUPEL="x_RFSH6",mouseUPROW=6;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH7").mouseup((function(){mouseUPEL="x_RFSH7",mouseUPROW=7;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH8").mouseup((function(){mouseUPEL="x_RFSH8",mouseUPROW=8;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH9").mouseup((function(){mouseUPEL="x_RFSH9",mouseUPROW=9;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH10").mouseup((function(){mouseUPEL="x_RFSH10",mouseUPROW=10;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH11").mouseup((function(){mouseUPEL="x_RFSH11",mouseUPROW=11;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH12").mouseup((function(){mouseUPEL="x_RFSH12",mouseUPROW=12;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH13").mouseup((function(){mouseUPEL="x_RFSH13",mouseUPROW=13;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH14").mouseup((function(){mouseUPEL="x_RFSH14",mouseUPROW=14;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH15").mouseup((function(){mouseUPEL="x_RFSH15",mouseUPROW=15;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH16").mouseup((function(){mouseUPEL="x_RFSH16",mouseUPROW=16;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH17").mouseup((function(){mouseUPEL="x_RFSH17",mouseUPROW=17;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH18").mouseup((function(){mouseUPEL="x_RFSH18",mouseUPROW=18;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH19").mouseup((function(){mouseUPEL="x_RFSH19",mouseUPROW=19;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH20").mouseup((function(){mouseUPEL="x_RFSH20",mouseUPROW=20;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH21").mouseup((function(){mouseUPEL="x_RFSH21",mouseUPROW=21;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH22").mouseup((function(){mouseUPEL="x_RFSH22",mouseUPROW=22;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH23").mouseup((function(){mouseUPEL="x_RFSH23",mouseUPROW=23;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH24").mouseup((function(){mouseUPEL="x_RFSH24",mouseUPROW=24;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH25").mouseup((function(){mouseUPEL="x_RFSH25",mouseUPROW=25;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH1").click((function(){sorceEL="x_RFSH1",sourceROW=1})),$("#x_RFSH2").click((function(){sorceEL="x_RFSH2",sourceROW=2})),$("#x_RFSH3").click((function(){sorceEL="x_RFSH3",sourceROW=3})),$("#x_RFSH4").click((function(){sorceEL="x_RFSH4",sourceROW=4})),$("#x_RFSH5").click((function(){sorceEL="x_RFSH5",sourceROW=5})),$("#x_RFSH6").click((function(){sorceEL="x_RFSH6",sourceROW=6})),$("#x_RFSH7").click((function(){sorceEL="x_RFSH7",sourceROW=7})),$("#x_RFSH8").click((function(){sorceEL="x_RFSH8",sourceROW=8})),$("#x_RFSH9").click((function(){sorceEL="x_RFSH9",sourceROW=9})),$("#x_RFSH10").click((function(){sorceEL="x_RFSH10",sourceROW=10})),$("#x_RFSH11").click((function(){sorceEL="x_RFSH11",sourceROW=11})),$("#x_RFSH12").click((function(){sorceEL="x_RFSH12",sourceROW=12})),$("#x_RFSH13").click((function(){sorceEL="x_RFSH13",sourceROW=13})),$("#x_RFSH14").click((function(){sorceEL="x_RFSH14",sourceROW=14})),$("#x_RFSH15").click((function(){sorceEL="x_RFSH15",sourceROW=15})),$("#x_RFSH16").click((function(){sorceEL="x_RFSH16",sourceROW=16})),$("#x_RFSH17").click((function(){sorceEL="x_RFSH17",sourceROW=17})),$("#x_RFSH18").click((function(){sorceEL="x_RFSH18",sourceROW=18})),$("#x_RFSH19").click((function(){sorceEL="x_RFSH19",sourceROW=19})),$("#x_RFSH20").click((function(){sorceEL="x_RFSH20",sourceROW=20})),$("#x_RFSH21").click((function(){sorceEL="x_RFSH21",sourceROW=21})),$("#x_RFSH22").click((function(){sorceEL="x_RFSH22",sourceROW=22})),$("#x_RFSH23").click((function(){sorceEL="x_RFSH23",sourceROW=23})),$("#x_RFSH24").click((function(){sorceEL="x_RFSH24",sourceROW=24})),$("#x_RFSH25").click((function(){sorceEL="x_RFSH25",sourceROW=25})),$("#x_RFSH1").mousedown((function(){sorceEL="x_RFSH1",sourceROW=1})),$("#x_RFSH2").mousedown((function(){sorceEL="x_RFSH2",sourceROW=2})),$("#x_RFSH3").mousedown((function(){sorceEL="x_RFSH3",sourceROW=3})),$("#x_RFSH4").mousedown((function(){sorceEL="x_RFSH4",sourceROW=4})),$("#x_RFSH5").mousedown((function(){sorceEL="x_RFSH5",sourceROW=5})),$("#x_RFSH6").mousedown((function(){sorceEL="x_RFSH6",sourceROW=6})),$("#x_RFSH7").mousedown((function(){sorceEL="x_RFSH7",sourceROW=7})),$("#x_RFSH8").mousedown((function(){sorceEL="x_RFSH8",sourceROW=8})),$("#x_RFSH9").mousedown((function(){sorceEL="x_RFSH9",sourceROW=9})),$("#x_RFSH10").mousedown((function(){sorceEL="x_RFSH10",sourceROW=10})),$("#x_RFSH11").mousedown((function(){sorceEL="x_RFSH11",sourceROW=11})),$("#x_RFSH12").mousedown((function(){sorceEL="x_RFSH12",sourceROW=12})),$("#x_RFSH13").mousedown((function(){sorceEL="x_RFSH13",sourceROW=13})),$("#x_RFSH14").mousedown((function(){sorceEL="x_RFSH14",sourceROW=14})),$("#x_RFSH15").mousedown((function(){sorceEL="x_RFSH15",sourceROW=15})),$("#x_RFSH16").mousedown((function(){sorceEL="x_RFSH16",sourceROW=16})),$("#x_RFSH17").mousedown((function(){sorceEL="x_RFSH17",sourceROW=17})),$("#x_RFSH18").mousedown((function(){sorceEL="x_RFSH18",sourceROW=18})),$("#x_RFSH19").mousedown((function(){sorceEL="x_RFSH19",sourceROW=19})),$("#x_RFSH20").mousedown((function(){sorceEL="x_RFSH20",sourceROW=20})),$("#x_RFSH21").mousedown((function(){sorceEL="x_RFSH21",sourceROW=21})),$("#x_RFSH22").mousedown((function(){sorceEL="x_RFSH22",sourceROW=22})),$("#x_RFSH23").mousedown((function(){sorceEL="x_RFSH23",sourceROW=23})),$("#x_RFSH24").mousedown((function(){sorceEL="x_RFSH24",sourceROW=24})),$("#x_RFSH25").mousedown((function(){sorceEL="x_RFSH25",sourceROW=25})),$("#x_HMG1").mouseup((function(){mouseUPEL="x_HMG1",mouseUPROW=1;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG2").mouseup((function(){mouseUPEL="x_HMG2",mouseUPROW=2;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG3").mouseup((function(){mouseUPEL="x_HMG3",mouseUPROW=3;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG4").mouseup((function(){mouseUPEL="x_HMG4",mouseUPROW=4;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG5").mouseup((function(){mouseUPEL="x_HMG5",mouseUPROW=5;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG6").mouseup((function(){mouseUPEL="x_HMG6",mouseUPROW=6;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG7").mouseup((function(){mouseUPEL="x_HMG7",mouseUPROW=7;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG8").mouseup((function(){mouseUPEL="x_HMG8",mouseUPROW=8;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG9").mouseup((function(){mouseUPEL="x_HMG9",mouseUPROW=9;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG10").mouseup((function(){mouseUPEL="x_HMG10",mouseUPROW=10;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG11").mouseup((function(){mouseUPEL="x_HMG11",mouseUPROW=11;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG12").mouseup((function(){mouseUPEL="x_HMG12",mouseUPROW=12;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG13").mouseup((function(){mouseUPEL="x_HMG13",mouseUPROW=13;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG14").mouseup((function(){mouseUPEL="x_HMG14",mouseUPROW=14;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG15").mouseup((function(){mouseUPEL="x_HMG15",mouseUPROW=15;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG16").mouseup((function(){mouseUPEL="x_HMG16",mouseUPROW=16;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG17").mouseup((function(){mouseUPEL="x_HMG17",mouseUPROW=17;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG18").mouseup((function(){mouseUPEL="x_HMG18",mouseUPROW=18;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG19").mouseup((function(){mouseUPEL="x_HMG19",mouseUPROW=19;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG20").mouseup((function(){mouseUPEL="x_HMG20",mouseUPROW=20;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG21").mouseup((function(){mouseUPEL="x_HMG21",mouseUPROW=21;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG22").mouseup((function(){mouseUPEL="x_HMG22",mouseUPROW=22;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG23").mouseup((function(){mouseUPEL="x_HMG23",mouseUPROW=23;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG24").mouseup((function(){mouseUPEL="x_HMG24",mouseUPROW=24;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG25").mouseup((function(){mouseUPEL="x_HMG25",mouseUPROW=25;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG1").click((function(){sorceEL="x_HMG1",sourceROW=1})),$("#x_HMG2").click((function(){sorceEL="x_HMG2",sourceROW=2})),$("#x_HMG3").click((function(){sorceEL="x_HMG3",sourceROW=3})),$("#x_HMG4").click((function(){sorceEL="x_HMG4",sourceROW=4})),$("#x_HMG5").click((function(){sorceEL="x_HMG5",sourceROW=5})),$("#x_HMG6").click((function(){sorceEL="x_HMG6",sourceROW=6})),$("#x_HMG7").click((function(){sorceEL="x_HMG7",sourceROW=7})),$("#x_HMG8").click((function(){sorceEL="x_HMG8",sourceROW=8})),$("#x_HMG9").click((function(){sorceEL="x_HMG9",sourceROW=9})),$("#x_HMG10").click((function(){sorceEL="x_HMG10",sourceROW=10})),$("#x_HMG11").click((function(){sorceEL="x_HMG11",sourceROW=11})),$("#x_HMG12").click((function(){sorceEL="x_HMG12",sourceROW=12})),$("#x_HMG13").click((function(){sorceEL="x_HMG13",sourceROW=13})),$("#x_HMG14").click((function(){sorceEL="x_HMG14",sourceROW=14})),$("#x_HMG15").click((function(){sorceEL="x_HMG15",sourceROW=15})),$("#x_HMG16").click((function(){sorceEL="x_HMG16",sourceROW=16})),$("#x_HMG17").click((function(){sorceEL="x_HMG17",sourceROW=17})),$("#x_HMG18").click((function(){sorceEL="x_HMG18",sourceROW=18})),$("#x_HMG19").click((function(){sorceEL="x_HMG19",sourceROW=19})),$("#x_HMG20").click((function(){sorceEL="x_HMG20",sourceROW=20})),$("#x_HMG21").click((function(){sorceEL="x_HMG21",sourceROW=21})),$("#x_HMG22").click((function(){sorceEL="x_HMG22",sourceROW=22})),$("#x_HMG23").click((function(){sorceEL="x_HMG23",sourceROW=23})),$("#x_HMG24").click((function(){sorceEL="x_HMG24",sourceROW=24})),$("#x_HMG25").click((function(){sorceEL="x_HMG25",sourceROW=25})),$("#x_HMG1").mousedown((function(){sorceEL="x_HMG1",sourceROW=1})),$("#x_HMG2").mousedown((function(){sorceEL="x_HMG2",sourceROW=2})),$("#x_HMG3").mousedown((function(){sorceEL="x_HMG3",sourceROW=3})),$("#x_HMG4").mousedown((function(){sorceEL="x_HMG4",sourceROW=4})),$("#x_HMG5").mousedown((function(){sorceEL="x_HMG5",sourceROW=5})),$("#x_HMG6").mousedown((function(){sorceEL="x_HMG6",sourceROW=6})),$("#x_HMG7").mousedown((function(){sorceEL="x_HMG7",sourceROW=7})),$("#x_HMG8").mousedown((function(){sorceEL="x_HMG8",sourceROW=8})),$("#x_HMG9").mousedown((function(){sorceEL="x_HMG9",sourceROW=9})),$("#x_HMG10").mousedown((function(){sorceEL="x_HMG10",sourceROW=10})),$("#x_HMG11").mousedown((function(){sorceEL="x_HMG11",sourceROW=11})),$("#x_HMG12").mousedown((function(){sorceEL="x_HMG12",sourceROW=12})),$("#x_HMG13").mousedown((function(){sorceEL="x_HMG13",sourceROW=13})),$("#x_HMG14").mousedown((function(){sorceEL="x_HMG14",sourceROW=14})),$("#x_HMG15").mousedown((function(){sorceEL="x_HMG15",sourceROW=15})),$("#x_HMG16").mousedown((function(){sorceEL="x_HMG16",sourceROW=16})),$("#x_HMG17").mousedown((function(){sorceEL="x_HMG17",sourceROW=17})),$("#x_HMG18").mousedown((function(){sorceEL="x_HMG18",sourceROW=18})),$("#x_HMG19").mousedown((function(){sorceEL="x_HMG19",sourceROW=19})),$("#x_HMG20").mousedown((function(){sorceEL="x_HMG20",sourceROW=20})),$("#x_HMG21").mousedown((function(){sorceEL="x_HMG21",sourceROW=21})),$("#x_HMG22").mousedown((function(){sorceEL="x_HMG22",sourceROW=22})),$("#x_HMG23").mousedown((function(){sorceEL="x_HMG23",sourceROW=23})),$("#x_HMG24").mousedown((function(){sorceEL="x_HMG24",sourceROW=24})),$("#x_HMG25").mousedown((function(){sorceEL="x_HMG25",sourceROW=25})),$("#x_GnRH1").mouseup((function(){mouseUPEL="x_GnRH1",mouseUPROW=1;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH2").mouseup((function(){mouseUPEL="x_GnRH2",mouseUPROW=2;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH3").mouseup((function(){mouseUPEL="x_GnRH3",mouseUPROW=3;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH4").mouseup((function(){mouseUPEL="x_GnRH4",mouseUPROW=4;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH5").mouseup((function(){mouseUPEL="x_GnRH5",mouseUPROW=5;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH6").mouseup((function(){mouseUPEL="x_GnRH6",mouseUPROW=6;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH7").mouseup((function(){mouseUPEL="x_GnRH7",mouseUPROW=7;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH8").mouseup((function(){mouseUPEL="x_GnRH8",mouseUPROW=8;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH9").mouseup((function(){mouseUPEL="x_GnRH9",mouseUPROW=9;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH10").mouseup((function(){mouseUPEL="x_GnRH10",mouseUPROW=10;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH11").mouseup((function(){mouseUPEL="x_GnRH11",mouseUPROW=11;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH12").mouseup((function(){mouseUPEL="x_GnRH12",mouseUPROW=12;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH13").mouseup((function(){mouseUPEL="x_GnRH13",mouseUPROW=13;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH14").mouseup((function(){mouseUPEL="x_GnRH14",mouseUPROW=14;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH15").mouseup((function(){mouseUPEL="x_GnRH15",mouseUPROW=15;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH16").mouseup((function(){mouseUPEL="x_GnRH16",mouseUPROW=16;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH17").mouseup((function(){mouseUPEL="x_GnRH17",mouseUPROW=17;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH18").mouseup((function(){mouseUPEL="x_GnRH18",mouseUPROW=18;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH19").mouseup((function(){mouseUPEL="x_GnRH19",mouseUPROW=19;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH20").mouseup((function(){mouseUPEL="x_GnRH20",mouseUPROW=20;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH21").mouseup((function(){mouseUPEL="x_GnRH21",mouseUPROW=21;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH22").mouseup((function(){mouseUPEL="x_GnRH22",mouseUPROW=22;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH23").mouseup((function(){mouseUPEL="x_GnRH23",mouseUPROW=23;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH24").mouseup((function(){mouseUPEL="x_GnRH24",mouseUPROW=24;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH25").mouseup((function(){mouseUPEL="x_GnRH25",mouseUPROW=25;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH1").click((function(){sorceEL="x_GnRH1",sourceROW=1})),$("#x_GnRH2").click((function(){sorceEL="x_GnRH2",sourceROW=2})),$("#x_GnRH3").click((function(){sorceEL="x_GnRH3",sourceROW=3})),$("#x_GnRH4").click((function(){sorceEL="x_GnRH4",sourceROW=4})),$("#x_GnRH5").click((function(){sorceEL="x_GnRH5",sourceROW=5})),$("#x_GnRH6").click((function(){sorceEL="x_GnRH6",sourceROW=6})),$("#x_GnRH7").click((function(){sorceEL="x_GnRH7",sourceROW=7})),$("#x_GnRH8").click((function(){sorceEL="x_GnRH8",sourceROW=8})),$("#x_GnRH9").click((function(){sorceEL="x_GnRH9",sourceROW=9})),$("#x_GnRH10").click((function(){sorceEL="x_GnRH10",sourceROW=10})),$("#x_GnRH11").click((function(){sorceEL="x_GnRH11",sourceROW=11})),$("#x_GnRH12").click((function(){sorceEL="x_GnRH12",sourceROW=12})),$("#x_GnRH13").click((function(){sorceEL="x_GnRH13",sourceROW=13})),$("#x_GnRH14").click((function(){sorceEL="x_GnRH14",sourceROW=14})),$("#x_GnRH15").click((function(){sorceEL="x_GnRH15",sourceROW=15})),$("#x_GnRH16").click((function(){sorceEL="x_GnRH16",sourceROW=16})),$("#x_GnRH17").click((function(){sorceEL="x_GnRH17",sourceROW=17})),$("#x_GnRH18").click((function(){sorceEL="x_GnRH18",sourceROW=18})),$("#x_GnRH19").click((function(){sorceEL="x_GnRH19",sourceROW=19})),$("#x_GnRH20").click((function(){sorceEL="x_GnRH20",sourceROW=20})),$("#x_GnRH21").click((function(){sorceEL="x_GnRH21",sourceROW=21})),$("#x_GnRH22").click((function(){sorceEL="x_GnRH22",sourceROW=22})),$("#x_GnRH23").click((function(){sorceEL="x_GnRH23",sourceROW=23}));$("#x_GnRH24").click((function(){sorceEL="x_GnRH24",sourceROW=24})),$("#x_GnRH25").click((function(){sorceEL="x_GnRH25",sourceROW=25})),$("#x_GnRH1").mousedown((function(){sorceEL="x_GnRH1",sourceROW=1})),$("#x_GnRH2").mousedown((function(){sorceEL="x_GnRH2",sourceROW=2})),$("#x_GnRH3").mousedown((function(){sorceEL="x_GnRH3",sourceROW=3})),$("#x_GnRH4").mousedown((function(){sorceEL="x_GnRH4",sourceROW=4})),$("#x_GnRH5").mousedown((function(){sorceEL="x_GnRH5",sourceROW=5})),$("#x_GnRH6").mousedown((function(){sorceEL="x_GnRH6",sourceROW=6})),$("#x_GnRH7").mousedown((function(){sorceEL="x_GnRH7",sourceROW=7})),$("#x_GnRH8").mousedown((function(){sorceEL="x_GnRH8",sourceROW=8})),$("#x_GnRH9").mousedown((function(){sorceEL="x_GnRH9",sourceROW=9})),$("#x_GnRH10").mousedown((function(){sorceEL="x_GnRH10",sourceROW=10})),$("#x_GnRH11").mousedown((function(){sorceEL="x_GnRH11",sourceROW=11})),$("#x_GnRH12").mousedown((function(){sorceEL="x_GnRH12",sourceROW=12})),$("#x_GnRH13").mousedown((function(){sorceEL="x_GnRH13",sourceROW=13})),$("#x_GnRH14").mousedown((function(){sorceEL="x_GnRH14",sourceROW=14})),$("#x_GnRH15").mousedown((function(){sorceEL="x_GnRH15",sourceROW=15})),$("#x_GnRH16").mousedown((function(){sorceEL="x_GnRH16",sourceROW=16})),$("#x_GnRH17").mousedown((function(){sorceEL="x_GnRH17",sourceROW=17})),$("#x_GnRH18").mousedown((function(){sorceEL="x_GnRH18",sourceROW=18})),$("#x_GnRH19").mousedown((function(){sorceEL="x_GnRH19",sourceROW=19})),$("#x_GnRH20").mousedown((function(){sorceEL="x_GnRH20",sourceROW=20})),$("#x_GnRH21").mousedown((function(){sorceEL="x_GnRH21",sourceROW=21})),$("#x_GnRH22").mousedown((function(){sorceEL="x_GnRH22",sourceROW=22})),$("#x_GnRH23").mousedown((function(){sorceEL="x_GnRH23",sourceROW=23})),$("#x_GnRH24").mousedown((function(){sorceEL="x_GnRH24",sourceROW=24})),$("#x_GnRH25").mousedown((function(){sorceEL="x_GnRH25",sourceROW=25})),document.getElementById("x_ARTCycle").style.width="150px",document.getElementById("x_Protocol").style.width="140px",document.getElementById("x_GROWTHHORMONE").style.width="100px",document.getElementById("x_SemenFrozen").style.width="100px",document.getElementById("x_TypeOfInfertility").style.width="100px",document.getElementById("x_Duration").style.width="100px",document.getElementById("x_TotalICSICycle").style.width="100px",document.getElementById("x_A4ICSICycle").style.width="100px",document.getElementById("x_IUICycles").style.width="100px",document.getElementById("x_OvarianVolumeRT").style.width="100px",document.getElementById("x_RelevantHistory").style.width="100px",document.getElementById("x_AFC").style.width="100px",document.getElementById("x_MedicalFactors").style.width="100px",document.getElementById("x_OvarianSurgery").style.width="100px",document.getElementById("x_PRETREATMENT").style.width="150px",document.getElementById("x_AMH").style.width="100px",document.getElementById("x_INJTYPE").style.width="100px",document.getElementById("x_LMP").style.width="100px",document.getElementById("x_SCDate").style.width="100px",document.getElementById("x_ANTAGONISTSTARTDAY").style.width="100px",document.getElementById("x_Consultant").style.width="100px",document.getElementById("x_InseminatinTechnique").style.width="100px",document.getElementById("x_IndicationForART").style.width="100px",document.getElementById("x_Hysteroscopy").style.width="100px",document.getElementById("x_EndometrialScratching").style.width="100px",document.getElementById("x_TrialCannulation").style.width="100px",document.getElementById("x_CYCLETYPE").style.width="100px",document.getElementById("x_HRTCYCLE").style.width="100px",document.getElementById("x_OralEstrogenDosage").style.width="100px",document.getElementById("x_VaginalEstrogen").style.width="100px",document.getElementById("x_GCSF").style.width="100px",document.getElementById("x_ActivatedPRP").style.width="100px",document.getElementById("x_UCLcm").style.width="100px",document.getElementById("x_DATOFEMBRYOTRANSFER").style.width="100px",document.getElementById("x_DAYOFEMBRYOTRANSFER").style.width="100px",document.getElementById("x_NOOFEMBRYOSTHAWED").style.width="100px",document.getElementById("x_NOOFEMBRYOSTRANSFERRED").style.width="100px",document.getElementById("x_DAYOFEMBRYOS").style.width="100px",document.getElementById("x_CRYOPRESERVEDEMBRYOS").style.width="100px",document.getElementById("x_TUBAL_PATENCY").style.width="100px",document.getElementById("x_HSG").style.width="100px",document.getElementById("x_DHL").style.width="100px",document.getElementById("x_UTERINE_PROBLEMS").style.width="100px",document.getElementById("x_W_COMORBIDS").style.width="100px",document.getElementById("x_H_COMORBIDS").style.width="100px",document.getElementById("x_SEXUAL_DYSFUNCTION").style.width="100px",document.getElementById("x_TABLETS").style.width="100px",document.getElementById("x_FOLLICLE_STATUS").style.width="100px",document.getElementById("x_PROCEDURE").style.width="100px",document.getElementById("x_LUTEAL_SUPPORT").style.width="100px",document.getElementById("x_SPECIFIC_MATERNAL_PROBLEMS").style.width="100px",document.getElementById("x_ONGOING_PREG").style.width="100px",document.getElementById("x_EDD_Date").style.width="100px",document.getElementById("x_TRIGGERR").style.width="100px",document.getElementById("x_TRIGGERDATE").style.width="100px",document.getElementById("x_SEMENPREPARATION").style.width="100px",document.getElementById("x_OPUDATE").style.width="100px",document.getElementById("x_DAYSOFSTIMULATION").style.width="100px",document.getElementById("x_DOSEOFGONADOTROPINS").style.width="100px",document.getElementById("x_ProgesteroneStart").style.width="100px",document.getElementById("x_ANTAGONISTDAYS").style.width="100px",document.getElementById("x_PreProcedureOrder").style.width="100px",document.getElementById("x_Expectedoocytes").style.width="100px",document.getElementById("x_DOCTORRESPONSIBLE").style.width="100px",document.getElementById("x_ALLFREEZEINDICATION").style.width="100px",document.getElementById("x_ERA").style.width="100px",document.getElementById("x_REASONFORESET").style.width="100px",document.getElementById("x_DATEOFET").style.width="100px",document.getElementById("x_ET").style.width="100px",document.getElementById("x_ESET").style.width="100px",document.getElementById("x_DOET").style.width="100px",document.getElementById("x_PGTA").style.width="100px",document.getElementById("x_PGD").style.width="100px",document.getElementById("x_StChDate1").style.width="100px",document.getElementById("x_StChDate2").style.width="100px",document.getElementById("x_StChDate3").style.width="100px",document.getElementById("x_StChDate4").style.width="100px",document.getElementById("x_StChDate5").style.width="100px",document.getElementById("x_StChDate6").style.width="100px",document.getElementById("x_StChDate7").style.width="100px",document.getElementById("x_StChDate8").style.width="100px",document.getElementById("x_StChDate9").style.width="100px",document.getElementById("x_StChDate10").style.width="100px",document.getElementById("x_StChDate11").style.width="100px",document.getElementById("x_StChDate12").style.width="100px",document.getElementById("x_StChDate13").style.width="100px",document.getElementById("x_StChDate14").style.width="100px",document.getElementById("x_StChDate15").style.width="100px",document.getElementById("x_StChDate16").style.width="100px",document.getElementById("x_StChDate17").style.width="100px",document.getElementById("x_StChDate18").style.width="100px",document.getElementById("x_StChDate19").style.width="100px",document.getElementById("x_StChDate20").style.width="100px",document.getElementById("x_StChDate21").style.width="100px",document.getElementById("x_StChDate22").style.width="100px",document.getElementById("x_StChDate23").style.width="100px",document.getElementById("x_StChDate24").style.width="100px",document.getElementById("x_StChDate25").style.width="100px",document.getElementById("x_CycleDay1").style.width="60px",document.getElementById("x_CycleDay2").style.width="60px",document.getElementById("x_CycleDay3").style.width="60px",document.getElementById("x_CycleDay4").style.width="60px",document.getElementById("x_CycleDay5").style.width="60px",document.getElementById("x_CycleDay6").style.width="60px",document.getElementById("x_CycleDay7").style.width="60px",document.getElementById("x_CycleDay8").style.width="60px",document.getElementById("x_CycleDay9").style.width="60px",document.getElementById("x_CycleDay10").style.width="60px",document.getElementById("x_CycleDay11").style.width="60px",document.getElementById("x_CycleDay12").style.width="60px",document.getElementById("x_CycleDay13").style.width="60px",document.getElementById("x_CycleDay14").style.width="60px",document.getElementById("x_CycleDay15").style.width="60px",document.getElementById("x_CycleDay16").style.width="60px",document.getElementById("x_CycleDay17").style.width="60px",document.getElementById("x_CycleDay18").style.width="60px",document.getElementById("x_CycleDay19").style.width="60px",document.getElementById("x_CycleDay20").style.width="60px",document.getElementById("x_CycleDay21").style.width="60px",document.getElementById("x_CycleDay22").style.width="60px",document.getElementById("x_CycleDay23").style.width="60px",document.getElementById("x_CycleDay24").style.width="60px",document.getElementById("x_CycleDay25").style.width="60px",document.getElementById("x_StimulationDay1").style.width="60px",document.getElementById("x_StimulationDay2").style.width="60px",document.getElementById("x_StimulationDay3").style.width="60px",document.getElementById("x_StimulationDay4").style.width="60px",document.getElementById("x_StimulationDay5").style.width="60px",document.getElementById("x_StimulationDay6").style.width="60px",document.getElementById("x_StimulationDay7").style.width="60px",document.getElementById("x_StimulationDay8").style.width="60px",document.getElementById("x_StimulationDay9").style.width="60px",document.getElementById("x_StimulationDay10").style.width="60px",document.getElementById("x_StimulationDay11").style.width="60px",document.getElementById("x_StimulationDay12").style.width="60px",document.getElementById("x_StimulationDay13").style.width="60px",document.getElementById("x_StimulationDay14").style.width="60px",document.getElementById("x_StimulationDay15").style.width="60px",document.getElementById("x_StimulationDay16").style.width="60px",document.getElementById("x_StimulationDay17").style.width="60px",document.getElementById("x_StimulationDay18").style.width="60px",document.getElementById("x_StimulationDay19").style.width="60px",document.getElementById("x_StimulationDay20").style.width="60px",document.getElementById("x_StimulationDay21").style.width="60px",document.getElementById("x_StimulationDay22").style.width="60px",document.getElementById("x_StimulationDay23").style.width="60px",document.getElementById("x_StimulationDay24").style.width="60px",document.getElementById("x_StimulationDay25").style.width="60px",document.getElementById("x_E21").style.width="60px",document.getElementById("x_E22").style.width="60px",document.getElementById("x_E23").style.width="60px",document.getElementById("x_E24").style.width="60px",document.getElementById("x_E25").style.width="60px",document.getElementById("x_E26").style.width="60px",document.getElementById("x_E27").style.width="60px",document.getElementById("x_E28").style.width="60px",document.getElementById("x_E29").style.width="60px",document.getElementById("x_E210").style.width="60px",document.getElementById("x_E211").style.width="60px",document.getElementById("x_E212").style.width="60px",document.getElementById("x_E213").style.width="60px",document.getElementById("x_E214").style.width="60px",document.getElementById("x_E215").style.width="60px",document.getElementById("x_E216").style.width="60px",document.getElementById("x_E217").style.width="60px",document.getElementById("x_E218").style.width="60px",document.getElementById("x_E219").style.width="60px",document.getElementById("x_E220").style.width="60px",document.getElementById("x_E221").style.width="60px",document.getElementById("x_E222").style.width="60px",document.getElementById("x_E223").style.width="60px",document.getElementById("x_E224").style.width="60px",document.getElementById("x_E225").style.width="60px",document.getElementById("x_P41").style.width="60px",document.getElementById("x_P42").style.width="60px",document.getElementById("x_P43").style.width="60px",document.getElementById("x_P44").style.width="60px",document.getElementById("x_P45").style.width="60px",document.getElementById("x_P46").style.width="60px",document.getElementById("x_P47").style.width="60px",document.getElementById("x_P48").style.width="60px",document.getElementById("x_P49").style.width="60px",document.getElementById("x_P410").style.width="60px",document.getElementById("x_P411").style.width="60px",document.getElementById("x_P412").style.width="60px",document.getElementById("x_P413").style.width="60px",document.getElementById("x_P414").style.width="60px",document.getElementById("x_P415").style.width="60px",document.getElementById("x_P416").style.width="60px",document.getElementById("x_P417").style.width="60px",document.getElementById("x_P418").style.width="60px",document.getElementById("x_P419").style.width="60px",document.getElementById("x_P420").style.width="60px",document.getElementById("x_P421").style.width="60px",document.getElementById("x_P422").style.width="60px",document.getElementById("x_P423").style.width="60px",document.getElementById("x_P424").style.width="60px",document.getElementById("x_P425").style.width="60px",document.getElementById("x_USGRt1").style.width="60px",document.getElementById("x_USGRt2").style.width="60px",document.getElementById("x_USGRt3").style.width="60px",document.getElementById("x_USGRt4").style.width="60px",document.getElementById("x_USGRt5").style.width="60px",document.getElementById("x_USGRt6").style.width="60px",document.getElementById("x_USGRt7").style.width="60px",document.getElementById("x_USGRt8").style.width="60px",document.getElementById("x_USGRt9").style.width="60px",document.getElementById("x_USGRt10").style.width="60px",document.getElementById("x_USGRt11").style.width="60px",document.getElementById("x_USGRt12").style.width="60px",document.getElementById("x_USGRt13").style.width="60px",document.getElementById("x_USGRt14").style.width="60px",document.getElementById("x_USGRt15").style.width="60px",document.getElementById("x_USGRt16").style.width="60px",document.getElementById("x_USGRt17").style.width="60px",document.getElementById("x_USGRt18").style.width="60px",document.getElementById("x_USGRt19").style.width="60px",document.getElementById("x_USGRt20").style.width="60px",document.getElementById("x_USGRt21").style.width="60px",document.getElementById("x_USGRt22").style.width="60px",document.getElementById("x_USGRt23").style.width="60px",document.getElementById("x_USGRt24").style.width="60px",document.getElementById("x_USGRt25").style.width="60px",document.getElementById("x_USGLt1").style.width="60px",document.getElementById("x_USGLt2").style.width="60px",document.getElementById("x_USGLt3").style.width="60px",document.getElementById("x_USGLt4").style.width="60px",document.getElementById("x_USGLt5").style.width="60px",document.getElementById("x_USGLt6").style.width="60px",document.getElementById("x_USGLt7").style.width="60px",document.getElementById("x_USGLt8").style.width="60px",document.getElementById("x_USGLt9").style.width="60px",document.getElementById("x_USGLt10").style.width="60px",document.getElementById("x_USGLt11").style.width="60px",document.getElementById("x_USGLt12").style.width="60px",document.getElementById("x_USGLt13").style.width="60px",document.getElementById("x_USGLt14").style.width="60px",document.getElementById("x_USGLt15").style.width="60px",document.getElementById("x_USGLt16").style.width="60px",document.getElementById("x_USGLt17").style.width="60px",document.getElementById("x_USGLt18").style.width="60px",document.getElementById("x_USGLt19").style.width="60px",document.getElementById("x_USGLt20").style.width="60px",document.getElementById("x_USGLt21").style.width="60px",document.getElementById("x_USGLt22").style.width="60px",document.getElementById("x_USGLt23").style.width="60px",document.getElementById("x_USGLt24").style.width="60px",document.getElementById("x_USGLt25").style.width="60px",document.getElementById("x_EM1").style.width="60px",document.getElementById("x_EM2").style.width="60px",document.getElementById("x_EM3").style.width="60px",document.getElementById("x_EM4").style.width="60px",document.getElementById("x_EM5").style.width="60px",document.getElementById("x_EM6").style.width="60px",document.getElementById("x_EM7").style.width="60px",document.getElementById("x_EM8").style.width="60px",document.getElementById("x_EM9").style.width="60px",document.getElementById("x_EM10").style.width="60px",document.getElementById("x_EM11").style.width="60px",document.getElementById("x_EM12").style.width="60px",document.getElementById("x_EM13").style.width="60px",document.getElementById("x_EM14").style.width="60px",document.getElementById("x_EM15").style.width="60px",document.getElementById("x_EM16").style.width="60px",document.getElementById("x_EM17").style.width="60px",document.getElementById("x_EM18").style.width="60px",document.getElementById("x_EM19").style.width="60px",document.getElementById("x_EM20").style.width="60px",document.getElementById("x_EM21").style.width="60px",document.getElementById("x_EM22").style.width="60px",document.getElementById("x_EM23").style.width="60px",document.getElementById("x_EM24").style.width="60px",document.getElementById("x_EM25").style.width="60px",document.getElementById("x_Others1").style.width="60px",document.getElementById("x_Others2").style.width="60px",document.getElementById("x_Others3").style.width="60px",document.getElementById("x_Others4").style.width="60px",document.getElementById("x_Others5").style.width="60px",document.getElementById("x_Others6").style.width="60px",document.getElementById("x_Others7").style.width="60px",document.getElementById("x_Others8").style.width="60px",document.getElementById("x_Others9").style.width="60px",document.getElementById("x_Others10").style.width="60px",document.getElementById("x_Others11").style.width="60px",document.getElementById("x_Others12").style.width="60px",document.getElementById("x_Others13").style.width="60px",document.getElementById("x_Others14").style.width="60px",document.getElementById("x_Others15").style.width="60px",document.getElementById("x_Others16").style.width="60px",document.getElementById("x_Others17").style.width="60px",document.getElementById("x_Others18").style.width="60px",document.getElementById("x_Others19").style.width="60px",document.getElementById("x_Others20").style.width="60px",document.getElementById("x_Others21").style.width="60px",document.getElementById("x_Others22").style.width="60px",document.getElementById("x_Others23").style.width="60px",document.getElementById("x_Others24").style.width="60px",document.getElementById("x_Others25").style.width="60px",document.getElementById("x_DR1").style.width="60px",document.getElementById("x_DR2").style.width="60px",document.getElementById("x_DR3").style.width="60px",document.getElementById("x_DR4").style.width="60px",document.getElementById("x_DR5").style.width="60px",document.getElementById("x_DR6").style.width="60px",document.getElementById("x_DR7").style.width="60px",document.getElementById("x_DR8").style.width="60px",document.getElementById("x_DR9").style.width="60px",document.getElementById("x_DR10").style.width="60px",document.getElementById("x_DR11").style.width="60px",document.getElementById("x_DR12").style.width="60px",document.getElementById("x_DR13").style.width="60px",document.getElementById("x_DR14").style.width="60px",document.getElementById("x_DR15").style.width="60px",document.getElementById("x_DR16").style.width="60px",document.getElementById("x_DR17").style.width="60px",document.getElementById("x_DR18").style.width="60px",document.getElementById("x_DR19").style.width="60px",document.getElementById("x_DR20").style.width="60px",document.getElementById("x_DR21").style.width="60px",document.getElementById("x_DR22").style.width="60px",document.getElementById("x_DR23").style.width="60px",document.getElementById("x_DR24").style.width="60px",document.getElementById("x_DR25").style.width="60px",document.getElementById("x_Tablet1").style.width="120px",document.getElementById("x_Tablet2").style.width="156px",document.getElementById("x_Tablet3").style.width="156px",document.getElementById("x_Tablet4").style.width="156px",document.getElementById("x_Tablet5").style.width="156px",document.getElementById("x_Tablet6").style.width="156px",document.getElementById("x_Tablet7").style.width="156px",document.getElementById("x_Tablet8").style.width="156px",document.getElementById("x_Tablet9").style.width="156px",document.getElementById("x_Tablet10").style.width="156px",document.getElementById("x_Tablet11").style.width="156px",document.getElementById("x_Tablet12").style.width="156px",document.getElementById("x_Tablet13").style.width="156px",document.getElementById("x_Tablet14").style.width="156px",document.getElementById("x_Tablet15").style.width="156px",document.getElementById("x_Tablet16").style.width="156px",document.getElementById("x_Tablet17").style.width="156px",document.getElementById("x_Tablet18").style.width="156px",document.getElementById("x_Tablet19").style.width="156px",document.getElementById("x_Tablet20").style.width="156px",document.getElementById("x_Tablet21").style.width="156px",document.getElementById("x_Tablet22").style.width="156px",document.getElementById("x_Tablet23").style.width="156px",document.getElementById("x_Tablet24").style.width="156px",document.getElementById("x_Tablet25").style.width="156px",document.getElementById("x_RFSH1").style.width="120px",document.getElementById("x_RFSH2").style.width="156px",document.getElementById("x_RFSH3").style.width="156px",document.getElementById("x_RFSH4").style.width="156px",document.getElementById("x_RFSH5").style.width="156px",document.getElementById("x_RFSH6").style.width="156px",document.getElementById("x_RFSH7").style.width="156px",document.getElementById("x_RFSH8").style.width="156px",document.getElementById("x_RFSH9").style.width="156px",document.getElementById("x_RFSH10").style.width="156px",document.getElementById("x_RFSH11").style.width="156px",document.getElementById("x_RFSH12").style.width="156px",document.getElementById("x_RFSH13").style.width="156px",document.getElementById("x_RFSH14").style.width="156px",document.getElementById("x_RFSH15").style.width="156px",document.getElementById("x_RFSH16").style.width="156px",document.getElementById("x_RFSH17").style.width="156px",document.getElementById("x_RFSH18").style.width="156px",document.getElementById("x_RFSH19").style.width="156px",document.getElementById("x_RFSH20").style.width="156px",document.getElementById("x_RFSH21").style.width="156px",document.getElementById("x_RFSH22").style.width="156px",document.getElementById("x_RFSH23").style.width="156px",document.getElementById("x_RFSH24").style.width="156px",document.getElementById("x_RFSH25").style.width="156px",document.getElementById("x_HMG1").style.width="120px",document.getElementById("x_HMG2").style.width="156px",document.getElementById("x_HMG3").style.width="156px",document.getElementById("x_HMG4").style.width="156px",document.getElementById("x_HMG5").style.width="156px",document.getElementById("x_HMG6").style.width="156px",document.getElementById("x_HMG7").style.width="156px",document.getElementById("x_HMG8").style.width="156px",document.getElementById("x_HMG9").style.width="156px",document.getElementById("x_HMG10").style.width="156px",document.getElementById("x_HMG11").style.width="156px",document.getElementById("x_HMG12").style.width="156px",document.getElementById("x_HMG13").style.width="156px",document.getElementById("x_HMG14").style.width="156px",document.getElementById("x_HMG15").style.width="156px",document.getElementById("x_HMG16").style.width="156px",document.getElementById("x_HMG17").style.width="156px",document.getElementById("x_HMG18").style.width="156px",document.getElementById("x_HMG19").style.width="156px",document.getElementById("x_HMG20").style.width="156px",document.getElementById("x_HMG21").style.width="156px",document.getElementById("x_HMG22").style.width="156px",document.getElementById("x_HMG23").style.width="156px",document.getElementById("x_HMG24").style.width="156px",document.getElementById("x_HMG25").style.width="156px",document.getElementById("x_GnRH1").style.width="110px",document.getElementById("x_GnRH2").style.width="146px",document.getElementById("x_GnRH3").style.width="146px",document.getElementById("x_GnRH4").style.width="146px",document.getElementById("x_GnRH5").style.width="146px",document.getElementById("x_GnRH6").style.width="146px",document.getElementById("x_GnRH7").style.width="146px",document.getElementById("x_GnRH8").style.width="146px",document.getElementById("x_GnRH9").style.width="146px",document.getElementById("x_GnRH10").style.width="146px",document.getElementById("x_GnRH11").style.width="146px",document.getElementById("x_GnRH12").style.width="146px",document.getElementById("x_GnRH13").style.width="146px",document.getElementById("x_GnRH14").style.width="146px",document.getElementById("x_GnRH15").style.width="146px",document.getElementById("x_GnRH16").style.width="146px",document.getElementById("x_GnRH17").style.width="146px",document.getElementById("x_GnRH18").style.width="146px",document.getElementById("x_GnRH19").style.width="146px",document.getElementById("x_GnRH20").style.width="146px",document.getElementById("x_GnRH21").style.width="146px",document.getElementById("x_GnRH22").style.width="146px",document.getElementById("x_GnRH23").style.width="146px",document.getElementById("x_GnRH24").style.width="146px",document.getElementById("x_GnRH25").style.width="146px";var tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="none",artcycle=(tableE2=document.getElementById("ETTableStIIUUII").style.display="none",tableE2=document.getElementById("IUIivfcONVERTTER").style.display="none",'<?php echo $resultsA[0]["ARTCYCLE"]; ?>'),Treatment='<?php echo $resultsA[0]["Treatment"]; ?>';if("Intrauterine insemination(IUI)"==artcycle){tableE2=document.getElementById("tableE2").style.display="none",tableE2=document.getElementById("tableE21").style.display="none",tableE2=document.getElementById("tableE22").style.display="none",tableE2=document.getElementById("tableE23").style.display="none",tableE2=document.getElementById("tableE24").style.display="none",tableE2=document.getElementById("tableE25").style.display="none",tableE2=document.getElementById("tableE26").style.display="none",tableE2=document.getElementById("tableE27").style.display="none",tableE2=document.getElementById("tableE28").style.display="none",tableE2=document.getElementById("tableE29").style.display="none",tableE2=document.getElementById("tableE210").style.display="none",tableE2=document.getElementById("tableE211").style.display="none",tableE2=document.getElementById("tableE212").style.display="none",tableE2=document.getElementById("tableE213").style.display="none",tableE2=document.getElementById("tableE214").style.display="none",tableE2=document.getElementById("tableE215").style.display="none",tableE2=document.getElementById("tableE216").style.display="none",tableE2=document.getElementById("tableE217").style.display="none",tableE2=document.getElementById("tableE218").style.display="none",tableE2=document.getElementById("tableE219").style.display="none",tableE2=document.getElementById("tableE220").style.display="none",tableE2=document.getElementById("tableE221").style.display="none",tableE2=document.getElementById("tableE222").style.display="none",tableE2=document.getElementById("tableE223").style.display="none",tableE2=document.getElementById("tableE224").style.display="none",tableE2=document.getElementById("tableE225").style.display="none";var RowPreProcedureOrder=document.getElementById("RowPreProcedureOrder").style.display="none",RowALLFREEZEINDICATION=document.getElementById("RowALLFREEZEINDICATION").style.display="none",RowDATEOFET=document.getElementById("RowDATEOFET").style.display="none",colPGTA=document.getElementById("colPGTA").style.display="none",colPGD=document.getElementById("colPGD").style.display="none",fieldOPUDATE=document.getElementById("fieldOPUDATE");fieldOPUDATE.firstElementChild.innerText="IUI Date";var x_OPUDATE=document.getElementById("x_OPUDATE");x_OPUDATE.placeholder="IUI Date";var ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",ANTAGONISTDAYSstum=document.getElementById("ANTAGONISTDAYSstum").style.display="none";tableE2=document.getElementById("ETTableStIIUUII").style.display="block",tableE2=document.getElementById("IUIivfcONVERTTER").style.display="block"}if("Frozen Embryo Transfer"===artcycle||"Evaluation cycle"===artcycle){var colE2=document.getElementById("colE2").innerHTML="VE",colP4=document.getElementById("colP4").innerHTML="Patches",colUSGRt=document.getElementById("colUSGRt").innerHTML="Progesterone",colUSGLt=document.getElementById("colUSGLt").innerHTML="Ult",colET=document.getElementById("colET").innerHTML="ET",colOthers=document.getElementById("colOthers").innerHTML="Pattern",colDr=document.getElementById("colDr").innerHTML="Observation",tableStimulationday=document.getElementById("tableStimulationday").style.display="none",tableTablet=(tableStimulationday=document.getElementById("tableStimulationday1").style.display="none",tableStimulationday=document.getElementById("tableStimulationday2").style.display="none",tableStimulationday=document.getElementById("tableStimulationday3").style.display="none",tableStimulationday=document.getElementById("tableStimulationday4").style.display="none",tableStimulationday=document.getElementById("tableStimulationday5").style.display="none",tableStimulationday=document.getElementById("tableStimulationday6").style.display="none",tableStimulationday=document.getElementById("tableStimulationday7").style.display="none",tableStimulationday=document.getElementById("tableStimulationday8").style.display="none",tableStimulationday=document.getElementById("tableStimulationday9").style.display="none",tableStimulationday=document.getElementById("tableStimulationday10").style.display="none",tableStimulationday=document.getElementById("tableStimulationday11").style.display="none",tableStimulationday=document.getElementById("tableStimulationday12").style.display="none",tableStimulationday=document.getElementById("tableStimulationday13").style.display="none",tableStimulationday=document.getElementById("tableStimulationday14").style.display="none",tableStimulationday=document.getElementById("tableStimulationday15").style.display="none",tableStimulationday=document.getElementById("tableStimulationday16").style.display="none",tableStimulationday=document.getElementById("tableStimulationday17").style.display="none",tableStimulationday=document.getElementById("tableStimulationday18").style.display="none",tableStimulationday=document.getElementById("tableStimulationday19").style.display="none",tableStimulationday=document.getElementById("tableStimulationday20").style.display="none",tableStimulationday=document.getElementById("tableStimulationday21").style.display="none",tableStimulationday=document.getElementById("tableStimulationday22").style.display="none",tableStimulationday=document.getElementById("tableStimulationday23").style.display="none",tableStimulationday=document.getElementById("tableStimulationday24").style.display="none",tableStimulationday=document.getElementById("tableStimulationday25").style.display="none",document.getElementById("tableTablet").style.display="none"),tableRFSH=(tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableTablet=document.getElementById("tableTablet14").style.display="none",tableTablet=document.getElementById("tableTablet15").style.display="none",tableTablet=document.getElementById("tableTablet16").style.display="none",tableTablet=document.getElementById("tableTablet17").style.display="none",tableTablet=document.getElementById("tableTablet18").style.display="none",tableTablet=document.getElementById("tableTablet19").style.display="none",tableTablet=document.getElementById("tableTablet20").style.display="none",tableTablet=document.getElementById("tableTablet21").style.display="none",tableTablet=document.getElementById("tableTablet22").style.display="none",tableTablet=document.getElementById("tableTablet23").style.display="none",tableTablet=document.getElementById("tableTablet24").style.display="none",tableTablet=document.getElementById("tableTablet25").style.display="none",document.getElementById("tableRFSH").style.display="none"),tableHMG=(tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableRFSH=document.getElementById("tableRFSH14").style.display="none",tableRFSH=document.getElementById("tableRFSH15").style.display="none",tableRFSH=document.getElementById("tableRFSH16").style.display="none",tableRFSH=document.getElementById("tableRFSH17").style.display="none",tableRFSH=document.getElementById("tableRFSH18").style.display="none",tableRFSH=document.getElementById("tableRFSH19").style.display="none",tableRFSH=document.getElementById("tableRFSH20").style.display="none",tableRFSH=document.getElementById("tableRFSH21").style.display="none",tableRFSH=document.getElementById("tableRFSH22").style.display="none",tableRFSH=document.getElementById("tableRFSH23").style.display="none",tableRFSH=document.getElementById("tableRFSH24").style.display="none",tableRFSH=document.getElementById("tableRFSH25").style.display="none",document.getElementById("tableHMG").style.display="none"),rowTypeOfInfertility=(tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",tableHMG=document.getElementById("tableHMG14").style.display="none",tableHMG=document.getElementById("tableHMG15").style.display="none",tableHMG=document.getElementById("tableHMG16").style.display="none",tableHMG=document.getElementById("tableHMG17").style.display="none",tableHMG=document.getElementById("tableHMG18").style.display="none",tableHMG=document.getElementById("tableHMG19").style.display="none",tableHMG=document.getElementById("tableHMG20").style.display="none",tableHMG=document.getElementById("tableHMG21").style.display="none",tableHMG=document.getElementById("tableHMG22").style.display="none",tableHMG=document.getElementById("tableHMG23").style.display="none",tableHMG=document.getElementById("tableHMG24").style.display="none",tableHMG=document.getElementById("tableHMG25").style.display="none",document.getElementById("rowTypeOfInfertility").style.display="none"),rowIUICycles=document.getElementById("rowIUICycles").style.display="none",rowMedicalFactors=document.getElementById("rowMedicalFactors").style.display="none",fieldINJTYPE=document.getElementById("fieldINJTYPE").style.display="none",fieldLMP=document.getElementById("fieldLMP").style.display="none",fieldANTAGONISTSTARTDAY=document.getElementById("fieldANTAGONISTSTARTDAY").style.display="none",fieldProtocol=document.getElementById("fieldProtocol").style.display="none",fieldGROWTHHORMONE=document.getElementById("fieldGROWTHHORMONE").style.display="none",fieldSemenFrozen=document.getElementById("fieldSemenFrozen").style.display="none",ETTableSt=document.getElementById("ETTableSt").style.display="block",ProgesteroneAdminTable=(ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",document.getElementById("ProgesteroneAdminTable").style.display="none");ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",fieldSemenFrozen=document.getElementById("RowPreProcedureOrder").style.display="none",fieldSemenFrozen=document.getElementById("RowALLFREEZEINDICATION").style.display="none",fieldSemenFrozen=document.getElementById("PreProcedureOrderPPOOUU").style.display="none",tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="block"}else{ETTableSt=document.getElementById("ETTableSt").style.display="none";if("Intrauterine insemination(IUI)"!=artcycle)AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="block";ProgesteroneAdminTable=document.getElementById("ProgesteroneAdminTable").style.display="none"}if("Fresh ET"==Treatment||"Frozen ET"==Treatment||"OD Fresh ET"==Treatment||"OD Frozen ET"==Treatment||"OD ICSI"==Treatment)colE2=document.getElementById("colE2").innerHTML="VE",colP4=document.getElementById("colP4").innerHTML="Patches",colUSGRt=document.getElementById("colUSGRt").innerHTML="Progesterone",colUSGLt=document.getElementById("colUSGLt").innerHTML="Ult",colET=document.getElementById("colET").innerHTML="ET",colOthers=document.getElementById("colOthers").innerHTML="Pattern",colDr=document.getElementById("colDr").innerHTML="Observation",tableStimulationday=document.getElementById("tableStimulationday").style.display="none",tableStimulationday=document.getElementById("tableStimulationday1").style.display="none",tableStimulationday=document.getElementById("tableStimulationday2").style.display="none",tableStimulationday=document.getElementById("tableStimulationday3").style.display="none",tableStimulationday=document.getElementById("tableStimulationday4").style.display="none",tableStimulationday=document.getElementById("tableStimulationday5").style.display="none",tableStimulationday=document.getElementById("tableStimulationday6").style.display="none",tableStimulationday=document.getElementById("tableStimulationday7").style.display="none",tableStimulationday=document.getElementById("tableStimulationday8").style.display="none",tableStimulationday=document.getElementById("tableStimulationday9").style.display="none",tableStimulationday=document.getElementById("tableStimulationday10").style.display="none",tableStimulationday=document.getElementById("tableStimulationday11").style.display="none",tableStimulationday=document.getElementById("tableStimulationday12").style.display="none",tableStimulationday=document.getElementById("tableStimulationday13").style.display="none",tableStimulationday=document.getElementById("tableStimulationday14").style.display="none",tableStimulationday=document.getElementById("tableStimulationday15").style.display="none",tableStimulationday=document.getElementById("tableStimulationday16").style.display="none",tableStimulationday=document.getElementById("tableStimulationday17").style.display="none",tableStimulationday=document.getElementById("tableStimulationday18").style.display="none",tableStimulationday=document.getElementById("tableStimulationday19").style.display="none",tableStimulationday=document.getElementById("tableStimulationday20").style.display="none",tableStimulationday=document.getElementById("tableStimulationday21").style.display="none",tableStimulationday=document.getElementById("tableStimulationday22").style.display="none",tableStimulationday=document.getElementById("tableStimulationday23").style.display="none",tableStimulationday=document.getElementById("tableStimulationday24").style.display="none",tableStimulationday=document.getElementById("tableStimulationday25").style.display="none",tableTablet=document.getElementById("tableTablet").style.display="none",tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableTablet=document.getElementById("tableTablet14").style.display="none",tableTablet=document.getElementById("tableTablet15").style.display="none",tableTablet=document.getElementById("tableTablet16").style.display="none",tableTablet=document.getElementById("tableTablet17").style.display="none",tableTablet=document.getElementById("tableTablet18").style.display="none",tableTablet=document.getElementById("tableTablet19").style.display="none",tableTablet=document.getElementById("tableTablet20").style.display="none",tableTablet=document.getElementById("tableTablet21").style.display="none",tableTablet=document.getElementById("tableTablet22").style.display="none",tableTablet=document.getElementById("tableTablet23").style.display="none",tableTablet=document.getElementById("tableTablet24").style.display="none",tableTablet=document.getElementById("tableTablet25").style.display="none",tableRFSH=document.getElementById("tableRFSH").style.display="none",tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableRFSH=document.getElementById("tableRFSH14").style.display="none",tableRFSH=document.getElementById("tableRFSH15").style.display="none",tableRFSH=document.getElementById("tableRFSH16").style.display="none",tableRFSH=document.getElementById("tableRFSH17").style.display="none",tableRFSH=document.getElementById("tableRFSH18").style.display="none",tableRFSH=document.getElementById("tableRFSH19").style.display="none",tableRFSH=document.getElementById("tableRFSH20").style.display="none",tableRFSH=document.getElementById("tableRFSH21").style.display="none",tableRFSH=document.getElementById("tableRFSH22").style.display="none",tableRFSH=document.getElementById("tableRFSH23").style.display="none",tableRFSH=document.getElementById("tableRFSH24").style.display="none",tableRFSH=document.getElementById("tableRFSH25").style.display="none",tableHMG=document.getElementById("tableHMG").style.display="none",tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",tableHMG=document.getElementById("tableHMG14").style.display="none",tableHMG=document.getElementById("tableHMG15").style.display="none",tableHMG=document.getElementById("tableHMG16").style.display="none",tableHMG=document.getElementById("tableHMG17").style.display="none",tableHMG=document.getElementById("tableHMG18").style.display="none",tableHMG=document.getElementById("tableHMG19").style.display="none",tableHMG=document.getElementById("tableHMG20").style.display="none",tableHMG=document.getElementById("tableHMG21").style.display="none",tableHMG=document.getElementById("tableHMG22").style.display="none",tableHMG=document.getElementById("tableHMG23").style.display="none",tableHMG=document.getElementById("tableHMG24").style.display="none",tableHMG=document.getElementById("tableHMG25").style.display="none",tableTablet=document.getElementById("tableTablet").style.display="none",tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableRFSH=document.getElementById("tableRFSH").style.display="none",tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableHMG=document.getElementById("tableHMG").style.display="none",tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",rowTypeOfInfertility=document.getElementById("rowTypeOfInfertility").style.display="none",rowIUICycles=document.getElementById("rowIUICycles").style.display="none",rowMedicalFactors=document.getElementById("rowMedicalFactors").style.display="none",fieldINJTYPE=document.getElementById("fieldINJTYPE").style.display="none",fieldLMP=document.getElementById("fieldLMP").style.display="none",fieldANTAGONISTSTARTDAY=document.getElementById("fieldANTAGONISTSTARTDAY").style.display="none",fieldProtocol=document.getElementById("fieldProtocol").style.display="none",fieldGROWTHHORMONE=document.getElementById("fieldGROWTHHORMONE").style.display="none",fieldSemenFrozen=document.getElementById("fieldSemenFrozen").style.display="none",ETTableSt=document.getElementById("ETTableSt").style.display="block",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",ProgesteroneAdminTable=document.getElementById("ProgesteroneAdminTable").style.display="none";if("ICSI H"==Treatment)tableE2=document.getElementById("IUIivfcONVERTTER").style.display="block",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none";if("OD ICSI"==Treatment)fieldSemenFrozen=document.getElementById("PreProcedureOrderPPOOUU").style.display="none",tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="block";function ProgesteroneAccept(){document.getElementById("ProgesteroneAdminTable").style.display="none"}function ProgesteroneCancel(){document.getElementById("ProgesteroneAdminTable").style.display="none"}function addDays(e,t){const o=new Date(Number(e));return o.setDate(e.getDate()+t),o}function calculateDoseofGonadotropins(){}function calculateDoseofRFSHHMG(){for(var e=0,t=0,o=1;o<24;o++){var n="x_RFSH"+o;(u=document.getElementById(n).value.split(" ")).length>1&&(e=parseInt(e)+1,t="Follisurge"==u[0]?parseInt(t)+parseInt(u[1]):parseInt(t)+parseInt(u[2]));var u;n="x_HMG"+o;(u=document.getElementById(n).value.split(" ")).length>1&&(t="HUMOG"==u[0]?parseInt(t)+parseInt(u[1]):parseInt(t)+parseInt(u[2]))}document.getElementById("x_DAYSOFSTIMULATION").value=e,document.getElementById("x_DOSEOFGONADOTROPINS").value=t}function calculateDaysofGnRH(){for(var e=0,t=1;t<24;t++){var o="x_GnRH"+t;document.getElementById(o).value.split(" ").length>1&&(e=parseInt(e)+1)}document.getElementById("x_ANTAGONISTDAYS").value=e}function addrowsintable(){$("#tablechartadd tbody").find("tr:hidden:first").show()}
});
</script>

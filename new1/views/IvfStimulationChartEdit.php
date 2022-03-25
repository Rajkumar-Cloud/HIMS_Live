<?php

namespace PHPMaker2021\project3;

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
    var fields = ew.vars.tables.ivf_stimulation_chart.fields;
    fivf_stimulation_chartedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNo", [fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["ARTCycle", [fields.ARTCycle.required ? ew.Validators.required(fields.ARTCycle.caption) : null], fields.ARTCycle.isInvalid],
        ["FemaleFactor", [fields.FemaleFactor.required ? ew.Validators.required(fields.FemaleFactor.caption) : null], fields.FemaleFactor.isInvalid],
        ["MaleFactor", [fields.MaleFactor.required ? ew.Validators.required(fields.MaleFactor.caption) : null], fields.MaleFactor.isInvalid],
        ["Protocol", [fields.Protocol.required ? ew.Validators.required(fields.Protocol.caption) : null], fields.Protocol.isInvalid],
        ["SemenFrozen", [fields.SemenFrozen.required ? ew.Validators.required(fields.SemenFrozen.caption) : null], fields.SemenFrozen.isInvalid],
        ["A4ICSICycle", [fields.A4ICSICycle.required ? ew.Validators.required(fields.A4ICSICycle.caption) : null], fields.A4ICSICycle.isInvalid],
        ["TotalICSICycle", [fields.TotalICSICycle.required ? ew.Validators.required(fields.TotalICSICycle.caption) : null], fields.TotalICSICycle.isInvalid],
        ["TypeOfInfertility", [fields.TypeOfInfertility.required ? ew.Validators.required(fields.TypeOfInfertility.caption) : null], fields.TypeOfInfertility.isInvalid],
        ["Duration", [fields.Duration.required ? ew.Validators.required(fields.Duration.caption) : null], fields.Duration.isInvalid],
        ["LMP", [fields.LMP.required ? ew.Validators.required(fields.LMP.caption) : null, ew.Validators.datetime(0)], fields.LMP.isInvalid],
        ["RelevantHistory", [fields.RelevantHistory.required ? ew.Validators.required(fields.RelevantHistory.caption) : null], fields.RelevantHistory.isInvalid],
        ["IUICycles", [fields.IUICycles.required ? ew.Validators.required(fields.IUICycles.caption) : null], fields.IUICycles.isInvalid],
        ["AFC", [fields.AFC.required ? ew.Validators.required(fields.AFC.caption) : null], fields.AFC.isInvalid],
        ["AMH", [fields.AMH.required ? ew.Validators.required(fields.AMH.caption) : null], fields.AMH.isInvalid],
        ["FBMI", [fields.FBMI.required ? ew.Validators.required(fields.FBMI.caption) : null], fields.FBMI.isInvalid],
        ["MBMI", [fields.MBMI.required ? ew.Validators.required(fields.MBMI.caption) : null], fields.MBMI.isInvalid],
        ["OvarianVolumeRT", [fields.OvarianVolumeRT.required ? ew.Validators.required(fields.OvarianVolumeRT.caption) : null], fields.OvarianVolumeRT.isInvalid],
        ["OvarianVolumeLT", [fields.OvarianVolumeLT.required ? ew.Validators.required(fields.OvarianVolumeLT.caption) : null], fields.OvarianVolumeLT.isInvalid],
        ["DAYSOFSTIMULATION", [fields.DAYSOFSTIMULATION.required ? ew.Validators.required(fields.DAYSOFSTIMULATION.caption) : null], fields.DAYSOFSTIMULATION.isInvalid],
        ["DOSEOFGONADOTROPINS", [fields.DOSEOFGONADOTROPINS.required ? ew.Validators.required(fields.DOSEOFGONADOTROPINS.caption) : null], fields.DOSEOFGONADOTROPINS.isInvalid],
        ["INJTYPE", [fields.INJTYPE.required ? ew.Validators.required(fields.INJTYPE.caption) : null], fields.INJTYPE.isInvalid],
        ["ANTAGONISTDAYS", [fields.ANTAGONISTDAYS.required ? ew.Validators.required(fields.ANTAGONISTDAYS.caption) : null], fields.ANTAGONISTDAYS.isInvalid],
        ["ANTAGONISTSTARTDAY", [fields.ANTAGONISTSTARTDAY.required ? ew.Validators.required(fields.ANTAGONISTSTARTDAY.caption) : null], fields.ANTAGONISTSTARTDAY.isInvalid],
        ["GROWTHHORMONE", [fields.GROWTHHORMONE.required ? ew.Validators.required(fields.GROWTHHORMONE.caption) : null], fields.GROWTHHORMONE.isInvalid],
        ["PRETREATMENT", [fields.PRETREATMENT.required ? ew.Validators.required(fields.PRETREATMENT.caption) : null], fields.PRETREATMENT.isInvalid],
        ["SerumP4", [fields.SerumP4.required ? ew.Validators.required(fields.SerumP4.caption) : null], fields.SerumP4.isInvalid],
        ["FORT", [fields.FORT.required ? ew.Validators.required(fields.FORT.caption) : null], fields.FORT.isInvalid],
        ["MedicalFactors", [fields.MedicalFactors.required ? ew.Validators.required(fields.MedicalFactors.caption) : null], fields.MedicalFactors.isInvalid],
        ["SCDate", [fields.SCDate.required ? ew.Validators.required(fields.SCDate.caption) : null, ew.Validators.datetime(0)], fields.SCDate.isInvalid],
        ["OvarianSurgery", [fields.OvarianSurgery.required ? ew.Validators.required(fields.OvarianSurgery.caption) : null], fields.OvarianSurgery.isInvalid],
        ["PreProcedureOrder", [fields.PreProcedureOrder.required ? ew.Validators.required(fields.PreProcedureOrder.caption) : null], fields.PreProcedureOrder.isInvalid],
        ["TRIGGERR", [fields.TRIGGERR.required ? ew.Validators.required(fields.TRIGGERR.caption) : null], fields.TRIGGERR.isInvalid],
        ["TRIGGERDATE", [fields.TRIGGERDATE.required ? ew.Validators.required(fields.TRIGGERDATE.caption) : null, ew.Validators.datetime(0)], fields.TRIGGERDATE.isInvalid],
        ["ATHOMEorCLINIC", [fields.ATHOMEorCLINIC.required ? ew.Validators.required(fields.ATHOMEorCLINIC.caption) : null], fields.ATHOMEorCLINIC.isInvalid],
        ["OPUDATE", [fields.OPUDATE.required ? ew.Validators.required(fields.OPUDATE.caption) : null, ew.Validators.datetime(0)], fields.OPUDATE.isInvalid],
        ["ALLFREEZEINDICATION", [fields.ALLFREEZEINDICATION.required ? ew.Validators.required(fields.ALLFREEZEINDICATION.caption) : null], fields.ALLFREEZEINDICATION.isInvalid],
        ["ERA", [fields.ERA.required ? ew.Validators.required(fields.ERA.caption) : null], fields.ERA.isInvalid],
        ["PGTA", [fields.PGTA.required ? ew.Validators.required(fields.PGTA.caption) : null], fields.PGTA.isInvalid],
        ["PGD", [fields.PGD.required ? ew.Validators.required(fields.PGD.caption) : null], fields.PGD.isInvalid],
        ["DATEOFET", [fields.DATEOFET.required ? ew.Validators.required(fields.DATEOFET.caption) : null, ew.Validators.datetime(0)], fields.DATEOFET.isInvalid],
        ["ET", [fields.ET.required ? ew.Validators.required(fields.ET.caption) : null], fields.ET.isInvalid],
        ["ESET", [fields.ESET.required ? ew.Validators.required(fields.ESET.caption) : null], fields.ESET.isInvalid],
        ["DOET", [fields.DOET.required ? ew.Validators.required(fields.DOET.caption) : null], fields.DOET.isInvalid],
        ["SEMENPREPARATION", [fields.SEMENPREPARATION.required ? ew.Validators.required(fields.SEMENPREPARATION.caption) : null], fields.SEMENPREPARATION.isInvalid],
        ["REASONFORESET", [fields.REASONFORESET.required ? ew.Validators.required(fields.REASONFORESET.caption) : null], fields.REASONFORESET.isInvalid],
        ["Expectedoocytes", [fields.Expectedoocytes.required ? ew.Validators.required(fields.Expectedoocytes.caption) : null], fields.Expectedoocytes.isInvalid],
        ["StChDate1", [fields.StChDate1.required ? ew.Validators.required(fields.StChDate1.caption) : null, ew.Validators.datetime(0)], fields.StChDate1.isInvalid],
        ["StChDate2", [fields.StChDate2.required ? ew.Validators.required(fields.StChDate2.caption) : null, ew.Validators.datetime(0)], fields.StChDate2.isInvalid],
        ["StChDate3", [fields.StChDate3.required ? ew.Validators.required(fields.StChDate3.caption) : null, ew.Validators.datetime(0)], fields.StChDate3.isInvalid],
        ["StChDate4", [fields.StChDate4.required ? ew.Validators.required(fields.StChDate4.caption) : null, ew.Validators.datetime(0)], fields.StChDate4.isInvalid],
        ["StChDate5", [fields.StChDate5.required ? ew.Validators.required(fields.StChDate5.caption) : null, ew.Validators.datetime(0)], fields.StChDate5.isInvalid],
        ["StChDate6", [fields.StChDate6.required ? ew.Validators.required(fields.StChDate6.caption) : null, ew.Validators.datetime(0)], fields.StChDate6.isInvalid],
        ["StChDate7", [fields.StChDate7.required ? ew.Validators.required(fields.StChDate7.caption) : null, ew.Validators.datetime(0)], fields.StChDate7.isInvalid],
        ["StChDate8", [fields.StChDate8.required ? ew.Validators.required(fields.StChDate8.caption) : null, ew.Validators.datetime(0)], fields.StChDate8.isInvalid],
        ["StChDate9", [fields.StChDate9.required ? ew.Validators.required(fields.StChDate9.caption) : null, ew.Validators.datetime(0)], fields.StChDate9.isInvalid],
        ["StChDate10", [fields.StChDate10.required ? ew.Validators.required(fields.StChDate10.caption) : null, ew.Validators.datetime(0)], fields.StChDate10.isInvalid],
        ["StChDate11", [fields.StChDate11.required ? ew.Validators.required(fields.StChDate11.caption) : null, ew.Validators.datetime(0)], fields.StChDate11.isInvalid],
        ["StChDate12", [fields.StChDate12.required ? ew.Validators.required(fields.StChDate12.caption) : null, ew.Validators.datetime(0)], fields.StChDate12.isInvalid],
        ["StChDate13", [fields.StChDate13.required ? ew.Validators.required(fields.StChDate13.caption) : null, ew.Validators.datetime(0)], fields.StChDate13.isInvalid],
        ["CycleDay1", [fields.CycleDay1.required ? ew.Validators.required(fields.CycleDay1.caption) : null], fields.CycleDay1.isInvalid],
        ["CycleDay2", [fields.CycleDay2.required ? ew.Validators.required(fields.CycleDay2.caption) : null], fields.CycleDay2.isInvalid],
        ["CycleDay3", [fields.CycleDay3.required ? ew.Validators.required(fields.CycleDay3.caption) : null], fields.CycleDay3.isInvalid],
        ["CycleDay4", [fields.CycleDay4.required ? ew.Validators.required(fields.CycleDay4.caption) : null], fields.CycleDay4.isInvalid],
        ["CycleDay5", [fields.CycleDay5.required ? ew.Validators.required(fields.CycleDay5.caption) : null], fields.CycleDay5.isInvalid],
        ["CycleDay6", [fields.CycleDay6.required ? ew.Validators.required(fields.CycleDay6.caption) : null], fields.CycleDay6.isInvalid],
        ["CycleDay7", [fields.CycleDay7.required ? ew.Validators.required(fields.CycleDay7.caption) : null], fields.CycleDay7.isInvalid],
        ["CycleDay8", [fields.CycleDay8.required ? ew.Validators.required(fields.CycleDay8.caption) : null], fields.CycleDay8.isInvalid],
        ["CycleDay9", [fields.CycleDay9.required ? ew.Validators.required(fields.CycleDay9.caption) : null], fields.CycleDay9.isInvalid],
        ["CycleDay10", [fields.CycleDay10.required ? ew.Validators.required(fields.CycleDay10.caption) : null], fields.CycleDay10.isInvalid],
        ["CycleDay11", [fields.CycleDay11.required ? ew.Validators.required(fields.CycleDay11.caption) : null], fields.CycleDay11.isInvalid],
        ["CycleDay12", [fields.CycleDay12.required ? ew.Validators.required(fields.CycleDay12.caption) : null], fields.CycleDay12.isInvalid],
        ["CycleDay13", [fields.CycleDay13.required ? ew.Validators.required(fields.CycleDay13.caption) : null], fields.CycleDay13.isInvalid],
        ["StimulationDay1", [fields.StimulationDay1.required ? ew.Validators.required(fields.StimulationDay1.caption) : null], fields.StimulationDay1.isInvalid],
        ["StimulationDay2", [fields.StimulationDay2.required ? ew.Validators.required(fields.StimulationDay2.caption) : null], fields.StimulationDay2.isInvalid],
        ["StimulationDay3", [fields.StimulationDay3.required ? ew.Validators.required(fields.StimulationDay3.caption) : null], fields.StimulationDay3.isInvalid],
        ["StimulationDay4", [fields.StimulationDay4.required ? ew.Validators.required(fields.StimulationDay4.caption) : null], fields.StimulationDay4.isInvalid],
        ["StimulationDay5", [fields.StimulationDay5.required ? ew.Validators.required(fields.StimulationDay5.caption) : null], fields.StimulationDay5.isInvalid],
        ["StimulationDay6", [fields.StimulationDay6.required ? ew.Validators.required(fields.StimulationDay6.caption) : null], fields.StimulationDay6.isInvalid],
        ["StimulationDay7", [fields.StimulationDay7.required ? ew.Validators.required(fields.StimulationDay7.caption) : null], fields.StimulationDay7.isInvalid],
        ["StimulationDay8", [fields.StimulationDay8.required ? ew.Validators.required(fields.StimulationDay8.caption) : null], fields.StimulationDay8.isInvalid],
        ["StimulationDay9", [fields.StimulationDay9.required ? ew.Validators.required(fields.StimulationDay9.caption) : null], fields.StimulationDay9.isInvalid],
        ["StimulationDay10", [fields.StimulationDay10.required ? ew.Validators.required(fields.StimulationDay10.caption) : null], fields.StimulationDay10.isInvalid],
        ["StimulationDay11", [fields.StimulationDay11.required ? ew.Validators.required(fields.StimulationDay11.caption) : null], fields.StimulationDay11.isInvalid],
        ["StimulationDay12", [fields.StimulationDay12.required ? ew.Validators.required(fields.StimulationDay12.caption) : null], fields.StimulationDay12.isInvalid],
        ["StimulationDay13", [fields.StimulationDay13.required ? ew.Validators.required(fields.StimulationDay13.caption) : null], fields.StimulationDay13.isInvalid],
        ["Tablet1", [fields.Tablet1.required ? ew.Validators.required(fields.Tablet1.caption) : null], fields.Tablet1.isInvalid],
        ["Tablet2", [fields.Tablet2.required ? ew.Validators.required(fields.Tablet2.caption) : null], fields.Tablet2.isInvalid],
        ["Tablet3", [fields.Tablet3.required ? ew.Validators.required(fields.Tablet3.caption) : null], fields.Tablet3.isInvalid],
        ["Tablet4", [fields.Tablet4.required ? ew.Validators.required(fields.Tablet4.caption) : null], fields.Tablet4.isInvalid],
        ["Tablet5", [fields.Tablet5.required ? ew.Validators.required(fields.Tablet5.caption) : null], fields.Tablet5.isInvalid],
        ["Tablet6", [fields.Tablet6.required ? ew.Validators.required(fields.Tablet6.caption) : null], fields.Tablet6.isInvalid],
        ["Tablet7", [fields.Tablet7.required ? ew.Validators.required(fields.Tablet7.caption) : null], fields.Tablet7.isInvalid],
        ["Tablet8", [fields.Tablet8.required ? ew.Validators.required(fields.Tablet8.caption) : null], fields.Tablet8.isInvalid],
        ["Tablet9", [fields.Tablet9.required ? ew.Validators.required(fields.Tablet9.caption) : null], fields.Tablet9.isInvalid],
        ["Tablet10", [fields.Tablet10.required ? ew.Validators.required(fields.Tablet10.caption) : null], fields.Tablet10.isInvalid],
        ["Tablet11", [fields.Tablet11.required ? ew.Validators.required(fields.Tablet11.caption) : null], fields.Tablet11.isInvalid],
        ["Tablet12", [fields.Tablet12.required ? ew.Validators.required(fields.Tablet12.caption) : null], fields.Tablet12.isInvalid],
        ["Tablet13", [fields.Tablet13.required ? ew.Validators.required(fields.Tablet13.caption) : null], fields.Tablet13.isInvalid],
        ["RFSH1", [fields.RFSH1.required ? ew.Validators.required(fields.RFSH1.caption) : null], fields.RFSH1.isInvalid],
        ["RFSH2", [fields.RFSH2.required ? ew.Validators.required(fields.RFSH2.caption) : null], fields.RFSH2.isInvalid],
        ["RFSH3", [fields.RFSH3.required ? ew.Validators.required(fields.RFSH3.caption) : null], fields.RFSH3.isInvalid],
        ["RFSH4", [fields.RFSH4.required ? ew.Validators.required(fields.RFSH4.caption) : null], fields.RFSH4.isInvalid],
        ["RFSH5", [fields.RFSH5.required ? ew.Validators.required(fields.RFSH5.caption) : null], fields.RFSH5.isInvalid],
        ["RFSH6", [fields.RFSH6.required ? ew.Validators.required(fields.RFSH6.caption) : null], fields.RFSH6.isInvalid],
        ["RFSH7", [fields.RFSH7.required ? ew.Validators.required(fields.RFSH7.caption) : null], fields.RFSH7.isInvalid],
        ["RFSH8", [fields.RFSH8.required ? ew.Validators.required(fields.RFSH8.caption) : null], fields.RFSH8.isInvalid],
        ["RFSH9", [fields.RFSH9.required ? ew.Validators.required(fields.RFSH9.caption) : null], fields.RFSH9.isInvalid],
        ["RFSH10", [fields.RFSH10.required ? ew.Validators.required(fields.RFSH10.caption) : null], fields.RFSH10.isInvalid],
        ["RFSH11", [fields.RFSH11.required ? ew.Validators.required(fields.RFSH11.caption) : null], fields.RFSH11.isInvalid],
        ["RFSH12", [fields.RFSH12.required ? ew.Validators.required(fields.RFSH12.caption) : null], fields.RFSH12.isInvalid],
        ["RFSH13", [fields.RFSH13.required ? ew.Validators.required(fields.RFSH13.caption) : null], fields.RFSH13.isInvalid],
        ["HMG1", [fields.HMG1.required ? ew.Validators.required(fields.HMG1.caption) : null], fields.HMG1.isInvalid],
        ["HMG2", [fields.HMG2.required ? ew.Validators.required(fields.HMG2.caption) : null], fields.HMG2.isInvalid],
        ["HMG3", [fields.HMG3.required ? ew.Validators.required(fields.HMG3.caption) : null], fields.HMG3.isInvalid],
        ["HMG4", [fields.HMG4.required ? ew.Validators.required(fields.HMG4.caption) : null], fields.HMG4.isInvalid],
        ["HMG5", [fields.HMG5.required ? ew.Validators.required(fields.HMG5.caption) : null], fields.HMG5.isInvalid],
        ["HMG6", [fields.HMG6.required ? ew.Validators.required(fields.HMG6.caption) : null], fields.HMG6.isInvalid],
        ["HMG7", [fields.HMG7.required ? ew.Validators.required(fields.HMG7.caption) : null], fields.HMG7.isInvalid],
        ["HMG8", [fields.HMG8.required ? ew.Validators.required(fields.HMG8.caption) : null], fields.HMG8.isInvalid],
        ["HMG9", [fields.HMG9.required ? ew.Validators.required(fields.HMG9.caption) : null], fields.HMG9.isInvalid],
        ["HMG10", [fields.HMG10.required ? ew.Validators.required(fields.HMG10.caption) : null], fields.HMG10.isInvalid],
        ["HMG11", [fields.HMG11.required ? ew.Validators.required(fields.HMG11.caption) : null], fields.HMG11.isInvalid],
        ["HMG12", [fields.HMG12.required ? ew.Validators.required(fields.HMG12.caption) : null], fields.HMG12.isInvalid],
        ["HMG13", [fields.HMG13.required ? ew.Validators.required(fields.HMG13.caption) : null], fields.HMG13.isInvalid],
        ["GnRH1", [fields.GnRH1.required ? ew.Validators.required(fields.GnRH1.caption) : null], fields.GnRH1.isInvalid],
        ["GnRH2", [fields.GnRH2.required ? ew.Validators.required(fields.GnRH2.caption) : null], fields.GnRH2.isInvalid],
        ["GnRH3", [fields.GnRH3.required ? ew.Validators.required(fields.GnRH3.caption) : null], fields.GnRH3.isInvalid],
        ["GnRH4", [fields.GnRH4.required ? ew.Validators.required(fields.GnRH4.caption) : null], fields.GnRH4.isInvalid],
        ["GnRH5", [fields.GnRH5.required ? ew.Validators.required(fields.GnRH5.caption) : null], fields.GnRH5.isInvalid],
        ["GnRH6", [fields.GnRH6.required ? ew.Validators.required(fields.GnRH6.caption) : null], fields.GnRH6.isInvalid],
        ["GnRH7", [fields.GnRH7.required ? ew.Validators.required(fields.GnRH7.caption) : null], fields.GnRH7.isInvalid],
        ["GnRH8", [fields.GnRH8.required ? ew.Validators.required(fields.GnRH8.caption) : null], fields.GnRH8.isInvalid],
        ["GnRH9", [fields.GnRH9.required ? ew.Validators.required(fields.GnRH9.caption) : null], fields.GnRH9.isInvalid],
        ["GnRH10", [fields.GnRH10.required ? ew.Validators.required(fields.GnRH10.caption) : null], fields.GnRH10.isInvalid],
        ["GnRH11", [fields.GnRH11.required ? ew.Validators.required(fields.GnRH11.caption) : null], fields.GnRH11.isInvalid],
        ["GnRH12", [fields.GnRH12.required ? ew.Validators.required(fields.GnRH12.caption) : null], fields.GnRH12.isInvalid],
        ["GnRH13", [fields.GnRH13.required ? ew.Validators.required(fields.GnRH13.caption) : null], fields.GnRH13.isInvalid],
        ["E21", [fields.E21.required ? ew.Validators.required(fields.E21.caption) : null], fields.E21.isInvalid],
        ["E22", [fields.E22.required ? ew.Validators.required(fields.E22.caption) : null], fields.E22.isInvalid],
        ["E23", [fields.E23.required ? ew.Validators.required(fields.E23.caption) : null], fields.E23.isInvalid],
        ["E24", [fields.E24.required ? ew.Validators.required(fields.E24.caption) : null], fields.E24.isInvalid],
        ["E25", [fields.E25.required ? ew.Validators.required(fields.E25.caption) : null], fields.E25.isInvalid],
        ["E26", [fields.E26.required ? ew.Validators.required(fields.E26.caption) : null], fields.E26.isInvalid],
        ["E27", [fields.E27.required ? ew.Validators.required(fields.E27.caption) : null], fields.E27.isInvalid],
        ["E28", [fields.E28.required ? ew.Validators.required(fields.E28.caption) : null], fields.E28.isInvalid],
        ["E29", [fields.E29.required ? ew.Validators.required(fields.E29.caption) : null], fields.E29.isInvalid],
        ["E210", [fields.E210.required ? ew.Validators.required(fields.E210.caption) : null], fields.E210.isInvalid],
        ["E211", [fields.E211.required ? ew.Validators.required(fields.E211.caption) : null], fields.E211.isInvalid],
        ["E212", [fields.E212.required ? ew.Validators.required(fields.E212.caption) : null], fields.E212.isInvalid],
        ["E213", [fields.E213.required ? ew.Validators.required(fields.E213.caption) : null], fields.E213.isInvalid],
        ["P41", [fields.P41.required ? ew.Validators.required(fields.P41.caption) : null], fields.P41.isInvalid],
        ["P42", [fields.P42.required ? ew.Validators.required(fields.P42.caption) : null], fields.P42.isInvalid],
        ["P43", [fields.P43.required ? ew.Validators.required(fields.P43.caption) : null], fields.P43.isInvalid],
        ["P44", [fields.P44.required ? ew.Validators.required(fields.P44.caption) : null], fields.P44.isInvalid],
        ["P45", [fields.P45.required ? ew.Validators.required(fields.P45.caption) : null], fields.P45.isInvalid],
        ["P46", [fields.P46.required ? ew.Validators.required(fields.P46.caption) : null], fields.P46.isInvalid],
        ["P47", [fields.P47.required ? ew.Validators.required(fields.P47.caption) : null], fields.P47.isInvalid],
        ["P48", [fields.P48.required ? ew.Validators.required(fields.P48.caption) : null], fields.P48.isInvalid],
        ["P49", [fields.P49.required ? ew.Validators.required(fields.P49.caption) : null], fields.P49.isInvalid],
        ["P410", [fields.P410.required ? ew.Validators.required(fields.P410.caption) : null], fields.P410.isInvalid],
        ["P411", [fields.P411.required ? ew.Validators.required(fields.P411.caption) : null], fields.P411.isInvalid],
        ["P412", [fields.P412.required ? ew.Validators.required(fields.P412.caption) : null], fields.P412.isInvalid],
        ["P413", [fields.P413.required ? ew.Validators.required(fields.P413.caption) : null], fields.P413.isInvalid],
        ["USGRt1", [fields.USGRt1.required ? ew.Validators.required(fields.USGRt1.caption) : null], fields.USGRt1.isInvalid],
        ["USGRt2", [fields.USGRt2.required ? ew.Validators.required(fields.USGRt2.caption) : null], fields.USGRt2.isInvalid],
        ["USGRt3", [fields.USGRt3.required ? ew.Validators.required(fields.USGRt3.caption) : null], fields.USGRt3.isInvalid],
        ["USGRt4", [fields.USGRt4.required ? ew.Validators.required(fields.USGRt4.caption) : null], fields.USGRt4.isInvalid],
        ["USGRt5", [fields.USGRt5.required ? ew.Validators.required(fields.USGRt5.caption) : null], fields.USGRt5.isInvalid],
        ["USGRt6", [fields.USGRt6.required ? ew.Validators.required(fields.USGRt6.caption) : null], fields.USGRt6.isInvalid],
        ["USGRt7", [fields.USGRt7.required ? ew.Validators.required(fields.USGRt7.caption) : null], fields.USGRt7.isInvalid],
        ["USGRt8", [fields.USGRt8.required ? ew.Validators.required(fields.USGRt8.caption) : null], fields.USGRt8.isInvalid],
        ["USGRt9", [fields.USGRt9.required ? ew.Validators.required(fields.USGRt9.caption) : null], fields.USGRt9.isInvalid],
        ["USGRt10", [fields.USGRt10.required ? ew.Validators.required(fields.USGRt10.caption) : null], fields.USGRt10.isInvalid],
        ["USGRt11", [fields.USGRt11.required ? ew.Validators.required(fields.USGRt11.caption) : null], fields.USGRt11.isInvalid],
        ["USGRt12", [fields.USGRt12.required ? ew.Validators.required(fields.USGRt12.caption) : null], fields.USGRt12.isInvalid],
        ["USGRt13", [fields.USGRt13.required ? ew.Validators.required(fields.USGRt13.caption) : null], fields.USGRt13.isInvalid],
        ["USGLt1", [fields.USGLt1.required ? ew.Validators.required(fields.USGLt1.caption) : null], fields.USGLt1.isInvalid],
        ["USGLt2", [fields.USGLt2.required ? ew.Validators.required(fields.USGLt2.caption) : null], fields.USGLt2.isInvalid],
        ["USGLt3", [fields.USGLt3.required ? ew.Validators.required(fields.USGLt3.caption) : null], fields.USGLt3.isInvalid],
        ["USGLt4", [fields.USGLt4.required ? ew.Validators.required(fields.USGLt4.caption) : null], fields.USGLt4.isInvalid],
        ["USGLt5", [fields.USGLt5.required ? ew.Validators.required(fields.USGLt5.caption) : null], fields.USGLt5.isInvalid],
        ["USGLt6", [fields.USGLt6.required ? ew.Validators.required(fields.USGLt6.caption) : null], fields.USGLt6.isInvalid],
        ["USGLt7", [fields.USGLt7.required ? ew.Validators.required(fields.USGLt7.caption) : null], fields.USGLt7.isInvalid],
        ["USGLt8", [fields.USGLt8.required ? ew.Validators.required(fields.USGLt8.caption) : null], fields.USGLt8.isInvalid],
        ["USGLt9", [fields.USGLt9.required ? ew.Validators.required(fields.USGLt9.caption) : null], fields.USGLt9.isInvalid],
        ["USGLt10", [fields.USGLt10.required ? ew.Validators.required(fields.USGLt10.caption) : null], fields.USGLt10.isInvalid],
        ["USGLt11", [fields.USGLt11.required ? ew.Validators.required(fields.USGLt11.caption) : null], fields.USGLt11.isInvalid],
        ["USGLt12", [fields.USGLt12.required ? ew.Validators.required(fields.USGLt12.caption) : null], fields.USGLt12.isInvalid],
        ["USGLt13", [fields.USGLt13.required ? ew.Validators.required(fields.USGLt13.caption) : null], fields.USGLt13.isInvalid],
        ["EM1", [fields.EM1.required ? ew.Validators.required(fields.EM1.caption) : null], fields.EM1.isInvalid],
        ["EM2", [fields.EM2.required ? ew.Validators.required(fields.EM2.caption) : null], fields.EM2.isInvalid],
        ["EM3", [fields.EM3.required ? ew.Validators.required(fields.EM3.caption) : null], fields.EM3.isInvalid],
        ["EM4", [fields.EM4.required ? ew.Validators.required(fields.EM4.caption) : null], fields.EM4.isInvalid],
        ["EM5", [fields.EM5.required ? ew.Validators.required(fields.EM5.caption) : null], fields.EM5.isInvalid],
        ["EM6", [fields.EM6.required ? ew.Validators.required(fields.EM6.caption) : null], fields.EM6.isInvalid],
        ["EM7", [fields.EM7.required ? ew.Validators.required(fields.EM7.caption) : null], fields.EM7.isInvalid],
        ["EM8", [fields.EM8.required ? ew.Validators.required(fields.EM8.caption) : null], fields.EM8.isInvalid],
        ["EM9", [fields.EM9.required ? ew.Validators.required(fields.EM9.caption) : null], fields.EM9.isInvalid],
        ["EM10", [fields.EM10.required ? ew.Validators.required(fields.EM10.caption) : null], fields.EM10.isInvalid],
        ["EM11", [fields.EM11.required ? ew.Validators.required(fields.EM11.caption) : null], fields.EM11.isInvalid],
        ["EM12", [fields.EM12.required ? ew.Validators.required(fields.EM12.caption) : null], fields.EM12.isInvalid],
        ["EM13", [fields.EM13.required ? ew.Validators.required(fields.EM13.caption) : null], fields.EM13.isInvalid],
        ["Others1", [fields.Others1.required ? ew.Validators.required(fields.Others1.caption) : null], fields.Others1.isInvalid],
        ["Others2", [fields.Others2.required ? ew.Validators.required(fields.Others2.caption) : null], fields.Others2.isInvalid],
        ["Others3", [fields.Others3.required ? ew.Validators.required(fields.Others3.caption) : null], fields.Others3.isInvalid],
        ["Others4", [fields.Others4.required ? ew.Validators.required(fields.Others4.caption) : null], fields.Others4.isInvalid],
        ["Others5", [fields.Others5.required ? ew.Validators.required(fields.Others5.caption) : null], fields.Others5.isInvalid],
        ["Others6", [fields.Others6.required ? ew.Validators.required(fields.Others6.caption) : null], fields.Others6.isInvalid],
        ["Others7", [fields.Others7.required ? ew.Validators.required(fields.Others7.caption) : null], fields.Others7.isInvalid],
        ["Others8", [fields.Others8.required ? ew.Validators.required(fields.Others8.caption) : null], fields.Others8.isInvalid],
        ["Others9", [fields.Others9.required ? ew.Validators.required(fields.Others9.caption) : null], fields.Others9.isInvalid],
        ["Others10", [fields.Others10.required ? ew.Validators.required(fields.Others10.caption) : null], fields.Others10.isInvalid],
        ["Others11", [fields.Others11.required ? ew.Validators.required(fields.Others11.caption) : null], fields.Others11.isInvalid],
        ["Others12", [fields.Others12.required ? ew.Validators.required(fields.Others12.caption) : null], fields.Others12.isInvalid],
        ["Others13", [fields.Others13.required ? ew.Validators.required(fields.Others13.caption) : null], fields.Others13.isInvalid],
        ["DR1", [fields.DR1.required ? ew.Validators.required(fields.DR1.caption) : null], fields.DR1.isInvalid],
        ["DR2", [fields.DR2.required ? ew.Validators.required(fields.DR2.caption) : null], fields.DR2.isInvalid],
        ["DR3", [fields.DR3.required ? ew.Validators.required(fields.DR3.caption) : null], fields.DR3.isInvalid],
        ["DR4", [fields.DR4.required ? ew.Validators.required(fields.DR4.caption) : null], fields.DR4.isInvalid],
        ["DR5", [fields.DR5.required ? ew.Validators.required(fields.DR5.caption) : null], fields.DR5.isInvalid],
        ["DR6", [fields.DR6.required ? ew.Validators.required(fields.DR6.caption) : null], fields.DR6.isInvalid],
        ["DR7", [fields.DR7.required ? ew.Validators.required(fields.DR7.caption) : null], fields.DR7.isInvalid],
        ["DR8", [fields.DR8.required ? ew.Validators.required(fields.DR8.caption) : null], fields.DR8.isInvalid],
        ["DR9", [fields.DR9.required ? ew.Validators.required(fields.DR9.caption) : null], fields.DR9.isInvalid],
        ["DR10", [fields.DR10.required ? ew.Validators.required(fields.DR10.caption) : null], fields.DR10.isInvalid],
        ["DR11", [fields.DR11.required ? ew.Validators.required(fields.DR11.caption) : null], fields.DR11.isInvalid],
        ["DR12", [fields.DR12.required ? ew.Validators.required(fields.DR12.caption) : null], fields.DR12.isInvalid],
        ["DR13", [fields.DR13.required ? ew.Validators.required(fields.DR13.caption) : null], fields.DR13.isInvalid],
        ["DOCTORRESPONSIBLE", [fields.DOCTORRESPONSIBLE.required ? ew.Validators.required(fields.DOCTORRESPONSIBLE.caption) : null], fields.DOCTORRESPONSIBLE.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["Convert", [fields.Convert.required ? ew.Validators.required(fields.Convert.caption) : null], fields.Convert.isInvalid],
        ["Consultant", [fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["InseminatinTechnique", [fields.InseminatinTechnique.required ? ew.Validators.required(fields.InseminatinTechnique.caption) : null], fields.InseminatinTechnique.isInvalid],
        ["IndicationForART", [fields.IndicationForART.required ? ew.Validators.required(fields.IndicationForART.caption) : null], fields.IndicationForART.isInvalid],
        ["Hysteroscopy", [fields.Hysteroscopy.required ? ew.Validators.required(fields.Hysteroscopy.caption) : null], fields.Hysteroscopy.isInvalid],
        ["EndometrialScratching", [fields.EndometrialScratching.required ? ew.Validators.required(fields.EndometrialScratching.caption) : null], fields.EndometrialScratching.isInvalid],
        ["TrialCannulation", [fields.TrialCannulation.required ? ew.Validators.required(fields.TrialCannulation.caption) : null], fields.TrialCannulation.isInvalid],
        ["CYCLETYPE", [fields.CYCLETYPE.required ? ew.Validators.required(fields.CYCLETYPE.caption) : null], fields.CYCLETYPE.isInvalid],
        ["HRTCYCLE", [fields.HRTCYCLE.required ? ew.Validators.required(fields.HRTCYCLE.caption) : null], fields.HRTCYCLE.isInvalid],
        ["OralEstrogenDosage", [fields.OralEstrogenDosage.required ? ew.Validators.required(fields.OralEstrogenDosage.caption) : null], fields.OralEstrogenDosage.isInvalid],
        ["VaginalEstrogen", [fields.VaginalEstrogen.required ? ew.Validators.required(fields.VaginalEstrogen.caption) : null], fields.VaginalEstrogen.isInvalid],
        ["GCSF", [fields.GCSF.required ? ew.Validators.required(fields.GCSF.caption) : null], fields.GCSF.isInvalid],
        ["ActivatedPRP", [fields.ActivatedPRP.required ? ew.Validators.required(fields.ActivatedPRP.caption) : null], fields.ActivatedPRP.isInvalid],
        ["UCLcm", [fields.UCLcm.required ? ew.Validators.required(fields.UCLcm.caption) : null], fields.UCLcm.isInvalid],
        ["DATOFEMBRYOTRANSFER", [fields.DATOFEMBRYOTRANSFER.required ? ew.Validators.required(fields.DATOFEMBRYOTRANSFER.caption) : null, ew.Validators.datetime(0)], fields.DATOFEMBRYOTRANSFER.isInvalid],
        ["DAYOFEMBRYOTRANSFER", [fields.DAYOFEMBRYOTRANSFER.required ? ew.Validators.required(fields.DAYOFEMBRYOTRANSFER.caption) : null], fields.DAYOFEMBRYOTRANSFER.isInvalid],
        ["NOOFEMBRYOSTHAWED", [fields.NOOFEMBRYOSTHAWED.required ? ew.Validators.required(fields.NOOFEMBRYOSTHAWED.caption) : null], fields.NOOFEMBRYOSTHAWED.isInvalid],
        ["NOOFEMBRYOSTRANSFERRED", [fields.NOOFEMBRYOSTRANSFERRED.required ? ew.Validators.required(fields.NOOFEMBRYOSTRANSFERRED.caption) : null], fields.NOOFEMBRYOSTRANSFERRED.isInvalid],
        ["DAYOFEMBRYOS", [fields.DAYOFEMBRYOS.required ? ew.Validators.required(fields.DAYOFEMBRYOS.caption) : null], fields.DAYOFEMBRYOS.isInvalid],
        ["CRYOPRESERVEDEMBRYOS", [fields.CRYOPRESERVEDEMBRYOS.required ? ew.Validators.required(fields.CRYOPRESERVEDEMBRYOS.caption) : null], fields.CRYOPRESERVEDEMBRYOS.isInvalid],
        ["ViaAdmin", [fields.ViaAdmin.required ? ew.Validators.required(fields.ViaAdmin.caption) : null], fields.ViaAdmin.isInvalid],
        ["ViaStartDateTime", [fields.ViaStartDateTime.required ? ew.Validators.required(fields.ViaStartDateTime.caption) : null, ew.Validators.datetime(0)], fields.ViaStartDateTime.isInvalid],
        ["ViaDose", [fields.ViaDose.required ? ew.Validators.required(fields.ViaDose.caption) : null], fields.ViaDose.isInvalid],
        ["AllFreeze", [fields.AllFreeze.required ? ew.Validators.required(fields.AllFreeze.caption) : null], fields.AllFreeze.isInvalid],
        ["TreatmentCancel", [fields.TreatmentCancel.required ? ew.Validators.required(fields.TreatmentCancel.caption) : null], fields.TreatmentCancel.isInvalid],
        ["Reason", [fields.Reason.required ? ew.Validators.required(fields.Reason.caption) : null], fields.Reason.isInvalid],
        ["ProgesteroneAdmin", [fields.ProgesteroneAdmin.required ? ew.Validators.required(fields.ProgesteroneAdmin.caption) : null], fields.ProgesteroneAdmin.isInvalid],
        ["ProgesteroneStart", [fields.ProgesteroneStart.required ? ew.Validators.required(fields.ProgesteroneStart.caption) : null], fields.ProgesteroneStart.isInvalid],
        ["ProgesteroneDose", [fields.ProgesteroneDose.required ? ew.Validators.required(fields.ProgesteroneDose.caption) : null], fields.ProgesteroneDose.isInvalid],
        ["StChDate14", [fields.StChDate14.required ? ew.Validators.required(fields.StChDate14.caption) : null, ew.Validators.datetime(0)], fields.StChDate14.isInvalid],
        ["StChDate15", [fields.StChDate15.required ? ew.Validators.required(fields.StChDate15.caption) : null, ew.Validators.datetime(0)], fields.StChDate15.isInvalid],
        ["StChDate16", [fields.StChDate16.required ? ew.Validators.required(fields.StChDate16.caption) : null, ew.Validators.datetime(0)], fields.StChDate16.isInvalid],
        ["StChDate17", [fields.StChDate17.required ? ew.Validators.required(fields.StChDate17.caption) : null, ew.Validators.datetime(0)], fields.StChDate17.isInvalid],
        ["StChDate18", [fields.StChDate18.required ? ew.Validators.required(fields.StChDate18.caption) : null, ew.Validators.datetime(0)], fields.StChDate18.isInvalid],
        ["StChDate19", [fields.StChDate19.required ? ew.Validators.required(fields.StChDate19.caption) : null, ew.Validators.datetime(0)], fields.StChDate19.isInvalid],
        ["StChDate20", [fields.StChDate20.required ? ew.Validators.required(fields.StChDate20.caption) : null, ew.Validators.datetime(0)], fields.StChDate20.isInvalid],
        ["StChDate21", [fields.StChDate21.required ? ew.Validators.required(fields.StChDate21.caption) : null, ew.Validators.datetime(0)], fields.StChDate21.isInvalid],
        ["StChDate22", [fields.StChDate22.required ? ew.Validators.required(fields.StChDate22.caption) : null, ew.Validators.datetime(0)], fields.StChDate22.isInvalid],
        ["StChDate23", [fields.StChDate23.required ? ew.Validators.required(fields.StChDate23.caption) : null, ew.Validators.datetime(0)], fields.StChDate23.isInvalid],
        ["StChDate24", [fields.StChDate24.required ? ew.Validators.required(fields.StChDate24.caption) : null, ew.Validators.datetime(0)], fields.StChDate24.isInvalid],
        ["StChDate25", [fields.StChDate25.required ? ew.Validators.required(fields.StChDate25.caption) : null, ew.Validators.datetime(0)], fields.StChDate25.isInvalid],
        ["CycleDay14", [fields.CycleDay14.required ? ew.Validators.required(fields.CycleDay14.caption) : null], fields.CycleDay14.isInvalid],
        ["CycleDay15", [fields.CycleDay15.required ? ew.Validators.required(fields.CycleDay15.caption) : null], fields.CycleDay15.isInvalid],
        ["CycleDay16", [fields.CycleDay16.required ? ew.Validators.required(fields.CycleDay16.caption) : null], fields.CycleDay16.isInvalid],
        ["CycleDay17", [fields.CycleDay17.required ? ew.Validators.required(fields.CycleDay17.caption) : null], fields.CycleDay17.isInvalid],
        ["CycleDay18", [fields.CycleDay18.required ? ew.Validators.required(fields.CycleDay18.caption) : null], fields.CycleDay18.isInvalid],
        ["CycleDay19", [fields.CycleDay19.required ? ew.Validators.required(fields.CycleDay19.caption) : null], fields.CycleDay19.isInvalid],
        ["CycleDay20", [fields.CycleDay20.required ? ew.Validators.required(fields.CycleDay20.caption) : null], fields.CycleDay20.isInvalid],
        ["CycleDay21", [fields.CycleDay21.required ? ew.Validators.required(fields.CycleDay21.caption) : null], fields.CycleDay21.isInvalid],
        ["CycleDay22", [fields.CycleDay22.required ? ew.Validators.required(fields.CycleDay22.caption) : null], fields.CycleDay22.isInvalid],
        ["CycleDay23", [fields.CycleDay23.required ? ew.Validators.required(fields.CycleDay23.caption) : null], fields.CycleDay23.isInvalid],
        ["CycleDay24", [fields.CycleDay24.required ? ew.Validators.required(fields.CycleDay24.caption) : null], fields.CycleDay24.isInvalid],
        ["CycleDay25", [fields.CycleDay25.required ? ew.Validators.required(fields.CycleDay25.caption) : null], fields.CycleDay25.isInvalid],
        ["StimulationDay14", [fields.StimulationDay14.required ? ew.Validators.required(fields.StimulationDay14.caption) : null], fields.StimulationDay14.isInvalid],
        ["StimulationDay15", [fields.StimulationDay15.required ? ew.Validators.required(fields.StimulationDay15.caption) : null], fields.StimulationDay15.isInvalid],
        ["StimulationDay16", [fields.StimulationDay16.required ? ew.Validators.required(fields.StimulationDay16.caption) : null], fields.StimulationDay16.isInvalid],
        ["StimulationDay17", [fields.StimulationDay17.required ? ew.Validators.required(fields.StimulationDay17.caption) : null], fields.StimulationDay17.isInvalid],
        ["StimulationDay18", [fields.StimulationDay18.required ? ew.Validators.required(fields.StimulationDay18.caption) : null], fields.StimulationDay18.isInvalid],
        ["StimulationDay19", [fields.StimulationDay19.required ? ew.Validators.required(fields.StimulationDay19.caption) : null], fields.StimulationDay19.isInvalid],
        ["StimulationDay20", [fields.StimulationDay20.required ? ew.Validators.required(fields.StimulationDay20.caption) : null], fields.StimulationDay20.isInvalid],
        ["StimulationDay21", [fields.StimulationDay21.required ? ew.Validators.required(fields.StimulationDay21.caption) : null], fields.StimulationDay21.isInvalid],
        ["StimulationDay22", [fields.StimulationDay22.required ? ew.Validators.required(fields.StimulationDay22.caption) : null], fields.StimulationDay22.isInvalid],
        ["StimulationDay23", [fields.StimulationDay23.required ? ew.Validators.required(fields.StimulationDay23.caption) : null], fields.StimulationDay23.isInvalid],
        ["StimulationDay24", [fields.StimulationDay24.required ? ew.Validators.required(fields.StimulationDay24.caption) : null], fields.StimulationDay24.isInvalid],
        ["StimulationDay25", [fields.StimulationDay25.required ? ew.Validators.required(fields.StimulationDay25.caption) : null], fields.StimulationDay25.isInvalid],
        ["Tablet14", [fields.Tablet14.required ? ew.Validators.required(fields.Tablet14.caption) : null], fields.Tablet14.isInvalid],
        ["Tablet15", [fields.Tablet15.required ? ew.Validators.required(fields.Tablet15.caption) : null], fields.Tablet15.isInvalid],
        ["Tablet16", [fields.Tablet16.required ? ew.Validators.required(fields.Tablet16.caption) : null], fields.Tablet16.isInvalid],
        ["Tablet17", [fields.Tablet17.required ? ew.Validators.required(fields.Tablet17.caption) : null], fields.Tablet17.isInvalid],
        ["Tablet18", [fields.Tablet18.required ? ew.Validators.required(fields.Tablet18.caption) : null], fields.Tablet18.isInvalid],
        ["Tablet19", [fields.Tablet19.required ? ew.Validators.required(fields.Tablet19.caption) : null], fields.Tablet19.isInvalid],
        ["Tablet20", [fields.Tablet20.required ? ew.Validators.required(fields.Tablet20.caption) : null], fields.Tablet20.isInvalid],
        ["Tablet21", [fields.Tablet21.required ? ew.Validators.required(fields.Tablet21.caption) : null], fields.Tablet21.isInvalid],
        ["Tablet22", [fields.Tablet22.required ? ew.Validators.required(fields.Tablet22.caption) : null], fields.Tablet22.isInvalid],
        ["Tablet23", [fields.Tablet23.required ? ew.Validators.required(fields.Tablet23.caption) : null], fields.Tablet23.isInvalid],
        ["Tablet24", [fields.Tablet24.required ? ew.Validators.required(fields.Tablet24.caption) : null], fields.Tablet24.isInvalid],
        ["Tablet25", [fields.Tablet25.required ? ew.Validators.required(fields.Tablet25.caption) : null], fields.Tablet25.isInvalid],
        ["RFSH14", [fields.RFSH14.required ? ew.Validators.required(fields.RFSH14.caption) : null], fields.RFSH14.isInvalid],
        ["RFSH15", [fields.RFSH15.required ? ew.Validators.required(fields.RFSH15.caption) : null], fields.RFSH15.isInvalid],
        ["RFSH16", [fields.RFSH16.required ? ew.Validators.required(fields.RFSH16.caption) : null], fields.RFSH16.isInvalid],
        ["RFSH17", [fields.RFSH17.required ? ew.Validators.required(fields.RFSH17.caption) : null], fields.RFSH17.isInvalid],
        ["RFSH18", [fields.RFSH18.required ? ew.Validators.required(fields.RFSH18.caption) : null], fields.RFSH18.isInvalid],
        ["RFSH19", [fields.RFSH19.required ? ew.Validators.required(fields.RFSH19.caption) : null], fields.RFSH19.isInvalid],
        ["RFSH20", [fields.RFSH20.required ? ew.Validators.required(fields.RFSH20.caption) : null], fields.RFSH20.isInvalid],
        ["RFSH21", [fields.RFSH21.required ? ew.Validators.required(fields.RFSH21.caption) : null], fields.RFSH21.isInvalid],
        ["RFSH22", [fields.RFSH22.required ? ew.Validators.required(fields.RFSH22.caption) : null], fields.RFSH22.isInvalid],
        ["RFSH23", [fields.RFSH23.required ? ew.Validators.required(fields.RFSH23.caption) : null], fields.RFSH23.isInvalid],
        ["RFSH24", [fields.RFSH24.required ? ew.Validators.required(fields.RFSH24.caption) : null], fields.RFSH24.isInvalid],
        ["RFSH25", [fields.RFSH25.required ? ew.Validators.required(fields.RFSH25.caption) : null], fields.RFSH25.isInvalid],
        ["HMG14", [fields.HMG14.required ? ew.Validators.required(fields.HMG14.caption) : null], fields.HMG14.isInvalid],
        ["HMG15", [fields.HMG15.required ? ew.Validators.required(fields.HMG15.caption) : null], fields.HMG15.isInvalid],
        ["HMG16", [fields.HMG16.required ? ew.Validators.required(fields.HMG16.caption) : null], fields.HMG16.isInvalid],
        ["HMG17", [fields.HMG17.required ? ew.Validators.required(fields.HMG17.caption) : null], fields.HMG17.isInvalid],
        ["HMG18", [fields.HMG18.required ? ew.Validators.required(fields.HMG18.caption) : null], fields.HMG18.isInvalid],
        ["HMG19", [fields.HMG19.required ? ew.Validators.required(fields.HMG19.caption) : null], fields.HMG19.isInvalid],
        ["HMG20", [fields.HMG20.required ? ew.Validators.required(fields.HMG20.caption) : null], fields.HMG20.isInvalid],
        ["HMG21", [fields.HMG21.required ? ew.Validators.required(fields.HMG21.caption) : null], fields.HMG21.isInvalid],
        ["HMG22", [fields.HMG22.required ? ew.Validators.required(fields.HMG22.caption) : null], fields.HMG22.isInvalid],
        ["HMG23", [fields.HMG23.required ? ew.Validators.required(fields.HMG23.caption) : null], fields.HMG23.isInvalid],
        ["HMG24", [fields.HMG24.required ? ew.Validators.required(fields.HMG24.caption) : null], fields.HMG24.isInvalid],
        ["HMG25", [fields.HMG25.required ? ew.Validators.required(fields.HMG25.caption) : null], fields.HMG25.isInvalid],
        ["GnRH14", [fields.GnRH14.required ? ew.Validators.required(fields.GnRH14.caption) : null], fields.GnRH14.isInvalid],
        ["GnRH15", [fields.GnRH15.required ? ew.Validators.required(fields.GnRH15.caption) : null], fields.GnRH15.isInvalid],
        ["GnRH16", [fields.GnRH16.required ? ew.Validators.required(fields.GnRH16.caption) : null], fields.GnRH16.isInvalid],
        ["GnRH17", [fields.GnRH17.required ? ew.Validators.required(fields.GnRH17.caption) : null], fields.GnRH17.isInvalid],
        ["GnRH18", [fields.GnRH18.required ? ew.Validators.required(fields.GnRH18.caption) : null], fields.GnRH18.isInvalid],
        ["GnRH19", [fields.GnRH19.required ? ew.Validators.required(fields.GnRH19.caption) : null], fields.GnRH19.isInvalid],
        ["GnRH20", [fields.GnRH20.required ? ew.Validators.required(fields.GnRH20.caption) : null], fields.GnRH20.isInvalid],
        ["GnRH21", [fields.GnRH21.required ? ew.Validators.required(fields.GnRH21.caption) : null], fields.GnRH21.isInvalid],
        ["GnRH22", [fields.GnRH22.required ? ew.Validators.required(fields.GnRH22.caption) : null], fields.GnRH22.isInvalid],
        ["GnRH23", [fields.GnRH23.required ? ew.Validators.required(fields.GnRH23.caption) : null], fields.GnRH23.isInvalid],
        ["GnRH24", [fields.GnRH24.required ? ew.Validators.required(fields.GnRH24.caption) : null], fields.GnRH24.isInvalid],
        ["GnRH25", [fields.GnRH25.required ? ew.Validators.required(fields.GnRH25.caption) : null], fields.GnRH25.isInvalid],
        ["P414", [fields.P414.required ? ew.Validators.required(fields.P414.caption) : null], fields.P414.isInvalid],
        ["P415", [fields.P415.required ? ew.Validators.required(fields.P415.caption) : null], fields.P415.isInvalid],
        ["P416", [fields.P416.required ? ew.Validators.required(fields.P416.caption) : null], fields.P416.isInvalid],
        ["P417", [fields.P417.required ? ew.Validators.required(fields.P417.caption) : null], fields.P417.isInvalid],
        ["P418", [fields.P418.required ? ew.Validators.required(fields.P418.caption) : null], fields.P418.isInvalid],
        ["P419", [fields.P419.required ? ew.Validators.required(fields.P419.caption) : null], fields.P419.isInvalid],
        ["P420", [fields.P420.required ? ew.Validators.required(fields.P420.caption) : null], fields.P420.isInvalid],
        ["P421", [fields.P421.required ? ew.Validators.required(fields.P421.caption) : null], fields.P421.isInvalid],
        ["P422", [fields.P422.required ? ew.Validators.required(fields.P422.caption) : null], fields.P422.isInvalid],
        ["P423", [fields.P423.required ? ew.Validators.required(fields.P423.caption) : null], fields.P423.isInvalid],
        ["P424", [fields.P424.required ? ew.Validators.required(fields.P424.caption) : null], fields.P424.isInvalid],
        ["P425", [fields.P425.required ? ew.Validators.required(fields.P425.caption) : null], fields.P425.isInvalid],
        ["USGRt14", [fields.USGRt14.required ? ew.Validators.required(fields.USGRt14.caption) : null], fields.USGRt14.isInvalid],
        ["USGRt15", [fields.USGRt15.required ? ew.Validators.required(fields.USGRt15.caption) : null], fields.USGRt15.isInvalid],
        ["USGRt16", [fields.USGRt16.required ? ew.Validators.required(fields.USGRt16.caption) : null], fields.USGRt16.isInvalid],
        ["USGRt17", [fields.USGRt17.required ? ew.Validators.required(fields.USGRt17.caption) : null], fields.USGRt17.isInvalid],
        ["USGRt18", [fields.USGRt18.required ? ew.Validators.required(fields.USGRt18.caption) : null], fields.USGRt18.isInvalid],
        ["USGRt19", [fields.USGRt19.required ? ew.Validators.required(fields.USGRt19.caption) : null], fields.USGRt19.isInvalid],
        ["USGRt20", [fields.USGRt20.required ? ew.Validators.required(fields.USGRt20.caption) : null], fields.USGRt20.isInvalid],
        ["USGRt21", [fields.USGRt21.required ? ew.Validators.required(fields.USGRt21.caption) : null], fields.USGRt21.isInvalid],
        ["USGRt22", [fields.USGRt22.required ? ew.Validators.required(fields.USGRt22.caption) : null], fields.USGRt22.isInvalid],
        ["USGRt23", [fields.USGRt23.required ? ew.Validators.required(fields.USGRt23.caption) : null], fields.USGRt23.isInvalid],
        ["USGRt24", [fields.USGRt24.required ? ew.Validators.required(fields.USGRt24.caption) : null], fields.USGRt24.isInvalid],
        ["USGRt25", [fields.USGRt25.required ? ew.Validators.required(fields.USGRt25.caption) : null], fields.USGRt25.isInvalid],
        ["USGLt14", [fields.USGLt14.required ? ew.Validators.required(fields.USGLt14.caption) : null], fields.USGLt14.isInvalid],
        ["USGLt15", [fields.USGLt15.required ? ew.Validators.required(fields.USGLt15.caption) : null], fields.USGLt15.isInvalid],
        ["USGLt16", [fields.USGLt16.required ? ew.Validators.required(fields.USGLt16.caption) : null], fields.USGLt16.isInvalid],
        ["USGLt17", [fields.USGLt17.required ? ew.Validators.required(fields.USGLt17.caption) : null], fields.USGLt17.isInvalid],
        ["USGLt18", [fields.USGLt18.required ? ew.Validators.required(fields.USGLt18.caption) : null], fields.USGLt18.isInvalid],
        ["USGLt19", [fields.USGLt19.required ? ew.Validators.required(fields.USGLt19.caption) : null], fields.USGLt19.isInvalid],
        ["USGLt20", [fields.USGLt20.required ? ew.Validators.required(fields.USGLt20.caption) : null], fields.USGLt20.isInvalid],
        ["USGLt21", [fields.USGLt21.required ? ew.Validators.required(fields.USGLt21.caption) : null], fields.USGLt21.isInvalid],
        ["USGLt22", [fields.USGLt22.required ? ew.Validators.required(fields.USGLt22.caption) : null], fields.USGLt22.isInvalid],
        ["USGLt23", [fields.USGLt23.required ? ew.Validators.required(fields.USGLt23.caption) : null], fields.USGLt23.isInvalid],
        ["USGLt24", [fields.USGLt24.required ? ew.Validators.required(fields.USGLt24.caption) : null], fields.USGLt24.isInvalid],
        ["USGLt25", [fields.USGLt25.required ? ew.Validators.required(fields.USGLt25.caption) : null], fields.USGLt25.isInvalid],
        ["EM14", [fields.EM14.required ? ew.Validators.required(fields.EM14.caption) : null], fields.EM14.isInvalid],
        ["EM15", [fields.EM15.required ? ew.Validators.required(fields.EM15.caption) : null], fields.EM15.isInvalid],
        ["EM16", [fields.EM16.required ? ew.Validators.required(fields.EM16.caption) : null], fields.EM16.isInvalid],
        ["EM17", [fields.EM17.required ? ew.Validators.required(fields.EM17.caption) : null], fields.EM17.isInvalid],
        ["EM18", [fields.EM18.required ? ew.Validators.required(fields.EM18.caption) : null], fields.EM18.isInvalid],
        ["EM19", [fields.EM19.required ? ew.Validators.required(fields.EM19.caption) : null], fields.EM19.isInvalid],
        ["EM20", [fields.EM20.required ? ew.Validators.required(fields.EM20.caption) : null], fields.EM20.isInvalid],
        ["EM21", [fields.EM21.required ? ew.Validators.required(fields.EM21.caption) : null], fields.EM21.isInvalid],
        ["EM22", [fields.EM22.required ? ew.Validators.required(fields.EM22.caption) : null], fields.EM22.isInvalid],
        ["EM23", [fields.EM23.required ? ew.Validators.required(fields.EM23.caption) : null], fields.EM23.isInvalid],
        ["EM24", [fields.EM24.required ? ew.Validators.required(fields.EM24.caption) : null], fields.EM24.isInvalid],
        ["EM25", [fields.EM25.required ? ew.Validators.required(fields.EM25.caption) : null], fields.EM25.isInvalid],
        ["Others14", [fields.Others14.required ? ew.Validators.required(fields.Others14.caption) : null], fields.Others14.isInvalid],
        ["Others15", [fields.Others15.required ? ew.Validators.required(fields.Others15.caption) : null], fields.Others15.isInvalid],
        ["Others16", [fields.Others16.required ? ew.Validators.required(fields.Others16.caption) : null], fields.Others16.isInvalid],
        ["Others17", [fields.Others17.required ? ew.Validators.required(fields.Others17.caption) : null], fields.Others17.isInvalid],
        ["Others18", [fields.Others18.required ? ew.Validators.required(fields.Others18.caption) : null], fields.Others18.isInvalid],
        ["Others19", [fields.Others19.required ? ew.Validators.required(fields.Others19.caption) : null], fields.Others19.isInvalid],
        ["Others20", [fields.Others20.required ? ew.Validators.required(fields.Others20.caption) : null], fields.Others20.isInvalid],
        ["Others21", [fields.Others21.required ? ew.Validators.required(fields.Others21.caption) : null], fields.Others21.isInvalid],
        ["Others22", [fields.Others22.required ? ew.Validators.required(fields.Others22.caption) : null], fields.Others22.isInvalid],
        ["Others23", [fields.Others23.required ? ew.Validators.required(fields.Others23.caption) : null], fields.Others23.isInvalid],
        ["Others24", [fields.Others24.required ? ew.Validators.required(fields.Others24.caption) : null], fields.Others24.isInvalid],
        ["Others25", [fields.Others25.required ? ew.Validators.required(fields.Others25.caption) : null], fields.Others25.isInvalid],
        ["DR14", [fields.DR14.required ? ew.Validators.required(fields.DR14.caption) : null], fields.DR14.isInvalid],
        ["DR15", [fields.DR15.required ? ew.Validators.required(fields.DR15.caption) : null], fields.DR15.isInvalid],
        ["DR16", [fields.DR16.required ? ew.Validators.required(fields.DR16.caption) : null], fields.DR16.isInvalid],
        ["DR17", [fields.DR17.required ? ew.Validators.required(fields.DR17.caption) : null], fields.DR17.isInvalid],
        ["DR18", [fields.DR18.required ? ew.Validators.required(fields.DR18.caption) : null], fields.DR18.isInvalid],
        ["DR19", [fields.DR19.required ? ew.Validators.required(fields.DR19.caption) : null], fields.DR19.isInvalid],
        ["DR20", [fields.DR20.required ? ew.Validators.required(fields.DR20.caption) : null], fields.DR20.isInvalid],
        ["DR21", [fields.DR21.required ? ew.Validators.required(fields.DR21.caption) : null], fields.DR21.isInvalid],
        ["DR22", [fields.DR22.required ? ew.Validators.required(fields.DR22.caption) : null], fields.DR22.isInvalid],
        ["DR23", [fields.DR23.required ? ew.Validators.required(fields.DR23.caption) : null], fields.DR23.isInvalid],
        ["DR24", [fields.DR24.required ? ew.Validators.required(fields.DR24.caption) : null], fields.DR24.isInvalid],
        ["DR25", [fields.DR25.required ? ew.Validators.required(fields.DR25.caption) : null], fields.DR25.isInvalid],
        ["E214", [fields.E214.required ? ew.Validators.required(fields.E214.caption) : null], fields.E214.isInvalid],
        ["E215", [fields.E215.required ? ew.Validators.required(fields.E215.caption) : null], fields.E215.isInvalid],
        ["E216", [fields.E216.required ? ew.Validators.required(fields.E216.caption) : null], fields.E216.isInvalid],
        ["E217", [fields.E217.required ? ew.Validators.required(fields.E217.caption) : null], fields.E217.isInvalid],
        ["E218", [fields.E218.required ? ew.Validators.required(fields.E218.caption) : null], fields.E218.isInvalid],
        ["E219", [fields.E219.required ? ew.Validators.required(fields.E219.caption) : null], fields.E219.isInvalid],
        ["E220", [fields.E220.required ? ew.Validators.required(fields.E220.caption) : null], fields.E220.isInvalid],
        ["E221", [fields.E221.required ? ew.Validators.required(fields.E221.caption) : null], fields.E221.isInvalid],
        ["E222", [fields.E222.required ? ew.Validators.required(fields.E222.caption) : null], fields.E222.isInvalid],
        ["E223", [fields.E223.required ? ew.Validators.required(fields.E223.caption) : null], fields.E223.isInvalid],
        ["E224", [fields.E224.required ? ew.Validators.required(fields.E224.caption) : null], fields.E224.isInvalid],
        ["E225", [fields.E225.required ? ew.Validators.required(fields.E225.caption) : null], fields.E225.isInvalid],
        ["EEETTTDTE", [fields.EEETTTDTE.required ? ew.Validators.required(fields.EEETTTDTE.caption) : null, ew.Validators.datetime(0)], fields.EEETTTDTE.isInvalid],
        ["bhcgdate", [fields.bhcgdate.required ? ew.Validators.required(fields.bhcgdate.caption) : null, ew.Validators.datetime(0)], fields.bhcgdate.isInvalid],
        ["TUBAL_PATENCY", [fields.TUBAL_PATENCY.required ? ew.Validators.required(fields.TUBAL_PATENCY.caption) : null], fields.TUBAL_PATENCY.isInvalid],
        ["HSG", [fields.HSG.required ? ew.Validators.required(fields.HSG.caption) : null], fields.HSG.isInvalid],
        ["DHL", [fields.DHL.required ? ew.Validators.required(fields.DHL.caption) : null], fields.DHL.isInvalid],
        ["UTERINE_PROBLEMS", [fields.UTERINE_PROBLEMS.required ? ew.Validators.required(fields.UTERINE_PROBLEMS.caption) : null], fields.UTERINE_PROBLEMS.isInvalid],
        ["W_COMORBIDS", [fields.W_COMORBIDS.required ? ew.Validators.required(fields.W_COMORBIDS.caption) : null], fields.W_COMORBIDS.isInvalid],
        ["H_COMORBIDS", [fields.H_COMORBIDS.required ? ew.Validators.required(fields.H_COMORBIDS.caption) : null], fields.H_COMORBIDS.isInvalid],
        ["SEXUAL_DYSFUNCTION", [fields.SEXUAL_DYSFUNCTION.required ? ew.Validators.required(fields.SEXUAL_DYSFUNCTION.caption) : null], fields.SEXUAL_DYSFUNCTION.isInvalid],
        ["TABLETS", [fields.TABLETS.required ? ew.Validators.required(fields.TABLETS.caption) : null], fields.TABLETS.isInvalid],
        ["FOLLICLE_STATUS", [fields.FOLLICLE_STATUS.required ? ew.Validators.required(fields.FOLLICLE_STATUS.caption) : null], fields.FOLLICLE_STATUS.isInvalid],
        ["NUMBER_OF_IUI", [fields.NUMBER_OF_IUI.required ? ew.Validators.required(fields.NUMBER_OF_IUI.caption) : null], fields.NUMBER_OF_IUI.isInvalid],
        ["PROCEDURE", [fields.PROCEDURE.required ? ew.Validators.required(fields.PROCEDURE.caption) : null], fields.PROCEDURE.isInvalid],
        ["LUTEAL_SUPPORT", [fields.LUTEAL_SUPPORT.required ? ew.Validators.required(fields.LUTEAL_SUPPORT.caption) : null], fields.LUTEAL_SUPPORT.isInvalid],
        ["SPECIFIC_MATERNAL_PROBLEMS", [fields.SPECIFIC_MATERNAL_PROBLEMS.required ? ew.Validators.required(fields.SPECIFIC_MATERNAL_PROBLEMS.caption) : null], fields.SPECIFIC_MATERNAL_PROBLEMS.isInvalid],
        ["ONGOING_PREG", [fields.ONGOING_PREG.required ? ew.Validators.required(fields.ONGOING_PREG.caption) : null], fields.ONGOING_PREG.isInvalid],
        ["EDD_Date", [fields.EDD_Date.required ? ew.Validators.required(fields.EDD_Date.caption) : null, ew.Validators.datetime(0)], fields.EDD_Date.isInvalid]
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
<form name="fivf_stimulation_chartedit" id="fivf_stimulation_chartedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_stimulation_chart_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_stimulation_chart" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <div id="r_ARTCycle" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ARTCycle" for="x_ARTCycle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ARTCycle->caption() ?><?= $Page->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ARTCycle">
<input type="<?= $Page->ARTCycle->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ARTCycle" name="x_ARTCycle" id="x_ARTCycle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>" value="<?= $Page->ARTCycle->EditValue ?>"<?= $Page->ARTCycle->editAttributes() ?> aria-describedby="x_ARTCycle_help">
<?= $Page->ARTCycle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FemaleFactor->Visible) { // FemaleFactor ?>
    <div id="r_FemaleFactor" class="form-group row">
        <label id="elh_ivf_stimulation_chart_FemaleFactor" for="x_FemaleFactor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FemaleFactor->caption() ?><?= $Page->FemaleFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FemaleFactor->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_FemaleFactor">
<input type="<?= $Page->FemaleFactor->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_FemaleFactor" name="x_FemaleFactor" id="x_FemaleFactor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FemaleFactor->getPlaceHolder()) ?>" value="<?= $Page->FemaleFactor->EditValue ?>"<?= $Page->FemaleFactor->editAttributes() ?> aria-describedby="x_FemaleFactor_help">
<?= $Page->FemaleFactor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FemaleFactor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaleFactor->Visible) { // MaleFactor ?>
    <div id="r_MaleFactor" class="form-group row">
        <label id="elh_ivf_stimulation_chart_MaleFactor" for="x_MaleFactor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MaleFactor->caption() ?><?= $Page->MaleFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaleFactor->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_MaleFactor">
<input type="<?= $Page->MaleFactor->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_MaleFactor" name="x_MaleFactor" id="x_MaleFactor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MaleFactor->getPlaceHolder()) ?>" value="<?= $Page->MaleFactor->EditValue ?>"<?= $Page->MaleFactor->editAttributes() ?> aria-describedby="x_MaleFactor_help">
<?= $Page->MaleFactor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaleFactor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
    <div id="r_Protocol" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Protocol" for="x_Protocol" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Protocol->caption() ?><?= $Page->Protocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Protocol->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Protocol">
<input type="<?= $Page->Protocol->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Protocol" name="x_Protocol" id="x_Protocol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Protocol->getPlaceHolder()) ?>" value="<?= $Page->Protocol->EditValue ?>"<?= $Page->Protocol->editAttributes() ?> aria-describedby="x_Protocol_help">
<?= $Page->Protocol->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Protocol->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SemenFrozen->Visible) { // SemenFrozen ?>
    <div id="r_SemenFrozen" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SemenFrozen" for="x_SemenFrozen" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SemenFrozen->caption() ?><?= $Page->SemenFrozen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SemenFrozen->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SemenFrozen">
<input type="<?= $Page->SemenFrozen->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_SemenFrozen" name="x_SemenFrozen" id="x_SemenFrozen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SemenFrozen->getPlaceHolder()) ?>" value="<?= $Page->SemenFrozen->EditValue ?>"<?= $Page->SemenFrozen->editAttributes() ?> aria-describedby="x_SemenFrozen_help">
<?= $Page->SemenFrozen->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SemenFrozen->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
    <div id="r_A4ICSICycle" class="form-group row">
        <label id="elh_ivf_stimulation_chart_A4ICSICycle" for="x_A4ICSICycle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A4ICSICycle->caption() ?><?= $Page->A4ICSICycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A4ICSICycle->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_A4ICSICycle">
<input type="<?= $Page->A4ICSICycle->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_A4ICSICycle" name="x_A4ICSICycle" id="x_A4ICSICycle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A4ICSICycle->getPlaceHolder()) ?>" value="<?= $Page->A4ICSICycle->EditValue ?>"<?= $Page->A4ICSICycle->editAttributes() ?> aria-describedby="x_A4ICSICycle_help">
<?= $Page->A4ICSICycle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A4ICSICycle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
    <div id="r_TotalICSICycle" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TotalICSICycle" for="x_TotalICSICycle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalICSICycle->caption() ?><?= $Page->TotalICSICycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalICSICycle->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TotalICSICycle">
<input type="<?= $Page->TotalICSICycle->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TotalICSICycle" name="x_TotalICSICycle" id="x_TotalICSICycle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalICSICycle->getPlaceHolder()) ?>" value="<?= $Page->TotalICSICycle->EditValue ?>"<?= $Page->TotalICSICycle->editAttributes() ?> aria-describedby="x_TotalICSICycle_help">
<?= $Page->TotalICSICycle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalICSICycle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
    <div id="r_TypeOfInfertility" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TypeOfInfertility" for="x_TypeOfInfertility" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TypeOfInfertility->caption() ?><?= $Page->TypeOfInfertility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeOfInfertility->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TypeOfInfertility">
<input type="<?= $Page->TypeOfInfertility->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TypeOfInfertility" name="x_TypeOfInfertility" id="x_TypeOfInfertility" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TypeOfInfertility->getPlaceHolder()) ?>" value="<?= $Page->TypeOfInfertility->EditValue ?>"<?= $Page->TypeOfInfertility->editAttributes() ?> aria-describedby="x_TypeOfInfertility_help">
<?= $Page->TypeOfInfertility->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypeOfInfertility->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <div id="r_Duration" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Duration" for="x_Duration" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Duration->caption() ?><?= $Page->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Duration->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Duration">
<input type="<?= $Page->Duration->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Duration->getPlaceHolder()) ?>" value="<?= $Page->Duration->EditValue ?>"<?= $Page->Duration->editAttributes() ?> aria-describedby="x_Duration_help">
<?= $Page->Duration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Duration->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label id="elh_ivf_stimulation_chart_LMP" for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LMP->caption() ?><?= $Page->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_LMP">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_LMP" name="x_LMP" id="x_LMP" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?> aria-describedby="x_LMP_help">
<?= $Page->LMP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage() ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
    <div id="r_RelevantHistory" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RelevantHistory" for="x_RelevantHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RelevantHistory->caption() ?><?= $Page->RelevantHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RelevantHistory->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RelevantHistory">
<input type="<?= $Page->RelevantHistory->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RelevantHistory" name="x_RelevantHistory" id="x_RelevantHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RelevantHistory->getPlaceHolder()) ?>" value="<?= $Page->RelevantHistory->EditValue ?>"<?= $Page->RelevantHistory->editAttributes() ?> aria-describedby="x_RelevantHistory_help">
<?= $Page->RelevantHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RelevantHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUICycles->Visible) { // IUICycles ?>
    <div id="r_IUICycles" class="form-group row">
        <label id="elh_ivf_stimulation_chart_IUICycles" for="x_IUICycles" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IUICycles->caption() ?><?= $Page->IUICycles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUICycles->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_IUICycles">
<input type="<?= $Page->IUICycles->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_IUICycles" name="x_IUICycles" id="x_IUICycles" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IUICycles->getPlaceHolder()) ?>" value="<?= $Page->IUICycles->EditValue ?>"<?= $Page->IUICycles->editAttributes() ?> aria-describedby="x_IUICycles_help">
<?= $Page->IUICycles->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUICycles->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AFC->Visible) { // AFC ?>
    <div id="r_AFC" class="form-group row">
        <label id="elh_ivf_stimulation_chart_AFC" for="x_AFC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AFC->caption() ?><?= $Page->AFC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AFC->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_AFC">
<input type="<?= $Page->AFC->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_AFC" name="x_AFC" id="x_AFC" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AFC->getPlaceHolder()) ?>" value="<?= $Page->AFC->EditValue ?>"<?= $Page->AFC->editAttributes() ?> aria-describedby="x_AFC_help">
<?= $Page->AFC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AFC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AMH->Visible) { // AMH ?>
    <div id="r_AMH" class="form-group row">
        <label id="elh_ivf_stimulation_chart_AMH" for="x_AMH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AMH->caption() ?><?= $Page->AMH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AMH->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_AMH">
<input type="<?= $Page->AMH->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_AMH" name="x_AMH" id="x_AMH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AMH->getPlaceHolder()) ?>" value="<?= $Page->AMH->EditValue ?>"<?= $Page->AMH->editAttributes() ?> aria-describedby="x_AMH_help">
<?= $Page->AMH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AMH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
    <div id="r_FBMI" class="form-group row">
        <label id="elh_ivf_stimulation_chart_FBMI" for="x_FBMI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FBMI->caption() ?><?= $Page->FBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBMI->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_FBMI">
<input type="<?= $Page->FBMI->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_FBMI" name="x_FBMI" id="x_FBMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FBMI->getPlaceHolder()) ?>" value="<?= $Page->FBMI->EditValue ?>"<?= $Page->FBMI->editAttributes() ?> aria-describedby="x_FBMI_help">
<?= $Page->FBMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBMI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
    <div id="r_MBMI" class="form-group row">
        <label id="elh_ivf_stimulation_chart_MBMI" for="x_MBMI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MBMI->caption() ?><?= $Page->MBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MBMI->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_MBMI">
<input type="<?= $Page->MBMI->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_MBMI" name="x_MBMI" id="x_MBMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MBMI->getPlaceHolder()) ?>" value="<?= $Page->MBMI->EditValue ?>"<?= $Page->MBMI->editAttributes() ?> aria-describedby="x_MBMI_help">
<?= $Page->MBMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MBMI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
    <div id="r_OvarianVolumeRT" class="form-group row">
        <label id="elh_ivf_stimulation_chart_OvarianVolumeRT" for="x_OvarianVolumeRT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OvarianVolumeRT->caption() ?><?= $Page->OvarianVolumeRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OvarianVolumeRT->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_OvarianVolumeRT">
<input type="<?= $Page->OvarianVolumeRT->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_OvarianVolumeRT" name="x_OvarianVolumeRT" id="x_OvarianVolumeRT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OvarianVolumeRT->getPlaceHolder()) ?>" value="<?= $Page->OvarianVolumeRT->EditValue ?>"<?= $Page->OvarianVolumeRT->editAttributes() ?> aria-describedby="x_OvarianVolumeRT_help">
<?= $Page->OvarianVolumeRT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OvarianVolumeRT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
    <div id="r_OvarianVolumeLT" class="form-group row">
        <label id="elh_ivf_stimulation_chart_OvarianVolumeLT" for="x_OvarianVolumeLT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OvarianVolumeLT->caption() ?><?= $Page->OvarianVolumeLT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OvarianVolumeLT->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_OvarianVolumeLT">
<input type="<?= $Page->OvarianVolumeLT->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_OvarianVolumeLT" name="x_OvarianVolumeLT" id="x_OvarianVolumeLT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OvarianVolumeLT->getPlaceHolder()) ?>" value="<?= $Page->OvarianVolumeLT->EditValue ?>"<?= $Page->OvarianVolumeLT->editAttributes() ?> aria-describedby="x_OvarianVolumeLT_help">
<?= $Page->OvarianVolumeLT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OvarianVolumeLT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
    <div id="r_DAYSOFSTIMULATION" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION" for="x_DAYSOFSTIMULATION" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DAYSOFSTIMULATION->caption() ?><?= $Page->DAYSOFSTIMULATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAYSOFSTIMULATION->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DAYSOFSTIMULATION">
<input type="<?= $Page->DAYSOFSTIMULATION->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DAYSOFSTIMULATION" name="x_DAYSOFSTIMULATION" id="x_DAYSOFSTIMULATION" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DAYSOFSTIMULATION->getPlaceHolder()) ?>" value="<?= $Page->DAYSOFSTIMULATION->EditValue ?>"<?= $Page->DAYSOFSTIMULATION->editAttributes() ?> aria-describedby="x_DAYSOFSTIMULATION_help">
<?= $Page->DAYSOFSTIMULATION->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAYSOFSTIMULATION->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
    <div id="r_DOSEOFGONADOTROPINS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS" for="x_DOSEOFGONADOTROPINS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DOSEOFGONADOTROPINS->caption() ?><?= $Page->DOSEOFGONADOTROPINS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<input type="<?= $Page->DOSEOFGONADOTROPINS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DOSEOFGONADOTROPINS" name="x_DOSEOFGONADOTROPINS" id="x_DOSEOFGONADOTROPINS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DOSEOFGONADOTROPINS->getPlaceHolder()) ?>" value="<?= $Page->DOSEOFGONADOTROPINS->EditValue ?>"<?= $Page->DOSEOFGONADOTROPINS->editAttributes() ?> aria-describedby="x_DOSEOFGONADOTROPINS_help">
<?= $Page->DOSEOFGONADOTROPINS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DOSEOFGONADOTROPINS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
    <div id="r_INJTYPE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_INJTYPE" for="x_INJTYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->INJTYPE->caption() ?><?= $Page->INJTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJTYPE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_INJTYPE">
<input type="<?= $Page->INJTYPE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_INJTYPE" name="x_INJTYPE" id="x_INJTYPE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INJTYPE->getPlaceHolder()) ?>" value="<?= $Page->INJTYPE->EditValue ?>"<?= $Page->INJTYPE->editAttributes() ?> aria-describedby="x_INJTYPE_help">
<?= $Page->INJTYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INJTYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
    <div id="r_ANTAGONISTDAYS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ANTAGONISTDAYS" for="x_ANTAGONISTDAYS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ANTAGONISTDAYS->caption() ?><?= $Page->ANTAGONISTDAYS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANTAGONISTDAYS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ANTAGONISTDAYS">
<input type="<?= $Page->ANTAGONISTDAYS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ANTAGONISTDAYS" name="x_ANTAGONISTDAYS" id="x_ANTAGONISTDAYS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANTAGONISTDAYS->getPlaceHolder()) ?>" value="<?= $Page->ANTAGONISTDAYS->EditValue ?>"<?= $Page->ANTAGONISTDAYS->editAttributes() ?> aria-describedby="x_ANTAGONISTDAYS_help">
<?= $Page->ANTAGONISTDAYS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANTAGONISTDAYS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
    <div id="r_ANTAGONISTSTARTDAY" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY" for="x_ANTAGONISTSTARTDAY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ANTAGONISTSTARTDAY->caption() ?><?= $Page->ANTAGONISTSTARTDAY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<input type="<?= $Page->ANTAGONISTSTARTDAY->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ANTAGONISTSTARTDAY" name="x_ANTAGONISTSTARTDAY" id="x_ANTAGONISTSTARTDAY" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANTAGONISTSTARTDAY->getPlaceHolder()) ?>" value="<?= $Page->ANTAGONISTSTARTDAY->EditValue ?>"<?= $Page->ANTAGONISTSTARTDAY->editAttributes() ?> aria-describedby="x_ANTAGONISTSTARTDAY_help">
<?= $Page->ANTAGONISTSTARTDAY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANTAGONISTSTARTDAY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
    <div id="r_GROWTHHORMONE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GROWTHHORMONE" for="x_GROWTHHORMONE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GROWTHHORMONE->caption() ?><?= $Page->GROWTHHORMONE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GROWTHHORMONE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GROWTHHORMONE">
<input type="<?= $Page->GROWTHHORMONE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GROWTHHORMONE" name="x_GROWTHHORMONE" id="x_GROWTHHORMONE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GROWTHHORMONE->getPlaceHolder()) ?>" value="<?= $Page->GROWTHHORMONE->EditValue ?>"<?= $Page->GROWTHHORMONE->editAttributes() ?> aria-describedby="x_GROWTHHORMONE_help">
<?= $Page->GROWTHHORMONE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GROWTHHORMONE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRETREATMENT->Visible) { // PRETREATMENT ?>
    <div id="r_PRETREATMENT" class="form-group row">
        <label id="elh_ivf_stimulation_chart_PRETREATMENT" for="x_PRETREATMENT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRETREATMENT->caption() ?><?= $Page->PRETREATMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRETREATMENT->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_PRETREATMENT">
<input type="<?= $Page->PRETREATMENT->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_PRETREATMENT" name="x_PRETREATMENT" id="x_PRETREATMENT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PRETREATMENT->getPlaceHolder()) ?>" value="<?= $Page->PRETREATMENT->EditValue ?>"<?= $Page->PRETREATMENT->editAttributes() ?> aria-describedby="x_PRETREATMENT_help">
<?= $Page->PRETREATMENT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRETREATMENT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
    <div id="r_SerumP4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SerumP4" for="x_SerumP4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SerumP4->caption() ?><?= $Page->SerumP4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerumP4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SerumP4">
<input type="<?= $Page->SerumP4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_SerumP4" name="x_SerumP4" id="x_SerumP4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SerumP4->getPlaceHolder()) ?>" value="<?= $Page->SerumP4->EditValue ?>"<?= $Page->SerumP4->editAttributes() ?> aria-describedby="x_SerumP4_help">
<?= $Page->SerumP4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SerumP4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
    <div id="r_FORT" class="form-group row">
        <label id="elh_ivf_stimulation_chart_FORT" for="x_FORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FORT->caption() ?><?= $Page->FORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FORT->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_FORT">
<input type="<?= $Page->FORT->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_FORT" name="x_FORT" id="x_FORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FORT->getPlaceHolder()) ?>" value="<?= $Page->FORT->EditValue ?>"<?= $Page->FORT->editAttributes() ?> aria-describedby="x_FORT_help">
<?= $Page->FORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MedicalFactors->Visible) { // MedicalFactors ?>
    <div id="r_MedicalFactors" class="form-group row">
        <label id="elh_ivf_stimulation_chart_MedicalFactors" for="x_MedicalFactors" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MedicalFactors->caption() ?><?= $Page->MedicalFactors->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MedicalFactors->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_MedicalFactors">
<input type="<?= $Page->MedicalFactors->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_MedicalFactors" name="x_MedicalFactors" id="x_MedicalFactors" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MedicalFactors->getPlaceHolder()) ?>" value="<?= $Page->MedicalFactors->EditValue ?>"<?= $Page->MedicalFactors->editAttributes() ?> aria-describedby="x_MedicalFactors_help">
<?= $Page->MedicalFactors->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MedicalFactors->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SCDate->Visible) { // SCDate ?>
    <div id="r_SCDate" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SCDate" for="x_SCDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SCDate->caption() ?><?= $Page->SCDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCDate->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SCDate">
<input type="<?= $Page->SCDate->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_SCDate" name="x_SCDate" id="x_SCDate" placeholder="<?= HtmlEncode($Page->SCDate->getPlaceHolder()) ?>" value="<?= $Page->SCDate->EditValue ?>"<?= $Page->SCDate->editAttributes() ?> aria-describedby="x_SCDate_help">
<?= $Page->SCDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SCDate->getErrorMessage() ?></div>
<?php if (!$Page->SCDate->ReadOnly && !$Page->SCDate->Disabled && !isset($Page->SCDate->EditAttrs["readonly"]) && !isset($Page->SCDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_SCDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
    <div id="r_OvarianSurgery" class="form-group row">
        <label id="elh_ivf_stimulation_chart_OvarianSurgery" for="x_OvarianSurgery" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OvarianSurgery->caption() ?><?= $Page->OvarianSurgery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OvarianSurgery->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_OvarianSurgery">
<input type="<?= $Page->OvarianSurgery->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_OvarianSurgery" name="x_OvarianSurgery" id="x_OvarianSurgery" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OvarianSurgery->getPlaceHolder()) ?>" value="<?= $Page->OvarianSurgery->EditValue ?>"<?= $Page->OvarianSurgery->editAttributes() ?> aria-describedby="x_OvarianSurgery_help">
<?= $Page->OvarianSurgery->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OvarianSurgery->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
    <div id="r_PreProcedureOrder" class="form-group row">
        <label id="elh_ivf_stimulation_chart_PreProcedureOrder" for="x_PreProcedureOrder" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreProcedureOrder->caption() ?><?= $Page->PreProcedureOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreProcedureOrder->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_PreProcedureOrder">
<input type="<?= $Page->PreProcedureOrder->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_PreProcedureOrder" name="x_PreProcedureOrder" id="x_PreProcedureOrder" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreProcedureOrder->getPlaceHolder()) ?>" value="<?= $Page->PreProcedureOrder->EditValue ?>"<?= $Page->PreProcedureOrder->editAttributes() ?> aria-describedby="x_PreProcedureOrder_help">
<?= $Page->PreProcedureOrder->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreProcedureOrder->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
    <div id="r_TRIGGERR" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TRIGGERR" for="x_TRIGGERR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TRIGGERR->caption() ?><?= $Page->TRIGGERR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TRIGGERR->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TRIGGERR">
<input type="<?= $Page->TRIGGERR->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TRIGGERR" name="x_TRIGGERR" id="x_TRIGGERR" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->TRIGGERR->getPlaceHolder()) ?>" value="<?= $Page->TRIGGERR->EditValue ?>"<?= $Page->TRIGGERR->editAttributes() ?> aria-describedby="x_TRIGGERR_help">
<?= $Page->TRIGGERR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TRIGGERR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
    <div id="r_TRIGGERDATE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TRIGGERDATE" for="x_TRIGGERDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TRIGGERDATE->caption() ?><?= $Page->TRIGGERDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TRIGGERDATE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TRIGGERDATE">
<input type="<?= $Page->TRIGGERDATE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TRIGGERDATE" name="x_TRIGGERDATE" id="x_TRIGGERDATE" placeholder="<?= HtmlEncode($Page->TRIGGERDATE->getPlaceHolder()) ?>" value="<?= $Page->TRIGGERDATE->EditValue ?>"<?= $Page->TRIGGERDATE->editAttributes() ?> aria-describedby="x_TRIGGERDATE_help">
<?= $Page->TRIGGERDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TRIGGERDATE->getErrorMessage() ?></div>
<?php if (!$Page->TRIGGERDATE->ReadOnly && !$Page->TRIGGERDATE->Disabled && !isset($Page->TRIGGERDATE->EditAttrs["readonly"]) && !isset($Page->TRIGGERDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_TRIGGERDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
    <div id="r_ATHOMEorCLINIC" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ATHOMEorCLINIC" for="x_ATHOMEorCLINIC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ATHOMEorCLINIC->caption() ?><?= $Page->ATHOMEorCLINIC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ATHOMEorCLINIC->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ATHOMEorCLINIC">
<input type="<?= $Page->ATHOMEorCLINIC->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ATHOMEorCLINIC" name="x_ATHOMEorCLINIC" id="x_ATHOMEorCLINIC" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ATHOMEorCLINIC->getPlaceHolder()) ?>" value="<?= $Page->ATHOMEorCLINIC->EditValue ?>"<?= $Page->ATHOMEorCLINIC->editAttributes() ?> aria-describedby="x_ATHOMEorCLINIC_help">
<?= $Page->ATHOMEorCLINIC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ATHOMEorCLINIC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
    <div id="r_OPUDATE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_OPUDATE" for="x_OPUDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OPUDATE->caption() ?><?= $Page->OPUDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPUDATE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_OPUDATE">
<input type="<?= $Page->OPUDATE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_OPUDATE" name="x_OPUDATE" id="x_OPUDATE" placeholder="<?= HtmlEncode($Page->OPUDATE->getPlaceHolder()) ?>" value="<?= $Page->OPUDATE->EditValue ?>"<?= $Page->OPUDATE->editAttributes() ?> aria-describedby="x_OPUDATE_help">
<?= $Page->OPUDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPUDATE->getErrorMessage() ?></div>
<?php if (!$Page->OPUDATE->ReadOnly && !$Page->OPUDATE->Disabled && !isset($Page->OPUDATE->EditAttrs["readonly"]) && !isset($Page->OPUDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_OPUDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
    <div id="r_ALLFREEZEINDICATION" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION" for="x_ALLFREEZEINDICATION" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ALLFREEZEINDICATION->caption() ?><?= $Page->ALLFREEZEINDICATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ALLFREEZEINDICATION->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ALLFREEZEINDICATION">
<input type="<?= $Page->ALLFREEZEINDICATION->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ALLFREEZEINDICATION" name="x_ALLFREEZEINDICATION" id="x_ALLFREEZEINDICATION" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ALLFREEZEINDICATION->getPlaceHolder()) ?>" value="<?= $Page->ALLFREEZEINDICATION->EditValue ?>"<?= $Page->ALLFREEZEINDICATION->editAttributes() ?> aria-describedby="x_ALLFREEZEINDICATION_help">
<?= $Page->ALLFREEZEINDICATION->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ALLFREEZEINDICATION->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
    <div id="r_ERA" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ERA" for="x_ERA" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ERA->caption() ?><?= $Page->ERA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ERA->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ERA">
<input type="<?= $Page->ERA->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ERA" name="x_ERA" id="x_ERA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ERA->getPlaceHolder()) ?>" value="<?= $Page->ERA->EditValue ?>"<?= $Page->ERA->editAttributes() ?> aria-describedby="x_ERA_help">
<?= $Page->ERA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ERA->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PGTA->Visible) { // PGTA ?>
    <div id="r_PGTA" class="form-group row">
        <label id="elh_ivf_stimulation_chart_PGTA" for="x_PGTA" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PGTA->caption() ?><?= $Page->PGTA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PGTA->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_PGTA">
<input type="<?= $Page->PGTA->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_PGTA" name="x_PGTA" id="x_PGTA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PGTA->getPlaceHolder()) ?>" value="<?= $Page->PGTA->EditValue ?>"<?= $Page->PGTA->editAttributes() ?> aria-describedby="x_PGTA_help">
<?= $Page->PGTA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PGTA->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PGD->Visible) { // PGD ?>
    <div id="r_PGD" class="form-group row">
        <label id="elh_ivf_stimulation_chart_PGD" for="x_PGD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PGD->caption() ?><?= $Page->PGD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PGD->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_PGD">
<input type="<?= $Page->PGD->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_PGD" name="x_PGD" id="x_PGD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PGD->getPlaceHolder()) ?>" value="<?= $Page->PGD->EditValue ?>"<?= $Page->PGD->editAttributes() ?> aria-describedby="x_PGD_help">
<?= $Page->PGD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PGD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DATEOFET->Visible) { // DATEOFET ?>
    <div id="r_DATEOFET" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DATEOFET" for="x_DATEOFET" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DATEOFET->caption() ?><?= $Page->DATEOFET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DATEOFET->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DATEOFET">
<input type="<?= $Page->DATEOFET->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DATEOFET" name="x_DATEOFET" id="x_DATEOFET" placeholder="<?= HtmlEncode($Page->DATEOFET->getPlaceHolder()) ?>" value="<?= $Page->DATEOFET->EditValue ?>"<?= $Page->DATEOFET->editAttributes() ?> aria-describedby="x_DATEOFET_help">
<?= $Page->DATEOFET->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DATEOFET->getErrorMessage() ?></div>
<?php if (!$Page->DATEOFET->ReadOnly && !$Page->DATEOFET->Disabled && !isset($Page->DATEOFET->EditAttrs["readonly"]) && !isset($Page->DATEOFET->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_DATEOFET", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ET->Visible) { // ET ?>
    <div id="r_ET" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ET" for="x_ET" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ET->caption() ?><?= $Page->ET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ET->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ET">
<input type="<?= $Page->ET->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ET" name="x_ET" id="x_ET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ET->getPlaceHolder()) ?>" value="<?= $Page->ET->EditValue ?>"<?= $Page->ET->editAttributes() ?> aria-describedby="x_ET_help">
<?= $Page->ET->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ET->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ESET->Visible) { // ESET ?>
    <div id="r_ESET" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ESET" for="x_ESET" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ESET->caption() ?><?= $Page->ESET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ESET->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ESET">
<input type="<?= $Page->ESET->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ESET" name="x_ESET" id="x_ESET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ESET->getPlaceHolder()) ?>" value="<?= $Page->ESET->EditValue ?>"<?= $Page->ESET->editAttributes() ?> aria-describedby="x_ESET_help">
<?= $Page->ESET->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ESET->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DOET->Visible) { // DOET ?>
    <div id="r_DOET" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DOET" for="x_DOET" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DOET->caption() ?><?= $Page->DOET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DOET->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DOET">
<input type="<?= $Page->DOET->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DOET" name="x_DOET" id="x_DOET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DOET->getPlaceHolder()) ?>" value="<?= $Page->DOET->EditValue ?>"<?= $Page->DOET->editAttributes() ?> aria-describedby="x_DOET_help">
<?= $Page->DOET->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DOET->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
    <div id="r_SEMENPREPARATION" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SEMENPREPARATION" for="x_SEMENPREPARATION" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SEMENPREPARATION->caption() ?><?= $Page->SEMENPREPARATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SEMENPREPARATION->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SEMENPREPARATION">
<input type="<?= $Page->SEMENPREPARATION->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_SEMENPREPARATION" name="x_SEMENPREPARATION" id="x_SEMENPREPARATION" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SEMENPREPARATION->getPlaceHolder()) ?>" value="<?= $Page->SEMENPREPARATION->EditValue ?>"<?= $Page->SEMENPREPARATION->editAttributes() ?> aria-describedby="x_SEMENPREPARATION_help">
<?= $Page->SEMENPREPARATION->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SEMENPREPARATION->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->REASONFORESET->Visible) { // REASONFORESET ?>
    <div id="r_REASONFORESET" class="form-group row">
        <label id="elh_ivf_stimulation_chart_REASONFORESET" for="x_REASONFORESET" class="<?= $Page->LeftColumnClass ?>"><?= $Page->REASONFORESET->caption() ?><?= $Page->REASONFORESET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->REASONFORESET->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_REASONFORESET">
<input type="<?= $Page->REASONFORESET->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_REASONFORESET" name="x_REASONFORESET" id="x_REASONFORESET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->REASONFORESET->getPlaceHolder()) ?>" value="<?= $Page->REASONFORESET->EditValue ?>"<?= $Page->REASONFORESET->editAttributes() ?> aria-describedby="x_REASONFORESET_help">
<?= $Page->REASONFORESET->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->REASONFORESET->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Expectedoocytes->Visible) { // Expectedoocytes ?>
    <div id="r_Expectedoocytes" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Expectedoocytes" for="x_Expectedoocytes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Expectedoocytes->caption() ?><?= $Page->Expectedoocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Expectedoocytes->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Expectedoocytes">
<input type="<?= $Page->Expectedoocytes->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Expectedoocytes" name="x_Expectedoocytes" id="x_Expectedoocytes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Expectedoocytes->getPlaceHolder()) ?>" value="<?= $Page->Expectedoocytes->EditValue ?>"<?= $Page->Expectedoocytes->editAttributes() ?> aria-describedby="x_Expectedoocytes_help">
<?= $Page->Expectedoocytes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Expectedoocytes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate1->Visible) { // StChDate1 ?>
    <div id="r_StChDate1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate1" for="x_StChDate1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate1->caption() ?><?= $Page->StChDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate1">
<input type="<?= $Page->StChDate1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate1" name="x_StChDate1" id="x_StChDate1" placeholder="<?= HtmlEncode($Page->StChDate1->getPlaceHolder()) ?>" value="<?= $Page->StChDate1->EditValue ?>"<?= $Page->StChDate1->editAttributes() ?> aria-describedby="x_StChDate1_help">
<?= $Page->StChDate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate1->getErrorMessage() ?></div>
<?php if (!$Page->StChDate1->ReadOnly && !$Page->StChDate1->Disabled && !isset($Page->StChDate1->EditAttrs["readonly"]) && !isset($Page->StChDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate2->Visible) { // StChDate2 ?>
    <div id="r_StChDate2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate2" for="x_StChDate2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate2->caption() ?><?= $Page->StChDate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate2">
<input type="<?= $Page->StChDate2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate2" name="x_StChDate2" id="x_StChDate2" placeholder="<?= HtmlEncode($Page->StChDate2->getPlaceHolder()) ?>" value="<?= $Page->StChDate2->EditValue ?>"<?= $Page->StChDate2->editAttributes() ?> aria-describedby="x_StChDate2_help">
<?= $Page->StChDate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate2->getErrorMessage() ?></div>
<?php if (!$Page->StChDate2->ReadOnly && !$Page->StChDate2->Disabled && !isset($Page->StChDate2->EditAttrs["readonly"]) && !isset($Page->StChDate2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate2", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate3->Visible) { // StChDate3 ?>
    <div id="r_StChDate3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate3" for="x_StChDate3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate3->caption() ?><?= $Page->StChDate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate3">
<input type="<?= $Page->StChDate3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate3" name="x_StChDate3" id="x_StChDate3" placeholder="<?= HtmlEncode($Page->StChDate3->getPlaceHolder()) ?>" value="<?= $Page->StChDate3->EditValue ?>"<?= $Page->StChDate3->editAttributes() ?> aria-describedby="x_StChDate3_help">
<?= $Page->StChDate3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate3->getErrorMessage() ?></div>
<?php if (!$Page->StChDate3->ReadOnly && !$Page->StChDate3->Disabled && !isset($Page->StChDate3->EditAttrs["readonly"]) && !isset($Page->StChDate3->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate3", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate4->Visible) { // StChDate4 ?>
    <div id="r_StChDate4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate4" for="x_StChDate4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate4->caption() ?><?= $Page->StChDate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate4">
<input type="<?= $Page->StChDate4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate4" name="x_StChDate4" id="x_StChDate4" placeholder="<?= HtmlEncode($Page->StChDate4->getPlaceHolder()) ?>" value="<?= $Page->StChDate4->EditValue ?>"<?= $Page->StChDate4->editAttributes() ?> aria-describedby="x_StChDate4_help">
<?= $Page->StChDate4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate4->getErrorMessage() ?></div>
<?php if (!$Page->StChDate4->ReadOnly && !$Page->StChDate4->Disabled && !isset($Page->StChDate4->EditAttrs["readonly"]) && !isset($Page->StChDate4->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate4", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate5->Visible) { // StChDate5 ?>
    <div id="r_StChDate5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate5" for="x_StChDate5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate5->caption() ?><?= $Page->StChDate5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate5">
<input type="<?= $Page->StChDate5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate5" name="x_StChDate5" id="x_StChDate5" placeholder="<?= HtmlEncode($Page->StChDate5->getPlaceHolder()) ?>" value="<?= $Page->StChDate5->EditValue ?>"<?= $Page->StChDate5->editAttributes() ?> aria-describedby="x_StChDate5_help">
<?= $Page->StChDate5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate5->getErrorMessage() ?></div>
<?php if (!$Page->StChDate5->ReadOnly && !$Page->StChDate5->Disabled && !isset($Page->StChDate5->EditAttrs["readonly"]) && !isset($Page->StChDate5->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate5", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate6->Visible) { // StChDate6 ?>
    <div id="r_StChDate6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate6" for="x_StChDate6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate6->caption() ?><?= $Page->StChDate6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate6">
<input type="<?= $Page->StChDate6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate6" name="x_StChDate6" id="x_StChDate6" placeholder="<?= HtmlEncode($Page->StChDate6->getPlaceHolder()) ?>" value="<?= $Page->StChDate6->EditValue ?>"<?= $Page->StChDate6->editAttributes() ?> aria-describedby="x_StChDate6_help">
<?= $Page->StChDate6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate6->getErrorMessage() ?></div>
<?php if (!$Page->StChDate6->ReadOnly && !$Page->StChDate6->Disabled && !isset($Page->StChDate6->EditAttrs["readonly"]) && !isset($Page->StChDate6->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate6", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate7->Visible) { // StChDate7 ?>
    <div id="r_StChDate7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate7" for="x_StChDate7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate7->caption() ?><?= $Page->StChDate7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate7">
<input type="<?= $Page->StChDate7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate7" name="x_StChDate7" id="x_StChDate7" placeholder="<?= HtmlEncode($Page->StChDate7->getPlaceHolder()) ?>" value="<?= $Page->StChDate7->EditValue ?>"<?= $Page->StChDate7->editAttributes() ?> aria-describedby="x_StChDate7_help">
<?= $Page->StChDate7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate7->getErrorMessage() ?></div>
<?php if (!$Page->StChDate7->ReadOnly && !$Page->StChDate7->Disabled && !isset($Page->StChDate7->EditAttrs["readonly"]) && !isset($Page->StChDate7->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate7", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate8->Visible) { // StChDate8 ?>
    <div id="r_StChDate8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate8" for="x_StChDate8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate8->caption() ?><?= $Page->StChDate8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate8">
<input type="<?= $Page->StChDate8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate8" name="x_StChDate8" id="x_StChDate8" placeholder="<?= HtmlEncode($Page->StChDate8->getPlaceHolder()) ?>" value="<?= $Page->StChDate8->EditValue ?>"<?= $Page->StChDate8->editAttributes() ?> aria-describedby="x_StChDate8_help">
<?= $Page->StChDate8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate8->getErrorMessage() ?></div>
<?php if (!$Page->StChDate8->ReadOnly && !$Page->StChDate8->Disabled && !isset($Page->StChDate8->EditAttrs["readonly"]) && !isset($Page->StChDate8->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate8", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate9->Visible) { // StChDate9 ?>
    <div id="r_StChDate9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate9" for="x_StChDate9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate9->caption() ?><?= $Page->StChDate9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate9">
<input type="<?= $Page->StChDate9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate9" name="x_StChDate9" id="x_StChDate9" placeholder="<?= HtmlEncode($Page->StChDate9->getPlaceHolder()) ?>" value="<?= $Page->StChDate9->EditValue ?>"<?= $Page->StChDate9->editAttributes() ?> aria-describedby="x_StChDate9_help">
<?= $Page->StChDate9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate9->getErrorMessage() ?></div>
<?php if (!$Page->StChDate9->ReadOnly && !$Page->StChDate9->Disabled && !isset($Page->StChDate9->EditAttrs["readonly"]) && !isset($Page->StChDate9->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate9", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate10->Visible) { // StChDate10 ?>
    <div id="r_StChDate10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate10" for="x_StChDate10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate10->caption() ?><?= $Page->StChDate10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate10">
<input type="<?= $Page->StChDate10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate10" name="x_StChDate10" id="x_StChDate10" placeholder="<?= HtmlEncode($Page->StChDate10->getPlaceHolder()) ?>" value="<?= $Page->StChDate10->EditValue ?>"<?= $Page->StChDate10->editAttributes() ?> aria-describedby="x_StChDate10_help">
<?= $Page->StChDate10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate10->getErrorMessage() ?></div>
<?php if (!$Page->StChDate10->ReadOnly && !$Page->StChDate10->Disabled && !isset($Page->StChDate10->EditAttrs["readonly"]) && !isset($Page->StChDate10->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate10", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate11->Visible) { // StChDate11 ?>
    <div id="r_StChDate11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate11" for="x_StChDate11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate11->caption() ?><?= $Page->StChDate11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate11">
<input type="<?= $Page->StChDate11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate11" name="x_StChDate11" id="x_StChDate11" placeholder="<?= HtmlEncode($Page->StChDate11->getPlaceHolder()) ?>" value="<?= $Page->StChDate11->EditValue ?>"<?= $Page->StChDate11->editAttributes() ?> aria-describedby="x_StChDate11_help">
<?= $Page->StChDate11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate11->getErrorMessage() ?></div>
<?php if (!$Page->StChDate11->ReadOnly && !$Page->StChDate11->Disabled && !isset($Page->StChDate11->EditAttrs["readonly"]) && !isset($Page->StChDate11->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate11", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate12->Visible) { // StChDate12 ?>
    <div id="r_StChDate12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate12" for="x_StChDate12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate12->caption() ?><?= $Page->StChDate12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate12">
<input type="<?= $Page->StChDate12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate12" name="x_StChDate12" id="x_StChDate12" placeholder="<?= HtmlEncode($Page->StChDate12->getPlaceHolder()) ?>" value="<?= $Page->StChDate12->EditValue ?>"<?= $Page->StChDate12->editAttributes() ?> aria-describedby="x_StChDate12_help">
<?= $Page->StChDate12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate12->getErrorMessage() ?></div>
<?php if (!$Page->StChDate12->ReadOnly && !$Page->StChDate12->Disabled && !isset($Page->StChDate12->EditAttrs["readonly"]) && !isset($Page->StChDate12->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate12", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate13->Visible) { // StChDate13 ?>
    <div id="r_StChDate13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate13" for="x_StChDate13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate13->caption() ?><?= $Page->StChDate13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate13">
<input type="<?= $Page->StChDate13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate13" name="x_StChDate13" id="x_StChDate13" placeholder="<?= HtmlEncode($Page->StChDate13->getPlaceHolder()) ?>" value="<?= $Page->StChDate13->EditValue ?>"<?= $Page->StChDate13->editAttributes() ?> aria-describedby="x_StChDate13_help">
<?= $Page->StChDate13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate13->getErrorMessage() ?></div>
<?php if (!$Page->StChDate13->ReadOnly && !$Page->StChDate13->Disabled && !isset($Page->StChDate13->EditAttrs["readonly"]) && !isset($Page->StChDate13->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate13", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay1->Visible) { // CycleDay1 ?>
    <div id="r_CycleDay1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay1" for="x_CycleDay1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay1->caption() ?><?= $Page->CycleDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay1">
<input type="<?= $Page->CycleDay1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay1" name="x_CycleDay1" id="x_CycleDay1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay1->getPlaceHolder()) ?>" value="<?= $Page->CycleDay1->EditValue ?>"<?= $Page->CycleDay1->editAttributes() ?> aria-describedby="x_CycleDay1_help">
<?= $Page->CycleDay1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay2->Visible) { // CycleDay2 ?>
    <div id="r_CycleDay2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay2" for="x_CycleDay2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay2->caption() ?><?= $Page->CycleDay2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay2">
<input type="<?= $Page->CycleDay2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay2" name="x_CycleDay2" id="x_CycleDay2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay2->getPlaceHolder()) ?>" value="<?= $Page->CycleDay2->EditValue ?>"<?= $Page->CycleDay2->editAttributes() ?> aria-describedby="x_CycleDay2_help">
<?= $Page->CycleDay2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay3->Visible) { // CycleDay3 ?>
    <div id="r_CycleDay3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay3" for="x_CycleDay3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay3->caption() ?><?= $Page->CycleDay3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay3">
<input type="<?= $Page->CycleDay3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay3" name="x_CycleDay3" id="x_CycleDay3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay3->getPlaceHolder()) ?>" value="<?= $Page->CycleDay3->EditValue ?>"<?= $Page->CycleDay3->editAttributes() ?> aria-describedby="x_CycleDay3_help">
<?= $Page->CycleDay3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay4->Visible) { // CycleDay4 ?>
    <div id="r_CycleDay4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay4" for="x_CycleDay4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay4->caption() ?><?= $Page->CycleDay4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay4">
<input type="<?= $Page->CycleDay4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay4" name="x_CycleDay4" id="x_CycleDay4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay4->getPlaceHolder()) ?>" value="<?= $Page->CycleDay4->EditValue ?>"<?= $Page->CycleDay4->editAttributes() ?> aria-describedby="x_CycleDay4_help">
<?= $Page->CycleDay4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay5->Visible) { // CycleDay5 ?>
    <div id="r_CycleDay5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay5" for="x_CycleDay5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay5->caption() ?><?= $Page->CycleDay5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay5">
<input type="<?= $Page->CycleDay5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay5" name="x_CycleDay5" id="x_CycleDay5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay5->getPlaceHolder()) ?>" value="<?= $Page->CycleDay5->EditValue ?>"<?= $Page->CycleDay5->editAttributes() ?> aria-describedby="x_CycleDay5_help">
<?= $Page->CycleDay5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay6->Visible) { // CycleDay6 ?>
    <div id="r_CycleDay6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay6" for="x_CycleDay6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay6->caption() ?><?= $Page->CycleDay6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay6">
<input type="<?= $Page->CycleDay6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay6" name="x_CycleDay6" id="x_CycleDay6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay6->getPlaceHolder()) ?>" value="<?= $Page->CycleDay6->EditValue ?>"<?= $Page->CycleDay6->editAttributes() ?> aria-describedby="x_CycleDay6_help">
<?= $Page->CycleDay6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay7->Visible) { // CycleDay7 ?>
    <div id="r_CycleDay7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay7" for="x_CycleDay7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay7->caption() ?><?= $Page->CycleDay7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay7">
<input type="<?= $Page->CycleDay7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay7" name="x_CycleDay7" id="x_CycleDay7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay7->getPlaceHolder()) ?>" value="<?= $Page->CycleDay7->EditValue ?>"<?= $Page->CycleDay7->editAttributes() ?> aria-describedby="x_CycleDay7_help">
<?= $Page->CycleDay7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay8->Visible) { // CycleDay8 ?>
    <div id="r_CycleDay8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay8" for="x_CycleDay8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay8->caption() ?><?= $Page->CycleDay8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay8">
<input type="<?= $Page->CycleDay8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay8" name="x_CycleDay8" id="x_CycleDay8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay8->getPlaceHolder()) ?>" value="<?= $Page->CycleDay8->EditValue ?>"<?= $Page->CycleDay8->editAttributes() ?> aria-describedby="x_CycleDay8_help">
<?= $Page->CycleDay8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay9->Visible) { // CycleDay9 ?>
    <div id="r_CycleDay9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay9" for="x_CycleDay9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay9->caption() ?><?= $Page->CycleDay9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay9">
<input type="<?= $Page->CycleDay9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay9" name="x_CycleDay9" id="x_CycleDay9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay9->getPlaceHolder()) ?>" value="<?= $Page->CycleDay9->EditValue ?>"<?= $Page->CycleDay9->editAttributes() ?> aria-describedby="x_CycleDay9_help">
<?= $Page->CycleDay9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay10->Visible) { // CycleDay10 ?>
    <div id="r_CycleDay10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay10" for="x_CycleDay10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay10->caption() ?><?= $Page->CycleDay10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay10">
<input type="<?= $Page->CycleDay10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay10" name="x_CycleDay10" id="x_CycleDay10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay10->getPlaceHolder()) ?>" value="<?= $Page->CycleDay10->EditValue ?>"<?= $Page->CycleDay10->editAttributes() ?> aria-describedby="x_CycleDay10_help">
<?= $Page->CycleDay10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay11->Visible) { // CycleDay11 ?>
    <div id="r_CycleDay11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay11" for="x_CycleDay11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay11->caption() ?><?= $Page->CycleDay11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay11">
<input type="<?= $Page->CycleDay11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay11" name="x_CycleDay11" id="x_CycleDay11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay11->getPlaceHolder()) ?>" value="<?= $Page->CycleDay11->EditValue ?>"<?= $Page->CycleDay11->editAttributes() ?> aria-describedby="x_CycleDay11_help">
<?= $Page->CycleDay11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay12->Visible) { // CycleDay12 ?>
    <div id="r_CycleDay12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay12" for="x_CycleDay12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay12->caption() ?><?= $Page->CycleDay12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay12">
<input type="<?= $Page->CycleDay12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay12" name="x_CycleDay12" id="x_CycleDay12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay12->getPlaceHolder()) ?>" value="<?= $Page->CycleDay12->EditValue ?>"<?= $Page->CycleDay12->editAttributes() ?> aria-describedby="x_CycleDay12_help">
<?= $Page->CycleDay12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay13->Visible) { // CycleDay13 ?>
    <div id="r_CycleDay13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay13" for="x_CycleDay13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay13->caption() ?><?= $Page->CycleDay13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay13">
<input type="<?= $Page->CycleDay13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay13" name="x_CycleDay13" id="x_CycleDay13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay13->getPlaceHolder()) ?>" value="<?= $Page->CycleDay13->EditValue ?>"<?= $Page->CycleDay13->editAttributes() ?> aria-describedby="x_CycleDay13_help">
<?= $Page->CycleDay13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay1->Visible) { // StimulationDay1 ?>
    <div id="r_StimulationDay1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay1" for="x_StimulationDay1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay1->caption() ?><?= $Page->StimulationDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay1">
<input type="<?= $Page->StimulationDay1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay1" name="x_StimulationDay1" id="x_StimulationDay1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay1->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay1->EditValue ?>"<?= $Page->StimulationDay1->editAttributes() ?> aria-describedby="x_StimulationDay1_help">
<?= $Page->StimulationDay1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay2->Visible) { // StimulationDay2 ?>
    <div id="r_StimulationDay2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay2" for="x_StimulationDay2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay2->caption() ?><?= $Page->StimulationDay2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay2">
<input type="<?= $Page->StimulationDay2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay2" name="x_StimulationDay2" id="x_StimulationDay2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay2->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay2->EditValue ?>"<?= $Page->StimulationDay2->editAttributes() ?> aria-describedby="x_StimulationDay2_help">
<?= $Page->StimulationDay2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay3->Visible) { // StimulationDay3 ?>
    <div id="r_StimulationDay3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay3" for="x_StimulationDay3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay3->caption() ?><?= $Page->StimulationDay3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay3">
<input type="<?= $Page->StimulationDay3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay3" name="x_StimulationDay3" id="x_StimulationDay3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay3->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay3->EditValue ?>"<?= $Page->StimulationDay3->editAttributes() ?> aria-describedby="x_StimulationDay3_help">
<?= $Page->StimulationDay3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay4->Visible) { // StimulationDay4 ?>
    <div id="r_StimulationDay4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay4" for="x_StimulationDay4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay4->caption() ?><?= $Page->StimulationDay4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay4">
<input type="<?= $Page->StimulationDay4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay4" name="x_StimulationDay4" id="x_StimulationDay4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay4->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay4->EditValue ?>"<?= $Page->StimulationDay4->editAttributes() ?> aria-describedby="x_StimulationDay4_help">
<?= $Page->StimulationDay4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay5->Visible) { // StimulationDay5 ?>
    <div id="r_StimulationDay5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay5" for="x_StimulationDay5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay5->caption() ?><?= $Page->StimulationDay5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay5">
<input type="<?= $Page->StimulationDay5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay5" name="x_StimulationDay5" id="x_StimulationDay5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay5->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay5->EditValue ?>"<?= $Page->StimulationDay5->editAttributes() ?> aria-describedby="x_StimulationDay5_help">
<?= $Page->StimulationDay5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay6->Visible) { // StimulationDay6 ?>
    <div id="r_StimulationDay6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay6" for="x_StimulationDay6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay6->caption() ?><?= $Page->StimulationDay6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay6">
<input type="<?= $Page->StimulationDay6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay6" name="x_StimulationDay6" id="x_StimulationDay6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay6->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay6->EditValue ?>"<?= $Page->StimulationDay6->editAttributes() ?> aria-describedby="x_StimulationDay6_help">
<?= $Page->StimulationDay6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay7->Visible) { // StimulationDay7 ?>
    <div id="r_StimulationDay7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay7" for="x_StimulationDay7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay7->caption() ?><?= $Page->StimulationDay7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay7">
<input type="<?= $Page->StimulationDay7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay7" name="x_StimulationDay7" id="x_StimulationDay7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay7->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay7->EditValue ?>"<?= $Page->StimulationDay7->editAttributes() ?> aria-describedby="x_StimulationDay7_help">
<?= $Page->StimulationDay7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay8->Visible) { // StimulationDay8 ?>
    <div id="r_StimulationDay8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay8" for="x_StimulationDay8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay8->caption() ?><?= $Page->StimulationDay8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay8">
<input type="<?= $Page->StimulationDay8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay8" name="x_StimulationDay8" id="x_StimulationDay8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay8->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay8->EditValue ?>"<?= $Page->StimulationDay8->editAttributes() ?> aria-describedby="x_StimulationDay8_help">
<?= $Page->StimulationDay8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay9->Visible) { // StimulationDay9 ?>
    <div id="r_StimulationDay9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay9" for="x_StimulationDay9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay9->caption() ?><?= $Page->StimulationDay9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay9">
<input type="<?= $Page->StimulationDay9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay9" name="x_StimulationDay9" id="x_StimulationDay9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay9->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay9->EditValue ?>"<?= $Page->StimulationDay9->editAttributes() ?> aria-describedby="x_StimulationDay9_help">
<?= $Page->StimulationDay9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay10->Visible) { // StimulationDay10 ?>
    <div id="r_StimulationDay10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay10" for="x_StimulationDay10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay10->caption() ?><?= $Page->StimulationDay10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay10">
<input type="<?= $Page->StimulationDay10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay10" name="x_StimulationDay10" id="x_StimulationDay10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay10->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay10->EditValue ?>"<?= $Page->StimulationDay10->editAttributes() ?> aria-describedby="x_StimulationDay10_help">
<?= $Page->StimulationDay10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay11->Visible) { // StimulationDay11 ?>
    <div id="r_StimulationDay11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay11" for="x_StimulationDay11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay11->caption() ?><?= $Page->StimulationDay11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay11">
<input type="<?= $Page->StimulationDay11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay11" name="x_StimulationDay11" id="x_StimulationDay11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay11->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay11->EditValue ?>"<?= $Page->StimulationDay11->editAttributes() ?> aria-describedby="x_StimulationDay11_help">
<?= $Page->StimulationDay11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay12->Visible) { // StimulationDay12 ?>
    <div id="r_StimulationDay12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay12" for="x_StimulationDay12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay12->caption() ?><?= $Page->StimulationDay12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay12">
<input type="<?= $Page->StimulationDay12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay12" name="x_StimulationDay12" id="x_StimulationDay12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay12->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay12->EditValue ?>"<?= $Page->StimulationDay12->editAttributes() ?> aria-describedby="x_StimulationDay12_help">
<?= $Page->StimulationDay12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay13->Visible) { // StimulationDay13 ?>
    <div id="r_StimulationDay13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay13" for="x_StimulationDay13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay13->caption() ?><?= $Page->StimulationDay13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay13">
<input type="<?= $Page->StimulationDay13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay13" name="x_StimulationDay13" id="x_StimulationDay13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay13->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay13->EditValue ?>"<?= $Page->StimulationDay13->editAttributes() ?> aria-describedby="x_StimulationDay13_help">
<?= $Page->StimulationDay13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet1->Visible) { // Tablet1 ?>
    <div id="r_Tablet1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet1" for="x_Tablet1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet1->caption() ?><?= $Page->Tablet1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet1">
<input type="<?= $Page->Tablet1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet1" name="x_Tablet1" id="x_Tablet1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet1->getPlaceHolder()) ?>" value="<?= $Page->Tablet1->EditValue ?>"<?= $Page->Tablet1->editAttributes() ?> aria-describedby="x_Tablet1_help">
<?= $Page->Tablet1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet2->Visible) { // Tablet2 ?>
    <div id="r_Tablet2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet2" for="x_Tablet2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet2->caption() ?><?= $Page->Tablet2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet2">
<input type="<?= $Page->Tablet2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet2" name="x_Tablet2" id="x_Tablet2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet2->getPlaceHolder()) ?>" value="<?= $Page->Tablet2->EditValue ?>"<?= $Page->Tablet2->editAttributes() ?> aria-describedby="x_Tablet2_help">
<?= $Page->Tablet2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet3->Visible) { // Tablet3 ?>
    <div id="r_Tablet3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet3" for="x_Tablet3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet3->caption() ?><?= $Page->Tablet3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet3">
<input type="<?= $Page->Tablet3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet3" name="x_Tablet3" id="x_Tablet3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet3->getPlaceHolder()) ?>" value="<?= $Page->Tablet3->EditValue ?>"<?= $Page->Tablet3->editAttributes() ?> aria-describedby="x_Tablet3_help">
<?= $Page->Tablet3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet4->Visible) { // Tablet4 ?>
    <div id="r_Tablet4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet4" for="x_Tablet4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet4->caption() ?><?= $Page->Tablet4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet4">
<input type="<?= $Page->Tablet4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet4" name="x_Tablet4" id="x_Tablet4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet4->getPlaceHolder()) ?>" value="<?= $Page->Tablet4->EditValue ?>"<?= $Page->Tablet4->editAttributes() ?> aria-describedby="x_Tablet4_help">
<?= $Page->Tablet4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet5->Visible) { // Tablet5 ?>
    <div id="r_Tablet5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet5" for="x_Tablet5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet5->caption() ?><?= $Page->Tablet5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet5">
<input type="<?= $Page->Tablet5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet5" name="x_Tablet5" id="x_Tablet5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet5->getPlaceHolder()) ?>" value="<?= $Page->Tablet5->EditValue ?>"<?= $Page->Tablet5->editAttributes() ?> aria-describedby="x_Tablet5_help">
<?= $Page->Tablet5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet6->Visible) { // Tablet6 ?>
    <div id="r_Tablet6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet6" for="x_Tablet6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet6->caption() ?><?= $Page->Tablet6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet6">
<input type="<?= $Page->Tablet6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet6" name="x_Tablet6" id="x_Tablet6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet6->getPlaceHolder()) ?>" value="<?= $Page->Tablet6->EditValue ?>"<?= $Page->Tablet6->editAttributes() ?> aria-describedby="x_Tablet6_help">
<?= $Page->Tablet6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet7->Visible) { // Tablet7 ?>
    <div id="r_Tablet7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet7" for="x_Tablet7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet7->caption() ?><?= $Page->Tablet7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet7">
<input type="<?= $Page->Tablet7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet7" name="x_Tablet7" id="x_Tablet7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet7->getPlaceHolder()) ?>" value="<?= $Page->Tablet7->EditValue ?>"<?= $Page->Tablet7->editAttributes() ?> aria-describedby="x_Tablet7_help">
<?= $Page->Tablet7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet8->Visible) { // Tablet8 ?>
    <div id="r_Tablet8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet8" for="x_Tablet8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet8->caption() ?><?= $Page->Tablet8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet8">
<input type="<?= $Page->Tablet8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet8" name="x_Tablet8" id="x_Tablet8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet8->getPlaceHolder()) ?>" value="<?= $Page->Tablet8->EditValue ?>"<?= $Page->Tablet8->editAttributes() ?> aria-describedby="x_Tablet8_help">
<?= $Page->Tablet8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet9->Visible) { // Tablet9 ?>
    <div id="r_Tablet9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet9" for="x_Tablet9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet9->caption() ?><?= $Page->Tablet9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet9">
<input type="<?= $Page->Tablet9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet9" name="x_Tablet9" id="x_Tablet9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet9->getPlaceHolder()) ?>" value="<?= $Page->Tablet9->EditValue ?>"<?= $Page->Tablet9->editAttributes() ?> aria-describedby="x_Tablet9_help">
<?= $Page->Tablet9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet10->Visible) { // Tablet10 ?>
    <div id="r_Tablet10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet10" for="x_Tablet10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet10->caption() ?><?= $Page->Tablet10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet10">
<input type="<?= $Page->Tablet10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet10" name="x_Tablet10" id="x_Tablet10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet10->getPlaceHolder()) ?>" value="<?= $Page->Tablet10->EditValue ?>"<?= $Page->Tablet10->editAttributes() ?> aria-describedby="x_Tablet10_help">
<?= $Page->Tablet10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet11->Visible) { // Tablet11 ?>
    <div id="r_Tablet11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet11" for="x_Tablet11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet11->caption() ?><?= $Page->Tablet11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet11">
<input type="<?= $Page->Tablet11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet11" name="x_Tablet11" id="x_Tablet11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet11->getPlaceHolder()) ?>" value="<?= $Page->Tablet11->EditValue ?>"<?= $Page->Tablet11->editAttributes() ?> aria-describedby="x_Tablet11_help">
<?= $Page->Tablet11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet12->Visible) { // Tablet12 ?>
    <div id="r_Tablet12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet12" for="x_Tablet12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet12->caption() ?><?= $Page->Tablet12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet12">
<input type="<?= $Page->Tablet12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet12" name="x_Tablet12" id="x_Tablet12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet12->getPlaceHolder()) ?>" value="<?= $Page->Tablet12->EditValue ?>"<?= $Page->Tablet12->editAttributes() ?> aria-describedby="x_Tablet12_help">
<?= $Page->Tablet12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet13->Visible) { // Tablet13 ?>
    <div id="r_Tablet13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet13" for="x_Tablet13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet13->caption() ?><?= $Page->Tablet13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet13">
<input type="<?= $Page->Tablet13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet13" name="x_Tablet13" id="x_Tablet13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet13->getPlaceHolder()) ?>" value="<?= $Page->Tablet13->EditValue ?>"<?= $Page->Tablet13->editAttributes() ?> aria-describedby="x_Tablet13_help">
<?= $Page->Tablet13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
    <div id="r_RFSH1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH1" for="x_RFSH1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH1->caption() ?><?= $Page->RFSH1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH1">
<input type="<?= $Page->RFSH1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH1" name="x_RFSH1" id="x_RFSH1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH1->getPlaceHolder()) ?>" value="<?= $Page->RFSH1->EditValue ?>"<?= $Page->RFSH1->editAttributes() ?> aria-describedby="x_RFSH1_help">
<?= $Page->RFSH1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
    <div id="r_RFSH2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH2" for="x_RFSH2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH2->caption() ?><?= $Page->RFSH2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH2">
<input type="<?= $Page->RFSH2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH2" name="x_RFSH2" id="x_RFSH2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH2->getPlaceHolder()) ?>" value="<?= $Page->RFSH2->EditValue ?>"<?= $Page->RFSH2->editAttributes() ?> aria-describedby="x_RFSH2_help">
<?= $Page->RFSH2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
    <div id="r_RFSH3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH3" for="x_RFSH3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH3->caption() ?><?= $Page->RFSH3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH3">
<input type="<?= $Page->RFSH3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH3" name="x_RFSH3" id="x_RFSH3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH3->getPlaceHolder()) ?>" value="<?= $Page->RFSH3->EditValue ?>"<?= $Page->RFSH3->editAttributes() ?> aria-describedby="x_RFSH3_help">
<?= $Page->RFSH3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH4->Visible) { // RFSH4 ?>
    <div id="r_RFSH4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH4" for="x_RFSH4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH4->caption() ?><?= $Page->RFSH4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH4">
<input type="<?= $Page->RFSH4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH4" name="x_RFSH4" id="x_RFSH4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH4->getPlaceHolder()) ?>" value="<?= $Page->RFSH4->EditValue ?>"<?= $Page->RFSH4->editAttributes() ?> aria-describedby="x_RFSH4_help">
<?= $Page->RFSH4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH5->Visible) { // RFSH5 ?>
    <div id="r_RFSH5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH5" for="x_RFSH5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH5->caption() ?><?= $Page->RFSH5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH5">
<input type="<?= $Page->RFSH5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH5" name="x_RFSH5" id="x_RFSH5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH5->getPlaceHolder()) ?>" value="<?= $Page->RFSH5->EditValue ?>"<?= $Page->RFSH5->editAttributes() ?> aria-describedby="x_RFSH5_help">
<?= $Page->RFSH5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH6->Visible) { // RFSH6 ?>
    <div id="r_RFSH6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH6" for="x_RFSH6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH6->caption() ?><?= $Page->RFSH6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH6">
<input type="<?= $Page->RFSH6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH6" name="x_RFSH6" id="x_RFSH6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH6->getPlaceHolder()) ?>" value="<?= $Page->RFSH6->EditValue ?>"<?= $Page->RFSH6->editAttributes() ?> aria-describedby="x_RFSH6_help">
<?= $Page->RFSH6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH7->Visible) { // RFSH7 ?>
    <div id="r_RFSH7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH7" for="x_RFSH7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH7->caption() ?><?= $Page->RFSH7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH7">
<input type="<?= $Page->RFSH7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH7" name="x_RFSH7" id="x_RFSH7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH7->getPlaceHolder()) ?>" value="<?= $Page->RFSH7->EditValue ?>"<?= $Page->RFSH7->editAttributes() ?> aria-describedby="x_RFSH7_help">
<?= $Page->RFSH7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH8->Visible) { // RFSH8 ?>
    <div id="r_RFSH8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH8" for="x_RFSH8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH8->caption() ?><?= $Page->RFSH8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH8">
<input type="<?= $Page->RFSH8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH8" name="x_RFSH8" id="x_RFSH8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH8->getPlaceHolder()) ?>" value="<?= $Page->RFSH8->EditValue ?>"<?= $Page->RFSH8->editAttributes() ?> aria-describedby="x_RFSH8_help">
<?= $Page->RFSH8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH9->Visible) { // RFSH9 ?>
    <div id="r_RFSH9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH9" for="x_RFSH9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH9->caption() ?><?= $Page->RFSH9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH9">
<input type="<?= $Page->RFSH9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH9" name="x_RFSH9" id="x_RFSH9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH9->getPlaceHolder()) ?>" value="<?= $Page->RFSH9->EditValue ?>"<?= $Page->RFSH9->editAttributes() ?> aria-describedby="x_RFSH9_help">
<?= $Page->RFSH9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH10->Visible) { // RFSH10 ?>
    <div id="r_RFSH10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH10" for="x_RFSH10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH10->caption() ?><?= $Page->RFSH10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH10">
<input type="<?= $Page->RFSH10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH10" name="x_RFSH10" id="x_RFSH10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH10->getPlaceHolder()) ?>" value="<?= $Page->RFSH10->EditValue ?>"<?= $Page->RFSH10->editAttributes() ?> aria-describedby="x_RFSH10_help">
<?= $Page->RFSH10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH11->Visible) { // RFSH11 ?>
    <div id="r_RFSH11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH11" for="x_RFSH11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH11->caption() ?><?= $Page->RFSH11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH11">
<input type="<?= $Page->RFSH11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH11" name="x_RFSH11" id="x_RFSH11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH11->getPlaceHolder()) ?>" value="<?= $Page->RFSH11->EditValue ?>"<?= $Page->RFSH11->editAttributes() ?> aria-describedby="x_RFSH11_help">
<?= $Page->RFSH11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH12->Visible) { // RFSH12 ?>
    <div id="r_RFSH12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH12" for="x_RFSH12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH12->caption() ?><?= $Page->RFSH12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH12">
<input type="<?= $Page->RFSH12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH12" name="x_RFSH12" id="x_RFSH12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH12->getPlaceHolder()) ?>" value="<?= $Page->RFSH12->EditValue ?>"<?= $Page->RFSH12->editAttributes() ?> aria-describedby="x_RFSH12_help">
<?= $Page->RFSH12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH13->Visible) { // RFSH13 ?>
    <div id="r_RFSH13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH13" for="x_RFSH13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH13->caption() ?><?= $Page->RFSH13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH13">
<input type="<?= $Page->RFSH13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH13" name="x_RFSH13" id="x_RFSH13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH13->getPlaceHolder()) ?>" value="<?= $Page->RFSH13->EditValue ?>"<?= $Page->RFSH13->editAttributes() ?> aria-describedby="x_RFSH13_help">
<?= $Page->RFSH13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG1->Visible) { // HMG1 ?>
    <div id="r_HMG1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG1" for="x_HMG1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG1->caption() ?><?= $Page->HMG1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG1">
<input type="<?= $Page->HMG1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG1" name="x_HMG1" id="x_HMG1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG1->getPlaceHolder()) ?>" value="<?= $Page->HMG1->EditValue ?>"<?= $Page->HMG1->editAttributes() ?> aria-describedby="x_HMG1_help">
<?= $Page->HMG1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG2->Visible) { // HMG2 ?>
    <div id="r_HMG2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG2" for="x_HMG2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG2->caption() ?><?= $Page->HMG2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG2">
<input type="<?= $Page->HMG2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG2" name="x_HMG2" id="x_HMG2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG2->getPlaceHolder()) ?>" value="<?= $Page->HMG2->EditValue ?>"<?= $Page->HMG2->editAttributes() ?> aria-describedby="x_HMG2_help">
<?= $Page->HMG2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG3->Visible) { // HMG3 ?>
    <div id="r_HMG3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG3" for="x_HMG3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG3->caption() ?><?= $Page->HMG3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG3">
<input type="<?= $Page->HMG3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG3" name="x_HMG3" id="x_HMG3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG3->getPlaceHolder()) ?>" value="<?= $Page->HMG3->EditValue ?>"<?= $Page->HMG3->editAttributes() ?> aria-describedby="x_HMG3_help">
<?= $Page->HMG3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG4->Visible) { // HMG4 ?>
    <div id="r_HMG4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG4" for="x_HMG4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG4->caption() ?><?= $Page->HMG4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG4">
<input type="<?= $Page->HMG4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG4" name="x_HMG4" id="x_HMG4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG4->getPlaceHolder()) ?>" value="<?= $Page->HMG4->EditValue ?>"<?= $Page->HMG4->editAttributes() ?> aria-describedby="x_HMG4_help">
<?= $Page->HMG4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG5->Visible) { // HMG5 ?>
    <div id="r_HMG5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG5" for="x_HMG5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG5->caption() ?><?= $Page->HMG5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG5">
<input type="<?= $Page->HMG5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG5" name="x_HMG5" id="x_HMG5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG5->getPlaceHolder()) ?>" value="<?= $Page->HMG5->EditValue ?>"<?= $Page->HMG5->editAttributes() ?> aria-describedby="x_HMG5_help">
<?= $Page->HMG5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG6->Visible) { // HMG6 ?>
    <div id="r_HMG6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG6" for="x_HMG6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG6->caption() ?><?= $Page->HMG6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG6">
<input type="<?= $Page->HMG6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG6" name="x_HMG6" id="x_HMG6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG6->getPlaceHolder()) ?>" value="<?= $Page->HMG6->EditValue ?>"<?= $Page->HMG6->editAttributes() ?> aria-describedby="x_HMG6_help">
<?= $Page->HMG6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG7->Visible) { // HMG7 ?>
    <div id="r_HMG7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG7" for="x_HMG7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG7->caption() ?><?= $Page->HMG7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG7">
<input type="<?= $Page->HMG7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG7" name="x_HMG7" id="x_HMG7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG7->getPlaceHolder()) ?>" value="<?= $Page->HMG7->EditValue ?>"<?= $Page->HMG7->editAttributes() ?> aria-describedby="x_HMG7_help">
<?= $Page->HMG7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG8->Visible) { // HMG8 ?>
    <div id="r_HMG8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG8" for="x_HMG8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG8->caption() ?><?= $Page->HMG8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG8">
<input type="<?= $Page->HMG8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG8" name="x_HMG8" id="x_HMG8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG8->getPlaceHolder()) ?>" value="<?= $Page->HMG8->EditValue ?>"<?= $Page->HMG8->editAttributes() ?> aria-describedby="x_HMG8_help">
<?= $Page->HMG8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG9->Visible) { // HMG9 ?>
    <div id="r_HMG9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG9" for="x_HMG9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG9->caption() ?><?= $Page->HMG9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG9">
<input type="<?= $Page->HMG9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG9" name="x_HMG9" id="x_HMG9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG9->getPlaceHolder()) ?>" value="<?= $Page->HMG9->EditValue ?>"<?= $Page->HMG9->editAttributes() ?> aria-describedby="x_HMG9_help">
<?= $Page->HMG9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG10->Visible) { // HMG10 ?>
    <div id="r_HMG10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG10" for="x_HMG10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG10->caption() ?><?= $Page->HMG10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG10">
<input type="<?= $Page->HMG10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG10" name="x_HMG10" id="x_HMG10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG10->getPlaceHolder()) ?>" value="<?= $Page->HMG10->EditValue ?>"<?= $Page->HMG10->editAttributes() ?> aria-describedby="x_HMG10_help">
<?= $Page->HMG10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG11->Visible) { // HMG11 ?>
    <div id="r_HMG11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG11" for="x_HMG11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG11->caption() ?><?= $Page->HMG11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG11">
<input type="<?= $Page->HMG11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG11" name="x_HMG11" id="x_HMG11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG11->getPlaceHolder()) ?>" value="<?= $Page->HMG11->EditValue ?>"<?= $Page->HMG11->editAttributes() ?> aria-describedby="x_HMG11_help">
<?= $Page->HMG11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG12->Visible) { // HMG12 ?>
    <div id="r_HMG12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG12" for="x_HMG12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG12->caption() ?><?= $Page->HMG12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG12">
<input type="<?= $Page->HMG12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG12" name="x_HMG12" id="x_HMG12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG12->getPlaceHolder()) ?>" value="<?= $Page->HMG12->EditValue ?>"<?= $Page->HMG12->editAttributes() ?> aria-describedby="x_HMG12_help">
<?= $Page->HMG12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG13->Visible) { // HMG13 ?>
    <div id="r_HMG13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG13" for="x_HMG13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG13->caption() ?><?= $Page->HMG13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG13">
<input type="<?= $Page->HMG13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG13" name="x_HMG13" id="x_HMG13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG13->getPlaceHolder()) ?>" value="<?= $Page->HMG13->EditValue ?>"<?= $Page->HMG13->editAttributes() ?> aria-describedby="x_HMG13_help">
<?= $Page->HMG13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH1->Visible) { // GnRH1 ?>
    <div id="r_GnRH1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH1" for="x_GnRH1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH1->caption() ?><?= $Page->GnRH1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH1">
<input type="<?= $Page->GnRH1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH1" name="x_GnRH1" id="x_GnRH1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH1->getPlaceHolder()) ?>" value="<?= $Page->GnRH1->EditValue ?>"<?= $Page->GnRH1->editAttributes() ?> aria-describedby="x_GnRH1_help">
<?= $Page->GnRH1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH2->Visible) { // GnRH2 ?>
    <div id="r_GnRH2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH2" for="x_GnRH2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH2->caption() ?><?= $Page->GnRH2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH2">
<input type="<?= $Page->GnRH2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH2" name="x_GnRH2" id="x_GnRH2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH2->getPlaceHolder()) ?>" value="<?= $Page->GnRH2->EditValue ?>"<?= $Page->GnRH2->editAttributes() ?> aria-describedby="x_GnRH2_help">
<?= $Page->GnRH2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH3->Visible) { // GnRH3 ?>
    <div id="r_GnRH3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH3" for="x_GnRH3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH3->caption() ?><?= $Page->GnRH3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH3">
<input type="<?= $Page->GnRH3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH3" name="x_GnRH3" id="x_GnRH3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH3->getPlaceHolder()) ?>" value="<?= $Page->GnRH3->EditValue ?>"<?= $Page->GnRH3->editAttributes() ?> aria-describedby="x_GnRH3_help">
<?= $Page->GnRH3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH4->Visible) { // GnRH4 ?>
    <div id="r_GnRH4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH4" for="x_GnRH4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH4->caption() ?><?= $Page->GnRH4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH4">
<input type="<?= $Page->GnRH4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH4" name="x_GnRH4" id="x_GnRH4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH4->getPlaceHolder()) ?>" value="<?= $Page->GnRH4->EditValue ?>"<?= $Page->GnRH4->editAttributes() ?> aria-describedby="x_GnRH4_help">
<?= $Page->GnRH4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH5->Visible) { // GnRH5 ?>
    <div id="r_GnRH5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH5" for="x_GnRH5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH5->caption() ?><?= $Page->GnRH5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH5">
<input type="<?= $Page->GnRH5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH5" name="x_GnRH5" id="x_GnRH5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH5->getPlaceHolder()) ?>" value="<?= $Page->GnRH5->EditValue ?>"<?= $Page->GnRH5->editAttributes() ?> aria-describedby="x_GnRH5_help">
<?= $Page->GnRH5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH6->Visible) { // GnRH6 ?>
    <div id="r_GnRH6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH6" for="x_GnRH6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH6->caption() ?><?= $Page->GnRH6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH6">
<input type="<?= $Page->GnRH6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH6" name="x_GnRH6" id="x_GnRH6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH6->getPlaceHolder()) ?>" value="<?= $Page->GnRH6->EditValue ?>"<?= $Page->GnRH6->editAttributes() ?> aria-describedby="x_GnRH6_help">
<?= $Page->GnRH6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH7->Visible) { // GnRH7 ?>
    <div id="r_GnRH7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH7" for="x_GnRH7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH7->caption() ?><?= $Page->GnRH7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH7">
<input type="<?= $Page->GnRH7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH7" name="x_GnRH7" id="x_GnRH7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH7->getPlaceHolder()) ?>" value="<?= $Page->GnRH7->EditValue ?>"<?= $Page->GnRH7->editAttributes() ?> aria-describedby="x_GnRH7_help">
<?= $Page->GnRH7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH8->Visible) { // GnRH8 ?>
    <div id="r_GnRH8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH8" for="x_GnRH8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH8->caption() ?><?= $Page->GnRH8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH8">
<input type="<?= $Page->GnRH8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH8" name="x_GnRH8" id="x_GnRH8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH8->getPlaceHolder()) ?>" value="<?= $Page->GnRH8->EditValue ?>"<?= $Page->GnRH8->editAttributes() ?> aria-describedby="x_GnRH8_help">
<?= $Page->GnRH8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH9->Visible) { // GnRH9 ?>
    <div id="r_GnRH9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH9" for="x_GnRH9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH9->caption() ?><?= $Page->GnRH9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH9">
<input type="<?= $Page->GnRH9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH9" name="x_GnRH9" id="x_GnRH9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH9->getPlaceHolder()) ?>" value="<?= $Page->GnRH9->EditValue ?>"<?= $Page->GnRH9->editAttributes() ?> aria-describedby="x_GnRH9_help">
<?= $Page->GnRH9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH10->Visible) { // GnRH10 ?>
    <div id="r_GnRH10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH10" for="x_GnRH10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH10->caption() ?><?= $Page->GnRH10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH10">
<input type="<?= $Page->GnRH10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH10" name="x_GnRH10" id="x_GnRH10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH10->getPlaceHolder()) ?>" value="<?= $Page->GnRH10->EditValue ?>"<?= $Page->GnRH10->editAttributes() ?> aria-describedby="x_GnRH10_help">
<?= $Page->GnRH10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH11->Visible) { // GnRH11 ?>
    <div id="r_GnRH11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH11" for="x_GnRH11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH11->caption() ?><?= $Page->GnRH11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH11">
<input type="<?= $Page->GnRH11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH11" name="x_GnRH11" id="x_GnRH11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH11->getPlaceHolder()) ?>" value="<?= $Page->GnRH11->EditValue ?>"<?= $Page->GnRH11->editAttributes() ?> aria-describedby="x_GnRH11_help">
<?= $Page->GnRH11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH12->Visible) { // GnRH12 ?>
    <div id="r_GnRH12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH12" for="x_GnRH12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH12->caption() ?><?= $Page->GnRH12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH12">
<input type="<?= $Page->GnRH12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH12" name="x_GnRH12" id="x_GnRH12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH12->getPlaceHolder()) ?>" value="<?= $Page->GnRH12->EditValue ?>"<?= $Page->GnRH12->editAttributes() ?> aria-describedby="x_GnRH12_help">
<?= $Page->GnRH12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH13->Visible) { // GnRH13 ?>
    <div id="r_GnRH13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH13" for="x_GnRH13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH13->caption() ?><?= $Page->GnRH13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH13">
<input type="<?= $Page->GnRH13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH13" name="x_GnRH13" id="x_GnRH13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH13->getPlaceHolder()) ?>" value="<?= $Page->GnRH13->EditValue ?>"<?= $Page->GnRH13->editAttributes() ?> aria-describedby="x_GnRH13_help">
<?= $Page->GnRH13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E21->Visible) { // E21 ?>
    <div id="r_E21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E21" for="x_E21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E21->caption() ?><?= $Page->E21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E21">
<input type="<?= $Page->E21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E21" name="x_E21" id="x_E21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E21->getPlaceHolder()) ?>" value="<?= $Page->E21->EditValue ?>"<?= $Page->E21->editAttributes() ?> aria-describedby="x_E21_help">
<?= $Page->E21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E22->Visible) { // E22 ?>
    <div id="r_E22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E22" for="x_E22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E22->caption() ?><?= $Page->E22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E22">
<input type="<?= $Page->E22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E22" name="x_E22" id="x_E22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E22->getPlaceHolder()) ?>" value="<?= $Page->E22->EditValue ?>"<?= $Page->E22->editAttributes() ?> aria-describedby="x_E22_help">
<?= $Page->E22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E23->Visible) { // E23 ?>
    <div id="r_E23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E23" for="x_E23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E23->caption() ?><?= $Page->E23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E23">
<input type="<?= $Page->E23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E23" name="x_E23" id="x_E23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E23->getPlaceHolder()) ?>" value="<?= $Page->E23->EditValue ?>"<?= $Page->E23->editAttributes() ?> aria-describedby="x_E23_help">
<?= $Page->E23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E24->Visible) { // E24 ?>
    <div id="r_E24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E24" for="x_E24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E24->caption() ?><?= $Page->E24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E24">
<input type="<?= $Page->E24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E24" name="x_E24" id="x_E24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E24->getPlaceHolder()) ?>" value="<?= $Page->E24->EditValue ?>"<?= $Page->E24->editAttributes() ?> aria-describedby="x_E24_help">
<?= $Page->E24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E25->Visible) { // E25 ?>
    <div id="r_E25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E25" for="x_E25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E25->caption() ?><?= $Page->E25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E25">
<input type="<?= $Page->E25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E25" name="x_E25" id="x_E25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E25->getPlaceHolder()) ?>" value="<?= $Page->E25->EditValue ?>"<?= $Page->E25->editAttributes() ?> aria-describedby="x_E25_help">
<?= $Page->E25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E26->Visible) { // E26 ?>
    <div id="r_E26" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E26" for="x_E26" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E26->caption() ?><?= $Page->E26->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E26->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E26">
<input type="<?= $Page->E26->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E26" name="x_E26" id="x_E26" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E26->getPlaceHolder()) ?>" value="<?= $Page->E26->EditValue ?>"<?= $Page->E26->editAttributes() ?> aria-describedby="x_E26_help">
<?= $Page->E26->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E26->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E27->Visible) { // E27 ?>
    <div id="r_E27" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E27" for="x_E27" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E27->caption() ?><?= $Page->E27->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E27->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E27">
<input type="<?= $Page->E27->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E27" name="x_E27" id="x_E27" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E27->getPlaceHolder()) ?>" value="<?= $Page->E27->EditValue ?>"<?= $Page->E27->editAttributes() ?> aria-describedby="x_E27_help">
<?= $Page->E27->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E27->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E28->Visible) { // E28 ?>
    <div id="r_E28" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E28" for="x_E28" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E28->caption() ?><?= $Page->E28->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E28->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E28">
<input type="<?= $Page->E28->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E28" name="x_E28" id="x_E28" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E28->getPlaceHolder()) ?>" value="<?= $Page->E28->EditValue ?>"<?= $Page->E28->editAttributes() ?> aria-describedby="x_E28_help">
<?= $Page->E28->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E28->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E29->Visible) { // E29 ?>
    <div id="r_E29" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E29" for="x_E29" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E29->caption() ?><?= $Page->E29->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E29->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E29">
<input type="<?= $Page->E29->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E29" name="x_E29" id="x_E29" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E29->getPlaceHolder()) ?>" value="<?= $Page->E29->EditValue ?>"<?= $Page->E29->editAttributes() ?> aria-describedby="x_E29_help">
<?= $Page->E29->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E29->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E210->Visible) { // E210 ?>
    <div id="r_E210" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E210" for="x_E210" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E210->caption() ?><?= $Page->E210->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E210->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E210">
<input type="<?= $Page->E210->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E210" name="x_E210" id="x_E210" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E210->getPlaceHolder()) ?>" value="<?= $Page->E210->EditValue ?>"<?= $Page->E210->editAttributes() ?> aria-describedby="x_E210_help">
<?= $Page->E210->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E210->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E211->Visible) { // E211 ?>
    <div id="r_E211" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E211" for="x_E211" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E211->caption() ?><?= $Page->E211->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E211->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E211">
<input type="<?= $Page->E211->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E211" name="x_E211" id="x_E211" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E211->getPlaceHolder()) ?>" value="<?= $Page->E211->EditValue ?>"<?= $Page->E211->editAttributes() ?> aria-describedby="x_E211_help">
<?= $Page->E211->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E211->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E212->Visible) { // E212 ?>
    <div id="r_E212" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E212" for="x_E212" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E212->caption() ?><?= $Page->E212->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E212->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E212">
<input type="<?= $Page->E212->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E212" name="x_E212" id="x_E212" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E212->getPlaceHolder()) ?>" value="<?= $Page->E212->EditValue ?>"<?= $Page->E212->editAttributes() ?> aria-describedby="x_E212_help">
<?= $Page->E212->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E212->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E213->Visible) { // E213 ?>
    <div id="r_E213" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E213" for="x_E213" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E213->caption() ?><?= $Page->E213->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E213->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E213">
<input type="<?= $Page->E213->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E213" name="x_E213" id="x_E213" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E213->getPlaceHolder()) ?>" value="<?= $Page->E213->EditValue ?>"<?= $Page->E213->editAttributes() ?> aria-describedby="x_E213_help">
<?= $Page->E213->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E213->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P41->Visible) { // P41 ?>
    <div id="r_P41" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P41" for="x_P41" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P41->caption() ?><?= $Page->P41->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P41->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P41">
<input type="<?= $Page->P41->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P41" name="x_P41" id="x_P41" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P41->getPlaceHolder()) ?>" value="<?= $Page->P41->EditValue ?>"<?= $Page->P41->editAttributes() ?> aria-describedby="x_P41_help">
<?= $Page->P41->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P41->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P42->Visible) { // P42 ?>
    <div id="r_P42" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P42" for="x_P42" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P42->caption() ?><?= $Page->P42->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P42->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P42">
<input type="<?= $Page->P42->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P42" name="x_P42" id="x_P42" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P42->getPlaceHolder()) ?>" value="<?= $Page->P42->EditValue ?>"<?= $Page->P42->editAttributes() ?> aria-describedby="x_P42_help">
<?= $Page->P42->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P42->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P43->Visible) { // P43 ?>
    <div id="r_P43" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P43" for="x_P43" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P43->caption() ?><?= $Page->P43->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P43->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P43">
<input type="<?= $Page->P43->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P43" name="x_P43" id="x_P43" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P43->getPlaceHolder()) ?>" value="<?= $Page->P43->EditValue ?>"<?= $Page->P43->editAttributes() ?> aria-describedby="x_P43_help">
<?= $Page->P43->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P43->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P44->Visible) { // P44 ?>
    <div id="r_P44" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P44" for="x_P44" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P44->caption() ?><?= $Page->P44->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P44->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P44">
<input type="<?= $Page->P44->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P44" name="x_P44" id="x_P44" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P44->getPlaceHolder()) ?>" value="<?= $Page->P44->EditValue ?>"<?= $Page->P44->editAttributes() ?> aria-describedby="x_P44_help">
<?= $Page->P44->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P44->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P45->Visible) { // P45 ?>
    <div id="r_P45" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P45" for="x_P45" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P45->caption() ?><?= $Page->P45->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P45->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P45">
<input type="<?= $Page->P45->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P45" name="x_P45" id="x_P45" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P45->getPlaceHolder()) ?>" value="<?= $Page->P45->EditValue ?>"<?= $Page->P45->editAttributes() ?> aria-describedby="x_P45_help">
<?= $Page->P45->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P45->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P46->Visible) { // P46 ?>
    <div id="r_P46" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P46" for="x_P46" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P46->caption() ?><?= $Page->P46->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P46->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P46">
<input type="<?= $Page->P46->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P46" name="x_P46" id="x_P46" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P46->getPlaceHolder()) ?>" value="<?= $Page->P46->EditValue ?>"<?= $Page->P46->editAttributes() ?> aria-describedby="x_P46_help">
<?= $Page->P46->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P46->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P47->Visible) { // P47 ?>
    <div id="r_P47" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P47" for="x_P47" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P47->caption() ?><?= $Page->P47->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P47->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P47">
<input type="<?= $Page->P47->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P47" name="x_P47" id="x_P47" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P47->getPlaceHolder()) ?>" value="<?= $Page->P47->EditValue ?>"<?= $Page->P47->editAttributes() ?> aria-describedby="x_P47_help">
<?= $Page->P47->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P47->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P48->Visible) { // P48 ?>
    <div id="r_P48" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P48" for="x_P48" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P48->caption() ?><?= $Page->P48->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P48->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P48">
<input type="<?= $Page->P48->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P48" name="x_P48" id="x_P48" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P48->getPlaceHolder()) ?>" value="<?= $Page->P48->EditValue ?>"<?= $Page->P48->editAttributes() ?> aria-describedby="x_P48_help">
<?= $Page->P48->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P48->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P49->Visible) { // P49 ?>
    <div id="r_P49" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P49" for="x_P49" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P49->caption() ?><?= $Page->P49->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P49->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P49">
<input type="<?= $Page->P49->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P49" name="x_P49" id="x_P49" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P49->getPlaceHolder()) ?>" value="<?= $Page->P49->EditValue ?>"<?= $Page->P49->editAttributes() ?> aria-describedby="x_P49_help">
<?= $Page->P49->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P49->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P410->Visible) { // P410 ?>
    <div id="r_P410" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P410" for="x_P410" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P410->caption() ?><?= $Page->P410->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P410->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P410">
<input type="<?= $Page->P410->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P410" name="x_P410" id="x_P410" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P410->getPlaceHolder()) ?>" value="<?= $Page->P410->EditValue ?>"<?= $Page->P410->editAttributes() ?> aria-describedby="x_P410_help">
<?= $Page->P410->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P410->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P411->Visible) { // P411 ?>
    <div id="r_P411" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P411" for="x_P411" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P411->caption() ?><?= $Page->P411->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P411->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P411">
<input type="<?= $Page->P411->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P411" name="x_P411" id="x_P411" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P411->getPlaceHolder()) ?>" value="<?= $Page->P411->EditValue ?>"<?= $Page->P411->editAttributes() ?> aria-describedby="x_P411_help">
<?= $Page->P411->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P411->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P412->Visible) { // P412 ?>
    <div id="r_P412" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P412" for="x_P412" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P412->caption() ?><?= $Page->P412->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P412->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P412">
<input type="<?= $Page->P412->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P412" name="x_P412" id="x_P412" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P412->getPlaceHolder()) ?>" value="<?= $Page->P412->EditValue ?>"<?= $Page->P412->editAttributes() ?> aria-describedby="x_P412_help">
<?= $Page->P412->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P412->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P413->Visible) { // P413 ?>
    <div id="r_P413" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P413" for="x_P413" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P413->caption() ?><?= $Page->P413->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P413->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P413">
<input type="<?= $Page->P413->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P413" name="x_P413" id="x_P413" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P413->getPlaceHolder()) ?>" value="<?= $Page->P413->EditValue ?>"<?= $Page->P413->editAttributes() ?> aria-describedby="x_P413_help">
<?= $Page->P413->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P413->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt1->Visible) { // USGRt1 ?>
    <div id="r_USGRt1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt1" for="x_USGRt1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt1->caption() ?><?= $Page->USGRt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt1">
<input type="<?= $Page->USGRt1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt1" name="x_USGRt1" id="x_USGRt1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt1->getPlaceHolder()) ?>" value="<?= $Page->USGRt1->EditValue ?>"<?= $Page->USGRt1->editAttributes() ?> aria-describedby="x_USGRt1_help">
<?= $Page->USGRt1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt2->Visible) { // USGRt2 ?>
    <div id="r_USGRt2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt2" for="x_USGRt2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt2->caption() ?><?= $Page->USGRt2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt2">
<input type="<?= $Page->USGRt2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt2" name="x_USGRt2" id="x_USGRt2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt2->getPlaceHolder()) ?>" value="<?= $Page->USGRt2->EditValue ?>"<?= $Page->USGRt2->editAttributes() ?> aria-describedby="x_USGRt2_help">
<?= $Page->USGRt2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt3->Visible) { // USGRt3 ?>
    <div id="r_USGRt3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt3" for="x_USGRt3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt3->caption() ?><?= $Page->USGRt3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt3">
<input type="<?= $Page->USGRt3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt3" name="x_USGRt3" id="x_USGRt3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt3->getPlaceHolder()) ?>" value="<?= $Page->USGRt3->EditValue ?>"<?= $Page->USGRt3->editAttributes() ?> aria-describedby="x_USGRt3_help">
<?= $Page->USGRt3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt4->Visible) { // USGRt4 ?>
    <div id="r_USGRt4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt4" for="x_USGRt4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt4->caption() ?><?= $Page->USGRt4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt4">
<input type="<?= $Page->USGRt4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt4" name="x_USGRt4" id="x_USGRt4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt4->getPlaceHolder()) ?>" value="<?= $Page->USGRt4->EditValue ?>"<?= $Page->USGRt4->editAttributes() ?> aria-describedby="x_USGRt4_help">
<?= $Page->USGRt4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt5->Visible) { // USGRt5 ?>
    <div id="r_USGRt5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt5" for="x_USGRt5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt5->caption() ?><?= $Page->USGRt5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt5">
<input type="<?= $Page->USGRt5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt5" name="x_USGRt5" id="x_USGRt5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt5->getPlaceHolder()) ?>" value="<?= $Page->USGRt5->EditValue ?>"<?= $Page->USGRt5->editAttributes() ?> aria-describedby="x_USGRt5_help">
<?= $Page->USGRt5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt6->Visible) { // USGRt6 ?>
    <div id="r_USGRt6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt6" for="x_USGRt6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt6->caption() ?><?= $Page->USGRt6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt6">
<input type="<?= $Page->USGRt6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt6" name="x_USGRt6" id="x_USGRt6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt6->getPlaceHolder()) ?>" value="<?= $Page->USGRt6->EditValue ?>"<?= $Page->USGRt6->editAttributes() ?> aria-describedby="x_USGRt6_help">
<?= $Page->USGRt6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt7->Visible) { // USGRt7 ?>
    <div id="r_USGRt7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt7" for="x_USGRt7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt7->caption() ?><?= $Page->USGRt7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt7">
<input type="<?= $Page->USGRt7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt7" name="x_USGRt7" id="x_USGRt7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt7->getPlaceHolder()) ?>" value="<?= $Page->USGRt7->EditValue ?>"<?= $Page->USGRt7->editAttributes() ?> aria-describedby="x_USGRt7_help">
<?= $Page->USGRt7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt8->Visible) { // USGRt8 ?>
    <div id="r_USGRt8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt8" for="x_USGRt8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt8->caption() ?><?= $Page->USGRt8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt8">
<input type="<?= $Page->USGRt8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt8" name="x_USGRt8" id="x_USGRt8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt8->getPlaceHolder()) ?>" value="<?= $Page->USGRt8->EditValue ?>"<?= $Page->USGRt8->editAttributes() ?> aria-describedby="x_USGRt8_help">
<?= $Page->USGRt8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt9->Visible) { // USGRt9 ?>
    <div id="r_USGRt9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt9" for="x_USGRt9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt9->caption() ?><?= $Page->USGRt9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt9">
<input type="<?= $Page->USGRt9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt9" name="x_USGRt9" id="x_USGRt9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt9->getPlaceHolder()) ?>" value="<?= $Page->USGRt9->EditValue ?>"<?= $Page->USGRt9->editAttributes() ?> aria-describedby="x_USGRt9_help">
<?= $Page->USGRt9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt10->Visible) { // USGRt10 ?>
    <div id="r_USGRt10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt10" for="x_USGRt10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt10->caption() ?><?= $Page->USGRt10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt10">
<input type="<?= $Page->USGRt10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt10" name="x_USGRt10" id="x_USGRt10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt10->getPlaceHolder()) ?>" value="<?= $Page->USGRt10->EditValue ?>"<?= $Page->USGRt10->editAttributes() ?> aria-describedby="x_USGRt10_help">
<?= $Page->USGRt10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt11->Visible) { // USGRt11 ?>
    <div id="r_USGRt11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt11" for="x_USGRt11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt11->caption() ?><?= $Page->USGRt11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt11">
<input type="<?= $Page->USGRt11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt11" name="x_USGRt11" id="x_USGRt11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt11->getPlaceHolder()) ?>" value="<?= $Page->USGRt11->EditValue ?>"<?= $Page->USGRt11->editAttributes() ?> aria-describedby="x_USGRt11_help">
<?= $Page->USGRt11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt12->Visible) { // USGRt12 ?>
    <div id="r_USGRt12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt12" for="x_USGRt12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt12->caption() ?><?= $Page->USGRt12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt12">
<input type="<?= $Page->USGRt12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt12" name="x_USGRt12" id="x_USGRt12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt12->getPlaceHolder()) ?>" value="<?= $Page->USGRt12->EditValue ?>"<?= $Page->USGRt12->editAttributes() ?> aria-describedby="x_USGRt12_help">
<?= $Page->USGRt12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt13->Visible) { // USGRt13 ?>
    <div id="r_USGRt13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt13" for="x_USGRt13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt13->caption() ?><?= $Page->USGRt13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt13">
<input type="<?= $Page->USGRt13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt13" name="x_USGRt13" id="x_USGRt13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt13->getPlaceHolder()) ?>" value="<?= $Page->USGRt13->EditValue ?>"<?= $Page->USGRt13->editAttributes() ?> aria-describedby="x_USGRt13_help">
<?= $Page->USGRt13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt1->Visible) { // USGLt1 ?>
    <div id="r_USGLt1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt1" for="x_USGLt1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt1->caption() ?><?= $Page->USGLt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt1">
<input type="<?= $Page->USGLt1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt1" name="x_USGLt1" id="x_USGLt1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt1->getPlaceHolder()) ?>" value="<?= $Page->USGLt1->EditValue ?>"<?= $Page->USGLt1->editAttributes() ?> aria-describedby="x_USGLt1_help">
<?= $Page->USGLt1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt2->Visible) { // USGLt2 ?>
    <div id="r_USGLt2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt2" for="x_USGLt2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt2->caption() ?><?= $Page->USGLt2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt2">
<input type="<?= $Page->USGLt2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt2" name="x_USGLt2" id="x_USGLt2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt2->getPlaceHolder()) ?>" value="<?= $Page->USGLt2->EditValue ?>"<?= $Page->USGLt2->editAttributes() ?> aria-describedby="x_USGLt2_help">
<?= $Page->USGLt2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt3->Visible) { // USGLt3 ?>
    <div id="r_USGLt3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt3" for="x_USGLt3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt3->caption() ?><?= $Page->USGLt3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt3">
<input type="<?= $Page->USGLt3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt3" name="x_USGLt3" id="x_USGLt3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt3->getPlaceHolder()) ?>" value="<?= $Page->USGLt3->EditValue ?>"<?= $Page->USGLt3->editAttributes() ?> aria-describedby="x_USGLt3_help">
<?= $Page->USGLt3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt4->Visible) { // USGLt4 ?>
    <div id="r_USGLt4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt4" for="x_USGLt4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt4->caption() ?><?= $Page->USGLt4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt4">
<input type="<?= $Page->USGLt4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt4" name="x_USGLt4" id="x_USGLt4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt4->getPlaceHolder()) ?>" value="<?= $Page->USGLt4->EditValue ?>"<?= $Page->USGLt4->editAttributes() ?> aria-describedby="x_USGLt4_help">
<?= $Page->USGLt4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt5->Visible) { // USGLt5 ?>
    <div id="r_USGLt5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt5" for="x_USGLt5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt5->caption() ?><?= $Page->USGLt5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt5">
<input type="<?= $Page->USGLt5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt5" name="x_USGLt5" id="x_USGLt5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt5->getPlaceHolder()) ?>" value="<?= $Page->USGLt5->EditValue ?>"<?= $Page->USGLt5->editAttributes() ?> aria-describedby="x_USGLt5_help">
<?= $Page->USGLt5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt6->Visible) { // USGLt6 ?>
    <div id="r_USGLt6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt6" for="x_USGLt6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt6->caption() ?><?= $Page->USGLt6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt6">
<input type="<?= $Page->USGLt6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt6" name="x_USGLt6" id="x_USGLt6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt6->getPlaceHolder()) ?>" value="<?= $Page->USGLt6->EditValue ?>"<?= $Page->USGLt6->editAttributes() ?> aria-describedby="x_USGLt6_help">
<?= $Page->USGLt6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt7->Visible) { // USGLt7 ?>
    <div id="r_USGLt7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt7" for="x_USGLt7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt7->caption() ?><?= $Page->USGLt7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt7">
<input type="<?= $Page->USGLt7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt7" name="x_USGLt7" id="x_USGLt7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt7->getPlaceHolder()) ?>" value="<?= $Page->USGLt7->EditValue ?>"<?= $Page->USGLt7->editAttributes() ?> aria-describedby="x_USGLt7_help">
<?= $Page->USGLt7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt8->Visible) { // USGLt8 ?>
    <div id="r_USGLt8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt8" for="x_USGLt8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt8->caption() ?><?= $Page->USGLt8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt8">
<input type="<?= $Page->USGLt8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt8" name="x_USGLt8" id="x_USGLt8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt8->getPlaceHolder()) ?>" value="<?= $Page->USGLt8->EditValue ?>"<?= $Page->USGLt8->editAttributes() ?> aria-describedby="x_USGLt8_help">
<?= $Page->USGLt8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt9->Visible) { // USGLt9 ?>
    <div id="r_USGLt9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt9" for="x_USGLt9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt9->caption() ?><?= $Page->USGLt9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt9">
<input type="<?= $Page->USGLt9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt9" name="x_USGLt9" id="x_USGLt9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt9->getPlaceHolder()) ?>" value="<?= $Page->USGLt9->EditValue ?>"<?= $Page->USGLt9->editAttributes() ?> aria-describedby="x_USGLt9_help">
<?= $Page->USGLt9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt10->Visible) { // USGLt10 ?>
    <div id="r_USGLt10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt10" for="x_USGLt10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt10->caption() ?><?= $Page->USGLt10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt10">
<input type="<?= $Page->USGLt10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt10" name="x_USGLt10" id="x_USGLt10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt10->getPlaceHolder()) ?>" value="<?= $Page->USGLt10->EditValue ?>"<?= $Page->USGLt10->editAttributes() ?> aria-describedby="x_USGLt10_help">
<?= $Page->USGLt10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt11->Visible) { // USGLt11 ?>
    <div id="r_USGLt11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt11" for="x_USGLt11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt11->caption() ?><?= $Page->USGLt11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt11">
<input type="<?= $Page->USGLt11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt11" name="x_USGLt11" id="x_USGLt11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt11->getPlaceHolder()) ?>" value="<?= $Page->USGLt11->EditValue ?>"<?= $Page->USGLt11->editAttributes() ?> aria-describedby="x_USGLt11_help">
<?= $Page->USGLt11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt12->Visible) { // USGLt12 ?>
    <div id="r_USGLt12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt12" for="x_USGLt12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt12->caption() ?><?= $Page->USGLt12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt12">
<input type="<?= $Page->USGLt12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt12" name="x_USGLt12" id="x_USGLt12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt12->getPlaceHolder()) ?>" value="<?= $Page->USGLt12->EditValue ?>"<?= $Page->USGLt12->editAttributes() ?> aria-describedby="x_USGLt12_help">
<?= $Page->USGLt12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt13->Visible) { // USGLt13 ?>
    <div id="r_USGLt13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt13" for="x_USGLt13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt13->caption() ?><?= $Page->USGLt13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt13">
<input type="<?= $Page->USGLt13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt13" name="x_USGLt13" id="x_USGLt13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt13->getPlaceHolder()) ?>" value="<?= $Page->USGLt13->EditValue ?>"<?= $Page->USGLt13->editAttributes() ?> aria-describedby="x_USGLt13_help">
<?= $Page->USGLt13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM1->Visible) { // EM1 ?>
    <div id="r_EM1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM1" for="x_EM1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM1->caption() ?><?= $Page->EM1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM1">
<input type="<?= $Page->EM1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM1" name="x_EM1" id="x_EM1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM1->getPlaceHolder()) ?>" value="<?= $Page->EM1->EditValue ?>"<?= $Page->EM1->editAttributes() ?> aria-describedby="x_EM1_help">
<?= $Page->EM1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM2->Visible) { // EM2 ?>
    <div id="r_EM2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM2" for="x_EM2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM2->caption() ?><?= $Page->EM2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM2">
<input type="<?= $Page->EM2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM2" name="x_EM2" id="x_EM2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM2->getPlaceHolder()) ?>" value="<?= $Page->EM2->EditValue ?>"<?= $Page->EM2->editAttributes() ?> aria-describedby="x_EM2_help">
<?= $Page->EM2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM3->Visible) { // EM3 ?>
    <div id="r_EM3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM3" for="x_EM3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM3->caption() ?><?= $Page->EM3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM3">
<input type="<?= $Page->EM3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM3" name="x_EM3" id="x_EM3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM3->getPlaceHolder()) ?>" value="<?= $Page->EM3->EditValue ?>"<?= $Page->EM3->editAttributes() ?> aria-describedby="x_EM3_help">
<?= $Page->EM3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM4->Visible) { // EM4 ?>
    <div id="r_EM4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM4" for="x_EM4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM4->caption() ?><?= $Page->EM4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM4">
<input type="<?= $Page->EM4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM4" name="x_EM4" id="x_EM4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM4->getPlaceHolder()) ?>" value="<?= $Page->EM4->EditValue ?>"<?= $Page->EM4->editAttributes() ?> aria-describedby="x_EM4_help">
<?= $Page->EM4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM5->Visible) { // EM5 ?>
    <div id="r_EM5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM5" for="x_EM5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM5->caption() ?><?= $Page->EM5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM5">
<input type="<?= $Page->EM5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM5" name="x_EM5" id="x_EM5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM5->getPlaceHolder()) ?>" value="<?= $Page->EM5->EditValue ?>"<?= $Page->EM5->editAttributes() ?> aria-describedby="x_EM5_help">
<?= $Page->EM5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM6->Visible) { // EM6 ?>
    <div id="r_EM6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM6" for="x_EM6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM6->caption() ?><?= $Page->EM6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM6">
<input type="<?= $Page->EM6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM6" name="x_EM6" id="x_EM6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM6->getPlaceHolder()) ?>" value="<?= $Page->EM6->EditValue ?>"<?= $Page->EM6->editAttributes() ?> aria-describedby="x_EM6_help">
<?= $Page->EM6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM7->Visible) { // EM7 ?>
    <div id="r_EM7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM7" for="x_EM7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM7->caption() ?><?= $Page->EM7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM7">
<input type="<?= $Page->EM7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM7" name="x_EM7" id="x_EM7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM7->getPlaceHolder()) ?>" value="<?= $Page->EM7->EditValue ?>"<?= $Page->EM7->editAttributes() ?> aria-describedby="x_EM7_help">
<?= $Page->EM7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM8->Visible) { // EM8 ?>
    <div id="r_EM8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM8" for="x_EM8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM8->caption() ?><?= $Page->EM8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM8">
<input type="<?= $Page->EM8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM8" name="x_EM8" id="x_EM8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM8->getPlaceHolder()) ?>" value="<?= $Page->EM8->EditValue ?>"<?= $Page->EM8->editAttributes() ?> aria-describedby="x_EM8_help">
<?= $Page->EM8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM9->Visible) { // EM9 ?>
    <div id="r_EM9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM9" for="x_EM9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM9->caption() ?><?= $Page->EM9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM9">
<input type="<?= $Page->EM9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM9" name="x_EM9" id="x_EM9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM9->getPlaceHolder()) ?>" value="<?= $Page->EM9->EditValue ?>"<?= $Page->EM9->editAttributes() ?> aria-describedby="x_EM9_help">
<?= $Page->EM9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM10->Visible) { // EM10 ?>
    <div id="r_EM10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM10" for="x_EM10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM10->caption() ?><?= $Page->EM10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM10">
<input type="<?= $Page->EM10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM10" name="x_EM10" id="x_EM10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM10->getPlaceHolder()) ?>" value="<?= $Page->EM10->EditValue ?>"<?= $Page->EM10->editAttributes() ?> aria-describedby="x_EM10_help">
<?= $Page->EM10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM11->Visible) { // EM11 ?>
    <div id="r_EM11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM11" for="x_EM11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM11->caption() ?><?= $Page->EM11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM11">
<input type="<?= $Page->EM11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM11" name="x_EM11" id="x_EM11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM11->getPlaceHolder()) ?>" value="<?= $Page->EM11->EditValue ?>"<?= $Page->EM11->editAttributes() ?> aria-describedby="x_EM11_help">
<?= $Page->EM11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM12->Visible) { // EM12 ?>
    <div id="r_EM12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM12" for="x_EM12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM12->caption() ?><?= $Page->EM12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM12">
<input type="<?= $Page->EM12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM12" name="x_EM12" id="x_EM12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM12->getPlaceHolder()) ?>" value="<?= $Page->EM12->EditValue ?>"<?= $Page->EM12->editAttributes() ?> aria-describedby="x_EM12_help">
<?= $Page->EM12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM13->Visible) { // EM13 ?>
    <div id="r_EM13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM13" for="x_EM13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM13->caption() ?><?= $Page->EM13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM13">
<input type="<?= $Page->EM13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM13" name="x_EM13" id="x_EM13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM13->getPlaceHolder()) ?>" value="<?= $Page->EM13->EditValue ?>"<?= $Page->EM13->editAttributes() ?> aria-describedby="x_EM13_help">
<?= $Page->EM13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
    <div id="r_Others1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others1" for="x_Others1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others1->caption() ?><?= $Page->Others1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others1">
<input type="<?= $Page->Others1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others1" name="x_Others1" id="x_Others1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others1->getPlaceHolder()) ?>" value="<?= $Page->Others1->EditValue ?>"<?= $Page->Others1->editAttributes() ?> aria-describedby="x_Others1_help">
<?= $Page->Others1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
    <div id="r_Others2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others2" for="x_Others2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others2->caption() ?><?= $Page->Others2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others2">
<input type="<?= $Page->Others2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others2" name="x_Others2" id="x_Others2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others2->getPlaceHolder()) ?>" value="<?= $Page->Others2->EditValue ?>"<?= $Page->Others2->editAttributes() ?> aria-describedby="x_Others2_help">
<?= $Page->Others2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others3->Visible) { // Others3 ?>
    <div id="r_Others3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others3" for="x_Others3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others3->caption() ?><?= $Page->Others3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others3">
<input type="<?= $Page->Others3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others3" name="x_Others3" id="x_Others3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others3->getPlaceHolder()) ?>" value="<?= $Page->Others3->EditValue ?>"<?= $Page->Others3->editAttributes() ?> aria-describedby="x_Others3_help">
<?= $Page->Others3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others4->Visible) { // Others4 ?>
    <div id="r_Others4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others4" for="x_Others4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others4->caption() ?><?= $Page->Others4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others4">
<input type="<?= $Page->Others4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others4" name="x_Others4" id="x_Others4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others4->getPlaceHolder()) ?>" value="<?= $Page->Others4->EditValue ?>"<?= $Page->Others4->editAttributes() ?> aria-describedby="x_Others4_help">
<?= $Page->Others4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others5->Visible) { // Others5 ?>
    <div id="r_Others5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others5" for="x_Others5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others5->caption() ?><?= $Page->Others5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others5">
<input type="<?= $Page->Others5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others5" name="x_Others5" id="x_Others5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others5->getPlaceHolder()) ?>" value="<?= $Page->Others5->EditValue ?>"<?= $Page->Others5->editAttributes() ?> aria-describedby="x_Others5_help">
<?= $Page->Others5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others6->Visible) { // Others6 ?>
    <div id="r_Others6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others6" for="x_Others6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others6->caption() ?><?= $Page->Others6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others6">
<input type="<?= $Page->Others6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others6" name="x_Others6" id="x_Others6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others6->getPlaceHolder()) ?>" value="<?= $Page->Others6->EditValue ?>"<?= $Page->Others6->editAttributes() ?> aria-describedby="x_Others6_help">
<?= $Page->Others6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others7->Visible) { // Others7 ?>
    <div id="r_Others7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others7" for="x_Others7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others7->caption() ?><?= $Page->Others7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others7">
<input type="<?= $Page->Others7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others7" name="x_Others7" id="x_Others7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others7->getPlaceHolder()) ?>" value="<?= $Page->Others7->EditValue ?>"<?= $Page->Others7->editAttributes() ?> aria-describedby="x_Others7_help">
<?= $Page->Others7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others8->Visible) { // Others8 ?>
    <div id="r_Others8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others8" for="x_Others8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others8->caption() ?><?= $Page->Others8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others8">
<input type="<?= $Page->Others8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others8" name="x_Others8" id="x_Others8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others8->getPlaceHolder()) ?>" value="<?= $Page->Others8->EditValue ?>"<?= $Page->Others8->editAttributes() ?> aria-describedby="x_Others8_help">
<?= $Page->Others8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others9->Visible) { // Others9 ?>
    <div id="r_Others9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others9" for="x_Others9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others9->caption() ?><?= $Page->Others9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others9">
<input type="<?= $Page->Others9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others9" name="x_Others9" id="x_Others9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others9->getPlaceHolder()) ?>" value="<?= $Page->Others9->EditValue ?>"<?= $Page->Others9->editAttributes() ?> aria-describedby="x_Others9_help">
<?= $Page->Others9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others10->Visible) { // Others10 ?>
    <div id="r_Others10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others10" for="x_Others10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others10->caption() ?><?= $Page->Others10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others10">
<input type="<?= $Page->Others10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others10" name="x_Others10" id="x_Others10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others10->getPlaceHolder()) ?>" value="<?= $Page->Others10->EditValue ?>"<?= $Page->Others10->editAttributes() ?> aria-describedby="x_Others10_help">
<?= $Page->Others10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others11->Visible) { // Others11 ?>
    <div id="r_Others11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others11" for="x_Others11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others11->caption() ?><?= $Page->Others11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others11">
<input type="<?= $Page->Others11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others11" name="x_Others11" id="x_Others11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others11->getPlaceHolder()) ?>" value="<?= $Page->Others11->EditValue ?>"<?= $Page->Others11->editAttributes() ?> aria-describedby="x_Others11_help">
<?= $Page->Others11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others12->Visible) { // Others12 ?>
    <div id="r_Others12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others12" for="x_Others12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others12->caption() ?><?= $Page->Others12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others12">
<input type="<?= $Page->Others12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others12" name="x_Others12" id="x_Others12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others12->getPlaceHolder()) ?>" value="<?= $Page->Others12->EditValue ?>"<?= $Page->Others12->editAttributes() ?> aria-describedby="x_Others12_help">
<?= $Page->Others12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others13->Visible) { // Others13 ?>
    <div id="r_Others13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others13" for="x_Others13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others13->caption() ?><?= $Page->Others13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others13">
<input type="<?= $Page->Others13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others13" name="x_Others13" id="x_Others13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others13->getPlaceHolder()) ?>" value="<?= $Page->Others13->EditValue ?>"<?= $Page->Others13->editAttributes() ?> aria-describedby="x_Others13_help">
<?= $Page->Others13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR1->Visible) { // DR1 ?>
    <div id="r_DR1" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR1" for="x_DR1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR1->caption() ?><?= $Page->DR1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR1">
<input type="<?= $Page->DR1->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR1" name="x_DR1" id="x_DR1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR1->getPlaceHolder()) ?>" value="<?= $Page->DR1->EditValue ?>"<?= $Page->DR1->editAttributes() ?> aria-describedby="x_DR1_help">
<?= $Page->DR1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR2->Visible) { // DR2 ?>
    <div id="r_DR2" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR2" for="x_DR2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR2->caption() ?><?= $Page->DR2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR2">
<input type="<?= $Page->DR2->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR2" name="x_DR2" id="x_DR2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR2->getPlaceHolder()) ?>" value="<?= $Page->DR2->EditValue ?>"<?= $Page->DR2->editAttributes() ?> aria-describedby="x_DR2_help">
<?= $Page->DR2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR3->Visible) { // DR3 ?>
    <div id="r_DR3" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR3" for="x_DR3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR3->caption() ?><?= $Page->DR3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR3">
<input type="<?= $Page->DR3->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR3" name="x_DR3" id="x_DR3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR3->getPlaceHolder()) ?>" value="<?= $Page->DR3->EditValue ?>"<?= $Page->DR3->editAttributes() ?> aria-describedby="x_DR3_help">
<?= $Page->DR3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR4->Visible) { // DR4 ?>
    <div id="r_DR4" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR4" for="x_DR4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR4->caption() ?><?= $Page->DR4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR4">
<input type="<?= $Page->DR4->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR4" name="x_DR4" id="x_DR4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR4->getPlaceHolder()) ?>" value="<?= $Page->DR4->EditValue ?>"<?= $Page->DR4->editAttributes() ?> aria-describedby="x_DR4_help">
<?= $Page->DR4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR5->Visible) { // DR5 ?>
    <div id="r_DR5" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR5" for="x_DR5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR5->caption() ?><?= $Page->DR5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR5">
<input type="<?= $Page->DR5->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR5" name="x_DR5" id="x_DR5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR5->getPlaceHolder()) ?>" value="<?= $Page->DR5->EditValue ?>"<?= $Page->DR5->editAttributes() ?> aria-describedby="x_DR5_help">
<?= $Page->DR5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR6->Visible) { // DR6 ?>
    <div id="r_DR6" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR6" for="x_DR6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR6->caption() ?><?= $Page->DR6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR6">
<input type="<?= $Page->DR6->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR6" name="x_DR6" id="x_DR6" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR6->getPlaceHolder()) ?>" value="<?= $Page->DR6->EditValue ?>"<?= $Page->DR6->editAttributes() ?> aria-describedby="x_DR6_help">
<?= $Page->DR6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR7->Visible) { // DR7 ?>
    <div id="r_DR7" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR7" for="x_DR7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR7->caption() ?><?= $Page->DR7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR7">
<input type="<?= $Page->DR7->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR7" name="x_DR7" id="x_DR7" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR7->getPlaceHolder()) ?>" value="<?= $Page->DR7->EditValue ?>"<?= $Page->DR7->editAttributes() ?> aria-describedby="x_DR7_help">
<?= $Page->DR7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR8->Visible) { // DR8 ?>
    <div id="r_DR8" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR8" for="x_DR8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR8->caption() ?><?= $Page->DR8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR8">
<input type="<?= $Page->DR8->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR8" name="x_DR8" id="x_DR8" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR8->getPlaceHolder()) ?>" value="<?= $Page->DR8->EditValue ?>"<?= $Page->DR8->editAttributes() ?> aria-describedby="x_DR8_help">
<?= $Page->DR8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR9->Visible) { // DR9 ?>
    <div id="r_DR9" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR9" for="x_DR9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR9->caption() ?><?= $Page->DR9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR9">
<input type="<?= $Page->DR9->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR9" name="x_DR9" id="x_DR9" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR9->getPlaceHolder()) ?>" value="<?= $Page->DR9->EditValue ?>"<?= $Page->DR9->editAttributes() ?> aria-describedby="x_DR9_help">
<?= $Page->DR9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR10->Visible) { // DR10 ?>
    <div id="r_DR10" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR10" for="x_DR10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR10->caption() ?><?= $Page->DR10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR10">
<input type="<?= $Page->DR10->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR10" name="x_DR10" id="x_DR10" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR10->getPlaceHolder()) ?>" value="<?= $Page->DR10->EditValue ?>"<?= $Page->DR10->editAttributes() ?> aria-describedby="x_DR10_help">
<?= $Page->DR10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR11->Visible) { // DR11 ?>
    <div id="r_DR11" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR11" for="x_DR11" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR11->caption() ?><?= $Page->DR11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR11">
<input type="<?= $Page->DR11->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR11" name="x_DR11" id="x_DR11" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR11->getPlaceHolder()) ?>" value="<?= $Page->DR11->EditValue ?>"<?= $Page->DR11->editAttributes() ?> aria-describedby="x_DR11_help">
<?= $Page->DR11->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR11->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR12->Visible) { // DR12 ?>
    <div id="r_DR12" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR12" for="x_DR12" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR12->caption() ?><?= $Page->DR12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR12">
<input type="<?= $Page->DR12->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR12" name="x_DR12" id="x_DR12" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR12->getPlaceHolder()) ?>" value="<?= $Page->DR12->EditValue ?>"<?= $Page->DR12->editAttributes() ?> aria-describedby="x_DR12_help">
<?= $Page->DR12->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR12->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR13->Visible) { // DR13 ?>
    <div id="r_DR13" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR13" for="x_DR13" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR13->caption() ?><?= $Page->DR13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR13">
<input type="<?= $Page->DR13->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR13" name="x_DR13" id="x_DR13" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR13->getPlaceHolder()) ?>" value="<?= $Page->DR13->EditValue ?>"<?= $Page->DR13->editAttributes() ?> aria-describedby="x_DR13_help">
<?= $Page->DR13->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR13->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DOCTORRESPONSIBLE->Visible) { // DOCTORRESPONSIBLE ?>
    <div id="r_DOCTORRESPONSIBLE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DOCTORRESPONSIBLE" for="x_DOCTORRESPONSIBLE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DOCTORRESPONSIBLE->caption() ?><?= $Page->DOCTORRESPONSIBLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DOCTORRESPONSIBLE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DOCTORRESPONSIBLE">
<textarea data-table="ivf_stimulation_chart" data-field="x_DOCTORRESPONSIBLE" name="x_DOCTORRESPONSIBLE" id="x_DOCTORRESPONSIBLE" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DOCTORRESPONSIBLE->getPlaceHolder()) ?>"<?= $Page->DOCTORRESPONSIBLE->editAttributes() ?> aria-describedby="x_DOCTORRESPONSIBLE_help"><?= $Page->DOCTORRESPONSIBLE->EditValue ?></textarea>
<?= $Page->DOCTORRESPONSIBLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DOCTORRESPONSIBLE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Convert->Visible) { // Convert ?>
    <div id="r_Convert" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Convert" for="x_Convert" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Convert->caption() ?><?= $Page->Convert->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Convert->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Convert">
<input type="<?= $Page->Convert->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Convert" name="x_Convert" id="x_Convert" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Convert->getPlaceHolder()) ?>" value="<?= $Page->Convert->EditValue ?>"<?= $Page->Convert->editAttributes() ?> aria-describedby="x_Convert_help">
<?= $Page->Convert->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Convert->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Consultant">
<input type="<?= $Page->Consultant->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>" value="<?= $Page->Consultant->EditValue ?>"<?= $Page->Consultant->editAttributes() ?> aria-describedby="x_Consultant_help">
<?= $Page->Consultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <div id="r_InseminatinTechnique" class="form-group row">
        <label id="elh_ivf_stimulation_chart_InseminatinTechnique" for="x_InseminatinTechnique" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InseminatinTechnique->caption() ?><?= $Page->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_InseminatinTechnique">
<input type="<?= $Page->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_InseminatinTechnique" name="x_InseminatinTechnique" id="x_InseminatinTechnique" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Page->InseminatinTechnique->EditValue ?>"<?= $Page->InseminatinTechnique->editAttributes() ?> aria-describedby="x_InseminatinTechnique_help">
<?= $Page->InseminatinTechnique->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InseminatinTechnique->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <div id="r_IndicationForART" class="form-group row">
        <label id="elh_ivf_stimulation_chart_IndicationForART" for="x_IndicationForART" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IndicationForART->caption() ?><?= $Page->IndicationForART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_IndicationForART">
<input type="<?= $Page->IndicationForART->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_IndicationForART" name="x_IndicationForART" id="x_IndicationForART" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IndicationForART->getPlaceHolder()) ?>" value="<?= $Page->IndicationForART->EditValue ?>"<?= $Page->IndicationForART->editAttributes() ?> aria-describedby="x_IndicationForART_help">
<?= $Page->IndicationForART->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IndicationForART->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
    <div id="r_Hysteroscopy" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Hysteroscopy" for="x_Hysteroscopy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Hysteroscopy->caption() ?><?= $Page->Hysteroscopy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Hysteroscopy->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Hysteroscopy">
<input type="<?= $Page->Hysteroscopy->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Hysteroscopy" name="x_Hysteroscopy" id="x_Hysteroscopy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Hysteroscopy->getPlaceHolder()) ?>" value="<?= $Page->Hysteroscopy->EditValue ?>"<?= $Page->Hysteroscopy->editAttributes() ?> aria-describedby="x_Hysteroscopy_help">
<?= $Page->Hysteroscopy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Hysteroscopy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
    <div id="r_EndometrialScratching" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EndometrialScratching" for="x_EndometrialScratching" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EndometrialScratching->caption() ?><?= $Page->EndometrialScratching->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EndometrialScratching->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EndometrialScratching">
<input type="<?= $Page->EndometrialScratching->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EndometrialScratching" name="x_EndometrialScratching" id="x_EndometrialScratching" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EndometrialScratching->getPlaceHolder()) ?>" value="<?= $Page->EndometrialScratching->EditValue ?>"<?= $Page->EndometrialScratching->editAttributes() ?> aria-describedby="x_EndometrialScratching_help">
<?= $Page->EndometrialScratching->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EndometrialScratching->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <div id="r_TrialCannulation" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TrialCannulation" for="x_TrialCannulation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TrialCannulation->caption() ?><?= $Page->TrialCannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TrialCannulation">
<input type="<?= $Page->TrialCannulation->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TrialCannulation" name="x_TrialCannulation" id="x_TrialCannulation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TrialCannulation->getPlaceHolder()) ?>" value="<?= $Page->TrialCannulation->EditValue ?>"<?= $Page->TrialCannulation->editAttributes() ?> aria-describedby="x_TrialCannulation_help">
<?= $Page->TrialCannulation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TrialCannulation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
    <div id="r_CYCLETYPE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CYCLETYPE" for="x_CYCLETYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CYCLETYPE->caption() ?><?= $Page->CYCLETYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CYCLETYPE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CYCLETYPE">
<input type="<?= $Page->CYCLETYPE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CYCLETYPE" name="x_CYCLETYPE" id="x_CYCLETYPE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CYCLETYPE->getPlaceHolder()) ?>" value="<?= $Page->CYCLETYPE->EditValue ?>"<?= $Page->CYCLETYPE->editAttributes() ?> aria-describedby="x_CYCLETYPE_help">
<?= $Page->CYCLETYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CYCLETYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
    <div id="r_HRTCYCLE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HRTCYCLE" for="x_HRTCYCLE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HRTCYCLE->caption() ?><?= $Page->HRTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HRTCYCLE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HRTCYCLE">
<input type="<?= $Page->HRTCYCLE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HRTCYCLE" name="x_HRTCYCLE" id="x_HRTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HRTCYCLE->getPlaceHolder()) ?>" value="<?= $Page->HRTCYCLE->EditValue ?>"<?= $Page->HRTCYCLE->editAttributes() ?> aria-describedby="x_HRTCYCLE_help">
<?= $Page->HRTCYCLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HRTCYCLE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
    <div id="r_OralEstrogenDosage" class="form-group row">
        <label id="elh_ivf_stimulation_chart_OralEstrogenDosage" for="x_OralEstrogenDosage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OralEstrogenDosage->caption() ?><?= $Page->OralEstrogenDosage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_OralEstrogenDosage">
<input type="<?= $Page->OralEstrogenDosage->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_OralEstrogenDosage" name="x_OralEstrogenDosage" id="x_OralEstrogenDosage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OralEstrogenDosage->getPlaceHolder()) ?>" value="<?= $Page->OralEstrogenDosage->EditValue ?>"<?= $Page->OralEstrogenDosage->editAttributes() ?> aria-describedby="x_OralEstrogenDosage_help">
<?= $Page->OralEstrogenDosage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OralEstrogenDosage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
    <div id="r_VaginalEstrogen" class="form-group row">
        <label id="elh_ivf_stimulation_chart_VaginalEstrogen" for="x_VaginalEstrogen" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VaginalEstrogen->caption() ?><?= $Page->VaginalEstrogen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_VaginalEstrogen">
<input type="<?= $Page->VaginalEstrogen->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_VaginalEstrogen" name="x_VaginalEstrogen" id="x_VaginalEstrogen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VaginalEstrogen->getPlaceHolder()) ?>" value="<?= $Page->VaginalEstrogen->EditValue ?>"<?= $Page->VaginalEstrogen->editAttributes() ?> aria-describedby="x_VaginalEstrogen_help">
<?= $Page->VaginalEstrogen->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VaginalEstrogen->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
    <div id="r_GCSF" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GCSF" for="x_GCSF" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GCSF->caption() ?><?= $Page->GCSF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GCSF->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GCSF">
<input type="<?= $Page->GCSF->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GCSF" name="x_GCSF" id="x_GCSF" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GCSF->getPlaceHolder()) ?>" value="<?= $Page->GCSF->EditValue ?>"<?= $Page->GCSF->editAttributes() ?> aria-describedby="x_GCSF_help">
<?= $Page->GCSF->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GCSF->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
    <div id="r_ActivatedPRP" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ActivatedPRP" for="x_ActivatedPRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ActivatedPRP->caption() ?><?= $Page->ActivatedPRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ActivatedPRP->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ActivatedPRP">
<input type="<?= $Page->ActivatedPRP->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ActivatedPRP" name="x_ActivatedPRP" id="x_ActivatedPRP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ActivatedPRP->getPlaceHolder()) ?>" value="<?= $Page->ActivatedPRP->EditValue ?>"<?= $Page->ActivatedPRP->editAttributes() ?> aria-describedby="x_ActivatedPRP_help">
<?= $Page->ActivatedPRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ActivatedPRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
    <div id="r_UCLcm" class="form-group row">
        <label id="elh_ivf_stimulation_chart_UCLcm" for="x_UCLcm" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UCLcm->caption() ?><?= $Page->UCLcm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UCLcm->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_UCLcm">
<input type="<?= $Page->UCLcm->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_UCLcm" name="x_UCLcm" id="x_UCLcm" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UCLcm->getPlaceHolder()) ?>" value="<?= $Page->UCLcm->EditValue ?>"<?= $Page->UCLcm->editAttributes() ?> aria-describedby="x_UCLcm_help">
<?= $Page->UCLcm->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UCLcm->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
    <div id="r_DATOFEMBRYOTRANSFER" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" for="x_DATOFEMBRYOTRANSFER" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DATOFEMBRYOTRANSFER->caption() ?><?= $Page->DATOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<input type="<?= $Page->DATOFEMBRYOTRANSFER->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DATOFEMBRYOTRANSFER" name="x_DATOFEMBRYOTRANSFER" id="x_DATOFEMBRYOTRANSFER" placeholder="<?= HtmlEncode($Page->DATOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?= $Page->DATOFEMBRYOTRANSFER->EditValue ?>"<?= $Page->DATOFEMBRYOTRANSFER->editAttributes() ?> aria-describedby="x_DATOFEMBRYOTRANSFER_help">
<?= $Page->DATOFEMBRYOTRANSFER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DATOFEMBRYOTRANSFER->getErrorMessage() ?></div>
<?php if (!$Page->DATOFEMBRYOTRANSFER->ReadOnly && !$Page->DATOFEMBRYOTRANSFER->Disabled && !isset($Page->DATOFEMBRYOTRANSFER->EditAttrs["readonly"]) && !isset($Page->DATOFEMBRYOTRANSFER->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_DATOFEMBRYOTRANSFER", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
    <div id="r_DAYOFEMBRYOTRANSFER" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" for="x_DAYOFEMBRYOTRANSFER" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?><?= $Page->DAYOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<input type="<?= $Page->DAYOFEMBRYOTRANSFER->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x_DAYOFEMBRYOTRANSFER" id="x_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?= $Page->DAYOFEMBRYOTRANSFER->EditValue ?>"<?= $Page->DAYOFEMBRYOTRANSFER->editAttributes() ?> aria-describedby="x_DAYOFEMBRYOTRANSFER_help">
<?= $Page->DAYOFEMBRYOTRANSFER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAYOFEMBRYOTRANSFER->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
    <div id="r_NOOFEMBRYOSTHAWED" class="form-group row">
        <label id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" for="x_NOOFEMBRYOSTHAWED" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?><?= $Page->NOOFEMBRYOSTHAWED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<input type="<?= $Page->NOOFEMBRYOSTHAWED->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x_NOOFEMBRYOSTHAWED" id="x_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?= $Page->NOOFEMBRYOSTHAWED->EditValue ?>"<?= $Page->NOOFEMBRYOSTHAWED->editAttributes() ?> aria-describedby="x_NOOFEMBRYOSTHAWED_help">
<?= $Page->NOOFEMBRYOSTHAWED->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NOOFEMBRYOSTHAWED->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
    <div id="r_NOOFEMBRYOSTRANSFERRED" class="form-group row">
        <label id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" for="x_NOOFEMBRYOSTRANSFERRED" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?><?= $Page->NOOFEMBRYOSTRANSFERRED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<input type="<?= $Page->NOOFEMBRYOSTRANSFERRED->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x_NOOFEMBRYOSTRANSFERRED" id="x_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?= $Page->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?= $Page->NOOFEMBRYOSTRANSFERRED->editAttributes() ?> aria-describedby="x_NOOFEMBRYOSTRANSFERRED_help">
<?= $Page->NOOFEMBRYOSTRANSFERRED->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NOOFEMBRYOSTRANSFERRED->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
    <div id="r_DAYOFEMBRYOS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DAYOFEMBRYOS" for="x_DAYOFEMBRYOS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DAYOFEMBRYOS->caption() ?><?= $Page->DAYOFEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DAYOFEMBRYOS">
<input type="<?= $Page->DAYOFEMBRYOS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DAYOFEMBRYOS" name="x_DAYOFEMBRYOS" id="x_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?= $Page->DAYOFEMBRYOS->EditValue ?>"<?= $Page->DAYOFEMBRYOS->editAttributes() ?> aria-describedby="x_DAYOFEMBRYOS_help">
<?= $Page->DAYOFEMBRYOS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAYOFEMBRYOS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
    <div id="r_CRYOPRESERVEDEMBRYOS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" for="x_CRYOPRESERVEDEMBRYOS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?><?= $Page->CRYOPRESERVEDEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<input type="<?= $Page->CRYOPRESERVEDEMBRYOS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x_CRYOPRESERVEDEMBRYOS" id="x_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?= $Page->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?= $Page->CRYOPRESERVEDEMBRYOS->editAttributes() ?> aria-describedby="x_CRYOPRESERVEDEMBRYOS_help">
<?= $Page->CRYOPRESERVEDEMBRYOS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CRYOPRESERVEDEMBRYOS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ViaAdmin->Visible) { // ViaAdmin ?>
    <div id="r_ViaAdmin" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ViaAdmin" for="x_ViaAdmin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ViaAdmin->caption() ?><?= $Page->ViaAdmin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ViaAdmin->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ViaAdmin">
<input type="<?= $Page->ViaAdmin->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ViaAdmin" name="x_ViaAdmin" id="x_ViaAdmin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ViaAdmin->getPlaceHolder()) ?>" value="<?= $Page->ViaAdmin->EditValue ?>"<?= $Page->ViaAdmin->editAttributes() ?> aria-describedby="x_ViaAdmin_help">
<?= $Page->ViaAdmin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ViaAdmin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
    <div id="r_ViaStartDateTime" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ViaStartDateTime" for="x_ViaStartDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ViaStartDateTime->caption() ?><?= $Page->ViaStartDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ViaStartDateTime->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ViaStartDateTime">
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
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ViaDose->Visible) { // ViaDose ?>
    <div id="r_ViaDose" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ViaDose" for="x_ViaDose" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ViaDose->caption() ?><?= $Page->ViaDose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ViaDose->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ViaDose">
<input type="<?= $Page->ViaDose->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ViaDose" name="x_ViaDose" id="x_ViaDose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ViaDose->getPlaceHolder()) ?>" value="<?= $Page->ViaDose->EditValue ?>"<?= $Page->ViaDose->editAttributes() ?> aria-describedby="x_ViaDose_help">
<?= $Page->ViaDose->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ViaDose->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AllFreeze->Visible) { // AllFreeze ?>
    <div id="r_AllFreeze" class="form-group row">
        <label id="elh_ivf_stimulation_chart_AllFreeze" for="x_AllFreeze" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AllFreeze->caption() ?><?= $Page->AllFreeze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AllFreeze->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_AllFreeze">
<input type="<?= $Page->AllFreeze->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_AllFreeze" name="x_AllFreeze" id="x_AllFreeze" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AllFreeze->getPlaceHolder()) ?>" value="<?= $Page->AllFreeze->EditValue ?>"<?= $Page->AllFreeze->editAttributes() ?> aria-describedby="x_AllFreeze_help">
<?= $Page->AllFreeze->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AllFreeze->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatmentCancel->Visible) { // TreatmentCancel ?>
    <div id="r_TreatmentCancel" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TreatmentCancel" for="x_TreatmentCancel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TreatmentCancel->caption() ?><?= $Page->TreatmentCancel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatmentCancel->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TreatmentCancel">
<input type="<?= $Page->TreatmentCancel->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TreatmentCancel" name="x_TreatmentCancel" id="x_TreatmentCancel" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TreatmentCancel->getPlaceHolder()) ?>" value="<?= $Page->TreatmentCancel->EditValue ?>"<?= $Page->TreatmentCancel->editAttributes() ?> aria-describedby="x_TreatmentCancel_help">
<?= $Page->TreatmentCancel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TreatmentCancel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reason->Visible) { // Reason ?>
    <div id="r_Reason" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Reason" for="x_Reason" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reason->caption() ?><?= $Page->Reason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reason->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Reason">
<textarea data-table="ivf_stimulation_chart" data-field="x_Reason" name="x_Reason" id="x_Reason" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Reason->getPlaceHolder()) ?>"<?= $Page->Reason->editAttributes() ?> aria-describedby="x_Reason_help"><?= $Page->Reason->EditValue ?></textarea>
<?= $Page->Reason->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reason->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
    <div id="r_ProgesteroneAdmin" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ProgesteroneAdmin" for="x_ProgesteroneAdmin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProgesteroneAdmin->caption() ?><?= $Page->ProgesteroneAdmin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgesteroneAdmin->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ProgesteroneAdmin">
<input type="<?= $Page->ProgesteroneAdmin->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneAdmin" name="x_ProgesteroneAdmin" id="x_ProgesteroneAdmin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgesteroneAdmin->getPlaceHolder()) ?>" value="<?= $Page->ProgesteroneAdmin->EditValue ?>"<?= $Page->ProgesteroneAdmin->editAttributes() ?> aria-describedby="x_ProgesteroneAdmin_help">
<?= $Page->ProgesteroneAdmin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgesteroneAdmin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
    <div id="r_ProgesteroneStart" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ProgesteroneStart" for="x_ProgesteroneStart" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProgesteroneStart->caption() ?><?= $Page->ProgesteroneStart->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgesteroneStart->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ProgesteroneStart">
<input type="<?= $Page->ProgesteroneStart->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneStart" name="x_ProgesteroneStart" id="x_ProgesteroneStart" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgesteroneStart->getPlaceHolder()) ?>" value="<?= $Page->ProgesteroneStart->EditValue ?>"<?= $Page->ProgesteroneStart->editAttributes() ?> aria-describedby="x_ProgesteroneStart_help">
<?= $Page->ProgesteroneStart->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgesteroneStart->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
    <div id="r_ProgesteroneDose" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ProgesteroneDose" for="x_ProgesteroneDose" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProgesteroneDose->caption() ?><?= $Page->ProgesteroneDose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgesteroneDose->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ProgesteroneDose">
<input type="<?= $Page->ProgesteroneDose->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneDose" name="x_ProgesteroneDose" id="x_ProgesteroneDose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgesteroneDose->getPlaceHolder()) ?>" value="<?= $Page->ProgesteroneDose->EditValue ?>"<?= $Page->ProgesteroneDose->editAttributes() ?> aria-describedby="x_ProgesteroneDose_help">
<?= $Page->ProgesteroneDose->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgesteroneDose->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate14->Visible) { // StChDate14 ?>
    <div id="r_StChDate14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate14" for="x_StChDate14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate14->caption() ?><?= $Page->StChDate14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate14">
<input type="<?= $Page->StChDate14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate14" name="x_StChDate14" id="x_StChDate14" placeholder="<?= HtmlEncode($Page->StChDate14->getPlaceHolder()) ?>" value="<?= $Page->StChDate14->EditValue ?>"<?= $Page->StChDate14->editAttributes() ?> aria-describedby="x_StChDate14_help">
<?= $Page->StChDate14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate14->getErrorMessage() ?></div>
<?php if (!$Page->StChDate14->ReadOnly && !$Page->StChDate14->Disabled && !isset($Page->StChDate14->EditAttrs["readonly"]) && !isset($Page->StChDate14->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate14", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate15->Visible) { // StChDate15 ?>
    <div id="r_StChDate15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate15" for="x_StChDate15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate15->caption() ?><?= $Page->StChDate15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate15">
<input type="<?= $Page->StChDate15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate15" name="x_StChDate15" id="x_StChDate15" placeholder="<?= HtmlEncode($Page->StChDate15->getPlaceHolder()) ?>" value="<?= $Page->StChDate15->EditValue ?>"<?= $Page->StChDate15->editAttributes() ?> aria-describedby="x_StChDate15_help">
<?= $Page->StChDate15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate15->getErrorMessage() ?></div>
<?php if (!$Page->StChDate15->ReadOnly && !$Page->StChDate15->Disabled && !isset($Page->StChDate15->EditAttrs["readonly"]) && !isset($Page->StChDate15->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate15", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate16->Visible) { // StChDate16 ?>
    <div id="r_StChDate16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate16" for="x_StChDate16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate16->caption() ?><?= $Page->StChDate16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate16">
<input type="<?= $Page->StChDate16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate16" name="x_StChDate16" id="x_StChDate16" placeholder="<?= HtmlEncode($Page->StChDate16->getPlaceHolder()) ?>" value="<?= $Page->StChDate16->EditValue ?>"<?= $Page->StChDate16->editAttributes() ?> aria-describedby="x_StChDate16_help">
<?= $Page->StChDate16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate16->getErrorMessage() ?></div>
<?php if (!$Page->StChDate16->ReadOnly && !$Page->StChDate16->Disabled && !isset($Page->StChDate16->EditAttrs["readonly"]) && !isset($Page->StChDate16->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate16", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate17->Visible) { // StChDate17 ?>
    <div id="r_StChDate17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate17" for="x_StChDate17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate17->caption() ?><?= $Page->StChDate17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate17">
<input type="<?= $Page->StChDate17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate17" name="x_StChDate17" id="x_StChDate17" placeholder="<?= HtmlEncode($Page->StChDate17->getPlaceHolder()) ?>" value="<?= $Page->StChDate17->EditValue ?>"<?= $Page->StChDate17->editAttributes() ?> aria-describedby="x_StChDate17_help">
<?= $Page->StChDate17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate17->getErrorMessage() ?></div>
<?php if (!$Page->StChDate17->ReadOnly && !$Page->StChDate17->Disabled && !isset($Page->StChDate17->EditAttrs["readonly"]) && !isset($Page->StChDate17->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate17", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate18->Visible) { // StChDate18 ?>
    <div id="r_StChDate18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate18" for="x_StChDate18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate18->caption() ?><?= $Page->StChDate18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate18">
<input type="<?= $Page->StChDate18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate18" name="x_StChDate18" id="x_StChDate18" placeholder="<?= HtmlEncode($Page->StChDate18->getPlaceHolder()) ?>" value="<?= $Page->StChDate18->EditValue ?>"<?= $Page->StChDate18->editAttributes() ?> aria-describedby="x_StChDate18_help">
<?= $Page->StChDate18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate18->getErrorMessage() ?></div>
<?php if (!$Page->StChDate18->ReadOnly && !$Page->StChDate18->Disabled && !isset($Page->StChDate18->EditAttrs["readonly"]) && !isset($Page->StChDate18->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate18", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate19->Visible) { // StChDate19 ?>
    <div id="r_StChDate19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate19" for="x_StChDate19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate19->caption() ?><?= $Page->StChDate19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate19">
<input type="<?= $Page->StChDate19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate19" name="x_StChDate19" id="x_StChDate19" placeholder="<?= HtmlEncode($Page->StChDate19->getPlaceHolder()) ?>" value="<?= $Page->StChDate19->EditValue ?>"<?= $Page->StChDate19->editAttributes() ?> aria-describedby="x_StChDate19_help">
<?= $Page->StChDate19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate19->getErrorMessage() ?></div>
<?php if (!$Page->StChDate19->ReadOnly && !$Page->StChDate19->Disabled && !isset($Page->StChDate19->EditAttrs["readonly"]) && !isset($Page->StChDate19->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate19", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate20->Visible) { // StChDate20 ?>
    <div id="r_StChDate20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate20" for="x_StChDate20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate20->caption() ?><?= $Page->StChDate20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate20">
<input type="<?= $Page->StChDate20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate20" name="x_StChDate20" id="x_StChDate20" placeholder="<?= HtmlEncode($Page->StChDate20->getPlaceHolder()) ?>" value="<?= $Page->StChDate20->EditValue ?>"<?= $Page->StChDate20->editAttributes() ?> aria-describedby="x_StChDate20_help">
<?= $Page->StChDate20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate20->getErrorMessage() ?></div>
<?php if (!$Page->StChDate20->ReadOnly && !$Page->StChDate20->Disabled && !isset($Page->StChDate20->EditAttrs["readonly"]) && !isset($Page->StChDate20->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate20", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate21->Visible) { // StChDate21 ?>
    <div id="r_StChDate21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate21" for="x_StChDate21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate21->caption() ?><?= $Page->StChDate21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate21">
<input type="<?= $Page->StChDate21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate21" name="x_StChDate21" id="x_StChDate21" placeholder="<?= HtmlEncode($Page->StChDate21->getPlaceHolder()) ?>" value="<?= $Page->StChDate21->EditValue ?>"<?= $Page->StChDate21->editAttributes() ?> aria-describedby="x_StChDate21_help">
<?= $Page->StChDate21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate21->getErrorMessage() ?></div>
<?php if (!$Page->StChDate21->ReadOnly && !$Page->StChDate21->Disabled && !isset($Page->StChDate21->EditAttrs["readonly"]) && !isset($Page->StChDate21->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate21", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate22->Visible) { // StChDate22 ?>
    <div id="r_StChDate22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate22" for="x_StChDate22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate22->caption() ?><?= $Page->StChDate22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate22">
<input type="<?= $Page->StChDate22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate22" name="x_StChDate22" id="x_StChDate22" placeholder="<?= HtmlEncode($Page->StChDate22->getPlaceHolder()) ?>" value="<?= $Page->StChDate22->EditValue ?>"<?= $Page->StChDate22->editAttributes() ?> aria-describedby="x_StChDate22_help">
<?= $Page->StChDate22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate22->getErrorMessage() ?></div>
<?php if (!$Page->StChDate22->ReadOnly && !$Page->StChDate22->Disabled && !isset($Page->StChDate22->EditAttrs["readonly"]) && !isset($Page->StChDate22->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate22", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate23->Visible) { // StChDate23 ?>
    <div id="r_StChDate23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate23" for="x_StChDate23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate23->caption() ?><?= $Page->StChDate23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate23">
<input type="<?= $Page->StChDate23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate23" name="x_StChDate23" id="x_StChDate23" placeholder="<?= HtmlEncode($Page->StChDate23->getPlaceHolder()) ?>" value="<?= $Page->StChDate23->EditValue ?>"<?= $Page->StChDate23->editAttributes() ?> aria-describedby="x_StChDate23_help">
<?= $Page->StChDate23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate23->getErrorMessage() ?></div>
<?php if (!$Page->StChDate23->ReadOnly && !$Page->StChDate23->Disabled && !isset($Page->StChDate23->EditAttrs["readonly"]) && !isset($Page->StChDate23->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate23", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate24->Visible) { // StChDate24 ?>
    <div id="r_StChDate24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate24" for="x_StChDate24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate24->caption() ?><?= $Page->StChDate24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate24">
<input type="<?= $Page->StChDate24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate24" name="x_StChDate24" id="x_StChDate24" placeholder="<?= HtmlEncode($Page->StChDate24->getPlaceHolder()) ?>" value="<?= $Page->StChDate24->EditValue ?>"<?= $Page->StChDate24->editAttributes() ?> aria-describedby="x_StChDate24_help">
<?= $Page->StChDate24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate24->getErrorMessage() ?></div>
<?php if (!$Page->StChDate24->ReadOnly && !$Page->StChDate24->Disabled && !isset($Page->StChDate24->EditAttrs["readonly"]) && !isset($Page->StChDate24->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate24", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StChDate25->Visible) { // StChDate25 ?>
    <div id="r_StChDate25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StChDate25" for="x_StChDate25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StChDate25->caption() ?><?= $Page->StChDate25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StChDate25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate25">
<input type="<?= $Page->StChDate25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StChDate25" name="x_StChDate25" id="x_StChDate25" placeholder="<?= HtmlEncode($Page->StChDate25->getPlaceHolder()) ?>" value="<?= $Page->StChDate25->EditValue ?>"<?= $Page->StChDate25->editAttributes() ?> aria-describedby="x_StChDate25_help">
<?= $Page->StChDate25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StChDate25->getErrorMessage() ?></div>
<?php if (!$Page->StChDate25->ReadOnly && !$Page->StChDate25->Disabled && !isset($Page->StChDate25->EditAttrs["readonly"]) && !isset($Page->StChDate25->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate25", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay14->Visible) { // CycleDay14 ?>
    <div id="r_CycleDay14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay14" for="x_CycleDay14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay14->caption() ?><?= $Page->CycleDay14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay14">
<input type="<?= $Page->CycleDay14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay14" name="x_CycleDay14" id="x_CycleDay14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay14->getPlaceHolder()) ?>" value="<?= $Page->CycleDay14->EditValue ?>"<?= $Page->CycleDay14->editAttributes() ?> aria-describedby="x_CycleDay14_help">
<?= $Page->CycleDay14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay15->Visible) { // CycleDay15 ?>
    <div id="r_CycleDay15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay15" for="x_CycleDay15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay15->caption() ?><?= $Page->CycleDay15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay15">
<input type="<?= $Page->CycleDay15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay15" name="x_CycleDay15" id="x_CycleDay15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay15->getPlaceHolder()) ?>" value="<?= $Page->CycleDay15->EditValue ?>"<?= $Page->CycleDay15->editAttributes() ?> aria-describedby="x_CycleDay15_help">
<?= $Page->CycleDay15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay16->Visible) { // CycleDay16 ?>
    <div id="r_CycleDay16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay16" for="x_CycleDay16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay16->caption() ?><?= $Page->CycleDay16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay16">
<input type="<?= $Page->CycleDay16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay16" name="x_CycleDay16" id="x_CycleDay16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay16->getPlaceHolder()) ?>" value="<?= $Page->CycleDay16->EditValue ?>"<?= $Page->CycleDay16->editAttributes() ?> aria-describedby="x_CycleDay16_help">
<?= $Page->CycleDay16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay17->Visible) { // CycleDay17 ?>
    <div id="r_CycleDay17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay17" for="x_CycleDay17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay17->caption() ?><?= $Page->CycleDay17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay17">
<input type="<?= $Page->CycleDay17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay17" name="x_CycleDay17" id="x_CycleDay17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay17->getPlaceHolder()) ?>" value="<?= $Page->CycleDay17->EditValue ?>"<?= $Page->CycleDay17->editAttributes() ?> aria-describedby="x_CycleDay17_help">
<?= $Page->CycleDay17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay18->Visible) { // CycleDay18 ?>
    <div id="r_CycleDay18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay18" for="x_CycleDay18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay18->caption() ?><?= $Page->CycleDay18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay18">
<input type="<?= $Page->CycleDay18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay18" name="x_CycleDay18" id="x_CycleDay18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay18->getPlaceHolder()) ?>" value="<?= $Page->CycleDay18->EditValue ?>"<?= $Page->CycleDay18->editAttributes() ?> aria-describedby="x_CycleDay18_help">
<?= $Page->CycleDay18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay19->Visible) { // CycleDay19 ?>
    <div id="r_CycleDay19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay19" for="x_CycleDay19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay19->caption() ?><?= $Page->CycleDay19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay19">
<input type="<?= $Page->CycleDay19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay19" name="x_CycleDay19" id="x_CycleDay19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay19->getPlaceHolder()) ?>" value="<?= $Page->CycleDay19->EditValue ?>"<?= $Page->CycleDay19->editAttributes() ?> aria-describedby="x_CycleDay19_help">
<?= $Page->CycleDay19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay20->Visible) { // CycleDay20 ?>
    <div id="r_CycleDay20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay20" for="x_CycleDay20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay20->caption() ?><?= $Page->CycleDay20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay20">
<input type="<?= $Page->CycleDay20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay20" name="x_CycleDay20" id="x_CycleDay20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay20->getPlaceHolder()) ?>" value="<?= $Page->CycleDay20->EditValue ?>"<?= $Page->CycleDay20->editAttributes() ?> aria-describedby="x_CycleDay20_help">
<?= $Page->CycleDay20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay21->Visible) { // CycleDay21 ?>
    <div id="r_CycleDay21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay21" for="x_CycleDay21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay21->caption() ?><?= $Page->CycleDay21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay21">
<input type="<?= $Page->CycleDay21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay21" name="x_CycleDay21" id="x_CycleDay21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay21->getPlaceHolder()) ?>" value="<?= $Page->CycleDay21->EditValue ?>"<?= $Page->CycleDay21->editAttributes() ?> aria-describedby="x_CycleDay21_help">
<?= $Page->CycleDay21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay22->Visible) { // CycleDay22 ?>
    <div id="r_CycleDay22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay22" for="x_CycleDay22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay22->caption() ?><?= $Page->CycleDay22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay22">
<input type="<?= $Page->CycleDay22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay22" name="x_CycleDay22" id="x_CycleDay22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay22->getPlaceHolder()) ?>" value="<?= $Page->CycleDay22->EditValue ?>"<?= $Page->CycleDay22->editAttributes() ?> aria-describedby="x_CycleDay22_help">
<?= $Page->CycleDay22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay23->Visible) { // CycleDay23 ?>
    <div id="r_CycleDay23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay23" for="x_CycleDay23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay23->caption() ?><?= $Page->CycleDay23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay23">
<input type="<?= $Page->CycleDay23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay23" name="x_CycleDay23" id="x_CycleDay23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay23->getPlaceHolder()) ?>" value="<?= $Page->CycleDay23->EditValue ?>"<?= $Page->CycleDay23->editAttributes() ?> aria-describedby="x_CycleDay23_help">
<?= $Page->CycleDay23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay24->Visible) { // CycleDay24 ?>
    <div id="r_CycleDay24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay24" for="x_CycleDay24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay24->caption() ?><?= $Page->CycleDay24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay24">
<input type="<?= $Page->CycleDay24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay24" name="x_CycleDay24" id="x_CycleDay24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay24->getPlaceHolder()) ?>" value="<?= $Page->CycleDay24->EditValue ?>"<?= $Page->CycleDay24->editAttributes() ?> aria-describedby="x_CycleDay24_help">
<?= $Page->CycleDay24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CycleDay25->Visible) { // CycleDay25 ?>
    <div id="r_CycleDay25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_CycleDay25" for="x_CycleDay25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CycleDay25->caption() ?><?= $Page->CycleDay25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CycleDay25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay25">
<input type="<?= $Page->CycleDay25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_CycleDay25" name="x_CycleDay25" id="x_CycleDay25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CycleDay25->getPlaceHolder()) ?>" value="<?= $Page->CycleDay25->EditValue ?>"<?= $Page->CycleDay25->editAttributes() ?> aria-describedby="x_CycleDay25_help">
<?= $Page->CycleDay25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CycleDay25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay14->Visible) { // StimulationDay14 ?>
    <div id="r_StimulationDay14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay14" for="x_StimulationDay14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay14->caption() ?><?= $Page->StimulationDay14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay14">
<input type="<?= $Page->StimulationDay14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay14" name="x_StimulationDay14" id="x_StimulationDay14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay14->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay14->EditValue ?>"<?= $Page->StimulationDay14->editAttributes() ?> aria-describedby="x_StimulationDay14_help">
<?= $Page->StimulationDay14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay15->Visible) { // StimulationDay15 ?>
    <div id="r_StimulationDay15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay15" for="x_StimulationDay15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay15->caption() ?><?= $Page->StimulationDay15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay15">
<input type="<?= $Page->StimulationDay15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay15" name="x_StimulationDay15" id="x_StimulationDay15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay15->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay15->EditValue ?>"<?= $Page->StimulationDay15->editAttributes() ?> aria-describedby="x_StimulationDay15_help">
<?= $Page->StimulationDay15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay16->Visible) { // StimulationDay16 ?>
    <div id="r_StimulationDay16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay16" for="x_StimulationDay16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay16->caption() ?><?= $Page->StimulationDay16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay16">
<input type="<?= $Page->StimulationDay16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay16" name="x_StimulationDay16" id="x_StimulationDay16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay16->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay16->EditValue ?>"<?= $Page->StimulationDay16->editAttributes() ?> aria-describedby="x_StimulationDay16_help">
<?= $Page->StimulationDay16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay17->Visible) { // StimulationDay17 ?>
    <div id="r_StimulationDay17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay17" for="x_StimulationDay17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay17->caption() ?><?= $Page->StimulationDay17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay17">
<input type="<?= $Page->StimulationDay17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay17" name="x_StimulationDay17" id="x_StimulationDay17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay17->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay17->EditValue ?>"<?= $Page->StimulationDay17->editAttributes() ?> aria-describedby="x_StimulationDay17_help">
<?= $Page->StimulationDay17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay18->Visible) { // StimulationDay18 ?>
    <div id="r_StimulationDay18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay18" for="x_StimulationDay18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay18->caption() ?><?= $Page->StimulationDay18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay18">
<input type="<?= $Page->StimulationDay18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay18" name="x_StimulationDay18" id="x_StimulationDay18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay18->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay18->EditValue ?>"<?= $Page->StimulationDay18->editAttributes() ?> aria-describedby="x_StimulationDay18_help">
<?= $Page->StimulationDay18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay19->Visible) { // StimulationDay19 ?>
    <div id="r_StimulationDay19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay19" for="x_StimulationDay19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay19->caption() ?><?= $Page->StimulationDay19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay19">
<input type="<?= $Page->StimulationDay19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay19" name="x_StimulationDay19" id="x_StimulationDay19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay19->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay19->EditValue ?>"<?= $Page->StimulationDay19->editAttributes() ?> aria-describedby="x_StimulationDay19_help">
<?= $Page->StimulationDay19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay20->Visible) { // StimulationDay20 ?>
    <div id="r_StimulationDay20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay20" for="x_StimulationDay20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay20->caption() ?><?= $Page->StimulationDay20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay20">
<input type="<?= $Page->StimulationDay20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay20" name="x_StimulationDay20" id="x_StimulationDay20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay20->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay20->EditValue ?>"<?= $Page->StimulationDay20->editAttributes() ?> aria-describedby="x_StimulationDay20_help">
<?= $Page->StimulationDay20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay21->Visible) { // StimulationDay21 ?>
    <div id="r_StimulationDay21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay21" for="x_StimulationDay21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay21->caption() ?><?= $Page->StimulationDay21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay21">
<input type="<?= $Page->StimulationDay21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay21" name="x_StimulationDay21" id="x_StimulationDay21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay21->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay21->EditValue ?>"<?= $Page->StimulationDay21->editAttributes() ?> aria-describedby="x_StimulationDay21_help">
<?= $Page->StimulationDay21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay22->Visible) { // StimulationDay22 ?>
    <div id="r_StimulationDay22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay22" for="x_StimulationDay22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay22->caption() ?><?= $Page->StimulationDay22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay22">
<input type="<?= $Page->StimulationDay22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay22" name="x_StimulationDay22" id="x_StimulationDay22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay22->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay22->EditValue ?>"<?= $Page->StimulationDay22->editAttributes() ?> aria-describedby="x_StimulationDay22_help">
<?= $Page->StimulationDay22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay23->Visible) { // StimulationDay23 ?>
    <div id="r_StimulationDay23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay23" for="x_StimulationDay23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay23->caption() ?><?= $Page->StimulationDay23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay23">
<input type="<?= $Page->StimulationDay23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay23" name="x_StimulationDay23" id="x_StimulationDay23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay23->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay23->EditValue ?>"<?= $Page->StimulationDay23->editAttributes() ?> aria-describedby="x_StimulationDay23_help">
<?= $Page->StimulationDay23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay24->Visible) { // StimulationDay24 ?>
    <div id="r_StimulationDay24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay24" for="x_StimulationDay24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay24->caption() ?><?= $Page->StimulationDay24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay24">
<input type="<?= $Page->StimulationDay24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay24" name="x_StimulationDay24" id="x_StimulationDay24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay24->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay24->EditValue ?>"<?= $Page->StimulationDay24->editAttributes() ?> aria-describedby="x_StimulationDay24_help">
<?= $Page->StimulationDay24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StimulationDay25->Visible) { // StimulationDay25 ?>
    <div id="r_StimulationDay25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_StimulationDay25" for="x_StimulationDay25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StimulationDay25->caption() ?><?= $Page->StimulationDay25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StimulationDay25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay25">
<input type="<?= $Page->StimulationDay25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_StimulationDay25" name="x_StimulationDay25" id="x_StimulationDay25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StimulationDay25->getPlaceHolder()) ?>" value="<?= $Page->StimulationDay25->EditValue ?>"<?= $Page->StimulationDay25->editAttributes() ?> aria-describedby="x_StimulationDay25_help">
<?= $Page->StimulationDay25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StimulationDay25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet14->Visible) { // Tablet14 ?>
    <div id="r_Tablet14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet14" for="x_Tablet14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet14->caption() ?><?= $Page->Tablet14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet14">
<input type="<?= $Page->Tablet14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet14" name="x_Tablet14" id="x_Tablet14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet14->getPlaceHolder()) ?>" value="<?= $Page->Tablet14->EditValue ?>"<?= $Page->Tablet14->editAttributes() ?> aria-describedby="x_Tablet14_help">
<?= $Page->Tablet14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet15->Visible) { // Tablet15 ?>
    <div id="r_Tablet15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet15" for="x_Tablet15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet15->caption() ?><?= $Page->Tablet15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet15">
<input type="<?= $Page->Tablet15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet15" name="x_Tablet15" id="x_Tablet15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet15->getPlaceHolder()) ?>" value="<?= $Page->Tablet15->EditValue ?>"<?= $Page->Tablet15->editAttributes() ?> aria-describedby="x_Tablet15_help">
<?= $Page->Tablet15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet16->Visible) { // Tablet16 ?>
    <div id="r_Tablet16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet16" for="x_Tablet16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet16->caption() ?><?= $Page->Tablet16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet16">
<input type="<?= $Page->Tablet16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet16" name="x_Tablet16" id="x_Tablet16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet16->getPlaceHolder()) ?>" value="<?= $Page->Tablet16->EditValue ?>"<?= $Page->Tablet16->editAttributes() ?> aria-describedby="x_Tablet16_help">
<?= $Page->Tablet16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet17->Visible) { // Tablet17 ?>
    <div id="r_Tablet17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet17" for="x_Tablet17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet17->caption() ?><?= $Page->Tablet17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet17">
<input type="<?= $Page->Tablet17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet17" name="x_Tablet17" id="x_Tablet17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet17->getPlaceHolder()) ?>" value="<?= $Page->Tablet17->EditValue ?>"<?= $Page->Tablet17->editAttributes() ?> aria-describedby="x_Tablet17_help">
<?= $Page->Tablet17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet18->Visible) { // Tablet18 ?>
    <div id="r_Tablet18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet18" for="x_Tablet18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet18->caption() ?><?= $Page->Tablet18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet18">
<input type="<?= $Page->Tablet18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet18" name="x_Tablet18" id="x_Tablet18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet18->getPlaceHolder()) ?>" value="<?= $Page->Tablet18->EditValue ?>"<?= $Page->Tablet18->editAttributes() ?> aria-describedby="x_Tablet18_help">
<?= $Page->Tablet18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet19->Visible) { // Tablet19 ?>
    <div id="r_Tablet19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet19" for="x_Tablet19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet19->caption() ?><?= $Page->Tablet19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet19">
<input type="<?= $Page->Tablet19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet19" name="x_Tablet19" id="x_Tablet19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet19->getPlaceHolder()) ?>" value="<?= $Page->Tablet19->EditValue ?>"<?= $Page->Tablet19->editAttributes() ?> aria-describedby="x_Tablet19_help">
<?= $Page->Tablet19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet20->Visible) { // Tablet20 ?>
    <div id="r_Tablet20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet20" for="x_Tablet20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet20->caption() ?><?= $Page->Tablet20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet20">
<input type="<?= $Page->Tablet20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet20" name="x_Tablet20" id="x_Tablet20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet20->getPlaceHolder()) ?>" value="<?= $Page->Tablet20->EditValue ?>"<?= $Page->Tablet20->editAttributes() ?> aria-describedby="x_Tablet20_help">
<?= $Page->Tablet20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet21->Visible) { // Tablet21 ?>
    <div id="r_Tablet21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet21" for="x_Tablet21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet21->caption() ?><?= $Page->Tablet21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet21">
<input type="<?= $Page->Tablet21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet21" name="x_Tablet21" id="x_Tablet21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet21->getPlaceHolder()) ?>" value="<?= $Page->Tablet21->EditValue ?>"<?= $Page->Tablet21->editAttributes() ?> aria-describedby="x_Tablet21_help">
<?= $Page->Tablet21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet22->Visible) { // Tablet22 ?>
    <div id="r_Tablet22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet22" for="x_Tablet22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet22->caption() ?><?= $Page->Tablet22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet22">
<input type="<?= $Page->Tablet22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet22" name="x_Tablet22" id="x_Tablet22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet22->getPlaceHolder()) ?>" value="<?= $Page->Tablet22->EditValue ?>"<?= $Page->Tablet22->editAttributes() ?> aria-describedby="x_Tablet22_help">
<?= $Page->Tablet22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet23->Visible) { // Tablet23 ?>
    <div id="r_Tablet23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet23" for="x_Tablet23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet23->caption() ?><?= $Page->Tablet23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet23">
<input type="<?= $Page->Tablet23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet23" name="x_Tablet23" id="x_Tablet23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet23->getPlaceHolder()) ?>" value="<?= $Page->Tablet23->EditValue ?>"<?= $Page->Tablet23->editAttributes() ?> aria-describedby="x_Tablet23_help">
<?= $Page->Tablet23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet24->Visible) { // Tablet24 ?>
    <div id="r_Tablet24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet24" for="x_Tablet24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet24->caption() ?><?= $Page->Tablet24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet24">
<input type="<?= $Page->Tablet24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet24" name="x_Tablet24" id="x_Tablet24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet24->getPlaceHolder()) ?>" value="<?= $Page->Tablet24->EditValue ?>"<?= $Page->Tablet24->editAttributes() ?> aria-describedby="x_Tablet24_help">
<?= $Page->Tablet24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tablet25->Visible) { // Tablet25 ?>
    <div id="r_Tablet25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Tablet25" for="x_Tablet25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tablet25->caption() ?><?= $Page->Tablet25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tablet25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet25">
<input type="<?= $Page->Tablet25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Tablet25" name="x_Tablet25" id="x_Tablet25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tablet25->getPlaceHolder()) ?>" value="<?= $Page->Tablet25->EditValue ?>"<?= $Page->Tablet25->editAttributes() ?> aria-describedby="x_Tablet25_help">
<?= $Page->Tablet25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tablet25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH14->Visible) { // RFSH14 ?>
    <div id="r_RFSH14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH14" for="x_RFSH14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH14->caption() ?><?= $Page->RFSH14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH14">
<input type="<?= $Page->RFSH14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH14" name="x_RFSH14" id="x_RFSH14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH14->getPlaceHolder()) ?>" value="<?= $Page->RFSH14->EditValue ?>"<?= $Page->RFSH14->editAttributes() ?> aria-describedby="x_RFSH14_help">
<?= $Page->RFSH14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH15->Visible) { // RFSH15 ?>
    <div id="r_RFSH15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH15" for="x_RFSH15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH15->caption() ?><?= $Page->RFSH15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH15">
<input type="<?= $Page->RFSH15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH15" name="x_RFSH15" id="x_RFSH15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH15->getPlaceHolder()) ?>" value="<?= $Page->RFSH15->EditValue ?>"<?= $Page->RFSH15->editAttributes() ?> aria-describedby="x_RFSH15_help">
<?= $Page->RFSH15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH16->Visible) { // RFSH16 ?>
    <div id="r_RFSH16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH16" for="x_RFSH16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH16->caption() ?><?= $Page->RFSH16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH16">
<input type="<?= $Page->RFSH16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH16" name="x_RFSH16" id="x_RFSH16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH16->getPlaceHolder()) ?>" value="<?= $Page->RFSH16->EditValue ?>"<?= $Page->RFSH16->editAttributes() ?> aria-describedby="x_RFSH16_help">
<?= $Page->RFSH16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH17->Visible) { // RFSH17 ?>
    <div id="r_RFSH17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH17" for="x_RFSH17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH17->caption() ?><?= $Page->RFSH17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH17">
<input type="<?= $Page->RFSH17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH17" name="x_RFSH17" id="x_RFSH17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH17->getPlaceHolder()) ?>" value="<?= $Page->RFSH17->EditValue ?>"<?= $Page->RFSH17->editAttributes() ?> aria-describedby="x_RFSH17_help">
<?= $Page->RFSH17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH18->Visible) { // RFSH18 ?>
    <div id="r_RFSH18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH18" for="x_RFSH18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH18->caption() ?><?= $Page->RFSH18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH18">
<input type="<?= $Page->RFSH18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH18" name="x_RFSH18" id="x_RFSH18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH18->getPlaceHolder()) ?>" value="<?= $Page->RFSH18->EditValue ?>"<?= $Page->RFSH18->editAttributes() ?> aria-describedby="x_RFSH18_help">
<?= $Page->RFSH18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH19->Visible) { // RFSH19 ?>
    <div id="r_RFSH19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH19" for="x_RFSH19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH19->caption() ?><?= $Page->RFSH19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH19">
<input type="<?= $Page->RFSH19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH19" name="x_RFSH19" id="x_RFSH19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH19->getPlaceHolder()) ?>" value="<?= $Page->RFSH19->EditValue ?>"<?= $Page->RFSH19->editAttributes() ?> aria-describedby="x_RFSH19_help">
<?= $Page->RFSH19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH20->Visible) { // RFSH20 ?>
    <div id="r_RFSH20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH20" for="x_RFSH20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH20->caption() ?><?= $Page->RFSH20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH20">
<input type="<?= $Page->RFSH20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH20" name="x_RFSH20" id="x_RFSH20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH20->getPlaceHolder()) ?>" value="<?= $Page->RFSH20->EditValue ?>"<?= $Page->RFSH20->editAttributes() ?> aria-describedby="x_RFSH20_help">
<?= $Page->RFSH20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH21->Visible) { // RFSH21 ?>
    <div id="r_RFSH21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH21" for="x_RFSH21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH21->caption() ?><?= $Page->RFSH21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH21">
<input type="<?= $Page->RFSH21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH21" name="x_RFSH21" id="x_RFSH21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH21->getPlaceHolder()) ?>" value="<?= $Page->RFSH21->EditValue ?>"<?= $Page->RFSH21->editAttributes() ?> aria-describedby="x_RFSH21_help">
<?= $Page->RFSH21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH22->Visible) { // RFSH22 ?>
    <div id="r_RFSH22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH22" for="x_RFSH22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH22->caption() ?><?= $Page->RFSH22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH22">
<input type="<?= $Page->RFSH22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH22" name="x_RFSH22" id="x_RFSH22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH22->getPlaceHolder()) ?>" value="<?= $Page->RFSH22->EditValue ?>"<?= $Page->RFSH22->editAttributes() ?> aria-describedby="x_RFSH22_help">
<?= $Page->RFSH22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH23->Visible) { // RFSH23 ?>
    <div id="r_RFSH23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH23" for="x_RFSH23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH23->caption() ?><?= $Page->RFSH23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH23">
<input type="<?= $Page->RFSH23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH23" name="x_RFSH23" id="x_RFSH23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH23->getPlaceHolder()) ?>" value="<?= $Page->RFSH23->EditValue ?>"<?= $Page->RFSH23->editAttributes() ?> aria-describedby="x_RFSH23_help">
<?= $Page->RFSH23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH24->Visible) { // RFSH24 ?>
    <div id="r_RFSH24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH24" for="x_RFSH24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH24->caption() ?><?= $Page->RFSH24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH24">
<input type="<?= $Page->RFSH24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH24" name="x_RFSH24" id="x_RFSH24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH24->getPlaceHolder()) ?>" value="<?= $Page->RFSH24->EditValue ?>"<?= $Page->RFSH24->editAttributes() ?> aria-describedby="x_RFSH24_help">
<?= $Page->RFSH24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RFSH25->Visible) { // RFSH25 ?>
    <div id="r_RFSH25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_RFSH25" for="x_RFSH25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RFSH25->caption() ?><?= $Page->RFSH25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RFSH25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH25">
<input type="<?= $Page->RFSH25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_RFSH25" name="x_RFSH25" id="x_RFSH25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RFSH25->getPlaceHolder()) ?>" value="<?= $Page->RFSH25->EditValue ?>"<?= $Page->RFSH25->editAttributes() ?> aria-describedby="x_RFSH25_help">
<?= $Page->RFSH25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RFSH25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG14->Visible) { // HMG14 ?>
    <div id="r_HMG14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG14" for="x_HMG14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG14->caption() ?><?= $Page->HMG14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG14">
<input type="<?= $Page->HMG14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG14" name="x_HMG14" id="x_HMG14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG14->getPlaceHolder()) ?>" value="<?= $Page->HMG14->EditValue ?>"<?= $Page->HMG14->editAttributes() ?> aria-describedby="x_HMG14_help">
<?= $Page->HMG14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG15->Visible) { // HMG15 ?>
    <div id="r_HMG15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG15" for="x_HMG15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG15->caption() ?><?= $Page->HMG15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG15">
<input type="<?= $Page->HMG15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG15" name="x_HMG15" id="x_HMG15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG15->getPlaceHolder()) ?>" value="<?= $Page->HMG15->EditValue ?>"<?= $Page->HMG15->editAttributes() ?> aria-describedby="x_HMG15_help">
<?= $Page->HMG15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG16->Visible) { // HMG16 ?>
    <div id="r_HMG16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG16" for="x_HMG16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG16->caption() ?><?= $Page->HMG16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG16">
<input type="<?= $Page->HMG16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG16" name="x_HMG16" id="x_HMG16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG16->getPlaceHolder()) ?>" value="<?= $Page->HMG16->EditValue ?>"<?= $Page->HMG16->editAttributes() ?> aria-describedby="x_HMG16_help">
<?= $Page->HMG16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG17->Visible) { // HMG17 ?>
    <div id="r_HMG17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG17" for="x_HMG17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG17->caption() ?><?= $Page->HMG17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG17">
<input type="<?= $Page->HMG17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG17" name="x_HMG17" id="x_HMG17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG17->getPlaceHolder()) ?>" value="<?= $Page->HMG17->EditValue ?>"<?= $Page->HMG17->editAttributes() ?> aria-describedby="x_HMG17_help">
<?= $Page->HMG17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG18->Visible) { // HMG18 ?>
    <div id="r_HMG18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG18" for="x_HMG18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG18->caption() ?><?= $Page->HMG18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG18">
<input type="<?= $Page->HMG18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG18" name="x_HMG18" id="x_HMG18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG18->getPlaceHolder()) ?>" value="<?= $Page->HMG18->EditValue ?>"<?= $Page->HMG18->editAttributes() ?> aria-describedby="x_HMG18_help">
<?= $Page->HMG18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG19->Visible) { // HMG19 ?>
    <div id="r_HMG19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG19" for="x_HMG19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG19->caption() ?><?= $Page->HMG19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG19">
<input type="<?= $Page->HMG19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG19" name="x_HMG19" id="x_HMG19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG19->getPlaceHolder()) ?>" value="<?= $Page->HMG19->EditValue ?>"<?= $Page->HMG19->editAttributes() ?> aria-describedby="x_HMG19_help">
<?= $Page->HMG19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG20->Visible) { // HMG20 ?>
    <div id="r_HMG20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG20" for="x_HMG20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG20->caption() ?><?= $Page->HMG20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG20">
<input type="<?= $Page->HMG20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG20" name="x_HMG20" id="x_HMG20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG20->getPlaceHolder()) ?>" value="<?= $Page->HMG20->EditValue ?>"<?= $Page->HMG20->editAttributes() ?> aria-describedby="x_HMG20_help">
<?= $Page->HMG20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG21->Visible) { // HMG21 ?>
    <div id="r_HMG21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG21" for="x_HMG21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG21->caption() ?><?= $Page->HMG21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG21">
<input type="<?= $Page->HMG21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG21" name="x_HMG21" id="x_HMG21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG21->getPlaceHolder()) ?>" value="<?= $Page->HMG21->EditValue ?>"<?= $Page->HMG21->editAttributes() ?> aria-describedby="x_HMG21_help">
<?= $Page->HMG21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG22->Visible) { // HMG22 ?>
    <div id="r_HMG22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG22" for="x_HMG22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG22->caption() ?><?= $Page->HMG22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG22">
<input type="<?= $Page->HMG22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG22" name="x_HMG22" id="x_HMG22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG22->getPlaceHolder()) ?>" value="<?= $Page->HMG22->EditValue ?>"<?= $Page->HMG22->editAttributes() ?> aria-describedby="x_HMG22_help">
<?= $Page->HMG22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG23->Visible) { // HMG23 ?>
    <div id="r_HMG23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG23" for="x_HMG23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG23->caption() ?><?= $Page->HMG23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG23">
<input type="<?= $Page->HMG23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG23" name="x_HMG23" id="x_HMG23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG23->getPlaceHolder()) ?>" value="<?= $Page->HMG23->EditValue ?>"<?= $Page->HMG23->editAttributes() ?> aria-describedby="x_HMG23_help">
<?= $Page->HMG23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG24->Visible) { // HMG24 ?>
    <div id="r_HMG24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG24" for="x_HMG24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG24->caption() ?><?= $Page->HMG24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG24">
<input type="<?= $Page->HMG24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG24" name="x_HMG24" id="x_HMG24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG24->getPlaceHolder()) ?>" value="<?= $Page->HMG24->EditValue ?>"<?= $Page->HMG24->editAttributes() ?> aria-describedby="x_HMG24_help">
<?= $Page->HMG24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HMG25->Visible) { // HMG25 ?>
    <div id="r_HMG25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HMG25" for="x_HMG25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HMG25->caption() ?><?= $Page->HMG25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HMG25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG25">
<input type="<?= $Page->HMG25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HMG25" name="x_HMG25" id="x_HMG25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HMG25->getPlaceHolder()) ?>" value="<?= $Page->HMG25->EditValue ?>"<?= $Page->HMG25->editAttributes() ?> aria-describedby="x_HMG25_help">
<?= $Page->HMG25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HMG25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH14->Visible) { // GnRH14 ?>
    <div id="r_GnRH14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH14" for="x_GnRH14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH14->caption() ?><?= $Page->GnRH14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH14">
<input type="<?= $Page->GnRH14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH14" name="x_GnRH14" id="x_GnRH14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH14->getPlaceHolder()) ?>" value="<?= $Page->GnRH14->EditValue ?>"<?= $Page->GnRH14->editAttributes() ?> aria-describedby="x_GnRH14_help">
<?= $Page->GnRH14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH15->Visible) { // GnRH15 ?>
    <div id="r_GnRH15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH15" for="x_GnRH15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH15->caption() ?><?= $Page->GnRH15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH15">
<input type="<?= $Page->GnRH15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH15" name="x_GnRH15" id="x_GnRH15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH15->getPlaceHolder()) ?>" value="<?= $Page->GnRH15->EditValue ?>"<?= $Page->GnRH15->editAttributes() ?> aria-describedby="x_GnRH15_help">
<?= $Page->GnRH15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH16->Visible) { // GnRH16 ?>
    <div id="r_GnRH16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH16" for="x_GnRH16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH16->caption() ?><?= $Page->GnRH16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH16">
<input type="<?= $Page->GnRH16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH16" name="x_GnRH16" id="x_GnRH16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH16->getPlaceHolder()) ?>" value="<?= $Page->GnRH16->EditValue ?>"<?= $Page->GnRH16->editAttributes() ?> aria-describedby="x_GnRH16_help">
<?= $Page->GnRH16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH17->Visible) { // GnRH17 ?>
    <div id="r_GnRH17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH17" for="x_GnRH17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH17->caption() ?><?= $Page->GnRH17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH17">
<input type="<?= $Page->GnRH17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH17" name="x_GnRH17" id="x_GnRH17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH17->getPlaceHolder()) ?>" value="<?= $Page->GnRH17->EditValue ?>"<?= $Page->GnRH17->editAttributes() ?> aria-describedby="x_GnRH17_help">
<?= $Page->GnRH17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH18->Visible) { // GnRH18 ?>
    <div id="r_GnRH18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH18" for="x_GnRH18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH18->caption() ?><?= $Page->GnRH18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH18">
<input type="<?= $Page->GnRH18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH18" name="x_GnRH18" id="x_GnRH18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH18->getPlaceHolder()) ?>" value="<?= $Page->GnRH18->EditValue ?>"<?= $Page->GnRH18->editAttributes() ?> aria-describedby="x_GnRH18_help">
<?= $Page->GnRH18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH19->Visible) { // GnRH19 ?>
    <div id="r_GnRH19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH19" for="x_GnRH19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH19->caption() ?><?= $Page->GnRH19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH19">
<input type="<?= $Page->GnRH19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH19" name="x_GnRH19" id="x_GnRH19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH19->getPlaceHolder()) ?>" value="<?= $Page->GnRH19->EditValue ?>"<?= $Page->GnRH19->editAttributes() ?> aria-describedby="x_GnRH19_help">
<?= $Page->GnRH19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH20->Visible) { // GnRH20 ?>
    <div id="r_GnRH20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH20" for="x_GnRH20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH20->caption() ?><?= $Page->GnRH20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH20">
<input type="<?= $Page->GnRH20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH20" name="x_GnRH20" id="x_GnRH20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH20->getPlaceHolder()) ?>" value="<?= $Page->GnRH20->EditValue ?>"<?= $Page->GnRH20->editAttributes() ?> aria-describedby="x_GnRH20_help">
<?= $Page->GnRH20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH21->Visible) { // GnRH21 ?>
    <div id="r_GnRH21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH21" for="x_GnRH21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH21->caption() ?><?= $Page->GnRH21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH21">
<input type="<?= $Page->GnRH21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH21" name="x_GnRH21" id="x_GnRH21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH21->getPlaceHolder()) ?>" value="<?= $Page->GnRH21->EditValue ?>"<?= $Page->GnRH21->editAttributes() ?> aria-describedby="x_GnRH21_help">
<?= $Page->GnRH21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH22->Visible) { // GnRH22 ?>
    <div id="r_GnRH22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH22" for="x_GnRH22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH22->caption() ?><?= $Page->GnRH22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH22">
<input type="<?= $Page->GnRH22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH22" name="x_GnRH22" id="x_GnRH22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH22->getPlaceHolder()) ?>" value="<?= $Page->GnRH22->EditValue ?>"<?= $Page->GnRH22->editAttributes() ?> aria-describedby="x_GnRH22_help">
<?= $Page->GnRH22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH23->Visible) { // GnRH23 ?>
    <div id="r_GnRH23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH23" for="x_GnRH23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH23->caption() ?><?= $Page->GnRH23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH23">
<input type="<?= $Page->GnRH23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH23" name="x_GnRH23" id="x_GnRH23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH23->getPlaceHolder()) ?>" value="<?= $Page->GnRH23->EditValue ?>"<?= $Page->GnRH23->editAttributes() ?> aria-describedby="x_GnRH23_help">
<?= $Page->GnRH23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH24->Visible) { // GnRH24 ?>
    <div id="r_GnRH24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH24" for="x_GnRH24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH24->caption() ?><?= $Page->GnRH24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH24">
<input type="<?= $Page->GnRH24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH24" name="x_GnRH24" id="x_GnRH24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH24->getPlaceHolder()) ?>" value="<?= $Page->GnRH24->EditValue ?>"<?= $Page->GnRH24->editAttributes() ?> aria-describedby="x_GnRH24_help">
<?= $Page->GnRH24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GnRH25->Visible) { // GnRH25 ?>
    <div id="r_GnRH25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_GnRH25" for="x_GnRH25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GnRH25->caption() ?><?= $Page->GnRH25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GnRH25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH25">
<input type="<?= $Page->GnRH25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_GnRH25" name="x_GnRH25" id="x_GnRH25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GnRH25->getPlaceHolder()) ?>" value="<?= $Page->GnRH25->EditValue ?>"<?= $Page->GnRH25->editAttributes() ?> aria-describedby="x_GnRH25_help">
<?= $Page->GnRH25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GnRH25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P414->Visible) { // P414 ?>
    <div id="r_P414" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P414" for="x_P414" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P414->caption() ?><?= $Page->P414->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P414->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P414">
<input type="<?= $Page->P414->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P414" name="x_P414" id="x_P414" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P414->getPlaceHolder()) ?>" value="<?= $Page->P414->EditValue ?>"<?= $Page->P414->editAttributes() ?> aria-describedby="x_P414_help">
<?= $Page->P414->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P414->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P415->Visible) { // P415 ?>
    <div id="r_P415" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P415" for="x_P415" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P415->caption() ?><?= $Page->P415->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P415->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P415">
<input type="<?= $Page->P415->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P415" name="x_P415" id="x_P415" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P415->getPlaceHolder()) ?>" value="<?= $Page->P415->EditValue ?>"<?= $Page->P415->editAttributes() ?> aria-describedby="x_P415_help">
<?= $Page->P415->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P415->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P416->Visible) { // P416 ?>
    <div id="r_P416" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P416" for="x_P416" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P416->caption() ?><?= $Page->P416->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P416->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P416">
<input type="<?= $Page->P416->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P416" name="x_P416" id="x_P416" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P416->getPlaceHolder()) ?>" value="<?= $Page->P416->EditValue ?>"<?= $Page->P416->editAttributes() ?> aria-describedby="x_P416_help">
<?= $Page->P416->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P416->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P417->Visible) { // P417 ?>
    <div id="r_P417" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P417" for="x_P417" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P417->caption() ?><?= $Page->P417->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P417->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P417">
<input type="<?= $Page->P417->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P417" name="x_P417" id="x_P417" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P417->getPlaceHolder()) ?>" value="<?= $Page->P417->EditValue ?>"<?= $Page->P417->editAttributes() ?> aria-describedby="x_P417_help">
<?= $Page->P417->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P417->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P418->Visible) { // P418 ?>
    <div id="r_P418" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P418" for="x_P418" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P418->caption() ?><?= $Page->P418->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P418->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P418">
<input type="<?= $Page->P418->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P418" name="x_P418" id="x_P418" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P418->getPlaceHolder()) ?>" value="<?= $Page->P418->EditValue ?>"<?= $Page->P418->editAttributes() ?> aria-describedby="x_P418_help">
<?= $Page->P418->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P418->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P419->Visible) { // P419 ?>
    <div id="r_P419" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P419" for="x_P419" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P419->caption() ?><?= $Page->P419->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P419->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P419">
<input type="<?= $Page->P419->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P419" name="x_P419" id="x_P419" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P419->getPlaceHolder()) ?>" value="<?= $Page->P419->EditValue ?>"<?= $Page->P419->editAttributes() ?> aria-describedby="x_P419_help">
<?= $Page->P419->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P419->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P420->Visible) { // P420 ?>
    <div id="r_P420" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P420" for="x_P420" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P420->caption() ?><?= $Page->P420->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P420->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P420">
<input type="<?= $Page->P420->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P420" name="x_P420" id="x_P420" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P420->getPlaceHolder()) ?>" value="<?= $Page->P420->EditValue ?>"<?= $Page->P420->editAttributes() ?> aria-describedby="x_P420_help">
<?= $Page->P420->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P420->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P421->Visible) { // P421 ?>
    <div id="r_P421" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P421" for="x_P421" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P421->caption() ?><?= $Page->P421->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P421->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P421">
<input type="<?= $Page->P421->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P421" name="x_P421" id="x_P421" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P421->getPlaceHolder()) ?>" value="<?= $Page->P421->EditValue ?>"<?= $Page->P421->editAttributes() ?> aria-describedby="x_P421_help">
<?= $Page->P421->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P421->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P422->Visible) { // P422 ?>
    <div id="r_P422" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P422" for="x_P422" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P422->caption() ?><?= $Page->P422->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P422->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P422">
<input type="<?= $Page->P422->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P422" name="x_P422" id="x_P422" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P422->getPlaceHolder()) ?>" value="<?= $Page->P422->EditValue ?>"<?= $Page->P422->editAttributes() ?> aria-describedby="x_P422_help">
<?= $Page->P422->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P422->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P423->Visible) { // P423 ?>
    <div id="r_P423" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P423" for="x_P423" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P423->caption() ?><?= $Page->P423->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P423->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P423">
<input type="<?= $Page->P423->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P423" name="x_P423" id="x_P423" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P423->getPlaceHolder()) ?>" value="<?= $Page->P423->EditValue ?>"<?= $Page->P423->editAttributes() ?> aria-describedby="x_P423_help">
<?= $Page->P423->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P423->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P424->Visible) { // P424 ?>
    <div id="r_P424" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P424" for="x_P424" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P424->caption() ?><?= $Page->P424->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P424->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P424">
<input type="<?= $Page->P424->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P424" name="x_P424" id="x_P424" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P424->getPlaceHolder()) ?>" value="<?= $Page->P424->EditValue ?>"<?= $Page->P424->editAttributes() ?> aria-describedby="x_P424_help">
<?= $Page->P424->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P424->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P425->Visible) { // P425 ?>
    <div id="r_P425" class="form-group row">
        <label id="elh_ivf_stimulation_chart_P425" for="x_P425" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P425->caption() ?><?= $Page->P425->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P425->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P425">
<input type="<?= $Page->P425->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_P425" name="x_P425" id="x_P425" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P425->getPlaceHolder()) ?>" value="<?= $Page->P425->EditValue ?>"<?= $Page->P425->editAttributes() ?> aria-describedby="x_P425_help">
<?= $Page->P425->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P425->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt14->Visible) { // USGRt14 ?>
    <div id="r_USGRt14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt14" for="x_USGRt14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt14->caption() ?><?= $Page->USGRt14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt14">
<input type="<?= $Page->USGRt14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt14" name="x_USGRt14" id="x_USGRt14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt14->getPlaceHolder()) ?>" value="<?= $Page->USGRt14->EditValue ?>"<?= $Page->USGRt14->editAttributes() ?> aria-describedby="x_USGRt14_help">
<?= $Page->USGRt14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt15->Visible) { // USGRt15 ?>
    <div id="r_USGRt15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt15" for="x_USGRt15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt15->caption() ?><?= $Page->USGRt15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt15">
<input type="<?= $Page->USGRt15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt15" name="x_USGRt15" id="x_USGRt15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt15->getPlaceHolder()) ?>" value="<?= $Page->USGRt15->EditValue ?>"<?= $Page->USGRt15->editAttributes() ?> aria-describedby="x_USGRt15_help">
<?= $Page->USGRt15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt16->Visible) { // USGRt16 ?>
    <div id="r_USGRt16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt16" for="x_USGRt16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt16->caption() ?><?= $Page->USGRt16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt16">
<input type="<?= $Page->USGRt16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt16" name="x_USGRt16" id="x_USGRt16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt16->getPlaceHolder()) ?>" value="<?= $Page->USGRt16->EditValue ?>"<?= $Page->USGRt16->editAttributes() ?> aria-describedby="x_USGRt16_help">
<?= $Page->USGRt16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt17->Visible) { // USGRt17 ?>
    <div id="r_USGRt17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt17" for="x_USGRt17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt17->caption() ?><?= $Page->USGRt17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt17">
<input type="<?= $Page->USGRt17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt17" name="x_USGRt17" id="x_USGRt17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt17->getPlaceHolder()) ?>" value="<?= $Page->USGRt17->EditValue ?>"<?= $Page->USGRt17->editAttributes() ?> aria-describedby="x_USGRt17_help">
<?= $Page->USGRt17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt18->Visible) { // USGRt18 ?>
    <div id="r_USGRt18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt18" for="x_USGRt18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt18->caption() ?><?= $Page->USGRt18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt18">
<input type="<?= $Page->USGRt18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt18" name="x_USGRt18" id="x_USGRt18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt18->getPlaceHolder()) ?>" value="<?= $Page->USGRt18->EditValue ?>"<?= $Page->USGRt18->editAttributes() ?> aria-describedby="x_USGRt18_help">
<?= $Page->USGRt18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt19->Visible) { // USGRt19 ?>
    <div id="r_USGRt19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt19" for="x_USGRt19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt19->caption() ?><?= $Page->USGRt19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt19">
<input type="<?= $Page->USGRt19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt19" name="x_USGRt19" id="x_USGRt19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt19->getPlaceHolder()) ?>" value="<?= $Page->USGRt19->EditValue ?>"<?= $Page->USGRt19->editAttributes() ?> aria-describedby="x_USGRt19_help">
<?= $Page->USGRt19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt20->Visible) { // USGRt20 ?>
    <div id="r_USGRt20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt20" for="x_USGRt20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt20->caption() ?><?= $Page->USGRt20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt20">
<input type="<?= $Page->USGRt20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt20" name="x_USGRt20" id="x_USGRt20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt20->getPlaceHolder()) ?>" value="<?= $Page->USGRt20->EditValue ?>"<?= $Page->USGRt20->editAttributes() ?> aria-describedby="x_USGRt20_help">
<?= $Page->USGRt20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt21->Visible) { // USGRt21 ?>
    <div id="r_USGRt21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt21" for="x_USGRt21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt21->caption() ?><?= $Page->USGRt21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt21">
<input type="<?= $Page->USGRt21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt21" name="x_USGRt21" id="x_USGRt21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt21->getPlaceHolder()) ?>" value="<?= $Page->USGRt21->EditValue ?>"<?= $Page->USGRt21->editAttributes() ?> aria-describedby="x_USGRt21_help">
<?= $Page->USGRt21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt22->Visible) { // USGRt22 ?>
    <div id="r_USGRt22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt22" for="x_USGRt22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt22->caption() ?><?= $Page->USGRt22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt22">
<input type="<?= $Page->USGRt22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt22" name="x_USGRt22" id="x_USGRt22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt22->getPlaceHolder()) ?>" value="<?= $Page->USGRt22->EditValue ?>"<?= $Page->USGRt22->editAttributes() ?> aria-describedby="x_USGRt22_help">
<?= $Page->USGRt22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt23->Visible) { // USGRt23 ?>
    <div id="r_USGRt23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt23" for="x_USGRt23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt23->caption() ?><?= $Page->USGRt23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt23">
<input type="<?= $Page->USGRt23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt23" name="x_USGRt23" id="x_USGRt23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt23->getPlaceHolder()) ?>" value="<?= $Page->USGRt23->EditValue ?>"<?= $Page->USGRt23->editAttributes() ?> aria-describedby="x_USGRt23_help">
<?= $Page->USGRt23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt24->Visible) { // USGRt24 ?>
    <div id="r_USGRt24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt24" for="x_USGRt24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt24->caption() ?><?= $Page->USGRt24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt24">
<input type="<?= $Page->USGRt24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt24" name="x_USGRt24" id="x_USGRt24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt24->getPlaceHolder()) ?>" value="<?= $Page->USGRt24->EditValue ?>"<?= $Page->USGRt24->editAttributes() ?> aria-describedby="x_USGRt24_help">
<?= $Page->USGRt24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGRt25->Visible) { // USGRt25 ?>
    <div id="r_USGRt25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGRt25" for="x_USGRt25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGRt25->caption() ?><?= $Page->USGRt25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGRt25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt25">
<input type="<?= $Page->USGRt25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGRt25" name="x_USGRt25" id="x_USGRt25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGRt25->getPlaceHolder()) ?>" value="<?= $Page->USGRt25->EditValue ?>"<?= $Page->USGRt25->editAttributes() ?> aria-describedby="x_USGRt25_help">
<?= $Page->USGRt25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGRt25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt14->Visible) { // USGLt14 ?>
    <div id="r_USGLt14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt14" for="x_USGLt14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt14->caption() ?><?= $Page->USGLt14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt14">
<input type="<?= $Page->USGLt14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt14" name="x_USGLt14" id="x_USGLt14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt14->getPlaceHolder()) ?>" value="<?= $Page->USGLt14->EditValue ?>"<?= $Page->USGLt14->editAttributes() ?> aria-describedby="x_USGLt14_help">
<?= $Page->USGLt14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt15->Visible) { // USGLt15 ?>
    <div id="r_USGLt15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt15" for="x_USGLt15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt15->caption() ?><?= $Page->USGLt15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt15">
<input type="<?= $Page->USGLt15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt15" name="x_USGLt15" id="x_USGLt15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt15->getPlaceHolder()) ?>" value="<?= $Page->USGLt15->EditValue ?>"<?= $Page->USGLt15->editAttributes() ?> aria-describedby="x_USGLt15_help">
<?= $Page->USGLt15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt16->Visible) { // USGLt16 ?>
    <div id="r_USGLt16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt16" for="x_USGLt16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt16->caption() ?><?= $Page->USGLt16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt16">
<input type="<?= $Page->USGLt16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt16" name="x_USGLt16" id="x_USGLt16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt16->getPlaceHolder()) ?>" value="<?= $Page->USGLt16->EditValue ?>"<?= $Page->USGLt16->editAttributes() ?> aria-describedby="x_USGLt16_help">
<?= $Page->USGLt16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt17->Visible) { // USGLt17 ?>
    <div id="r_USGLt17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt17" for="x_USGLt17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt17->caption() ?><?= $Page->USGLt17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt17">
<input type="<?= $Page->USGLt17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt17" name="x_USGLt17" id="x_USGLt17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt17->getPlaceHolder()) ?>" value="<?= $Page->USGLt17->EditValue ?>"<?= $Page->USGLt17->editAttributes() ?> aria-describedby="x_USGLt17_help">
<?= $Page->USGLt17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt18->Visible) { // USGLt18 ?>
    <div id="r_USGLt18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt18" for="x_USGLt18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt18->caption() ?><?= $Page->USGLt18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt18">
<input type="<?= $Page->USGLt18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt18" name="x_USGLt18" id="x_USGLt18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt18->getPlaceHolder()) ?>" value="<?= $Page->USGLt18->EditValue ?>"<?= $Page->USGLt18->editAttributes() ?> aria-describedby="x_USGLt18_help">
<?= $Page->USGLt18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt19->Visible) { // USGLt19 ?>
    <div id="r_USGLt19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt19" for="x_USGLt19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt19->caption() ?><?= $Page->USGLt19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt19">
<input type="<?= $Page->USGLt19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt19" name="x_USGLt19" id="x_USGLt19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt19->getPlaceHolder()) ?>" value="<?= $Page->USGLt19->EditValue ?>"<?= $Page->USGLt19->editAttributes() ?> aria-describedby="x_USGLt19_help">
<?= $Page->USGLt19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt20->Visible) { // USGLt20 ?>
    <div id="r_USGLt20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt20" for="x_USGLt20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt20->caption() ?><?= $Page->USGLt20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt20">
<input type="<?= $Page->USGLt20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt20" name="x_USGLt20" id="x_USGLt20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt20->getPlaceHolder()) ?>" value="<?= $Page->USGLt20->EditValue ?>"<?= $Page->USGLt20->editAttributes() ?> aria-describedby="x_USGLt20_help">
<?= $Page->USGLt20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt21->Visible) { // USGLt21 ?>
    <div id="r_USGLt21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt21" for="x_USGLt21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt21->caption() ?><?= $Page->USGLt21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt21">
<input type="<?= $Page->USGLt21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt21" name="x_USGLt21" id="x_USGLt21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt21->getPlaceHolder()) ?>" value="<?= $Page->USGLt21->EditValue ?>"<?= $Page->USGLt21->editAttributes() ?> aria-describedby="x_USGLt21_help">
<?= $Page->USGLt21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt22->Visible) { // USGLt22 ?>
    <div id="r_USGLt22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt22" for="x_USGLt22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt22->caption() ?><?= $Page->USGLt22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt22">
<input type="<?= $Page->USGLt22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt22" name="x_USGLt22" id="x_USGLt22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt22->getPlaceHolder()) ?>" value="<?= $Page->USGLt22->EditValue ?>"<?= $Page->USGLt22->editAttributes() ?> aria-describedby="x_USGLt22_help">
<?= $Page->USGLt22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt23->Visible) { // USGLt23 ?>
    <div id="r_USGLt23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt23" for="x_USGLt23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt23->caption() ?><?= $Page->USGLt23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt23">
<input type="<?= $Page->USGLt23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt23" name="x_USGLt23" id="x_USGLt23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt23->getPlaceHolder()) ?>" value="<?= $Page->USGLt23->EditValue ?>"<?= $Page->USGLt23->editAttributes() ?> aria-describedby="x_USGLt23_help">
<?= $Page->USGLt23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt24->Visible) { // USGLt24 ?>
    <div id="r_USGLt24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt24" for="x_USGLt24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt24->caption() ?><?= $Page->USGLt24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt24">
<input type="<?= $Page->USGLt24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt24" name="x_USGLt24" id="x_USGLt24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt24->getPlaceHolder()) ?>" value="<?= $Page->USGLt24->EditValue ?>"<?= $Page->USGLt24->editAttributes() ?> aria-describedby="x_USGLt24_help">
<?= $Page->USGLt24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->USGLt25->Visible) { // USGLt25 ?>
    <div id="r_USGLt25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_USGLt25" for="x_USGLt25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->USGLt25->caption() ?><?= $Page->USGLt25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->USGLt25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt25">
<input type="<?= $Page->USGLt25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_USGLt25" name="x_USGLt25" id="x_USGLt25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->USGLt25->getPlaceHolder()) ?>" value="<?= $Page->USGLt25->EditValue ?>"<?= $Page->USGLt25->editAttributes() ?> aria-describedby="x_USGLt25_help">
<?= $Page->USGLt25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->USGLt25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM14->Visible) { // EM14 ?>
    <div id="r_EM14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM14" for="x_EM14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM14->caption() ?><?= $Page->EM14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM14">
<input type="<?= $Page->EM14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM14" name="x_EM14" id="x_EM14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM14->getPlaceHolder()) ?>" value="<?= $Page->EM14->EditValue ?>"<?= $Page->EM14->editAttributes() ?> aria-describedby="x_EM14_help">
<?= $Page->EM14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM15->Visible) { // EM15 ?>
    <div id="r_EM15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM15" for="x_EM15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM15->caption() ?><?= $Page->EM15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM15">
<input type="<?= $Page->EM15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM15" name="x_EM15" id="x_EM15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM15->getPlaceHolder()) ?>" value="<?= $Page->EM15->EditValue ?>"<?= $Page->EM15->editAttributes() ?> aria-describedby="x_EM15_help">
<?= $Page->EM15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM16->Visible) { // EM16 ?>
    <div id="r_EM16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM16" for="x_EM16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM16->caption() ?><?= $Page->EM16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM16">
<input type="<?= $Page->EM16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM16" name="x_EM16" id="x_EM16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM16->getPlaceHolder()) ?>" value="<?= $Page->EM16->EditValue ?>"<?= $Page->EM16->editAttributes() ?> aria-describedby="x_EM16_help">
<?= $Page->EM16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM17->Visible) { // EM17 ?>
    <div id="r_EM17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM17" for="x_EM17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM17->caption() ?><?= $Page->EM17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM17">
<input type="<?= $Page->EM17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM17" name="x_EM17" id="x_EM17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM17->getPlaceHolder()) ?>" value="<?= $Page->EM17->EditValue ?>"<?= $Page->EM17->editAttributes() ?> aria-describedby="x_EM17_help">
<?= $Page->EM17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM18->Visible) { // EM18 ?>
    <div id="r_EM18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM18" for="x_EM18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM18->caption() ?><?= $Page->EM18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM18">
<input type="<?= $Page->EM18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM18" name="x_EM18" id="x_EM18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM18->getPlaceHolder()) ?>" value="<?= $Page->EM18->EditValue ?>"<?= $Page->EM18->editAttributes() ?> aria-describedby="x_EM18_help">
<?= $Page->EM18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM19->Visible) { // EM19 ?>
    <div id="r_EM19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM19" for="x_EM19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM19->caption() ?><?= $Page->EM19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM19">
<input type="<?= $Page->EM19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM19" name="x_EM19" id="x_EM19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM19->getPlaceHolder()) ?>" value="<?= $Page->EM19->EditValue ?>"<?= $Page->EM19->editAttributes() ?> aria-describedby="x_EM19_help">
<?= $Page->EM19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM20->Visible) { // EM20 ?>
    <div id="r_EM20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM20" for="x_EM20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM20->caption() ?><?= $Page->EM20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM20">
<input type="<?= $Page->EM20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM20" name="x_EM20" id="x_EM20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM20->getPlaceHolder()) ?>" value="<?= $Page->EM20->EditValue ?>"<?= $Page->EM20->editAttributes() ?> aria-describedby="x_EM20_help">
<?= $Page->EM20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM21->Visible) { // EM21 ?>
    <div id="r_EM21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM21" for="x_EM21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM21->caption() ?><?= $Page->EM21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM21">
<input type="<?= $Page->EM21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM21" name="x_EM21" id="x_EM21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM21->getPlaceHolder()) ?>" value="<?= $Page->EM21->EditValue ?>"<?= $Page->EM21->editAttributes() ?> aria-describedby="x_EM21_help">
<?= $Page->EM21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM22->Visible) { // EM22 ?>
    <div id="r_EM22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM22" for="x_EM22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM22->caption() ?><?= $Page->EM22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM22">
<input type="<?= $Page->EM22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM22" name="x_EM22" id="x_EM22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM22->getPlaceHolder()) ?>" value="<?= $Page->EM22->EditValue ?>"<?= $Page->EM22->editAttributes() ?> aria-describedby="x_EM22_help">
<?= $Page->EM22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM23->Visible) { // EM23 ?>
    <div id="r_EM23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM23" for="x_EM23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM23->caption() ?><?= $Page->EM23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM23">
<input type="<?= $Page->EM23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM23" name="x_EM23" id="x_EM23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM23->getPlaceHolder()) ?>" value="<?= $Page->EM23->EditValue ?>"<?= $Page->EM23->editAttributes() ?> aria-describedby="x_EM23_help">
<?= $Page->EM23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM24->Visible) { // EM24 ?>
    <div id="r_EM24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM24" for="x_EM24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM24->caption() ?><?= $Page->EM24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM24">
<input type="<?= $Page->EM24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM24" name="x_EM24" id="x_EM24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM24->getPlaceHolder()) ?>" value="<?= $Page->EM24->EditValue ?>"<?= $Page->EM24->editAttributes() ?> aria-describedby="x_EM24_help">
<?= $Page->EM24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EM25->Visible) { // EM25 ?>
    <div id="r_EM25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EM25" for="x_EM25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EM25->caption() ?><?= $Page->EM25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EM25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM25">
<input type="<?= $Page->EM25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EM25" name="x_EM25" id="x_EM25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EM25->getPlaceHolder()) ?>" value="<?= $Page->EM25->EditValue ?>"<?= $Page->EM25->editAttributes() ?> aria-describedby="x_EM25_help">
<?= $Page->EM25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EM25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others14->Visible) { // Others14 ?>
    <div id="r_Others14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others14" for="x_Others14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others14->caption() ?><?= $Page->Others14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others14">
<input type="<?= $Page->Others14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others14" name="x_Others14" id="x_Others14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others14->getPlaceHolder()) ?>" value="<?= $Page->Others14->EditValue ?>"<?= $Page->Others14->editAttributes() ?> aria-describedby="x_Others14_help">
<?= $Page->Others14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others15->Visible) { // Others15 ?>
    <div id="r_Others15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others15" for="x_Others15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others15->caption() ?><?= $Page->Others15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others15">
<input type="<?= $Page->Others15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others15" name="x_Others15" id="x_Others15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others15->getPlaceHolder()) ?>" value="<?= $Page->Others15->EditValue ?>"<?= $Page->Others15->editAttributes() ?> aria-describedby="x_Others15_help">
<?= $Page->Others15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others16->Visible) { // Others16 ?>
    <div id="r_Others16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others16" for="x_Others16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others16->caption() ?><?= $Page->Others16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others16">
<input type="<?= $Page->Others16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others16" name="x_Others16" id="x_Others16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others16->getPlaceHolder()) ?>" value="<?= $Page->Others16->EditValue ?>"<?= $Page->Others16->editAttributes() ?> aria-describedby="x_Others16_help">
<?= $Page->Others16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others17->Visible) { // Others17 ?>
    <div id="r_Others17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others17" for="x_Others17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others17->caption() ?><?= $Page->Others17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others17">
<input type="<?= $Page->Others17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others17" name="x_Others17" id="x_Others17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others17->getPlaceHolder()) ?>" value="<?= $Page->Others17->EditValue ?>"<?= $Page->Others17->editAttributes() ?> aria-describedby="x_Others17_help">
<?= $Page->Others17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others18->Visible) { // Others18 ?>
    <div id="r_Others18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others18" for="x_Others18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others18->caption() ?><?= $Page->Others18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others18">
<input type="<?= $Page->Others18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others18" name="x_Others18" id="x_Others18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others18->getPlaceHolder()) ?>" value="<?= $Page->Others18->EditValue ?>"<?= $Page->Others18->editAttributes() ?> aria-describedby="x_Others18_help">
<?= $Page->Others18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others19->Visible) { // Others19 ?>
    <div id="r_Others19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others19" for="x_Others19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others19->caption() ?><?= $Page->Others19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others19">
<input type="<?= $Page->Others19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others19" name="x_Others19" id="x_Others19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others19->getPlaceHolder()) ?>" value="<?= $Page->Others19->EditValue ?>"<?= $Page->Others19->editAttributes() ?> aria-describedby="x_Others19_help">
<?= $Page->Others19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others20->Visible) { // Others20 ?>
    <div id="r_Others20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others20" for="x_Others20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others20->caption() ?><?= $Page->Others20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others20">
<input type="<?= $Page->Others20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others20" name="x_Others20" id="x_Others20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others20->getPlaceHolder()) ?>" value="<?= $Page->Others20->EditValue ?>"<?= $Page->Others20->editAttributes() ?> aria-describedby="x_Others20_help">
<?= $Page->Others20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others21->Visible) { // Others21 ?>
    <div id="r_Others21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others21" for="x_Others21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others21->caption() ?><?= $Page->Others21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others21">
<input type="<?= $Page->Others21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others21" name="x_Others21" id="x_Others21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others21->getPlaceHolder()) ?>" value="<?= $Page->Others21->EditValue ?>"<?= $Page->Others21->editAttributes() ?> aria-describedby="x_Others21_help">
<?= $Page->Others21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others22->Visible) { // Others22 ?>
    <div id="r_Others22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others22" for="x_Others22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others22->caption() ?><?= $Page->Others22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others22">
<input type="<?= $Page->Others22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others22" name="x_Others22" id="x_Others22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others22->getPlaceHolder()) ?>" value="<?= $Page->Others22->EditValue ?>"<?= $Page->Others22->editAttributes() ?> aria-describedby="x_Others22_help">
<?= $Page->Others22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others23->Visible) { // Others23 ?>
    <div id="r_Others23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others23" for="x_Others23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others23->caption() ?><?= $Page->Others23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others23">
<input type="<?= $Page->Others23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others23" name="x_Others23" id="x_Others23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others23->getPlaceHolder()) ?>" value="<?= $Page->Others23->EditValue ?>"<?= $Page->Others23->editAttributes() ?> aria-describedby="x_Others23_help">
<?= $Page->Others23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others24->Visible) { // Others24 ?>
    <div id="r_Others24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others24" for="x_Others24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others24->caption() ?><?= $Page->Others24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others24">
<input type="<?= $Page->Others24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others24" name="x_Others24" id="x_Others24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others24->getPlaceHolder()) ?>" value="<?= $Page->Others24->EditValue ?>"<?= $Page->Others24->editAttributes() ?> aria-describedby="x_Others24_help">
<?= $Page->Others24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others25->Visible) { // Others25 ?>
    <div id="r_Others25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_Others25" for="x_Others25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others25->caption() ?><?= $Page->Others25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others25">
<input type="<?= $Page->Others25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_Others25" name="x_Others25" id="x_Others25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others25->getPlaceHolder()) ?>" value="<?= $Page->Others25->EditValue ?>"<?= $Page->Others25->editAttributes() ?> aria-describedby="x_Others25_help">
<?= $Page->Others25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR14->Visible) { // DR14 ?>
    <div id="r_DR14" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR14" for="x_DR14" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR14->caption() ?><?= $Page->DR14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR14">
<input type="<?= $Page->DR14->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR14" name="x_DR14" id="x_DR14" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR14->getPlaceHolder()) ?>" value="<?= $Page->DR14->EditValue ?>"<?= $Page->DR14->editAttributes() ?> aria-describedby="x_DR14_help">
<?= $Page->DR14->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR14->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR15->Visible) { // DR15 ?>
    <div id="r_DR15" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR15" for="x_DR15" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR15->caption() ?><?= $Page->DR15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR15">
<input type="<?= $Page->DR15->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR15" name="x_DR15" id="x_DR15" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR15->getPlaceHolder()) ?>" value="<?= $Page->DR15->EditValue ?>"<?= $Page->DR15->editAttributes() ?> aria-describedby="x_DR15_help">
<?= $Page->DR15->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR15->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR16->Visible) { // DR16 ?>
    <div id="r_DR16" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR16" for="x_DR16" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR16->caption() ?><?= $Page->DR16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR16">
<input type="<?= $Page->DR16->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR16" name="x_DR16" id="x_DR16" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR16->getPlaceHolder()) ?>" value="<?= $Page->DR16->EditValue ?>"<?= $Page->DR16->editAttributes() ?> aria-describedby="x_DR16_help">
<?= $Page->DR16->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR16->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR17->Visible) { // DR17 ?>
    <div id="r_DR17" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR17" for="x_DR17" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR17->caption() ?><?= $Page->DR17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR17">
<input type="<?= $Page->DR17->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR17" name="x_DR17" id="x_DR17" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR17->getPlaceHolder()) ?>" value="<?= $Page->DR17->EditValue ?>"<?= $Page->DR17->editAttributes() ?> aria-describedby="x_DR17_help">
<?= $Page->DR17->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR17->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR18->Visible) { // DR18 ?>
    <div id="r_DR18" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR18" for="x_DR18" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR18->caption() ?><?= $Page->DR18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR18">
<input type="<?= $Page->DR18->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR18" name="x_DR18" id="x_DR18" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR18->getPlaceHolder()) ?>" value="<?= $Page->DR18->EditValue ?>"<?= $Page->DR18->editAttributes() ?> aria-describedby="x_DR18_help">
<?= $Page->DR18->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR18->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR19->Visible) { // DR19 ?>
    <div id="r_DR19" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR19" for="x_DR19" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR19->caption() ?><?= $Page->DR19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR19">
<input type="<?= $Page->DR19->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR19" name="x_DR19" id="x_DR19" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR19->getPlaceHolder()) ?>" value="<?= $Page->DR19->EditValue ?>"<?= $Page->DR19->editAttributes() ?> aria-describedby="x_DR19_help">
<?= $Page->DR19->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR19->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR20->Visible) { // DR20 ?>
    <div id="r_DR20" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR20" for="x_DR20" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR20->caption() ?><?= $Page->DR20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR20">
<input type="<?= $Page->DR20->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR20" name="x_DR20" id="x_DR20" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR20->getPlaceHolder()) ?>" value="<?= $Page->DR20->EditValue ?>"<?= $Page->DR20->editAttributes() ?> aria-describedby="x_DR20_help">
<?= $Page->DR20->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR20->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR21->Visible) { // DR21 ?>
    <div id="r_DR21" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR21" for="x_DR21" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR21->caption() ?><?= $Page->DR21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR21">
<input type="<?= $Page->DR21->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR21" name="x_DR21" id="x_DR21" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR21->getPlaceHolder()) ?>" value="<?= $Page->DR21->EditValue ?>"<?= $Page->DR21->editAttributes() ?> aria-describedby="x_DR21_help">
<?= $Page->DR21->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR21->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR22->Visible) { // DR22 ?>
    <div id="r_DR22" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR22" for="x_DR22" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR22->caption() ?><?= $Page->DR22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR22">
<input type="<?= $Page->DR22->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR22" name="x_DR22" id="x_DR22" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR22->getPlaceHolder()) ?>" value="<?= $Page->DR22->EditValue ?>"<?= $Page->DR22->editAttributes() ?> aria-describedby="x_DR22_help">
<?= $Page->DR22->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR22->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR23->Visible) { // DR23 ?>
    <div id="r_DR23" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR23" for="x_DR23" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR23->caption() ?><?= $Page->DR23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR23">
<input type="<?= $Page->DR23->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR23" name="x_DR23" id="x_DR23" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR23->getPlaceHolder()) ?>" value="<?= $Page->DR23->EditValue ?>"<?= $Page->DR23->editAttributes() ?> aria-describedby="x_DR23_help">
<?= $Page->DR23->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR23->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR24->Visible) { // DR24 ?>
    <div id="r_DR24" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR24" for="x_DR24" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR24->caption() ?><?= $Page->DR24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR24">
<input type="<?= $Page->DR24->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR24" name="x_DR24" id="x_DR24" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR24->getPlaceHolder()) ?>" value="<?= $Page->DR24->EditValue ?>"<?= $Page->DR24->editAttributes() ?> aria-describedby="x_DR24_help">
<?= $Page->DR24->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR24->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DR25->Visible) { // DR25 ?>
    <div id="r_DR25" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DR25" for="x_DR25" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DR25->caption() ?><?= $Page->DR25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DR25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR25">
<input type="<?= $Page->DR25->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DR25" name="x_DR25" id="x_DR25" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DR25->getPlaceHolder()) ?>" value="<?= $Page->DR25->EditValue ?>"<?= $Page->DR25->editAttributes() ?> aria-describedby="x_DR25_help">
<?= $Page->DR25->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DR25->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E214->Visible) { // E214 ?>
    <div id="r_E214" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E214" for="x_E214" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E214->caption() ?><?= $Page->E214->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E214->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E214">
<input type="<?= $Page->E214->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E214" name="x_E214" id="x_E214" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E214->getPlaceHolder()) ?>" value="<?= $Page->E214->EditValue ?>"<?= $Page->E214->editAttributes() ?> aria-describedby="x_E214_help">
<?= $Page->E214->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E214->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E215->Visible) { // E215 ?>
    <div id="r_E215" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E215" for="x_E215" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E215->caption() ?><?= $Page->E215->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E215->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E215">
<input type="<?= $Page->E215->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E215" name="x_E215" id="x_E215" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E215->getPlaceHolder()) ?>" value="<?= $Page->E215->EditValue ?>"<?= $Page->E215->editAttributes() ?> aria-describedby="x_E215_help">
<?= $Page->E215->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E215->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E216->Visible) { // E216 ?>
    <div id="r_E216" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E216" for="x_E216" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E216->caption() ?><?= $Page->E216->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E216->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E216">
<input type="<?= $Page->E216->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E216" name="x_E216" id="x_E216" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E216->getPlaceHolder()) ?>" value="<?= $Page->E216->EditValue ?>"<?= $Page->E216->editAttributes() ?> aria-describedby="x_E216_help">
<?= $Page->E216->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E216->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E217->Visible) { // E217 ?>
    <div id="r_E217" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E217" for="x_E217" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E217->caption() ?><?= $Page->E217->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E217->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E217">
<input type="<?= $Page->E217->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E217" name="x_E217" id="x_E217" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E217->getPlaceHolder()) ?>" value="<?= $Page->E217->EditValue ?>"<?= $Page->E217->editAttributes() ?> aria-describedby="x_E217_help">
<?= $Page->E217->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E217->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E218->Visible) { // E218 ?>
    <div id="r_E218" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E218" for="x_E218" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E218->caption() ?><?= $Page->E218->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E218->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E218">
<input type="<?= $Page->E218->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E218" name="x_E218" id="x_E218" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E218->getPlaceHolder()) ?>" value="<?= $Page->E218->EditValue ?>"<?= $Page->E218->editAttributes() ?> aria-describedby="x_E218_help">
<?= $Page->E218->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E218->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E219->Visible) { // E219 ?>
    <div id="r_E219" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E219" for="x_E219" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E219->caption() ?><?= $Page->E219->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E219->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E219">
<input type="<?= $Page->E219->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E219" name="x_E219" id="x_E219" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E219->getPlaceHolder()) ?>" value="<?= $Page->E219->EditValue ?>"<?= $Page->E219->editAttributes() ?> aria-describedby="x_E219_help">
<?= $Page->E219->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E219->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E220->Visible) { // E220 ?>
    <div id="r_E220" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E220" for="x_E220" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E220->caption() ?><?= $Page->E220->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E220->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E220">
<input type="<?= $Page->E220->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E220" name="x_E220" id="x_E220" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E220->getPlaceHolder()) ?>" value="<?= $Page->E220->EditValue ?>"<?= $Page->E220->editAttributes() ?> aria-describedby="x_E220_help">
<?= $Page->E220->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E220->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E221->Visible) { // E221 ?>
    <div id="r_E221" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E221" for="x_E221" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E221->caption() ?><?= $Page->E221->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E221->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E221">
<input type="<?= $Page->E221->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E221" name="x_E221" id="x_E221" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E221->getPlaceHolder()) ?>" value="<?= $Page->E221->EditValue ?>"<?= $Page->E221->editAttributes() ?> aria-describedby="x_E221_help">
<?= $Page->E221->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E221->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E222->Visible) { // E222 ?>
    <div id="r_E222" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E222" for="x_E222" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E222->caption() ?><?= $Page->E222->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E222->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E222">
<input type="<?= $Page->E222->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E222" name="x_E222" id="x_E222" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E222->getPlaceHolder()) ?>" value="<?= $Page->E222->EditValue ?>"<?= $Page->E222->editAttributes() ?> aria-describedby="x_E222_help">
<?= $Page->E222->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E222->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E223->Visible) { // E223 ?>
    <div id="r_E223" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E223" for="x_E223" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E223->caption() ?><?= $Page->E223->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E223->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E223">
<input type="<?= $Page->E223->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E223" name="x_E223" id="x_E223" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E223->getPlaceHolder()) ?>" value="<?= $Page->E223->EditValue ?>"<?= $Page->E223->editAttributes() ?> aria-describedby="x_E223_help">
<?= $Page->E223->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E223->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E224->Visible) { // E224 ?>
    <div id="r_E224" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E224" for="x_E224" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E224->caption() ?><?= $Page->E224->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E224->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E224">
<input type="<?= $Page->E224->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E224" name="x_E224" id="x_E224" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E224->getPlaceHolder()) ?>" value="<?= $Page->E224->EditValue ?>"<?= $Page->E224->editAttributes() ?> aria-describedby="x_E224_help">
<?= $Page->E224->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E224->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E225->Visible) { // E225 ?>
    <div id="r_E225" class="form-group row">
        <label id="elh_ivf_stimulation_chart_E225" for="x_E225" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E225->caption() ?><?= $Page->E225->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E225->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E225">
<input type="<?= $Page->E225->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_E225" name="x_E225" id="x_E225" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E225->getPlaceHolder()) ?>" value="<?= $Page->E225->EditValue ?>"<?= $Page->E225->editAttributes() ?> aria-describedby="x_E225_help">
<?= $Page->E225->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E225->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EEETTTDTE->Visible) { // EEETTTDTE ?>
    <div id="r_EEETTTDTE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EEETTTDTE" for="x_EEETTTDTE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EEETTTDTE->caption() ?><?= $Page->EEETTTDTE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EEETTTDTE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EEETTTDTE">
<input type="<?= $Page->EEETTTDTE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_EEETTTDTE" name="x_EEETTTDTE" id="x_EEETTTDTE" placeholder="<?= HtmlEncode($Page->EEETTTDTE->getPlaceHolder()) ?>" value="<?= $Page->EEETTTDTE->EditValue ?>"<?= $Page->EEETTTDTE->editAttributes() ?> aria-describedby="x_EEETTTDTE_help">
<?= $Page->EEETTTDTE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EEETTTDTE->getErrorMessage() ?></div>
<?php if (!$Page->EEETTTDTE->ReadOnly && !$Page->EEETTTDTE->Disabled && !isset($Page->EEETTTDTE->EditAttrs["readonly"]) && !isset($Page->EEETTTDTE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_EEETTTDTE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bhcgdate->Visible) { // bhcgdate ?>
    <div id="r_bhcgdate" class="form-group row">
        <label id="elh_ivf_stimulation_chart_bhcgdate" for="x_bhcgdate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->bhcgdate->caption() ?><?= $Page->bhcgdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bhcgdate->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_bhcgdate">
<input type="<?= $Page->bhcgdate->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_bhcgdate" name="x_bhcgdate" id="x_bhcgdate" placeholder="<?= HtmlEncode($Page->bhcgdate->getPlaceHolder()) ?>" value="<?= $Page->bhcgdate->EditValue ?>"<?= $Page->bhcgdate->editAttributes() ?> aria-describedby="x_bhcgdate_help">
<?= $Page->bhcgdate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bhcgdate->getErrorMessage() ?></div>
<?php if (!$Page->bhcgdate->ReadOnly && !$Page->bhcgdate->Disabled && !isset($Page->bhcgdate->EditAttrs["readonly"]) && !isset($Page->bhcgdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_stimulation_chartedit", "x_bhcgdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
    <div id="r_TUBAL_PATENCY" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TUBAL_PATENCY" for="x_TUBAL_PATENCY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TUBAL_PATENCY->caption() ?><?= $Page->TUBAL_PATENCY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TUBAL_PATENCY->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TUBAL_PATENCY">
<input type="<?= $Page->TUBAL_PATENCY->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TUBAL_PATENCY" name="x_TUBAL_PATENCY" id="x_TUBAL_PATENCY" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TUBAL_PATENCY->getPlaceHolder()) ?>" value="<?= $Page->TUBAL_PATENCY->EditValue ?>"<?= $Page->TUBAL_PATENCY->editAttributes() ?> aria-describedby="x_TUBAL_PATENCY_help">
<?= $Page->TUBAL_PATENCY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TUBAL_PATENCY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
    <div id="r_HSG" class="form-group row">
        <label id="elh_ivf_stimulation_chart_HSG" for="x_HSG" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HSG->caption() ?><?= $Page->HSG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HSG->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HSG">
<input type="<?= $Page->HSG->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_HSG" name="x_HSG" id="x_HSG" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HSG->getPlaceHolder()) ?>" value="<?= $Page->HSG->EditValue ?>"<?= $Page->HSG->editAttributes() ?> aria-describedby="x_HSG_help">
<?= $Page->HSG->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HSG->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
    <div id="r_DHL" class="form-group row">
        <label id="elh_ivf_stimulation_chart_DHL" for="x_DHL" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DHL->caption() ?><?= $Page->DHL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DHL->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DHL">
<input type="<?= $Page->DHL->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_DHL" name="x_DHL" id="x_DHL" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DHL->getPlaceHolder()) ?>" value="<?= $Page->DHL->EditValue ?>"<?= $Page->DHL->editAttributes() ?> aria-describedby="x_DHL_help">
<?= $Page->DHL->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DHL->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
    <div id="r_UTERINE_PROBLEMS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS" for="x_UTERINE_PROBLEMS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UTERINE_PROBLEMS->caption() ?><?= $Page->UTERINE_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UTERINE_PROBLEMS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_UTERINE_PROBLEMS">
<input type="<?= $Page->UTERINE_PROBLEMS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_UTERINE_PROBLEMS" name="x_UTERINE_PROBLEMS" id="x_UTERINE_PROBLEMS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UTERINE_PROBLEMS->getPlaceHolder()) ?>" value="<?= $Page->UTERINE_PROBLEMS->EditValue ?>"<?= $Page->UTERINE_PROBLEMS->editAttributes() ?> aria-describedby="x_UTERINE_PROBLEMS_help">
<?= $Page->UTERINE_PROBLEMS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UTERINE_PROBLEMS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
    <div id="r_W_COMORBIDS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_W_COMORBIDS" for="x_W_COMORBIDS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->W_COMORBIDS->caption() ?><?= $Page->W_COMORBIDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->W_COMORBIDS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_W_COMORBIDS">
<input type="<?= $Page->W_COMORBIDS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_W_COMORBIDS" name="x_W_COMORBIDS" id="x_W_COMORBIDS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->W_COMORBIDS->getPlaceHolder()) ?>" value="<?= $Page->W_COMORBIDS->EditValue ?>"<?= $Page->W_COMORBIDS->editAttributes() ?> aria-describedby="x_W_COMORBIDS_help">
<?= $Page->W_COMORBIDS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->W_COMORBIDS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
    <div id="r_H_COMORBIDS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_H_COMORBIDS" for="x_H_COMORBIDS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->H_COMORBIDS->caption() ?><?= $Page->H_COMORBIDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->H_COMORBIDS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_H_COMORBIDS">
<input type="<?= $Page->H_COMORBIDS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_H_COMORBIDS" name="x_H_COMORBIDS" id="x_H_COMORBIDS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->H_COMORBIDS->getPlaceHolder()) ?>" value="<?= $Page->H_COMORBIDS->EditValue ?>"<?= $Page->H_COMORBIDS->editAttributes() ?> aria-describedby="x_H_COMORBIDS_help">
<?= $Page->H_COMORBIDS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->H_COMORBIDS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
    <div id="r_SEXUAL_DYSFUNCTION" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" for="x_SEXUAL_DYSFUNCTION" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SEXUAL_DYSFUNCTION->caption() ?><?= $Page->SEXUAL_DYSFUNCTION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<input type="<?= $Page->SEXUAL_DYSFUNCTION->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_SEXUAL_DYSFUNCTION" name="x_SEXUAL_DYSFUNCTION" id="x_SEXUAL_DYSFUNCTION" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SEXUAL_DYSFUNCTION->getPlaceHolder()) ?>" value="<?= $Page->SEXUAL_DYSFUNCTION->EditValue ?>"<?= $Page->SEXUAL_DYSFUNCTION->editAttributes() ?> aria-describedby="x_SEXUAL_DYSFUNCTION_help">
<?= $Page->SEXUAL_DYSFUNCTION->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SEXUAL_DYSFUNCTION->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
    <div id="r_TABLETS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_TABLETS" for="x_TABLETS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TABLETS->caption() ?><?= $Page->TABLETS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TABLETS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TABLETS">
<input type="<?= $Page->TABLETS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_TABLETS" name="x_TABLETS" id="x_TABLETS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TABLETS->getPlaceHolder()) ?>" value="<?= $Page->TABLETS->EditValue ?>"<?= $Page->TABLETS->editAttributes() ?> aria-describedby="x_TABLETS_help">
<?= $Page->TABLETS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TABLETS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
    <div id="r_FOLLICLE_STATUS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_FOLLICLE_STATUS" for="x_FOLLICLE_STATUS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FOLLICLE_STATUS->caption() ?><?= $Page->FOLLICLE_STATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FOLLICLE_STATUS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_FOLLICLE_STATUS">
<input type="<?= $Page->FOLLICLE_STATUS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_FOLLICLE_STATUS" name="x_FOLLICLE_STATUS" id="x_FOLLICLE_STATUS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FOLLICLE_STATUS->getPlaceHolder()) ?>" value="<?= $Page->FOLLICLE_STATUS->EditValue ?>"<?= $Page->FOLLICLE_STATUS->editAttributes() ?> aria-describedby="x_FOLLICLE_STATUS_help">
<?= $Page->FOLLICLE_STATUS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FOLLICLE_STATUS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
    <div id="r_NUMBER_OF_IUI" class="form-group row">
        <label id="elh_ivf_stimulation_chart_NUMBER_OF_IUI" for="x_NUMBER_OF_IUI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NUMBER_OF_IUI->caption() ?><?= $Page->NUMBER_OF_IUI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NUMBER_OF_IUI->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_NUMBER_OF_IUI">
<input type="<?= $Page->NUMBER_OF_IUI->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_NUMBER_OF_IUI" name="x_NUMBER_OF_IUI" id="x_NUMBER_OF_IUI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NUMBER_OF_IUI->getPlaceHolder()) ?>" value="<?= $Page->NUMBER_OF_IUI->EditValue ?>"<?= $Page->NUMBER_OF_IUI->editAttributes() ?> aria-describedby="x_NUMBER_OF_IUI_help">
<?= $Page->NUMBER_OF_IUI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NUMBER_OF_IUI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
    <div id="r_PROCEDURE" class="form-group row">
        <label id="elh_ivf_stimulation_chart_PROCEDURE" for="x_PROCEDURE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PROCEDURE->caption() ?><?= $Page->PROCEDURE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PROCEDURE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_PROCEDURE">
<input type="<?= $Page->PROCEDURE->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_PROCEDURE" name="x_PROCEDURE" id="x_PROCEDURE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PROCEDURE->getPlaceHolder()) ?>" value="<?= $Page->PROCEDURE->EditValue ?>"<?= $Page->PROCEDURE->editAttributes() ?> aria-describedby="x_PROCEDURE_help">
<?= $Page->PROCEDURE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PROCEDURE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
    <div id="r_LUTEAL_SUPPORT" class="form-group row">
        <label id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT" for="x_LUTEAL_SUPPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LUTEAL_SUPPORT->caption() ?><?= $Page->LUTEAL_SUPPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LUTEAL_SUPPORT->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_LUTEAL_SUPPORT">
<input type="<?= $Page->LUTEAL_SUPPORT->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_LUTEAL_SUPPORT" name="x_LUTEAL_SUPPORT" id="x_LUTEAL_SUPPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LUTEAL_SUPPORT->getPlaceHolder()) ?>" value="<?= $Page->LUTEAL_SUPPORT->EditValue ?>"<?= $Page->LUTEAL_SUPPORT->editAttributes() ?> aria-describedby="x_LUTEAL_SUPPORT_help">
<?= $Page->LUTEAL_SUPPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LUTEAL_SUPPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
    <div id="r_SPECIFIC_MATERNAL_PROBLEMS" class="form-group row">
        <label id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" for="x_SPECIFIC_MATERNAL_PROBLEMS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->caption() ?><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<input type="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_SPECIFIC_MATERNAL_PROBLEMS" name="x_SPECIFIC_MATERNAL_PROBLEMS" id="x_SPECIFIC_MATERNAL_PROBLEMS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SPECIFIC_MATERNAL_PROBLEMS->getPlaceHolder()) ?>" value="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->EditValue ?>"<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->editAttributes() ?> aria-describedby="x_SPECIFIC_MATERNAL_PROBLEMS_help">
<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
    <div id="r_ONGOING_PREG" class="form-group row">
        <label id="elh_ivf_stimulation_chart_ONGOING_PREG" for="x_ONGOING_PREG" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ONGOING_PREG->caption() ?><?= $Page->ONGOING_PREG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ONGOING_PREG->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ONGOING_PREG">
<input type="<?= $Page->ONGOING_PREG->getInputTextType() ?>" data-table="ivf_stimulation_chart" data-field="x_ONGOING_PREG" name="x_ONGOING_PREG" id="x_ONGOING_PREG" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ONGOING_PREG->getPlaceHolder()) ?>" value="<?= $Page->ONGOING_PREG->EditValue ?>"<?= $Page->ONGOING_PREG->editAttributes() ?> aria-describedby="x_ONGOING_PREG_help">
<?= $Page->ONGOING_PREG->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ONGOING_PREG->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
    <div id="r_EDD_Date" class="form-group row">
        <label id="elh_ivf_stimulation_chart_EDD_Date" for="x_EDD_Date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EDD_Date->caption() ?><?= $Page->EDD_Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDD_Date->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EDD_Date">
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
    ew.addEventHandlers("ivf_stimulation_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

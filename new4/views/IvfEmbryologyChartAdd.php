<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfEmbryologyChartAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_embryology_chartadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_embryology_chartadd = currentForm = new ew.Form("fivf_embryology_chartadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_embryology_chart")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_embryology_chart)
        ew.vars.tables.ivf_embryology_chart = currentTable;
    fivf_embryology_chartadd.addFields([
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["ARTCycle", [fields.ARTCycle.visible && fields.ARTCycle.required ? ew.Validators.required(fields.ARTCycle.caption) : null], fields.ARTCycle.isInvalid],
        ["SpermOrigin", [fields.SpermOrigin.visible && fields.SpermOrigin.required ? ew.Validators.required(fields.SpermOrigin.caption) : null], fields.SpermOrigin.isInvalid],
        ["InseminatinTechnique", [fields.InseminatinTechnique.visible && fields.InseminatinTechnique.required ? ew.Validators.required(fields.InseminatinTechnique.caption) : null], fields.InseminatinTechnique.isInvalid],
        ["IndicationForART", [fields.IndicationForART.visible && fields.IndicationForART.required ? ew.Validators.required(fields.IndicationForART.caption) : null], fields.IndicationForART.isInvalid],
        ["Day0sino", [fields.Day0sino.visible && fields.Day0sino.required ? ew.Validators.required(fields.Day0sino.caption) : null], fields.Day0sino.isInvalid],
        ["Day0OocyteStage", [fields.Day0OocyteStage.visible && fields.Day0OocyteStage.required ? ew.Validators.required(fields.Day0OocyteStage.caption) : null], fields.Day0OocyteStage.isInvalid],
        ["Day0PolarBodyPosition", [fields.Day0PolarBodyPosition.visible && fields.Day0PolarBodyPosition.required ? ew.Validators.required(fields.Day0PolarBodyPosition.caption) : null], fields.Day0PolarBodyPosition.isInvalid],
        ["Day0Breakage", [fields.Day0Breakage.visible && fields.Day0Breakage.required ? ew.Validators.required(fields.Day0Breakage.caption) : null], fields.Day0Breakage.isInvalid],
        ["Day0Attempts", [fields.Day0Attempts.visible && fields.Day0Attempts.required ? ew.Validators.required(fields.Day0Attempts.caption) : null], fields.Day0Attempts.isInvalid],
        ["Day0SPZMorpho", [fields.Day0SPZMorpho.visible && fields.Day0SPZMorpho.required ? ew.Validators.required(fields.Day0SPZMorpho.caption) : null], fields.Day0SPZMorpho.isInvalid],
        ["Day0SPZLocation", [fields.Day0SPZLocation.visible && fields.Day0SPZLocation.required ? ew.Validators.required(fields.Day0SPZLocation.caption) : null], fields.Day0SPZLocation.isInvalid],
        ["Day0SpOrgin", [fields.Day0SpOrgin.visible && fields.Day0SpOrgin.required ? ew.Validators.required(fields.Day0SpOrgin.caption) : null], fields.Day0SpOrgin.isInvalid],
        ["Day5Cryoptop", [fields.Day5Cryoptop.visible && fields.Day5Cryoptop.required ? ew.Validators.required(fields.Day5Cryoptop.caption) : null], fields.Day5Cryoptop.isInvalid],
        ["Day1Sperm", [fields.Day1Sperm.visible && fields.Day1Sperm.required ? ew.Validators.required(fields.Day1Sperm.caption) : null], fields.Day1Sperm.isInvalid],
        ["Day1PN", [fields.Day1PN.visible && fields.Day1PN.required ? ew.Validators.required(fields.Day1PN.caption) : null], fields.Day1PN.isInvalid],
        ["Day1PB", [fields.Day1PB.visible && fields.Day1PB.required ? ew.Validators.required(fields.Day1PB.caption) : null], fields.Day1PB.isInvalid],
        ["Day1Pronucleus", [fields.Day1Pronucleus.visible && fields.Day1Pronucleus.required ? ew.Validators.required(fields.Day1Pronucleus.caption) : null], fields.Day1Pronucleus.isInvalid],
        ["Day1Nucleolus", [fields.Day1Nucleolus.visible && fields.Day1Nucleolus.required ? ew.Validators.required(fields.Day1Nucleolus.caption) : null], fields.Day1Nucleolus.isInvalid],
        ["Day1Halo", [fields.Day1Halo.visible && fields.Day1Halo.required ? ew.Validators.required(fields.Day1Halo.caption) : null], fields.Day1Halo.isInvalid],
        ["Day2SiNo", [fields.Day2SiNo.visible && fields.Day2SiNo.required ? ew.Validators.required(fields.Day2SiNo.caption) : null], fields.Day2SiNo.isInvalid],
        ["Day2CellNo", [fields.Day2CellNo.visible && fields.Day2CellNo.required ? ew.Validators.required(fields.Day2CellNo.caption) : null], fields.Day2CellNo.isInvalid],
        ["Day2Frag", [fields.Day2Frag.visible && fields.Day2Frag.required ? ew.Validators.required(fields.Day2Frag.caption) : null], fields.Day2Frag.isInvalid],
        ["Day2Symmetry", [fields.Day2Symmetry.visible && fields.Day2Symmetry.required ? ew.Validators.required(fields.Day2Symmetry.caption) : null], fields.Day2Symmetry.isInvalid],
        ["Day2Cryoptop", [fields.Day2Cryoptop.visible && fields.Day2Cryoptop.required ? ew.Validators.required(fields.Day2Cryoptop.caption) : null], fields.Day2Cryoptop.isInvalid],
        ["Day2Grade", [fields.Day2Grade.visible && fields.Day2Grade.required ? ew.Validators.required(fields.Day2Grade.caption) : null], fields.Day2Grade.isInvalid],
        ["Day2End", [fields.Day2End.visible && fields.Day2End.required ? ew.Validators.required(fields.Day2End.caption) : null], fields.Day2End.isInvalid],
        ["Day3Sino", [fields.Day3Sino.visible && fields.Day3Sino.required ? ew.Validators.required(fields.Day3Sino.caption) : null], fields.Day3Sino.isInvalid],
        ["Day3CellNo", [fields.Day3CellNo.visible && fields.Day3CellNo.required ? ew.Validators.required(fields.Day3CellNo.caption) : null], fields.Day3CellNo.isInvalid],
        ["Day3Frag", [fields.Day3Frag.visible && fields.Day3Frag.required ? ew.Validators.required(fields.Day3Frag.caption) : null], fields.Day3Frag.isInvalid],
        ["Day3Symmetry", [fields.Day3Symmetry.visible && fields.Day3Symmetry.required ? ew.Validators.required(fields.Day3Symmetry.caption) : null], fields.Day3Symmetry.isInvalid],
        ["Day3ZP", [fields.Day3ZP.visible && fields.Day3ZP.required ? ew.Validators.required(fields.Day3ZP.caption) : null], fields.Day3ZP.isInvalid],
        ["Day3Vacoules", [fields.Day3Vacoules.visible && fields.Day3Vacoules.required ? ew.Validators.required(fields.Day3Vacoules.caption) : null], fields.Day3Vacoules.isInvalid],
        ["Day3Grade", [fields.Day3Grade.visible && fields.Day3Grade.required ? ew.Validators.required(fields.Day3Grade.caption) : null], fields.Day3Grade.isInvalid],
        ["Day3Cryoptop", [fields.Day3Cryoptop.visible && fields.Day3Cryoptop.required ? ew.Validators.required(fields.Day3Cryoptop.caption) : null], fields.Day3Cryoptop.isInvalid],
        ["Day3End", [fields.Day3End.visible && fields.Day3End.required ? ew.Validators.required(fields.Day3End.caption) : null], fields.Day3End.isInvalid],
        ["Day4SiNo", [fields.Day4SiNo.visible && fields.Day4SiNo.required ? ew.Validators.required(fields.Day4SiNo.caption) : null], fields.Day4SiNo.isInvalid],
        ["Day4CellNo", [fields.Day4CellNo.visible && fields.Day4CellNo.required ? ew.Validators.required(fields.Day4CellNo.caption) : null], fields.Day4CellNo.isInvalid],
        ["Day4Frag", [fields.Day4Frag.visible && fields.Day4Frag.required ? ew.Validators.required(fields.Day4Frag.caption) : null], fields.Day4Frag.isInvalid],
        ["Day4Symmetry", [fields.Day4Symmetry.visible && fields.Day4Symmetry.required ? ew.Validators.required(fields.Day4Symmetry.caption) : null], fields.Day4Symmetry.isInvalid],
        ["Day4Grade", [fields.Day4Grade.visible && fields.Day4Grade.required ? ew.Validators.required(fields.Day4Grade.caption) : null], fields.Day4Grade.isInvalid],
        ["Day4Cryoptop", [fields.Day4Cryoptop.visible && fields.Day4Cryoptop.required ? ew.Validators.required(fields.Day4Cryoptop.caption) : null], fields.Day4Cryoptop.isInvalid],
        ["Day4End", [fields.Day4End.visible && fields.Day4End.required ? ew.Validators.required(fields.Day4End.caption) : null], fields.Day4End.isInvalid],
        ["Day5CellNo", [fields.Day5CellNo.visible && fields.Day5CellNo.required ? ew.Validators.required(fields.Day5CellNo.caption) : null], fields.Day5CellNo.isInvalid],
        ["Day5ICM", [fields.Day5ICM.visible && fields.Day5ICM.required ? ew.Validators.required(fields.Day5ICM.caption) : null], fields.Day5ICM.isInvalid],
        ["Day5TE", [fields.Day5TE.visible && fields.Day5TE.required ? ew.Validators.required(fields.Day5TE.caption) : null], fields.Day5TE.isInvalid],
        ["Day5Observation", [fields.Day5Observation.visible && fields.Day5Observation.required ? ew.Validators.required(fields.Day5Observation.caption) : null], fields.Day5Observation.isInvalid],
        ["Day5Collapsed", [fields.Day5Collapsed.visible && fields.Day5Collapsed.required ? ew.Validators.required(fields.Day5Collapsed.caption) : null], fields.Day5Collapsed.isInvalid],
        ["Day5Vacoulles", [fields.Day5Vacoulles.visible && fields.Day5Vacoulles.required ? ew.Validators.required(fields.Day5Vacoulles.caption) : null], fields.Day5Vacoulles.isInvalid],
        ["Day5Grade", [fields.Day5Grade.visible && fields.Day5Grade.required ? ew.Validators.required(fields.Day5Grade.caption) : null], fields.Day5Grade.isInvalid],
        ["Day6CellNo", [fields.Day6CellNo.visible && fields.Day6CellNo.required ? ew.Validators.required(fields.Day6CellNo.caption) : null], fields.Day6CellNo.isInvalid],
        ["Day6ICM", [fields.Day6ICM.visible && fields.Day6ICM.required ? ew.Validators.required(fields.Day6ICM.caption) : null], fields.Day6ICM.isInvalid],
        ["Day6TE", [fields.Day6TE.visible && fields.Day6TE.required ? ew.Validators.required(fields.Day6TE.caption) : null], fields.Day6TE.isInvalid],
        ["Day6Observation", [fields.Day6Observation.visible && fields.Day6Observation.required ? ew.Validators.required(fields.Day6Observation.caption) : null], fields.Day6Observation.isInvalid],
        ["Day6Collapsed", [fields.Day6Collapsed.visible && fields.Day6Collapsed.required ? ew.Validators.required(fields.Day6Collapsed.caption) : null], fields.Day6Collapsed.isInvalid],
        ["Day6Vacoulles", [fields.Day6Vacoulles.visible && fields.Day6Vacoulles.required ? ew.Validators.required(fields.Day6Vacoulles.caption) : null], fields.Day6Vacoulles.isInvalid],
        ["Day6Grade", [fields.Day6Grade.visible && fields.Day6Grade.required ? ew.Validators.required(fields.Day6Grade.caption) : null], fields.Day6Grade.isInvalid],
        ["Day6Cryoptop", [fields.Day6Cryoptop.visible && fields.Day6Cryoptop.required ? ew.Validators.required(fields.Day6Cryoptop.caption) : null], fields.Day6Cryoptop.isInvalid],
        ["EndSiNo", [fields.EndSiNo.visible && fields.EndSiNo.required ? ew.Validators.required(fields.EndSiNo.caption) : null], fields.EndSiNo.isInvalid],
        ["EndingDay", [fields.EndingDay.visible && fields.EndingDay.required ? ew.Validators.required(fields.EndingDay.caption) : null], fields.EndingDay.isInvalid],
        ["EndingCellStage", [fields.EndingCellStage.visible && fields.EndingCellStage.required ? ew.Validators.required(fields.EndingCellStage.caption) : null], fields.EndingCellStage.isInvalid],
        ["EndingGrade", [fields.EndingGrade.visible && fields.EndingGrade.required ? ew.Validators.required(fields.EndingGrade.caption) : null], fields.EndingGrade.isInvalid],
        ["EndingState", [fields.EndingState.visible && fields.EndingState.required ? ew.Validators.required(fields.EndingState.caption) : null], fields.EndingState.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["DidNO", [fields.DidNO.visible && fields.DidNO.required ? ew.Validators.required(fields.DidNO.caption) : null], fields.DidNO.isInvalid],
        ["ICSiIVFDateTime", [fields.ICSiIVFDateTime.visible && fields.ICSiIVFDateTime.required ? ew.Validators.required(fields.ICSiIVFDateTime.caption) : null, ew.Validators.datetime(0)], fields.ICSiIVFDateTime.isInvalid],
        ["PrimaryEmbrologist", [fields.PrimaryEmbrologist.visible && fields.PrimaryEmbrologist.required ? ew.Validators.required(fields.PrimaryEmbrologist.caption) : null], fields.PrimaryEmbrologist.isInvalid],
        ["SecondaryEmbrologist", [fields.SecondaryEmbrologist.visible && fields.SecondaryEmbrologist.required ? ew.Validators.required(fields.SecondaryEmbrologist.caption) : null], fields.SecondaryEmbrologist.isInvalid],
        ["Incubator", [fields.Incubator.visible && fields.Incubator.required ? ew.Validators.required(fields.Incubator.caption) : null], fields.Incubator.isInvalid],
        ["location", [fields.location.visible && fields.location.required ? ew.Validators.required(fields.location.caption) : null], fields.location.isInvalid],
        ["OocyteNo", [fields.OocyteNo.visible && fields.OocyteNo.required ? ew.Validators.required(fields.OocyteNo.caption) : null], fields.OocyteNo.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["vitrificationDate", [fields.vitrificationDate.visible && fields.vitrificationDate.required ? ew.Validators.required(fields.vitrificationDate.caption) : null, ew.Validators.datetime(0)], fields.vitrificationDate.isInvalid],
        ["vitriPrimaryEmbryologist", [fields.vitriPrimaryEmbryologist.visible && fields.vitriPrimaryEmbryologist.required ? ew.Validators.required(fields.vitriPrimaryEmbryologist.caption) : null], fields.vitriPrimaryEmbryologist.isInvalid],
        ["vitriSecondaryEmbryologist", [fields.vitriSecondaryEmbryologist.visible && fields.vitriSecondaryEmbryologist.required ? ew.Validators.required(fields.vitriSecondaryEmbryologist.caption) : null], fields.vitriSecondaryEmbryologist.isInvalid],
        ["vitriEmbryoNo", [fields.vitriEmbryoNo.visible && fields.vitriEmbryoNo.required ? ew.Validators.required(fields.vitriEmbryoNo.caption) : null], fields.vitriEmbryoNo.isInvalid],
        ["thawReFrozen", [fields.thawReFrozen.visible && fields.thawReFrozen.required ? ew.Validators.required(fields.thawReFrozen.caption) : null], fields.thawReFrozen.isInvalid],
        ["vitriFertilisationDate", [fields.vitriFertilisationDate.visible && fields.vitriFertilisationDate.required ? ew.Validators.required(fields.vitriFertilisationDate.caption) : null, ew.Validators.datetime(0)], fields.vitriFertilisationDate.isInvalid],
        ["vitriDay", [fields.vitriDay.visible && fields.vitriDay.required ? ew.Validators.required(fields.vitriDay.caption) : null], fields.vitriDay.isInvalid],
        ["vitriStage", [fields.vitriStage.visible && fields.vitriStage.required ? ew.Validators.required(fields.vitriStage.caption) : null], fields.vitriStage.isInvalid],
        ["vitriGrade", [fields.vitriGrade.visible && fields.vitriGrade.required ? ew.Validators.required(fields.vitriGrade.caption) : null], fields.vitriGrade.isInvalid],
        ["vitriIncubator", [fields.vitriIncubator.visible && fields.vitriIncubator.required ? ew.Validators.required(fields.vitriIncubator.caption) : null], fields.vitriIncubator.isInvalid],
        ["vitriTank", [fields.vitriTank.visible && fields.vitriTank.required ? ew.Validators.required(fields.vitriTank.caption) : null], fields.vitriTank.isInvalid],
        ["vitriCanister", [fields.vitriCanister.visible && fields.vitriCanister.required ? ew.Validators.required(fields.vitriCanister.caption) : null], fields.vitriCanister.isInvalid],
        ["vitriGobiet", [fields.vitriGobiet.visible && fields.vitriGobiet.required ? ew.Validators.required(fields.vitriGobiet.caption) : null], fields.vitriGobiet.isInvalid],
        ["vitriViscotube", [fields.vitriViscotube.visible && fields.vitriViscotube.required ? ew.Validators.required(fields.vitriViscotube.caption) : null], fields.vitriViscotube.isInvalid],
        ["vitriCryolockNo", [fields.vitriCryolockNo.visible && fields.vitriCryolockNo.required ? ew.Validators.required(fields.vitriCryolockNo.caption) : null], fields.vitriCryolockNo.isInvalid],
        ["vitriCryolockColour", [fields.vitriCryolockColour.visible && fields.vitriCryolockColour.required ? ew.Validators.required(fields.vitriCryolockColour.caption) : null], fields.vitriCryolockColour.isInvalid],
        ["thawDate", [fields.thawDate.visible && fields.thawDate.required ? ew.Validators.required(fields.thawDate.caption) : null, ew.Validators.datetime(0)], fields.thawDate.isInvalid],
        ["thawPrimaryEmbryologist", [fields.thawPrimaryEmbryologist.visible && fields.thawPrimaryEmbryologist.required ? ew.Validators.required(fields.thawPrimaryEmbryologist.caption) : null], fields.thawPrimaryEmbryologist.isInvalid],
        ["thawSecondaryEmbryologist", [fields.thawSecondaryEmbryologist.visible && fields.thawSecondaryEmbryologist.required ? ew.Validators.required(fields.thawSecondaryEmbryologist.caption) : null], fields.thawSecondaryEmbryologist.isInvalid],
        ["thawET", [fields.thawET.visible && fields.thawET.required ? ew.Validators.required(fields.thawET.caption) : null], fields.thawET.isInvalid],
        ["thawAbserve", [fields.thawAbserve.visible && fields.thawAbserve.required ? ew.Validators.required(fields.thawAbserve.caption) : null], fields.thawAbserve.isInvalid],
        ["thawDiscard", [fields.thawDiscard.visible && fields.thawDiscard.required ? ew.Validators.required(fields.thawDiscard.caption) : null], fields.thawDiscard.isInvalid],
        ["ETCatheter", [fields.ETCatheter.visible && fields.ETCatheter.required ? ew.Validators.required(fields.ETCatheter.caption) : null], fields.ETCatheter.isInvalid],
        ["ETDifficulty", [fields.ETDifficulty.visible && fields.ETDifficulty.required ? ew.Validators.required(fields.ETDifficulty.caption) : null], fields.ETDifficulty.isInvalid],
        ["ETEasy", [fields.ETEasy.visible && fields.ETEasy.required ? ew.Validators.required(fields.ETEasy.caption) : null], fields.ETEasy.isInvalid],
        ["ETComments", [fields.ETComments.visible && fields.ETComments.required ? ew.Validators.required(fields.ETComments.caption) : null], fields.ETComments.isInvalid],
        ["ETDoctor", [fields.ETDoctor.visible && fields.ETDoctor.required ? ew.Validators.required(fields.ETDoctor.caption) : null], fields.ETDoctor.isInvalid],
        ["ETEmbryologist", [fields.ETEmbryologist.visible && fields.ETEmbryologist.required ? ew.Validators.required(fields.ETEmbryologist.caption) : null], fields.ETEmbryologist.isInvalid],
        ["ETDate", [fields.ETDate.visible && fields.ETDate.required ? ew.Validators.required(fields.ETDate.caption) : null, ew.Validators.datetime(0)], fields.ETDate.isInvalid],
        ["Day1End", [fields.Day1End.visible && fields.Day1End.required ? ew.Validators.required(fields.Day1End.caption) : null], fields.Day1End.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_embryology_chartadd,
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
    fivf_embryology_chartadd.validate = function () {
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
    fivf_embryology_chartadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_embryology_chartadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_embryology_chartadd.lists.Day0PolarBodyPosition = <?= $Page->Day0PolarBodyPosition->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day0Breakage = <?= $Page->Day0Breakage->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day0Attempts = <?= $Page->Day0Attempts->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day0SPZMorpho = <?= $Page->Day0SPZMorpho->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day0SPZLocation = <?= $Page->Day0SPZLocation->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day0SpOrgin = <?= $Page->Day0SpOrgin->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day5Cryoptop = <?= $Page->Day5Cryoptop->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day1PN = <?= $Page->Day1PN->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day1PB = <?= $Page->Day1PB->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day1Pronucleus = <?= $Page->Day1Pronucleus->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day1Nucleolus = <?= $Page->Day1Nucleolus->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day1Halo = <?= $Page->Day1Halo->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day2End = <?= $Page->Day2End->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day3Frag = <?= $Page->Day3Frag->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day3Symmetry = <?= $Page->Day3Symmetry->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day3ZP = <?= $Page->Day3ZP->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day3Vacoules = <?= $Page->Day3Vacoules->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day3Grade = <?= $Page->Day3Grade->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day3Cryoptop = <?= $Page->Day3Cryoptop->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day3End = <?= $Page->Day3End->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day4Cryoptop = <?= $Page->Day4Cryoptop->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day4End = <?= $Page->Day4End->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day5ICM = <?= $Page->Day5ICM->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day5TE = <?= $Page->Day5TE->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day5Observation = <?= $Page->Day5Observation->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day5Collapsed = <?= $Page->Day5Collapsed->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day5Vacoulles = <?= $Page->Day5Vacoulles->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day5Grade = <?= $Page->Day5Grade->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day6ICM = <?= $Page->Day6ICM->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day6TE = <?= $Page->Day6TE->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day6Observation = <?= $Page->Day6Observation->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day6Collapsed = <?= $Page->Day6Collapsed->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day6Vacoulles = <?= $Page->Day6Vacoulles->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day6Grade = <?= $Page->Day6Grade->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.EndingDay = <?= $Page->EndingDay->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.EndingGrade = <?= $Page->EndingGrade->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.EndingState = <?= $Page->EndingState->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Stage = <?= $Page->Stage->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.thawReFrozen = <?= $Page->thawReFrozen->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.vitriDay = <?= $Page->vitriDay->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.vitriGrade = <?= $Page->vitriGrade->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.thawET = <?= $Page->thawET->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.ETDifficulty = <?= $Page->ETDifficulty->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.ETEasy = <?= $Page->ETEasy->toClientList($Page) ?>;
    fivf_embryology_chartadd.lists.Day1End = <?= $Page->Day1End->toClientList($Page) ?>;
    loadjs.done("fivf_embryology_chartadd");
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
<form name="fivf_embryology_chartadd" id="fivf_embryology_chartadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?= HtmlEncode($Page->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?= HtmlEncode($Page->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->TidNo->getSessionValue()) ?>">
<?php } ?>
<?php if ($Page->getCurrentMasterTable() == "ivf_oocytedenudation") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ivf_oocytedenudation">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->DidNO->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<?php if ($Page->RIDNo->getSessionValue() != "") { ?>
<span id="el_ivf_embryology_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNo->getDisplayValue($Page->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_RIDNo" name="x_RIDNo" value="<?= HtmlEncode($Page->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_ivf_embryology_chart_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="4" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_embryology_chart_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<?php if ($Page->Name->getSessionValue() != "") { ?>
<span id="el_ivf_embryology_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Name->getDisplayValue($Page->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_Name" name="x_Name" value="<?= HtmlEncode($Page->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_ivf_embryology_chart_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Name" name="x_Name" id="x_Name" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <div id="r_ARTCycle" class="form-group row">
        <label id="elh_ivf_embryology_chart_ARTCycle" for="x_ARTCycle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ARTCycle->caption() ?><?= $Page->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ARTCycle">
<input type="<?= $Page->ARTCycle->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x_ARTCycle" id="x_ARTCycle" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>" value="<?= $Page->ARTCycle->EditValue ?>"<?= $Page->ARTCycle->editAttributes() ?> aria-describedby="x_ARTCycle_help">
<?= $Page->ARTCycle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
    <div id="r_SpermOrigin" class="form-group row">
        <label id="elh_ivf_embryology_chart_SpermOrigin" for="x_SpermOrigin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SpermOrigin->caption() ?><?= $Page->SpermOrigin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SpermOrigin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SpermOrigin">
<input type="<?= $Page->SpermOrigin->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x_SpermOrigin" id="x_SpermOrigin" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SpermOrigin->getPlaceHolder()) ?>" value="<?= $Page->SpermOrigin->EditValue ?>"<?= $Page->SpermOrigin->editAttributes() ?> aria-describedby="x_SpermOrigin_help">
<?= $Page->SpermOrigin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SpermOrigin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <div id="r_InseminatinTechnique" class="form-group row">
        <label id="elh_ivf_embryology_chart_InseminatinTechnique" for="x_InseminatinTechnique" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InseminatinTechnique->caption() ?><?= $Page->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_InseminatinTechnique">
<input type="<?= $Page->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x_InseminatinTechnique" id="x_InseminatinTechnique" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Page->InseminatinTechnique->EditValue ?>"<?= $Page->InseminatinTechnique->editAttributes() ?> aria-describedby="x_InseminatinTechnique_help">
<?= $Page->InseminatinTechnique->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InseminatinTechnique->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <div id="r_IndicationForART" class="form-group row">
        <label id="elh_ivf_embryology_chart_IndicationForART" for="x_IndicationForART" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IndicationForART->caption() ?><?= $Page->IndicationForART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_IndicationForART">
<input type="<?= $Page->IndicationForART->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x_IndicationForART" id="x_IndicationForART" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->IndicationForART->getPlaceHolder()) ?>" value="<?= $Page->IndicationForART->EditValue ?>"<?= $Page->IndicationForART->editAttributes() ?> aria-describedby="x_IndicationForART_help">
<?= $Page->IndicationForART->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IndicationForART->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
    <div id="r_Day0sino" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day0sino" for="x_Day0sino" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day0sino->caption() ?><?= $Page->Day0sino->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day0sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0sino">
<input type="<?= $Page->Day0sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x_Day0sino" id="x_Day0sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0sino->getPlaceHolder()) ?>" value="<?= $Page->Day0sino->EditValue ?>"<?= $Page->Day0sino->editAttributes() ?> aria-describedby="x_Day0sino_help">
<?= $Page->Day0sino->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day0sino->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
    <div id="r_Day0OocyteStage" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day0OocyteStage" for="x_Day0OocyteStage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day0OocyteStage->caption() ?><?= $Page->Day0OocyteStage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day0OocyteStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0OocyteStage">
<input type="<?= $Page->Day0OocyteStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x_Day0OocyteStage" id="x_Day0OocyteStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Page->Day0OocyteStage->EditValue ?>"<?= $Page->Day0OocyteStage->editAttributes() ?> aria-describedby="x_Day0OocyteStage_help">
<?= $Page->Day0OocyteStage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day0OocyteStage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
    <div id="r_Day0PolarBodyPosition" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day0PolarBodyPosition" for="x_Day0PolarBodyPosition" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day0PolarBodyPosition->caption() ?><?= $Page->Day0PolarBodyPosition->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day0PolarBodyPosition->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0PolarBodyPosition">
    <select
        id="x_Day0PolarBodyPosition"
        name="x_Day0PolarBodyPosition"
        class="form-control ew-select<?= $Page->Day0PolarBodyPosition->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day0PolarBodyPosition"
        data-table="ivf_embryology_chart"
        data-field="x_Day0PolarBodyPosition"
        data-value-separator="<?= $Page->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0PolarBodyPosition->getPlaceHolder()) ?>"
        <?= $Page->Day0PolarBodyPosition->editAttributes() ?>>
        <?= $Page->Day0PolarBodyPosition->selectOptionListHtml("x_Day0PolarBodyPosition") ?>
    </select>
    <?= $Page->Day0PolarBodyPosition->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day0PolarBodyPosition->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day0PolarBodyPosition']"),
        options = { name: "x_Day0PolarBodyPosition", selectId: "ivf_embryology_chart_x_Day0PolarBodyPosition", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
    <div id="r_Day0Breakage" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day0Breakage" for="x_Day0Breakage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day0Breakage->caption() ?><?= $Page->Day0Breakage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day0Breakage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Breakage">
    <select
        id="x_Day0Breakage"
        name="x_Day0Breakage"
        class="form-control ew-select<?= $Page->Day0Breakage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day0Breakage"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Breakage"
        data-value-separator="<?= $Page->Day0Breakage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0Breakage->getPlaceHolder()) ?>"
        <?= $Page->Day0Breakage->editAttributes() ?>>
        <?= $Page->Day0Breakage->selectOptionListHtml("x_Day0Breakage") ?>
    </select>
    <?= $Page->Day0Breakage->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day0Breakage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day0Breakage']"),
        options = { name: "x_Day0Breakage", selectId: "ivf_embryology_chart_x_Day0Breakage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
    <div id="r_Day0Attempts" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day0Attempts" for="x_Day0Attempts" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day0Attempts->caption() ?><?= $Page->Day0Attempts->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day0Attempts->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Attempts">
    <select
        id="x_Day0Attempts"
        name="x_Day0Attempts"
        class="form-control ew-select<?= $Page->Day0Attempts->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day0Attempts"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Attempts"
        data-value-separator="<?= $Page->Day0Attempts->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0Attempts->getPlaceHolder()) ?>"
        <?= $Page->Day0Attempts->editAttributes() ?>>
        <?= $Page->Day0Attempts->selectOptionListHtml("x_Day0Attempts") ?>
    </select>
    <?= $Page->Day0Attempts->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day0Attempts->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day0Attempts']"),
        options = { name: "x_Day0Attempts", selectId: "ivf_embryology_chart_x_Day0Attempts", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
    <div id="r_Day0SPZMorpho" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day0SPZMorpho" for="x_Day0SPZMorpho" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day0SPZMorpho->caption() ?><?= $Page->Day0SPZMorpho->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day0SPZMorpho->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZMorpho">
    <select
        id="x_Day0SPZMorpho"
        name="x_Day0SPZMorpho"
        class="form-control ew-select<?= $Page->Day0SPZMorpho->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day0SPZMorpho"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZMorpho"
        data-value-separator="<?= $Page->Day0SPZMorpho->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SPZMorpho->getPlaceHolder()) ?>"
        <?= $Page->Day0SPZMorpho->editAttributes() ?>>
        <?= $Page->Day0SPZMorpho->selectOptionListHtml("x_Day0SPZMorpho") ?>
    </select>
    <?= $Page->Day0SPZMorpho->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day0SPZMorpho->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day0SPZMorpho']"),
        options = { name: "x_Day0SPZMorpho", selectId: "ivf_embryology_chart_x_Day0SPZMorpho", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
    <div id="r_Day0SPZLocation" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day0SPZLocation" for="x_Day0SPZLocation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day0SPZLocation->caption() ?><?= $Page->Day0SPZLocation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day0SPZLocation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZLocation">
    <select
        id="x_Day0SPZLocation"
        name="x_Day0SPZLocation"
        class="form-control ew-select<?= $Page->Day0SPZLocation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day0SPZLocation"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZLocation"
        data-value-separator="<?= $Page->Day0SPZLocation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SPZLocation->getPlaceHolder()) ?>"
        <?= $Page->Day0SPZLocation->editAttributes() ?>>
        <?= $Page->Day0SPZLocation->selectOptionListHtml("x_Day0SPZLocation") ?>
    </select>
    <?= $Page->Day0SPZLocation->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day0SPZLocation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day0SPZLocation']"),
        options = { name: "x_Day0SPZLocation", selectId: "ivf_embryology_chart_x_Day0SPZLocation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
    <div id="r_Day0SpOrgin" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day0SpOrgin" for="x_Day0SpOrgin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day0SpOrgin->caption() ?><?= $Page->Day0SpOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day0SpOrgin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SpOrgin">
    <select
        id="x_Day0SpOrgin"
        name="x_Day0SpOrgin"
        class="form-control ew-select<?= $Page->Day0SpOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day0SpOrgin"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SpOrgin"
        data-value-separator="<?= $Page->Day0SpOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SpOrgin->getPlaceHolder()) ?>"
        <?= $Page->Day0SpOrgin->editAttributes() ?>>
        <?= $Page->Day0SpOrgin->selectOptionListHtml("x_Day0SpOrgin") ?>
    </select>
    <?= $Page->Day0SpOrgin->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day0SpOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day0SpOrgin']"),
        options = { name: "x_Day0SpOrgin", selectId: "ivf_embryology_chart_x_Day0SpOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
    <div id="r_Day5Cryoptop" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day5Cryoptop" for="x_Day5Cryoptop" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day5Cryoptop->caption() ?><?= $Page->Day5Cryoptop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day5Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Cryoptop">
    <select
        id="x_Day5Cryoptop"
        name="x_Day5Cryoptop"
        class="form-control ew-select<?= $Page->Day5Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day5Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Cryoptop"
        data-value-separator="<?= $Page->Day5Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day5Cryoptop->editAttributes() ?>>
        <?= $Page->Day5Cryoptop->selectOptionListHtml("x_Day5Cryoptop") ?>
    </select>
    <?= $Page->Day5Cryoptop->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day5Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day5Cryoptop']"),
        options = { name: "x_Day5Cryoptop", selectId: "ivf_embryology_chart_x_Day5Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
    <div id="r_Day1Sperm" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day1Sperm" for="x_Day1Sperm" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day1Sperm->caption() ?><?= $Page->Day1Sperm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day1Sperm->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Sperm">
<input type="<?= $Page->Day1Sperm->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x_Day1Sperm" id="x_Day1Sperm" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day1Sperm->getPlaceHolder()) ?>" value="<?= $Page->Day1Sperm->EditValue ?>"<?= $Page->Day1Sperm->editAttributes() ?> aria-describedby="x_Day1Sperm_help">
<?= $Page->Day1Sperm->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day1Sperm->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day1PN->Visible) { // Day1PN ?>
    <div id="r_Day1PN" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day1PN" for="x_Day1PN" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day1PN->caption() ?><?= $Page->Day1PN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day1PN->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PN">
    <select
        id="x_Day1PN"
        name="x_Day1PN"
        class="form-control ew-select<?= $Page->Day1PN->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day1PN"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PN"
        data-value-separator="<?= $Page->Day1PN->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1PN->getPlaceHolder()) ?>"
        <?= $Page->Day1PN->editAttributes() ?>>
        <?= $Page->Day1PN->selectOptionListHtml("x_Day1PN") ?>
    </select>
    <?= $Page->Day1PN->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day1PN->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day1PN']"),
        options = { name: "x_Day1PN", selectId: "ivf_embryology_chart_x_Day1PN", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PN.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PN.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day1PB->Visible) { // Day1PB ?>
    <div id="r_Day1PB" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day1PB" for="x_Day1PB" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day1PB->caption() ?><?= $Page->Day1PB->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day1PB->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PB">
    <select
        id="x_Day1PB"
        name="x_Day1PB"
        class="form-control ew-select<?= $Page->Day1PB->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day1PB"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PB"
        data-value-separator="<?= $Page->Day1PB->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1PB->getPlaceHolder()) ?>"
        <?= $Page->Day1PB->editAttributes() ?>>
        <?= $Page->Day1PB->selectOptionListHtml("x_Day1PB") ?>
    </select>
    <?= $Page->Day1PB->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day1PB->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day1PB']"),
        options = { name: "x_Day1PB", selectId: "ivf_embryology_chart_x_Day1PB", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PB.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PB.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
    <div id="r_Day1Pronucleus" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day1Pronucleus" for="x_Day1Pronucleus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day1Pronucleus->caption() ?><?= $Page->Day1Pronucleus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day1Pronucleus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Pronucleus">
    <select
        id="x_Day1Pronucleus"
        name="x_Day1Pronucleus"
        class="form-control ew-select<?= $Page->Day1Pronucleus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day1Pronucleus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Pronucleus"
        data-value-separator="<?= $Page->Day1Pronucleus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Pronucleus->getPlaceHolder()) ?>"
        <?= $Page->Day1Pronucleus->editAttributes() ?>>
        <?= $Page->Day1Pronucleus->selectOptionListHtml("x_Day1Pronucleus") ?>
    </select>
    <?= $Page->Day1Pronucleus->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day1Pronucleus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day1Pronucleus']"),
        options = { name: "x_Day1Pronucleus", selectId: "ivf_embryology_chart_x_Day1Pronucleus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
    <div id="r_Day1Nucleolus" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day1Nucleolus" for="x_Day1Nucleolus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day1Nucleolus->caption() ?><?= $Page->Day1Nucleolus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day1Nucleolus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Nucleolus">
    <select
        id="x_Day1Nucleolus"
        name="x_Day1Nucleolus"
        class="form-control ew-select<?= $Page->Day1Nucleolus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day1Nucleolus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Nucleolus"
        data-value-separator="<?= $Page->Day1Nucleolus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Nucleolus->getPlaceHolder()) ?>"
        <?= $Page->Day1Nucleolus->editAttributes() ?>>
        <?= $Page->Day1Nucleolus->selectOptionListHtml("x_Day1Nucleolus") ?>
    </select>
    <?= $Page->Day1Nucleolus->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day1Nucleolus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day1Nucleolus']"),
        options = { name: "x_Day1Nucleolus", selectId: "ivf_embryology_chart_x_Day1Nucleolus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
    <div id="r_Day1Halo" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day1Halo" for="x_Day1Halo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day1Halo->caption() ?><?= $Page->Day1Halo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day1Halo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Halo">
    <select
        id="x_Day1Halo"
        name="x_Day1Halo"
        class="form-control ew-select<?= $Page->Day1Halo->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day1Halo"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Halo"
        data-value-separator="<?= $Page->Day1Halo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Halo->getPlaceHolder()) ?>"
        <?= $Page->Day1Halo->editAttributes() ?>>
        <?= $Page->Day1Halo->selectOptionListHtml("x_Day1Halo") ?>
    </select>
    <?= $Page->Day1Halo->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day1Halo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day1Halo']"),
        options = { name: "x_Day1Halo", selectId: "ivf_embryology_chart_x_Day1Halo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
    <div id="r_Day2SiNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day2SiNo" for="x_Day2SiNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day2SiNo->caption() ?><?= $Page->Day2SiNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day2SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2SiNo">
<input type="<?= $Page->Day2SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x_Day2SiNo" id="x_Day2SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2SiNo->getPlaceHolder()) ?>" value="<?= $Page->Day2SiNo->EditValue ?>"<?= $Page->Day2SiNo->editAttributes() ?> aria-describedby="x_Day2SiNo_help">
<?= $Page->Day2SiNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day2SiNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
    <div id="r_Day2CellNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day2CellNo" for="x_Day2CellNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day2CellNo->caption() ?><?= $Page->Day2CellNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day2CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2CellNo">
<input type="<?= $Page->Day2CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x_Day2CellNo" id="x_Day2CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day2CellNo->EditValue ?>"<?= $Page->Day2CellNo->editAttributes() ?> aria-describedby="x_Day2CellNo_help">
<?= $Page->Day2CellNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day2CellNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
    <div id="r_Day2Frag" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day2Frag" for="x_Day2Frag" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day2Frag->caption() ?><?= $Page->Day2Frag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day2Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Frag">
<input type="<?= $Page->Day2Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x_Day2Frag" id="x_Day2Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Frag->getPlaceHolder()) ?>" value="<?= $Page->Day2Frag->EditValue ?>"<?= $Page->Day2Frag->editAttributes() ?> aria-describedby="x_Day2Frag_help">
<?= $Page->Day2Frag->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day2Frag->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
    <div id="r_Day2Symmetry" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day2Symmetry" for="x_Day2Symmetry" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day2Symmetry->caption() ?><?= $Page->Day2Symmetry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day2Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Symmetry">
<input type="<?= $Page->Day2Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x_Day2Symmetry" id="x_Day2Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Symmetry->getPlaceHolder()) ?>" value="<?= $Page->Day2Symmetry->EditValue ?>"<?= $Page->Day2Symmetry->editAttributes() ?> aria-describedby="x_Day2Symmetry_help">
<?= $Page->Day2Symmetry->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day2Symmetry->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
    <div id="r_Day2Cryoptop" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day2Cryoptop" for="x_Day2Cryoptop" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day2Cryoptop->caption() ?><?= $Page->Day2Cryoptop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day2Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Cryoptop">
<input type="<?= $Page->Day2Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x_Day2Cryoptop" id="x_Day2Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Cryoptop->getPlaceHolder()) ?>" value="<?= $Page->Day2Cryoptop->EditValue ?>"<?= $Page->Day2Cryoptop->editAttributes() ?> aria-describedby="x_Day2Cryoptop_help">
<?= $Page->Day2Cryoptop->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day2Cryoptop->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
    <div id="r_Day2Grade" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day2Grade" for="x_Day2Grade" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day2Grade->caption() ?><?= $Page->Day2Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day2Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Grade">
<input type="<?= $Page->Day2Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x_Day2Grade" id="x_Day2Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Grade->getPlaceHolder()) ?>" value="<?= $Page->Day2Grade->EditValue ?>"<?= $Page->Day2Grade->editAttributes() ?> aria-describedby="x_Day2Grade_help">
<?= $Page->Day2Grade->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day2Grade->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day2End->Visible) { // Day2End ?>
    <div id="r_Day2End" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day2End" for="x_Day2End" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day2End->caption() ?><?= $Page->Day2End->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day2End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2End">
    <select
        id="x_Day2End"
        name="x_Day2End"
        class="form-control ew-select<?= $Page->Day2End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day2End"
        data-table="ivf_embryology_chart"
        data-field="x_Day2End"
        data-value-separator="<?= $Page->Day2End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day2End->getPlaceHolder()) ?>"
        <?= $Page->Day2End->editAttributes() ?>>
        <?= $Page->Day2End->selectOptionListHtml("x_Day2End") ?>
    </select>
    <?= $Page->Day2End->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day2End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day2End']"),
        options = { name: "x_Day2End", selectId: "ivf_embryology_chart_x_Day2End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day2End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day2End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
    <div id="r_Day3Sino" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day3Sino" for="x_Day3Sino" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day3Sino->caption() ?><?= $Page->Day3Sino->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3Sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Sino">
<input type="<?= $Page->Day3Sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x_Day3Sino" id="x_Day3Sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3Sino->getPlaceHolder()) ?>" value="<?= $Page->Day3Sino->EditValue ?>"<?= $Page->Day3Sino->editAttributes() ?> aria-describedby="x_Day3Sino_help">
<?= $Page->Day3Sino->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day3Sino->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
    <div id="r_Day3CellNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day3CellNo" for="x_Day3CellNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day3CellNo->caption() ?><?= $Page->Day3CellNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3CellNo">
<input type="<?= $Page->Day3CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x_Day3CellNo" id="x_Day3CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day3CellNo->EditValue ?>"<?= $Page->Day3CellNo->editAttributes() ?> aria-describedby="x_Day3CellNo_help">
<?= $Page->Day3CellNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day3CellNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
    <div id="r_Day3Frag" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day3Frag" for="x_Day3Frag" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day3Frag->caption() ?><?= $Page->Day3Frag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Frag">
    <select
        id="x_Day3Frag"
        name="x_Day3Frag"
        class="form-control ew-select<?= $Page->Day3Frag->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day3Frag"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Frag"
        data-value-separator="<?= $Page->Day3Frag->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Frag->getPlaceHolder()) ?>"
        <?= $Page->Day3Frag->editAttributes() ?>>
        <?= $Page->Day3Frag->selectOptionListHtml("x_Day3Frag") ?>
    </select>
    <?= $Page->Day3Frag->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day3Frag->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day3Frag']"),
        options = { name: "x_Day3Frag", selectId: "ivf_embryology_chart_x_Day3Frag", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
    <div id="r_Day3Symmetry" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day3Symmetry" for="x_Day3Symmetry" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day3Symmetry->caption() ?><?= $Page->Day3Symmetry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Symmetry">
    <select
        id="x_Day3Symmetry"
        name="x_Day3Symmetry"
        class="form-control ew-select<?= $Page->Day3Symmetry->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day3Symmetry"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Symmetry"
        data-value-separator="<?= $Page->Day3Symmetry->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Symmetry->getPlaceHolder()) ?>"
        <?= $Page->Day3Symmetry->editAttributes() ?>>
        <?= $Page->Day3Symmetry->selectOptionListHtml("x_Day3Symmetry") ?>
    </select>
    <?= $Page->Day3Symmetry->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day3Symmetry->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day3Symmetry']"),
        options = { name: "x_Day3Symmetry", selectId: "ivf_embryology_chart_x_Day3Symmetry", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
    <div id="r_Day3ZP" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day3ZP" for="x_Day3ZP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day3ZP->caption() ?><?= $Page->Day3ZP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3ZP->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3ZP">
    <select
        id="x_Day3ZP"
        name="x_Day3ZP"
        class="form-control ew-select<?= $Page->Day3ZP->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day3ZP"
        data-table="ivf_embryology_chart"
        data-field="x_Day3ZP"
        data-value-separator="<?= $Page->Day3ZP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3ZP->getPlaceHolder()) ?>"
        <?= $Page->Day3ZP->editAttributes() ?>>
        <?= $Page->Day3ZP->selectOptionListHtml("x_Day3ZP") ?>
    </select>
    <?= $Page->Day3ZP->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day3ZP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day3ZP']"),
        options = { name: "x_Day3ZP", selectId: "ivf_embryology_chart_x_Day3ZP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
    <div id="r_Day3Vacoules" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day3Vacoules" for="x_Day3Vacoules" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day3Vacoules->caption() ?><?= $Page->Day3Vacoules->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3Vacoules->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Vacoules">
    <select
        id="x_Day3Vacoules"
        name="x_Day3Vacoules"
        class="form-control ew-select<?= $Page->Day3Vacoules->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day3Vacoules"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Vacoules"
        data-value-separator="<?= $Page->Day3Vacoules->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Vacoules->getPlaceHolder()) ?>"
        <?= $Page->Day3Vacoules->editAttributes() ?>>
        <?= $Page->Day3Vacoules->selectOptionListHtml("x_Day3Vacoules") ?>
    </select>
    <?= $Page->Day3Vacoules->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day3Vacoules->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day3Vacoules']"),
        options = { name: "x_Day3Vacoules", selectId: "ivf_embryology_chart_x_Day3Vacoules", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
    <div id="r_Day3Grade" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day3Grade" for="x_Day3Grade" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day3Grade->caption() ?><?= $Page->Day3Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Grade">
    <select
        id="x_Day3Grade"
        name="x_Day3Grade"
        class="form-control ew-select<?= $Page->Day3Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day3Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Grade"
        data-value-separator="<?= $Page->Day3Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Grade->getPlaceHolder()) ?>"
        <?= $Page->Day3Grade->editAttributes() ?>>
        <?= $Page->Day3Grade->selectOptionListHtml("x_Day3Grade") ?>
    </select>
    <?= $Page->Day3Grade->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day3Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day3Grade']"),
        options = { name: "x_Day3Grade", selectId: "ivf_embryology_chart_x_Day3Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
    <div id="r_Day3Cryoptop" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day3Cryoptop" for="x_Day3Cryoptop" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day3Cryoptop->caption() ?><?= $Page->Day3Cryoptop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Cryoptop">
    <select
        id="x_Day3Cryoptop"
        name="x_Day3Cryoptop"
        class="form-control ew-select<?= $Page->Day3Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day3Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Cryoptop"
        data-value-separator="<?= $Page->Day3Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day3Cryoptop->editAttributes() ?>>
        <?= $Page->Day3Cryoptop->selectOptionListHtml("x_Day3Cryoptop") ?>
    </select>
    <?= $Page->Day3Cryoptop->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day3Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day3Cryoptop']"),
        options = { name: "x_Day3Cryoptop", selectId: "ivf_embryology_chart_x_Day3Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3End->Visible) { // Day3End ?>
    <div id="r_Day3End" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day3End" for="x_Day3End" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day3End->caption() ?><?= $Page->Day3End->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3End">
    <select
        id="x_Day3End"
        name="x_Day3End"
        class="form-control ew-select<?= $Page->Day3End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day3End"
        data-table="ivf_embryology_chart"
        data-field="x_Day3End"
        data-value-separator="<?= $Page->Day3End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3End->getPlaceHolder()) ?>"
        <?= $Page->Day3End->editAttributes() ?>>
        <?= $Page->Day3End->selectOptionListHtml("x_Day3End") ?>
    </select>
    <?= $Page->Day3End->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day3End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day3End']"),
        options = { name: "x_Day3End", selectId: "ivf_embryology_chart_x_Day3End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
    <div id="r_Day4SiNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day4SiNo" for="x_Day4SiNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day4SiNo->caption() ?><?= $Page->Day4SiNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day4SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4SiNo">
<input type="<?= $Page->Day4SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x_Day4SiNo" id="x_Day4SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4SiNo->getPlaceHolder()) ?>" value="<?= $Page->Day4SiNo->EditValue ?>"<?= $Page->Day4SiNo->editAttributes() ?> aria-describedby="x_Day4SiNo_help">
<?= $Page->Day4SiNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day4SiNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
    <div id="r_Day4CellNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day4CellNo" for="x_Day4CellNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day4CellNo->caption() ?><?= $Page->Day4CellNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day4CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4CellNo">
<input type="<?= $Page->Day4CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x_Day4CellNo" id="x_Day4CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day4CellNo->EditValue ?>"<?= $Page->Day4CellNo->editAttributes() ?> aria-describedby="x_Day4CellNo_help">
<?= $Page->Day4CellNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day4CellNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
    <div id="r_Day4Frag" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day4Frag" for="x_Day4Frag" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day4Frag->caption() ?><?= $Page->Day4Frag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day4Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Frag">
<input type="<?= $Page->Day4Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x_Day4Frag" id="x_Day4Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Frag->getPlaceHolder()) ?>" value="<?= $Page->Day4Frag->EditValue ?>"<?= $Page->Day4Frag->editAttributes() ?> aria-describedby="x_Day4Frag_help">
<?= $Page->Day4Frag->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day4Frag->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
    <div id="r_Day4Symmetry" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day4Symmetry" for="x_Day4Symmetry" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day4Symmetry->caption() ?><?= $Page->Day4Symmetry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day4Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Symmetry">
<input type="<?= $Page->Day4Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x_Day4Symmetry" id="x_Day4Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Symmetry->getPlaceHolder()) ?>" value="<?= $Page->Day4Symmetry->EditValue ?>"<?= $Page->Day4Symmetry->editAttributes() ?> aria-describedby="x_Day4Symmetry_help">
<?= $Page->Day4Symmetry->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day4Symmetry->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
    <div id="r_Day4Grade" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day4Grade" for="x_Day4Grade" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day4Grade->caption() ?><?= $Page->Day4Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day4Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Grade">
<input type="<?= $Page->Day4Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x_Day4Grade" id="x_Day4Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Grade->getPlaceHolder()) ?>" value="<?= $Page->Day4Grade->EditValue ?>"<?= $Page->Day4Grade->editAttributes() ?> aria-describedby="x_Day4Grade_help">
<?= $Page->Day4Grade->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day4Grade->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
    <div id="r_Day4Cryoptop" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day4Cryoptop" for="x_Day4Cryoptop" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day4Cryoptop->caption() ?><?= $Page->Day4Cryoptop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day4Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Cryoptop">
    <select
        id="x_Day4Cryoptop"
        name="x_Day4Cryoptop"
        class="form-control ew-select<?= $Page->Day4Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day4Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day4Cryoptop"
        data-value-separator="<?= $Page->Day4Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day4Cryoptop->editAttributes() ?>>
        <?= $Page->Day4Cryoptop->selectOptionListHtml("x_Day4Cryoptop") ?>
    </select>
    <?= $Page->Day4Cryoptop->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day4Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day4Cryoptop']"),
        options = { name: "x_Day4Cryoptop", selectId: "ivf_embryology_chart_x_Day4Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day4End->Visible) { // Day4End ?>
    <div id="r_Day4End" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day4End" for="x_Day4End" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day4End->caption() ?><?= $Page->Day4End->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day4End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4End">
    <select
        id="x_Day4End"
        name="x_Day4End"
        class="form-control ew-select<?= $Page->Day4End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day4End"
        data-table="ivf_embryology_chart"
        data-field="x_Day4End"
        data-value-separator="<?= $Page->Day4End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4End->getPlaceHolder()) ?>"
        <?= $Page->Day4End->editAttributes() ?>>
        <?= $Page->Day4End->selectOptionListHtml("x_Day4End") ?>
    </select>
    <?= $Page->Day4End->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day4End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day4End']"),
        options = { name: "x_Day4End", selectId: "ivf_embryology_chart_x_Day4End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
    <div id="r_Day5CellNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day5CellNo" for="x_Day5CellNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day5CellNo->caption() ?><?= $Page->Day5CellNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day5CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5CellNo">
<input type="<?= $Page->Day5CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x_Day5CellNo" id="x_Day5CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day5CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day5CellNo->EditValue ?>"<?= $Page->Day5CellNo->editAttributes() ?> aria-describedby="x_Day5CellNo_help">
<?= $Page->Day5CellNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day5CellNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
    <div id="r_Day5ICM" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day5ICM" for="x_Day5ICM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day5ICM->caption() ?><?= $Page->Day5ICM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day5ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5ICM">
    <select
        id="x_Day5ICM"
        name="x_Day5ICM"
        class="form-control ew-select<?= $Page->Day5ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day5ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day5ICM"
        data-value-separator="<?= $Page->Day5ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5ICM->getPlaceHolder()) ?>"
        <?= $Page->Day5ICM->editAttributes() ?>>
        <?= $Page->Day5ICM->selectOptionListHtml("x_Day5ICM") ?>
    </select>
    <?= $Page->Day5ICM->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day5ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day5ICM']"),
        options = { name: "x_Day5ICM", selectId: "ivf_embryology_chart_x_Day5ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day5TE->Visible) { // Day5TE ?>
    <div id="r_Day5TE" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day5TE" for="x_Day5TE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day5TE->caption() ?><?= $Page->Day5TE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day5TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5TE">
    <select
        id="x_Day5TE"
        name="x_Day5TE"
        class="form-control ew-select<?= $Page->Day5TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day5TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day5TE"
        data-value-separator="<?= $Page->Day5TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5TE->getPlaceHolder()) ?>"
        <?= $Page->Day5TE->editAttributes() ?>>
        <?= $Page->Day5TE->selectOptionListHtml("x_Day5TE") ?>
    </select>
    <?= $Page->Day5TE->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day5TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day5TE']"),
        options = { name: "x_Day5TE", selectId: "ivf_embryology_chart_x_Day5TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
    <div id="r_Day5Observation" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day5Observation" for="x_Day5Observation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day5Observation->caption() ?><?= $Page->Day5Observation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day5Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Observation">
    <select
        id="x_Day5Observation"
        name="x_Day5Observation"
        class="form-control ew-select<?= $Page->Day5Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day5Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Observation"
        data-value-separator="<?= $Page->Day5Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Observation->getPlaceHolder()) ?>"
        <?= $Page->Day5Observation->editAttributes() ?>>
        <?= $Page->Day5Observation->selectOptionListHtml("x_Day5Observation") ?>
    </select>
    <?= $Page->Day5Observation->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day5Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day5Observation']"),
        options = { name: "x_Day5Observation", selectId: "ivf_embryology_chart_x_Day5Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
    <div id="r_Day5Collapsed" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day5Collapsed" for="x_Day5Collapsed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day5Collapsed->caption() ?><?= $Page->Day5Collapsed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day5Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Collapsed">
    <select
        id="x_Day5Collapsed"
        name="x_Day5Collapsed"
        class="form-control ew-select<?= $Page->Day5Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day5Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Collapsed"
        data-value-separator="<?= $Page->Day5Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Collapsed->getPlaceHolder()) ?>"
        <?= $Page->Day5Collapsed->editAttributes() ?>>
        <?= $Page->Day5Collapsed->selectOptionListHtml("x_Day5Collapsed") ?>
    </select>
    <?= $Page->Day5Collapsed->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day5Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day5Collapsed']"),
        options = { name: "x_Day5Collapsed", selectId: "ivf_embryology_chart_x_Day5Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
    <div id="r_Day5Vacoulles" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day5Vacoulles" for="x_Day5Vacoulles" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day5Vacoulles->caption() ?><?= $Page->Day5Vacoulles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day5Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Vacoulles">
    <select
        id="x_Day5Vacoulles"
        name="x_Day5Vacoulles"
        class="form-control ew-select<?= $Page->Day5Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day5Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Vacoulles"
        data-value-separator="<?= $Page->Day5Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Vacoulles->getPlaceHolder()) ?>"
        <?= $Page->Day5Vacoulles->editAttributes() ?>>
        <?= $Page->Day5Vacoulles->selectOptionListHtml("x_Day5Vacoulles") ?>
    </select>
    <?= $Page->Day5Vacoulles->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day5Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day5Vacoulles']"),
        options = { name: "x_Day5Vacoulles", selectId: "ivf_embryology_chart_x_Day5Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
    <div id="r_Day5Grade" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day5Grade" for="x_Day5Grade" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day5Grade->caption() ?><?= $Page->Day5Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day5Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Grade">
    <select
        id="x_Day5Grade"
        name="x_Day5Grade"
        class="form-control ew-select<?= $Page->Day5Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day5Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Grade"
        data-value-separator="<?= $Page->Day5Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Grade->getPlaceHolder()) ?>"
        <?= $Page->Day5Grade->editAttributes() ?>>
        <?= $Page->Day5Grade->selectOptionListHtml("x_Day5Grade") ?>
    </select>
    <?= $Page->Day5Grade->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day5Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day5Grade']"),
        options = { name: "x_Day5Grade", selectId: "ivf_embryology_chart_x_Day5Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
    <div id="r_Day6CellNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day6CellNo" for="x_Day6CellNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day6CellNo->caption() ?><?= $Page->Day6CellNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day6CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6CellNo">
<input type="<?= $Page->Day6CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x_Day6CellNo" id="x_Day6CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day6CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day6CellNo->EditValue ?>"<?= $Page->Day6CellNo->editAttributes() ?> aria-describedby="x_Day6CellNo_help">
<?= $Page->Day6CellNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day6CellNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
    <div id="r_Day6ICM" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day6ICM" for="x_Day6ICM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day6ICM->caption() ?><?= $Page->Day6ICM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day6ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6ICM">
    <select
        id="x_Day6ICM"
        name="x_Day6ICM"
        class="form-control ew-select<?= $Page->Day6ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day6ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day6ICM"
        data-value-separator="<?= $Page->Day6ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6ICM->getPlaceHolder()) ?>"
        <?= $Page->Day6ICM->editAttributes() ?>>
        <?= $Page->Day6ICM->selectOptionListHtml("x_Day6ICM") ?>
    </select>
    <?= $Page->Day6ICM->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day6ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day6ICM']"),
        options = { name: "x_Day6ICM", selectId: "ivf_embryology_chart_x_Day6ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day6TE->Visible) { // Day6TE ?>
    <div id="r_Day6TE" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day6TE" for="x_Day6TE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day6TE->caption() ?><?= $Page->Day6TE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day6TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6TE">
    <select
        id="x_Day6TE"
        name="x_Day6TE"
        class="form-control ew-select<?= $Page->Day6TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day6TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day6TE"
        data-value-separator="<?= $Page->Day6TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6TE->getPlaceHolder()) ?>"
        <?= $Page->Day6TE->editAttributes() ?>>
        <?= $Page->Day6TE->selectOptionListHtml("x_Day6TE") ?>
    </select>
    <?= $Page->Day6TE->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day6TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day6TE']"),
        options = { name: "x_Day6TE", selectId: "ivf_embryology_chart_x_Day6TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
    <div id="r_Day6Observation" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day6Observation" for="x_Day6Observation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day6Observation->caption() ?><?= $Page->Day6Observation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day6Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Observation">
    <select
        id="x_Day6Observation"
        name="x_Day6Observation"
        class="form-control ew-select<?= $Page->Day6Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day6Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Observation"
        data-value-separator="<?= $Page->Day6Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Observation->getPlaceHolder()) ?>"
        <?= $Page->Day6Observation->editAttributes() ?>>
        <?= $Page->Day6Observation->selectOptionListHtml("x_Day6Observation") ?>
    </select>
    <?= $Page->Day6Observation->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day6Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day6Observation']"),
        options = { name: "x_Day6Observation", selectId: "ivf_embryology_chart_x_Day6Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
    <div id="r_Day6Collapsed" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day6Collapsed" for="x_Day6Collapsed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day6Collapsed->caption() ?><?= $Page->Day6Collapsed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day6Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Collapsed">
    <select
        id="x_Day6Collapsed"
        name="x_Day6Collapsed"
        class="form-control ew-select<?= $Page->Day6Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day6Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Collapsed"
        data-value-separator="<?= $Page->Day6Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Collapsed->getPlaceHolder()) ?>"
        <?= $Page->Day6Collapsed->editAttributes() ?>>
        <?= $Page->Day6Collapsed->selectOptionListHtml("x_Day6Collapsed") ?>
    </select>
    <?= $Page->Day6Collapsed->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day6Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day6Collapsed']"),
        options = { name: "x_Day6Collapsed", selectId: "ivf_embryology_chart_x_Day6Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
    <div id="r_Day6Vacoulles" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day6Vacoulles" for="x_Day6Vacoulles" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day6Vacoulles->caption() ?><?= $Page->Day6Vacoulles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day6Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Vacoulles">
    <select
        id="x_Day6Vacoulles"
        name="x_Day6Vacoulles"
        class="form-control ew-select<?= $Page->Day6Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day6Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Vacoulles"
        data-value-separator="<?= $Page->Day6Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Vacoulles->getPlaceHolder()) ?>"
        <?= $Page->Day6Vacoulles->editAttributes() ?>>
        <?= $Page->Day6Vacoulles->selectOptionListHtml("x_Day6Vacoulles") ?>
    </select>
    <?= $Page->Day6Vacoulles->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day6Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day6Vacoulles']"),
        options = { name: "x_Day6Vacoulles", selectId: "ivf_embryology_chart_x_Day6Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
    <div id="r_Day6Grade" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day6Grade" for="x_Day6Grade" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day6Grade->caption() ?><?= $Page->Day6Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day6Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Grade">
    <select
        id="x_Day6Grade"
        name="x_Day6Grade"
        class="form-control ew-select<?= $Page->Day6Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day6Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Grade"
        data-value-separator="<?= $Page->Day6Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Grade->getPlaceHolder()) ?>"
        <?= $Page->Day6Grade->editAttributes() ?>>
        <?= $Page->Day6Grade->selectOptionListHtml("x_Day6Grade") ?>
    </select>
    <?= $Page->Day6Grade->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day6Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day6Grade']"),
        options = { name: "x_Day6Grade", selectId: "ivf_embryology_chart_x_Day6Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
    <div id="r_Day6Cryoptop" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day6Cryoptop" for="x_Day6Cryoptop" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day6Cryoptop->caption() ?><?= $Page->Day6Cryoptop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day6Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Cryoptop">
<input type="<?= $Page->Day6Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x_Day6Cryoptop" id="x_Day6Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day6Cryoptop->getPlaceHolder()) ?>" value="<?= $Page->Day6Cryoptop->EditValue ?>"<?= $Page->Day6Cryoptop->editAttributes() ?> aria-describedby="x_Day6Cryoptop_help">
<?= $Page->Day6Cryoptop->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day6Cryoptop->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
    <div id="r_EndSiNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_EndSiNo" for="x_EndSiNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EndSiNo->caption() ?><?= $Page->EndSiNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EndSiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndSiNo">
<input type="<?= $Page->EndSiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x_EndSiNo" id="x_EndSiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->EndSiNo->getPlaceHolder()) ?>" value="<?= $Page->EndSiNo->EditValue ?>"<?= $Page->EndSiNo->editAttributes() ?> aria-describedby="x_EndSiNo_help">
<?= $Page->EndSiNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EndSiNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EndingDay->Visible) { // EndingDay ?>
    <div id="r_EndingDay" class="form-group row">
        <label id="elh_ivf_embryology_chart_EndingDay" for="x_EndingDay" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EndingDay->caption() ?><?= $Page->EndingDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EndingDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingDay">
    <select
        id="x_EndingDay"
        name="x_EndingDay"
        class="form-control ew-select<?= $Page->EndingDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_EndingDay"
        data-table="ivf_embryology_chart"
        data-field="x_EndingDay"
        data-value-separator="<?= $Page->EndingDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingDay->getPlaceHolder()) ?>"
        <?= $Page->EndingDay->editAttributes() ?>>
        <?= $Page->EndingDay->selectOptionListHtml("x_EndingDay") ?>
    </select>
    <?= $Page->EndingDay->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->EndingDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_EndingDay']"),
        options = { name: "x_EndingDay", selectId: "ivf_embryology_chart_x_EndingDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
    <div id="r_EndingCellStage" class="form-group row">
        <label id="elh_ivf_embryology_chart_EndingCellStage" for="x_EndingCellStage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EndingCellStage->caption() ?><?= $Page->EndingCellStage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EndingCellStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingCellStage">
<input type="<?= $Page->EndingCellStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x_EndingCellStage" id="x_EndingCellStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->EndingCellStage->getPlaceHolder()) ?>" value="<?= $Page->EndingCellStage->EditValue ?>"<?= $Page->EndingCellStage->editAttributes() ?> aria-describedby="x_EndingCellStage_help">
<?= $Page->EndingCellStage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EndingCellStage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
    <div id="r_EndingGrade" class="form-group row">
        <label id="elh_ivf_embryology_chart_EndingGrade" for="x_EndingGrade" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EndingGrade->caption() ?><?= $Page->EndingGrade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EndingGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingGrade">
    <select
        id="x_EndingGrade"
        name="x_EndingGrade"
        class="form-control ew-select<?= $Page->EndingGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_EndingGrade"
        data-table="ivf_embryology_chart"
        data-field="x_EndingGrade"
        data-value-separator="<?= $Page->EndingGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingGrade->getPlaceHolder()) ?>"
        <?= $Page->EndingGrade->editAttributes() ?>>
        <?= $Page->EndingGrade->selectOptionListHtml("x_EndingGrade") ?>
    </select>
    <?= $Page->EndingGrade->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->EndingGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_EndingGrade']"),
        options = { name: "x_EndingGrade", selectId: "ivf_embryology_chart_x_EndingGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EndingState->Visible) { // EndingState ?>
    <div id="r_EndingState" class="form-group row">
        <label id="elh_ivf_embryology_chart_EndingState" for="x_EndingState" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EndingState->caption() ?><?= $Page->EndingState->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EndingState->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingState">
    <select
        id="x_EndingState"
        name="x_EndingState"
        class="form-control ew-select<?= $Page->EndingState->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_EndingState"
        data-table="ivf_embryology_chart"
        data-field="x_EndingState"
        data-value-separator="<?= $Page->EndingState->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingState->getPlaceHolder()) ?>"
        <?= $Page->EndingState->editAttributes() ?>>
        <?= $Page->EndingState->selectOptionListHtml("x_EndingState") ?>
    </select>
    <?= $Page->EndingState->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->EndingState->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_EndingState']"),
        options = { name: "x_EndingState", selectId: "ivf_embryology_chart_x_EndingState", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingState.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingState.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<?php if ($Page->TidNo->getSessionValue() != "") { ?>
<span id="el_ivf_embryology_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_ivf_embryology_chart_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
    <div id="r_DidNO" class="form-group row">
        <label id="elh_ivf_embryology_chart_DidNO" for="x_DidNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DidNO->caption() ?><?= $Page->DidNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DidNO->cellAttributes() ?>>
<?php if ($Page->DidNO->getSessionValue() != "") { ?>
<span id="el_ivf_embryology_chart_DidNO">
<span<?= $Page->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DidNO->getDisplayValue($Page->DidNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_DidNO" name="x_DidNO" value="<?= HtmlEncode($Page->DidNO->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_ivf_embryology_chart_DidNO">
<input type="<?= $Page->DidNO->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x_DidNO" id="x_DidNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DidNO->getPlaceHolder()) ?>" value="<?= $Page->DidNO->EditValue ?>"<?= $Page->DidNO->editAttributes() ?> aria-describedby="x_DidNO_help">
<?= $Page->DidNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DidNO->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
    <div id="r_ICSiIVFDateTime" class="form-group row">
        <label id="elh_ivf_embryology_chart_ICSiIVFDateTime" for="x_ICSiIVFDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ICSiIVFDateTime->caption() ?><?= $Page->ICSiIVFDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSiIVFDateTime->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ICSiIVFDateTime">
<input type="<?= $Page->ICSiIVFDateTime->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x_ICSiIVFDateTime" id="x_ICSiIVFDateTime" placeholder="<?= HtmlEncode($Page->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?= $Page->ICSiIVFDateTime->EditValue ?>"<?= $Page->ICSiIVFDateTime->editAttributes() ?> aria-describedby="x_ICSiIVFDateTime_help">
<?= $Page->ICSiIVFDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSiIVFDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ICSiIVFDateTime->ReadOnly && !$Page->ICSiIVFDateTime->Disabled && !isset($Page->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($Page->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartadd", "x_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
    <div id="r_PrimaryEmbrologist" class="form-group row">
        <label id="elh_ivf_embryology_chart_PrimaryEmbrologist" for="x_PrimaryEmbrologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrimaryEmbrologist->caption() ?><?= $Page->PrimaryEmbrologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrimaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_PrimaryEmbrologist">
<input type="<?= $Page->PrimaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x_PrimaryEmbrologist" id="x_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbrologist->EditValue ?>"<?= $Page->PrimaryEmbrologist->editAttributes() ?> aria-describedby="x_PrimaryEmbrologist_help">
<?= $Page->PrimaryEmbrologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrimaryEmbrologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
    <div id="r_SecondaryEmbrologist" class="form-group row">
        <label id="elh_ivf_embryology_chart_SecondaryEmbrologist" for="x_SecondaryEmbrologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SecondaryEmbrologist->caption() ?><?= $Page->SecondaryEmbrologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SecondaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SecondaryEmbrologist">
<input type="<?= $Page->SecondaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x_SecondaryEmbrologist" id="x_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbrologist->EditValue ?>"<?= $Page->SecondaryEmbrologist->editAttributes() ?> aria-describedby="x_SecondaryEmbrologist_help">
<?= $Page->SecondaryEmbrologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SecondaryEmbrologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
    <div id="r_Incubator" class="form-group row">
        <label id="elh_ivf_embryology_chart_Incubator" for="x_Incubator" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Incubator->caption() ?><?= $Page->Incubator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Incubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Incubator">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x_Incubator" id="x_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?> aria-describedby="x_Incubator_help">
<?= $Page->Incubator->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
    <div id="r_location" class="form-group row">
        <label id="elh_ivf_embryology_chart_location" for="x_location" class="<?= $Page->LeftColumnClass ?>"><?= $Page->location->caption() ?><?= $Page->location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->location->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_location">
<input type="<?= $Page->location->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_location" name="x_location" id="x_location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->location->getPlaceHolder()) ?>" value="<?= $Page->location->EditValue ?>"<?= $Page->location->editAttributes() ?> aria-describedby="x_location_help">
<?= $Page->location->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->location->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
    <div id="r_OocyteNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_OocyteNo" for="x_OocyteNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OocyteNo->caption() ?><?= $Page->OocyteNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_OocyteNo">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x_OocyteNo" id="x_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?> aria-describedby="x_OocyteNo_help">
<?= $Page->OocyteNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
    <div id="r_Stage" class="form-group row">
        <label id="elh_ivf_embryology_chart_Stage" for="x_Stage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Stage->caption() ?><?= $Page->Stage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Stage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Stage">
    <select
        id="x_Stage"
        name="x_Stage"
        class="form-control ew-select<?= $Page->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Stage"
        data-table="ivf_embryology_chart"
        data-field="x_Stage"
        data-value-separator="<?= $Page->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>"
        <?= $Page->Stage->editAttributes() ?>>
        <?= $Page->Stage->selectOptionListHtml("x_Stage") ?>
    </select>
    <?= $Page->Stage->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Stage']"),
        options = { name: "x_Stage", selectId: "ivf_embryology_chart_x_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_ivf_embryology_chart_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help">
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
    <div id="r_vitrificationDate" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitrificationDate" for="x_vitrificationDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitrificationDate->caption() ?><?= $Page->vitrificationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitrificationDate">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x_vitrificationDate" id="x_vitrificationDate" size="12" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?> aria-describedby="x_vitrificationDate_help">
<?= $Page->vitrificationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartadd", "x_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
    <div id="r_vitriPrimaryEmbryologist" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist" for="x_vitriPrimaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriPrimaryEmbryologist->caption() ?><?= $Page->vitriPrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriPrimaryEmbryologist">
<input type="<?= $Page->vitriPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x_vitriPrimaryEmbryologist" id="x_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->vitriPrimaryEmbryologist->EditValue ?>"<?= $Page->vitriPrimaryEmbryologist->editAttributes() ?> aria-describedby="x_vitriPrimaryEmbryologist_help">
<?= $Page->vitriPrimaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
    <div id="r_vitriSecondaryEmbryologist" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist" for="x_vitriSecondaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriSecondaryEmbryologist->caption() ?><?= $Page->vitriSecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriSecondaryEmbryologist">
<input type="<?= $Page->vitriSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x_vitriSecondaryEmbryologist" id="x_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->vitriSecondaryEmbryologist->EditValue ?>"<?= $Page->vitriSecondaryEmbryologist->editAttributes() ?> aria-describedby="x_vitriSecondaryEmbryologist_help">
<?= $Page->vitriSecondaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
    <div id="r_vitriEmbryoNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriEmbryoNo" for="x_vitriEmbryoNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriEmbryoNo->caption() ?><?= $Page->vitriEmbryoNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriEmbryoNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriEmbryoNo">
<input type="<?= $Page->vitriEmbryoNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x_vitriEmbryoNo" id="x_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->vitriEmbryoNo->EditValue ?>"<?= $Page->vitriEmbryoNo->editAttributes() ?> aria-describedby="x_vitriEmbryoNo_help">
<?= $Page->vitriEmbryoNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriEmbryoNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
    <div id="r_thawReFrozen" class="form-group row">
        <label id="elh_ivf_embryology_chart_thawReFrozen" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawReFrozen->caption() ?><?= $Page->thawReFrozen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawReFrozen">
<template id="tp_x_thawReFrozen">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="x_thawReFrozen" id="x_thawReFrozen"<?= $Page->thawReFrozen->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_thawReFrozen" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_thawReFrozen[]"
    name="x_thawReFrozen[]"
    value="<?= HtmlEncode($Page->thawReFrozen->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_thawReFrozen"
    data-target="dsl_x_thawReFrozen"
    data-repeatcolumn="5"
    class="form-control<?= $Page->thawReFrozen->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_thawReFrozen"
    data-value-separator="<?= $Page->thawReFrozen->displayValueSeparatorAttribute() ?>"
    <?= $Page->thawReFrozen->editAttributes() ?>>
<?= $Page->thawReFrozen->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
    <div id="r_vitriFertilisationDate" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriFertilisationDate" for="x_vitriFertilisationDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriFertilisationDate->caption() ?><?= $Page->vitriFertilisationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriFertilisationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriFertilisationDate">
<input type="<?= $Page->vitriFertilisationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x_vitriFertilisationDate" id="x_vitriFertilisationDate" size="12" placeholder="<?= HtmlEncode($Page->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->vitriFertilisationDate->EditValue ?>"<?= $Page->vitriFertilisationDate->editAttributes() ?> aria-describedby="x_vitriFertilisationDate_help">
<?= $Page->vitriFertilisationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriFertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitriFertilisationDate->ReadOnly && !$Page->vitriFertilisationDate->Disabled && !isset($Page->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($Page->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartadd", "x_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriDay->Visible) { // vitriDay ?>
    <div id="r_vitriDay" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriDay" for="x_vitriDay" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriDay->caption() ?><?= $Page->vitriDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriDay">
    <select
        id="x_vitriDay"
        name="x_vitriDay"
        class="form-control ew-select<?= $Page->vitriDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_vitriDay"
        data-table="ivf_embryology_chart"
        data-field="x_vitriDay"
        data-value-separator="<?= $Page->vitriDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->vitriDay->getPlaceHolder()) ?>"
        <?= $Page->vitriDay->editAttributes() ?>>
        <?= $Page->vitriDay->selectOptionListHtml("x_vitriDay") ?>
    </select>
    <?= $Page->vitriDay->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->vitriDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_vitriDay']"),
        options = { name: "x_vitriDay", selectId: "ivf_embryology_chart_x_vitriDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriStage->Visible) { // vitriStage ?>
    <div id="r_vitriStage" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriStage" for="x_vitriStage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriStage->caption() ?><?= $Page->vitriStage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriStage">
<input type="<?= $Page->vitriStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x_vitriStage" id="x_vitriStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriStage->getPlaceHolder()) ?>" value="<?= $Page->vitriStage->EditValue ?>"<?= $Page->vitriStage->editAttributes() ?> aria-describedby="x_vitriStage_help">
<?= $Page->vitriStage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriStage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
    <div id="r_vitriGrade" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriGrade" for="x_vitriGrade" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriGrade->caption() ?><?= $Page->vitriGrade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGrade">
    <select
        id="x_vitriGrade"
        name="x_vitriGrade"
        class="form-control ew-select<?= $Page->vitriGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_vitriGrade"
        data-table="ivf_embryology_chart"
        data-field="x_vitriGrade"
        data-value-separator="<?= $Page->vitriGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->vitriGrade->getPlaceHolder()) ?>"
        <?= $Page->vitriGrade->editAttributes() ?>>
        <?= $Page->vitriGrade->selectOptionListHtml("x_vitriGrade") ?>
    </select>
    <?= $Page->vitriGrade->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->vitriGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_vitriGrade']"),
        options = { name: "x_vitriGrade", selectId: "ivf_embryology_chart_x_vitriGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
    <div id="r_vitriIncubator" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriIncubator" for="x_vitriIncubator" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriIncubator->caption() ?><?= $Page->vitriIncubator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriIncubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriIncubator">
<input type="<?= $Page->vitriIncubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x_vitriIncubator" id="x_vitriIncubator" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriIncubator->getPlaceHolder()) ?>" value="<?= $Page->vitriIncubator->EditValue ?>"<?= $Page->vitriIncubator->editAttributes() ?> aria-describedby="x_vitriIncubator_help">
<?= $Page->vitriIncubator->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriIncubator->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriTank->Visible) { // vitriTank ?>
    <div id="r_vitriTank" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriTank" for="x_vitriTank" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriTank->caption() ?><?= $Page->vitriTank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriTank->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriTank">
<input type="<?= $Page->vitriTank->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x_vitriTank" id="x_vitriTank" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriTank->getPlaceHolder()) ?>" value="<?= $Page->vitriTank->EditValue ?>"<?= $Page->vitriTank->editAttributes() ?> aria-describedby="x_vitriTank_help">
<?= $Page->vitriTank->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriTank->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
    <div id="r_vitriCanister" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriCanister" for="x_vitriCanister" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriCanister->caption() ?><?= $Page->vitriCanister->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriCanister->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCanister">
<input type="<?= $Page->vitriCanister->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x_vitriCanister" id="x_vitriCanister" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCanister->getPlaceHolder()) ?>" value="<?= $Page->vitriCanister->EditValue ?>"<?= $Page->vitriCanister->editAttributes() ?> aria-describedby="x_vitriCanister_help">
<?= $Page->vitriCanister->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriCanister->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
    <div id="r_vitriGobiet" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriGobiet" for="x_vitriGobiet" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriGobiet->caption() ?><?= $Page->vitriGobiet->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriGobiet->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGobiet">
<input type="<?= $Page->vitriGobiet->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x_vitriGobiet" id="x_vitriGobiet" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriGobiet->getPlaceHolder()) ?>" value="<?= $Page->vitriGobiet->EditValue ?>"<?= $Page->vitriGobiet->editAttributes() ?> aria-describedby="x_vitriGobiet_help">
<?= $Page->vitriGobiet->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriGobiet->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
    <div id="r_vitriViscotube" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriViscotube" for="x_vitriViscotube" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriViscotube->caption() ?><?= $Page->vitriViscotube->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriViscotube->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriViscotube">
<input type="<?= $Page->vitriViscotube->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x_vitriViscotube" id="x_vitriViscotube" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriViscotube->getPlaceHolder()) ?>" value="<?= $Page->vitriViscotube->EditValue ?>"<?= $Page->vitriViscotube->editAttributes() ?> aria-describedby="x_vitriViscotube_help">
<?= $Page->vitriViscotube->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriViscotube->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
    <div id="r_vitriCryolockNo" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriCryolockNo" for="x_vitriCryolockNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriCryolockNo->caption() ?><?= $Page->vitriCryolockNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriCryolockNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockNo">
<input type="<?= $Page->vitriCryolockNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x_vitriCryolockNo" id="x_vitriCryolockNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCryolockNo->getPlaceHolder()) ?>" value="<?= $Page->vitriCryolockNo->EditValue ?>"<?= $Page->vitriCryolockNo->editAttributes() ?> aria-describedby="x_vitriCryolockNo_help">
<?= $Page->vitriCryolockNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriCryolockNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
    <div id="r_vitriCryolockColour" class="form-group row">
        <label id="elh_ivf_embryology_chart_vitriCryolockColour" for="x_vitriCryolockColour" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitriCryolockColour->caption() ?><?= $Page->vitriCryolockColour->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitriCryolockColour->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockColour">
<input type="<?= $Page->vitriCryolockColour->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x_vitriCryolockColour" id="x_vitriCryolockColour" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCryolockColour->getPlaceHolder()) ?>" value="<?= $Page->vitriCryolockColour->EditValue ?>"<?= $Page->vitriCryolockColour->editAttributes() ?> aria-describedby="x_vitriCryolockColour_help">
<?= $Page->vitriCryolockColour->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitriCryolockColour->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
    <div id="r_thawDate" class="form-group row">
        <label id="elh_ivf_embryology_chart_thawDate" for="x_thawDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawDate->caption() ?><?= $Page->thawDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDate">
<input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?> aria-describedby="x_thawDate_help">
<?= $Page->thawDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
<?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartadd", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
    <div id="r_thawPrimaryEmbryologist" class="form-group row">
        <label id="elh_ivf_embryology_chart_thawPrimaryEmbryologist" for="x_thawPrimaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawPrimaryEmbryologist->caption() ?><?= $Page->thawPrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawPrimaryEmbryologist">
<input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?> aria-describedby="x_thawPrimaryEmbryologist_help">
<?= $Page->thawPrimaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
    <div id="r_thawSecondaryEmbryologist" class="form-group row">
        <label id="elh_ivf_embryology_chart_thawSecondaryEmbryologist" for="x_thawSecondaryEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawSecondaryEmbryologist->caption() ?><?= $Page->thawSecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawSecondaryEmbryologist">
<input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?> aria-describedby="x_thawSecondaryEmbryologist_help">
<?= $Page->thawSecondaryEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
    <div id="r_thawET" class="form-group row">
        <label id="elh_ivf_embryology_chart_thawET" for="x_thawET" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawET->caption() ?><?= $Page->thawET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawET->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawET">
    <select
        id="x_thawET"
        name="x_thawET"
        class="form-control ew-select<?= $Page->thawET->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_thawET"
        data-table="ivf_embryology_chart"
        data-field="x_thawET"
        data-value-separator="<?= $Page->thawET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->thawET->getPlaceHolder()) ?>"
        <?= $Page->thawET->editAttributes() ?>>
        <?= $Page->thawET->selectOptionListHtml("x_thawET") ?>
    </select>
    <?= $Page->thawET->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->thawET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_thawET']"),
        options = { name: "x_thawET", selectId: "ivf_embryology_chart_x_thawET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.thawET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.thawET.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
    <div id="r_thawAbserve" class="form-group row">
        <label id="elh_ivf_embryology_chart_thawAbserve" for="x_thawAbserve" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawAbserve->caption() ?><?= $Page->thawAbserve->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawAbserve">
<input type="<?= $Page->thawAbserve->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x_thawAbserve" id="x_thawAbserve" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawAbserve->getPlaceHolder()) ?>" value="<?= $Page->thawAbserve->EditValue ?>"<?= $Page->thawAbserve->editAttributes() ?> aria-describedby="x_thawAbserve_help">
<?= $Page->thawAbserve->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawAbserve->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
    <div id="r_thawDiscard" class="form-group row">
        <label id="elh_ivf_embryology_chart_thawDiscard" for="x_thawDiscard" class="<?= $Page->LeftColumnClass ?>"><?= $Page->thawDiscard->caption() ?><?= $Page->thawDiscard->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDiscard">
<input type="<?= $Page->thawDiscard->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x_thawDiscard" id="x_thawDiscard" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawDiscard->getPlaceHolder()) ?>" value="<?= $Page->thawDiscard->EditValue ?>"<?= $Page->thawDiscard->editAttributes() ?> aria-describedby="x_thawDiscard_help">
<?= $Page->thawDiscard->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->thawDiscard->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
    <div id="r_ETCatheter" class="form-group row">
        <label id="elh_ivf_embryology_chart_ETCatheter" for="x_ETCatheter" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETCatheter->caption() ?><?= $Page->ETCatheter->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETCatheter->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETCatheter">
<input type="<?= $Page->ETCatheter->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x_ETCatheter" id="x_ETCatheter" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->ETCatheter->getPlaceHolder()) ?>" value="<?= $Page->ETCatheter->EditValue ?>"<?= $Page->ETCatheter->editAttributes() ?> aria-describedby="x_ETCatheter_help">
<?= $Page->ETCatheter->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETCatheter->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
    <div id="r_ETDifficulty" class="form-group row">
        <label id="elh_ivf_embryology_chart_ETDifficulty" for="x_ETDifficulty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETDifficulty->caption() ?><?= $Page->ETDifficulty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETDifficulty->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDifficulty">
    <select
        id="x_ETDifficulty"
        name="x_ETDifficulty"
        class="form-control ew-select<?= $Page->ETDifficulty->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_ETDifficulty"
        data-table="ivf_embryology_chart"
        data-field="x_ETDifficulty"
        data-value-separator="<?= $Page->ETDifficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ETDifficulty->getPlaceHolder()) ?>"
        <?= $Page->ETDifficulty->editAttributes() ?>>
        <?= $Page->ETDifficulty->selectOptionListHtml("x_ETDifficulty") ?>
    </select>
    <?= $Page->ETDifficulty->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ETDifficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_ETDifficulty']"),
        options = { name: "x_ETDifficulty", selectId: "ivf_embryology_chart_x_ETDifficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETEasy->Visible) { // ETEasy ?>
    <div id="r_ETEasy" class="form-group row">
        <label id="elh_ivf_embryology_chart_ETEasy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETEasy->caption() ?><?= $Page->ETEasy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETEasy->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEasy">
<template id="tp_x_ETEasy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="x_ETEasy" id="x_ETEasy"<?= $Page->ETEasy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ETEasy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ETEasy[]"
    name="x_ETEasy[]"
    value="<?= HtmlEncode($Page->ETEasy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ETEasy"
    data-target="dsl_x_ETEasy"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ETEasy->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_ETEasy"
    data-value-separator="<?= $Page->ETEasy->displayValueSeparatorAttribute() ?>"
    <?= $Page->ETEasy->editAttributes() ?>>
<?= $Page->ETEasy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETEasy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETComments->Visible) { // ETComments ?>
    <div id="r_ETComments" class="form-group row">
        <label id="elh_ivf_embryology_chart_ETComments" for="x_ETComments" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETComments->caption() ?><?= $Page->ETComments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETComments->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETComments">
<input type="<?= $Page->ETComments->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x_ETComments" id="x_ETComments" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETComments->getPlaceHolder()) ?>" value="<?= $Page->ETComments->EditValue ?>"<?= $Page->ETComments->editAttributes() ?> aria-describedby="x_ETComments_help">
<?= $Page->ETComments->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETComments->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
    <div id="r_ETDoctor" class="form-group row">
        <label id="elh_ivf_embryology_chart_ETDoctor" for="x_ETDoctor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETDoctor->caption() ?><?= $Page->ETDoctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETDoctor->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDoctor">
<input type="<?= $Page->ETDoctor->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x_ETDoctor" id="x_ETDoctor" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETDoctor->getPlaceHolder()) ?>" value="<?= $Page->ETDoctor->EditValue ?>"<?= $Page->ETDoctor->editAttributes() ?> aria-describedby="x_ETDoctor_help">
<?= $Page->ETDoctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETDoctor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
    <div id="r_ETEmbryologist" class="form-group row">
        <label id="elh_ivf_embryology_chart_ETEmbryologist" for="x_ETEmbryologist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETEmbryologist->caption() ?><?= $Page->ETEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEmbryologist">
<input type="<?= $Page->ETEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x_ETEmbryologist" id="x_ETEmbryologist" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->ETEmbryologist->EditValue ?>"<?= $Page->ETEmbryologist->editAttributes() ?> aria-describedby="x_ETEmbryologist_help">
<?= $Page->ETEmbryologist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETEmbryologist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
    <div id="r_ETDate" class="form-group row">
        <label id="elh_ivf_embryology_chart_ETDate" for="x_ETDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETDate->caption() ?><?= $Page->ETDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDate">
<input type="<?= $Page->ETDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x_ETDate" id="x_ETDate" placeholder="<?= HtmlEncode($Page->ETDate->getPlaceHolder()) ?>" value="<?= $Page->ETDate->EditValue ?>"<?= $Page->ETDate->editAttributes() ?> aria-describedby="x_ETDate_help">
<?= $Page->ETDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETDate->getErrorMessage() ?></div>
<?php if (!$Page->ETDate->ReadOnly && !$Page->ETDate->Disabled && !isset($Page->ETDate->EditAttrs["readonly"]) && !isset($Page->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartadd", "x_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day1End->Visible) { // Day1End ?>
    <div id="r_Day1End" class="form-group row">
        <label id="elh_ivf_embryology_chart_Day1End" for="x_Day1End" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day1End->caption() ?><?= $Page->Day1End->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day1End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1End">
    <select
        id="x_Day1End"
        name="x_Day1End"
        class="form-control ew-select<?= $Page->Day1End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x_Day1End"
        data-table="ivf_embryology_chart"
        data-field="x_Day1End"
        data-value-separator="<?= $Page->Day1End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1End->getPlaceHolder()) ?>"
        <?= $Page->Day1End->editAttributes() ?>>
        <?= $Page->Day1End->selectOptionListHtml("x_Day1End") ?>
    </select>
    <?= $Page->Day1End->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day1End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x_Day1End']"),
        options = { name: "x_Day1End", selectId: "ivf_embryology_chart_x_Day1End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("ivf_embryology_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

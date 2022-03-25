<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("IvfEmbryologyChartGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_embryology_chartgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fivf_embryology_chartgrid = new ew.Form("fivf_embryology_chartgrid", "grid");
    fivf_embryology_chartgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_embryology_chart")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_embryology_chart)
        ew.vars.tables.ivf_embryology_chart = currentTable;
    fivf_embryology_chartgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null], fields.RIDNo.isInvalid],
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
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null], fields.TidNo.isInvalid],
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
        var f = fivf_embryology_chartgrid,
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
    fivf_embryology_chartgrid.validate = function () {
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
    fivf_embryology_chartgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "RIDNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ARTCycle", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SpermOrigin", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "InseminatinTechnique", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IndicationForART", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day0sino", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day0OocyteStage", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day0PolarBodyPosition", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day0Breakage", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day0Attempts", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day0SPZMorpho", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day0SPZLocation", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day0SpOrgin", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day5Cryoptop", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day1Sperm", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day1PN", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day1PB", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day1Pronucleus", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day1Nucleolus", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day1Halo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day2SiNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day2CellNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day2Frag", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day2Symmetry", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day2Cryoptop", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day2Grade", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day2End", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day3Sino", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day3CellNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day3Frag", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day3Symmetry", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day3ZP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day3Vacoules", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day3Grade", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day3Cryoptop", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day3End", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day4SiNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day4CellNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day4Frag", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day4Symmetry", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day4Grade", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day4Cryoptop", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day4End", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day5CellNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day5ICM", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day5TE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day5Observation", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day5Collapsed", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day5Vacoulles", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day5Grade", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day6CellNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day6ICM", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day6TE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day6Observation", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day6Collapsed", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day6Vacoulles", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day6Grade", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day6Cryoptop", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EndSiNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EndingDay", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EndingCellStage", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EndingGrade", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EndingState", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TidNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DidNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ICSiIVFDateTime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrimaryEmbrologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SecondaryEmbrologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Incubator", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "location", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OocyteNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Stage", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Remarks", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitrificationDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriPrimaryEmbryologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriSecondaryEmbryologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriEmbryoNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "thawReFrozen[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriFertilisationDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriDay", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriStage", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriGrade", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriIncubator", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriTank", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriCanister", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriGobiet", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriViscotube", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriCryolockNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "vitriCryolockColour", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "thawDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "thawPrimaryEmbryologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "thawSecondaryEmbryologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "thawET", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "thawAbserve", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "thawDiscard", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ETCatheter", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ETDifficulty", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ETEasy[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ETComments", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ETDoctor", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ETEmbryologist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ETDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Day1End", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fivf_embryology_chartgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_embryology_chartgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_embryology_chartgrid.lists.Day0PolarBodyPosition = <?= $Grid->Day0PolarBodyPosition->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day0Breakage = <?= $Grid->Day0Breakage->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day0Attempts = <?= $Grid->Day0Attempts->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day0SPZMorpho = <?= $Grid->Day0SPZMorpho->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day0SPZLocation = <?= $Grid->Day0SPZLocation->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day0SpOrgin = <?= $Grid->Day0SpOrgin->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day5Cryoptop = <?= $Grid->Day5Cryoptop->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day1PN = <?= $Grid->Day1PN->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day1PB = <?= $Grid->Day1PB->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day1Pronucleus = <?= $Grid->Day1Pronucleus->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day1Nucleolus = <?= $Grid->Day1Nucleolus->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day1Halo = <?= $Grid->Day1Halo->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day2End = <?= $Grid->Day2End->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day3Frag = <?= $Grid->Day3Frag->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day3Symmetry = <?= $Grid->Day3Symmetry->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day3ZP = <?= $Grid->Day3ZP->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day3Vacoules = <?= $Grid->Day3Vacoules->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day3Grade = <?= $Grid->Day3Grade->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day3Cryoptop = <?= $Grid->Day3Cryoptop->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day3End = <?= $Grid->Day3End->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day4Cryoptop = <?= $Grid->Day4Cryoptop->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day4End = <?= $Grid->Day4End->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day5ICM = <?= $Grid->Day5ICM->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day5TE = <?= $Grid->Day5TE->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day5Observation = <?= $Grid->Day5Observation->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day5Collapsed = <?= $Grid->Day5Collapsed->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day5Vacoulles = <?= $Grid->Day5Vacoulles->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day5Grade = <?= $Grid->Day5Grade->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day6ICM = <?= $Grid->Day6ICM->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day6TE = <?= $Grid->Day6TE->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day6Observation = <?= $Grid->Day6Observation->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day6Collapsed = <?= $Grid->Day6Collapsed->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day6Vacoulles = <?= $Grid->Day6Vacoulles->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day6Grade = <?= $Grid->Day6Grade->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.EndingDay = <?= $Grid->EndingDay->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.EndingGrade = <?= $Grid->EndingGrade->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.EndingState = <?= $Grid->EndingState->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Stage = <?= $Grid->Stage->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.thawReFrozen = <?= $Grid->thawReFrozen->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.vitriDay = <?= $Grid->vitriDay->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.vitriGrade = <?= $Grid->vitriGrade->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.thawET = <?= $Grid->thawET->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.ETDifficulty = <?= $Grid->ETDifficulty->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.ETEasy = <?= $Grid->ETEasy->toClientList($Grid) ?>;
    fivf_embryology_chartgrid.lists.Day1End = <?= $Grid->Day1End->toClientList($Grid) ?>;
    loadjs.done("fivf_embryology_chartgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_embryology_chart">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_embryology_chartgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_embryology_chart" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_embryology_chartgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_id" class="ivf_embryology_chart_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Grid->RIDNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo"><?= $Grid->renderSort($Grid->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Grid->Name->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name"><?= $Grid->renderSort($Grid->Name) ?></div></th>
<?php } ?>
<?php if ($Grid->ARTCycle->Visible) { // ARTCycle ?>
        <th data-name="ARTCycle" class="<?= $Grid->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle"><?= $Grid->renderSort($Grid->ARTCycle) ?></div></th>
<?php } ?>
<?php if ($Grid->SpermOrigin->Visible) { // SpermOrigin ?>
        <th data-name="SpermOrigin" class="<?= $Grid->SpermOrigin->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin"><?= $Grid->renderSort($Grid->SpermOrigin) ?></div></th>
<?php } ?>
<?php if ($Grid->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <th data-name="InseminatinTechnique" class="<?= $Grid->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique"><?= $Grid->renderSort($Grid->InseminatinTechnique) ?></div></th>
<?php } ?>
<?php if ($Grid->IndicationForART->Visible) { // IndicationForART ?>
        <th data-name="IndicationForART" class="<?= $Grid->IndicationForART->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART"><?= $Grid->renderSort($Grid->IndicationForART) ?></div></th>
<?php } ?>
<?php if ($Grid->Day0sino->Visible) { // Day0sino ?>
        <th data-name="Day0sino" class="<?= $Grid->Day0sino->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino"><?= $Grid->renderSort($Grid->Day0sino) ?></div></th>
<?php } ?>
<?php if ($Grid->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <th data-name="Day0OocyteStage" class="<?= $Grid->Day0OocyteStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage"><?= $Grid->renderSort($Grid->Day0OocyteStage) ?></div></th>
<?php } ?>
<?php if ($Grid->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <th data-name="Day0PolarBodyPosition" class="<?= $Grid->Day0PolarBodyPosition->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition"><?= $Grid->renderSort($Grid->Day0PolarBodyPosition) ?></div></th>
<?php } ?>
<?php if ($Grid->Day0Breakage->Visible) { // Day0Breakage ?>
        <th data-name="Day0Breakage" class="<?= $Grid->Day0Breakage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage"><?= $Grid->renderSort($Grid->Day0Breakage) ?></div></th>
<?php } ?>
<?php if ($Grid->Day0Attempts->Visible) { // Day0Attempts ?>
        <th data-name="Day0Attempts" class="<?= $Grid->Day0Attempts->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts"><?= $Grid->renderSort($Grid->Day0Attempts) ?></div></th>
<?php } ?>
<?php if ($Grid->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <th data-name="Day0SPZMorpho" class="<?= $Grid->Day0SPZMorpho->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho"><?= $Grid->renderSort($Grid->Day0SPZMorpho) ?></div></th>
<?php } ?>
<?php if ($Grid->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <th data-name="Day0SPZLocation" class="<?= $Grid->Day0SPZLocation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation"><?= $Grid->renderSort($Grid->Day0SPZLocation) ?></div></th>
<?php } ?>
<?php if ($Grid->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <th data-name="Day0SpOrgin" class="<?= $Grid->Day0SpOrgin->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin"><?= $Grid->renderSort($Grid->Day0SpOrgin) ?></div></th>
<?php } ?>
<?php if ($Grid->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <th data-name="Day5Cryoptop" class="<?= $Grid->Day5Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop"><?= $Grid->renderSort($Grid->Day5Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Grid->Day1Sperm->Visible) { // Day1Sperm ?>
        <th data-name="Day1Sperm" class="<?= $Grid->Day1Sperm->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm"><?= $Grid->renderSort($Grid->Day1Sperm) ?></div></th>
<?php } ?>
<?php if ($Grid->Day1PN->Visible) { // Day1PN ?>
        <th data-name="Day1PN" class="<?= $Grid->Day1PN->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN"><?= $Grid->renderSort($Grid->Day1PN) ?></div></th>
<?php } ?>
<?php if ($Grid->Day1PB->Visible) { // Day1PB ?>
        <th data-name="Day1PB" class="<?= $Grid->Day1PB->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB"><?= $Grid->renderSort($Grid->Day1PB) ?></div></th>
<?php } ?>
<?php if ($Grid->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <th data-name="Day1Pronucleus" class="<?= $Grid->Day1Pronucleus->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus"><?= $Grid->renderSort($Grid->Day1Pronucleus) ?></div></th>
<?php } ?>
<?php if ($Grid->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <th data-name="Day1Nucleolus" class="<?= $Grid->Day1Nucleolus->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus"><?= $Grid->renderSort($Grid->Day1Nucleolus) ?></div></th>
<?php } ?>
<?php if ($Grid->Day1Halo->Visible) { // Day1Halo ?>
        <th data-name="Day1Halo" class="<?= $Grid->Day1Halo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo"><?= $Grid->renderSort($Grid->Day1Halo) ?></div></th>
<?php } ?>
<?php if ($Grid->Day2SiNo->Visible) { // Day2SiNo ?>
        <th data-name="Day2SiNo" class="<?= $Grid->Day2SiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo"><?= $Grid->renderSort($Grid->Day2SiNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Day2CellNo->Visible) { // Day2CellNo ?>
        <th data-name="Day2CellNo" class="<?= $Grid->Day2CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo"><?= $Grid->renderSort($Grid->Day2CellNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Day2Frag->Visible) { // Day2Frag ?>
        <th data-name="Day2Frag" class="<?= $Grid->Day2Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag"><?= $Grid->renderSort($Grid->Day2Frag) ?></div></th>
<?php } ?>
<?php if ($Grid->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <th data-name="Day2Symmetry" class="<?= $Grid->Day2Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry"><?= $Grid->renderSort($Grid->Day2Symmetry) ?></div></th>
<?php } ?>
<?php if ($Grid->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <th data-name="Day2Cryoptop" class="<?= $Grid->Day2Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop"><?= $Grid->renderSort($Grid->Day2Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Grid->Day2Grade->Visible) { // Day2Grade ?>
        <th data-name="Day2Grade" class="<?= $Grid->Day2Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade"><?= $Grid->renderSort($Grid->Day2Grade) ?></div></th>
<?php } ?>
<?php if ($Grid->Day2End->Visible) { // Day2End ?>
        <th data-name="Day2End" class="<?= $Grid->Day2End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End"><?= $Grid->renderSort($Grid->Day2End) ?></div></th>
<?php } ?>
<?php if ($Grid->Day3Sino->Visible) { // Day3Sino ?>
        <th data-name="Day3Sino" class="<?= $Grid->Day3Sino->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino"><?= $Grid->renderSort($Grid->Day3Sino) ?></div></th>
<?php } ?>
<?php if ($Grid->Day3CellNo->Visible) { // Day3CellNo ?>
        <th data-name="Day3CellNo" class="<?= $Grid->Day3CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo"><?= $Grid->renderSort($Grid->Day3CellNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Day3Frag->Visible) { // Day3Frag ?>
        <th data-name="Day3Frag" class="<?= $Grid->Day3Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag"><?= $Grid->renderSort($Grid->Day3Frag) ?></div></th>
<?php } ?>
<?php if ($Grid->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <th data-name="Day3Symmetry" class="<?= $Grid->Day3Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry"><?= $Grid->renderSort($Grid->Day3Symmetry) ?></div></th>
<?php } ?>
<?php if ($Grid->Day3ZP->Visible) { // Day3ZP ?>
        <th data-name="Day3ZP" class="<?= $Grid->Day3ZP->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP"><?= $Grid->renderSort($Grid->Day3ZP) ?></div></th>
<?php } ?>
<?php if ($Grid->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <th data-name="Day3Vacoules" class="<?= $Grid->Day3Vacoules->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules"><?= $Grid->renderSort($Grid->Day3Vacoules) ?></div></th>
<?php } ?>
<?php if ($Grid->Day3Grade->Visible) { // Day3Grade ?>
        <th data-name="Day3Grade" class="<?= $Grid->Day3Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade"><?= $Grid->renderSort($Grid->Day3Grade) ?></div></th>
<?php } ?>
<?php if ($Grid->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <th data-name="Day3Cryoptop" class="<?= $Grid->Day3Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop"><?= $Grid->renderSort($Grid->Day3Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Grid->Day3End->Visible) { // Day3End ?>
        <th data-name="Day3End" class="<?= $Grid->Day3End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End"><?= $Grid->renderSort($Grid->Day3End) ?></div></th>
<?php } ?>
<?php if ($Grid->Day4SiNo->Visible) { // Day4SiNo ?>
        <th data-name="Day4SiNo" class="<?= $Grid->Day4SiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo"><?= $Grid->renderSort($Grid->Day4SiNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Day4CellNo->Visible) { // Day4CellNo ?>
        <th data-name="Day4CellNo" class="<?= $Grid->Day4CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo"><?= $Grid->renderSort($Grid->Day4CellNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Day4Frag->Visible) { // Day4Frag ?>
        <th data-name="Day4Frag" class="<?= $Grid->Day4Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag"><?= $Grid->renderSort($Grid->Day4Frag) ?></div></th>
<?php } ?>
<?php if ($Grid->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <th data-name="Day4Symmetry" class="<?= $Grid->Day4Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry"><?= $Grid->renderSort($Grid->Day4Symmetry) ?></div></th>
<?php } ?>
<?php if ($Grid->Day4Grade->Visible) { // Day4Grade ?>
        <th data-name="Day4Grade" class="<?= $Grid->Day4Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade"><?= $Grid->renderSort($Grid->Day4Grade) ?></div></th>
<?php } ?>
<?php if ($Grid->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <th data-name="Day4Cryoptop" class="<?= $Grid->Day4Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop"><?= $Grid->renderSort($Grid->Day4Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Grid->Day4End->Visible) { // Day4End ?>
        <th data-name="Day4End" class="<?= $Grid->Day4End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End"><?= $Grid->renderSort($Grid->Day4End) ?></div></th>
<?php } ?>
<?php if ($Grid->Day5CellNo->Visible) { // Day5CellNo ?>
        <th data-name="Day5CellNo" class="<?= $Grid->Day5CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo"><?= $Grid->renderSort($Grid->Day5CellNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Day5ICM->Visible) { // Day5ICM ?>
        <th data-name="Day5ICM" class="<?= $Grid->Day5ICM->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM"><?= $Grid->renderSort($Grid->Day5ICM) ?></div></th>
<?php } ?>
<?php if ($Grid->Day5TE->Visible) { // Day5TE ?>
        <th data-name="Day5TE" class="<?= $Grid->Day5TE->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE"><?= $Grid->renderSort($Grid->Day5TE) ?></div></th>
<?php } ?>
<?php if ($Grid->Day5Observation->Visible) { // Day5Observation ?>
        <th data-name="Day5Observation" class="<?= $Grid->Day5Observation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation"><?= $Grid->renderSort($Grid->Day5Observation) ?></div></th>
<?php } ?>
<?php if ($Grid->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <th data-name="Day5Collapsed" class="<?= $Grid->Day5Collapsed->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed"><?= $Grid->renderSort($Grid->Day5Collapsed) ?></div></th>
<?php } ?>
<?php if ($Grid->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <th data-name="Day5Vacoulles" class="<?= $Grid->Day5Vacoulles->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles"><?= $Grid->renderSort($Grid->Day5Vacoulles) ?></div></th>
<?php } ?>
<?php if ($Grid->Day5Grade->Visible) { // Day5Grade ?>
        <th data-name="Day5Grade" class="<?= $Grid->Day5Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade"><?= $Grid->renderSort($Grid->Day5Grade) ?></div></th>
<?php } ?>
<?php if ($Grid->Day6CellNo->Visible) { // Day6CellNo ?>
        <th data-name="Day6CellNo" class="<?= $Grid->Day6CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo"><?= $Grid->renderSort($Grid->Day6CellNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Day6ICM->Visible) { // Day6ICM ?>
        <th data-name="Day6ICM" class="<?= $Grid->Day6ICM->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM"><?= $Grid->renderSort($Grid->Day6ICM) ?></div></th>
<?php } ?>
<?php if ($Grid->Day6TE->Visible) { // Day6TE ?>
        <th data-name="Day6TE" class="<?= $Grid->Day6TE->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE"><?= $Grid->renderSort($Grid->Day6TE) ?></div></th>
<?php } ?>
<?php if ($Grid->Day6Observation->Visible) { // Day6Observation ?>
        <th data-name="Day6Observation" class="<?= $Grid->Day6Observation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation"><?= $Grid->renderSort($Grid->Day6Observation) ?></div></th>
<?php } ?>
<?php if ($Grid->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <th data-name="Day6Collapsed" class="<?= $Grid->Day6Collapsed->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed"><?= $Grid->renderSort($Grid->Day6Collapsed) ?></div></th>
<?php } ?>
<?php if ($Grid->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <th data-name="Day6Vacoulles" class="<?= $Grid->Day6Vacoulles->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles"><?= $Grid->renderSort($Grid->Day6Vacoulles) ?></div></th>
<?php } ?>
<?php if ($Grid->Day6Grade->Visible) { // Day6Grade ?>
        <th data-name="Day6Grade" class="<?= $Grid->Day6Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade"><?= $Grid->renderSort($Grid->Day6Grade) ?></div></th>
<?php } ?>
<?php if ($Grid->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <th data-name="Day6Cryoptop" class="<?= $Grid->Day6Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop"><?= $Grid->renderSort($Grid->Day6Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Grid->EndSiNo->Visible) { // EndSiNo ?>
        <th data-name="EndSiNo" class="<?= $Grid->EndSiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo"><?= $Grid->renderSort($Grid->EndSiNo) ?></div></th>
<?php } ?>
<?php if ($Grid->EndingDay->Visible) { // EndingDay ?>
        <th data-name="EndingDay" class="<?= $Grid->EndingDay->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay"><?= $Grid->renderSort($Grid->EndingDay) ?></div></th>
<?php } ?>
<?php if ($Grid->EndingCellStage->Visible) { // EndingCellStage ?>
        <th data-name="EndingCellStage" class="<?= $Grid->EndingCellStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage"><?= $Grid->renderSort($Grid->EndingCellStage) ?></div></th>
<?php } ?>
<?php if ($Grid->EndingGrade->Visible) { // EndingGrade ?>
        <th data-name="EndingGrade" class="<?= $Grid->EndingGrade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade"><?= $Grid->renderSort($Grid->EndingGrade) ?></div></th>
<?php } ?>
<?php if ($Grid->EndingState->Visible) { // EndingState ?>
        <th data-name="EndingState" class="<?= $Grid->EndingState->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState"><?= $Grid->renderSort($Grid->EndingState) ?></div></th>
<?php } ?>
<?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Grid->TidNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo"><?= $Grid->renderSort($Grid->TidNo) ?></div></th>
<?php } ?>
<?php if ($Grid->DidNO->Visible) { // DidNO ?>
        <th data-name="DidNO" class="<?= $Grid->DidNO->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO"><?= $Grid->renderSort($Grid->DidNO) ?></div></th>
<?php } ?>
<?php if ($Grid->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <th data-name="ICSiIVFDateTime" class="<?= $Grid->ICSiIVFDateTime->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime"><?= $Grid->renderSort($Grid->ICSiIVFDateTime) ?></div></th>
<?php } ?>
<?php if ($Grid->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <th data-name="PrimaryEmbrologist" class="<?= $Grid->PrimaryEmbrologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist"><?= $Grid->renderSort($Grid->PrimaryEmbrologist) ?></div></th>
<?php } ?>
<?php if ($Grid->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <th data-name="SecondaryEmbrologist" class="<?= $Grid->SecondaryEmbrologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist"><?= $Grid->renderSort($Grid->SecondaryEmbrologist) ?></div></th>
<?php } ?>
<?php if ($Grid->Incubator->Visible) { // Incubator ?>
        <th data-name="Incubator" class="<?= $Grid->Incubator->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator"><?= $Grid->renderSort($Grid->Incubator) ?></div></th>
<?php } ?>
<?php if ($Grid->location->Visible) { // location ?>
        <th data-name="location" class="<?= $Grid->location->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_location" class="ivf_embryology_chart_location"><?= $Grid->renderSort($Grid->location) ?></div></th>
<?php } ?>
<?php if ($Grid->OocyteNo->Visible) { // OocyteNo ?>
        <th data-name="OocyteNo" class="<?= $Grid->OocyteNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo"><?= $Grid->renderSort($Grid->OocyteNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Stage->Visible) { // Stage ?>
        <th data-name="Stage" class="<?= $Grid->Stage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage"><?= $Grid->renderSort($Grid->Stage) ?></div></th>
<?php } ?>
<?php if ($Grid->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Grid->Remarks->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks"><?= $Grid->renderSort($Grid->Remarks) ?></div></th>
<?php } ?>
<?php if ($Grid->vitrificationDate->Visible) { // vitrificationDate ?>
        <th data-name="vitrificationDate" class="<?= $Grid->vitrificationDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate"><?= $Grid->renderSort($Grid->vitrificationDate) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <th data-name="vitriPrimaryEmbryologist" class="<?= $Grid->vitriPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist"><?= $Grid->renderSort($Grid->vitriPrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <th data-name="vitriSecondaryEmbryologist" class="<?= $Grid->vitriSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist"><?= $Grid->renderSort($Grid->vitriSecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <th data-name="vitriEmbryoNo" class="<?= $Grid->vitriEmbryoNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo"><?= $Grid->renderSort($Grid->vitriEmbryoNo) ?></div></th>
<?php } ?>
<?php if ($Grid->thawReFrozen->Visible) { // thawReFrozen ?>
        <th data-name="thawReFrozen" class="<?= $Grid->thawReFrozen->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen"><?= $Grid->renderSort($Grid->thawReFrozen) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <th data-name="vitriFertilisationDate" class="<?= $Grid->vitriFertilisationDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate"><?= $Grid->renderSort($Grid->vitriFertilisationDate) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriDay->Visible) { // vitriDay ?>
        <th data-name="vitriDay" class="<?= $Grid->vitriDay->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay"><?= $Grid->renderSort($Grid->vitriDay) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriStage->Visible) { // vitriStage ?>
        <th data-name="vitriStage" class="<?= $Grid->vitriStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage"><?= $Grid->renderSort($Grid->vitriStage) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriGrade->Visible) { // vitriGrade ?>
        <th data-name="vitriGrade" class="<?= $Grid->vitriGrade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade"><?= $Grid->renderSort($Grid->vitriGrade) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriIncubator->Visible) { // vitriIncubator ?>
        <th data-name="vitriIncubator" class="<?= $Grid->vitriIncubator->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator"><?= $Grid->renderSort($Grid->vitriIncubator) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriTank->Visible) { // vitriTank ?>
        <th data-name="vitriTank" class="<?= $Grid->vitriTank->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank"><?= $Grid->renderSort($Grid->vitriTank) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriCanister->Visible) { // vitriCanister ?>
        <th data-name="vitriCanister" class="<?= $Grid->vitriCanister->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister"><?= $Grid->renderSort($Grid->vitriCanister) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriGobiet->Visible) { // vitriGobiet ?>
        <th data-name="vitriGobiet" class="<?= $Grid->vitriGobiet->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet"><?= $Grid->renderSort($Grid->vitriGobiet) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriViscotube->Visible) { // vitriViscotube ?>
        <th data-name="vitriViscotube" class="<?= $Grid->vitriViscotube->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube"><?= $Grid->renderSort($Grid->vitriViscotube) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <th data-name="vitriCryolockNo" class="<?= $Grid->vitriCryolockNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo"><?= $Grid->renderSort($Grid->vitriCryolockNo) ?></div></th>
<?php } ?>
<?php if ($Grid->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <th data-name="vitriCryolockColour" class="<?= $Grid->vitriCryolockColour->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour"><?= $Grid->renderSort($Grid->vitriCryolockColour) ?></div></th>
<?php } ?>
<?php if ($Grid->thawDate->Visible) { // thawDate ?>
        <th data-name="thawDate" class="<?= $Grid->thawDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate"><?= $Grid->renderSort($Grid->thawDate) ?></div></th>
<?php } ?>
<?php if ($Grid->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <th data-name="thawPrimaryEmbryologist" class="<?= $Grid->thawPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist"><?= $Grid->renderSort($Grid->thawPrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Grid->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <th data-name="thawSecondaryEmbryologist" class="<?= $Grid->thawSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist"><?= $Grid->renderSort($Grid->thawSecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Grid->thawET->Visible) { // thawET ?>
        <th data-name="thawET" class="<?= $Grid->thawET->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET"><?= $Grid->renderSort($Grid->thawET) ?></div></th>
<?php } ?>
<?php if ($Grid->thawAbserve->Visible) { // thawAbserve ?>
        <th data-name="thawAbserve" class="<?= $Grid->thawAbserve->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve"><?= $Grid->renderSort($Grid->thawAbserve) ?></div></th>
<?php } ?>
<?php if ($Grid->thawDiscard->Visible) { // thawDiscard ?>
        <th data-name="thawDiscard" class="<?= $Grid->thawDiscard->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard"><?= $Grid->renderSort($Grid->thawDiscard) ?></div></th>
<?php } ?>
<?php if ($Grid->ETCatheter->Visible) { // ETCatheter ?>
        <th data-name="ETCatheter" class="<?= $Grid->ETCatheter->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter"><?= $Grid->renderSort($Grid->ETCatheter) ?></div></th>
<?php } ?>
<?php if ($Grid->ETDifficulty->Visible) { // ETDifficulty ?>
        <th data-name="ETDifficulty" class="<?= $Grid->ETDifficulty->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty"><?= $Grid->renderSort($Grid->ETDifficulty) ?></div></th>
<?php } ?>
<?php if ($Grid->ETEasy->Visible) { // ETEasy ?>
        <th data-name="ETEasy" class="<?= $Grid->ETEasy->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy"><?= $Grid->renderSort($Grid->ETEasy) ?></div></th>
<?php } ?>
<?php if ($Grid->ETComments->Visible) { // ETComments ?>
        <th data-name="ETComments" class="<?= $Grid->ETComments->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments"><?= $Grid->renderSort($Grid->ETComments) ?></div></th>
<?php } ?>
<?php if ($Grid->ETDoctor->Visible) { // ETDoctor ?>
        <th data-name="ETDoctor" class="<?= $Grid->ETDoctor->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor"><?= $Grid->renderSort($Grid->ETDoctor) ?></div></th>
<?php } ?>
<?php if ($Grid->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <th data-name="ETEmbryologist" class="<?= $Grid->ETEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist"><?= $Grid->renderSort($Grid->ETEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Grid->ETDate->Visible) { // ETDate ?>
        <th data-name="ETDate" class="<?= $Grid->ETDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate"><?= $Grid->renderSort($Grid->ETDate) ?></div></th>
<?php } ?>
<?php if ($Grid->Day1End->Visible) { // Day1End ?>
        <th data-name="Day1End" class="<?= $Grid->Day1End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End"><?= $Grid->renderSort($Grid->Day1End) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_ivf_embryology_chart", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_id" class="form-group"></span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_id" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_id" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Grid->RIDNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->RIDNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_RIDNo" class="form-group">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_RIDNo" class="form-group">
<input type="<?= $Grid->RIDNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" size="4" placeholder="<?= HtmlEncode($Grid->RIDNo->getPlaceHolder()) ?>" value="<?= $Grid->RIDNo->EditValue ?>"<?= $Grid->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RIDNo" id="o<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_RIDNo" class="form-group">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_RIDNo">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<?= $Grid->RIDNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_RIDNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_RIDNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Grid->Name->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Name->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Name" class="form-group">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Name" name="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Name" class="form-group">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Name" id="o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Name" class="form-group">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<?= $Grid->Name->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Name" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Name" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ARTCycle->Visible) { // ARTCycle ?>
        <td data-name="ARTCycle" <?= $Grid->ARTCycle->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ARTCycle" class="form-group">
<input type="<?= $Grid->ARTCycle->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x<?= $Grid->RowIndex ?>_ARTCycle" id="x<?= $Grid->RowIndex ?>_ARTCycle" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->ARTCycle->getPlaceHolder()) ?>" value="<?= $Grid->ARTCycle->EditValue ?>"<?= $Grid->ARTCycle->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ARTCycle->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ARTCycle" id="o<?= $Grid->RowIndex ?>_ARTCycle" value="<?= HtmlEncode($Grid->ARTCycle->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ARTCycle" class="form-group">
<span<?= $Grid->ARTCycle->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ARTCycle->getDisplayValue($Grid->ARTCycle->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ARTCycle" id="x<?= $Grid->RowIndex ?>_ARTCycle" value="<?= HtmlEncode($Grid->ARTCycle->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ARTCycle">
<span<?= $Grid->ARTCycle->viewAttributes() ?>>
<?= $Grid->ARTCycle->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ARTCycle" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ARTCycle" value="<?= HtmlEncode($Grid->ARTCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ARTCycle" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ARTCycle" value="<?= HtmlEncode($Grid->ARTCycle->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SpermOrigin->Visible) { // SpermOrigin ?>
        <td data-name="SpermOrigin" <?= $Grid->SpermOrigin->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_SpermOrigin" class="form-group">
<input type="<?= $Grid->SpermOrigin->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?= $Grid->RowIndex ?>_SpermOrigin" id="x<?= $Grid->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->SpermOrigin->getPlaceHolder()) ?>" value="<?= $Grid->SpermOrigin->EditValue ?>"<?= $Grid->SpermOrigin->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SpermOrigin->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SpermOrigin" id="o<?= $Grid->RowIndex ?>_SpermOrigin" value="<?= HtmlEncode($Grid->SpermOrigin->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_SpermOrigin" class="form-group">
<input type="<?= $Grid->SpermOrigin->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?= $Grid->RowIndex ?>_SpermOrigin" id="x<?= $Grid->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->SpermOrigin->getPlaceHolder()) ?>" value="<?= $Grid->SpermOrigin->EditValue ?>"<?= $Grid->SpermOrigin->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SpermOrigin->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_SpermOrigin">
<span<?= $Grid->SpermOrigin->viewAttributes() ?>>
<?= $Grid->SpermOrigin->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_SpermOrigin" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_SpermOrigin" value="<?= HtmlEncode($Grid->SpermOrigin->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_SpermOrigin" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_SpermOrigin" value="<?= HtmlEncode($Grid->SpermOrigin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td data-name="InseminatinTechnique" <?= $Grid->InseminatinTechnique->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_InseminatinTechnique" class="form-group">
<input type="<?= $Grid->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?= $Grid->RowIndex ?>_InseminatinTechnique" id="x<?= $Grid->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Grid->InseminatinTechnique->EditValue ?>"<?= $Grid->InseminatinTechnique->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InseminatinTechnique->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" data-hidden="1" name="o<?= $Grid->RowIndex ?>_InseminatinTechnique" id="o<?= $Grid->RowIndex ?>_InseminatinTechnique" value="<?= HtmlEncode($Grid->InseminatinTechnique->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_InseminatinTechnique" class="form-group">
<input type="<?= $Grid->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?= $Grid->RowIndex ?>_InseminatinTechnique" id="x<?= $Grid->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Grid->InseminatinTechnique->EditValue ?>"<?= $Grid->InseminatinTechnique->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InseminatinTechnique->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_InseminatinTechnique">
<span<?= $Grid->InseminatinTechnique->viewAttributes() ?>>
<?= $Grid->InseminatinTechnique->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_InseminatinTechnique" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_InseminatinTechnique" value="<?= HtmlEncode($Grid->InseminatinTechnique->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_InseminatinTechnique" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_InseminatinTechnique" value="<?= HtmlEncode($Grid->InseminatinTechnique->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IndicationForART->Visible) { // IndicationForART ?>
        <td data-name="IndicationForART" <?= $Grid->IndicationForART->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_IndicationForART" class="form-group">
<input type="<?= $Grid->IndicationForART->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?= $Grid->RowIndex ?>_IndicationForART" id="x<?= $Grid->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->IndicationForART->getPlaceHolder()) ?>" value="<?= $Grid->IndicationForART->EditValue ?>"<?= $Grid->IndicationForART->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IndicationForART->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IndicationForART" id="o<?= $Grid->RowIndex ?>_IndicationForART" value="<?= HtmlEncode($Grid->IndicationForART->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_IndicationForART" class="form-group">
<input type="<?= $Grid->IndicationForART->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?= $Grid->RowIndex ?>_IndicationForART" id="x<?= $Grid->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->IndicationForART->getPlaceHolder()) ?>" value="<?= $Grid->IndicationForART->EditValue ?>"<?= $Grid->IndicationForART->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IndicationForART->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_IndicationForART">
<span<?= $Grid->IndicationForART->viewAttributes() ?>>
<?= $Grid->IndicationForART->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_IndicationForART" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_IndicationForART" value="<?= HtmlEncode($Grid->IndicationForART->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_IndicationForART" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_IndicationForART" value="<?= HtmlEncode($Grid->IndicationForART->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day0sino->Visible) { // Day0sino ?>
        <td data-name="Day0sino" <?= $Grid->Day0sino->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0sino" class="form-group">
<input type="<?= $Grid->Day0sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?= $Grid->RowIndex ?>_Day0sino" id="x<?= $Grid->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day0sino->getPlaceHolder()) ?>" value="<?= $Grid->Day0sino->EditValue ?>"<?= $Grid->Day0sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day0sino->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0sino" id="o<?= $Grid->RowIndex ?>_Day0sino" value="<?= HtmlEncode($Grid->Day0sino->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0sino" class="form-group">
<input type="<?= $Grid->Day0sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?= $Grid->RowIndex ?>_Day0sino" id="x<?= $Grid->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day0sino->getPlaceHolder()) ?>" value="<?= $Grid->Day0sino->EditValue ?>"<?= $Grid->Day0sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day0sino->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0sino">
<span<?= $Grid->Day0sino->viewAttributes() ?>>
<?= $Grid->Day0sino->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0sino" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0sino" value="<?= HtmlEncode($Grid->Day0sino->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0sino" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0sino" value="<?= HtmlEncode($Grid->Day0sino->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td data-name="Day0OocyteStage" <?= $Grid->Day0OocyteStage->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0OocyteStage" class="form-group">
<input type="<?= $Grid->Day0OocyteStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?= $Grid->RowIndex ?>_Day0OocyteStage" id="x<?= $Grid->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Grid->Day0OocyteStage->EditValue ?>"<?= $Grid->Day0OocyteStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day0OocyteStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0OocyteStage" id="o<?= $Grid->RowIndex ?>_Day0OocyteStage" value="<?= HtmlEncode($Grid->Day0OocyteStage->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0OocyteStage" class="form-group">
<input type="<?= $Grid->Day0OocyteStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?= $Grid->RowIndex ?>_Day0OocyteStage" id="x<?= $Grid->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Grid->Day0OocyteStage->EditValue ?>"<?= $Grid->Day0OocyteStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day0OocyteStage->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0OocyteStage">
<span<?= $Grid->Day0OocyteStage->viewAttributes() ?>>
<?= $Grid->Day0OocyteStage->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0OocyteStage" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0OocyteStage" value="<?= HtmlEncode($Grid->Day0OocyteStage->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0OocyteStage" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0OocyteStage" value="<?= HtmlEncode($Grid->Day0OocyteStage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <td data-name="Day0PolarBodyPosition" <?= $Grid->Day0PolarBodyPosition->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition"
        name="x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition"
        class="form-control ew-select<?= $Grid->Day0PolarBodyPosition->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition"
        data-table="ivf_embryology_chart"
        data-field="x_Day0PolarBodyPosition"
        data-value-separator="<?= $Grid->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0PolarBodyPosition->getPlaceHolder()) ?>"
        <?= $Grid->Day0PolarBodyPosition->editAttributes() ?>>
        <?= $Grid->Day0PolarBodyPosition->selectOptionListHtml("x{$Grid->RowIndex}_Day0PolarBodyPosition") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0PolarBodyPosition->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0PolarBodyPosition" id="o<?= $Grid->RowIndex ?>_Day0PolarBodyPosition" value="<?= HtmlEncode($Grid->Day0PolarBodyPosition->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition"
        name="x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition"
        class="form-control ew-select<?= $Grid->Day0PolarBodyPosition->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition"
        data-table="ivf_embryology_chart"
        data-field="x_Day0PolarBodyPosition"
        data-value-separator="<?= $Grid->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0PolarBodyPosition->getPlaceHolder()) ?>"
        <?= $Grid->Day0PolarBodyPosition->editAttributes() ?>>
        <?= $Grid->Day0PolarBodyPosition->selectOptionListHtml("x{$Grid->RowIndex}_Day0PolarBodyPosition") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0PolarBodyPosition->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0PolarBodyPosition">
<span<?= $Grid->Day0PolarBodyPosition->viewAttributes() ?>>
<?= $Grid->Day0PolarBodyPosition->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition" value="<?= HtmlEncode($Grid->Day0PolarBodyPosition->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0PolarBodyPosition" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0PolarBodyPosition" value="<?= HtmlEncode($Grid->Day0PolarBodyPosition->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day0Breakage->Visible) { // Day0Breakage ?>
        <td data-name="Day0Breakage" <?= $Grid->Day0Breakage->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0Breakage" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0Breakage"
        name="x<?= $Grid->RowIndex ?>_Day0Breakage"
        class="form-control ew-select<?= $Grid->Day0Breakage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Breakage"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Breakage"
        data-value-separator="<?= $Grid->Day0Breakage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0Breakage->getPlaceHolder()) ?>"
        <?= $Grid->Day0Breakage->editAttributes() ?>>
        <?= $Grid->Day0Breakage->selectOptionListHtml("x{$Grid->RowIndex}_Day0Breakage") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0Breakage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Breakage']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0Breakage", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Breakage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0Breakage" id="o<?= $Grid->RowIndex ?>_Day0Breakage" value="<?= HtmlEncode($Grid->Day0Breakage->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0Breakage" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0Breakage"
        name="x<?= $Grid->RowIndex ?>_Day0Breakage"
        class="form-control ew-select<?= $Grid->Day0Breakage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Breakage"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Breakage"
        data-value-separator="<?= $Grid->Day0Breakage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0Breakage->getPlaceHolder()) ?>"
        <?= $Grid->Day0Breakage->editAttributes() ?>>
        <?= $Grid->Day0Breakage->selectOptionListHtml("x{$Grid->RowIndex}_Day0Breakage") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0Breakage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Breakage']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0Breakage", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Breakage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0Breakage">
<span<?= $Grid->Day0Breakage->viewAttributes() ?>>
<?= $Grid->Day0Breakage->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0Breakage" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0Breakage" value="<?= HtmlEncode($Grid->Day0Breakage->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0Breakage" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0Breakage" value="<?= HtmlEncode($Grid->Day0Breakage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day0Attempts->Visible) { // Day0Attempts ?>
        <td data-name="Day0Attempts" <?= $Grid->Day0Attempts->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0Attempts" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0Attempts"
        name="x<?= $Grid->RowIndex ?>_Day0Attempts"
        class="form-control ew-select<?= $Grid->Day0Attempts->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Attempts"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Attempts"
        data-value-separator="<?= $Grid->Day0Attempts->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0Attempts->getPlaceHolder()) ?>"
        <?= $Grid->Day0Attempts->editAttributes() ?>>
        <?= $Grid->Day0Attempts->selectOptionListHtml("x{$Grid->RowIndex}_Day0Attempts") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0Attempts->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Attempts']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0Attempts", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Attempts", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0Attempts" id="o<?= $Grid->RowIndex ?>_Day0Attempts" value="<?= HtmlEncode($Grid->Day0Attempts->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0Attempts" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0Attempts"
        name="x<?= $Grid->RowIndex ?>_Day0Attempts"
        class="form-control ew-select<?= $Grid->Day0Attempts->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Attempts"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Attempts"
        data-value-separator="<?= $Grid->Day0Attempts->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0Attempts->getPlaceHolder()) ?>"
        <?= $Grid->Day0Attempts->editAttributes() ?>>
        <?= $Grid->Day0Attempts->selectOptionListHtml("x{$Grid->RowIndex}_Day0Attempts") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0Attempts->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Attempts']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0Attempts", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Attempts", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0Attempts">
<span<?= $Grid->Day0Attempts->viewAttributes() ?>>
<?= $Grid->Day0Attempts->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0Attempts" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0Attempts" value="<?= HtmlEncode($Grid->Day0Attempts->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0Attempts" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0Attempts" value="<?= HtmlEncode($Grid->Day0Attempts->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <td data-name="Day0SPZMorpho" <?= $Grid->Day0SPZMorpho->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0SPZMorpho" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0SPZMorpho"
        name="x<?= $Grid->RowIndex ?>_Day0SPZMorpho"
        class="form-control ew-select<?= $Grid->Day0SPZMorpho->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZMorpho"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZMorpho"
        data-value-separator="<?= $Grid->Day0SPZMorpho->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0SPZMorpho->getPlaceHolder()) ?>"
        <?= $Grid->Day0SPZMorpho->editAttributes() ?>>
        <?= $Grid->Day0SPZMorpho->selectOptionListHtml("x{$Grid->RowIndex}_Day0SPZMorpho") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0SPZMorpho->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZMorpho']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0SPZMorpho", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZMorpho", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0SPZMorpho" id="o<?= $Grid->RowIndex ?>_Day0SPZMorpho" value="<?= HtmlEncode($Grid->Day0SPZMorpho->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0SPZMorpho" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0SPZMorpho"
        name="x<?= $Grid->RowIndex ?>_Day0SPZMorpho"
        class="form-control ew-select<?= $Grid->Day0SPZMorpho->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZMorpho"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZMorpho"
        data-value-separator="<?= $Grid->Day0SPZMorpho->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0SPZMorpho->getPlaceHolder()) ?>"
        <?= $Grid->Day0SPZMorpho->editAttributes() ?>>
        <?= $Grid->Day0SPZMorpho->selectOptionListHtml("x{$Grid->RowIndex}_Day0SPZMorpho") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0SPZMorpho->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZMorpho']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0SPZMorpho", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZMorpho", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0SPZMorpho">
<span<?= $Grid->Day0SPZMorpho->viewAttributes() ?>>
<?= $Grid->Day0SPZMorpho->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0SPZMorpho" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0SPZMorpho" value="<?= HtmlEncode($Grid->Day0SPZMorpho->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0SPZMorpho" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0SPZMorpho" value="<?= HtmlEncode($Grid->Day0SPZMorpho->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <td data-name="Day0SPZLocation" <?= $Grid->Day0SPZLocation->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0SPZLocation" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0SPZLocation"
        name="x<?= $Grid->RowIndex ?>_Day0SPZLocation"
        class="form-control ew-select<?= $Grid->Day0SPZLocation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZLocation"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZLocation"
        data-value-separator="<?= $Grid->Day0SPZLocation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0SPZLocation->getPlaceHolder()) ?>"
        <?= $Grid->Day0SPZLocation->editAttributes() ?>>
        <?= $Grid->Day0SPZLocation->selectOptionListHtml("x{$Grid->RowIndex}_Day0SPZLocation") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0SPZLocation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZLocation']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0SPZLocation", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZLocation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0SPZLocation" id="o<?= $Grid->RowIndex ?>_Day0SPZLocation" value="<?= HtmlEncode($Grid->Day0SPZLocation->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0SPZLocation" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0SPZLocation"
        name="x<?= $Grid->RowIndex ?>_Day0SPZLocation"
        class="form-control ew-select<?= $Grid->Day0SPZLocation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZLocation"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZLocation"
        data-value-separator="<?= $Grid->Day0SPZLocation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0SPZLocation->getPlaceHolder()) ?>"
        <?= $Grid->Day0SPZLocation->editAttributes() ?>>
        <?= $Grid->Day0SPZLocation->selectOptionListHtml("x{$Grid->RowIndex}_Day0SPZLocation") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0SPZLocation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZLocation']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0SPZLocation", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZLocation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0SPZLocation">
<span<?= $Grid->Day0SPZLocation->viewAttributes() ?>>
<?= $Grid->Day0SPZLocation->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0SPZLocation" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0SPZLocation" value="<?= HtmlEncode($Grid->Day0SPZLocation->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0SPZLocation" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0SPZLocation" value="<?= HtmlEncode($Grid->Day0SPZLocation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <td data-name="Day0SpOrgin" <?= $Grid->Day0SpOrgin->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0SpOrgin" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0SpOrgin"
        name="x<?= $Grid->RowIndex ?>_Day0SpOrgin"
        class="form-control ew-select<?= $Grid->Day0SpOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SpOrgin"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SpOrgin"
        data-value-separator="<?= $Grid->Day0SpOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0SpOrgin->getPlaceHolder()) ?>"
        <?= $Grid->Day0SpOrgin->editAttributes() ?>>
        <?= $Grid->Day0SpOrgin->selectOptionListHtml("x{$Grid->RowIndex}_Day0SpOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0SpOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SpOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0SpOrgin", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SpOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0SpOrgin" id="o<?= $Grid->RowIndex ?>_Day0SpOrgin" value="<?= HtmlEncode($Grid->Day0SpOrgin->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0SpOrgin" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0SpOrgin"
        name="x<?= $Grid->RowIndex ?>_Day0SpOrgin"
        class="form-control ew-select<?= $Grid->Day0SpOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SpOrgin"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SpOrgin"
        data-value-separator="<?= $Grid->Day0SpOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0SpOrgin->getPlaceHolder()) ?>"
        <?= $Grid->Day0SpOrgin->editAttributes() ?>>
        <?= $Grid->Day0SpOrgin->selectOptionListHtml("x{$Grid->RowIndex}_Day0SpOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0SpOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SpOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0SpOrgin", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SpOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day0SpOrgin">
<span<?= $Grid->Day0SpOrgin->viewAttributes() ?>>
<?= $Grid->Day0SpOrgin->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0SpOrgin" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day0SpOrgin" value="<?= HtmlEncode($Grid->Day0SpOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0SpOrgin" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day0SpOrgin" value="<?= HtmlEncode($Grid->Day0SpOrgin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <td data-name="Day5Cryoptop" <?= $Grid->Day5Cryoptop->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Cryoptop" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Cryoptop"
        name="x<?= $Grid->RowIndex ?>_Day5Cryoptop"
        class="form-control ew-select<?= $Grid->Day5Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Cryoptop"
        data-value-separator="<?= $Grid->Day5Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Cryoptop->getPlaceHolder()) ?>"
        <?= $Grid->Day5Cryoptop->editAttributes() ?>>
        <?= $Grid->Day5Cryoptop->selectOptionListHtml("x{$Grid->RowIndex}_Day5Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Cryoptop']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Cryoptop", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5Cryoptop" id="o<?= $Grid->RowIndex ?>_Day5Cryoptop" value="<?= HtmlEncode($Grid->Day5Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Cryoptop" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Cryoptop"
        name="x<?= $Grid->RowIndex ?>_Day5Cryoptop"
        class="form-control ew-select<?= $Grid->Day5Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Cryoptop"
        data-value-separator="<?= $Grid->Day5Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Cryoptop->getPlaceHolder()) ?>"
        <?= $Grid->Day5Cryoptop->editAttributes() ?>>
        <?= $Grid->Day5Cryoptop->selectOptionListHtml("x{$Grid->RowIndex}_Day5Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Cryoptop']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Cryoptop", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Cryoptop">
<span<?= $Grid->Day5Cryoptop->viewAttributes() ?>>
<?= $Grid->Day5Cryoptop->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5Cryoptop" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5Cryoptop" value="<?= HtmlEncode($Grid->Day5Cryoptop->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5Cryoptop" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5Cryoptop" value="<?= HtmlEncode($Grid->Day5Cryoptop->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day1Sperm->Visible) { // Day1Sperm ?>
        <td data-name="Day1Sperm" <?= $Grid->Day1Sperm->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Sperm" class="form-group">
<input type="<?= $Grid->Day1Sperm->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?= $Grid->RowIndex ?>_Day1Sperm" id="x<?= $Grid->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day1Sperm->getPlaceHolder()) ?>" value="<?= $Grid->Day1Sperm->EditValue ?>"<?= $Grid->Day1Sperm->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day1Sperm->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1Sperm" id="o<?= $Grid->RowIndex ?>_Day1Sperm" value="<?= HtmlEncode($Grid->Day1Sperm->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Sperm" class="form-group">
<input type="<?= $Grid->Day1Sperm->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?= $Grid->RowIndex ?>_Day1Sperm" id="x<?= $Grid->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day1Sperm->getPlaceHolder()) ?>" value="<?= $Grid->Day1Sperm->EditValue ?>"<?= $Grid->Day1Sperm->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day1Sperm->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Sperm">
<span<?= $Grid->Day1Sperm->viewAttributes() ?>>
<?= $Grid->Day1Sperm->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1Sperm" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1Sperm" value="<?= HtmlEncode($Grid->Day1Sperm->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1Sperm" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1Sperm" value="<?= HtmlEncode($Grid->Day1Sperm->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day1PN->Visible) { // Day1PN ?>
        <td data-name="Day1PN" <?= $Grid->Day1PN->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1PN" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1PN"
        name="x<?= $Grid->RowIndex ?>_Day1PN"
        class="form-control ew-select<?= $Grid->Day1PN->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PN"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PN"
        data-value-separator="<?= $Grid->Day1PN->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1PN->getPlaceHolder()) ?>"
        <?= $Grid->Day1PN->editAttributes() ?>>
        <?= $Grid->Day1PN->selectOptionListHtml("x{$Grid->RowIndex}_Day1PN") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1PN->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PN']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1PN", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PN", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PN.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PN.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1PN" id="o<?= $Grid->RowIndex ?>_Day1PN" value="<?= HtmlEncode($Grid->Day1PN->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1PN" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1PN"
        name="x<?= $Grid->RowIndex ?>_Day1PN"
        class="form-control ew-select<?= $Grid->Day1PN->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PN"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PN"
        data-value-separator="<?= $Grid->Day1PN->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1PN->getPlaceHolder()) ?>"
        <?= $Grid->Day1PN->editAttributes() ?>>
        <?= $Grid->Day1PN->selectOptionListHtml("x{$Grid->RowIndex}_Day1PN") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1PN->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PN']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1PN", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PN", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PN.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PN.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1PN">
<span<?= $Grid->Day1PN->viewAttributes() ?>>
<?= $Grid->Day1PN->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1PN" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1PN" value="<?= HtmlEncode($Grid->Day1PN->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1PN" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1PN" value="<?= HtmlEncode($Grid->Day1PN->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day1PB->Visible) { // Day1PB ?>
        <td data-name="Day1PB" <?= $Grid->Day1PB->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1PB" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1PB"
        name="x<?= $Grid->RowIndex ?>_Day1PB"
        class="form-control ew-select<?= $Grid->Day1PB->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PB"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PB"
        data-value-separator="<?= $Grid->Day1PB->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1PB->getPlaceHolder()) ?>"
        <?= $Grid->Day1PB->editAttributes() ?>>
        <?= $Grid->Day1PB->selectOptionListHtml("x{$Grid->RowIndex}_Day1PB") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1PB->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PB']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1PB", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PB", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PB.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PB.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1PB" id="o<?= $Grid->RowIndex ?>_Day1PB" value="<?= HtmlEncode($Grid->Day1PB->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1PB" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1PB"
        name="x<?= $Grid->RowIndex ?>_Day1PB"
        class="form-control ew-select<?= $Grid->Day1PB->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PB"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PB"
        data-value-separator="<?= $Grid->Day1PB->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1PB->getPlaceHolder()) ?>"
        <?= $Grid->Day1PB->editAttributes() ?>>
        <?= $Grid->Day1PB->selectOptionListHtml("x{$Grid->RowIndex}_Day1PB") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1PB->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PB']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1PB", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PB", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PB.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PB.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1PB">
<span<?= $Grid->Day1PB->viewAttributes() ?>>
<?= $Grid->Day1PB->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1PB" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1PB" value="<?= HtmlEncode($Grid->Day1PB->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1PB" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1PB" value="<?= HtmlEncode($Grid->Day1PB->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <td data-name="Day1Pronucleus" <?= $Grid->Day1Pronucleus->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Pronucleus" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1Pronucleus"
        name="x<?= $Grid->RowIndex ?>_Day1Pronucleus"
        class="form-control ew-select<?= $Grid->Day1Pronucleus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Pronucleus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Pronucleus"
        data-value-separator="<?= $Grid->Day1Pronucleus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1Pronucleus->getPlaceHolder()) ?>"
        <?= $Grid->Day1Pronucleus->editAttributes() ?>>
        <?= $Grid->Day1Pronucleus->selectOptionListHtml("x{$Grid->RowIndex}_Day1Pronucleus") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1Pronucleus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Pronucleus']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1Pronucleus", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Pronucleus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1Pronucleus" id="o<?= $Grid->RowIndex ?>_Day1Pronucleus" value="<?= HtmlEncode($Grid->Day1Pronucleus->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Pronucleus" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1Pronucleus"
        name="x<?= $Grid->RowIndex ?>_Day1Pronucleus"
        class="form-control ew-select<?= $Grid->Day1Pronucleus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Pronucleus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Pronucleus"
        data-value-separator="<?= $Grid->Day1Pronucleus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1Pronucleus->getPlaceHolder()) ?>"
        <?= $Grid->Day1Pronucleus->editAttributes() ?>>
        <?= $Grid->Day1Pronucleus->selectOptionListHtml("x{$Grid->RowIndex}_Day1Pronucleus") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1Pronucleus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Pronucleus']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1Pronucleus", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Pronucleus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Pronucleus">
<span<?= $Grid->Day1Pronucleus->viewAttributes() ?>>
<?= $Grid->Day1Pronucleus->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1Pronucleus" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1Pronucleus" value="<?= HtmlEncode($Grid->Day1Pronucleus->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1Pronucleus" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1Pronucleus" value="<?= HtmlEncode($Grid->Day1Pronucleus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <td data-name="Day1Nucleolus" <?= $Grid->Day1Nucleolus->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Nucleolus" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1Nucleolus"
        name="x<?= $Grid->RowIndex ?>_Day1Nucleolus"
        class="form-control ew-select<?= $Grid->Day1Nucleolus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Nucleolus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Nucleolus"
        data-value-separator="<?= $Grid->Day1Nucleolus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1Nucleolus->getPlaceHolder()) ?>"
        <?= $Grid->Day1Nucleolus->editAttributes() ?>>
        <?= $Grid->Day1Nucleolus->selectOptionListHtml("x{$Grid->RowIndex}_Day1Nucleolus") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1Nucleolus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Nucleolus']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1Nucleolus", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Nucleolus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1Nucleolus" id="o<?= $Grid->RowIndex ?>_Day1Nucleolus" value="<?= HtmlEncode($Grid->Day1Nucleolus->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Nucleolus" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1Nucleolus"
        name="x<?= $Grid->RowIndex ?>_Day1Nucleolus"
        class="form-control ew-select<?= $Grid->Day1Nucleolus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Nucleolus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Nucleolus"
        data-value-separator="<?= $Grid->Day1Nucleolus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1Nucleolus->getPlaceHolder()) ?>"
        <?= $Grid->Day1Nucleolus->editAttributes() ?>>
        <?= $Grid->Day1Nucleolus->selectOptionListHtml("x{$Grid->RowIndex}_Day1Nucleolus") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1Nucleolus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Nucleolus']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1Nucleolus", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Nucleolus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Nucleolus">
<span<?= $Grid->Day1Nucleolus->viewAttributes() ?>>
<?= $Grid->Day1Nucleolus->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1Nucleolus" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1Nucleolus" value="<?= HtmlEncode($Grid->Day1Nucleolus->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1Nucleolus" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1Nucleolus" value="<?= HtmlEncode($Grid->Day1Nucleolus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day1Halo->Visible) { // Day1Halo ?>
        <td data-name="Day1Halo" <?= $Grid->Day1Halo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Halo" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1Halo"
        name="x<?= $Grid->RowIndex ?>_Day1Halo"
        class="form-control ew-select<?= $Grid->Day1Halo->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Halo"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Halo"
        data-value-separator="<?= $Grid->Day1Halo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1Halo->getPlaceHolder()) ?>"
        <?= $Grid->Day1Halo->editAttributes() ?>>
        <?= $Grid->Day1Halo->selectOptionListHtml("x{$Grid->RowIndex}_Day1Halo") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1Halo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Halo']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1Halo", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Halo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1Halo" id="o<?= $Grid->RowIndex ?>_Day1Halo" value="<?= HtmlEncode($Grid->Day1Halo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Halo" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1Halo"
        name="x<?= $Grid->RowIndex ?>_Day1Halo"
        class="form-control ew-select<?= $Grid->Day1Halo->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Halo"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Halo"
        data-value-separator="<?= $Grid->Day1Halo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1Halo->getPlaceHolder()) ?>"
        <?= $Grid->Day1Halo->editAttributes() ?>>
        <?= $Grid->Day1Halo->selectOptionListHtml("x{$Grid->RowIndex}_Day1Halo") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1Halo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Halo']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1Halo", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Halo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1Halo">
<span<?= $Grid->Day1Halo->viewAttributes() ?>>
<?= $Grid->Day1Halo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1Halo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1Halo" value="<?= HtmlEncode($Grid->Day1Halo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1Halo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1Halo" value="<?= HtmlEncode($Grid->Day1Halo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day2SiNo->Visible) { // Day2SiNo ?>
        <td data-name="Day2SiNo" <?= $Grid->Day2SiNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2SiNo" class="form-group">
<input type="<?= $Grid->Day2SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?= $Grid->RowIndex ?>_Day2SiNo" id="x<?= $Grid->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2SiNo->getPlaceHolder()) ?>" value="<?= $Grid->Day2SiNo->EditValue ?>"<?= $Grid->Day2SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2SiNo" id="o<?= $Grid->RowIndex ?>_Day2SiNo" value="<?= HtmlEncode($Grid->Day2SiNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2SiNo" class="form-group">
<input type="<?= $Grid->Day2SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?= $Grid->RowIndex ?>_Day2SiNo" id="x<?= $Grid->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2SiNo->getPlaceHolder()) ?>" value="<?= $Grid->Day2SiNo->EditValue ?>"<?= $Grid->Day2SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2SiNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2SiNo">
<span<?= $Grid->Day2SiNo->viewAttributes() ?>>
<?= $Grid->Day2SiNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2SiNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2SiNo" value="<?= HtmlEncode($Grid->Day2SiNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2SiNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2SiNo" value="<?= HtmlEncode($Grid->Day2SiNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day2CellNo->Visible) { // Day2CellNo ?>
        <td data-name="Day2CellNo" <?= $Grid->Day2CellNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2CellNo" class="form-group">
<input type="<?= $Grid->Day2CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?= $Grid->RowIndex ?>_Day2CellNo" id="x<?= $Grid->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day2CellNo->EditValue ?>"<?= $Grid->Day2CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2CellNo" id="o<?= $Grid->RowIndex ?>_Day2CellNo" value="<?= HtmlEncode($Grid->Day2CellNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2CellNo" class="form-group">
<input type="<?= $Grid->Day2CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?= $Grid->RowIndex ?>_Day2CellNo" id="x<?= $Grid->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day2CellNo->EditValue ?>"<?= $Grid->Day2CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2CellNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2CellNo">
<span<?= $Grid->Day2CellNo->viewAttributes() ?>>
<?= $Grid->Day2CellNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2CellNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2CellNo" value="<?= HtmlEncode($Grid->Day2CellNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2CellNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2CellNo" value="<?= HtmlEncode($Grid->Day2CellNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day2Frag->Visible) { // Day2Frag ?>
        <td data-name="Day2Frag" <?= $Grid->Day2Frag->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Frag" class="form-group">
<input type="<?= $Grid->Day2Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?= $Grid->RowIndex ?>_Day2Frag" id="x<?= $Grid->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Frag->getPlaceHolder()) ?>" value="<?= $Grid->Day2Frag->EditValue ?>"<?= $Grid->Day2Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Frag->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2Frag" id="o<?= $Grid->RowIndex ?>_Day2Frag" value="<?= HtmlEncode($Grid->Day2Frag->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Frag" class="form-group">
<input type="<?= $Grid->Day2Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?= $Grid->RowIndex ?>_Day2Frag" id="x<?= $Grid->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Frag->getPlaceHolder()) ?>" value="<?= $Grid->Day2Frag->EditValue ?>"<?= $Grid->Day2Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Frag->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Frag">
<span<?= $Grid->Day2Frag->viewAttributes() ?>>
<?= $Grid->Day2Frag->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2Frag" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2Frag" value="<?= HtmlEncode($Grid->Day2Frag->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2Frag" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2Frag" value="<?= HtmlEncode($Grid->Day2Frag->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <td data-name="Day2Symmetry" <?= $Grid->Day2Symmetry->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Symmetry" class="form-group">
<input type="<?= $Grid->Day2Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?= $Grid->RowIndex ?>_Day2Symmetry" id="x<?= $Grid->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Symmetry->getPlaceHolder()) ?>" value="<?= $Grid->Day2Symmetry->EditValue ?>"<?= $Grid->Day2Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Symmetry->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2Symmetry" id="o<?= $Grid->RowIndex ?>_Day2Symmetry" value="<?= HtmlEncode($Grid->Day2Symmetry->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Symmetry" class="form-group">
<input type="<?= $Grid->Day2Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?= $Grid->RowIndex ?>_Day2Symmetry" id="x<?= $Grid->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Symmetry->getPlaceHolder()) ?>" value="<?= $Grid->Day2Symmetry->EditValue ?>"<?= $Grid->Day2Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Symmetry->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Symmetry">
<span<?= $Grid->Day2Symmetry->viewAttributes() ?>>
<?= $Grid->Day2Symmetry->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2Symmetry" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2Symmetry" value="<?= HtmlEncode($Grid->Day2Symmetry->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2Symmetry" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2Symmetry" value="<?= HtmlEncode($Grid->Day2Symmetry->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <td data-name="Day2Cryoptop" <?= $Grid->Day2Cryoptop->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Cryoptop" class="form-group">
<input type="<?= $Grid->Day2Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?= $Grid->RowIndex ?>_Day2Cryoptop" id="x<?= $Grid->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Cryoptop->getPlaceHolder()) ?>" value="<?= $Grid->Day2Cryoptop->EditValue ?>"<?= $Grid->Day2Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Cryoptop->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2Cryoptop" id="o<?= $Grid->RowIndex ?>_Day2Cryoptop" value="<?= HtmlEncode($Grid->Day2Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Cryoptop" class="form-group">
<input type="<?= $Grid->Day2Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?= $Grid->RowIndex ?>_Day2Cryoptop" id="x<?= $Grid->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Cryoptop->getPlaceHolder()) ?>" value="<?= $Grid->Day2Cryoptop->EditValue ?>"<?= $Grid->Day2Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Cryoptop->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Cryoptop">
<span<?= $Grid->Day2Cryoptop->viewAttributes() ?>>
<?= $Grid->Day2Cryoptop->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2Cryoptop" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2Cryoptop" value="<?= HtmlEncode($Grid->Day2Cryoptop->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2Cryoptop" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2Cryoptop" value="<?= HtmlEncode($Grid->Day2Cryoptop->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day2Grade->Visible) { // Day2Grade ?>
        <td data-name="Day2Grade" <?= $Grid->Day2Grade->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Grade" class="form-group">
<input type="<?= $Grid->Day2Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?= $Grid->RowIndex ?>_Day2Grade" id="x<?= $Grid->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Grade->getPlaceHolder()) ?>" value="<?= $Grid->Day2Grade->EditValue ?>"<?= $Grid->Day2Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Grade->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2Grade" id="o<?= $Grid->RowIndex ?>_Day2Grade" value="<?= HtmlEncode($Grid->Day2Grade->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Grade" class="form-group">
<input type="<?= $Grid->Day2Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?= $Grid->RowIndex ?>_Day2Grade" id="x<?= $Grid->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Grade->getPlaceHolder()) ?>" value="<?= $Grid->Day2Grade->EditValue ?>"<?= $Grid->Day2Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Grade->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2Grade">
<span<?= $Grid->Day2Grade->viewAttributes() ?>>
<?= $Grid->Day2Grade->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2Grade" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2Grade" value="<?= HtmlEncode($Grid->Day2Grade->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2Grade" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2Grade" value="<?= HtmlEncode($Grid->Day2Grade->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day2End->Visible) { // Day2End ?>
        <td data-name="Day2End" <?= $Grid->Day2End->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2End" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day2End"
        name="x<?= $Grid->RowIndex ?>_Day2End"
        class="form-control ew-select<?= $Grid->Day2End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day2End"
        data-table="ivf_embryology_chart"
        data-field="x_Day2End"
        data-value-separator="<?= $Grid->Day2End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day2End->getPlaceHolder()) ?>"
        <?= $Grid->Day2End->editAttributes() ?>>
        <?= $Grid->Day2End->selectOptionListHtml("x{$Grid->RowIndex}_Day2End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day2End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day2End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day2End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day2End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day2End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day2End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2End" id="o<?= $Grid->RowIndex ?>_Day2End" value="<?= HtmlEncode($Grid->Day2End->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2End" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day2End"
        name="x<?= $Grid->RowIndex ?>_Day2End"
        class="form-control ew-select<?= $Grid->Day2End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day2End"
        data-table="ivf_embryology_chart"
        data-field="x_Day2End"
        data-value-separator="<?= $Grid->Day2End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day2End->getPlaceHolder()) ?>"
        <?= $Grid->Day2End->editAttributes() ?>>
        <?= $Grid->Day2End->selectOptionListHtml("x{$Grid->RowIndex}_Day2End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day2End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day2End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day2End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day2End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day2End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day2End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day2End">
<span<?= $Grid->Day2End->viewAttributes() ?>>
<?= $Grid->Day2End->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2End" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day2End" value="<?= HtmlEncode($Grid->Day2End->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2End" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day2End" value="<?= HtmlEncode($Grid->Day2End->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day3Sino->Visible) { // Day3Sino ?>
        <td data-name="Day3Sino" <?= $Grid->Day3Sino->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Sino" class="form-group">
<input type="<?= $Grid->Day3Sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?= $Grid->RowIndex ?>_Day3Sino" id="x<?= $Grid->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day3Sino->getPlaceHolder()) ?>" value="<?= $Grid->Day3Sino->EditValue ?>"<?= $Grid->Day3Sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day3Sino->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Sino" id="o<?= $Grid->RowIndex ?>_Day3Sino" value="<?= HtmlEncode($Grid->Day3Sino->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Sino" class="form-group">
<input type="<?= $Grid->Day3Sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?= $Grid->RowIndex ?>_Day3Sino" id="x<?= $Grid->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day3Sino->getPlaceHolder()) ?>" value="<?= $Grid->Day3Sino->EditValue ?>"<?= $Grid->Day3Sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day3Sino->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Sino">
<span<?= $Grid->Day3Sino->viewAttributes() ?>>
<?= $Grid->Day3Sino->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Sino" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Sino" value="<?= HtmlEncode($Grid->Day3Sino->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Sino" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Sino" value="<?= HtmlEncode($Grid->Day3Sino->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day3CellNo->Visible) { // Day3CellNo ?>
        <td data-name="Day3CellNo" <?= $Grid->Day3CellNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3CellNo" class="form-group">
<input type="<?= $Grid->Day3CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?= $Grid->RowIndex ?>_Day3CellNo" id="x<?= $Grid->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day3CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day3CellNo->EditValue ?>"<?= $Grid->Day3CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day3CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3CellNo" id="o<?= $Grid->RowIndex ?>_Day3CellNo" value="<?= HtmlEncode($Grid->Day3CellNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3CellNo" class="form-group">
<input type="<?= $Grid->Day3CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?= $Grid->RowIndex ?>_Day3CellNo" id="x<?= $Grid->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day3CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day3CellNo->EditValue ?>"<?= $Grid->Day3CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day3CellNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3CellNo">
<span<?= $Grid->Day3CellNo->viewAttributes() ?>>
<?= $Grid->Day3CellNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3CellNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3CellNo" value="<?= HtmlEncode($Grid->Day3CellNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3CellNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3CellNo" value="<?= HtmlEncode($Grid->Day3CellNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day3Frag->Visible) { // Day3Frag ?>
        <td data-name="Day3Frag" <?= $Grid->Day3Frag->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Frag" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Frag"
        name="x<?= $Grid->RowIndex ?>_Day3Frag"
        class="form-control ew-select<?= $Grid->Day3Frag->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Frag"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Frag"
        data-value-separator="<?= $Grid->Day3Frag->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Frag->getPlaceHolder()) ?>"
        <?= $Grid->Day3Frag->editAttributes() ?>>
        <?= $Grid->Day3Frag->selectOptionListHtml("x{$Grid->RowIndex}_Day3Frag") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Frag->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Frag']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Frag", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Frag", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Frag" id="o<?= $Grid->RowIndex ?>_Day3Frag" value="<?= HtmlEncode($Grid->Day3Frag->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Frag" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Frag"
        name="x<?= $Grid->RowIndex ?>_Day3Frag"
        class="form-control ew-select<?= $Grid->Day3Frag->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Frag"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Frag"
        data-value-separator="<?= $Grid->Day3Frag->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Frag->getPlaceHolder()) ?>"
        <?= $Grid->Day3Frag->editAttributes() ?>>
        <?= $Grid->Day3Frag->selectOptionListHtml("x{$Grid->RowIndex}_Day3Frag") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Frag->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Frag']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Frag", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Frag", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Frag">
<span<?= $Grid->Day3Frag->viewAttributes() ?>>
<?= $Grid->Day3Frag->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Frag" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Frag" value="<?= HtmlEncode($Grid->Day3Frag->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Frag" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Frag" value="<?= HtmlEncode($Grid->Day3Frag->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <td data-name="Day3Symmetry" <?= $Grid->Day3Symmetry->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Symmetry" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Symmetry"
        name="x<?= $Grid->RowIndex ?>_Day3Symmetry"
        class="form-control ew-select<?= $Grid->Day3Symmetry->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Symmetry"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Symmetry"
        data-value-separator="<?= $Grid->Day3Symmetry->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Symmetry->getPlaceHolder()) ?>"
        <?= $Grid->Day3Symmetry->editAttributes() ?>>
        <?= $Grid->Day3Symmetry->selectOptionListHtml("x{$Grid->RowIndex}_Day3Symmetry") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Symmetry->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Symmetry']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Symmetry", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Symmetry", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Symmetry" id="o<?= $Grid->RowIndex ?>_Day3Symmetry" value="<?= HtmlEncode($Grid->Day3Symmetry->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Symmetry" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Symmetry"
        name="x<?= $Grid->RowIndex ?>_Day3Symmetry"
        class="form-control ew-select<?= $Grid->Day3Symmetry->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Symmetry"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Symmetry"
        data-value-separator="<?= $Grid->Day3Symmetry->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Symmetry->getPlaceHolder()) ?>"
        <?= $Grid->Day3Symmetry->editAttributes() ?>>
        <?= $Grid->Day3Symmetry->selectOptionListHtml("x{$Grid->RowIndex}_Day3Symmetry") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Symmetry->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Symmetry']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Symmetry", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Symmetry", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Symmetry">
<span<?= $Grid->Day3Symmetry->viewAttributes() ?>>
<?= $Grid->Day3Symmetry->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Symmetry" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Symmetry" value="<?= HtmlEncode($Grid->Day3Symmetry->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Symmetry" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Symmetry" value="<?= HtmlEncode($Grid->Day3Symmetry->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day3ZP->Visible) { // Day3ZP ?>
        <td data-name="Day3ZP" <?= $Grid->Day3ZP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3ZP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3ZP"
        name="x<?= $Grid->RowIndex ?>_Day3ZP"
        class="form-control ew-select<?= $Grid->Day3ZP->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3ZP"
        data-table="ivf_embryology_chart"
        data-field="x_Day3ZP"
        data-value-separator="<?= $Grid->Day3ZP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3ZP->getPlaceHolder()) ?>"
        <?= $Grid->Day3ZP->editAttributes() ?>>
        <?= $Grid->Day3ZP->selectOptionListHtml("x{$Grid->RowIndex}_Day3ZP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3ZP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3ZP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3ZP", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3ZP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3ZP" id="o<?= $Grid->RowIndex ?>_Day3ZP" value="<?= HtmlEncode($Grid->Day3ZP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3ZP" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3ZP"
        name="x<?= $Grid->RowIndex ?>_Day3ZP"
        class="form-control ew-select<?= $Grid->Day3ZP->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3ZP"
        data-table="ivf_embryology_chart"
        data-field="x_Day3ZP"
        data-value-separator="<?= $Grid->Day3ZP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3ZP->getPlaceHolder()) ?>"
        <?= $Grid->Day3ZP->editAttributes() ?>>
        <?= $Grid->Day3ZP->selectOptionListHtml("x{$Grid->RowIndex}_Day3ZP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3ZP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3ZP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3ZP", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3ZP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3ZP">
<span<?= $Grid->Day3ZP->viewAttributes() ?>>
<?= $Grid->Day3ZP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3ZP" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3ZP" value="<?= HtmlEncode($Grid->Day3ZP->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3ZP" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3ZP" value="<?= HtmlEncode($Grid->Day3ZP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <td data-name="Day3Vacoules" <?= $Grid->Day3Vacoules->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Vacoules" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Vacoules"
        name="x<?= $Grid->RowIndex ?>_Day3Vacoules"
        class="form-control ew-select<?= $Grid->Day3Vacoules->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Vacoules"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Vacoules"
        data-value-separator="<?= $Grid->Day3Vacoules->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Vacoules->getPlaceHolder()) ?>"
        <?= $Grid->Day3Vacoules->editAttributes() ?>>
        <?= $Grid->Day3Vacoules->selectOptionListHtml("x{$Grid->RowIndex}_Day3Vacoules") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Vacoules->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Vacoules']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Vacoules", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Vacoules", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Vacoules" id="o<?= $Grid->RowIndex ?>_Day3Vacoules" value="<?= HtmlEncode($Grid->Day3Vacoules->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Vacoules" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Vacoules"
        name="x<?= $Grid->RowIndex ?>_Day3Vacoules"
        class="form-control ew-select<?= $Grid->Day3Vacoules->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Vacoules"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Vacoules"
        data-value-separator="<?= $Grid->Day3Vacoules->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Vacoules->getPlaceHolder()) ?>"
        <?= $Grid->Day3Vacoules->editAttributes() ?>>
        <?= $Grid->Day3Vacoules->selectOptionListHtml("x{$Grid->RowIndex}_Day3Vacoules") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Vacoules->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Vacoules']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Vacoules", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Vacoules", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Vacoules">
<span<?= $Grid->Day3Vacoules->viewAttributes() ?>>
<?= $Grid->Day3Vacoules->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Vacoules" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Vacoules" value="<?= HtmlEncode($Grid->Day3Vacoules->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Vacoules" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Vacoules" value="<?= HtmlEncode($Grid->Day3Vacoules->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day3Grade->Visible) { // Day3Grade ?>
        <td data-name="Day3Grade" <?= $Grid->Day3Grade->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Grade" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Grade"
        name="x<?= $Grid->RowIndex ?>_Day3Grade"
        class="form-control ew-select<?= $Grid->Day3Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Grade"
        data-value-separator="<?= $Grid->Day3Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Grade->getPlaceHolder()) ?>"
        <?= $Grid->Day3Grade->editAttributes() ?>>
        <?= $Grid->Day3Grade->selectOptionListHtml("x{$Grid->RowIndex}_Day3Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Grade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Grade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Grade" id="o<?= $Grid->RowIndex ?>_Day3Grade" value="<?= HtmlEncode($Grid->Day3Grade->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Grade" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Grade"
        name="x<?= $Grid->RowIndex ?>_Day3Grade"
        class="form-control ew-select<?= $Grid->Day3Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Grade"
        data-value-separator="<?= $Grid->Day3Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Grade->getPlaceHolder()) ?>"
        <?= $Grid->Day3Grade->editAttributes() ?>>
        <?= $Grid->Day3Grade->selectOptionListHtml("x{$Grid->RowIndex}_Day3Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Grade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Grade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Grade">
<span<?= $Grid->Day3Grade->viewAttributes() ?>>
<?= $Grid->Day3Grade->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Grade" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Grade" value="<?= HtmlEncode($Grid->Day3Grade->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Grade" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Grade" value="<?= HtmlEncode($Grid->Day3Grade->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <td data-name="Day3Cryoptop" <?= $Grid->Day3Cryoptop->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Cryoptop" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Cryoptop"
        name="x<?= $Grid->RowIndex ?>_Day3Cryoptop"
        class="form-control ew-select<?= $Grid->Day3Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Cryoptop"
        data-value-separator="<?= $Grid->Day3Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Cryoptop->getPlaceHolder()) ?>"
        <?= $Grid->Day3Cryoptop->editAttributes() ?>>
        <?= $Grid->Day3Cryoptop->selectOptionListHtml("x{$Grid->RowIndex}_Day3Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Cryoptop']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Cryoptop", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Cryoptop" id="o<?= $Grid->RowIndex ?>_Day3Cryoptop" value="<?= HtmlEncode($Grid->Day3Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Cryoptop" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Cryoptop"
        name="x<?= $Grid->RowIndex ?>_Day3Cryoptop"
        class="form-control ew-select<?= $Grid->Day3Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Cryoptop"
        data-value-separator="<?= $Grid->Day3Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Cryoptop->getPlaceHolder()) ?>"
        <?= $Grid->Day3Cryoptop->editAttributes() ?>>
        <?= $Grid->Day3Cryoptop->selectOptionListHtml("x{$Grid->RowIndex}_Day3Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Cryoptop']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Cryoptop", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3Cryoptop">
<span<?= $Grid->Day3Cryoptop->viewAttributes() ?>>
<?= $Grid->Day3Cryoptop->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Cryoptop" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3Cryoptop" value="<?= HtmlEncode($Grid->Day3Cryoptop->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Cryoptop" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3Cryoptop" value="<?= HtmlEncode($Grid->Day3Cryoptop->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day3End->Visible) { // Day3End ?>
        <td data-name="Day3End" <?= $Grid->Day3End->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3End" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3End"
        name="x<?= $Grid->RowIndex ?>_Day3End"
        class="form-control ew-select<?= $Grid->Day3End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3End"
        data-table="ivf_embryology_chart"
        data-field="x_Day3End"
        data-value-separator="<?= $Grid->Day3End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3End->getPlaceHolder()) ?>"
        <?= $Grid->Day3End->editAttributes() ?>>
        <?= $Grid->Day3End->selectOptionListHtml("x{$Grid->RowIndex}_Day3End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3End" id="o<?= $Grid->RowIndex ?>_Day3End" value="<?= HtmlEncode($Grid->Day3End->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3End" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3End"
        name="x<?= $Grid->RowIndex ?>_Day3End"
        class="form-control ew-select<?= $Grid->Day3End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3End"
        data-table="ivf_embryology_chart"
        data-field="x_Day3End"
        data-value-separator="<?= $Grid->Day3End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3End->getPlaceHolder()) ?>"
        <?= $Grid->Day3End->editAttributes() ?>>
        <?= $Grid->Day3End->selectOptionListHtml("x{$Grid->RowIndex}_Day3End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day3End">
<span<?= $Grid->Day3End->viewAttributes() ?>>
<?= $Grid->Day3End->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3End" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day3End" value="<?= HtmlEncode($Grid->Day3End->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3End" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day3End" value="<?= HtmlEncode($Grid->Day3End->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day4SiNo->Visible) { // Day4SiNo ?>
        <td data-name="Day4SiNo" <?= $Grid->Day4SiNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4SiNo" class="form-group">
<input type="<?= $Grid->Day4SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?= $Grid->RowIndex ?>_Day4SiNo" id="x<?= $Grid->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4SiNo->getPlaceHolder()) ?>" value="<?= $Grid->Day4SiNo->EditValue ?>"<?= $Grid->Day4SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4SiNo" id="o<?= $Grid->RowIndex ?>_Day4SiNo" value="<?= HtmlEncode($Grid->Day4SiNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4SiNo" class="form-group">
<input type="<?= $Grid->Day4SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?= $Grid->RowIndex ?>_Day4SiNo" id="x<?= $Grid->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4SiNo->getPlaceHolder()) ?>" value="<?= $Grid->Day4SiNo->EditValue ?>"<?= $Grid->Day4SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4SiNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4SiNo">
<span<?= $Grid->Day4SiNo->viewAttributes() ?>>
<?= $Grid->Day4SiNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4SiNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4SiNo" value="<?= HtmlEncode($Grid->Day4SiNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4SiNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4SiNo" value="<?= HtmlEncode($Grid->Day4SiNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day4CellNo->Visible) { // Day4CellNo ?>
        <td data-name="Day4CellNo" <?= $Grid->Day4CellNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4CellNo" class="form-group">
<input type="<?= $Grid->Day4CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?= $Grid->RowIndex ?>_Day4CellNo" id="x<?= $Grid->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day4CellNo->EditValue ?>"<?= $Grid->Day4CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4CellNo" id="o<?= $Grid->RowIndex ?>_Day4CellNo" value="<?= HtmlEncode($Grid->Day4CellNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4CellNo" class="form-group">
<input type="<?= $Grid->Day4CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?= $Grid->RowIndex ?>_Day4CellNo" id="x<?= $Grid->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day4CellNo->EditValue ?>"<?= $Grid->Day4CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4CellNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4CellNo">
<span<?= $Grid->Day4CellNo->viewAttributes() ?>>
<?= $Grid->Day4CellNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4CellNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4CellNo" value="<?= HtmlEncode($Grid->Day4CellNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4CellNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4CellNo" value="<?= HtmlEncode($Grid->Day4CellNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day4Frag->Visible) { // Day4Frag ?>
        <td data-name="Day4Frag" <?= $Grid->Day4Frag->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Frag" class="form-group">
<input type="<?= $Grid->Day4Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?= $Grid->RowIndex ?>_Day4Frag" id="x<?= $Grid->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4Frag->getPlaceHolder()) ?>" value="<?= $Grid->Day4Frag->EditValue ?>"<?= $Grid->Day4Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4Frag->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4Frag" id="o<?= $Grid->RowIndex ?>_Day4Frag" value="<?= HtmlEncode($Grid->Day4Frag->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Frag" class="form-group">
<input type="<?= $Grid->Day4Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?= $Grid->RowIndex ?>_Day4Frag" id="x<?= $Grid->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4Frag->getPlaceHolder()) ?>" value="<?= $Grid->Day4Frag->EditValue ?>"<?= $Grid->Day4Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4Frag->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Frag">
<span<?= $Grid->Day4Frag->viewAttributes() ?>>
<?= $Grid->Day4Frag->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4Frag" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4Frag" value="<?= HtmlEncode($Grid->Day4Frag->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4Frag" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4Frag" value="<?= HtmlEncode($Grid->Day4Frag->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <td data-name="Day4Symmetry" <?= $Grid->Day4Symmetry->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Symmetry" class="form-group">
<input type="<?= $Grid->Day4Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?= $Grid->RowIndex ?>_Day4Symmetry" id="x<?= $Grid->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4Symmetry->getPlaceHolder()) ?>" value="<?= $Grid->Day4Symmetry->EditValue ?>"<?= $Grid->Day4Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4Symmetry->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4Symmetry" id="o<?= $Grid->RowIndex ?>_Day4Symmetry" value="<?= HtmlEncode($Grid->Day4Symmetry->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Symmetry" class="form-group">
<input type="<?= $Grid->Day4Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?= $Grid->RowIndex ?>_Day4Symmetry" id="x<?= $Grid->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4Symmetry->getPlaceHolder()) ?>" value="<?= $Grid->Day4Symmetry->EditValue ?>"<?= $Grid->Day4Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4Symmetry->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Symmetry">
<span<?= $Grid->Day4Symmetry->viewAttributes() ?>>
<?= $Grid->Day4Symmetry->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4Symmetry" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4Symmetry" value="<?= HtmlEncode($Grid->Day4Symmetry->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4Symmetry" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4Symmetry" value="<?= HtmlEncode($Grid->Day4Symmetry->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day4Grade->Visible) { // Day4Grade ?>
        <td data-name="Day4Grade" <?= $Grid->Day4Grade->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Grade" class="form-group">
<input type="<?= $Grid->Day4Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?= $Grid->RowIndex ?>_Day4Grade" id="x<?= $Grid->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4Grade->getPlaceHolder()) ?>" value="<?= $Grid->Day4Grade->EditValue ?>"<?= $Grid->Day4Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4Grade->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4Grade" id="o<?= $Grid->RowIndex ?>_Day4Grade" value="<?= HtmlEncode($Grid->Day4Grade->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Grade" class="form-group">
<input type="<?= $Grid->Day4Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?= $Grid->RowIndex ?>_Day4Grade" id="x<?= $Grid->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4Grade->getPlaceHolder()) ?>" value="<?= $Grid->Day4Grade->EditValue ?>"<?= $Grid->Day4Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4Grade->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Grade">
<span<?= $Grid->Day4Grade->viewAttributes() ?>>
<?= $Grid->Day4Grade->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4Grade" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4Grade" value="<?= HtmlEncode($Grid->Day4Grade->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4Grade" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4Grade" value="<?= HtmlEncode($Grid->Day4Grade->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <td data-name="Day4Cryoptop" <?= $Grid->Day4Cryoptop->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Cryoptop" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day4Cryoptop"
        name="x<?= $Grid->RowIndex ?>_Day4Cryoptop"
        class="form-control ew-select<?= $Grid->Day4Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day4Cryoptop"
        data-value-separator="<?= $Grid->Day4Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day4Cryoptop->getPlaceHolder()) ?>"
        <?= $Grid->Day4Cryoptop->editAttributes() ?>>
        <?= $Grid->Day4Cryoptop->selectOptionListHtml("x{$Grid->RowIndex}_Day4Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day4Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4Cryoptop']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day4Cryoptop", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4Cryoptop" id="o<?= $Grid->RowIndex ?>_Day4Cryoptop" value="<?= HtmlEncode($Grid->Day4Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Cryoptop" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day4Cryoptop"
        name="x<?= $Grid->RowIndex ?>_Day4Cryoptop"
        class="form-control ew-select<?= $Grid->Day4Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day4Cryoptop"
        data-value-separator="<?= $Grid->Day4Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day4Cryoptop->getPlaceHolder()) ?>"
        <?= $Grid->Day4Cryoptop->editAttributes() ?>>
        <?= $Grid->Day4Cryoptop->selectOptionListHtml("x{$Grid->RowIndex}_Day4Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day4Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4Cryoptop']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day4Cryoptop", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4Cryoptop">
<span<?= $Grid->Day4Cryoptop->viewAttributes() ?>>
<?= $Grid->Day4Cryoptop->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4Cryoptop" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4Cryoptop" value="<?= HtmlEncode($Grid->Day4Cryoptop->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4Cryoptop" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4Cryoptop" value="<?= HtmlEncode($Grid->Day4Cryoptop->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day4End->Visible) { // Day4End ?>
        <td data-name="Day4End" <?= $Grid->Day4End->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4End" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day4End"
        name="x<?= $Grid->RowIndex ?>_Day4End"
        class="form-control ew-select<?= $Grid->Day4End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4End"
        data-table="ivf_embryology_chart"
        data-field="x_Day4End"
        data-value-separator="<?= $Grid->Day4End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day4End->getPlaceHolder()) ?>"
        <?= $Grid->Day4End->editAttributes() ?>>
        <?= $Grid->Day4End->selectOptionListHtml("x{$Grid->RowIndex}_Day4End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day4End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day4End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4End" id="o<?= $Grid->RowIndex ?>_Day4End" value="<?= HtmlEncode($Grid->Day4End->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4End" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day4End"
        name="x<?= $Grid->RowIndex ?>_Day4End"
        class="form-control ew-select<?= $Grid->Day4End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4End"
        data-table="ivf_embryology_chart"
        data-field="x_Day4End"
        data-value-separator="<?= $Grid->Day4End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day4End->getPlaceHolder()) ?>"
        <?= $Grid->Day4End->editAttributes() ?>>
        <?= $Grid->Day4End->selectOptionListHtml("x{$Grid->RowIndex}_Day4End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day4End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day4End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day4End">
<span<?= $Grid->Day4End->viewAttributes() ?>>
<?= $Grid->Day4End->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4End" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day4End" value="<?= HtmlEncode($Grid->Day4End->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4End" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day4End" value="<?= HtmlEncode($Grid->Day4End->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day5CellNo->Visible) { // Day5CellNo ?>
        <td data-name="Day5CellNo" <?= $Grid->Day5CellNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5CellNo" class="form-group">
<input type="<?= $Grid->Day5CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?= $Grid->RowIndex ?>_Day5CellNo" id="x<?= $Grid->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day5CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day5CellNo->EditValue ?>"<?= $Grid->Day5CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day5CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5CellNo" id="o<?= $Grid->RowIndex ?>_Day5CellNo" value="<?= HtmlEncode($Grid->Day5CellNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5CellNo" class="form-group">
<input type="<?= $Grid->Day5CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?= $Grid->RowIndex ?>_Day5CellNo" id="x<?= $Grid->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day5CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day5CellNo->EditValue ?>"<?= $Grid->Day5CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day5CellNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5CellNo">
<span<?= $Grid->Day5CellNo->viewAttributes() ?>>
<?= $Grid->Day5CellNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5CellNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5CellNo" value="<?= HtmlEncode($Grid->Day5CellNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5CellNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5CellNo" value="<?= HtmlEncode($Grid->Day5CellNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day5ICM->Visible) { // Day5ICM ?>
        <td data-name="Day5ICM" <?= $Grid->Day5ICM->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5ICM" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5ICM"
        name="x<?= $Grid->RowIndex ?>_Day5ICM"
        class="form-control ew-select<?= $Grid->Day5ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day5ICM"
        data-value-separator="<?= $Grid->Day5ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5ICM->getPlaceHolder()) ?>"
        <?= $Grid->Day5ICM->editAttributes() ?>>
        <?= $Grid->Day5ICM->selectOptionListHtml("x{$Grid->RowIndex}_Day5ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5ICM']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5ICM", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5ICM" id="o<?= $Grid->RowIndex ?>_Day5ICM" value="<?= HtmlEncode($Grid->Day5ICM->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5ICM" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5ICM"
        name="x<?= $Grid->RowIndex ?>_Day5ICM"
        class="form-control ew-select<?= $Grid->Day5ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day5ICM"
        data-value-separator="<?= $Grid->Day5ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5ICM->getPlaceHolder()) ?>"
        <?= $Grid->Day5ICM->editAttributes() ?>>
        <?= $Grid->Day5ICM->selectOptionListHtml("x{$Grid->RowIndex}_Day5ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5ICM']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5ICM", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5ICM">
<span<?= $Grid->Day5ICM->viewAttributes() ?>>
<?= $Grid->Day5ICM->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5ICM" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5ICM" value="<?= HtmlEncode($Grid->Day5ICM->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5ICM" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5ICM" value="<?= HtmlEncode($Grid->Day5ICM->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day5TE->Visible) { // Day5TE ?>
        <td data-name="Day5TE" <?= $Grid->Day5TE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5TE" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5TE"
        name="x<?= $Grid->RowIndex ?>_Day5TE"
        class="form-control ew-select<?= $Grid->Day5TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day5TE"
        data-value-separator="<?= $Grid->Day5TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5TE->getPlaceHolder()) ?>"
        <?= $Grid->Day5TE->editAttributes() ?>>
        <?= $Grid->Day5TE->selectOptionListHtml("x{$Grid->RowIndex}_Day5TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5TE']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5TE", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5TE" id="o<?= $Grid->RowIndex ?>_Day5TE" value="<?= HtmlEncode($Grid->Day5TE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5TE" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5TE"
        name="x<?= $Grid->RowIndex ?>_Day5TE"
        class="form-control ew-select<?= $Grid->Day5TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day5TE"
        data-value-separator="<?= $Grid->Day5TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5TE->getPlaceHolder()) ?>"
        <?= $Grid->Day5TE->editAttributes() ?>>
        <?= $Grid->Day5TE->selectOptionListHtml("x{$Grid->RowIndex}_Day5TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5TE']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5TE", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5TE">
<span<?= $Grid->Day5TE->viewAttributes() ?>>
<?= $Grid->Day5TE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5TE" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5TE" value="<?= HtmlEncode($Grid->Day5TE->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5TE" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5TE" value="<?= HtmlEncode($Grid->Day5TE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day5Observation->Visible) { // Day5Observation ?>
        <td data-name="Day5Observation" <?= $Grid->Day5Observation->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Observation" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Observation"
        name="x<?= $Grid->RowIndex ?>_Day5Observation"
        class="form-control ew-select<?= $Grid->Day5Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Observation"
        data-value-separator="<?= $Grid->Day5Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Observation->getPlaceHolder()) ?>"
        <?= $Grid->Day5Observation->editAttributes() ?>>
        <?= $Grid->Day5Observation->selectOptionListHtml("x{$Grid->RowIndex}_Day5Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Observation']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Observation", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5Observation" id="o<?= $Grid->RowIndex ?>_Day5Observation" value="<?= HtmlEncode($Grid->Day5Observation->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Observation" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Observation"
        name="x<?= $Grid->RowIndex ?>_Day5Observation"
        class="form-control ew-select<?= $Grid->Day5Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Observation"
        data-value-separator="<?= $Grid->Day5Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Observation->getPlaceHolder()) ?>"
        <?= $Grid->Day5Observation->editAttributes() ?>>
        <?= $Grid->Day5Observation->selectOptionListHtml("x{$Grid->RowIndex}_Day5Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Observation']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Observation", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Observation">
<span<?= $Grid->Day5Observation->viewAttributes() ?>>
<?= $Grid->Day5Observation->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5Observation" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5Observation" value="<?= HtmlEncode($Grid->Day5Observation->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5Observation" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5Observation" value="<?= HtmlEncode($Grid->Day5Observation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <td data-name="Day5Collapsed" <?= $Grid->Day5Collapsed->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Collapsed" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Collapsed"
        name="x<?= $Grid->RowIndex ?>_Day5Collapsed"
        class="form-control ew-select<?= $Grid->Day5Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Collapsed"
        data-value-separator="<?= $Grid->Day5Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Collapsed->getPlaceHolder()) ?>"
        <?= $Grid->Day5Collapsed->editAttributes() ?>>
        <?= $Grid->Day5Collapsed->selectOptionListHtml("x{$Grid->RowIndex}_Day5Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Collapsed']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Collapsed", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5Collapsed" id="o<?= $Grid->RowIndex ?>_Day5Collapsed" value="<?= HtmlEncode($Grid->Day5Collapsed->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Collapsed" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Collapsed"
        name="x<?= $Grid->RowIndex ?>_Day5Collapsed"
        class="form-control ew-select<?= $Grid->Day5Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Collapsed"
        data-value-separator="<?= $Grid->Day5Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Collapsed->getPlaceHolder()) ?>"
        <?= $Grid->Day5Collapsed->editAttributes() ?>>
        <?= $Grid->Day5Collapsed->selectOptionListHtml("x{$Grid->RowIndex}_Day5Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Collapsed']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Collapsed", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Collapsed">
<span<?= $Grid->Day5Collapsed->viewAttributes() ?>>
<?= $Grid->Day5Collapsed->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5Collapsed" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5Collapsed" value="<?= HtmlEncode($Grid->Day5Collapsed->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5Collapsed" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5Collapsed" value="<?= HtmlEncode($Grid->Day5Collapsed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <td data-name="Day5Vacoulles" <?= $Grid->Day5Vacoulles->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Vacoulles" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Vacoulles"
        name="x<?= $Grid->RowIndex ?>_Day5Vacoulles"
        class="form-control ew-select<?= $Grid->Day5Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Vacoulles"
        data-value-separator="<?= $Grid->Day5Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Vacoulles->getPlaceHolder()) ?>"
        <?= $Grid->Day5Vacoulles->editAttributes() ?>>
        <?= $Grid->Day5Vacoulles->selectOptionListHtml("x{$Grid->RowIndex}_Day5Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Vacoulles']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Vacoulles", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5Vacoulles" id="o<?= $Grid->RowIndex ?>_Day5Vacoulles" value="<?= HtmlEncode($Grid->Day5Vacoulles->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Vacoulles" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Vacoulles"
        name="x<?= $Grid->RowIndex ?>_Day5Vacoulles"
        class="form-control ew-select<?= $Grid->Day5Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Vacoulles"
        data-value-separator="<?= $Grid->Day5Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Vacoulles->getPlaceHolder()) ?>"
        <?= $Grid->Day5Vacoulles->editAttributes() ?>>
        <?= $Grid->Day5Vacoulles->selectOptionListHtml("x{$Grid->RowIndex}_Day5Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Vacoulles']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Vacoulles", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Vacoulles">
<span<?= $Grid->Day5Vacoulles->viewAttributes() ?>>
<?= $Grid->Day5Vacoulles->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5Vacoulles" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5Vacoulles" value="<?= HtmlEncode($Grid->Day5Vacoulles->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5Vacoulles" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5Vacoulles" value="<?= HtmlEncode($Grid->Day5Vacoulles->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day5Grade->Visible) { // Day5Grade ?>
        <td data-name="Day5Grade" <?= $Grid->Day5Grade->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Grade" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Grade"
        name="x<?= $Grid->RowIndex ?>_Day5Grade"
        class="form-control ew-select<?= $Grid->Day5Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Grade"
        data-value-separator="<?= $Grid->Day5Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Grade->getPlaceHolder()) ?>"
        <?= $Grid->Day5Grade->editAttributes() ?>>
        <?= $Grid->Day5Grade->selectOptionListHtml("x{$Grid->RowIndex}_Day5Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Grade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Grade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5Grade" id="o<?= $Grid->RowIndex ?>_Day5Grade" value="<?= HtmlEncode($Grid->Day5Grade->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Grade" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Grade"
        name="x<?= $Grid->RowIndex ?>_Day5Grade"
        class="form-control ew-select<?= $Grid->Day5Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Grade"
        data-value-separator="<?= $Grid->Day5Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Grade->getPlaceHolder()) ?>"
        <?= $Grid->Day5Grade->editAttributes() ?>>
        <?= $Grid->Day5Grade->selectOptionListHtml("x{$Grid->RowIndex}_Day5Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Grade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Grade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day5Grade">
<span<?= $Grid->Day5Grade->viewAttributes() ?>>
<?= $Grid->Day5Grade->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5Grade" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day5Grade" value="<?= HtmlEncode($Grid->Day5Grade->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5Grade" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day5Grade" value="<?= HtmlEncode($Grid->Day5Grade->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day6CellNo->Visible) { // Day6CellNo ?>
        <td data-name="Day6CellNo" <?= $Grid->Day6CellNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6CellNo" class="form-group">
<input type="<?= $Grid->Day6CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?= $Grid->RowIndex ?>_Day6CellNo" id="x<?= $Grid->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day6CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day6CellNo->EditValue ?>"<?= $Grid->Day6CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day6CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6CellNo" id="o<?= $Grid->RowIndex ?>_Day6CellNo" value="<?= HtmlEncode($Grid->Day6CellNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6CellNo" class="form-group">
<input type="<?= $Grid->Day6CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?= $Grid->RowIndex ?>_Day6CellNo" id="x<?= $Grid->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day6CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day6CellNo->EditValue ?>"<?= $Grid->Day6CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day6CellNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6CellNo">
<span<?= $Grid->Day6CellNo->viewAttributes() ?>>
<?= $Grid->Day6CellNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6CellNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6CellNo" value="<?= HtmlEncode($Grid->Day6CellNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6CellNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6CellNo" value="<?= HtmlEncode($Grid->Day6CellNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day6ICM->Visible) { // Day6ICM ?>
        <td data-name="Day6ICM" <?= $Grid->Day6ICM->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6ICM" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6ICM"
        name="x<?= $Grid->RowIndex ?>_Day6ICM"
        class="form-control ew-select<?= $Grid->Day6ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day6ICM"
        data-value-separator="<?= $Grid->Day6ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6ICM->getPlaceHolder()) ?>"
        <?= $Grid->Day6ICM->editAttributes() ?>>
        <?= $Grid->Day6ICM->selectOptionListHtml("x{$Grid->RowIndex}_Day6ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6ICM']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6ICM", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6ICM" id="o<?= $Grid->RowIndex ?>_Day6ICM" value="<?= HtmlEncode($Grid->Day6ICM->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6ICM" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6ICM"
        name="x<?= $Grid->RowIndex ?>_Day6ICM"
        class="form-control ew-select<?= $Grid->Day6ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day6ICM"
        data-value-separator="<?= $Grid->Day6ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6ICM->getPlaceHolder()) ?>"
        <?= $Grid->Day6ICM->editAttributes() ?>>
        <?= $Grid->Day6ICM->selectOptionListHtml("x{$Grid->RowIndex}_Day6ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6ICM']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6ICM", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6ICM">
<span<?= $Grid->Day6ICM->viewAttributes() ?>>
<?= $Grid->Day6ICM->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6ICM" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6ICM" value="<?= HtmlEncode($Grid->Day6ICM->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6ICM" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6ICM" value="<?= HtmlEncode($Grid->Day6ICM->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day6TE->Visible) { // Day6TE ?>
        <td data-name="Day6TE" <?= $Grid->Day6TE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6TE" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6TE"
        name="x<?= $Grid->RowIndex ?>_Day6TE"
        class="form-control ew-select<?= $Grid->Day6TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day6TE"
        data-value-separator="<?= $Grid->Day6TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6TE->getPlaceHolder()) ?>"
        <?= $Grid->Day6TE->editAttributes() ?>>
        <?= $Grid->Day6TE->selectOptionListHtml("x{$Grid->RowIndex}_Day6TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6TE']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6TE", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6TE" id="o<?= $Grid->RowIndex ?>_Day6TE" value="<?= HtmlEncode($Grid->Day6TE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6TE" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6TE"
        name="x<?= $Grid->RowIndex ?>_Day6TE"
        class="form-control ew-select<?= $Grid->Day6TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day6TE"
        data-value-separator="<?= $Grid->Day6TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6TE->getPlaceHolder()) ?>"
        <?= $Grid->Day6TE->editAttributes() ?>>
        <?= $Grid->Day6TE->selectOptionListHtml("x{$Grid->RowIndex}_Day6TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6TE']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6TE", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6TE">
<span<?= $Grid->Day6TE->viewAttributes() ?>>
<?= $Grid->Day6TE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6TE" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6TE" value="<?= HtmlEncode($Grid->Day6TE->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6TE" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6TE" value="<?= HtmlEncode($Grid->Day6TE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day6Observation->Visible) { // Day6Observation ?>
        <td data-name="Day6Observation" <?= $Grid->Day6Observation->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Observation" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Observation"
        name="x<?= $Grid->RowIndex ?>_Day6Observation"
        class="form-control ew-select<?= $Grid->Day6Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Observation"
        data-value-separator="<?= $Grid->Day6Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Observation->getPlaceHolder()) ?>"
        <?= $Grid->Day6Observation->editAttributes() ?>>
        <?= $Grid->Day6Observation->selectOptionListHtml("x{$Grid->RowIndex}_Day6Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Observation']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Observation", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6Observation" id="o<?= $Grid->RowIndex ?>_Day6Observation" value="<?= HtmlEncode($Grid->Day6Observation->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Observation" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Observation"
        name="x<?= $Grid->RowIndex ?>_Day6Observation"
        class="form-control ew-select<?= $Grid->Day6Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Observation"
        data-value-separator="<?= $Grid->Day6Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Observation->getPlaceHolder()) ?>"
        <?= $Grid->Day6Observation->editAttributes() ?>>
        <?= $Grid->Day6Observation->selectOptionListHtml("x{$Grid->RowIndex}_Day6Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Observation']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Observation", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Observation">
<span<?= $Grid->Day6Observation->viewAttributes() ?>>
<?= $Grid->Day6Observation->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6Observation" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6Observation" value="<?= HtmlEncode($Grid->Day6Observation->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6Observation" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6Observation" value="<?= HtmlEncode($Grid->Day6Observation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <td data-name="Day6Collapsed" <?= $Grid->Day6Collapsed->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Collapsed" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Collapsed"
        name="x<?= $Grid->RowIndex ?>_Day6Collapsed"
        class="form-control ew-select<?= $Grid->Day6Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Collapsed"
        data-value-separator="<?= $Grid->Day6Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Collapsed->getPlaceHolder()) ?>"
        <?= $Grid->Day6Collapsed->editAttributes() ?>>
        <?= $Grid->Day6Collapsed->selectOptionListHtml("x{$Grid->RowIndex}_Day6Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Collapsed']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Collapsed", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6Collapsed" id="o<?= $Grid->RowIndex ?>_Day6Collapsed" value="<?= HtmlEncode($Grid->Day6Collapsed->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Collapsed" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Collapsed"
        name="x<?= $Grid->RowIndex ?>_Day6Collapsed"
        class="form-control ew-select<?= $Grid->Day6Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Collapsed"
        data-value-separator="<?= $Grid->Day6Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Collapsed->getPlaceHolder()) ?>"
        <?= $Grid->Day6Collapsed->editAttributes() ?>>
        <?= $Grid->Day6Collapsed->selectOptionListHtml("x{$Grid->RowIndex}_Day6Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Collapsed']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Collapsed", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Collapsed">
<span<?= $Grid->Day6Collapsed->viewAttributes() ?>>
<?= $Grid->Day6Collapsed->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6Collapsed" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6Collapsed" value="<?= HtmlEncode($Grid->Day6Collapsed->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6Collapsed" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6Collapsed" value="<?= HtmlEncode($Grid->Day6Collapsed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <td data-name="Day6Vacoulles" <?= $Grid->Day6Vacoulles->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Vacoulles" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Vacoulles"
        name="x<?= $Grid->RowIndex ?>_Day6Vacoulles"
        class="form-control ew-select<?= $Grid->Day6Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Vacoulles"
        data-value-separator="<?= $Grid->Day6Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Vacoulles->getPlaceHolder()) ?>"
        <?= $Grid->Day6Vacoulles->editAttributes() ?>>
        <?= $Grid->Day6Vacoulles->selectOptionListHtml("x{$Grid->RowIndex}_Day6Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Vacoulles']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Vacoulles", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6Vacoulles" id="o<?= $Grid->RowIndex ?>_Day6Vacoulles" value="<?= HtmlEncode($Grid->Day6Vacoulles->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Vacoulles" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Vacoulles"
        name="x<?= $Grid->RowIndex ?>_Day6Vacoulles"
        class="form-control ew-select<?= $Grid->Day6Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Vacoulles"
        data-value-separator="<?= $Grid->Day6Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Vacoulles->getPlaceHolder()) ?>"
        <?= $Grid->Day6Vacoulles->editAttributes() ?>>
        <?= $Grid->Day6Vacoulles->selectOptionListHtml("x{$Grid->RowIndex}_Day6Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Vacoulles']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Vacoulles", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Vacoulles">
<span<?= $Grid->Day6Vacoulles->viewAttributes() ?>>
<?= $Grid->Day6Vacoulles->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6Vacoulles" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6Vacoulles" value="<?= HtmlEncode($Grid->Day6Vacoulles->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6Vacoulles" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6Vacoulles" value="<?= HtmlEncode($Grid->Day6Vacoulles->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day6Grade->Visible) { // Day6Grade ?>
        <td data-name="Day6Grade" <?= $Grid->Day6Grade->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Grade" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Grade"
        name="x<?= $Grid->RowIndex ?>_Day6Grade"
        class="form-control ew-select<?= $Grid->Day6Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Grade"
        data-value-separator="<?= $Grid->Day6Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Grade->getPlaceHolder()) ?>"
        <?= $Grid->Day6Grade->editAttributes() ?>>
        <?= $Grid->Day6Grade->selectOptionListHtml("x{$Grid->RowIndex}_Day6Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Grade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Grade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6Grade" id="o<?= $Grid->RowIndex ?>_Day6Grade" value="<?= HtmlEncode($Grid->Day6Grade->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Grade" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Grade"
        name="x<?= $Grid->RowIndex ?>_Day6Grade"
        class="form-control ew-select<?= $Grid->Day6Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Grade"
        data-value-separator="<?= $Grid->Day6Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Grade->getPlaceHolder()) ?>"
        <?= $Grid->Day6Grade->editAttributes() ?>>
        <?= $Grid->Day6Grade->selectOptionListHtml("x{$Grid->RowIndex}_Day6Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Grade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Grade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Grade">
<span<?= $Grid->Day6Grade->viewAttributes() ?>>
<?= $Grid->Day6Grade->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6Grade" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6Grade" value="<?= HtmlEncode($Grid->Day6Grade->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6Grade" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6Grade" value="<?= HtmlEncode($Grid->Day6Grade->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <td data-name="Day6Cryoptop" <?= $Grid->Day6Cryoptop->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Cryoptop" class="form-group">
<input type="<?= $Grid->Day6Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?= $Grid->RowIndex ?>_Day6Cryoptop" id="x<?= $Grid->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day6Cryoptop->getPlaceHolder()) ?>" value="<?= $Grid->Day6Cryoptop->EditValue ?>"<?= $Grid->Day6Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day6Cryoptop->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6Cryoptop" id="o<?= $Grid->RowIndex ?>_Day6Cryoptop" value="<?= HtmlEncode($Grid->Day6Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Cryoptop" class="form-group">
<input type="<?= $Grid->Day6Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?= $Grid->RowIndex ?>_Day6Cryoptop" id="x<?= $Grid->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day6Cryoptop->getPlaceHolder()) ?>" value="<?= $Grid->Day6Cryoptop->EditValue ?>"<?= $Grid->Day6Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day6Cryoptop->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day6Cryoptop">
<span<?= $Grid->Day6Cryoptop->viewAttributes() ?>>
<?= $Grid->Day6Cryoptop->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6Cryoptop" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day6Cryoptop" value="<?= HtmlEncode($Grid->Day6Cryoptop->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6Cryoptop" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day6Cryoptop" value="<?= HtmlEncode($Grid->Day6Cryoptop->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EndSiNo->Visible) { // EndSiNo ?>
        <td data-name="EndSiNo" <?= $Grid->EndSiNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndSiNo" class="form-group">
<input type="<?= $Grid->EndSiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?= $Grid->RowIndex ?>_EndSiNo" id="x<?= $Grid->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->EndSiNo->getPlaceHolder()) ?>" value="<?= $Grid->EndSiNo->EditValue ?>"<?= $Grid->EndSiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EndSiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EndSiNo" id="o<?= $Grid->RowIndex ?>_EndSiNo" value="<?= HtmlEncode($Grid->EndSiNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndSiNo" class="form-group">
<input type="<?= $Grid->EndSiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?= $Grid->RowIndex ?>_EndSiNo" id="x<?= $Grid->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->EndSiNo->getPlaceHolder()) ?>" value="<?= $Grid->EndSiNo->EditValue ?>"<?= $Grid->EndSiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EndSiNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndSiNo">
<span<?= $Grid->EndSiNo->viewAttributes() ?>>
<?= $Grid->EndSiNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_EndSiNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_EndSiNo" value="<?= HtmlEncode($Grid->EndSiNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_EndSiNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_EndSiNo" value="<?= HtmlEncode($Grid->EndSiNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EndingDay->Visible) { // EndingDay ?>
        <td data-name="EndingDay" <?= $Grid->EndingDay->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingDay" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_EndingDay"
        name="x<?= $Grid->RowIndex ?>_EndingDay"
        class="form-control ew-select<?= $Grid->EndingDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingDay"
        data-table="ivf_embryology_chart"
        data-field="x_EndingDay"
        data-value-separator="<?= $Grid->EndingDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EndingDay->getPlaceHolder()) ?>"
        <?= $Grid->EndingDay->editAttributes() ?>>
        <?= $Grid->EndingDay->selectOptionListHtml("x{$Grid->RowIndex}_EndingDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EndingDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingDay']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EndingDay", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EndingDay" id="o<?= $Grid->RowIndex ?>_EndingDay" value="<?= HtmlEncode($Grid->EndingDay->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingDay" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_EndingDay"
        name="x<?= $Grid->RowIndex ?>_EndingDay"
        class="form-control ew-select<?= $Grid->EndingDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingDay"
        data-table="ivf_embryology_chart"
        data-field="x_EndingDay"
        data-value-separator="<?= $Grid->EndingDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EndingDay->getPlaceHolder()) ?>"
        <?= $Grid->EndingDay->editAttributes() ?>>
        <?= $Grid->EndingDay->selectOptionListHtml("x{$Grid->RowIndex}_EndingDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EndingDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingDay']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EndingDay", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingDay">
<span<?= $Grid->EndingDay->viewAttributes() ?>>
<?= $Grid->EndingDay->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_EndingDay" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_EndingDay" value="<?= HtmlEncode($Grid->EndingDay->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_EndingDay" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_EndingDay" value="<?= HtmlEncode($Grid->EndingDay->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EndingCellStage->Visible) { // EndingCellStage ?>
        <td data-name="EndingCellStage" <?= $Grid->EndingCellStage->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingCellStage" class="form-group">
<input type="<?= $Grid->EndingCellStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?= $Grid->RowIndex ?>_EndingCellStage" id="x<?= $Grid->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->EndingCellStage->getPlaceHolder()) ?>" value="<?= $Grid->EndingCellStage->EditValue ?>"<?= $Grid->EndingCellStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EndingCellStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EndingCellStage" id="o<?= $Grid->RowIndex ?>_EndingCellStage" value="<?= HtmlEncode($Grid->EndingCellStage->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingCellStage" class="form-group">
<input type="<?= $Grid->EndingCellStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?= $Grid->RowIndex ?>_EndingCellStage" id="x<?= $Grid->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->EndingCellStage->getPlaceHolder()) ?>" value="<?= $Grid->EndingCellStage->EditValue ?>"<?= $Grid->EndingCellStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EndingCellStage->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingCellStage">
<span<?= $Grid->EndingCellStage->viewAttributes() ?>>
<?= $Grid->EndingCellStage->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_EndingCellStage" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_EndingCellStage" value="<?= HtmlEncode($Grid->EndingCellStage->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_EndingCellStage" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_EndingCellStage" value="<?= HtmlEncode($Grid->EndingCellStage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EndingGrade->Visible) { // EndingGrade ?>
        <td data-name="EndingGrade" <?= $Grid->EndingGrade->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingGrade" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_EndingGrade"
        name="x<?= $Grid->RowIndex ?>_EndingGrade"
        class="form-control ew-select<?= $Grid->EndingGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingGrade"
        data-table="ivf_embryology_chart"
        data-field="x_EndingGrade"
        data-value-separator="<?= $Grid->EndingGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EndingGrade->getPlaceHolder()) ?>"
        <?= $Grid->EndingGrade->editAttributes() ?>>
        <?= $Grid->EndingGrade->selectOptionListHtml("x{$Grid->RowIndex}_EndingGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EndingGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingGrade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EndingGrade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EndingGrade" id="o<?= $Grid->RowIndex ?>_EndingGrade" value="<?= HtmlEncode($Grid->EndingGrade->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingGrade" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_EndingGrade"
        name="x<?= $Grid->RowIndex ?>_EndingGrade"
        class="form-control ew-select<?= $Grid->EndingGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingGrade"
        data-table="ivf_embryology_chart"
        data-field="x_EndingGrade"
        data-value-separator="<?= $Grid->EndingGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EndingGrade->getPlaceHolder()) ?>"
        <?= $Grid->EndingGrade->editAttributes() ?>>
        <?= $Grid->EndingGrade->selectOptionListHtml("x{$Grid->RowIndex}_EndingGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EndingGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingGrade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EndingGrade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingGrade">
<span<?= $Grid->EndingGrade->viewAttributes() ?>>
<?= $Grid->EndingGrade->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_EndingGrade" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_EndingGrade" value="<?= HtmlEncode($Grid->EndingGrade->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_EndingGrade" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_EndingGrade" value="<?= HtmlEncode($Grid->EndingGrade->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EndingState->Visible) { // EndingState ?>
        <td data-name="EndingState" <?= $Grid->EndingState->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingState" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_EndingState"
        name="x<?= $Grid->RowIndex ?>_EndingState"
        class="form-control ew-select<?= $Grid->EndingState->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingState"
        data-table="ivf_embryology_chart"
        data-field="x_EndingState"
        data-value-separator="<?= $Grid->EndingState->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EndingState->getPlaceHolder()) ?>"
        <?= $Grid->EndingState->editAttributes() ?>>
        <?= $Grid->EndingState->selectOptionListHtml("x{$Grid->RowIndex}_EndingState") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EndingState->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingState']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EndingState", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingState", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingState.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingState.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EndingState" id="o<?= $Grid->RowIndex ?>_EndingState" value="<?= HtmlEncode($Grid->EndingState->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingState" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_EndingState"
        name="x<?= $Grid->RowIndex ?>_EndingState"
        class="form-control ew-select<?= $Grid->EndingState->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingState"
        data-table="ivf_embryology_chart"
        data-field="x_EndingState"
        data-value-separator="<?= $Grid->EndingState->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EndingState->getPlaceHolder()) ?>"
        <?= $Grid->EndingState->editAttributes() ?>>
        <?= $Grid->EndingState->selectOptionListHtml("x{$Grid->RowIndex}_EndingState") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EndingState->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingState']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EndingState", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingState", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingState.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingState.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_EndingState">
<span<?= $Grid->EndingState->viewAttributes() ?>>
<?= $Grid->EndingState->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_EndingState" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_EndingState" value="<?= HtmlEncode($Grid->EndingState->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_EndingState" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_EndingState" value="<?= HtmlEncode($Grid->EndingState->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Grid->TidNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_TidNo" class="form-group">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_TidNo" class="form-group">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TidNo" id="o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_TidNo" class="form-group">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<?= $Grid->TidNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_TidNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_TidNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DidNO->Visible) { // DidNO ?>
        <td data-name="DidNO" <?= $Grid->DidNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->DidNO->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_DidNO" class="form-group">
<span<?= $Grid->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DidNO->getDisplayValue($Grid->DidNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DidNO" name="x<?= $Grid->RowIndex ?>_DidNO" value="<?= HtmlEncode($Grid->DidNO->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_DidNO" class="form-group">
<input type="<?= $Grid->DidNO->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x<?= $Grid->RowIndex ?>_DidNO" id="x<?= $Grid->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DidNO->getPlaceHolder()) ?>" value="<?= $Grid->DidNO->EditValue ?>"<?= $Grid->DidNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DidNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DidNO" id="o<?= $Grid->RowIndex ?>_DidNO" value="<?= HtmlEncode($Grid->DidNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_DidNO" class="form-group">
<span<?= $Grid->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DidNO->getDisplayValue($Grid->DidNO->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DidNO" id="x<?= $Grid->RowIndex ?>_DidNO" value="<?= HtmlEncode($Grid->DidNO->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_DidNO">
<span<?= $Grid->DidNO->viewAttributes() ?>>
<?= $Grid->DidNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_DidNO" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_DidNO" value="<?= HtmlEncode($Grid->DidNO->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_DidNO" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_DidNO" value="<?= HtmlEncode($Grid->DidNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <td data-name="ICSiIVFDateTime" <?= $Grid->ICSiIVFDateTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ICSiIVFDateTime" class="form-group">
<input type="<?= $Grid->ICSiIVFDateTime->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?= $Grid->RowIndex ?>_ICSiIVFDateTime" id="x<?= $Grid->RowIndex ?>_ICSiIVFDateTime" placeholder="<?= HtmlEncode($Grid->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?= $Grid->ICSiIVFDateTime->EditValue ?>"<?= $Grid->ICSiIVFDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ICSiIVFDateTime->getErrorMessage() ?></div>
<?php if (!$Grid->ICSiIVFDateTime->ReadOnly && !$Grid->ICSiIVFDateTime->Disabled && !isset($Grid->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($Grid->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ICSiIVFDateTime" id="o<?= $Grid->RowIndex ?>_ICSiIVFDateTime" value="<?= HtmlEncode($Grid->ICSiIVFDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ICSiIVFDateTime" class="form-group">
<input type="<?= $Grid->ICSiIVFDateTime->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?= $Grid->RowIndex ?>_ICSiIVFDateTime" id="x<?= $Grid->RowIndex ?>_ICSiIVFDateTime" placeholder="<?= HtmlEncode($Grid->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?= $Grid->ICSiIVFDateTime->EditValue ?>"<?= $Grid->ICSiIVFDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ICSiIVFDateTime->getErrorMessage() ?></div>
<?php if (!$Grid->ICSiIVFDateTime->ReadOnly && !$Grid->ICSiIVFDateTime->Disabled && !isset($Grid->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($Grid->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ICSiIVFDateTime">
<span<?= $Grid->ICSiIVFDateTime->viewAttributes() ?>>
<?= $Grid->ICSiIVFDateTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ICSiIVFDateTime" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ICSiIVFDateTime" value="<?= HtmlEncode($Grid->ICSiIVFDateTime->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ICSiIVFDateTime" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ICSiIVFDateTime" value="<?= HtmlEncode($Grid->ICSiIVFDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <td data-name="PrimaryEmbrologist" <?= $Grid->PrimaryEmbrologist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_PrimaryEmbrologist" class="form-group">
<input type="<?= $Grid->PrimaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?= $Grid->RowIndex ?>_PrimaryEmbrologist" id="x<?= $Grid->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Grid->PrimaryEmbrologist->EditValue ?>"<?= $Grid->PrimaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrimaryEmbrologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrimaryEmbrologist" id="o<?= $Grid->RowIndex ?>_PrimaryEmbrologist" value="<?= HtmlEncode($Grid->PrimaryEmbrologist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_PrimaryEmbrologist" class="form-group">
<input type="<?= $Grid->PrimaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?= $Grid->RowIndex ?>_PrimaryEmbrologist" id="x<?= $Grid->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Grid->PrimaryEmbrologist->EditValue ?>"<?= $Grid->PrimaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrimaryEmbrologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_PrimaryEmbrologist">
<span<?= $Grid->PrimaryEmbrologist->viewAttributes() ?>>
<?= $Grid->PrimaryEmbrologist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_PrimaryEmbrologist" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_PrimaryEmbrologist" value="<?= HtmlEncode($Grid->PrimaryEmbrologist->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_PrimaryEmbrologist" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_PrimaryEmbrologist" value="<?= HtmlEncode($Grid->PrimaryEmbrologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <td data-name="SecondaryEmbrologist" <?= $Grid->SecondaryEmbrologist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_SecondaryEmbrologist" class="form-group">
<input type="<?= $Grid->SecondaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?= $Grid->RowIndex ?>_SecondaryEmbrologist" id="x<?= $Grid->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Grid->SecondaryEmbrologist->EditValue ?>"<?= $Grid->SecondaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SecondaryEmbrologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SecondaryEmbrologist" id="o<?= $Grid->RowIndex ?>_SecondaryEmbrologist" value="<?= HtmlEncode($Grid->SecondaryEmbrologist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_SecondaryEmbrologist" class="form-group">
<input type="<?= $Grid->SecondaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?= $Grid->RowIndex ?>_SecondaryEmbrologist" id="x<?= $Grid->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Grid->SecondaryEmbrologist->EditValue ?>"<?= $Grid->SecondaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SecondaryEmbrologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_SecondaryEmbrologist">
<span<?= $Grid->SecondaryEmbrologist->viewAttributes() ?>>
<?= $Grid->SecondaryEmbrologist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_SecondaryEmbrologist" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_SecondaryEmbrologist" value="<?= HtmlEncode($Grid->SecondaryEmbrologist->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_SecondaryEmbrologist" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_SecondaryEmbrologist" value="<?= HtmlEncode($Grid->SecondaryEmbrologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator" <?= $Grid->Incubator->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Incubator" class="form-group">
<input type="<?= $Grid->Incubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?= $Grid->RowIndex ?>_Incubator" id="x<?= $Grid->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Incubator->getPlaceHolder()) ?>" value="<?= $Grid->Incubator->EditValue ?>"<?= $Grid->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Incubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Incubator" id="o<?= $Grid->RowIndex ?>_Incubator" value="<?= HtmlEncode($Grid->Incubator->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Incubator" class="form-group">
<input type="<?= $Grid->Incubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?= $Grid->RowIndex ?>_Incubator" id="x<?= $Grid->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Incubator->getPlaceHolder()) ?>" value="<?= $Grid->Incubator->EditValue ?>"<?= $Grid->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Incubator->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Incubator">
<span<?= $Grid->Incubator->viewAttributes() ?>>
<?= $Grid->Incubator->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Incubator" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Incubator" value="<?= HtmlEncode($Grid->Incubator->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Incubator" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Incubator" value="<?= HtmlEncode($Grid->Incubator->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->location->Visible) { // location ?>
        <td data-name="location" <?= $Grid->location->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_location" class="form-group">
<input type="<?= $Grid->location->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_location" name="x<?= $Grid->RowIndex ?>_location" id="x<?= $Grid->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->location->getPlaceHolder()) ?>" value="<?= $Grid->location->EditValue ?>"<?= $Grid->location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->location->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" data-hidden="1" name="o<?= $Grid->RowIndex ?>_location" id="o<?= $Grid->RowIndex ?>_location" value="<?= HtmlEncode($Grid->location->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_location" class="form-group">
<input type="<?= $Grid->location->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_location" name="x<?= $Grid->RowIndex ?>_location" id="x<?= $Grid->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->location->getPlaceHolder()) ?>" value="<?= $Grid->location->EditValue ?>"<?= $Grid->location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->location->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_location">
<span<?= $Grid->location->viewAttributes() ?>>
<?= $Grid->location->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_location" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_location" value="<?= HtmlEncode($Grid->location->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_location" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_location" value="<?= HtmlEncode($Grid->location->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->OocyteNo->Visible) { // OocyteNo ?>
        <td data-name="OocyteNo" <?= $Grid->OocyteNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_OocyteNo" class="form-group">
<input type="<?= $Grid->OocyteNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?= $Grid->RowIndex ?>_OocyteNo" id="x<?= $Grid->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OocyteNo->getPlaceHolder()) ?>" value="<?= $Grid->OocyteNo->EditValue ?>"<?= $Grid->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocyteNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OocyteNo" id="o<?= $Grid->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Grid->OocyteNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_OocyteNo" class="form-group">
<input type="<?= $Grid->OocyteNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?= $Grid->RowIndex ?>_OocyteNo" id="x<?= $Grid->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OocyteNo->getPlaceHolder()) ?>" value="<?= $Grid->OocyteNo->EditValue ?>"<?= $Grid->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocyteNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_OocyteNo">
<span<?= $Grid->OocyteNo->viewAttributes() ?>>
<?= $Grid->OocyteNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_OocyteNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Grid->OocyteNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_OocyteNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Grid->OocyteNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Stage->Visible) { // Stage ?>
        <td data-name="Stage" <?= $Grid->Stage->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Stage" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Stage"
        name="x<?= $Grid->RowIndex ?>_Stage"
        class="form-control ew-select<?= $Grid->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Stage"
        data-table="ivf_embryology_chart"
        data-field="x_Stage"
        data-value-separator="<?= $Grid->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Stage->getPlaceHolder()) ?>"
        <?= $Grid->Stage->editAttributes() ?>>
        <?= $Grid->Stage->selectOptionListHtml("x{$Grid->RowIndex}_Stage") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Stage']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Stage", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Stage" id="o<?= $Grid->RowIndex ?>_Stage" value="<?= HtmlEncode($Grid->Stage->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Stage" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Stage"
        name="x<?= $Grid->RowIndex ?>_Stage"
        class="form-control ew-select<?= $Grid->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Stage"
        data-table="ivf_embryology_chart"
        data-field="x_Stage"
        data-value-separator="<?= $Grid->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Stage->getPlaceHolder()) ?>"
        <?= $Grid->Stage->editAttributes() ?>>
        <?= $Grid->Stage->selectOptionListHtml("x{$Grid->RowIndex}_Stage") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Stage']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Stage", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Stage">
<span<?= $Grid->Stage->viewAttributes() ?>>
<?= $Grid->Stage->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Stage" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Stage" value="<?= HtmlEncode($Grid->Stage->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Stage" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Stage" value="<?= HtmlEncode($Grid->Stage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Grid->Remarks->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Remarks" class="form-group">
<input type="<?= $Grid->Remarks->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?= $Grid->RowIndex ?>_Remarks" id="x<?= $Grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Remarks->getPlaceHolder()) ?>" value="<?= $Grid->Remarks->EditValue ?>"<?= $Grid->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Remarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Remarks" id="o<?= $Grid->RowIndex ?>_Remarks" value="<?= HtmlEncode($Grid->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Remarks" class="form-group">
<input type="<?= $Grid->Remarks->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?= $Grid->RowIndex ?>_Remarks" id="x<?= $Grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Remarks->getPlaceHolder()) ?>" value="<?= $Grid->Remarks->EditValue ?>"<?= $Grid->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Remarks->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Remarks">
<span<?= $Grid->Remarks->viewAttributes() ?>>
<?= $Grid->Remarks->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Remarks" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Remarks" value="<?= HtmlEncode($Grid->Remarks->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Remarks" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Remarks" value="<?= HtmlEncode($Grid->Remarks->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate" <?= $Grid->vitrificationDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitrificationDate" class="form-group">
<input type="<?= $Grid->vitrificationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?= $Grid->RowIndex ?>_vitrificationDate" id="x<?= $Grid->RowIndex ?>_vitrificationDate" size="12" placeholder="<?= HtmlEncode($Grid->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Grid->vitrificationDate->EditValue ?>"<?= $Grid->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Grid->vitrificationDate->ReadOnly && !$Grid->vitrificationDate->Disabled && !isset($Grid->vitrificationDate->EditAttrs["readonly"]) && !isset($Grid->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitrificationDate" id="o<?= $Grid->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Grid->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitrificationDate" class="form-group">
<input type="<?= $Grid->vitrificationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?= $Grid->RowIndex ?>_vitrificationDate" id="x<?= $Grid->RowIndex ?>_vitrificationDate" size="12" placeholder="<?= HtmlEncode($Grid->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Grid->vitrificationDate->EditValue ?>"<?= $Grid->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Grid->vitrificationDate->ReadOnly && !$Grid->vitrificationDate->Disabled && !isset($Grid->vitrificationDate->EditAttrs["readonly"]) && !isset($Grid->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitrificationDate">
<span<?= $Grid->vitrificationDate->viewAttributes() ?>>
<?= $Grid->vitrificationDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitrificationDate" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Grid->vitrificationDate->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitrificationDate" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Grid->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <td data-name="vitriPrimaryEmbryologist" <?= $Grid->vitriPrimaryEmbryologist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group">
<input type="<?= $Grid->vitriPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->vitriPrimaryEmbryologist->EditValue ?>"<?= $Grid->vitriPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" id="o<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" value="<?= HtmlEncode($Grid->vitriPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group">
<input type="<?= $Grid->vitriPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->vitriPrimaryEmbryologist->EditValue ?>"<?= $Grid->vitriPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?= $Grid->vitriPrimaryEmbryologist->viewAttributes() ?>>
<?= $Grid->vitriPrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" value="<?= HtmlEncode($Grid->vitriPrimaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" value="<?= HtmlEncode($Grid->vitriPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <td data-name="vitriSecondaryEmbryologist" <?= $Grid->vitriSecondaryEmbryologist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group">
<input type="<?= $Grid->vitriSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->vitriSecondaryEmbryologist->EditValue ?>"<?= $Grid->vitriSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" id="o<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" value="<?= HtmlEncode($Grid->vitriSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group">
<input type="<?= $Grid->vitriSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->vitriSecondaryEmbryologist->EditValue ?>"<?= $Grid->vitriSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?= $Grid->vitriSecondaryEmbryologist->viewAttributes() ?>>
<?= $Grid->vitriSecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" value="<?= HtmlEncode($Grid->vitriSecondaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" value="<?= HtmlEncode($Grid->vitriSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <td data-name="vitriEmbryoNo" <?= $Grid->vitriEmbryoNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriEmbryoNo" class="form-group">
<input type="<?= $Grid->vitriEmbryoNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?= $Grid->RowIndex ?>_vitriEmbryoNo" id="x<?= $Grid->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?= $Grid->vitriEmbryoNo->EditValue ?>"<?= $Grid->vitriEmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriEmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriEmbryoNo" id="o<?= $Grid->RowIndex ?>_vitriEmbryoNo" value="<?= HtmlEncode($Grid->vitriEmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriEmbryoNo" class="form-group">
<input type="<?= $Grid->vitriEmbryoNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?= $Grid->RowIndex ?>_vitriEmbryoNo" id="x<?= $Grid->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?= $Grid->vitriEmbryoNo->EditValue ?>"<?= $Grid->vitriEmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriEmbryoNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriEmbryoNo">
<span<?= $Grid->vitriEmbryoNo->viewAttributes() ?>>
<?= $Grid->vitriEmbryoNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriEmbryoNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriEmbryoNo" value="<?= HtmlEncode($Grid->vitriEmbryoNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriEmbryoNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriEmbryoNo" value="<?= HtmlEncode($Grid->vitriEmbryoNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->thawReFrozen->Visible) { // thawReFrozen ?>
        <td data-name="thawReFrozen" <?= $Grid->thawReFrozen->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawReFrozen" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_thawReFrozen">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="x<?= $Grid->RowIndex ?>_thawReFrozen" id="x<?= $Grid->RowIndex ?>_thawReFrozen"<?= $Grid->thawReFrozen->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_thawReFrozen" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_thawReFrozen[]"
    name="x<?= $Grid->RowIndex ?>_thawReFrozen[]"
    value="<?= HtmlEncode($Grid->thawReFrozen->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_thawReFrozen"
    data-target="dsl_x<?= $Grid->RowIndex ?>_thawReFrozen"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->thawReFrozen->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_thawReFrozen"
    data-value-separator="<?= $Grid->thawReFrozen->displayValueSeparatorAttribute() ?>"
    <?= $Grid->thawReFrozen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawReFrozen->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawReFrozen[]" id="o<?= $Grid->RowIndex ?>_thawReFrozen[]" value="<?= HtmlEncode($Grid->thawReFrozen->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawReFrozen" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_thawReFrozen">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="x<?= $Grid->RowIndex ?>_thawReFrozen" id="x<?= $Grid->RowIndex ?>_thawReFrozen"<?= $Grid->thawReFrozen->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_thawReFrozen" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_thawReFrozen[]"
    name="x<?= $Grid->RowIndex ?>_thawReFrozen[]"
    value="<?= HtmlEncode($Grid->thawReFrozen->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_thawReFrozen"
    data-target="dsl_x<?= $Grid->RowIndex ?>_thawReFrozen"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->thawReFrozen->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_thawReFrozen"
    data-value-separator="<?= $Grid->thawReFrozen->displayValueSeparatorAttribute() ?>"
    <?= $Grid->thawReFrozen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawReFrozen->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawReFrozen">
<span<?= $Grid->thawReFrozen->viewAttributes() ?>>
<?= $Grid->thawReFrozen->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawReFrozen" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawReFrozen" value="<?= HtmlEncode($Grid->thawReFrozen->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawReFrozen[]" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawReFrozen[]" value="<?= HtmlEncode($Grid->thawReFrozen->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <td data-name="vitriFertilisationDate" <?= $Grid->vitriFertilisationDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriFertilisationDate" class="form-group">
<input type="<?= $Grid->vitriFertilisationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?= $Grid->RowIndex ?>_vitriFertilisationDate" id="x<?= $Grid->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?= HtmlEncode($Grid->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?= $Grid->vitriFertilisationDate->EditValue ?>"<?= $Grid->vitriFertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriFertilisationDate->getErrorMessage() ?></div>
<?php if (!$Grid->vitriFertilisationDate->ReadOnly && !$Grid->vitriFertilisationDate->Disabled && !isset($Grid->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($Grid->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriFertilisationDate" id="o<?= $Grid->RowIndex ?>_vitriFertilisationDate" value="<?= HtmlEncode($Grid->vitriFertilisationDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriFertilisationDate" class="form-group">
<input type="<?= $Grid->vitriFertilisationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?= $Grid->RowIndex ?>_vitriFertilisationDate" id="x<?= $Grid->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?= HtmlEncode($Grid->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?= $Grid->vitriFertilisationDate->EditValue ?>"<?= $Grid->vitriFertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriFertilisationDate->getErrorMessage() ?></div>
<?php if (!$Grid->vitriFertilisationDate->ReadOnly && !$Grid->vitriFertilisationDate->Disabled && !isset($Grid->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($Grid->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriFertilisationDate">
<span<?= $Grid->vitriFertilisationDate->viewAttributes() ?>>
<?= $Grid->vitriFertilisationDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriFertilisationDate" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriFertilisationDate" value="<?= HtmlEncode($Grid->vitriFertilisationDate->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriFertilisationDate" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriFertilisationDate" value="<?= HtmlEncode($Grid->vitriFertilisationDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriDay->Visible) { // vitriDay ?>
        <td data-name="vitriDay" <?= $Grid->vitriDay->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriDay" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_vitriDay"
        name="x<?= $Grid->RowIndex ?>_vitriDay"
        class="form-control ew-select<?= $Grid->vitriDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriDay"
        data-table="ivf_embryology_chart"
        data-field="x_vitriDay"
        data-value-separator="<?= $Grid->vitriDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->vitriDay->getPlaceHolder()) ?>"
        <?= $Grid->vitriDay->editAttributes() ?>>
        <?= $Grid->vitriDay->selectOptionListHtml("x{$Grid->RowIndex}_vitriDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->vitriDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriDay']"),
        options = { name: "x<?= $Grid->RowIndex ?>_vitriDay", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriDay" id="o<?= $Grid->RowIndex ?>_vitriDay" value="<?= HtmlEncode($Grid->vitriDay->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriDay" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_vitriDay"
        name="x<?= $Grid->RowIndex ?>_vitriDay"
        class="form-control ew-select<?= $Grid->vitriDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriDay"
        data-table="ivf_embryology_chart"
        data-field="x_vitriDay"
        data-value-separator="<?= $Grid->vitriDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->vitriDay->getPlaceHolder()) ?>"
        <?= $Grid->vitriDay->editAttributes() ?>>
        <?= $Grid->vitriDay->selectOptionListHtml("x{$Grid->RowIndex}_vitriDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->vitriDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriDay']"),
        options = { name: "x<?= $Grid->RowIndex ?>_vitriDay", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriDay">
<span<?= $Grid->vitriDay->viewAttributes() ?>>
<?= $Grid->vitriDay->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriDay" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriDay" value="<?= HtmlEncode($Grid->vitriDay->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriDay" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriDay" value="<?= HtmlEncode($Grid->vitriDay->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriStage->Visible) { // vitriStage ?>
        <td data-name="vitriStage" <?= $Grid->vitriStage->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriStage" class="form-group">
<input type="<?= $Grid->vitriStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?= $Grid->RowIndex ?>_vitriStage" id="x<?= $Grid->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriStage->getPlaceHolder()) ?>" value="<?= $Grid->vitriStage->EditValue ?>"<?= $Grid->vitriStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriStage" id="o<?= $Grid->RowIndex ?>_vitriStage" value="<?= HtmlEncode($Grid->vitriStage->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriStage" class="form-group">
<input type="<?= $Grid->vitriStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?= $Grid->RowIndex ?>_vitriStage" id="x<?= $Grid->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriStage->getPlaceHolder()) ?>" value="<?= $Grid->vitriStage->EditValue ?>"<?= $Grid->vitriStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriStage->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriStage">
<span<?= $Grid->vitriStage->viewAttributes() ?>>
<?= $Grid->vitriStage->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriStage" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriStage" value="<?= HtmlEncode($Grid->vitriStage->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriStage" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriStage" value="<?= HtmlEncode($Grid->vitriStage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriGrade->Visible) { // vitriGrade ?>
        <td data-name="vitriGrade" <?= $Grid->vitriGrade->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriGrade" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_vitriGrade"
        name="x<?= $Grid->RowIndex ?>_vitriGrade"
        class="form-control ew-select<?= $Grid->vitriGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriGrade"
        data-table="ivf_embryology_chart"
        data-field="x_vitriGrade"
        data-value-separator="<?= $Grid->vitriGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->vitriGrade->getPlaceHolder()) ?>"
        <?= $Grid->vitriGrade->editAttributes() ?>>
        <?= $Grid->vitriGrade->selectOptionListHtml("x{$Grid->RowIndex}_vitriGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->vitriGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriGrade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_vitriGrade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriGrade" id="o<?= $Grid->RowIndex ?>_vitriGrade" value="<?= HtmlEncode($Grid->vitriGrade->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriGrade" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_vitriGrade"
        name="x<?= $Grid->RowIndex ?>_vitriGrade"
        class="form-control ew-select<?= $Grid->vitriGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriGrade"
        data-table="ivf_embryology_chart"
        data-field="x_vitriGrade"
        data-value-separator="<?= $Grid->vitriGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->vitriGrade->getPlaceHolder()) ?>"
        <?= $Grid->vitriGrade->editAttributes() ?>>
        <?= $Grid->vitriGrade->selectOptionListHtml("x{$Grid->RowIndex}_vitriGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->vitriGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriGrade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_vitriGrade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriGrade">
<span<?= $Grid->vitriGrade->viewAttributes() ?>>
<?= $Grid->vitriGrade->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriGrade" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriGrade" value="<?= HtmlEncode($Grid->vitriGrade->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriGrade" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriGrade" value="<?= HtmlEncode($Grid->vitriGrade->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriIncubator->Visible) { // vitriIncubator ?>
        <td data-name="vitriIncubator" <?= $Grid->vitriIncubator->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriIncubator" class="form-group">
<input type="<?= $Grid->vitriIncubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?= $Grid->RowIndex ?>_vitriIncubator" id="x<?= $Grid->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriIncubator->getPlaceHolder()) ?>" value="<?= $Grid->vitriIncubator->EditValue ?>"<?= $Grid->vitriIncubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriIncubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriIncubator" id="o<?= $Grid->RowIndex ?>_vitriIncubator" value="<?= HtmlEncode($Grid->vitriIncubator->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriIncubator" class="form-group">
<input type="<?= $Grid->vitriIncubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?= $Grid->RowIndex ?>_vitriIncubator" id="x<?= $Grid->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriIncubator->getPlaceHolder()) ?>" value="<?= $Grid->vitriIncubator->EditValue ?>"<?= $Grid->vitriIncubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriIncubator->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriIncubator">
<span<?= $Grid->vitriIncubator->viewAttributes() ?>>
<?= $Grid->vitriIncubator->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriIncubator" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriIncubator" value="<?= HtmlEncode($Grid->vitriIncubator->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriIncubator" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriIncubator" value="<?= HtmlEncode($Grid->vitriIncubator->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriTank->Visible) { // vitriTank ?>
        <td data-name="vitriTank" <?= $Grid->vitriTank->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriTank" class="form-group">
<input type="<?= $Grid->vitriTank->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?= $Grid->RowIndex ?>_vitriTank" id="x<?= $Grid->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriTank->getPlaceHolder()) ?>" value="<?= $Grid->vitriTank->EditValue ?>"<?= $Grid->vitriTank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriTank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriTank" id="o<?= $Grid->RowIndex ?>_vitriTank" value="<?= HtmlEncode($Grid->vitriTank->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriTank" class="form-group">
<input type="<?= $Grid->vitriTank->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?= $Grid->RowIndex ?>_vitriTank" id="x<?= $Grid->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriTank->getPlaceHolder()) ?>" value="<?= $Grid->vitriTank->EditValue ?>"<?= $Grid->vitriTank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriTank->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriTank">
<span<?= $Grid->vitriTank->viewAttributes() ?>>
<?= $Grid->vitriTank->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriTank" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriTank" value="<?= HtmlEncode($Grid->vitriTank->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriTank" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriTank" value="<?= HtmlEncode($Grid->vitriTank->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriCanister->Visible) { // vitriCanister ?>
        <td data-name="vitriCanister" <?= $Grid->vitriCanister->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriCanister" class="form-group">
<input type="<?= $Grid->vitriCanister->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?= $Grid->RowIndex ?>_vitriCanister" id="x<?= $Grid->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriCanister->getPlaceHolder()) ?>" value="<?= $Grid->vitriCanister->EditValue ?>"<?= $Grid->vitriCanister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriCanister->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriCanister" id="o<?= $Grid->RowIndex ?>_vitriCanister" value="<?= HtmlEncode($Grid->vitriCanister->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriCanister" class="form-group">
<input type="<?= $Grid->vitriCanister->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?= $Grid->RowIndex ?>_vitriCanister" id="x<?= $Grid->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriCanister->getPlaceHolder()) ?>" value="<?= $Grid->vitriCanister->EditValue ?>"<?= $Grid->vitriCanister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriCanister->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriCanister">
<span<?= $Grid->vitriCanister->viewAttributes() ?>>
<?= $Grid->vitriCanister->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriCanister" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriCanister" value="<?= HtmlEncode($Grid->vitriCanister->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriCanister" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriCanister" value="<?= HtmlEncode($Grid->vitriCanister->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriGobiet->Visible) { // vitriGobiet ?>
        <td data-name="vitriGobiet" <?= $Grid->vitriGobiet->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriGobiet" class="form-group">
<input type="<?= $Grid->vitriGobiet->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?= $Grid->RowIndex ?>_vitriGobiet" id="x<?= $Grid->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriGobiet->getPlaceHolder()) ?>" value="<?= $Grid->vitriGobiet->EditValue ?>"<?= $Grid->vitriGobiet->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriGobiet->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriGobiet" id="o<?= $Grid->RowIndex ?>_vitriGobiet" value="<?= HtmlEncode($Grid->vitriGobiet->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriGobiet" class="form-group">
<input type="<?= $Grid->vitriGobiet->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?= $Grid->RowIndex ?>_vitriGobiet" id="x<?= $Grid->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriGobiet->getPlaceHolder()) ?>" value="<?= $Grid->vitriGobiet->EditValue ?>"<?= $Grid->vitriGobiet->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriGobiet->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriGobiet">
<span<?= $Grid->vitriGobiet->viewAttributes() ?>>
<?= $Grid->vitriGobiet->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriGobiet" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriGobiet" value="<?= HtmlEncode($Grid->vitriGobiet->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriGobiet" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriGobiet" value="<?= HtmlEncode($Grid->vitriGobiet->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriViscotube->Visible) { // vitriViscotube ?>
        <td data-name="vitriViscotube" <?= $Grid->vitriViscotube->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriViscotube" class="form-group">
<input type="<?= $Grid->vitriViscotube->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?= $Grid->RowIndex ?>_vitriViscotube" id="x<?= $Grid->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriViscotube->getPlaceHolder()) ?>" value="<?= $Grid->vitriViscotube->EditValue ?>"<?= $Grid->vitriViscotube->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriViscotube->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriViscotube" id="o<?= $Grid->RowIndex ?>_vitriViscotube" value="<?= HtmlEncode($Grid->vitriViscotube->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriViscotube" class="form-group">
<input type="<?= $Grid->vitriViscotube->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?= $Grid->RowIndex ?>_vitriViscotube" id="x<?= $Grid->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriViscotube->getPlaceHolder()) ?>" value="<?= $Grid->vitriViscotube->EditValue ?>"<?= $Grid->vitriViscotube->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriViscotube->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriViscotube">
<span<?= $Grid->vitriViscotube->viewAttributes() ?>>
<?= $Grid->vitriViscotube->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriViscotube" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriViscotube" value="<?= HtmlEncode($Grid->vitriViscotube->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriViscotube" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriViscotube" value="<?= HtmlEncode($Grid->vitriViscotube->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <td data-name="vitriCryolockNo" <?= $Grid->vitriCryolockNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriCryolockNo" class="form-group">
<input type="<?= $Grid->vitriCryolockNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?= $Grid->RowIndex ?>_vitriCryolockNo" id="x<?= $Grid->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriCryolockNo->getPlaceHolder()) ?>" value="<?= $Grid->vitriCryolockNo->EditValue ?>"<?= $Grid->vitriCryolockNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriCryolockNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriCryolockNo" id="o<?= $Grid->RowIndex ?>_vitriCryolockNo" value="<?= HtmlEncode($Grid->vitriCryolockNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriCryolockNo" class="form-group">
<input type="<?= $Grid->vitriCryolockNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?= $Grid->RowIndex ?>_vitriCryolockNo" id="x<?= $Grid->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriCryolockNo->getPlaceHolder()) ?>" value="<?= $Grid->vitriCryolockNo->EditValue ?>"<?= $Grid->vitriCryolockNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriCryolockNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriCryolockNo">
<span<?= $Grid->vitriCryolockNo->viewAttributes() ?>>
<?= $Grid->vitriCryolockNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriCryolockNo" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriCryolockNo" value="<?= HtmlEncode($Grid->vitriCryolockNo->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriCryolockNo" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriCryolockNo" value="<?= HtmlEncode($Grid->vitriCryolockNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <td data-name="vitriCryolockColour" <?= $Grid->vitriCryolockColour->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriCryolockColour" class="form-group">
<input type="<?= $Grid->vitriCryolockColour->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?= $Grid->RowIndex ?>_vitriCryolockColour" id="x<?= $Grid->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriCryolockColour->getPlaceHolder()) ?>" value="<?= $Grid->vitriCryolockColour->EditValue ?>"<?= $Grid->vitriCryolockColour->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriCryolockColour->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriCryolockColour" id="o<?= $Grid->RowIndex ?>_vitriCryolockColour" value="<?= HtmlEncode($Grid->vitriCryolockColour->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriCryolockColour" class="form-group">
<input type="<?= $Grid->vitriCryolockColour->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?= $Grid->RowIndex ?>_vitriCryolockColour" id="x<?= $Grid->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriCryolockColour->getPlaceHolder()) ?>" value="<?= $Grid->vitriCryolockColour->EditValue ?>"<?= $Grid->vitriCryolockColour->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriCryolockColour->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_vitriCryolockColour">
<span<?= $Grid->vitriCryolockColour->viewAttributes() ?>>
<?= $Grid->vitriCryolockColour->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriCryolockColour" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_vitriCryolockColour" value="<?= HtmlEncode($Grid->vitriCryolockColour->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriCryolockColour" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_vitriCryolockColour" value="<?= HtmlEncode($Grid->vitriCryolockColour->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->thawDate->Visible) { // thawDate ?>
        <td data-name="thawDate" <?= $Grid->thawDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawDate" class="form-group">
<input type="<?= $Grid->thawDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?= $Grid->RowIndex ?>_thawDate" id="x<?= $Grid->RowIndex ?>_thawDate" placeholder="<?= HtmlEncode($Grid->thawDate->getPlaceHolder()) ?>" value="<?= $Grid->thawDate->EditValue ?>"<?= $Grid->thawDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawDate->getErrorMessage() ?></div>
<?php if (!$Grid->thawDate->ReadOnly && !$Grid->thawDate->Disabled && !isset($Grid->thawDate->EditAttrs["readonly"]) && !isset($Grid->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawDate" id="o<?= $Grid->RowIndex ?>_thawDate" value="<?= HtmlEncode($Grid->thawDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawDate" class="form-group">
<input type="<?= $Grid->thawDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?= $Grid->RowIndex ?>_thawDate" id="x<?= $Grid->RowIndex ?>_thawDate" placeholder="<?= HtmlEncode($Grid->thawDate->getPlaceHolder()) ?>" value="<?= $Grid->thawDate->EditValue ?>"<?= $Grid->thawDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawDate->getErrorMessage() ?></div>
<?php if (!$Grid->thawDate->ReadOnly && !$Grid->thawDate->Disabled && !isset($Grid->thawDate->EditAttrs["readonly"]) && !isset($Grid->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawDate">
<span<?= $Grid->thawDate->viewAttributes() ?>>
<?= $Grid->thawDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawDate" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawDate" value="<?= HtmlEncode($Grid->thawDate->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawDate" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawDate" value="<?= HtmlEncode($Grid->thawDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td data-name="thawPrimaryEmbryologist" <?= $Grid->thawPrimaryEmbryologist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group">
<input type="<?= $Grid->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->thawPrimaryEmbryologist->EditValue ?>"<?= $Grid->thawPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" id="o<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" value="<?= HtmlEncode($Grid->thawPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group">
<input type="<?= $Grid->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->thawPrimaryEmbryologist->EditValue ?>"<?= $Grid->thawPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?= $Grid->thawPrimaryEmbryologist->viewAttributes() ?>>
<?= $Grid->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" value="<?= HtmlEncode($Grid->thawPrimaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" value="<?= HtmlEncode($Grid->thawPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td data-name="thawSecondaryEmbryologist" <?= $Grid->thawSecondaryEmbryologist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group">
<input type="<?= $Grid->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->thawSecondaryEmbryologist->EditValue ?>"<?= $Grid->thawSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" id="o<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" value="<?= HtmlEncode($Grid->thawSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group">
<input type="<?= $Grid->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->thawSecondaryEmbryologist->EditValue ?>"<?= $Grid->thawSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?= $Grid->thawSecondaryEmbryologist->viewAttributes() ?>>
<?= $Grid->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" value="<?= HtmlEncode($Grid->thawSecondaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" value="<?= HtmlEncode($Grid->thawSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->thawET->Visible) { // thawET ?>
        <td data-name="thawET" <?= $Grid->thawET->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawET" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_thawET"
        name="x<?= $Grid->RowIndex ?>_thawET"
        class="form-control ew-select<?= $Grid->thawET->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_thawET"
        data-table="ivf_embryology_chart"
        data-field="x_thawET"
        data-value-separator="<?= $Grid->thawET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->thawET->getPlaceHolder()) ?>"
        <?= $Grid->thawET->editAttributes() ?>>
        <?= $Grid->thawET->selectOptionListHtml("x{$Grid->RowIndex}_thawET") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->thawET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_thawET']"),
        options = { name: "x<?= $Grid->RowIndex ?>_thawET", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_thawET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.thawET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.thawET.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawET" id="o<?= $Grid->RowIndex ?>_thawET" value="<?= HtmlEncode($Grid->thawET->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawET" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_thawET"
        name="x<?= $Grid->RowIndex ?>_thawET"
        class="form-control ew-select<?= $Grid->thawET->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_thawET"
        data-table="ivf_embryology_chart"
        data-field="x_thawET"
        data-value-separator="<?= $Grid->thawET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->thawET->getPlaceHolder()) ?>"
        <?= $Grid->thawET->editAttributes() ?>>
        <?= $Grid->thawET->selectOptionListHtml("x{$Grid->RowIndex}_thawET") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->thawET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_thawET']"),
        options = { name: "x<?= $Grid->RowIndex ?>_thawET", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_thawET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.thawET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.thawET.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawET">
<span<?= $Grid->thawET->viewAttributes() ?>>
<?= $Grid->thawET->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawET" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawET" value="<?= HtmlEncode($Grid->thawET->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawET" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawET" value="<?= HtmlEncode($Grid->thawET->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->thawAbserve->Visible) { // thawAbserve ?>
        <td data-name="thawAbserve" <?= $Grid->thawAbserve->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawAbserve" class="form-group">
<input type="<?= $Grid->thawAbserve->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?= $Grid->RowIndex ?>_thawAbserve" id="x<?= $Grid->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawAbserve->getPlaceHolder()) ?>" value="<?= $Grid->thawAbserve->EditValue ?>"<?= $Grid->thawAbserve->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawAbserve->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawAbserve" id="o<?= $Grid->RowIndex ?>_thawAbserve" value="<?= HtmlEncode($Grid->thawAbserve->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawAbserve" class="form-group">
<input type="<?= $Grid->thawAbserve->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?= $Grid->RowIndex ?>_thawAbserve" id="x<?= $Grid->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawAbserve->getPlaceHolder()) ?>" value="<?= $Grid->thawAbserve->EditValue ?>"<?= $Grid->thawAbserve->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawAbserve->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawAbserve">
<span<?= $Grid->thawAbserve->viewAttributes() ?>>
<?= $Grid->thawAbserve->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawAbserve" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawAbserve" value="<?= HtmlEncode($Grid->thawAbserve->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawAbserve" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawAbserve" value="<?= HtmlEncode($Grid->thawAbserve->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->thawDiscard->Visible) { // thawDiscard ?>
        <td data-name="thawDiscard" <?= $Grid->thawDiscard->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawDiscard" class="form-group">
<input type="<?= $Grid->thawDiscard->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?= $Grid->RowIndex ?>_thawDiscard" id="x<?= $Grid->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawDiscard->getPlaceHolder()) ?>" value="<?= $Grid->thawDiscard->EditValue ?>"<?= $Grid->thawDiscard->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawDiscard->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawDiscard" id="o<?= $Grid->RowIndex ?>_thawDiscard" value="<?= HtmlEncode($Grid->thawDiscard->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawDiscard" class="form-group">
<input type="<?= $Grid->thawDiscard->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?= $Grid->RowIndex ?>_thawDiscard" id="x<?= $Grid->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawDiscard->getPlaceHolder()) ?>" value="<?= $Grid->thawDiscard->EditValue ?>"<?= $Grid->thawDiscard->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawDiscard->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_thawDiscard">
<span<?= $Grid->thawDiscard->viewAttributes() ?>>
<?= $Grid->thawDiscard->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawDiscard" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_thawDiscard" value="<?= HtmlEncode($Grid->thawDiscard->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawDiscard" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_thawDiscard" value="<?= HtmlEncode($Grid->thawDiscard->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ETCatheter->Visible) { // ETCatheter ?>
        <td data-name="ETCatheter" <?= $Grid->ETCatheter->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETCatheter" class="form-group">
<input type="<?= $Grid->ETCatheter->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?= $Grid->RowIndex ?>_ETCatheter" id="x<?= $Grid->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETCatheter->getPlaceHolder()) ?>" value="<?= $Grid->ETCatheter->EditValue ?>"<?= $Grid->ETCatheter->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETCatheter->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETCatheter" id="o<?= $Grid->RowIndex ?>_ETCatheter" value="<?= HtmlEncode($Grid->ETCatheter->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETCatheter" class="form-group">
<input type="<?= $Grid->ETCatheter->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?= $Grid->RowIndex ?>_ETCatheter" id="x<?= $Grid->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETCatheter->getPlaceHolder()) ?>" value="<?= $Grid->ETCatheter->EditValue ?>"<?= $Grid->ETCatheter->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETCatheter->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETCatheter">
<span<?= $Grid->ETCatheter->viewAttributes() ?>>
<?= $Grid->ETCatheter->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETCatheter" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETCatheter" value="<?= HtmlEncode($Grid->ETCatheter->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETCatheter" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETCatheter" value="<?= HtmlEncode($Grid->ETCatheter->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ETDifficulty->Visible) { // ETDifficulty ?>
        <td data-name="ETDifficulty" <?= $Grid->ETDifficulty->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETDifficulty" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ETDifficulty"
        name="x<?= $Grid->RowIndex ?>_ETDifficulty"
        class="form-control ew-select<?= $Grid->ETDifficulty->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_ETDifficulty"
        data-table="ivf_embryology_chart"
        data-field="x_ETDifficulty"
        data-value-separator="<?= $Grid->ETDifficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ETDifficulty->getPlaceHolder()) ?>"
        <?= $Grid->ETDifficulty->editAttributes() ?>>
        <?= $Grid->ETDifficulty->selectOptionListHtml("x{$Grid->RowIndex}_ETDifficulty") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ETDifficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_ETDifficulty']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ETDifficulty", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_ETDifficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETDifficulty" id="o<?= $Grid->RowIndex ?>_ETDifficulty" value="<?= HtmlEncode($Grid->ETDifficulty->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETDifficulty" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ETDifficulty"
        name="x<?= $Grid->RowIndex ?>_ETDifficulty"
        class="form-control ew-select<?= $Grid->ETDifficulty->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_ETDifficulty"
        data-table="ivf_embryology_chart"
        data-field="x_ETDifficulty"
        data-value-separator="<?= $Grid->ETDifficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ETDifficulty->getPlaceHolder()) ?>"
        <?= $Grid->ETDifficulty->editAttributes() ?>>
        <?= $Grid->ETDifficulty->selectOptionListHtml("x{$Grid->RowIndex}_ETDifficulty") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ETDifficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_ETDifficulty']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ETDifficulty", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_ETDifficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETDifficulty">
<span<?= $Grid->ETDifficulty->viewAttributes() ?>>
<?= $Grid->ETDifficulty->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETDifficulty" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETDifficulty" value="<?= HtmlEncode($Grid->ETDifficulty->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETDifficulty" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETDifficulty" value="<?= HtmlEncode($Grid->ETDifficulty->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ETEasy->Visible) { // ETEasy ?>
        <td data-name="ETEasy" <?= $Grid->ETEasy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETEasy" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_ETEasy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="x<?= $Grid->RowIndex ?>_ETEasy" id="x<?= $Grid->RowIndex ?>_ETEasy"<?= $Grid->ETEasy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ETEasy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ETEasy[]"
    name="x<?= $Grid->RowIndex ?>_ETEasy[]"
    value="<?= HtmlEncode($Grid->ETEasy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_ETEasy"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ETEasy"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ETEasy->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_ETEasy"
    data-value-separator="<?= $Grid->ETEasy->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ETEasy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETEasy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETEasy[]" id="o<?= $Grid->RowIndex ?>_ETEasy[]" value="<?= HtmlEncode($Grid->ETEasy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETEasy" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_ETEasy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="x<?= $Grid->RowIndex ?>_ETEasy" id="x<?= $Grid->RowIndex ?>_ETEasy"<?= $Grid->ETEasy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ETEasy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ETEasy[]"
    name="x<?= $Grid->RowIndex ?>_ETEasy[]"
    value="<?= HtmlEncode($Grid->ETEasy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_ETEasy"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ETEasy"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ETEasy->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_ETEasy"
    data-value-separator="<?= $Grid->ETEasy->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ETEasy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETEasy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETEasy">
<span<?= $Grid->ETEasy->viewAttributes() ?>>
<?= $Grid->ETEasy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETEasy" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETEasy" value="<?= HtmlEncode($Grid->ETEasy->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETEasy[]" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETEasy[]" value="<?= HtmlEncode($Grid->ETEasy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ETComments->Visible) { // ETComments ?>
        <td data-name="ETComments" <?= $Grid->ETComments->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETComments" class="form-group">
<input type="<?= $Grid->ETComments->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?= $Grid->RowIndex ?>_ETComments" id="x<?= $Grid->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETComments->getPlaceHolder()) ?>" value="<?= $Grid->ETComments->EditValue ?>"<?= $Grid->ETComments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETComments->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETComments" id="o<?= $Grid->RowIndex ?>_ETComments" value="<?= HtmlEncode($Grid->ETComments->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETComments" class="form-group">
<input type="<?= $Grid->ETComments->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?= $Grid->RowIndex ?>_ETComments" id="x<?= $Grid->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETComments->getPlaceHolder()) ?>" value="<?= $Grid->ETComments->EditValue ?>"<?= $Grid->ETComments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETComments->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETComments">
<span<?= $Grid->ETComments->viewAttributes() ?>>
<?= $Grid->ETComments->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETComments" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETComments" value="<?= HtmlEncode($Grid->ETComments->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETComments" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETComments" value="<?= HtmlEncode($Grid->ETComments->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ETDoctor->Visible) { // ETDoctor ?>
        <td data-name="ETDoctor" <?= $Grid->ETDoctor->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETDoctor" class="form-group">
<input type="<?= $Grid->ETDoctor->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?= $Grid->RowIndex ?>_ETDoctor" id="x<?= $Grid->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETDoctor->getPlaceHolder()) ?>" value="<?= $Grid->ETDoctor->EditValue ?>"<?= $Grid->ETDoctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETDoctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETDoctor" id="o<?= $Grid->RowIndex ?>_ETDoctor" value="<?= HtmlEncode($Grid->ETDoctor->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETDoctor" class="form-group">
<input type="<?= $Grid->ETDoctor->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?= $Grid->RowIndex ?>_ETDoctor" id="x<?= $Grid->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETDoctor->getPlaceHolder()) ?>" value="<?= $Grid->ETDoctor->EditValue ?>"<?= $Grid->ETDoctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETDoctor->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETDoctor">
<span<?= $Grid->ETDoctor->viewAttributes() ?>>
<?= $Grid->ETDoctor->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETDoctor" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETDoctor" value="<?= HtmlEncode($Grid->ETDoctor->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETDoctor" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETDoctor" value="<?= HtmlEncode($Grid->ETDoctor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <td data-name="ETEmbryologist" <?= $Grid->ETEmbryologist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETEmbryologist" class="form-group">
<input type="<?= $Grid->ETEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?= $Grid->RowIndex ?>_ETEmbryologist" id="x<?= $Grid->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->ETEmbryologist->EditValue ?>"<?= $Grid->ETEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETEmbryologist" id="o<?= $Grid->RowIndex ?>_ETEmbryologist" value="<?= HtmlEncode($Grid->ETEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETEmbryologist" class="form-group">
<input type="<?= $Grid->ETEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?= $Grid->RowIndex ?>_ETEmbryologist" id="x<?= $Grid->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->ETEmbryologist->EditValue ?>"<?= $Grid->ETEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETEmbryologist">
<span<?= $Grid->ETEmbryologist->viewAttributes() ?>>
<?= $Grid->ETEmbryologist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETEmbryologist" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETEmbryologist" value="<?= HtmlEncode($Grid->ETEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETEmbryologist" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETEmbryologist" value="<?= HtmlEncode($Grid->ETEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ETDate->Visible) { // ETDate ?>
        <td data-name="ETDate" <?= $Grid->ETDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETDate" class="form-group">
<input type="<?= $Grid->ETDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?= $Grid->RowIndex ?>_ETDate" id="x<?= $Grid->RowIndex ?>_ETDate" placeholder="<?= HtmlEncode($Grid->ETDate->getPlaceHolder()) ?>" value="<?= $Grid->ETDate->EditValue ?>"<?= $Grid->ETDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETDate->getErrorMessage() ?></div>
<?php if (!$Grid->ETDate->ReadOnly && !$Grid->ETDate->Disabled && !isset($Grid->ETDate->EditAttrs["readonly"]) && !isset($Grid->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETDate" id="o<?= $Grid->RowIndex ?>_ETDate" value="<?= HtmlEncode($Grid->ETDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETDate" class="form-group">
<input type="<?= $Grid->ETDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?= $Grid->RowIndex ?>_ETDate" id="x<?= $Grid->RowIndex ?>_ETDate" placeholder="<?= HtmlEncode($Grid->ETDate->getPlaceHolder()) ?>" value="<?= $Grid->ETDate->EditValue ?>"<?= $Grid->ETDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETDate->getErrorMessage() ?></div>
<?php if (!$Grid->ETDate->ReadOnly && !$Grid->ETDate->Disabled && !isset($Grid->ETDate->EditAttrs["readonly"]) && !isset($Grid->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_ETDate">
<span<?= $Grid->ETDate->viewAttributes() ?>>
<?= $Grid->ETDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETDate" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_ETDate" value="<?= HtmlEncode($Grid->ETDate->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETDate" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_ETDate" value="<?= HtmlEncode($Grid->ETDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Day1End->Visible) { // Day1End ?>
        <td data-name="Day1End" <?= $Grid->Day1End->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1End" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1End"
        name="x<?= $Grid->RowIndex ?>_Day1End"
        class="form-control ew-select<?= $Grid->Day1End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1End"
        data-table="ivf_embryology_chart"
        data-field="x_Day1End"
        data-value-separator="<?= $Grid->Day1End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1End->getPlaceHolder()) ?>"
        <?= $Grid->Day1End->editAttributes() ?>>
        <?= $Grid->Day1End->selectOptionListHtml("x{$Grid->RowIndex}_Day1End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1End" id="o<?= $Grid->RowIndex ?>_Day1End" value="<?= HtmlEncode($Grid->Day1End->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1End" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1End"
        name="x<?= $Grid->RowIndex ?>_Day1End"
        class="form-control ew-select<?= $Grid->Day1End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1End"
        data-table="ivf_embryology_chart"
        data-field="x_Day1End"
        data-value-separator="<?= $Grid->Day1End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1End->getPlaceHolder()) ?>"
        <?= $Grid->Day1End->editAttributes() ?>>
        <?= $Grid->Day1End->selectOptionListHtml("x{$Grid->RowIndex}_Day1End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_embryology_chart_Day1End">
<span<?= $Grid->Day1End->viewAttributes() ?>>
<?= $Grid->Day1End->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" data-hidden="1" name="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1End" id="fivf_embryology_chartgrid$x<?= $Grid->RowIndex ?>_Day1End" value="<?= HtmlEncode($Grid->Day1End->FormValue) ?>">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" data-hidden="1" name="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1End" id="fivf_embryology_chartgrid$o<?= $Grid->RowIndex ?>_Day1End" value="<?= HtmlEncode($Grid->Day1End->OldValue) ?>">
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
loadjs.ready(["fivf_embryology_chartgrid","load"], function () {
    fivf_embryology_chartgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_ivf_embryology_chart", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_ivf_embryology_chart_id" class="form-group ivf_embryology_chart_id"></span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_id" class="form-group ivf_embryology_chart_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->RIDNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<input type="<?= $Grid->RIDNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" size="4" placeholder="<?= HtmlEncode($Grid->RIDNo->getPlaceHolder()) ?>" value="<?= $Grid->RIDNo->EditValue ?>"<?= $Grid->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RIDNo" id="o<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Name->Visible) { // Name ?>
        <td data-name="Name">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Name->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Name" name="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Name" id="o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ARTCycle->Visible) { // ARTCycle ?>
        <td data-name="ARTCycle">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_ARTCycle" class="form-group ivf_embryology_chart_ARTCycle">
<input type="<?= $Grid->ARTCycle->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x<?= $Grid->RowIndex ?>_ARTCycle" id="x<?= $Grid->RowIndex ?>_ARTCycle" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->ARTCycle->getPlaceHolder()) ?>" value="<?= $Grid->ARTCycle->EditValue ?>"<?= $Grid->ARTCycle->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ARTCycle->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_ARTCycle" class="form-group ivf_embryology_chart_ARTCycle">
<span<?= $Grid->ARTCycle->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ARTCycle->getDisplayValue($Grid->ARTCycle->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ARTCycle" id="x<?= $Grid->RowIndex ?>_ARTCycle" value="<?= HtmlEncode($Grid->ARTCycle->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ARTCycle" id="o<?= $Grid->RowIndex ?>_ARTCycle" value="<?= HtmlEncode($Grid->ARTCycle->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SpermOrigin->Visible) { // SpermOrigin ?>
        <td data-name="SpermOrigin">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_SpermOrigin" class="form-group ivf_embryology_chart_SpermOrigin">
<input type="<?= $Grid->SpermOrigin->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?= $Grid->RowIndex ?>_SpermOrigin" id="x<?= $Grid->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?= HtmlEncode($Grid->SpermOrigin->getPlaceHolder()) ?>" value="<?= $Grid->SpermOrigin->EditValue ?>"<?= $Grid->SpermOrigin->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SpermOrigin->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_SpermOrigin" class="form-group ivf_embryology_chart_SpermOrigin">
<span<?= $Grid->SpermOrigin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SpermOrigin->getDisplayValue($Grid->SpermOrigin->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SpermOrigin" id="x<?= $Grid->RowIndex ?>_SpermOrigin" value="<?= HtmlEncode($Grid->SpermOrigin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SpermOrigin" id="o<?= $Grid->RowIndex ?>_SpermOrigin" value="<?= HtmlEncode($Grid->SpermOrigin->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td data-name="InseminatinTechnique">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_InseminatinTechnique" class="form-group ivf_embryology_chart_InseminatinTechnique">
<input type="<?= $Grid->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?= $Grid->RowIndex ?>_InseminatinTechnique" id="x<?= $Grid->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Grid->InseminatinTechnique->EditValue ?>"<?= $Grid->InseminatinTechnique->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InseminatinTechnique->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_InseminatinTechnique" class="form-group ivf_embryology_chart_InseminatinTechnique">
<span<?= $Grid->InseminatinTechnique->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->InseminatinTechnique->getDisplayValue($Grid->InseminatinTechnique->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" data-hidden="1" name="x<?= $Grid->RowIndex ?>_InseminatinTechnique" id="x<?= $Grid->RowIndex ?>_InseminatinTechnique" value="<?= HtmlEncode($Grid->InseminatinTechnique->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" data-hidden="1" name="o<?= $Grid->RowIndex ?>_InseminatinTechnique" id="o<?= $Grid->RowIndex ?>_InseminatinTechnique" value="<?= HtmlEncode($Grid->InseminatinTechnique->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IndicationForART->Visible) { // IndicationForART ?>
        <td data-name="IndicationForART">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_IndicationForART" class="form-group ivf_embryology_chart_IndicationForART">
<input type="<?= $Grid->IndicationForART->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?= $Grid->RowIndex ?>_IndicationForART" id="x<?= $Grid->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->IndicationForART->getPlaceHolder()) ?>" value="<?= $Grid->IndicationForART->EditValue ?>"<?= $Grid->IndicationForART->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IndicationForART->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_IndicationForART" class="form-group ivf_embryology_chart_IndicationForART">
<span<?= $Grid->IndicationForART->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IndicationForART->getDisplayValue($Grid->IndicationForART->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IndicationForART" id="x<?= $Grid->RowIndex ?>_IndicationForART" value="<?= HtmlEncode($Grid->IndicationForART->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IndicationForART" id="o<?= $Grid->RowIndex ?>_IndicationForART" value="<?= HtmlEncode($Grid->IndicationForART->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day0sino->Visible) { // Day0sino ?>
        <td data-name="Day0sino">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0sino" class="form-group ivf_embryology_chart_Day0sino">
<input type="<?= $Grid->Day0sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?= $Grid->RowIndex ?>_Day0sino" id="x<?= $Grid->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day0sino->getPlaceHolder()) ?>" value="<?= $Grid->Day0sino->EditValue ?>"<?= $Grid->Day0sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day0sino->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0sino" class="form-group ivf_embryology_chart_Day0sino">
<span<?= $Grid->Day0sino->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day0sino->getDisplayValue($Grid->Day0sino->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day0sino" id="x<?= $Grid->RowIndex ?>_Day0sino" value="<?= HtmlEncode($Grid->Day0sino->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0sino" id="o<?= $Grid->RowIndex ?>_Day0sino" value="<?= HtmlEncode($Grid->Day0sino->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td data-name="Day0OocyteStage">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0OocyteStage" class="form-group ivf_embryology_chart_Day0OocyteStage">
<input type="<?= $Grid->Day0OocyteStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?= $Grid->RowIndex ?>_Day0OocyteStage" id="x<?= $Grid->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Grid->Day0OocyteStage->EditValue ?>"<?= $Grid->Day0OocyteStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day0OocyteStage->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0OocyteStage" class="form-group ivf_embryology_chart_Day0OocyteStage">
<span<?= $Grid->Day0OocyteStage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day0OocyteStage->getDisplayValue($Grid->Day0OocyteStage->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day0OocyteStage" id="x<?= $Grid->RowIndex ?>_Day0OocyteStage" value="<?= HtmlEncode($Grid->Day0OocyteStage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0OocyteStage" id="o<?= $Grid->RowIndex ?>_Day0OocyteStage" value="<?= HtmlEncode($Grid->Day0OocyteStage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <td data-name="Day0PolarBodyPosition">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group ivf_embryology_chart_Day0PolarBodyPosition">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition"
        name="x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition"
        class="form-control ew-select<?= $Grid->Day0PolarBodyPosition->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition"
        data-table="ivf_embryology_chart"
        data-field="x_Day0PolarBodyPosition"
        data-value-separator="<?= $Grid->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0PolarBodyPosition->getPlaceHolder()) ?>"
        <?= $Grid->Day0PolarBodyPosition->editAttributes() ?>>
        <?= $Grid->Day0PolarBodyPosition->selectOptionListHtml("x{$Grid->RowIndex}_Day0PolarBodyPosition") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0PolarBodyPosition->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group ivf_embryology_chart_Day0PolarBodyPosition">
<span<?= $Grid->Day0PolarBodyPosition->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day0PolarBodyPosition->getDisplayValue($Grid->Day0PolarBodyPosition->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition" id="x<?= $Grid->RowIndex ?>_Day0PolarBodyPosition" value="<?= HtmlEncode($Grid->Day0PolarBodyPosition->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0PolarBodyPosition" id="o<?= $Grid->RowIndex ?>_Day0PolarBodyPosition" value="<?= HtmlEncode($Grid->Day0PolarBodyPosition->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day0Breakage->Visible) { // Day0Breakage ?>
        <td data-name="Day0Breakage">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0Breakage" class="form-group ivf_embryology_chart_Day0Breakage">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0Breakage"
        name="x<?= $Grid->RowIndex ?>_Day0Breakage"
        class="form-control ew-select<?= $Grid->Day0Breakage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Breakage"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Breakage"
        data-value-separator="<?= $Grid->Day0Breakage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0Breakage->getPlaceHolder()) ?>"
        <?= $Grid->Day0Breakage->editAttributes() ?>>
        <?= $Grid->Day0Breakage->selectOptionListHtml("x{$Grid->RowIndex}_Day0Breakage") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0Breakage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Breakage']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0Breakage", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Breakage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0Breakage" class="form-group ivf_embryology_chart_Day0Breakage">
<span<?= $Grid->Day0Breakage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day0Breakage->getDisplayValue($Grid->Day0Breakage->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day0Breakage" id="x<?= $Grid->RowIndex ?>_Day0Breakage" value="<?= HtmlEncode($Grid->Day0Breakage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0Breakage" id="o<?= $Grid->RowIndex ?>_Day0Breakage" value="<?= HtmlEncode($Grid->Day0Breakage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day0Attempts->Visible) { // Day0Attempts ?>
        <td data-name="Day0Attempts">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0Attempts" class="form-group ivf_embryology_chart_Day0Attempts">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0Attempts"
        name="x<?= $Grid->RowIndex ?>_Day0Attempts"
        class="form-control ew-select<?= $Grid->Day0Attempts->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Attempts"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Attempts"
        data-value-separator="<?= $Grid->Day0Attempts->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0Attempts->getPlaceHolder()) ?>"
        <?= $Grid->Day0Attempts->editAttributes() ?>>
        <?= $Grid->Day0Attempts->selectOptionListHtml("x{$Grid->RowIndex}_Day0Attempts") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0Attempts->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Attempts']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0Attempts", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0Attempts", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0Attempts" class="form-group ivf_embryology_chart_Day0Attempts">
<span<?= $Grid->Day0Attempts->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day0Attempts->getDisplayValue($Grid->Day0Attempts->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day0Attempts" id="x<?= $Grid->RowIndex ?>_Day0Attempts" value="<?= HtmlEncode($Grid->Day0Attempts->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0Attempts" id="o<?= $Grid->RowIndex ?>_Day0Attempts" value="<?= HtmlEncode($Grid->Day0Attempts->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <td data-name="Day0SPZMorpho">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0SPZMorpho" class="form-group ivf_embryology_chart_Day0SPZMorpho">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0SPZMorpho"
        name="x<?= $Grid->RowIndex ?>_Day0SPZMorpho"
        class="form-control ew-select<?= $Grid->Day0SPZMorpho->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZMorpho"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZMorpho"
        data-value-separator="<?= $Grid->Day0SPZMorpho->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0SPZMorpho->getPlaceHolder()) ?>"
        <?= $Grid->Day0SPZMorpho->editAttributes() ?>>
        <?= $Grid->Day0SPZMorpho->selectOptionListHtml("x{$Grid->RowIndex}_Day0SPZMorpho") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0SPZMorpho->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZMorpho']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0SPZMorpho", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZMorpho", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0SPZMorpho" class="form-group ivf_embryology_chart_Day0SPZMorpho">
<span<?= $Grid->Day0SPZMorpho->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day0SPZMorpho->getDisplayValue($Grid->Day0SPZMorpho->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day0SPZMorpho" id="x<?= $Grid->RowIndex ?>_Day0SPZMorpho" value="<?= HtmlEncode($Grid->Day0SPZMorpho->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0SPZMorpho" id="o<?= $Grid->RowIndex ?>_Day0SPZMorpho" value="<?= HtmlEncode($Grid->Day0SPZMorpho->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <td data-name="Day0SPZLocation">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0SPZLocation" class="form-group ivf_embryology_chart_Day0SPZLocation">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0SPZLocation"
        name="x<?= $Grid->RowIndex ?>_Day0SPZLocation"
        class="form-control ew-select<?= $Grid->Day0SPZLocation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZLocation"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZLocation"
        data-value-separator="<?= $Grid->Day0SPZLocation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0SPZLocation->getPlaceHolder()) ?>"
        <?= $Grid->Day0SPZLocation->editAttributes() ?>>
        <?= $Grid->Day0SPZLocation->selectOptionListHtml("x{$Grid->RowIndex}_Day0SPZLocation") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0SPZLocation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZLocation']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0SPZLocation", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SPZLocation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0SPZLocation" class="form-group ivf_embryology_chart_Day0SPZLocation">
<span<?= $Grid->Day0SPZLocation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day0SPZLocation->getDisplayValue($Grid->Day0SPZLocation->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day0SPZLocation" id="x<?= $Grid->RowIndex ?>_Day0SPZLocation" value="<?= HtmlEncode($Grid->Day0SPZLocation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0SPZLocation" id="o<?= $Grid->RowIndex ?>_Day0SPZLocation" value="<?= HtmlEncode($Grid->Day0SPZLocation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <td data-name="Day0SpOrgin">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0SpOrgin" class="form-group ivf_embryology_chart_Day0SpOrgin">
    <select
        id="x<?= $Grid->RowIndex ?>_Day0SpOrgin"
        name="x<?= $Grid->RowIndex ?>_Day0SpOrgin"
        class="form-control ew-select<?= $Grid->Day0SpOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SpOrgin"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SpOrgin"
        data-value-separator="<?= $Grid->Day0SpOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day0SpOrgin->getPlaceHolder()) ?>"
        <?= $Grid->Day0SpOrgin->editAttributes() ?>>
        <?= $Grid->Day0SpOrgin->selectOptionListHtml("x{$Grid->RowIndex}_Day0SpOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day0SpOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SpOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day0SpOrgin", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day0SpOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day0SpOrgin" class="form-group ivf_embryology_chart_Day0SpOrgin">
<span<?= $Grid->Day0SpOrgin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day0SpOrgin->getDisplayValue($Grid->Day0SpOrgin->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day0SpOrgin" id="x<?= $Grid->RowIndex ?>_Day0SpOrgin" value="<?= HtmlEncode($Grid->Day0SpOrgin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day0SpOrgin" id="o<?= $Grid->RowIndex ?>_Day0SpOrgin" value="<?= HtmlEncode($Grid->Day0SpOrgin->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <td data-name="Day5Cryoptop">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5Cryoptop" class="form-group ivf_embryology_chart_Day5Cryoptop">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Cryoptop"
        name="x<?= $Grid->RowIndex ?>_Day5Cryoptop"
        class="form-control ew-select<?= $Grid->Day5Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Cryoptop"
        data-value-separator="<?= $Grid->Day5Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Cryoptop->getPlaceHolder()) ?>"
        <?= $Grid->Day5Cryoptop->editAttributes() ?>>
        <?= $Grid->Day5Cryoptop->selectOptionListHtml("x{$Grid->RowIndex}_Day5Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Cryoptop']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Cryoptop", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5Cryoptop" class="form-group ivf_embryology_chart_Day5Cryoptop">
<span<?= $Grid->Day5Cryoptop->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day5Cryoptop->getDisplayValue($Grid->Day5Cryoptop->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day5Cryoptop" id="x<?= $Grid->RowIndex ?>_Day5Cryoptop" value="<?= HtmlEncode($Grid->Day5Cryoptop->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5Cryoptop" id="o<?= $Grid->RowIndex ?>_Day5Cryoptop" value="<?= HtmlEncode($Grid->Day5Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day1Sperm->Visible) { // Day1Sperm ?>
        <td data-name="Day1Sperm">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1Sperm" class="form-group ivf_embryology_chart_Day1Sperm">
<input type="<?= $Grid->Day1Sperm->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?= $Grid->RowIndex ?>_Day1Sperm" id="x<?= $Grid->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day1Sperm->getPlaceHolder()) ?>" value="<?= $Grid->Day1Sperm->EditValue ?>"<?= $Grid->Day1Sperm->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day1Sperm->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1Sperm" class="form-group ivf_embryology_chart_Day1Sperm">
<span<?= $Grid->Day1Sperm->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day1Sperm->getDisplayValue($Grid->Day1Sperm->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day1Sperm" id="x<?= $Grid->RowIndex ?>_Day1Sperm" value="<?= HtmlEncode($Grid->Day1Sperm->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1Sperm" id="o<?= $Grid->RowIndex ?>_Day1Sperm" value="<?= HtmlEncode($Grid->Day1Sperm->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day1PN->Visible) { // Day1PN ?>
        <td data-name="Day1PN">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1PN" class="form-group ivf_embryology_chart_Day1PN">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1PN"
        name="x<?= $Grid->RowIndex ?>_Day1PN"
        class="form-control ew-select<?= $Grid->Day1PN->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PN"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PN"
        data-value-separator="<?= $Grid->Day1PN->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1PN->getPlaceHolder()) ?>"
        <?= $Grid->Day1PN->editAttributes() ?>>
        <?= $Grid->Day1PN->selectOptionListHtml("x{$Grid->RowIndex}_Day1PN") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1PN->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PN']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1PN", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PN", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PN.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PN.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1PN" class="form-group ivf_embryology_chart_Day1PN">
<span<?= $Grid->Day1PN->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day1PN->getDisplayValue($Grid->Day1PN->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day1PN" id="x<?= $Grid->RowIndex ?>_Day1PN" value="<?= HtmlEncode($Grid->Day1PN->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1PN" id="o<?= $Grid->RowIndex ?>_Day1PN" value="<?= HtmlEncode($Grid->Day1PN->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day1PB->Visible) { // Day1PB ?>
        <td data-name="Day1PB">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1PB" class="form-group ivf_embryology_chart_Day1PB">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1PB"
        name="x<?= $Grid->RowIndex ?>_Day1PB"
        class="form-control ew-select<?= $Grid->Day1PB->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PB"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PB"
        data-value-separator="<?= $Grid->Day1PB->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1PB->getPlaceHolder()) ?>"
        <?= $Grid->Day1PB->editAttributes() ?>>
        <?= $Grid->Day1PB->selectOptionListHtml("x{$Grid->RowIndex}_Day1PB") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1PB->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PB']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1PB", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1PB", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PB.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PB.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1PB" class="form-group ivf_embryology_chart_Day1PB">
<span<?= $Grid->Day1PB->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day1PB->getDisplayValue($Grid->Day1PB->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day1PB" id="x<?= $Grid->RowIndex ?>_Day1PB" value="<?= HtmlEncode($Grid->Day1PB->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1PB" id="o<?= $Grid->RowIndex ?>_Day1PB" value="<?= HtmlEncode($Grid->Day1PB->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <td data-name="Day1Pronucleus">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1Pronucleus" class="form-group ivf_embryology_chart_Day1Pronucleus">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1Pronucleus"
        name="x<?= $Grid->RowIndex ?>_Day1Pronucleus"
        class="form-control ew-select<?= $Grid->Day1Pronucleus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Pronucleus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Pronucleus"
        data-value-separator="<?= $Grid->Day1Pronucleus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1Pronucleus->getPlaceHolder()) ?>"
        <?= $Grid->Day1Pronucleus->editAttributes() ?>>
        <?= $Grid->Day1Pronucleus->selectOptionListHtml("x{$Grid->RowIndex}_Day1Pronucleus") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1Pronucleus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Pronucleus']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1Pronucleus", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Pronucleus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1Pronucleus" class="form-group ivf_embryology_chart_Day1Pronucleus">
<span<?= $Grid->Day1Pronucleus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day1Pronucleus->getDisplayValue($Grid->Day1Pronucleus->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day1Pronucleus" id="x<?= $Grid->RowIndex ?>_Day1Pronucleus" value="<?= HtmlEncode($Grid->Day1Pronucleus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1Pronucleus" id="o<?= $Grid->RowIndex ?>_Day1Pronucleus" value="<?= HtmlEncode($Grid->Day1Pronucleus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <td data-name="Day1Nucleolus">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1Nucleolus" class="form-group ivf_embryology_chart_Day1Nucleolus">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1Nucleolus"
        name="x<?= $Grid->RowIndex ?>_Day1Nucleolus"
        class="form-control ew-select<?= $Grid->Day1Nucleolus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Nucleolus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Nucleolus"
        data-value-separator="<?= $Grid->Day1Nucleolus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1Nucleolus->getPlaceHolder()) ?>"
        <?= $Grid->Day1Nucleolus->editAttributes() ?>>
        <?= $Grid->Day1Nucleolus->selectOptionListHtml("x{$Grid->RowIndex}_Day1Nucleolus") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1Nucleolus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Nucleolus']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1Nucleolus", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Nucleolus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1Nucleolus" class="form-group ivf_embryology_chart_Day1Nucleolus">
<span<?= $Grid->Day1Nucleolus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day1Nucleolus->getDisplayValue($Grid->Day1Nucleolus->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day1Nucleolus" id="x<?= $Grid->RowIndex ?>_Day1Nucleolus" value="<?= HtmlEncode($Grid->Day1Nucleolus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1Nucleolus" id="o<?= $Grid->RowIndex ?>_Day1Nucleolus" value="<?= HtmlEncode($Grid->Day1Nucleolus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day1Halo->Visible) { // Day1Halo ?>
        <td data-name="Day1Halo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1Halo" class="form-group ivf_embryology_chart_Day1Halo">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1Halo"
        name="x<?= $Grid->RowIndex ?>_Day1Halo"
        class="form-control ew-select<?= $Grid->Day1Halo->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Halo"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Halo"
        data-value-separator="<?= $Grid->Day1Halo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1Halo->getPlaceHolder()) ?>"
        <?= $Grid->Day1Halo->editAttributes() ?>>
        <?= $Grid->Day1Halo->selectOptionListHtml("x{$Grid->RowIndex}_Day1Halo") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1Halo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Halo']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1Halo", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1Halo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1Halo" class="form-group ivf_embryology_chart_Day1Halo">
<span<?= $Grid->Day1Halo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day1Halo->getDisplayValue($Grid->Day1Halo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day1Halo" id="x<?= $Grid->RowIndex ?>_Day1Halo" value="<?= HtmlEncode($Grid->Day1Halo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1Halo" id="o<?= $Grid->RowIndex ?>_Day1Halo" value="<?= HtmlEncode($Grid->Day1Halo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day2SiNo->Visible) { // Day2SiNo ?>
        <td data-name="Day2SiNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2SiNo" class="form-group ivf_embryology_chart_Day2SiNo">
<input type="<?= $Grid->Day2SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?= $Grid->RowIndex ?>_Day2SiNo" id="x<?= $Grid->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2SiNo->getPlaceHolder()) ?>" value="<?= $Grid->Day2SiNo->EditValue ?>"<?= $Grid->Day2SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2SiNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2SiNo" class="form-group ivf_embryology_chart_Day2SiNo">
<span<?= $Grid->Day2SiNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day2SiNo->getDisplayValue($Grid->Day2SiNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day2SiNo" id="x<?= $Grid->RowIndex ?>_Day2SiNo" value="<?= HtmlEncode($Grid->Day2SiNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2SiNo" id="o<?= $Grid->RowIndex ?>_Day2SiNo" value="<?= HtmlEncode($Grid->Day2SiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day2CellNo->Visible) { // Day2CellNo ?>
        <td data-name="Day2CellNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2CellNo" class="form-group ivf_embryology_chart_Day2CellNo">
<input type="<?= $Grid->Day2CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?= $Grid->RowIndex ?>_Day2CellNo" id="x<?= $Grid->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day2CellNo->EditValue ?>"<?= $Grid->Day2CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2CellNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2CellNo" class="form-group ivf_embryology_chart_Day2CellNo">
<span<?= $Grid->Day2CellNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day2CellNo->getDisplayValue($Grid->Day2CellNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day2CellNo" id="x<?= $Grid->RowIndex ?>_Day2CellNo" value="<?= HtmlEncode($Grid->Day2CellNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2CellNo" id="o<?= $Grid->RowIndex ?>_Day2CellNo" value="<?= HtmlEncode($Grid->Day2CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day2Frag->Visible) { // Day2Frag ?>
        <td data-name="Day2Frag">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2Frag" class="form-group ivf_embryology_chart_Day2Frag">
<input type="<?= $Grid->Day2Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?= $Grid->RowIndex ?>_Day2Frag" id="x<?= $Grid->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Frag->getPlaceHolder()) ?>" value="<?= $Grid->Day2Frag->EditValue ?>"<?= $Grid->Day2Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Frag->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2Frag" class="form-group ivf_embryology_chart_Day2Frag">
<span<?= $Grid->Day2Frag->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day2Frag->getDisplayValue($Grid->Day2Frag->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day2Frag" id="x<?= $Grid->RowIndex ?>_Day2Frag" value="<?= HtmlEncode($Grid->Day2Frag->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2Frag" id="o<?= $Grid->RowIndex ?>_Day2Frag" value="<?= HtmlEncode($Grid->Day2Frag->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <td data-name="Day2Symmetry">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2Symmetry" class="form-group ivf_embryology_chart_Day2Symmetry">
<input type="<?= $Grid->Day2Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?= $Grid->RowIndex ?>_Day2Symmetry" id="x<?= $Grid->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Symmetry->getPlaceHolder()) ?>" value="<?= $Grid->Day2Symmetry->EditValue ?>"<?= $Grid->Day2Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Symmetry->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2Symmetry" class="form-group ivf_embryology_chart_Day2Symmetry">
<span<?= $Grid->Day2Symmetry->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day2Symmetry->getDisplayValue($Grid->Day2Symmetry->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day2Symmetry" id="x<?= $Grid->RowIndex ?>_Day2Symmetry" value="<?= HtmlEncode($Grid->Day2Symmetry->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2Symmetry" id="o<?= $Grid->RowIndex ?>_Day2Symmetry" value="<?= HtmlEncode($Grid->Day2Symmetry->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <td data-name="Day2Cryoptop">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2Cryoptop" class="form-group ivf_embryology_chart_Day2Cryoptop">
<input type="<?= $Grid->Day2Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?= $Grid->RowIndex ?>_Day2Cryoptop" id="x<?= $Grid->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Cryoptop->getPlaceHolder()) ?>" value="<?= $Grid->Day2Cryoptop->EditValue ?>"<?= $Grid->Day2Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Cryoptop->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2Cryoptop" class="form-group ivf_embryology_chart_Day2Cryoptop">
<span<?= $Grid->Day2Cryoptop->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day2Cryoptop->getDisplayValue($Grid->Day2Cryoptop->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day2Cryoptop" id="x<?= $Grid->RowIndex ?>_Day2Cryoptop" value="<?= HtmlEncode($Grid->Day2Cryoptop->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2Cryoptop" id="o<?= $Grid->RowIndex ?>_Day2Cryoptop" value="<?= HtmlEncode($Grid->Day2Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day2Grade->Visible) { // Day2Grade ?>
        <td data-name="Day2Grade">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2Grade" class="form-group ivf_embryology_chart_Day2Grade">
<input type="<?= $Grid->Day2Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?= $Grid->RowIndex ?>_Day2Grade" id="x<?= $Grid->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day2Grade->getPlaceHolder()) ?>" value="<?= $Grid->Day2Grade->EditValue ?>"<?= $Grid->Day2Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day2Grade->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2Grade" class="form-group ivf_embryology_chart_Day2Grade">
<span<?= $Grid->Day2Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day2Grade->getDisplayValue($Grid->Day2Grade->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day2Grade" id="x<?= $Grid->RowIndex ?>_Day2Grade" value="<?= HtmlEncode($Grid->Day2Grade->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2Grade" id="o<?= $Grid->RowIndex ?>_Day2Grade" value="<?= HtmlEncode($Grid->Day2Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day2End->Visible) { // Day2End ?>
        <td data-name="Day2End">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2End" class="form-group ivf_embryology_chart_Day2End">
    <select
        id="x<?= $Grid->RowIndex ?>_Day2End"
        name="x<?= $Grid->RowIndex ?>_Day2End"
        class="form-control ew-select<?= $Grid->Day2End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day2End"
        data-table="ivf_embryology_chart"
        data-field="x_Day2End"
        data-value-separator="<?= $Grid->Day2End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day2End->getPlaceHolder()) ?>"
        <?= $Grid->Day2End->editAttributes() ?>>
        <?= $Grid->Day2End->selectOptionListHtml("x{$Grid->RowIndex}_Day2End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day2End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day2End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day2End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day2End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day2End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day2End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day2End" class="form-group ivf_embryology_chart_Day2End">
<span<?= $Grid->Day2End->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day2End->getDisplayValue($Grid->Day2End->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day2End" id="x<?= $Grid->RowIndex ?>_Day2End" value="<?= HtmlEncode($Grid->Day2End->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day2End" id="o<?= $Grid->RowIndex ?>_Day2End" value="<?= HtmlEncode($Grid->Day2End->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day3Sino->Visible) { // Day3Sino ?>
        <td data-name="Day3Sino">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Sino" class="form-group ivf_embryology_chart_Day3Sino">
<input type="<?= $Grid->Day3Sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?= $Grid->RowIndex ?>_Day3Sino" id="x<?= $Grid->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day3Sino->getPlaceHolder()) ?>" value="<?= $Grid->Day3Sino->EditValue ?>"<?= $Grid->Day3Sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day3Sino->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Sino" class="form-group ivf_embryology_chart_Day3Sino">
<span<?= $Grid->Day3Sino->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day3Sino->getDisplayValue($Grid->Day3Sino->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day3Sino" id="x<?= $Grid->RowIndex ?>_Day3Sino" value="<?= HtmlEncode($Grid->Day3Sino->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Sino" id="o<?= $Grid->RowIndex ?>_Day3Sino" value="<?= HtmlEncode($Grid->Day3Sino->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day3CellNo->Visible) { // Day3CellNo ?>
        <td data-name="Day3CellNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3CellNo" class="form-group ivf_embryology_chart_Day3CellNo">
<input type="<?= $Grid->Day3CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?= $Grid->RowIndex ?>_Day3CellNo" id="x<?= $Grid->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day3CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day3CellNo->EditValue ?>"<?= $Grid->Day3CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day3CellNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3CellNo" class="form-group ivf_embryology_chart_Day3CellNo">
<span<?= $Grid->Day3CellNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day3CellNo->getDisplayValue($Grid->Day3CellNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day3CellNo" id="x<?= $Grid->RowIndex ?>_Day3CellNo" value="<?= HtmlEncode($Grid->Day3CellNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3CellNo" id="o<?= $Grid->RowIndex ?>_Day3CellNo" value="<?= HtmlEncode($Grid->Day3CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day3Frag->Visible) { // Day3Frag ?>
        <td data-name="Day3Frag">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Frag" class="form-group ivf_embryology_chart_Day3Frag">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Frag"
        name="x<?= $Grid->RowIndex ?>_Day3Frag"
        class="form-control ew-select<?= $Grid->Day3Frag->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Frag"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Frag"
        data-value-separator="<?= $Grid->Day3Frag->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Frag->getPlaceHolder()) ?>"
        <?= $Grid->Day3Frag->editAttributes() ?>>
        <?= $Grid->Day3Frag->selectOptionListHtml("x{$Grid->RowIndex}_Day3Frag") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Frag->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Frag']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Frag", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Frag", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Frag" class="form-group ivf_embryology_chart_Day3Frag">
<span<?= $Grid->Day3Frag->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day3Frag->getDisplayValue($Grid->Day3Frag->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day3Frag" id="x<?= $Grid->RowIndex ?>_Day3Frag" value="<?= HtmlEncode($Grid->Day3Frag->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Frag" id="o<?= $Grid->RowIndex ?>_Day3Frag" value="<?= HtmlEncode($Grid->Day3Frag->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <td data-name="Day3Symmetry">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Symmetry" class="form-group ivf_embryology_chart_Day3Symmetry">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Symmetry"
        name="x<?= $Grid->RowIndex ?>_Day3Symmetry"
        class="form-control ew-select<?= $Grid->Day3Symmetry->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Symmetry"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Symmetry"
        data-value-separator="<?= $Grid->Day3Symmetry->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Symmetry->getPlaceHolder()) ?>"
        <?= $Grid->Day3Symmetry->editAttributes() ?>>
        <?= $Grid->Day3Symmetry->selectOptionListHtml("x{$Grid->RowIndex}_Day3Symmetry") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Symmetry->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Symmetry']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Symmetry", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Symmetry", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Symmetry" class="form-group ivf_embryology_chart_Day3Symmetry">
<span<?= $Grid->Day3Symmetry->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day3Symmetry->getDisplayValue($Grid->Day3Symmetry->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day3Symmetry" id="x<?= $Grid->RowIndex ?>_Day3Symmetry" value="<?= HtmlEncode($Grid->Day3Symmetry->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Symmetry" id="o<?= $Grid->RowIndex ?>_Day3Symmetry" value="<?= HtmlEncode($Grid->Day3Symmetry->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day3ZP->Visible) { // Day3ZP ?>
        <td data-name="Day3ZP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3ZP" class="form-group ivf_embryology_chart_Day3ZP">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3ZP"
        name="x<?= $Grid->RowIndex ?>_Day3ZP"
        class="form-control ew-select<?= $Grid->Day3ZP->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3ZP"
        data-table="ivf_embryology_chart"
        data-field="x_Day3ZP"
        data-value-separator="<?= $Grid->Day3ZP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3ZP->getPlaceHolder()) ?>"
        <?= $Grid->Day3ZP->editAttributes() ?>>
        <?= $Grid->Day3ZP->selectOptionListHtml("x{$Grid->RowIndex}_Day3ZP") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3ZP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3ZP']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3ZP", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3ZP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3ZP" class="form-group ivf_embryology_chart_Day3ZP">
<span<?= $Grid->Day3ZP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day3ZP->getDisplayValue($Grid->Day3ZP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day3ZP" id="x<?= $Grid->RowIndex ?>_Day3ZP" value="<?= HtmlEncode($Grid->Day3ZP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3ZP" id="o<?= $Grid->RowIndex ?>_Day3ZP" value="<?= HtmlEncode($Grid->Day3ZP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <td data-name="Day3Vacoules">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Vacoules" class="form-group ivf_embryology_chart_Day3Vacoules">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Vacoules"
        name="x<?= $Grid->RowIndex ?>_Day3Vacoules"
        class="form-control ew-select<?= $Grid->Day3Vacoules->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Vacoules"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Vacoules"
        data-value-separator="<?= $Grid->Day3Vacoules->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Vacoules->getPlaceHolder()) ?>"
        <?= $Grid->Day3Vacoules->editAttributes() ?>>
        <?= $Grid->Day3Vacoules->selectOptionListHtml("x{$Grid->RowIndex}_Day3Vacoules") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Vacoules->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Vacoules']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Vacoules", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Vacoules", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Vacoules" class="form-group ivf_embryology_chart_Day3Vacoules">
<span<?= $Grid->Day3Vacoules->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day3Vacoules->getDisplayValue($Grid->Day3Vacoules->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day3Vacoules" id="x<?= $Grid->RowIndex ?>_Day3Vacoules" value="<?= HtmlEncode($Grid->Day3Vacoules->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Vacoules" id="o<?= $Grid->RowIndex ?>_Day3Vacoules" value="<?= HtmlEncode($Grid->Day3Vacoules->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day3Grade->Visible) { // Day3Grade ?>
        <td data-name="Day3Grade">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Grade" class="form-group ivf_embryology_chart_Day3Grade">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Grade"
        name="x<?= $Grid->RowIndex ?>_Day3Grade"
        class="form-control ew-select<?= $Grid->Day3Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Grade"
        data-value-separator="<?= $Grid->Day3Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Grade->getPlaceHolder()) ?>"
        <?= $Grid->Day3Grade->editAttributes() ?>>
        <?= $Grid->Day3Grade->selectOptionListHtml("x{$Grid->RowIndex}_Day3Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Grade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Grade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Grade" class="form-group ivf_embryology_chart_Day3Grade">
<span<?= $Grid->Day3Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day3Grade->getDisplayValue($Grid->Day3Grade->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day3Grade" id="x<?= $Grid->RowIndex ?>_Day3Grade" value="<?= HtmlEncode($Grid->Day3Grade->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Grade" id="o<?= $Grid->RowIndex ?>_Day3Grade" value="<?= HtmlEncode($Grid->Day3Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <td data-name="Day3Cryoptop">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Cryoptop" class="form-group ivf_embryology_chart_Day3Cryoptop">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3Cryoptop"
        name="x<?= $Grid->RowIndex ?>_Day3Cryoptop"
        class="form-control ew-select<?= $Grid->Day3Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Cryoptop"
        data-value-separator="<?= $Grid->Day3Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3Cryoptop->getPlaceHolder()) ?>"
        <?= $Grid->Day3Cryoptop->editAttributes() ?>>
        <?= $Grid->Day3Cryoptop->selectOptionListHtml("x{$Grid->RowIndex}_Day3Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Cryoptop']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3Cryoptop", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3Cryoptop" class="form-group ivf_embryology_chart_Day3Cryoptop">
<span<?= $Grid->Day3Cryoptop->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day3Cryoptop->getDisplayValue($Grid->Day3Cryoptop->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day3Cryoptop" id="x<?= $Grid->RowIndex ?>_Day3Cryoptop" value="<?= HtmlEncode($Grid->Day3Cryoptop->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3Cryoptop" id="o<?= $Grid->RowIndex ?>_Day3Cryoptop" value="<?= HtmlEncode($Grid->Day3Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day3End->Visible) { // Day3End ?>
        <td data-name="Day3End">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3End" class="form-group ivf_embryology_chart_Day3End">
    <select
        id="x<?= $Grid->RowIndex ?>_Day3End"
        name="x<?= $Grid->RowIndex ?>_Day3End"
        class="form-control ew-select<?= $Grid->Day3End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3End"
        data-table="ivf_embryology_chart"
        data-field="x_Day3End"
        data-value-separator="<?= $Grid->Day3End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day3End->getPlaceHolder()) ?>"
        <?= $Grid->Day3End->editAttributes() ?>>
        <?= $Grid->Day3End->selectOptionListHtml("x{$Grid->RowIndex}_Day3End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day3End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day3End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day3End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day3End" class="form-group ivf_embryology_chart_Day3End">
<span<?= $Grid->Day3End->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day3End->getDisplayValue($Grid->Day3End->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day3End" id="x<?= $Grid->RowIndex ?>_Day3End" value="<?= HtmlEncode($Grid->Day3End->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day3End" id="o<?= $Grid->RowIndex ?>_Day3End" value="<?= HtmlEncode($Grid->Day3End->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day4SiNo->Visible) { // Day4SiNo ?>
        <td data-name="Day4SiNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4SiNo" class="form-group ivf_embryology_chart_Day4SiNo">
<input type="<?= $Grid->Day4SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?= $Grid->RowIndex ?>_Day4SiNo" id="x<?= $Grid->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4SiNo->getPlaceHolder()) ?>" value="<?= $Grid->Day4SiNo->EditValue ?>"<?= $Grid->Day4SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4SiNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4SiNo" class="form-group ivf_embryology_chart_Day4SiNo">
<span<?= $Grid->Day4SiNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day4SiNo->getDisplayValue($Grid->Day4SiNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day4SiNo" id="x<?= $Grid->RowIndex ?>_Day4SiNo" value="<?= HtmlEncode($Grid->Day4SiNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4SiNo" id="o<?= $Grid->RowIndex ?>_Day4SiNo" value="<?= HtmlEncode($Grid->Day4SiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day4CellNo->Visible) { // Day4CellNo ?>
        <td data-name="Day4CellNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4CellNo" class="form-group ivf_embryology_chart_Day4CellNo">
<input type="<?= $Grid->Day4CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?= $Grid->RowIndex ?>_Day4CellNo" id="x<?= $Grid->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day4CellNo->EditValue ?>"<?= $Grid->Day4CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4CellNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4CellNo" class="form-group ivf_embryology_chart_Day4CellNo">
<span<?= $Grid->Day4CellNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day4CellNo->getDisplayValue($Grid->Day4CellNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day4CellNo" id="x<?= $Grid->RowIndex ?>_Day4CellNo" value="<?= HtmlEncode($Grid->Day4CellNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4CellNo" id="o<?= $Grid->RowIndex ?>_Day4CellNo" value="<?= HtmlEncode($Grid->Day4CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day4Frag->Visible) { // Day4Frag ?>
        <td data-name="Day4Frag">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4Frag" class="form-group ivf_embryology_chart_Day4Frag">
<input type="<?= $Grid->Day4Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?= $Grid->RowIndex ?>_Day4Frag" id="x<?= $Grid->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4Frag->getPlaceHolder()) ?>" value="<?= $Grid->Day4Frag->EditValue ?>"<?= $Grid->Day4Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4Frag->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4Frag" class="form-group ivf_embryology_chart_Day4Frag">
<span<?= $Grid->Day4Frag->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day4Frag->getDisplayValue($Grid->Day4Frag->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day4Frag" id="x<?= $Grid->RowIndex ?>_Day4Frag" value="<?= HtmlEncode($Grid->Day4Frag->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4Frag" id="o<?= $Grid->RowIndex ?>_Day4Frag" value="<?= HtmlEncode($Grid->Day4Frag->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <td data-name="Day4Symmetry">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4Symmetry" class="form-group ivf_embryology_chart_Day4Symmetry">
<input type="<?= $Grid->Day4Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?= $Grid->RowIndex ?>_Day4Symmetry" id="x<?= $Grid->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4Symmetry->getPlaceHolder()) ?>" value="<?= $Grid->Day4Symmetry->EditValue ?>"<?= $Grid->Day4Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4Symmetry->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4Symmetry" class="form-group ivf_embryology_chart_Day4Symmetry">
<span<?= $Grid->Day4Symmetry->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day4Symmetry->getDisplayValue($Grid->Day4Symmetry->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day4Symmetry" id="x<?= $Grid->RowIndex ?>_Day4Symmetry" value="<?= HtmlEncode($Grid->Day4Symmetry->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4Symmetry" id="o<?= $Grid->RowIndex ?>_Day4Symmetry" value="<?= HtmlEncode($Grid->Day4Symmetry->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day4Grade->Visible) { // Day4Grade ?>
        <td data-name="Day4Grade">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4Grade" class="form-group ivf_embryology_chart_Day4Grade">
<input type="<?= $Grid->Day4Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?= $Grid->RowIndex ?>_Day4Grade" id="x<?= $Grid->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day4Grade->getPlaceHolder()) ?>" value="<?= $Grid->Day4Grade->EditValue ?>"<?= $Grid->Day4Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day4Grade->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4Grade" class="form-group ivf_embryology_chart_Day4Grade">
<span<?= $Grid->Day4Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day4Grade->getDisplayValue($Grid->Day4Grade->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day4Grade" id="x<?= $Grid->RowIndex ?>_Day4Grade" value="<?= HtmlEncode($Grid->Day4Grade->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4Grade" id="o<?= $Grid->RowIndex ?>_Day4Grade" value="<?= HtmlEncode($Grid->Day4Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <td data-name="Day4Cryoptop">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4Cryoptop" class="form-group ivf_embryology_chart_Day4Cryoptop">
    <select
        id="x<?= $Grid->RowIndex ?>_Day4Cryoptop"
        name="x<?= $Grid->RowIndex ?>_Day4Cryoptop"
        class="form-control ew-select<?= $Grid->Day4Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day4Cryoptop"
        data-value-separator="<?= $Grid->Day4Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day4Cryoptop->getPlaceHolder()) ?>"
        <?= $Grid->Day4Cryoptop->editAttributes() ?>>
        <?= $Grid->Day4Cryoptop->selectOptionListHtml("x{$Grid->RowIndex}_Day4Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day4Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4Cryoptop']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day4Cryoptop", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4Cryoptop" class="form-group ivf_embryology_chart_Day4Cryoptop">
<span<?= $Grid->Day4Cryoptop->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day4Cryoptop->getDisplayValue($Grid->Day4Cryoptop->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day4Cryoptop" id="x<?= $Grid->RowIndex ?>_Day4Cryoptop" value="<?= HtmlEncode($Grid->Day4Cryoptop->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4Cryoptop" id="o<?= $Grid->RowIndex ?>_Day4Cryoptop" value="<?= HtmlEncode($Grid->Day4Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day4End->Visible) { // Day4End ?>
        <td data-name="Day4End">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4End" class="form-group ivf_embryology_chart_Day4End">
    <select
        id="x<?= $Grid->RowIndex ?>_Day4End"
        name="x<?= $Grid->RowIndex ?>_Day4End"
        class="form-control ew-select<?= $Grid->Day4End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4End"
        data-table="ivf_embryology_chart"
        data-field="x_Day4End"
        data-value-separator="<?= $Grid->Day4End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day4End->getPlaceHolder()) ?>"
        <?= $Grid->Day4End->editAttributes() ?>>
        <?= $Grid->Day4End->selectOptionListHtml("x{$Grid->RowIndex}_Day4End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day4End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day4End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day4End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day4End" class="form-group ivf_embryology_chart_Day4End">
<span<?= $Grid->Day4End->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day4End->getDisplayValue($Grid->Day4End->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day4End" id="x<?= $Grid->RowIndex ?>_Day4End" value="<?= HtmlEncode($Grid->Day4End->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day4End" id="o<?= $Grid->RowIndex ?>_Day4End" value="<?= HtmlEncode($Grid->Day4End->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day5CellNo->Visible) { // Day5CellNo ?>
        <td data-name="Day5CellNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5CellNo" class="form-group ivf_embryology_chart_Day5CellNo">
<input type="<?= $Grid->Day5CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?= $Grid->RowIndex ?>_Day5CellNo" id="x<?= $Grid->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day5CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day5CellNo->EditValue ?>"<?= $Grid->Day5CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day5CellNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5CellNo" class="form-group ivf_embryology_chart_Day5CellNo">
<span<?= $Grid->Day5CellNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day5CellNo->getDisplayValue($Grid->Day5CellNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day5CellNo" id="x<?= $Grid->RowIndex ?>_Day5CellNo" value="<?= HtmlEncode($Grid->Day5CellNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5CellNo" id="o<?= $Grid->RowIndex ?>_Day5CellNo" value="<?= HtmlEncode($Grid->Day5CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day5ICM->Visible) { // Day5ICM ?>
        <td data-name="Day5ICM">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5ICM" class="form-group ivf_embryology_chart_Day5ICM">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5ICM"
        name="x<?= $Grid->RowIndex ?>_Day5ICM"
        class="form-control ew-select<?= $Grid->Day5ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day5ICM"
        data-value-separator="<?= $Grid->Day5ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5ICM->getPlaceHolder()) ?>"
        <?= $Grid->Day5ICM->editAttributes() ?>>
        <?= $Grid->Day5ICM->selectOptionListHtml("x{$Grid->RowIndex}_Day5ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5ICM']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5ICM", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5ICM" class="form-group ivf_embryology_chart_Day5ICM">
<span<?= $Grid->Day5ICM->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day5ICM->getDisplayValue($Grid->Day5ICM->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day5ICM" id="x<?= $Grid->RowIndex ?>_Day5ICM" value="<?= HtmlEncode($Grid->Day5ICM->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5ICM" id="o<?= $Grid->RowIndex ?>_Day5ICM" value="<?= HtmlEncode($Grid->Day5ICM->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day5TE->Visible) { // Day5TE ?>
        <td data-name="Day5TE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5TE" class="form-group ivf_embryology_chart_Day5TE">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5TE"
        name="x<?= $Grid->RowIndex ?>_Day5TE"
        class="form-control ew-select<?= $Grid->Day5TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day5TE"
        data-value-separator="<?= $Grid->Day5TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5TE->getPlaceHolder()) ?>"
        <?= $Grid->Day5TE->editAttributes() ?>>
        <?= $Grid->Day5TE->selectOptionListHtml("x{$Grid->RowIndex}_Day5TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5TE']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5TE", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5TE" class="form-group ivf_embryology_chart_Day5TE">
<span<?= $Grid->Day5TE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day5TE->getDisplayValue($Grid->Day5TE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day5TE" id="x<?= $Grid->RowIndex ?>_Day5TE" value="<?= HtmlEncode($Grid->Day5TE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5TE" id="o<?= $Grid->RowIndex ?>_Day5TE" value="<?= HtmlEncode($Grid->Day5TE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day5Observation->Visible) { // Day5Observation ?>
        <td data-name="Day5Observation">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5Observation" class="form-group ivf_embryology_chart_Day5Observation">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Observation"
        name="x<?= $Grid->RowIndex ?>_Day5Observation"
        class="form-control ew-select<?= $Grid->Day5Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Observation"
        data-value-separator="<?= $Grid->Day5Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Observation->getPlaceHolder()) ?>"
        <?= $Grid->Day5Observation->editAttributes() ?>>
        <?= $Grid->Day5Observation->selectOptionListHtml("x{$Grid->RowIndex}_Day5Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Observation']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Observation", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5Observation" class="form-group ivf_embryology_chart_Day5Observation">
<span<?= $Grid->Day5Observation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day5Observation->getDisplayValue($Grid->Day5Observation->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day5Observation" id="x<?= $Grid->RowIndex ?>_Day5Observation" value="<?= HtmlEncode($Grid->Day5Observation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5Observation" id="o<?= $Grid->RowIndex ?>_Day5Observation" value="<?= HtmlEncode($Grid->Day5Observation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <td data-name="Day5Collapsed">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5Collapsed" class="form-group ivf_embryology_chart_Day5Collapsed">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Collapsed"
        name="x<?= $Grid->RowIndex ?>_Day5Collapsed"
        class="form-control ew-select<?= $Grid->Day5Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Collapsed"
        data-value-separator="<?= $Grid->Day5Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Collapsed->getPlaceHolder()) ?>"
        <?= $Grid->Day5Collapsed->editAttributes() ?>>
        <?= $Grid->Day5Collapsed->selectOptionListHtml("x{$Grid->RowIndex}_Day5Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Collapsed']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Collapsed", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5Collapsed" class="form-group ivf_embryology_chart_Day5Collapsed">
<span<?= $Grid->Day5Collapsed->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day5Collapsed->getDisplayValue($Grid->Day5Collapsed->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day5Collapsed" id="x<?= $Grid->RowIndex ?>_Day5Collapsed" value="<?= HtmlEncode($Grid->Day5Collapsed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5Collapsed" id="o<?= $Grid->RowIndex ?>_Day5Collapsed" value="<?= HtmlEncode($Grid->Day5Collapsed->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <td data-name="Day5Vacoulles">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5Vacoulles" class="form-group ivf_embryology_chart_Day5Vacoulles">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Vacoulles"
        name="x<?= $Grid->RowIndex ?>_Day5Vacoulles"
        class="form-control ew-select<?= $Grid->Day5Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Vacoulles"
        data-value-separator="<?= $Grid->Day5Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Vacoulles->getPlaceHolder()) ?>"
        <?= $Grid->Day5Vacoulles->editAttributes() ?>>
        <?= $Grid->Day5Vacoulles->selectOptionListHtml("x{$Grid->RowIndex}_Day5Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Vacoulles']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Vacoulles", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5Vacoulles" class="form-group ivf_embryology_chart_Day5Vacoulles">
<span<?= $Grid->Day5Vacoulles->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day5Vacoulles->getDisplayValue($Grid->Day5Vacoulles->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day5Vacoulles" id="x<?= $Grid->RowIndex ?>_Day5Vacoulles" value="<?= HtmlEncode($Grid->Day5Vacoulles->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5Vacoulles" id="o<?= $Grid->RowIndex ?>_Day5Vacoulles" value="<?= HtmlEncode($Grid->Day5Vacoulles->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day5Grade->Visible) { // Day5Grade ?>
        <td data-name="Day5Grade">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5Grade" class="form-group ivf_embryology_chart_Day5Grade">
    <select
        id="x<?= $Grid->RowIndex ?>_Day5Grade"
        name="x<?= $Grid->RowIndex ?>_Day5Grade"
        class="form-control ew-select<?= $Grid->Day5Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Grade"
        data-value-separator="<?= $Grid->Day5Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day5Grade->getPlaceHolder()) ?>"
        <?= $Grid->Day5Grade->editAttributes() ?>>
        <?= $Grid->Day5Grade->selectOptionListHtml("x{$Grid->RowIndex}_Day5Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day5Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Grade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day5Grade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day5Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day5Grade" class="form-group ivf_embryology_chart_Day5Grade">
<span<?= $Grid->Day5Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day5Grade->getDisplayValue($Grid->Day5Grade->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day5Grade" id="x<?= $Grid->RowIndex ?>_Day5Grade" value="<?= HtmlEncode($Grid->Day5Grade->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day5Grade" id="o<?= $Grid->RowIndex ?>_Day5Grade" value="<?= HtmlEncode($Grid->Day5Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day6CellNo->Visible) { // Day6CellNo ?>
        <td data-name="Day6CellNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6CellNo" class="form-group ivf_embryology_chart_Day6CellNo">
<input type="<?= $Grid->Day6CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?= $Grid->RowIndex ?>_Day6CellNo" id="x<?= $Grid->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day6CellNo->getPlaceHolder()) ?>" value="<?= $Grid->Day6CellNo->EditValue ?>"<?= $Grid->Day6CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day6CellNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6CellNo" class="form-group ivf_embryology_chart_Day6CellNo">
<span<?= $Grid->Day6CellNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day6CellNo->getDisplayValue($Grid->Day6CellNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day6CellNo" id="x<?= $Grid->RowIndex ?>_Day6CellNo" value="<?= HtmlEncode($Grid->Day6CellNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6CellNo" id="o<?= $Grid->RowIndex ?>_Day6CellNo" value="<?= HtmlEncode($Grid->Day6CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day6ICM->Visible) { // Day6ICM ?>
        <td data-name="Day6ICM">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6ICM" class="form-group ivf_embryology_chart_Day6ICM">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6ICM"
        name="x<?= $Grid->RowIndex ?>_Day6ICM"
        class="form-control ew-select<?= $Grid->Day6ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day6ICM"
        data-value-separator="<?= $Grid->Day6ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6ICM->getPlaceHolder()) ?>"
        <?= $Grid->Day6ICM->editAttributes() ?>>
        <?= $Grid->Day6ICM->selectOptionListHtml("x{$Grid->RowIndex}_Day6ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6ICM']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6ICM", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6ICM" class="form-group ivf_embryology_chart_Day6ICM">
<span<?= $Grid->Day6ICM->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day6ICM->getDisplayValue($Grid->Day6ICM->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day6ICM" id="x<?= $Grid->RowIndex ?>_Day6ICM" value="<?= HtmlEncode($Grid->Day6ICM->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6ICM" id="o<?= $Grid->RowIndex ?>_Day6ICM" value="<?= HtmlEncode($Grid->Day6ICM->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day6TE->Visible) { // Day6TE ?>
        <td data-name="Day6TE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6TE" class="form-group ivf_embryology_chart_Day6TE">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6TE"
        name="x<?= $Grid->RowIndex ?>_Day6TE"
        class="form-control ew-select<?= $Grid->Day6TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day6TE"
        data-value-separator="<?= $Grid->Day6TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6TE->getPlaceHolder()) ?>"
        <?= $Grid->Day6TE->editAttributes() ?>>
        <?= $Grid->Day6TE->selectOptionListHtml("x{$Grid->RowIndex}_Day6TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6TE']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6TE", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6TE" class="form-group ivf_embryology_chart_Day6TE">
<span<?= $Grid->Day6TE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day6TE->getDisplayValue($Grid->Day6TE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day6TE" id="x<?= $Grid->RowIndex ?>_Day6TE" value="<?= HtmlEncode($Grid->Day6TE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6TE" id="o<?= $Grid->RowIndex ?>_Day6TE" value="<?= HtmlEncode($Grid->Day6TE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day6Observation->Visible) { // Day6Observation ?>
        <td data-name="Day6Observation">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6Observation" class="form-group ivf_embryology_chart_Day6Observation">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Observation"
        name="x<?= $Grid->RowIndex ?>_Day6Observation"
        class="form-control ew-select<?= $Grid->Day6Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Observation"
        data-value-separator="<?= $Grid->Day6Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Observation->getPlaceHolder()) ?>"
        <?= $Grid->Day6Observation->editAttributes() ?>>
        <?= $Grid->Day6Observation->selectOptionListHtml("x{$Grid->RowIndex}_Day6Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Observation']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Observation", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6Observation" class="form-group ivf_embryology_chart_Day6Observation">
<span<?= $Grid->Day6Observation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day6Observation->getDisplayValue($Grid->Day6Observation->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day6Observation" id="x<?= $Grid->RowIndex ?>_Day6Observation" value="<?= HtmlEncode($Grid->Day6Observation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6Observation" id="o<?= $Grid->RowIndex ?>_Day6Observation" value="<?= HtmlEncode($Grid->Day6Observation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <td data-name="Day6Collapsed">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6Collapsed" class="form-group ivf_embryology_chart_Day6Collapsed">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Collapsed"
        name="x<?= $Grid->RowIndex ?>_Day6Collapsed"
        class="form-control ew-select<?= $Grid->Day6Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Collapsed"
        data-value-separator="<?= $Grid->Day6Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Collapsed->getPlaceHolder()) ?>"
        <?= $Grid->Day6Collapsed->editAttributes() ?>>
        <?= $Grid->Day6Collapsed->selectOptionListHtml("x{$Grid->RowIndex}_Day6Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Collapsed']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Collapsed", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6Collapsed" class="form-group ivf_embryology_chart_Day6Collapsed">
<span<?= $Grid->Day6Collapsed->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day6Collapsed->getDisplayValue($Grid->Day6Collapsed->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day6Collapsed" id="x<?= $Grid->RowIndex ?>_Day6Collapsed" value="<?= HtmlEncode($Grid->Day6Collapsed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6Collapsed" id="o<?= $Grid->RowIndex ?>_Day6Collapsed" value="<?= HtmlEncode($Grid->Day6Collapsed->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <td data-name="Day6Vacoulles">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6Vacoulles" class="form-group ivf_embryology_chart_Day6Vacoulles">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Vacoulles"
        name="x<?= $Grid->RowIndex ?>_Day6Vacoulles"
        class="form-control ew-select<?= $Grid->Day6Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Vacoulles"
        data-value-separator="<?= $Grid->Day6Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Vacoulles->getPlaceHolder()) ?>"
        <?= $Grid->Day6Vacoulles->editAttributes() ?>>
        <?= $Grid->Day6Vacoulles->selectOptionListHtml("x{$Grid->RowIndex}_Day6Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Vacoulles']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Vacoulles", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6Vacoulles" class="form-group ivf_embryology_chart_Day6Vacoulles">
<span<?= $Grid->Day6Vacoulles->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day6Vacoulles->getDisplayValue($Grid->Day6Vacoulles->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day6Vacoulles" id="x<?= $Grid->RowIndex ?>_Day6Vacoulles" value="<?= HtmlEncode($Grid->Day6Vacoulles->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6Vacoulles" id="o<?= $Grid->RowIndex ?>_Day6Vacoulles" value="<?= HtmlEncode($Grid->Day6Vacoulles->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day6Grade->Visible) { // Day6Grade ?>
        <td data-name="Day6Grade">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6Grade" class="form-group ivf_embryology_chart_Day6Grade">
    <select
        id="x<?= $Grid->RowIndex ?>_Day6Grade"
        name="x<?= $Grid->RowIndex ?>_Day6Grade"
        class="form-control ew-select<?= $Grid->Day6Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Grade"
        data-value-separator="<?= $Grid->Day6Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day6Grade->getPlaceHolder()) ?>"
        <?= $Grid->Day6Grade->editAttributes() ?>>
        <?= $Grid->Day6Grade->selectOptionListHtml("x{$Grid->RowIndex}_Day6Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day6Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Grade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day6Grade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day6Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6Grade" class="form-group ivf_embryology_chart_Day6Grade">
<span<?= $Grid->Day6Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day6Grade->getDisplayValue($Grid->Day6Grade->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day6Grade" id="x<?= $Grid->RowIndex ?>_Day6Grade" value="<?= HtmlEncode($Grid->Day6Grade->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6Grade" id="o<?= $Grid->RowIndex ?>_Day6Grade" value="<?= HtmlEncode($Grid->Day6Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <td data-name="Day6Cryoptop">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6Cryoptop" class="form-group ivf_embryology_chart_Day6Cryoptop">
<input type="<?= $Grid->Day6Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?= $Grid->RowIndex ?>_Day6Cryoptop" id="x<?= $Grid->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Day6Cryoptop->getPlaceHolder()) ?>" value="<?= $Grid->Day6Cryoptop->EditValue ?>"<?= $Grid->Day6Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Day6Cryoptop->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day6Cryoptop" class="form-group ivf_embryology_chart_Day6Cryoptop">
<span<?= $Grid->Day6Cryoptop->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day6Cryoptop->getDisplayValue($Grid->Day6Cryoptop->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day6Cryoptop" id="x<?= $Grid->RowIndex ?>_Day6Cryoptop" value="<?= HtmlEncode($Grid->Day6Cryoptop->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day6Cryoptop" id="o<?= $Grid->RowIndex ?>_Day6Cryoptop" value="<?= HtmlEncode($Grid->Day6Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EndSiNo->Visible) { // EndSiNo ?>
        <td data-name="EndSiNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_EndSiNo" class="form-group ivf_embryology_chart_EndSiNo">
<input type="<?= $Grid->EndSiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?= $Grid->RowIndex ?>_EndSiNo" id="x<?= $Grid->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->EndSiNo->getPlaceHolder()) ?>" value="<?= $Grid->EndSiNo->EditValue ?>"<?= $Grid->EndSiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EndSiNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_EndSiNo" class="form-group ivf_embryology_chart_EndSiNo">
<span<?= $Grid->EndSiNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EndSiNo->getDisplayValue($Grid->EndSiNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EndSiNo" id="x<?= $Grid->RowIndex ?>_EndSiNo" value="<?= HtmlEncode($Grid->EndSiNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EndSiNo" id="o<?= $Grid->RowIndex ?>_EndSiNo" value="<?= HtmlEncode($Grid->EndSiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EndingDay->Visible) { // EndingDay ?>
        <td data-name="EndingDay">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_EndingDay" class="form-group ivf_embryology_chart_EndingDay">
    <select
        id="x<?= $Grid->RowIndex ?>_EndingDay"
        name="x<?= $Grid->RowIndex ?>_EndingDay"
        class="form-control ew-select<?= $Grid->EndingDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingDay"
        data-table="ivf_embryology_chart"
        data-field="x_EndingDay"
        data-value-separator="<?= $Grid->EndingDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EndingDay->getPlaceHolder()) ?>"
        <?= $Grid->EndingDay->editAttributes() ?>>
        <?= $Grid->EndingDay->selectOptionListHtml("x{$Grid->RowIndex}_EndingDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EndingDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingDay']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EndingDay", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_EndingDay" class="form-group ivf_embryology_chart_EndingDay">
<span<?= $Grid->EndingDay->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EndingDay->getDisplayValue($Grid->EndingDay->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EndingDay" id="x<?= $Grid->RowIndex ?>_EndingDay" value="<?= HtmlEncode($Grid->EndingDay->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EndingDay" id="o<?= $Grid->RowIndex ?>_EndingDay" value="<?= HtmlEncode($Grid->EndingDay->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EndingCellStage->Visible) { // EndingCellStage ?>
        <td data-name="EndingCellStage">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_EndingCellStage" class="form-group ivf_embryology_chart_EndingCellStage">
<input type="<?= $Grid->EndingCellStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?= $Grid->RowIndex ?>_EndingCellStage" id="x<?= $Grid->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->EndingCellStage->getPlaceHolder()) ?>" value="<?= $Grid->EndingCellStage->EditValue ?>"<?= $Grid->EndingCellStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EndingCellStage->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_EndingCellStage" class="form-group ivf_embryology_chart_EndingCellStage">
<span<?= $Grid->EndingCellStage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EndingCellStage->getDisplayValue($Grid->EndingCellStage->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EndingCellStage" id="x<?= $Grid->RowIndex ?>_EndingCellStage" value="<?= HtmlEncode($Grid->EndingCellStage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EndingCellStage" id="o<?= $Grid->RowIndex ?>_EndingCellStage" value="<?= HtmlEncode($Grid->EndingCellStage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EndingGrade->Visible) { // EndingGrade ?>
        <td data-name="EndingGrade">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_EndingGrade" class="form-group ivf_embryology_chart_EndingGrade">
    <select
        id="x<?= $Grid->RowIndex ?>_EndingGrade"
        name="x<?= $Grid->RowIndex ?>_EndingGrade"
        class="form-control ew-select<?= $Grid->EndingGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingGrade"
        data-table="ivf_embryology_chart"
        data-field="x_EndingGrade"
        data-value-separator="<?= $Grid->EndingGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EndingGrade->getPlaceHolder()) ?>"
        <?= $Grid->EndingGrade->editAttributes() ?>>
        <?= $Grid->EndingGrade->selectOptionListHtml("x{$Grid->RowIndex}_EndingGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EndingGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingGrade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EndingGrade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_EndingGrade" class="form-group ivf_embryology_chart_EndingGrade">
<span<?= $Grid->EndingGrade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EndingGrade->getDisplayValue($Grid->EndingGrade->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EndingGrade" id="x<?= $Grid->RowIndex ?>_EndingGrade" value="<?= HtmlEncode($Grid->EndingGrade->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EndingGrade" id="o<?= $Grid->RowIndex ?>_EndingGrade" value="<?= HtmlEncode($Grid->EndingGrade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EndingState->Visible) { // EndingState ?>
        <td data-name="EndingState">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_EndingState" class="form-group ivf_embryology_chart_EndingState">
    <select
        id="x<?= $Grid->RowIndex ?>_EndingState"
        name="x<?= $Grid->RowIndex ?>_EndingState"
        class="form-control ew-select<?= $Grid->EndingState->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingState"
        data-table="ivf_embryology_chart"
        data-field="x_EndingState"
        data-value-separator="<?= $Grid->EndingState->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->EndingState->getPlaceHolder()) ?>"
        <?= $Grid->EndingState->editAttributes() ?>>
        <?= $Grid->EndingState->selectOptionListHtml("x{$Grid->RowIndex}_EndingState") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->EndingState->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingState']"),
        options = { name: "x<?= $Grid->RowIndex ?>_EndingState", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_EndingState", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingState.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingState.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_EndingState" class="form-group ivf_embryology_chart_EndingState">
<span<?= $Grid->EndingState->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EndingState->getDisplayValue($Grid->EndingState->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EndingState" id="x<?= $Grid->RowIndex ?>_EndingState" value="<?= HtmlEncode($Grid->EndingState->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EndingState" id="o<?= $Grid->RowIndex ?>_EndingState" value="<?= HtmlEncode($Grid->EndingState->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TidNo" id="o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DidNO->Visible) { // DidNO ?>
        <td data-name="DidNO">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->DidNO->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<span<?= $Grid->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DidNO->getDisplayValue($Grid->DidNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DidNO" name="x<?= $Grid->RowIndex ?>_DidNO" value="<?= HtmlEncode($Grid->DidNO->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<input type="<?= $Grid->DidNO->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x<?= $Grid->RowIndex ?>_DidNO" id="x<?= $Grid->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DidNO->getPlaceHolder()) ?>" value="<?= $Grid->DidNO->EditValue ?>"<?= $Grid->DidNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DidNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<span<?= $Grid->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DidNO->getDisplayValue($Grid->DidNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DidNO" id="x<?= $Grid->RowIndex ?>_DidNO" value="<?= HtmlEncode($Grid->DidNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DidNO" id="o<?= $Grid->RowIndex ?>_DidNO" value="<?= HtmlEncode($Grid->DidNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <td data-name="ICSiIVFDateTime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_ICSiIVFDateTime" class="form-group ivf_embryology_chart_ICSiIVFDateTime">
<input type="<?= $Grid->ICSiIVFDateTime->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?= $Grid->RowIndex ?>_ICSiIVFDateTime" id="x<?= $Grid->RowIndex ?>_ICSiIVFDateTime" placeholder="<?= HtmlEncode($Grid->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?= $Grid->ICSiIVFDateTime->EditValue ?>"<?= $Grid->ICSiIVFDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ICSiIVFDateTime->getErrorMessage() ?></div>
<?php if (!$Grid->ICSiIVFDateTime->ReadOnly && !$Grid->ICSiIVFDateTime->Disabled && !isset($Grid->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($Grid->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_ICSiIVFDateTime" class="form-group ivf_embryology_chart_ICSiIVFDateTime">
<span<?= $Grid->ICSiIVFDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ICSiIVFDateTime->getDisplayValue($Grid->ICSiIVFDateTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ICSiIVFDateTime" id="x<?= $Grid->RowIndex ?>_ICSiIVFDateTime" value="<?= HtmlEncode($Grid->ICSiIVFDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ICSiIVFDateTime" id="o<?= $Grid->RowIndex ?>_ICSiIVFDateTime" value="<?= HtmlEncode($Grid->ICSiIVFDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <td data-name="PrimaryEmbrologist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_PrimaryEmbrologist" class="form-group ivf_embryology_chart_PrimaryEmbrologist">
<input type="<?= $Grid->PrimaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?= $Grid->RowIndex ?>_PrimaryEmbrologist" id="x<?= $Grid->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Grid->PrimaryEmbrologist->EditValue ?>"<?= $Grid->PrimaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrimaryEmbrologist->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_PrimaryEmbrologist" class="form-group ivf_embryology_chart_PrimaryEmbrologist">
<span<?= $Grid->PrimaryEmbrologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PrimaryEmbrologist->getDisplayValue($Grid->PrimaryEmbrologist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PrimaryEmbrologist" id="x<?= $Grid->RowIndex ?>_PrimaryEmbrologist" value="<?= HtmlEncode($Grid->PrimaryEmbrologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrimaryEmbrologist" id="o<?= $Grid->RowIndex ?>_PrimaryEmbrologist" value="<?= HtmlEncode($Grid->PrimaryEmbrologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <td data-name="SecondaryEmbrologist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_SecondaryEmbrologist" class="form-group ivf_embryology_chart_SecondaryEmbrologist">
<input type="<?= $Grid->SecondaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?= $Grid->RowIndex ?>_SecondaryEmbrologist" id="x<?= $Grid->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Grid->SecondaryEmbrologist->EditValue ?>"<?= $Grid->SecondaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SecondaryEmbrologist->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_SecondaryEmbrologist" class="form-group ivf_embryology_chart_SecondaryEmbrologist">
<span<?= $Grid->SecondaryEmbrologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SecondaryEmbrologist->getDisplayValue($Grid->SecondaryEmbrologist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SecondaryEmbrologist" id="x<?= $Grid->RowIndex ?>_SecondaryEmbrologist" value="<?= HtmlEncode($Grid->SecondaryEmbrologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SecondaryEmbrologist" id="o<?= $Grid->RowIndex ?>_SecondaryEmbrologist" value="<?= HtmlEncode($Grid->SecondaryEmbrologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Incubator" class="form-group ivf_embryology_chart_Incubator">
<input type="<?= $Grid->Incubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?= $Grid->RowIndex ?>_Incubator" id="x<?= $Grid->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Incubator->getPlaceHolder()) ?>" value="<?= $Grid->Incubator->EditValue ?>"<?= $Grid->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Incubator->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Incubator" class="form-group ivf_embryology_chart_Incubator">
<span<?= $Grid->Incubator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Incubator->getDisplayValue($Grid->Incubator->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Incubator" id="x<?= $Grid->RowIndex ?>_Incubator" value="<?= HtmlEncode($Grid->Incubator->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Incubator" id="o<?= $Grid->RowIndex ?>_Incubator" value="<?= HtmlEncode($Grid->Incubator->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->location->Visible) { // location ?>
        <td data-name="location">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_location" class="form-group ivf_embryology_chart_location">
<input type="<?= $Grid->location->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_location" name="x<?= $Grid->RowIndex ?>_location" id="x<?= $Grid->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->location->getPlaceHolder()) ?>" value="<?= $Grid->location->EditValue ?>"<?= $Grid->location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->location->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_location" class="form-group ivf_embryology_chart_location">
<span<?= $Grid->location->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->location->getDisplayValue($Grid->location->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" data-hidden="1" name="x<?= $Grid->RowIndex ?>_location" id="x<?= $Grid->RowIndex ?>_location" value="<?= HtmlEncode($Grid->location->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" data-hidden="1" name="o<?= $Grid->RowIndex ?>_location" id="o<?= $Grid->RowIndex ?>_location" value="<?= HtmlEncode($Grid->location->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->OocyteNo->Visible) { // OocyteNo ?>
        <td data-name="OocyteNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_OocyteNo" class="form-group ivf_embryology_chart_OocyteNo">
<input type="<?= $Grid->OocyteNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?= $Grid->RowIndex ?>_OocyteNo" id="x<?= $Grid->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OocyteNo->getPlaceHolder()) ?>" value="<?= $Grid->OocyteNo->EditValue ?>"<?= $Grid->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OocyteNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_OocyteNo" class="form-group ivf_embryology_chart_OocyteNo">
<span<?= $Grid->OocyteNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->OocyteNo->getDisplayValue($Grid->OocyteNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_OocyteNo" id="x<?= $Grid->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Grid->OocyteNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OocyteNo" id="o<?= $Grid->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Grid->OocyteNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Stage->Visible) { // Stage ?>
        <td data-name="Stage">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Stage" class="form-group ivf_embryology_chart_Stage">
    <select
        id="x<?= $Grid->RowIndex ?>_Stage"
        name="x<?= $Grid->RowIndex ?>_Stage"
        class="form-control ew-select<?= $Grid->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Stage"
        data-table="ivf_embryology_chart"
        data-field="x_Stage"
        data-value-separator="<?= $Grid->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Stage->getPlaceHolder()) ?>"
        <?= $Grid->Stage->editAttributes() ?>>
        <?= $Grid->Stage->selectOptionListHtml("x{$Grid->RowIndex}_Stage") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Stage']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Stage", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Stage" class="form-group ivf_embryology_chart_Stage">
<span<?= $Grid->Stage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Stage->getDisplayValue($Grid->Stage->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Stage" id="x<?= $Grid->RowIndex ?>_Stage" value="<?= HtmlEncode($Grid->Stage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Stage" id="o<?= $Grid->RowIndex ?>_Stage" value="<?= HtmlEncode($Grid->Stage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Remarks" class="form-group ivf_embryology_chart_Remarks">
<input type="<?= $Grid->Remarks->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?= $Grid->RowIndex ?>_Remarks" id="x<?= $Grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Remarks->getPlaceHolder()) ?>" value="<?= $Grid->Remarks->EditValue ?>"<?= $Grid->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Remarks->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Remarks" class="form-group ivf_embryology_chart_Remarks">
<span<?= $Grid->Remarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Remarks->getDisplayValue($Grid->Remarks->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Remarks" id="x<?= $Grid->RowIndex ?>_Remarks" value="<?= HtmlEncode($Grid->Remarks->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Remarks" id="o<?= $Grid->RowIndex ?>_Remarks" value="<?= HtmlEncode($Grid->Remarks->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitrificationDate" class="form-group ivf_embryology_chart_vitrificationDate">
<input type="<?= $Grid->vitrificationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?= $Grid->RowIndex ?>_vitrificationDate" id="x<?= $Grid->RowIndex ?>_vitrificationDate" size="12" placeholder="<?= HtmlEncode($Grid->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Grid->vitrificationDate->EditValue ?>"<?= $Grid->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Grid->vitrificationDate->ReadOnly && !$Grid->vitrificationDate->Disabled && !isset($Grid->vitrificationDate->EditAttrs["readonly"]) && !isset($Grid->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitrificationDate" class="form-group ivf_embryology_chart_vitrificationDate">
<span<?= $Grid->vitrificationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitrificationDate->getDisplayValue($Grid->vitrificationDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitrificationDate" id="x<?= $Grid->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Grid->vitrificationDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitrificationDate" id="o<?= $Grid->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Grid->vitrificationDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <td data-name="vitriPrimaryEmbryologist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group ivf_embryology_chart_vitriPrimaryEmbryologist">
<input type="<?= $Grid->vitriPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->vitriPrimaryEmbryologist->EditValue ?>"<?= $Grid->vitriPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?= $Grid->vitriPrimaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriPrimaryEmbryologist->getDisplayValue($Grid->vitriPrimaryEmbryologist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" value="<?= HtmlEncode($Grid->vitriPrimaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" id="o<?= $Grid->RowIndex ?>_vitriPrimaryEmbryologist" value="<?= HtmlEncode($Grid->vitriPrimaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <td data-name="vitriSecondaryEmbryologist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group ivf_embryology_chart_vitriSecondaryEmbryologist">
<input type="<?= $Grid->vitriSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->vitriSecondaryEmbryologist->EditValue ?>"<?= $Grid->vitriSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?= $Grid->vitriSecondaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriSecondaryEmbryologist->getDisplayValue($Grid->vitriSecondaryEmbryologist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" value="<?= HtmlEncode($Grid->vitriSecondaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" id="o<?= $Grid->RowIndex ?>_vitriSecondaryEmbryologist" value="<?= HtmlEncode($Grid->vitriSecondaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <td data-name="vitriEmbryoNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriEmbryoNo" class="form-group ivf_embryology_chart_vitriEmbryoNo">
<input type="<?= $Grid->vitriEmbryoNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?= $Grid->RowIndex ?>_vitriEmbryoNo" id="x<?= $Grid->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?= $Grid->vitriEmbryoNo->EditValue ?>"<?= $Grid->vitriEmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriEmbryoNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriEmbryoNo" class="form-group ivf_embryology_chart_vitriEmbryoNo">
<span<?= $Grid->vitriEmbryoNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriEmbryoNo->getDisplayValue($Grid->vitriEmbryoNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriEmbryoNo" id="x<?= $Grid->RowIndex ?>_vitriEmbryoNo" value="<?= HtmlEncode($Grid->vitriEmbryoNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriEmbryoNo" id="o<?= $Grid->RowIndex ?>_vitriEmbryoNo" value="<?= HtmlEncode($Grid->vitriEmbryoNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->thawReFrozen->Visible) { // thawReFrozen ?>
        <td data-name="thawReFrozen">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawReFrozen" class="form-group ivf_embryology_chart_thawReFrozen">
<template id="tp_x<?= $Grid->RowIndex ?>_thawReFrozen">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="x<?= $Grid->RowIndex ?>_thawReFrozen" id="x<?= $Grid->RowIndex ?>_thawReFrozen"<?= $Grid->thawReFrozen->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_thawReFrozen" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_thawReFrozen[]"
    name="x<?= $Grid->RowIndex ?>_thawReFrozen[]"
    value="<?= HtmlEncode($Grid->thawReFrozen->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_thawReFrozen"
    data-target="dsl_x<?= $Grid->RowIndex ?>_thawReFrozen"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->thawReFrozen->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_thawReFrozen"
    data-value-separator="<?= $Grid->thawReFrozen->displayValueSeparatorAttribute() ?>"
    <?= $Grid->thawReFrozen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawReFrozen->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawReFrozen" class="form-group ivf_embryology_chart_thawReFrozen">
<span<?= $Grid->thawReFrozen->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->thawReFrozen->getDisplayValue($Grid->thawReFrozen->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-hidden="1" name="x<?= $Grid->RowIndex ?>_thawReFrozen" id="x<?= $Grid->RowIndex ?>_thawReFrozen" value="<?= HtmlEncode($Grid->thawReFrozen->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawReFrozen[]" id="o<?= $Grid->RowIndex ?>_thawReFrozen[]" value="<?= HtmlEncode($Grid->thawReFrozen->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <td data-name="vitriFertilisationDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriFertilisationDate" class="form-group ivf_embryology_chart_vitriFertilisationDate">
<input type="<?= $Grid->vitriFertilisationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?= $Grid->RowIndex ?>_vitriFertilisationDate" id="x<?= $Grid->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?= HtmlEncode($Grid->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?= $Grid->vitriFertilisationDate->EditValue ?>"<?= $Grid->vitriFertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriFertilisationDate->getErrorMessage() ?></div>
<?php if (!$Grid->vitriFertilisationDate->ReadOnly && !$Grid->vitriFertilisationDate->Disabled && !isset($Grid->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($Grid->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriFertilisationDate" class="form-group ivf_embryology_chart_vitriFertilisationDate">
<span<?= $Grid->vitriFertilisationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriFertilisationDate->getDisplayValue($Grid->vitriFertilisationDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriFertilisationDate" id="x<?= $Grid->RowIndex ?>_vitriFertilisationDate" value="<?= HtmlEncode($Grid->vitriFertilisationDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriFertilisationDate" id="o<?= $Grid->RowIndex ?>_vitriFertilisationDate" value="<?= HtmlEncode($Grid->vitriFertilisationDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriDay->Visible) { // vitriDay ?>
        <td data-name="vitriDay">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriDay" class="form-group ivf_embryology_chart_vitriDay">
    <select
        id="x<?= $Grid->RowIndex ?>_vitriDay"
        name="x<?= $Grid->RowIndex ?>_vitriDay"
        class="form-control ew-select<?= $Grid->vitriDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriDay"
        data-table="ivf_embryology_chart"
        data-field="x_vitriDay"
        data-value-separator="<?= $Grid->vitriDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->vitriDay->getPlaceHolder()) ?>"
        <?= $Grid->vitriDay->editAttributes() ?>>
        <?= $Grid->vitriDay->selectOptionListHtml("x{$Grid->RowIndex}_vitriDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->vitriDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriDay']"),
        options = { name: "x<?= $Grid->RowIndex ?>_vitriDay", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriDay" class="form-group ivf_embryology_chart_vitriDay">
<span<?= $Grid->vitriDay->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriDay->getDisplayValue($Grid->vitriDay->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriDay" id="x<?= $Grid->RowIndex ?>_vitriDay" value="<?= HtmlEncode($Grid->vitriDay->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriDay" id="o<?= $Grid->RowIndex ?>_vitriDay" value="<?= HtmlEncode($Grid->vitriDay->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriStage->Visible) { // vitriStage ?>
        <td data-name="vitriStage">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriStage" class="form-group ivf_embryology_chart_vitriStage">
<input type="<?= $Grid->vitriStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?= $Grid->RowIndex ?>_vitriStage" id="x<?= $Grid->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriStage->getPlaceHolder()) ?>" value="<?= $Grid->vitriStage->EditValue ?>"<?= $Grid->vitriStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriStage->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriStage" class="form-group ivf_embryology_chart_vitriStage">
<span<?= $Grid->vitriStage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriStage->getDisplayValue($Grid->vitriStage->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriStage" id="x<?= $Grid->RowIndex ?>_vitriStage" value="<?= HtmlEncode($Grid->vitriStage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriStage" id="o<?= $Grid->RowIndex ?>_vitriStage" value="<?= HtmlEncode($Grid->vitriStage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriGrade->Visible) { // vitriGrade ?>
        <td data-name="vitriGrade">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriGrade" class="form-group ivf_embryology_chart_vitriGrade">
    <select
        id="x<?= $Grid->RowIndex ?>_vitriGrade"
        name="x<?= $Grid->RowIndex ?>_vitriGrade"
        class="form-control ew-select<?= $Grid->vitriGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriGrade"
        data-table="ivf_embryology_chart"
        data-field="x_vitriGrade"
        data-value-separator="<?= $Grid->vitriGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->vitriGrade->getPlaceHolder()) ?>"
        <?= $Grid->vitriGrade->editAttributes() ?>>
        <?= $Grid->vitriGrade->selectOptionListHtml("x{$Grid->RowIndex}_vitriGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->vitriGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriGrade']"),
        options = { name: "x<?= $Grid->RowIndex ?>_vitriGrade", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_vitriGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriGrade" class="form-group ivf_embryology_chart_vitriGrade">
<span<?= $Grid->vitriGrade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriGrade->getDisplayValue($Grid->vitriGrade->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriGrade" id="x<?= $Grid->RowIndex ?>_vitriGrade" value="<?= HtmlEncode($Grid->vitriGrade->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriGrade" id="o<?= $Grid->RowIndex ?>_vitriGrade" value="<?= HtmlEncode($Grid->vitriGrade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriIncubator->Visible) { // vitriIncubator ?>
        <td data-name="vitriIncubator">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriIncubator" class="form-group ivf_embryology_chart_vitriIncubator">
<input type="<?= $Grid->vitriIncubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?= $Grid->RowIndex ?>_vitriIncubator" id="x<?= $Grid->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriIncubator->getPlaceHolder()) ?>" value="<?= $Grid->vitriIncubator->EditValue ?>"<?= $Grid->vitriIncubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriIncubator->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriIncubator" class="form-group ivf_embryology_chart_vitriIncubator">
<span<?= $Grid->vitriIncubator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriIncubator->getDisplayValue($Grid->vitriIncubator->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriIncubator" id="x<?= $Grid->RowIndex ?>_vitriIncubator" value="<?= HtmlEncode($Grid->vitriIncubator->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriIncubator" id="o<?= $Grid->RowIndex ?>_vitriIncubator" value="<?= HtmlEncode($Grid->vitriIncubator->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriTank->Visible) { // vitriTank ?>
        <td data-name="vitriTank">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriTank" class="form-group ivf_embryology_chart_vitriTank">
<input type="<?= $Grid->vitriTank->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?= $Grid->RowIndex ?>_vitriTank" id="x<?= $Grid->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriTank->getPlaceHolder()) ?>" value="<?= $Grid->vitriTank->EditValue ?>"<?= $Grid->vitriTank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriTank->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriTank" class="form-group ivf_embryology_chart_vitriTank">
<span<?= $Grid->vitriTank->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriTank->getDisplayValue($Grid->vitriTank->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriTank" id="x<?= $Grid->RowIndex ?>_vitriTank" value="<?= HtmlEncode($Grid->vitriTank->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriTank" id="o<?= $Grid->RowIndex ?>_vitriTank" value="<?= HtmlEncode($Grid->vitriTank->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriCanister->Visible) { // vitriCanister ?>
        <td data-name="vitriCanister">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriCanister" class="form-group ivf_embryology_chart_vitriCanister">
<input type="<?= $Grid->vitriCanister->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?= $Grid->RowIndex ?>_vitriCanister" id="x<?= $Grid->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriCanister->getPlaceHolder()) ?>" value="<?= $Grid->vitriCanister->EditValue ?>"<?= $Grid->vitriCanister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriCanister->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriCanister" class="form-group ivf_embryology_chart_vitriCanister">
<span<?= $Grid->vitriCanister->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriCanister->getDisplayValue($Grid->vitriCanister->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriCanister" id="x<?= $Grid->RowIndex ?>_vitriCanister" value="<?= HtmlEncode($Grid->vitriCanister->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriCanister" id="o<?= $Grid->RowIndex ?>_vitriCanister" value="<?= HtmlEncode($Grid->vitriCanister->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriGobiet->Visible) { // vitriGobiet ?>
        <td data-name="vitriGobiet">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriGobiet" class="form-group ivf_embryology_chart_vitriGobiet">
<input type="<?= $Grid->vitriGobiet->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?= $Grid->RowIndex ?>_vitriGobiet" id="x<?= $Grid->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriGobiet->getPlaceHolder()) ?>" value="<?= $Grid->vitriGobiet->EditValue ?>"<?= $Grid->vitriGobiet->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriGobiet->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriGobiet" class="form-group ivf_embryology_chart_vitriGobiet">
<span<?= $Grid->vitriGobiet->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriGobiet->getDisplayValue($Grid->vitriGobiet->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriGobiet" id="x<?= $Grid->RowIndex ?>_vitriGobiet" value="<?= HtmlEncode($Grid->vitriGobiet->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriGobiet" id="o<?= $Grid->RowIndex ?>_vitriGobiet" value="<?= HtmlEncode($Grid->vitriGobiet->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriViscotube->Visible) { // vitriViscotube ?>
        <td data-name="vitriViscotube">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriViscotube" class="form-group ivf_embryology_chart_vitriViscotube">
<input type="<?= $Grid->vitriViscotube->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?= $Grid->RowIndex ?>_vitriViscotube" id="x<?= $Grid->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriViscotube->getPlaceHolder()) ?>" value="<?= $Grid->vitriViscotube->EditValue ?>"<?= $Grid->vitriViscotube->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriViscotube->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriViscotube" class="form-group ivf_embryology_chart_vitriViscotube">
<span<?= $Grid->vitriViscotube->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriViscotube->getDisplayValue($Grid->vitriViscotube->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriViscotube" id="x<?= $Grid->RowIndex ?>_vitriViscotube" value="<?= HtmlEncode($Grid->vitriViscotube->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriViscotube" id="o<?= $Grid->RowIndex ?>_vitriViscotube" value="<?= HtmlEncode($Grid->vitriViscotube->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <td data-name="vitriCryolockNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriCryolockNo" class="form-group ivf_embryology_chart_vitriCryolockNo">
<input type="<?= $Grid->vitriCryolockNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?= $Grid->RowIndex ?>_vitriCryolockNo" id="x<?= $Grid->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriCryolockNo->getPlaceHolder()) ?>" value="<?= $Grid->vitriCryolockNo->EditValue ?>"<?= $Grid->vitriCryolockNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriCryolockNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriCryolockNo" class="form-group ivf_embryology_chart_vitriCryolockNo">
<span<?= $Grid->vitriCryolockNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriCryolockNo->getDisplayValue($Grid->vitriCryolockNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriCryolockNo" id="x<?= $Grid->RowIndex ?>_vitriCryolockNo" value="<?= HtmlEncode($Grid->vitriCryolockNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriCryolockNo" id="o<?= $Grid->RowIndex ?>_vitriCryolockNo" value="<?= HtmlEncode($Grid->vitriCryolockNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <td data-name="vitriCryolockColour">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriCryolockColour" class="form-group ivf_embryology_chart_vitriCryolockColour">
<input type="<?= $Grid->vitriCryolockColour->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?= $Grid->RowIndex ?>_vitriCryolockColour" id="x<?= $Grid->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->vitriCryolockColour->getPlaceHolder()) ?>" value="<?= $Grid->vitriCryolockColour->EditValue ?>"<?= $Grid->vitriCryolockColour->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->vitriCryolockColour->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_vitriCryolockColour" class="form-group ivf_embryology_chart_vitriCryolockColour">
<span<?= $Grid->vitriCryolockColour->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vitriCryolockColour->getDisplayValue($Grid->vitriCryolockColour->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vitriCryolockColour" id="x<?= $Grid->RowIndex ?>_vitriCryolockColour" value="<?= HtmlEncode($Grid->vitriCryolockColour->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vitriCryolockColour" id="o<?= $Grid->RowIndex ?>_vitriCryolockColour" value="<?= HtmlEncode($Grid->vitriCryolockColour->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->thawDate->Visible) { // thawDate ?>
        <td data-name="thawDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawDate" class="form-group ivf_embryology_chart_thawDate">
<input type="<?= $Grid->thawDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?= $Grid->RowIndex ?>_thawDate" id="x<?= $Grid->RowIndex ?>_thawDate" placeholder="<?= HtmlEncode($Grid->thawDate->getPlaceHolder()) ?>" value="<?= $Grid->thawDate->EditValue ?>"<?= $Grid->thawDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawDate->getErrorMessage() ?></div>
<?php if (!$Grid->thawDate->ReadOnly && !$Grid->thawDate->Disabled && !isset($Grid->thawDate->EditAttrs["readonly"]) && !isset($Grid->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawDate" class="form-group ivf_embryology_chart_thawDate">
<span<?= $Grid->thawDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->thawDate->getDisplayValue($Grid->thawDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_thawDate" id="x<?= $Grid->RowIndex ?>_thawDate" value="<?= HtmlEncode($Grid->thawDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawDate" id="o<?= $Grid->RowIndex ?>_thawDate" value="<?= HtmlEncode($Grid->thawDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td data-name="thawPrimaryEmbryologist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group ivf_embryology_chart_thawPrimaryEmbryologist">
<input type="<?= $Grid->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->thawPrimaryEmbryologist->EditValue ?>"<?= $Grid->thawPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?= $Grid->thawPrimaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->thawPrimaryEmbryologist->getDisplayValue($Grid->thawPrimaryEmbryologist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" value="<?= HtmlEncode($Grid->thawPrimaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" id="o<?= $Grid->RowIndex ?>_thawPrimaryEmbryologist" value="<?= HtmlEncode($Grid->thawPrimaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td data-name="thawSecondaryEmbryologist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group ivf_embryology_chart_thawSecondaryEmbryologist">
<input type="<?= $Grid->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->thawSecondaryEmbryologist->EditValue ?>"<?= $Grid->thawSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?= $Grid->thawSecondaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->thawSecondaryEmbryologist->getDisplayValue($Grid->thawSecondaryEmbryologist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" value="<?= HtmlEncode($Grid->thawSecondaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" id="o<?= $Grid->RowIndex ?>_thawSecondaryEmbryologist" value="<?= HtmlEncode($Grid->thawSecondaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->thawET->Visible) { // thawET ?>
        <td data-name="thawET">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawET" class="form-group ivf_embryology_chart_thawET">
    <select
        id="x<?= $Grid->RowIndex ?>_thawET"
        name="x<?= $Grid->RowIndex ?>_thawET"
        class="form-control ew-select<?= $Grid->thawET->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_thawET"
        data-table="ivf_embryology_chart"
        data-field="x_thawET"
        data-value-separator="<?= $Grid->thawET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->thawET->getPlaceHolder()) ?>"
        <?= $Grid->thawET->editAttributes() ?>>
        <?= $Grid->thawET->selectOptionListHtml("x{$Grid->RowIndex}_thawET") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->thawET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_thawET']"),
        options = { name: "x<?= $Grid->RowIndex ?>_thawET", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_thawET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.thawET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.thawET.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawET" class="form-group ivf_embryology_chart_thawET">
<span<?= $Grid->thawET->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->thawET->getDisplayValue($Grid->thawET->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" data-hidden="1" name="x<?= $Grid->RowIndex ?>_thawET" id="x<?= $Grid->RowIndex ?>_thawET" value="<?= HtmlEncode($Grid->thawET->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawET" id="o<?= $Grid->RowIndex ?>_thawET" value="<?= HtmlEncode($Grid->thawET->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->thawAbserve->Visible) { // thawAbserve ?>
        <td data-name="thawAbserve">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawAbserve" class="form-group ivf_embryology_chart_thawAbserve">
<input type="<?= $Grid->thawAbserve->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?= $Grid->RowIndex ?>_thawAbserve" id="x<?= $Grid->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawAbserve->getPlaceHolder()) ?>" value="<?= $Grid->thawAbserve->EditValue ?>"<?= $Grid->thawAbserve->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawAbserve->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawAbserve" class="form-group ivf_embryology_chart_thawAbserve">
<span<?= $Grid->thawAbserve->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->thawAbserve->getDisplayValue($Grid->thawAbserve->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" data-hidden="1" name="x<?= $Grid->RowIndex ?>_thawAbserve" id="x<?= $Grid->RowIndex ?>_thawAbserve" value="<?= HtmlEncode($Grid->thawAbserve->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawAbserve" id="o<?= $Grid->RowIndex ?>_thawAbserve" value="<?= HtmlEncode($Grid->thawAbserve->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->thawDiscard->Visible) { // thawDiscard ?>
        <td data-name="thawDiscard">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawDiscard" class="form-group ivf_embryology_chart_thawDiscard">
<input type="<?= $Grid->thawDiscard->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?= $Grid->RowIndex ?>_thawDiscard" id="x<?= $Grid->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->thawDiscard->getPlaceHolder()) ?>" value="<?= $Grid->thawDiscard->EditValue ?>"<?= $Grid->thawDiscard->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->thawDiscard->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_thawDiscard" class="form-group ivf_embryology_chart_thawDiscard">
<span<?= $Grid->thawDiscard->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->thawDiscard->getDisplayValue($Grid->thawDiscard->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" data-hidden="1" name="x<?= $Grid->RowIndex ?>_thawDiscard" id="x<?= $Grid->RowIndex ?>_thawDiscard" value="<?= HtmlEncode($Grid->thawDiscard->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" data-hidden="1" name="o<?= $Grid->RowIndex ?>_thawDiscard" id="o<?= $Grid->RowIndex ?>_thawDiscard" value="<?= HtmlEncode($Grid->thawDiscard->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ETCatheter->Visible) { // ETCatheter ?>
        <td data-name="ETCatheter">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETCatheter" class="form-group ivf_embryology_chart_ETCatheter">
<input type="<?= $Grid->ETCatheter->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?= $Grid->RowIndex ?>_ETCatheter" id="x<?= $Grid->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETCatheter->getPlaceHolder()) ?>" value="<?= $Grid->ETCatheter->EditValue ?>"<?= $Grid->ETCatheter->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETCatheter->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETCatheter" class="form-group ivf_embryology_chart_ETCatheter">
<span<?= $Grid->ETCatheter->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ETCatheter->getDisplayValue($Grid->ETCatheter->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ETCatheter" id="x<?= $Grid->RowIndex ?>_ETCatheter" value="<?= HtmlEncode($Grid->ETCatheter->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETCatheter" id="o<?= $Grid->RowIndex ?>_ETCatheter" value="<?= HtmlEncode($Grid->ETCatheter->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ETDifficulty->Visible) { // ETDifficulty ?>
        <td data-name="ETDifficulty">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETDifficulty" class="form-group ivf_embryology_chart_ETDifficulty">
    <select
        id="x<?= $Grid->RowIndex ?>_ETDifficulty"
        name="x<?= $Grid->RowIndex ?>_ETDifficulty"
        class="form-control ew-select<?= $Grid->ETDifficulty->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_ETDifficulty"
        data-table="ivf_embryology_chart"
        data-field="x_ETDifficulty"
        data-value-separator="<?= $Grid->ETDifficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ETDifficulty->getPlaceHolder()) ?>"
        <?= $Grid->ETDifficulty->editAttributes() ?>>
        <?= $Grid->ETDifficulty->selectOptionListHtml("x{$Grid->RowIndex}_ETDifficulty") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ETDifficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_ETDifficulty']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ETDifficulty", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_ETDifficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETDifficulty" class="form-group ivf_embryology_chart_ETDifficulty">
<span<?= $Grid->ETDifficulty->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ETDifficulty->getDisplayValue($Grid->ETDifficulty->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ETDifficulty" id="x<?= $Grid->RowIndex ?>_ETDifficulty" value="<?= HtmlEncode($Grid->ETDifficulty->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETDifficulty" id="o<?= $Grid->RowIndex ?>_ETDifficulty" value="<?= HtmlEncode($Grid->ETDifficulty->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ETEasy->Visible) { // ETEasy ?>
        <td data-name="ETEasy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETEasy" class="form-group ivf_embryology_chart_ETEasy">
<template id="tp_x<?= $Grid->RowIndex ?>_ETEasy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="x<?= $Grid->RowIndex ?>_ETEasy" id="x<?= $Grid->RowIndex ?>_ETEasy"<?= $Grid->ETEasy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ETEasy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ETEasy[]"
    name="x<?= $Grid->RowIndex ?>_ETEasy[]"
    value="<?= HtmlEncode($Grid->ETEasy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_ETEasy"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ETEasy"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ETEasy->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_ETEasy"
    data-value-separator="<?= $Grid->ETEasy->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ETEasy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETEasy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETEasy" class="form-group ivf_embryology_chart_ETEasy">
<span<?= $Grid->ETEasy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ETEasy->getDisplayValue($Grid->ETEasy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ETEasy" id="x<?= $Grid->RowIndex ?>_ETEasy" value="<?= HtmlEncode($Grid->ETEasy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETEasy[]" id="o<?= $Grid->RowIndex ?>_ETEasy[]" value="<?= HtmlEncode($Grid->ETEasy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ETComments->Visible) { // ETComments ?>
        <td data-name="ETComments">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETComments" class="form-group ivf_embryology_chart_ETComments">
<input type="<?= $Grid->ETComments->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?= $Grid->RowIndex ?>_ETComments" id="x<?= $Grid->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETComments->getPlaceHolder()) ?>" value="<?= $Grid->ETComments->EditValue ?>"<?= $Grid->ETComments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETComments->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETComments" class="form-group ivf_embryology_chart_ETComments">
<span<?= $Grid->ETComments->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ETComments->getDisplayValue($Grid->ETComments->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ETComments" id="x<?= $Grid->RowIndex ?>_ETComments" value="<?= HtmlEncode($Grid->ETComments->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETComments" id="o<?= $Grid->RowIndex ?>_ETComments" value="<?= HtmlEncode($Grid->ETComments->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ETDoctor->Visible) { // ETDoctor ?>
        <td data-name="ETDoctor">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETDoctor" class="form-group ivf_embryology_chart_ETDoctor">
<input type="<?= $Grid->ETDoctor->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?= $Grid->RowIndex ?>_ETDoctor" id="x<?= $Grid->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETDoctor->getPlaceHolder()) ?>" value="<?= $Grid->ETDoctor->EditValue ?>"<?= $Grid->ETDoctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETDoctor->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETDoctor" class="form-group ivf_embryology_chart_ETDoctor">
<span<?= $Grid->ETDoctor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ETDoctor->getDisplayValue($Grid->ETDoctor->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ETDoctor" id="x<?= $Grid->RowIndex ?>_ETDoctor" value="<?= HtmlEncode($Grid->ETDoctor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETDoctor" id="o<?= $Grid->RowIndex ?>_ETDoctor" value="<?= HtmlEncode($Grid->ETDoctor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <td data-name="ETEmbryologist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETEmbryologist" class="form-group ivf_embryology_chart_ETEmbryologist">
<input type="<?= $Grid->ETEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?= $Grid->RowIndex ?>_ETEmbryologist" id="x<?= $Grid->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?= HtmlEncode($Grid->ETEmbryologist->getPlaceHolder()) ?>" value="<?= $Grid->ETEmbryologist->EditValue ?>"<?= $Grid->ETEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETEmbryologist->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETEmbryologist" class="form-group ivf_embryology_chart_ETEmbryologist">
<span<?= $Grid->ETEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ETEmbryologist->getDisplayValue($Grid->ETEmbryologist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ETEmbryologist" id="x<?= $Grid->RowIndex ?>_ETEmbryologist" value="<?= HtmlEncode($Grid->ETEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETEmbryologist" id="o<?= $Grid->RowIndex ?>_ETEmbryologist" value="<?= HtmlEncode($Grid->ETEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ETDate->Visible) { // ETDate ?>
        <td data-name="ETDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETDate" class="form-group ivf_embryology_chart_ETDate">
<input type="<?= $Grid->ETDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?= $Grid->RowIndex ?>_ETDate" id="x<?= $Grid->RowIndex ?>_ETDate" placeholder="<?= HtmlEncode($Grid->ETDate->getPlaceHolder()) ?>" value="<?= $Grid->ETDate->EditValue ?>"<?= $Grid->ETDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ETDate->getErrorMessage() ?></div>
<?php if (!$Grid->ETDate->ReadOnly && !$Grid->ETDate->Disabled && !isset($Grid->ETDate->EditAttrs["readonly"]) && !isset($Grid->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartgrid", "x<?= $Grid->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_ETDate" class="form-group ivf_embryology_chart_ETDate">
<span<?= $Grid->ETDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ETDate->getDisplayValue($Grid->ETDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ETDate" id="x<?= $Grid->RowIndex ?>_ETDate" value="<?= HtmlEncode($Grid->ETDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ETDate" id="o<?= $Grid->RowIndex ?>_ETDate" value="<?= HtmlEncode($Grid->ETDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Day1End->Visible) { // Day1End ?>
        <td data-name="Day1End">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1End" class="form-group ivf_embryology_chart_Day1End">
    <select
        id="x<?= $Grid->RowIndex ?>_Day1End"
        name="x<?= $Grid->RowIndex ?>_Day1End"
        class="form-control ew-select<?= $Grid->Day1End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1End"
        data-table="ivf_embryology_chart"
        data-field="x_Day1End"
        data-value-separator="<?= $Grid->Day1End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Day1End->getPlaceHolder()) ?>"
        <?= $Grid->Day1End->editAttributes() ?>>
        <?= $Grid->Day1End->selectOptionListHtml("x{$Grid->RowIndex}_Day1End") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Day1End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1End']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Day1End", selectId: "ivf_embryology_chart_x<?= $Grid->RowIndex ?>_Day1End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Day1End" class="form-group ivf_embryology_chart_Day1End">
<span<?= $Grid->Day1End->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Day1End->getDisplayValue($Grid->Day1End->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Day1End" id="x<?= $Grid->RowIndex ?>_Day1End" value="<?= HtmlEncode($Grid->Day1End->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Day1End" id="o<?= $Grid->RowIndex ?>_Day1End" value="<?= HtmlEncode($Grid->Day1End->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fivf_embryology_chartgrid","load"], function() {
    fivf_embryology_chartgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fivf_embryology_chartgrid">
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
    ew.addEventHandlers("ivf_embryology_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
    </script>
    <style>
    input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
    	min-width: 80%;
    }
    .input-group>.form-control {
    	width: 80%;
    	flex-grow: 0;
    }
    .ew-grid .ew-tablea {
    	border: 0;
    	border-spacing: 0;
    	border-collapse: separate;
    	empty-cells: show;
    	width: 100%;
    }
    .ew-grid .ew-tablea, .ew-grid .ew-grid-middle-panel {
    	border: 0;
    	padding: 0;
    	margin-bottom: 0;
    	overflow-x: visible;
    }
    .ew-grid .ew-tablea>thead>tr>td {
    	font-weight: normal;
    	/* background-color: #40546a; */
    	color: #fff;
    	border-bottom: 1px solid;
    	border-right: 1px solid;
    	border-color: #9f9f9f;
    	background-repeat: repeat-x;
    	vertical-align: top;
    	padding: .3rem;
    }
    </style>
    <script>
    $("[data-name='ETEasy']").children().width('450px');
    function getUrlVars() {
    	var vars = {};
    	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    		vars[key] = value;
    	});
    	return vars;
    }
    var pageCur = getUrlVars()["page"];
    var pageCurHeader = "";
    if(pageCur == "page0")
    {
    pageCurHeader = "Day 0";
    }
    if(pageCur == "page1")
    {
    pageCurHeader = "Day 1";
    }
    if(pageCur == "page2")
    {
    pageCurHeader = "Day 2";
    }
    if(pageCur == "page3")
    {
    pageCurHeader = "Day 3";
    }
    if(pageCur == "page4")
    {
    pageCurHeader = "Day 4";
    }
    if(pageCur == "page5")
    {
    pageCurHeader = "Day 5";
    }
    if(pageCur == "page6")
    {
    pageCurHeader = "Day 6";
    }
    if(pageCur == "pageAll")
    {
    pageCurHeader = "All";
    }
    if(pageCur == "pageEnd")
    {
    pageCurHeader = "End";
    }
    if(pageCur == "pageAll")
    {
    var myTable = jQuery("#tbl_ivf_embryology_chartlist");
    var thead = myTable.find("thead");
    	 $table = myTable.prepend( ' <thead><tr> '+
      '  <td rowspan="2"></td> '+
    		 ' <th colspan="9" scope="colgroup"  style="background-color:DarkRed;text-align:center"  >Day 0</th>' +
    		 ' <th colspan="6" scope="colgroup"  style="background-color:Olive;text-align:center"  >Day 1</th>' +
    		 ' <th colspan="7" scope="colgroup"  style="background-color:blue;text-align:center"  >Day 2</th>' +
    		 ' <th colspan="9" scope="colgroup"  style="background-color:DarkMagenta;text-align:center"  >Day 3</th>' +
    		 ' <th colspan="7" scope="colgroup"  style="background-color:DeepPink;text-align:center"  >Day 4</th>' +
    		 ' <th colspan="7" scope="colgroup"  style="background-color:FireBrick;text-align:center"  >Day 5</th>' +
    		 ' <th colspan="7" scope="colgroup"  style="background-color:OrangeRed;text-align:center"  >Day 6</th>' +
    		  ' <th colspan="5" scope="colgroup"  style="background-color:SeaGreen;text-align:center"  >End</th>'+
     ' </tr></thead>');
     }
    var action = getUrlVars()["action"];
    var showmaster = getUrlVars()["showmaster"];
    var fk_id = getUrlVars()["fk_id"];
    var fk_RIDNO = getUrlVars()["fk_RIDNO"];
    var fk_Name = getUrlVars()["fk_Name"];
    var currentForm = getUrlVars()["currentForm"];
    var treatment = getUrlVars()["treatment"];
    var grpButton = '<input type="hidden" id="page" name="page" value="'+pageCur+'">';
    var grpButton =  grpButton +  '<input type="hidden" id="action" name="action" value="'+action+'">';
    var grpButton =  grpButton + '<input type="hidden" id="showmaster" name="showmaster" value="'+showmaster+'">';
    var grpButton =  grpButton + '<input type="hidden" id="fk_id" name="fk_id" value="'+fk_id+'">';
    var grpButton =  grpButton + '<input type="hidden" id="fk_RIDNO" name="fk_RIDNO" value="'+fk_RIDNO+'">';
    var grpButton =  grpButton + '<input type="hidden" id="fk_Name" name="fk_Name" value="'+fk_Name+'">';
    var grpButton =  grpButton + '<input type="hidden" id="currentForm" name="currentForm" value="'+currentForm+'">';
    var grpButton =  grpButton + '<input type="hidden" id="treatment" name="treatment" value="'+treatment+'">';
    if(pageCur == "Vitrification")
    {
    try{
    	var searchfrm = document.getElementById("OvumPickUpHide").style.display = "none";
    	}catch (ex){}
    	var hhh = document.getElementsByClassName("m-0"); 
    	hhh[0].innerText = "Vitrification";

    	//	var searchfrm = document.getElementById("gmp_ivf_embryology_chart");
    	//	var node = document.createElement("div");
    	//	node.innerHTML = grpButton;    
    	//	searchfrm.appendChild(node);
    	var grpButton = grpButton + '<div class="row"><div class="col-md-12"><table class="table table-bordered text-left"><tbody><tr>';
    		var grpButton = grpButton + '<td>Primary Embrologist:<input type="text" id="ivffnamePrimary" name="ivffnamePrimary"></td>';
    		var grpButton = grpButton + '<td>Secondary Embrologist:<input type="text" id="ivffnameSecondary" name="ivffnameSecondary"></td>';
    		var grpButton = grpButton + '</tr></tbody></table></div></div>';
    		var grpButton = grpButton + '<div class="row"><div class="col-md-12"><table class="table table-bordered text-left"><tbody><tr>';
    	//	var grpButton = grpButton + '<td>Incubator:<input type="text" id="fnameIncubator" name="fnameIncubator"></td>';
    		var grpButton = grpButton + '<td>Vitrification Date :<input type="datetime-local" id="ivfmeetingtime"  name="ivfmeetingtime"  min="2018-06-07T00:00" max="2048-06-14T00:00"></td>';
    		var grpButton = grpButton + '<td>ICSI Date :<input type="datetime-local" id="ivfFertilisationDate"  name="ivfFertilisationDate"  min="2018-06-07T00:00" max="2048-06-14T00:00"></td>';

    	   // var grpButton = grpButton + '<td><input type="datetime-local" id="meeting-time"  name="meeting-time" value="2018-06-12T19:30" min="2018-06-07T00:00" max="2018-06-14T00:00"></td>';
    		var grpButton = grpButton + '</tr></tbody></table>';
    				var grpButton = grpButton + '</div></div>';
    var grpButton = grpButton + '<table class="table table-bordered text-left"><tbody><tr><td align="center"><div class="small-box bg-success" ><h3> '+ pageCurHeader +'<h3> </div> </td></tr></tbody></table>';
    			var searchfrm = document.getElementById("fivf_embryology_chartlist");
    		var node = document.createElement("div");
    		node.innerHTML = grpButton;    
    		searchfrm.insertBefore(node, searchfrm.firstChild);
    						var user = [{
    							'patientId': fk_id
    						}];
    						var jsonString = JSON.stringify(user);
    						$.ajax({
    							type: "GET",
    							url: "ajaxinsert.php?control=ivffnameLocation",
    							data: { data: jsonString },
    							cache: false,
    							success: function (data) {
    								let jsonObject = JSON.parse(data);
    								var json = jsonObject["records"];
    								for (var i = 0; i < json.length; i++) {
    									var obj = json[i];
    	if(obj.vitriPrimaryEmbryologist != null)
    	{
    		var fnamePrimary = document.getElementById("ivffnamePrimary").value=  obj.vitriPrimaryEmbryologist;
    	}
    	if(obj.vitriSecondaryEmbryologist != null)
    	{
    		var fnameSecondary = document.getElementById("ivffnameSecondary").value=  obj.vitriSecondaryEmbryologist;
    	}
    											//var str = obj.vitriFertilisationDate;
    											var str = obj.ICSiIVFDateTime;
    											var res = str.split(" ");
    											var meetingtime = document.getElementById("ivfFertilisationDate").value = res[0] + "T" + res[1]; 
    											var str = obj.vitrificationDate;
    											var res = str.split(" ");
    									var meetingtime = document.getElementById("ivfmeetingtime").value = res[0] + "T" + res[1]; 
    								}
    							}
    						});
    }
    else if(pageCur == "Thawing")
    {
    try{
    	var searchfrm = document.getElementById("OvumPickUpHide").style.display = "none";
    		}catch (ex){}
    	var hhh = document.getElementsByClassName("m-0"); 
    	hhh[0].innerText = "Thawing";

    	//	var searchfrm = document.getElementById("gmp_ivf_embryology_chart");
    	//	var node = document.createElement("div");
    	//	node.innerHTML = grpButton;    
    	//	searchfrm.appendChild(node);
    		var grpButton = grpButton + '<div class="row"><div class="col-md-12"><table class="table table-bordered text-left"><tbody><tr>';
    		var grpButton = grpButton + '<td>Primary Embrologist:<input type="text" id="ThawfnamePrimary" name="ThawfnamePrimary"></td>';
    		var grpButton = grpButton + '<td>Secondary Embrologist:<input type="text" id="ThawfnameSecondary" name="ThawfnameSecondary"></td>';
    		var grpButton = grpButton + '</tr><tr><td>Thaw Date :<input type="datetime-local" id="ThawFertilisationDate"  name="ThawFertilisationDate"  min="2018-06-07T00:00" max="2048-06-14T00:00"></td>';
    			var grpButton = grpButton + '<td>ICSI Date :<input type="datetime-local" id="ICSIFertilisationDate"  name="ThawFertilisationDate"  min="2018-06-07T00:00" max="2048-06-14T00:00"></td>';
    		var grpButton = grpButton + '</tr></tbody></table></div></div>';
    		var grpButton = grpButton + '</div></div>';
    			var searchfrm = document.getElementById("fivf_embryology_chartlist");
    		var node = document.createElement("div");
    		node.innerHTML = grpButton;    
    		searchfrm.insertBefore(node, searchfrm.firstChild);
    			var user = [{
    							'patientId': fk_id
    						}];
    						var jsonString = JSON.stringify(user);
    						$.ajax({
    							type: "GET",
    							url: "ajaxinsert.php?control=ivffnameLocation",
    							data: { data: jsonString },
    							cache: false,
    							success: function (data) {
    								let jsonObject = JSON.parse(data);
    								var json = jsonObject["records"];
    								for (var i = 0; i < json.length; i++) {
    									var obj = json[i];
    	if(obj.vitriPrimaryEmbryologist != null)
    	{
    		var fnamePrimary = document.getElementById("ThawfnamePrimary").value=  obj.thawPrimaryEmbryologist;
    	}
    	if(obj.vitriSecondaryEmbryologist != null)
    	{
    		var fnameSecondary = document.getElementById("ThawfnameSecondary").value=  obj.thawSecondaryEmbryologist;
    	}
    											var str = obj.thawDate;
    											var res = str.split(" ");
    											var meetingtime = document.getElementById("ThawFertilisationDate").value = res[0] + "T" + res[1]; 
    										var str = obj.ICSiIVFDateTime;
    											var res = str.split(" ");
    											var meetingtime = document.getElementById("ICSIFertilisationDate").value = res[0] + "T" + res[1]; 
    								}
    							}
    						});
    }
    else if(pageCur == "EmbryoTransfer")
    {
    try{
    	var searchfrm = document.getElementById("OvumPickUpHide").style.display = "none";
    		}catch (ex){}
    	var hhh = document.getElementsByClassName("m-0"); 
    	hhh[0].innerText = "Embryo Transfer";

    	//	var searchfrm = document.getElementById("gmp_ivf_embryology_chart");
    	//	var node = document.createElement("div");
    	//	node.innerHTML = grpButton;    
    	//	searchfrm.appendChild(node);
    	var grpButton = grpButton + '<div class="row"><div class="col-md-12"><table class="table table-bordered text-left"><tbody><tr>';
    	var grpButton = grpButton + '<td>Doctor :<input type="text" id="ETfnameDoctor" name="ETfnameDoctor"></td>';
    	var grpButton = grpButton + '<td>Embrologist :<input type="text" id="ETfnameSecondary" name="ETfnameSecondary"></td>';
    	var grpButton = grpButton + '</tr><tr><td>ET Date :<input type="datetime-local" id="EETTDate"  name="EETTDate"  min="2018-06-07T00:00" max="2048-06-14T00:00"></td>';
    //	var grpButton = grpButton + '<td>Comments :<input type="datetime-local" id="ETComments"  name="ThawFertilisationDate"  min="2018-06-07T00:00" max="2048-06-14T00:00"></td>';
    	var grpButton = grpButton + '<td>Comments :<input type="text" id="ETComments" name="ETComments"></td>';
    	var grpButton = grpButton + '</tr></tbody></table></div></div>';
    	var grpButton = grpButton + '</div></div>';
    		var searchfrm = document.getElementById("fivf_embryology_chartlist");
    		var node = document.createElement("div");
    		node.innerHTML = grpButton;    
    		searchfrm.insertBefore(node, searchfrm.firstChild);
    			var user = [{
    							'patientId': fk_id
    						}];
    						var jsonString = JSON.stringify(user);
    						$.ajax({
    							type: "GET",
    							url: "ajaxinsert.php?control=ivffnameLocation",
    							data: { data: jsonString },
    							cache: false,
    							success: function (data) {
    								let jsonObject = JSON.parse(data);
    								var json = jsonObject["records"];
    								for (var i = 0; i < json.length; i++) {
    									var obj = json[i];
    	if(obj.ETDoctor != null)
    	{
    		var fnamePrimary = document.getElementById("ETfnameDoctor").value=  obj.ETDoctor;
    	}
    	if(obj.ETEmbryologist != null)
    	{
    		var fnameSecondary = document.getElementById("ETfnameSecondary").value=  obj.ETEmbryologist;
    	}
    	if(obj.ETDate != null)
    	{
    										var str = obj.ETDate;
    											var res = str.split(" ");
    											var meetingtime = document.getElementById("EETTDate").value = res[0] + "T" + res[1]; 
    	}
    	if(obj.ETComments != null)
    	{
    		var fnameSecondary = document.getElementById("ETComments").value=  obj.ETComments;
    	}							
    								}
    							}
    						});
    }else{
    var currentForm = getUrlVars()["currentForm"];
    	if (currentForm == "embryologychart") {
    	try{
    		var searchfrm = document.getElementById("OvumPickUpHide").style.display = "none";
    			}catch (ex){}
    		var grpButton = grpButton + '<div class="row"><div class="col-md-12"><table class="table table-bordered text-center"><tbody><tr>';
    		var grpButton = grpButton + '<td><button type="button" onclick="onclickDay0()" class="btn btn-block bg-gradient-info btn-sm" style="background-color: #adff2f;color:black;">Day 0</button></td>';
    		var grpButton = grpButton + '<td><button type="button" onclick="onclickDay1()" class="btn btn-block bg-gradient-info btn-sm" style="background-color: #33AAFF;color:white;">Day 1</button></td>';
    		var grpButton = grpButton + '<td><button type="button" onclick="onclickDay2()" class="btn btn-block bg-gradient-info btn-sm" style="background-color: #F933FF;color:white;">Day 2</button></td>';
    		var grpButton = grpButton + '<td><button type="button" onclick="onclickDay3()" class="btn btn-block bg-gradient-info btn-sm" style="background-color: #EEEE0F;color:black;">Day 3</button></td>';
    		var grpButton = grpButton + '<td><button type="button" onclick="onclickDay4()" class="btn btn-block bg-gradient-info btn-sm" style="background-color: #8790E5;color:white;">Day 4</button></td>';
    		var grpButton = grpButton + '<td><button type="button" onclick="onclickDay5()" class="btn btn-block bg-gradient-info btn-sm" style="background-color: #E5878C;color:white;">Day 5</button></td>';
    		var grpButton = grpButton + '<td><button type="button" onclick="onclickDay6()" class="btn btn-block bg-gradient-info btn-sm" style="background-color: #0ADA9C;color:white;">Day 6</button></td>';
    		var grpButton = grpButton + '<td><button type="button" onclick="onclickDayAll()" class="btn btn-block bg-gradient-info btn-sm" style="background-color: #AAB7B8;color:white;">All</button></td>';
    		var grpButton = grpButton + '<td><button type="button" onclick="onclickEnd()" class="btn btn-block bg-gradient-info btn-sm" style="background-color: #E77D06;color:white;">End</button></td>';
    		var grpButton = grpButton + '</tr></tbody></table></div></div>';
    		var grpButton = grpButton + '<div class="row"><div class="col-md-12"><table class="table table-bordered text-left"><tbody><tr>';
    		var grpButton = grpButton + '<td>ICSi / IVF  DateTime:<input type="datetime-local" id="meetingtime"  name="meetingtime"  min="2018-06-07T00:00" max="2048-06-14T00:00"></td>';
    		var grpButton = grpButton + '<td>Primary Embrologist:<input type="text" id="fnamePrimary" name="fnamePrimary"></td>';
    		var grpButton = grpButton + '<td>Secondary Embrologist:<input type="text" id="fnameSecondary" name="fnameSecondary"></td>';
    		var grpButton = grpButton + '</tr></tbody></table></div></div>';
    		var grpButton = grpButton + '<div class="row"><div class="col-md-12"><table class="table table-bordered text-left"><tbody><tr>';
    	//	var grpButton = grpButton + '<td>Incubator:<input type="text" id="fnameIncubator" name="fnameIncubator"></td>';
    		var grpButton = grpButton + '<td>Location:<input type="text" id="fnameLocation" name="fnameLocation"></td>';
    		var grpButton = grpButton + '<td  >Remarks :<input type="text" id="fnameIncubator" name="fnameIncubator"></td>';
    		var grpButton = grpButton + '<td  hidden >Remarks :<input type="text" id="ivffnameRemarks" name="ivffnameRemarks"></td>';

    	   // var grpButton = grpButton + '<td><input type="datetime-local" id="meeting-time"  name="meeting-time" value="2018-06-12T19:30" min="2018-06-07T00:00" max="2018-06-14T00:00"></td>';
    		var grpButton = grpButton + '</tr></tbody></table>';
    var grpButton = grpButton + '<table class="table table-bordered text-left"><tbody><tr><td align="center"><div class="small-box bg-success" ><h3> '+ pageCurHeader +'<h3> </div> </td></tr></tbody></table>';
    		var grpButton = grpButton + '</div></div>';

    	//	var searchfrm = document.getElementById("gmp_ivf_embryology_chart");
    	//	var node = document.createElement("div");
    	//	node.innerHTML = grpButton;    
    	//	searchfrm.appendChild(node);
    		var searchfrm = document.getElementById("fivf_embryology_chartlist");
    		var node = document.createElement("div");
    		node.innerHTML = grpButton;    
    		searchfrm.insertBefore(node, searchfrm.firstChild);
    						var user = [{
    							'patientId': fk_id
    						}];
    						var jsonString = JSON.stringify(user);
    						$.ajax({
    							type: "GET",
    							url: "ajaxinsert.php?control=ivffnameLocation",
    							data: { data: jsonString },
    							cache: false,
    							success: function (data) {
    								let jsonObject = JSON.parse(data);
    								var json = jsonObject["records"];
    								for (var i = 0; i < json.length; i++) {
    									var obj = json[i];
    	if(obj.Incubator != null)
    	{
    				var fnameIncubator = document.getElementById("fnameIncubator").value=  obj.Incubator;
    	}
    	if(obj.location != null)
    	{
    		var fnameLocation = document.getElementById("fnameLocation").value=  obj.location;
    	}
    	if(obj.Remarks != null)
    	{
    		var fnameRemarks = document.getElementById("ivffnameRemarks").value=  obj.Remarks;
    	}
    											var str = obj.ICSiIVFDateTime;
    var res = str.split(" ");
    									var meetingtime = document.getElementById("meetingtime").value = res[0] + "T" + res[1]; 
    	if(obj.PrimaryEmbrologist != null)
    	{
    		var fnamePrimary = document.getElementById("fnamePrimary").value=  obj.PrimaryEmbrologist;
    	}
    	if(obj.SecondaryEmbrologist != null)
    	{
    		var fnameSecondary = document.getElementById("fnameSecondary").value=  obj.SecondaryEmbrologist;
    	}
    								}
    							}
    						});
    	}
    }
    	function onclickDay0() {
    		var currentForm = getUrlVars()["currentForm"];
    		var fk_id = getUrlVars()["fk_id"];
    		location.href = "ivf_embryology_chartlist.php?action=gridedit&showmaster=ivf_oocytedenudation&fk_id="+fk_id+"&currentForm="+currentForm+"&fk_RIDNO="+fk_RIDNO+"&fk_Name="+fk_Name+"&treatment="+treatment+"&page=page0";
    	}
    	function onclickDay1() {
    		var currentForm = getUrlVars()["currentForm"];
    		var fk_id = getUrlVars()["fk_id"];
    		location.href = "ivf_embryology_chartlist.php?action=gridedit&showmaster=ivf_oocytedenudation&fk_id="+fk_id+"&currentForm="+currentForm+"&fk_RIDNO="+fk_RIDNO+"&fk_Name="+fk_Name+"&treatment="+treatment+"&page=page1";
    	}
    	function onclickDay2() {
    		var currentForm = getUrlVars()["currentForm"];
    		var fk_id = getUrlVars()["fk_id"];
    		location.href = "ivf_embryology_chartlist.php?action=gridedit&showmaster=ivf_oocytedenudation&fk_id="+fk_id+"&currentForm="+currentForm+"&fk_RIDNO="+fk_RIDNO+"&fk_Name="+fk_Name+"&treatment="+treatment+"&page=page2";
    	}
    	function onclickDay3() {
    		var currentForm = getUrlVars()["currentForm"];
    		var fk_id = getUrlVars()["fk_id"];
    		location.href = "ivf_embryology_chartlist.php?action=gridedit&showmaster=ivf_oocytedenudation&fk_id="+fk_id+"&currentForm="+currentForm+"&fk_RIDNO="+fk_RIDNO+"&fk_Name="+fk_Name+"&treatment="+treatment+"&page=page3";
    	}
    	function onclickDay4() {
    		var currentForm = getUrlVars()["currentForm"];
    		var fk_id = getUrlVars()["fk_id"];
    		location.href = "ivf_embryology_chartlist.php?action=gridedit&showmaster=ivf_oocytedenudation&fk_id="+fk_id+"&currentForm="+currentForm+"&fk_RIDNO="+fk_RIDNO+"&fk_Name="+fk_Name+"&treatment="+treatment+"&page=page4";
    	}
    	function onclickDay5() {
    		var currentForm = getUrlVars()["currentForm"];
    		var fk_id = getUrlVars()["fk_id"];
    		location.href = "ivf_embryology_chartlist.php?action=gridedit&showmaster=ivf_oocytedenudation&fk_id="+fk_id+"&currentForm="+currentForm+"&fk_RIDNO="+fk_RIDNO+"&fk_Name="+fk_Name+"&treatment="+treatment+"&page=page5";
    	}
    	function onclickDay6() {
    		var currentForm = getUrlVars()["currentForm"];
    		var fk_id = getUrlVars()["fk_id"];
    		location.href = "ivf_embryology_chartlist.php?action=gridedit&showmaster=ivf_oocytedenudation&fk_id="+fk_id+"&currentForm="+currentForm+"&fk_RIDNO="+fk_RIDNO+"&fk_Name="+fk_Name+"&treatment="+treatment+"&page=page6";
    	}
    	function onclickDayAll() {
    		var currentForm = getUrlVars()["currentForm"];
    		var fk_id = getUrlVars()["fk_id"];
    		location.href = "ivf_embryology_chartlist.php?action=gridedit&showmaster=ivf_oocytedenudation&fk_id="+fk_id+"&currentForm="+currentForm+"&fk_RIDNO="+fk_RIDNO+"&fk_Name="+fk_Name+"&treatment="+treatment+"&page=pageAll";
    	}
    	function onclickEnd() {
    		var currentForm = getUrlVars()["currentForm"];
    		var fk_id = getUrlVars()["fk_id"];
    		location.href = "ivf_embryology_chartlist.php?action=gridedit&showmaster=ivf_oocytedenudation&fk_id="+fk_id+"&currentForm="+currentForm+"&fk_RIDNO="+fk_RIDNO+"&fk_Name="+fk_Name+"&treatment="+treatment+"&page=pageEnd";
    	}
    jQuery("#tpd_ivf_embryology_chartlist th.ew-list-option-header").each(function() {this.rowSpan = 1});
    jQuery("#tpd_ivf_embryology_chartlist td.ew-list-option-body").each(function() {this.rowSpan = 1});
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_ivf_embryology_chart",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

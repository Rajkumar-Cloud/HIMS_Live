<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfEmbryologyChartList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_embryology_chartlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_embryology_chartlist = currentForm = new ew.Form("fivf_embryology_chartlist", "list");
    fivf_embryology_chartlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_embryology_chart")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_embryology_chart)
        ew.vars.tables.ivf_embryology_chart = currentTable;
    fivf_embryology_chartlist.addFields([
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
        var f = fivf_embryology_chartlist,
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
    fivf_embryology_chartlist.validate = function () {
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
        if (gridinsert && addcnt == 0) { // No row added
            ew.alert(ew.language.phrase("NoAddRecord"));
            return false;
        }
        return true;
    }

    // Check empty row
    fivf_embryology_chartlist.emptyRow = function (rowIndex) {
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
    fivf_embryology_chartlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_embryology_chartlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_embryology_chartlist.lists.Day0PolarBodyPosition = <?= $Page->Day0PolarBodyPosition->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day0Breakage = <?= $Page->Day0Breakage->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day0Attempts = <?= $Page->Day0Attempts->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day0SPZMorpho = <?= $Page->Day0SPZMorpho->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day0SPZLocation = <?= $Page->Day0SPZLocation->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day0SpOrgin = <?= $Page->Day0SpOrgin->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day5Cryoptop = <?= $Page->Day5Cryoptop->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day1PN = <?= $Page->Day1PN->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day1PB = <?= $Page->Day1PB->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day1Pronucleus = <?= $Page->Day1Pronucleus->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day1Nucleolus = <?= $Page->Day1Nucleolus->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day1Halo = <?= $Page->Day1Halo->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day2End = <?= $Page->Day2End->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day3Frag = <?= $Page->Day3Frag->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day3Symmetry = <?= $Page->Day3Symmetry->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day3ZP = <?= $Page->Day3ZP->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day3Vacoules = <?= $Page->Day3Vacoules->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day3Grade = <?= $Page->Day3Grade->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day3Cryoptop = <?= $Page->Day3Cryoptop->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day3End = <?= $Page->Day3End->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day4Cryoptop = <?= $Page->Day4Cryoptop->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day4End = <?= $Page->Day4End->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day5ICM = <?= $Page->Day5ICM->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day5TE = <?= $Page->Day5TE->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day5Observation = <?= $Page->Day5Observation->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day5Collapsed = <?= $Page->Day5Collapsed->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day5Vacoulles = <?= $Page->Day5Vacoulles->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day5Grade = <?= $Page->Day5Grade->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day6ICM = <?= $Page->Day6ICM->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day6TE = <?= $Page->Day6TE->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day6Observation = <?= $Page->Day6Observation->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day6Collapsed = <?= $Page->Day6Collapsed->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day6Vacoulles = <?= $Page->Day6Vacoulles->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day6Grade = <?= $Page->Day6Grade->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.EndingDay = <?= $Page->EndingDay->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.EndingGrade = <?= $Page->EndingGrade->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.EndingState = <?= $Page->EndingState->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Stage = <?= $Page->Stage->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.thawReFrozen = <?= $Page->thawReFrozen->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.vitriDay = <?= $Page->vitriDay->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.vitriGrade = <?= $Page->vitriGrade->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.thawET = <?= $Page->thawET->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.ETDifficulty = <?= $Page->ETDifficulty->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.ETEasy = <?= $Page->ETEasy->toClientList($Page) ?>;
    fivf_embryology_chartlist.lists.Day1End = <?= $Page->Day1End->toClientList($Page) ?>;
    loadjs.done("fivf_embryology_chartlist");
});
var fivf_embryology_chartlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_embryology_chartlistsrch = currentSearchForm = new ew.Form("fivf_embryology_chartlistsrch");

    // Dynamic selection lists

    // Filters
    fivf_embryology_chartlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_embryology_chartlistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
    display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
    <div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
        <ul class="nav nav-tabs"></ul>
        <div class="tab-content"><!-- .tab-content -->
            <div class="tab-pane fade active show"></div>
        </div><!-- /.tab-content -->
    </div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
    ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
    ew.PREVIEW_SINGLE_ROW = false;
    ew.PREVIEW_OVERLAY = false;
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Client script
    // Write your client script here, no need to add script tags.

    // Write your client script here, no need to add script tags.
    </script>
    <style>
    input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
    	min-width: 80%;
    	width: 80%;
    }
    </style>
    <style>
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
    	flex-wrap: nowrap;
    	align-items: stretch;
    	width: 100%;
    }
    .input-group>.form-control {
    	width: 80%;
    	flex-grow: 0;
    }
    </style>
    <script>
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$Page->isExport() || Config("EXPORT_MASTER_RECORD") && $Page->isExport("print")) { ?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "ivf_treatment_plan") {
    if ($Page->MasterRecordExists) {
        include_once "views/IvfTreatmentPlanMaster.php";
    }
}
?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "ivf_oocytedenudation") {
    if ($Page->MasterRecordExists) {
        include_once "views/IvfOocytedenudationMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fivf_embryology_chartlistsrch" id="fivf_embryology_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fivf_embryology_chartlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_embryology_chart">
    <div class="ew-extended-search">
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_embryology_chart">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_embryology_chartlist" id="fivf_embryology_chartlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<?php if ($Page->getCurrentMasterTable() == "ivf_treatment_plan" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?= HtmlEncode($Page->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?= HtmlEncode($Page->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->TidNo->getSessionValue()) ?>">
<?php } ?>
<?php if ($Page->getCurrentMasterTable() == "ivf_oocytedenudation" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ivf_oocytedenudation">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->DidNO->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_ivf_embryology_chart" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isAdd() || $Page->isCopy() || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_embryology_chartlist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_id" class="ivf_embryology_chart_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th data-name="ARTCycle" class="<?= $Page->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle"><?= $Page->renderSort($Page->ARTCycle) ?></div></th>
<?php } ?>
<?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
        <th data-name="SpermOrigin" class="<?= $Page->SpermOrigin->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin"><?= $Page->renderSort($Page->SpermOrigin) ?></div></th>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <th data-name="InseminatinTechnique" class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique"><?= $Page->renderSort($Page->InseminatinTechnique) ?></div></th>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <th data-name="IndicationForART" class="<?= $Page->IndicationForART->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART"><?= $Page->renderSort($Page->IndicationForART) ?></div></th>
<?php } ?>
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <th data-name="Day0sino" class="<?= $Page->Day0sino->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino"><?= $Page->renderSort($Page->Day0sino) ?></div></th>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <th data-name="Day0OocyteStage" class="<?= $Page->Day0OocyteStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage"><?= $Page->renderSort($Page->Day0OocyteStage) ?></div></th>
<?php } ?>
<?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <th data-name="Day0PolarBodyPosition" class="<?= $Page->Day0PolarBodyPosition->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition"><?= $Page->renderSort($Page->Day0PolarBodyPosition) ?></div></th>
<?php } ?>
<?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
        <th data-name="Day0Breakage" class="<?= $Page->Day0Breakage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage"><?= $Page->renderSort($Page->Day0Breakage) ?></div></th>
<?php } ?>
<?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
        <th data-name="Day0Attempts" class="<?= $Page->Day0Attempts->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts"><?= $Page->renderSort($Page->Day0Attempts) ?></div></th>
<?php } ?>
<?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <th data-name="Day0SPZMorpho" class="<?= $Page->Day0SPZMorpho->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho"><?= $Page->renderSort($Page->Day0SPZMorpho) ?></div></th>
<?php } ?>
<?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <th data-name="Day0SPZLocation" class="<?= $Page->Day0SPZLocation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation"><?= $Page->renderSort($Page->Day0SPZLocation) ?></div></th>
<?php } ?>
<?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <th data-name="Day0SpOrgin" class="<?= $Page->Day0SpOrgin->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin"><?= $Page->renderSort($Page->Day0SpOrgin) ?></div></th>
<?php } ?>
<?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <th data-name="Day5Cryoptop" class="<?= $Page->Day5Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop"><?= $Page->renderSort($Page->Day5Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
        <th data-name="Day1Sperm" class="<?= $Page->Day1Sperm->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm"><?= $Page->renderSort($Page->Day1Sperm) ?></div></th>
<?php } ?>
<?php if ($Page->Day1PN->Visible) { // Day1PN ?>
        <th data-name="Day1PN" class="<?= $Page->Day1PN->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN"><?= $Page->renderSort($Page->Day1PN) ?></div></th>
<?php } ?>
<?php if ($Page->Day1PB->Visible) { // Day1PB ?>
        <th data-name="Day1PB" class="<?= $Page->Day1PB->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB"><?= $Page->renderSort($Page->Day1PB) ?></div></th>
<?php } ?>
<?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <th data-name="Day1Pronucleus" class="<?= $Page->Day1Pronucleus->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus"><?= $Page->renderSort($Page->Day1Pronucleus) ?></div></th>
<?php } ?>
<?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <th data-name="Day1Nucleolus" class="<?= $Page->Day1Nucleolus->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus"><?= $Page->renderSort($Page->Day1Nucleolus) ?></div></th>
<?php } ?>
<?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
        <th data-name="Day1Halo" class="<?= $Page->Day1Halo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo"><?= $Page->renderSort($Page->Day1Halo) ?></div></th>
<?php } ?>
<?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
        <th data-name="Day2SiNo" class="<?= $Page->Day2SiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo"><?= $Page->renderSort($Page->Day2SiNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
        <th data-name="Day2CellNo" class="<?= $Page->Day2CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo"><?= $Page->renderSort($Page->Day2CellNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
        <th data-name="Day2Frag" class="<?= $Page->Day2Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag"><?= $Page->renderSort($Page->Day2Frag) ?></div></th>
<?php } ?>
<?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <th data-name="Day2Symmetry" class="<?= $Page->Day2Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry"><?= $Page->renderSort($Page->Day2Symmetry) ?></div></th>
<?php } ?>
<?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <th data-name="Day2Cryoptop" class="<?= $Page->Day2Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop"><?= $Page->renderSort($Page->Day2Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
        <th data-name="Day2Grade" class="<?= $Page->Day2Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade"><?= $Page->renderSort($Page->Day2Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Day2End->Visible) { // Day2End ?>
        <th data-name="Day2End" class="<?= $Page->Day2End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End"><?= $Page->renderSort($Page->Day2End) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
        <th data-name="Day3Sino" class="<?= $Page->Day3Sino->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino"><?= $Page->renderSort($Page->Day3Sino) ?></div></th>
<?php } ?>
<?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
        <th data-name="Day3CellNo" class="<?= $Page->Day3CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo"><?= $Page->renderSort($Page->Day3CellNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
        <th data-name="Day3Frag" class="<?= $Page->Day3Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag"><?= $Page->renderSort($Page->Day3Frag) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <th data-name="Day3Symmetry" class="<?= $Page->Day3Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry"><?= $Page->renderSort($Page->Day3Symmetry) ?></div></th>
<?php } ?>
<?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
        <th data-name="Day3ZP" class="<?= $Page->Day3ZP->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP"><?= $Page->renderSort($Page->Day3ZP) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <th data-name="Day3Vacoules" class="<?= $Page->Day3Vacoules->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules"><?= $Page->renderSort($Page->Day3Vacoules) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
        <th data-name="Day3Grade" class="<?= $Page->Day3Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade"><?= $Page->renderSort($Page->Day3Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <th data-name="Day3Cryoptop" class="<?= $Page->Day3Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop"><?= $Page->renderSort($Page->Day3Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Page->Day3End->Visible) { // Day3End ?>
        <th data-name="Day3End" class="<?= $Page->Day3End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End"><?= $Page->renderSort($Page->Day3End) ?></div></th>
<?php } ?>
<?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
        <th data-name="Day4SiNo" class="<?= $Page->Day4SiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo"><?= $Page->renderSort($Page->Day4SiNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
        <th data-name="Day4CellNo" class="<?= $Page->Day4CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo"><?= $Page->renderSort($Page->Day4CellNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
        <th data-name="Day4Frag" class="<?= $Page->Day4Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag"><?= $Page->renderSort($Page->Day4Frag) ?></div></th>
<?php } ?>
<?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <th data-name="Day4Symmetry" class="<?= $Page->Day4Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry"><?= $Page->renderSort($Page->Day4Symmetry) ?></div></th>
<?php } ?>
<?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
        <th data-name="Day4Grade" class="<?= $Page->Day4Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade"><?= $Page->renderSort($Page->Day4Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <th data-name="Day4Cryoptop" class="<?= $Page->Day4Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop"><?= $Page->renderSort($Page->Day4Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Page->Day4End->Visible) { // Day4End ?>
        <th data-name="Day4End" class="<?= $Page->Day4End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End"><?= $Page->renderSort($Page->Day4End) ?></div></th>
<?php } ?>
<?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
        <th data-name="Day5CellNo" class="<?= $Page->Day5CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo"><?= $Page->renderSort($Page->Day5CellNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
        <th data-name="Day5ICM" class="<?= $Page->Day5ICM->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM"><?= $Page->renderSort($Page->Day5ICM) ?></div></th>
<?php } ?>
<?php if ($Page->Day5TE->Visible) { // Day5TE ?>
        <th data-name="Day5TE" class="<?= $Page->Day5TE->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE"><?= $Page->renderSort($Page->Day5TE) ?></div></th>
<?php } ?>
<?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
        <th data-name="Day5Observation" class="<?= $Page->Day5Observation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation"><?= $Page->renderSort($Page->Day5Observation) ?></div></th>
<?php } ?>
<?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <th data-name="Day5Collapsed" class="<?= $Page->Day5Collapsed->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed"><?= $Page->renderSort($Page->Day5Collapsed) ?></div></th>
<?php } ?>
<?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <th data-name="Day5Vacoulles" class="<?= $Page->Day5Vacoulles->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles"><?= $Page->renderSort($Page->Day5Vacoulles) ?></div></th>
<?php } ?>
<?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
        <th data-name="Day5Grade" class="<?= $Page->Day5Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade"><?= $Page->renderSort($Page->Day5Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
        <th data-name="Day6CellNo" class="<?= $Page->Day6CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo"><?= $Page->renderSort($Page->Day6CellNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
        <th data-name="Day6ICM" class="<?= $Page->Day6ICM->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM"><?= $Page->renderSort($Page->Day6ICM) ?></div></th>
<?php } ?>
<?php if ($Page->Day6TE->Visible) { // Day6TE ?>
        <th data-name="Day6TE" class="<?= $Page->Day6TE->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE"><?= $Page->renderSort($Page->Day6TE) ?></div></th>
<?php } ?>
<?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
        <th data-name="Day6Observation" class="<?= $Page->Day6Observation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation"><?= $Page->renderSort($Page->Day6Observation) ?></div></th>
<?php } ?>
<?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <th data-name="Day6Collapsed" class="<?= $Page->Day6Collapsed->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed"><?= $Page->renderSort($Page->Day6Collapsed) ?></div></th>
<?php } ?>
<?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <th data-name="Day6Vacoulles" class="<?= $Page->Day6Vacoulles->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles"><?= $Page->renderSort($Page->Day6Vacoulles) ?></div></th>
<?php } ?>
<?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
        <th data-name="Day6Grade" class="<?= $Page->Day6Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade"><?= $Page->renderSort($Page->Day6Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <th data-name="Day6Cryoptop" class="<?= $Page->Day6Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop"><?= $Page->renderSort($Page->Day6Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
        <th data-name="EndSiNo" class="<?= $Page->EndSiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo"><?= $Page->renderSort($Page->EndSiNo) ?></div></th>
<?php } ?>
<?php if ($Page->EndingDay->Visible) { // EndingDay ?>
        <th data-name="EndingDay" class="<?= $Page->EndingDay->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay"><?= $Page->renderSort($Page->EndingDay) ?></div></th>
<?php } ?>
<?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
        <th data-name="EndingCellStage" class="<?= $Page->EndingCellStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage"><?= $Page->renderSort($Page->EndingCellStage) ?></div></th>
<?php } ?>
<?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
        <th data-name="EndingGrade" class="<?= $Page->EndingGrade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade"><?= $Page->renderSort($Page->EndingGrade) ?></div></th>
<?php } ?>
<?php if ($Page->EndingState->Visible) { // EndingState ?>
        <th data-name="EndingState" class="<?= $Page->EndingState->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState"><?= $Page->renderSort($Page->EndingState) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
        <th data-name="DidNO" class="<?= $Page->DidNO->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO"><?= $Page->renderSort($Page->DidNO) ?></div></th>
<?php } ?>
<?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <th data-name="ICSiIVFDateTime" class="<?= $Page->ICSiIVFDateTime->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime"><?= $Page->renderSort($Page->ICSiIVFDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <th data-name="PrimaryEmbrologist" class="<?= $Page->PrimaryEmbrologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist"><?= $Page->renderSort($Page->PrimaryEmbrologist) ?></div></th>
<?php } ?>
<?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <th data-name="SecondaryEmbrologist" class="<?= $Page->SecondaryEmbrologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist"><?= $Page->renderSort($Page->SecondaryEmbrologist) ?></div></th>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <th data-name="Incubator" class="<?= $Page->Incubator->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator"><?= $Page->renderSort($Page->Incubator) ?></div></th>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
        <th data-name="location" class="<?= $Page->location->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_location" class="ivf_embryology_chart_location"><?= $Page->renderSort($Page->location) ?></div></th>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <th data-name="OocyteNo" class="<?= $Page->OocyteNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo"><?= $Page->renderSort($Page->OocyteNo) ?></div></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th data-name="Stage" class="<?= $Page->Stage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage"><?= $Page->renderSort($Page->Stage) ?></div></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Page->Remarks->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks"><?= $Page->renderSort($Page->Remarks) ?></div></th>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <th data-name="vitrificationDate" class="<?= $Page->vitrificationDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate"><?= $Page->renderSort($Page->vitrificationDate) ?></div></th>
<?php } ?>
<?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <th data-name="vitriPrimaryEmbryologist" class="<?= $Page->vitriPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist"><?= $Page->renderSort($Page->vitriPrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <th data-name="vitriSecondaryEmbryologist" class="<?= $Page->vitriSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist"><?= $Page->renderSort($Page->vitriSecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <th data-name="vitriEmbryoNo" class="<?= $Page->vitriEmbryoNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo"><?= $Page->renderSort($Page->vitriEmbryoNo) ?></div></th>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <th data-name="thawReFrozen" class="<?= $Page->thawReFrozen->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen"><?= $Page->renderSort($Page->thawReFrozen) ?></div></th>
<?php } ?>
<?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <th data-name="vitriFertilisationDate" class="<?= $Page->vitriFertilisationDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate"><?= $Page->renderSort($Page->vitriFertilisationDate) ?></div></th>
<?php } ?>
<?php if ($Page->vitriDay->Visible) { // vitriDay ?>
        <th data-name="vitriDay" class="<?= $Page->vitriDay->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay"><?= $Page->renderSort($Page->vitriDay) ?></div></th>
<?php } ?>
<?php if ($Page->vitriStage->Visible) { // vitriStage ?>
        <th data-name="vitriStage" class="<?= $Page->vitriStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage"><?= $Page->renderSort($Page->vitriStage) ?></div></th>
<?php } ?>
<?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
        <th data-name="vitriGrade" class="<?= $Page->vitriGrade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade"><?= $Page->renderSort($Page->vitriGrade) ?></div></th>
<?php } ?>
<?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
        <th data-name="vitriIncubator" class="<?= $Page->vitriIncubator->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator"><?= $Page->renderSort($Page->vitriIncubator) ?></div></th>
<?php } ?>
<?php if ($Page->vitriTank->Visible) { // vitriTank ?>
        <th data-name="vitriTank" class="<?= $Page->vitriTank->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank"><?= $Page->renderSort($Page->vitriTank) ?></div></th>
<?php } ?>
<?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
        <th data-name="vitriCanister" class="<?= $Page->vitriCanister->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister"><?= $Page->renderSort($Page->vitriCanister) ?></div></th>
<?php } ?>
<?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
        <th data-name="vitriGobiet" class="<?= $Page->vitriGobiet->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet"><?= $Page->renderSort($Page->vitriGobiet) ?></div></th>
<?php } ?>
<?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
        <th data-name="vitriViscotube" class="<?= $Page->vitriViscotube->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube"><?= $Page->renderSort($Page->vitriViscotube) ?></div></th>
<?php } ?>
<?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <th data-name="vitriCryolockNo" class="<?= $Page->vitriCryolockNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo"><?= $Page->renderSort($Page->vitriCryolockNo) ?></div></th>
<?php } ?>
<?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <th data-name="vitriCryolockColour" class="<?= $Page->vitriCryolockColour->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour"><?= $Page->renderSort($Page->vitriCryolockColour) ?></div></th>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
        <th data-name="thawDate" class="<?= $Page->thawDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate"><?= $Page->renderSort($Page->thawDate) ?></div></th>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <th data-name="thawPrimaryEmbryologist" class="<?= $Page->thawPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist"><?= $Page->renderSort($Page->thawPrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <th data-name="thawSecondaryEmbryologist" class="<?= $Page->thawSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist"><?= $Page->renderSort($Page->thawSecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
        <th data-name="thawET" class="<?= $Page->thawET->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET"><?= $Page->renderSort($Page->thawET) ?></div></th>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <th data-name="thawAbserve" class="<?= $Page->thawAbserve->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve"><?= $Page->renderSort($Page->thawAbserve) ?></div></th>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <th data-name="thawDiscard" class="<?= $Page->thawDiscard->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard"><?= $Page->renderSort($Page->thawDiscard) ?></div></th>
<?php } ?>
<?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
        <th data-name="ETCatheter" class="<?= $Page->ETCatheter->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter"><?= $Page->renderSort($Page->ETCatheter) ?></div></th>
<?php } ?>
<?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
        <th data-name="ETDifficulty" class="<?= $Page->ETDifficulty->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty"><?= $Page->renderSort($Page->ETDifficulty) ?></div></th>
<?php } ?>
<?php if ($Page->ETEasy->Visible) { // ETEasy ?>
        <th data-name="ETEasy" class="<?= $Page->ETEasy->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy"><?= $Page->renderSort($Page->ETEasy) ?></div></th>
<?php } ?>
<?php if ($Page->ETComments->Visible) { // ETComments ?>
        <th data-name="ETComments" class="<?= $Page->ETComments->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments"><?= $Page->renderSort($Page->ETComments) ?></div></th>
<?php } ?>
<?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
        <th data-name="ETDoctor" class="<?= $Page->ETDoctor->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor"><?= $Page->renderSort($Page->ETDoctor) ?></div></th>
<?php } ?>
<?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <th data-name="ETEmbryologist" class="<?= $Page->ETEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist"><?= $Page->renderSort($Page->ETEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
        <th data-name="ETDate" class="<?= $Page->ETDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate"><?= $Page->renderSort($Page->ETDate) ?></div></th>
<?php } ?>
<?php if ($Page->Day1End->Visible) { // Day1End ?>
        <th data-name="Day1End" class="<?= $Page->Day1End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End"><?= $Page->renderSort($Page->Day1End) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
    if ($Page->isAdd() || $Page->isCopy()) {
        $Page->RowIndex = 0;
        $Page->KeyCount = $Page->RowIndex;
        if ($Page->isCopy() && !$Page->loadRow())
            $Page->CurrentAction = "add";
        if ($Page->isAdd())
            $Page->loadRowValues();
        if ($Page->EventCancelled) // Insert failed
            $Page->restoreFormValues(); // Restore form values

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_ivf_embryology_chart", "data-rowtype" => ROWTYPE_ADD]);
        $Page->RowType = ROWTYPE_ADD;

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
        $Page->StartRowCount = 0;
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_id" class="form-group ivf_embryology_chart_id"></span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo">
<?php if ($Page->RIDNo->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNo->getDisplayValue($Page->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_RIDNo" name="x<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x<?= $Page->RowIndex ?>_RIDNo" id="x<?= $Page->RowIndex ?>_RIDNo" size="4" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_RIDNo" id="o<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name">
<?php if ($Page->Name->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Name->getDisplayValue($Page->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Name" name="x<?= $Page->RowIndex ?>_Name" value="<?= HtmlEncode($Page->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Name" name="x<?= $Page->RowIndex ?>_Name" id="x<?= $Page->RowIndex ?>_Name" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Name" id="o<?= $Page->RowIndex ?>_Name" value="<?= HtmlEncode($Page->Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td data-name="ARTCycle">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ARTCycle" class="form-group ivf_embryology_chart_ARTCycle">
<input type="<?= $Page->ARTCycle->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x<?= $Page->RowIndex ?>_ARTCycle" id="x<?= $Page->RowIndex ?>_ARTCycle" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>" value="<?= $Page->ARTCycle->EditValue ?>"<?= $Page->ARTCycle->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" data-hidden="1" name="o<?= $Page->RowIndex ?>_ARTCycle" id="o<?= $Page->RowIndex ?>_ARTCycle" value="<?= HtmlEncode($Page->ARTCycle->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
        <td data-name="SpermOrigin">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SpermOrigin" class="form-group ivf_embryology_chart_SpermOrigin">
<input type="<?= $Page->SpermOrigin->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?= $Page->RowIndex ?>_SpermOrigin" id="x<?= $Page->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SpermOrigin->getPlaceHolder()) ?>" value="<?= $Page->SpermOrigin->EditValue ?>"<?= $Page->SpermOrigin->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SpermOrigin->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" data-hidden="1" name="o<?= $Page->RowIndex ?>_SpermOrigin" id="o<?= $Page->RowIndex ?>_SpermOrigin" value="<?= HtmlEncode($Page->SpermOrigin->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td data-name="InseminatinTechnique">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_InseminatinTechnique" class="form-group ivf_embryology_chart_InseminatinTechnique">
<input type="<?= $Page->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?= $Page->RowIndex ?>_InseminatinTechnique" id="x<?= $Page->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Page->InseminatinTechnique->EditValue ?>"<?= $Page->InseminatinTechnique->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->InseminatinTechnique->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" data-hidden="1" name="o<?= $Page->RowIndex ?>_InseminatinTechnique" id="o<?= $Page->RowIndex ?>_InseminatinTechnique" value="<?= HtmlEncode($Page->InseminatinTechnique->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <td data-name="IndicationForART">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_IndicationForART" class="form-group ivf_embryology_chart_IndicationForART">
<input type="<?= $Page->IndicationForART->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?= $Page->RowIndex ?>_IndicationForART" id="x<?= $Page->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->IndicationForART->getPlaceHolder()) ?>" value="<?= $Page->IndicationForART->EditValue ?>"<?= $Page->IndicationForART->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IndicationForART->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" data-hidden="1" name="o<?= $Page->RowIndex ?>_IndicationForART" id="o<?= $Page->RowIndex ?>_IndicationForART" value="<?= HtmlEncode($Page->IndicationForART->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <td data-name="Day0sino">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0sino" class="form-group ivf_embryology_chart_Day0sino">
<input type="<?= $Page->Day0sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?= $Page->RowIndex ?>_Day0sino" id="x<?= $Page->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0sino->getPlaceHolder()) ?>" value="<?= $Page->Day0sino->EditValue ?>"<?= $Page->Day0sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0sino->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0sino" id="o<?= $Page->RowIndex ?>_Day0sino" value="<?= HtmlEncode($Page->Day0sino->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td data-name="Day0OocyteStage">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0OocyteStage" class="form-group ivf_embryology_chart_Day0OocyteStage">
<input type="<?= $Page->Day0OocyteStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?= $Page->RowIndex ?>_Day0OocyteStage" id="x<?= $Page->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Page->Day0OocyteStage->EditValue ?>"<?= $Page->Day0OocyteStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0OocyteStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0OocyteStage" id="o<?= $Page->RowIndex ?>_Day0OocyteStage" value="<?= HtmlEncode($Page->Day0OocyteStage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <td data-name="Day0PolarBodyPosition">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group ivf_embryology_chart_Day0PolarBodyPosition">
    <select
        id="x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        name="x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        class="form-control ew-select<?= $Page->Day0PolarBodyPosition->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        data-table="ivf_embryology_chart"
        data-field="x_Day0PolarBodyPosition"
        data-value-separator="<?= $Page->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0PolarBodyPosition->getPlaceHolder()) ?>"
        <?= $Page->Day0PolarBodyPosition->editAttributes() ?>>
        <?= $Page->Day0PolarBodyPosition->selectOptionListHtml("x{$Page->RowIndex}_Day0PolarBodyPosition") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0PolarBodyPosition->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0PolarBodyPosition", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0PolarBodyPosition" id="o<?= $Page->RowIndex ?>_Day0PolarBodyPosition" value="<?= HtmlEncode($Page->Day0PolarBodyPosition->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
        <td data-name="Day0Breakage">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Breakage" class="form-group ivf_embryology_chart_Day0Breakage">
    <select
        id="x<?= $Page->RowIndex ?>_Day0Breakage"
        name="x<?= $Page->RowIndex ?>_Day0Breakage"
        class="form-control ew-select<?= $Page->Day0Breakage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Breakage"
        data-value-separator="<?= $Page->Day0Breakage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0Breakage->getPlaceHolder()) ?>"
        <?= $Page->Day0Breakage->editAttributes() ?>>
        <?= $Page->Day0Breakage->selectOptionListHtml("x{$Page->RowIndex}_Day0Breakage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0Breakage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0Breakage", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0Breakage" id="o<?= $Page->RowIndex ?>_Day0Breakage" value="<?= HtmlEncode($Page->Day0Breakage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
        <td data-name="Day0Attempts">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Attempts" class="form-group ivf_embryology_chart_Day0Attempts">
    <select
        id="x<?= $Page->RowIndex ?>_Day0Attempts"
        name="x<?= $Page->RowIndex ?>_Day0Attempts"
        class="form-control ew-select<?= $Page->Day0Attempts->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Attempts"
        data-value-separator="<?= $Page->Day0Attempts->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0Attempts->getPlaceHolder()) ?>"
        <?= $Page->Day0Attempts->editAttributes() ?>>
        <?= $Page->Day0Attempts->selectOptionListHtml("x{$Page->RowIndex}_Day0Attempts") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0Attempts->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0Attempts", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0Attempts" id="o<?= $Page->RowIndex ?>_Day0Attempts" value="<?= HtmlEncode($Page->Day0Attempts->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <td data-name="Day0SPZMorpho">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZMorpho" class="form-group ivf_embryology_chart_Day0SPZMorpho">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        name="x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        class="form-control ew-select<?= $Page->Day0SPZMorpho->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZMorpho"
        data-value-separator="<?= $Page->Day0SPZMorpho->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SPZMorpho->getPlaceHolder()) ?>"
        <?= $Page->Day0SPZMorpho->editAttributes() ?>>
        <?= $Page->Day0SPZMorpho->selectOptionListHtml("x{$Page->RowIndex}_Day0SPZMorpho") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SPZMorpho->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SPZMorpho", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0SPZMorpho" id="o<?= $Page->RowIndex ?>_Day0SPZMorpho" value="<?= HtmlEncode($Page->Day0SPZMorpho->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <td data-name="Day0SPZLocation">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZLocation" class="form-group ivf_embryology_chart_Day0SPZLocation">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SPZLocation"
        name="x<?= $Page->RowIndex ?>_Day0SPZLocation"
        class="form-control ew-select<?= $Page->Day0SPZLocation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZLocation"
        data-value-separator="<?= $Page->Day0SPZLocation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SPZLocation->getPlaceHolder()) ?>"
        <?= $Page->Day0SPZLocation->editAttributes() ?>>
        <?= $Page->Day0SPZLocation->selectOptionListHtml("x{$Page->RowIndex}_Day0SPZLocation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SPZLocation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SPZLocation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0SPZLocation" id="o<?= $Page->RowIndex ?>_Day0SPZLocation" value="<?= HtmlEncode($Page->Day0SPZLocation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <td data-name="Day0SpOrgin">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SpOrgin" class="form-group ivf_embryology_chart_Day0SpOrgin">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SpOrgin"
        name="x<?= $Page->RowIndex ?>_Day0SpOrgin"
        class="form-control ew-select<?= $Page->Day0SpOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SpOrgin"
        data-value-separator="<?= $Page->Day0SpOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SpOrgin->getPlaceHolder()) ?>"
        <?= $Page->Day0SpOrgin->editAttributes() ?>>
        <?= $Page->Day0SpOrgin->selectOptionListHtml("x{$Page->RowIndex}_Day0SpOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SpOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SpOrgin", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0SpOrgin" id="o<?= $Page->RowIndex ?>_Day0SpOrgin" value="<?= HtmlEncode($Page->Day0SpOrgin->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <td data-name="Day5Cryoptop">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Cryoptop" class="form-group ivf_embryology_chart_Day5Cryoptop">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day5Cryoptop"
        class="form-control ew-select<?= $Page->Day5Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Cryoptop"
        data-value-separator="<?= $Page->Day5Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day5Cryoptop->editAttributes() ?>>
        <?= $Page->Day5Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day5Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Cryoptop" id="o<?= $Page->RowIndex ?>_Day5Cryoptop" value="<?= HtmlEncode($Page->Day5Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
        <td data-name="Day1Sperm">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Sperm" class="form-group ivf_embryology_chart_Day1Sperm">
<input type="<?= $Page->Day1Sperm->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?= $Page->RowIndex ?>_Day1Sperm" id="x<?= $Page->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day1Sperm->getPlaceHolder()) ?>" value="<?= $Page->Day1Sperm->EditValue ?>"<?= $Page->Day1Sperm->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day1Sperm->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Sperm" id="o<?= $Page->RowIndex ?>_Day1Sperm" value="<?= HtmlEncode($Page->Day1Sperm->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1PN->Visible) { // Day1PN ?>
        <td data-name="Day1PN">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PN" class="form-group ivf_embryology_chart_Day1PN">
    <select
        id="x<?= $Page->RowIndex ?>_Day1PN"
        name="x<?= $Page->RowIndex ?>_Day1PN"
        class="form-control ew-select<?= $Page->Day1PN->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PN"
        data-value-separator="<?= $Page->Day1PN->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1PN->getPlaceHolder()) ?>"
        <?= $Page->Day1PN->editAttributes() ?>>
        <?= $Page->Day1PN->selectOptionListHtml("x{$Page->RowIndex}_Day1PN") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1PN->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1PN", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PN.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PN.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1PN" id="o<?= $Page->RowIndex ?>_Day1PN" value="<?= HtmlEncode($Page->Day1PN->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1PB->Visible) { // Day1PB ?>
        <td data-name="Day1PB">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PB" class="form-group ivf_embryology_chart_Day1PB">
    <select
        id="x<?= $Page->RowIndex ?>_Day1PB"
        name="x<?= $Page->RowIndex ?>_Day1PB"
        class="form-control ew-select<?= $Page->Day1PB->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PB"
        data-value-separator="<?= $Page->Day1PB->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1PB->getPlaceHolder()) ?>"
        <?= $Page->Day1PB->editAttributes() ?>>
        <?= $Page->Day1PB->selectOptionListHtml("x{$Page->RowIndex}_Day1PB") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1PB->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1PB", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PB.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PB.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1PB" id="o<?= $Page->RowIndex ?>_Day1PB" value="<?= HtmlEncode($Page->Day1PB->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <td data-name="Day1Pronucleus">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Pronucleus" class="form-group ivf_embryology_chart_Day1Pronucleus">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Pronucleus"
        name="x<?= $Page->RowIndex ?>_Day1Pronucleus"
        class="form-control ew-select<?= $Page->Day1Pronucleus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Pronucleus"
        data-value-separator="<?= $Page->Day1Pronucleus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Pronucleus->getPlaceHolder()) ?>"
        <?= $Page->Day1Pronucleus->editAttributes() ?>>
        <?= $Page->Day1Pronucleus->selectOptionListHtml("x{$Page->RowIndex}_Day1Pronucleus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Pronucleus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Pronucleus", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Pronucleus" id="o<?= $Page->RowIndex ?>_Day1Pronucleus" value="<?= HtmlEncode($Page->Day1Pronucleus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <td data-name="Day1Nucleolus">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Nucleolus" class="form-group ivf_embryology_chart_Day1Nucleolus">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Nucleolus"
        name="x<?= $Page->RowIndex ?>_Day1Nucleolus"
        class="form-control ew-select<?= $Page->Day1Nucleolus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Nucleolus"
        data-value-separator="<?= $Page->Day1Nucleolus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Nucleolus->getPlaceHolder()) ?>"
        <?= $Page->Day1Nucleolus->editAttributes() ?>>
        <?= $Page->Day1Nucleolus->selectOptionListHtml("x{$Page->RowIndex}_Day1Nucleolus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Nucleolus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Nucleolus", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Nucleolus" id="o<?= $Page->RowIndex ?>_Day1Nucleolus" value="<?= HtmlEncode($Page->Day1Nucleolus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
        <td data-name="Day1Halo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Halo" class="form-group ivf_embryology_chart_Day1Halo">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Halo"
        name="x<?= $Page->RowIndex ?>_Day1Halo"
        class="form-control ew-select<?= $Page->Day1Halo->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Halo"
        data-value-separator="<?= $Page->Day1Halo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Halo->getPlaceHolder()) ?>"
        <?= $Page->Day1Halo->editAttributes() ?>>
        <?= $Page->Day1Halo->selectOptionListHtml("x{$Page->RowIndex}_Day1Halo") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Halo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Halo", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Halo" id="o<?= $Page->RowIndex ?>_Day1Halo" value="<?= HtmlEncode($Page->Day1Halo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
        <td data-name="Day2SiNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2SiNo" class="form-group ivf_embryology_chart_Day2SiNo">
<input type="<?= $Page->Day2SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?= $Page->RowIndex ?>_Day2SiNo" id="x<?= $Page->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2SiNo->getPlaceHolder()) ?>" value="<?= $Page->Day2SiNo->EditValue ?>"<?= $Page->Day2SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2SiNo" id="o<?= $Page->RowIndex ?>_Day2SiNo" value="<?= HtmlEncode($Page->Day2SiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
        <td data-name="Day2CellNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2CellNo" class="form-group ivf_embryology_chart_Day2CellNo">
<input type="<?= $Page->Day2CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?= $Page->RowIndex ?>_Day2CellNo" id="x<?= $Page->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day2CellNo->EditValue ?>"<?= $Page->Day2CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2CellNo" id="o<?= $Page->RowIndex ?>_Day2CellNo" value="<?= HtmlEncode($Page->Day2CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
        <td data-name="Day2Frag">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Frag" class="form-group ivf_embryology_chart_Day2Frag">
<input type="<?= $Page->Day2Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?= $Page->RowIndex ?>_Day2Frag" id="x<?= $Page->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Frag->getPlaceHolder()) ?>" value="<?= $Page->Day2Frag->EditValue ?>"<?= $Page->Day2Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Frag->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Frag" id="o<?= $Page->RowIndex ?>_Day2Frag" value="<?= HtmlEncode($Page->Day2Frag->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <td data-name="Day2Symmetry">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Symmetry" class="form-group ivf_embryology_chart_Day2Symmetry">
<input type="<?= $Page->Day2Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?= $Page->RowIndex ?>_Day2Symmetry" id="x<?= $Page->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Symmetry->getPlaceHolder()) ?>" value="<?= $Page->Day2Symmetry->EditValue ?>"<?= $Page->Day2Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Symmetry->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Symmetry" id="o<?= $Page->RowIndex ?>_Day2Symmetry" value="<?= HtmlEncode($Page->Day2Symmetry->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <td data-name="Day2Cryoptop">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Cryoptop" class="form-group ivf_embryology_chart_Day2Cryoptop">
<input type="<?= $Page->Day2Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?= $Page->RowIndex ?>_Day2Cryoptop" id="x<?= $Page->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Cryoptop->getPlaceHolder()) ?>" value="<?= $Page->Day2Cryoptop->EditValue ?>"<?= $Page->Day2Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Cryoptop->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Cryoptop" id="o<?= $Page->RowIndex ?>_Day2Cryoptop" value="<?= HtmlEncode($Page->Day2Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
        <td data-name="Day2Grade">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Grade" class="form-group ivf_embryology_chart_Day2Grade">
<input type="<?= $Page->Day2Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?= $Page->RowIndex ?>_Day2Grade" id="x<?= $Page->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Grade->getPlaceHolder()) ?>" value="<?= $Page->Day2Grade->EditValue ?>"<?= $Page->Day2Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Grade->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Grade" id="o<?= $Page->RowIndex ?>_Day2Grade" value="<?= HtmlEncode($Page->Day2Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2End->Visible) { // Day2End ?>
        <td data-name="Day2End">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2End" class="form-group ivf_embryology_chart_Day2End">
    <select
        id="x<?= $Page->RowIndex ?>_Day2End"
        name="x<?= $Page->RowIndex ?>_Day2End"
        class="form-control ew-select<?= $Page->Day2End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End"
        data-table="ivf_embryology_chart"
        data-field="x_Day2End"
        data-value-separator="<?= $Page->Day2End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day2End->getPlaceHolder()) ?>"
        <?= $Page->Day2End->editAttributes() ?>>
        <?= $Page->Day2End->selectOptionListHtml("x{$Page->RowIndex}_Day2End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day2End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day2End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day2End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day2End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2End" id="o<?= $Page->RowIndex ?>_Day2End" value="<?= HtmlEncode($Page->Day2End->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
        <td data-name="Day3Sino">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Sino" class="form-group ivf_embryology_chart_Day3Sino">
<input type="<?= $Page->Day3Sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?= $Page->RowIndex ?>_Day3Sino" id="x<?= $Page->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3Sino->getPlaceHolder()) ?>" value="<?= $Page->Day3Sino->EditValue ?>"<?= $Page->Day3Sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day3Sino->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Sino" id="o<?= $Page->RowIndex ?>_Day3Sino" value="<?= HtmlEncode($Page->Day3Sino->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
        <td data-name="Day3CellNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3CellNo" class="form-group ivf_embryology_chart_Day3CellNo">
<input type="<?= $Page->Day3CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?= $Page->RowIndex ?>_Day3CellNo" id="x<?= $Page->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day3CellNo->EditValue ?>"<?= $Page->Day3CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day3CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3CellNo" id="o<?= $Page->RowIndex ?>_Day3CellNo" value="<?= HtmlEncode($Page->Day3CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
        <td data-name="Day3Frag">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Frag" class="form-group ivf_embryology_chart_Day3Frag">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Frag"
        name="x<?= $Page->RowIndex ?>_Day3Frag"
        class="form-control ew-select<?= $Page->Day3Frag->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Frag"
        data-value-separator="<?= $Page->Day3Frag->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Frag->getPlaceHolder()) ?>"
        <?= $Page->Day3Frag->editAttributes() ?>>
        <?= $Page->Day3Frag->selectOptionListHtml("x{$Page->RowIndex}_Day3Frag") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Frag->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Frag", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Frag" id="o<?= $Page->RowIndex ?>_Day3Frag" value="<?= HtmlEncode($Page->Day3Frag->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <td data-name="Day3Symmetry">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Symmetry" class="form-group ivf_embryology_chart_Day3Symmetry">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Symmetry"
        name="x<?= $Page->RowIndex ?>_Day3Symmetry"
        class="form-control ew-select<?= $Page->Day3Symmetry->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Symmetry"
        data-value-separator="<?= $Page->Day3Symmetry->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Symmetry->getPlaceHolder()) ?>"
        <?= $Page->Day3Symmetry->editAttributes() ?>>
        <?= $Page->Day3Symmetry->selectOptionListHtml("x{$Page->RowIndex}_Day3Symmetry") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Symmetry->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Symmetry", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Symmetry" id="o<?= $Page->RowIndex ?>_Day3Symmetry" value="<?= HtmlEncode($Page->Day3Symmetry->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
        <td data-name="Day3ZP">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3ZP" class="form-group ivf_embryology_chart_Day3ZP">
    <select
        id="x<?= $Page->RowIndex ?>_Day3ZP"
        name="x<?= $Page->RowIndex ?>_Day3ZP"
        class="form-control ew-select<?= $Page->Day3ZP->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP"
        data-table="ivf_embryology_chart"
        data-field="x_Day3ZP"
        data-value-separator="<?= $Page->Day3ZP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3ZP->getPlaceHolder()) ?>"
        <?= $Page->Day3ZP->editAttributes() ?>>
        <?= $Page->Day3ZP->selectOptionListHtml("x{$Page->RowIndex}_Day3ZP") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3ZP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3ZP", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3ZP" id="o<?= $Page->RowIndex ?>_Day3ZP" value="<?= HtmlEncode($Page->Day3ZP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <td data-name="Day3Vacoules">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Vacoules" class="form-group ivf_embryology_chart_Day3Vacoules">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Vacoules"
        name="x<?= $Page->RowIndex ?>_Day3Vacoules"
        class="form-control ew-select<?= $Page->Day3Vacoules->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Vacoules"
        data-value-separator="<?= $Page->Day3Vacoules->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Vacoules->getPlaceHolder()) ?>"
        <?= $Page->Day3Vacoules->editAttributes() ?>>
        <?= $Page->Day3Vacoules->selectOptionListHtml("x{$Page->RowIndex}_Day3Vacoules") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Vacoules->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Vacoules", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Vacoules" id="o<?= $Page->RowIndex ?>_Day3Vacoules" value="<?= HtmlEncode($Page->Day3Vacoules->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
        <td data-name="Day3Grade">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Grade" class="form-group ivf_embryology_chart_Day3Grade">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Grade"
        name="x<?= $Page->RowIndex ?>_Day3Grade"
        class="form-control ew-select<?= $Page->Day3Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Grade"
        data-value-separator="<?= $Page->Day3Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Grade->getPlaceHolder()) ?>"
        <?= $Page->Day3Grade->editAttributes() ?>>
        <?= $Page->Day3Grade->selectOptionListHtml("x{$Page->RowIndex}_Day3Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Grade" id="o<?= $Page->RowIndex ?>_Day3Grade" value="<?= HtmlEncode($Page->Day3Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <td data-name="Day3Cryoptop">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Cryoptop" class="form-group ivf_embryology_chart_Day3Cryoptop">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day3Cryoptop"
        class="form-control ew-select<?= $Page->Day3Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Cryoptop"
        data-value-separator="<?= $Page->Day3Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day3Cryoptop->editAttributes() ?>>
        <?= $Page->Day3Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day3Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Cryoptop" id="o<?= $Page->RowIndex ?>_Day3Cryoptop" value="<?= HtmlEncode($Page->Day3Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3End->Visible) { // Day3End ?>
        <td data-name="Day3End">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3End" class="form-group ivf_embryology_chart_Day3End">
    <select
        id="x<?= $Page->RowIndex ?>_Day3End"
        name="x<?= $Page->RowIndex ?>_Day3End"
        class="form-control ew-select<?= $Page->Day3End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End"
        data-table="ivf_embryology_chart"
        data-field="x_Day3End"
        data-value-separator="<?= $Page->Day3End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3End->getPlaceHolder()) ?>"
        <?= $Page->Day3End->editAttributes() ?>>
        <?= $Page->Day3End->selectOptionListHtml("x{$Page->RowIndex}_Day3End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3End" id="o<?= $Page->RowIndex ?>_Day3End" value="<?= HtmlEncode($Page->Day3End->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
        <td data-name="Day4SiNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4SiNo" class="form-group ivf_embryology_chart_Day4SiNo">
<input type="<?= $Page->Day4SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?= $Page->RowIndex ?>_Day4SiNo" id="x<?= $Page->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4SiNo->getPlaceHolder()) ?>" value="<?= $Page->Day4SiNo->EditValue ?>"<?= $Page->Day4SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4SiNo" id="o<?= $Page->RowIndex ?>_Day4SiNo" value="<?= HtmlEncode($Page->Day4SiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
        <td data-name="Day4CellNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4CellNo" class="form-group ivf_embryology_chart_Day4CellNo">
<input type="<?= $Page->Day4CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?= $Page->RowIndex ?>_Day4CellNo" id="x<?= $Page->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day4CellNo->EditValue ?>"<?= $Page->Day4CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4CellNo" id="o<?= $Page->RowIndex ?>_Day4CellNo" value="<?= HtmlEncode($Page->Day4CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
        <td data-name="Day4Frag">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Frag" class="form-group ivf_embryology_chart_Day4Frag">
<input type="<?= $Page->Day4Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?= $Page->RowIndex ?>_Day4Frag" id="x<?= $Page->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Frag->getPlaceHolder()) ?>" value="<?= $Page->Day4Frag->EditValue ?>"<?= $Page->Day4Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Frag->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Frag" id="o<?= $Page->RowIndex ?>_Day4Frag" value="<?= HtmlEncode($Page->Day4Frag->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <td data-name="Day4Symmetry">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Symmetry" class="form-group ivf_embryology_chart_Day4Symmetry">
<input type="<?= $Page->Day4Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?= $Page->RowIndex ?>_Day4Symmetry" id="x<?= $Page->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Symmetry->getPlaceHolder()) ?>" value="<?= $Page->Day4Symmetry->EditValue ?>"<?= $Page->Day4Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Symmetry->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Symmetry" id="o<?= $Page->RowIndex ?>_Day4Symmetry" value="<?= HtmlEncode($Page->Day4Symmetry->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
        <td data-name="Day4Grade">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Grade" class="form-group ivf_embryology_chart_Day4Grade">
<input type="<?= $Page->Day4Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?= $Page->RowIndex ?>_Day4Grade" id="x<?= $Page->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Grade->getPlaceHolder()) ?>" value="<?= $Page->Day4Grade->EditValue ?>"<?= $Page->Day4Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Grade->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Grade" id="o<?= $Page->RowIndex ?>_Day4Grade" value="<?= HtmlEncode($Page->Day4Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <td data-name="Day4Cryoptop">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Cryoptop" class="form-group ivf_embryology_chart_Day4Cryoptop">
    <select
        id="x<?= $Page->RowIndex ?>_Day4Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day4Cryoptop"
        class="form-control ew-select<?= $Page->Day4Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day4Cryoptop"
        data-value-separator="<?= $Page->Day4Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day4Cryoptop->editAttributes() ?>>
        <?= $Page->Day4Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day4Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day4Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day4Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Cryoptop" id="o<?= $Page->RowIndex ?>_Day4Cryoptop" value="<?= HtmlEncode($Page->Day4Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4End->Visible) { // Day4End ?>
        <td data-name="Day4End">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4End" class="form-group ivf_embryology_chart_Day4End">
    <select
        id="x<?= $Page->RowIndex ?>_Day4End"
        name="x<?= $Page->RowIndex ?>_Day4End"
        class="form-control ew-select<?= $Page->Day4End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End"
        data-table="ivf_embryology_chart"
        data-field="x_Day4End"
        data-value-separator="<?= $Page->Day4End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4End->getPlaceHolder()) ?>"
        <?= $Page->Day4End->editAttributes() ?>>
        <?= $Page->Day4End->selectOptionListHtml("x{$Page->RowIndex}_Day4End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day4End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day4End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4End" id="o<?= $Page->RowIndex ?>_Day4End" value="<?= HtmlEncode($Page->Day4End->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
        <td data-name="Day5CellNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5CellNo" class="form-group ivf_embryology_chart_Day5CellNo">
<input type="<?= $Page->Day5CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?= $Page->RowIndex ?>_Day5CellNo" id="x<?= $Page->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day5CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day5CellNo->EditValue ?>"<?= $Page->Day5CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day5CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5CellNo" id="o<?= $Page->RowIndex ?>_Day5CellNo" value="<?= HtmlEncode($Page->Day5CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
        <td data-name="Day5ICM">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5ICM" class="form-group ivf_embryology_chart_Day5ICM">
    <select
        id="x<?= $Page->RowIndex ?>_Day5ICM"
        name="x<?= $Page->RowIndex ?>_Day5ICM"
        class="form-control ew-select<?= $Page->Day5ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day5ICM"
        data-value-separator="<?= $Page->Day5ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5ICM->getPlaceHolder()) ?>"
        <?= $Page->Day5ICM->editAttributes() ?>>
        <?= $Page->Day5ICM->selectOptionListHtml("x{$Page->RowIndex}_Day5ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5ICM", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5ICM" id="o<?= $Page->RowIndex ?>_Day5ICM" value="<?= HtmlEncode($Page->Day5ICM->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5TE->Visible) { // Day5TE ?>
        <td data-name="Day5TE">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5TE" class="form-group ivf_embryology_chart_Day5TE">
    <select
        id="x<?= $Page->RowIndex ?>_Day5TE"
        name="x<?= $Page->RowIndex ?>_Day5TE"
        class="form-control ew-select<?= $Page->Day5TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day5TE"
        data-value-separator="<?= $Page->Day5TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5TE->getPlaceHolder()) ?>"
        <?= $Page->Day5TE->editAttributes() ?>>
        <?= $Page->Day5TE->selectOptionListHtml("x{$Page->RowIndex}_Day5TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5TE", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5TE" id="o<?= $Page->RowIndex ?>_Day5TE" value="<?= HtmlEncode($Page->Day5TE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
        <td data-name="Day5Observation">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Observation" class="form-group ivf_embryology_chart_Day5Observation">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Observation"
        name="x<?= $Page->RowIndex ?>_Day5Observation"
        class="form-control ew-select<?= $Page->Day5Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Observation"
        data-value-separator="<?= $Page->Day5Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Observation->getPlaceHolder()) ?>"
        <?= $Page->Day5Observation->editAttributes() ?>>
        <?= $Page->Day5Observation->selectOptionListHtml("x{$Page->RowIndex}_Day5Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Observation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Observation" id="o<?= $Page->RowIndex ?>_Day5Observation" value="<?= HtmlEncode($Page->Day5Observation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <td data-name="Day5Collapsed">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Collapsed" class="form-group ivf_embryology_chart_Day5Collapsed">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Collapsed"
        name="x<?= $Page->RowIndex ?>_Day5Collapsed"
        class="form-control ew-select<?= $Page->Day5Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Collapsed"
        data-value-separator="<?= $Page->Day5Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Collapsed->getPlaceHolder()) ?>"
        <?= $Page->Day5Collapsed->editAttributes() ?>>
        <?= $Page->Day5Collapsed->selectOptionListHtml("x{$Page->RowIndex}_Day5Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Collapsed", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Collapsed" id="o<?= $Page->RowIndex ?>_Day5Collapsed" value="<?= HtmlEncode($Page->Day5Collapsed->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <td data-name="Day5Vacoulles">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Vacoulles" class="form-group ivf_embryology_chart_Day5Vacoulles">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Vacoulles"
        name="x<?= $Page->RowIndex ?>_Day5Vacoulles"
        class="form-control ew-select<?= $Page->Day5Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Vacoulles"
        data-value-separator="<?= $Page->Day5Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Vacoulles->getPlaceHolder()) ?>"
        <?= $Page->Day5Vacoulles->editAttributes() ?>>
        <?= $Page->Day5Vacoulles->selectOptionListHtml("x{$Page->RowIndex}_Day5Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Vacoulles", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Vacoulles" id="o<?= $Page->RowIndex ?>_Day5Vacoulles" value="<?= HtmlEncode($Page->Day5Vacoulles->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
        <td data-name="Day5Grade">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Grade" class="form-group ivf_embryology_chart_Day5Grade">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Grade"
        name="x<?= $Page->RowIndex ?>_Day5Grade"
        class="form-control ew-select<?= $Page->Day5Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Grade"
        data-value-separator="<?= $Page->Day5Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Grade->getPlaceHolder()) ?>"
        <?= $Page->Day5Grade->editAttributes() ?>>
        <?= $Page->Day5Grade->selectOptionListHtml("x{$Page->RowIndex}_Day5Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Grade" id="o<?= $Page->RowIndex ?>_Day5Grade" value="<?= HtmlEncode($Page->Day5Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
        <td data-name="Day6CellNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6CellNo" class="form-group ivf_embryology_chart_Day6CellNo">
<input type="<?= $Page->Day6CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?= $Page->RowIndex ?>_Day6CellNo" id="x<?= $Page->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day6CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day6CellNo->EditValue ?>"<?= $Page->Day6CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day6CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6CellNo" id="o<?= $Page->RowIndex ?>_Day6CellNo" value="<?= HtmlEncode($Page->Day6CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
        <td data-name="Day6ICM">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6ICM" class="form-group ivf_embryology_chart_Day6ICM">
    <select
        id="x<?= $Page->RowIndex ?>_Day6ICM"
        name="x<?= $Page->RowIndex ?>_Day6ICM"
        class="form-control ew-select<?= $Page->Day6ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day6ICM"
        data-value-separator="<?= $Page->Day6ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6ICM->getPlaceHolder()) ?>"
        <?= $Page->Day6ICM->editAttributes() ?>>
        <?= $Page->Day6ICM->selectOptionListHtml("x{$Page->RowIndex}_Day6ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6ICM", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6ICM" id="o<?= $Page->RowIndex ?>_Day6ICM" value="<?= HtmlEncode($Page->Day6ICM->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6TE->Visible) { // Day6TE ?>
        <td data-name="Day6TE">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6TE" class="form-group ivf_embryology_chart_Day6TE">
    <select
        id="x<?= $Page->RowIndex ?>_Day6TE"
        name="x<?= $Page->RowIndex ?>_Day6TE"
        class="form-control ew-select<?= $Page->Day6TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day6TE"
        data-value-separator="<?= $Page->Day6TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6TE->getPlaceHolder()) ?>"
        <?= $Page->Day6TE->editAttributes() ?>>
        <?= $Page->Day6TE->selectOptionListHtml("x{$Page->RowIndex}_Day6TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6TE", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6TE" id="o<?= $Page->RowIndex ?>_Day6TE" value="<?= HtmlEncode($Page->Day6TE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
        <td data-name="Day6Observation">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Observation" class="form-group ivf_embryology_chart_Day6Observation">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Observation"
        name="x<?= $Page->RowIndex ?>_Day6Observation"
        class="form-control ew-select<?= $Page->Day6Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Observation"
        data-value-separator="<?= $Page->Day6Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Observation->getPlaceHolder()) ?>"
        <?= $Page->Day6Observation->editAttributes() ?>>
        <?= $Page->Day6Observation->selectOptionListHtml("x{$Page->RowIndex}_Day6Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Observation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Observation" id="o<?= $Page->RowIndex ?>_Day6Observation" value="<?= HtmlEncode($Page->Day6Observation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <td data-name="Day6Collapsed">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Collapsed" class="form-group ivf_embryology_chart_Day6Collapsed">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Collapsed"
        name="x<?= $Page->RowIndex ?>_Day6Collapsed"
        class="form-control ew-select<?= $Page->Day6Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Collapsed"
        data-value-separator="<?= $Page->Day6Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Collapsed->getPlaceHolder()) ?>"
        <?= $Page->Day6Collapsed->editAttributes() ?>>
        <?= $Page->Day6Collapsed->selectOptionListHtml("x{$Page->RowIndex}_Day6Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Collapsed", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Collapsed" id="o<?= $Page->RowIndex ?>_Day6Collapsed" value="<?= HtmlEncode($Page->Day6Collapsed->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <td data-name="Day6Vacoulles">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Vacoulles" class="form-group ivf_embryology_chart_Day6Vacoulles">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Vacoulles"
        name="x<?= $Page->RowIndex ?>_Day6Vacoulles"
        class="form-control ew-select<?= $Page->Day6Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Vacoulles"
        data-value-separator="<?= $Page->Day6Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Vacoulles->getPlaceHolder()) ?>"
        <?= $Page->Day6Vacoulles->editAttributes() ?>>
        <?= $Page->Day6Vacoulles->selectOptionListHtml("x{$Page->RowIndex}_Day6Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Vacoulles", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Vacoulles" id="o<?= $Page->RowIndex ?>_Day6Vacoulles" value="<?= HtmlEncode($Page->Day6Vacoulles->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
        <td data-name="Day6Grade">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Grade" class="form-group ivf_embryology_chart_Day6Grade">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Grade"
        name="x<?= $Page->RowIndex ?>_Day6Grade"
        class="form-control ew-select<?= $Page->Day6Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Grade"
        data-value-separator="<?= $Page->Day6Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Grade->getPlaceHolder()) ?>"
        <?= $Page->Day6Grade->editAttributes() ?>>
        <?= $Page->Day6Grade->selectOptionListHtml("x{$Page->RowIndex}_Day6Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Grade" id="o<?= $Page->RowIndex ?>_Day6Grade" value="<?= HtmlEncode($Page->Day6Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <td data-name="Day6Cryoptop">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Cryoptop" class="form-group ivf_embryology_chart_Day6Cryoptop">
<input type="<?= $Page->Day6Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?= $Page->RowIndex ?>_Day6Cryoptop" id="x<?= $Page->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day6Cryoptop->getPlaceHolder()) ?>" value="<?= $Page->Day6Cryoptop->EditValue ?>"<?= $Page->Day6Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day6Cryoptop->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Cryoptop" id="o<?= $Page->RowIndex ?>_Day6Cryoptop" value="<?= HtmlEncode($Page->Day6Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
        <td data-name="EndSiNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndSiNo" class="form-group ivf_embryology_chart_EndSiNo">
<input type="<?= $Page->EndSiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?= $Page->RowIndex ?>_EndSiNo" id="x<?= $Page->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->EndSiNo->getPlaceHolder()) ?>" value="<?= $Page->EndSiNo->EditValue ?>"<?= $Page->EndSiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EndSiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndSiNo" id="o<?= $Page->RowIndex ?>_EndSiNo" value="<?= HtmlEncode($Page->EndSiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EndingDay->Visible) { // EndingDay ?>
        <td data-name="EndingDay">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingDay" class="form-group ivf_embryology_chart_EndingDay">
    <select
        id="x<?= $Page->RowIndex ?>_EndingDay"
        name="x<?= $Page->RowIndex ?>_EndingDay"
        class="form-control ew-select<?= $Page->EndingDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay"
        data-table="ivf_embryology_chart"
        data-field="x_EndingDay"
        data-value-separator="<?= $Page->EndingDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingDay->getPlaceHolder()) ?>"
        <?= $Page->EndingDay->editAttributes() ?>>
        <?= $Page->EndingDay->selectOptionListHtml("x{$Page->RowIndex}_EndingDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingDay", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingDay" id="o<?= $Page->RowIndex ?>_EndingDay" value="<?= HtmlEncode($Page->EndingDay->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
        <td data-name="EndingCellStage">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingCellStage" class="form-group ivf_embryology_chart_EndingCellStage">
<input type="<?= $Page->EndingCellStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?= $Page->RowIndex ?>_EndingCellStage" id="x<?= $Page->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->EndingCellStage->getPlaceHolder()) ?>" value="<?= $Page->EndingCellStage->EditValue ?>"<?= $Page->EndingCellStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EndingCellStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingCellStage" id="o<?= $Page->RowIndex ?>_EndingCellStage" value="<?= HtmlEncode($Page->EndingCellStage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
        <td data-name="EndingGrade">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingGrade" class="form-group ivf_embryology_chart_EndingGrade">
    <select
        id="x<?= $Page->RowIndex ?>_EndingGrade"
        name="x<?= $Page->RowIndex ?>_EndingGrade"
        class="form-control ew-select<?= $Page->EndingGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade"
        data-table="ivf_embryology_chart"
        data-field="x_EndingGrade"
        data-value-separator="<?= $Page->EndingGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingGrade->getPlaceHolder()) ?>"
        <?= $Page->EndingGrade->editAttributes() ?>>
        <?= $Page->EndingGrade->selectOptionListHtml("x{$Page->RowIndex}_EndingGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingGrade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingGrade" id="o<?= $Page->RowIndex ?>_EndingGrade" value="<?= HtmlEncode($Page->EndingGrade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EndingState->Visible) { // EndingState ?>
        <td data-name="EndingState">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingState" class="form-group ivf_embryology_chart_EndingState">
    <select
        id="x<?= $Page->RowIndex ?>_EndingState"
        name="x<?= $Page->RowIndex ?>_EndingState"
        class="form-control ew-select<?= $Page->EndingState->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState"
        data-table="ivf_embryology_chart"
        data-field="x_EndingState"
        data-value-separator="<?= $Page->EndingState->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingState->getPlaceHolder()) ?>"
        <?= $Page->EndingState->editAttributes() ?>>
        <?= $Page->EndingState->selectOptionListHtml("x{$Page->RowIndex}_EndingState") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingState->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingState", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingState.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingState.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingState" id="o<?= $Page->RowIndex ?>_EndingState" value="<?= HtmlEncode($Page->EndingState->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo">
<?php if ($Page->TidNo->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_TidNo" name="x<?= $Page->RowIndex ?>_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x<?= $Page->RowIndex ?>_TidNo" id="x<?= $Page->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_TidNo" id="o<?= $Page->RowIndex ?>_TidNo" value="<?= HtmlEncode($Page->TidNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DidNO->Visible) { // DidNO ?>
        <td data-name="DidNO">
<?php if ($Page->DidNO->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<span<?= $Page->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DidNO->getDisplayValue($Page->DidNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_DidNO" name="x<?= $Page->RowIndex ?>_DidNO" value="<?= HtmlEncode($Page->DidNO->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<input type="<?= $Page->DidNO->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x<?= $Page->RowIndex ?>_DidNO" id="x<?= $Page->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DidNO->getPlaceHolder()) ?>" value="<?= $Page->DidNO->EditValue ?>"<?= $Page->DidNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DidNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_DidNO" id="o<?= $Page->RowIndex ?>_DidNO" value="<?= HtmlEncode($Page->DidNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <td data-name="ICSiIVFDateTime">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ICSiIVFDateTime" class="form-group ivf_embryology_chart_ICSiIVFDateTime">
<input type="<?= $Page->ICSiIVFDateTime->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?= $Page->RowIndex ?>_ICSiIVFDateTime" id="x<?= $Page->RowIndex ?>_ICSiIVFDateTime" placeholder="<?= HtmlEncode($Page->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?= $Page->ICSiIVFDateTime->EditValue ?>"<?= $Page->ICSiIVFDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ICSiIVFDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ICSiIVFDateTime->ReadOnly && !$Page->ICSiIVFDateTime->Disabled && !isset($Page->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($Page->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ICSiIVFDateTime" id="o<?= $Page->RowIndex ?>_ICSiIVFDateTime" value="<?= HtmlEncode($Page->ICSiIVFDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <td data-name="PrimaryEmbrologist">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_PrimaryEmbrologist" class="form-group ivf_embryology_chart_PrimaryEmbrologist">
<input type="<?= $Page->PrimaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?= $Page->RowIndex ?>_PrimaryEmbrologist" id="x<?= $Page->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbrologist->EditValue ?>"<?= $Page->PrimaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrimaryEmbrologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrimaryEmbrologist" id="o<?= $Page->RowIndex ?>_PrimaryEmbrologist" value="<?= HtmlEncode($Page->PrimaryEmbrologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <td data-name="SecondaryEmbrologist">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SecondaryEmbrologist" class="form-group ivf_embryology_chart_SecondaryEmbrologist">
<input type="<?= $Page->SecondaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?= $Page->RowIndex ?>_SecondaryEmbrologist" id="x<?= $Page->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbrologist->EditValue ?>"<?= $Page->SecondaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SecondaryEmbrologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_SecondaryEmbrologist" id="o<?= $Page->RowIndex ?>_SecondaryEmbrologist" value="<?= HtmlEncode($Page->SecondaryEmbrologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Incubator" class="form-group ivf_embryology_chart_Incubator">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?= $Page->RowIndex ?>_Incubator" id="x<?= $Page->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator" id="o<?= $Page->RowIndex ?>_Incubator" value="<?= HtmlEncode($Page->Incubator->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->location->Visible) { // location ?>
        <td data-name="location">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_location" class="form-group ivf_embryology_chart_location">
<input type="<?= $Page->location->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_location" name="x<?= $Page->RowIndex ?>_location" id="x<?= $Page->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->location->getPlaceHolder()) ?>" value="<?= $Page->location->EditValue ?>"<?= $Page->location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->location->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" data-hidden="1" name="o<?= $Page->RowIndex ?>_location" id="o<?= $Page->RowIndex ?>_location" value="<?= HtmlEncode($Page->location->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td data-name="OocyteNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_OocyteNo" class="form-group ivf_embryology_chart_OocyteNo">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?= $Page->RowIndex ?>_OocyteNo" id="x<?= $Page->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_OocyteNo" id="o<?= $Page->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Page->OocyteNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Stage" class="form-group ivf_embryology_chart_Stage">
    <select
        id="x<?= $Page->RowIndex ?>_Stage"
        name="x<?= $Page->RowIndex ?>_Stage"
        class="form-control ew-select<?= $Page->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage"
        data-table="ivf_embryology_chart"
        data-field="x_Stage"
        data-value-separator="<?= $Page->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>"
        <?= $Page->Stage->editAttributes() ?>>
        <?= $Page->Stage->selectOptionListHtml("x{$Page->RowIndex}_Stage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Stage", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stage" id="o<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Remarks" class="form-group ivf_embryology_chart_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?= $Page->RowIndex ?>_Remarks" id="x<?= $Page->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" data-hidden="1" name="o<?= $Page->RowIndex ?>_Remarks" id="o<?= $Page->RowIndex ?>_Remarks" value="<?= HtmlEncode($Page->Remarks->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitrificationDate" class="form-group ivf_embryology_chart_vitrificationDate">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?= $Page->RowIndex ?>_vitrificationDate" id="x<?= $Page->RowIndex ?>_vitrificationDate" size="12" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitrificationDate" id="o<?= $Page->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Page->vitrificationDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <td data-name="vitriPrimaryEmbryologist">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group ivf_embryology_chart_vitriPrimaryEmbryologist">
<input type="<?= $Page->vitriPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->vitriPrimaryEmbryologist->EditValue ?>"<?= $Page->vitriPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" id="o<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" value="<?= HtmlEncode($Page->vitriPrimaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <td data-name="vitriSecondaryEmbryologist">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group ivf_embryology_chart_vitriSecondaryEmbryologist">
<input type="<?= $Page->vitriSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->vitriSecondaryEmbryologist->EditValue ?>"<?= $Page->vitriSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" id="o<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" value="<?= HtmlEncode($Page->vitriSecondaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <td data-name="vitriEmbryoNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriEmbryoNo" class="form-group ivf_embryology_chart_vitriEmbryoNo">
<input type="<?= $Page->vitriEmbryoNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?= $Page->RowIndex ?>_vitriEmbryoNo" id="x<?= $Page->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->vitriEmbryoNo->EditValue ?>"<?= $Page->vitriEmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriEmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriEmbryoNo" id="o<?= $Page->RowIndex ?>_vitriEmbryoNo" value="<?= HtmlEncode($Page->vitriEmbryoNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <td data-name="thawReFrozen">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawReFrozen" class="form-group ivf_embryology_chart_thawReFrozen">
<template id="tp_x<?= $Page->RowIndex ?>_thawReFrozen">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="x<?= $Page->RowIndex ?>_thawReFrozen" id="x<?= $Page->RowIndex ?>_thawReFrozen"<?= $Page->thawReFrozen->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_thawReFrozen" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_thawReFrozen[]"
    name="x<?= $Page->RowIndex ?>_thawReFrozen[]"
    value="<?= HtmlEncode($Page->thawReFrozen->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_thawReFrozen"
    data-target="dsl_x<?= $Page->RowIndex ?>_thawReFrozen"
    data-repeatcolumn="5"
    class="form-control<?= $Page->thawReFrozen->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_thawReFrozen"
    data-value-separator="<?= $Page->thawReFrozen->displayValueSeparatorAttribute() ?>"
    <?= $Page->thawReFrozen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawReFrozen[]" id="o<?= $Page->RowIndex ?>_thawReFrozen[]" value="<?= HtmlEncode($Page->thawReFrozen->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <td data-name="vitriFertilisationDate">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriFertilisationDate" class="form-group ivf_embryology_chart_vitriFertilisationDate">
<input type="<?= $Page->vitriFertilisationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?= $Page->RowIndex ?>_vitriFertilisationDate" id="x<?= $Page->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?= HtmlEncode($Page->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->vitriFertilisationDate->EditValue ?>"<?= $Page->vitriFertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriFertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitriFertilisationDate->ReadOnly && !$Page->vitriFertilisationDate->Disabled && !isset($Page->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($Page->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriFertilisationDate" id="o<?= $Page->RowIndex ?>_vitriFertilisationDate" value="<?= HtmlEncode($Page->vitriFertilisationDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriDay->Visible) { // vitriDay ?>
        <td data-name="vitriDay">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriDay" class="form-group ivf_embryology_chart_vitriDay">
    <select
        id="x<?= $Page->RowIndex ?>_vitriDay"
        name="x<?= $Page->RowIndex ?>_vitriDay"
        class="form-control ew-select<?= $Page->vitriDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay"
        data-table="ivf_embryology_chart"
        data-field="x_vitriDay"
        data-value-separator="<?= $Page->vitriDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->vitriDay->getPlaceHolder()) ?>"
        <?= $Page->vitriDay->editAttributes() ?>>
        <?= $Page->vitriDay->selectOptionListHtml("x{$Page->RowIndex}_vitriDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->vitriDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay']"),
        options = { name: "x<?= $Page->RowIndex ?>_vitriDay", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriDay" id="o<?= $Page->RowIndex ?>_vitriDay" value="<?= HtmlEncode($Page->vitriDay->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriStage->Visible) { // vitriStage ?>
        <td data-name="vitriStage">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriStage" class="form-group ivf_embryology_chart_vitriStage">
<input type="<?= $Page->vitriStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?= $Page->RowIndex ?>_vitriStage" id="x<?= $Page->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriStage->getPlaceHolder()) ?>" value="<?= $Page->vitriStage->EditValue ?>"<?= $Page->vitriStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriStage" id="o<?= $Page->RowIndex ?>_vitriStage" value="<?= HtmlEncode($Page->vitriStage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
        <td data-name="vitriGrade">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGrade" class="form-group ivf_embryology_chart_vitriGrade">
    <select
        id="x<?= $Page->RowIndex ?>_vitriGrade"
        name="x<?= $Page->RowIndex ?>_vitriGrade"
        class="form-control ew-select<?= $Page->vitriGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade"
        data-table="ivf_embryology_chart"
        data-field="x_vitriGrade"
        data-value-separator="<?= $Page->vitriGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->vitriGrade->getPlaceHolder()) ?>"
        <?= $Page->vitriGrade->editAttributes() ?>>
        <?= $Page->vitriGrade->selectOptionListHtml("x{$Page->RowIndex}_vitriGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->vitriGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade']"),
        options = { name: "x<?= $Page->RowIndex ?>_vitriGrade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriGrade" id="o<?= $Page->RowIndex ?>_vitriGrade" value="<?= HtmlEncode($Page->vitriGrade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
        <td data-name="vitriIncubator">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriIncubator" class="form-group ivf_embryology_chart_vitriIncubator">
<input type="<?= $Page->vitriIncubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?= $Page->RowIndex ?>_vitriIncubator" id="x<?= $Page->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriIncubator->getPlaceHolder()) ?>" value="<?= $Page->vitriIncubator->EditValue ?>"<?= $Page->vitriIncubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriIncubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriIncubator" id="o<?= $Page->RowIndex ?>_vitriIncubator" value="<?= HtmlEncode($Page->vitriIncubator->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriTank->Visible) { // vitriTank ?>
        <td data-name="vitriTank">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriTank" class="form-group ivf_embryology_chart_vitriTank">
<input type="<?= $Page->vitriTank->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?= $Page->RowIndex ?>_vitriTank" id="x<?= $Page->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriTank->getPlaceHolder()) ?>" value="<?= $Page->vitriTank->EditValue ?>"<?= $Page->vitriTank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriTank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriTank" id="o<?= $Page->RowIndex ?>_vitriTank" value="<?= HtmlEncode($Page->vitriTank->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
        <td data-name="vitriCanister">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCanister" class="form-group ivf_embryology_chart_vitriCanister">
<input type="<?= $Page->vitriCanister->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?= $Page->RowIndex ?>_vitriCanister" id="x<?= $Page->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCanister->getPlaceHolder()) ?>" value="<?= $Page->vitriCanister->EditValue ?>"<?= $Page->vitriCanister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCanister->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriCanister" id="o<?= $Page->RowIndex ?>_vitriCanister" value="<?= HtmlEncode($Page->vitriCanister->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
        <td data-name="vitriGobiet">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGobiet" class="form-group ivf_embryology_chart_vitriGobiet">
<input type="<?= $Page->vitriGobiet->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?= $Page->RowIndex ?>_vitriGobiet" id="x<?= $Page->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriGobiet->getPlaceHolder()) ?>" value="<?= $Page->vitriGobiet->EditValue ?>"<?= $Page->vitriGobiet->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriGobiet->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriGobiet" id="o<?= $Page->RowIndex ?>_vitriGobiet" value="<?= HtmlEncode($Page->vitriGobiet->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
        <td data-name="vitriViscotube">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriViscotube" class="form-group ivf_embryology_chart_vitriViscotube">
<input type="<?= $Page->vitriViscotube->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?= $Page->RowIndex ?>_vitriViscotube" id="x<?= $Page->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriViscotube->getPlaceHolder()) ?>" value="<?= $Page->vitriViscotube->EditValue ?>"<?= $Page->vitriViscotube->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriViscotube->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriViscotube" id="o<?= $Page->RowIndex ?>_vitriViscotube" value="<?= HtmlEncode($Page->vitriViscotube->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <td data-name="vitriCryolockNo">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockNo" class="form-group ivf_embryology_chart_vitriCryolockNo">
<input type="<?= $Page->vitriCryolockNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?= $Page->RowIndex ?>_vitriCryolockNo" id="x<?= $Page->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCryolockNo->getPlaceHolder()) ?>" value="<?= $Page->vitriCryolockNo->EditValue ?>"<?= $Page->vitriCryolockNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCryolockNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriCryolockNo" id="o<?= $Page->RowIndex ?>_vitriCryolockNo" value="<?= HtmlEncode($Page->vitriCryolockNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <td data-name="vitriCryolockColour">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockColour" class="form-group ivf_embryology_chart_vitriCryolockColour">
<input type="<?= $Page->vitriCryolockColour->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?= $Page->RowIndex ?>_vitriCryolockColour" id="x<?= $Page->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCryolockColour->getPlaceHolder()) ?>" value="<?= $Page->vitriCryolockColour->EditValue ?>"<?= $Page->vitriCryolockColour->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCryolockColour->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriCryolockColour" id="o<?= $Page->RowIndex ?>_vitriCryolockColour" value="<?= HtmlEncode($Page->vitriCryolockColour->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawDate->Visible) { // thawDate ?>
        <td data-name="thawDate">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDate" class="form-group ivf_embryology_chart_thawDate">
<input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?= $Page->RowIndex ?>_thawDate" id="x<?= $Page->RowIndex ?>_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
<?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawDate" id="o<?= $Page->RowIndex ?>_thawDate" value="<?= HtmlEncode($Page->thawDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td data-name="thawPrimaryEmbryologist">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group ivf_embryology_chart_thawPrimaryEmbryologist">
<input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="o<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" value="<?= HtmlEncode($Page->thawPrimaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td data-name="thawSecondaryEmbryologist">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group ivf_embryology_chart_thawSecondaryEmbryologist">
<input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="o<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" value="<?= HtmlEncode($Page->thawSecondaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawET->Visible) { // thawET ?>
        <td data-name="thawET">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawET" class="form-group ivf_embryology_chart_thawET">
    <select
        id="x<?= $Page->RowIndex ?>_thawET"
        name="x<?= $Page->RowIndex ?>_thawET"
        class="form-control ew-select<?= $Page->thawET->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET"
        data-table="ivf_embryology_chart"
        data-field="x_thawET"
        data-value-separator="<?= $Page->thawET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->thawET->getPlaceHolder()) ?>"
        <?= $Page->thawET->editAttributes() ?>>
        <?= $Page->thawET->selectOptionListHtml("x{$Page->RowIndex}_thawET") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->thawET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET']"),
        options = { name: "x<?= $Page->RowIndex ?>_thawET", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.thawET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.thawET.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawET" id="o<?= $Page->RowIndex ?>_thawET" value="<?= HtmlEncode($Page->thawET->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <td data-name="thawAbserve">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawAbserve" class="form-group ivf_embryology_chart_thawAbserve">
<input type="<?= $Page->thawAbserve->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?= $Page->RowIndex ?>_thawAbserve" id="x<?= $Page->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawAbserve->getPlaceHolder()) ?>" value="<?= $Page->thawAbserve->EditValue ?>"<?= $Page->thawAbserve->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawAbserve->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawAbserve" id="o<?= $Page->RowIndex ?>_thawAbserve" value="<?= HtmlEncode($Page->thawAbserve->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <td data-name="thawDiscard">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDiscard" class="form-group ivf_embryology_chart_thawDiscard">
<input type="<?= $Page->thawDiscard->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?= $Page->RowIndex ?>_thawDiscard" id="x<?= $Page->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawDiscard->getPlaceHolder()) ?>" value="<?= $Page->thawDiscard->EditValue ?>"<?= $Page->thawDiscard->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDiscard->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawDiscard" id="o<?= $Page->RowIndex ?>_thawDiscard" value="<?= HtmlEncode($Page->thawDiscard->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
        <td data-name="ETCatheter">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETCatheter" class="form-group ivf_embryology_chart_ETCatheter">
<input type="<?= $Page->ETCatheter->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?= $Page->RowIndex ?>_ETCatheter" id="x<?= $Page->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->ETCatheter->getPlaceHolder()) ?>" value="<?= $Page->ETCatheter->EditValue ?>"<?= $Page->ETCatheter->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETCatheter->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETCatheter" id="o<?= $Page->RowIndex ?>_ETCatheter" value="<?= HtmlEncode($Page->ETCatheter->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
        <td data-name="ETDifficulty">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDifficulty" class="form-group ivf_embryology_chart_ETDifficulty">
    <select
        id="x<?= $Page->RowIndex ?>_ETDifficulty"
        name="x<?= $Page->RowIndex ?>_ETDifficulty"
        class="form-control ew-select<?= $Page->ETDifficulty->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty"
        data-table="ivf_embryology_chart"
        data-field="x_ETDifficulty"
        data-value-separator="<?= $Page->ETDifficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ETDifficulty->getPlaceHolder()) ?>"
        <?= $Page->ETDifficulty->editAttributes() ?>>
        <?= $Page->ETDifficulty->selectOptionListHtml("x{$Page->RowIndex}_ETDifficulty") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ETDifficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty']"),
        options = { name: "x<?= $Page->RowIndex ?>_ETDifficulty", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETDifficulty" id="o<?= $Page->RowIndex ?>_ETDifficulty" value="<?= HtmlEncode($Page->ETDifficulty->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETEasy->Visible) { // ETEasy ?>
        <td data-name="ETEasy">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEasy" class="form-group ivf_embryology_chart_ETEasy">
<template id="tp_x<?= $Page->RowIndex ?>_ETEasy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="x<?= $Page->RowIndex ?>_ETEasy" id="x<?= $Page->RowIndex ?>_ETEasy"<?= $Page->ETEasy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_ETEasy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_ETEasy[]"
    name="x<?= $Page->RowIndex ?>_ETEasy[]"
    value="<?= HtmlEncode($Page->ETEasy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_ETEasy"
    data-target="dsl_x<?= $Page->RowIndex ?>_ETEasy"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ETEasy->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_ETEasy"
    data-value-separator="<?= $Page->ETEasy->displayValueSeparatorAttribute() ?>"
    <?= $Page->ETEasy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETEasy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETEasy[]" id="o<?= $Page->RowIndex ?>_ETEasy[]" value="<?= HtmlEncode($Page->ETEasy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETComments->Visible) { // ETComments ?>
        <td data-name="ETComments">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETComments" class="form-group ivf_embryology_chart_ETComments">
<input type="<?= $Page->ETComments->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?= $Page->RowIndex ?>_ETComments" id="x<?= $Page->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETComments->getPlaceHolder()) ?>" value="<?= $Page->ETComments->EditValue ?>"<?= $Page->ETComments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETComments->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETComments" id="o<?= $Page->RowIndex ?>_ETComments" value="<?= HtmlEncode($Page->ETComments->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
        <td data-name="ETDoctor">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDoctor" class="form-group ivf_embryology_chart_ETDoctor">
<input type="<?= $Page->ETDoctor->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?= $Page->RowIndex ?>_ETDoctor" id="x<?= $Page->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETDoctor->getPlaceHolder()) ?>" value="<?= $Page->ETDoctor->EditValue ?>"<?= $Page->ETDoctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETDoctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETDoctor" id="o<?= $Page->RowIndex ?>_ETDoctor" value="<?= HtmlEncode($Page->ETDoctor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <td data-name="ETEmbryologist">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEmbryologist" class="form-group ivf_embryology_chart_ETEmbryologist">
<input type="<?= $Page->ETEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?= $Page->RowIndex ?>_ETEmbryologist" id="x<?= $Page->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->ETEmbryologist->EditValue ?>"<?= $Page->ETEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETEmbryologist" id="o<?= $Page->RowIndex ?>_ETEmbryologist" value="<?= HtmlEncode($Page->ETEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETDate->Visible) { // ETDate ?>
        <td data-name="ETDate">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDate" class="form-group ivf_embryology_chart_ETDate">
<input type="<?= $Page->ETDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?= $Page->RowIndex ?>_ETDate" id="x<?= $Page->RowIndex ?>_ETDate" placeholder="<?= HtmlEncode($Page->ETDate->getPlaceHolder()) ?>" value="<?= $Page->ETDate->EditValue ?>"<?= $Page->ETDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETDate->getErrorMessage() ?></div>
<?php if (!$Page->ETDate->ReadOnly && !$Page->ETDate->Disabled && !isset($Page->ETDate->EditAttrs["readonly"]) && !isset($Page->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETDate" id="o<?= $Page->RowIndex ?>_ETDate" value="<?= HtmlEncode($Page->ETDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1End->Visible) { // Day1End ?>
        <td data-name="Day1End">
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1End" class="form-group ivf_embryology_chart_Day1End">
    <select
        id="x<?= $Page->RowIndex ?>_Day1End"
        name="x<?= $Page->RowIndex ?>_Day1End"
        class="form-control ew-select<?= $Page->Day1End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End"
        data-table="ivf_embryology_chart"
        data-field="x_Day1End"
        data-value-separator="<?= $Page->Day1End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1End->getPlaceHolder()) ?>"
        <?= $Page->Day1End->editAttributes() ?>>
        <?= $Page->Day1End->selectOptionListHtml("x{$Page->RowIndex}_Day1End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1End" id="o<?= $Page->RowIndex ?>_Day1End" value="<?= HtmlEncode($Page->Day1End->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
<script>
loadjs.ready(["fivf_embryology_chartlist","load"], function() {
    fivf_embryology_chartlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}

// Restore number of post back records
if ($CurrentForm && ($Page->isConfirm() || $Page->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Page->FormKeyCountName) && ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm())) {
        $Page->KeyCount = $CurrentForm->getValue($Page->FormKeyCountName);
        $Page->StopRecord = $Page->StartRecord + $Page->KeyCount - 1;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
$Page->EditRowCount = 0;
if ($Page->isEdit())
    $Page->RowIndex = 1;
if ($Page->isGridAdd())
    $Page->RowIndex = 0;
if ($Page->isGridEdit())
    $Page->RowIndex = 0;
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;
        if ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm()) {
            $Page->RowIndex++;
            $CurrentForm->Index = $Page->RowIndex;
            if ($CurrentForm->hasValue($Page->FormActionName) && ($Page->isConfirm() || $Page->EventCancelled)) {
                $Page->RowAction = strval($CurrentForm->getValue($Page->FormActionName));
            } elseif ($Page->isGridAdd()) {
                $Page->RowAction = "insert";
            } else {
                $Page->RowAction = "";
            }
        }

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view
        if ($Page->isGridAdd()) { // Grid add
            $Page->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Page->isGridAdd() && $Page->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->isEdit()) {
            if ($Page->checkInlineEditKey() && $Page->EditRowCount == 0) { // Inline edit
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Page->isGridEdit()) { // Grid edit
            if ($Page->EventCancelled) {
                $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
            }
            if ($Page->RowAction == "insert") {
                $Page->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Page->isEdit() && $Page->RowType == ROWTYPE_EDIT && $Page->EventCancelled) { // Update failed
            $CurrentForm->Index = 1;
            $Page->restoreFormValues(); // Restore form values
        }
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_embryology_chart", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Page->RowAction != "delete" && $Page->RowAction != "insertdelete" && !($Page->RowAction == "insert" && $Page->isConfirm() && $Page->emptyRow())) {
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_id" class="form-group"></span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->RIDNo->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_RIDNo" class="form-group">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNo->getDisplayValue($Page->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_RIDNo" name="x<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_RIDNo" class="form-group">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x<?= $Page->RowIndex ?>_RIDNo" id="x<?= $Page->RowIndex ?>_RIDNo" size="4" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_RIDNo" id="o<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_RIDNo" class="form-group">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNo->getDisplayValue($Page->RIDNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="x<?= $Page->RowIndex ?>_RIDNo" id="x<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->Name->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Name" class="form-group">
<span<?= $Page->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Name->getDisplayValue($Page->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Name" name="x<?= $Page->RowIndex ?>_Name" value="<?= HtmlEncode($Page->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Name" class="form-group">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Name" name="x<?= $Page->RowIndex ?>_Name" id="x<?= $Page->RowIndex ?>_Name" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Name" id="o<?= $Page->RowIndex ?>_Name" value="<?= HtmlEncode($Page->Name->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Name" class="form-group">
<span<?= $Page->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Name->getDisplayValue($Page->Name->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" data-hidden="1" name="x<?= $Page->RowIndex ?>_Name" id="x<?= $Page->RowIndex ?>_Name" value="<?= HtmlEncode($Page->Name->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ARTCycle" class="form-group">
<input type="<?= $Page->ARTCycle->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x<?= $Page->RowIndex ?>_ARTCycle" id="x<?= $Page->RowIndex ?>_ARTCycle" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>" value="<?= $Page->ARTCycle->EditValue ?>"<?= $Page->ARTCycle->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" data-hidden="1" name="o<?= $Page->RowIndex ?>_ARTCycle" id="o<?= $Page->RowIndex ?>_ARTCycle" value="<?= HtmlEncode($Page->ARTCycle->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ARTCycle" class="form-group">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ARTCycle->getDisplayValue($Page->ARTCycle->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" data-hidden="1" name="x<?= $Page->RowIndex ?>_ARTCycle" id="x<?= $Page->RowIndex ?>_ARTCycle" value="<?= HtmlEncode($Page->ARTCycle->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
        <td data-name="SpermOrigin" <?= $Page->SpermOrigin->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SpermOrigin" class="form-group">
<input type="<?= $Page->SpermOrigin->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?= $Page->RowIndex ?>_SpermOrigin" id="x<?= $Page->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SpermOrigin->getPlaceHolder()) ?>" value="<?= $Page->SpermOrigin->EditValue ?>"<?= $Page->SpermOrigin->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SpermOrigin->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" data-hidden="1" name="o<?= $Page->RowIndex ?>_SpermOrigin" id="o<?= $Page->RowIndex ?>_SpermOrigin" value="<?= HtmlEncode($Page->SpermOrigin->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SpermOrigin" class="form-group">
<input type="<?= $Page->SpermOrigin->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?= $Page->RowIndex ?>_SpermOrigin" id="x<?= $Page->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SpermOrigin->getPlaceHolder()) ?>" value="<?= $Page->SpermOrigin->EditValue ?>"<?= $Page->SpermOrigin->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SpermOrigin->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SpermOrigin">
<span<?= $Page->SpermOrigin->viewAttributes() ?>>
<?= $Page->SpermOrigin->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_InseminatinTechnique" class="form-group">
<input type="<?= $Page->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?= $Page->RowIndex ?>_InseminatinTechnique" id="x<?= $Page->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Page->InseminatinTechnique->EditValue ?>"<?= $Page->InseminatinTechnique->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->InseminatinTechnique->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" data-hidden="1" name="o<?= $Page->RowIndex ?>_InseminatinTechnique" id="o<?= $Page->RowIndex ?>_InseminatinTechnique" value="<?= HtmlEncode($Page->InseminatinTechnique->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_InseminatinTechnique" class="form-group">
<input type="<?= $Page->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?= $Page->RowIndex ?>_InseminatinTechnique" id="x<?= $Page->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Page->InseminatinTechnique->EditValue ?>"<?= $Page->InseminatinTechnique->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->InseminatinTechnique->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <td data-name="IndicationForART" <?= $Page->IndicationForART->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_IndicationForART" class="form-group">
<input type="<?= $Page->IndicationForART->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?= $Page->RowIndex ?>_IndicationForART" id="x<?= $Page->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->IndicationForART->getPlaceHolder()) ?>" value="<?= $Page->IndicationForART->EditValue ?>"<?= $Page->IndicationForART->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IndicationForART->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" data-hidden="1" name="o<?= $Page->RowIndex ?>_IndicationForART" id="o<?= $Page->RowIndex ?>_IndicationForART" value="<?= HtmlEncode($Page->IndicationForART->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_IndicationForART" class="form-group">
<input type="<?= $Page->IndicationForART->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?= $Page->RowIndex ?>_IndicationForART" id="x<?= $Page->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->IndicationForART->getPlaceHolder()) ?>" value="<?= $Page->IndicationForART->EditValue ?>"<?= $Page->IndicationForART->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IndicationForART->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <td data-name="Day0sino" <?= $Page->Day0sino->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0sino" class="form-group">
<input type="<?= $Page->Day0sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?= $Page->RowIndex ?>_Day0sino" id="x<?= $Page->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0sino->getPlaceHolder()) ?>" value="<?= $Page->Day0sino->EditValue ?>"<?= $Page->Day0sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0sino->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0sino" id="o<?= $Page->RowIndex ?>_Day0sino" value="<?= HtmlEncode($Page->Day0sino->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0sino" class="form-group">
<input type="<?= $Page->Day0sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?= $Page->RowIndex ?>_Day0sino" id="x<?= $Page->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0sino->getPlaceHolder()) ?>" value="<?= $Page->Day0sino->EditValue ?>"<?= $Page->Day0sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0sino->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0sino">
<span<?= $Page->Day0sino->viewAttributes() ?>>
<?= $Page->Day0sino->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td data-name="Day0OocyteStage" <?= $Page->Day0OocyteStage->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0OocyteStage" class="form-group">
<input type="<?= $Page->Day0OocyteStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?= $Page->RowIndex ?>_Day0OocyteStage" id="x<?= $Page->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Page->Day0OocyteStage->EditValue ?>"<?= $Page->Day0OocyteStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0OocyteStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0OocyteStage" id="o<?= $Page->RowIndex ?>_Day0OocyteStage" value="<?= HtmlEncode($Page->Day0OocyteStage->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0OocyteStage" class="form-group">
<input type="<?= $Page->Day0OocyteStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?= $Page->RowIndex ?>_Day0OocyteStage" id="x<?= $Page->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Page->Day0OocyteStage->EditValue ?>"<?= $Page->Day0OocyteStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0OocyteStage->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0OocyteStage">
<span<?= $Page->Day0OocyteStage->viewAttributes() ?>>
<?= $Page->Day0OocyteStage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <td data-name="Day0PolarBodyPosition" <?= $Page->Day0PolarBodyPosition->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        name="x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        class="form-control ew-select<?= $Page->Day0PolarBodyPosition->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        data-table="ivf_embryology_chart"
        data-field="x_Day0PolarBodyPosition"
        data-value-separator="<?= $Page->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0PolarBodyPosition->getPlaceHolder()) ?>"
        <?= $Page->Day0PolarBodyPosition->editAttributes() ?>>
        <?= $Page->Day0PolarBodyPosition->selectOptionListHtml("x{$Page->RowIndex}_Day0PolarBodyPosition") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0PolarBodyPosition->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0PolarBodyPosition", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0PolarBodyPosition" id="o<?= $Page->RowIndex ?>_Day0PolarBodyPosition" value="<?= HtmlEncode($Page->Day0PolarBodyPosition->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        name="x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        class="form-control ew-select<?= $Page->Day0PolarBodyPosition->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        data-table="ivf_embryology_chart"
        data-field="x_Day0PolarBodyPosition"
        data-value-separator="<?= $Page->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0PolarBodyPosition->getPlaceHolder()) ?>"
        <?= $Page->Day0PolarBodyPosition->editAttributes() ?>>
        <?= $Page->Day0PolarBodyPosition->selectOptionListHtml("x{$Page->RowIndex}_Day0PolarBodyPosition") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0PolarBodyPosition->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0PolarBodyPosition", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0PolarBodyPosition">
<span<?= $Page->Day0PolarBodyPosition->viewAttributes() ?>>
<?= $Page->Day0PolarBodyPosition->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
        <td data-name="Day0Breakage" <?= $Page->Day0Breakage->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Breakage" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0Breakage"
        name="x<?= $Page->RowIndex ?>_Day0Breakage"
        class="form-control ew-select<?= $Page->Day0Breakage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Breakage"
        data-value-separator="<?= $Page->Day0Breakage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0Breakage->getPlaceHolder()) ?>"
        <?= $Page->Day0Breakage->editAttributes() ?>>
        <?= $Page->Day0Breakage->selectOptionListHtml("x{$Page->RowIndex}_Day0Breakage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0Breakage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0Breakage", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0Breakage" id="o<?= $Page->RowIndex ?>_Day0Breakage" value="<?= HtmlEncode($Page->Day0Breakage->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Breakage" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0Breakage"
        name="x<?= $Page->RowIndex ?>_Day0Breakage"
        class="form-control ew-select<?= $Page->Day0Breakage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Breakage"
        data-value-separator="<?= $Page->Day0Breakage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0Breakage->getPlaceHolder()) ?>"
        <?= $Page->Day0Breakage->editAttributes() ?>>
        <?= $Page->Day0Breakage->selectOptionListHtml("x{$Page->RowIndex}_Day0Breakage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0Breakage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0Breakage", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Breakage">
<span<?= $Page->Day0Breakage->viewAttributes() ?>>
<?= $Page->Day0Breakage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
        <td data-name="Day0Attempts" <?= $Page->Day0Attempts->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Attempts" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0Attempts"
        name="x<?= $Page->RowIndex ?>_Day0Attempts"
        class="form-control ew-select<?= $Page->Day0Attempts->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Attempts"
        data-value-separator="<?= $Page->Day0Attempts->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0Attempts->getPlaceHolder()) ?>"
        <?= $Page->Day0Attempts->editAttributes() ?>>
        <?= $Page->Day0Attempts->selectOptionListHtml("x{$Page->RowIndex}_Day0Attempts") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0Attempts->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0Attempts", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0Attempts" id="o<?= $Page->RowIndex ?>_Day0Attempts" value="<?= HtmlEncode($Page->Day0Attempts->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Attempts" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0Attempts"
        name="x<?= $Page->RowIndex ?>_Day0Attempts"
        class="form-control ew-select<?= $Page->Day0Attempts->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Attempts"
        data-value-separator="<?= $Page->Day0Attempts->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0Attempts->getPlaceHolder()) ?>"
        <?= $Page->Day0Attempts->editAttributes() ?>>
        <?= $Page->Day0Attempts->selectOptionListHtml("x{$Page->RowIndex}_Day0Attempts") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0Attempts->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0Attempts", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Attempts">
<span<?= $Page->Day0Attempts->viewAttributes() ?>>
<?= $Page->Day0Attempts->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <td data-name="Day0SPZMorpho" <?= $Page->Day0SPZMorpho->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZMorpho" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        name="x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        class="form-control ew-select<?= $Page->Day0SPZMorpho->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZMorpho"
        data-value-separator="<?= $Page->Day0SPZMorpho->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SPZMorpho->getPlaceHolder()) ?>"
        <?= $Page->Day0SPZMorpho->editAttributes() ?>>
        <?= $Page->Day0SPZMorpho->selectOptionListHtml("x{$Page->RowIndex}_Day0SPZMorpho") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SPZMorpho->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SPZMorpho", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0SPZMorpho" id="o<?= $Page->RowIndex ?>_Day0SPZMorpho" value="<?= HtmlEncode($Page->Day0SPZMorpho->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZMorpho" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        name="x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        class="form-control ew-select<?= $Page->Day0SPZMorpho->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZMorpho"
        data-value-separator="<?= $Page->Day0SPZMorpho->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SPZMorpho->getPlaceHolder()) ?>"
        <?= $Page->Day0SPZMorpho->editAttributes() ?>>
        <?= $Page->Day0SPZMorpho->selectOptionListHtml("x{$Page->RowIndex}_Day0SPZMorpho") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SPZMorpho->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SPZMorpho", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZMorpho">
<span<?= $Page->Day0SPZMorpho->viewAttributes() ?>>
<?= $Page->Day0SPZMorpho->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <td data-name="Day0SPZLocation" <?= $Page->Day0SPZLocation->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZLocation" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SPZLocation"
        name="x<?= $Page->RowIndex ?>_Day0SPZLocation"
        class="form-control ew-select<?= $Page->Day0SPZLocation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZLocation"
        data-value-separator="<?= $Page->Day0SPZLocation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SPZLocation->getPlaceHolder()) ?>"
        <?= $Page->Day0SPZLocation->editAttributes() ?>>
        <?= $Page->Day0SPZLocation->selectOptionListHtml("x{$Page->RowIndex}_Day0SPZLocation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SPZLocation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SPZLocation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0SPZLocation" id="o<?= $Page->RowIndex ?>_Day0SPZLocation" value="<?= HtmlEncode($Page->Day0SPZLocation->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZLocation" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SPZLocation"
        name="x<?= $Page->RowIndex ?>_Day0SPZLocation"
        class="form-control ew-select<?= $Page->Day0SPZLocation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZLocation"
        data-value-separator="<?= $Page->Day0SPZLocation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SPZLocation->getPlaceHolder()) ?>"
        <?= $Page->Day0SPZLocation->editAttributes() ?>>
        <?= $Page->Day0SPZLocation->selectOptionListHtml("x{$Page->RowIndex}_Day0SPZLocation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SPZLocation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SPZLocation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZLocation">
<span<?= $Page->Day0SPZLocation->viewAttributes() ?>>
<?= $Page->Day0SPZLocation->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <td data-name="Day0SpOrgin" <?= $Page->Day0SpOrgin->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SpOrgin" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SpOrgin"
        name="x<?= $Page->RowIndex ?>_Day0SpOrgin"
        class="form-control ew-select<?= $Page->Day0SpOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SpOrgin"
        data-value-separator="<?= $Page->Day0SpOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SpOrgin->getPlaceHolder()) ?>"
        <?= $Page->Day0SpOrgin->editAttributes() ?>>
        <?= $Page->Day0SpOrgin->selectOptionListHtml("x{$Page->RowIndex}_Day0SpOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SpOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SpOrgin", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0SpOrgin" id="o<?= $Page->RowIndex ?>_Day0SpOrgin" value="<?= HtmlEncode($Page->Day0SpOrgin->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SpOrgin" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SpOrgin"
        name="x<?= $Page->RowIndex ?>_Day0SpOrgin"
        class="form-control ew-select<?= $Page->Day0SpOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SpOrgin"
        data-value-separator="<?= $Page->Day0SpOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SpOrgin->getPlaceHolder()) ?>"
        <?= $Page->Day0SpOrgin->editAttributes() ?>>
        <?= $Page->Day0SpOrgin->selectOptionListHtml("x{$Page->RowIndex}_Day0SpOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SpOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SpOrgin", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SpOrgin">
<span<?= $Page->Day0SpOrgin->viewAttributes() ?>>
<?= $Page->Day0SpOrgin->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <td data-name="Day5Cryoptop" <?= $Page->Day5Cryoptop->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Cryoptop" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day5Cryoptop"
        class="form-control ew-select<?= $Page->Day5Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Cryoptop"
        data-value-separator="<?= $Page->Day5Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day5Cryoptop->editAttributes() ?>>
        <?= $Page->Day5Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day5Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Cryoptop" id="o<?= $Page->RowIndex ?>_Day5Cryoptop" value="<?= HtmlEncode($Page->Day5Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Cryoptop" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day5Cryoptop"
        class="form-control ew-select<?= $Page->Day5Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Cryoptop"
        data-value-separator="<?= $Page->Day5Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day5Cryoptop->editAttributes() ?>>
        <?= $Page->Day5Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day5Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Cryoptop">
<span<?= $Page->Day5Cryoptop->viewAttributes() ?>>
<?= $Page->Day5Cryoptop->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
        <td data-name="Day1Sperm" <?= $Page->Day1Sperm->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Sperm" class="form-group">
<input type="<?= $Page->Day1Sperm->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?= $Page->RowIndex ?>_Day1Sperm" id="x<?= $Page->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day1Sperm->getPlaceHolder()) ?>" value="<?= $Page->Day1Sperm->EditValue ?>"<?= $Page->Day1Sperm->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day1Sperm->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Sperm" id="o<?= $Page->RowIndex ?>_Day1Sperm" value="<?= HtmlEncode($Page->Day1Sperm->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Sperm" class="form-group">
<input type="<?= $Page->Day1Sperm->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?= $Page->RowIndex ?>_Day1Sperm" id="x<?= $Page->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day1Sperm->getPlaceHolder()) ?>" value="<?= $Page->Day1Sperm->EditValue ?>"<?= $Page->Day1Sperm->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day1Sperm->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Sperm">
<span<?= $Page->Day1Sperm->viewAttributes() ?>>
<?= $Page->Day1Sperm->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day1PN->Visible) { // Day1PN ?>
        <td data-name="Day1PN" <?= $Page->Day1PN->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PN" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1PN"
        name="x<?= $Page->RowIndex ?>_Day1PN"
        class="form-control ew-select<?= $Page->Day1PN->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PN"
        data-value-separator="<?= $Page->Day1PN->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1PN->getPlaceHolder()) ?>"
        <?= $Page->Day1PN->editAttributes() ?>>
        <?= $Page->Day1PN->selectOptionListHtml("x{$Page->RowIndex}_Day1PN") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1PN->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1PN", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PN.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PN.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1PN" id="o<?= $Page->RowIndex ?>_Day1PN" value="<?= HtmlEncode($Page->Day1PN->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PN" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1PN"
        name="x<?= $Page->RowIndex ?>_Day1PN"
        class="form-control ew-select<?= $Page->Day1PN->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PN"
        data-value-separator="<?= $Page->Day1PN->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1PN->getPlaceHolder()) ?>"
        <?= $Page->Day1PN->editAttributes() ?>>
        <?= $Page->Day1PN->selectOptionListHtml("x{$Page->RowIndex}_Day1PN") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1PN->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1PN", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PN.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PN.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PN">
<span<?= $Page->Day1PN->viewAttributes() ?>>
<?= $Page->Day1PN->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day1PB->Visible) { // Day1PB ?>
        <td data-name="Day1PB" <?= $Page->Day1PB->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PB" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1PB"
        name="x<?= $Page->RowIndex ?>_Day1PB"
        class="form-control ew-select<?= $Page->Day1PB->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PB"
        data-value-separator="<?= $Page->Day1PB->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1PB->getPlaceHolder()) ?>"
        <?= $Page->Day1PB->editAttributes() ?>>
        <?= $Page->Day1PB->selectOptionListHtml("x{$Page->RowIndex}_Day1PB") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1PB->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1PB", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PB.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PB.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1PB" id="o<?= $Page->RowIndex ?>_Day1PB" value="<?= HtmlEncode($Page->Day1PB->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PB" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1PB"
        name="x<?= $Page->RowIndex ?>_Day1PB"
        class="form-control ew-select<?= $Page->Day1PB->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PB"
        data-value-separator="<?= $Page->Day1PB->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1PB->getPlaceHolder()) ?>"
        <?= $Page->Day1PB->editAttributes() ?>>
        <?= $Page->Day1PB->selectOptionListHtml("x{$Page->RowIndex}_Day1PB") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1PB->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1PB", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PB.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PB.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PB">
<span<?= $Page->Day1PB->viewAttributes() ?>>
<?= $Page->Day1PB->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <td data-name="Day1Pronucleus" <?= $Page->Day1Pronucleus->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Pronucleus" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Pronucleus"
        name="x<?= $Page->RowIndex ?>_Day1Pronucleus"
        class="form-control ew-select<?= $Page->Day1Pronucleus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Pronucleus"
        data-value-separator="<?= $Page->Day1Pronucleus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Pronucleus->getPlaceHolder()) ?>"
        <?= $Page->Day1Pronucleus->editAttributes() ?>>
        <?= $Page->Day1Pronucleus->selectOptionListHtml("x{$Page->RowIndex}_Day1Pronucleus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Pronucleus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Pronucleus", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Pronucleus" id="o<?= $Page->RowIndex ?>_Day1Pronucleus" value="<?= HtmlEncode($Page->Day1Pronucleus->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Pronucleus" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Pronucleus"
        name="x<?= $Page->RowIndex ?>_Day1Pronucleus"
        class="form-control ew-select<?= $Page->Day1Pronucleus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Pronucleus"
        data-value-separator="<?= $Page->Day1Pronucleus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Pronucleus->getPlaceHolder()) ?>"
        <?= $Page->Day1Pronucleus->editAttributes() ?>>
        <?= $Page->Day1Pronucleus->selectOptionListHtml("x{$Page->RowIndex}_Day1Pronucleus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Pronucleus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Pronucleus", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Pronucleus">
<span<?= $Page->Day1Pronucleus->viewAttributes() ?>>
<?= $Page->Day1Pronucleus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <td data-name="Day1Nucleolus" <?= $Page->Day1Nucleolus->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Nucleolus" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Nucleolus"
        name="x<?= $Page->RowIndex ?>_Day1Nucleolus"
        class="form-control ew-select<?= $Page->Day1Nucleolus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Nucleolus"
        data-value-separator="<?= $Page->Day1Nucleolus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Nucleolus->getPlaceHolder()) ?>"
        <?= $Page->Day1Nucleolus->editAttributes() ?>>
        <?= $Page->Day1Nucleolus->selectOptionListHtml("x{$Page->RowIndex}_Day1Nucleolus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Nucleolus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Nucleolus", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Nucleolus" id="o<?= $Page->RowIndex ?>_Day1Nucleolus" value="<?= HtmlEncode($Page->Day1Nucleolus->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Nucleolus" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Nucleolus"
        name="x<?= $Page->RowIndex ?>_Day1Nucleolus"
        class="form-control ew-select<?= $Page->Day1Nucleolus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Nucleolus"
        data-value-separator="<?= $Page->Day1Nucleolus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Nucleolus->getPlaceHolder()) ?>"
        <?= $Page->Day1Nucleolus->editAttributes() ?>>
        <?= $Page->Day1Nucleolus->selectOptionListHtml("x{$Page->RowIndex}_Day1Nucleolus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Nucleolus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Nucleolus", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Nucleolus">
<span<?= $Page->Day1Nucleolus->viewAttributes() ?>>
<?= $Page->Day1Nucleolus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
        <td data-name="Day1Halo" <?= $Page->Day1Halo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Halo" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Halo"
        name="x<?= $Page->RowIndex ?>_Day1Halo"
        class="form-control ew-select<?= $Page->Day1Halo->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Halo"
        data-value-separator="<?= $Page->Day1Halo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Halo->getPlaceHolder()) ?>"
        <?= $Page->Day1Halo->editAttributes() ?>>
        <?= $Page->Day1Halo->selectOptionListHtml("x{$Page->RowIndex}_Day1Halo") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Halo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Halo", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Halo" id="o<?= $Page->RowIndex ?>_Day1Halo" value="<?= HtmlEncode($Page->Day1Halo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Halo" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Halo"
        name="x<?= $Page->RowIndex ?>_Day1Halo"
        class="form-control ew-select<?= $Page->Day1Halo->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Halo"
        data-value-separator="<?= $Page->Day1Halo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Halo->getPlaceHolder()) ?>"
        <?= $Page->Day1Halo->editAttributes() ?>>
        <?= $Page->Day1Halo->selectOptionListHtml("x{$Page->RowIndex}_Day1Halo") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Halo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Halo", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Halo">
<span<?= $Page->Day1Halo->viewAttributes() ?>>
<?= $Page->Day1Halo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
        <td data-name="Day2SiNo" <?= $Page->Day2SiNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2SiNo" class="form-group">
<input type="<?= $Page->Day2SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?= $Page->RowIndex ?>_Day2SiNo" id="x<?= $Page->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2SiNo->getPlaceHolder()) ?>" value="<?= $Page->Day2SiNo->EditValue ?>"<?= $Page->Day2SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2SiNo" id="o<?= $Page->RowIndex ?>_Day2SiNo" value="<?= HtmlEncode($Page->Day2SiNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2SiNo" class="form-group">
<input type="<?= $Page->Day2SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?= $Page->RowIndex ?>_Day2SiNo" id="x<?= $Page->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2SiNo->getPlaceHolder()) ?>" value="<?= $Page->Day2SiNo->EditValue ?>"<?= $Page->Day2SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2SiNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2SiNo">
<span<?= $Page->Day2SiNo->viewAttributes() ?>>
<?= $Page->Day2SiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
        <td data-name="Day2CellNo" <?= $Page->Day2CellNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2CellNo" class="form-group">
<input type="<?= $Page->Day2CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?= $Page->RowIndex ?>_Day2CellNo" id="x<?= $Page->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day2CellNo->EditValue ?>"<?= $Page->Day2CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2CellNo" id="o<?= $Page->RowIndex ?>_Day2CellNo" value="<?= HtmlEncode($Page->Day2CellNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2CellNo" class="form-group">
<input type="<?= $Page->Day2CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?= $Page->RowIndex ?>_Day2CellNo" id="x<?= $Page->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day2CellNo->EditValue ?>"<?= $Page->Day2CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2CellNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2CellNo">
<span<?= $Page->Day2CellNo->viewAttributes() ?>>
<?= $Page->Day2CellNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
        <td data-name="Day2Frag" <?= $Page->Day2Frag->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Frag" class="form-group">
<input type="<?= $Page->Day2Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?= $Page->RowIndex ?>_Day2Frag" id="x<?= $Page->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Frag->getPlaceHolder()) ?>" value="<?= $Page->Day2Frag->EditValue ?>"<?= $Page->Day2Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Frag->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Frag" id="o<?= $Page->RowIndex ?>_Day2Frag" value="<?= HtmlEncode($Page->Day2Frag->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Frag" class="form-group">
<input type="<?= $Page->Day2Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?= $Page->RowIndex ?>_Day2Frag" id="x<?= $Page->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Frag->getPlaceHolder()) ?>" value="<?= $Page->Day2Frag->EditValue ?>"<?= $Page->Day2Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Frag->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Frag">
<span<?= $Page->Day2Frag->viewAttributes() ?>>
<?= $Page->Day2Frag->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <td data-name="Day2Symmetry" <?= $Page->Day2Symmetry->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Symmetry" class="form-group">
<input type="<?= $Page->Day2Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?= $Page->RowIndex ?>_Day2Symmetry" id="x<?= $Page->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Symmetry->getPlaceHolder()) ?>" value="<?= $Page->Day2Symmetry->EditValue ?>"<?= $Page->Day2Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Symmetry->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Symmetry" id="o<?= $Page->RowIndex ?>_Day2Symmetry" value="<?= HtmlEncode($Page->Day2Symmetry->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Symmetry" class="form-group">
<input type="<?= $Page->Day2Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?= $Page->RowIndex ?>_Day2Symmetry" id="x<?= $Page->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Symmetry->getPlaceHolder()) ?>" value="<?= $Page->Day2Symmetry->EditValue ?>"<?= $Page->Day2Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Symmetry->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Symmetry">
<span<?= $Page->Day2Symmetry->viewAttributes() ?>>
<?= $Page->Day2Symmetry->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <td data-name="Day2Cryoptop" <?= $Page->Day2Cryoptop->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Cryoptop" class="form-group">
<input type="<?= $Page->Day2Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?= $Page->RowIndex ?>_Day2Cryoptop" id="x<?= $Page->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Cryoptop->getPlaceHolder()) ?>" value="<?= $Page->Day2Cryoptop->EditValue ?>"<?= $Page->Day2Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Cryoptop->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Cryoptop" id="o<?= $Page->RowIndex ?>_Day2Cryoptop" value="<?= HtmlEncode($Page->Day2Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Cryoptop" class="form-group">
<input type="<?= $Page->Day2Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?= $Page->RowIndex ?>_Day2Cryoptop" id="x<?= $Page->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Cryoptop->getPlaceHolder()) ?>" value="<?= $Page->Day2Cryoptop->EditValue ?>"<?= $Page->Day2Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Cryoptop->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Cryoptop">
<span<?= $Page->Day2Cryoptop->viewAttributes() ?>>
<?= $Page->Day2Cryoptop->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
        <td data-name="Day2Grade" <?= $Page->Day2Grade->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Grade" class="form-group">
<input type="<?= $Page->Day2Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?= $Page->RowIndex ?>_Day2Grade" id="x<?= $Page->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Grade->getPlaceHolder()) ?>" value="<?= $Page->Day2Grade->EditValue ?>"<?= $Page->Day2Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Grade->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Grade" id="o<?= $Page->RowIndex ?>_Day2Grade" value="<?= HtmlEncode($Page->Day2Grade->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Grade" class="form-group">
<input type="<?= $Page->Day2Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?= $Page->RowIndex ?>_Day2Grade" id="x<?= $Page->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Grade->getPlaceHolder()) ?>" value="<?= $Page->Day2Grade->EditValue ?>"<?= $Page->Day2Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Grade->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Grade">
<span<?= $Page->Day2Grade->viewAttributes() ?>>
<?= $Page->Day2Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day2End->Visible) { // Day2End ?>
        <td data-name="Day2End" <?= $Page->Day2End->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2End" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day2End"
        name="x<?= $Page->RowIndex ?>_Day2End"
        class="form-control ew-select<?= $Page->Day2End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End"
        data-table="ivf_embryology_chart"
        data-field="x_Day2End"
        data-value-separator="<?= $Page->Day2End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day2End->getPlaceHolder()) ?>"
        <?= $Page->Day2End->editAttributes() ?>>
        <?= $Page->Day2End->selectOptionListHtml("x{$Page->RowIndex}_Day2End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day2End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day2End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day2End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day2End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2End" id="o<?= $Page->RowIndex ?>_Day2End" value="<?= HtmlEncode($Page->Day2End->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2End" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day2End"
        name="x<?= $Page->RowIndex ?>_Day2End"
        class="form-control ew-select<?= $Page->Day2End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End"
        data-table="ivf_embryology_chart"
        data-field="x_Day2End"
        data-value-separator="<?= $Page->Day2End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day2End->getPlaceHolder()) ?>"
        <?= $Page->Day2End->editAttributes() ?>>
        <?= $Page->Day2End->selectOptionListHtml("x{$Page->RowIndex}_Day2End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day2End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day2End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day2End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day2End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2End">
<span<?= $Page->Day2End->viewAttributes() ?>>
<?= $Page->Day2End->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
        <td data-name="Day3Sino" <?= $Page->Day3Sino->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Sino" class="form-group">
<input type="<?= $Page->Day3Sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?= $Page->RowIndex ?>_Day3Sino" id="x<?= $Page->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3Sino->getPlaceHolder()) ?>" value="<?= $Page->Day3Sino->EditValue ?>"<?= $Page->Day3Sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day3Sino->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Sino" id="o<?= $Page->RowIndex ?>_Day3Sino" value="<?= HtmlEncode($Page->Day3Sino->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Sino" class="form-group">
<input type="<?= $Page->Day3Sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?= $Page->RowIndex ?>_Day3Sino" id="x<?= $Page->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3Sino->getPlaceHolder()) ?>" value="<?= $Page->Day3Sino->EditValue ?>"<?= $Page->Day3Sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day3Sino->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Sino">
<span<?= $Page->Day3Sino->viewAttributes() ?>>
<?= $Page->Day3Sino->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
        <td data-name="Day3CellNo" <?= $Page->Day3CellNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3CellNo" class="form-group">
<input type="<?= $Page->Day3CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?= $Page->RowIndex ?>_Day3CellNo" id="x<?= $Page->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day3CellNo->EditValue ?>"<?= $Page->Day3CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day3CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3CellNo" id="o<?= $Page->RowIndex ?>_Day3CellNo" value="<?= HtmlEncode($Page->Day3CellNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3CellNo" class="form-group">
<input type="<?= $Page->Day3CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?= $Page->RowIndex ?>_Day3CellNo" id="x<?= $Page->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day3CellNo->EditValue ?>"<?= $Page->Day3CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day3CellNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3CellNo">
<span<?= $Page->Day3CellNo->viewAttributes() ?>>
<?= $Page->Day3CellNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
        <td data-name="Day3Frag" <?= $Page->Day3Frag->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Frag" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Frag"
        name="x<?= $Page->RowIndex ?>_Day3Frag"
        class="form-control ew-select<?= $Page->Day3Frag->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Frag"
        data-value-separator="<?= $Page->Day3Frag->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Frag->getPlaceHolder()) ?>"
        <?= $Page->Day3Frag->editAttributes() ?>>
        <?= $Page->Day3Frag->selectOptionListHtml("x{$Page->RowIndex}_Day3Frag") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Frag->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Frag", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Frag" id="o<?= $Page->RowIndex ?>_Day3Frag" value="<?= HtmlEncode($Page->Day3Frag->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Frag" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Frag"
        name="x<?= $Page->RowIndex ?>_Day3Frag"
        class="form-control ew-select<?= $Page->Day3Frag->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Frag"
        data-value-separator="<?= $Page->Day3Frag->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Frag->getPlaceHolder()) ?>"
        <?= $Page->Day3Frag->editAttributes() ?>>
        <?= $Page->Day3Frag->selectOptionListHtml("x{$Page->RowIndex}_Day3Frag") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Frag->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Frag", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Frag">
<span<?= $Page->Day3Frag->viewAttributes() ?>>
<?= $Page->Day3Frag->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <td data-name="Day3Symmetry" <?= $Page->Day3Symmetry->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Symmetry" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Symmetry"
        name="x<?= $Page->RowIndex ?>_Day3Symmetry"
        class="form-control ew-select<?= $Page->Day3Symmetry->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Symmetry"
        data-value-separator="<?= $Page->Day3Symmetry->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Symmetry->getPlaceHolder()) ?>"
        <?= $Page->Day3Symmetry->editAttributes() ?>>
        <?= $Page->Day3Symmetry->selectOptionListHtml("x{$Page->RowIndex}_Day3Symmetry") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Symmetry->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Symmetry", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Symmetry" id="o<?= $Page->RowIndex ?>_Day3Symmetry" value="<?= HtmlEncode($Page->Day3Symmetry->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Symmetry" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Symmetry"
        name="x<?= $Page->RowIndex ?>_Day3Symmetry"
        class="form-control ew-select<?= $Page->Day3Symmetry->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Symmetry"
        data-value-separator="<?= $Page->Day3Symmetry->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Symmetry->getPlaceHolder()) ?>"
        <?= $Page->Day3Symmetry->editAttributes() ?>>
        <?= $Page->Day3Symmetry->selectOptionListHtml("x{$Page->RowIndex}_Day3Symmetry") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Symmetry->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Symmetry", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Symmetry">
<span<?= $Page->Day3Symmetry->viewAttributes() ?>>
<?= $Page->Day3Symmetry->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
        <td data-name="Day3ZP" <?= $Page->Day3ZP->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3ZP" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3ZP"
        name="x<?= $Page->RowIndex ?>_Day3ZP"
        class="form-control ew-select<?= $Page->Day3ZP->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP"
        data-table="ivf_embryology_chart"
        data-field="x_Day3ZP"
        data-value-separator="<?= $Page->Day3ZP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3ZP->getPlaceHolder()) ?>"
        <?= $Page->Day3ZP->editAttributes() ?>>
        <?= $Page->Day3ZP->selectOptionListHtml("x{$Page->RowIndex}_Day3ZP") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3ZP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3ZP", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3ZP" id="o<?= $Page->RowIndex ?>_Day3ZP" value="<?= HtmlEncode($Page->Day3ZP->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3ZP" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3ZP"
        name="x<?= $Page->RowIndex ?>_Day3ZP"
        class="form-control ew-select<?= $Page->Day3ZP->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP"
        data-table="ivf_embryology_chart"
        data-field="x_Day3ZP"
        data-value-separator="<?= $Page->Day3ZP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3ZP->getPlaceHolder()) ?>"
        <?= $Page->Day3ZP->editAttributes() ?>>
        <?= $Page->Day3ZP->selectOptionListHtml("x{$Page->RowIndex}_Day3ZP") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3ZP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3ZP", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3ZP">
<span<?= $Page->Day3ZP->viewAttributes() ?>>
<?= $Page->Day3ZP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <td data-name="Day3Vacoules" <?= $Page->Day3Vacoules->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Vacoules" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Vacoules"
        name="x<?= $Page->RowIndex ?>_Day3Vacoules"
        class="form-control ew-select<?= $Page->Day3Vacoules->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Vacoules"
        data-value-separator="<?= $Page->Day3Vacoules->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Vacoules->getPlaceHolder()) ?>"
        <?= $Page->Day3Vacoules->editAttributes() ?>>
        <?= $Page->Day3Vacoules->selectOptionListHtml("x{$Page->RowIndex}_Day3Vacoules") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Vacoules->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Vacoules", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Vacoules" id="o<?= $Page->RowIndex ?>_Day3Vacoules" value="<?= HtmlEncode($Page->Day3Vacoules->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Vacoules" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Vacoules"
        name="x<?= $Page->RowIndex ?>_Day3Vacoules"
        class="form-control ew-select<?= $Page->Day3Vacoules->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Vacoules"
        data-value-separator="<?= $Page->Day3Vacoules->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Vacoules->getPlaceHolder()) ?>"
        <?= $Page->Day3Vacoules->editAttributes() ?>>
        <?= $Page->Day3Vacoules->selectOptionListHtml("x{$Page->RowIndex}_Day3Vacoules") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Vacoules->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Vacoules", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Vacoules">
<span<?= $Page->Day3Vacoules->viewAttributes() ?>>
<?= $Page->Day3Vacoules->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
        <td data-name="Day3Grade" <?= $Page->Day3Grade->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Grade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Grade"
        name="x<?= $Page->RowIndex ?>_Day3Grade"
        class="form-control ew-select<?= $Page->Day3Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Grade"
        data-value-separator="<?= $Page->Day3Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Grade->getPlaceHolder()) ?>"
        <?= $Page->Day3Grade->editAttributes() ?>>
        <?= $Page->Day3Grade->selectOptionListHtml("x{$Page->RowIndex}_Day3Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Grade" id="o<?= $Page->RowIndex ?>_Day3Grade" value="<?= HtmlEncode($Page->Day3Grade->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Grade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Grade"
        name="x<?= $Page->RowIndex ?>_Day3Grade"
        class="form-control ew-select<?= $Page->Day3Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Grade"
        data-value-separator="<?= $Page->Day3Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Grade->getPlaceHolder()) ?>"
        <?= $Page->Day3Grade->editAttributes() ?>>
        <?= $Page->Day3Grade->selectOptionListHtml("x{$Page->RowIndex}_Day3Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Grade">
<span<?= $Page->Day3Grade->viewAttributes() ?>>
<?= $Page->Day3Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <td data-name="Day3Cryoptop" <?= $Page->Day3Cryoptop->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Cryoptop" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day3Cryoptop"
        class="form-control ew-select<?= $Page->Day3Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Cryoptop"
        data-value-separator="<?= $Page->Day3Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day3Cryoptop->editAttributes() ?>>
        <?= $Page->Day3Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day3Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Cryoptop" id="o<?= $Page->RowIndex ?>_Day3Cryoptop" value="<?= HtmlEncode($Page->Day3Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Cryoptop" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day3Cryoptop"
        class="form-control ew-select<?= $Page->Day3Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Cryoptop"
        data-value-separator="<?= $Page->Day3Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day3Cryoptop->editAttributes() ?>>
        <?= $Page->Day3Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day3Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Cryoptop">
<span<?= $Page->Day3Cryoptop->viewAttributes() ?>>
<?= $Page->Day3Cryoptop->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day3End->Visible) { // Day3End ?>
        <td data-name="Day3End" <?= $Page->Day3End->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3End" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3End"
        name="x<?= $Page->RowIndex ?>_Day3End"
        class="form-control ew-select<?= $Page->Day3End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End"
        data-table="ivf_embryology_chart"
        data-field="x_Day3End"
        data-value-separator="<?= $Page->Day3End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3End->getPlaceHolder()) ?>"
        <?= $Page->Day3End->editAttributes() ?>>
        <?= $Page->Day3End->selectOptionListHtml("x{$Page->RowIndex}_Day3End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3End" id="o<?= $Page->RowIndex ?>_Day3End" value="<?= HtmlEncode($Page->Day3End->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3End" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day3End"
        name="x<?= $Page->RowIndex ?>_Day3End"
        class="form-control ew-select<?= $Page->Day3End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End"
        data-table="ivf_embryology_chart"
        data-field="x_Day3End"
        data-value-separator="<?= $Page->Day3End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3End->getPlaceHolder()) ?>"
        <?= $Page->Day3End->editAttributes() ?>>
        <?= $Page->Day3End->selectOptionListHtml("x{$Page->RowIndex}_Day3End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3End">
<span<?= $Page->Day3End->viewAttributes() ?>>
<?= $Page->Day3End->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
        <td data-name="Day4SiNo" <?= $Page->Day4SiNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4SiNo" class="form-group">
<input type="<?= $Page->Day4SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?= $Page->RowIndex ?>_Day4SiNo" id="x<?= $Page->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4SiNo->getPlaceHolder()) ?>" value="<?= $Page->Day4SiNo->EditValue ?>"<?= $Page->Day4SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4SiNo" id="o<?= $Page->RowIndex ?>_Day4SiNo" value="<?= HtmlEncode($Page->Day4SiNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4SiNo" class="form-group">
<input type="<?= $Page->Day4SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?= $Page->RowIndex ?>_Day4SiNo" id="x<?= $Page->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4SiNo->getPlaceHolder()) ?>" value="<?= $Page->Day4SiNo->EditValue ?>"<?= $Page->Day4SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4SiNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4SiNo">
<span<?= $Page->Day4SiNo->viewAttributes() ?>>
<?= $Page->Day4SiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
        <td data-name="Day4CellNo" <?= $Page->Day4CellNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4CellNo" class="form-group">
<input type="<?= $Page->Day4CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?= $Page->RowIndex ?>_Day4CellNo" id="x<?= $Page->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day4CellNo->EditValue ?>"<?= $Page->Day4CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4CellNo" id="o<?= $Page->RowIndex ?>_Day4CellNo" value="<?= HtmlEncode($Page->Day4CellNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4CellNo" class="form-group">
<input type="<?= $Page->Day4CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?= $Page->RowIndex ?>_Day4CellNo" id="x<?= $Page->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day4CellNo->EditValue ?>"<?= $Page->Day4CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4CellNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4CellNo">
<span<?= $Page->Day4CellNo->viewAttributes() ?>>
<?= $Page->Day4CellNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
        <td data-name="Day4Frag" <?= $Page->Day4Frag->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Frag" class="form-group">
<input type="<?= $Page->Day4Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?= $Page->RowIndex ?>_Day4Frag" id="x<?= $Page->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Frag->getPlaceHolder()) ?>" value="<?= $Page->Day4Frag->EditValue ?>"<?= $Page->Day4Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Frag->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Frag" id="o<?= $Page->RowIndex ?>_Day4Frag" value="<?= HtmlEncode($Page->Day4Frag->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Frag" class="form-group">
<input type="<?= $Page->Day4Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?= $Page->RowIndex ?>_Day4Frag" id="x<?= $Page->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Frag->getPlaceHolder()) ?>" value="<?= $Page->Day4Frag->EditValue ?>"<?= $Page->Day4Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Frag->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Frag">
<span<?= $Page->Day4Frag->viewAttributes() ?>>
<?= $Page->Day4Frag->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <td data-name="Day4Symmetry" <?= $Page->Day4Symmetry->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Symmetry" class="form-group">
<input type="<?= $Page->Day4Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?= $Page->RowIndex ?>_Day4Symmetry" id="x<?= $Page->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Symmetry->getPlaceHolder()) ?>" value="<?= $Page->Day4Symmetry->EditValue ?>"<?= $Page->Day4Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Symmetry->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Symmetry" id="o<?= $Page->RowIndex ?>_Day4Symmetry" value="<?= HtmlEncode($Page->Day4Symmetry->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Symmetry" class="form-group">
<input type="<?= $Page->Day4Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?= $Page->RowIndex ?>_Day4Symmetry" id="x<?= $Page->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Symmetry->getPlaceHolder()) ?>" value="<?= $Page->Day4Symmetry->EditValue ?>"<?= $Page->Day4Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Symmetry->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Symmetry">
<span<?= $Page->Day4Symmetry->viewAttributes() ?>>
<?= $Page->Day4Symmetry->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
        <td data-name="Day4Grade" <?= $Page->Day4Grade->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Grade" class="form-group">
<input type="<?= $Page->Day4Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?= $Page->RowIndex ?>_Day4Grade" id="x<?= $Page->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Grade->getPlaceHolder()) ?>" value="<?= $Page->Day4Grade->EditValue ?>"<?= $Page->Day4Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Grade->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Grade" id="o<?= $Page->RowIndex ?>_Day4Grade" value="<?= HtmlEncode($Page->Day4Grade->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Grade" class="form-group">
<input type="<?= $Page->Day4Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?= $Page->RowIndex ?>_Day4Grade" id="x<?= $Page->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Grade->getPlaceHolder()) ?>" value="<?= $Page->Day4Grade->EditValue ?>"<?= $Page->Day4Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Grade->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Grade">
<span<?= $Page->Day4Grade->viewAttributes() ?>>
<?= $Page->Day4Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <td data-name="Day4Cryoptop" <?= $Page->Day4Cryoptop->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Cryoptop" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day4Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day4Cryoptop"
        class="form-control ew-select<?= $Page->Day4Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day4Cryoptop"
        data-value-separator="<?= $Page->Day4Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day4Cryoptop->editAttributes() ?>>
        <?= $Page->Day4Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day4Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day4Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day4Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Cryoptop" id="o<?= $Page->RowIndex ?>_Day4Cryoptop" value="<?= HtmlEncode($Page->Day4Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Cryoptop" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day4Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day4Cryoptop"
        class="form-control ew-select<?= $Page->Day4Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day4Cryoptop"
        data-value-separator="<?= $Page->Day4Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day4Cryoptop->editAttributes() ?>>
        <?= $Page->Day4Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day4Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day4Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day4Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Cryoptop">
<span<?= $Page->Day4Cryoptop->viewAttributes() ?>>
<?= $Page->Day4Cryoptop->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day4End->Visible) { // Day4End ?>
        <td data-name="Day4End" <?= $Page->Day4End->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4End" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day4End"
        name="x<?= $Page->RowIndex ?>_Day4End"
        class="form-control ew-select<?= $Page->Day4End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End"
        data-table="ivf_embryology_chart"
        data-field="x_Day4End"
        data-value-separator="<?= $Page->Day4End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4End->getPlaceHolder()) ?>"
        <?= $Page->Day4End->editAttributes() ?>>
        <?= $Page->Day4End->selectOptionListHtml("x{$Page->RowIndex}_Day4End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day4End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day4End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4End" id="o<?= $Page->RowIndex ?>_Day4End" value="<?= HtmlEncode($Page->Day4End->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4End" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day4End"
        name="x<?= $Page->RowIndex ?>_Day4End"
        class="form-control ew-select<?= $Page->Day4End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End"
        data-table="ivf_embryology_chart"
        data-field="x_Day4End"
        data-value-separator="<?= $Page->Day4End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4End->getPlaceHolder()) ?>"
        <?= $Page->Day4End->editAttributes() ?>>
        <?= $Page->Day4End->selectOptionListHtml("x{$Page->RowIndex}_Day4End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day4End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day4End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4End">
<span<?= $Page->Day4End->viewAttributes() ?>>
<?= $Page->Day4End->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
        <td data-name="Day5CellNo" <?= $Page->Day5CellNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5CellNo" class="form-group">
<input type="<?= $Page->Day5CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?= $Page->RowIndex ?>_Day5CellNo" id="x<?= $Page->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day5CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day5CellNo->EditValue ?>"<?= $Page->Day5CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day5CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5CellNo" id="o<?= $Page->RowIndex ?>_Day5CellNo" value="<?= HtmlEncode($Page->Day5CellNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5CellNo" class="form-group">
<input type="<?= $Page->Day5CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?= $Page->RowIndex ?>_Day5CellNo" id="x<?= $Page->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day5CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day5CellNo->EditValue ?>"<?= $Page->Day5CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day5CellNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5CellNo">
<span<?= $Page->Day5CellNo->viewAttributes() ?>>
<?= $Page->Day5CellNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
        <td data-name="Day5ICM" <?= $Page->Day5ICM->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5ICM" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5ICM"
        name="x<?= $Page->RowIndex ?>_Day5ICM"
        class="form-control ew-select<?= $Page->Day5ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day5ICM"
        data-value-separator="<?= $Page->Day5ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5ICM->getPlaceHolder()) ?>"
        <?= $Page->Day5ICM->editAttributes() ?>>
        <?= $Page->Day5ICM->selectOptionListHtml("x{$Page->RowIndex}_Day5ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5ICM", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5ICM" id="o<?= $Page->RowIndex ?>_Day5ICM" value="<?= HtmlEncode($Page->Day5ICM->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5ICM" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5ICM"
        name="x<?= $Page->RowIndex ?>_Day5ICM"
        class="form-control ew-select<?= $Page->Day5ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day5ICM"
        data-value-separator="<?= $Page->Day5ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5ICM->getPlaceHolder()) ?>"
        <?= $Page->Day5ICM->editAttributes() ?>>
        <?= $Page->Day5ICM->selectOptionListHtml("x{$Page->RowIndex}_Day5ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5ICM", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5ICM">
<span<?= $Page->Day5ICM->viewAttributes() ?>>
<?= $Page->Day5ICM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day5TE->Visible) { // Day5TE ?>
        <td data-name="Day5TE" <?= $Page->Day5TE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5TE" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5TE"
        name="x<?= $Page->RowIndex ?>_Day5TE"
        class="form-control ew-select<?= $Page->Day5TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day5TE"
        data-value-separator="<?= $Page->Day5TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5TE->getPlaceHolder()) ?>"
        <?= $Page->Day5TE->editAttributes() ?>>
        <?= $Page->Day5TE->selectOptionListHtml("x{$Page->RowIndex}_Day5TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5TE", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5TE" id="o<?= $Page->RowIndex ?>_Day5TE" value="<?= HtmlEncode($Page->Day5TE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5TE" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5TE"
        name="x<?= $Page->RowIndex ?>_Day5TE"
        class="form-control ew-select<?= $Page->Day5TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day5TE"
        data-value-separator="<?= $Page->Day5TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5TE->getPlaceHolder()) ?>"
        <?= $Page->Day5TE->editAttributes() ?>>
        <?= $Page->Day5TE->selectOptionListHtml("x{$Page->RowIndex}_Day5TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5TE", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5TE">
<span<?= $Page->Day5TE->viewAttributes() ?>>
<?= $Page->Day5TE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
        <td data-name="Day5Observation" <?= $Page->Day5Observation->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Observation" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Observation"
        name="x<?= $Page->RowIndex ?>_Day5Observation"
        class="form-control ew-select<?= $Page->Day5Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Observation"
        data-value-separator="<?= $Page->Day5Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Observation->getPlaceHolder()) ?>"
        <?= $Page->Day5Observation->editAttributes() ?>>
        <?= $Page->Day5Observation->selectOptionListHtml("x{$Page->RowIndex}_Day5Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Observation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Observation" id="o<?= $Page->RowIndex ?>_Day5Observation" value="<?= HtmlEncode($Page->Day5Observation->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Observation" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Observation"
        name="x<?= $Page->RowIndex ?>_Day5Observation"
        class="form-control ew-select<?= $Page->Day5Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Observation"
        data-value-separator="<?= $Page->Day5Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Observation->getPlaceHolder()) ?>"
        <?= $Page->Day5Observation->editAttributes() ?>>
        <?= $Page->Day5Observation->selectOptionListHtml("x{$Page->RowIndex}_Day5Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Observation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Observation">
<span<?= $Page->Day5Observation->viewAttributes() ?>>
<?= $Page->Day5Observation->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <td data-name="Day5Collapsed" <?= $Page->Day5Collapsed->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Collapsed" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Collapsed"
        name="x<?= $Page->RowIndex ?>_Day5Collapsed"
        class="form-control ew-select<?= $Page->Day5Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Collapsed"
        data-value-separator="<?= $Page->Day5Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Collapsed->getPlaceHolder()) ?>"
        <?= $Page->Day5Collapsed->editAttributes() ?>>
        <?= $Page->Day5Collapsed->selectOptionListHtml("x{$Page->RowIndex}_Day5Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Collapsed", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Collapsed" id="o<?= $Page->RowIndex ?>_Day5Collapsed" value="<?= HtmlEncode($Page->Day5Collapsed->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Collapsed" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Collapsed"
        name="x<?= $Page->RowIndex ?>_Day5Collapsed"
        class="form-control ew-select<?= $Page->Day5Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Collapsed"
        data-value-separator="<?= $Page->Day5Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Collapsed->getPlaceHolder()) ?>"
        <?= $Page->Day5Collapsed->editAttributes() ?>>
        <?= $Page->Day5Collapsed->selectOptionListHtml("x{$Page->RowIndex}_Day5Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Collapsed", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Collapsed">
<span<?= $Page->Day5Collapsed->viewAttributes() ?>>
<?= $Page->Day5Collapsed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <td data-name="Day5Vacoulles" <?= $Page->Day5Vacoulles->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Vacoulles" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Vacoulles"
        name="x<?= $Page->RowIndex ?>_Day5Vacoulles"
        class="form-control ew-select<?= $Page->Day5Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Vacoulles"
        data-value-separator="<?= $Page->Day5Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Vacoulles->getPlaceHolder()) ?>"
        <?= $Page->Day5Vacoulles->editAttributes() ?>>
        <?= $Page->Day5Vacoulles->selectOptionListHtml("x{$Page->RowIndex}_Day5Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Vacoulles", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Vacoulles" id="o<?= $Page->RowIndex ?>_Day5Vacoulles" value="<?= HtmlEncode($Page->Day5Vacoulles->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Vacoulles" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Vacoulles"
        name="x<?= $Page->RowIndex ?>_Day5Vacoulles"
        class="form-control ew-select<?= $Page->Day5Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Vacoulles"
        data-value-separator="<?= $Page->Day5Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Vacoulles->getPlaceHolder()) ?>"
        <?= $Page->Day5Vacoulles->editAttributes() ?>>
        <?= $Page->Day5Vacoulles->selectOptionListHtml("x{$Page->RowIndex}_Day5Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Vacoulles", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Vacoulles">
<span<?= $Page->Day5Vacoulles->viewAttributes() ?>>
<?= $Page->Day5Vacoulles->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
        <td data-name="Day5Grade" <?= $Page->Day5Grade->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Grade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Grade"
        name="x<?= $Page->RowIndex ?>_Day5Grade"
        class="form-control ew-select<?= $Page->Day5Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Grade"
        data-value-separator="<?= $Page->Day5Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Grade->getPlaceHolder()) ?>"
        <?= $Page->Day5Grade->editAttributes() ?>>
        <?= $Page->Day5Grade->selectOptionListHtml("x{$Page->RowIndex}_Day5Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Grade" id="o<?= $Page->RowIndex ?>_Day5Grade" value="<?= HtmlEncode($Page->Day5Grade->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Grade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Grade"
        name="x<?= $Page->RowIndex ?>_Day5Grade"
        class="form-control ew-select<?= $Page->Day5Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Grade"
        data-value-separator="<?= $Page->Day5Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Grade->getPlaceHolder()) ?>"
        <?= $Page->Day5Grade->editAttributes() ?>>
        <?= $Page->Day5Grade->selectOptionListHtml("x{$Page->RowIndex}_Day5Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Grade">
<span<?= $Page->Day5Grade->viewAttributes() ?>>
<?= $Page->Day5Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
        <td data-name="Day6CellNo" <?= $Page->Day6CellNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6CellNo" class="form-group">
<input type="<?= $Page->Day6CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?= $Page->RowIndex ?>_Day6CellNo" id="x<?= $Page->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day6CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day6CellNo->EditValue ?>"<?= $Page->Day6CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day6CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6CellNo" id="o<?= $Page->RowIndex ?>_Day6CellNo" value="<?= HtmlEncode($Page->Day6CellNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6CellNo" class="form-group">
<input type="<?= $Page->Day6CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?= $Page->RowIndex ?>_Day6CellNo" id="x<?= $Page->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day6CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day6CellNo->EditValue ?>"<?= $Page->Day6CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day6CellNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6CellNo">
<span<?= $Page->Day6CellNo->viewAttributes() ?>>
<?= $Page->Day6CellNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
        <td data-name="Day6ICM" <?= $Page->Day6ICM->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6ICM" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6ICM"
        name="x<?= $Page->RowIndex ?>_Day6ICM"
        class="form-control ew-select<?= $Page->Day6ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day6ICM"
        data-value-separator="<?= $Page->Day6ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6ICM->getPlaceHolder()) ?>"
        <?= $Page->Day6ICM->editAttributes() ?>>
        <?= $Page->Day6ICM->selectOptionListHtml("x{$Page->RowIndex}_Day6ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6ICM", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6ICM" id="o<?= $Page->RowIndex ?>_Day6ICM" value="<?= HtmlEncode($Page->Day6ICM->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6ICM" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6ICM"
        name="x<?= $Page->RowIndex ?>_Day6ICM"
        class="form-control ew-select<?= $Page->Day6ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day6ICM"
        data-value-separator="<?= $Page->Day6ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6ICM->getPlaceHolder()) ?>"
        <?= $Page->Day6ICM->editAttributes() ?>>
        <?= $Page->Day6ICM->selectOptionListHtml("x{$Page->RowIndex}_Day6ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6ICM", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6ICM">
<span<?= $Page->Day6ICM->viewAttributes() ?>>
<?= $Page->Day6ICM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day6TE->Visible) { // Day6TE ?>
        <td data-name="Day6TE" <?= $Page->Day6TE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6TE" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6TE"
        name="x<?= $Page->RowIndex ?>_Day6TE"
        class="form-control ew-select<?= $Page->Day6TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day6TE"
        data-value-separator="<?= $Page->Day6TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6TE->getPlaceHolder()) ?>"
        <?= $Page->Day6TE->editAttributes() ?>>
        <?= $Page->Day6TE->selectOptionListHtml("x{$Page->RowIndex}_Day6TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6TE", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6TE" id="o<?= $Page->RowIndex ?>_Day6TE" value="<?= HtmlEncode($Page->Day6TE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6TE" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6TE"
        name="x<?= $Page->RowIndex ?>_Day6TE"
        class="form-control ew-select<?= $Page->Day6TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day6TE"
        data-value-separator="<?= $Page->Day6TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6TE->getPlaceHolder()) ?>"
        <?= $Page->Day6TE->editAttributes() ?>>
        <?= $Page->Day6TE->selectOptionListHtml("x{$Page->RowIndex}_Day6TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6TE", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6TE">
<span<?= $Page->Day6TE->viewAttributes() ?>>
<?= $Page->Day6TE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
        <td data-name="Day6Observation" <?= $Page->Day6Observation->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Observation" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Observation"
        name="x<?= $Page->RowIndex ?>_Day6Observation"
        class="form-control ew-select<?= $Page->Day6Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Observation"
        data-value-separator="<?= $Page->Day6Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Observation->getPlaceHolder()) ?>"
        <?= $Page->Day6Observation->editAttributes() ?>>
        <?= $Page->Day6Observation->selectOptionListHtml("x{$Page->RowIndex}_Day6Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Observation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Observation" id="o<?= $Page->RowIndex ?>_Day6Observation" value="<?= HtmlEncode($Page->Day6Observation->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Observation" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Observation"
        name="x<?= $Page->RowIndex ?>_Day6Observation"
        class="form-control ew-select<?= $Page->Day6Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Observation"
        data-value-separator="<?= $Page->Day6Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Observation->getPlaceHolder()) ?>"
        <?= $Page->Day6Observation->editAttributes() ?>>
        <?= $Page->Day6Observation->selectOptionListHtml("x{$Page->RowIndex}_Day6Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Observation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Observation">
<span<?= $Page->Day6Observation->viewAttributes() ?>>
<?= $Page->Day6Observation->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <td data-name="Day6Collapsed" <?= $Page->Day6Collapsed->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Collapsed" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Collapsed"
        name="x<?= $Page->RowIndex ?>_Day6Collapsed"
        class="form-control ew-select<?= $Page->Day6Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Collapsed"
        data-value-separator="<?= $Page->Day6Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Collapsed->getPlaceHolder()) ?>"
        <?= $Page->Day6Collapsed->editAttributes() ?>>
        <?= $Page->Day6Collapsed->selectOptionListHtml("x{$Page->RowIndex}_Day6Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Collapsed", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Collapsed" id="o<?= $Page->RowIndex ?>_Day6Collapsed" value="<?= HtmlEncode($Page->Day6Collapsed->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Collapsed" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Collapsed"
        name="x<?= $Page->RowIndex ?>_Day6Collapsed"
        class="form-control ew-select<?= $Page->Day6Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Collapsed"
        data-value-separator="<?= $Page->Day6Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Collapsed->getPlaceHolder()) ?>"
        <?= $Page->Day6Collapsed->editAttributes() ?>>
        <?= $Page->Day6Collapsed->selectOptionListHtml("x{$Page->RowIndex}_Day6Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Collapsed", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Collapsed">
<span<?= $Page->Day6Collapsed->viewAttributes() ?>>
<?= $Page->Day6Collapsed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <td data-name="Day6Vacoulles" <?= $Page->Day6Vacoulles->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Vacoulles" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Vacoulles"
        name="x<?= $Page->RowIndex ?>_Day6Vacoulles"
        class="form-control ew-select<?= $Page->Day6Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Vacoulles"
        data-value-separator="<?= $Page->Day6Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Vacoulles->getPlaceHolder()) ?>"
        <?= $Page->Day6Vacoulles->editAttributes() ?>>
        <?= $Page->Day6Vacoulles->selectOptionListHtml("x{$Page->RowIndex}_Day6Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Vacoulles", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Vacoulles" id="o<?= $Page->RowIndex ?>_Day6Vacoulles" value="<?= HtmlEncode($Page->Day6Vacoulles->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Vacoulles" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Vacoulles"
        name="x<?= $Page->RowIndex ?>_Day6Vacoulles"
        class="form-control ew-select<?= $Page->Day6Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Vacoulles"
        data-value-separator="<?= $Page->Day6Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Vacoulles->getPlaceHolder()) ?>"
        <?= $Page->Day6Vacoulles->editAttributes() ?>>
        <?= $Page->Day6Vacoulles->selectOptionListHtml("x{$Page->RowIndex}_Day6Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Vacoulles", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Vacoulles">
<span<?= $Page->Day6Vacoulles->viewAttributes() ?>>
<?= $Page->Day6Vacoulles->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
        <td data-name="Day6Grade" <?= $Page->Day6Grade->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Grade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Grade"
        name="x<?= $Page->RowIndex ?>_Day6Grade"
        class="form-control ew-select<?= $Page->Day6Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Grade"
        data-value-separator="<?= $Page->Day6Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Grade->getPlaceHolder()) ?>"
        <?= $Page->Day6Grade->editAttributes() ?>>
        <?= $Page->Day6Grade->selectOptionListHtml("x{$Page->RowIndex}_Day6Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Grade" id="o<?= $Page->RowIndex ?>_Day6Grade" value="<?= HtmlEncode($Page->Day6Grade->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Grade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Grade"
        name="x<?= $Page->RowIndex ?>_Day6Grade"
        class="form-control ew-select<?= $Page->Day6Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Grade"
        data-value-separator="<?= $Page->Day6Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Grade->getPlaceHolder()) ?>"
        <?= $Page->Day6Grade->editAttributes() ?>>
        <?= $Page->Day6Grade->selectOptionListHtml("x{$Page->RowIndex}_Day6Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Grade">
<span<?= $Page->Day6Grade->viewAttributes() ?>>
<?= $Page->Day6Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <td data-name="Day6Cryoptop" <?= $Page->Day6Cryoptop->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Cryoptop" class="form-group">
<input type="<?= $Page->Day6Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?= $Page->RowIndex ?>_Day6Cryoptop" id="x<?= $Page->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day6Cryoptop->getPlaceHolder()) ?>" value="<?= $Page->Day6Cryoptop->EditValue ?>"<?= $Page->Day6Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day6Cryoptop->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Cryoptop" id="o<?= $Page->RowIndex ?>_Day6Cryoptop" value="<?= HtmlEncode($Page->Day6Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Cryoptop" class="form-group">
<input type="<?= $Page->Day6Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?= $Page->RowIndex ?>_Day6Cryoptop" id="x<?= $Page->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day6Cryoptop->getPlaceHolder()) ?>" value="<?= $Page->Day6Cryoptop->EditValue ?>"<?= $Page->Day6Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day6Cryoptop->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Cryoptop">
<span<?= $Page->Day6Cryoptop->viewAttributes() ?>>
<?= $Page->Day6Cryoptop->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
        <td data-name="EndSiNo" <?= $Page->EndSiNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndSiNo" class="form-group">
<input type="<?= $Page->EndSiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?= $Page->RowIndex ?>_EndSiNo" id="x<?= $Page->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->EndSiNo->getPlaceHolder()) ?>" value="<?= $Page->EndSiNo->EditValue ?>"<?= $Page->EndSiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EndSiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndSiNo" id="o<?= $Page->RowIndex ?>_EndSiNo" value="<?= HtmlEncode($Page->EndSiNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndSiNo" class="form-group">
<input type="<?= $Page->EndSiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?= $Page->RowIndex ?>_EndSiNo" id="x<?= $Page->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->EndSiNo->getPlaceHolder()) ?>" value="<?= $Page->EndSiNo->EditValue ?>"<?= $Page->EndSiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EndSiNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndSiNo">
<span<?= $Page->EndSiNo->viewAttributes() ?>>
<?= $Page->EndSiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EndingDay->Visible) { // EndingDay ?>
        <td data-name="EndingDay" <?= $Page->EndingDay->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingDay" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_EndingDay"
        name="x<?= $Page->RowIndex ?>_EndingDay"
        class="form-control ew-select<?= $Page->EndingDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay"
        data-table="ivf_embryology_chart"
        data-field="x_EndingDay"
        data-value-separator="<?= $Page->EndingDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingDay->getPlaceHolder()) ?>"
        <?= $Page->EndingDay->editAttributes() ?>>
        <?= $Page->EndingDay->selectOptionListHtml("x{$Page->RowIndex}_EndingDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingDay", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingDay" id="o<?= $Page->RowIndex ?>_EndingDay" value="<?= HtmlEncode($Page->EndingDay->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingDay" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_EndingDay"
        name="x<?= $Page->RowIndex ?>_EndingDay"
        class="form-control ew-select<?= $Page->EndingDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay"
        data-table="ivf_embryology_chart"
        data-field="x_EndingDay"
        data-value-separator="<?= $Page->EndingDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingDay->getPlaceHolder()) ?>"
        <?= $Page->EndingDay->editAttributes() ?>>
        <?= $Page->EndingDay->selectOptionListHtml("x{$Page->RowIndex}_EndingDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingDay", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingDay">
<span<?= $Page->EndingDay->viewAttributes() ?>>
<?= $Page->EndingDay->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
        <td data-name="EndingCellStage" <?= $Page->EndingCellStage->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingCellStage" class="form-group">
<input type="<?= $Page->EndingCellStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?= $Page->RowIndex ?>_EndingCellStage" id="x<?= $Page->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->EndingCellStage->getPlaceHolder()) ?>" value="<?= $Page->EndingCellStage->EditValue ?>"<?= $Page->EndingCellStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EndingCellStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingCellStage" id="o<?= $Page->RowIndex ?>_EndingCellStage" value="<?= HtmlEncode($Page->EndingCellStage->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingCellStage" class="form-group">
<input type="<?= $Page->EndingCellStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?= $Page->RowIndex ?>_EndingCellStage" id="x<?= $Page->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->EndingCellStage->getPlaceHolder()) ?>" value="<?= $Page->EndingCellStage->EditValue ?>"<?= $Page->EndingCellStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EndingCellStage->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingCellStage">
<span<?= $Page->EndingCellStage->viewAttributes() ?>>
<?= $Page->EndingCellStage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
        <td data-name="EndingGrade" <?= $Page->EndingGrade->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingGrade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_EndingGrade"
        name="x<?= $Page->RowIndex ?>_EndingGrade"
        class="form-control ew-select<?= $Page->EndingGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade"
        data-table="ivf_embryology_chart"
        data-field="x_EndingGrade"
        data-value-separator="<?= $Page->EndingGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingGrade->getPlaceHolder()) ?>"
        <?= $Page->EndingGrade->editAttributes() ?>>
        <?= $Page->EndingGrade->selectOptionListHtml("x{$Page->RowIndex}_EndingGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingGrade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingGrade" id="o<?= $Page->RowIndex ?>_EndingGrade" value="<?= HtmlEncode($Page->EndingGrade->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingGrade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_EndingGrade"
        name="x<?= $Page->RowIndex ?>_EndingGrade"
        class="form-control ew-select<?= $Page->EndingGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade"
        data-table="ivf_embryology_chart"
        data-field="x_EndingGrade"
        data-value-separator="<?= $Page->EndingGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingGrade->getPlaceHolder()) ?>"
        <?= $Page->EndingGrade->editAttributes() ?>>
        <?= $Page->EndingGrade->selectOptionListHtml("x{$Page->RowIndex}_EndingGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingGrade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingGrade">
<span<?= $Page->EndingGrade->viewAttributes() ?>>
<?= $Page->EndingGrade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EndingState->Visible) { // EndingState ?>
        <td data-name="EndingState" <?= $Page->EndingState->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingState" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_EndingState"
        name="x<?= $Page->RowIndex ?>_EndingState"
        class="form-control ew-select<?= $Page->EndingState->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState"
        data-table="ivf_embryology_chart"
        data-field="x_EndingState"
        data-value-separator="<?= $Page->EndingState->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingState->getPlaceHolder()) ?>"
        <?= $Page->EndingState->editAttributes() ?>>
        <?= $Page->EndingState->selectOptionListHtml("x{$Page->RowIndex}_EndingState") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingState->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingState", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingState.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingState.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingState" id="o<?= $Page->RowIndex ?>_EndingState" value="<?= HtmlEncode($Page->EndingState->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingState" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_EndingState"
        name="x<?= $Page->RowIndex ?>_EndingState"
        class="form-control ew-select<?= $Page->EndingState->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState"
        data-table="ivf_embryology_chart"
        data-field="x_EndingState"
        data-value-separator="<?= $Page->EndingState->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingState->getPlaceHolder()) ?>"
        <?= $Page->EndingState->editAttributes() ?>>
        <?= $Page->EndingState->selectOptionListHtml("x{$Page->RowIndex}_EndingState") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingState->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingState", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingState.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingState.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingState">
<span<?= $Page->EndingState->viewAttributes() ?>>
<?= $Page->EndingState->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->TidNo->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_TidNo" class="form-group">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_TidNo" name="x<?= $Page->RowIndex ?>_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_TidNo" class="form-group">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x<?= $Page->RowIndex ?>_TidNo" id="x<?= $Page->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_TidNo" id="o<?= $Page->RowIndex ?>_TidNo" value="<?= HtmlEncode($Page->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_TidNo" class="form-group">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" data-hidden="1" name="x<?= $Page->RowIndex ?>_TidNo" id="x<?= $Page->RowIndex ?>_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DidNO->Visible) { // DidNO ?>
        <td data-name="DidNO" <?= $Page->DidNO->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->DidNO->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_DidNO" class="form-group">
<span<?= $Page->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DidNO->getDisplayValue($Page->DidNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_DidNO" name="x<?= $Page->RowIndex ?>_DidNO" value="<?= HtmlEncode($Page->DidNO->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_DidNO" class="form-group">
<input type="<?= $Page->DidNO->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x<?= $Page->RowIndex ?>_DidNO" id="x<?= $Page->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DidNO->getPlaceHolder()) ?>" value="<?= $Page->DidNO->EditValue ?>"<?= $Page->DidNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DidNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_DidNO" id="o<?= $Page->RowIndex ?>_DidNO" value="<?= HtmlEncode($Page->DidNO->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_DidNO" class="form-group">
<span<?= $Page->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DidNO->getDisplayValue($Page->DidNO->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" data-hidden="1" name="x<?= $Page->RowIndex ?>_DidNO" id="x<?= $Page->RowIndex ?>_DidNO" value="<?= HtmlEncode($Page->DidNO->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_DidNO">
<span<?= $Page->DidNO->viewAttributes() ?>>
<?= $Page->DidNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <td data-name="ICSiIVFDateTime" <?= $Page->ICSiIVFDateTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ICSiIVFDateTime" class="form-group">
<input type="<?= $Page->ICSiIVFDateTime->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?= $Page->RowIndex ?>_ICSiIVFDateTime" id="x<?= $Page->RowIndex ?>_ICSiIVFDateTime" placeholder="<?= HtmlEncode($Page->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?= $Page->ICSiIVFDateTime->EditValue ?>"<?= $Page->ICSiIVFDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ICSiIVFDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ICSiIVFDateTime->ReadOnly && !$Page->ICSiIVFDateTime->Disabled && !isset($Page->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($Page->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ICSiIVFDateTime" id="o<?= $Page->RowIndex ?>_ICSiIVFDateTime" value="<?= HtmlEncode($Page->ICSiIVFDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ICSiIVFDateTime" class="form-group">
<input type="<?= $Page->ICSiIVFDateTime->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?= $Page->RowIndex ?>_ICSiIVFDateTime" id="x<?= $Page->RowIndex ?>_ICSiIVFDateTime" placeholder="<?= HtmlEncode($Page->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?= $Page->ICSiIVFDateTime->EditValue ?>"<?= $Page->ICSiIVFDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ICSiIVFDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ICSiIVFDateTime->ReadOnly && !$Page->ICSiIVFDateTime->Disabled && !isset($Page->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($Page->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ICSiIVFDateTime">
<span<?= $Page->ICSiIVFDateTime->viewAttributes() ?>>
<?= $Page->ICSiIVFDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <td data-name="PrimaryEmbrologist" <?= $Page->PrimaryEmbrologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_PrimaryEmbrologist" class="form-group">
<input type="<?= $Page->PrimaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?= $Page->RowIndex ?>_PrimaryEmbrologist" id="x<?= $Page->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbrologist->EditValue ?>"<?= $Page->PrimaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrimaryEmbrologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrimaryEmbrologist" id="o<?= $Page->RowIndex ?>_PrimaryEmbrologist" value="<?= HtmlEncode($Page->PrimaryEmbrologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_PrimaryEmbrologist" class="form-group">
<input type="<?= $Page->PrimaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?= $Page->RowIndex ?>_PrimaryEmbrologist" id="x<?= $Page->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbrologist->EditValue ?>"<?= $Page->PrimaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrimaryEmbrologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_PrimaryEmbrologist">
<span<?= $Page->PrimaryEmbrologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbrologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <td data-name="SecondaryEmbrologist" <?= $Page->SecondaryEmbrologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SecondaryEmbrologist" class="form-group">
<input type="<?= $Page->SecondaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?= $Page->RowIndex ?>_SecondaryEmbrologist" id="x<?= $Page->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbrologist->EditValue ?>"<?= $Page->SecondaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SecondaryEmbrologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_SecondaryEmbrologist" id="o<?= $Page->RowIndex ?>_SecondaryEmbrologist" value="<?= HtmlEncode($Page->SecondaryEmbrologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SecondaryEmbrologist" class="form-group">
<input type="<?= $Page->SecondaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?= $Page->RowIndex ?>_SecondaryEmbrologist" id="x<?= $Page->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbrologist->EditValue ?>"<?= $Page->SecondaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SecondaryEmbrologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SecondaryEmbrologist">
<span<?= $Page->SecondaryEmbrologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbrologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator" <?= $Page->Incubator->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Incubator" class="form-group">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?= $Page->RowIndex ?>_Incubator" id="x<?= $Page->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator" id="o<?= $Page->RowIndex ?>_Incubator" value="<?= HtmlEncode($Page->Incubator->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Incubator" class="form-group">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?= $Page->RowIndex ?>_Incubator" id="x<?= $Page->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->location->Visible) { // location ?>
        <td data-name="location" <?= $Page->location->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_location" class="form-group">
<input type="<?= $Page->location->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_location" name="x<?= $Page->RowIndex ?>_location" id="x<?= $Page->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->location->getPlaceHolder()) ?>" value="<?= $Page->location->EditValue ?>"<?= $Page->location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->location->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" data-hidden="1" name="o<?= $Page->RowIndex ?>_location" id="o<?= $Page->RowIndex ?>_location" value="<?= HtmlEncode($Page->location->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_location" class="form-group">
<input type="<?= $Page->location->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_location" name="x<?= $Page->RowIndex ?>_location" id="x<?= $Page->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->location->getPlaceHolder()) ?>" value="<?= $Page->location->EditValue ?>"<?= $Page->location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->location->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_location">
<span<?= $Page->location->viewAttributes() ?>>
<?= $Page->location->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td data-name="OocyteNo" <?= $Page->OocyteNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_OocyteNo" class="form-group">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?= $Page->RowIndex ?>_OocyteNo" id="x<?= $Page->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_OocyteNo" id="o<?= $Page->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Page->OocyteNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_OocyteNo" class="form-group">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?= $Page->RowIndex ?>_OocyteNo" id="x<?= $Page->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_OocyteNo">
<span<?= $Page->OocyteNo->viewAttributes() ?>>
<?= $Page->OocyteNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Stage" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Stage"
        name="x<?= $Page->RowIndex ?>_Stage"
        class="form-control ew-select<?= $Page->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage"
        data-table="ivf_embryology_chart"
        data-field="x_Stage"
        data-value-separator="<?= $Page->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>"
        <?= $Page->Stage->editAttributes() ?>>
        <?= $Page->Stage->selectOptionListHtml("x{$Page->RowIndex}_Stage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Stage", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stage" id="o<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Stage" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Stage"
        name="x<?= $Page->RowIndex ?>_Stage"
        class="form-control ew-select<?= $Page->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage"
        data-table="ivf_embryology_chart"
        data-field="x_Stage"
        data-value-separator="<?= $Page->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>"
        <?= $Page->Stage->editAttributes() ?>>
        <?= $Page->Stage->selectOptionListHtml("x{$Page->RowIndex}_Stage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Stage", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Remarks" class="form-group">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?= $Page->RowIndex ?>_Remarks" id="x<?= $Page->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" data-hidden="1" name="o<?= $Page->RowIndex ?>_Remarks" id="o<?= $Page->RowIndex ?>_Remarks" value="<?= HtmlEncode($Page->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Remarks" class="form-group">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?= $Page->RowIndex ?>_Remarks" id="x<?= $Page->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate" <?= $Page->vitrificationDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitrificationDate" class="form-group">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?= $Page->RowIndex ?>_vitrificationDate" id="x<?= $Page->RowIndex ?>_vitrificationDate" size="12" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitrificationDate" id="o<?= $Page->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Page->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitrificationDate" class="form-group">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?= $Page->RowIndex ?>_vitrificationDate" id="x<?= $Page->RowIndex ?>_vitrificationDate" size="12" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitrificationDate">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<?= $Page->vitrificationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <td data-name="vitriPrimaryEmbryologist" <?= $Page->vitriPrimaryEmbryologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group">
<input type="<?= $Page->vitriPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->vitriPrimaryEmbryologist->EditValue ?>"<?= $Page->vitriPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" id="o<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" value="<?= HtmlEncode($Page->vitriPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group">
<input type="<?= $Page->vitriPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->vitriPrimaryEmbryologist->EditValue ?>"<?= $Page->vitriPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?= $Page->vitriPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->vitriPrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <td data-name="vitriSecondaryEmbryologist" <?= $Page->vitriSecondaryEmbryologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group">
<input type="<?= $Page->vitriSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->vitriSecondaryEmbryologist->EditValue ?>"<?= $Page->vitriSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" id="o<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" value="<?= HtmlEncode($Page->vitriSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group">
<input type="<?= $Page->vitriSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->vitriSecondaryEmbryologist->EditValue ?>"<?= $Page->vitriSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?= $Page->vitriSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->vitriSecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <td data-name="vitriEmbryoNo" <?= $Page->vitriEmbryoNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriEmbryoNo" class="form-group">
<input type="<?= $Page->vitriEmbryoNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?= $Page->RowIndex ?>_vitriEmbryoNo" id="x<?= $Page->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->vitriEmbryoNo->EditValue ?>"<?= $Page->vitriEmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriEmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriEmbryoNo" id="o<?= $Page->RowIndex ?>_vitriEmbryoNo" value="<?= HtmlEncode($Page->vitriEmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriEmbryoNo" class="form-group">
<input type="<?= $Page->vitriEmbryoNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?= $Page->RowIndex ?>_vitriEmbryoNo" id="x<?= $Page->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->vitriEmbryoNo->EditValue ?>"<?= $Page->vitriEmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriEmbryoNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriEmbryoNo">
<span<?= $Page->vitriEmbryoNo->viewAttributes() ?>>
<?= $Page->vitriEmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <td data-name="thawReFrozen" <?= $Page->thawReFrozen->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawReFrozen" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_thawReFrozen">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="x<?= $Page->RowIndex ?>_thawReFrozen" id="x<?= $Page->RowIndex ?>_thawReFrozen"<?= $Page->thawReFrozen->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_thawReFrozen" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_thawReFrozen[]"
    name="x<?= $Page->RowIndex ?>_thawReFrozen[]"
    value="<?= HtmlEncode($Page->thawReFrozen->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_thawReFrozen"
    data-target="dsl_x<?= $Page->RowIndex ?>_thawReFrozen"
    data-repeatcolumn="5"
    class="form-control<?= $Page->thawReFrozen->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_thawReFrozen"
    data-value-separator="<?= $Page->thawReFrozen->displayValueSeparatorAttribute() ?>"
    <?= $Page->thawReFrozen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawReFrozen[]" id="o<?= $Page->RowIndex ?>_thawReFrozen[]" value="<?= HtmlEncode($Page->thawReFrozen->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawReFrozen" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_thawReFrozen">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="x<?= $Page->RowIndex ?>_thawReFrozen" id="x<?= $Page->RowIndex ?>_thawReFrozen"<?= $Page->thawReFrozen->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_thawReFrozen" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_thawReFrozen[]"
    name="x<?= $Page->RowIndex ?>_thawReFrozen[]"
    value="<?= HtmlEncode($Page->thawReFrozen->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_thawReFrozen"
    data-target="dsl_x<?= $Page->RowIndex ?>_thawReFrozen"
    data-repeatcolumn="5"
    class="form-control<?= $Page->thawReFrozen->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_thawReFrozen"
    data-value-separator="<?= $Page->thawReFrozen->displayValueSeparatorAttribute() ?>"
    <?= $Page->thawReFrozen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawReFrozen">
<span<?= $Page->thawReFrozen->viewAttributes() ?>>
<?= $Page->thawReFrozen->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <td data-name="vitriFertilisationDate" <?= $Page->vitriFertilisationDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriFertilisationDate" class="form-group">
<input type="<?= $Page->vitriFertilisationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?= $Page->RowIndex ?>_vitriFertilisationDate" id="x<?= $Page->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?= HtmlEncode($Page->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->vitriFertilisationDate->EditValue ?>"<?= $Page->vitriFertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriFertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitriFertilisationDate->ReadOnly && !$Page->vitriFertilisationDate->Disabled && !isset($Page->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($Page->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriFertilisationDate" id="o<?= $Page->RowIndex ?>_vitriFertilisationDate" value="<?= HtmlEncode($Page->vitriFertilisationDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriFertilisationDate" class="form-group">
<input type="<?= $Page->vitriFertilisationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?= $Page->RowIndex ?>_vitriFertilisationDate" id="x<?= $Page->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?= HtmlEncode($Page->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->vitriFertilisationDate->EditValue ?>"<?= $Page->vitriFertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriFertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitriFertilisationDate->ReadOnly && !$Page->vitriFertilisationDate->Disabled && !isset($Page->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($Page->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriFertilisationDate">
<span<?= $Page->vitriFertilisationDate->viewAttributes() ?>>
<?= $Page->vitriFertilisationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriDay->Visible) { // vitriDay ?>
        <td data-name="vitriDay" <?= $Page->vitriDay->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriDay" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_vitriDay"
        name="x<?= $Page->RowIndex ?>_vitriDay"
        class="form-control ew-select<?= $Page->vitriDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay"
        data-table="ivf_embryology_chart"
        data-field="x_vitriDay"
        data-value-separator="<?= $Page->vitriDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->vitriDay->getPlaceHolder()) ?>"
        <?= $Page->vitriDay->editAttributes() ?>>
        <?= $Page->vitriDay->selectOptionListHtml("x{$Page->RowIndex}_vitriDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->vitriDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay']"),
        options = { name: "x<?= $Page->RowIndex ?>_vitriDay", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriDay" id="o<?= $Page->RowIndex ?>_vitriDay" value="<?= HtmlEncode($Page->vitriDay->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriDay" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_vitriDay"
        name="x<?= $Page->RowIndex ?>_vitriDay"
        class="form-control ew-select<?= $Page->vitriDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay"
        data-table="ivf_embryology_chart"
        data-field="x_vitriDay"
        data-value-separator="<?= $Page->vitriDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->vitriDay->getPlaceHolder()) ?>"
        <?= $Page->vitriDay->editAttributes() ?>>
        <?= $Page->vitriDay->selectOptionListHtml("x{$Page->RowIndex}_vitriDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->vitriDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay']"),
        options = { name: "x<?= $Page->RowIndex ?>_vitriDay", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriDay">
<span<?= $Page->vitriDay->viewAttributes() ?>>
<?= $Page->vitriDay->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriStage->Visible) { // vitriStage ?>
        <td data-name="vitriStage" <?= $Page->vitriStage->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriStage" class="form-group">
<input type="<?= $Page->vitriStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?= $Page->RowIndex ?>_vitriStage" id="x<?= $Page->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriStage->getPlaceHolder()) ?>" value="<?= $Page->vitriStage->EditValue ?>"<?= $Page->vitriStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriStage" id="o<?= $Page->RowIndex ?>_vitriStage" value="<?= HtmlEncode($Page->vitriStage->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriStage" class="form-group">
<input type="<?= $Page->vitriStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?= $Page->RowIndex ?>_vitriStage" id="x<?= $Page->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriStage->getPlaceHolder()) ?>" value="<?= $Page->vitriStage->EditValue ?>"<?= $Page->vitriStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriStage->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriStage">
<span<?= $Page->vitriStage->viewAttributes() ?>>
<?= $Page->vitriStage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
        <td data-name="vitriGrade" <?= $Page->vitriGrade->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGrade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_vitriGrade"
        name="x<?= $Page->RowIndex ?>_vitriGrade"
        class="form-control ew-select<?= $Page->vitriGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade"
        data-table="ivf_embryology_chart"
        data-field="x_vitriGrade"
        data-value-separator="<?= $Page->vitriGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->vitriGrade->getPlaceHolder()) ?>"
        <?= $Page->vitriGrade->editAttributes() ?>>
        <?= $Page->vitriGrade->selectOptionListHtml("x{$Page->RowIndex}_vitriGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->vitriGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade']"),
        options = { name: "x<?= $Page->RowIndex ?>_vitriGrade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriGrade" id="o<?= $Page->RowIndex ?>_vitriGrade" value="<?= HtmlEncode($Page->vitriGrade->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGrade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_vitriGrade"
        name="x<?= $Page->RowIndex ?>_vitriGrade"
        class="form-control ew-select<?= $Page->vitriGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade"
        data-table="ivf_embryology_chart"
        data-field="x_vitriGrade"
        data-value-separator="<?= $Page->vitriGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->vitriGrade->getPlaceHolder()) ?>"
        <?= $Page->vitriGrade->editAttributes() ?>>
        <?= $Page->vitriGrade->selectOptionListHtml("x{$Page->RowIndex}_vitriGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->vitriGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade']"),
        options = { name: "x<?= $Page->RowIndex ?>_vitriGrade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGrade">
<span<?= $Page->vitriGrade->viewAttributes() ?>>
<?= $Page->vitriGrade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
        <td data-name="vitriIncubator" <?= $Page->vitriIncubator->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriIncubator" class="form-group">
<input type="<?= $Page->vitriIncubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?= $Page->RowIndex ?>_vitriIncubator" id="x<?= $Page->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriIncubator->getPlaceHolder()) ?>" value="<?= $Page->vitriIncubator->EditValue ?>"<?= $Page->vitriIncubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriIncubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriIncubator" id="o<?= $Page->RowIndex ?>_vitriIncubator" value="<?= HtmlEncode($Page->vitriIncubator->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriIncubator" class="form-group">
<input type="<?= $Page->vitriIncubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?= $Page->RowIndex ?>_vitriIncubator" id="x<?= $Page->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriIncubator->getPlaceHolder()) ?>" value="<?= $Page->vitriIncubator->EditValue ?>"<?= $Page->vitriIncubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriIncubator->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriIncubator">
<span<?= $Page->vitriIncubator->viewAttributes() ?>>
<?= $Page->vitriIncubator->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriTank->Visible) { // vitriTank ?>
        <td data-name="vitriTank" <?= $Page->vitriTank->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriTank" class="form-group">
<input type="<?= $Page->vitriTank->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?= $Page->RowIndex ?>_vitriTank" id="x<?= $Page->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriTank->getPlaceHolder()) ?>" value="<?= $Page->vitriTank->EditValue ?>"<?= $Page->vitriTank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriTank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriTank" id="o<?= $Page->RowIndex ?>_vitriTank" value="<?= HtmlEncode($Page->vitriTank->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriTank" class="form-group">
<input type="<?= $Page->vitriTank->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?= $Page->RowIndex ?>_vitriTank" id="x<?= $Page->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriTank->getPlaceHolder()) ?>" value="<?= $Page->vitriTank->EditValue ?>"<?= $Page->vitriTank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriTank->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriTank">
<span<?= $Page->vitriTank->viewAttributes() ?>>
<?= $Page->vitriTank->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
        <td data-name="vitriCanister" <?= $Page->vitriCanister->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCanister" class="form-group">
<input type="<?= $Page->vitriCanister->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?= $Page->RowIndex ?>_vitriCanister" id="x<?= $Page->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCanister->getPlaceHolder()) ?>" value="<?= $Page->vitriCanister->EditValue ?>"<?= $Page->vitriCanister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCanister->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriCanister" id="o<?= $Page->RowIndex ?>_vitriCanister" value="<?= HtmlEncode($Page->vitriCanister->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCanister" class="form-group">
<input type="<?= $Page->vitriCanister->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?= $Page->RowIndex ?>_vitriCanister" id="x<?= $Page->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCanister->getPlaceHolder()) ?>" value="<?= $Page->vitriCanister->EditValue ?>"<?= $Page->vitriCanister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCanister->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCanister">
<span<?= $Page->vitriCanister->viewAttributes() ?>>
<?= $Page->vitriCanister->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
        <td data-name="vitriGobiet" <?= $Page->vitriGobiet->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGobiet" class="form-group">
<input type="<?= $Page->vitriGobiet->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?= $Page->RowIndex ?>_vitriGobiet" id="x<?= $Page->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriGobiet->getPlaceHolder()) ?>" value="<?= $Page->vitriGobiet->EditValue ?>"<?= $Page->vitriGobiet->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriGobiet->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriGobiet" id="o<?= $Page->RowIndex ?>_vitriGobiet" value="<?= HtmlEncode($Page->vitriGobiet->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGobiet" class="form-group">
<input type="<?= $Page->vitriGobiet->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?= $Page->RowIndex ?>_vitriGobiet" id="x<?= $Page->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriGobiet->getPlaceHolder()) ?>" value="<?= $Page->vitriGobiet->EditValue ?>"<?= $Page->vitriGobiet->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriGobiet->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGobiet">
<span<?= $Page->vitriGobiet->viewAttributes() ?>>
<?= $Page->vitriGobiet->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
        <td data-name="vitriViscotube" <?= $Page->vitriViscotube->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriViscotube" class="form-group">
<input type="<?= $Page->vitriViscotube->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?= $Page->RowIndex ?>_vitriViscotube" id="x<?= $Page->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriViscotube->getPlaceHolder()) ?>" value="<?= $Page->vitriViscotube->EditValue ?>"<?= $Page->vitriViscotube->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriViscotube->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriViscotube" id="o<?= $Page->RowIndex ?>_vitriViscotube" value="<?= HtmlEncode($Page->vitriViscotube->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriViscotube" class="form-group">
<input type="<?= $Page->vitriViscotube->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?= $Page->RowIndex ?>_vitriViscotube" id="x<?= $Page->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriViscotube->getPlaceHolder()) ?>" value="<?= $Page->vitriViscotube->EditValue ?>"<?= $Page->vitriViscotube->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriViscotube->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriViscotube">
<span<?= $Page->vitriViscotube->viewAttributes() ?>>
<?= $Page->vitriViscotube->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <td data-name="vitriCryolockNo" <?= $Page->vitriCryolockNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockNo" class="form-group">
<input type="<?= $Page->vitriCryolockNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?= $Page->RowIndex ?>_vitriCryolockNo" id="x<?= $Page->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCryolockNo->getPlaceHolder()) ?>" value="<?= $Page->vitriCryolockNo->EditValue ?>"<?= $Page->vitriCryolockNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCryolockNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriCryolockNo" id="o<?= $Page->RowIndex ?>_vitriCryolockNo" value="<?= HtmlEncode($Page->vitriCryolockNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockNo" class="form-group">
<input type="<?= $Page->vitriCryolockNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?= $Page->RowIndex ?>_vitriCryolockNo" id="x<?= $Page->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCryolockNo->getPlaceHolder()) ?>" value="<?= $Page->vitriCryolockNo->EditValue ?>"<?= $Page->vitriCryolockNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCryolockNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockNo">
<span<?= $Page->vitriCryolockNo->viewAttributes() ?>>
<?= $Page->vitriCryolockNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <td data-name="vitriCryolockColour" <?= $Page->vitriCryolockColour->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockColour" class="form-group">
<input type="<?= $Page->vitriCryolockColour->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?= $Page->RowIndex ?>_vitriCryolockColour" id="x<?= $Page->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCryolockColour->getPlaceHolder()) ?>" value="<?= $Page->vitriCryolockColour->EditValue ?>"<?= $Page->vitriCryolockColour->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCryolockColour->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriCryolockColour" id="o<?= $Page->RowIndex ?>_vitriCryolockColour" value="<?= HtmlEncode($Page->vitriCryolockColour->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockColour" class="form-group">
<input type="<?= $Page->vitriCryolockColour->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?= $Page->RowIndex ?>_vitriCryolockColour" id="x<?= $Page->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCryolockColour->getPlaceHolder()) ?>" value="<?= $Page->vitriCryolockColour->EditValue ?>"<?= $Page->vitriCryolockColour->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCryolockColour->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockColour">
<span<?= $Page->vitriCryolockColour->viewAttributes() ?>>
<?= $Page->vitriCryolockColour->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawDate->Visible) { // thawDate ?>
        <td data-name="thawDate" <?= $Page->thawDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDate" class="form-group">
<input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?= $Page->RowIndex ?>_thawDate" id="x<?= $Page->RowIndex ?>_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
<?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawDate" id="o<?= $Page->RowIndex ?>_thawDate" value="<?= HtmlEncode($Page->thawDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDate" class="form-group">
<input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?= $Page->RowIndex ?>_thawDate" id="x<?= $Page->RowIndex ?>_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
<?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDate">
<span<?= $Page->thawDate->viewAttributes() ?>>
<?= $Page->thawDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td data-name="thawPrimaryEmbryologist" <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group">
<input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="o<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" value="<?= HtmlEncode($Page->thawPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group">
<input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?= $Page->thawPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td data-name="thawSecondaryEmbryologist" <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group">
<input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="o<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" value="<?= HtmlEncode($Page->thawSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group">
<input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?= $Page->thawSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawET->Visible) { // thawET ?>
        <td data-name="thawET" <?= $Page->thawET->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawET" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_thawET"
        name="x<?= $Page->RowIndex ?>_thawET"
        class="form-control ew-select<?= $Page->thawET->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET"
        data-table="ivf_embryology_chart"
        data-field="x_thawET"
        data-value-separator="<?= $Page->thawET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->thawET->getPlaceHolder()) ?>"
        <?= $Page->thawET->editAttributes() ?>>
        <?= $Page->thawET->selectOptionListHtml("x{$Page->RowIndex}_thawET") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->thawET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET']"),
        options = { name: "x<?= $Page->RowIndex ?>_thawET", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.thawET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.thawET.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawET" id="o<?= $Page->RowIndex ?>_thawET" value="<?= HtmlEncode($Page->thawET->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawET" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_thawET"
        name="x<?= $Page->RowIndex ?>_thawET"
        class="form-control ew-select<?= $Page->thawET->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET"
        data-table="ivf_embryology_chart"
        data-field="x_thawET"
        data-value-separator="<?= $Page->thawET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->thawET->getPlaceHolder()) ?>"
        <?= $Page->thawET->editAttributes() ?>>
        <?= $Page->thawET->selectOptionListHtml("x{$Page->RowIndex}_thawET") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->thawET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET']"),
        options = { name: "x<?= $Page->RowIndex ?>_thawET", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.thawET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.thawET.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawET">
<span<?= $Page->thawET->viewAttributes() ?>>
<?= $Page->thawET->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <td data-name="thawAbserve" <?= $Page->thawAbserve->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawAbserve" class="form-group">
<input type="<?= $Page->thawAbserve->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?= $Page->RowIndex ?>_thawAbserve" id="x<?= $Page->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawAbserve->getPlaceHolder()) ?>" value="<?= $Page->thawAbserve->EditValue ?>"<?= $Page->thawAbserve->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawAbserve->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawAbserve" id="o<?= $Page->RowIndex ?>_thawAbserve" value="<?= HtmlEncode($Page->thawAbserve->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawAbserve" class="form-group">
<input type="<?= $Page->thawAbserve->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?= $Page->RowIndex ?>_thawAbserve" id="x<?= $Page->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawAbserve->getPlaceHolder()) ?>" value="<?= $Page->thawAbserve->EditValue ?>"<?= $Page->thawAbserve->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawAbserve->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawAbserve">
<span<?= $Page->thawAbserve->viewAttributes() ?>>
<?= $Page->thawAbserve->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <td data-name="thawDiscard" <?= $Page->thawDiscard->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDiscard" class="form-group">
<input type="<?= $Page->thawDiscard->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?= $Page->RowIndex ?>_thawDiscard" id="x<?= $Page->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawDiscard->getPlaceHolder()) ?>" value="<?= $Page->thawDiscard->EditValue ?>"<?= $Page->thawDiscard->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDiscard->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawDiscard" id="o<?= $Page->RowIndex ?>_thawDiscard" value="<?= HtmlEncode($Page->thawDiscard->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDiscard" class="form-group">
<input type="<?= $Page->thawDiscard->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?= $Page->RowIndex ?>_thawDiscard" id="x<?= $Page->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawDiscard->getPlaceHolder()) ?>" value="<?= $Page->thawDiscard->EditValue ?>"<?= $Page->thawDiscard->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDiscard->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDiscard">
<span<?= $Page->thawDiscard->viewAttributes() ?>>
<?= $Page->thawDiscard->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
        <td data-name="ETCatheter" <?= $Page->ETCatheter->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETCatheter" class="form-group">
<input type="<?= $Page->ETCatheter->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?= $Page->RowIndex ?>_ETCatheter" id="x<?= $Page->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->ETCatheter->getPlaceHolder()) ?>" value="<?= $Page->ETCatheter->EditValue ?>"<?= $Page->ETCatheter->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETCatheter->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETCatheter" id="o<?= $Page->RowIndex ?>_ETCatheter" value="<?= HtmlEncode($Page->ETCatheter->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETCatheter" class="form-group">
<input type="<?= $Page->ETCatheter->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?= $Page->RowIndex ?>_ETCatheter" id="x<?= $Page->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->ETCatheter->getPlaceHolder()) ?>" value="<?= $Page->ETCatheter->EditValue ?>"<?= $Page->ETCatheter->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETCatheter->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETCatheter">
<span<?= $Page->ETCatheter->viewAttributes() ?>>
<?= $Page->ETCatheter->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
        <td data-name="ETDifficulty" <?= $Page->ETDifficulty->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDifficulty" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_ETDifficulty"
        name="x<?= $Page->RowIndex ?>_ETDifficulty"
        class="form-control ew-select<?= $Page->ETDifficulty->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty"
        data-table="ivf_embryology_chart"
        data-field="x_ETDifficulty"
        data-value-separator="<?= $Page->ETDifficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ETDifficulty->getPlaceHolder()) ?>"
        <?= $Page->ETDifficulty->editAttributes() ?>>
        <?= $Page->ETDifficulty->selectOptionListHtml("x{$Page->RowIndex}_ETDifficulty") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ETDifficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty']"),
        options = { name: "x<?= $Page->RowIndex ?>_ETDifficulty", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETDifficulty" id="o<?= $Page->RowIndex ?>_ETDifficulty" value="<?= HtmlEncode($Page->ETDifficulty->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDifficulty" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_ETDifficulty"
        name="x<?= $Page->RowIndex ?>_ETDifficulty"
        class="form-control ew-select<?= $Page->ETDifficulty->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty"
        data-table="ivf_embryology_chart"
        data-field="x_ETDifficulty"
        data-value-separator="<?= $Page->ETDifficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ETDifficulty->getPlaceHolder()) ?>"
        <?= $Page->ETDifficulty->editAttributes() ?>>
        <?= $Page->ETDifficulty->selectOptionListHtml("x{$Page->RowIndex}_ETDifficulty") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ETDifficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty']"),
        options = { name: "x<?= $Page->RowIndex ?>_ETDifficulty", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDifficulty">
<span<?= $Page->ETDifficulty->viewAttributes() ?>>
<?= $Page->ETDifficulty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ETEasy->Visible) { // ETEasy ?>
        <td data-name="ETEasy" <?= $Page->ETEasy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEasy" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_ETEasy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="x<?= $Page->RowIndex ?>_ETEasy" id="x<?= $Page->RowIndex ?>_ETEasy"<?= $Page->ETEasy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_ETEasy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_ETEasy[]"
    name="x<?= $Page->RowIndex ?>_ETEasy[]"
    value="<?= HtmlEncode($Page->ETEasy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_ETEasy"
    data-target="dsl_x<?= $Page->RowIndex ?>_ETEasy"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ETEasy->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_ETEasy"
    data-value-separator="<?= $Page->ETEasy->displayValueSeparatorAttribute() ?>"
    <?= $Page->ETEasy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETEasy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETEasy[]" id="o<?= $Page->RowIndex ?>_ETEasy[]" value="<?= HtmlEncode($Page->ETEasy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEasy" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_ETEasy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="x<?= $Page->RowIndex ?>_ETEasy" id="x<?= $Page->RowIndex ?>_ETEasy"<?= $Page->ETEasy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_ETEasy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_ETEasy[]"
    name="x<?= $Page->RowIndex ?>_ETEasy[]"
    value="<?= HtmlEncode($Page->ETEasy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_ETEasy"
    data-target="dsl_x<?= $Page->RowIndex ?>_ETEasy"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ETEasy->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_ETEasy"
    data-value-separator="<?= $Page->ETEasy->displayValueSeparatorAttribute() ?>"
    <?= $Page->ETEasy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETEasy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEasy">
<span<?= $Page->ETEasy->viewAttributes() ?>>
<?= $Page->ETEasy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ETComments->Visible) { // ETComments ?>
        <td data-name="ETComments" <?= $Page->ETComments->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETComments" class="form-group">
<input type="<?= $Page->ETComments->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?= $Page->RowIndex ?>_ETComments" id="x<?= $Page->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETComments->getPlaceHolder()) ?>" value="<?= $Page->ETComments->EditValue ?>"<?= $Page->ETComments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETComments->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETComments" id="o<?= $Page->RowIndex ?>_ETComments" value="<?= HtmlEncode($Page->ETComments->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETComments" class="form-group">
<input type="<?= $Page->ETComments->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?= $Page->RowIndex ?>_ETComments" id="x<?= $Page->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETComments->getPlaceHolder()) ?>" value="<?= $Page->ETComments->EditValue ?>"<?= $Page->ETComments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETComments->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETComments">
<span<?= $Page->ETComments->viewAttributes() ?>>
<?= $Page->ETComments->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
        <td data-name="ETDoctor" <?= $Page->ETDoctor->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDoctor" class="form-group">
<input type="<?= $Page->ETDoctor->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?= $Page->RowIndex ?>_ETDoctor" id="x<?= $Page->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETDoctor->getPlaceHolder()) ?>" value="<?= $Page->ETDoctor->EditValue ?>"<?= $Page->ETDoctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETDoctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETDoctor" id="o<?= $Page->RowIndex ?>_ETDoctor" value="<?= HtmlEncode($Page->ETDoctor->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDoctor" class="form-group">
<input type="<?= $Page->ETDoctor->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?= $Page->RowIndex ?>_ETDoctor" id="x<?= $Page->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETDoctor->getPlaceHolder()) ?>" value="<?= $Page->ETDoctor->EditValue ?>"<?= $Page->ETDoctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETDoctor->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDoctor">
<span<?= $Page->ETDoctor->viewAttributes() ?>>
<?= $Page->ETDoctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <td data-name="ETEmbryologist" <?= $Page->ETEmbryologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEmbryologist" class="form-group">
<input type="<?= $Page->ETEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?= $Page->RowIndex ?>_ETEmbryologist" id="x<?= $Page->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->ETEmbryologist->EditValue ?>"<?= $Page->ETEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETEmbryologist" id="o<?= $Page->RowIndex ?>_ETEmbryologist" value="<?= HtmlEncode($Page->ETEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEmbryologist" class="form-group">
<input type="<?= $Page->ETEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?= $Page->RowIndex ?>_ETEmbryologist" id="x<?= $Page->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->ETEmbryologist->EditValue ?>"<?= $Page->ETEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEmbryologist">
<span<?= $Page->ETEmbryologist->viewAttributes() ?>>
<?= $Page->ETEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ETDate->Visible) { // ETDate ?>
        <td data-name="ETDate" <?= $Page->ETDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDate" class="form-group">
<input type="<?= $Page->ETDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?= $Page->RowIndex ?>_ETDate" id="x<?= $Page->RowIndex ?>_ETDate" placeholder="<?= HtmlEncode($Page->ETDate->getPlaceHolder()) ?>" value="<?= $Page->ETDate->EditValue ?>"<?= $Page->ETDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETDate->getErrorMessage() ?></div>
<?php if (!$Page->ETDate->ReadOnly && !$Page->ETDate->Disabled && !isset($Page->ETDate->EditAttrs["readonly"]) && !isset($Page->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETDate" id="o<?= $Page->RowIndex ?>_ETDate" value="<?= HtmlEncode($Page->ETDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDate" class="form-group">
<input type="<?= $Page->ETDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?= $Page->RowIndex ?>_ETDate" id="x<?= $Page->RowIndex ?>_ETDate" placeholder="<?= HtmlEncode($Page->ETDate->getPlaceHolder()) ?>" value="<?= $Page->ETDate->EditValue ?>"<?= $Page->ETDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETDate->getErrorMessage() ?></div>
<?php if (!$Page->ETDate->ReadOnly && !$Page->ETDate->Disabled && !isset($Page->ETDate->EditAttrs["readonly"]) && !isset($Page->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDate">
<span<?= $Page->ETDate->viewAttributes() ?>>
<?= $Page->ETDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day1End->Visible) { // Day1End ?>
        <td data-name="Day1End" <?= $Page->Day1End->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1End" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1End"
        name="x<?= $Page->RowIndex ?>_Day1End"
        class="form-control ew-select<?= $Page->Day1End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End"
        data-table="ivf_embryology_chart"
        data-field="x_Day1End"
        data-value-separator="<?= $Page->Day1End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1End->getPlaceHolder()) ?>"
        <?= $Page->Day1End->editAttributes() ?>>
        <?= $Page->Day1End->selectOptionListHtml("x{$Page->RowIndex}_Day1End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1End" id="o<?= $Page->RowIndex ?>_Day1End" value="<?= HtmlEncode($Page->Day1End->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1End" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day1End"
        name="x<?= $Page->RowIndex ?>_Day1End"
        class="form-control ew-select<?= $Page->Day1End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End"
        data-table="ivf_embryology_chart"
        data-field="x_Day1End"
        data-value-separator="<?= $Page->Day1End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1End->getPlaceHolder()) ?>"
        <?= $Page->Day1End->editAttributes() ?>>
        <?= $Page->Day1End->selectOptionListHtml("x{$Page->RowIndex}_Day1End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1End">
<span<?= $Page->Day1End->viewAttributes() ?>>
<?= $Page->Day1End->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist","load"], function () {
    fivf_embryology_chartlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Page->isGridAdd())
        if (!$Page->Recordset->EOF) {
            $Page->Recordset->moveNext();
        }
}
?>
<?php
    if ($Page->isGridAdd() || $Page->isGridEdit()) {
        $Page->RowIndex = '$rowindex$';
        $Page->loadRowValues();

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_ivf_embryology_chart", "data-rowtype" => ROWTYPE_ADD]);
        $Page->RowAttrs->appendClass("ew-template");
        $Page->RowType = ROWTYPE_ADD;

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
        $Page->StartRowCount = 0;
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowIndex);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el$rowindex$_ivf_embryology_chart_id" class="form-group ivf_embryology_chart_id"></span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo">
<?php if ($Page->RIDNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNo->getDisplayValue($Page->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_RIDNo" name="x<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x<?= $Page->RowIndex ?>_RIDNo" id="x<?= $Page->RowIndex ?>_RIDNo" size="4" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_RIDNo" id="o<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name">
<?php if ($Page->Name->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Name->getDisplayValue($Page->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Name" name="x<?= $Page->RowIndex ?>_Name" value="<?= HtmlEncode($Page->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Name" name="x<?= $Page->RowIndex ?>_Name" id="x<?= $Page->RowIndex ?>_Name" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Name" id="o<?= $Page->RowIndex ?>_Name" value="<?= HtmlEncode($Page->Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td data-name="ARTCycle">
<span id="el$rowindex$_ivf_embryology_chart_ARTCycle" class="form-group ivf_embryology_chart_ARTCycle">
<input type="<?= $Page->ARTCycle->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x<?= $Page->RowIndex ?>_ARTCycle" id="x<?= $Page->RowIndex ?>_ARTCycle" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>" value="<?= $Page->ARTCycle->EditValue ?>"<?= $Page->ARTCycle->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" data-hidden="1" name="o<?= $Page->RowIndex ?>_ARTCycle" id="o<?= $Page->RowIndex ?>_ARTCycle" value="<?= HtmlEncode($Page->ARTCycle->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
        <td data-name="SpermOrigin">
<span id="el$rowindex$_ivf_embryology_chart_SpermOrigin" class="form-group ivf_embryology_chart_SpermOrigin">
<input type="<?= $Page->SpermOrigin->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?= $Page->RowIndex ?>_SpermOrigin" id="x<?= $Page->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SpermOrigin->getPlaceHolder()) ?>" value="<?= $Page->SpermOrigin->EditValue ?>"<?= $Page->SpermOrigin->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SpermOrigin->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" data-hidden="1" name="o<?= $Page->RowIndex ?>_SpermOrigin" id="o<?= $Page->RowIndex ?>_SpermOrigin" value="<?= HtmlEncode($Page->SpermOrigin->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td data-name="InseminatinTechnique">
<span id="el$rowindex$_ivf_embryology_chart_InseminatinTechnique" class="form-group ivf_embryology_chart_InseminatinTechnique">
<input type="<?= $Page->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?= $Page->RowIndex ?>_InseminatinTechnique" id="x<?= $Page->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Page->InseminatinTechnique->EditValue ?>"<?= $Page->InseminatinTechnique->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->InseminatinTechnique->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" data-hidden="1" name="o<?= $Page->RowIndex ?>_InseminatinTechnique" id="o<?= $Page->RowIndex ?>_InseminatinTechnique" value="<?= HtmlEncode($Page->InseminatinTechnique->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <td data-name="IndicationForART">
<span id="el$rowindex$_ivf_embryology_chart_IndicationForART" class="form-group ivf_embryology_chart_IndicationForART">
<input type="<?= $Page->IndicationForART->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?= $Page->RowIndex ?>_IndicationForART" id="x<?= $Page->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->IndicationForART->getPlaceHolder()) ?>" value="<?= $Page->IndicationForART->EditValue ?>"<?= $Page->IndicationForART->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IndicationForART->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" data-hidden="1" name="o<?= $Page->RowIndex ?>_IndicationForART" id="o<?= $Page->RowIndex ?>_IndicationForART" value="<?= HtmlEncode($Page->IndicationForART->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <td data-name="Day0sino">
<span id="el$rowindex$_ivf_embryology_chart_Day0sino" class="form-group ivf_embryology_chart_Day0sino">
<input type="<?= $Page->Day0sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?= $Page->RowIndex ?>_Day0sino" id="x<?= $Page->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0sino->getPlaceHolder()) ?>" value="<?= $Page->Day0sino->EditValue ?>"<?= $Page->Day0sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0sino->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0sino" id="o<?= $Page->RowIndex ?>_Day0sino" value="<?= HtmlEncode($Page->Day0sino->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td data-name="Day0OocyteStage">
<span id="el$rowindex$_ivf_embryology_chart_Day0OocyteStage" class="form-group ivf_embryology_chart_Day0OocyteStage">
<input type="<?= $Page->Day0OocyteStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?= $Page->RowIndex ?>_Day0OocyteStage" id="x<?= $Page->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Page->Day0OocyteStage->EditValue ?>"<?= $Page->Day0OocyteStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0OocyteStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0OocyteStage" id="o<?= $Page->RowIndex ?>_Day0OocyteStage" value="<?= HtmlEncode($Page->Day0OocyteStage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <td data-name="Day0PolarBodyPosition">
<span id="el$rowindex$_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group ivf_embryology_chart_Day0PolarBodyPosition">
    <select
        id="x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        name="x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        class="form-control ew-select<?= $Page->Day0PolarBodyPosition->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition"
        data-table="ivf_embryology_chart"
        data-field="x_Day0PolarBodyPosition"
        data-value-separator="<?= $Page->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0PolarBodyPosition->getPlaceHolder()) ?>"
        <?= $Page->Day0PolarBodyPosition->editAttributes() ?>>
        <?= $Page->Day0PolarBodyPosition->selectOptionListHtml("x{$Page->RowIndex}_Day0PolarBodyPosition") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0PolarBodyPosition->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0PolarBodyPosition", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0PolarBodyPosition", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0PolarBodyPosition.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0PolarBodyPosition" id="o<?= $Page->RowIndex ?>_Day0PolarBodyPosition" value="<?= HtmlEncode($Page->Day0PolarBodyPosition->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
        <td data-name="Day0Breakage">
<span id="el$rowindex$_ivf_embryology_chart_Day0Breakage" class="form-group ivf_embryology_chart_Day0Breakage">
    <select
        id="x<?= $Page->RowIndex ?>_Day0Breakage"
        name="x<?= $Page->RowIndex ?>_Day0Breakage"
        class="form-control ew-select<?= $Page->Day0Breakage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Breakage"
        data-value-separator="<?= $Page->Day0Breakage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0Breakage->getPlaceHolder()) ?>"
        <?= $Page->Day0Breakage->editAttributes() ?>>
        <?= $Page->Day0Breakage->selectOptionListHtml("x{$Page->RowIndex}_Day0Breakage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0Breakage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0Breakage", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Breakage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Breakage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0Breakage" id="o<?= $Page->RowIndex ?>_Day0Breakage" value="<?= HtmlEncode($Page->Day0Breakage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
        <td data-name="Day0Attempts">
<span id="el$rowindex$_ivf_embryology_chart_Day0Attempts" class="form-group ivf_embryology_chart_Day0Attempts">
    <select
        id="x<?= $Page->RowIndex ?>_Day0Attempts"
        name="x<?= $Page->RowIndex ?>_Day0Attempts"
        class="form-control ew-select<?= $Page->Day0Attempts->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts"
        data-table="ivf_embryology_chart"
        data-field="x_Day0Attempts"
        data-value-separator="<?= $Page->Day0Attempts->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0Attempts->getPlaceHolder()) ?>"
        <?= $Page->Day0Attempts->editAttributes() ?>>
        <?= $Page->Day0Attempts->selectOptionListHtml("x{$Page->RowIndex}_Day0Attempts") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0Attempts->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0Attempts", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0Attempts", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0Attempts.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0Attempts" id="o<?= $Page->RowIndex ?>_Day0Attempts" value="<?= HtmlEncode($Page->Day0Attempts->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <td data-name="Day0SPZMorpho">
<span id="el$rowindex$_ivf_embryology_chart_Day0SPZMorpho" class="form-group ivf_embryology_chart_Day0SPZMorpho">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        name="x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        class="form-control ew-select<?= $Page->Day0SPZMorpho->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZMorpho"
        data-value-separator="<?= $Page->Day0SPZMorpho->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SPZMorpho->getPlaceHolder()) ?>"
        <?= $Page->Day0SPZMorpho->editAttributes() ?>>
        <?= $Page->Day0SPZMorpho->selectOptionListHtml("x{$Page->RowIndex}_Day0SPZMorpho") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SPZMorpho->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SPZMorpho", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZMorpho", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZMorpho.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0SPZMorpho" id="o<?= $Page->RowIndex ?>_Day0SPZMorpho" value="<?= HtmlEncode($Page->Day0SPZMorpho->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <td data-name="Day0SPZLocation">
<span id="el$rowindex$_ivf_embryology_chart_Day0SPZLocation" class="form-group ivf_embryology_chart_Day0SPZLocation">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SPZLocation"
        name="x<?= $Page->RowIndex ?>_Day0SPZLocation"
        class="form-control ew-select<?= $Page->Day0SPZLocation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SPZLocation"
        data-value-separator="<?= $Page->Day0SPZLocation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SPZLocation->getPlaceHolder()) ?>"
        <?= $Page->Day0SPZLocation->editAttributes() ?>>
        <?= $Page->Day0SPZLocation->selectOptionListHtml("x{$Page->RowIndex}_Day0SPZLocation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SPZLocation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SPZLocation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SPZLocation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SPZLocation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0SPZLocation" id="o<?= $Page->RowIndex ?>_Day0SPZLocation" value="<?= HtmlEncode($Page->Day0SPZLocation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <td data-name="Day0SpOrgin">
<span id="el$rowindex$_ivf_embryology_chart_Day0SpOrgin" class="form-group ivf_embryology_chart_Day0SpOrgin">
    <select
        id="x<?= $Page->RowIndex ?>_Day0SpOrgin"
        name="x<?= $Page->RowIndex ?>_Day0SpOrgin"
        class="form-control ew-select<?= $Page->Day0SpOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin"
        data-table="ivf_embryology_chart"
        data-field="x_Day0SpOrgin"
        data-value-separator="<?= $Page->Day0SpOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day0SpOrgin->getPlaceHolder()) ?>"
        <?= $Page->Day0SpOrgin->editAttributes() ?>>
        <?= $Page->Day0SpOrgin->selectOptionListHtml("x{$Page->RowIndex}_Day0SpOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day0SpOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day0SpOrgin", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day0SpOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day0SpOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0SpOrgin" id="o<?= $Page->RowIndex ?>_Day0SpOrgin" value="<?= HtmlEncode($Page->Day0SpOrgin->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <td data-name="Day5Cryoptop">
<span id="el$rowindex$_ivf_embryology_chart_Day5Cryoptop" class="form-group ivf_embryology_chart_Day5Cryoptop">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day5Cryoptop"
        class="form-control ew-select<?= $Page->Day5Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Cryoptop"
        data-value-separator="<?= $Page->Day5Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day5Cryoptop->editAttributes() ?>>
        <?= $Page->Day5Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day5Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Cryoptop" id="o<?= $Page->RowIndex ?>_Day5Cryoptop" value="<?= HtmlEncode($Page->Day5Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
        <td data-name="Day1Sperm">
<span id="el$rowindex$_ivf_embryology_chart_Day1Sperm" class="form-group ivf_embryology_chart_Day1Sperm">
<input type="<?= $Page->Day1Sperm->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?= $Page->RowIndex ?>_Day1Sperm" id="x<?= $Page->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day1Sperm->getPlaceHolder()) ?>" value="<?= $Page->Day1Sperm->EditValue ?>"<?= $Page->Day1Sperm->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day1Sperm->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Sperm" id="o<?= $Page->RowIndex ?>_Day1Sperm" value="<?= HtmlEncode($Page->Day1Sperm->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1PN->Visible) { // Day1PN ?>
        <td data-name="Day1PN">
<span id="el$rowindex$_ivf_embryology_chart_Day1PN" class="form-group ivf_embryology_chart_Day1PN">
    <select
        id="x<?= $Page->RowIndex ?>_Day1PN"
        name="x<?= $Page->RowIndex ?>_Day1PN"
        class="form-control ew-select<?= $Page->Day1PN->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PN"
        data-value-separator="<?= $Page->Day1PN->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1PN->getPlaceHolder()) ?>"
        <?= $Page->Day1PN->editAttributes() ?>>
        <?= $Page->Day1PN->selectOptionListHtml("x{$Page->RowIndex}_Day1PN") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1PN->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1PN", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PN", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PN.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PN.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1PN" id="o<?= $Page->RowIndex ?>_Day1PN" value="<?= HtmlEncode($Page->Day1PN->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1PB->Visible) { // Day1PB ?>
        <td data-name="Day1PB">
<span id="el$rowindex$_ivf_embryology_chart_Day1PB" class="form-group ivf_embryology_chart_Day1PB">
    <select
        id="x<?= $Page->RowIndex ?>_Day1PB"
        name="x<?= $Page->RowIndex ?>_Day1PB"
        class="form-control ew-select<?= $Page->Day1PB->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB"
        data-table="ivf_embryology_chart"
        data-field="x_Day1PB"
        data-value-separator="<?= $Page->Day1PB->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1PB->getPlaceHolder()) ?>"
        <?= $Page->Day1PB->editAttributes() ?>>
        <?= $Page->Day1PB->selectOptionListHtml("x{$Page->RowIndex}_Day1PB") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1PB->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1PB", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1PB", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1PB.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1PB.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1PB" id="o<?= $Page->RowIndex ?>_Day1PB" value="<?= HtmlEncode($Page->Day1PB->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <td data-name="Day1Pronucleus">
<span id="el$rowindex$_ivf_embryology_chart_Day1Pronucleus" class="form-group ivf_embryology_chart_Day1Pronucleus">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Pronucleus"
        name="x<?= $Page->RowIndex ?>_Day1Pronucleus"
        class="form-control ew-select<?= $Page->Day1Pronucleus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Pronucleus"
        data-value-separator="<?= $Page->Day1Pronucleus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Pronucleus->getPlaceHolder()) ?>"
        <?= $Page->Day1Pronucleus->editAttributes() ?>>
        <?= $Page->Day1Pronucleus->selectOptionListHtml("x{$Page->RowIndex}_Day1Pronucleus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Pronucleus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Pronucleus", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Pronucleus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Pronucleus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Pronucleus" id="o<?= $Page->RowIndex ?>_Day1Pronucleus" value="<?= HtmlEncode($Page->Day1Pronucleus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <td data-name="Day1Nucleolus">
<span id="el$rowindex$_ivf_embryology_chart_Day1Nucleolus" class="form-group ivf_embryology_chart_Day1Nucleolus">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Nucleolus"
        name="x<?= $Page->RowIndex ?>_Day1Nucleolus"
        class="form-control ew-select<?= $Page->Day1Nucleolus->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Nucleolus"
        data-value-separator="<?= $Page->Day1Nucleolus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Nucleolus->getPlaceHolder()) ?>"
        <?= $Page->Day1Nucleolus->editAttributes() ?>>
        <?= $Page->Day1Nucleolus->selectOptionListHtml("x{$Page->RowIndex}_Day1Nucleolus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Nucleolus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Nucleolus", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Nucleolus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Nucleolus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Nucleolus" id="o<?= $Page->RowIndex ?>_Day1Nucleolus" value="<?= HtmlEncode($Page->Day1Nucleolus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
        <td data-name="Day1Halo">
<span id="el$rowindex$_ivf_embryology_chart_Day1Halo" class="form-group ivf_embryology_chart_Day1Halo">
    <select
        id="x<?= $Page->RowIndex ?>_Day1Halo"
        name="x<?= $Page->RowIndex ?>_Day1Halo"
        class="form-control ew-select<?= $Page->Day1Halo->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo"
        data-table="ivf_embryology_chart"
        data-field="x_Day1Halo"
        data-value-separator="<?= $Page->Day1Halo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1Halo->getPlaceHolder()) ?>"
        <?= $Page->Day1Halo->editAttributes() ?>>
        <?= $Page->Day1Halo->selectOptionListHtml("x{$Page->RowIndex}_Day1Halo") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1Halo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1Halo", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1Halo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1Halo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1Halo" id="o<?= $Page->RowIndex ?>_Day1Halo" value="<?= HtmlEncode($Page->Day1Halo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
        <td data-name="Day2SiNo">
<span id="el$rowindex$_ivf_embryology_chart_Day2SiNo" class="form-group ivf_embryology_chart_Day2SiNo">
<input type="<?= $Page->Day2SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?= $Page->RowIndex ?>_Day2SiNo" id="x<?= $Page->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2SiNo->getPlaceHolder()) ?>" value="<?= $Page->Day2SiNo->EditValue ?>"<?= $Page->Day2SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2SiNo" id="o<?= $Page->RowIndex ?>_Day2SiNo" value="<?= HtmlEncode($Page->Day2SiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
        <td data-name="Day2CellNo">
<span id="el$rowindex$_ivf_embryology_chart_Day2CellNo" class="form-group ivf_embryology_chart_Day2CellNo">
<input type="<?= $Page->Day2CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?= $Page->RowIndex ?>_Day2CellNo" id="x<?= $Page->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day2CellNo->EditValue ?>"<?= $Page->Day2CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2CellNo" id="o<?= $Page->RowIndex ?>_Day2CellNo" value="<?= HtmlEncode($Page->Day2CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
        <td data-name="Day2Frag">
<span id="el$rowindex$_ivf_embryology_chart_Day2Frag" class="form-group ivf_embryology_chart_Day2Frag">
<input type="<?= $Page->Day2Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?= $Page->RowIndex ?>_Day2Frag" id="x<?= $Page->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Frag->getPlaceHolder()) ?>" value="<?= $Page->Day2Frag->EditValue ?>"<?= $Page->Day2Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Frag->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Frag" id="o<?= $Page->RowIndex ?>_Day2Frag" value="<?= HtmlEncode($Page->Day2Frag->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <td data-name="Day2Symmetry">
<span id="el$rowindex$_ivf_embryology_chart_Day2Symmetry" class="form-group ivf_embryology_chart_Day2Symmetry">
<input type="<?= $Page->Day2Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?= $Page->RowIndex ?>_Day2Symmetry" id="x<?= $Page->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Symmetry->getPlaceHolder()) ?>" value="<?= $Page->Day2Symmetry->EditValue ?>"<?= $Page->Day2Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Symmetry->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Symmetry" id="o<?= $Page->RowIndex ?>_Day2Symmetry" value="<?= HtmlEncode($Page->Day2Symmetry->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <td data-name="Day2Cryoptop">
<span id="el$rowindex$_ivf_embryology_chart_Day2Cryoptop" class="form-group ivf_embryology_chart_Day2Cryoptop">
<input type="<?= $Page->Day2Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?= $Page->RowIndex ?>_Day2Cryoptop" id="x<?= $Page->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Cryoptop->getPlaceHolder()) ?>" value="<?= $Page->Day2Cryoptop->EditValue ?>"<?= $Page->Day2Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Cryoptop->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Cryoptop" id="o<?= $Page->RowIndex ?>_Day2Cryoptop" value="<?= HtmlEncode($Page->Day2Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
        <td data-name="Day2Grade">
<span id="el$rowindex$_ivf_embryology_chart_Day2Grade" class="form-group ivf_embryology_chart_Day2Grade">
<input type="<?= $Page->Day2Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?= $Page->RowIndex ?>_Day2Grade" id="x<?= $Page->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2Grade->getPlaceHolder()) ?>" value="<?= $Page->Day2Grade->EditValue ?>"<?= $Page->Day2Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day2Grade->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2Grade" id="o<?= $Page->RowIndex ?>_Day2Grade" value="<?= HtmlEncode($Page->Day2Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day2End->Visible) { // Day2End ?>
        <td data-name="Day2End">
<span id="el$rowindex$_ivf_embryology_chart_Day2End" class="form-group ivf_embryology_chart_Day2End">
    <select
        id="x<?= $Page->RowIndex ?>_Day2End"
        name="x<?= $Page->RowIndex ?>_Day2End"
        class="form-control ew-select<?= $Page->Day2End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End"
        data-table="ivf_embryology_chart"
        data-field="x_Day2End"
        data-value-separator="<?= $Page->Day2End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day2End->getPlaceHolder()) ?>"
        <?= $Page->Day2End->editAttributes() ?>>
        <?= $Page->Day2End->selectOptionListHtml("x{$Page->RowIndex}_Day2End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day2End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day2End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day2End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day2End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day2End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day2End" id="o<?= $Page->RowIndex ?>_Day2End" value="<?= HtmlEncode($Page->Day2End->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
        <td data-name="Day3Sino">
<span id="el$rowindex$_ivf_embryology_chart_Day3Sino" class="form-group ivf_embryology_chart_Day3Sino">
<input type="<?= $Page->Day3Sino->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?= $Page->RowIndex ?>_Day3Sino" id="x<?= $Page->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3Sino->getPlaceHolder()) ?>" value="<?= $Page->Day3Sino->EditValue ?>"<?= $Page->Day3Sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day3Sino->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Sino" id="o<?= $Page->RowIndex ?>_Day3Sino" value="<?= HtmlEncode($Page->Day3Sino->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
        <td data-name="Day3CellNo">
<span id="el$rowindex$_ivf_embryology_chart_Day3CellNo" class="form-group ivf_embryology_chart_Day3CellNo">
<input type="<?= $Page->Day3CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?= $Page->RowIndex ?>_Day3CellNo" id="x<?= $Page->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day3CellNo->EditValue ?>"<?= $Page->Day3CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day3CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3CellNo" id="o<?= $Page->RowIndex ?>_Day3CellNo" value="<?= HtmlEncode($Page->Day3CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
        <td data-name="Day3Frag">
<span id="el$rowindex$_ivf_embryology_chart_Day3Frag" class="form-group ivf_embryology_chart_Day3Frag">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Frag"
        name="x<?= $Page->RowIndex ?>_Day3Frag"
        class="form-control ew-select<?= $Page->Day3Frag->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Frag"
        data-value-separator="<?= $Page->Day3Frag->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Frag->getPlaceHolder()) ?>"
        <?= $Page->Day3Frag->editAttributes() ?>>
        <?= $Page->Day3Frag->selectOptionListHtml("x{$Page->RowIndex}_Day3Frag") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Frag->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Frag", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Frag", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Frag.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Frag" id="o<?= $Page->RowIndex ?>_Day3Frag" value="<?= HtmlEncode($Page->Day3Frag->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <td data-name="Day3Symmetry">
<span id="el$rowindex$_ivf_embryology_chart_Day3Symmetry" class="form-group ivf_embryology_chart_Day3Symmetry">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Symmetry"
        name="x<?= $Page->RowIndex ?>_Day3Symmetry"
        class="form-control ew-select<?= $Page->Day3Symmetry->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Symmetry"
        data-value-separator="<?= $Page->Day3Symmetry->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Symmetry->getPlaceHolder()) ?>"
        <?= $Page->Day3Symmetry->editAttributes() ?>>
        <?= $Page->Day3Symmetry->selectOptionListHtml("x{$Page->RowIndex}_Day3Symmetry") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Symmetry->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Symmetry", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Symmetry", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Symmetry.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Symmetry" id="o<?= $Page->RowIndex ?>_Day3Symmetry" value="<?= HtmlEncode($Page->Day3Symmetry->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
        <td data-name="Day3ZP">
<span id="el$rowindex$_ivf_embryology_chart_Day3ZP" class="form-group ivf_embryology_chart_Day3ZP">
    <select
        id="x<?= $Page->RowIndex ?>_Day3ZP"
        name="x<?= $Page->RowIndex ?>_Day3ZP"
        class="form-control ew-select<?= $Page->Day3ZP->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP"
        data-table="ivf_embryology_chart"
        data-field="x_Day3ZP"
        data-value-separator="<?= $Page->Day3ZP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3ZP->getPlaceHolder()) ?>"
        <?= $Page->Day3ZP->editAttributes() ?>>
        <?= $Page->Day3ZP->selectOptionListHtml("x{$Page->RowIndex}_Day3ZP") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3ZP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3ZP", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3ZP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3ZP.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3ZP" id="o<?= $Page->RowIndex ?>_Day3ZP" value="<?= HtmlEncode($Page->Day3ZP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <td data-name="Day3Vacoules">
<span id="el$rowindex$_ivf_embryology_chart_Day3Vacoules" class="form-group ivf_embryology_chart_Day3Vacoules">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Vacoules"
        name="x<?= $Page->RowIndex ?>_Day3Vacoules"
        class="form-control ew-select<?= $Page->Day3Vacoules->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Vacoules"
        data-value-separator="<?= $Page->Day3Vacoules->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Vacoules->getPlaceHolder()) ?>"
        <?= $Page->Day3Vacoules->editAttributes() ?>>
        <?= $Page->Day3Vacoules->selectOptionListHtml("x{$Page->RowIndex}_Day3Vacoules") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Vacoules->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Vacoules", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Vacoules", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Vacoules.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Vacoules" id="o<?= $Page->RowIndex ?>_Day3Vacoules" value="<?= HtmlEncode($Page->Day3Vacoules->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
        <td data-name="Day3Grade">
<span id="el$rowindex$_ivf_embryology_chart_Day3Grade" class="form-group ivf_embryology_chart_Day3Grade">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Grade"
        name="x<?= $Page->RowIndex ?>_Day3Grade"
        class="form-control ew-select<?= $Page->Day3Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Grade"
        data-value-separator="<?= $Page->Day3Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Grade->getPlaceHolder()) ?>"
        <?= $Page->Day3Grade->editAttributes() ?>>
        <?= $Page->Day3Grade->selectOptionListHtml("x{$Page->RowIndex}_Day3Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Grade" id="o<?= $Page->RowIndex ?>_Day3Grade" value="<?= HtmlEncode($Page->Day3Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <td data-name="Day3Cryoptop">
<span id="el$rowindex$_ivf_embryology_chart_Day3Cryoptop" class="form-group ivf_embryology_chart_Day3Cryoptop">
    <select
        id="x<?= $Page->RowIndex ?>_Day3Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day3Cryoptop"
        class="form-control ew-select<?= $Page->Day3Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day3Cryoptop"
        data-value-separator="<?= $Page->Day3Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day3Cryoptop->editAttributes() ?>>
        <?= $Page->Day3Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day3Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3Cryoptop" id="o<?= $Page->RowIndex ?>_Day3Cryoptop" value="<?= HtmlEncode($Page->Day3Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day3End->Visible) { // Day3End ?>
        <td data-name="Day3End">
<span id="el$rowindex$_ivf_embryology_chart_Day3End" class="form-group ivf_embryology_chart_Day3End">
    <select
        id="x<?= $Page->RowIndex ?>_Day3End"
        name="x<?= $Page->RowIndex ?>_Day3End"
        class="form-control ew-select<?= $Page->Day3End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End"
        data-table="ivf_embryology_chart"
        data-field="x_Day3End"
        data-value-separator="<?= $Page->Day3End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3End->getPlaceHolder()) ?>"
        <?= $Page->Day3End->editAttributes() ?>>
        <?= $Page->Day3End->selectOptionListHtml("x{$Page->RowIndex}_Day3End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day3End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day3End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day3End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day3End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day3End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day3End" id="o<?= $Page->RowIndex ?>_Day3End" value="<?= HtmlEncode($Page->Day3End->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
        <td data-name="Day4SiNo">
<span id="el$rowindex$_ivf_embryology_chart_Day4SiNo" class="form-group ivf_embryology_chart_Day4SiNo">
<input type="<?= $Page->Day4SiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?= $Page->RowIndex ?>_Day4SiNo" id="x<?= $Page->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4SiNo->getPlaceHolder()) ?>" value="<?= $Page->Day4SiNo->EditValue ?>"<?= $Page->Day4SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4SiNo" id="o<?= $Page->RowIndex ?>_Day4SiNo" value="<?= HtmlEncode($Page->Day4SiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
        <td data-name="Day4CellNo">
<span id="el$rowindex$_ivf_embryology_chart_Day4CellNo" class="form-group ivf_embryology_chart_Day4CellNo">
<input type="<?= $Page->Day4CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?= $Page->RowIndex ?>_Day4CellNo" id="x<?= $Page->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day4CellNo->EditValue ?>"<?= $Page->Day4CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4CellNo" id="o<?= $Page->RowIndex ?>_Day4CellNo" value="<?= HtmlEncode($Page->Day4CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
        <td data-name="Day4Frag">
<span id="el$rowindex$_ivf_embryology_chart_Day4Frag" class="form-group ivf_embryology_chart_Day4Frag">
<input type="<?= $Page->Day4Frag->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?= $Page->RowIndex ?>_Day4Frag" id="x<?= $Page->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Frag->getPlaceHolder()) ?>" value="<?= $Page->Day4Frag->EditValue ?>"<?= $Page->Day4Frag->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Frag->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Frag" id="o<?= $Page->RowIndex ?>_Day4Frag" value="<?= HtmlEncode($Page->Day4Frag->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <td data-name="Day4Symmetry">
<span id="el$rowindex$_ivf_embryology_chart_Day4Symmetry" class="form-group ivf_embryology_chart_Day4Symmetry">
<input type="<?= $Page->Day4Symmetry->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?= $Page->RowIndex ?>_Day4Symmetry" id="x<?= $Page->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Symmetry->getPlaceHolder()) ?>" value="<?= $Page->Day4Symmetry->EditValue ?>"<?= $Page->Day4Symmetry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Symmetry->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Symmetry" id="o<?= $Page->RowIndex ?>_Day4Symmetry" value="<?= HtmlEncode($Page->Day4Symmetry->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
        <td data-name="Day4Grade">
<span id="el$rowindex$_ivf_embryology_chart_Day4Grade" class="form-group ivf_embryology_chart_Day4Grade">
<input type="<?= $Page->Day4Grade->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?= $Page->RowIndex ?>_Day4Grade" id="x<?= $Page->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4Grade->getPlaceHolder()) ?>" value="<?= $Page->Day4Grade->EditValue ?>"<?= $Page->Day4Grade->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day4Grade->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Grade" id="o<?= $Page->RowIndex ?>_Day4Grade" value="<?= HtmlEncode($Page->Day4Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <td data-name="Day4Cryoptop">
<span id="el$rowindex$_ivf_embryology_chart_Day4Cryoptop" class="form-group ivf_embryology_chart_Day4Cryoptop">
    <select
        id="x<?= $Page->RowIndex ?>_Day4Cryoptop"
        name="x<?= $Page->RowIndex ?>_Day4Cryoptop"
        class="form-control ew-select<?= $Page->Day4Cryoptop->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop"
        data-table="ivf_embryology_chart"
        data-field="x_Day4Cryoptop"
        data-value-separator="<?= $Page->Day4Cryoptop->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4Cryoptop->getPlaceHolder()) ?>"
        <?= $Page->Day4Cryoptop->editAttributes() ?>>
        <?= $Page->Day4Cryoptop->selectOptionListHtml("x{$Page->RowIndex}_Day4Cryoptop") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day4Cryoptop->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day4Cryoptop", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4Cryoptop", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4Cryoptop.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4Cryoptop" id="o<?= $Page->RowIndex ?>_Day4Cryoptop" value="<?= HtmlEncode($Page->Day4Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day4End->Visible) { // Day4End ?>
        <td data-name="Day4End">
<span id="el$rowindex$_ivf_embryology_chart_Day4End" class="form-group ivf_embryology_chart_Day4End">
    <select
        id="x<?= $Page->RowIndex ?>_Day4End"
        name="x<?= $Page->RowIndex ?>_Day4End"
        class="form-control ew-select<?= $Page->Day4End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End"
        data-table="ivf_embryology_chart"
        data-field="x_Day4End"
        data-value-separator="<?= $Page->Day4End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4End->getPlaceHolder()) ?>"
        <?= $Page->Day4End->editAttributes() ?>>
        <?= $Page->Day4End->selectOptionListHtml("x{$Page->RowIndex}_Day4End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day4End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day4End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day4End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day4End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day4End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day4End" id="o<?= $Page->RowIndex ?>_Day4End" value="<?= HtmlEncode($Page->Day4End->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
        <td data-name="Day5CellNo">
<span id="el$rowindex$_ivf_embryology_chart_Day5CellNo" class="form-group ivf_embryology_chart_Day5CellNo">
<input type="<?= $Page->Day5CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?= $Page->RowIndex ?>_Day5CellNo" id="x<?= $Page->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day5CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day5CellNo->EditValue ?>"<?= $Page->Day5CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day5CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5CellNo" id="o<?= $Page->RowIndex ?>_Day5CellNo" value="<?= HtmlEncode($Page->Day5CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
        <td data-name="Day5ICM">
<span id="el$rowindex$_ivf_embryology_chart_Day5ICM" class="form-group ivf_embryology_chart_Day5ICM">
    <select
        id="x<?= $Page->RowIndex ?>_Day5ICM"
        name="x<?= $Page->RowIndex ?>_Day5ICM"
        class="form-control ew-select<?= $Page->Day5ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day5ICM"
        data-value-separator="<?= $Page->Day5ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5ICM->getPlaceHolder()) ?>"
        <?= $Page->Day5ICM->editAttributes() ?>>
        <?= $Page->Day5ICM->selectOptionListHtml("x{$Page->RowIndex}_Day5ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5ICM", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5ICM" id="o<?= $Page->RowIndex ?>_Day5ICM" value="<?= HtmlEncode($Page->Day5ICM->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5TE->Visible) { // Day5TE ?>
        <td data-name="Day5TE">
<span id="el$rowindex$_ivf_embryology_chart_Day5TE" class="form-group ivf_embryology_chart_Day5TE">
    <select
        id="x<?= $Page->RowIndex ?>_Day5TE"
        name="x<?= $Page->RowIndex ?>_Day5TE"
        class="form-control ew-select<?= $Page->Day5TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day5TE"
        data-value-separator="<?= $Page->Day5TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5TE->getPlaceHolder()) ?>"
        <?= $Page->Day5TE->editAttributes() ?>>
        <?= $Page->Day5TE->selectOptionListHtml("x{$Page->RowIndex}_Day5TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5TE", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5TE" id="o<?= $Page->RowIndex ?>_Day5TE" value="<?= HtmlEncode($Page->Day5TE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
        <td data-name="Day5Observation">
<span id="el$rowindex$_ivf_embryology_chart_Day5Observation" class="form-group ivf_embryology_chart_Day5Observation">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Observation"
        name="x<?= $Page->RowIndex ?>_Day5Observation"
        class="form-control ew-select<?= $Page->Day5Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Observation"
        data-value-separator="<?= $Page->Day5Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Observation->getPlaceHolder()) ?>"
        <?= $Page->Day5Observation->editAttributes() ?>>
        <?= $Page->Day5Observation->selectOptionListHtml("x{$Page->RowIndex}_Day5Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Observation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Observation" id="o<?= $Page->RowIndex ?>_Day5Observation" value="<?= HtmlEncode($Page->Day5Observation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <td data-name="Day5Collapsed">
<span id="el$rowindex$_ivf_embryology_chart_Day5Collapsed" class="form-group ivf_embryology_chart_Day5Collapsed">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Collapsed"
        name="x<?= $Page->RowIndex ?>_Day5Collapsed"
        class="form-control ew-select<?= $Page->Day5Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Collapsed"
        data-value-separator="<?= $Page->Day5Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Collapsed->getPlaceHolder()) ?>"
        <?= $Page->Day5Collapsed->editAttributes() ?>>
        <?= $Page->Day5Collapsed->selectOptionListHtml("x{$Page->RowIndex}_Day5Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Collapsed", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Collapsed" id="o<?= $Page->RowIndex ?>_Day5Collapsed" value="<?= HtmlEncode($Page->Day5Collapsed->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <td data-name="Day5Vacoulles">
<span id="el$rowindex$_ivf_embryology_chart_Day5Vacoulles" class="form-group ivf_embryology_chart_Day5Vacoulles">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Vacoulles"
        name="x<?= $Page->RowIndex ?>_Day5Vacoulles"
        class="form-control ew-select<?= $Page->Day5Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Vacoulles"
        data-value-separator="<?= $Page->Day5Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Vacoulles->getPlaceHolder()) ?>"
        <?= $Page->Day5Vacoulles->editAttributes() ?>>
        <?= $Page->Day5Vacoulles->selectOptionListHtml("x{$Page->RowIndex}_Day5Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Vacoulles", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Vacoulles" id="o<?= $Page->RowIndex ?>_Day5Vacoulles" value="<?= HtmlEncode($Page->Day5Vacoulles->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
        <td data-name="Day5Grade">
<span id="el$rowindex$_ivf_embryology_chart_Day5Grade" class="form-group ivf_embryology_chart_Day5Grade">
    <select
        id="x<?= $Page->RowIndex ?>_Day5Grade"
        name="x<?= $Page->RowIndex ?>_Day5Grade"
        class="form-control ew-select<?= $Page->Day5Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day5Grade"
        data-value-separator="<?= $Page->Day5Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5Grade->getPlaceHolder()) ?>"
        <?= $Page->Day5Grade->editAttributes() ?>>
        <?= $Page->Day5Grade->selectOptionListHtml("x{$Page->RowIndex}_Day5Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day5Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day5Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day5Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day5Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day5Grade" id="o<?= $Page->RowIndex ?>_Day5Grade" value="<?= HtmlEncode($Page->Day5Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
        <td data-name="Day6CellNo">
<span id="el$rowindex$_ivf_embryology_chart_Day6CellNo" class="form-group ivf_embryology_chart_Day6CellNo">
<input type="<?= $Page->Day6CellNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?= $Page->RowIndex ?>_Day6CellNo" id="x<?= $Page->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day6CellNo->getPlaceHolder()) ?>" value="<?= $Page->Day6CellNo->EditValue ?>"<?= $Page->Day6CellNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day6CellNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6CellNo" id="o<?= $Page->RowIndex ?>_Day6CellNo" value="<?= HtmlEncode($Page->Day6CellNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
        <td data-name="Day6ICM">
<span id="el$rowindex$_ivf_embryology_chart_Day6ICM" class="form-group ivf_embryology_chart_Day6ICM">
    <select
        id="x<?= $Page->RowIndex ?>_Day6ICM"
        name="x<?= $Page->RowIndex ?>_Day6ICM"
        class="form-control ew-select<?= $Page->Day6ICM->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM"
        data-table="ivf_embryology_chart"
        data-field="x_Day6ICM"
        data-value-separator="<?= $Page->Day6ICM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6ICM->getPlaceHolder()) ?>"
        <?= $Page->Day6ICM->editAttributes() ?>>
        <?= $Page->Day6ICM->selectOptionListHtml("x{$Page->RowIndex}_Day6ICM") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6ICM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6ICM", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6ICM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6ICM.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6ICM" id="o<?= $Page->RowIndex ?>_Day6ICM" value="<?= HtmlEncode($Page->Day6ICM->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6TE->Visible) { // Day6TE ?>
        <td data-name="Day6TE">
<span id="el$rowindex$_ivf_embryology_chart_Day6TE" class="form-group ivf_embryology_chart_Day6TE">
    <select
        id="x<?= $Page->RowIndex ?>_Day6TE"
        name="x<?= $Page->RowIndex ?>_Day6TE"
        class="form-control ew-select<?= $Page->Day6TE->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE"
        data-table="ivf_embryology_chart"
        data-field="x_Day6TE"
        data-value-separator="<?= $Page->Day6TE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6TE->getPlaceHolder()) ?>"
        <?= $Page->Day6TE->editAttributes() ?>>
        <?= $Page->Day6TE->selectOptionListHtml("x{$Page->RowIndex}_Day6TE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6TE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6TE", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6TE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6TE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6TE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6TE" id="o<?= $Page->RowIndex ?>_Day6TE" value="<?= HtmlEncode($Page->Day6TE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
        <td data-name="Day6Observation">
<span id="el$rowindex$_ivf_embryology_chart_Day6Observation" class="form-group ivf_embryology_chart_Day6Observation">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Observation"
        name="x<?= $Page->RowIndex ?>_Day6Observation"
        class="form-control ew-select<?= $Page->Day6Observation->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Observation"
        data-value-separator="<?= $Page->Day6Observation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Observation->getPlaceHolder()) ?>"
        <?= $Page->Day6Observation->editAttributes() ?>>
        <?= $Page->Day6Observation->selectOptionListHtml("x{$Page->RowIndex}_Day6Observation") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Observation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Observation", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Observation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Observation.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Observation" id="o<?= $Page->RowIndex ?>_Day6Observation" value="<?= HtmlEncode($Page->Day6Observation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <td data-name="Day6Collapsed">
<span id="el$rowindex$_ivf_embryology_chart_Day6Collapsed" class="form-group ivf_embryology_chart_Day6Collapsed">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Collapsed"
        name="x<?= $Page->RowIndex ?>_Day6Collapsed"
        class="form-control ew-select<?= $Page->Day6Collapsed->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Collapsed"
        data-value-separator="<?= $Page->Day6Collapsed->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Collapsed->getPlaceHolder()) ?>"
        <?= $Page->Day6Collapsed->editAttributes() ?>>
        <?= $Page->Day6Collapsed->selectOptionListHtml("x{$Page->RowIndex}_Day6Collapsed") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Collapsed->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Collapsed", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Collapsed", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Collapsed.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Collapsed" id="o<?= $Page->RowIndex ?>_Day6Collapsed" value="<?= HtmlEncode($Page->Day6Collapsed->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <td data-name="Day6Vacoulles">
<span id="el$rowindex$_ivf_embryology_chart_Day6Vacoulles" class="form-group ivf_embryology_chart_Day6Vacoulles">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Vacoulles"
        name="x<?= $Page->RowIndex ?>_Day6Vacoulles"
        class="form-control ew-select<?= $Page->Day6Vacoulles->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Vacoulles"
        data-value-separator="<?= $Page->Day6Vacoulles->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Vacoulles->getPlaceHolder()) ?>"
        <?= $Page->Day6Vacoulles->editAttributes() ?>>
        <?= $Page->Day6Vacoulles->selectOptionListHtml("x{$Page->RowIndex}_Day6Vacoulles") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Vacoulles->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Vacoulles", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Vacoulles", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Vacoulles.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Vacoulles" id="o<?= $Page->RowIndex ?>_Day6Vacoulles" value="<?= HtmlEncode($Page->Day6Vacoulles->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
        <td data-name="Day6Grade">
<span id="el$rowindex$_ivf_embryology_chart_Day6Grade" class="form-group ivf_embryology_chart_Day6Grade">
    <select
        id="x<?= $Page->RowIndex ?>_Day6Grade"
        name="x<?= $Page->RowIndex ?>_Day6Grade"
        class="form-control ew-select<?= $Page->Day6Grade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade"
        data-table="ivf_embryology_chart"
        data-field="x_Day6Grade"
        data-value-separator="<?= $Page->Day6Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day6Grade->getPlaceHolder()) ?>"
        <?= $Page->Day6Grade->editAttributes() ?>>
        <?= $Page->Day6Grade->selectOptionListHtml("x{$Page->RowIndex}_Day6Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day6Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day6Grade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day6Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day6Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Grade" id="o<?= $Page->RowIndex ?>_Day6Grade" value="<?= HtmlEncode($Page->Day6Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <td data-name="Day6Cryoptop">
<span id="el$rowindex$_ivf_embryology_chart_Day6Cryoptop" class="form-group ivf_embryology_chart_Day6Cryoptop">
<input type="<?= $Page->Day6Cryoptop->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?= $Page->RowIndex ?>_Day6Cryoptop" id="x<?= $Page->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->Day6Cryoptop->getPlaceHolder()) ?>" value="<?= $Page->Day6Cryoptop->EditValue ?>"<?= $Page->Day6Cryoptop->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day6Cryoptop->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day6Cryoptop" id="o<?= $Page->RowIndex ?>_Day6Cryoptop" value="<?= HtmlEncode($Page->Day6Cryoptop->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
        <td data-name="EndSiNo">
<span id="el$rowindex$_ivf_embryology_chart_EndSiNo" class="form-group ivf_embryology_chart_EndSiNo">
<input type="<?= $Page->EndSiNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?= $Page->RowIndex ?>_EndSiNo" id="x<?= $Page->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->EndSiNo->getPlaceHolder()) ?>" value="<?= $Page->EndSiNo->EditValue ?>"<?= $Page->EndSiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EndSiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndSiNo" id="o<?= $Page->RowIndex ?>_EndSiNo" value="<?= HtmlEncode($Page->EndSiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EndingDay->Visible) { // EndingDay ?>
        <td data-name="EndingDay">
<span id="el$rowindex$_ivf_embryology_chart_EndingDay" class="form-group ivf_embryology_chart_EndingDay">
    <select
        id="x<?= $Page->RowIndex ?>_EndingDay"
        name="x<?= $Page->RowIndex ?>_EndingDay"
        class="form-control ew-select<?= $Page->EndingDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay"
        data-table="ivf_embryology_chart"
        data-field="x_EndingDay"
        data-value-separator="<?= $Page->EndingDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingDay->getPlaceHolder()) ?>"
        <?= $Page->EndingDay->editAttributes() ?>>
        <?= $Page->EndingDay->selectOptionListHtml("x{$Page->RowIndex}_EndingDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingDay", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingDay" id="o<?= $Page->RowIndex ?>_EndingDay" value="<?= HtmlEncode($Page->EndingDay->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
        <td data-name="EndingCellStage">
<span id="el$rowindex$_ivf_embryology_chart_EndingCellStage" class="form-group ivf_embryology_chart_EndingCellStage">
<input type="<?= $Page->EndingCellStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?= $Page->RowIndex ?>_EndingCellStage" id="x<?= $Page->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->EndingCellStage->getPlaceHolder()) ?>" value="<?= $Page->EndingCellStage->EditValue ?>"<?= $Page->EndingCellStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EndingCellStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingCellStage" id="o<?= $Page->RowIndex ?>_EndingCellStage" value="<?= HtmlEncode($Page->EndingCellStage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
        <td data-name="EndingGrade">
<span id="el$rowindex$_ivf_embryology_chart_EndingGrade" class="form-group ivf_embryology_chart_EndingGrade">
    <select
        id="x<?= $Page->RowIndex ?>_EndingGrade"
        name="x<?= $Page->RowIndex ?>_EndingGrade"
        class="form-control ew-select<?= $Page->EndingGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade"
        data-table="ivf_embryology_chart"
        data-field="x_EndingGrade"
        data-value-separator="<?= $Page->EndingGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingGrade->getPlaceHolder()) ?>"
        <?= $Page->EndingGrade->editAttributes() ?>>
        <?= $Page->EndingGrade->selectOptionListHtml("x{$Page->RowIndex}_EndingGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingGrade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingGrade" id="o<?= $Page->RowIndex ?>_EndingGrade" value="<?= HtmlEncode($Page->EndingGrade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EndingState->Visible) { // EndingState ?>
        <td data-name="EndingState">
<span id="el$rowindex$_ivf_embryology_chart_EndingState" class="form-group ivf_embryology_chart_EndingState">
    <select
        id="x<?= $Page->RowIndex ?>_EndingState"
        name="x<?= $Page->RowIndex ?>_EndingState"
        class="form-control ew-select<?= $Page->EndingState->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState"
        data-table="ivf_embryology_chart"
        data-field="x_EndingState"
        data-value-separator="<?= $Page->EndingState->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndingState->getPlaceHolder()) ?>"
        <?= $Page->EndingState->editAttributes() ?>>
        <?= $Page->EndingState->selectOptionListHtml("x{$Page->RowIndex}_EndingState") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->EndingState->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState']"),
        options = { name: "x<?= $Page->RowIndex ?>_EndingState", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_EndingState", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.EndingState.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.EndingState.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" data-hidden="1" name="o<?= $Page->RowIndex ?>_EndingState" id="o<?= $Page->RowIndex ?>_EndingState" value="<?= HtmlEncode($Page->EndingState->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo">
<?php if ($Page->TidNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_TidNo" name="x<?= $Page->RowIndex ?>_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x<?= $Page->RowIndex ?>_TidNo" id="x<?= $Page->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_TidNo" id="o<?= $Page->RowIndex ?>_TidNo" value="<?= HtmlEncode($Page->TidNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DidNO->Visible) { // DidNO ?>
        <td data-name="DidNO">
<?php if ($Page->DidNO->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<span<?= $Page->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DidNO->getDisplayValue($Page->DidNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_DidNO" name="x<?= $Page->RowIndex ?>_DidNO" value="<?= HtmlEncode($Page->DidNO->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<input type="<?= $Page->DidNO->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x<?= $Page->RowIndex ?>_DidNO" id="x<?= $Page->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DidNO->getPlaceHolder()) ?>" value="<?= $Page->DidNO->EditValue ?>"<?= $Page->DidNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DidNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_DidNO" id="o<?= $Page->RowIndex ?>_DidNO" value="<?= HtmlEncode($Page->DidNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <td data-name="ICSiIVFDateTime">
<span id="el$rowindex$_ivf_embryology_chart_ICSiIVFDateTime" class="form-group ivf_embryology_chart_ICSiIVFDateTime">
<input type="<?= $Page->ICSiIVFDateTime->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?= $Page->RowIndex ?>_ICSiIVFDateTime" id="x<?= $Page->RowIndex ?>_ICSiIVFDateTime" placeholder="<?= HtmlEncode($Page->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?= $Page->ICSiIVFDateTime->EditValue ?>"<?= $Page->ICSiIVFDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ICSiIVFDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ICSiIVFDateTime->ReadOnly && !$Page->ICSiIVFDateTime->Disabled && !isset($Page->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($Page->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ICSiIVFDateTime" id="o<?= $Page->RowIndex ?>_ICSiIVFDateTime" value="<?= HtmlEncode($Page->ICSiIVFDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <td data-name="PrimaryEmbrologist">
<span id="el$rowindex$_ivf_embryology_chart_PrimaryEmbrologist" class="form-group ivf_embryology_chart_PrimaryEmbrologist">
<input type="<?= $Page->PrimaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?= $Page->RowIndex ?>_PrimaryEmbrologist" id="x<?= $Page->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Page->PrimaryEmbrologist->EditValue ?>"<?= $Page->PrimaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrimaryEmbrologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrimaryEmbrologist" id="o<?= $Page->RowIndex ?>_PrimaryEmbrologist" value="<?= HtmlEncode($Page->PrimaryEmbrologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <td data-name="SecondaryEmbrologist">
<span id="el$rowindex$_ivf_embryology_chart_SecondaryEmbrologist" class="form-group ivf_embryology_chart_SecondaryEmbrologist">
<input type="<?= $Page->SecondaryEmbrologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?= $Page->RowIndex ?>_SecondaryEmbrologist" id="x<?= $Page->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?= $Page->SecondaryEmbrologist->EditValue ?>"<?= $Page->SecondaryEmbrologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SecondaryEmbrologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_SecondaryEmbrologist" id="o<?= $Page->RowIndex ?>_SecondaryEmbrologist" value="<?= HtmlEncode($Page->SecondaryEmbrologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator">
<span id="el$rowindex$_ivf_embryology_chart_Incubator" class="form-group ivf_embryology_chart_Incubator">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?= $Page->RowIndex ?>_Incubator" id="x<?= $Page->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator" id="o<?= $Page->RowIndex ?>_Incubator" value="<?= HtmlEncode($Page->Incubator->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->location->Visible) { // location ?>
        <td data-name="location">
<span id="el$rowindex$_ivf_embryology_chart_location" class="form-group ivf_embryology_chart_location">
<input type="<?= $Page->location->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_location" name="x<?= $Page->RowIndex ?>_location" id="x<?= $Page->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->location->getPlaceHolder()) ?>" value="<?= $Page->location->EditValue ?>"<?= $Page->location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->location->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" data-hidden="1" name="o<?= $Page->RowIndex ?>_location" id="o<?= $Page->RowIndex ?>_location" value="<?= HtmlEncode($Page->location->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td data-name="OocyteNo">
<span id="el$rowindex$_ivf_embryology_chart_OocyteNo" class="form-group ivf_embryology_chart_OocyteNo">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?= $Page->RowIndex ?>_OocyteNo" id="x<?= $Page->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_OocyteNo" id="o<?= $Page->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Page->OocyteNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage">
<span id="el$rowindex$_ivf_embryology_chart_Stage" class="form-group ivf_embryology_chart_Stage">
    <select
        id="x<?= $Page->RowIndex ?>_Stage"
        name="x<?= $Page->RowIndex ?>_Stage"
        class="form-control ew-select<?= $Page->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage"
        data-table="ivf_embryology_chart"
        data-field="x_Stage"
        data-value-separator="<?= $Page->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>"
        <?= $Page->Stage->editAttributes() ?>>
        <?= $Page->Stage->selectOptionListHtml("x{$Page->RowIndex}_Stage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Stage", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stage" id="o<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks">
<span id="el$rowindex$_ivf_embryology_chart_Remarks" class="form-group ivf_embryology_chart_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?= $Page->RowIndex ?>_Remarks" id="x<?= $Page->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" data-hidden="1" name="o<?= $Page->RowIndex ?>_Remarks" id="o<?= $Page->RowIndex ?>_Remarks" value="<?= HtmlEncode($Page->Remarks->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate">
<span id="el$rowindex$_ivf_embryology_chart_vitrificationDate" class="form-group ivf_embryology_chart_vitrificationDate">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?= $Page->RowIndex ?>_vitrificationDate" id="x<?= $Page->RowIndex ?>_vitrificationDate" size="12" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitrificationDate" id="o<?= $Page->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Page->vitrificationDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <td data-name="vitriPrimaryEmbryologist">
<span id="el$rowindex$_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group ivf_embryology_chart_vitriPrimaryEmbryologist">
<input type="<?= $Page->vitriPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->vitriPrimaryEmbryologist->EditValue ?>"<?= $Page->vitriPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" id="o<?= $Page->RowIndex ?>_vitriPrimaryEmbryologist" value="<?= HtmlEncode($Page->vitriPrimaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <td data-name="vitriSecondaryEmbryologist">
<span id="el$rowindex$_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group ivf_embryology_chart_vitriSecondaryEmbryologist">
<input type="<?= $Page->vitriSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->vitriSecondaryEmbryologist->EditValue ?>"<?= $Page->vitriSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" id="o<?= $Page->RowIndex ?>_vitriSecondaryEmbryologist" value="<?= HtmlEncode($Page->vitriSecondaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <td data-name="vitriEmbryoNo">
<span id="el$rowindex$_ivf_embryology_chart_vitriEmbryoNo" class="form-group ivf_embryology_chart_vitriEmbryoNo">
<input type="<?= $Page->vitriEmbryoNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?= $Page->RowIndex ?>_vitriEmbryoNo" id="x<?= $Page->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->vitriEmbryoNo->EditValue ?>"<?= $Page->vitriEmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriEmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriEmbryoNo" id="o<?= $Page->RowIndex ?>_vitriEmbryoNo" value="<?= HtmlEncode($Page->vitriEmbryoNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <td data-name="thawReFrozen">
<span id="el$rowindex$_ivf_embryology_chart_thawReFrozen" class="form-group ivf_embryology_chart_thawReFrozen">
<template id="tp_x<?= $Page->RowIndex ?>_thawReFrozen">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="x<?= $Page->RowIndex ?>_thawReFrozen" id="x<?= $Page->RowIndex ?>_thawReFrozen"<?= $Page->thawReFrozen->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_thawReFrozen" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_thawReFrozen[]"
    name="x<?= $Page->RowIndex ?>_thawReFrozen[]"
    value="<?= HtmlEncode($Page->thawReFrozen->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_thawReFrozen"
    data-target="dsl_x<?= $Page->RowIndex ?>_thawReFrozen"
    data-repeatcolumn="5"
    class="form-control<?= $Page->thawReFrozen->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_thawReFrozen"
    data-value-separator="<?= $Page->thawReFrozen->displayValueSeparatorAttribute() ?>"
    <?= $Page->thawReFrozen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawReFrozen[]" id="o<?= $Page->RowIndex ?>_thawReFrozen[]" value="<?= HtmlEncode($Page->thawReFrozen->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <td data-name="vitriFertilisationDate">
<span id="el$rowindex$_ivf_embryology_chart_vitriFertilisationDate" class="form-group ivf_embryology_chart_vitriFertilisationDate">
<input type="<?= $Page->vitriFertilisationDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?= $Page->RowIndex ?>_vitriFertilisationDate" id="x<?= $Page->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?= HtmlEncode($Page->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->vitriFertilisationDate->EditValue ?>"<?= $Page->vitriFertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriFertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitriFertilisationDate->ReadOnly && !$Page->vitriFertilisationDate->Disabled && !isset($Page->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($Page->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriFertilisationDate" id="o<?= $Page->RowIndex ?>_vitriFertilisationDate" value="<?= HtmlEncode($Page->vitriFertilisationDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriDay->Visible) { // vitriDay ?>
        <td data-name="vitriDay">
<span id="el$rowindex$_ivf_embryology_chart_vitriDay" class="form-group ivf_embryology_chart_vitriDay">
    <select
        id="x<?= $Page->RowIndex ?>_vitriDay"
        name="x<?= $Page->RowIndex ?>_vitriDay"
        class="form-control ew-select<?= $Page->vitriDay->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay"
        data-table="ivf_embryology_chart"
        data-field="x_vitriDay"
        data-value-separator="<?= $Page->vitriDay->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->vitriDay->getPlaceHolder()) ?>"
        <?= $Page->vitriDay->editAttributes() ?>>
        <?= $Page->vitriDay->selectOptionListHtml("x{$Page->RowIndex}_vitriDay") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->vitriDay->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay']"),
        options = { name: "x<?= $Page->RowIndex ?>_vitriDay", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriDay", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriDay.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriDay.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriDay" id="o<?= $Page->RowIndex ?>_vitriDay" value="<?= HtmlEncode($Page->vitriDay->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriStage->Visible) { // vitriStage ?>
        <td data-name="vitriStage">
<span id="el$rowindex$_ivf_embryology_chart_vitriStage" class="form-group ivf_embryology_chart_vitriStage">
<input type="<?= $Page->vitriStage->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?= $Page->RowIndex ?>_vitriStage" id="x<?= $Page->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriStage->getPlaceHolder()) ?>" value="<?= $Page->vitriStage->EditValue ?>"<?= $Page->vitriStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriStage" id="o<?= $Page->RowIndex ?>_vitriStage" value="<?= HtmlEncode($Page->vitriStage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
        <td data-name="vitriGrade">
<span id="el$rowindex$_ivf_embryology_chart_vitriGrade" class="form-group ivf_embryology_chart_vitriGrade">
    <select
        id="x<?= $Page->RowIndex ?>_vitriGrade"
        name="x<?= $Page->RowIndex ?>_vitriGrade"
        class="form-control ew-select<?= $Page->vitriGrade->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade"
        data-table="ivf_embryology_chart"
        data-field="x_vitriGrade"
        data-value-separator="<?= $Page->vitriGrade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->vitriGrade->getPlaceHolder()) ?>"
        <?= $Page->vitriGrade->editAttributes() ?>>
        <?= $Page->vitriGrade->selectOptionListHtml("x{$Page->RowIndex}_vitriGrade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->vitriGrade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade']"),
        options = { name: "x<?= $Page->RowIndex ?>_vitriGrade", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_vitriGrade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.vitriGrade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriGrade" id="o<?= $Page->RowIndex ?>_vitriGrade" value="<?= HtmlEncode($Page->vitriGrade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
        <td data-name="vitriIncubator">
<span id="el$rowindex$_ivf_embryology_chart_vitriIncubator" class="form-group ivf_embryology_chart_vitriIncubator">
<input type="<?= $Page->vitriIncubator->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?= $Page->RowIndex ?>_vitriIncubator" id="x<?= $Page->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriIncubator->getPlaceHolder()) ?>" value="<?= $Page->vitriIncubator->EditValue ?>"<?= $Page->vitriIncubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriIncubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriIncubator" id="o<?= $Page->RowIndex ?>_vitriIncubator" value="<?= HtmlEncode($Page->vitriIncubator->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriTank->Visible) { // vitriTank ?>
        <td data-name="vitriTank">
<span id="el$rowindex$_ivf_embryology_chart_vitriTank" class="form-group ivf_embryology_chart_vitriTank">
<input type="<?= $Page->vitriTank->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?= $Page->RowIndex ?>_vitriTank" id="x<?= $Page->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriTank->getPlaceHolder()) ?>" value="<?= $Page->vitriTank->EditValue ?>"<?= $Page->vitriTank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriTank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriTank" id="o<?= $Page->RowIndex ?>_vitriTank" value="<?= HtmlEncode($Page->vitriTank->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
        <td data-name="vitriCanister">
<span id="el$rowindex$_ivf_embryology_chart_vitriCanister" class="form-group ivf_embryology_chart_vitriCanister">
<input type="<?= $Page->vitriCanister->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?= $Page->RowIndex ?>_vitriCanister" id="x<?= $Page->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCanister->getPlaceHolder()) ?>" value="<?= $Page->vitriCanister->EditValue ?>"<?= $Page->vitriCanister->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCanister->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriCanister" id="o<?= $Page->RowIndex ?>_vitriCanister" value="<?= HtmlEncode($Page->vitriCanister->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
        <td data-name="vitriGobiet">
<span id="el$rowindex$_ivf_embryology_chart_vitriGobiet" class="form-group ivf_embryology_chart_vitriGobiet">
<input type="<?= $Page->vitriGobiet->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?= $Page->RowIndex ?>_vitriGobiet" id="x<?= $Page->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriGobiet->getPlaceHolder()) ?>" value="<?= $Page->vitriGobiet->EditValue ?>"<?= $Page->vitriGobiet->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriGobiet->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriGobiet" id="o<?= $Page->RowIndex ?>_vitriGobiet" value="<?= HtmlEncode($Page->vitriGobiet->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
        <td data-name="vitriViscotube">
<span id="el$rowindex$_ivf_embryology_chart_vitriViscotube" class="form-group ivf_embryology_chart_vitriViscotube">
<input type="<?= $Page->vitriViscotube->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?= $Page->RowIndex ?>_vitriViscotube" id="x<?= $Page->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriViscotube->getPlaceHolder()) ?>" value="<?= $Page->vitriViscotube->EditValue ?>"<?= $Page->vitriViscotube->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriViscotube->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriViscotube" id="o<?= $Page->RowIndex ?>_vitriViscotube" value="<?= HtmlEncode($Page->vitriViscotube->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <td data-name="vitriCryolockNo">
<span id="el$rowindex$_ivf_embryology_chart_vitriCryolockNo" class="form-group ivf_embryology_chart_vitriCryolockNo">
<input type="<?= $Page->vitriCryolockNo->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?= $Page->RowIndex ?>_vitriCryolockNo" id="x<?= $Page->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCryolockNo->getPlaceHolder()) ?>" value="<?= $Page->vitriCryolockNo->EditValue ?>"<?= $Page->vitriCryolockNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCryolockNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriCryolockNo" id="o<?= $Page->RowIndex ?>_vitriCryolockNo" value="<?= HtmlEncode($Page->vitriCryolockNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <td data-name="vitriCryolockColour">
<span id="el$rowindex$_ivf_embryology_chart_vitriCryolockColour" class="form-group ivf_embryology_chart_vitriCryolockColour">
<input type="<?= $Page->vitriCryolockColour->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?= $Page->RowIndex ?>_vitriCryolockColour" id="x<?= $Page->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->vitriCryolockColour->getPlaceHolder()) ?>" value="<?= $Page->vitriCryolockColour->EditValue ?>"<?= $Page->vitriCryolockColour->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitriCryolockColour->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitriCryolockColour" id="o<?= $Page->RowIndex ?>_vitriCryolockColour" value="<?= HtmlEncode($Page->vitriCryolockColour->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawDate->Visible) { // thawDate ?>
        <td data-name="thawDate">
<span id="el$rowindex$_ivf_embryology_chart_thawDate" class="form-group ivf_embryology_chart_thawDate">
<input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?= $Page->RowIndex ?>_thawDate" id="x<?= $Page->RowIndex ?>_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
<?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawDate" id="o<?= $Page->RowIndex ?>_thawDate" value="<?= HtmlEncode($Page->thawDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td data-name="thawPrimaryEmbryologist">
<span id="el$rowindex$_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group ivf_embryology_chart_thawPrimaryEmbryologist">
<input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="o<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" value="<?= HtmlEncode($Page->thawPrimaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td data-name="thawSecondaryEmbryologist">
<span id="el$rowindex$_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group ivf_embryology_chart_thawSecondaryEmbryologist">
<input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="o<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" value="<?= HtmlEncode($Page->thawSecondaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawET->Visible) { // thawET ?>
        <td data-name="thawET">
<span id="el$rowindex$_ivf_embryology_chart_thawET" class="form-group ivf_embryology_chart_thawET">
    <select
        id="x<?= $Page->RowIndex ?>_thawET"
        name="x<?= $Page->RowIndex ?>_thawET"
        class="form-control ew-select<?= $Page->thawET->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET"
        data-table="ivf_embryology_chart"
        data-field="x_thawET"
        data-value-separator="<?= $Page->thawET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->thawET->getPlaceHolder()) ?>"
        <?= $Page->thawET->editAttributes() ?>>
        <?= $Page->thawET->selectOptionListHtml("x{$Page->RowIndex}_thawET") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->thawET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET']"),
        options = { name: "x<?= $Page->RowIndex ?>_thawET", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_thawET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.thawET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.thawET.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawET" id="o<?= $Page->RowIndex ?>_thawET" value="<?= HtmlEncode($Page->thawET->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <td data-name="thawAbserve">
<span id="el$rowindex$_ivf_embryology_chart_thawAbserve" class="form-group ivf_embryology_chart_thawAbserve">
<input type="<?= $Page->thawAbserve->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?= $Page->RowIndex ?>_thawAbserve" id="x<?= $Page->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawAbserve->getPlaceHolder()) ?>" value="<?= $Page->thawAbserve->EditValue ?>"<?= $Page->thawAbserve->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawAbserve->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawAbserve" id="o<?= $Page->RowIndex ?>_thawAbserve" value="<?= HtmlEncode($Page->thawAbserve->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <td data-name="thawDiscard">
<span id="el$rowindex$_ivf_embryology_chart_thawDiscard" class="form-group ivf_embryology_chart_thawDiscard">
<input type="<?= $Page->thawDiscard->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?= $Page->RowIndex ?>_thawDiscard" id="x<?= $Page->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->thawDiscard->getPlaceHolder()) ?>" value="<?= $Page->thawDiscard->EditValue ?>"<?= $Page->thawDiscard->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDiscard->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawDiscard" id="o<?= $Page->RowIndex ?>_thawDiscard" value="<?= HtmlEncode($Page->thawDiscard->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
        <td data-name="ETCatheter">
<span id="el$rowindex$_ivf_embryology_chart_ETCatheter" class="form-group ivf_embryology_chart_ETCatheter">
<input type="<?= $Page->ETCatheter->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?= $Page->RowIndex ?>_ETCatheter" id="x<?= $Page->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->ETCatheter->getPlaceHolder()) ?>" value="<?= $Page->ETCatheter->EditValue ?>"<?= $Page->ETCatheter->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETCatheter->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETCatheter" id="o<?= $Page->RowIndex ?>_ETCatheter" value="<?= HtmlEncode($Page->ETCatheter->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
        <td data-name="ETDifficulty">
<span id="el$rowindex$_ivf_embryology_chart_ETDifficulty" class="form-group ivf_embryology_chart_ETDifficulty">
    <select
        id="x<?= $Page->RowIndex ?>_ETDifficulty"
        name="x<?= $Page->RowIndex ?>_ETDifficulty"
        class="form-control ew-select<?= $Page->ETDifficulty->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty"
        data-table="ivf_embryology_chart"
        data-field="x_ETDifficulty"
        data-value-separator="<?= $Page->ETDifficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ETDifficulty->getPlaceHolder()) ?>"
        <?= $Page->ETDifficulty->editAttributes() ?>>
        <?= $Page->ETDifficulty->selectOptionListHtml("x{$Page->RowIndex}_ETDifficulty") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ETDifficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty']"),
        options = { name: "x<?= $Page->RowIndex ?>_ETDifficulty", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_ETDifficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.ETDifficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETDifficulty" id="o<?= $Page->RowIndex ?>_ETDifficulty" value="<?= HtmlEncode($Page->ETDifficulty->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETEasy->Visible) { // ETEasy ?>
        <td data-name="ETEasy">
<span id="el$rowindex$_ivf_embryology_chart_ETEasy" class="form-group ivf_embryology_chart_ETEasy">
<template id="tp_x<?= $Page->RowIndex ?>_ETEasy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="x<?= $Page->RowIndex ?>_ETEasy" id="x<?= $Page->RowIndex ?>_ETEasy"<?= $Page->ETEasy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_ETEasy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_ETEasy[]"
    name="x<?= $Page->RowIndex ?>_ETEasy[]"
    value="<?= HtmlEncode($Page->ETEasy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_ETEasy"
    data-target="dsl_x<?= $Page->RowIndex ?>_ETEasy"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ETEasy->isInvalidClass() ?>"
    data-table="ivf_embryology_chart"
    data-field="x_ETEasy"
    data-value-separator="<?= $Page->ETEasy->displayValueSeparatorAttribute() ?>"
    <?= $Page->ETEasy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETEasy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETEasy[]" id="o<?= $Page->RowIndex ?>_ETEasy[]" value="<?= HtmlEncode($Page->ETEasy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETComments->Visible) { // ETComments ?>
        <td data-name="ETComments">
<span id="el$rowindex$_ivf_embryology_chart_ETComments" class="form-group ivf_embryology_chart_ETComments">
<input type="<?= $Page->ETComments->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?= $Page->RowIndex ?>_ETComments" id="x<?= $Page->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETComments->getPlaceHolder()) ?>" value="<?= $Page->ETComments->EditValue ?>"<?= $Page->ETComments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETComments->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETComments" id="o<?= $Page->RowIndex ?>_ETComments" value="<?= HtmlEncode($Page->ETComments->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
        <td data-name="ETDoctor">
<span id="el$rowindex$_ivf_embryology_chart_ETDoctor" class="form-group ivf_embryology_chart_ETDoctor">
<input type="<?= $Page->ETDoctor->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?= $Page->RowIndex ?>_ETDoctor" id="x<?= $Page->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETDoctor->getPlaceHolder()) ?>" value="<?= $Page->ETDoctor->EditValue ?>"<?= $Page->ETDoctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETDoctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETDoctor" id="o<?= $Page->RowIndex ?>_ETDoctor" value="<?= HtmlEncode($Page->ETDoctor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <td data-name="ETEmbryologist">
<span id="el$rowindex$_ivf_embryology_chart_ETEmbryologist" class="form-group ivf_embryology_chart_ETEmbryologist">
<input type="<?= $Page->ETEmbryologist->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?= $Page->RowIndex ?>_ETEmbryologist" id="x<?= $Page->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?= HtmlEncode($Page->ETEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->ETEmbryologist->EditValue ?>"<?= $Page->ETEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETEmbryologist" id="o<?= $Page->RowIndex ?>_ETEmbryologist" value="<?= HtmlEncode($Page->ETEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ETDate->Visible) { // ETDate ?>
        <td data-name="ETDate">
<span id="el$rowindex$_ivf_embryology_chart_ETDate" class="form-group ivf_embryology_chart_ETDate">
<input type="<?= $Page->ETDate->getInputTextType() ?>" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?= $Page->RowIndex ?>_ETDate" id="x<?= $Page->RowIndex ?>_ETDate" placeholder="<?= HtmlEncode($Page->ETDate->getPlaceHolder()) ?>" value="<?= $Page->ETDate->EditValue ?>"<?= $Page->ETDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ETDate->getErrorMessage() ?></div>
<?php if (!$Page->ETDate->ReadOnly && !$Page->ETDate->Disabled && !isset($Page->ETDate->EditAttrs["readonly"]) && !isset($Page->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_embryology_chartlist", "x<?= $Page->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ETDate" id="o<?= $Page->RowIndex ?>_ETDate" value="<?= HtmlEncode($Page->ETDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day1End->Visible) { // Day1End ?>
        <td data-name="Day1End">
<span id="el$rowindex$_ivf_embryology_chart_Day1End" class="form-group ivf_embryology_chart_Day1End">
    <select
        id="x<?= $Page->RowIndex ?>_Day1End"
        name="x<?= $Page->RowIndex ?>_Day1End"
        class="form-control ew-select<?= $Page->Day1End->isInvalidClass() ?>"
        data-select2-id="ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End"
        data-table="ivf_embryology_chart"
        data-field="x_Day1End"
        data-value-separator="<?= $Page->Day1End->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1End->getPlaceHolder()) ?>"
        <?= $Page->Day1End->editAttributes() ?>>
        <?= $Page->Day1End->selectOptionListHtml("x{$Page->RowIndex}_Day1End") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day1End->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day1End", selectId: "ivf_embryology_chart_x<?= $Page->RowIndex ?>_Day1End", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_embryology_chart.fields.Day1End.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_embryology_chart.fields.Day1End.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day1End" id="o<?= $Page->RowIndex ?>_Day1End" value="<?= HtmlEncode($Page->Day1End->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fivf_embryology_chartlist","load"], function() {
    fivf_embryology_chartlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Page->isAdd() || $Page->isCopy()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php } ?>
<?php if ($Page->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
<?php if ($Page->isEdit()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php } ?>
<?php if ($Page->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
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
<?php if (!$Page->isExport()) { ?>
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

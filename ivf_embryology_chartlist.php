<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$ivf_embryology_chart_list = new ivf_embryology_chart_list();

// Run the page
$ivf_embryology_chart_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_embryology_chart_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_embryology_chart->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_embryology_chartlist = currentForm = new ew.Form("fivf_embryology_chartlist", "list");
fivf_embryology_chartlist.formKeyCountName = '<?php echo $ivf_embryology_chart_list->FormKeyCountName ?>';

// Validate form
fivf_embryology_chartlist.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($ivf_embryology_chart_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->id->caption(), $ivf_embryology_chart->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->RIDNo->caption(), $ivf_embryology_chart->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Name->caption(), $ivf_embryology_chart->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->ARTCycle->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCycle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ARTCycle->caption(), $ivf_embryology_chart->ARTCycle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->SpermOrigin->Required) { ?>
			elm = this.getElements("x" + infix + "_SpermOrigin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->SpermOrigin->caption(), $ivf_embryology_chart->SpermOrigin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->InseminatinTechnique->Required) { ?>
			elm = this.getElements("x" + infix + "_InseminatinTechnique");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->InseminatinTechnique->caption(), $ivf_embryology_chart->InseminatinTechnique->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->IndicationForART->Required) { ?>
			elm = this.getElements("x" + infix + "_IndicationForART");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->IndicationForART->caption(), $ivf_embryology_chart->IndicationForART->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day0sino->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0sino");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0sino->caption(), $ivf_embryology_chart->Day0sino->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day0OocyteStage->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0OocyteStage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0OocyteStage->caption(), $ivf_embryology_chart->Day0OocyteStage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day0PolarBodyPosition->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0PolarBodyPosition");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0PolarBodyPosition->caption(), $ivf_embryology_chart->Day0PolarBodyPosition->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day0Breakage->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0Breakage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0Breakage->caption(), $ivf_embryology_chart->Day0Breakage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day0Attempts->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0Attempts");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0Attempts->caption(), $ivf_embryology_chart->Day0Attempts->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day0SPZMorpho->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0SPZMorpho");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0SPZMorpho->caption(), $ivf_embryology_chart->Day0SPZMorpho->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day0SPZLocation->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0SPZLocation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0SPZLocation->caption(), $ivf_embryology_chart->Day0SPZLocation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day0SpOrgin->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0SpOrgin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0SpOrgin->caption(), $ivf_embryology_chart->Day0SpOrgin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day5Cryoptop->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5Cryoptop");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5Cryoptop->caption(), $ivf_embryology_chart->Day5Cryoptop->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day1Sperm->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1Sperm");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1Sperm->caption(), $ivf_embryology_chart->Day1Sperm->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day1PN->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1PN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1PN->caption(), $ivf_embryology_chart->Day1PN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day1PB->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1PB");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1PB->caption(), $ivf_embryology_chart->Day1PB->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day1Pronucleus->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1Pronucleus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1Pronucleus->caption(), $ivf_embryology_chart->Day1Pronucleus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day1Nucleolus->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1Nucleolus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1Nucleolus->caption(), $ivf_embryology_chart->Day1Nucleolus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day1Halo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1Halo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1Halo->caption(), $ivf_embryology_chart->Day1Halo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day2SiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2SiNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2SiNo->caption(), $ivf_embryology_chart->Day2SiNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day2CellNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2CellNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2CellNo->caption(), $ivf_embryology_chart->Day2CellNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day2Frag->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2Frag");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2Frag->caption(), $ivf_embryology_chart->Day2Frag->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day2Symmetry->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2Symmetry");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2Symmetry->caption(), $ivf_embryology_chart->Day2Symmetry->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day2Cryoptop->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2Cryoptop");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2Cryoptop->caption(), $ivf_embryology_chart->Day2Cryoptop->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day2Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2Grade->caption(), $ivf_embryology_chart->Day2Grade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day2End->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2End");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2End->caption(), $ivf_embryology_chart->Day2End->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day3Sino->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Sino");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Sino->caption(), $ivf_embryology_chart->Day3Sino->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day3CellNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3CellNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3CellNo->caption(), $ivf_embryology_chart->Day3CellNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day3Frag->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Frag");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Frag->caption(), $ivf_embryology_chart->Day3Frag->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day3Symmetry->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Symmetry");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Symmetry->caption(), $ivf_embryology_chart->Day3Symmetry->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day3ZP->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3ZP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3ZP->caption(), $ivf_embryology_chart->Day3ZP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day3Vacoules->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Vacoules");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Vacoules->caption(), $ivf_embryology_chart->Day3Vacoules->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day3Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Grade->caption(), $ivf_embryology_chart->Day3Grade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day3Cryoptop->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Cryoptop");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Cryoptop->caption(), $ivf_embryology_chart->Day3Cryoptop->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day3End->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3End");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3End->caption(), $ivf_embryology_chart->Day3End->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day4SiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4SiNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4SiNo->caption(), $ivf_embryology_chart->Day4SiNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day4CellNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4CellNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4CellNo->caption(), $ivf_embryology_chart->Day4CellNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day4Frag->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4Frag");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4Frag->caption(), $ivf_embryology_chart->Day4Frag->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day4Symmetry->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4Symmetry");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4Symmetry->caption(), $ivf_embryology_chart->Day4Symmetry->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day4Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4Grade->caption(), $ivf_embryology_chart->Day4Grade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day4Cryoptop->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4Cryoptop");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4Cryoptop->caption(), $ivf_embryology_chart->Day4Cryoptop->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day4End->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4End");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4End->caption(), $ivf_embryology_chart->Day4End->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day5CellNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5CellNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5CellNo->caption(), $ivf_embryology_chart->Day5CellNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day5ICM->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5ICM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5ICM->caption(), $ivf_embryology_chart->Day5ICM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day5TE->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5TE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5TE->caption(), $ivf_embryology_chart->Day5TE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day5Observation->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5Observation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5Observation->caption(), $ivf_embryology_chart->Day5Observation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day5Collapsed->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5Collapsed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5Collapsed->caption(), $ivf_embryology_chart->Day5Collapsed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day5Vacoulles->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5Vacoulles");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5Vacoulles->caption(), $ivf_embryology_chart->Day5Vacoulles->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day5Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5Grade->caption(), $ivf_embryology_chart->Day5Grade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day6CellNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6CellNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6CellNo->caption(), $ivf_embryology_chart->Day6CellNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day6ICM->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6ICM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6ICM->caption(), $ivf_embryology_chart->Day6ICM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day6TE->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6TE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6TE->caption(), $ivf_embryology_chart->Day6TE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day6Observation->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6Observation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6Observation->caption(), $ivf_embryology_chart->Day6Observation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day6Collapsed->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6Collapsed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6Collapsed->caption(), $ivf_embryology_chart->Day6Collapsed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day6Vacoulles->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6Vacoulles");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6Vacoulles->caption(), $ivf_embryology_chart->Day6Vacoulles->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day6Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6Grade->caption(), $ivf_embryology_chart->Day6Grade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Day6Cryoptop->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6Cryoptop");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6Cryoptop->caption(), $ivf_embryology_chart->Day6Cryoptop->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->EndSiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_EndSiNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->EndSiNo->caption(), $ivf_embryology_chart->EndSiNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->EndingDay->Required) { ?>
			elm = this.getElements("x" + infix + "_EndingDay");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->EndingDay->caption(), $ivf_embryology_chart->EndingDay->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->EndingCellStage->Required) { ?>
			elm = this.getElements("x" + infix + "_EndingCellStage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->EndingCellStage->caption(), $ivf_embryology_chart->EndingCellStage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->EndingGrade->Required) { ?>
			elm = this.getElements("x" + infix + "_EndingGrade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->EndingGrade->caption(), $ivf_embryology_chart->EndingGrade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->EndingState->Required) { ?>
			elm = this.getElements("x" + infix + "_EndingState");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->EndingState->caption(), $ivf_embryology_chart->EndingState->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->TidNo->caption(), $ivf_embryology_chart->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->DidNO->Required) { ?>
			elm = this.getElements("x" + infix + "_DidNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->DidNO->caption(), $ivf_embryology_chart->DidNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->ICSiIVFDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSiIVFDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ICSiIVFDateTime->caption(), $ivf_embryology_chart->ICSiIVFDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ICSiIVFDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->ICSiIVFDateTime->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_list->PrimaryEmbrologist->Required) { ?>
			elm = this.getElements("x" + infix + "_PrimaryEmbrologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->PrimaryEmbrologist->caption(), $ivf_embryology_chart->PrimaryEmbrologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->SecondaryEmbrologist->Required) { ?>
			elm = this.getElements("x" + infix + "_SecondaryEmbrologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->SecondaryEmbrologist->caption(), $ivf_embryology_chart->SecondaryEmbrologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Incubator->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Incubator->caption(), $ivf_embryology_chart->Incubator->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->location->Required) { ?>
			elm = this.getElements("x" + infix + "_location");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->location->caption(), $ivf_embryology_chart->location->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->OocyteNo->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->OocyteNo->caption(), $ivf_embryology_chart->OocyteNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Stage->caption(), $ivf_embryology_chart->Stage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Remarks->caption(), $ivf_embryology_chart->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitrificationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitrificationDate->caption(), $ivf_embryology_chart->vitrificationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->vitrificationDate->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_list->vitriPrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriPrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriPrimaryEmbryologist->caption(), $ivf_embryology_chart->vitriPrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriSecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriSecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriSecondaryEmbryologist->caption(), $ivf_embryology_chart->vitriSecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriEmbryoNo->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriEmbryoNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriEmbryoNo->caption(), $ivf_embryology_chart->vitriEmbryoNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->thawReFrozen->Required) { ?>
			elm = this.getElements("x" + infix + "_thawReFrozen[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawReFrozen->caption(), $ivf_embryology_chart->thawReFrozen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriFertilisationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriFertilisationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriFertilisationDate->caption(), $ivf_embryology_chart->vitriFertilisationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_vitriFertilisationDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->vitriFertilisationDate->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_list->vitriDay->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriDay");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriDay->caption(), $ivf_embryology_chart->vitriDay->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriStage->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriStage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriStage->caption(), $ivf_embryology_chart->vitriStage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriGrade->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriGrade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriGrade->caption(), $ivf_embryology_chart->vitriGrade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriIncubator->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriIncubator");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriIncubator->caption(), $ivf_embryology_chart->vitriIncubator->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriTank->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriTank");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriTank->caption(), $ivf_embryology_chart->vitriTank->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriCanister->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriCanister");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriCanister->caption(), $ivf_embryology_chart->vitriCanister->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriGobiet->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriGobiet");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriGobiet->caption(), $ivf_embryology_chart->vitriGobiet->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriViscotube->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriViscotube");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriViscotube->caption(), $ivf_embryology_chart->vitriViscotube->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriCryolockNo->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriCryolockNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriCryolockNo->caption(), $ivf_embryology_chart->vitriCryolockNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->vitriCryolockColour->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriCryolockColour");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriCryolockColour->caption(), $ivf_embryology_chart->vitriCryolockColour->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->thawDate->Required) { ?>
			elm = this.getElements("x" + infix + "_thawDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawDate->caption(), $ivf_embryology_chart->thawDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_thawDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->thawDate->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_list->thawPrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_thawPrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawPrimaryEmbryologist->caption(), $ivf_embryology_chart->thawPrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->thawSecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_thawSecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawSecondaryEmbryologist->caption(), $ivf_embryology_chart->thawSecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->thawET->Required) { ?>
			elm = this.getElements("x" + infix + "_thawET");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawET->caption(), $ivf_embryology_chart->thawET->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->thawAbserve->Required) { ?>
			elm = this.getElements("x" + infix + "_thawAbserve");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawAbserve->caption(), $ivf_embryology_chart->thawAbserve->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->thawDiscard->Required) { ?>
			elm = this.getElements("x" + infix + "_thawDiscard");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawDiscard->caption(), $ivf_embryology_chart->thawDiscard->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->ETCatheter->Required) { ?>
			elm = this.getElements("x" + infix + "_ETCatheter");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETCatheter->caption(), $ivf_embryology_chart->ETCatheter->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->ETDifficulty->Required) { ?>
			elm = this.getElements("x" + infix + "_ETDifficulty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETDifficulty->caption(), $ivf_embryology_chart->ETDifficulty->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->ETEasy->Required) { ?>
			elm = this.getElements("x" + infix + "_ETEasy[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETEasy->caption(), $ivf_embryology_chart->ETEasy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->ETComments->Required) { ?>
			elm = this.getElements("x" + infix + "_ETComments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETComments->caption(), $ivf_embryology_chart->ETComments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->ETDoctor->Required) { ?>
			elm = this.getElements("x" + infix + "_ETDoctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETDoctor->caption(), $ivf_embryology_chart->ETDoctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->ETEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_ETEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETEmbryologist->caption(), $ivf_embryology_chart->ETEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_embryology_chart_list->ETDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ETDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETDate->caption(), $ivf_embryology_chart->ETDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ETDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->ETDate->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_list->Day1End->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1End");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1End->caption(), $ivf_embryology_chart->Day1End->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	if (gridinsert && addcnt == 0) { // No row added
		ew.alert(ew.language.phrase("NoAddRecord"));
		return false;
	}
	return true;
}

// Check empty row
fivf_embryology_chartlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "RIDNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Name", false)) return false;
	if (ew.valueChanged(fobj, infix, "ARTCycle", false)) return false;
	if (ew.valueChanged(fobj, infix, "SpermOrigin", false)) return false;
	if (ew.valueChanged(fobj, infix, "InseminatinTechnique", false)) return false;
	if (ew.valueChanged(fobj, infix, "IndicationForART", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day0sino", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day0OocyteStage", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day0PolarBodyPosition", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day0Breakage", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day0Attempts", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day0SPZMorpho", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day0SPZLocation", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day0SpOrgin", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day5Cryoptop", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day1Sperm", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day1PN", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day1PB", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day1Pronucleus", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day1Nucleolus", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day1Halo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day2SiNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day2CellNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day2Frag", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day2Symmetry", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day2Cryoptop", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day2Grade", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day2End", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day3Sino", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day3CellNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day3Frag", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day3Symmetry", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day3ZP", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day3Vacoules", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day3Grade", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day3Cryoptop", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day3End", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day4SiNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day4CellNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day4Frag", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day4Symmetry", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day4Grade", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day4Cryoptop", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day4End", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day5CellNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day5ICM", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day5TE", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day5Observation", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day5Collapsed", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day5Vacoulles", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day5Grade", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day6CellNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day6ICM", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day6TE", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day6Observation", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day6Collapsed", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day6Vacoulles", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day6Grade", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day6Cryoptop", false)) return false;
	if (ew.valueChanged(fobj, infix, "EndSiNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "EndingDay", false)) return false;
	if (ew.valueChanged(fobj, infix, "EndingCellStage", false)) return false;
	if (ew.valueChanged(fobj, infix, "EndingGrade", false)) return false;
	if (ew.valueChanged(fobj, infix, "EndingState", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "DidNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "ICSiIVFDateTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrimaryEmbrologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "SecondaryEmbrologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "Incubator", false)) return false;
	if (ew.valueChanged(fobj, infix, "location", false)) return false;
	if (ew.valueChanged(fobj, infix, "OocyteNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Stage", false)) return false;
	if (ew.valueChanged(fobj, infix, "Remarks", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitrificationDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriPrimaryEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriSecondaryEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriEmbryoNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "thawReFrozen[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriFertilisationDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriDay", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriStage", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriGrade", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriIncubator", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriTank", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriCanister", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriGobiet", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriViscotube", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriCryolockNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "vitriCryolockColour", false)) return false;
	if (ew.valueChanged(fobj, infix, "thawDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "thawPrimaryEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "thawSecondaryEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "thawET", false)) return false;
	if (ew.valueChanged(fobj, infix, "thawAbserve", false)) return false;
	if (ew.valueChanged(fobj, infix, "thawDiscard", false)) return false;
	if (ew.valueChanged(fobj, infix, "ETCatheter", false)) return false;
	if (ew.valueChanged(fobj, infix, "ETDifficulty", false)) return false;
	if (ew.valueChanged(fobj, infix, "ETEasy[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "ETComments", false)) return false;
	if (ew.valueChanged(fobj, infix, "ETDoctor", false)) return false;
	if (ew.valueChanged(fobj, infix, "ETEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "ETDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day1End", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_embryology_chartlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_embryology_chartlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_embryology_chartlist.lists["x_Day0PolarBodyPosition"] = <?php echo $ivf_embryology_chart_list->Day0PolarBodyPosition->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day0PolarBodyPosition"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day0PolarBodyPosition->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day0Breakage"] = <?php echo $ivf_embryology_chart_list->Day0Breakage->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day0Breakage"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day0Breakage->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day0Attempts"] = <?php echo $ivf_embryology_chart_list->Day0Attempts->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day0Attempts"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day0Attempts->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day0SPZMorpho"] = <?php echo $ivf_embryology_chart_list->Day0SPZMorpho->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day0SPZMorpho"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day0SPZMorpho->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day0SPZLocation"] = <?php echo $ivf_embryology_chart_list->Day0SPZLocation->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day0SPZLocation"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day0SPZLocation->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day0SpOrgin"] = <?php echo $ivf_embryology_chart_list->Day0SpOrgin->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day0SpOrgin"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day0SpOrgin->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day5Cryoptop"] = <?php echo $ivf_embryology_chart_list->Day5Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day5Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day5Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day1PN"] = <?php echo $ivf_embryology_chart_list->Day1PN->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day1PN"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day1PN->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day1PB"] = <?php echo $ivf_embryology_chart_list->Day1PB->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day1PB"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day1PB->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day1Pronucleus"] = <?php echo $ivf_embryology_chart_list->Day1Pronucleus->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day1Pronucleus"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day1Pronucleus->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day1Nucleolus"] = <?php echo $ivf_embryology_chart_list->Day1Nucleolus->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day1Nucleolus"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day1Nucleolus->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day1Halo"] = <?php echo $ivf_embryology_chart_list->Day1Halo->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day1Halo"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day1Halo->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day2End"] = <?php echo $ivf_embryology_chart_list->Day2End->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day2End"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day2End->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day3Frag"] = <?php echo $ivf_embryology_chart_list->Day3Frag->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day3Frag"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day3Frag->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day3Symmetry"] = <?php echo $ivf_embryology_chart_list->Day3Symmetry->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day3Symmetry"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day3Symmetry->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day3ZP"] = <?php echo $ivf_embryology_chart_list->Day3ZP->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day3ZP"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day3ZP->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day3Vacoules"] = <?php echo $ivf_embryology_chart_list->Day3Vacoules->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day3Vacoules"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day3Vacoules->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day3Grade"] = <?php echo $ivf_embryology_chart_list->Day3Grade->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day3Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day3Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day3Cryoptop"] = <?php echo $ivf_embryology_chart_list->Day3Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day3Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day3Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day3End"] = <?php echo $ivf_embryology_chart_list->Day3End->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day3End"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day3End->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day4Cryoptop"] = <?php echo $ivf_embryology_chart_list->Day4Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day4Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day4Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day4End"] = <?php echo $ivf_embryology_chart_list->Day4End->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day4End"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day4End->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day5ICM"] = <?php echo $ivf_embryology_chart_list->Day5ICM->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day5ICM"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day5ICM->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day5TE"] = <?php echo $ivf_embryology_chart_list->Day5TE->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day5TE"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day5TE->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day5Observation"] = <?php echo $ivf_embryology_chart_list->Day5Observation->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day5Observation"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day5Observation->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day5Collapsed"] = <?php echo $ivf_embryology_chart_list->Day5Collapsed->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day5Collapsed"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day5Collapsed->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day5Vacoulles"] = <?php echo $ivf_embryology_chart_list->Day5Vacoulles->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day5Vacoulles"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day5Vacoulles->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day5Grade"] = <?php echo $ivf_embryology_chart_list->Day5Grade->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day5Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day5Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day6ICM"] = <?php echo $ivf_embryology_chart_list->Day6ICM->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day6ICM"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day6ICM->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day6TE"] = <?php echo $ivf_embryology_chart_list->Day6TE->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day6TE"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day6TE->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day6Observation"] = <?php echo $ivf_embryology_chart_list->Day6Observation->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day6Observation"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day6Observation->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day6Collapsed"] = <?php echo $ivf_embryology_chart_list->Day6Collapsed->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day6Collapsed"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day6Collapsed->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day6Vacoulles"] = <?php echo $ivf_embryology_chart_list->Day6Vacoulles->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day6Vacoulles"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day6Vacoulles->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day6Grade"] = <?php echo $ivf_embryology_chart_list->Day6Grade->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day6Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day6Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_EndingDay"] = <?php echo $ivf_embryology_chart_list->EndingDay->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_EndingDay"].options = <?php echo JsonEncode($ivf_embryology_chart_list->EndingDay->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_EndingGrade"] = <?php echo $ivf_embryology_chart_list->EndingGrade->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_EndingGrade"].options = <?php echo JsonEncode($ivf_embryology_chart_list->EndingGrade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_EndingState"] = <?php echo $ivf_embryology_chart_list->EndingState->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_EndingState"].options = <?php echo JsonEncode($ivf_embryology_chart_list->EndingState->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Stage"] = <?php echo $ivf_embryology_chart_list->Stage->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Stage"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Stage->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_thawReFrozen[]"] = <?php echo $ivf_embryology_chart_list->thawReFrozen->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_thawReFrozen[]"].options = <?php echo JsonEncode($ivf_embryology_chart_list->thawReFrozen->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_vitriDay"] = <?php echo $ivf_embryology_chart_list->vitriDay->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_vitriDay"].options = <?php echo JsonEncode($ivf_embryology_chart_list->vitriDay->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_vitriGrade"] = <?php echo $ivf_embryology_chart_list->vitriGrade->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_vitriGrade"].options = <?php echo JsonEncode($ivf_embryology_chart_list->vitriGrade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_thawET"] = <?php echo $ivf_embryology_chart_list->thawET->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_thawET"].options = <?php echo JsonEncode($ivf_embryology_chart_list->thawET->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_ETDifficulty"] = <?php echo $ivf_embryology_chart_list->ETDifficulty->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_ETDifficulty"].options = <?php echo JsonEncode($ivf_embryology_chart_list->ETDifficulty->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_ETEasy[]"] = <?php echo $ivf_embryology_chart_list->ETEasy->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_ETEasy[]"].options = <?php echo JsonEncode($ivf_embryology_chart_list->ETEasy->options(FALSE, TRUE)) ?>;
fivf_embryology_chartlist.lists["x_Day1End"] = <?php echo $ivf_embryology_chart_list->Day1End->Lookup->toClientList() ?>;
fivf_embryology_chartlist.lists["x_Day1End"].options = <?php echo JsonEncode($ivf_embryology_chart_list->Day1End->options(FALSE, TRUE)) ?>;

// Form object for search
var fivf_embryology_chartlistsrch = currentSearchForm = new ew.Form("fivf_embryology_chartlistsrch");

// Filters
fivf_embryology_chartlistsrch.filterList = <?php echo $ivf_embryology_chart_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
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
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

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
</script>
<?php } ?>
<?php if (!$ivf_embryology_chart->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_embryology_chart_list->TotalRecs > 0 && $ivf_embryology_chart_list->ExportOptions->visible()) { ?>
<?php $ivf_embryology_chart_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_embryology_chart_list->ImportOptions->visible()) { ?>
<?php $ivf_embryology_chart_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_embryology_chart_list->SearchOptions->visible()) { ?>
<?php $ivf_embryology_chart_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_embryology_chart_list->FilterOptions->visible()) { ?>
<?php $ivf_embryology_chart_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$ivf_embryology_chart->isExport() || EXPORT_MASTER_RECORD && $ivf_embryology_chart->isExport("print")) { ?>
<?php
if ($ivf_embryology_chart_list->DbMasterFilter <> "" && $ivf_embryology_chart->getCurrentMasterTable() == "ivf_treatment_plan") {
	if ($ivf_embryology_chart_list->MasterRecordExists) {
		include_once "ivf_treatment_planmaster.php";
	}
}
?>
<?php
if ($ivf_embryology_chart_list->DbMasterFilter <> "" && $ivf_embryology_chart->getCurrentMasterTable() == "ivf_oocytedenudation") {
	if ($ivf_embryology_chart_list->MasterRecordExists) {
		include_once "ivf_oocytedenudationmaster.php";
	}
}
?>
<?php } ?>
<?php
$ivf_embryology_chart_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_embryology_chart->isExport() && !$ivf_embryology_chart->CurrentAction) { ?>
<form name="fivf_embryology_chartlistsrch" id="fivf_embryology_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_embryology_chart_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_embryology_chartlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_embryology_chart">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_embryology_chart_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_embryology_chart_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_embryology_chart_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_embryology_chart_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_embryology_chart_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_embryology_chart_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_embryology_chart_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_embryology_chart_list->showPageHeader(); ?>
<?php
$ivf_embryology_chart_list->showMessage();
?>
<?php if ($ivf_embryology_chart_list->TotalRecs > 0 || $ivf_embryology_chart->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_embryology_chart_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_embryology_chart">
<?php if (!$ivf_embryology_chart->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_embryology_chart->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_embryology_chart_list->Pager)) $ivf_embryology_chart_list->Pager = new NumericPager($ivf_embryology_chart_list->StartRec, $ivf_embryology_chart_list->DisplayRecs, $ivf_embryology_chart_list->TotalRecs, $ivf_embryology_chart_list->RecRange, $ivf_embryology_chart_list->AutoHidePager) ?>
<?php if ($ivf_embryology_chart_list->Pager->RecordCount > 0 && $ivf_embryology_chart_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_embryology_chart_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_embryology_chart_list->pageUrl() ?>start=<?php echo $ivf_embryology_chart_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_embryology_chart_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_embryology_chart_list->pageUrl() ?>start=<?php echo $ivf_embryology_chart_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_embryology_chart_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_embryology_chart_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_embryology_chart_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_embryology_chart_list->pageUrl() ?>start=<?php echo $ivf_embryology_chart_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_embryology_chart_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_embryology_chart_list->pageUrl() ?>start=<?php echo $ivf_embryology_chart_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_embryology_chart_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_embryology_chart_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_embryology_chart_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_embryology_chart_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_embryology_chart_list->TotalRecs > 0 && (!$ivf_embryology_chart_list->AutoHidePageSizeSelector || $ivf_embryology_chart_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_embryology_chart">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_embryology_chart_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_embryology_chart_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_embryology_chart_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_embryology_chart_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_embryology_chart_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_embryology_chart_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="2000"<?php if ($ivf_embryology_chart_list->DisplayRecs == 2000) { ?> selected<?php } ?>>2000</option>
<option value="ALL"<?php if ($ivf_embryology_chart->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_embryology_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_embryology_chartlist" id="fivf_embryology_chartlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_embryology_chart_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_embryology_chart_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<?php if ($ivf_embryology_chart->getCurrentMasterTable() == "ivf_treatment_plan" && $ivf_embryology_chart->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo $ivf_embryology_chart->RIDNo->getSessionValue() ?>">
<input type="hidden" name="fk_Name" value="<?php echo $ivf_embryology_chart->Name->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $ivf_embryology_chart->TidNo->getSessionValue() ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->getCurrentMasterTable() == "ivf_oocytedenudation" && $ivf_embryology_chart->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ivf_oocytedenudation">
<input type="hidden" name="fk_id" value="<?php echo $ivf_embryology_chart->DidNO->getSessionValue() ?>">
<?php } ?>
<div id="gmp_ivf_embryology_chart" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_embryology_chart_list->TotalRecs > 0 || $ivf_embryology_chart->isAdd() || $ivf_embryology_chart->isCopy() || $ivf_embryology_chart->isGridEdit()) { ?>
<table id="tbl_ivf_embryology_chartlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_embryology_chart_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_embryology_chart_list->renderListOptions();

// Render list options (header, left)
$ivf_embryology_chart_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_embryology_chart->id->Visible) { // id ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_embryology_chart->id->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_id" class="ivf_embryology_chart_id"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_embryology_chart->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->id) ?>',1);"><div id="elh_ivf_embryology_chart_id" class="ivf_embryology_chart_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_embryology_chart->RIDNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_embryology_chart->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->RIDNo) ?>',1);"><div id="elh_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Name->Visible) { // Name ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_embryology_chart->Name->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_embryology_chart->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Name) ?>',1);"><div id="elh_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_embryology_chart->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_embryology_chart->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->ARTCycle) ?>',1);"><div id="elh_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ARTCycle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->ARTCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->ARTCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->SpermOrigin->Visible) { // SpermOrigin ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->SpermOrigin) == "") { ?>
		<th data-name="SpermOrigin" class="<?php echo $ivf_embryology_chart->SpermOrigin->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->SpermOrigin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpermOrigin" class="<?php echo $ivf_embryology_chart->SpermOrigin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->SpermOrigin) ?>',1);"><div id="elh_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->SpermOrigin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->SpermOrigin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->SpermOrigin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->InseminatinTechnique) == "") { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_embryology_chart->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->InseminatinTechnique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_embryology_chart->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->InseminatinTechnique) ?>',1);"><div id="elh_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->InseminatinTechnique->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->InseminatinTechnique->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->InseminatinTechnique->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->IndicationForART->Visible) { // IndicationForART ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->IndicationForART) == "") { ?>
		<th data-name="IndicationForART" class="<?php echo $ivf_embryology_chart->IndicationForART->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->IndicationForART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IndicationForART" class="<?php echo $ivf_embryology_chart->IndicationForART->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->IndicationForART) ?>',1);"><div id="elh_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->IndicationForART->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->IndicationForART->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->IndicationForART->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0sino->Visible) { // Day0sino ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day0sino) == "") { ?>
		<th data-name="Day0sino" class="<?php echo $ivf_embryology_chart->Day0sino->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0sino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0sino" class="<?php echo $ivf_embryology_chart->Day0sino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0sino) ?>',1);"><div id="elh_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0sino->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day0sino->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day0sino->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day0OocyteStage) == "") { ?>
		<th data-name="Day0OocyteStage" class="<?php echo $ivf_embryology_chart->Day0OocyteStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0OocyteStage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0OocyteStage" class="<?php echo $ivf_embryology_chart->Day0OocyteStage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0OocyteStage) ?>',1);"><div id="elh_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0OocyteStage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day0OocyteStage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day0OocyteStage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day0PolarBodyPosition) == "") { ?>
		<th data-name="Day0PolarBodyPosition" class="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0PolarBodyPosition->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0PolarBodyPosition" class="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0PolarBodyPosition) ?>',1);"><div id="elh_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0PolarBodyPosition->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day0PolarBodyPosition->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day0PolarBodyPosition->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Breakage->Visible) { // Day0Breakage ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day0Breakage) == "") { ?>
		<th data-name="Day0Breakage" class="<?php echo $ivf_embryology_chart->Day0Breakage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0Breakage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0Breakage" class="<?php echo $ivf_embryology_chart->Day0Breakage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0Breakage) ?>',1);"><div id="elh_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0Breakage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day0Breakage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day0Breakage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Attempts->Visible) { // Day0Attempts ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day0Attempts) == "") { ?>
		<th data-name="Day0Attempts" class="<?php echo $ivf_embryology_chart->Day0Attempts->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0Attempts->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0Attempts" class="<?php echo $ivf_embryology_chart->Day0Attempts->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0Attempts) ?>',1);"><div id="elh_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0Attempts->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day0Attempts->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day0Attempts->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day0SPZMorpho) == "") { ?>
		<th data-name="Day0SPZMorpho" class="<?php echo $ivf_embryology_chart->Day0SPZMorpho->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0SPZMorpho->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0SPZMorpho" class="<?php echo $ivf_embryology_chart->Day0SPZMorpho->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0SPZMorpho) ?>',1);"><div id="elh_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0SPZMorpho->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day0SPZMorpho->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day0SPZMorpho->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day0SPZLocation) == "") { ?>
		<th data-name="Day0SPZLocation" class="<?php echo $ivf_embryology_chart->Day0SPZLocation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0SPZLocation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0SPZLocation" class="<?php echo $ivf_embryology_chart->Day0SPZLocation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0SPZLocation) ?>',1);"><div id="elh_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0SPZLocation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day0SPZLocation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day0SPZLocation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day0SpOrgin) == "") { ?>
		<th data-name="Day0SpOrgin" class="<?php echo $ivf_embryology_chart->Day0SpOrgin->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0SpOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0SpOrgin" class="<?php echo $ivf_embryology_chart->Day0SpOrgin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0SpOrgin) ?>',1);"><div id="elh_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0SpOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day0SpOrgin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day0SpOrgin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day5Cryoptop) == "") { ?>
		<th data-name="Day5Cryoptop" class="<?php echo $ivf_embryology_chart->Day5Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Cryoptop->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5Cryoptop" class="<?php echo $ivf_embryology_chart->Day5Cryoptop->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5Cryoptop) ?>',1);"><div id="elh_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day5Cryoptop->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day5Cryoptop->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Sperm->Visible) { // Day1Sperm ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day1Sperm) == "") { ?>
		<th data-name="Day1Sperm" class="<?php echo $ivf_embryology_chart->Day1Sperm->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Sperm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1Sperm" class="<?php echo $ivf_embryology_chart->Day1Sperm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1Sperm) ?>',1);"><div id="elh_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Sperm->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day1Sperm->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day1Sperm->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PN->Visible) { // Day1PN ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day1PN) == "") { ?>
		<th data-name="Day1PN" class="<?php echo $ivf_embryology_chart->Day1PN->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1PN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1PN" class="<?php echo $ivf_embryology_chart->Day1PN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1PN) ?>',1);"><div id="elh_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1PN->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day1PN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day1PN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PB->Visible) { // Day1PB ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day1PB) == "") { ?>
		<th data-name="Day1PB" class="<?php echo $ivf_embryology_chart->Day1PB->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1PB->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1PB" class="<?php echo $ivf_embryology_chart->Day1PB->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1PB) ?>',1);"><div id="elh_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1PB->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day1PB->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day1PB->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day1Pronucleus) == "") { ?>
		<th data-name="Day1Pronucleus" class="<?php echo $ivf_embryology_chart->Day1Pronucleus->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Pronucleus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1Pronucleus" class="<?php echo $ivf_embryology_chart->Day1Pronucleus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1Pronucleus) ?>',1);"><div id="elh_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Pronucleus->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day1Pronucleus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day1Pronucleus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day1Nucleolus) == "") { ?>
		<th data-name="Day1Nucleolus" class="<?php echo $ivf_embryology_chart->Day1Nucleolus->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Nucleolus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1Nucleolus" class="<?php echo $ivf_embryology_chart->Day1Nucleolus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1Nucleolus) ?>',1);"><div id="elh_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Nucleolus->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day1Nucleolus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day1Nucleolus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Halo->Visible) { // Day1Halo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day1Halo) == "") { ?>
		<th data-name="Day1Halo" class="<?php echo $ivf_embryology_chart->Day1Halo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Halo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1Halo" class="<?php echo $ivf_embryology_chart->Day1Halo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1Halo) ?>',1);"><div id="elh_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Halo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day1Halo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day1Halo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2SiNo->Visible) { // Day2SiNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day2SiNo) == "") { ?>
		<th data-name="Day2SiNo" class="<?php echo $ivf_embryology_chart->Day2SiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2SiNo" class="<?php echo $ivf_embryology_chart->Day2SiNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2SiNo) ?>',1);"><div id="elh_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2SiNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day2SiNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day2SiNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2CellNo->Visible) { // Day2CellNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day2CellNo) == "") { ?>
		<th data-name="Day2CellNo" class="<?php echo $ivf_embryology_chart->Day2CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2CellNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2CellNo" class="<?php echo $ivf_embryology_chart->Day2CellNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2CellNo) ?>',1);"><div id="elh_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2CellNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day2CellNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day2CellNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Frag->Visible) { // Day2Frag ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day2Frag) == "") { ?>
		<th data-name="Day2Frag" class="<?php echo $ivf_embryology_chart->Day2Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Frag->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2Frag" class="<?php echo $ivf_embryology_chart->Day2Frag->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2Frag) ?>',1);"><div id="elh_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Frag->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day2Frag->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day2Frag->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Symmetry->Visible) { // Day2Symmetry ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day2Symmetry) == "") { ?>
		<th data-name="Day2Symmetry" class="<?php echo $ivf_embryology_chart->Day2Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Symmetry->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2Symmetry" class="<?php echo $ivf_embryology_chart->Day2Symmetry->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2Symmetry) ?>',1);"><div id="elh_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Symmetry->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day2Symmetry->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day2Symmetry->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day2Cryoptop) == "") { ?>
		<th data-name="Day2Cryoptop" class="<?php echo $ivf_embryology_chart->Day2Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Cryoptop->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2Cryoptop" class="<?php echo $ivf_embryology_chart->Day2Cryoptop->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2Cryoptop) ?>',1);"><div id="elh_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Cryoptop->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day2Cryoptop->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day2Cryoptop->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Grade->Visible) { // Day2Grade ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day2Grade) == "") { ?>
		<th data-name="Day2Grade" class="<?php echo $ivf_embryology_chart->Day2Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2Grade" class="<?php echo $ivf_embryology_chart->Day2Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2Grade) ?>',1);"><div id="elh_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Grade->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day2Grade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day2Grade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2End->Visible) { // Day2End ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day2End) == "") { ?>
		<th data-name="Day2End" class="<?php echo $ivf_embryology_chart->Day2End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2End->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2End" class="<?php echo $ivf_embryology_chart->Day2End->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2End) ?>',1);"><div id="elh_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2End->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day2End->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day2End->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Sino->Visible) { // Day3Sino ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day3Sino) == "") { ?>
		<th data-name="Day3Sino" class="<?php echo $ivf_embryology_chart->Day3Sino->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Sino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3Sino" class="<?php echo $ivf_embryology_chart->Day3Sino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Sino) ?>',1);"><div id="elh_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Sino->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day3Sino->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day3Sino->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3CellNo->Visible) { // Day3CellNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day3CellNo) == "") { ?>
		<th data-name="Day3CellNo" class="<?php echo $ivf_embryology_chart->Day3CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3CellNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3CellNo" class="<?php echo $ivf_embryology_chart->Day3CellNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3CellNo) ?>',1);"><div id="elh_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3CellNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day3CellNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day3CellNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Frag->Visible) { // Day3Frag ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day3Frag) == "") { ?>
		<th data-name="Day3Frag" class="<?php echo $ivf_embryology_chart->Day3Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Frag->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3Frag" class="<?php echo $ivf_embryology_chart->Day3Frag->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Frag) ?>',1);"><div id="elh_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Frag->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day3Frag->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day3Frag->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Symmetry->Visible) { // Day3Symmetry ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day3Symmetry) == "") { ?>
		<th data-name="Day3Symmetry" class="<?php echo $ivf_embryology_chart->Day3Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Symmetry->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3Symmetry" class="<?php echo $ivf_embryology_chart->Day3Symmetry->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Symmetry) ?>',1);"><div id="elh_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Symmetry->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day3Symmetry->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day3Symmetry->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3ZP->Visible) { // Day3ZP ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day3ZP) == "") { ?>
		<th data-name="Day3ZP" class="<?php echo $ivf_embryology_chart->Day3ZP->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3ZP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3ZP" class="<?php echo $ivf_embryology_chart->Day3ZP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3ZP) ?>',1);"><div id="elh_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3ZP->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day3ZP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day3ZP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Vacoules->Visible) { // Day3Vacoules ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day3Vacoules) == "") { ?>
		<th data-name="Day3Vacoules" class="<?php echo $ivf_embryology_chart->Day3Vacoules->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Vacoules->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3Vacoules" class="<?php echo $ivf_embryology_chart->Day3Vacoules->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Vacoules) ?>',1);"><div id="elh_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Vacoules->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day3Vacoules->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day3Vacoules->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Grade->Visible) { // Day3Grade ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day3Grade) == "") { ?>
		<th data-name="Day3Grade" class="<?php echo $ivf_embryology_chart->Day3Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3Grade" class="<?php echo $ivf_embryology_chart->Day3Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Grade) ?>',1);"><div id="elh_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day3Grade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day3Grade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day3Cryoptop) == "") { ?>
		<th data-name="Day3Cryoptop" class="<?php echo $ivf_embryology_chart->Day3Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Cryoptop->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3Cryoptop" class="<?php echo $ivf_embryology_chart->Day3Cryoptop->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Cryoptop) ?>',1);"><div id="elh_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day3Cryoptop->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day3Cryoptop->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3End->Visible) { // Day3End ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day3End) == "") { ?>
		<th data-name="Day3End" class="<?php echo $ivf_embryology_chart->Day3End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3End->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3End" class="<?php echo $ivf_embryology_chart->Day3End->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3End) ?>',1);"><div id="elh_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3End->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day3End->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day3End->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4SiNo->Visible) { // Day4SiNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day4SiNo) == "") { ?>
		<th data-name="Day4SiNo" class="<?php echo $ivf_embryology_chart->Day4SiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4SiNo" class="<?php echo $ivf_embryology_chart->Day4SiNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4SiNo) ?>',1);"><div id="elh_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4SiNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day4SiNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day4SiNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4CellNo->Visible) { // Day4CellNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day4CellNo) == "") { ?>
		<th data-name="Day4CellNo" class="<?php echo $ivf_embryology_chart->Day4CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4CellNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4CellNo" class="<?php echo $ivf_embryology_chart->Day4CellNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4CellNo) ?>',1);"><div id="elh_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4CellNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day4CellNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day4CellNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Frag->Visible) { // Day4Frag ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day4Frag) == "") { ?>
		<th data-name="Day4Frag" class="<?php echo $ivf_embryology_chart->Day4Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Frag->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4Frag" class="<?php echo $ivf_embryology_chart->Day4Frag->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4Frag) ?>',1);"><div id="elh_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Frag->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day4Frag->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day4Frag->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Symmetry->Visible) { // Day4Symmetry ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day4Symmetry) == "") { ?>
		<th data-name="Day4Symmetry" class="<?php echo $ivf_embryology_chart->Day4Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Symmetry->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4Symmetry" class="<?php echo $ivf_embryology_chart->Day4Symmetry->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4Symmetry) ?>',1);"><div id="elh_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Symmetry->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day4Symmetry->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day4Symmetry->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Grade->Visible) { // Day4Grade ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day4Grade) == "") { ?>
		<th data-name="Day4Grade" class="<?php echo $ivf_embryology_chart->Day4Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4Grade" class="<?php echo $ivf_embryology_chart->Day4Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4Grade) ?>',1);"><div id="elh_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Grade->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day4Grade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day4Grade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day4Cryoptop) == "") { ?>
		<th data-name="Day4Cryoptop" class="<?php echo $ivf_embryology_chart->Day4Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Cryoptop->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4Cryoptop" class="<?php echo $ivf_embryology_chart->Day4Cryoptop->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4Cryoptop) ?>',1);"><div id="elh_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day4Cryoptop->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day4Cryoptop->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4End->Visible) { // Day4End ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day4End) == "") { ?>
		<th data-name="Day4End" class="<?php echo $ivf_embryology_chart->Day4End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4End->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4End" class="<?php echo $ivf_embryology_chart->Day4End->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4End) ?>',1);"><div id="elh_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4End->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day4End->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day4End->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5CellNo->Visible) { // Day5CellNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day5CellNo) == "") { ?>
		<th data-name="Day5CellNo" class="<?php echo $ivf_embryology_chart->Day5CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5CellNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5CellNo" class="<?php echo $ivf_embryology_chart->Day5CellNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5CellNo) ?>',1);"><div id="elh_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5CellNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day5CellNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day5CellNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5ICM->Visible) { // Day5ICM ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day5ICM) == "") { ?>
		<th data-name="Day5ICM" class="<?php echo $ivf_embryology_chart->Day5ICM->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5ICM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5ICM" class="<?php echo $ivf_embryology_chart->Day5ICM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5ICM) ?>',1);"><div id="elh_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5ICM->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day5ICM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day5ICM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5TE->Visible) { // Day5TE ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day5TE) == "") { ?>
		<th data-name="Day5TE" class="<?php echo $ivf_embryology_chart->Day5TE->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5TE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5TE" class="<?php echo $ivf_embryology_chart->Day5TE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5TE) ?>',1);"><div id="elh_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5TE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day5TE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day5TE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Observation->Visible) { // Day5Observation ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day5Observation) == "") { ?>
		<th data-name="Day5Observation" class="<?php echo $ivf_embryology_chart->Day5Observation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Observation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5Observation" class="<?php echo $ivf_embryology_chart->Day5Observation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5Observation) ?>',1);"><div id="elh_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Observation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day5Observation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day5Observation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Collapsed->Visible) { // Day5Collapsed ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day5Collapsed) == "") { ?>
		<th data-name="Day5Collapsed" class="<?php echo $ivf_embryology_chart->Day5Collapsed->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Collapsed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5Collapsed" class="<?php echo $ivf_embryology_chart->Day5Collapsed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5Collapsed) ?>',1);"><div id="elh_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Collapsed->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day5Collapsed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day5Collapsed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day5Vacoulles) == "") { ?>
		<th data-name="Day5Vacoulles" class="<?php echo $ivf_embryology_chart->Day5Vacoulles->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Vacoulles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5Vacoulles" class="<?php echo $ivf_embryology_chart->Day5Vacoulles->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5Vacoulles) ?>',1);"><div id="elh_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Vacoulles->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day5Vacoulles->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day5Vacoulles->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Grade->Visible) { // Day5Grade ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day5Grade) == "") { ?>
		<th data-name="Day5Grade" class="<?php echo $ivf_embryology_chart->Day5Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5Grade" class="<?php echo $ivf_embryology_chart->Day5Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5Grade) ?>',1);"><div id="elh_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day5Grade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day5Grade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6CellNo->Visible) { // Day6CellNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day6CellNo) == "") { ?>
		<th data-name="Day6CellNo" class="<?php echo $ivf_embryology_chart->Day6CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6CellNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day6CellNo" class="<?php echo $ivf_embryology_chart->Day6CellNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6CellNo) ?>',1);"><div id="elh_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6CellNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day6CellNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day6CellNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6ICM->Visible) { // Day6ICM ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day6ICM) == "") { ?>
		<th data-name="Day6ICM" class="<?php echo $ivf_embryology_chart->Day6ICM->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6ICM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day6ICM" class="<?php echo $ivf_embryology_chart->Day6ICM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6ICM) ?>',1);"><div id="elh_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6ICM->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day6ICM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day6ICM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6TE->Visible) { // Day6TE ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day6TE) == "") { ?>
		<th data-name="Day6TE" class="<?php echo $ivf_embryology_chart->Day6TE->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6TE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day6TE" class="<?php echo $ivf_embryology_chart->Day6TE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6TE) ?>',1);"><div id="elh_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6TE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day6TE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day6TE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Observation->Visible) { // Day6Observation ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day6Observation) == "") { ?>
		<th data-name="Day6Observation" class="<?php echo $ivf_embryology_chart->Day6Observation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Observation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day6Observation" class="<?php echo $ivf_embryology_chart->Day6Observation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6Observation) ?>',1);"><div id="elh_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Observation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day6Observation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day6Observation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Collapsed->Visible) { // Day6Collapsed ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day6Collapsed) == "") { ?>
		<th data-name="Day6Collapsed" class="<?php echo $ivf_embryology_chart->Day6Collapsed->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Collapsed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day6Collapsed" class="<?php echo $ivf_embryology_chart->Day6Collapsed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6Collapsed) ?>',1);"><div id="elh_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Collapsed->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day6Collapsed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day6Collapsed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day6Vacoulles) == "") { ?>
		<th data-name="Day6Vacoulles" class="<?php echo $ivf_embryology_chart->Day6Vacoulles->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Vacoulles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day6Vacoulles" class="<?php echo $ivf_embryology_chart->Day6Vacoulles->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6Vacoulles) ?>',1);"><div id="elh_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Vacoulles->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day6Vacoulles->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day6Vacoulles->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Grade->Visible) { // Day6Grade ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day6Grade) == "") { ?>
		<th data-name="Day6Grade" class="<?php echo $ivf_embryology_chart->Day6Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day6Grade" class="<?php echo $ivf_embryology_chart->Day6Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6Grade) ?>',1);"><div id="elh_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day6Grade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day6Grade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day6Cryoptop) == "") { ?>
		<th data-name="Day6Cryoptop" class="<?php echo $ivf_embryology_chart->Day6Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Cryoptop->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day6Cryoptop" class="<?php echo $ivf_embryology_chart->Day6Cryoptop->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6Cryoptop) ?>',1);"><div id="elh_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Cryoptop->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day6Cryoptop->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day6Cryoptop->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->EndSiNo->Visible) { // EndSiNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->EndSiNo) == "") { ?>
		<th data-name="EndSiNo" class="<?php echo $ivf_embryology_chart->EndSiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndSiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndSiNo" class="<?php echo $ivf_embryology_chart->EndSiNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->EndSiNo) ?>',1);"><div id="elh_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndSiNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->EndSiNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->EndSiNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingDay->Visible) { // EndingDay ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->EndingDay) == "") { ?>
		<th data-name="EndingDay" class="<?php echo $ivf_embryology_chart->EndingDay->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndingDay" class="<?php echo $ivf_embryology_chart->EndingDay->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->EndingDay) ?>',1);"><div id="elh_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->EndingDay->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->EndingDay->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingCellStage->Visible) { // EndingCellStage ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->EndingCellStage) == "") { ?>
		<th data-name="EndingCellStage" class="<?php echo $ivf_embryology_chart->EndingCellStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingCellStage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndingCellStage" class="<?php echo $ivf_embryology_chart->EndingCellStage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->EndingCellStage) ?>',1);"><div id="elh_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingCellStage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->EndingCellStage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->EndingCellStage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingGrade->Visible) { // EndingGrade ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->EndingGrade) == "") { ?>
		<th data-name="EndingGrade" class="<?php echo $ivf_embryology_chart->EndingGrade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingGrade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndingGrade" class="<?php echo $ivf_embryology_chart->EndingGrade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->EndingGrade) ?>',1);"><div id="elh_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingGrade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->EndingGrade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->EndingGrade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingState->Visible) { // EndingState ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->EndingState) == "") { ?>
		<th data-name="EndingState" class="<?php echo $ivf_embryology_chart->EndingState->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingState->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndingState" class="<?php echo $ivf_embryology_chart->EndingState->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->EndingState) ?>',1);"><div id="elh_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingState->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->EndingState->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->EndingState->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_embryology_chart->TidNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_embryology_chart->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->TidNo) ?>',1);"><div id="elh_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->DidNO->Visible) { // DidNO ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->DidNO) == "") { ?>
		<th data-name="DidNO" class="<?php echo $ivf_embryology_chart->DidNO->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->DidNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DidNO" class="<?php echo $ivf_embryology_chart->DidNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->DidNO) ?>',1);"><div id="elh_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->DidNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->DidNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->DidNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->ICSiIVFDateTime) == "") { ?>
		<th data-name="ICSiIVFDateTime" class="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ICSiIVFDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSiIVFDateTime" class="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->ICSiIVFDateTime) ?>',1);"><div id="elh_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ICSiIVFDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->ICSiIVFDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->ICSiIVFDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->PrimaryEmbrologist) == "") { ?>
		<th data-name="PrimaryEmbrologist" class="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->PrimaryEmbrologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrimaryEmbrologist" class="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->PrimaryEmbrologist) ?>',1);"><div id="elh_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->PrimaryEmbrologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->PrimaryEmbrologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->PrimaryEmbrologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->SecondaryEmbrologist) == "") { ?>
		<th data-name="SecondaryEmbrologist" class="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->SecondaryEmbrologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryEmbrologist" class="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->SecondaryEmbrologist) ?>',1);"><div id="elh_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->SecondaryEmbrologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->SecondaryEmbrologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->SecondaryEmbrologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Incubator->Visible) { // Incubator ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Incubator) == "") { ?>
		<th data-name="Incubator" class="<?php echo $ivf_embryology_chart->Incubator->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Incubator->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Incubator" class="<?php echo $ivf_embryology_chart->Incubator->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Incubator) ?>',1);"><div id="elh_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Incubator->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Incubator->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Incubator->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->location->Visible) { // location ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->location) == "") { ?>
		<th data-name="location" class="<?php echo $ivf_embryology_chart->location->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_location" class="ivf_embryology_chart_location"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->location->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="location" class="<?php echo $ivf_embryology_chart->location->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->location) ?>',1);"><div id="elh_ivf_embryology_chart_location" class="ivf_embryology_chart_location">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->location->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->location->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->location->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->OocyteNo) == "") { ?>
		<th data-name="OocyteNo" class="<?php echo $ivf_embryology_chart->OocyteNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->OocyteNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteNo" class="<?php echo $ivf_embryology_chart->OocyteNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->OocyteNo) ?>',1);"><div id="elh_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->OocyteNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->OocyteNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->OocyteNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Stage->Visible) { // Stage ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Stage) == "") { ?>
		<th data-name="Stage" class="<?php echo $ivf_embryology_chart->Stage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Stage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stage" class="<?php echo $ivf_embryology_chart->Stage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Stage) ?>',1);"><div id="elh_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Stage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Stage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Stage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Remarks->Visible) { // Remarks ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $ivf_embryology_chart->Remarks->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $ivf_embryology_chart->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Remarks) ?>',1);"><div id="elh_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitrificationDate->Visible) { // vitrificationDate ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitrificationDate) == "") { ?>
		<th data-name="vitrificationDate" class="<?php echo $ivf_embryology_chart->vitrificationDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitrificationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitrificationDate" class="<?php echo $ivf_embryology_chart->vitrificationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitrificationDate) ?>',1);"><div id="elh_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitrificationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitrificationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitrificationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriPrimaryEmbryologist) == "") { ?>
		<th data-name="vitriPrimaryEmbryologist" class="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriPrimaryEmbryologist" class="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriPrimaryEmbryologist) ?>',1);"><div id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriPrimaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriSecondaryEmbryologist) == "") { ?>
		<th data-name="vitriSecondaryEmbryologist" class="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriSecondaryEmbryologist" class="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriSecondaryEmbryologist) ?>',1);"><div id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriSecondaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriEmbryoNo) == "") { ?>
		<th data-name="vitriEmbryoNo" class="<?php echo $ivf_embryology_chart->vitriEmbryoNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriEmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriEmbryoNo" class="<?php echo $ivf_embryology_chart->vitriEmbryoNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriEmbryoNo) ?>',1);"><div id="elh_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriEmbryoNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriEmbryoNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriEmbryoNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawReFrozen->Visible) { // thawReFrozen ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->thawReFrozen) == "") { ?>
		<th data-name="thawReFrozen" class="<?php echo $ivf_embryology_chart->thawReFrozen->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawReFrozen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawReFrozen" class="<?php echo $ivf_embryology_chart->thawReFrozen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawReFrozen) ?>',1);"><div id="elh_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawReFrozen->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->thawReFrozen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->thawReFrozen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriFertilisationDate) == "") { ?>
		<th data-name="vitriFertilisationDate" class="<?php echo $ivf_embryology_chart->vitriFertilisationDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriFertilisationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriFertilisationDate" class="<?php echo $ivf_embryology_chart->vitriFertilisationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriFertilisationDate) ?>',1);"><div id="elh_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriFertilisationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriFertilisationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriFertilisationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriDay->Visible) { // vitriDay ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriDay) == "") { ?>
		<th data-name="vitriDay" class="<?php echo $ivf_embryology_chart->vitriDay->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriDay" class="<?php echo $ivf_embryology_chart->vitriDay->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriDay) ?>',1);"><div id="elh_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriDay->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriDay->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriStage->Visible) { // vitriStage ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriStage) == "") { ?>
		<th data-name="vitriStage" class="<?php echo $ivf_embryology_chart->vitriStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriStage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriStage" class="<?php echo $ivf_embryology_chart->vitriStage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriStage) ?>',1);"><div id="elh_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriStage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriStage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriStage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGrade->Visible) { // vitriGrade ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriGrade) == "") { ?>
		<th data-name="vitriGrade" class="<?php echo $ivf_embryology_chart->vitriGrade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriGrade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriGrade" class="<?php echo $ivf_embryology_chart->vitriGrade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriGrade) ?>',1);"><div id="elh_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriGrade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriGrade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriGrade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriIncubator->Visible) { // vitriIncubator ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriIncubator) == "") { ?>
		<th data-name="vitriIncubator" class="<?php echo $ivf_embryology_chart->vitriIncubator->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriIncubator->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriIncubator" class="<?php echo $ivf_embryology_chart->vitriIncubator->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriIncubator) ?>',1);"><div id="elh_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriIncubator->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriIncubator->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriIncubator->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriTank->Visible) { // vitriTank ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriTank) == "") { ?>
		<th data-name="vitriTank" class="<?php echo $ivf_embryology_chart->vitriTank->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriTank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriTank" class="<?php echo $ivf_embryology_chart->vitriTank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriTank) ?>',1);"><div id="elh_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriTank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriTank->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriTank->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCanister->Visible) { // vitriCanister ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriCanister) == "") { ?>
		<th data-name="vitriCanister" class="<?php echo $ivf_embryology_chart->vitriCanister->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriCanister->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriCanister" class="<?php echo $ivf_embryology_chart->vitriCanister->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriCanister) ?>',1);"><div id="elh_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriCanister->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriCanister->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriCanister->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGobiet->Visible) { // vitriGobiet ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriGobiet) == "") { ?>
		<th data-name="vitriGobiet" class="<?php echo $ivf_embryology_chart->vitriGobiet->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriGobiet->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriGobiet" class="<?php echo $ivf_embryology_chart->vitriGobiet->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriGobiet) ?>',1);"><div id="elh_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriGobiet->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriGobiet->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriGobiet->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriViscotube->Visible) { // vitriViscotube ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriViscotube) == "") { ?>
		<th data-name="vitriViscotube" class="<?php echo $ivf_embryology_chart->vitriViscotube->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriViscotube->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriViscotube" class="<?php echo $ivf_embryology_chart->vitriViscotube->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriViscotube) ?>',1);"><div id="elh_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriViscotube->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriViscotube->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriViscotube->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriCryolockNo) == "") { ?>
		<th data-name="vitriCryolockNo" class="<?php echo $ivf_embryology_chart->vitriCryolockNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriCryolockNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriCryolockNo" class="<?php echo $ivf_embryology_chart->vitriCryolockNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriCryolockNo) ?>',1);"><div id="elh_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriCryolockNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriCryolockNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriCryolockNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->vitriCryolockColour) == "") { ?>
		<th data-name="vitriCryolockColour" class="<?php echo $ivf_embryology_chart->vitriCryolockColour->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriCryolockColour->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitriCryolockColour" class="<?php echo $ivf_embryology_chart->vitriCryolockColour->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriCryolockColour) ?>',1);"><div id="elh_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriCryolockColour->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->vitriCryolockColour->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->vitriCryolockColour->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDate->Visible) { // thawDate ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->thawDate) == "") { ?>
		<th data-name="thawDate" class="<?php echo $ivf_embryology_chart->thawDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawDate" class="<?php echo $ivf_embryology_chart->thawDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawDate) ?>',1);"><div id="elh_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->thawDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->thawDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->thawPrimaryEmbryologist) == "") { ?>
		<th data-name="thawPrimaryEmbryologist" class="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawPrimaryEmbryologist" class="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawPrimaryEmbryologist) ?>',1);"><div id="elh_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->thawPrimaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->thawSecondaryEmbryologist) == "") { ?>
		<th data-name="thawSecondaryEmbryologist" class="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawSecondaryEmbryologist" class="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawSecondaryEmbryologist) ?>',1);"><div id="elh_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->thawSecondaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawET->Visible) { // thawET ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->thawET) == "") { ?>
		<th data-name="thawET" class="<?php echo $ivf_embryology_chart->thawET->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawET" class="<?php echo $ivf_embryology_chart->thawET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawET) ?>',1);"><div id="elh_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->thawET->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->thawET->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawAbserve->Visible) { // thawAbserve ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->thawAbserve) == "") { ?>
		<th data-name="thawAbserve" class="<?php echo $ivf_embryology_chart->thawAbserve->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawAbserve->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawAbserve" class="<?php echo $ivf_embryology_chart->thawAbserve->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawAbserve) ?>',1);"><div id="elh_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawAbserve->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->thawAbserve->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->thawAbserve->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDiscard->Visible) { // thawDiscard ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->thawDiscard) == "") { ?>
		<th data-name="thawDiscard" class="<?php echo $ivf_embryology_chart->thawDiscard->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawDiscard->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawDiscard" class="<?php echo $ivf_embryology_chart->thawDiscard->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawDiscard) ?>',1);"><div id="elh_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawDiscard->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->thawDiscard->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->thawDiscard->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETCatheter->Visible) { // ETCatheter ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->ETCatheter) == "") { ?>
		<th data-name="ETCatheter" class="<?php echo $ivf_embryology_chart->ETCatheter->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETCatheter->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETCatheter" class="<?php echo $ivf_embryology_chart->ETCatheter->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETCatheter) ?>',1);"><div id="elh_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETCatheter->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->ETCatheter->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->ETCatheter->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDifficulty->Visible) { // ETDifficulty ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->ETDifficulty) == "") { ?>
		<th data-name="ETDifficulty" class="<?php echo $ivf_embryology_chart->ETDifficulty->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETDifficulty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETDifficulty" class="<?php echo $ivf_embryology_chart->ETDifficulty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETDifficulty) ?>',1);"><div id="elh_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETDifficulty->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->ETDifficulty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->ETDifficulty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEasy->Visible) { // ETEasy ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->ETEasy) == "") { ?>
		<th data-name="ETEasy" class="<?php echo $ivf_embryology_chart->ETEasy->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETEasy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETEasy" class="<?php echo $ivf_embryology_chart->ETEasy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETEasy) ?>',1);"><div id="elh_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETEasy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->ETEasy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->ETEasy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETComments->Visible) { // ETComments ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->ETComments) == "") { ?>
		<th data-name="ETComments" class="<?php echo $ivf_embryology_chart->ETComments->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETComments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETComments" class="<?php echo $ivf_embryology_chart->ETComments->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETComments) ?>',1);"><div id="elh_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETComments->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->ETComments->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->ETComments->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDoctor->Visible) { // ETDoctor ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->ETDoctor) == "") { ?>
		<th data-name="ETDoctor" class="<?php echo $ivf_embryology_chart->ETDoctor->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETDoctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETDoctor" class="<?php echo $ivf_embryology_chart->ETDoctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETDoctor) ?>',1);"><div id="elh_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETDoctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->ETDoctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->ETDoctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEmbryologist->Visible) { // ETEmbryologist ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->ETEmbryologist) == "") { ?>
		<th data-name="ETEmbryologist" class="<?php echo $ivf_embryology_chart->ETEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETEmbryologist" class="<?php echo $ivf_embryology_chart->ETEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETEmbryologist) ?>',1);"><div id="elh_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->ETEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->ETEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDate->Visible) { // ETDate ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->ETDate) == "") { ?>
		<th data-name="ETDate" class="<?php echo $ivf_embryology_chart->ETDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETDate" class="<?php echo $ivf_embryology_chart->ETDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETDate) ?>',1);"><div id="elh_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->ETDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->ETDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1End->Visible) { // Day1End ?>
	<?php if ($ivf_embryology_chart->sortUrl($ivf_embryology_chart->Day1End) == "") { ?>
		<th data-name="Day1End" class="<?php echo $ivf_embryology_chart->Day1End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End"><div class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1End->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1End" class="<?php echo $ivf_embryology_chart->Day1End->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1End) ?>',1);"><div id="elh_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1End->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart->Day1End->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_embryology_chart->Day1End->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_embryology_chart_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($ivf_embryology_chart->isAdd() || $ivf_embryology_chart->isCopy()) {
		$ivf_embryology_chart_list->RowIndex = 0;
		$ivf_embryology_chart_list->KeyCount = $ivf_embryology_chart_list->RowIndex;
		if ($ivf_embryology_chart->isCopy() && !$ivf_embryology_chart_list->loadRow())
			$ivf_embryology_chart->CurrentAction = "add";
		if ($ivf_embryology_chart->isAdd())
			$ivf_embryology_chart_list->loadRowValues();
		if ($ivf_embryology_chart->EventCancelled) // Insert failed
			$ivf_embryology_chart_list->restoreFormValues(); // Restore form values

		// Set row properties
		$ivf_embryology_chart->resetAttributes();
		$ivf_embryology_chart->RowAttrs = array_merge($ivf_embryology_chart->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_ivf_embryology_chart', 'data-rowtype'=>ROWTYPE_ADD));
		$ivf_embryology_chart->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_embryology_chart_list->renderRow();

		// Render list options
		$ivf_embryology_chart_list->renderListOptions();
		$ivf_embryology_chart_list->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_embryology_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_embryology_chart_list->ListOptions->render("body", "left", $ivf_embryology_chart_list->RowCnt);
?>
	<?php if ($ivf_embryology_chart->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_id" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_embryology_chart->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<?php if ($ivf_embryology_chart->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<span<?php echo $ivf_embryology_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" size="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->RIDNo->EditValue ?>"<?php echo $ivf_embryology_chart->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if ($ivf_embryology_chart->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<span<?php echo $ivf_embryology_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_embryology_chart->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Name" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Name->EditValue ?>"<?php echo $ivf_embryology_chart->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_embryology_chart->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ARTCycle" class="form-group ivf_embryology_chart_ARTCycle">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ARTCycle->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ARTCycle->EditValue ?>"<?php echo $ivf_embryology_chart->ARTCycle->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_embryology_chart->ARTCycle->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->SpermOrigin->Visible) { // SpermOrigin ?>
		<td data-name="SpermOrigin">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_SpermOrigin" class="form-group ivf_embryology_chart_SpermOrigin">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->SpermOrigin->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->SpermOrigin->EditValue ?>"<?php echo $ivf_embryology_chart->SpermOrigin->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" value="<?php echo HtmlEncode($ivf_embryology_chart->SpermOrigin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_InseminatinTechnique" class="form-group ivf_embryology_chart_InseminatinTechnique">
<input type="text" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->InseminatinTechnique->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->InseminatinTechnique->EditValue ?>"<?php echo $ivf_embryology_chart->InseminatinTechnique->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_embryology_chart->InseminatinTechnique->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->IndicationForART->Visible) { // IndicationForART ?>
		<td data-name="IndicationForART">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_IndicationForART" class="form-group ivf_embryology_chart_IndicationForART">
<input type="text" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->IndicationForART->EditValue ?>"<?php echo $ivf_embryology_chart->IndicationForART->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" value="<?php echo HtmlEncode($ivf_embryology_chart->IndicationForART->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0sino->Visible) { // Day0sino ?>
		<td data-name="Day0sino">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0sino" class="form-group ivf_embryology_chart_Day0sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0sino->EditValue ?>"<?php echo $ivf_embryology_chart->Day0sino->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0sino->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<td data-name="Day0OocyteStage">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0OocyteStage" class="form-group ivf_embryology_chart_Day0OocyteStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0OocyteStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0OocyteStage->EditValue ?>"<?php echo $ivf_embryology_chart->Day0OocyteStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0OocyteStage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
		<td data-name="Day0PolarBodyPosition">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group ivf_embryology_chart_Day0PolarBodyPosition">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-value-separator="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition"<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0PolarBodyPosition->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0Breakage->Visible) { // Day0Breakage ?>
		<td data-name="Day0Breakage">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0Breakage" class="form-group ivf_embryology_chart_Day0Breakage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-value-separator="<?php echo $ivf_embryology_chart->Day0Breakage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage"<?php echo $ivf_embryology_chart->Day0Breakage->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0Breakage->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0Breakage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0Attempts->Visible) { // Day0Attempts ?>
		<td data-name="Day0Attempts">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0Attempts" class="form-group ivf_embryology_chart_Day0Attempts">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-value-separator="<?php echo $ivf_embryology_chart->Day0Attempts->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts"<?php echo $ivf_embryology_chart->Day0Attempts->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0Attempts->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0Attempts->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
		<td data-name="Day0SPZMorpho">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SPZMorpho" class="form-group ivf_embryology_chart_Day0SPZMorpho">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-value-separator="<?php echo $ivf_embryology_chart->Day0SPZMorpho->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho"<?php echo $ivf_embryology_chart->Day0SPZMorpho->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SPZMorpho->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0SPZMorpho->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
		<td data-name="Day0SPZLocation">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SPZLocation" class="form-group ivf_embryology_chart_Day0SPZLocation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-value-separator="<?php echo $ivf_embryology_chart->Day0SPZLocation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation"<?php echo $ivf_embryology_chart->Day0SPZLocation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SPZLocation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0SPZLocation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
		<td data-name="Day0SpOrgin">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SpOrgin" class="form-group ivf_embryology_chart_Day0SpOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-value-separator="<?php echo $ivf_embryology_chart->Day0SpOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin"<?php echo $ivf_embryology_chart->Day0SpOrgin->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SpOrgin->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0SpOrgin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
		<td data-name="Day5Cryoptop">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Cryoptop" class="form-group ivf_embryology_chart_Day5Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day5Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop"<?php echo $ivf_embryology_chart->Day5Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Cryoptop->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Sperm->Visible) { // Day1Sperm ?>
		<td data-name="Day1Sperm">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Sperm" class="form-group ivf_embryology_chart_Day1Sperm">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day1Sperm->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day1Sperm->EditValue ?>"<?php echo $ivf_embryology_chart->Day1Sperm->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Sperm->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1PN->Visible) { // Day1PN ?>
		<td data-name="Day1PN">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1PN" class="form-group ivf_embryology_chart_Day1PN">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-value-separator="<?php echo $ivf_embryology_chart->Day1PN->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN"<?php echo $ivf_embryology_chart->Day1PN->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1PN->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1PN->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1PB->Visible) { // Day1PB ?>
		<td data-name="Day1PB">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1PB" class="form-group ivf_embryology_chart_Day1PB">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-value-separator="<?php echo $ivf_embryology_chart->Day1PB->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB"<?php echo $ivf_embryology_chart->Day1PB->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1PB->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1PB->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
		<td data-name="Day1Pronucleus">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Pronucleus" class="form-group ivf_embryology_chart_Day1Pronucleus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-value-separator="<?php echo $ivf_embryology_chart->Day1Pronucleus->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus"<?php echo $ivf_embryology_chart->Day1Pronucleus->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Pronucleus->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Pronucleus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
		<td data-name="Day1Nucleolus">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Nucleolus" class="form-group ivf_embryology_chart_Day1Nucleolus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-value-separator="<?php echo $ivf_embryology_chart->Day1Nucleolus->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus"<?php echo $ivf_embryology_chart->Day1Nucleolus->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Nucleolus->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Nucleolus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Halo->Visible) { // Day1Halo ?>
		<td data-name="Day1Halo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Halo" class="form-group ivf_embryology_chart_Day1Halo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-value-separator="<?php echo $ivf_embryology_chart->Day1Halo->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo"<?php echo $ivf_embryology_chart->Day1Halo->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Halo->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Halo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2SiNo->Visible) { // Day2SiNo ?>
		<td data-name="Day2SiNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2SiNo" class="form-group ivf_embryology_chart_Day2SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2SiNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day2SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2CellNo->Visible) { // Day2CellNo ?>
		<td data-name="Day2CellNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2CellNo" class="form-group ivf_embryology_chart_Day2CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day2CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2CellNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Frag->Visible) { // Day2Frag ?>
		<td data-name="Day2Frag">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Frag" class="form-group ivf_embryology_chart_Day2Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Frag->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Frag->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Symmetry->Visible) { // Day2Symmetry ?>
		<td data-name="Day2Symmetry">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Symmetry" class="form-group ivf_embryology_chart_Day2Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Symmetry->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Symmetry->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
		<td data-name="Day2Cryoptop">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Cryoptop" class="form-group ivf_embryology_chart_Day2Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Cryoptop->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Cryoptop->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Grade->Visible) { // Day2Grade ?>
		<td data-name="Day2Grade">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Grade" class="form-group ivf_embryology_chart_Day2Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Grade->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Grade->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2End->Visible) { // Day2End ?>
		<td data-name="Day2End">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2End" class="form-group ivf_embryology_chart_Day2End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day2End" data-value-separator="<?php echo $ivf_embryology_chart->Day2End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End"<?php echo $ivf_embryology_chart->Day2End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day2End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2End->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Sino->Visible) { // Day3Sino ?>
		<td data-name="Day3Sino">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Sino" class="form-group ivf_embryology_chart_Day3Sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3Sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3Sino->EditValue ?>"<?php echo $ivf_embryology_chart->Day3Sino->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Sino->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3CellNo->Visible) { // Day3CellNo ?>
		<td data-name="Day3CellNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3CellNo" class="form-group ivf_embryology_chart_Day3CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day3CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3CellNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Frag->Visible) { // Day3Frag ?>
		<td data-name="Day3Frag">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Frag" class="form-group ivf_embryology_chart_Day3Frag">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-value-separator="<?php echo $ivf_embryology_chart->Day3Frag->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag"<?php echo $ivf_embryology_chart->Day3Frag->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Frag->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Frag->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Symmetry->Visible) { // Day3Symmetry ?>
		<td data-name="Day3Symmetry">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Symmetry" class="form-group ivf_embryology_chart_Day3Symmetry">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-value-separator="<?php echo $ivf_embryology_chart->Day3Symmetry->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry"<?php echo $ivf_embryology_chart->Day3Symmetry->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Symmetry->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Symmetry->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3ZP->Visible) { // Day3ZP ?>
		<td data-name="Day3ZP">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3ZP" class="form-group ivf_embryology_chart_Day3ZP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-value-separator="<?php echo $ivf_embryology_chart->Day3ZP->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP"<?php echo $ivf_embryology_chart->Day3ZP->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3ZP->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3ZP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Vacoules->Visible) { // Day3Vacoules ?>
		<td data-name="Day3Vacoules">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Vacoules" class="form-group ivf_embryology_chart_Day3Vacoules">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-value-separator="<?php echo $ivf_embryology_chart->Day3Vacoules->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules"<?php echo $ivf_embryology_chart->Day3Vacoules->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Vacoules->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Vacoules->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Grade->Visible) { // Day3Grade ?>
		<td data-name="Day3Grade">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Grade" class="form-group ivf_embryology_chart_Day3Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day3Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade"<?php echo $ivf_embryology_chart->Day3Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
		<td data-name="Day3Cryoptop">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Cryoptop" class="form-group ivf_embryology_chart_Day3Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day3Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop"<?php echo $ivf_embryology_chart->Day3Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Cryoptop->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3End->Visible) { // Day3End ?>
		<td data-name="Day3End">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3End" class="form-group ivf_embryology_chart_Day3End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3End" data-value-separator="<?php echo $ivf_embryology_chart->Day3End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End"<?php echo $ivf_embryology_chart->Day3End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3End->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4SiNo->Visible) { // Day4SiNo ?>
		<td data-name="Day4SiNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4SiNo" class="form-group ivf_embryology_chart_Day4SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4SiNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day4SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4CellNo->Visible) { // Day4CellNo ?>
		<td data-name="Day4CellNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4CellNo" class="form-group ivf_embryology_chart_Day4CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day4CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4CellNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Frag->Visible) { // Day4Frag ?>
		<td data-name="Day4Frag">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Frag" class="form-group ivf_embryology_chart_Day4Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Frag->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Frag->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Symmetry->Visible) { // Day4Symmetry ?>
		<td data-name="Day4Symmetry">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Symmetry" class="form-group ivf_embryology_chart_Day4Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Symmetry->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Symmetry->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Grade->Visible) { // Day4Grade ?>
		<td data-name="Day4Grade">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Grade" class="form-group ivf_embryology_chart_Day4Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Grade->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Grade->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
		<td data-name="Day4Cryoptop">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Cryoptop" class="form-group ivf_embryology_chart_Day4Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day4Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop"<?php echo $ivf_embryology_chart->Day4Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day4Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Cryoptop->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4End->Visible) { // Day4End ?>
		<td data-name="Day4End">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4End" class="form-group ivf_embryology_chart_Day4End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4End" data-value-separator="<?php echo $ivf_embryology_chart->Day4End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End"<?php echo $ivf_embryology_chart->Day4End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day4End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4End->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5CellNo->Visible) { // Day5CellNo ?>
		<td data-name="Day5CellNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5CellNo" class="form-group ivf_embryology_chart_Day5CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day5CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day5CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day5CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5CellNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5ICM->Visible) { // Day5ICM ?>
		<td data-name="Day5ICM">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5ICM" class="form-group ivf_embryology_chart_Day5ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-value-separator="<?php echo $ivf_embryology_chart->Day5ICM->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM"<?php echo $ivf_embryology_chart->Day5ICM->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5ICM->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5ICM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5TE->Visible) { // Day5TE ?>
		<td data-name="Day5TE">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5TE" class="form-group ivf_embryology_chart_Day5TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-value-separator="<?php echo $ivf_embryology_chart->Day5TE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE"<?php echo $ivf_embryology_chart->Day5TE->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5TE->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5TE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Observation->Visible) { // Day5Observation ?>
		<td data-name="Day5Observation">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Observation" class="form-group ivf_embryology_chart_Day5Observation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-value-separator="<?php echo $ivf_embryology_chart->Day5Observation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation"<?php echo $ivf_embryology_chart->Day5Observation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Observation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Observation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Collapsed->Visible) { // Day5Collapsed ?>
		<td data-name="Day5Collapsed">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Collapsed" class="form-group ivf_embryology_chart_Day5Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-value-separator="<?php echo $ivf_embryology_chart->Day5Collapsed->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed"<?php echo $ivf_embryology_chart->Day5Collapsed->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Collapsed->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Collapsed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
		<td data-name="Day5Vacoulles">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Vacoulles" class="form-group ivf_embryology_chart_Day5Vacoulles">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-value-separator="<?php echo $ivf_embryology_chart->Day5Vacoulles->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles"<?php echo $ivf_embryology_chart->Day5Vacoulles->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Vacoulles->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Vacoulles->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Grade->Visible) { // Day5Grade ?>
		<td data-name="Day5Grade">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Grade" class="form-group ivf_embryology_chart_Day5Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day5Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade"<?php echo $ivf_embryology_chart->Day5Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6CellNo->Visible) { // Day6CellNo ?>
		<td data-name="Day6CellNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6CellNo" class="form-group ivf_embryology_chart_Day6CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day6CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6CellNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6ICM->Visible) { // Day6ICM ?>
		<td data-name="Day6ICM">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6ICM" class="form-group ivf_embryology_chart_Day6ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-value-separator="<?php echo $ivf_embryology_chart->Day6ICM->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM"<?php echo $ivf_embryology_chart->Day6ICM->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6ICM->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6ICM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6TE->Visible) { // Day6TE ?>
		<td data-name="Day6TE">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6TE" class="form-group ivf_embryology_chart_Day6TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-value-separator="<?php echo $ivf_embryology_chart->Day6TE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE"<?php echo $ivf_embryology_chart->Day6TE->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6TE->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6TE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Observation->Visible) { // Day6Observation ?>
		<td data-name="Day6Observation">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Observation" class="form-group ivf_embryology_chart_Day6Observation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-value-separator="<?php echo $ivf_embryology_chart->Day6Observation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation"<?php echo $ivf_embryology_chart->Day6Observation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Observation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Observation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Collapsed->Visible) { // Day6Collapsed ?>
		<td data-name="Day6Collapsed">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Collapsed" class="form-group ivf_embryology_chart_Day6Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-value-separator="<?php echo $ivf_embryology_chart->Day6Collapsed->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed"<?php echo $ivf_embryology_chart->Day6Collapsed->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Collapsed->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Collapsed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
		<td data-name="Day6Vacoulles">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Vacoulles" class="form-group ivf_embryology_chart_Day6Vacoulles">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-value-separator="<?php echo $ivf_embryology_chart->Day6Vacoulles->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles"<?php echo $ivf_embryology_chart->Day6Vacoulles->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Vacoulles->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Vacoulles->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Grade->Visible) { // Day6Grade ?>
		<td data-name="Day6Grade">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Grade" class="form-group ivf_embryology_chart_Day6Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day6Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade"<?php echo $ivf_embryology_chart->Day6Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
		<td data-name="Day6Cryoptop">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Cryoptop" class="form-group ivf_embryology_chart_Day6Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day6Cryoptop->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Cryoptop->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndSiNo->Visible) { // EndSiNo ?>
		<td data-name="EndSiNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndSiNo" class="form-group ivf_embryology_chart_EndSiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->EndSiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->EndSiNo->EditValue ?>"<?php echo $ivf_embryology_chart->EndSiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" value="<?php echo HtmlEncode($ivf_embryology_chart->EndSiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingDay->Visible) { // EndingDay ?>
		<td data-name="EndingDay">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingDay" class="form-group ivf_embryology_chart_EndingDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-value-separator="<?php echo $ivf_embryology_chart->EndingDay->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay"<?php echo $ivf_embryology_chart->EndingDay->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingDay->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingDay->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingCellStage->Visible) { // EndingCellStage ?>
		<td data-name="EndingCellStage">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingCellStage" class="form-group ivf_embryology_chart_EndingCellStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->EndingCellStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->EndingCellStage->EditValue ?>"<?php echo $ivf_embryology_chart->EndingCellStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingCellStage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingGrade->Visible) { // EndingGrade ?>
		<td data-name="EndingGrade">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingGrade" class="form-group ivf_embryology_chart_EndingGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-value-separator="<?php echo $ivf_embryology_chart->EndingGrade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade"<?php echo $ivf_embryology_chart->EndingGrade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingGrade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingGrade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingState->Visible) { // EndingState ?>
		<td data-name="EndingState">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingState" class="form-group ivf_embryology_chart_EndingState">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingState" data-value-separator="<?php echo $ivf_embryology_chart->EndingState->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState"<?php echo $ivf_embryology_chart->EndingState->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingState->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingState->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if ($ivf_embryology_chart->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<span<?php echo $ivf_embryology_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->TidNo->EditValue ?>"<?php echo $ivf_embryology_chart->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->DidNO->Visible) { // DidNO ?>
		<td data-name="DidNO">
<?php if ($ivf_embryology_chart->DidNO->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->DidNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" value="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<input type="text" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->DidNO->EditValue ?>"<?php echo $ivf_embryology_chart->DidNO->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" value="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
		<td data-name="ICSiIVFDateTime">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ICSiIVFDateTime" class="form-group ivf_embryology_chart_ICSiIVFDateTime">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->EditValue ?>"<?php echo $ivf_embryology_chart->ICSiIVFDateTime->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->ICSiIVFDateTime->ReadOnly && !$ivf_embryology_chart->ICSiIVFDateTime->Disabled && !isset($ivf_embryology_chart->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" value="<?php echo HtmlEncode($ivf_embryology_chart->ICSiIVFDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
		<td data-name="PrimaryEmbrologist">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_PrimaryEmbrologist" class="form-group ivf_embryology_chart_PrimaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart->PrimaryEmbrologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" value="<?php echo HtmlEncode($ivf_embryology_chart->PrimaryEmbrologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
		<td data-name="SecondaryEmbrologist">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_SecondaryEmbrologist" class="form-group ivf_embryology_chart_SecondaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart->SecondaryEmbrologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" value="<?php echo HtmlEncode($ivf_embryology_chart->SecondaryEmbrologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Incubator" class="form-group ivf_embryology_chart_Incubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Incubator->EditValue ?>"<?php echo $ivf_embryology_chart->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_embryology_chart->Incubator->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->location->Visible) { // location ?>
		<td data-name="location">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_location" class="form-group ivf_embryology_chart_location">
<input type="text" data-table="ivf_embryology_chart" data-field="x_location" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->location->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->location->EditValue ?>"<?php echo $ivf_embryology_chart->location->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" value="<?php echo HtmlEncode($ivf_embryology_chart->location->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
		<td data-name="OocyteNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_OocyteNo" class="form-group ivf_embryology_chart_OocyteNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->OocyteNo->EditValue ?>"<?php echo $ivf_embryology_chart->OocyteNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_embryology_chart->OocyteNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Stage->Visible) { // Stage ?>
		<td data-name="Stage">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Stage" class="form-group ivf_embryology_chart_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Stage" data-value-separator="<?php echo $ivf_embryology_chart->Stage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage"<?php echo $ivf_embryology_chart->Stage->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Stage->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_embryology_chart->Stage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Remarks" class="form-group ivf_embryology_chart_Remarks">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Remarks->EditValue ?>"<?php echo $ivf_embryology_chart->Remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($ivf_embryology_chart->Remarks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitrificationDate" class="form-group ivf_embryology_chart_vitrificationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" size="12" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitrificationDate->EditValue ?>"<?php echo $ivf_embryology_chart->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->vitrificationDate->ReadOnly && !$ivf_embryology_chart->vitrificationDate->Disabled && !isset($ivf_embryology_chart->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_embryology_chart->vitrificationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
		<td data-name="vitriPrimaryEmbryologist">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group ivf_embryology_chart_vitriPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriPrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
		<td data-name="vitriSecondaryEmbryologist">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group ivf_embryology_chart_vitriSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriSecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
		<td data-name="vitriEmbryoNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriEmbryoNo" class="form-group ivf_embryology_chart_vitriEmbryoNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriEmbryoNo->EditValue ?>"<?php echo $ivf_embryology_chart->vitriEmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriEmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawReFrozen->Visible) { // thawReFrozen ?>
		<td data-name="thawReFrozen">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawReFrozen" class="form-group ivf_embryology_chart_thawReFrozen">
<div id="tp_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-value-separator="<?php echo $ivf_embryology_chart->thawReFrozen->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" value="{value}"<?php echo $ivf_embryology_chart->thawReFrozen->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart->thawReFrozen->checkBoxListHtml(FALSE, "x{$ivf_embryology_chart_list->RowIndex}_thawReFrozen[]") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" value="<?php echo HtmlEncode($ivf_embryology_chart->thawReFrozen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
		<td data-name="vitriFertilisationDate">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriFertilisationDate" class="form-group ivf_embryology_chart_vitriFertilisationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriFertilisationDate->EditValue ?>"<?php echo $ivf_embryology_chart->vitriFertilisationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->vitriFertilisationDate->ReadOnly && !$ivf_embryology_chart->vitriFertilisationDate->Disabled && !isset($ivf_embryology_chart->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriFertilisationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriDay->Visible) { // vitriDay ?>
		<td data-name="vitriDay">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriDay" class="form-group ivf_embryology_chart_vitriDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-value-separator="<?php echo $ivf_embryology_chart->vitriDay->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay"<?php echo $ivf_embryology_chart->vitriDay->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->vitriDay->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriDay->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriStage->Visible) { // vitriStage ?>
		<td data-name="vitriStage">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriStage" class="form-group ivf_embryology_chart_vitriStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriStage->EditValue ?>"<?php echo $ivf_embryology_chart->vitriStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriStage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriGrade->Visible) { // vitriGrade ?>
		<td data-name="vitriGrade">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriGrade" class="form-group ivf_embryology_chart_vitriGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-value-separator="<?php echo $ivf_embryology_chart->vitriGrade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade"<?php echo $ivf_embryology_chart->vitriGrade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->vitriGrade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriGrade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriIncubator->Visible) { // vitriIncubator ?>
		<td data-name="vitriIncubator">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriIncubator" class="form-group ivf_embryology_chart_vitriIncubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriIncubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriIncubator->EditValue ?>"<?php echo $ivf_embryology_chart->vitriIncubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriIncubator->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriTank->Visible) { // vitriTank ?>
		<td data-name="vitriTank">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriTank" class="form-group ivf_embryology_chart_vitriTank">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriTank->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriTank->EditValue ?>"<?php echo $ivf_embryology_chart->vitriTank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriTank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriCanister->Visible) { // vitriCanister ?>
		<td data-name="vitriCanister">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCanister" class="form-group ivf_embryology_chart_vitriCanister">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCanister->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCanister->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCanister->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriCanister->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriGobiet->Visible) { // vitriGobiet ?>
		<td data-name="vitriGobiet">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriGobiet" class="form-group ivf_embryology_chart_vitriGobiet">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriGobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriGobiet->EditValue ?>"<?php echo $ivf_embryology_chart->vitriGobiet->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriGobiet->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriViscotube->Visible) { // vitriViscotube ?>
		<td data-name="vitriViscotube">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriViscotube" class="form-group ivf_embryology_chart_vitriViscotube">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriViscotube->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriViscotube->EditValue ?>"<?php echo $ivf_embryology_chart->vitriViscotube->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriViscotube->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
		<td data-name="vitriCryolockNo">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCryolockNo" class="form-group ivf_embryology_chart_vitriCryolockNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCryolockNo->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCryolockNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
		<td data-name="vitriCryolockColour">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCryolockColour" class="form-group ivf_embryology_chart_vitriCryolockColour">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCryolockColour->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCryolockColour->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockColour->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawDate->Visible) { // thawDate ?>
		<td data-name="thawDate">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawDate" class="form-group ivf_embryology_chart_thawDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawDate->EditValue ?>"<?php echo $ivf_embryology_chart->thawDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->thawDate->ReadOnly && !$ivf_embryology_chart->thawDate->Disabled && !isset($ivf_embryology_chart->thawDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->thawDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" value="<?php echo HtmlEncode($ivf_embryology_chart->thawDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<td data-name="thawPrimaryEmbryologist">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group ivf_embryology_chart_thawPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->thawPrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<td data-name="thawSecondaryEmbryologist">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group ivf_embryology_chart_thawSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->thawSecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawET->Visible) { // thawET ?>
		<td data-name="thawET">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawET" class="form-group ivf_embryology_chart_thawET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_thawET" data-value-separator="<?php echo $ivf_embryology_chart->thawET->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET"<?php echo $ivf_embryology_chart->thawET->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->thawET->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET" value="<?php echo HtmlEncode($ivf_embryology_chart->thawET->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawAbserve->Visible) { // thawAbserve ?>
		<td data-name="thawAbserve">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawAbserve" class="form-group ivf_embryology_chart_thawAbserve">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawAbserve->EditValue ?>"<?php echo $ivf_embryology_chart->thawAbserve->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" value="<?php echo HtmlEncode($ivf_embryology_chart->thawAbserve->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawDiscard->Visible) { // thawDiscard ?>
		<td data-name="thawDiscard">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawDiscard" class="form-group ivf_embryology_chart_thawDiscard">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawDiscard->EditValue ?>"<?php echo $ivf_embryology_chart->thawDiscard->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" value="<?php echo HtmlEncode($ivf_embryology_chart->thawDiscard->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETCatheter->Visible) { // ETCatheter ?>
		<td data-name="ETCatheter">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETCatheter" class="form-group ivf_embryology_chart_ETCatheter">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETCatheter->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETCatheter->EditValue ?>"<?php echo $ivf_embryology_chart->ETCatheter->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" value="<?php echo HtmlEncode($ivf_embryology_chart->ETCatheter->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETDifficulty->Visible) { // ETDifficulty ?>
		<td data-name="ETDifficulty">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDifficulty" class="form-group ivf_embryology_chart_ETDifficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-value-separator="<?php echo $ivf_embryology_chart->ETDifficulty->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty"<?php echo $ivf_embryology_chart->ETDifficulty->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->ETDifficulty->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty" value="<?php echo HtmlEncode($ivf_embryology_chart->ETDifficulty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETEasy->Visible) { // ETEasy ?>
		<td data-name="ETEasy">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETEasy" class="form-group ivf_embryology_chart_ETEasy">
<div id="tp_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-value-separator="<?php echo $ivf_embryology_chart->ETEasy->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" value="{value}"<?php echo $ivf_embryology_chart->ETEasy->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart->ETEasy->checkBoxListHtml(FALSE, "x{$ivf_embryology_chart_list->RowIndex}_ETEasy[]") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" value="<?php echo HtmlEncode($ivf_embryology_chart->ETEasy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETComments->Visible) { // ETComments ?>
		<td data-name="ETComments">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETComments" class="form-group ivf_embryology_chart_ETComments">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETComments->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETComments->EditValue ?>"<?php echo $ivf_embryology_chart->ETComments->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" value="<?php echo HtmlEncode($ivf_embryology_chart->ETComments->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETDoctor->Visible) { // ETDoctor ?>
		<td data-name="ETDoctor">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDoctor" class="form-group ivf_embryology_chart_ETDoctor">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETDoctor->EditValue ?>"<?php echo $ivf_embryology_chart->ETDoctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" value="<?php echo HtmlEncode($ivf_embryology_chart->ETDoctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETEmbryologist->Visible) { // ETEmbryologist ?>
		<td data-name="ETEmbryologist">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETEmbryologist" class="form-group ivf_embryology_chart_ETEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->ETEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->ETEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETDate->Visible) { // ETDate ?>
		<td data-name="ETDate">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDate" class="form-group ivf_embryology_chart_ETDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETDate->EditValue ?>"<?php echo $ivf_embryology_chart->ETDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->ETDate->ReadOnly && !$ivf_embryology_chart->ETDate->Disabled && !isset($ivf_embryology_chart->ETDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->ETDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" value="<?php echo HtmlEncode($ivf_embryology_chart->ETDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1End->Visible) { // Day1End ?>
		<td data-name="Day1End">
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1End" class="form-group ivf_embryology_chart_Day1End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1End" data-value-separator="<?php echo $ivf_embryology_chart->Day1End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End"<?php echo $ivf_embryology_chart->Day1End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1End->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_embryology_chart_list->ListOptions->render("body", "right", $ivf_embryology_chart_list->RowCnt);
?>
<script>
fivf_embryology_chartlist.updateLists(<?php echo $ivf_embryology_chart_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($ivf_embryology_chart->ExportAll && $ivf_embryology_chart->isExport()) {
	$ivf_embryology_chart_list->StopRec = $ivf_embryology_chart_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_embryology_chart_list->TotalRecs > $ivf_embryology_chart_list->StartRec + $ivf_embryology_chart_list->DisplayRecs - 1)
		$ivf_embryology_chart_list->StopRec = $ivf_embryology_chart_list->StartRec + $ivf_embryology_chart_list->DisplayRecs - 1;
	else
		$ivf_embryology_chart_list->StopRec = $ivf_embryology_chart_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $ivf_embryology_chart_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_embryology_chart_list->FormKeyCountName) && ($ivf_embryology_chart->isGridAdd() || $ivf_embryology_chart->isGridEdit() || $ivf_embryology_chart->isConfirm())) {
		$ivf_embryology_chart_list->KeyCount = $CurrentForm->getValue($ivf_embryology_chart_list->FormKeyCountName);
		$ivf_embryology_chart_list->StopRec = $ivf_embryology_chart_list->StartRec + $ivf_embryology_chart_list->KeyCount - 1;
	}
}
$ivf_embryology_chart_list->RecCnt = $ivf_embryology_chart_list->StartRec - 1;
if ($ivf_embryology_chart_list->Recordset && !$ivf_embryology_chart_list->Recordset->EOF) {
	$ivf_embryology_chart_list->Recordset->moveFirst();
	$selectLimit = $ivf_embryology_chart_list->UseSelectLimit;
	if (!$selectLimit && $ivf_embryology_chart_list->StartRec > 1)
		$ivf_embryology_chart_list->Recordset->move($ivf_embryology_chart_list->StartRec - 1);
} elseif (!$ivf_embryology_chart->AllowAddDeleteRow && $ivf_embryology_chart_list->StopRec == 0) {
	$ivf_embryology_chart_list->StopRec = $ivf_embryology_chart->GridAddRowCount;
}

// Initialize aggregate
$ivf_embryology_chart->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_embryology_chart->resetAttributes();
$ivf_embryology_chart_list->renderRow();
$ivf_embryology_chart_list->EditRowCnt = 0;
if ($ivf_embryology_chart->isEdit())
	$ivf_embryology_chart_list->RowIndex = 1;
if ($ivf_embryology_chart->isGridAdd())
	$ivf_embryology_chart_list->RowIndex = 0;
if ($ivf_embryology_chart->isGridEdit())
	$ivf_embryology_chart_list->RowIndex = 0;
while ($ivf_embryology_chart_list->RecCnt < $ivf_embryology_chart_list->StopRec) {
	$ivf_embryology_chart_list->RecCnt++;
	if ($ivf_embryology_chart_list->RecCnt >= $ivf_embryology_chart_list->StartRec) {
		$ivf_embryology_chart_list->RowCnt++;
		if ($ivf_embryology_chart->isGridAdd() || $ivf_embryology_chart->isGridEdit() || $ivf_embryology_chart->isConfirm()) {
			$ivf_embryology_chart_list->RowIndex++;
			$CurrentForm->Index = $ivf_embryology_chart_list->RowIndex;
			if ($CurrentForm->hasValue($ivf_embryology_chart_list->FormActionName) && $ivf_embryology_chart_list->EventCancelled)
				$ivf_embryology_chart_list->RowAction = strval($CurrentForm->getValue($ivf_embryology_chart_list->FormActionName));
			elseif ($ivf_embryology_chart->isGridAdd())
				$ivf_embryology_chart_list->RowAction = "insert";
			else
				$ivf_embryology_chart_list->RowAction = "";
		}

		// Set up key count
		$ivf_embryology_chart_list->KeyCount = $ivf_embryology_chart_list->RowIndex;

		// Init row class and style
		$ivf_embryology_chart->resetAttributes();
		$ivf_embryology_chart->CssClass = "";
		if ($ivf_embryology_chart->isGridAdd()) {
			$ivf_embryology_chart_list->loadRowValues(); // Load default values
		} else {
			$ivf_embryology_chart_list->loadRowValues($ivf_embryology_chart_list->Recordset); // Load row values
		}
		$ivf_embryology_chart->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_embryology_chart->isGridAdd()) // Grid add
			$ivf_embryology_chart->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_embryology_chart->isGridAdd() && $ivf_embryology_chart->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_embryology_chart_list->restoreCurrentRowFormValues($ivf_embryology_chart_list->RowIndex); // Restore form values
		if ($ivf_embryology_chart->isEdit()) {
			if ($ivf_embryology_chart_list->checkInlineEditKey() && $ivf_embryology_chart_list->EditRowCnt == 0) { // Inline edit
				$ivf_embryology_chart->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($ivf_embryology_chart->isGridEdit()) { // Grid edit
			if ($ivf_embryology_chart->EventCancelled)
				$ivf_embryology_chart_list->restoreCurrentRowFormValues($ivf_embryology_chart_list->RowIndex); // Restore form values
			if ($ivf_embryology_chart_list->RowAction == "insert")
				$ivf_embryology_chart->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_embryology_chart->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_embryology_chart->isEdit() && $ivf_embryology_chart->RowType == ROWTYPE_EDIT && $ivf_embryology_chart->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$ivf_embryology_chart_list->restoreFormValues(); // Restore form values
		}
		if ($ivf_embryology_chart->isGridEdit() && ($ivf_embryology_chart->RowType == ROWTYPE_EDIT || $ivf_embryology_chart->RowType == ROWTYPE_ADD) && $ivf_embryology_chart->EventCancelled) // Update failed
			$ivf_embryology_chart_list->restoreCurrentRowFormValues($ivf_embryology_chart_list->RowIndex); // Restore form values
		if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_embryology_chart_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$ivf_embryology_chart->RowAttrs = array_merge($ivf_embryology_chart->RowAttrs, array('data-rowindex'=>$ivf_embryology_chart_list->RowCnt, 'id'=>'r' . $ivf_embryology_chart_list->RowCnt . '_ivf_embryology_chart', 'data-rowtype'=>$ivf_embryology_chart->RowType));

		// Render row
		$ivf_embryology_chart_list->renderRow();

		// Render list options
		$ivf_embryology_chart_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_embryology_chart_list->RowAction <> "delete" && $ivf_embryology_chart_list->RowAction <> "insertdelete" && !($ivf_embryology_chart_list->RowAction == "insert" && $ivf_embryology_chart->isConfirm() && $ivf_embryology_chart_list->emptyRow())) {
?>
	<tr<?php echo $ivf_embryology_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_embryology_chart_list->ListOptions->render("body", "left", $ivf_embryology_chart_list->RowCnt);
?>
	<?php if ($ivf_embryology_chart->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_embryology_chart->id->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_id" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_embryology_chart->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_id" class="form-group ivf_embryology_chart_id">
<span<?php echo $ivf_embryology_chart->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_id" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_embryology_chart->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_id" class="ivf_embryology_chart_id">
<span<?php echo $ivf_embryology_chart->id->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_embryology_chart->RIDNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_embryology_chart->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<span<?php echo $ivf_embryology_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" size="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->RIDNo->EditValue ?>"<?php echo $ivf_embryology_chart->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<span<?php echo $ivf_embryology_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->RIDNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo">
<span<?php echo $ivf_embryology_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->RIDNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_embryology_chart->Name->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_embryology_chart->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<span<?php echo $ivf_embryology_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_embryology_chart->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Name" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Name->EditValue ?>"<?php echo $ivf_embryology_chart->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_embryology_chart->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<span<?php echo $ivf_embryology_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->Name->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_embryology_chart->Name->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name">
<span<?php echo $ivf_embryology_chart->Name->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle"<?php echo $ivf_embryology_chart->ARTCycle->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ARTCycle" class="form-group ivf_embryology_chart_ARTCycle">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ARTCycle->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ARTCycle->EditValue ?>"<?php echo $ivf_embryology_chart->ARTCycle->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_embryology_chart->ARTCycle->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ARTCycle" class="form-group ivf_embryology_chart_ARTCycle">
<span<?php echo $ivf_embryology_chart->ARTCycle->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->ARTCycle->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_embryology_chart->ARTCycle->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle">
<span<?php echo $ivf_embryology_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ARTCycle->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->SpermOrigin->Visible) { // SpermOrigin ?>
		<td data-name="SpermOrigin"<?php echo $ivf_embryology_chart->SpermOrigin->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_SpermOrigin" class="form-group ivf_embryology_chart_SpermOrigin">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->SpermOrigin->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->SpermOrigin->EditValue ?>"<?php echo $ivf_embryology_chart->SpermOrigin->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" value="<?php echo HtmlEncode($ivf_embryology_chart->SpermOrigin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_SpermOrigin" class="form-group ivf_embryology_chart_SpermOrigin">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->SpermOrigin->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->SpermOrigin->EditValue ?>"<?php echo $ivf_embryology_chart->SpermOrigin->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin">
<span<?php echo $ivf_embryology_chart->SpermOrigin->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->SpermOrigin->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique"<?php echo $ivf_embryology_chart->InseminatinTechnique->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_InseminatinTechnique" class="form-group ivf_embryology_chart_InseminatinTechnique">
<input type="text" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->InseminatinTechnique->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->InseminatinTechnique->EditValue ?>"<?php echo $ivf_embryology_chart->InseminatinTechnique->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_embryology_chart->InseminatinTechnique->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_InseminatinTechnique" class="form-group ivf_embryology_chart_InseminatinTechnique">
<input type="text" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->InseminatinTechnique->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->InseminatinTechnique->EditValue ?>"<?php echo $ivf_embryology_chart->InseminatinTechnique->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique">
<span<?php echo $ivf_embryology_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->InseminatinTechnique->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->IndicationForART->Visible) { // IndicationForART ?>
		<td data-name="IndicationForART"<?php echo $ivf_embryology_chart->IndicationForART->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_IndicationForART" class="form-group ivf_embryology_chart_IndicationForART">
<input type="text" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->IndicationForART->EditValue ?>"<?php echo $ivf_embryology_chart->IndicationForART->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" value="<?php echo HtmlEncode($ivf_embryology_chart->IndicationForART->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_IndicationForART" class="form-group ivf_embryology_chart_IndicationForART">
<input type="text" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->IndicationForART->EditValue ?>"<?php echo $ivf_embryology_chart->IndicationForART->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART">
<span<?php echo $ivf_embryology_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->IndicationForART->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0sino->Visible) { // Day0sino ?>
		<td data-name="Day0sino"<?php echo $ivf_embryology_chart->Day0sino->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0sino" class="form-group ivf_embryology_chart_Day0sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0sino->EditValue ?>"<?php echo $ivf_embryology_chart->Day0sino->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0sino->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0sino" class="form-group ivf_embryology_chart_Day0sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0sino->EditValue ?>"<?php echo $ivf_embryology_chart->Day0sino->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino">
<span<?php echo $ivf_embryology_chart->Day0sino->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0sino->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<td data-name="Day0OocyteStage"<?php echo $ivf_embryology_chart->Day0OocyteStage->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0OocyteStage" class="form-group ivf_embryology_chart_Day0OocyteStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0OocyteStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0OocyteStage->EditValue ?>"<?php echo $ivf_embryology_chart->Day0OocyteStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0OocyteStage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0OocyteStage" class="form-group ivf_embryology_chart_Day0OocyteStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0OocyteStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0OocyteStage->EditValue ?>"<?php echo $ivf_embryology_chart->Day0OocyteStage->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage">
<span<?php echo $ivf_embryology_chart->Day0OocyteStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0OocyteStage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
		<td data-name="Day0PolarBodyPosition"<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group ivf_embryology_chart_Day0PolarBodyPosition">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-value-separator="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition"<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0PolarBodyPosition->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group ivf_embryology_chart_Day0PolarBodyPosition">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-value-separator="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition"<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition">
<span<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0Breakage->Visible) { // Day0Breakage ?>
		<td data-name="Day0Breakage"<?php echo $ivf_embryology_chart->Day0Breakage->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0Breakage" class="form-group ivf_embryology_chart_Day0Breakage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-value-separator="<?php echo $ivf_embryology_chart->Day0Breakage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage"<?php echo $ivf_embryology_chart->Day0Breakage->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0Breakage->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0Breakage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0Breakage" class="form-group ivf_embryology_chart_Day0Breakage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-value-separator="<?php echo $ivf_embryology_chart->Day0Breakage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage"<?php echo $ivf_embryology_chart->Day0Breakage->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0Breakage->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage">
<span<?php echo $ivf_embryology_chart->Day0Breakage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0Breakage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0Attempts->Visible) { // Day0Attempts ?>
		<td data-name="Day0Attempts"<?php echo $ivf_embryology_chart->Day0Attempts->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0Attempts" class="form-group ivf_embryology_chart_Day0Attempts">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-value-separator="<?php echo $ivf_embryology_chart->Day0Attempts->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts"<?php echo $ivf_embryology_chart->Day0Attempts->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0Attempts->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0Attempts->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0Attempts" class="form-group ivf_embryology_chart_Day0Attempts">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-value-separator="<?php echo $ivf_embryology_chart->Day0Attempts->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts"<?php echo $ivf_embryology_chart->Day0Attempts->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0Attempts->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts">
<span<?php echo $ivf_embryology_chart->Day0Attempts->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0Attempts->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
		<td data-name="Day0SPZMorpho"<?php echo $ivf_embryology_chart->Day0SPZMorpho->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SPZMorpho" class="form-group ivf_embryology_chart_Day0SPZMorpho">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-value-separator="<?php echo $ivf_embryology_chart->Day0SPZMorpho->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho"<?php echo $ivf_embryology_chart->Day0SPZMorpho->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SPZMorpho->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0SPZMorpho->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SPZMorpho" class="form-group ivf_embryology_chart_Day0SPZMorpho">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-value-separator="<?php echo $ivf_embryology_chart->Day0SPZMorpho->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho"<?php echo $ivf_embryology_chart->Day0SPZMorpho->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SPZMorpho->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho">
<span<?php echo $ivf_embryology_chart->Day0SPZMorpho->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SPZMorpho->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
		<td data-name="Day0SPZLocation"<?php echo $ivf_embryology_chart->Day0SPZLocation->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SPZLocation" class="form-group ivf_embryology_chart_Day0SPZLocation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-value-separator="<?php echo $ivf_embryology_chart->Day0SPZLocation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation"<?php echo $ivf_embryology_chart->Day0SPZLocation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SPZLocation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0SPZLocation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SPZLocation" class="form-group ivf_embryology_chart_Day0SPZLocation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-value-separator="<?php echo $ivf_embryology_chart->Day0SPZLocation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation"<?php echo $ivf_embryology_chart->Day0SPZLocation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SPZLocation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation">
<span<?php echo $ivf_embryology_chart->Day0SPZLocation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SPZLocation->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
		<td data-name="Day0SpOrgin"<?php echo $ivf_embryology_chart->Day0SpOrgin->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SpOrgin" class="form-group ivf_embryology_chart_Day0SpOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-value-separator="<?php echo $ivf_embryology_chart->Day0SpOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin"<?php echo $ivf_embryology_chart->Day0SpOrgin->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SpOrgin->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0SpOrgin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SpOrgin" class="form-group ivf_embryology_chart_Day0SpOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-value-separator="<?php echo $ivf_embryology_chart->Day0SpOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin"<?php echo $ivf_embryology_chart->Day0SpOrgin->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SpOrgin->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin">
<span<?php echo $ivf_embryology_chart->Day0SpOrgin->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SpOrgin->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
		<td data-name="Day5Cryoptop"<?php echo $ivf_embryology_chart->Day5Cryoptop->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Cryoptop" class="form-group ivf_embryology_chart_Day5Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day5Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop"<?php echo $ivf_embryology_chart->Day5Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Cryoptop" class="form-group ivf_embryology_chart_Day5Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day5Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop"<?php echo $ivf_embryology_chart->Day5Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop">
<span<?php echo $ivf_embryology_chart->Day5Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Cryoptop->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Sperm->Visible) { // Day1Sperm ?>
		<td data-name="Day1Sperm"<?php echo $ivf_embryology_chart->Day1Sperm->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Sperm" class="form-group ivf_embryology_chart_Day1Sperm">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day1Sperm->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day1Sperm->EditValue ?>"<?php echo $ivf_embryology_chart->Day1Sperm->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Sperm->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Sperm" class="form-group ivf_embryology_chart_Day1Sperm">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day1Sperm->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day1Sperm->EditValue ?>"<?php echo $ivf_embryology_chart->Day1Sperm->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm">
<span<?php echo $ivf_embryology_chart->Day1Sperm->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Sperm->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1PN->Visible) { // Day1PN ?>
		<td data-name="Day1PN"<?php echo $ivf_embryology_chart->Day1PN->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1PN" class="form-group ivf_embryology_chart_Day1PN">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-value-separator="<?php echo $ivf_embryology_chart->Day1PN->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN"<?php echo $ivf_embryology_chart->Day1PN->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1PN->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1PN->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1PN" class="form-group ivf_embryology_chart_Day1PN">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-value-separator="<?php echo $ivf_embryology_chart->Day1PN->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN"<?php echo $ivf_embryology_chart->Day1PN->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1PN->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN">
<span<?php echo $ivf_embryology_chart->Day1PN->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1PN->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1PB->Visible) { // Day1PB ?>
		<td data-name="Day1PB"<?php echo $ivf_embryology_chart->Day1PB->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1PB" class="form-group ivf_embryology_chart_Day1PB">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-value-separator="<?php echo $ivf_embryology_chart->Day1PB->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB"<?php echo $ivf_embryology_chart->Day1PB->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1PB->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1PB->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1PB" class="form-group ivf_embryology_chart_Day1PB">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-value-separator="<?php echo $ivf_embryology_chart->Day1PB->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB"<?php echo $ivf_embryology_chart->Day1PB->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1PB->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB">
<span<?php echo $ivf_embryology_chart->Day1PB->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1PB->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
		<td data-name="Day1Pronucleus"<?php echo $ivf_embryology_chart->Day1Pronucleus->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Pronucleus" class="form-group ivf_embryology_chart_Day1Pronucleus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-value-separator="<?php echo $ivf_embryology_chart->Day1Pronucleus->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus"<?php echo $ivf_embryology_chart->Day1Pronucleus->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Pronucleus->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Pronucleus->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Pronucleus" class="form-group ivf_embryology_chart_Day1Pronucleus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-value-separator="<?php echo $ivf_embryology_chart->Day1Pronucleus->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus"<?php echo $ivf_embryology_chart->Day1Pronucleus->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Pronucleus->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus">
<span<?php echo $ivf_embryology_chart->Day1Pronucleus->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Pronucleus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
		<td data-name="Day1Nucleolus"<?php echo $ivf_embryology_chart->Day1Nucleolus->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Nucleolus" class="form-group ivf_embryology_chart_Day1Nucleolus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-value-separator="<?php echo $ivf_embryology_chart->Day1Nucleolus->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus"<?php echo $ivf_embryology_chart->Day1Nucleolus->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Nucleolus->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Nucleolus->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Nucleolus" class="form-group ivf_embryology_chart_Day1Nucleolus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-value-separator="<?php echo $ivf_embryology_chart->Day1Nucleolus->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus"<?php echo $ivf_embryology_chart->Day1Nucleolus->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Nucleolus->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus">
<span<?php echo $ivf_embryology_chart->Day1Nucleolus->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Nucleolus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Halo->Visible) { // Day1Halo ?>
		<td data-name="Day1Halo"<?php echo $ivf_embryology_chart->Day1Halo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Halo" class="form-group ivf_embryology_chart_Day1Halo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-value-separator="<?php echo $ivf_embryology_chart->Day1Halo->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo"<?php echo $ivf_embryology_chart->Day1Halo->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Halo->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Halo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Halo" class="form-group ivf_embryology_chart_Day1Halo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-value-separator="<?php echo $ivf_embryology_chart->Day1Halo->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo"<?php echo $ivf_embryology_chart->Day1Halo->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Halo->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo">
<span<?php echo $ivf_embryology_chart->Day1Halo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Halo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2SiNo->Visible) { // Day2SiNo ?>
		<td data-name="Day2SiNo"<?php echo $ivf_embryology_chart->Day2SiNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2SiNo" class="form-group ivf_embryology_chart_Day2SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2SiNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day2SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2SiNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2SiNo" class="form-group ivf_embryology_chart_Day2SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2SiNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day2SiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo">
<span<?php echo $ivf_embryology_chart->Day2SiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2SiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2CellNo->Visible) { // Day2CellNo ?>
		<td data-name="Day2CellNo"<?php echo $ivf_embryology_chart->Day2CellNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2CellNo" class="form-group ivf_embryology_chart_Day2CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day2CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2CellNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2CellNo" class="form-group ivf_embryology_chart_Day2CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day2CellNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo">
<span<?php echo $ivf_embryology_chart->Day2CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2CellNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Frag->Visible) { // Day2Frag ?>
		<td data-name="Day2Frag"<?php echo $ivf_embryology_chart->Day2Frag->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Frag" class="form-group ivf_embryology_chart_Day2Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Frag->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Frag->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Frag" class="form-group ivf_embryology_chart_Day2Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Frag->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag">
<span<?php echo $ivf_embryology_chart->Day2Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Frag->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Symmetry->Visible) { // Day2Symmetry ?>
		<td data-name="Day2Symmetry"<?php echo $ivf_embryology_chart->Day2Symmetry->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Symmetry" class="form-group ivf_embryology_chart_Day2Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Symmetry->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Symmetry->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Symmetry" class="form-group ivf_embryology_chart_Day2Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Symmetry->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry">
<span<?php echo $ivf_embryology_chart->Day2Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Symmetry->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
		<td data-name="Day2Cryoptop"<?php echo $ivf_embryology_chart->Day2Cryoptop->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Cryoptop" class="form-group ivf_embryology_chart_Day2Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Cryoptop->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Cryoptop" class="form-group ivf_embryology_chart_Day2Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Cryoptop->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop">
<span<?php echo $ivf_embryology_chart->Day2Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Cryoptop->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Grade->Visible) { // Day2Grade ?>
		<td data-name="Day2Grade"<?php echo $ivf_embryology_chart->Day2Grade->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Grade" class="form-group ivf_embryology_chart_Day2Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Grade->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Grade->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Grade->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Grade" class="form-group ivf_embryology_chart_Day2Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Grade->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Grade->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade">
<span<?php echo $ivf_embryology_chart->Day2Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2End->Visible) { // Day2End ?>
		<td data-name="Day2End"<?php echo $ivf_embryology_chart->Day2End->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2End" class="form-group ivf_embryology_chart_Day2End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day2End" data-value-separator="<?php echo $ivf_embryology_chart->Day2End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End"<?php echo $ivf_embryology_chart->Day2End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day2End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2End->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2End" class="form-group ivf_embryology_chart_Day2End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day2End" data-value-separator="<?php echo $ivf_embryology_chart->Day2End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End"<?php echo $ivf_embryology_chart->Day2End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day2End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End">
<span<?php echo $ivf_embryology_chart->Day2End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2End->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Sino->Visible) { // Day3Sino ?>
		<td data-name="Day3Sino"<?php echo $ivf_embryology_chart->Day3Sino->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Sino" class="form-group ivf_embryology_chart_Day3Sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3Sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3Sino->EditValue ?>"<?php echo $ivf_embryology_chart->Day3Sino->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Sino->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Sino" class="form-group ivf_embryology_chart_Day3Sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3Sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3Sino->EditValue ?>"<?php echo $ivf_embryology_chart->Day3Sino->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino">
<span<?php echo $ivf_embryology_chart->Day3Sino->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Sino->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3CellNo->Visible) { // Day3CellNo ?>
		<td data-name="Day3CellNo"<?php echo $ivf_embryology_chart->Day3CellNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3CellNo" class="form-group ivf_embryology_chart_Day3CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day3CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3CellNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3CellNo" class="form-group ivf_embryology_chart_Day3CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day3CellNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo">
<span<?php echo $ivf_embryology_chart->Day3CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3CellNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Frag->Visible) { // Day3Frag ?>
		<td data-name="Day3Frag"<?php echo $ivf_embryology_chart->Day3Frag->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Frag" class="form-group ivf_embryology_chart_Day3Frag">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-value-separator="<?php echo $ivf_embryology_chart->Day3Frag->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag"<?php echo $ivf_embryology_chart->Day3Frag->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Frag->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Frag->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Frag" class="form-group ivf_embryology_chart_Day3Frag">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-value-separator="<?php echo $ivf_embryology_chart->Day3Frag->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag"<?php echo $ivf_embryology_chart->Day3Frag->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Frag->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag">
<span<?php echo $ivf_embryology_chart->Day3Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Frag->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Symmetry->Visible) { // Day3Symmetry ?>
		<td data-name="Day3Symmetry"<?php echo $ivf_embryology_chart->Day3Symmetry->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Symmetry" class="form-group ivf_embryology_chart_Day3Symmetry">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-value-separator="<?php echo $ivf_embryology_chart->Day3Symmetry->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry"<?php echo $ivf_embryology_chart->Day3Symmetry->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Symmetry->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Symmetry->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Symmetry" class="form-group ivf_embryology_chart_Day3Symmetry">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-value-separator="<?php echo $ivf_embryology_chart->Day3Symmetry->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry"<?php echo $ivf_embryology_chart->Day3Symmetry->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Symmetry->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry">
<span<?php echo $ivf_embryology_chart->Day3Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Symmetry->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3ZP->Visible) { // Day3ZP ?>
		<td data-name="Day3ZP"<?php echo $ivf_embryology_chart->Day3ZP->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3ZP" class="form-group ivf_embryology_chart_Day3ZP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-value-separator="<?php echo $ivf_embryology_chart->Day3ZP->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP"<?php echo $ivf_embryology_chart->Day3ZP->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3ZP->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3ZP->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3ZP" class="form-group ivf_embryology_chart_Day3ZP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-value-separator="<?php echo $ivf_embryology_chart->Day3ZP->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP"<?php echo $ivf_embryology_chart->Day3ZP->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3ZP->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP">
<span<?php echo $ivf_embryology_chart->Day3ZP->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3ZP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Vacoules->Visible) { // Day3Vacoules ?>
		<td data-name="Day3Vacoules"<?php echo $ivf_embryology_chart->Day3Vacoules->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Vacoules" class="form-group ivf_embryology_chart_Day3Vacoules">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-value-separator="<?php echo $ivf_embryology_chart->Day3Vacoules->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules"<?php echo $ivf_embryology_chart->Day3Vacoules->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Vacoules->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Vacoules->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Vacoules" class="form-group ivf_embryology_chart_Day3Vacoules">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-value-separator="<?php echo $ivf_embryology_chart->Day3Vacoules->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules"<?php echo $ivf_embryology_chart->Day3Vacoules->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Vacoules->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules">
<span<?php echo $ivf_embryology_chart->Day3Vacoules->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Vacoules->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Grade->Visible) { // Day3Grade ?>
		<td data-name="Day3Grade"<?php echo $ivf_embryology_chart->Day3Grade->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Grade" class="form-group ivf_embryology_chart_Day3Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day3Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade"<?php echo $ivf_embryology_chart->Day3Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Grade->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Grade" class="form-group ivf_embryology_chart_Day3Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day3Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade"<?php echo $ivf_embryology_chart->Day3Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade">
<span<?php echo $ivf_embryology_chart->Day3Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
		<td data-name="Day3Cryoptop"<?php echo $ivf_embryology_chart->Day3Cryoptop->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Cryoptop" class="form-group ivf_embryology_chart_Day3Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day3Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop"<?php echo $ivf_embryology_chart->Day3Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Cryoptop" class="form-group ivf_embryology_chart_Day3Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day3Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop"<?php echo $ivf_embryology_chart->Day3Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop">
<span<?php echo $ivf_embryology_chart->Day3Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Cryoptop->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3End->Visible) { // Day3End ?>
		<td data-name="Day3End"<?php echo $ivf_embryology_chart->Day3End->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3End" class="form-group ivf_embryology_chart_Day3End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3End" data-value-separator="<?php echo $ivf_embryology_chart->Day3End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End"<?php echo $ivf_embryology_chart->Day3End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3End->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3End" class="form-group ivf_embryology_chart_Day3End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3End" data-value-separator="<?php echo $ivf_embryology_chart->Day3End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End"<?php echo $ivf_embryology_chart->Day3End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End">
<span<?php echo $ivf_embryology_chart->Day3End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3End->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4SiNo->Visible) { // Day4SiNo ?>
		<td data-name="Day4SiNo"<?php echo $ivf_embryology_chart->Day4SiNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4SiNo" class="form-group ivf_embryology_chart_Day4SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4SiNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day4SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4SiNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4SiNo" class="form-group ivf_embryology_chart_Day4SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4SiNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day4SiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo">
<span<?php echo $ivf_embryology_chart->Day4SiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4SiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4CellNo->Visible) { // Day4CellNo ?>
		<td data-name="Day4CellNo"<?php echo $ivf_embryology_chart->Day4CellNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4CellNo" class="form-group ivf_embryology_chart_Day4CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day4CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4CellNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4CellNo" class="form-group ivf_embryology_chart_Day4CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day4CellNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo">
<span<?php echo $ivf_embryology_chart->Day4CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4CellNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Frag->Visible) { // Day4Frag ?>
		<td data-name="Day4Frag"<?php echo $ivf_embryology_chart->Day4Frag->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Frag" class="form-group ivf_embryology_chart_Day4Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Frag->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Frag->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Frag" class="form-group ivf_embryology_chart_Day4Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Frag->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag">
<span<?php echo $ivf_embryology_chart->Day4Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Frag->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Symmetry->Visible) { // Day4Symmetry ?>
		<td data-name="Day4Symmetry"<?php echo $ivf_embryology_chart->Day4Symmetry->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Symmetry" class="form-group ivf_embryology_chart_Day4Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Symmetry->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Symmetry->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Symmetry" class="form-group ivf_embryology_chart_Day4Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Symmetry->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry">
<span<?php echo $ivf_embryology_chart->Day4Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Symmetry->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Grade->Visible) { // Day4Grade ?>
		<td data-name="Day4Grade"<?php echo $ivf_embryology_chart->Day4Grade->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Grade" class="form-group ivf_embryology_chart_Day4Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Grade->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Grade->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Grade->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Grade" class="form-group ivf_embryology_chart_Day4Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Grade->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Grade->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade">
<span<?php echo $ivf_embryology_chart->Day4Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
		<td data-name="Day4Cryoptop"<?php echo $ivf_embryology_chart->Day4Cryoptop->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Cryoptop" class="form-group ivf_embryology_chart_Day4Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day4Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop"<?php echo $ivf_embryology_chart->Day4Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day4Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Cryoptop" class="form-group ivf_embryology_chart_Day4Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day4Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop"<?php echo $ivf_embryology_chart->Day4Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day4Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop">
<span<?php echo $ivf_embryology_chart->Day4Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Cryoptop->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4End->Visible) { // Day4End ?>
		<td data-name="Day4End"<?php echo $ivf_embryology_chart->Day4End->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4End" class="form-group ivf_embryology_chart_Day4End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4End" data-value-separator="<?php echo $ivf_embryology_chart->Day4End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End"<?php echo $ivf_embryology_chart->Day4End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day4End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4End->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4End" class="form-group ivf_embryology_chart_Day4End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4End" data-value-separator="<?php echo $ivf_embryology_chart->Day4End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End"<?php echo $ivf_embryology_chart->Day4End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day4End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End">
<span<?php echo $ivf_embryology_chart->Day4End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4End->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5CellNo->Visible) { // Day5CellNo ?>
		<td data-name="Day5CellNo"<?php echo $ivf_embryology_chart->Day5CellNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5CellNo" class="form-group ivf_embryology_chart_Day5CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day5CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day5CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day5CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5CellNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5CellNo" class="form-group ivf_embryology_chart_Day5CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day5CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day5CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day5CellNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo">
<span<?php echo $ivf_embryology_chart->Day5CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5CellNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5ICM->Visible) { // Day5ICM ?>
		<td data-name="Day5ICM"<?php echo $ivf_embryology_chart->Day5ICM->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5ICM" class="form-group ivf_embryology_chart_Day5ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-value-separator="<?php echo $ivf_embryology_chart->Day5ICM->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM"<?php echo $ivf_embryology_chart->Day5ICM->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5ICM->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5ICM->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5ICM" class="form-group ivf_embryology_chart_Day5ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-value-separator="<?php echo $ivf_embryology_chart->Day5ICM->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM"<?php echo $ivf_embryology_chart->Day5ICM->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5ICM->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM">
<span<?php echo $ivf_embryology_chart->Day5ICM->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5ICM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5TE->Visible) { // Day5TE ?>
		<td data-name="Day5TE"<?php echo $ivf_embryology_chart->Day5TE->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5TE" class="form-group ivf_embryology_chart_Day5TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-value-separator="<?php echo $ivf_embryology_chart->Day5TE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE"<?php echo $ivf_embryology_chart->Day5TE->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5TE->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5TE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5TE" class="form-group ivf_embryology_chart_Day5TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-value-separator="<?php echo $ivf_embryology_chart->Day5TE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE"<?php echo $ivf_embryology_chart->Day5TE->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5TE->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE">
<span<?php echo $ivf_embryology_chart->Day5TE->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5TE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Observation->Visible) { // Day5Observation ?>
		<td data-name="Day5Observation"<?php echo $ivf_embryology_chart->Day5Observation->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Observation" class="form-group ivf_embryology_chart_Day5Observation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-value-separator="<?php echo $ivf_embryology_chart->Day5Observation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation"<?php echo $ivf_embryology_chart->Day5Observation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Observation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Observation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Observation" class="form-group ivf_embryology_chart_Day5Observation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-value-separator="<?php echo $ivf_embryology_chart->Day5Observation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation"<?php echo $ivf_embryology_chart->Day5Observation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Observation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation">
<span<?php echo $ivf_embryology_chart->Day5Observation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Observation->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Collapsed->Visible) { // Day5Collapsed ?>
		<td data-name="Day5Collapsed"<?php echo $ivf_embryology_chart->Day5Collapsed->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Collapsed" class="form-group ivf_embryology_chart_Day5Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-value-separator="<?php echo $ivf_embryology_chart->Day5Collapsed->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed"<?php echo $ivf_embryology_chart->Day5Collapsed->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Collapsed->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Collapsed->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Collapsed" class="form-group ivf_embryology_chart_Day5Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-value-separator="<?php echo $ivf_embryology_chart->Day5Collapsed->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed"<?php echo $ivf_embryology_chart->Day5Collapsed->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Collapsed->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed">
<span<?php echo $ivf_embryology_chart->Day5Collapsed->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Collapsed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
		<td data-name="Day5Vacoulles"<?php echo $ivf_embryology_chart->Day5Vacoulles->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Vacoulles" class="form-group ivf_embryology_chart_Day5Vacoulles">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-value-separator="<?php echo $ivf_embryology_chart->Day5Vacoulles->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles"<?php echo $ivf_embryology_chart->Day5Vacoulles->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Vacoulles->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Vacoulles->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Vacoulles" class="form-group ivf_embryology_chart_Day5Vacoulles">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-value-separator="<?php echo $ivf_embryology_chart->Day5Vacoulles->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles"<?php echo $ivf_embryology_chart->Day5Vacoulles->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Vacoulles->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles">
<span<?php echo $ivf_embryology_chart->Day5Vacoulles->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Vacoulles->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Grade->Visible) { // Day5Grade ?>
		<td data-name="Day5Grade"<?php echo $ivf_embryology_chart->Day5Grade->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Grade" class="form-group ivf_embryology_chart_Day5Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day5Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade"<?php echo $ivf_embryology_chart->Day5Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Grade->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Grade" class="form-group ivf_embryology_chart_Day5Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day5Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade"<?php echo $ivf_embryology_chart->Day5Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade">
<span<?php echo $ivf_embryology_chart->Day5Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6CellNo->Visible) { // Day6CellNo ?>
		<td data-name="Day6CellNo"<?php echo $ivf_embryology_chart->Day6CellNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6CellNo" class="form-group ivf_embryology_chart_Day6CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day6CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6CellNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6CellNo" class="form-group ivf_embryology_chart_Day6CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day6CellNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo">
<span<?php echo $ivf_embryology_chart->Day6CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6CellNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6ICM->Visible) { // Day6ICM ?>
		<td data-name="Day6ICM"<?php echo $ivf_embryology_chart->Day6ICM->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6ICM" class="form-group ivf_embryology_chart_Day6ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-value-separator="<?php echo $ivf_embryology_chart->Day6ICM->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM"<?php echo $ivf_embryology_chart->Day6ICM->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6ICM->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6ICM->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6ICM" class="form-group ivf_embryology_chart_Day6ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-value-separator="<?php echo $ivf_embryology_chart->Day6ICM->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM"<?php echo $ivf_embryology_chart->Day6ICM->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6ICM->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM">
<span<?php echo $ivf_embryology_chart->Day6ICM->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6ICM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6TE->Visible) { // Day6TE ?>
		<td data-name="Day6TE"<?php echo $ivf_embryology_chart->Day6TE->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6TE" class="form-group ivf_embryology_chart_Day6TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-value-separator="<?php echo $ivf_embryology_chart->Day6TE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE"<?php echo $ivf_embryology_chart->Day6TE->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6TE->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6TE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6TE" class="form-group ivf_embryology_chart_Day6TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-value-separator="<?php echo $ivf_embryology_chart->Day6TE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE"<?php echo $ivf_embryology_chart->Day6TE->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6TE->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE">
<span<?php echo $ivf_embryology_chart->Day6TE->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6TE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Observation->Visible) { // Day6Observation ?>
		<td data-name="Day6Observation"<?php echo $ivf_embryology_chart->Day6Observation->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Observation" class="form-group ivf_embryology_chart_Day6Observation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-value-separator="<?php echo $ivf_embryology_chart->Day6Observation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation"<?php echo $ivf_embryology_chart->Day6Observation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Observation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Observation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Observation" class="form-group ivf_embryology_chart_Day6Observation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-value-separator="<?php echo $ivf_embryology_chart->Day6Observation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation"<?php echo $ivf_embryology_chart->Day6Observation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Observation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation">
<span<?php echo $ivf_embryology_chart->Day6Observation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Observation->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Collapsed->Visible) { // Day6Collapsed ?>
		<td data-name="Day6Collapsed"<?php echo $ivf_embryology_chart->Day6Collapsed->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Collapsed" class="form-group ivf_embryology_chart_Day6Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-value-separator="<?php echo $ivf_embryology_chart->Day6Collapsed->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed"<?php echo $ivf_embryology_chart->Day6Collapsed->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Collapsed->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Collapsed->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Collapsed" class="form-group ivf_embryology_chart_Day6Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-value-separator="<?php echo $ivf_embryology_chart->Day6Collapsed->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed"<?php echo $ivf_embryology_chart->Day6Collapsed->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Collapsed->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed">
<span<?php echo $ivf_embryology_chart->Day6Collapsed->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Collapsed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
		<td data-name="Day6Vacoulles"<?php echo $ivf_embryology_chart->Day6Vacoulles->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Vacoulles" class="form-group ivf_embryology_chart_Day6Vacoulles">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-value-separator="<?php echo $ivf_embryology_chart->Day6Vacoulles->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles"<?php echo $ivf_embryology_chart->Day6Vacoulles->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Vacoulles->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Vacoulles->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Vacoulles" class="form-group ivf_embryology_chart_Day6Vacoulles">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-value-separator="<?php echo $ivf_embryology_chart->Day6Vacoulles->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles"<?php echo $ivf_embryology_chart->Day6Vacoulles->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Vacoulles->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles">
<span<?php echo $ivf_embryology_chart->Day6Vacoulles->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Vacoulles->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Grade->Visible) { // Day6Grade ?>
		<td data-name="Day6Grade"<?php echo $ivf_embryology_chart->Day6Grade->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Grade" class="form-group ivf_embryology_chart_Day6Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day6Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade"<?php echo $ivf_embryology_chart->Day6Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Grade->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Grade" class="form-group ivf_embryology_chart_Day6Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day6Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade"<?php echo $ivf_embryology_chart->Day6Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade">
<span<?php echo $ivf_embryology_chart->Day6Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
		<td data-name="Day6Cryoptop"<?php echo $ivf_embryology_chart->Day6Cryoptop->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Cryoptop" class="form-group ivf_embryology_chart_Day6Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day6Cryoptop->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Cryoptop->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Cryoptop" class="form-group ivf_embryology_chart_Day6Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day6Cryoptop->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop">
<span<?php echo $ivf_embryology_chart->Day6Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Cryoptop->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndSiNo->Visible) { // EndSiNo ?>
		<td data-name="EndSiNo"<?php echo $ivf_embryology_chart->EndSiNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndSiNo" class="form-group ivf_embryology_chart_EndSiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->EndSiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->EndSiNo->EditValue ?>"<?php echo $ivf_embryology_chart->EndSiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" value="<?php echo HtmlEncode($ivf_embryology_chart->EndSiNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndSiNo" class="form-group ivf_embryology_chart_EndSiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->EndSiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->EndSiNo->EditValue ?>"<?php echo $ivf_embryology_chart->EndSiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo">
<span<?php echo $ivf_embryology_chart->EndSiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndSiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingDay->Visible) { // EndingDay ?>
		<td data-name="EndingDay"<?php echo $ivf_embryology_chart->EndingDay->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingDay" class="form-group ivf_embryology_chart_EndingDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-value-separator="<?php echo $ivf_embryology_chart->EndingDay->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay"<?php echo $ivf_embryology_chart->EndingDay->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingDay->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingDay->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingDay" class="form-group ivf_embryology_chart_EndingDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-value-separator="<?php echo $ivf_embryology_chart->EndingDay->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay"<?php echo $ivf_embryology_chart->EndingDay->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingDay->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay">
<span<?php echo $ivf_embryology_chart->EndingDay->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingDay->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingCellStage->Visible) { // EndingCellStage ?>
		<td data-name="EndingCellStage"<?php echo $ivf_embryology_chart->EndingCellStage->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingCellStage" class="form-group ivf_embryology_chart_EndingCellStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->EndingCellStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->EndingCellStage->EditValue ?>"<?php echo $ivf_embryology_chart->EndingCellStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingCellStage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingCellStage" class="form-group ivf_embryology_chart_EndingCellStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->EndingCellStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->EndingCellStage->EditValue ?>"<?php echo $ivf_embryology_chart->EndingCellStage->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage">
<span<?php echo $ivf_embryology_chart->EndingCellStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingCellStage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingGrade->Visible) { // EndingGrade ?>
		<td data-name="EndingGrade"<?php echo $ivf_embryology_chart->EndingGrade->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingGrade" class="form-group ivf_embryology_chart_EndingGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-value-separator="<?php echo $ivf_embryology_chart->EndingGrade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade"<?php echo $ivf_embryology_chart->EndingGrade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingGrade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingGrade->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingGrade" class="form-group ivf_embryology_chart_EndingGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-value-separator="<?php echo $ivf_embryology_chart->EndingGrade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade"<?php echo $ivf_embryology_chart->EndingGrade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingGrade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade">
<span<?php echo $ivf_embryology_chart->EndingGrade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingGrade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingState->Visible) { // EndingState ?>
		<td data-name="EndingState"<?php echo $ivf_embryology_chart->EndingState->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingState" class="form-group ivf_embryology_chart_EndingState">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingState" data-value-separator="<?php echo $ivf_embryology_chart->EndingState->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState"<?php echo $ivf_embryology_chart->EndingState->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingState->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingState->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingState" class="form-group ivf_embryology_chart_EndingState">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingState" data-value-separator="<?php echo $ivf_embryology_chart->EndingState->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState"<?php echo $ivf_embryology_chart->EndingState->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingState->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState">
<span<?php echo $ivf_embryology_chart->EndingState->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingState->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_embryology_chart->TidNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_embryology_chart->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<span<?php echo $ivf_embryology_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->TidNo->EditValue ?>"<?php echo $ivf_embryology_chart->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<span<?php echo $ivf_embryology_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->TidNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo">
<span<?php echo $ivf_embryology_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->TidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->DidNO->Visible) { // DidNO ?>
		<td data-name="DidNO"<?php echo $ivf_embryology_chart->DidNO->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_embryology_chart->DidNO->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->DidNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" value="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<input type="text" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->DidNO->EditValue ?>"<?php echo $ivf_embryology_chart->DidNO->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" value="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->DidNO->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" value="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart->DidNO->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->DidNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
		<td data-name="ICSiIVFDateTime"<?php echo $ivf_embryology_chart->ICSiIVFDateTime->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ICSiIVFDateTime" class="form-group ivf_embryology_chart_ICSiIVFDateTime">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->EditValue ?>"<?php echo $ivf_embryology_chart->ICSiIVFDateTime->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->ICSiIVFDateTime->ReadOnly && !$ivf_embryology_chart->ICSiIVFDateTime->Disabled && !isset($ivf_embryology_chart->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" value="<?php echo HtmlEncode($ivf_embryology_chart->ICSiIVFDateTime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ICSiIVFDateTime" class="form-group ivf_embryology_chart_ICSiIVFDateTime">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->EditValue ?>"<?php echo $ivf_embryology_chart->ICSiIVFDateTime->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->ICSiIVFDateTime->ReadOnly && !$ivf_embryology_chart->ICSiIVFDateTime->Disabled && !isset($ivf_embryology_chart->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime">
<span<?php echo $ivf_embryology_chart->ICSiIVFDateTime->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ICSiIVFDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
		<td data-name="PrimaryEmbrologist"<?php echo $ivf_embryology_chart->PrimaryEmbrologist->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_PrimaryEmbrologist" class="form-group ivf_embryology_chart_PrimaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart->PrimaryEmbrologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" value="<?php echo HtmlEncode($ivf_embryology_chart->PrimaryEmbrologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_PrimaryEmbrologist" class="form-group ivf_embryology_chart_PrimaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart->PrimaryEmbrologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist">
<span<?php echo $ivf_embryology_chart->PrimaryEmbrologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->PrimaryEmbrologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
		<td data-name="SecondaryEmbrologist"<?php echo $ivf_embryology_chart->SecondaryEmbrologist->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_SecondaryEmbrologist" class="form-group ivf_embryology_chart_SecondaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart->SecondaryEmbrologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" value="<?php echo HtmlEncode($ivf_embryology_chart->SecondaryEmbrologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_SecondaryEmbrologist" class="form-group ivf_embryology_chart_SecondaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart->SecondaryEmbrologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist">
<span<?php echo $ivf_embryology_chart->SecondaryEmbrologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->SecondaryEmbrologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator"<?php echo $ivf_embryology_chart->Incubator->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Incubator" class="form-group ivf_embryology_chart_Incubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Incubator->EditValue ?>"<?php echo $ivf_embryology_chart->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_embryology_chart->Incubator->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Incubator" class="form-group ivf_embryology_chart_Incubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Incubator->EditValue ?>"<?php echo $ivf_embryology_chart->Incubator->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator">
<span<?php echo $ivf_embryology_chart->Incubator->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Incubator->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->location->Visible) { // location ?>
		<td data-name="location"<?php echo $ivf_embryology_chart->location->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_location" class="form-group ivf_embryology_chart_location">
<input type="text" data-table="ivf_embryology_chart" data-field="x_location" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->location->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->location->EditValue ?>"<?php echo $ivf_embryology_chart->location->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" value="<?php echo HtmlEncode($ivf_embryology_chart->location->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_location" class="form-group ivf_embryology_chart_location">
<input type="text" data-table="ivf_embryology_chart" data-field="x_location" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->location->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->location->EditValue ?>"<?php echo $ivf_embryology_chart->location->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_location" class="ivf_embryology_chart_location">
<span<?php echo $ivf_embryology_chart->location->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->location->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
		<td data-name="OocyteNo"<?php echo $ivf_embryology_chart->OocyteNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_OocyteNo" class="form-group ivf_embryology_chart_OocyteNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->OocyteNo->EditValue ?>"<?php echo $ivf_embryology_chart->OocyteNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_embryology_chart->OocyteNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_OocyteNo" class="form-group ivf_embryology_chart_OocyteNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->OocyteNo->EditValue ?>"<?php echo $ivf_embryology_chart->OocyteNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo">
<span<?php echo $ivf_embryology_chart->OocyteNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->OocyteNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Stage->Visible) { // Stage ?>
		<td data-name="Stage"<?php echo $ivf_embryology_chart->Stage->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Stage" class="form-group ivf_embryology_chart_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Stage" data-value-separator="<?php echo $ivf_embryology_chart->Stage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage"<?php echo $ivf_embryology_chart->Stage->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Stage->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_embryology_chart->Stage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Stage" class="form-group ivf_embryology_chart_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Stage" data-value-separator="<?php echo $ivf_embryology_chart->Stage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage"<?php echo $ivf_embryology_chart->Stage->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Stage->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage">
<span<?php echo $ivf_embryology_chart->Stage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $ivf_embryology_chart->Remarks->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Remarks" class="form-group ivf_embryology_chart_Remarks">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Remarks->EditValue ?>"<?php echo $ivf_embryology_chart->Remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($ivf_embryology_chart->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Remarks" class="form-group ivf_embryology_chart_Remarks">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Remarks->EditValue ?>"<?php echo $ivf_embryology_chart->Remarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks">
<span<?php echo $ivf_embryology_chart->Remarks->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Remarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate"<?php echo $ivf_embryology_chart->vitrificationDate->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitrificationDate" class="form-group ivf_embryology_chart_vitrificationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" size="12" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitrificationDate->EditValue ?>"<?php echo $ivf_embryology_chart->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->vitrificationDate->ReadOnly && !$ivf_embryology_chart->vitrificationDate->Disabled && !isset($ivf_embryology_chart->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_embryology_chart->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitrificationDate" class="form-group ivf_embryology_chart_vitrificationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" size="12" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitrificationDate->EditValue ?>"<?php echo $ivf_embryology_chart->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->vitrificationDate->ReadOnly && !$ivf_embryology_chart->vitrificationDate->Disabled && !isset($ivf_embryology_chart->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate">
<span<?php echo $ivf_embryology_chart->vitrificationDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitrificationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
		<td data-name="vitriPrimaryEmbryologist"<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group ivf_embryology_chart_vitriPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group ivf_embryology_chart_vitriPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
		<td data-name="vitriSecondaryEmbryologist"<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group ivf_embryology_chart_vitriSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group ivf_embryology_chart_vitriSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
		<td data-name="vitriEmbryoNo"<?php echo $ivf_embryology_chart->vitriEmbryoNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriEmbryoNo" class="form-group ivf_embryology_chart_vitriEmbryoNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriEmbryoNo->EditValue ?>"<?php echo $ivf_embryology_chart->vitriEmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriEmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriEmbryoNo" class="form-group ivf_embryology_chart_vitriEmbryoNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriEmbryoNo->EditValue ?>"<?php echo $ivf_embryology_chart->vitriEmbryoNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo">
<span<?php echo $ivf_embryology_chart->vitriEmbryoNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriEmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawReFrozen->Visible) { // thawReFrozen ?>
		<td data-name="thawReFrozen"<?php echo $ivf_embryology_chart->thawReFrozen->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawReFrozen" class="form-group ivf_embryology_chart_thawReFrozen">
<div id="tp_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-value-separator="<?php echo $ivf_embryology_chart->thawReFrozen->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" value="{value}"<?php echo $ivf_embryology_chart->thawReFrozen->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart->thawReFrozen->checkBoxListHtml(FALSE, "x{$ivf_embryology_chart_list->RowIndex}_thawReFrozen[]") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" value="<?php echo HtmlEncode($ivf_embryology_chart->thawReFrozen->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawReFrozen" class="form-group ivf_embryology_chart_thawReFrozen">
<div id="tp_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-value-separator="<?php echo $ivf_embryology_chart->thawReFrozen->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" value="{value}"<?php echo $ivf_embryology_chart->thawReFrozen->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart->thawReFrozen->checkBoxListHtml(FALSE, "x{$ivf_embryology_chart_list->RowIndex}_thawReFrozen[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen">
<span<?php echo $ivf_embryology_chart->thawReFrozen->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawReFrozen->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
		<td data-name="vitriFertilisationDate"<?php echo $ivf_embryology_chart->vitriFertilisationDate->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriFertilisationDate" class="form-group ivf_embryology_chart_vitriFertilisationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriFertilisationDate->EditValue ?>"<?php echo $ivf_embryology_chart->vitriFertilisationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->vitriFertilisationDate->ReadOnly && !$ivf_embryology_chart->vitriFertilisationDate->Disabled && !isset($ivf_embryology_chart->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriFertilisationDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriFertilisationDate" class="form-group ivf_embryology_chart_vitriFertilisationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriFertilisationDate->EditValue ?>"<?php echo $ivf_embryology_chart->vitriFertilisationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->vitriFertilisationDate->ReadOnly && !$ivf_embryology_chart->vitriFertilisationDate->Disabled && !isset($ivf_embryology_chart->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate">
<span<?php echo $ivf_embryology_chart->vitriFertilisationDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriFertilisationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriDay->Visible) { // vitriDay ?>
		<td data-name="vitriDay"<?php echo $ivf_embryology_chart->vitriDay->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriDay" class="form-group ivf_embryology_chart_vitriDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-value-separator="<?php echo $ivf_embryology_chart->vitriDay->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay"<?php echo $ivf_embryology_chart->vitriDay->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->vitriDay->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriDay->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriDay" class="form-group ivf_embryology_chart_vitriDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-value-separator="<?php echo $ivf_embryology_chart->vitriDay->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay"<?php echo $ivf_embryology_chart->vitriDay->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->vitriDay->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay">
<span<?php echo $ivf_embryology_chart->vitriDay->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriDay->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriStage->Visible) { // vitriStage ?>
		<td data-name="vitriStage"<?php echo $ivf_embryology_chart->vitriStage->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriStage" class="form-group ivf_embryology_chart_vitriStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriStage->EditValue ?>"<?php echo $ivf_embryology_chart->vitriStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriStage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriStage" class="form-group ivf_embryology_chart_vitriStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriStage->EditValue ?>"<?php echo $ivf_embryology_chart->vitriStage->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage">
<span<?php echo $ivf_embryology_chart->vitriStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriStage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriGrade->Visible) { // vitriGrade ?>
		<td data-name="vitriGrade"<?php echo $ivf_embryology_chart->vitriGrade->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriGrade" class="form-group ivf_embryology_chart_vitriGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-value-separator="<?php echo $ivf_embryology_chart->vitriGrade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade"<?php echo $ivf_embryology_chart->vitriGrade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->vitriGrade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriGrade->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriGrade" class="form-group ivf_embryology_chart_vitriGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-value-separator="<?php echo $ivf_embryology_chart->vitriGrade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade"<?php echo $ivf_embryology_chart->vitriGrade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->vitriGrade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade">
<span<?php echo $ivf_embryology_chart->vitriGrade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriGrade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriIncubator->Visible) { // vitriIncubator ?>
		<td data-name="vitriIncubator"<?php echo $ivf_embryology_chart->vitriIncubator->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriIncubator" class="form-group ivf_embryology_chart_vitriIncubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriIncubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriIncubator->EditValue ?>"<?php echo $ivf_embryology_chart->vitriIncubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriIncubator->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriIncubator" class="form-group ivf_embryology_chart_vitriIncubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriIncubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriIncubator->EditValue ?>"<?php echo $ivf_embryology_chart->vitriIncubator->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator">
<span<?php echo $ivf_embryology_chart->vitriIncubator->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriIncubator->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriTank->Visible) { // vitriTank ?>
		<td data-name="vitriTank"<?php echo $ivf_embryology_chart->vitriTank->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriTank" class="form-group ivf_embryology_chart_vitriTank">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriTank->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriTank->EditValue ?>"<?php echo $ivf_embryology_chart->vitriTank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriTank->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriTank" class="form-group ivf_embryology_chart_vitriTank">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriTank->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriTank->EditValue ?>"<?php echo $ivf_embryology_chart->vitriTank->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank">
<span<?php echo $ivf_embryology_chart->vitriTank->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriTank->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriCanister->Visible) { // vitriCanister ?>
		<td data-name="vitriCanister"<?php echo $ivf_embryology_chart->vitriCanister->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCanister" class="form-group ivf_embryology_chart_vitriCanister">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCanister->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCanister->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCanister->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriCanister->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCanister" class="form-group ivf_embryology_chart_vitriCanister">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCanister->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCanister->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCanister->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister">
<span<?php echo $ivf_embryology_chart->vitriCanister->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCanister->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriGobiet->Visible) { // vitriGobiet ?>
		<td data-name="vitriGobiet"<?php echo $ivf_embryology_chart->vitriGobiet->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriGobiet" class="form-group ivf_embryology_chart_vitriGobiet">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriGobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriGobiet->EditValue ?>"<?php echo $ivf_embryology_chart->vitriGobiet->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriGobiet->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriGobiet" class="form-group ivf_embryology_chart_vitriGobiet">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriGobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriGobiet->EditValue ?>"<?php echo $ivf_embryology_chart->vitriGobiet->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet">
<span<?php echo $ivf_embryology_chart->vitriGobiet->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriGobiet->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriViscotube->Visible) { // vitriViscotube ?>
		<td data-name="vitriViscotube"<?php echo $ivf_embryology_chart->vitriViscotube->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriViscotube" class="form-group ivf_embryology_chart_vitriViscotube">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriViscotube->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriViscotube->EditValue ?>"<?php echo $ivf_embryology_chart->vitriViscotube->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriViscotube->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriViscotube" class="form-group ivf_embryology_chart_vitriViscotube">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriViscotube->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriViscotube->EditValue ?>"<?php echo $ivf_embryology_chart->vitriViscotube->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube">
<span<?php echo $ivf_embryology_chart->vitriViscotube->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriViscotube->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
		<td data-name="vitriCryolockNo"<?php echo $ivf_embryology_chart->vitriCryolockNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCryolockNo" class="form-group ivf_embryology_chart_vitriCryolockNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCryolockNo->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCryolockNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCryolockNo" class="form-group ivf_embryology_chart_vitriCryolockNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCryolockNo->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCryolockNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo">
<span<?php echo $ivf_embryology_chart->vitriCryolockNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCryolockNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
		<td data-name="vitriCryolockColour"<?php echo $ivf_embryology_chart->vitriCryolockColour->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCryolockColour" class="form-group ivf_embryology_chart_vitriCryolockColour">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCryolockColour->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCryolockColour->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockColour->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCryolockColour" class="form-group ivf_embryology_chart_vitriCryolockColour">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCryolockColour->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCryolockColour->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour">
<span<?php echo $ivf_embryology_chart->vitriCryolockColour->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCryolockColour->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawDate->Visible) { // thawDate ?>
		<td data-name="thawDate"<?php echo $ivf_embryology_chart->thawDate->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawDate" class="form-group ivf_embryology_chart_thawDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawDate->EditValue ?>"<?php echo $ivf_embryology_chart->thawDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->thawDate->ReadOnly && !$ivf_embryology_chart->thawDate->Disabled && !isset($ivf_embryology_chart->thawDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->thawDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" value="<?php echo HtmlEncode($ivf_embryology_chart->thawDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawDate" class="form-group ivf_embryology_chart_thawDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawDate->EditValue ?>"<?php echo $ivf_embryology_chart->thawDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->thawDate->ReadOnly && !$ivf_embryology_chart->thawDate->Disabled && !isset($ivf_embryology_chart->thawDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->thawDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate">
<span<?php echo $ivf_embryology_chart->thawDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<td data-name="thawPrimaryEmbryologist"<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group ivf_embryology_chart_thawPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->thawPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group ivf_embryology_chart_thawPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<td data-name="thawSecondaryEmbryologist"<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group ivf_embryology_chart_thawSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->thawSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group ivf_embryology_chart_thawSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawET->Visible) { // thawET ?>
		<td data-name="thawET"<?php echo $ivf_embryology_chart->thawET->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawET" class="form-group ivf_embryology_chart_thawET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_thawET" data-value-separator="<?php echo $ivf_embryology_chart->thawET->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET"<?php echo $ivf_embryology_chart->thawET->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->thawET->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET" value="<?php echo HtmlEncode($ivf_embryology_chart->thawET->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawET" class="form-group ivf_embryology_chart_thawET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_thawET" data-value-separator="<?php echo $ivf_embryology_chart->thawET->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET"<?php echo $ivf_embryology_chart->thawET->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->thawET->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET">
<span<?php echo $ivf_embryology_chart->thawET->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawET->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawAbserve->Visible) { // thawAbserve ?>
		<td data-name="thawAbserve"<?php echo $ivf_embryology_chart->thawAbserve->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawAbserve" class="form-group ivf_embryology_chart_thawAbserve">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawAbserve->EditValue ?>"<?php echo $ivf_embryology_chart->thawAbserve->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" value="<?php echo HtmlEncode($ivf_embryology_chart->thawAbserve->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawAbserve" class="form-group ivf_embryology_chart_thawAbserve">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawAbserve->EditValue ?>"<?php echo $ivf_embryology_chart->thawAbserve->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve">
<span<?php echo $ivf_embryology_chart->thawAbserve->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawAbserve->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawDiscard->Visible) { // thawDiscard ?>
		<td data-name="thawDiscard"<?php echo $ivf_embryology_chart->thawDiscard->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawDiscard" class="form-group ivf_embryology_chart_thawDiscard">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawDiscard->EditValue ?>"<?php echo $ivf_embryology_chart->thawDiscard->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" value="<?php echo HtmlEncode($ivf_embryology_chart->thawDiscard->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawDiscard" class="form-group ivf_embryology_chart_thawDiscard">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawDiscard->EditValue ?>"<?php echo $ivf_embryology_chart->thawDiscard->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard">
<span<?php echo $ivf_embryology_chart->thawDiscard->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawDiscard->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETCatheter->Visible) { // ETCatheter ?>
		<td data-name="ETCatheter"<?php echo $ivf_embryology_chart->ETCatheter->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETCatheter" class="form-group ivf_embryology_chart_ETCatheter">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETCatheter->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETCatheter->EditValue ?>"<?php echo $ivf_embryology_chart->ETCatheter->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" value="<?php echo HtmlEncode($ivf_embryology_chart->ETCatheter->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETCatheter" class="form-group ivf_embryology_chart_ETCatheter">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETCatheter->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETCatheter->EditValue ?>"<?php echo $ivf_embryology_chart->ETCatheter->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter">
<span<?php echo $ivf_embryology_chart->ETCatheter->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETCatheter->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETDifficulty->Visible) { // ETDifficulty ?>
		<td data-name="ETDifficulty"<?php echo $ivf_embryology_chart->ETDifficulty->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDifficulty" class="form-group ivf_embryology_chart_ETDifficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-value-separator="<?php echo $ivf_embryology_chart->ETDifficulty->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty"<?php echo $ivf_embryology_chart->ETDifficulty->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->ETDifficulty->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty" value="<?php echo HtmlEncode($ivf_embryology_chart->ETDifficulty->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDifficulty" class="form-group ivf_embryology_chart_ETDifficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-value-separator="<?php echo $ivf_embryology_chart->ETDifficulty->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty"<?php echo $ivf_embryology_chart->ETDifficulty->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->ETDifficulty->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty">
<span<?php echo $ivf_embryology_chart->ETDifficulty->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDifficulty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETEasy->Visible) { // ETEasy ?>
		<td data-name="ETEasy"<?php echo $ivf_embryology_chart->ETEasy->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETEasy" class="form-group ivf_embryology_chart_ETEasy">
<div id="tp_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-value-separator="<?php echo $ivf_embryology_chart->ETEasy->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" value="{value}"<?php echo $ivf_embryology_chart->ETEasy->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart->ETEasy->checkBoxListHtml(FALSE, "x{$ivf_embryology_chart_list->RowIndex}_ETEasy[]") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" value="<?php echo HtmlEncode($ivf_embryology_chart->ETEasy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETEasy" class="form-group ivf_embryology_chart_ETEasy">
<div id="tp_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-value-separator="<?php echo $ivf_embryology_chart->ETEasy->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" value="{value}"<?php echo $ivf_embryology_chart->ETEasy->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart->ETEasy->checkBoxListHtml(FALSE, "x{$ivf_embryology_chart_list->RowIndex}_ETEasy[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy">
<span<?php echo $ivf_embryology_chart->ETEasy->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETEasy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETComments->Visible) { // ETComments ?>
		<td data-name="ETComments"<?php echo $ivf_embryology_chart->ETComments->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETComments" class="form-group ivf_embryology_chart_ETComments">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETComments->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETComments->EditValue ?>"<?php echo $ivf_embryology_chart->ETComments->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" value="<?php echo HtmlEncode($ivf_embryology_chart->ETComments->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETComments" class="form-group ivf_embryology_chart_ETComments">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETComments->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETComments->EditValue ?>"<?php echo $ivf_embryology_chart->ETComments->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments">
<span<?php echo $ivf_embryology_chart->ETComments->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETComments->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETDoctor->Visible) { // ETDoctor ?>
		<td data-name="ETDoctor"<?php echo $ivf_embryology_chart->ETDoctor->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDoctor" class="form-group ivf_embryology_chart_ETDoctor">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETDoctor->EditValue ?>"<?php echo $ivf_embryology_chart->ETDoctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" value="<?php echo HtmlEncode($ivf_embryology_chart->ETDoctor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDoctor" class="form-group ivf_embryology_chart_ETDoctor">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETDoctor->EditValue ?>"<?php echo $ivf_embryology_chart->ETDoctor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor">
<span<?php echo $ivf_embryology_chart->ETDoctor->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDoctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETEmbryologist->Visible) { // ETEmbryologist ?>
		<td data-name="ETEmbryologist"<?php echo $ivf_embryology_chart->ETEmbryologist->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETEmbryologist" class="form-group ivf_embryology_chart_ETEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->ETEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->ETEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETEmbryologist" class="form-group ivf_embryology_chart_ETEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->ETEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist">
<span<?php echo $ivf_embryology_chart->ETEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETDate->Visible) { // ETDate ?>
		<td data-name="ETDate"<?php echo $ivf_embryology_chart->ETDate->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDate" class="form-group ivf_embryology_chart_ETDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETDate->EditValue ?>"<?php echo $ivf_embryology_chart->ETDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->ETDate->ReadOnly && !$ivf_embryology_chart->ETDate->Disabled && !isset($ivf_embryology_chart->ETDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->ETDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" value="<?php echo HtmlEncode($ivf_embryology_chart->ETDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDate" class="form-group ivf_embryology_chart_ETDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETDate->EditValue ?>"<?php echo $ivf_embryology_chart->ETDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->ETDate->ReadOnly && !$ivf_embryology_chart->ETDate->Disabled && !isset($ivf_embryology_chart->ETDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->ETDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate">
<span<?php echo $ivf_embryology_chart->ETDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1End->Visible) { // Day1End ?>
		<td data-name="Day1End"<?php echo $ivf_embryology_chart->Day1End->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1End" class="form-group ivf_embryology_chart_Day1End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1End" data-value-separator="<?php echo $ivf_embryology_chart->Day1End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End"<?php echo $ivf_embryology_chart->Day1End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1End->OldValue) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1End" class="form-group ivf_embryology_chart_Day1End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1End" data-value-separator="<?php echo $ivf_embryology_chart->Day1End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End"<?php echo $ivf_embryology_chart->Day1End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_embryology_chart_list->RowCnt ?>_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End">
<span<?php echo $ivf_embryology_chart->Day1End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1End->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_embryology_chart_list->ListOptions->render("body", "right", $ivf_embryology_chart_list->RowCnt);
?>
	</tr>
<?php if ($ivf_embryology_chart->RowType == ROWTYPE_ADD || $ivf_embryology_chart->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_embryology_chartlist.updateLists(<?php echo $ivf_embryology_chart_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_embryology_chart->isGridAdd())
		if (!$ivf_embryology_chart_list->Recordset->EOF)
			$ivf_embryology_chart_list->Recordset->moveNext();
}
?>
<?php
	if ($ivf_embryology_chart->isGridAdd() || $ivf_embryology_chart->isGridEdit()) {
		$ivf_embryology_chart_list->RowIndex = '$rowindex$';
		$ivf_embryology_chart_list->loadRowValues();

		// Set row properties
		$ivf_embryology_chart->resetAttributes();
		$ivf_embryology_chart->RowAttrs = array_merge($ivf_embryology_chart->RowAttrs, array('data-rowindex'=>$ivf_embryology_chart_list->RowIndex, 'id'=>'r0_ivf_embryology_chart', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_embryology_chart->RowAttrs["class"], "ew-template");
		$ivf_embryology_chart->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_embryology_chart_list->renderRow();

		// Render list options
		$ivf_embryology_chart_list->renderListOptions();
		$ivf_embryology_chart_list->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_embryology_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_embryology_chart_list->ListOptions->render("body", "left", $ivf_embryology_chart_list->RowIndex);
?>
	<?php if ($ivf_embryology_chart->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_id" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_id" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_embryology_chart->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<?php if ($ivf_embryology_chart->RIDNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<span<?php echo $ivf_embryology_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_RIDNo" class="form-group ivf_embryology_chart_RIDNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" size="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->RIDNo->EditValue ?>"<?php echo $ivf_embryology_chart->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if ($ivf_embryology_chart->Name->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<span<?php echo $ivf_embryology_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_embryology_chart->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_Name" class="form-group ivf_embryology_chart_Name">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Name" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Name->EditValue ?>"<?php echo $ivf_embryology_chart->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Name" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_embryology_chart->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle">
<span id="el$rowindex$_ivf_embryology_chart_ARTCycle" class="form-group ivf_embryology_chart_ARTCycle">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ARTCycle->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ARTCycle->EditValue ?>"<?php echo $ivf_embryology_chart->ARTCycle->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_embryology_chart->ARTCycle->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->SpermOrigin->Visible) { // SpermOrigin ?>
		<td data-name="SpermOrigin">
<span id="el$rowindex$_ivf_embryology_chart_SpermOrigin" class="form-group ivf_embryology_chart_SpermOrigin">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->SpermOrigin->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->SpermOrigin->EditValue ?>"<?php echo $ivf_embryology_chart->SpermOrigin->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SpermOrigin" value="<?php echo HtmlEncode($ivf_embryology_chart->SpermOrigin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique">
<span id="el$rowindex$_ivf_embryology_chart_InseminatinTechnique" class="form-group ivf_embryology_chart_InseminatinTechnique">
<input type="text" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->InseminatinTechnique->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->InseminatinTechnique->EditValue ?>"<?php echo $ivf_embryology_chart->InseminatinTechnique->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_embryology_chart->InseminatinTechnique->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->IndicationForART->Visible) { // IndicationForART ?>
		<td data-name="IndicationForART">
<span id="el$rowindex$_ivf_embryology_chart_IndicationForART" class="form-group ivf_embryology_chart_IndicationForART">
<input type="text" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->IndicationForART->EditValue ?>"<?php echo $ivf_embryology_chart->IndicationForART->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_IndicationForART" value="<?php echo HtmlEncode($ivf_embryology_chart->IndicationForART->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0sino->Visible) { // Day0sino ?>
		<td data-name="Day0sino">
<span id="el$rowindex$_ivf_embryology_chart_Day0sino" class="form-group ivf_embryology_chart_Day0sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0sino->EditValue ?>"<?php echo $ivf_embryology_chart->Day0sino->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0sino" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0sino->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<td data-name="Day0OocyteStage">
<span id="el$rowindex$_ivf_embryology_chart_Day0OocyteStage" class="form-group ivf_embryology_chart_Day0OocyteStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0OocyteStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0OocyteStage->EditValue ?>"<?php echo $ivf_embryology_chart->Day0OocyteStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0OocyteStage" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0OocyteStage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
		<td data-name="Day0PolarBodyPosition">
<span id="el$rowindex$_ivf_embryology_chart_Day0PolarBodyPosition" class="form-group ivf_embryology_chart_Day0PolarBodyPosition">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-value-separator="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition"<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0PolarBodyPosition" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0PolarBodyPosition->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0Breakage->Visible) { // Day0Breakage ?>
		<td data-name="Day0Breakage">
<span id="el$rowindex$_ivf_embryology_chart_Day0Breakage" class="form-group ivf_embryology_chart_Day0Breakage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-value-separator="<?php echo $ivf_embryology_chart->Day0Breakage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage"<?php echo $ivf_embryology_chart->Day0Breakage->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0Breakage->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Breakage" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0Breakage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0Attempts->Visible) { // Day0Attempts ?>
		<td data-name="Day0Attempts">
<span id="el$rowindex$_ivf_embryology_chart_Day0Attempts" class="form-group ivf_embryology_chart_Day0Attempts">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-value-separator="<?php echo $ivf_embryology_chart->Day0Attempts->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts"<?php echo $ivf_embryology_chart->Day0Attempts->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0Attempts->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0Attempts" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0Attempts->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
		<td data-name="Day0SPZMorpho">
<span id="el$rowindex$_ivf_embryology_chart_Day0SPZMorpho" class="form-group ivf_embryology_chart_Day0SPZMorpho">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-value-separator="<?php echo $ivf_embryology_chart->Day0SPZMorpho->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho"<?php echo $ivf_embryology_chart->Day0SPZMorpho->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SPZMorpho->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZMorpho" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0SPZMorpho->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
		<td data-name="Day0SPZLocation">
<span id="el$rowindex$_ivf_embryology_chart_Day0SPZLocation" class="form-group ivf_embryology_chart_Day0SPZLocation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-value-separator="<?php echo $ivf_embryology_chart->Day0SPZLocation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation"<?php echo $ivf_embryology_chart->Day0SPZLocation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SPZLocation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SPZLocation" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0SPZLocation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
		<td data-name="Day0SpOrgin">
<span id="el$rowindex$_ivf_embryology_chart_Day0SpOrgin" class="form-group ivf_embryology_chart_Day0SpOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-value-separator="<?php echo $ivf_embryology_chart->Day0SpOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin"<?php echo $ivf_embryology_chart->Day0SpOrgin->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day0SpOrgin->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day0SpOrgin" value="<?php echo HtmlEncode($ivf_embryology_chart->Day0SpOrgin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
		<td data-name="Day5Cryoptop">
<span id="el$rowindex$_ivf_embryology_chart_Day5Cryoptop" class="form-group ivf_embryology_chart_Day5Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day5Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop"<?php echo $ivf_embryology_chart->Day5Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Cryoptop->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Sperm->Visible) { // Day1Sperm ?>
		<td data-name="Day1Sperm">
<span id="el$rowindex$_ivf_embryology_chart_Day1Sperm" class="form-group ivf_embryology_chart_Day1Sperm">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day1Sperm->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day1Sperm->EditValue ?>"<?php echo $ivf_embryology_chart->Day1Sperm->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Sperm" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Sperm->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1PN->Visible) { // Day1PN ?>
		<td data-name="Day1PN">
<span id="el$rowindex$_ivf_embryology_chart_Day1PN" class="form-group ivf_embryology_chart_Day1PN">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-value-separator="<?php echo $ivf_embryology_chart->Day1PN->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN"<?php echo $ivf_embryology_chart->Day1PN->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1PN->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PN" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PN" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1PN->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1PB->Visible) { // Day1PB ?>
		<td data-name="Day1PB">
<span id="el$rowindex$_ivf_embryology_chart_Day1PB" class="form-group ivf_embryology_chart_Day1PB">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-value-separator="<?php echo $ivf_embryology_chart->Day1PB->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB"<?php echo $ivf_embryology_chart->Day1PB->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1PB->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1PB" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1PB" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1PB->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
		<td data-name="Day1Pronucleus">
<span id="el$rowindex$_ivf_embryology_chart_Day1Pronucleus" class="form-group ivf_embryology_chart_Day1Pronucleus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-value-separator="<?php echo $ivf_embryology_chart->Day1Pronucleus->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus"<?php echo $ivf_embryology_chart->Day1Pronucleus->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Pronucleus->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Pronucleus" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Pronucleus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
		<td data-name="Day1Nucleolus">
<span id="el$rowindex$_ivf_embryology_chart_Day1Nucleolus" class="form-group ivf_embryology_chart_Day1Nucleolus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-value-separator="<?php echo $ivf_embryology_chart->Day1Nucleolus->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus"<?php echo $ivf_embryology_chart->Day1Nucleolus->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Nucleolus->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Nucleolus" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Nucleolus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1Halo->Visible) { // Day1Halo ?>
		<td data-name="Day1Halo">
<span id="el$rowindex$_ivf_embryology_chart_Day1Halo" class="form-group ivf_embryology_chart_Day1Halo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-value-separator="<?php echo $ivf_embryology_chart->Day1Halo->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo"<?php echo $ivf_embryology_chart->Day1Halo->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1Halo->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1Halo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1Halo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1Halo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2SiNo->Visible) { // Day2SiNo ?>
		<td data-name="Day2SiNo">
<span id="el$rowindex$_ivf_embryology_chart_Day2SiNo" class="form-group ivf_embryology_chart_Day2SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2SiNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day2SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2SiNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2CellNo->Visible) { // Day2CellNo ?>
		<td data-name="Day2CellNo">
<span id="el$rowindex$_ivf_embryology_chart_Day2CellNo" class="form-group ivf_embryology_chart_Day2CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day2CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2CellNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Frag->Visible) { // Day2Frag ?>
		<td data-name="Day2Frag">
<span id="el$rowindex$_ivf_embryology_chart_Day2Frag" class="form-group ivf_embryology_chart_Day2Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Frag->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Frag" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Frag->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Symmetry->Visible) { // Day2Symmetry ?>
		<td data-name="Day2Symmetry">
<span id="el$rowindex$_ivf_embryology_chart_Day2Symmetry" class="form-group ivf_embryology_chart_Day2Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Symmetry->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Symmetry" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Symmetry->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
		<td data-name="Day2Cryoptop">
<span id="el$rowindex$_ivf_embryology_chart_Day2Cryoptop" class="form-group ivf_embryology_chart_Day2Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Cryoptop->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Cryoptop->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2Grade->Visible) { // Day2Grade ?>
		<td data-name="Day2Grade">
<span id="el$rowindex$_ivf_embryology_chart_Day2Grade" class="form-group ivf_embryology_chart_Day2Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Grade->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Grade->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day2End->Visible) { // Day2End ?>
		<td data-name="Day2End">
<span id="el$rowindex$_ivf_embryology_chart_Day2End" class="form-group ivf_embryology_chart_Day2End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day2End" data-value-separator="<?php echo $ivf_embryology_chart->Day2End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End"<?php echo $ivf_embryology_chart->Day2End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day2End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day2End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day2End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day2End->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Sino->Visible) { // Day3Sino ?>
		<td data-name="Day3Sino">
<span id="el$rowindex$_ivf_embryology_chart_Day3Sino" class="form-group ivf_embryology_chart_Day3Sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3Sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3Sino->EditValue ?>"<?php echo $ivf_embryology_chart->Day3Sino->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Sino" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Sino->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3CellNo->Visible) { // Day3CellNo ?>
		<td data-name="Day3CellNo">
<span id="el$rowindex$_ivf_embryology_chart_Day3CellNo" class="form-group ivf_embryology_chart_Day3CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day3CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3CellNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Frag->Visible) { // Day3Frag ?>
		<td data-name="Day3Frag">
<span id="el$rowindex$_ivf_embryology_chart_Day3Frag" class="form-group ivf_embryology_chart_Day3Frag">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-value-separator="<?php echo $ivf_embryology_chart->Day3Frag->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag"<?php echo $ivf_embryology_chart->Day3Frag->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Frag->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Frag" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Frag" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Frag->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Symmetry->Visible) { // Day3Symmetry ?>
		<td data-name="Day3Symmetry">
<span id="el$rowindex$_ivf_embryology_chart_Day3Symmetry" class="form-group ivf_embryology_chart_Day3Symmetry">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-value-separator="<?php echo $ivf_embryology_chart->Day3Symmetry->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry"<?php echo $ivf_embryology_chart->Day3Symmetry->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Symmetry->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Symmetry" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Symmetry->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3ZP->Visible) { // Day3ZP ?>
		<td data-name="Day3ZP">
<span id="el$rowindex$_ivf_embryology_chart_Day3ZP" class="form-group ivf_embryology_chart_Day3ZP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-value-separator="<?php echo $ivf_embryology_chart->Day3ZP->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP"<?php echo $ivf_embryology_chart->Day3ZP->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3ZP->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3ZP" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3ZP" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3ZP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Vacoules->Visible) { // Day3Vacoules ?>
		<td data-name="Day3Vacoules">
<span id="el$rowindex$_ivf_embryology_chart_Day3Vacoules" class="form-group ivf_embryology_chart_Day3Vacoules">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-value-separator="<?php echo $ivf_embryology_chart->Day3Vacoules->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules"<?php echo $ivf_embryology_chart->Day3Vacoules->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Vacoules->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Vacoules" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Vacoules->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Grade->Visible) { // Day3Grade ?>
		<td data-name="Day3Grade">
<span id="el$rowindex$_ivf_embryology_chart_Day3Grade" class="form-group ivf_embryology_chart_Day3Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day3Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade"<?php echo $ivf_embryology_chart->Day3Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
		<td data-name="Day3Cryoptop">
<span id="el$rowindex$_ivf_embryology_chart_Day3Cryoptop" class="form-group ivf_embryology_chart_Day3Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day3Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop"<?php echo $ivf_embryology_chart->Day3Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3Cryoptop->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day3End->Visible) { // Day3End ?>
		<td data-name="Day3End">
<span id="el$rowindex$_ivf_embryology_chart_Day3End" class="form-group ivf_embryology_chart_Day3End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3End" data-value-separator="<?php echo $ivf_embryology_chart->Day3End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End"<?php echo $ivf_embryology_chart->Day3End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day3End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day3End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day3End->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4SiNo->Visible) { // Day4SiNo ?>
		<td data-name="Day4SiNo">
<span id="el$rowindex$_ivf_embryology_chart_Day4SiNo" class="form-group ivf_embryology_chart_Day4SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4SiNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day4SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4SiNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4CellNo->Visible) { // Day4CellNo ?>
		<td data-name="Day4CellNo">
<span id="el$rowindex$_ivf_embryology_chart_Day4CellNo" class="form-group ivf_embryology_chart_Day4CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day4CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4CellNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Frag->Visible) { // Day4Frag ?>
		<td data-name="Day4Frag">
<span id="el$rowindex$_ivf_embryology_chart_Day4Frag" class="form-group ivf_embryology_chart_Day4Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Frag->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Frag" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Frag->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Symmetry->Visible) { // Day4Symmetry ?>
		<td data-name="Day4Symmetry">
<span id="el$rowindex$_ivf_embryology_chart_Day4Symmetry" class="form-group ivf_embryology_chart_Day4Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Symmetry->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Symmetry" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Symmetry->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Grade->Visible) { // Day4Grade ?>
		<td data-name="Day4Grade">
<span id="el$rowindex$_ivf_embryology_chart_Day4Grade" class="form-group ivf_embryology_chart_Day4Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Grade->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Grade->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
		<td data-name="Day4Cryoptop">
<span id="el$rowindex$_ivf_embryology_chart_Day4Cryoptop" class="form-group ivf_embryology_chart_Day4Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day4Cryoptop->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop"<?php echo $ivf_embryology_chart->Day4Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day4Cryoptop->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4Cryoptop->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day4End->Visible) { // Day4End ?>
		<td data-name="Day4End">
<span id="el$rowindex$_ivf_embryology_chart_Day4End" class="form-group ivf_embryology_chart_Day4End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4End" data-value-separator="<?php echo $ivf_embryology_chart->Day4End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End"<?php echo $ivf_embryology_chart->Day4End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day4End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day4End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day4End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day4End->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5CellNo->Visible) { // Day5CellNo ?>
		<td data-name="Day5CellNo">
<span id="el$rowindex$_ivf_embryology_chart_Day5CellNo" class="form-group ivf_embryology_chart_Day5CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day5CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day5CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day5CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5CellNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5ICM->Visible) { // Day5ICM ?>
		<td data-name="Day5ICM">
<span id="el$rowindex$_ivf_embryology_chart_Day5ICM" class="form-group ivf_embryology_chart_Day5ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-value-separator="<?php echo $ivf_embryology_chart->Day5ICM->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM"<?php echo $ivf_embryology_chart->Day5ICM->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5ICM->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5ICM" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5ICM" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5ICM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5TE->Visible) { // Day5TE ?>
		<td data-name="Day5TE">
<span id="el$rowindex$_ivf_embryology_chart_Day5TE" class="form-group ivf_embryology_chart_Day5TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-value-separator="<?php echo $ivf_embryology_chart->Day5TE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE"<?php echo $ivf_embryology_chart->Day5TE->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5TE->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5TE" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5TE" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5TE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Observation->Visible) { // Day5Observation ?>
		<td data-name="Day5Observation">
<span id="el$rowindex$_ivf_embryology_chart_Day5Observation" class="form-group ivf_embryology_chart_Day5Observation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-value-separator="<?php echo $ivf_embryology_chart->Day5Observation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation"<?php echo $ivf_embryology_chart->Day5Observation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Observation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Observation" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Observation" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Observation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Collapsed->Visible) { // Day5Collapsed ?>
		<td data-name="Day5Collapsed">
<span id="el$rowindex$_ivf_embryology_chart_Day5Collapsed" class="form-group ivf_embryology_chart_Day5Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-value-separator="<?php echo $ivf_embryology_chart->Day5Collapsed->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed"<?php echo $ivf_embryology_chart->Day5Collapsed->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Collapsed->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Collapsed" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Collapsed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
		<td data-name="Day5Vacoulles">
<span id="el$rowindex$_ivf_embryology_chart_Day5Vacoulles" class="form-group ivf_embryology_chart_Day5Vacoulles">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-value-separator="<?php echo $ivf_embryology_chart->Day5Vacoulles->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles"<?php echo $ivf_embryology_chart->Day5Vacoulles->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Vacoulles->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Vacoulles" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Vacoulles->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day5Grade->Visible) { // Day5Grade ?>
		<td data-name="Day5Grade">
<span id="el$rowindex$_ivf_embryology_chart_Day5Grade" class="form-group ivf_embryology_chart_Day5Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day5Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade"<?php echo $ivf_embryology_chart->Day5Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day5Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day5Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day5Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6CellNo->Visible) { // Day6CellNo ?>
		<td data-name="Day6CellNo">
<span id="el$rowindex$_ivf_embryology_chart_Day6CellNo" class="form-group ivf_embryology_chart_Day6CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day6CellNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6CellNo" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6CellNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6ICM->Visible) { // Day6ICM ?>
		<td data-name="Day6ICM">
<span id="el$rowindex$_ivf_embryology_chart_Day6ICM" class="form-group ivf_embryology_chart_Day6ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-value-separator="<?php echo $ivf_embryology_chart->Day6ICM->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM"<?php echo $ivf_embryology_chart->Day6ICM->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6ICM->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6ICM" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6ICM" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6ICM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6TE->Visible) { // Day6TE ?>
		<td data-name="Day6TE">
<span id="el$rowindex$_ivf_embryology_chart_Day6TE" class="form-group ivf_embryology_chart_Day6TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-value-separator="<?php echo $ivf_embryology_chart->Day6TE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE"<?php echo $ivf_embryology_chart->Day6TE->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6TE->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6TE" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6TE" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6TE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Observation->Visible) { // Day6Observation ?>
		<td data-name="Day6Observation">
<span id="el$rowindex$_ivf_embryology_chart_Day6Observation" class="form-group ivf_embryology_chart_Day6Observation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-value-separator="<?php echo $ivf_embryology_chart->Day6Observation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation"<?php echo $ivf_embryology_chart->Day6Observation->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Observation->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Observation" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Observation" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Observation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Collapsed->Visible) { // Day6Collapsed ?>
		<td data-name="Day6Collapsed">
<span id="el$rowindex$_ivf_embryology_chart_Day6Collapsed" class="form-group ivf_embryology_chart_Day6Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-value-separator="<?php echo $ivf_embryology_chart->Day6Collapsed->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed"<?php echo $ivf_embryology_chart->Day6Collapsed->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Collapsed->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Collapsed" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Collapsed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
		<td data-name="Day6Vacoulles">
<span id="el$rowindex$_ivf_embryology_chart_Day6Vacoulles" class="form-group ivf_embryology_chart_Day6Vacoulles">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-value-separator="<?php echo $ivf_embryology_chart->Day6Vacoulles->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles"<?php echo $ivf_embryology_chart->Day6Vacoulles->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Vacoulles->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Vacoulles" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Vacoulles->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Grade->Visible) { // Day6Grade ?>
		<td data-name="Day6Grade">
<span id="el$rowindex$_ivf_embryology_chart_Day6Grade" class="form-group ivf_embryology_chart_Day6Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day6Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade"<?php echo $ivf_embryology_chart->Day6Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Grade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Grade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Grade" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
		<td data-name="Day6Cryoptop">
<span id="el$rowindex$_ivf_embryology_chart_Day6Cryoptop" class="form-group ivf_embryology_chart_Day6Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day6Cryoptop->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day6Cryoptop" value="<?php echo HtmlEncode($ivf_embryology_chart->Day6Cryoptop->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndSiNo->Visible) { // EndSiNo ?>
		<td data-name="EndSiNo">
<span id="el$rowindex$_ivf_embryology_chart_EndSiNo" class="form-group ivf_embryology_chart_EndSiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->EndSiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->EndSiNo->EditValue ?>"<?php echo $ivf_embryology_chart->EndSiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndSiNo" value="<?php echo HtmlEncode($ivf_embryology_chart->EndSiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingDay->Visible) { // EndingDay ?>
		<td data-name="EndingDay">
<span id="el$rowindex$_ivf_embryology_chart_EndingDay" class="form-group ivf_embryology_chart_EndingDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-value-separator="<?php echo $ivf_embryology_chart->EndingDay->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay"<?php echo $ivf_embryology_chart->EndingDay->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingDay->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingDay" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingDay" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingDay->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingCellStage->Visible) { // EndingCellStage ?>
		<td data-name="EndingCellStage">
<span id="el$rowindex$_ivf_embryology_chart_EndingCellStage" class="form-group ivf_embryology_chart_EndingCellStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->EndingCellStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->EndingCellStage->EditValue ?>"<?php echo $ivf_embryology_chart->EndingCellStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingCellStage" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingCellStage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingGrade->Visible) { // EndingGrade ?>
		<td data-name="EndingGrade">
<span id="el$rowindex$_ivf_embryology_chart_EndingGrade" class="form-group ivf_embryology_chart_EndingGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-value-separator="<?php echo $ivf_embryology_chart->EndingGrade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade"<?php echo $ivf_embryology_chart->EndingGrade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingGrade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingGrade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingGrade" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingGrade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->EndingState->Visible) { // EndingState ?>
		<td data-name="EndingState">
<span id="el$rowindex$_ivf_embryology_chart_EndingState" class="form-group ivf_embryology_chart_EndingState">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingState" data-value-separator="<?php echo $ivf_embryology_chart->EndingState->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState"<?php echo $ivf_embryology_chart->EndingState->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingState->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_EndingState" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_EndingState" value="<?php echo HtmlEncode($ivf_embryology_chart->EndingState->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if ($ivf_embryology_chart->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<span<?php echo $ivf_embryology_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_TidNo" class="form-group ivf_embryology_chart_TidNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->TidNo->EditValue ?>"<?php echo $ivf_embryology_chart->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_TidNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->DidNO->Visible) { // DidNO ?>
		<td data-name="DidNO">
<?php if ($ivf_embryology_chart->DidNO->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->DidNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" value="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_embryology_chart_DidNO" class="form-group ivf_embryology_chart_DidNO">
<input type="text" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->DidNO->EditValue ?>"<?php echo $ivf_embryology_chart->DidNO->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_DidNO" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_DidNO" value="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
		<td data-name="ICSiIVFDateTime">
<span id="el$rowindex$_ivf_embryology_chart_ICSiIVFDateTime" class="form-group ivf_embryology_chart_ICSiIVFDateTime">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->EditValue ?>"<?php echo $ivf_embryology_chart->ICSiIVFDateTime->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->ICSiIVFDateTime->ReadOnly && !$ivf_embryology_chart->ICSiIVFDateTime->Disabled && !isset($ivf_embryology_chart->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ICSiIVFDateTime" value="<?php echo HtmlEncode($ivf_embryology_chart->ICSiIVFDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
		<td data-name="PrimaryEmbrologist">
<span id="el$rowindex$_ivf_embryology_chart_PrimaryEmbrologist" class="form-group ivf_embryology_chart_PrimaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart->PrimaryEmbrologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_PrimaryEmbrologist" value="<?php echo HtmlEncode($ivf_embryology_chart->PrimaryEmbrologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
		<td data-name="SecondaryEmbrologist">
<span id="el$rowindex$_ivf_embryology_chart_SecondaryEmbrologist" class="form-group ivf_embryology_chart_SecondaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart->SecondaryEmbrologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_SecondaryEmbrologist" value="<?php echo HtmlEncode($ivf_embryology_chart->SecondaryEmbrologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator">
<span id="el$rowindex$_ivf_embryology_chart_Incubator" class="form-group ivf_embryology_chart_Incubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Incubator->EditValue ?>"<?php echo $ivf_embryology_chart->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Incubator" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_embryology_chart->Incubator->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->location->Visible) { // location ?>
		<td data-name="location">
<span id="el$rowindex$_ivf_embryology_chart_location" class="form-group ivf_embryology_chart_location">
<input type="text" data-table="ivf_embryology_chart" data-field="x_location" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->location->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->location->EditValue ?>"<?php echo $ivf_embryology_chart->location->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_location" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_location" value="<?php echo HtmlEncode($ivf_embryology_chart->location->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
		<td data-name="OocyteNo">
<span id="el$rowindex$_ivf_embryology_chart_OocyteNo" class="form-group ivf_embryology_chart_OocyteNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->OocyteNo->EditValue ?>"<?php echo $ivf_embryology_chart->OocyteNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_embryology_chart->OocyteNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Stage->Visible) { // Stage ?>
		<td data-name="Stage">
<span id="el$rowindex$_ivf_embryology_chart_Stage" class="form-group ivf_embryology_chart_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Stage" data-value-separator="<?php echo $ivf_embryology_chart->Stage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage"<?php echo $ivf_embryology_chart->Stage->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Stage->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Stage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_embryology_chart->Stage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks">
<span id="el$rowindex$_ivf_embryology_chart_Remarks" class="form-group ivf_embryology_chart_Remarks">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Remarks->EditValue ?>"<?php echo $ivf_embryology_chart->Remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Remarks" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($ivf_embryology_chart->Remarks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate">
<span id="el$rowindex$_ivf_embryology_chart_vitrificationDate" class="form-group ivf_embryology_chart_vitrificationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" size="12" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitrificationDate->EditValue ?>"<?php echo $ivf_embryology_chart->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->vitrificationDate->ReadOnly && !$ivf_embryology_chart->vitrificationDate->Disabled && !isset($ivf_embryology_chart->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_embryology_chart->vitrificationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
		<td data-name="vitriPrimaryEmbryologist">
<span id="el$rowindex$_ivf_embryology_chart_vitriPrimaryEmbryologist" class="form-group ivf_embryology_chart_vitriPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriPrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriPrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
		<td data-name="vitriSecondaryEmbryologist">
<span id="el$rowindex$_ivf_embryology_chart_vitriSecondaryEmbryologist" class="form-group ivf_embryology_chart_vitriSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriSecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriSecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
		<td data-name="vitriEmbryoNo">
<span id="el$rowindex$_ivf_embryology_chart_vitriEmbryoNo" class="form-group ivf_embryology_chart_vitriEmbryoNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriEmbryoNo->EditValue ?>"<?php echo $ivf_embryology_chart->vitriEmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriEmbryoNo" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriEmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawReFrozen->Visible) { // thawReFrozen ?>
		<td data-name="thawReFrozen">
<span id="el$rowindex$_ivf_embryology_chart_thawReFrozen" class="form-group ivf_embryology_chart_thawReFrozen">
<div id="tp_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-value-separator="<?php echo $ivf_embryology_chart->thawReFrozen->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" value="{value}"<?php echo $ivf_embryology_chart->thawReFrozen->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart->thawReFrozen->checkBoxListHtml(FALSE, "x{$ivf_embryology_chart_list->RowIndex}_thawReFrozen[]") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawReFrozen[]" value="<?php echo HtmlEncode($ivf_embryology_chart->thawReFrozen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
		<td data-name="vitriFertilisationDate">
<span id="el$rowindex$_ivf_embryology_chart_vitriFertilisationDate" class="form-group ivf_embryology_chart_vitriFertilisationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" size="12" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriFertilisationDate->EditValue ?>"<?php echo $ivf_embryology_chart->vitriFertilisationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->vitriFertilisationDate->ReadOnly && !$ivf_embryology_chart->vitriFertilisationDate->Disabled && !isset($ivf_embryology_chart->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriFertilisationDate" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriFertilisationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriDay->Visible) { // vitriDay ?>
		<td data-name="vitriDay">
<span id="el$rowindex$_ivf_embryology_chart_vitriDay" class="form-group ivf_embryology_chart_vitriDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-value-separator="<?php echo $ivf_embryology_chart->vitriDay->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay"<?php echo $ivf_embryology_chart->vitriDay->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->vitriDay->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriDay" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriDay" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriDay->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriStage->Visible) { // vitriStage ?>
		<td data-name="vitriStage">
<span id="el$rowindex$_ivf_embryology_chart_vitriStage" class="form-group ivf_embryology_chart_vitriStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriStage->EditValue ?>"<?php echo $ivf_embryology_chart->vitriStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriStage" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriStage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriGrade->Visible) { // vitriGrade ?>
		<td data-name="vitriGrade">
<span id="el$rowindex$_ivf_embryology_chart_vitriGrade" class="form-group ivf_embryology_chart_vitriGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-value-separator="<?php echo $ivf_embryology_chart->vitriGrade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade"<?php echo $ivf_embryology_chart->vitriGrade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->vitriGrade->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGrade" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGrade" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriGrade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriIncubator->Visible) { // vitriIncubator ?>
		<td data-name="vitriIncubator">
<span id="el$rowindex$_ivf_embryology_chart_vitriIncubator" class="form-group ivf_embryology_chart_vitriIncubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriIncubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriIncubator->EditValue ?>"<?php echo $ivf_embryology_chart->vitriIncubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriIncubator" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriIncubator->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriTank->Visible) { // vitriTank ?>
		<td data-name="vitriTank">
<span id="el$rowindex$_ivf_embryology_chart_vitriTank" class="form-group ivf_embryology_chart_vitriTank">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriTank->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriTank->EditValue ?>"<?php echo $ivf_embryology_chart->vitriTank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriTank" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriTank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriCanister->Visible) { // vitriCanister ?>
		<td data-name="vitriCanister">
<span id="el$rowindex$_ivf_embryology_chart_vitriCanister" class="form-group ivf_embryology_chart_vitriCanister">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCanister->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCanister->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCanister->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCanister" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriCanister->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriGobiet->Visible) { // vitriGobiet ?>
		<td data-name="vitriGobiet">
<span id="el$rowindex$_ivf_embryology_chart_vitriGobiet" class="form-group ivf_embryology_chart_vitriGobiet">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriGobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriGobiet->EditValue ?>"<?php echo $ivf_embryology_chart->vitriGobiet->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriGobiet" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriGobiet->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriViscotube->Visible) { // vitriViscotube ?>
		<td data-name="vitriViscotube">
<span id="el$rowindex$_ivf_embryology_chart_vitriViscotube" class="form-group ivf_embryology_chart_vitriViscotube">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriViscotube->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriViscotube->EditValue ?>"<?php echo $ivf_embryology_chart->vitriViscotube->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriViscotube" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriViscotube->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
		<td data-name="vitriCryolockNo">
<span id="el$rowindex$_ivf_embryology_chart_vitriCryolockNo" class="form-group ivf_embryology_chart_vitriCryolockNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCryolockNo->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCryolockNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockNo" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
		<td data-name="vitriCryolockColour">
<span id="el$rowindex$_ivf_embryology_chart_vitriCryolockColour" class="form-group ivf_embryology_chart_vitriCryolockColour">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCryolockColour->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCryolockColour->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_vitriCryolockColour" value="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockColour->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawDate->Visible) { // thawDate ?>
		<td data-name="thawDate">
<span id="el$rowindex$_ivf_embryology_chart_thawDate" class="form-group ivf_embryology_chart_thawDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawDate->EditValue ?>"<?php echo $ivf_embryology_chart->thawDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->thawDate->ReadOnly && !$ivf_embryology_chart->thawDate->Disabled && !isset($ivf_embryology_chart->thawDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->thawDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDate" value="<?php echo HtmlEncode($ivf_embryology_chart->thawDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<td data-name="thawPrimaryEmbryologist">
<span id="el$rowindex$_ivf_embryology_chart_thawPrimaryEmbryologist" class="form-group ivf_embryology_chart_thawPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawPrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->thawPrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<td data-name="thawSecondaryEmbryologist">
<span id="el$rowindex$_ivf_embryology_chart_thawSecondaryEmbryologist" class="form-group ivf_embryology_chart_thawSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawSecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->thawSecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawET->Visible) { // thawET ?>
		<td data-name="thawET">
<span id="el$rowindex$_ivf_embryology_chart_thawET" class="form-group ivf_embryology_chart_thawET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_thawET" data-value-separator="<?php echo $ivf_embryology_chart->thawET->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET"<?php echo $ivf_embryology_chart->thawET->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->thawET->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawET" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawET" value="<?php echo HtmlEncode($ivf_embryology_chart->thawET->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawAbserve->Visible) { // thawAbserve ?>
		<td data-name="thawAbserve">
<span id="el$rowindex$_ivf_embryology_chart_thawAbserve" class="form-group ivf_embryology_chart_thawAbserve">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawAbserve->EditValue ?>"<?php echo $ivf_embryology_chart->thawAbserve->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawAbserve" value="<?php echo HtmlEncode($ivf_embryology_chart->thawAbserve->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->thawDiscard->Visible) { // thawDiscard ?>
		<td data-name="thawDiscard">
<span id="el$rowindex$_ivf_embryology_chart_thawDiscard" class="form-group ivf_embryology_chart_thawDiscard">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawDiscard->EditValue ?>"<?php echo $ivf_embryology_chart->thawDiscard->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_thawDiscard" value="<?php echo HtmlEncode($ivf_embryology_chart->thawDiscard->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETCatheter->Visible) { // ETCatheter ?>
		<td data-name="ETCatheter">
<span id="el$rowindex$_ivf_embryology_chart_ETCatheter" class="form-group ivf_embryology_chart_ETCatheter">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETCatheter->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETCatheter->EditValue ?>"<?php echo $ivf_embryology_chart->ETCatheter->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETCatheter" value="<?php echo HtmlEncode($ivf_embryology_chart->ETCatheter->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETDifficulty->Visible) { // ETDifficulty ?>
		<td data-name="ETDifficulty">
<span id="el$rowindex$_ivf_embryology_chart_ETDifficulty" class="form-group ivf_embryology_chart_ETDifficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-value-separator="<?php echo $ivf_embryology_chart->ETDifficulty->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty"<?php echo $ivf_embryology_chart->ETDifficulty->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->ETDifficulty->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDifficulty" value="<?php echo HtmlEncode($ivf_embryology_chart->ETDifficulty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETEasy->Visible) { // ETEasy ?>
		<td data-name="ETEasy">
<span id="el$rowindex$_ivf_embryology_chart_ETEasy" class="form-group ivf_embryology_chart_ETEasy">
<div id="tp_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-value-separator="<?php echo $ivf_embryology_chart->ETEasy->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" value="{value}"<?php echo $ivf_embryology_chart->ETEasy->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart->ETEasy->checkBoxListHtml(FALSE, "x{$ivf_embryology_chart_list->RowIndex}_ETEasy[]") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEasy" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEasy[]" value="<?php echo HtmlEncode($ivf_embryology_chart->ETEasy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETComments->Visible) { // ETComments ?>
		<td data-name="ETComments">
<span id="el$rowindex$_ivf_embryology_chart_ETComments" class="form-group ivf_embryology_chart_ETComments">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETComments->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETComments->EditValue ?>"<?php echo $ivf_embryology_chart->ETComments->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETComments" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETComments" value="<?php echo HtmlEncode($ivf_embryology_chart->ETComments->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETDoctor->Visible) { // ETDoctor ?>
		<td data-name="ETDoctor">
<span id="el$rowindex$_ivf_embryology_chart_ETDoctor" class="form-group ivf_embryology_chart_ETDoctor">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETDoctor->EditValue ?>"<?php echo $ivf_embryology_chart->ETDoctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDoctor" value="<?php echo HtmlEncode($ivf_embryology_chart->ETDoctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETEmbryologist->Visible) { // ETEmbryologist ?>
		<td data-name="ETEmbryologist">
<span id="el$rowindex$_ivf_embryology_chart_ETEmbryologist" class="form-group ivf_embryology_chart_ETEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->ETEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETEmbryologist" value="<?php echo HtmlEncode($ivf_embryology_chart->ETEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->ETDate->Visible) { // ETDate ?>
		<td data-name="ETDate">
<span id="el$rowindex$_ivf_embryology_chart_ETDate" class="form-group ivf_embryology_chart_ETDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETDate->EditValue ?>"<?php echo $ivf_embryology_chart->ETDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->ETDate->ReadOnly && !$ivf_embryology_chart->ETDate->Disabled && !isset($ivf_embryology_chart->ETDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->ETDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartlist", "x<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_ETDate" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_ETDate" value="<?php echo HtmlEncode($ivf_embryology_chart->ETDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_embryology_chart->Day1End->Visible) { // Day1End ?>
		<td data-name="Day1End">
<span id="el$rowindex$_ivf_embryology_chart_Day1End" class="form-group ivf_embryology_chart_Day1End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1End" data-value-separator="<?php echo $ivf_embryology_chart->Day1End->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End" name="x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End"<?php echo $ivf_embryology_chart->Day1End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day1End->selectOptionListHtml("x<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_embryology_chart" data-field="x_Day1End" name="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End" id="o<?php echo $ivf_embryology_chart_list->RowIndex ?>_Day1End" value="<?php echo HtmlEncode($ivf_embryology_chart->Day1End->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_embryology_chart_list->ListOptions->render("body", "right", $ivf_embryology_chart_list->RowIndex);
?>
<script>
fivf_embryology_chartlist.updateLists(<?php echo $ivf_embryology_chart_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($ivf_embryology_chart->isAdd() || $ivf_embryology_chart->isCopy()) { ?>
<input type="hidden" name="<?php echo $ivf_embryology_chart_list->FormKeyCountName ?>" id="<?php echo $ivf_embryology_chart_list->FormKeyCountName ?>" value="<?php echo $ivf_embryology_chart_list->KeyCount ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $ivf_embryology_chart_list->FormKeyCountName ?>" id="<?php echo $ivf_embryology_chart_list->FormKeyCountName ?>" value="<?php echo $ivf_embryology_chart_list->KeyCount ?>">
<?php echo $ivf_embryology_chart_list->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_embryology_chart->isEdit()) { ?>
<input type="hidden" name="<?php echo $ivf_embryology_chart_list->FormKeyCountName ?>" id="<?php echo $ivf_embryology_chart_list->FormKeyCountName ?>" value="<?php echo $ivf_embryology_chart_list->KeyCount ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $ivf_embryology_chart_list->FormKeyCountName ?>" id="<?php echo $ivf_embryology_chart_list->FormKeyCountName ?>" value="<?php echo $ivf_embryology_chart_list->KeyCount ?>">
<?php echo $ivf_embryology_chart_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$ivf_embryology_chart->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_embryology_chart_list->Recordset)
	$ivf_embryology_chart_list->Recordset->Close();
?>
<?php if (!$ivf_embryology_chart->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_embryology_chart->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_embryology_chart_list->Pager)) $ivf_embryology_chart_list->Pager = new NumericPager($ivf_embryology_chart_list->StartRec, $ivf_embryology_chart_list->DisplayRecs, $ivf_embryology_chart_list->TotalRecs, $ivf_embryology_chart_list->RecRange, $ivf_embryology_chart_list->AutoHidePager) ?>
<?php if ($ivf_embryology_chart_list->Pager->RecordCount > 0 && $ivf_embryology_chart_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_embryology_chart_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_embryology_chart_list->pageUrl() ?>start=<?php echo $ivf_embryology_chart_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_embryology_chart_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_embryology_chart_list->pageUrl() ?>start=<?php echo $ivf_embryology_chart_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_embryology_chart_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_embryology_chart_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_embryology_chart_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_embryology_chart_list->pageUrl() ?>start=<?php echo $ivf_embryology_chart_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_embryology_chart_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_embryology_chart_list->pageUrl() ?>start=<?php echo $ivf_embryology_chart_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_embryology_chart_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_embryology_chart_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_embryology_chart_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_embryology_chart_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_embryology_chart_list->TotalRecs > 0 && (!$ivf_embryology_chart_list->AutoHidePageSizeSelector || $ivf_embryology_chart_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_embryology_chart">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_embryology_chart_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_embryology_chart_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_embryology_chart_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_embryology_chart_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_embryology_chart_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_embryology_chart_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="2000"<?php if ($ivf_embryology_chart_list->DisplayRecs == 2000) { ?> selected<?php } ?>>2000</option>
<option value="ALL"<?php if ($ivf_embryology_chart->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_embryology_chart_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_embryology_chart_list->TotalRecs == 0 && !$ivf_embryology_chart->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_embryology_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_embryology_chart_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_embryology_chart->isExport()) { ?>
<script>

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
</script>
<?php if (!$ivf_embryology_chart->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_embryology_chart", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_embryology_chart_list->terminate();
?>
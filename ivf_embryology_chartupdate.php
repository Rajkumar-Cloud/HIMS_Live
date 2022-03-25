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
$ivf_embryology_chart_update = new ivf_embryology_chart_update();

// Run the page
$ivf_embryology_chart_update->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_embryology_chart_update->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "update";
var fivf_embryology_chartupdate = currentForm = new ew.Form("fivf_embryology_chartupdate", "update");

// Validate form
fivf_embryology_chartupdate.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	if (!ew.updateSelected(fobj)) {
		ew.alert(ew.language.phrase("NoFieldSelected"));
		return false;
	}
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($ivf_embryology_chart_update->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			uelm = this.getElements("u" + infix + "_RIDNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->RIDNo->caption(), $ivf_embryology_chart->RIDNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			uelm = this.getElements("u" + infix + "_RIDNo");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_update->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			uelm = this.getElements("u" + infix + "_Name");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Name->caption(), $ivf_embryology_chart->Name->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->ARTCycle->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCycle");
			uelm = this.getElements("u" + infix + "_ARTCycle");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ARTCycle->caption(), $ivf_embryology_chart->ARTCycle->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->SpermOrigin->Required) { ?>
			elm = this.getElements("x" + infix + "_SpermOrigin");
			uelm = this.getElements("u" + infix + "_SpermOrigin");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->SpermOrigin->caption(), $ivf_embryology_chart->SpermOrigin->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->InseminatinTechnique->Required) { ?>
			elm = this.getElements("x" + infix + "_InseminatinTechnique");
			uelm = this.getElements("u" + infix + "_InseminatinTechnique");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->InseminatinTechnique->caption(), $ivf_embryology_chart->InseminatinTechnique->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->IndicationForART->Required) { ?>
			elm = this.getElements("x" + infix + "_IndicationForART");
			uelm = this.getElements("u" + infix + "_IndicationForART");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->IndicationForART->caption(), $ivf_embryology_chart->IndicationForART->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day0sino->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0sino");
			uelm = this.getElements("u" + infix + "_Day0sino");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0sino->caption(), $ivf_embryology_chart->Day0sino->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day0OocyteStage->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0OocyteStage");
			uelm = this.getElements("u" + infix + "_Day0OocyteStage");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0OocyteStage->caption(), $ivf_embryology_chart->Day0OocyteStage->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day0PolarBodyPosition->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0PolarBodyPosition");
			uelm = this.getElements("u" + infix + "_Day0PolarBodyPosition");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0PolarBodyPosition->caption(), $ivf_embryology_chart->Day0PolarBodyPosition->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day0Breakage->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0Breakage");
			uelm = this.getElements("u" + infix + "_Day0Breakage");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0Breakage->caption(), $ivf_embryology_chart->Day0Breakage->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day0Attempts->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0Attempts");
			uelm = this.getElements("u" + infix + "_Day0Attempts");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0Attempts->caption(), $ivf_embryology_chart->Day0Attempts->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day0SPZMorpho->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0SPZMorpho");
			uelm = this.getElements("u" + infix + "_Day0SPZMorpho");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0SPZMorpho->caption(), $ivf_embryology_chart->Day0SPZMorpho->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day0SPZLocation->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0SPZLocation");
			uelm = this.getElements("u" + infix + "_Day0SPZLocation");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0SPZLocation->caption(), $ivf_embryology_chart->Day0SPZLocation->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day0SpOrgin->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0SpOrgin");
			uelm = this.getElements("u" + infix + "_Day0SpOrgin");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day0SpOrgin->caption(), $ivf_embryology_chart->Day0SpOrgin->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day5Cryoptop->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5Cryoptop");
			uelm = this.getElements("u" + infix + "_Day5Cryoptop");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5Cryoptop->caption(), $ivf_embryology_chart->Day5Cryoptop->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day1Sperm->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1Sperm");
			uelm = this.getElements("u" + infix + "_Day1Sperm");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1Sperm->caption(), $ivf_embryology_chart->Day1Sperm->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day1PN->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1PN");
			uelm = this.getElements("u" + infix + "_Day1PN");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1PN->caption(), $ivf_embryology_chart->Day1PN->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day1PB->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1PB");
			uelm = this.getElements("u" + infix + "_Day1PB");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1PB->caption(), $ivf_embryology_chart->Day1PB->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day1Pronucleus->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1Pronucleus");
			uelm = this.getElements("u" + infix + "_Day1Pronucleus");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1Pronucleus->caption(), $ivf_embryology_chart->Day1Pronucleus->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day1Nucleolus->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1Nucleolus");
			uelm = this.getElements("u" + infix + "_Day1Nucleolus");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1Nucleolus->caption(), $ivf_embryology_chart->Day1Nucleolus->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day1Halo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1Halo");
			uelm = this.getElements("u" + infix + "_Day1Halo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day1Halo->caption(), $ivf_embryology_chart->Day1Halo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day2CellNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2CellNo");
			uelm = this.getElements("u" + infix + "_Day2CellNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2CellNo->caption(), $ivf_embryology_chart->Day2CellNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day2Frag->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2Frag");
			uelm = this.getElements("u" + infix + "_Day2Frag");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2Frag->caption(), $ivf_embryology_chart->Day2Frag->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day2Symmetry->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2Symmetry");
			uelm = this.getElements("u" + infix + "_Day2Symmetry");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2Symmetry->caption(), $ivf_embryology_chart->Day2Symmetry->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day2Cryoptop->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2Cryoptop");
			uelm = this.getElements("u" + infix + "_Day2Cryoptop");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2Cryoptop->caption(), $ivf_embryology_chart->Day2Cryoptop->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day2Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2Grade");
			uelm = this.getElements("u" + infix + "_Day2Grade");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day2Grade->caption(), $ivf_embryology_chart->Day2Grade->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day3Sino->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Sino");
			uelm = this.getElements("u" + infix + "_Day3Sino");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Sino->caption(), $ivf_embryology_chart->Day3Sino->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day3CellNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3CellNo");
			uelm = this.getElements("u" + infix + "_Day3CellNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3CellNo->caption(), $ivf_embryology_chart->Day3CellNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day3Frag->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Frag");
			uelm = this.getElements("u" + infix + "_Day3Frag");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Frag->caption(), $ivf_embryology_chart->Day3Frag->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day3Symmetry->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Symmetry");
			uelm = this.getElements("u" + infix + "_Day3Symmetry");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Symmetry->caption(), $ivf_embryology_chart->Day3Symmetry->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day3Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Grade");
			uelm = this.getElements("u" + infix + "_Day3Grade");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Grade->caption(), $ivf_embryology_chart->Day3Grade->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day3Vacoules->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Vacoules");
			uelm = this.getElements("u" + infix + "_Day3Vacoules");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Vacoules->caption(), $ivf_embryology_chart->Day3Vacoules->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day3ZP->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3ZP");
			uelm = this.getElements("u" + infix + "_Day3ZP");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3ZP->caption(), $ivf_embryology_chart->Day3ZP->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day3Cryoptop->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3Cryoptop");
			uelm = this.getElements("u" + infix + "_Day3Cryoptop");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3Cryoptop->caption(), $ivf_embryology_chart->Day3Cryoptop->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day3End->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3End");
			uelm = this.getElements("u" + infix + "_Day3End");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day3End->caption(), $ivf_embryology_chart->Day3End->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day4SiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4SiNo");
			uelm = this.getElements("u" + infix + "_Day4SiNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4SiNo->caption(), $ivf_embryology_chart->Day4SiNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day4CellNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4CellNo");
			uelm = this.getElements("u" + infix + "_Day4CellNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4CellNo->caption(), $ivf_embryology_chart->Day4CellNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day4Frag->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4Frag");
			uelm = this.getElements("u" + infix + "_Day4Frag");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4Frag->caption(), $ivf_embryology_chart->Day4Frag->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day4Symmetry->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4Symmetry");
			uelm = this.getElements("u" + infix + "_Day4Symmetry");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4Symmetry->caption(), $ivf_embryology_chart->Day4Symmetry->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day4Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4Grade");
			uelm = this.getElements("u" + infix + "_Day4Grade");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4Grade->caption(), $ivf_embryology_chart->Day4Grade->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day4Cryoptop->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4Cryoptop");
			uelm = this.getElements("u" + infix + "_Day4Cryoptop");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day4Cryoptop->caption(), $ivf_embryology_chart->Day4Cryoptop->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day5CellNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5CellNo");
			uelm = this.getElements("u" + infix + "_Day5CellNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5CellNo->caption(), $ivf_embryology_chart->Day5CellNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day5ICM->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5ICM");
			uelm = this.getElements("u" + infix + "_Day5ICM");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5ICM->caption(), $ivf_embryology_chart->Day5ICM->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day5TE->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5TE");
			uelm = this.getElements("u" + infix + "_Day5TE");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5TE->caption(), $ivf_embryology_chart->Day5TE->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day5Observation->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5Observation");
			uelm = this.getElements("u" + infix + "_Day5Observation");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5Observation->caption(), $ivf_embryology_chart->Day5Observation->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day5Collapsed->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5Collapsed");
			uelm = this.getElements("u" + infix + "_Day5Collapsed");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5Collapsed->caption(), $ivf_embryology_chart->Day5Collapsed->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day5Vacoulles->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5Vacoulles");
			uelm = this.getElements("u" + infix + "_Day5Vacoulles");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5Vacoulles->caption(), $ivf_embryology_chart->Day5Vacoulles->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day5Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5Grade");
			uelm = this.getElements("u" + infix + "_Day5Grade");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day5Grade->caption(), $ivf_embryology_chart->Day5Grade->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day6CellNo->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6CellNo");
			uelm = this.getElements("u" + infix + "_Day6CellNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6CellNo->caption(), $ivf_embryology_chart->Day6CellNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day6ICM->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6ICM");
			uelm = this.getElements("u" + infix + "_Day6ICM");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6ICM->caption(), $ivf_embryology_chart->Day6ICM->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day6TE->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6TE");
			uelm = this.getElements("u" + infix + "_Day6TE");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6TE->caption(), $ivf_embryology_chart->Day6TE->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day6Observation->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6Observation");
			uelm = this.getElements("u" + infix + "_Day6Observation");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6Observation->caption(), $ivf_embryology_chart->Day6Observation->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day6Collapsed->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6Collapsed");
			uelm = this.getElements("u" + infix + "_Day6Collapsed");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6Collapsed->caption(), $ivf_embryology_chart->Day6Collapsed->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day6Vacoulles->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6Vacoulles");
			uelm = this.getElements("u" + infix + "_Day6Vacoulles");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6Vacoulles->caption(), $ivf_embryology_chart->Day6Vacoulles->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day6Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6Grade");
			uelm = this.getElements("u" + infix + "_Day6Grade");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6Grade->caption(), $ivf_embryology_chart->Day6Grade->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Day6Cryoptop->Required) { ?>
			elm = this.getElements("x" + infix + "_Day6Cryoptop");
			uelm = this.getElements("u" + infix + "_Day6Cryoptop");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Day6Cryoptop->caption(), $ivf_embryology_chart->Day6Cryoptop->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->EndingDay->Required) { ?>
			elm = this.getElements("x" + infix + "_EndingDay");
			uelm = this.getElements("u" + infix + "_EndingDay");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->EndingDay->caption(), $ivf_embryology_chart->EndingDay->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->EndingCellStage->Required) { ?>
			elm = this.getElements("x" + infix + "_EndingCellStage");
			uelm = this.getElements("u" + infix + "_EndingCellStage");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->EndingCellStage->caption(), $ivf_embryology_chart->EndingCellStage->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->EndingGrade->Required) { ?>
			elm = this.getElements("x" + infix + "_EndingGrade");
			uelm = this.getElements("u" + infix + "_EndingGrade");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->EndingGrade->caption(), $ivf_embryology_chart->EndingGrade->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->EndingState->Required) { ?>
			elm = this.getElements("x" + infix + "_EndingState");
			uelm = this.getElements("u" + infix + "_EndingState");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->EndingState->caption(), $ivf_embryology_chart->EndingState->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			uelm = this.getElements("u" + infix + "_TidNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->TidNo->caption(), $ivf_embryology_chart->TidNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			uelm = this.getElements("u" + infix + "_TidNo");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->TidNo->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_update->DidNO->Required) { ?>
			elm = this.getElements("x" + infix + "_DidNO");
			uelm = this.getElements("u" + infix + "_DidNO");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->DidNO->caption(), $ivf_embryology_chart->DidNO->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->ICSiIVFDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSiIVFDateTime");
			uelm = this.getElements("u" + infix + "_ICSiIVFDateTime");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ICSiIVFDateTime->caption(), $ivf_embryology_chart->ICSiIVFDateTime->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_ICSiIVFDateTime");
			uelm = this.getElements("u" + infix + "_ICSiIVFDateTime");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->ICSiIVFDateTime->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_update->PrimaryEmbrologist->Required) { ?>
			elm = this.getElements("x" + infix + "_PrimaryEmbrologist");
			uelm = this.getElements("u" + infix + "_PrimaryEmbrologist");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->PrimaryEmbrologist->caption(), $ivf_embryology_chart->PrimaryEmbrologist->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->SecondaryEmbrologist->Required) { ?>
			elm = this.getElements("x" + infix + "_SecondaryEmbrologist");
			uelm = this.getElements("u" + infix + "_SecondaryEmbrologist");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->SecondaryEmbrologist->caption(), $ivf_embryology_chart->SecondaryEmbrologist->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Incubator->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator");
			uelm = this.getElements("u" + infix + "_Incubator");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Incubator->caption(), $ivf_embryology_chart->Incubator->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->location->Required) { ?>
			elm = this.getElements("x" + infix + "_location");
			uelm = this.getElements("u" + infix + "_location");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->location->caption(), $ivf_embryology_chart->location->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->OocyteNo->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteNo");
			uelm = this.getElements("u" + infix + "_OocyteNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->OocyteNo->caption(), $ivf_embryology_chart->OocyteNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			uelm = this.getElements("u" + infix + "_Stage");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Stage->caption(), $ivf_embryology_chart->Stage->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			uelm = this.getElements("u" + infix + "_Remarks");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->Remarks->caption(), $ivf_embryology_chart->Remarks->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitrificationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			uelm = this.getElements("u" + infix + "_vitrificationDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitrificationDate->caption(), $ivf_embryology_chart->vitrificationDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			uelm = this.getElements("u" + infix + "_vitrificationDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->vitrificationDate->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_update->vitriPrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriPrimaryEmbryologist");
			uelm = this.getElements("u" + infix + "_vitriPrimaryEmbryologist");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriPrimaryEmbryologist->caption(), $ivf_embryology_chart->vitriPrimaryEmbryologist->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriSecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriSecondaryEmbryologist");
			uelm = this.getElements("u" + infix + "_vitriSecondaryEmbryologist");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriSecondaryEmbryologist->caption(), $ivf_embryology_chart->vitriSecondaryEmbryologist->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriEmbryoNo->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriEmbryoNo");
			uelm = this.getElements("u" + infix + "_vitriEmbryoNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriEmbryoNo->caption(), $ivf_embryology_chart->vitriEmbryoNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriFertilisationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriFertilisationDate");
			uelm = this.getElements("u" + infix + "_vitriFertilisationDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriFertilisationDate->caption(), $ivf_embryology_chart->vitriFertilisationDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_vitriFertilisationDate");
			uelm = this.getElements("u" + infix + "_vitriFertilisationDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->vitriFertilisationDate->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_update->vitriDay->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriDay");
			uelm = this.getElements("u" + infix + "_vitriDay");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriDay->caption(), $ivf_embryology_chart->vitriDay->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriGrade->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriGrade");
			uelm = this.getElements("u" + infix + "_vitriGrade");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriGrade->caption(), $ivf_embryology_chart->vitriGrade->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriIncubator->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriIncubator");
			uelm = this.getElements("u" + infix + "_vitriIncubator");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriIncubator->caption(), $ivf_embryology_chart->vitriIncubator->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriTank->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriTank");
			uelm = this.getElements("u" + infix + "_vitriTank");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriTank->caption(), $ivf_embryology_chart->vitriTank->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriCanister->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriCanister");
			uelm = this.getElements("u" + infix + "_vitriCanister");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriCanister->caption(), $ivf_embryology_chart->vitriCanister->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriGobiet->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriGobiet");
			uelm = this.getElements("u" + infix + "_vitriGobiet");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriGobiet->caption(), $ivf_embryology_chart->vitriGobiet->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriCryolockNo->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriCryolockNo");
			uelm = this.getElements("u" + infix + "_vitriCryolockNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriCryolockNo->caption(), $ivf_embryology_chart->vitriCryolockNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriCryolockColour->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriCryolockColour");
			uelm = this.getElements("u" + infix + "_vitriCryolockColour");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriCryolockColour->caption(), $ivf_embryology_chart->vitriCryolockColour->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->vitriStage->Required) { ?>
			elm = this.getElements("x" + infix + "_vitriStage");
			uelm = this.getElements("u" + infix + "_vitriStage");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->vitriStage->caption(), $ivf_embryology_chart->vitriStage->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->thawDate->Required) { ?>
			elm = this.getElements("x" + infix + "_thawDate");
			uelm = this.getElements("u" + infix + "_thawDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawDate->caption(), $ivf_embryology_chart->thawDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_thawDate");
			uelm = this.getElements("u" + infix + "_thawDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart->thawDate->errorMessage()) ?>");
		<?php if ($ivf_embryology_chart_update->thawPrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_thawPrimaryEmbryologist");
			uelm = this.getElements("u" + infix + "_thawPrimaryEmbryologist");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawPrimaryEmbryologist->caption(), $ivf_embryology_chart->thawPrimaryEmbryologist->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->thawSecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_thawSecondaryEmbryologist");
			uelm = this.getElements("u" + infix + "_thawSecondaryEmbryologist");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawSecondaryEmbryologist->caption(), $ivf_embryology_chart->thawSecondaryEmbryologist->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->thawET->Required) { ?>
			elm = this.getElements("x" + infix + "_thawET");
			uelm = this.getElements("u" + infix + "_thawET");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawET->caption(), $ivf_embryology_chart->thawET->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->thawReFrozen->Required) { ?>
			elm = this.getElements("x" + infix + "_thawReFrozen");
			uelm = this.getElements("u" + infix + "_thawReFrozen");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawReFrozen->caption(), $ivf_embryology_chart->thawReFrozen->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->thawAbserve->Required) { ?>
			elm = this.getElements("x" + infix + "_thawAbserve");
			uelm = this.getElements("u" + infix + "_thawAbserve");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawAbserve->caption(), $ivf_embryology_chart->thawAbserve->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->thawDiscard->Required) { ?>
			elm = this.getElements("x" + infix + "_thawDiscard");
			uelm = this.getElements("u" + infix + "_thawDiscard");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->thawDiscard->caption(), $ivf_embryology_chart->thawDiscard->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->ETCatheter->Required) { ?>
			elm = this.getElements("x" + infix + "_ETCatheter");
			uelm = this.getElements("u" + infix + "_ETCatheter");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETCatheter->caption(), $ivf_embryology_chart->ETCatheter->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->ETDifficulty->Required) { ?>
			elm = this.getElements("x" + infix + "_ETDifficulty");
			uelm = this.getElements("u" + infix + "_ETDifficulty");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETDifficulty->caption(), $ivf_embryology_chart->ETDifficulty->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->ETEasy->Required) { ?>
			elm = this.getElements("x" + infix + "_ETEasy[]");
			uelm = this.getElements("u" + infix + "_ETEasy");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETEasy->caption(), $ivf_embryology_chart->ETEasy->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->ETComments->Required) { ?>
			elm = this.getElements("x" + infix + "_ETComments");
			uelm = this.getElements("u" + infix + "_ETComments");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETComments->caption(), $ivf_embryology_chart->ETComments->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->ETDoctor->Required) { ?>
			elm = this.getElements("x" + infix + "_ETDoctor");
			uelm = this.getElements("u" + infix + "_ETDoctor");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETDoctor->caption(), $ivf_embryology_chart->ETDoctor->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($ivf_embryology_chart_update->ETEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_ETEmbryologist");
			uelm = this.getElements("u" + infix + "_ETEmbryologist");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart->ETEmbryologist->caption(), $ivf_embryology_chart->ETEmbryologist->RequiredErrorMessage)) ?>");
			}
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fivf_embryology_chartupdate.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_embryology_chartupdate.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_embryology_chartupdate.lists["x_Day5Cryoptop"] = <?php echo $ivf_embryology_chart_update->Day5Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day5Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day5Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Day3Grade"] = <?php echo $ivf_embryology_chart_update->Day3Grade->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day3Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day3Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Day3End"] = <?php echo $ivf_embryology_chart_update->Day3End->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day3End"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day3End->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Day4Cryoptop"] = <?php echo $ivf_embryology_chart_update->Day4Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day4Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day4Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Day5ICM"] = <?php echo $ivf_embryology_chart_update->Day5ICM->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day5ICM"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day5ICM->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Day5TE"] = <?php echo $ivf_embryology_chart_update->Day5TE->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day5TE"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day5TE->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Day5Grade"] = <?php echo $ivf_embryology_chart_update->Day5Grade->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day5Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day5Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Day6ICM"] = <?php echo $ivf_embryology_chart_update->Day6ICM->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day6ICM"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day6ICM->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Day6TE"] = <?php echo $ivf_embryology_chart_update->Day6TE->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day6TE"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day6TE->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Day6Collapsed"] = <?php echo $ivf_embryology_chart_update->Day6Collapsed->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day6Collapsed"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day6Collapsed->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Day6Grade"] = <?php echo $ivf_embryology_chart_update->Day6Grade->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Day6Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Day6Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_EndingDay"] = <?php echo $ivf_embryology_chart_update->EndingDay->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_EndingDay"].options = <?php echo JsonEncode($ivf_embryology_chart_update->EndingDay->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_EndingCellStage"] = <?php echo $ivf_embryology_chart_update->EndingCellStage->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_EndingCellStage"].options = <?php echo JsonEncode($ivf_embryology_chart_update->EndingCellStage->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_EndingGrade"] = <?php echo $ivf_embryology_chart_update->EndingGrade->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_EndingGrade"].options = <?php echo JsonEncode($ivf_embryology_chart_update->EndingGrade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_EndingState"] = <?php echo $ivf_embryology_chart_update->EndingState->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_EndingState"].options = <?php echo JsonEncode($ivf_embryology_chart_update->EndingState->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_Stage"] = <?php echo $ivf_embryology_chart_update->Stage->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_Stage"].options = <?php echo JsonEncode($ivf_embryology_chart_update->Stage->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_vitriDay"] = <?php echo $ivf_embryology_chart_update->vitriDay->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_vitriDay"].options = <?php echo JsonEncode($ivf_embryology_chart_update->vitriDay->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_vitriGrade"] = <?php echo $ivf_embryology_chart_update->vitriGrade->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_vitriGrade"].options = <?php echo JsonEncode($ivf_embryology_chart_update->vitriGrade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_thawET"] = <?php echo $ivf_embryology_chart_update->thawET->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_thawET"].options = <?php echo JsonEncode($ivf_embryology_chart_update->thawET->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_ETDifficulty"] = <?php echo $ivf_embryology_chart_update->ETDifficulty->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_ETDifficulty"].options = <?php echo JsonEncode($ivf_embryology_chart_update->ETDifficulty->options(FALSE, TRUE)) ?>;
fivf_embryology_chartupdate.lists["x_ETEasy[]"] = <?php echo $ivf_embryology_chart_update->ETEasy->Lookup->toClientList() ?>;
fivf_embryology_chartupdate.lists["x_ETEasy[]"].options = <?php echo JsonEncode($ivf_embryology_chart_update->ETEasy->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_embryology_chart_update->showPageHeader(); ?>
<?php
$ivf_embryology_chart_update->showMessage();
?>
<form name="fivf_embryology_chartupdate" id="fivf_embryology_chartupdate" class="<?php echo $ivf_embryology_chart_update->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_embryology_chart_update->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_embryology_chart_update->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_embryology_chart_update->IsModal ?>">
<?php foreach ($ivf_embryology_chart_update->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_ivf_embryology_chartupdate" class="ew-update-div"><!-- page -->
	<div class="form-check">
		<input type="checkbox" class="form-check-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="form-check-label" for="u"><?php echo $Language->Phrase("UpdateSelectAll") ?></label>
	</div>
<?php if ($ivf_embryology_chart->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label for="x_RIDNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_RIDNo" id="u_RIDNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->RIDNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_RIDNo"><?php echo $ivf_embryology_chart->RIDNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->RIDNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_RIDNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->RIDNo->EditValue ?>"<?php echo $ivf_embryology_chart->RIDNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label for="x_Name" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Name" id="u_Name" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Name->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Name"><?php echo $ivf_embryology_chart->Name->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Name->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Name">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Name" name="x_Name" id="x_Name" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Name->EditValue ?>"<?php echo $ivf_embryology_chart->Name->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->ARTCycle->Visible) { // ARTCycle ?>
	<div id="r_ARTCycle" class="form-group row">
		<label for="x_ARTCycle" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ARTCycle" id="u_ARTCycle" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->ARTCycle->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ARTCycle"><?php echo $ivf_embryology_chart->ARTCycle->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ARTCycle">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x_ARTCycle" id="x_ARTCycle" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ARTCycle->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ARTCycle->EditValue ?>"<?php echo $ivf_embryology_chart->ARTCycle->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->ARTCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->SpermOrigin->Visible) { // SpermOrigin ?>
	<div id="r_SpermOrigin" class="form-group row">
		<label for="x_SpermOrigin" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_SpermOrigin" id="u_SpermOrigin" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->SpermOrigin->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_SpermOrigin"><?php echo $ivf_embryology_chart->SpermOrigin->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->SpermOrigin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SpermOrigin">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x_SpermOrigin" id="x_SpermOrigin" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->SpermOrigin->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->SpermOrigin->EditValue ?>"<?php echo $ivf_embryology_chart->SpermOrigin->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->SpermOrigin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<div id="r_InseminatinTechnique" class="form-group row">
		<label for="x_InseminatinTechnique" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_InseminatinTechnique" id="u_InseminatinTechnique" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->InseminatinTechnique->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_InseminatinTechnique"><?php echo $ivf_embryology_chart->InseminatinTechnique->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_InseminatinTechnique">
<input type="text" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x_InseminatinTechnique" id="x_InseminatinTechnique" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->InseminatinTechnique->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->InseminatinTechnique->EditValue ?>"<?php echo $ivf_embryology_chart->InseminatinTechnique->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->InseminatinTechnique->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->IndicationForART->Visible) { // IndicationForART ?>
	<div id="r_IndicationForART" class="form-group row">
		<label for="x_IndicationForART" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_IndicationForART" id="u_IndicationForART" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->IndicationForART->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_IndicationForART"><?php echo $ivf_embryology_chart->IndicationForART->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->IndicationForART->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_IndicationForART">
<input type="text" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x_IndicationForART" id="x_IndicationForART" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->IndicationForART->EditValue ?>"<?php echo $ivf_embryology_chart->IndicationForART->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->IndicationForART->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0sino->Visible) { // Day0sino ?>
	<div id="r_Day0sino" class="form-group row">
		<label for="x_Day0sino" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day0sino" id="u_Day0sino" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day0sino->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day0sino"><?php echo $ivf_embryology_chart->Day0sino->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day0sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x_Day0sino" id="x_Day0sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0sino->EditValue ?>"<?php echo $ivf_embryology_chart->Day0sino->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day0sino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<div id="r_Day0OocyteStage" class="form-group row">
		<label for="x_Day0OocyteStage" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day0OocyteStage" id="u_Day0OocyteStage" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day0OocyteStage->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day0OocyteStage"><?php echo $ivf_embryology_chart->Day0OocyteStage->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day0OocyteStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0OocyteStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x_Day0OocyteStage" id="x_Day0OocyteStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0OocyteStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0OocyteStage->EditValue ?>"<?php echo $ivf_embryology_chart->Day0OocyteStage->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day0OocyteStage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
	<div id="r_Day0PolarBodyPosition" class="form-group row">
		<label for="x_Day0PolarBodyPosition" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day0PolarBodyPosition" id="u_Day0PolarBodyPosition" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day0PolarBodyPosition->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day0PolarBodyPosition"><?php echo $ivf_embryology_chart->Day0PolarBodyPosition->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0PolarBodyPosition">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" name="x_Day0PolarBodyPosition" id="x_Day0PolarBodyPosition" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0PolarBodyPosition->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->EditValue ?>"<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Breakage->Visible) { // Day0Breakage ?>
	<div id="r_Day0Breakage" class="form-group row">
		<label for="x_Day0Breakage" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day0Breakage" id="u_Day0Breakage" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day0Breakage->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day0Breakage"><?php echo $ivf_embryology_chart->Day0Breakage->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day0Breakage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Breakage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" name="x_Day0Breakage" id="x_Day0Breakage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0Breakage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0Breakage->EditValue ?>"<?php echo $ivf_embryology_chart->Day0Breakage->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day0Breakage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Attempts->Visible) { // Day0Attempts ?>
	<div id="r_Day0Attempts" class="form-group row">
		<label for="x_Day0Attempts" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day0Attempts" id="u_Day0Attempts" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day0Attempts->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day0Attempts"><?php echo $ivf_embryology_chart->Day0Attempts->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day0Attempts->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Attempts">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" name="x_Day0Attempts" id="x_Day0Attempts" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0Attempts->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0Attempts->EditValue ?>"<?php echo $ivf_embryology_chart->Day0Attempts->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day0Attempts->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
	<div id="r_Day0SPZMorpho" class="form-group row">
		<label for="x_Day0SPZMorpho" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day0SPZMorpho" id="u_Day0SPZMorpho" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day0SPZMorpho->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day0SPZMorpho"><?php echo $ivf_embryology_chart->Day0SPZMorpho->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day0SPZMorpho->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZMorpho">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" name="x_Day0SPZMorpho" id="x_Day0SPZMorpho" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0SPZMorpho->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0SPZMorpho->EditValue ?>"<?php echo $ivf_embryology_chart->Day0SPZMorpho->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day0SPZMorpho->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
	<div id="r_Day0SPZLocation" class="form-group row">
		<label for="x_Day0SPZLocation" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day0SPZLocation" id="u_Day0SPZLocation" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day0SPZLocation->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day0SPZLocation"><?php echo $ivf_embryology_chart->Day0SPZLocation->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day0SPZLocation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZLocation">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" name="x_Day0SPZLocation" id="x_Day0SPZLocation" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0SPZLocation->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0SPZLocation->EditValue ?>"<?php echo $ivf_embryology_chart->Day0SPZLocation->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day0SPZLocation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
	<div id="r_Day0SpOrgin" class="form-group row">
		<label for="x_Day0SpOrgin" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day0SpOrgin" id="u_Day0SpOrgin" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day0SpOrgin->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day0SpOrgin"><?php echo $ivf_embryology_chart->Day0SpOrgin->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day0SpOrgin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SpOrgin">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" name="x_Day0SpOrgin" id="x_Day0SpOrgin" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day0SpOrgin->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day0SpOrgin->EditValue ?>"<?php echo $ivf_embryology_chart->Day0SpOrgin->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day0SpOrgin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
	<div id="r_Day5Cryoptop" class="form-group row">
		<label for="x_Day5Cryoptop" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day5Cryoptop" id="u_Day5Cryoptop" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day5Cryoptop->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day5Cryoptop"><?php echo $ivf_embryology_chart->Day5Cryoptop->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day5Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day5Cryoptop->displayValueSeparatorAttribute() ?>" id="x_Day5Cryoptop" name="x_Day5Cryoptop"<?php echo $ivf_embryology_chart->Day5Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Cryoptop->selectOptionListHtml("x_Day5Cryoptop") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day5Cryoptop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Sperm->Visible) { // Day1Sperm ?>
	<div id="r_Day1Sperm" class="form-group row">
		<label for="x_Day1Sperm" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day1Sperm" id="u_Day1Sperm" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day1Sperm->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day1Sperm"><?php echo $ivf_embryology_chart->Day1Sperm->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day1Sperm->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Sperm">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x_Day1Sperm" id="x_Day1Sperm" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day1Sperm->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day1Sperm->EditValue ?>"<?php echo $ivf_embryology_chart->Day1Sperm->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day1Sperm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PN->Visible) { // Day1PN ?>
	<div id="r_Day1PN" class="form-group row">
		<label for="x_Day1PN" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day1PN" id="u_Day1PN" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day1PN->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day1PN"><?php echo $ivf_embryology_chart->Day1PN->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day1PN->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PN">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1PN" name="x_Day1PN" id="x_Day1PN" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day1PN->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day1PN->EditValue ?>"<?php echo $ivf_embryology_chart->Day1PN->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day1PN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PB->Visible) { // Day1PB ?>
	<div id="r_Day1PB" class="form-group row">
		<label for="x_Day1PB" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day1PB" id="u_Day1PB" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day1PB->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day1PB"><?php echo $ivf_embryology_chart->Day1PB->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day1PB->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PB">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1PB" name="x_Day1PB" id="x_Day1PB" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day1PB->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day1PB->EditValue ?>"<?php echo $ivf_embryology_chart->Day1PB->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day1PB->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
	<div id="r_Day1Pronucleus" class="form-group row">
		<label for="x_Day1Pronucleus" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day1Pronucleus" id="u_Day1Pronucleus" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day1Pronucleus->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day1Pronucleus"><?php echo $ivf_embryology_chart->Day1Pronucleus->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day1Pronucleus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Pronucleus">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" name="x_Day1Pronucleus" id="x_Day1Pronucleus" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day1Pronucleus->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day1Pronucleus->EditValue ?>"<?php echo $ivf_embryology_chart->Day1Pronucleus->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day1Pronucleus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
	<div id="r_Day1Nucleolus" class="form-group row">
		<label for="x_Day1Nucleolus" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day1Nucleolus" id="u_Day1Nucleolus" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day1Nucleolus->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day1Nucleolus"><?php echo $ivf_embryology_chart->Day1Nucleolus->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day1Nucleolus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Nucleolus">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" name="x_Day1Nucleolus" id="x_Day1Nucleolus" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day1Nucleolus->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day1Nucleolus->EditValue ?>"<?php echo $ivf_embryology_chart->Day1Nucleolus->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day1Nucleolus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Halo->Visible) { // Day1Halo ?>
	<div id="r_Day1Halo" class="form-group row">
		<label for="x_Day1Halo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day1Halo" id="u_Day1Halo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day1Halo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day1Halo"><?php echo $ivf_embryology_chart->Day1Halo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day1Halo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Halo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1Halo" name="x_Day1Halo" id="x_Day1Halo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day1Halo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day1Halo->EditValue ?>"<?php echo $ivf_embryology_chart->Day1Halo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day1Halo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2CellNo->Visible) { // Day2CellNo ?>
	<div id="r_Day2CellNo" class="form-group row">
		<label for="x_Day2CellNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day2CellNo" id="u_Day2CellNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day2CellNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day2CellNo"><?php echo $ivf_embryology_chart->Day2CellNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day2CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x_Day2CellNo" id="x_Day2CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day2CellNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day2CellNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Frag->Visible) { // Day2Frag ?>
	<div id="r_Day2Frag" class="form-group row">
		<label for="x_Day2Frag" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day2Frag" id="u_Day2Frag" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day2Frag->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day2Frag"><?php echo $ivf_embryology_chart->Day2Frag->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day2Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x_Day2Frag" id="x_Day2Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Frag->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day2Frag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Symmetry->Visible) { // Day2Symmetry ?>
	<div id="r_Day2Symmetry" class="form-group row">
		<label for="x_Day2Symmetry" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day2Symmetry" id="u_Day2Symmetry" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day2Symmetry->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day2Symmetry"><?php echo $ivf_embryology_chart->Day2Symmetry->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day2Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x_Day2Symmetry" id="x_Day2Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Symmetry->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day2Symmetry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
	<div id="r_Day2Cryoptop" class="form-group row">
		<label for="x_Day2Cryoptop" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day2Cryoptop" id="u_Day2Cryoptop" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day2Cryoptop->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day2Cryoptop"><?php echo $ivf_embryology_chart->Day2Cryoptop->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day2Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x_Day2Cryoptop" id="x_Day2Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Cryoptop->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day2Cryoptop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Grade->Visible) { // Day2Grade ?>
	<div id="r_Day2Grade" class="form-group row">
		<label for="x_Day2Grade" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day2Grade" id="u_Day2Grade" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day2Grade->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day2Grade"><?php echo $ivf_embryology_chart->Day2Grade->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day2Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x_Day2Grade" id="x_Day2Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day2Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day2Grade->EditValue ?>"<?php echo $ivf_embryology_chart->Day2Grade->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day2Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Sino->Visible) { // Day3Sino ?>
	<div id="r_Day3Sino" class="form-group row">
		<label for="x_Day3Sino" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day3Sino" id="u_Day3Sino" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day3Sino->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day3Sino"><?php echo $ivf_embryology_chart->Day3Sino->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day3Sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x_Day3Sino" id="x_Day3Sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3Sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3Sino->EditValue ?>"<?php echo $ivf_embryology_chart->Day3Sino->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day3Sino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3CellNo->Visible) { // Day3CellNo ?>
	<div id="r_Day3CellNo" class="form-group row">
		<label for="x_Day3CellNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day3CellNo" id="u_Day3CellNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day3CellNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day3CellNo"><?php echo $ivf_embryology_chart->Day3CellNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day3CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x_Day3CellNo" id="x_Day3CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day3CellNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day3CellNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Frag->Visible) { // Day3Frag ?>
	<div id="r_Day3Frag" class="form-group row">
		<label for="x_Day3Frag" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day3Frag" id="u_Day3Frag" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day3Frag->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day3Frag"><?php echo $ivf_embryology_chart->Day3Frag->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day3Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3Frag" name="x_Day3Frag" id="x_Day3Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day3Frag->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day3Frag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Symmetry->Visible) { // Day3Symmetry ?>
	<div id="r_Day3Symmetry" class="form-group row">
		<label for="x_Day3Symmetry" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day3Symmetry" id="u_Day3Symmetry" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day3Symmetry->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day3Symmetry"><?php echo $ivf_embryology_chart->Day3Symmetry->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day3Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" name="x_Day3Symmetry" id="x_Day3Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day3Symmetry->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day3Symmetry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Grade->Visible) { // Day3Grade ?>
	<div id="r_Day3Grade" class="form-group row">
		<label for="x_Day3Grade" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day3Grade" id="u_Day3Grade" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day3Grade->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day3Grade"><?php echo $ivf_embryology_chart->Day3Grade->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day3Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day3Grade->displayValueSeparatorAttribute() ?>" id="x_Day3Grade" name="x_Day3Grade"<?php echo $ivf_embryology_chart->Day3Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3Grade->selectOptionListHtml("x_Day3Grade") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day3Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Vacoules->Visible) { // Day3Vacoules ?>
	<div id="r_Day3Vacoules" class="form-group row">
		<label for="x_Day3Vacoules" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day3Vacoules" id="u_Day3Vacoules" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day3Vacoules->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day3Vacoules"><?php echo $ivf_embryology_chart->Day3Vacoules->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day3Vacoules->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Vacoules">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" name="x_Day3Vacoules" id="x_Day3Vacoules" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3Vacoules->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3Vacoules->EditValue ?>"<?php echo $ivf_embryology_chart->Day3Vacoules->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day3Vacoules->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3ZP->Visible) { // Day3ZP ?>
	<div id="r_Day3ZP" class="form-group row">
		<label for="x_Day3ZP" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day3ZP" id="u_Day3ZP" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day3ZP->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day3ZP"><?php echo $ivf_embryology_chart->Day3ZP->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day3ZP->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3ZP">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3ZP" name="x_Day3ZP" id="x_Day3ZP" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3ZP->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3ZP->EditValue ?>"<?php echo $ivf_embryology_chart->Day3ZP->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day3ZP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
	<div id="r_Day3Cryoptop" class="form-group row">
		<label for="x_Day3Cryoptop" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day3Cryoptop" id="u_Day3Cryoptop" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day3Cryoptop->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day3Cryoptop"><?php echo $ivf_embryology_chart->Day3Cryoptop->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day3Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" name="x_Day3Cryoptop" id="x_Day3Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day3Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day3Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day3Cryoptop->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day3Cryoptop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3End->Visible) { // Day3End ?>
	<div id="r_Day3End" class="form-group row">
		<label for="x_Day3End" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day3End" id="u_Day3End" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day3End->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day3End"><?php echo $ivf_embryology_chart->Day3End->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day3End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3End" data-value-separator="<?php echo $ivf_embryology_chart->Day3End->displayValueSeparatorAttribute() ?>" id="x_Day3End" name="x_Day3End"<?php echo $ivf_embryology_chart->Day3End->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day3End->selectOptionListHtml("x_Day3End") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day3End->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4SiNo->Visible) { // Day4SiNo ?>
	<div id="r_Day4SiNo" class="form-group row">
		<label for="x_Day4SiNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day4SiNo" id="u_Day4SiNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day4SiNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day4SiNo"><?php echo $ivf_embryology_chart->Day4SiNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day4SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x_Day4SiNo" id="x_Day4SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4SiNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day4SiNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day4SiNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4CellNo->Visible) { // Day4CellNo ?>
	<div id="r_Day4CellNo" class="form-group row">
		<label for="x_Day4CellNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day4CellNo" id="u_Day4CellNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day4CellNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day4CellNo"><?php echo $ivf_embryology_chart->Day4CellNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day4CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x_Day4CellNo" id="x_Day4CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day4CellNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day4CellNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Frag->Visible) { // Day4Frag ?>
	<div id="r_Day4Frag" class="form-group row">
		<label for="x_Day4Frag" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day4Frag" id="u_Day4Frag" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day4Frag->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day4Frag"><?php echo $ivf_embryology_chart->Day4Frag->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day4Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x_Day4Frag" id="x_Day4Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Frag->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Frag->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day4Frag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Symmetry->Visible) { // Day4Symmetry ?>
	<div id="r_Day4Symmetry" class="form-group row">
		<label for="x_Day4Symmetry" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day4Symmetry" id="u_Day4Symmetry" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day4Symmetry->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day4Symmetry"><?php echo $ivf_embryology_chart->Day4Symmetry->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day4Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x_Day4Symmetry" id="x_Day4Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Symmetry->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day4Symmetry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Grade->Visible) { // Day4Grade ?>
	<div id="r_Day4Grade" class="form-group row">
		<label for="x_Day4Grade" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day4Grade" id="u_Day4Grade" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day4Grade->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day4Grade"><?php echo $ivf_embryology_chart->Day4Grade->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day4Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x_Day4Grade" id="x_Day4Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day4Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day4Grade->EditValue ?>"<?php echo $ivf_embryology_chart->Day4Grade->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day4Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
	<div id="r_Day4Cryoptop" class="form-group row">
		<label for="x_Day4Cryoptop" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day4Cryoptop" id="u_Day4Cryoptop" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day4Cryoptop->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day4Cryoptop"><?php echo $ivf_embryology_chart->Day4Cryoptop->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day4Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart->Day4Cryoptop->displayValueSeparatorAttribute() ?>" id="x_Day4Cryoptop" name="x_Day4Cryoptop"<?php echo $ivf_embryology_chart->Day4Cryoptop->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day4Cryoptop->selectOptionListHtml("x_Day4Cryoptop") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day4Cryoptop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5CellNo->Visible) { // Day5CellNo ?>
	<div id="r_Day5CellNo" class="form-group row">
		<label for="x_Day5CellNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day5CellNo" id="u_Day5CellNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day5CellNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day5CellNo"><?php echo $ivf_embryology_chart->Day5CellNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day5CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x_Day5CellNo" id="x_Day5CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day5CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day5CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day5CellNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day5CellNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5ICM->Visible) { // Day5ICM ?>
	<div id="r_Day5ICM" class="form-group row">
		<label for="x_Day5ICM" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day5ICM" id="u_Day5ICM" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day5ICM->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day5ICM"><?php echo $ivf_embryology_chart->Day5ICM->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day5ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-value-separator="<?php echo $ivf_embryology_chart->Day5ICM->displayValueSeparatorAttribute() ?>" id="x_Day5ICM" name="x_Day5ICM"<?php echo $ivf_embryology_chart->Day5ICM->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5ICM->selectOptionListHtml("x_Day5ICM") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day5ICM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5TE->Visible) { // Day5TE ?>
	<div id="r_Day5TE" class="form-group row">
		<label for="x_Day5TE" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day5TE" id="u_Day5TE" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day5TE->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day5TE"><?php echo $ivf_embryology_chart->Day5TE->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day5TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-value-separator="<?php echo $ivf_embryology_chart->Day5TE->displayValueSeparatorAttribute() ?>" id="x_Day5TE" name="x_Day5TE"<?php echo $ivf_embryology_chart->Day5TE->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5TE->selectOptionListHtml("x_Day5TE") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day5TE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Observation->Visible) { // Day5Observation ?>
	<div id="r_Day5Observation" class="form-group row">
		<label for="x_Day5Observation" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day5Observation" id="u_Day5Observation" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day5Observation->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day5Observation"><?php echo $ivf_embryology_chart->Day5Observation->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day5Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Observation">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day5Observation" name="x_Day5Observation" id="x_Day5Observation" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day5Observation->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day5Observation->EditValue ?>"<?php echo $ivf_embryology_chart->Day5Observation->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day5Observation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Collapsed->Visible) { // Day5Collapsed ?>
	<div id="r_Day5Collapsed" class="form-group row">
		<label for="x_Day5Collapsed" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day5Collapsed" id="u_Day5Collapsed" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day5Collapsed->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day5Collapsed"><?php echo $ivf_embryology_chart->Day5Collapsed->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day5Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Collapsed">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" name="x_Day5Collapsed" id="x_Day5Collapsed" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day5Collapsed->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day5Collapsed->EditValue ?>"<?php echo $ivf_embryology_chart->Day5Collapsed->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day5Collapsed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
	<div id="r_Day5Vacoulles" class="form-group row">
		<label for="x_Day5Vacoulles" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day5Vacoulles" id="u_Day5Vacoulles" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day5Vacoulles->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day5Vacoulles"><?php echo $ivf_embryology_chart->Day5Vacoulles->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day5Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Vacoulles">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" name="x_Day5Vacoulles" id="x_Day5Vacoulles" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day5Vacoulles->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day5Vacoulles->EditValue ?>"<?php echo $ivf_embryology_chart->Day5Vacoulles->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day5Vacoulles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Grade->Visible) { // Day5Grade ?>
	<div id="r_Day5Grade" class="form-group row">
		<label for="x_Day5Grade" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day5Grade" id="u_Day5Grade" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day5Grade->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day5Grade"><?php echo $ivf_embryology_chart->Day5Grade->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day5Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day5Grade->displayValueSeparatorAttribute() ?>" id="x_Day5Grade" name="x_Day5Grade"<?php echo $ivf_embryology_chart->Day5Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day5Grade->selectOptionListHtml("x_Day5Grade") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day5Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6CellNo->Visible) { // Day6CellNo ?>
	<div id="r_Day6CellNo" class="form-group row">
		<label for="x_Day6CellNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day6CellNo" id="u_Day6CellNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day6CellNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day6CellNo"><?php echo $ivf_embryology_chart->Day6CellNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day6CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x_Day6CellNo" id="x_Day6CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6CellNo->EditValue ?>"<?php echo $ivf_embryology_chart->Day6CellNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day6CellNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6ICM->Visible) { // Day6ICM ?>
	<div id="r_Day6ICM" class="form-group row">
		<label for="x_Day6ICM" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day6ICM" id="u_Day6ICM" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day6ICM->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day6ICM"><?php echo $ivf_embryology_chart->Day6ICM->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day6ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-value-separator="<?php echo $ivf_embryology_chart->Day6ICM->displayValueSeparatorAttribute() ?>" id="x_Day6ICM" name="x_Day6ICM"<?php echo $ivf_embryology_chart->Day6ICM->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6ICM->selectOptionListHtml("x_Day6ICM") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day6ICM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6TE->Visible) { // Day6TE ?>
	<div id="r_Day6TE" class="form-group row">
		<label for="x_Day6TE" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day6TE" id="u_Day6TE" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day6TE->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day6TE"><?php echo $ivf_embryology_chart->Day6TE->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day6TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-value-separator="<?php echo $ivf_embryology_chart->Day6TE->displayValueSeparatorAttribute() ?>" id="x_Day6TE" name="x_Day6TE"<?php echo $ivf_embryology_chart->Day6TE->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6TE->selectOptionListHtml("x_Day6TE") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day6TE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Observation->Visible) { // Day6Observation ?>
	<div id="r_Day6Observation" class="form-group row">
		<label for="x_Day6Observation" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day6Observation" id="u_Day6Observation" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day6Observation->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day6Observation"><?php echo $ivf_embryology_chart->Day6Observation->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day6Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Observation">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6Observation" name="x_Day6Observation" id="x_Day6Observation" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6Observation->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6Observation->EditValue ?>"<?php echo $ivf_embryology_chart->Day6Observation->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day6Observation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Collapsed->Visible) { // Day6Collapsed ?>
	<div id="r_Day6Collapsed" class="form-group row">
		<label for="x_Day6Collapsed" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day6Collapsed" id="u_Day6Collapsed" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day6Collapsed->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day6Collapsed"><?php echo $ivf_embryology_chart->Day6Collapsed->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day6Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-value-separator="<?php echo $ivf_embryology_chart->Day6Collapsed->displayValueSeparatorAttribute() ?>" id="x_Day6Collapsed" name="x_Day6Collapsed"<?php echo $ivf_embryology_chart->Day6Collapsed->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Collapsed->selectOptionListHtml("x_Day6Collapsed") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day6Collapsed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
	<div id="r_Day6Vacoulles" class="form-group row">
		<label for="x_Day6Vacoulles" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day6Vacoulles" id="u_Day6Vacoulles" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day6Vacoulles->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day6Vacoulles"><?php echo $ivf_embryology_chart->Day6Vacoulles->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day6Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Vacoulles">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" name="x_Day6Vacoulles" id="x_Day6Vacoulles" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6Vacoulles->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6Vacoulles->EditValue ?>"<?php echo $ivf_embryology_chart->Day6Vacoulles->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day6Vacoulles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Grade->Visible) { // Day6Grade ?>
	<div id="r_Day6Grade" class="form-group row">
		<label for="x_Day6Grade" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day6Grade" id="u_Day6Grade" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day6Grade->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day6Grade"><?php echo $ivf_embryology_chart->Day6Grade->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day6Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-value-separator="<?php echo $ivf_embryology_chart->Day6Grade->displayValueSeparatorAttribute() ?>" id="x_Day6Grade" name="x_Day6Grade"<?php echo $ivf_embryology_chart->Day6Grade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Day6Grade->selectOptionListHtml("x_Day6Grade") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Day6Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
	<div id="r_Day6Cryoptop" class="form-group row">
		<label for="x_Day6Cryoptop" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day6Cryoptop" id="u_Day6Cryoptop" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Day6Cryoptop->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day6Cryoptop"><?php echo $ivf_embryology_chart->Day6Cryoptop->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Day6Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x_Day6Cryoptop" id="x_Day6Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Day6Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Day6Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart->Day6Cryoptop->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Day6Cryoptop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingDay->Visible) { // EndingDay ?>
	<div id="r_EndingDay" class="form-group row">
		<label for="x_EndingDay" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_EndingDay" id="u_EndingDay" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->EndingDay->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_EndingDay"><?php echo $ivf_embryology_chart->EndingDay->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->EndingDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-value-separator="<?php echo $ivf_embryology_chart->EndingDay->displayValueSeparatorAttribute() ?>" id="x_EndingDay" name="x_EndingDay"<?php echo $ivf_embryology_chart->EndingDay->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingDay->selectOptionListHtml("x_EndingDay") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->EndingDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingCellStage->Visible) { // EndingCellStage ?>
	<div id="r_EndingCellStage" class="form-group row">
		<label for="x_EndingCellStage" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_EndingCellStage" id="u_EndingCellStage" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->EndingCellStage->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_EndingCellStage"><?php echo $ivf_embryology_chart->EndingCellStage->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->EndingCellStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingCellStage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" data-value-separator="<?php echo $ivf_embryology_chart->EndingCellStage->displayValueSeparatorAttribute() ?>" id="x_EndingCellStage" name="x_EndingCellStage"<?php echo $ivf_embryology_chart->EndingCellStage->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingCellStage->selectOptionListHtml("x_EndingCellStage") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->EndingCellStage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingGrade->Visible) { // EndingGrade ?>
	<div id="r_EndingGrade" class="form-group row">
		<label for="x_EndingGrade" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_EndingGrade" id="u_EndingGrade" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->EndingGrade->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_EndingGrade"><?php echo $ivf_embryology_chart->EndingGrade->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->EndingGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-value-separator="<?php echo $ivf_embryology_chart->EndingGrade->displayValueSeparatorAttribute() ?>" id="x_EndingGrade" name="x_EndingGrade"<?php echo $ivf_embryology_chart->EndingGrade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingGrade->selectOptionListHtml("x_EndingGrade") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->EndingGrade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingState->Visible) { // EndingState ?>
	<div id="r_EndingState" class="form-group row">
		<label for="x_EndingState" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_EndingState" id="u_EndingState" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->EndingState->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_EndingState"><?php echo $ivf_embryology_chart->EndingState->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->EndingState->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingState">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingState" data-value-separator="<?php echo $ivf_embryology_chart->EndingState->displayValueSeparatorAttribute() ?>" id="x_EndingState" name="x_EndingState"<?php echo $ivf_embryology_chart->EndingState->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->EndingState->selectOptionListHtml("x_EndingState") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->EndingState->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_TidNo" id="u_TidNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->TidNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_TidNo"><?php echo $ivf_embryology_chart->TidNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->TidNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_TidNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->TidNo->EditValue ?>"<?php echo $ivf_embryology_chart->TidNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->DidNO->Visible) { // DidNO ?>
	<div id="r_DidNO" class="form-group row">
		<label for="x_DidNO" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DidNO" id="u_DidNO" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->DidNO->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DidNO"><?php echo $ivf_embryology_chart->DidNO->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->DidNO->cellAttributes() ?>>
<?php if ($ivf_embryology_chart->DidNO->getSessionValue() <> "") { ?>
<span id="el_ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart->DidNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_embryology_chart->DidNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_DidNO" name="x_DidNO" value="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el_ivf_embryology_chart_DidNO">
<input type="text" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x_DidNO" id="x_DidNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->DidNO->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->DidNO->EditValue ?>"<?php echo $ivf_embryology_chart->DidNO->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $ivf_embryology_chart->DidNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
	<div id="r_ICSiIVFDateTime" class="form-group row">
		<label for="x_ICSiIVFDateTime" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ICSiIVFDateTime" id="u_ICSiIVFDateTime" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->ICSiIVFDateTime->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ICSiIVFDateTime"><?php echo $ivf_embryology_chart->ICSiIVFDateTime->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->ICSiIVFDateTime->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ICSiIVFDateTime">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x_ICSiIVFDateTime" id="x_ICSiIVFDateTime" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->EditValue ?>"<?php echo $ivf_embryology_chart->ICSiIVFDateTime->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->ICSiIVFDateTime->ReadOnly && !$ivf_embryology_chart->ICSiIVFDateTime->Disabled && !isset($ivf_embryology_chart->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartupdate", "x_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $ivf_embryology_chart->ICSiIVFDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
	<div id="r_PrimaryEmbrologist" class="form-group row">
		<label for="x_PrimaryEmbrologist" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_PrimaryEmbrologist" id="u_PrimaryEmbrologist" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->PrimaryEmbrologist->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_PrimaryEmbrologist"><?php echo $ivf_embryology_chart->PrimaryEmbrologist->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->PrimaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_PrimaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x_PrimaryEmbrologist" id="x_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart->PrimaryEmbrologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->PrimaryEmbrologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
	<div id="r_SecondaryEmbrologist" class="form-group row">
		<label for="x_SecondaryEmbrologist" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_SecondaryEmbrologist" id="u_SecondaryEmbrologist" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->SecondaryEmbrologist->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_SecondaryEmbrologist"><?php echo $ivf_embryology_chart->SecondaryEmbrologist->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->SecondaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SecondaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x_SecondaryEmbrologist" id="x_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart->SecondaryEmbrologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->SecondaryEmbrologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Incubator->Visible) { // Incubator ?>
	<div id="r_Incubator" class="form-group row">
		<label for="x_Incubator" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Incubator" id="u_Incubator" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Incubator->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Incubator"><?php echo $ivf_embryology_chart->Incubator->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Incubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Incubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x_Incubator" id="x_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Incubator->EditValue ?>"<?php echo $ivf_embryology_chart->Incubator->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Incubator->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->location->Visible) { // location ?>
	<div id="r_location" class="form-group row">
		<label for="x_location" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_location" id="u_location" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->location->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_location"><?php echo $ivf_embryology_chart->location->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->location->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_location">
<input type="text" data-table="ivf_embryology_chart" data-field="x_location" name="x_location" id="x_location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->location->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->location->EditValue ?>"<?php echo $ivf_embryology_chart->location->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->location->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
	<div id="r_OocyteNo" class="form-group row">
		<label for="x_OocyteNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_OocyteNo" id="u_OocyteNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->OocyteNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_OocyteNo"><?php echo $ivf_embryology_chart->OocyteNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_OocyteNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x_OocyteNo" id="x_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->OocyteNo->EditValue ?>"<?php echo $ivf_embryology_chart->OocyteNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->OocyteNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Stage->Visible) { // Stage ?>
	<div id="r_Stage" class="form-group row">
		<label for="x_Stage" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Stage" id="u_Stage" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Stage->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Stage"><?php echo $ivf_embryology_chart->Stage->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Stage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Stage" data-value-separator="<?php echo $ivf_embryology_chart->Stage->displayValueSeparatorAttribute() ?>" id="x_Stage" name="x_Stage"<?php echo $ivf_embryology_chart->Stage->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->Stage->selectOptionListHtml("x_Stage") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->Stage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label for="x_Remarks" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Remarks" id="u_Remarks" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->Remarks->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Remarks"><?php echo $ivf_embryology_chart->Remarks->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->Remarks->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Remarks">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->Remarks->EditValue ?>"<?php echo $ivf_embryology_chart->Remarks->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitrificationDate->Visible) { // vitrificationDate ?>
	<div id="r_vitrificationDate" class="form-group row">
		<label for="x_vitrificationDate" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitrificationDate" id="u_vitrificationDate" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitrificationDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitrificationDate"><?php echo $ivf_embryology_chart->vitrificationDate->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitrificationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x_vitrificationDate" id="x_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitrificationDate->EditValue ?>"<?php echo $ivf_embryology_chart->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->vitrificationDate->ReadOnly && !$ivf_embryology_chart->vitrificationDate->Disabled && !isset($ivf_embryology_chart->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartupdate", "x_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $ivf_embryology_chart->vitrificationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
	<div id="r_vitriPrimaryEmbryologist" class="form-group row">
		<label for="x_vitriPrimaryEmbryologist" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriPrimaryEmbryologist" id="u_vitriPrimaryEmbryologist" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriPrimaryEmbryologist->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriPrimaryEmbryologist"><?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x_vitriPrimaryEmbryologist" id="x_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
	<div id="r_vitriSecondaryEmbryologist" class="form-group row">
		<label for="x_vitriSecondaryEmbryologist" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriSecondaryEmbryologist" id="u_vitriSecondaryEmbryologist" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriSecondaryEmbryologist->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriSecondaryEmbryologist"><?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x_vitriSecondaryEmbryologist" id="x_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
	<div id="r_vitriEmbryoNo" class="form-group row">
		<label for="x_vitriEmbryoNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriEmbryoNo" id="u_vitriEmbryoNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriEmbryoNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriEmbryoNo"><?php echo $ivf_embryology_chart->vitriEmbryoNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriEmbryoNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriEmbryoNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x_vitriEmbryoNo" id="x_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriEmbryoNo->EditValue ?>"<?php echo $ivf_embryology_chart->vitriEmbryoNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->vitriEmbryoNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
	<div id="r_vitriFertilisationDate" class="form-group row">
		<label for="x_vitriFertilisationDate" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriFertilisationDate" id="u_vitriFertilisationDate" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriFertilisationDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriFertilisationDate"><?php echo $ivf_embryology_chart->vitriFertilisationDate->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriFertilisationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriFertilisationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x_vitriFertilisationDate" id="x_vitriFertilisationDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriFertilisationDate->EditValue ?>"<?php echo $ivf_embryology_chart->vitriFertilisationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->vitriFertilisationDate->ReadOnly && !$ivf_embryology_chart->vitriFertilisationDate->Disabled && !isset($ivf_embryology_chart->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartupdate", "x_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $ivf_embryology_chart->vitriFertilisationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriDay->Visible) { // vitriDay ?>
	<div id="r_vitriDay" class="form-group row">
		<label for="x_vitriDay" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriDay" id="u_vitriDay" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriDay->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriDay"><?php echo $ivf_embryology_chart->vitriDay->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-value-separator="<?php echo $ivf_embryology_chart->vitriDay->displayValueSeparatorAttribute() ?>" id="x_vitriDay" name="x_vitriDay"<?php echo $ivf_embryology_chart->vitriDay->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->vitriDay->selectOptionListHtml("x_vitriDay") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->vitriDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGrade->Visible) { // vitriGrade ?>
	<div id="r_vitriGrade" class="form-group row">
		<label for="x_vitriGrade" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriGrade" id="u_vitriGrade" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriGrade->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriGrade"><?php echo $ivf_embryology_chart->vitriGrade->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-value-separator="<?php echo $ivf_embryology_chart->vitriGrade->displayValueSeparatorAttribute() ?>" id="x_vitriGrade" name="x_vitriGrade"<?php echo $ivf_embryology_chart->vitriGrade->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->vitriGrade->selectOptionListHtml("x_vitriGrade") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->vitriGrade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriIncubator->Visible) { // vitriIncubator ?>
	<div id="r_vitriIncubator" class="form-group row">
		<label for="x_vitriIncubator" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriIncubator" id="u_vitriIncubator" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriIncubator->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriIncubator"><?php echo $ivf_embryology_chart->vitriIncubator->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriIncubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriIncubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x_vitriIncubator" id="x_vitriIncubator" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriIncubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriIncubator->EditValue ?>"<?php echo $ivf_embryology_chart->vitriIncubator->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->vitriIncubator->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriTank->Visible) { // vitriTank ?>
	<div id="r_vitriTank" class="form-group row">
		<label for="x_vitriTank" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriTank" id="u_vitriTank" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriTank->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriTank"><?php echo $ivf_embryology_chart->vitriTank->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriTank->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriTank">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x_vitriTank" id="x_vitriTank" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriTank->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriTank->EditValue ?>"<?php echo $ivf_embryology_chart->vitriTank->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->vitriTank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCanister->Visible) { // vitriCanister ?>
	<div id="r_vitriCanister" class="form-group row">
		<label for="x_vitriCanister" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriCanister" id="u_vitriCanister" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriCanister->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriCanister"><?php echo $ivf_embryology_chart->vitriCanister->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriCanister->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCanister">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x_vitriCanister" id="x_vitriCanister" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCanister->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCanister->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCanister->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->vitriCanister->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGobiet->Visible) { // vitriGobiet ?>
	<div id="r_vitriGobiet" class="form-group row">
		<label for="x_vitriGobiet" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriGobiet" id="u_vitriGobiet" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriGobiet->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriGobiet"><?php echo $ivf_embryology_chart->vitriGobiet->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriGobiet->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGobiet">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x_vitriGobiet" id="x_vitriGobiet" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriGobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriGobiet->EditValue ?>"<?php echo $ivf_embryology_chart->vitriGobiet->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->vitriGobiet->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
	<div id="r_vitriCryolockNo" class="form-group row">
		<label for="x_vitriCryolockNo" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriCryolockNo" id="u_vitriCryolockNo" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriCryolockNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriCryolockNo"><?php echo $ivf_embryology_chart->vitriCryolockNo->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriCryolockNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x_vitriCryolockNo" id="x_vitriCryolockNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCryolockNo->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCryolockNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->vitriCryolockNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
	<div id="r_vitriCryolockColour" class="form-group row">
		<label for="x_vitriCryolockColour" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriCryolockColour" id="u_vitriCryolockColour" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriCryolockColour->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriCryolockColour"><?php echo $ivf_embryology_chart->vitriCryolockColour->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriCryolockColour->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockColour">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x_vitriCryolockColour" id="x_vitriCryolockColour" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriCryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriCryolockColour->EditValue ?>"<?php echo $ivf_embryology_chart->vitriCryolockColour->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->vitriCryolockColour->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriStage->Visible) { // vitriStage ?>
	<div id="r_vitriStage" class="form-group row">
		<label for="x_vitriStage" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_vitriStage" id="u_vitriStage" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->vitriStage->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_vitriStage"><?php echo $ivf_embryology_chart->vitriStage->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->vitriStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x_vitriStage" id="x_vitriStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->vitriStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->vitriStage->EditValue ?>"<?php echo $ivf_embryology_chart->vitriStage->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->vitriStage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDate->Visible) { // thawDate ?>
	<div id="r_thawDate" class="form-group row">
		<label for="x_thawDate" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_thawDate" id="u_thawDate" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->thawDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_thawDate"><?php echo $ivf_embryology_chart->thawDate->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->thawDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawDate->EditValue ?>"<?php echo $ivf_embryology_chart->thawDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart->thawDate->ReadOnly && !$ivf_embryology_chart->thawDate->Disabled && !isset($ivf_embryology_chart->thawDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart->thawDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_embryology_chartupdate", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $ivf_embryology_chart->thawDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<div id="r_thawPrimaryEmbryologist" class="form-group row">
		<label for="x_thawPrimaryEmbryologist" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_thawPrimaryEmbryologist" id="u_thawPrimaryEmbryologist" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->thawPrimaryEmbryologist->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_thawPrimaryEmbryologist"><?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<div id="r_thawSecondaryEmbryologist" class="form-group row">
		<label for="x_thawSecondaryEmbryologist" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_thawSecondaryEmbryologist" id="u_thawSecondaryEmbryologist" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->thawSecondaryEmbryologist->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_thawSecondaryEmbryologist"><?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->thawET->Visible) { // thawET ?>
	<div id="r_thawET" class="form-group row">
		<label for="x_thawET" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_thawET" id="u_thawET" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->thawET->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_thawET"><?php echo $ivf_embryology_chart->thawET->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->thawET->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_thawET" data-value-separator="<?php echo $ivf_embryology_chart->thawET->displayValueSeparatorAttribute() ?>" id="x_thawET" name="x_thawET"<?php echo $ivf_embryology_chart->thawET->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->thawET->selectOptionListHtml("x_thawET") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->thawET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->thawReFrozen->Visible) { // thawReFrozen ?>
	<div id="r_thawReFrozen" class="form-group row">
		<label for="x_thawReFrozen" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_thawReFrozen" id="u_thawReFrozen" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->thawReFrozen->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_thawReFrozen"><?php echo $ivf_embryology_chart->thawReFrozen->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawReFrozen">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" name="x_thawReFrozen" id="x_thawReFrozen" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawReFrozen->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawReFrozen->EditValue ?>"<?php echo $ivf_embryology_chart->thawReFrozen->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->thawReFrozen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->thawAbserve->Visible) { // thawAbserve ?>
	<div id="r_thawAbserve" class="form-group row">
		<label for="x_thawAbserve" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_thawAbserve" id="u_thawAbserve" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->thawAbserve->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_thawAbserve"><?php echo $ivf_embryology_chart->thawAbserve->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawAbserve">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x_thawAbserve" id="x_thawAbserve" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawAbserve->EditValue ?>"<?php echo $ivf_embryology_chart->thawAbserve->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->thawAbserve->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDiscard->Visible) { // thawDiscard ?>
	<div id="r_thawDiscard" class="form-group row">
		<label for="x_thawDiscard" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_thawDiscard" id="u_thawDiscard" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->thawDiscard->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_thawDiscard"><?php echo $ivf_embryology_chart->thawDiscard->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDiscard">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x_thawDiscard" id="x_thawDiscard" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->thawDiscard->EditValue ?>"<?php echo $ivf_embryology_chart->thawDiscard->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->thawDiscard->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->ETCatheter->Visible) { // ETCatheter ?>
	<div id="r_ETCatheter" class="form-group row">
		<label for="x_ETCatheter" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ETCatheter" id="u_ETCatheter" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->ETCatheter->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ETCatheter"><?php echo $ivf_embryology_chart->ETCatheter->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->ETCatheter->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETCatheter">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x_ETCatheter" id="x_ETCatheter" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETCatheter->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETCatheter->EditValue ?>"<?php echo $ivf_embryology_chart->ETCatheter->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->ETCatheter->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDifficulty->Visible) { // ETDifficulty ?>
	<div id="r_ETDifficulty" class="form-group row">
		<label for="x_ETDifficulty" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ETDifficulty" id="u_ETDifficulty" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->ETDifficulty->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ETDifficulty"><?php echo $ivf_embryology_chart->ETDifficulty->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->ETDifficulty->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDifficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-value-separator="<?php echo $ivf_embryology_chart->ETDifficulty->displayValueSeparatorAttribute() ?>" id="x_ETDifficulty" name="x_ETDifficulty"<?php echo $ivf_embryology_chart->ETDifficulty->editAttributes() ?>>
		<?php echo $ivf_embryology_chart->ETDifficulty->selectOptionListHtml("x_ETDifficulty") ?>
	</select>
</div>
</span>
<?php echo $ivf_embryology_chart->ETDifficulty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEasy->Visible) { // ETEasy ?>
	<div id="r_ETEasy" class="form-group row">
		<label class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ETEasy" id="u_ETEasy" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->ETEasy->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ETEasy"><?php echo $ivf_embryology_chart->ETEasy->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->ETEasy->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEasy">
<div id="tp_x_ETEasy" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-value-separator="<?php echo $ivf_embryology_chart->ETEasy->displayValueSeparatorAttribute() ?>" name="x_ETEasy[]" id="x_ETEasy[]" value="{value}"<?php echo $ivf_embryology_chart->ETEasy->editAttributes() ?>></div>
<div id="dsl_x_ETEasy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart->ETEasy->checkBoxListHtml(FALSE, "x_ETEasy[]") ?>
</div></div>
</span>
<?php echo $ivf_embryology_chart->ETEasy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->ETComments->Visible) { // ETComments ?>
	<div id="r_ETComments" class="form-group row">
		<label for="x_ETComments" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ETComments" id="u_ETComments" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->ETComments->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ETComments"><?php echo $ivf_embryology_chart->ETComments->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->ETComments->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETComments">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x_ETComments" id="x_ETComments" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETComments->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETComments->EditValue ?>"<?php echo $ivf_embryology_chart->ETComments->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->ETComments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDoctor->Visible) { // ETDoctor ?>
	<div id="r_ETDoctor" class="form-group row">
		<label for="x_ETDoctor" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ETDoctor" id="u_ETDoctor" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->ETDoctor->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ETDoctor"><?php echo $ivf_embryology_chart->ETDoctor->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->ETDoctor->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDoctor">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x_ETDoctor" id="x_ETDoctor" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETDoctor->EditValue ?>"<?php echo $ivf_embryology_chart->ETDoctor->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->ETDoctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEmbryologist->Visible) { // ETEmbryologist ?>
	<div id="r_ETEmbryologist" class="form-group row">
		<label for="x_ETEmbryologist" class="<?php echo $ivf_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ETEmbryologist" id="u_ETEmbryologist" class="form-check-input ew-multi-select" value="1"<?php echo ($ivf_embryology_chart->ETEmbryologist->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ETEmbryologist"><?php echo $ivf_embryology_chart->ETEmbryologist->caption() ?></label></div></label>
		<div class="<?php echo $ivf_embryology_chart_update->RightColumnClass ?>"><div<?php echo $ivf_embryology_chart->ETEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x_ETEmbryologist" id="x_ETEmbryologist" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart->ETEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart->ETEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart->ETEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart->ETEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page -->
<?php if (!$ivf_embryology_chart_update->IsModal) { ?>
	<div class="form-group row"><!-- buttons .form-group -->
		<div class="<?php echo $ivf_embryology_chart_update->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("UpdateBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_embryology_chart_update->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
		</div><!-- /buttons offset -->
	</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_embryology_chart_update->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_embryology_chart_update->terminate();
?>
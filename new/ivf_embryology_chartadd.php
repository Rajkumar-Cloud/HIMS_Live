<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$ivf_embryology_chart_add = new ivf_embryology_chart_add();

// Run the page
$ivf_embryology_chart_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_embryology_chart_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_embryology_chartadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_embryology_chartadd = currentForm = new ew.Form("fivf_embryology_chartadd", "add");

	// Validate form
	fivf_embryology_chartadd.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($ivf_embryology_chart_add->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->RIDNo->caption(), $ivf_embryology_chart_add->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart_add->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_embryology_chart_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Name->caption(), $ivf_embryology_chart_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->ARTCycle->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->ARTCycle->caption(), $ivf_embryology_chart_add->ARTCycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->SpermOrigin->Required) { ?>
				elm = this.getElements("x" + infix + "_SpermOrigin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->SpermOrigin->caption(), $ivf_embryology_chart_add->SpermOrigin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->InseminatinTechnique->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminatinTechnique");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->InseminatinTechnique->caption(), $ivf_embryology_chart_add->InseminatinTechnique->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->IndicationForART->Required) { ?>
				elm = this.getElements("x" + infix + "_IndicationForART");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->IndicationForART->caption(), $ivf_embryology_chart_add->IndicationForART->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day0sino->Required) { ?>
				elm = this.getElements("x" + infix + "_Day0sino");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day0sino->caption(), $ivf_embryology_chart_add->Day0sino->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day0OocyteStage->Required) { ?>
				elm = this.getElements("x" + infix + "_Day0OocyteStage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day0OocyteStage->caption(), $ivf_embryology_chart_add->Day0OocyteStage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day0PolarBodyPosition->Required) { ?>
				elm = this.getElements("x" + infix + "_Day0PolarBodyPosition");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day0PolarBodyPosition->caption(), $ivf_embryology_chart_add->Day0PolarBodyPosition->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day0Breakage->Required) { ?>
				elm = this.getElements("x" + infix + "_Day0Breakage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day0Breakage->caption(), $ivf_embryology_chart_add->Day0Breakage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day0Attempts->Required) { ?>
				elm = this.getElements("x" + infix + "_Day0Attempts");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day0Attempts->caption(), $ivf_embryology_chart_add->Day0Attempts->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day0SPZMorpho->Required) { ?>
				elm = this.getElements("x" + infix + "_Day0SPZMorpho");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day0SPZMorpho->caption(), $ivf_embryology_chart_add->Day0SPZMorpho->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day0SPZLocation->Required) { ?>
				elm = this.getElements("x" + infix + "_Day0SPZLocation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day0SPZLocation->caption(), $ivf_embryology_chart_add->Day0SPZLocation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day0SpOrgin->Required) { ?>
				elm = this.getElements("x" + infix + "_Day0SpOrgin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day0SpOrgin->caption(), $ivf_embryology_chart_add->Day0SpOrgin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day5Cryoptop->Required) { ?>
				elm = this.getElements("x" + infix + "_Day5Cryoptop");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day5Cryoptop->caption(), $ivf_embryology_chart_add->Day5Cryoptop->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day1Sperm->Required) { ?>
				elm = this.getElements("x" + infix + "_Day1Sperm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day1Sperm->caption(), $ivf_embryology_chart_add->Day1Sperm->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day1PN->Required) { ?>
				elm = this.getElements("x" + infix + "_Day1PN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day1PN->caption(), $ivf_embryology_chart_add->Day1PN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day1PB->Required) { ?>
				elm = this.getElements("x" + infix + "_Day1PB");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day1PB->caption(), $ivf_embryology_chart_add->Day1PB->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day1Pronucleus->Required) { ?>
				elm = this.getElements("x" + infix + "_Day1Pronucleus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day1Pronucleus->caption(), $ivf_embryology_chart_add->Day1Pronucleus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day1Nucleolus->Required) { ?>
				elm = this.getElements("x" + infix + "_Day1Nucleolus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day1Nucleolus->caption(), $ivf_embryology_chart_add->Day1Nucleolus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day1Halo->Required) { ?>
				elm = this.getElements("x" + infix + "_Day1Halo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day1Halo->caption(), $ivf_embryology_chart_add->Day1Halo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day2SiNo->Required) { ?>
				elm = this.getElements("x" + infix + "_Day2SiNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day2SiNo->caption(), $ivf_embryology_chart_add->Day2SiNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day2CellNo->Required) { ?>
				elm = this.getElements("x" + infix + "_Day2CellNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day2CellNo->caption(), $ivf_embryology_chart_add->Day2CellNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day2Frag->Required) { ?>
				elm = this.getElements("x" + infix + "_Day2Frag");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day2Frag->caption(), $ivf_embryology_chart_add->Day2Frag->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day2Symmetry->Required) { ?>
				elm = this.getElements("x" + infix + "_Day2Symmetry");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day2Symmetry->caption(), $ivf_embryology_chart_add->Day2Symmetry->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day2Cryoptop->Required) { ?>
				elm = this.getElements("x" + infix + "_Day2Cryoptop");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day2Cryoptop->caption(), $ivf_embryology_chart_add->Day2Cryoptop->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day2Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Day2Grade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day2Grade->caption(), $ivf_embryology_chart_add->Day2Grade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day2End->Required) { ?>
				elm = this.getElements("x" + infix + "_Day2End");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day2End->caption(), $ivf_embryology_chart_add->Day2End->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day3Sino->Required) { ?>
				elm = this.getElements("x" + infix + "_Day3Sino");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day3Sino->caption(), $ivf_embryology_chart_add->Day3Sino->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day3CellNo->Required) { ?>
				elm = this.getElements("x" + infix + "_Day3CellNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day3CellNo->caption(), $ivf_embryology_chart_add->Day3CellNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day3Frag->Required) { ?>
				elm = this.getElements("x" + infix + "_Day3Frag");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day3Frag->caption(), $ivf_embryology_chart_add->Day3Frag->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day3Symmetry->Required) { ?>
				elm = this.getElements("x" + infix + "_Day3Symmetry");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day3Symmetry->caption(), $ivf_embryology_chart_add->Day3Symmetry->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day3ZP->Required) { ?>
				elm = this.getElements("x" + infix + "_Day3ZP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day3ZP->caption(), $ivf_embryology_chart_add->Day3ZP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day3Vacoules->Required) { ?>
				elm = this.getElements("x" + infix + "_Day3Vacoules");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day3Vacoules->caption(), $ivf_embryology_chart_add->Day3Vacoules->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day3Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Day3Grade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day3Grade->caption(), $ivf_embryology_chart_add->Day3Grade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day3Cryoptop->Required) { ?>
				elm = this.getElements("x" + infix + "_Day3Cryoptop");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day3Cryoptop->caption(), $ivf_embryology_chart_add->Day3Cryoptop->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day3End->Required) { ?>
				elm = this.getElements("x" + infix + "_Day3End");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day3End->caption(), $ivf_embryology_chart_add->Day3End->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day4SiNo->Required) { ?>
				elm = this.getElements("x" + infix + "_Day4SiNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day4SiNo->caption(), $ivf_embryology_chart_add->Day4SiNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day4CellNo->Required) { ?>
				elm = this.getElements("x" + infix + "_Day4CellNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day4CellNo->caption(), $ivf_embryology_chart_add->Day4CellNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day4Frag->Required) { ?>
				elm = this.getElements("x" + infix + "_Day4Frag");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day4Frag->caption(), $ivf_embryology_chart_add->Day4Frag->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day4Symmetry->Required) { ?>
				elm = this.getElements("x" + infix + "_Day4Symmetry");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day4Symmetry->caption(), $ivf_embryology_chart_add->Day4Symmetry->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day4Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Day4Grade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day4Grade->caption(), $ivf_embryology_chart_add->Day4Grade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day4Cryoptop->Required) { ?>
				elm = this.getElements("x" + infix + "_Day4Cryoptop");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day4Cryoptop->caption(), $ivf_embryology_chart_add->Day4Cryoptop->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day4End->Required) { ?>
				elm = this.getElements("x" + infix + "_Day4End");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day4End->caption(), $ivf_embryology_chart_add->Day4End->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day5CellNo->Required) { ?>
				elm = this.getElements("x" + infix + "_Day5CellNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day5CellNo->caption(), $ivf_embryology_chart_add->Day5CellNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day5ICM->Required) { ?>
				elm = this.getElements("x" + infix + "_Day5ICM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day5ICM->caption(), $ivf_embryology_chart_add->Day5ICM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day5TE->Required) { ?>
				elm = this.getElements("x" + infix + "_Day5TE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day5TE->caption(), $ivf_embryology_chart_add->Day5TE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day5Observation->Required) { ?>
				elm = this.getElements("x" + infix + "_Day5Observation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day5Observation->caption(), $ivf_embryology_chart_add->Day5Observation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day5Collapsed->Required) { ?>
				elm = this.getElements("x" + infix + "_Day5Collapsed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day5Collapsed->caption(), $ivf_embryology_chart_add->Day5Collapsed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day5Vacoulles->Required) { ?>
				elm = this.getElements("x" + infix + "_Day5Vacoulles");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day5Vacoulles->caption(), $ivf_embryology_chart_add->Day5Vacoulles->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day5Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Day5Grade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day5Grade->caption(), $ivf_embryology_chart_add->Day5Grade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day6CellNo->Required) { ?>
				elm = this.getElements("x" + infix + "_Day6CellNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day6CellNo->caption(), $ivf_embryology_chart_add->Day6CellNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day6ICM->Required) { ?>
				elm = this.getElements("x" + infix + "_Day6ICM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day6ICM->caption(), $ivf_embryology_chart_add->Day6ICM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day6TE->Required) { ?>
				elm = this.getElements("x" + infix + "_Day6TE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day6TE->caption(), $ivf_embryology_chart_add->Day6TE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day6Observation->Required) { ?>
				elm = this.getElements("x" + infix + "_Day6Observation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day6Observation->caption(), $ivf_embryology_chart_add->Day6Observation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day6Collapsed->Required) { ?>
				elm = this.getElements("x" + infix + "_Day6Collapsed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day6Collapsed->caption(), $ivf_embryology_chart_add->Day6Collapsed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day6Vacoulles->Required) { ?>
				elm = this.getElements("x" + infix + "_Day6Vacoulles");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day6Vacoulles->caption(), $ivf_embryology_chart_add->Day6Vacoulles->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day6Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Day6Grade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day6Grade->caption(), $ivf_embryology_chart_add->Day6Grade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Day6Cryoptop->Required) { ?>
				elm = this.getElements("x" + infix + "_Day6Cryoptop");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day6Cryoptop->caption(), $ivf_embryology_chart_add->Day6Cryoptop->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->EndSiNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EndSiNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->EndSiNo->caption(), $ivf_embryology_chart_add->EndSiNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->EndingDay->Required) { ?>
				elm = this.getElements("x" + infix + "_EndingDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->EndingDay->caption(), $ivf_embryology_chart_add->EndingDay->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->EndingCellStage->Required) { ?>
				elm = this.getElements("x" + infix + "_EndingCellStage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->EndingCellStage->caption(), $ivf_embryology_chart_add->EndingCellStage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->EndingGrade->Required) { ?>
				elm = this.getElements("x" + infix + "_EndingGrade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->EndingGrade->caption(), $ivf_embryology_chart_add->EndingGrade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->EndingState->Required) { ?>
				elm = this.getElements("x" + infix + "_EndingState");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->EndingState->caption(), $ivf_embryology_chart_add->EndingState->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->TidNo->caption(), $ivf_embryology_chart_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart_add->TidNo->errorMessage()) ?>");
			<?php if ($ivf_embryology_chart_add->DidNO->Required) { ?>
				elm = this.getElements("x" + infix + "_DidNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->DidNO->caption(), $ivf_embryology_chart_add->DidNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->ICSiIVFDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ICSiIVFDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->ICSiIVFDateTime->caption(), $ivf_embryology_chart_add->ICSiIVFDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ICSiIVFDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart_add->ICSiIVFDateTime->errorMessage()) ?>");
			<?php if ($ivf_embryology_chart_add->PrimaryEmbrologist->Required) { ?>
				elm = this.getElements("x" + infix + "_PrimaryEmbrologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->PrimaryEmbrologist->caption(), $ivf_embryology_chart_add->PrimaryEmbrologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->SecondaryEmbrologist->Required) { ?>
				elm = this.getElements("x" + infix + "_SecondaryEmbrologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->SecondaryEmbrologist->caption(), $ivf_embryology_chart_add->SecondaryEmbrologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Incubator->Required) { ?>
				elm = this.getElements("x" + infix + "_Incubator");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Incubator->caption(), $ivf_embryology_chart_add->Incubator->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->location->Required) { ?>
				elm = this.getElements("x" + infix + "_location");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->location->caption(), $ivf_embryology_chart_add->location->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->OocyteNo->Required) { ?>
				elm = this.getElements("x" + infix + "_OocyteNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->OocyteNo->caption(), $ivf_embryology_chart_add->OocyteNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Stage->Required) { ?>
				elm = this.getElements("x" + infix + "_Stage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Stage->caption(), $ivf_embryology_chart_add->Stage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Remarks->caption(), $ivf_embryology_chart_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitrificationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_vitrificationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitrificationDate->caption(), $ivf_embryology_chart_add->vitrificationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_vitrificationDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart_add->vitrificationDate->errorMessage()) ?>");
			<?php if ($ivf_embryology_chart_add->vitriPrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriPrimaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriPrimaryEmbryologist->caption(), $ivf_embryology_chart_add->vitriPrimaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriSecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriSecondaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriSecondaryEmbryologist->caption(), $ivf_embryology_chart_add->vitriSecondaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriEmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriEmbryoNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriEmbryoNo->caption(), $ivf_embryology_chart_add->vitriEmbryoNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->thawReFrozen->Required) { ?>
				elm = this.getElements("x" + infix + "_thawReFrozen[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->thawReFrozen->caption(), $ivf_embryology_chart_add->thawReFrozen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriFertilisationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriFertilisationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriFertilisationDate->caption(), $ivf_embryology_chart_add->vitriFertilisationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_vitriFertilisationDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart_add->vitriFertilisationDate->errorMessage()) ?>");
			<?php if ($ivf_embryology_chart_add->vitriDay->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriDay->caption(), $ivf_embryology_chart_add->vitriDay->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriStage->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriStage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriStage->caption(), $ivf_embryology_chart_add->vitriStage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriGrade->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriGrade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriGrade->caption(), $ivf_embryology_chart_add->vitriGrade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriIncubator->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriIncubator");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriIncubator->caption(), $ivf_embryology_chart_add->vitriIncubator->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriTank->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriTank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriTank->caption(), $ivf_embryology_chart_add->vitriTank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriCanister->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriCanister");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriCanister->caption(), $ivf_embryology_chart_add->vitriCanister->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriGobiet->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriGobiet");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriGobiet->caption(), $ivf_embryology_chart_add->vitriGobiet->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriViscotube->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriViscotube");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriViscotube->caption(), $ivf_embryology_chart_add->vitriViscotube->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriCryolockNo->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriCryolockNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriCryolockNo->caption(), $ivf_embryology_chart_add->vitriCryolockNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->vitriCryolockColour->Required) { ?>
				elm = this.getElements("x" + infix + "_vitriCryolockColour");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->vitriCryolockColour->caption(), $ivf_embryology_chart_add->vitriCryolockColour->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->thawDate->Required) { ?>
				elm = this.getElements("x" + infix + "_thawDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->thawDate->caption(), $ivf_embryology_chart_add->thawDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_thawDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart_add->thawDate->errorMessage()) ?>");
			<?php if ($ivf_embryology_chart_add->thawPrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_thawPrimaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->thawPrimaryEmbryologist->caption(), $ivf_embryology_chart_add->thawPrimaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->thawSecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_thawSecondaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->thawSecondaryEmbryologist->caption(), $ivf_embryology_chart_add->thawSecondaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->thawET->Required) { ?>
				elm = this.getElements("x" + infix + "_thawET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->thawET->caption(), $ivf_embryology_chart_add->thawET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->thawAbserve->Required) { ?>
				elm = this.getElements("x" + infix + "_thawAbserve");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->thawAbserve->caption(), $ivf_embryology_chart_add->thawAbserve->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->thawDiscard->Required) { ?>
				elm = this.getElements("x" + infix + "_thawDiscard");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->thawDiscard->caption(), $ivf_embryology_chart_add->thawDiscard->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->ETCatheter->Required) { ?>
				elm = this.getElements("x" + infix + "_ETCatheter");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->ETCatheter->caption(), $ivf_embryology_chart_add->ETCatheter->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->ETDifficulty->Required) { ?>
				elm = this.getElements("x" + infix + "_ETDifficulty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->ETDifficulty->caption(), $ivf_embryology_chart_add->ETDifficulty->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->ETEasy->Required) { ?>
				elm = this.getElements("x" + infix + "_ETEasy[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->ETEasy->caption(), $ivf_embryology_chart_add->ETEasy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->ETComments->Required) { ?>
				elm = this.getElements("x" + infix + "_ETComments");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->ETComments->caption(), $ivf_embryology_chart_add->ETComments->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->ETDoctor->Required) { ?>
				elm = this.getElements("x" + infix + "_ETDoctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->ETDoctor->caption(), $ivf_embryology_chart_add->ETDoctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->ETEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_ETEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->ETEmbryologist->caption(), $ivf_embryology_chart_add->ETEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_embryology_chart_add->ETDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ETDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->ETDate->caption(), $ivf_embryology_chart_add->ETDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ETDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_embryology_chart_add->ETDate->errorMessage()) ?>");
			<?php if ($ivf_embryology_chart_add->Day1End->Required) { ?>
				elm = this.getElements("x" + infix + "_Day1End");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_embryology_chart_add->Day1End->caption(), $ivf_embryology_chart_add->Day1End->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fivf_embryology_chartadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_embryology_chartadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_embryology_chartadd.lists["x_Day0PolarBodyPosition"] = <?php echo $ivf_embryology_chart_add->Day0PolarBodyPosition->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day0PolarBodyPosition"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day0PolarBodyPosition->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day0Breakage"] = <?php echo $ivf_embryology_chart_add->Day0Breakage->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day0Breakage"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day0Breakage->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day0Attempts"] = <?php echo $ivf_embryology_chart_add->Day0Attempts->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day0Attempts"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day0Attempts->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day0SPZMorpho"] = <?php echo $ivf_embryology_chart_add->Day0SPZMorpho->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day0SPZMorpho"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day0SPZMorpho->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day0SPZLocation"] = <?php echo $ivf_embryology_chart_add->Day0SPZLocation->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day0SPZLocation"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day0SPZLocation->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day0SpOrgin"] = <?php echo $ivf_embryology_chart_add->Day0SpOrgin->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day0SpOrgin"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day0SpOrgin->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day5Cryoptop"] = <?php echo $ivf_embryology_chart_add->Day5Cryoptop->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day5Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day5Cryoptop->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day1PN"] = <?php echo $ivf_embryology_chart_add->Day1PN->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day1PN"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day1PN->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day1PB"] = <?php echo $ivf_embryology_chart_add->Day1PB->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day1PB"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day1PB->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day1Pronucleus"] = <?php echo $ivf_embryology_chart_add->Day1Pronucleus->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day1Pronucleus"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day1Pronucleus->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day1Nucleolus"] = <?php echo $ivf_embryology_chart_add->Day1Nucleolus->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day1Nucleolus"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day1Nucleolus->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day1Halo"] = <?php echo $ivf_embryology_chart_add->Day1Halo->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day1Halo"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day1Halo->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day2End"] = <?php echo $ivf_embryology_chart_add->Day2End->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day2End"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day2End->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day3Frag"] = <?php echo $ivf_embryology_chart_add->Day3Frag->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day3Frag"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day3Frag->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day3Symmetry"] = <?php echo $ivf_embryology_chart_add->Day3Symmetry->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day3Symmetry"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day3Symmetry->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day3ZP"] = <?php echo $ivf_embryology_chart_add->Day3ZP->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day3ZP"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day3ZP->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day3Vacoules"] = <?php echo $ivf_embryology_chart_add->Day3Vacoules->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day3Vacoules"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day3Vacoules->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day3Grade"] = <?php echo $ivf_embryology_chart_add->Day3Grade->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day3Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day3Grade->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day3Cryoptop"] = <?php echo $ivf_embryology_chart_add->Day3Cryoptop->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day3Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day3Cryoptop->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day3End"] = <?php echo $ivf_embryology_chart_add->Day3End->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day3End"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day3End->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day4Cryoptop"] = <?php echo $ivf_embryology_chart_add->Day4Cryoptop->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day4Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day4Cryoptop->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day4End"] = <?php echo $ivf_embryology_chart_add->Day4End->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day4End"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day4End->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day5ICM"] = <?php echo $ivf_embryology_chart_add->Day5ICM->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day5ICM"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day5ICM->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day5TE"] = <?php echo $ivf_embryology_chart_add->Day5TE->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day5TE"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day5TE->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day5Observation"] = <?php echo $ivf_embryology_chart_add->Day5Observation->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day5Observation"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day5Observation->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day5Collapsed"] = <?php echo $ivf_embryology_chart_add->Day5Collapsed->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day5Collapsed"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day5Collapsed->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day5Vacoulles"] = <?php echo $ivf_embryology_chart_add->Day5Vacoulles->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day5Vacoulles"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day5Vacoulles->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day5Grade"] = <?php echo $ivf_embryology_chart_add->Day5Grade->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day5Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day5Grade->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day6ICM"] = <?php echo $ivf_embryology_chart_add->Day6ICM->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day6ICM"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day6ICM->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day6TE"] = <?php echo $ivf_embryology_chart_add->Day6TE->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day6TE"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day6TE->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day6Observation"] = <?php echo $ivf_embryology_chart_add->Day6Observation->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day6Observation"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day6Observation->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day6Collapsed"] = <?php echo $ivf_embryology_chart_add->Day6Collapsed->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day6Collapsed"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day6Collapsed->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day6Vacoulles"] = <?php echo $ivf_embryology_chart_add->Day6Vacoulles->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day6Vacoulles"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day6Vacoulles->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day6Grade"] = <?php echo $ivf_embryology_chart_add->Day6Grade->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day6Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day6Grade->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_EndingDay"] = <?php echo $ivf_embryology_chart_add->EndingDay->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_EndingDay"].options = <?php echo JsonEncode($ivf_embryology_chart_add->EndingDay->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_EndingGrade"] = <?php echo $ivf_embryology_chart_add->EndingGrade->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_EndingGrade"].options = <?php echo JsonEncode($ivf_embryology_chart_add->EndingGrade->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_EndingState"] = <?php echo $ivf_embryology_chart_add->EndingState->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_EndingState"].options = <?php echo JsonEncode($ivf_embryology_chart_add->EndingState->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Stage"] = <?php echo $ivf_embryology_chart_add->Stage->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Stage"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Stage->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_thawReFrozen[]"] = <?php echo $ivf_embryology_chart_add->thawReFrozen->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_thawReFrozen[]"].options = <?php echo JsonEncode($ivf_embryology_chart_add->thawReFrozen->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_vitriDay"] = <?php echo $ivf_embryology_chart_add->vitriDay->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_vitriDay"].options = <?php echo JsonEncode($ivf_embryology_chart_add->vitriDay->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_vitriGrade"] = <?php echo $ivf_embryology_chart_add->vitriGrade->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_vitriGrade"].options = <?php echo JsonEncode($ivf_embryology_chart_add->vitriGrade->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_thawET"] = <?php echo $ivf_embryology_chart_add->thawET->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_thawET"].options = <?php echo JsonEncode($ivf_embryology_chart_add->thawET->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_ETDifficulty"] = <?php echo $ivf_embryology_chart_add->ETDifficulty->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_ETDifficulty"].options = <?php echo JsonEncode($ivf_embryology_chart_add->ETDifficulty->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_ETEasy[]"] = <?php echo $ivf_embryology_chart_add->ETEasy->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_ETEasy[]"].options = <?php echo JsonEncode($ivf_embryology_chart_add->ETEasy->options(FALSE, TRUE)) ?>;
	fivf_embryology_chartadd.lists["x_Day1End"] = <?php echo $ivf_embryology_chart_add->Day1End->Lookup->toClientList($ivf_embryology_chart_add) ?>;
	fivf_embryology_chartadd.lists["x_Day1End"].options = <?php echo JsonEncode($ivf_embryology_chart_add->Day1End->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_embryology_chartadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_embryology_chart_add->showPageHeader(); ?>
<?php
$ivf_embryology_chart_add->showMessage();
?>
<form name="fivf_embryology_chartadd" id="fivf_embryology_chartadd" class="<?php echo $ivf_embryology_chart_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_embryology_chart_add->IsModal ?>">
<?php if ($ivf_embryology_chart->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_embryology_chart_add->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_embryology_chart_add->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_embryology_chart_add->TidNo->getSessionValue()) ?>">
<?php } ?>
<?php if ($ivf_embryology_chart->getCurrentMasterTable() == "ivf_oocytedenudation") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf_oocytedenudation">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_embryology_chart_add->DidNO->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($ivf_embryology_chart_add->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_RIDNo" for="x_RIDNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->RIDNo->caption() ?><?php echo $ivf_embryology_chart_add->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->RIDNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart_add->RIDNo->getSessionValue() != "") { ?>
<span id="el_ivf_embryology_chart_RIDNo">
<span<?php echo $ivf_embryology_chart_add->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_embryology_chart_add->RIDNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_RIDNo" name="x_RIDNo" value="<?php echo HtmlEncode($ivf_embryology_chart_add->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el_ivf_embryology_chart_RIDNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->RIDNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $ivf_embryology_chart_add->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_embryology_chart_Name" for="x_Name" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Name->caption() ?><?php echo $ivf_embryology_chart_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Name->cellAttributes() ?>>
<?php if ($ivf_embryology_chart_add->Name->getSessionValue() != "") { ?>
<span id="el_ivf_embryology_chart_Name">
<span<?php echo $ivf_embryology_chart_add->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_embryology_chart_add->Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_Name" name="x_Name" value="<?php echo HtmlEncode($ivf_embryology_chart_add->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el_ivf_embryology_chart_Name">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Name" name="x_Name" id="x_Name" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Name->EditValue ?>"<?php echo $ivf_embryology_chart_add->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $ivf_embryology_chart_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->ARTCycle->Visible) { // ARTCycle ?>
	<div id="r_ARTCycle" class="form-group row">
		<label id="elh_ivf_embryology_chart_ARTCycle" for="x_ARTCycle" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->ARTCycle->caption() ?><?php echo $ivf_embryology_chart_add->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ARTCycle">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ARTCycle" name="x_ARTCycle" id="x_ARTCycle" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->ARTCycle->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->ARTCycle->EditValue ?>"<?php echo $ivf_embryology_chart_add->ARTCycle->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->ARTCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->SpermOrigin->Visible) { // SpermOrigin ?>
	<div id="r_SpermOrigin" class="form-group row">
		<label id="elh_ivf_embryology_chart_SpermOrigin" for="x_SpermOrigin" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->SpermOrigin->caption() ?><?php echo $ivf_embryology_chart_add->SpermOrigin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->SpermOrigin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SpermOrigin">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SpermOrigin" name="x_SpermOrigin" id="x_SpermOrigin" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->SpermOrigin->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->SpermOrigin->EditValue ?>"<?php echo $ivf_embryology_chart_add->SpermOrigin->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->SpermOrigin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<div id="r_InseminatinTechnique" class="form-group row">
		<label id="elh_ivf_embryology_chart_InseminatinTechnique" for="x_InseminatinTechnique" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->InseminatinTechnique->caption() ?><?php echo $ivf_embryology_chart_add->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_InseminatinTechnique">
<input type="text" data-table="ivf_embryology_chart" data-field="x_InseminatinTechnique" name="x_InseminatinTechnique" id="x_InseminatinTechnique" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->InseminatinTechnique->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->InseminatinTechnique->EditValue ?>"<?php echo $ivf_embryology_chart_add->InseminatinTechnique->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->InseminatinTechnique->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->IndicationForART->Visible) { // IndicationForART ?>
	<div id="r_IndicationForART" class="form-group row">
		<label id="elh_ivf_embryology_chart_IndicationForART" for="x_IndicationForART" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->IndicationForART->caption() ?><?php echo $ivf_embryology_chart_add->IndicationForART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->IndicationForART->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_IndicationForART">
<input type="text" data-table="ivf_embryology_chart" data-field="x_IndicationForART" name="x_IndicationForART" id="x_IndicationForART" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->IndicationForART->EditValue ?>"<?php echo $ivf_embryology_chart_add->IndicationForART->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->IndicationForART->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day0sino->Visible) { // Day0sino ?>
	<div id="r_Day0sino" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day0sino" for="x_Day0sino" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day0sino->caption() ?><?php echo $ivf_embryology_chart_add->Day0sino->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day0sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0sino" name="x_Day0sino" id="x_Day0sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day0sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day0sino->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day0sino->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day0sino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<div id="r_Day0OocyteStage" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day0OocyteStage" for="x_Day0OocyteStage" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day0OocyteStage->caption() ?><?php echo $ivf_embryology_chart_add->Day0OocyteStage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day0OocyteStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0OocyteStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day0OocyteStage" name="x_Day0OocyteStage" id="x_Day0OocyteStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day0OocyteStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day0OocyteStage->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day0OocyteStage->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day0OocyteStage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
	<div id="r_Day0PolarBodyPosition" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day0PolarBodyPosition" for="x_Day0PolarBodyPosition" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day0PolarBodyPosition->caption() ?><?php echo $ivf_embryology_chart_add->Day0PolarBodyPosition->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day0PolarBodyPosition->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0PolarBodyPosition">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0PolarBodyPosition" data-value-separator="<?php echo $ivf_embryology_chart_add->Day0PolarBodyPosition->displayValueSeparatorAttribute() ?>" id="x_Day0PolarBodyPosition" name="x_Day0PolarBodyPosition"<?php echo $ivf_embryology_chart_add->Day0PolarBodyPosition->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day0PolarBodyPosition->selectOptionListHtml("x_Day0PolarBodyPosition") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day0PolarBodyPosition->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day0Breakage->Visible) { // Day0Breakage ?>
	<div id="r_Day0Breakage" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day0Breakage" for="x_Day0Breakage" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day0Breakage->caption() ?><?php echo $ivf_embryology_chart_add->Day0Breakage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day0Breakage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Breakage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0Breakage" data-value-separator="<?php echo $ivf_embryology_chart_add->Day0Breakage->displayValueSeparatorAttribute() ?>" id="x_Day0Breakage" name="x_Day0Breakage"<?php echo $ivf_embryology_chart_add->Day0Breakage->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day0Breakage->selectOptionListHtml("x_Day0Breakage") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day0Breakage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day0Attempts->Visible) { // Day0Attempts ?>
	<div id="r_Day0Attempts" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day0Attempts" for="x_Day0Attempts" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day0Attempts->caption() ?><?php echo $ivf_embryology_chart_add->Day0Attempts->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day0Attempts->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Attempts">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0Attempts" data-value-separator="<?php echo $ivf_embryology_chart_add->Day0Attempts->displayValueSeparatorAttribute() ?>" id="x_Day0Attempts" name="x_Day0Attempts"<?php echo $ivf_embryology_chart_add->Day0Attempts->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day0Attempts->selectOptionListHtml("x_Day0Attempts") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day0Attempts->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
	<div id="r_Day0SPZMorpho" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day0SPZMorpho" for="x_Day0SPZMorpho" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day0SPZMorpho->caption() ?><?php echo $ivf_embryology_chart_add->Day0SPZMorpho->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day0SPZMorpho->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZMorpho">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SPZMorpho" data-value-separator="<?php echo $ivf_embryology_chart_add->Day0SPZMorpho->displayValueSeparatorAttribute() ?>" id="x_Day0SPZMorpho" name="x_Day0SPZMorpho"<?php echo $ivf_embryology_chart_add->Day0SPZMorpho->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day0SPZMorpho->selectOptionListHtml("x_Day0SPZMorpho") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day0SPZMorpho->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
	<div id="r_Day0SPZLocation" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day0SPZLocation" for="x_Day0SPZLocation" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day0SPZLocation->caption() ?><?php echo $ivf_embryology_chart_add->Day0SPZLocation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day0SPZLocation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZLocation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SPZLocation" data-value-separator="<?php echo $ivf_embryology_chart_add->Day0SPZLocation->displayValueSeparatorAttribute() ?>" id="x_Day0SPZLocation" name="x_Day0SPZLocation"<?php echo $ivf_embryology_chart_add->Day0SPZLocation->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day0SPZLocation->selectOptionListHtml("x_Day0SPZLocation") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day0SPZLocation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
	<div id="r_Day0SpOrgin" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day0SpOrgin" for="x_Day0SpOrgin" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day0SpOrgin->caption() ?><?php echo $ivf_embryology_chart_add->Day0SpOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day0SpOrgin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SpOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day0SpOrgin" data-value-separator="<?php echo $ivf_embryology_chart_add->Day0SpOrgin->displayValueSeparatorAttribute() ?>" id="x_Day0SpOrgin" name="x_Day0SpOrgin"<?php echo $ivf_embryology_chart_add->Day0SpOrgin->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day0SpOrgin->selectOptionListHtml("x_Day0SpOrgin") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day0SpOrgin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
	<div id="r_Day5Cryoptop" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day5Cryoptop" for="x_Day5Cryoptop" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day5Cryoptop->caption() ?><?php echo $ivf_embryology_chart_add->Day5Cryoptop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day5Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart_add->Day5Cryoptop->displayValueSeparatorAttribute() ?>" id="x_Day5Cryoptop" name="x_Day5Cryoptop"<?php echo $ivf_embryology_chart_add->Day5Cryoptop->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day5Cryoptop->selectOptionListHtml("x_Day5Cryoptop") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day5Cryoptop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day1Sperm->Visible) { // Day1Sperm ?>
	<div id="r_Day1Sperm" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day1Sperm" for="x_Day1Sperm" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day1Sperm->caption() ?><?php echo $ivf_embryology_chart_add->Day1Sperm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day1Sperm->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Sperm">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day1Sperm" name="x_Day1Sperm" id="x_Day1Sperm" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day1Sperm->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day1Sperm->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day1Sperm->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day1Sperm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day1PN->Visible) { // Day1PN ?>
	<div id="r_Day1PN" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day1PN" for="x_Day1PN" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day1PN->caption() ?><?php echo $ivf_embryology_chart_add->Day1PN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day1PN->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PN">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1PN" data-value-separator="<?php echo $ivf_embryology_chart_add->Day1PN->displayValueSeparatorAttribute() ?>" id="x_Day1PN" name="x_Day1PN"<?php echo $ivf_embryology_chart_add->Day1PN->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day1PN->selectOptionListHtml("x_Day1PN") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day1PN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day1PB->Visible) { // Day1PB ?>
	<div id="r_Day1PB" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day1PB" for="x_Day1PB" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day1PB->caption() ?><?php echo $ivf_embryology_chart_add->Day1PB->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day1PB->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PB">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1PB" data-value-separator="<?php echo $ivf_embryology_chart_add->Day1PB->displayValueSeparatorAttribute() ?>" id="x_Day1PB" name="x_Day1PB"<?php echo $ivf_embryology_chart_add->Day1PB->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day1PB->selectOptionListHtml("x_Day1PB") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day1PB->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
	<div id="r_Day1Pronucleus" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day1Pronucleus" for="x_Day1Pronucleus" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day1Pronucleus->caption() ?><?php echo $ivf_embryology_chart_add->Day1Pronucleus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day1Pronucleus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Pronucleus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Pronucleus" data-value-separator="<?php echo $ivf_embryology_chart_add->Day1Pronucleus->displayValueSeparatorAttribute() ?>" id="x_Day1Pronucleus" name="x_Day1Pronucleus"<?php echo $ivf_embryology_chart_add->Day1Pronucleus->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day1Pronucleus->selectOptionListHtml("x_Day1Pronucleus") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day1Pronucleus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
	<div id="r_Day1Nucleolus" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day1Nucleolus" for="x_Day1Nucleolus" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day1Nucleolus->caption() ?><?php echo $ivf_embryology_chart_add->Day1Nucleolus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day1Nucleolus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Nucleolus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Nucleolus" data-value-separator="<?php echo $ivf_embryology_chart_add->Day1Nucleolus->displayValueSeparatorAttribute() ?>" id="x_Day1Nucleolus" name="x_Day1Nucleolus"<?php echo $ivf_embryology_chart_add->Day1Nucleolus->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day1Nucleolus->selectOptionListHtml("x_Day1Nucleolus") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day1Nucleolus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day1Halo->Visible) { // Day1Halo ?>
	<div id="r_Day1Halo" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day1Halo" for="x_Day1Halo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day1Halo->caption() ?><?php echo $ivf_embryology_chart_add->Day1Halo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day1Halo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Halo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1Halo" data-value-separator="<?php echo $ivf_embryology_chart_add->Day1Halo->displayValueSeparatorAttribute() ?>" id="x_Day1Halo" name="x_Day1Halo"<?php echo $ivf_embryology_chart_add->Day1Halo->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day1Halo->selectOptionListHtml("x_Day1Halo") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day1Halo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day2SiNo->Visible) { // Day2SiNo ?>
	<div id="r_Day2SiNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day2SiNo" for="x_Day2SiNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day2SiNo->caption() ?><?php echo $ivf_embryology_chart_add->Day2SiNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day2SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2SiNo" name="x_Day2SiNo" id="x_Day2SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day2SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day2SiNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day2SiNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day2SiNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day2CellNo->Visible) { // Day2CellNo ?>
	<div id="r_Day2CellNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day2CellNo" for="x_Day2CellNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day2CellNo->caption() ?><?php echo $ivf_embryology_chart_add->Day2CellNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day2CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2CellNo" name="x_Day2CellNo" id="x_Day2CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day2CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day2CellNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day2CellNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day2CellNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day2Frag->Visible) { // Day2Frag ?>
	<div id="r_Day2Frag" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day2Frag" for="x_Day2Frag" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day2Frag->caption() ?><?php echo $ivf_embryology_chart_add->Day2Frag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day2Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Frag" name="x_Day2Frag" id="x_Day2Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day2Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day2Frag->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day2Frag->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day2Frag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day2Symmetry->Visible) { // Day2Symmetry ?>
	<div id="r_Day2Symmetry" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day2Symmetry" for="x_Day2Symmetry" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day2Symmetry->caption() ?><?php echo $ivf_embryology_chart_add->Day2Symmetry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day2Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Symmetry" name="x_Day2Symmetry" id="x_Day2Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day2Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day2Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day2Symmetry->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day2Symmetry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
	<div id="r_Day2Cryoptop" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day2Cryoptop" for="x_Day2Cryoptop" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day2Cryoptop->caption() ?><?php echo $ivf_embryology_chart_add->Day2Cryoptop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day2Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Cryoptop" name="x_Day2Cryoptop" id="x_Day2Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day2Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day2Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day2Cryoptop->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day2Cryoptop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day2Grade->Visible) { // Day2Grade ?>
	<div id="r_Day2Grade" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day2Grade" for="x_Day2Grade" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day2Grade->caption() ?><?php echo $ivf_embryology_chart_add->Day2Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day2Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day2Grade" name="x_Day2Grade" id="x_Day2Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day2Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day2Grade->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day2Grade->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day2Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day2End->Visible) { // Day2End ?>
	<div id="r_Day2End" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day2End" for="x_Day2End" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day2End->caption() ?><?php echo $ivf_embryology_chart_add->Day2End->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day2End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day2End" data-value-separator="<?php echo $ivf_embryology_chart_add->Day2End->displayValueSeparatorAttribute() ?>" id="x_Day2End" name="x_Day2End"<?php echo $ivf_embryology_chart_add->Day2End->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day2End->selectOptionListHtml("x_Day2End") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day2End->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day3Sino->Visible) { // Day3Sino ?>
	<div id="r_Day3Sino" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day3Sino" for="x_Day3Sino" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day3Sino->caption() ?><?php echo $ivf_embryology_chart_add->Day3Sino->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day3Sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Sino">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3Sino" name="x_Day3Sino" id="x_Day3Sino" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day3Sino->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day3Sino->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day3Sino->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day3Sino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day3CellNo->Visible) { // Day3CellNo ?>
	<div id="r_Day3CellNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day3CellNo" for="x_Day3CellNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day3CellNo->caption() ?><?php echo $ivf_embryology_chart_add->Day3CellNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day3CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day3CellNo" name="x_Day3CellNo" id="x_Day3CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day3CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day3CellNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day3CellNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day3CellNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day3Frag->Visible) { // Day3Frag ?>
	<div id="r_Day3Frag" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day3Frag" for="x_Day3Frag" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day3Frag->caption() ?><?php echo $ivf_embryology_chart_add->Day3Frag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day3Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Frag">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Frag" data-value-separator="<?php echo $ivf_embryology_chart_add->Day3Frag->displayValueSeparatorAttribute() ?>" id="x_Day3Frag" name="x_Day3Frag"<?php echo $ivf_embryology_chart_add->Day3Frag->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day3Frag->selectOptionListHtml("x_Day3Frag") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day3Frag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day3Symmetry->Visible) { // Day3Symmetry ?>
	<div id="r_Day3Symmetry" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day3Symmetry" for="x_Day3Symmetry" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day3Symmetry->caption() ?><?php echo $ivf_embryology_chart_add->Day3Symmetry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day3Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Symmetry">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Symmetry" data-value-separator="<?php echo $ivf_embryology_chart_add->Day3Symmetry->displayValueSeparatorAttribute() ?>" id="x_Day3Symmetry" name="x_Day3Symmetry"<?php echo $ivf_embryology_chart_add->Day3Symmetry->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day3Symmetry->selectOptionListHtml("x_Day3Symmetry") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day3Symmetry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day3ZP->Visible) { // Day3ZP ?>
	<div id="r_Day3ZP" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day3ZP" for="x_Day3ZP" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day3ZP->caption() ?><?php echo $ivf_embryology_chart_add->Day3ZP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day3ZP->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3ZP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3ZP" data-value-separator="<?php echo $ivf_embryology_chart_add->Day3ZP->displayValueSeparatorAttribute() ?>" id="x_Day3ZP" name="x_Day3ZP"<?php echo $ivf_embryology_chart_add->Day3ZP->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day3ZP->selectOptionListHtml("x_Day3ZP") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day3ZP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day3Vacoules->Visible) { // Day3Vacoules ?>
	<div id="r_Day3Vacoules" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day3Vacoules" for="x_Day3Vacoules" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day3Vacoules->caption() ?><?php echo $ivf_embryology_chart_add->Day3Vacoules->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day3Vacoules->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Vacoules">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Vacoules" data-value-separator="<?php echo $ivf_embryology_chart_add->Day3Vacoules->displayValueSeparatorAttribute() ?>" id="x_Day3Vacoules" name="x_Day3Vacoules"<?php echo $ivf_embryology_chart_add->Day3Vacoules->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day3Vacoules->selectOptionListHtml("x_Day3Vacoules") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day3Vacoules->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day3Grade->Visible) { // Day3Grade ?>
	<div id="r_Day3Grade" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day3Grade" for="x_Day3Grade" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day3Grade->caption() ?><?php echo $ivf_embryology_chart_add->Day3Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day3Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Grade" data-value-separator="<?php echo $ivf_embryology_chart_add->Day3Grade->displayValueSeparatorAttribute() ?>" id="x_Day3Grade" name="x_Day3Grade"<?php echo $ivf_embryology_chart_add->Day3Grade->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day3Grade->selectOptionListHtml("x_Day3Grade") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day3Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
	<div id="r_Day3Cryoptop" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day3Cryoptop" for="x_Day3Cryoptop" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day3Cryoptop->caption() ?><?php echo $ivf_embryology_chart_add->Day3Cryoptop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day3Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart_add->Day3Cryoptop->displayValueSeparatorAttribute() ?>" id="x_Day3Cryoptop" name="x_Day3Cryoptop"<?php echo $ivf_embryology_chart_add->Day3Cryoptop->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day3Cryoptop->selectOptionListHtml("x_Day3Cryoptop") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day3Cryoptop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day3End->Visible) { // Day3End ?>
	<div id="r_Day3End" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day3End" for="x_Day3End" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day3End->caption() ?><?php echo $ivf_embryology_chart_add->Day3End->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day3End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day3End" data-value-separator="<?php echo $ivf_embryology_chart_add->Day3End->displayValueSeparatorAttribute() ?>" id="x_Day3End" name="x_Day3End"<?php echo $ivf_embryology_chart_add->Day3End->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day3End->selectOptionListHtml("x_Day3End") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day3End->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day4SiNo->Visible) { // Day4SiNo ?>
	<div id="r_Day4SiNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day4SiNo" for="x_Day4SiNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day4SiNo->caption() ?><?php echo $ivf_embryology_chart_add->Day4SiNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day4SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4SiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4SiNo" name="x_Day4SiNo" id="x_Day4SiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day4SiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day4SiNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day4SiNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day4SiNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day4CellNo->Visible) { // Day4CellNo ?>
	<div id="r_Day4CellNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day4CellNo" for="x_Day4CellNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day4CellNo->caption() ?><?php echo $ivf_embryology_chart_add->Day4CellNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day4CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4CellNo" name="x_Day4CellNo" id="x_Day4CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day4CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day4CellNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day4CellNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day4CellNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day4Frag->Visible) { // Day4Frag ?>
	<div id="r_Day4Frag" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day4Frag" for="x_Day4Frag" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day4Frag->caption() ?><?php echo $ivf_embryology_chart_add->Day4Frag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day4Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Frag">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Frag" name="x_Day4Frag" id="x_Day4Frag" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day4Frag->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day4Frag->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day4Frag->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day4Frag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day4Symmetry->Visible) { // Day4Symmetry ?>
	<div id="r_Day4Symmetry" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day4Symmetry" for="x_Day4Symmetry" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day4Symmetry->caption() ?><?php echo $ivf_embryology_chart_add->Day4Symmetry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day4Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Symmetry">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Symmetry" name="x_Day4Symmetry" id="x_Day4Symmetry" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day4Symmetry->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day4Symmetry->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day4Symmetry->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day4Symmetry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day4Grade->Visible) { // Day4Grade ?>
	<div id="r_Day4Grade" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day4Grade" for="x_Day4Grade" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day4Grade->caption() ?><?php echo $ivf_embryology_chart_add->Day4Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day4Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Grade">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day4Grade" name="x_Day4Grade" id="x_Day4Grade" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day4Grade->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day4Grade->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day4Grade->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day4Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
	<div id="r_Day4Cryoptop" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day4Cryoptop" for="x_Day4Cryoptop" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day4Cryoptop->caption() ?><?php echo $ivf_embryology_chart_add->Day4Cryoptop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day4Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Cryoptop">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4Cryoptop" data-value-separator="<?php echo $ivf_embryology_chart_add->Day4Cryoptop->displayValueSeparatorAttribute() ?>" id="x_Day4Cryoptop" name="x_Day4Cryoptop"<?php echo $ivf_embryology_chart_add->Day4Cryoptop->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day4Cryoptop->selectOptionListHtml("x_Day4Cryoptop") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day4Cryoptop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day4End->Visible) { // Day4End ?>
	<div id="r_Day4End" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day4End" for="x_Day4End" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day4End->caption() ?><?php echo $ivf_embryology_chart_add->Day4End->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day4End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day4End" data-value-separator="<?php echo $ivf_embryology_chart_add->Day4End->displayValueSeparatorAttribute() ?>" id="x_Day4End" name="x_Day4End"<?php echo $ivf_embryology_chart_add->Day4End->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day4End->selectOptionListHtml("x_Day4End") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day4End->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day5CellNo->Visible) { // Day5CellNo ?>
	<div id="r_Day5CellNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day5CellNo" for="x_Day5CellNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day5CellNo->caption() ?><?php echo $ivf_embryology_chart_add->Day5CellNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day5CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day5CellNo" name="x_Day5CellNo" id="x_Day5CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day5CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day5CellNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day5CellNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day5CellNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day5ICM->Visible) { // Day5ICM ?>
	<div id="r_Day5ICM" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day5ICM" for="x_Day5ICM" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day5ICM->caption() ?><?php echo $ivf_embryology_chart_add->Day5ICM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day5ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5ICM" data-value-separator="<?php echo $ivf_embryology_chart_add->Day5ICM->displayValueSeparatorAttribute() ?>" id="x_Day5ICM" name="x_Day5ICM"<?php echo $ivf_embryology_chart_add->Day5ICM->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day5ICM->selectOptionListHtml("x_Day5ICM") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day5ICM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day5TE->Visible) { // Day5TE ?>
	<div id="r_Day5TE" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day5TE" for="x_Day5TE" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day5TE->caption() ?><?php echo $ivf_embryology_chart_add->Day5TE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day5TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5TE" data-value-separator="<?php echo $ivf_embryology_chart_add->Day5TE->displayValueSeparatorAttribute() ?>" id="x_Day5TE" name="x_Day5TE"<?php echo $ivf_embryology_chart_add->Day5TE->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day5TE->selectOptionListHtml("x_Day5TE") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day5TE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day5Observation->Visible) { // Day5Observation ?>
	<div id="r_Day5Observation" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day5Observation" for="x_Day5Observation" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day5Observation->caption() ?><?php echo $ivf_embryology_chart_add->Day5Observation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day5Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Observation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Observation" data-value-separator="<?php echo $ivf_embryology_chart_add->Day5Observation->displayValueSeparatorAttribute() ?>" id="x_Day5Observation" name="x_Day5Observation"<?php echo $ivf_embryology_chart_add->Day5Observation->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day5Observation->selectOptionListHtml("x_Day5Observation") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day5Observation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day5Collapsed->Visible) { // Day5Collapsed ?>
	<div id="r_Day5Collapsed" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day5Collapsed" for="x_Day5Collapsed" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day5Collapsed->caption() ?><?php echo $ivf_embryology_chart_add->Day5Collapsed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day5Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Collapsed" data-value-separator="<?php echo $ivf_embryology_chart_add->Day5Collapsed->displayValueSeparatorAttribute() ?>" id="x_Day5Collapsed" name="x_Day5Collapsed"<?php echo $ivf_embryology_chart_add->Day5Collapsed->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day5Collapsed->selectOptionListHtml("x_Day5Collapsed") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day5Collapsed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
	<div id="r_Day5Vacoulles" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day5Vacoulles" for="x_Day5Vacoulles" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day5Vacoulles->caption() ?><?php echo $ivf_embryology_chart_add->Day5Vacoulles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day5Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Vacoulles">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Vacoulles" data-value-separator="<?php echo $ivf_embryology_chart_add->Day5Vacoulles->displayValueSeparatorAttribute() ?>" id="x_Day5Vacoulles" name="x_Day5Vacoulles"<?php echo $ivf_embryology_chart_add->Day5Vacoulles->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day5Vacoulles->selectOptionListHtml("x_Day5Vacoulles") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day5Vacoulles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day5Grade->Visible) { // Day5Grade ?>
	<div id="r_Day5Grade" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day5Grade" for="x_Day5Grade" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day5Grade->caption() ?><?php echo $ivf_embryology_chart_add->Day5Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day5Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day5Grade" data-value-separator="<?php echo $ivf_embryology_chart_add->Day5Grade->displayValueSeparatorAttribute() ?>" id="x_Day5Grade" name="x_Day5Grade"<?php echo $ivf_embryology_chart_add->Day5Grade->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day5Grade->selectOptionListHtml("x_Day5Grade") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day5Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day6CellNo->Visible) { // Day6CellNo ?>
	<div id="r_Day6CellNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day6CellNo" for="x_Day6CellNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day6CellNo->caption() ?><?php echo $ivf_embryology_chart_add->Day6CellNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day6CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6CellNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6CellNo" name="x_Day6CellNo" id="x_Day6CellNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day6CellNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day6CellNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day6CellNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day6CellNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day6ICM->Visible) { // Day6ICM ?>
	<div id="r_Day6ICM" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day6ICM" for="x_Day6ICM" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day6ICM->caption() ?><?php echo $ivf_embryology_chart_add->Day6ICM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day6ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6ICM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6ICM" data-value-separator="<?php echo $ivf_embryology_chart_add->Day6ICM->displayValueSeparatorAttribute() ?>" id="x_Day6ICM" name="x_Day6ICM"<?php echo $ivf_embryology_chart_add->Day6ICM->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day6ICM->selectOptionListHtml("x_Day6ICM") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day6ICM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day6TE->Visible) { // Day6TE ?>
	<div id="r_Day6TE" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day6TE" for="x_Day6TE" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day6TE->caption() ?><?php echo $ivf_embryology_chart_add->Day6TE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day6TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6TE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6TE" data-value-separator="<?php echo $ivf_embryology_chart_add->Day6TE->displayValueSeparatorAttribute() ?>" id="x_Day6TE" name="x_Day6TE"<?php echo $ivf_embryology_chart_add->Day6TE->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day6TE->selectOptionListHtml("x_Day6TE") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day6TE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day6Observation->Visible) { // Day6Observation ?>
	<div id="r_Day6Observation" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day6Observation" for="x_Day6Observation" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day6Observation->caption() ?><?php echo $ivf_embryology_chart_add->Day6Observation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day6Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Observation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Observation" data-value-separator="<?php echo $ivf_embryology_chart_add->Day6Observation->displayValueSeparatorAttribute() ?>" id="x_Day6Observation" name="x_Day6Observation"<?php echo $ivf_embryology_chart_add->Day6Observation->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day6Observation->selectOptionListHtml("x_Day6Observation") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day6Observation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day6Collapsed->Visible) { // Day6Collapsed ?>
	<div id="r_Day6Collapsed" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day6Collapsed" for="x_Day6Collapsed" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day6Collapsed->caption() ?><?php echo $ivf_embryology_chart_add->Day6Collapsed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day6Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Collapsed">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Collapsed" data-value-separator="<?php echo $ivf_embryology_chart_add->Day6Collapsed->displayValueSeparatorAttribute() ?>" id="x_Day6Collapsed" name="x_Day6Collapsed"<?php echo $ivf_embryology_chart_add->Day6Collapsed->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day6Collapsed->selectOptionListHtml("x_Day6Collapsed") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day6Collapsed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
	<div id="r_Day6Vacoulles" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day6Vacoulles" for="x_Day6Vacoulles" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day6Vacoulles->caption() ?><?php echo $ivf_embryology_chart_add->Day6Vacoulles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day6Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Vacoulles">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Vacoulles" data-value-separator="<?php echo $ivf_embryology_chart_add->Day6Vacoulles->displayValueSeparatorAttribute() ?>" id="x_Day6Vacoulles" name="x_Day6Vacoulles"<?php echo $ivf_embryology_chart_add->Day6Vacoulles->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day6Vacoulles->selectOptionListHtml("x_Day6Vacoulles") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day6Vacoulles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day6Grade->Visible) { // Day6Grade ?>
	<div id="r_Day6Grade" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day6Grade" for="x_Day6Grade" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day6Grade->caption() ?><?php echo $ivf_embryology_chart_add->Day6Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day6Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day6Grade" data-value-separator="<?php echo $ivf_embryology_chart_add->Day6Grade->displayValueSeparatorAttribute() ?>" id="x_Day6Grade" name="x_Day6Grade"<?php echo $ivf_embryology_chart_add->Day6Grade->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day6Grade->selectOptionListHtml("x_Day6Grade") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day6Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
	<div id="r_Day6Cryoptop" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day6Cryoptop" for="x_Day6Cryoptop" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day6Cryoptop->caption() ?><?php echo $ivf_embryology_chart_add->Day6Cryoptop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day6Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Cryoptop">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Day6Cryoptop" name="x_Day6Cryoptop" id="x_Day6Cryoptop" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Day6Cryoptop->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Day6Cryoptop->EditValue ?>"<?php echo $ivf_embryology_chart_add->Day6Cryoptop->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Day6Cryoptop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->EndSiNo->Visible) { // EndSiNo ?>
	<div id="r_EndSiNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_EndSiNo" for="x_EndSiNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->EndSiNo->caption() ?><?php echo $ivf_embryology_chart_add->EndSiNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->EndSiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndSiNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_EndSiNo" name="x_EndSiNo" id="x_EndSiNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->EndSiNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->EndSiNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->EndSiNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->EndSiNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->EndingDay->Visible) { // EndingDay ?>
	<div id="r_EndingDay" class="form-group row">
		<label id="elh_ivf_embryology_chart_EndingDay" for="x_EndingDay" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->EndingDay->caption() ?><?php echo $ivf_embryology_chart_add->EndingDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->EndingDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingDay" data-value-separator="<?php echo $ivf_embryology_chart_add->EndingDay->displayValueSeparatorAttribute() ?>" id="x_EndingDay" name="x_EndingDay"<?php echo $ivf_embryology_chart_add->EndingDay->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->EndingDay->selectOptionListHtml("x_EndingDay") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->EndingDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->EndingCellStage->Visible) { // EndingCellStage ?>
	<div id="r_EndingCellStage" class="form-group row">
		<label id="elh_ivf_embryology_chart_EndingCellStage" for="x_EndingCellStage" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->EndingCellStage->caption() ?><?php echo $ivf_embryology_chart_add->EndingCellStage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->EndingCellStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingCellStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_EndingCellStage" name="x_EndingCellStage" id="x_EndingCellStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->EndingCellStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->EndingCellStage->EditValue ?>"<?php echo $ivf_embryology_chart_add->EndingCellStage->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->EndingCellStage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->EndingGrade->Visible) { // EndingGrade ?>
	<div id="r_EndingGrade" class="form-group row">
		<label id="elh_ivf_embryology_chart_EndingGrade" for="x_EndingGrade" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->EndingGrade->caption() ?><?php echo $ivf_embryology_chart_add->EndingGrade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->EndingGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingGrade" data-value-separator="<?php echo $ivf_embryology_chart_add->EndingGrade->displayValueSeparatorAttribute() ?>" id="x_EndingGrade" name="x_EndingGrade"<?php echo $ivf_embryology_chart_add->EndingGrade->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->EndingGrade->selectOptionListHtml("x_EndingGrade") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->EndingGrade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->EndingState->Visible) { // EndingState ?>
	<div id="r_EndingState" class="form-group row">
		<label id="elh_ivf_embryology_chart_EndingState" for="x_EndingState" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->EndingState->caption() ?><?php echo $ivf_embryology_chart_add->EndingState->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->EndingState->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingState">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_EndingState" data-value-separator="<?php echo $ivf_embryology_chart_add->EndingState->displayValueSeparatorAttribute() ?>" id="x_EndingState" name="x_EndingState"<?php echo $ivf_embryology_chart_add->EndingState->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->EndingState->selectOptionListHtml("x_EndingState") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->EndingState->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_TidNo" for="x_TidNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->TidNo->caption() ?><?php echo $ivf_embryology_chart_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->TidNo->cellAttributes() ?>>
<?php if ($ivf_embryology_chart_add->TidNo->getSessionValue() != "") { ?>
<span id="el_ivf_embryology_chart_TidNo">
<span<?php echo $ivf_embryology_chart_add->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_embryology_chart_add->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?php echo HtmlEncode($ivf_embryology_chart_add->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el_ivf_embryology_chart_TidNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->TidNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $ivf_embryology_chart_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->DidNO->Visible) { // DidNO ?>
	<div id="r_DidNO" class="form-group row">
		<label id="elh_ivf_embryology_chart_DidNO" for="x_DidNO" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->DidNO->caption() ?><?php echo $ivf_embryology_chart_add->DidNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->DidNO->cellAttributes() ?>>
<?php if ($ivf_embryology_chart_add->DidNO->getSessionValue() != "") { ?>
<span id="el_ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart_add->DidNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_embryology_chart_add->DidNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_DidNO" name="x_DidNO" value="<?php echo HtmlEncode($ivf_embryology_chart_add->DidNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el_ivf_embryology_chart_DidNO">
<input type="text" data-table="ivf_embryology_chart" data-field="x_DidNO" name="x_DidNO" id="x_DidNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->DidNO->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->DidNO->EditValue ?>"<?php echo $ivf_embryology_chart_add->DidNO->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $ivf_embryology_chart_add->DidNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
	<div id="r_ICSiIVFDateTime" class="form-group row">
		<label id="elh_ivf_embryology_chart_ICSiIVFDateTime" for="x_ICSiIVFDateTime" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->ICSiIVFDateTime->caption() ?><?php echo $ivf_embryology_chart_add->ICSiIVFDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->ICSiIVFDateTime->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ICSiIVFDateTime">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ICSiIVFDateTime" name="x_ICSiIVFDateTime" id="x_ICSiIVFDateTime" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->ICSiIVFDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->ICSiIVFDateTime->EditValue ?>"<?php echo $ivf_embryology_chart_add->ICSiIVFDateTime->editAttributes() ?>>
<?php if (!$ivf_embryology_chart_add->ICSiIVFDateTime->ReadOnly && !$ivf_embryology_chart_add->ICSiIVFDateTime->Disabled && !isset($ivf_embryology_chart_add->ICSiIVFDateTime->EditAttrs["readonly"]) && !isset($ivf_embryology_chart_add->ICSiIVFDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_embryology_chartadd", "x_ICSiIVFDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $ivf_embryology_chart_add->ICSiIVFDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
	<div id="r_PrimaryEmbrologist" class="form-group row">
		<label id="elh_ivf_embryology_chart_PrimaryEmbrologist" for="x_PrimaryEmbrologist" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->PrimaryEmbrologist->caption() ?><?php echo $ivf_embryology_chart_add->PrimaryEmbrologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->PrimaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_PrimaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_PrimaryEmbrologist" name="x_PrimaryEmbrologist" id="x_PrimaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->PrimaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->PrimaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart_add->PrimaryEmbrologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->PrimaryEmbrologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
	<div id="r_SecondaryEmbrologist" class="form-group row">
		<label id="elh_ivf_embryology_chart_SecondaryEmbrologist" for="x_SecondaryEmbrologist" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->SecondaryEmbrologist->caption() ?><?php echo $ivf_embryology_chart_add->SecondaryEmbrologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->SecondaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SecondaryEmbrologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_SecondaryEmbrologist" name="x_SecondaryEmbrologist" id="x_SecondaryEmbrologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->SecondaryEmbrologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->SecondaryEmbrologist->EditValue ?>"<?php echo $ivf_embryology_chart_add->SecondaryEmbrologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->SecondaryEmbrologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Incubator->Visible) { // Incubator ?>
	<div id="r_Incubator" class="form-group row">
		<label id="elh_ivf_embryology_chart_Incubator" for="x_Incubator" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Incubator->caption() ?><?php echo $ivf_embryology_chart_add->Incubator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Incubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Incubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Incubator" name="x_Incubator" id="x_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Incubator->EditValue ?>"<?php echo $ivf_embryology_chart_add->Incubator->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Incubator->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->location->Visible) { // location ?>
	<div id="r_location" class="form-group row">
		<label id="elh_ivf_embryology_chart_location" for="x_location" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->location->caption() ?><?php echo $ivf_embryology_chart_add->location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->location->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_location">
<input type="text" data-table="ivf_embryology_chart" data-field="x_location" name="x_location" id="x_location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->location->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->location->EditValue ?>"<?php echo $ivf_embryology_chart_add->location->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->location->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->OocyteNo->Visible) { // OocyteNo ?>
	<div id="r_OocyteNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_OocyteNo" for="x_OocyteNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->OocyteNo->caption() ?><?php echo $ivf_embryology_chart_add->OocyteNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_OocyteNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_OocyteNo" name="x_OocyteNo" id="x_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->OocyteNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->OocyteNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->OocyteNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Stage->Visible) { // Stage ?>
	<div id="r_Stage" class="form-group row">
		<label id="elh_ivf_embryology_chart_Stage" for="x_Stage" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Stage->caption() ?><?php echo $ivf_embryology_chart_add->Stage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Stage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Stage" data-value-separator="<?php echo $ivf_embryology_chart_add->Stage->displayValueSeparatorAttribute() ?>" id="x_Stage" name="x_Stage"<?php echo $ivf_embryology_chart_add->Stage->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Stage->selectOptionListHtml("x_Stage") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Stage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_ivf_embryology_chart_Remarks" for="x_Remarks" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Remarks->caption() ?><?php echo $ivf_embryology_chart_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Remarks->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Remarks">
<input type="text" data-table="ivf_embryology_chart" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->Remarks->EditValue ?>"<?php echo $ivf_embryology_chart_add->Remarks->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitrificationDate->Visible) { // vitrificationDate ?>
	<div id="r_vitrificationDate" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitrificationDate" for="x_vitrificationDate" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitrificationDate->caption() ?><?php echo $ivf_embryology_chart_add->vitrificationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitrificationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitrificationDate" name="x_vitrificationDate" id="x_vitrificationDate" size="12" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitrificationDate->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart_add->vitrificationDate->ReadOnly && !$ivf_embryology_chart_add->vitrificationDate->Disabled && !isset($ivf_embryology_chart_add->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart_add->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_embryology_chartadd", "x_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $ivf_embryology_chart_add->vitrificationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
	<div id="r_vitriPrimaryEmbryologist" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist" for="x_vitriPrimaryEmbryologist" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriPrimaryEmbryologist->caption() ?><?php echo $ivf_embryology_chart_add->vitriPrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriPrimaryEmbryologist" name="x_vitriPrimaryEmbryologist" id="x_vitriPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriPrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
	<div id="r_vitriSecondaryEmbryologist" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist" for="x_vitriSecondaryEmbryologist" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriSecondaryEmbryologist->caption() ?><?php echo $ivf_embryology_chart_add->vitriSecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriSecondaryEmbryologist" name="x_vitriSecondaryEmbryologist" id="x_vitriSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriSecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
	<div id="r_vitriEmbryoNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriEmbryoNo" for="x_vitriEmbryoNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriEmbryoNo->caption() ?><?php echo $ivf_embryology_chart_add->vitriEmbryoNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriEmbryoNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriEmbryoNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriEmbryoNo" name="x_vitriEmbryoNo" id="x_vitriEmbryoNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriEmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriEmbryoNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriEmbryoNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriEmbryoNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->thawReFrozen->Visible) { // thawReFrozen ?>
	<div id="r_thawReFrozen" class="form-group row">
		<label id="elh_ivf_embryology_chart_thawReFrozen" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->thawReFrozen->caption() ?><?php echo $ivf_embryology_chart_add->thawReFrozen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawReFrozen">
<div id="tp_x_thawReFrozen" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_thawReFrozen" data-value-separator="<?php echo $ivf_embryology_chart_add->thawReFrozen->displayValueSeparatorAttribute() ?>" name="x_thawReFrozen[]" id="x_thawReFrozen[]" value="{value}"<?php echo $ivf_embryology_chart_add->thawReFrozen->editAttributes() ?>></div>
<div id="dsl_x_thawReFrozen" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart_add->thawReFrozen->checkBoxListHtml(FALSE, "x_thawReFrozen[]") ?>
</div></div>
</span>
<?php echo $ivf_embryology_chart_add->thawReFrozen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
	<div id="r_vitriFertilisationDate" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriFertilisationDate" for="x_vitriFertilisationDate" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriFertilisationDate->caption() ?><?php echo $ivf_embryology_chart_add->vitriFertilisationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriFertilisationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriFertilisationDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriFertilisationDate" name="x_vitriFertilisationDate" id="x_vitriFertilisationDate" size="12" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriFertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriFertilisationDate->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriFertilisationDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart_add->vitriFertilisationDate->ReadOnly && !$ivf_embryology_chart_add->vitriFertilisationDate->Disabled && !isset($ivf_embryology_chart_add->vitriFertilisationDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart_add->vitriFertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_embryology_chartadd", "x_vitriFertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $ivf_embryology_chart_add->vitriFertilisationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriDay->Visible) { // vitriDay ?>
	<div id="r_vitriDay" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriDay" for="x_vitriDay" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriDay->caption() ?><?php echo $ivf_embryology_chart_add->vitriDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriDay">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriDay" data-value-separator="<?php echo $ivf_embryology_chart_add->vitriDay->displayValueSeparatorAttribute() ?>" id="x_vitriDay" name="x_vitriDay"<?php echo $ivf_embryology_chart_add->vitriDay->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->vitriDay->selectOptionListHtml("x_vitriDay") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->vitriDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriStage->Visible) { // vitriStage ?>
	<div id="r_vitriStage" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriStage" for="x_vitriStage" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriStage->caption() ?><?php echo $ivf_embryology_chart_add->vitriStage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriStage">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriStage" name="x_vitriStage" id="x_vitriStage" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriStage->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriStage->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriStage->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriStage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriGrade->Visible) { // vitriGrade ?>
	<div id="r_vitriGrade" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriGrade" for="x_vitriGrade" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriGrade->caption() ?><?php echo $ivf_embryology_chart_add->vitriGrade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGrade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_vitriGrade" data-value-separator="<?php echo $ivf_embryology_chart_add->vitriGrade->displayValueSeparatorAttribute() ?>" id="x_vitriGrade" name="x_vitriGrade"<?php echo $ivf_embryology_chart_add->vitriGrade->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->vitriGrade->selectOptionListHtml("x_vitriGrade") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->vitriGrade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriIncubator->Visible) { // vitriIncubator ?>
	<div id="r_vitriIncubator" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriIncubator" for="x_vitriIncubator" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriIncubator->caption() ?><?php echo $ivf_embryology_chart_add->vitriIncubator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriIncubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriIncubator">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriIncubator" name="x_vitriIncubator" id="x_vitriIncubator" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriIncubator->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriIncubator->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriIncubator->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriIncubator->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriTank->Visible) { // vitriTank ?>
	<div id="r_vitriTank" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriTank" for="x_vitriTank" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriTank->caption() ?><?php echo $ivf_embryology_chart_add->vitriTank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriTank->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriTank">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriTank" name="x_vitriTank" id="x_vitriTank" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriTank->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriTank->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriTank->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriTank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriCanister->Visible) { // vitriCanister ?>
	<div id="r_vitriCanister" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriCanister" for="x_vitriCanister" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriCanister->caption() ?><?php echo $ivf_embryology_chart_add->vitriCanister->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriCanister->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCanister">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCanister" name="x_vitriCanister" id="x_vitriCanister" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriCanister->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriCanister->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriCanister->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriCanister->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriGobiet->Visible) { // vitriGobiet ?>
	<div id="r_vitriGobiet" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriGobiet" for="x_vitriGobiet" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriGobiet->caption() ?><?php echo $ivf_embryology_chart_add->vitriGobiet->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriGobiet->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGobiet">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriGobiet" name="x_vitriGobiet" id="x_vitriGobiet" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriGobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriGobiet->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriGobiet->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriGobiet->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriViscotube->Visible) { // vitriViscotube ?>
	<div id="r_vitriViscotube" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriViscotube" for="x_vitriViscotube" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriViscotube->caption() ?><?php echo $ivf_embryology_chart_add->vitriViscotube->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriViscotube->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriViscotube">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriViscotube" name="x_vitriViscotube" id="x_vitriViscotube" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriViscotube->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriViscotube->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriViscotube->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriViscotube->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
	<div id="r_vitriCryolockNo" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriCryolockNo" for="x_vitriCryolockNo" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriCryolockNo->caption() ?><?php echo $ivf_embryology_chart_add->vitriCryolockNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriCryolockNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockNo">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockNo" name="x_vitriCryolockNo" id="x_vitriCryolockNo" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriCryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriCryolockNo->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriCryolockNo->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriCryolockNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
	<div id="r_vitriCryolockColour" class="form-group row">
		<label id="elh_ivf_embryology_chart_vitriCryolockColour" for="x_vitriCryolockColour" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->vitriCryolockColour->caption() ?><?php echo $ivf_embryology_chart_add->vitriCryolockColour->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->vitriCryolockColour->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockColour">
<input type="text" data-table="ivf_embryology_chart" data-field="x_vitriCryolockColour" name="x_vitriCryolockColour" id="x_vitriCryolockColour" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->vitriCryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->vitriCryolockColour->EditValue ?>"<?php echo $ivf_embryology_chart_add->vitriCryolockColour->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->vitriCryolockColour->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->thawDate->Visible) { // thawDate ?>
	<div id="r_thawDate" class="form-group row">
		<label id="elh_ivf_embryology_chart_thawDate" for="x_thawDate" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->thawDate->caption() ?><?php echo $ivf_embryology_chart_add->thawDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->thawDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->thawDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->thawDate->EditValue ?>"<?php echo $ivf_embryology_chart_add->thawDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart_add->thawDate->ReadOnly && !$ivf_embryology_chart_add->thawDate->Disabled && !isset($ivf_embryology_chart_add->thawDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart_add->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_embryology_chartadd", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $ivf_embryology_chart_add->thawDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<div id="r_thawPrimaryEmbryologist" class="form-group row">
		<label id="elh_ivf_embryology_chart_thawPrimaryEmbryologist" for="x_thawPrimaryEmbryologist" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->thawPrimaryEmbryologist->caption() ?><?php echo $ivf_embryology_chart_add->thawPrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawPrimaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->thawPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart_add->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->thawPrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<div id="r_thawSecondaryEmbryologist" class="form-group row">
		<label id="elh_ivf_embryology_chart_thawSecondaryEmbryologist" for="x_thawSecondaryEmbryologist" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->thawSecondaryEmbryologist->caption() ?><?php echo $ivf_embryology_chart_add->thawSecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawSecondaryEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->thawSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart_add->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->thawSecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->thawET->Visible) { // thawET ?>
	<div id="r_thawET" class="form-group row">
		<label id="elh_ivf_embryology_chart_thawET" for="x_thawET" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->thawET->caption() ?><?php echo $ivf_embryology_chart_add->thawET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->thawET->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_thawET" data-value-separator="<?php echo $ivf_embryology_chart_add->thawET->displayValueSeparatorAttribute() ?>" id="x_thawET" name="x_thawET"<?php echo $ivf_embryology_chart_add->thawET->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->thawET->selectOptionListHtml("x_thawET") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->thawET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->thawAbserve->Visible) { // thawAbserve ?>
	<div id="r_thawAbserve" class="form-group row">
		<label id="elh_ivf_embryology_chart_thawAbserve" for="x_thawAbserve" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->thawAbserve->caption() ?><?php echo $ivf_embryology_chart_add->thawAbserve->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawAbserve">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawAbserve" name="x_thawAbserve" id="x_thawAbserve" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->thawAbserve->EditValue ?>"<?php echo $ivf_embryology_chart_add->thawAbserve->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->thawAbserve->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->thawDiscard->Visible) { // thawDiscard ?>
	<div id="r_thawDiscard" class="form-group row">
		<label id="elh_ivf_embryology_chart_thawDiscard" for="x_thawDiscard" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->thawDiscard->caption() ?><?php echo $ivf_embryology_chart_add->thawDiscard->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDiscard">
<input type="text" data-table="ivf_embryology_chart" data-field="x_thawDiscard" name="x_thawDiscard" id="x_thawDiscard" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->thawDiscard->EditValue ?>"<?php echo $ivf_embryology_chart_add->thawDiscard->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->thawDiscard->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->ETCatheter->Visible) { // ETCatheter ?>
	<div id="r_ETCatheter" class="form-group row">
		<label id="elh_ivf_embryology_chart_ETCatheter" for="x_ETCatheter" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->ETCatheter->caption() ?><?php echo $ivf_embryology_chart_add->ETCatheter->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->ETCatheter->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETCatheter">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETCatheter" name="x_ETCatheter" id="x_ETCatheter" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->ETCatheter->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->ETCatheter->EditValue ?>"<?php echo $ivf_embryology_chart_add->ETCatheter->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->ETCatheter->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->ETDifficulty->Visible) { // ETDifficulty ?>
	<div id="r_ETDifficulty" class="form-group row">
		<label id="elh_ivf_embryology_chart_ETDifficulty" for="x_ETDifficulty" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->ETDifficulty->caption() ?><?php echo $ivf_embryology_chart_add->ETDifficulty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->ETDifficulty->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDifficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_ETDifficulty" data-value-separator="<?php echo $ivf_embryology_chart_add->ETDifficulty->displayValueSeparatorAttribute() ?>" id="x_ETDifficulty" name="x_ETDifficulty"<?php echo $ivf_embryology_chart_add->ETDifficulty->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->ETDifficulty->selectOptionListHtml("x_ETDifficulty") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->ETDifficulty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->ETEasy->Visible) { // ETEasy ?>
	<div id="r_ETEasy" class="form-group row">
		<label id="elh_ivf_embryology_chart_ETEasy" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->ETEasy->caption() ?><?php echo $ivf_embryology_chart_add->ETEasy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->ETEasy->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEasy">
<div id="tp_x_ETEasy" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_embryology_chart" data-field="x_ETEasy" data-value-separator="<?php echo $ivf_embryology_chart_add->ETEasy->displayValueSeparatorAttribute() ?>" name="x_ETEasy[]" id="x_ETEasy[]" value="{value}"<?php echo $ivf_embryology_chart_add->ETEasy->editAttributes() ?>></div>
<div id="dsl_x_ETEasy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_embryology_chart_add->ETEasy->checkBoxListHtml(FALSE, "x_ETEasy[]") ?>
</div></div>
</span>
<?php echo $ivf_embryology_chart_add->ETEasy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->ETComments->Visible) { // ETComments ?>
	<div id="r_ETComments" class="form-group row">
		<label id="elh_ivf_embryology_chart_ETComments" for="x_ETComments" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->ETComments->caption() ?><?php echo $ivf_embryology_chart_add->ETComments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->ETComments->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETComments">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETComments" name="x_ETComments" id="x_ETComments" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->ETComments->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->ETComments->EditValue ?>"<?php echo $ivf_embryology_chart_add->ETComments->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->ETComments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->ETDoctor->Visible) { // ETDoctor ?>
	<div id="r_ETDoctor" class="form-group row">
		<label id="elh_ivf_embryology_chart_ETDoctor" for="x_ETDoctor" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->ETDoctor->caption() ?><?php echo $ivf_embryology_chart_add->ETDoctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->ETDoctor->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDoctor">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDoctor" name="x_ETDoctor" id="x_ETDoctor" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->ETDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->ETDoctor->EditValue ?>"<?php echo $ivf_embryology_chart_add->ETDoctor->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->ETDoctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->ETEmbryologist->Visible) { // ETEmbryologist ?>
	<div id="r_ETEmbryologist" class="form-group row">
		<label id="elh_ivf_embryology_chart_ETEmbryologist" for="x_ETEmbryologist" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->ETEmbryologist->caption() ?><?php echo $ivf_embryology_chart_add->ETEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->ETEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEmbryologist">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETEmbryologist" name="x_ETEmbryologist" id="x_ETEmbryologist" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->ETEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->ETEmbryologist->EditValue ?>"<?php echo $ivf_embryology_chart_add->ETEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_embryology_chart_add->ETEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->ETDate->Visible) { // ETDate ?>
	<div id="r_ETDate" class="form-group row">
		<label id="elh_ivf_embryology_chart_ETDate" for="x_ETDate" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->ETDate->caption() ?><?php echo $ivf_embryology_chart_add->ETDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->ETDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDate">
<input type="text" data-table="ivf_embryology_chart" data-field="x_ETDate" name="x_ETDate" id="x_ETDate" placeholder="<?php echo HtmlEncode($ivf_embryology_chart_add->ETDate->getPlaceHolder()) ?>" value="<?php echo $ivf_embryology_chart_add->ETDate->EditValue ?>"<?php echo $ivf_embryology_chart_add->ETDate->editAttributes() ?>>
<?php if (!$ivf_embryology_chart_add->ETDate->ReadOnly && !$ivf_embryology_chart_add->ETDate->Disabled && !isset($ivf_embryology_chart_add->ETDate->EditAttrs["readonly"]) && !isset($ivf_embryology_chart_add->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_embryology_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_embryology_chartadd", "x_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $ivf_embryology_chart_add->ETDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_embryology_chart_add->Day1End->Visible) { // Day1End ?>
	<div id="r_Day1End" class="form-group row">
		<label id="elh_ivf_embryology_chart_Day1End" for="x_Day1End" class="<?php echo $ivf_embryology_chart_add->LeftColumnClass ?>"><?php echo $ivf_embryology_chart_add->Day1End->caption() ?><?php echo $ivf_embryology_chart_add->Day1End->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_embryology_chart_add->RightColumnClass ?>"><div <?php echo $ivf_embryology_chart_add->Day1End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1End">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_embryology_chart" data-field="x_Day1End" data-value-separator="<?php echo $ivf_embryology_chart_add->Day1End->displayValueSeparatorAttribute() ?>" id="x_Day1End" name="x_Day1End"<?php echo $ivf_embryology_chart_add->Day1End->editAttributes() ?>>
			<?php echo $ivf_embryology_chart_add->Day1End->selectOptionListHtml("x_Day1End") ?>
		</select>
</div>
</span>
<?php echo $ivf_embryology_chart_add->Day1End->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_embryology_chart_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_embryology_chart_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_embryology_chart_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_embryology_chart_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$ivf_embryology_chart_add->terminate();
?>
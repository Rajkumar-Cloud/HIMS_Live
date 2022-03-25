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
$ivf_embryology_chart_view = new ivf_embryology_chart_view();

// Run the page
$ivf_embryology_chart_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_embryology_chart_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_embryology_chart->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_embryology_chartview = currentForm = new ew.Form("fivf_embryology_chartview", "view");

// Form_CustomValidate event
fivf_embryology_chartview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_embryology_chartview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_embryology_chartview.lists["x_Day0PolarBodyPosition"] = <?php echo $ivf_embryology_chart_view->Day0PolarBodyPosition->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day0PolarBodyPosition"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day0PolarBodyPosition->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day0Breakage"] = <?php echo $ivf_embryology_chart_view->Day0Breakage->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day0Breakage"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day0Breakage->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day0Attempts"] = <?php echo $ivf_embryology_chart_view->Day0Attempts->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day0Attempts"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day0Attempts->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day0SPZMorpho"] = <?php echo $ivf_embryology_chart_view->Day0SPZMorpho->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day0SPZMorpho"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day0SPZMorpho->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day0SPZLocation"] = <?php echo $ivf_embryology_chart_view->Day0SPZLocation->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day0SPZLocation"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day0SPZLocation->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day0SpOrgin"] = <?php echo $ivf_embryology_chart_view->Day0SpOrgin->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day0SpOrgin"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day0SpOrgin->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day5Cryoptop"] = <?php echo $ivf_embryology_chart_view->Day5Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day5Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day5Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day1PN"] = <?php echo $ivf_embryology_chart_view->Day1PN->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day1PN"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day1PN->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day1PB"] = <?php echo $ivf_embryology_chart_view->Day1PB->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day1PB"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day1PB->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day1Pronucleus"] = <?php echo $ivf_embryology_chart_view->Day1Pronucleus->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day1Pronucleus"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day1Pronucleus->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day1Nucleolus"] = <?php echo $ivf_embryology_chart_view->Day1Nucleolus->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day1Nucleolus"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day1Nucleolus->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day1Halo"] = <?php echo $ivf_embryology_chart_view->Day1Halo->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day1Halo"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day1Halo->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day2End"] = <?php echo $ivf_embryology_chart_view->Day2End->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day2End"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day2End->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day3Frag"] = <?php echo $ivf_embryology_chart_view->Day3Frag->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day3Frag"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day3Frag->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day3Symmetry"] = <?php echo $ivf_embryology_chart_view->Day3Symmetry->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day3Symmetry"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day3Symmetry->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day3ZP"] = <?php echo $ivf_embryology_chart_view->Day3ZP->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day3ZP"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day3ZP->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day3Vacoules"] = <?php echo $ivf_embryology_chart_view->Day3Vacoules->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day3Vacoules"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day3Vacoules->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day3Grade"] = <?php echo $ivf_embryology_chart_view->Day3Grade->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day3Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day3Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day3Cryoptop"] = <?php echo $ivf_embryology_chart_view->Day3Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day3Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day3Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day3End"] = <?php echo $ivf_embryology_chart_view->Day3End->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day3End"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day3End->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day4Cryoptop"] = <?php echo $ivf_embryology_chart_view->Day4Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day4Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day4Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day4End"] = <?php echo $ivf_embryology_chart_view->Day4End->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day4End"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day4End->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day5ICM"] = <?php echo $ivf_embryology_chart_view->Day5ICM->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day5ICM"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day5ICM->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day5TE"] = <?php echo $ivf_embryology_chart_view->Day5TE->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day5TE"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day5TE->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day5Observation"] = <?php echo $ivf_embryology_chart_view->Day5Observation->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day5Observation"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day5Observation->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day5Collapsed"] = <?php echo $ivf_embryology_chart_view->Day5Collapsed->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day5Collapsed"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day5Collapsed->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day5Vacoulles"] = <?php echo $ivf_embryology_chart_view->Day5Vacoulles->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day5Vacoulles"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day5Vacoulles->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day5Grade"] = <?php echo $ivf_embryology_chart_view->Day5Grade->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day5Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day5Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day6ICM"] = <?php echo $ivf_embryology_chart_view->Day6ICM->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day6ICM"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day6ICM->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day6TE"] = <?php echo $ivf_embryology_chart_view->Day6TE->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day6TE"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day6TE->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day6Observation"] = <?php echo $ivf_embryology_chart_view->Day6Observation->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day6Observation"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day6Observation->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day6Collapsed"] = <?php echo $ivf_embryology_chart_view->Day6Collapsed->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day6Collapsed"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day6Collapsed->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day6Vacoulles"] = <?php echo $ivf_embryology_chart_view->Day6Vacoulles->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day6Vacoulles"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day6Vacoulles->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day6Grade"] = <?php echo $ivf_embryology_chart_view->Day6Grade->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day6Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day6Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_EndingDay"] = <?php echo $ivf_embryology_chart_view->EndingDay->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_EndingDay"].options = <?php echo JsonEncode($ivf_embryology_chart_view->EndingDay->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_EndingGrade"] = <?php echo $ivf_embryology_chart_view->EndingGrade->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_EndingGrade"].options = <?php echo JsonEncode($ivf_embryology_chart_view->EndingGrade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_EndingState"] = <?php echo $ivf_embryology_chart_view->EndingState->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_EndingState"].options = <?php echo JsonEncode($ivf_embryology_chart_view->EndingState->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Stage"] = <?php echo $ivf_embryology_chart_view->Stage->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Stage"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Stage->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_thawReFrozen[]"] = <?php echo $ivf_embryology_chart_view->thawReFrozen->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_thawReFrozen[]"].options = <?php echo JsonEncode($ivf_embryology_chart_view->thawReFrozen->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_vitriDay"] = <?php echo $ivf_embryology_chart_view->vitriDay->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_vitriDay"].options = <?php echo JsonEncode($ivf_embryology_chart_view->vitriDay->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_vitriGrade"] = <?php echo $ivf_embryology_chart_view->vitriGrade->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_vitriGrade"].options = <?php echo JsonEncode($ivf_embryology_chart_view->vitriGrade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_thawET"] = <?php echo $ivf_embryology_chart_view->thawET->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_thawET"].options = <?php echo JsonEncode($ivf_embryology_chart_view->thawET->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_ETDifficulty"] = <?php echo $ivf_embryology_chart_view->ETDifficulty->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_ETDifficulty"].options = <?php echo JsonEncode($ivf_embryology_chart_view->ETDifficulty->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_ETEasy[]"] = <?php echo $ivf_embryology_chart_view->ETEasy->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_ETEasy[]"].options = <?php echo JsonEncode($ivf_embryology_chart_view->ETEasy->options(FALSE, TRUE)) ?>;
fivf_embryology_chartview.lists["x_Day1End"] = <?php echo $ivf_embryology_chart_view->Day1End->Lookup->toClientList() ?>;
fivf_embryology_chartview.lists["x_Day1End"].options = <?php echo JsonEncode($ivf_embryology_chart_view->Day1End->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_embryology_chart->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_embryology_chart_view->ExportOptions->render("body") ?>
<?php $ivf_embryology_chart_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_embryology_chart_view->showPageHeader(); ?>
<?php
$ivf_embryology_chart_view->showMessage();
?>
<form name="fivf_embryology_chartview" id="fivf_embryology_chartview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_embryology_chart_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_embryology_chart_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_embryology_chart_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_embryology_chart->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_id"><?php echo $ivf_embryology_chart->id->caption() ?></span></td>
		<td data-name="id"<?php echo $ivf_embryology_chart->id->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_id">
<span<?php echo $ivf_embryology_chart->id->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_RIDNo"><?php echo $ivf_embryology_chart->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo"<?php echo $ivf_embryology_chart->RIDNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_RIDNo">
<span<?php echo $ivf_embryology_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Name"><?php echo $ivf_embryology_chart->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $ivf_embryology_chart->Name->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Name">
<span<?php echo $ivf_embryology_chart->Name->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->ARTCycle->Visible) { // ARTCycle ?>
	<tr id="r_ARTCycle">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ARTCycle"><?php echo $ivf_embryology_chart->ARTCycle->caption() ?></span></td>
		<td data-name="ARTCycle"<?php echo $ivf_embryology_chart->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ARTCycle">
<span<?php echo $ivf_embryology_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ARTCycle->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->SpermOrigin->Visible) { // SpermOrigin ?>
	<tr id="r_SpermOrigin">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_SpermOrigin"><?php echo $ivf_embryology_chart->SpermOrigin->caption() ?></span></td>
		<td data-name="SpermOrigin"<?php echo $ivf_embryology_chart->SpermOrigin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SpermOrigin">
<span<?php echo $ivf_embryology_chart->SpermOrigin->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->SpermOrigin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<tr id="r_InseminatinTechnique">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_InseminatinTechnique"><?php echo $ivf_embryology_chart->InseminatinTechnique->caption() ?></span></td>
		<td data-name="InseminatinTechnique"<?php echo $ivf_embryology_chart->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_InseminatinTechnique">
<span<?php echo $ivf_embryology_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->IndicationForART->Visible) { // IndicationForART ?>
	<tr id="r_IndicationForART">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_IndicationForART"><?php echo $ivf_embryology_chart->IndicationForART->caption() ?></span></td>
		<td data-name="IndicationForART"<?php echo $ivf_embryology_chart->IndicationForART->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_IndicationForART">
<span<?php echo $ivf_embryology_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->IndicationForART->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0sino->Visible) { // Day0sino ?>
	<tr id="r_Day0sino">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0sino"><?php echo $ivf_embryology_chart->Day0sino->caption() ?></span></td>
		<td data-name="Day0sino"<?php echo $ivf_embryology_chart->Day0sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0sino">
<span<?php echo $ivf_embryology_chart->Day0sino->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0sino->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<tr id="r_Day0OocyteStage">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0OocyteStage"><?php echo $ivf_embryology_chart->Day0OocyteStage->caption() ?></span></td>
		<td data-name="Day0OocyteStage"<?php echo $ivf_embryology_chart->Day0OocyteStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0OocyteStage">
<span<?php echo $ivf_embryology_chart->Day0OocyteStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
	<tr id="r_Day0PolarBodyPosition">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0PolarBodyPosition"><?php echo $ivf_embryology_chart->Day0PolarBodyPosition->caption() ?></span></td>
		<td data-name="Day0PolarBodyPosition"<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0PolarBodyPosition">
<span<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Breakage->Visible) { // Day0Breakage ?>
	<tr id="r_Day0Breakage">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0Breakage"><?php echo $ivf_embryology_chart->Day0Breakage->caption() ?></span></td>
		<td data-name="Day0Breakage"<?php echo $ivf_embryology_chart->Day0Breakage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Breakage">
<span<?php echo $ivf_embryology_chart->Day0Breakage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0Breakage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Attempts->Visible) { // Day0Attempts ?>
	<tr id="r_Day0Attempts">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0Attempts"><?php echo $ivf_embryology_chart->Day0Attempts->caption() ?></span></td>
		<td data-name="Day0Attempts"<?php echo $ivf_embryology_chart->Day0Attempts->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Attempts">
<span<?php echo $ivf_embryology_chart->Day0Attempts->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0Attempts->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
	<tr id="r_Day0SPZMorpho">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0SPZMorpho"><?php echo $ivf_embryology_chart->Day0SPZMorpho->caption() ?></span></td>
		<td data-name="Day0SPZMorpho"<?php echo $ivf_embryology_chart->Day0SPZMorpho->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZMorpho">
<span<?php echo $ivf_embryology_chart->Day0SPZMorpho->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SPZMorpho->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
	<tr id="r_Day0SPZLocation">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0SPZLocation"><?php echo $ivf_embryology_chart->Day0SPZLocation->caption() ?></span></td>
		<td data-name="Day0SPZLocation"<?php echo $ivf_embryology_chart->Day0SPZLocation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZLocation">
<span<?php echo $ivf_embryology_chart->Day0SPZLocation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SPZLocation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
	<tr id="r_Day0SpOrgin">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0SpOrgin"><?php echo $ivf_embryology_chart->Day0SpOrgin->caption() ?></span></td>
		<td data-name="Day0SpOrgin"<?php echo $ivf_embryology_chart->Day0SpOrgin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SpOrgin">
<span<?php echo $ivf_embryology_chart->Day0SpOrgin->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SpOrgin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
	<tr id="r_Day5Cryoptop">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Cryoptop"><?php echo $ivf_embryology_chart->Day5Cryoptop->caption() ?></span></td>
		<td data-name="Day5Cryoptop"<?php echo $ivf_embryology_chart->Day5Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Cryoptop">
<span<?php echo $ivf_embryology_chart->Day5Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Cryoptop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Sperm->Visible) { // Day1Sperm ?>
	<tr id="r_Day1Sperm">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Sperm"><?php echo $ivf_embryology_chart->Day1Sperm->caption() ?></span></td>
		<td data-name="Day1Sperm"<?php echo $ivf_embryology_chart->Day1Sperm->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Sperm">
<span<?php echo $ivf_embryology_chart->Day1Sperm->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Sperm->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PN->Visible) { // Day1PN ?>
	<tr id="r_Day1PN">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1PN"><?php echo $ivf_embryology_chart->Day1PN->caption() ?></span></td>
		<td data-name="Day1PN"<?php echo $ivf_embryology_chart->Day1PN->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PN">
<span<?php echo $ivf_embryology_chart->Day1PN->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1PN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PB->Visible) { // Day1PB ?>
	<tr id="r_Day1PB">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1PB"><?php echo $ivf_embryology_chart->Day1PB->caption() ?></span></td>
		<td data-name="Day1PB"<?php echo $ivf_embryology_chart->Day1PB->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PB">
<span<?php echo $ivf_embryology_chart->Day1PB->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1PB->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
	<tr id="r_Day1Pronucleus">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Pronucleus"><?php echo $ivf_embryology_chart->Day1Pronucleus->caption() ?></span></td>
		<td data-name="Day1Pronucleus"<?php echo $ivf_embryology_chart->Day1Pronucleus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Pronucleus">
<span<?php echo $ivf_embryology_chart->Day1Pronucleus->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Pronucleus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
	<tr id="r_Day1Nucleolus">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Nucleolus"><?php echo $ivf_embryology_chart->Day1Nucleolus->caption() ?></span></td>
		<td data-name="Day1Nucleolus"<?php echo $ivf_embryology_chart->Day1Nucleolus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Nucleolus">
<span<?php echo $ivf_embryology_chart->Day1Nucleolus->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Nucleolus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Halo->Visible) { // Day1Halo ?>
	<tr id="r_Day1Halo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Halo"><?php echo $ivf_embryology_chart->Day1Halo->caption() ?></span></td>
		<td data-name="Day1Halo"<?php echo $ivf_embryology_chart->Day1Halo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Halo">
<span<?php echo $ivf_embryology_chart->Day1Halo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Halo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2SiNo->Visible) { // Day2SiNo ?>
	<tr id="r_Day2SiNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2SiNo"><?php echo $ivf_embryology_chart->Day2SiNo->caption() ?></span></td>
		<td data-name="Day2SiNo"<?php echo $ivf_embryology_chart->Day2SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2SiNo">
<span<?php echo $ivf_embryology_chart->Day2SiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2SiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2CellNo->Visible) { // Day2CellNo ?>
	<tr id="r_Day2CellNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2CellNo"><?php echo $ivf_embryology_chart->Day2CellNo->caption() ?></span></td>
		<td data-name="Day2CellNo"<?php echo $ivf_embryology_chart->Day2CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2CellNo">
<span<?php echo $ivf_embryology_chart->Day2CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2CellNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Frag->Visible) { // Day2Frag ?>
	<tr id="r_Day2Frag">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Frag"><?php echo $ivf_embryology_chart->Day2Frag->caption() ?></span></td>
		<td data-name="Day2Frag"<?php echo $ivf_embryology_chart->Day2Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Frag">
<span<?php echo $ivf_embryology_chart->Day2Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Frag->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Symmetry->Visible) { // Day2Symmetry ?>
	<tr id="r_Day2Symmetry">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Symmetry"><?php echo $ivf_embryology_chart->Day2Symmetry->caption() ?></span></td>
		<td data-name="Day2Symmetry"<?php echo $ivf_embryology_chart->Day2Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Symmetry">
<span<?php echo $ivf_embryology_chart->Day2Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Symmetry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
	<tr id="r_Day2Cryoptop">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Cryoptop"><?php echo $ivf_embryology_chart->Day2Cryoptop->caption() ?></span></td>
		<td data-name="Day2Cryoptop"<?php echo $ivf_embryology_chart->Day2Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Cryoptop">
<span<?php echo $ivf_embryology_chart->Day2Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Cryoptop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Grade->Visible) { // Day2Grade ?>
	<tr id="r_Day2Grade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Grade"><?php echo $ivf_embryology_chart->Day2Grade->caption() ?></span></td>
		<td data-name="Day2Grade"<?php echo $ivf_embryology_chart->Day2Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Grade">
<span<?php echo $ivf_embryology_chart->Day2Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2End->Visible) { // Day2End ?>
	<tr id="r_Day2End">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2End"><?php echo $ivf_embryology_chart->Day2End->caption() ?></span></td>
		<td data-name="Day2End"<?php echo $ivf_embryology_chart->Day2End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2End">
<span<?php echo $ivf_embryology_chart->Day2End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2End->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Sino->Visible) { // Day3Sino ?>
	<tr id="r_Day3Sino">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Sino"><?php echo $ivf_embryology_chart->Day3Sino->caption() ?></span></td>
		<td data-name="Day3Sino"<?php echo $ivf_embryology_chart->Day3Sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Sino">
<span<?php echo $ivf_embryology_chart->Day3Sino->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Sino->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3CellNo->Visible) { // Day3CellNo ?>
	<tr id="r_Day3CellNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3CellNo"><?php echo $ivf_embryology_chart->Day3CellNo->caption() ?></span></td>
		<td data-name="Day3CellNo"<?php echo $ivf_embryology_chart->Day3CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3CellNo">
<span<?php echo $ivf_embryology_chart->Day3CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3CellNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Frag->Visible) { // Day3Frag ?>
	<tr id="r_Day3Frag">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Frag"><?php echo $ivf_embryology_chart->Day3Frag->caption() ?></span></td>
		<td data-name="Day3Frag"<?php echo $ivf_embryology_chart->Day3Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Frag">
<span<?php echo $ivf_embryology_chart->Day3Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Frag->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Symmetry->Visible) { // Day3Symmetry ?>
	<tr id="r_Day3Symmetry">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Symmetry"><?php echo $ivf_embryology_chart->Day3Symmetry->caption() ?></span></td>
		<td data-name="Day3Symmetry"<?php echo $ivf_embryology_chart->Day3Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Symmetry">
<span<?php echo $ivf_embryology_chart->Day3Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Symmetry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3ZP->Visible) { // Day3ZP ?>
	<tr id="r_Day3ZP">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3ZP"><?php echo $ivf_embryology_chart->Day3ZP->caption() ?></span></td>
		<td data-name="Day3ZP"<?php echo $ivf_embryology_chart->Day3ZP->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3ZP">
<span<?php echo $ivf_embryology_chart->Day3ZP->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3ZP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Vacoules->Visible) { // Day3Vacoules ?>
	<tr id="r_Day3Vacoules">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Vacoules"><?php echo $ivf_embryology_chart->Day3Vacoules->caption() ?></span></td>
		<td data-name="Day3Vacoules"<?php echo $ivf_embryology_chart->Day3Vacoules->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Vacoules">
<span<?php echo $ivf_embryology_chart->Day3Vacoules->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Vacoules->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Grade->Visible) { // Day3Grade ?>
	<tr id="r_Day3Grade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Grade"><?php echo $ivf_embryology_chart->Day3Grade->caption() ?></span></td>
		<td data-name="Day3Grade"<?php echo $ivf_embryology_chart->Day3Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Grade">
<span<?php echo $ivf_embryology_chart->Day3Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
	<tr id="r_Day3Cryoptop">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Cryoptop"><?php echo $ivf_embryology_chart->Day3Cryoptop->caption() ?></span></td>
		<td data-name="Day3Cryoptop"<?php echo $ivf_embryology_chart->Day3Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Cryoptop">
<span<?php echo $ivf_embryology_chart->Day3Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Cryoptop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3End->Visible) { // Day3End ?>
	<tr id="r_Day3End">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3End"><?php echo $ivf_embryology_chart->Day3End->caption() ?></span></td>
		<td data-name="Day3End"<?php echo $ivf_embryology_chart->Day3End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3End">
<span<?php echo $ivf_embryology_chart->Day3End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3End->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4SiNo->Visible) { // Day4SiNo ?>
	<tr id="r_Day4SiNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4SiNo"><?php echo $ivf_embryology_chart->Day4SiNo->caption() ?></span></td>
		<td data-name="Day4SiNo"<?php echo $ivf_embryology_chart->Day4SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4SiNo">
<span<?php echo $ivf_embryology_chart->Day4SiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4SiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4CellNo->Visible) { // Day4CellNo ?>
	<tr id="r_Day4CellNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4CellNo"><?php echo $ivf_embryology_chart->Day4CellNo->caption() ?></span></td>
		<td data-name="Day4CellNo"<?php echo $ivf_embryology_chart->Day4CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4CellNo">
<span<?php echo $ivf_embryology_chart->Day4CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4CellNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Frag->Visible) { // Day4Frag ?>
	<tr id="r_Day4Frag">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Frag"><?php echo $ivf_embryology_chart->Day4Frag->caption() ?></span></td>
		<td data-name="Day4Frag"<?php echo $ivf_embryology_chart->Day4Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Frag">
<span<?php echo $ivf_embryology_chart->Day4Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Frag->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Symmetry->Visible) { // Day4Symmetry ?>
	<tr id="r_Day4Symmetry">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Symmetry"><?php echo $ivf_embryology_chart->Day4Symmetry->caption() ?></span></td>
		<td data-name="Day4Symmetry"<?php echo $ivf_embryology_chart->Day4Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Symmetry">
<span<?php echo $ivf_embryology_chart->Day4Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Symmetry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Grade->Visible) { // Day4Grade ?>
	<tr id="r_Day4Grade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Grade"><?php echo $ivf_embryology_chart->Day4Grade->caption() ?></span></td>
		<td data-name="Day4Grade"<?php echo $ivf_embryology_chart->Day4Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Grade">
<span<?php echo $ivf_embryology_chart->Day4Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
	<tr id="r_Day4Cryoptop">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Cryoptop"><?php echo $ivf_embryology_chart->Day4Cryoptop->caption() ?></span></td>
		<td data-name="Day4Cryoptop"<?php echo $ivf_embryology_chart->Day4Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Cryoptop">
<span<?php echo $ivf_embryology_chart->Day4Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Cryoptop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4End->Visible) { // Day4End ?>
	<tr id="r_Day4End">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4End"><?php echo $ivf_embryology_chart->Day4End->caption() ?></span></td>
		<td data-name="Day4End"<?php echo $ivf_embryology_chart->Day4End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4End">
<span<?php echo $ivf_embryology_chart->Day4End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4End->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5CellNo->Visible) { // Day5CellNo ?>
	<tr id="r_Day5CellNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5CellNo"><?php echo $ivf_embryology_chart->Day5CellNo->caption() ?></span></td>
		<td data-name="Day5CellNo"<?php echo $ivf_embryology_chart->Day5CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5CellNo">
<span<?php echo $ivf_embryology_chart->Day5CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5CellNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5ICM->Visible) { // Day5ICM ?>
	<tr id="r_Day5ICM">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5ICM"><?php echo $ivf_embryology_chart->Day5ICM->caption() ?></span></td>
		<td data-name="Day5ICM"<?php echo $ivf_embryology_chart->Day5ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5ICM">
<span<?php echo $ivf_embryology_chart->Day5ICM->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5ICM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5TE->Visible) { // Day5TE ?>
	<tr id="r_Day5TE">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5TE"><?php echo $ivf_embryology_chart->Day5TE->caption() ?></span></td>
		<td data-name="Day5TE"<?php echo $ivf_embryology_chart->Day5TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5TE">
<span<?php echo $ivf_embryology_chart->Day5TE->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5TE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Observation->Visible) { // Day5Observation ?>
	<tr id="r_Day5Observation">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Observation"><?php echo $ivf_embryology_chart->Day5Observation->caption() ?></span></td>
		<td data-name="Day5Observation"<?php echo $ivf_embryology_chart->Day5Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Observation">
<span<?php echo $ivf_embryology_chart->Day5Observation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Observation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Collapsed->Visible) { // Day5Collapsed ?>
	<tr id="r_Day5Collapsed">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Collapsed"><?php echo $ivf_embryology_chart->Day5Collapsed->caption() ?></span></td>
		<td data-name="Day5Collapsed"<?php echo $ivf_embryology_chart->Day5Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Collapsed">
<span<?php echo $ivf_embryology_chart->Day5Collapsed->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Collapsed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
	<tr id="r_Day5Vacoulles">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Vacoulles"><?php echo $ivf_embryology_chart->Day5Vacoulles->caption() ?></span></td>
		<td data-name="Day5Vacoulles"<?php echo $ivf_embryology_chart->Day5Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Vacoulles">
<span<?php echo $ivf_embryology_chart->Day5Vacoulles->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Vacoulles->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Grade->Visible) { // Day5Grade ?>
	<tr id="r_Day5Grade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Grade"><?php echo $ivf_embryology_chart->Day5Grade->caption() ?></span></td>
		<td data-name="Day5Grade"<?php echo $ivf_embryology_chart->Day5Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Grade">
<span<?php echo $ivf_embryology_chart->Day5Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6CellNo->Visible) { // Day6CellNo ?>
	<tr id="r_Day6CellNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6CellNo"><?php echo $ivf_embryology_chart->Day6CellNo->caption() ?></span></td>
		<td data-name="Day6CellNo"<?php echo $ivf_embryology_chart->Day6CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6CellNo">
<span<?php echo $ivf_embryology_chart->Day6CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6CellNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6ICM->Visible) { // Day6ICM ?>
	<tr id="r_Day6ICM">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6ICM"><?php echo $ivf_embryology_chart->Day6ICM->caption() ?></span></td>
		<td data-name="Day6ICM"<?php echo $ivf_embryology_chart->Day6ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6ICM">
<span<?php echo $ivf_embryology_chart->Day6ICM->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6ICM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6TE->Visible) { // Day6TE ?>
	<tr id="r_Day6TE">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6TE"><?php echo $ivf_embryology_chart->Day6TE->caption() ?></span></td>
		<td data-name="Day6TE"<?php echo $ivf_embryology_chart->Day6TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6TE">
<span<?php echo $ivf_embryology_chart->Day6TE->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6TE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Observation->Visible) { // Day6Observation ?>
	<tr id="r_Day6Observation">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Observation"><?php echo $ivf_embryology_chart->Day6Observation->caption() ?></span></td>
		<td data-name="Day6Observation"<?php echo $ivf_embryology_chart->Day6Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Observation">
<span<?php echo $ivf_embryology_chart->Day6Observation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Observation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Collapsed->Visible) { // Day6Collapsed ?>
	<tr id="r_Day6Collapsed">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Collapsed"><?php echo $ivf_embryology_chart->Day6Collapsed->caption() ?></span></td>
		<td data-name="Day6Collapsed"<?php echo $ivf_embryology_chart->Day6Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Collapsed">
<span<?php echo $ivf_embryology_chart->Day6Collapsed->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Collapsed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
	<tr id="r_Day6Vacoulles">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Vacoulles"><?php echo $ivf_embryology_chart->Day6Vacoulles->caption() ?></span></td>
		<td data-name="Day6Vacoulles"<?php echo $ivf_embryology_chart->Day6Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Vacoulles">
<span<?php echo $ivf_embryology_chart->Day6Vacoulles->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Vacoulles->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Grade->Visible) { // Day6Grade ?>
	<tr id="r_Day6Grade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Grade"><?php echo $ivf_embryology_chart->Day6Grade->caption() ?></span></td>
		<td data-name="Day6Grade"<?php echo $ivf_embryology_chart->Day6Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Grade">
<span<?php echo $ivf_embryology_chart->Day6Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
	<tr id="r_Day6Cryoptop">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Cryoptop"><?php echo $ivf_embryology_chart->Day6Cryoptop->caption() ?></span></td>
		<td data-name="Day6Cryoptop"<?php echo $ivf_embryology_chart->Day6Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Cryoptop">
<span<?php echo $ivf_embryology_chart->Day6Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Cryoptop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->EndSiNo->Visible) { // EndSiNo ?>
	<tr id="r_EndSiNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndSiNo"><?php echo $ivf_embryology_chart->EndSiNo->caption() ?></span></td>
		<td data-name="EndSiNo"<?php echo $ivf_embryology_chart->EndSiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndSiNo">
<span<?php echo $ivf_embryology_chart->EndSiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndSiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingDay->Visible) { // EndingDay ?>
	<tr id="r_EndingDay">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingDay"><?php echo $ivf_embryology_chart->EndingDay->caption() ?></span></td>
		<td data-name="EndingDay"<?php echo $ivf_embryology_chart->EndingDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingDay">
<span<?php echo $ivf_embryology_chart->EndingDay->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingDay->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingCellStage->Visible) { // EndingCellStage ?>
	<tr id="r_EndingCellStage">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingCellStage"><?php echo $ivf_embryology_chart->EndingCellStage->caption() ?></span></td>
		<td data-name="EndingCellStage"<?php echo $ivf_embryology_chart->EndingCellStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingCellStage">
<span<?php echo $ivf_embryology_chart->EndingCellStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingCellStage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingGrade->Visible) { // EndingGrade ?>
	<tr id="r_EndingGrade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingGrade"><?php echo $ivf_embryology_chart->EndingGrade->caption() ?></span></td>
		<td data-name="EndingGrade"<?php echo $ivf_embryology_chart->EndingGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingGrade">
<span<?php echo $ivf_embryology_chart->EndingGrade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingGrade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingState->Visible) { // EndingState ?>
	<tr id="r_EndingState">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingState"><?php echo $ivf_embryology_chart->EndingState->caption() ?></span></td>
		<td data-name="EndingState"<?php echo $ivf_embryology_chart->EndingState->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingState">
<span<?php echo $ivf_embryology_chart->EndingState->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingState->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_TidNo"><?php echo $ivf_embryology_chart->TidNo->caption() ?></span></td>
		<td data-name="TidNo"<?php echo $ivf_embryology_chart->TidNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_TidNo">
<span<?php echo $ivf_embryology_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->DidNO->Visible) { // DidNO ?>
	<tr id="r_DidNO">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_DidNO"><?php echo $ivf_embryology_chart->DidNO->caption() ?></span></td>
		<td data-name="DidNO"<?php echo $ivf_embryology_chart->DidNO->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart->DidNO->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->DidNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
	<tr id="r_ICSiIVFDateTime">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ICSiIVFDateTime"><?php echo $ivf_embryology_chart->ICSiIVFDateTime->caption() ?></span></td>
		<td data-name="ICSiIVFDateTime"<?php echo $ivf_embryology_chart->ICSiIVFDateTime->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ICSiIVFDateTime">
<span<?php echo $ivf_embryology_chart->ICSiIVFDateTime->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ICSiIVFDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
	<tr id="r_PrimaryEmbrologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_PrimaryEmbrologist"><?php echo $ivf_embryology_chart->PrimaryEmbrologist->caption() ?></span></td>
		<td data-name="PrimaryEmbrologist"<?php echo $ivf_embryology_chart->PrimaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_PrimaryEmbrologist">
<span<?php echo $ivf_embryology_chart->PrimaryEmbrologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->PrimaryEmbrologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
	<tr id="r_SecondaryEmbrologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_SecondaryEmbrologist"><?php echo $ivf_embryology_chart->SecondaryEmbrologist->caption() ?></span></td>
		<td data-name="SecondaryEmbrologist"<?php echo $ivf_embryology_chart->SecondaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SecondaryEmbrologist">
<span<?php echo $ivf_embryology_chart->SecondaryEmbrologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->SecondaryEmbrologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Incubator->Visible) { // Incubator ?>
	<tr id="r_Incubator">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Incubator"><?php echo $ivf_embryology_chart->Incubator->caption() ?></span></td>
		<td data-name="Incubator"<?php echo $ivf_embryology_chart->Incubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Incubator">
<span<?php echo $ivf_embryology_chart->Incubator->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Incubator->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->location->Visible) { // location ?>
	<tr id="r_location">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_location"><?php echo $ivf_embryology_chart->location->caption() ?></span></td>
		<td data-name="location"<?php echo $ivf_embryology_chart->location->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_location">
<span<?php echo $ivf_embryology_chart->location->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->location->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
	<tr id="r_OocyteNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_OocyteNo"><?php echo $ivf_embryology_chart->OocyteNo->caption() ?></span></td>
		<td data-name="OocyteNo"<?php echo $ivf_embryology_chart->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_OocyteNo">
<span<?php echo $ivf_embryology_chart->OocyteNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->OocyteNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Stage->Visible) { // Stage ?>
	<tr id="r_Stage">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Stage"><?php echo $ivf_embryology_chart->Stage->caption() ?></span></td>
		<td data-name="Stage"<?php echo $ivf_embryology_chart->Stage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Stage">
<span<?php echo $ivf_embryology_chart->Stage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Stage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Remarks"><?php echo $ivf_embryology_chart->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $ivf_embryology_chart->Remarks->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Remarks">
<span<?php echo $ivf_embryology_chart->Remarks->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitrificationDate->Visible) { // vitrificationDate ?>
	<tr id="r_vitrificationDate">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitrificationDate"><?php echo $ivf_embryology_chart->vitrificationDate->caption() ?></span></td>
		<td data-name="vitrificationDate"<?php echo $ivf_embryology_chart->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitrificationDate">
<span<?php echo $ivf_embryology_chart->vitrificationDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitrificationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
	<tr id="r_vitriPrimaryEmbryologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist"><?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->caption() ?></span></td>
		<td data-name="vitriPrimaryEmbryologist"<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
	<tr id="r_vitriSecondaryEmbryologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist"><?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->caption() ?></span></td>
		<td data-name="vitriSecondaryEmbryologist"<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
	<tr id="r_vitriEmbryoNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriEmbryoNo"><?php echo $ivf_embryology_chart->vitriEmbryoNo->caption() ?></span></td>
		<td data-name="vitriEmbryoNo"<?php echo $ivf_embryology_chart->vitriEmbryoNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriEmbryoNo">
<span<?php echo $ivf_embryology_chart->vitriEmbryoNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriEmbryoNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->thawReFrozen->Visible) { // thawReFrozen ?>
	<tr id="r_thawReFrozen">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawReFrozen"><?php echo $ivf_embryology_chart->thawReFrozen->caption() ?></span></td>
		<td data-name="thawReFrozen"<?php echo $ivf_embryology_chart->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawReFrozen">
<span<?php echo $ivf_embryology_chart->thawReFrozen->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawReFrozen->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
	<tr id="r_vitriFertilisationDate">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriFertilisationDate"><?php echo $ivf_embryology_chart->vitriFertilisationDate->caption() ?></span></td>
		<td data-name="vitriFertilisationDate"<?php echo $ivf_embryology_chart->vitriFertilisationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriFertilisationDate">
<span<?php echo $ivf_embryology_chart->vitriFertilisationDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriFertilisationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriDay->Visible) { // vitriDay ?>
	<tr id="r_vitriDay">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriDay"><?php echo $ivf_embryology_chart->vitriDay->caption() ?></span></td>
		<td data-name="vitriDay"<?php echo $ivf_embryology_chart->vitriDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriDay">
<span<?php echo $ivf_embryology_chart->vitriDay->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriDay->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriStage->Visible) { // vitriStage ?>
	<tr id="r_vitriStage">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriStage"><?php echo $ivf_embryology_chart->vitriStage->caption() ?></span></td>
		<td data-name="vitriStage"<?php echo $ivf_embryology_chart->vitriStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriStage">
<span<?php echo $ivf_embryology_chart->vitriStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriStage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGrade->Visible) { // vitriGrade ?>
	<tr id="r_vitriGrade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriGrade"><?php echo $ivf_embryology_chart->vitriGrade->caption() ?></span></td>
		<td data-name="vitriGrade"<?php echo $ivf_embryology_chart->vitriGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGrade">
<span<?php echo $ivf_embryology_chart->vitriGrade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriGrade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriIncubator->Visible) { // vitriIncubator ?>
	<tr id="r_vitriIncubator">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriIncubator"><?php echo $ivf_embryology_chart->vitriIncubator->caption() ?></span></td>
		<td data-name="vitriIncubator"<?php echo $ivf_embryology_chart->vitriIncubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriIncubator">
<span<?php echo $ivf_embryology_chart->vitriIncubator->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriIncubator->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriTank->Visible) { // vitriTank ?>
	<tr id="r_vitriTank">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriTank"><?php echo $ivf_embryology_chart->vitriTank->caption() ?></span></td>
		<td data-name="vitriTank"<?php echo $ivf_embryology_chart->vitriTank->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriTank">
<span<?php echo $ivf_embryology_chart->vitriTank->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriTank->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCanister->Visible) { // vitriCanister ?>
	<tr id="r_vitriCanister">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriCanister"><?php echo $ivf_embryology_chart->vitriCanister->caption() ?></span></td>
		<td data-name="vitriCanister"<?php echo $ivf_embryology_chart->vitriCanister->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCanister">
<span<?php echo $ivf_embryology_chart->vitriCanister->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCanister->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGobiet->Visible) { // vitriGobiet ?>
	<tr id="r_vitriGobiet">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriGobiet"><?php echo $ivf_embryology_chart->vitriGobiet->caption() ?></span></td>
		<td data-name="vitriGobiet"<?php echo $ivf_embryology_chart->vitriGobiet->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGobiet">
<span<?php echo $ivf_embryology_chart->vitriGobiet->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriGobiet->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriViscotube->Visible) { // vitriViscotube ?>
	<tr id="r_vitriViscotube">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriViscotube"><?php echo $ivf_embryology_chart->vitriViscotube->caption() ?></span></td>
		<td data-name="vitriViscotube"<?php echo $ivf_embryology_chart->vitriViscotube->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriViscotube">
<span<?php echo $ivf_embryology_chart->vitriViscotube->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriViscotube->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
	<tr id="r_vitriCryolockNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriCryolockNo"><?php echo $ivf_embryology_chart->vitriCryolockNo->caption() ?></span></td>
		<td data-name="vitriCryolockNo"<?php echo $ivf_embryology_chart->vitriCryolockNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockNo">
<span<?php echo $ivf_embryology_chart->vitriCryolockNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCryolockNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
	<tr id="r_vitriCryolockColour">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriCryolockColour"><?php echo $ivf_embryology_chart->vitriCryolockColour->caption() ?></span></td>
		<td data-name="vitriCryolockColour"<?php echo $ivf_embryology_chart->vitriCryolockColour->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockColour">
<span<?php echo $ivf_embryology_chart->vitriCryolockColour->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCryolockColour->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDate->Visible) { // thawDate ?>
	<tr id="r_thawDate">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawDate"><?php echo $ivf_embryology_chart->thawDate->caption() ?></span></td>
		<td data-name="thawDate"<?php echo $ivf_embryology_chart->thawDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDate">
<span<?php echo $ivf_embryology_chart->thawDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<tr id="r_thawPrimaryEmbryologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawPrimaryEmbryologist"><?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->caption() ?></span></td>
		<td data-name="thawPrimaryEmbryologist"<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<tr id="r_thawSecondaryEmbryologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawSecondaryEmbryologist"><?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->caption() ?></span></td>
		<td data-name="thawSecondaryEmbryologist"<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->thawET->Visible) { // thawET ?>
	<tr id="r_thawET">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawET"><?php echo $ivf_embryology_chart->thawET->caption() ?></span></td>
		<td data-name="thawET"<?php echo $ivf_embryology_chart->thawET->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawET">
<span<?php echo $ivf_embryology_chart->thawET->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawET->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->thawAbserve->Visible) { // thawAbserve ?>
	<tr id="r_thawAbserve">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawAbserve"><?php echo $ivf_embryology_chart->thawAbserve->caption() ?></span></td>
		<td data-name="thawAbserve"<?php echo $ivf_embryology_chart->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawAbserve">
<span<?php echo $ivf_embryology_chart->thawAbserve->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawAbserve->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDiscard->Visible) { // thawDiscard ?>
	<tr id="r_thawDiscard">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawDiscard"><?php echo $ivf_embryology_chart->thawDiscard->caption() ?></span></td>
		<td data-name="thawDiscard"<?php echo $ivf_embryology_chart->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDiscard">
<span<?php echo $ivf_embryology_chart->thawDiscard->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawDiscard->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->ETCatheter->Visible) { // ETCatheter ?>
	<tr id="r_ETCatheter">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETCatheter"><?php echo $ivf_embryology_chart->ETCatheter->caption() ?></span></td>
		<td data-name="ETCatheter"<?php echo $ivf_embryology_chart->ETCatheter->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETCatheter">
<span<?php echo $ivf_embryology_chart->ETCatheter->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETCatheter->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDifficulty->Visible) { // ETDifficulty ?>
	<tr id="r_ETDifficulty">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETDifficulty"><?php echo $ivf_embryology_chart->ETDifficulty->caption() ?></span></td>
		<td data-name="ETDifficulty"<?php echo $ivf_embryology_chart->ETDifficulty->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDifficulty">
<span<?php echo $ivf_embryology_chart->ETDifficulty->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDifficulty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEasy->Visible) { // ETEasy ?>
	<tr id="r_ETEasy">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETEasy"><?php echo $ivf_embryology_chart->ETEasy->caption() ?></span></td>
		<td data-name="ETEasy"<?php echo $ivf_embryology_chart->ETEasy->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEasy">
<span<?php echo $ivf_embryology_chart->ETEasy->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETEasy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->ETComments->Visible) { // ETComments ?>
	<tr id="r_ETComments">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETComments"><?php echo $ivf_embryology_chart->ETComments->caption() ?></span></td>
		<td data-name="ETComments"<?php echo $ivf_embryology_chart->ETComments->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETComments">
<span<?php echo $ivf_embryology_chart->ETComments->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETComments->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDoctor->Visible) { // ETDoctor ?>
	<tr id="r_ETDoctor">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETDoctor"><?php echo $ivf_embryology_chart->ETDoctor->caption() ?></span></td>
		<td data-name="ETDoctor"<?php echo $ivf_embryology_chart->ETDoctor->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDoctor">
<span<?php echo $ivf_embryology_chart->ETDoctor->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDoctor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEmbryologist->Visible) { // ETEmbryologist ?>
	<tr id="r_ETEmbryologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETEmbryologist"><?php echo $ivf_embryology_chart->ETEmbryologist->caption() ?></span></td>
		<td data-name="ETEmbryologist"<?php echo $ivf_embryology_chart->ETEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEmbryologist">
<span<?php echo $ivf_embryology_chart->ETEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDate->Visible) { // ETDate ?>
	<tr id="r_ETDate">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETDate"><?php echo $ivf_embryology_chart->ETDate->caption() ?></span></td>
		<td data-name="ETDate"<?php echo $ivf_embryology_chart->ETDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDate">
<span<?php echo $ivf_embryology_chart->ETDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1End->Visible) { // Day1End ?>
	<tr id="r_Day1End">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1End"><?php echo $ivf_embryology_chart->Day1End->caption() ?></span></td>
		<td data-name="Day1End"<?php echo $ivf_embryology_chart->Day1End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1End">
<span<?php echo $ivf_embryology_chart->Day1End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1End->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_embryology_chart_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_embryology_chart->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_embryology_chart_view->terminate();
?>
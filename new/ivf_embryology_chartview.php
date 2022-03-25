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
<?php include_once "header.php"; ?>
<?php if (!$ivf_embryology_chart_view->isExport()) { ?>
<script>
var fivf_embryology_chartview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_embryology_chartview = currentForm = new ew.Form("fivf_embryology_chartview", "view");
	loadjs.done("fivf_embryology_chartview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_embryology_chart_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_embryology_chart_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_embryology_chart_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_id"><?php echo $ivf_embryology_chart_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_embryology_chart_view->id->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_id">
<span<?php echo $ivf_embryology_chart_view->id->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_RIDNo"><?php echo $ivf_embryology_chart_view->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo" <?php echo $ivf_embryology_chart_view->RIDNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_RIDNo">
<span<?php echo $ivf_embryology_chart_view->RIDNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Name"><?php echo $ivf_embryology_chart_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $ivf_embryology_chart_view->Name->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Name">
<span<?php echo $ivf_embryology_chart_view->Name->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->ARTCycle->Visible) { // ARTCycle ?>
	<tr id="r_ARTCycle">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ARTCycle"><?php echo $ivf_embryology_chart_view->ARTCycle->caption() ?></span></td>
		<td data-name="ARTCycle" <?php echo $ivf_embryology_chart_view->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ARTCycle">
<span<?php echo $ivf_embryology_chart_view->ARTCycle->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->ARTCycle->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->SpermOrigin->Visible) { // SpermOrigin ?>
	<tr id="r_SpermOrigin">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_SpermOrigin"><?php echo $ivf_embryology_chart_view->SpermOrigin->caption() ?></span></td>
		<td data-name="SpermOrigin" <?php echo $ivf_embryology_chart_view->SpermOrigin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SpermOrigin">
<span<?php echo $ivf_embryology_chart_view->SpermOrigin->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->SpermOrigin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<tr id="r_InseminatinTechnique">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_InseminatinTechnique"><?php echo $ivf_embryology_chart_view->InseminatinTechnique->caption() ?></span></td>
		<td data-name="InseminatinTechnique" <?php echo $ivf_embryology_chart_view->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_InseminatinTechnique">
<span<?php echo $ivf_embryology_chart_view->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->IndicationForART->Visible) { // IndicationForART ?>
	<tr id="r_IndicationForART">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_IndicationForART"><?php echo $ivf_embryology_chart_view->IndicationForART->caption() ?></span></td>
		<td data-name="IndicationForART" <?php echo $ivf_embryology_chart_view->IndicationForART->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_IndicationForART">
<span<?php echo $ivf_embryology_chart_view->IndicationForART->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->IndicationForART->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day0sino->Visible) { // Day0sino ?>
	<tr id="r_Day0sino">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0sino"><?php echo $ivf_embryology_chart_view->Day0sino->caption() ?></span></td>
		<td data-name="Day0sino" <?php echo $ivf_embryology_chart_view->Day0sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0sino">
<span<?php echo $ivf_embryology_chart_view->Day0sino->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day0sino->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<tr id="r_Day0OocyteStage">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0OocyteStage"><?php echo $ivf_embryology_chart_view->Day0OocyteStage->caption() ?></span></td>
		<td data-name="Day0OocyteStage" <?php echo $ivf_embryology_chart_view->Day0OocyteStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0OocyteStage">
<span<?php echo $ivf_embryology_chart_view->Day0OocyteStage->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
	<tr id="r_Day0PolarBodyPosition">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0PolarBodyPosition"><?php echo $ivf_embryology_chart_view->Day0PolarBodyPosition->caption() ?></span></td>
		<td data-name="Day0PolarBodyPosition" <?php echo $ivf_embryology_chart_view->Day0PolarBodyPosition->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0PolarBodyPosition">
<span<?php echo $ivf_embryology_chart_view->Day0PolarBodyPosition->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day0PolarBodyPosition->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day0Breakage->Visible) { // Day0Breakage ?>
	<tr id="r_Day0Breakage">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0Breakage"><?php echo $ivf_embryology_chart_view->Day0Breakage->caption() ?></span></td>
		<td data-name="Day0Breakage" <?php echo $ivf_embryology_chart_view->Day0Breakage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Breakage">
<span<?php echo $ivf_embryology_chart_view->Day0Breakage->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day0Breakage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day0Attempts->Visible) { // Day0Attempts ?>
	<tr id="r_Day0Attempts">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0Attempts"><?php echo $ivf_embryology_chart_view->Day0Attempts->caption() ?></span></td>
		<td data-name="Day0Attempts" <?php echo $ivf_embryology_chart_view->Day0Attempts->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Attempts">
<span<?php echo $ivf_embryology_chart_view->Day0Attempts->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day0Attempts->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
	<tr id="r_Day0SPZMorpho">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0SPZMorpho"><?php echo $ivf_embryology_chart_view->Day0SPZMorpho->caption() ?></span></td>
		<td data-name="Day0SPZMorpho" <?php echo $ivf_embryology_chart_view->Day0SPZMorpho->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZMorpho">
<span<?php echo $ivf_embryology_chart_view->Day0SPZMorpho->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day0SPZMorpho->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
	<tr id="r_Day0SPZLocation">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0SPZLocation"><?php echo $ivf_embryology_chart_view->Day0SPZLocation->caption() ?></span></td>
		<td data-name="Day0SPZLocation" <?php echo $ivf_embryology_chart_view->Day0SPZLocation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZLocation">
<span<?php echo $ivf_embryology_chart_view->Day0SPZLocation->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day0SPZLocation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
	<tr id="r_Day0SpOrgin">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0SpOrgin"><?php echo $ivf_embryology_chart_view->Day0SpOrgin->caption() ?></span></td>
		<td data-name="Day0SpOrgin" <?php echo $ivf_embryology_chart_view->Day0SpOrgin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SpOrgin">
<span<?php echo $ivf_embryology_chart_view->Day0SpOrgin->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day0SpOrgin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
	<tr id="r_Day5Cryoptop">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Cryoptop"><?php echo $ivf_embryology_chart_view->Day5Cryoptop->caption() ?></span></td>
		<td data-name="Day5Cryoptop" <?php echo $ivf_embryology_chart_view->Day5Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Cryoptop">
<span<?php echo $ivf_embryology_chart_view->Day5Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day5Cryoptop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day1Sperm->Visible) { // Day1Sperm ?>
	<tr id="r_Day1Sperm">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Sperm"><?php echo $ivf_embryology_chart_view->Day1Sperm->caption() ?></span></td>
		<td data-name="Day1Sperm" <?php echo $ivf_embryology_chart_view->Day1Sperm->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Sperm">
<span<?php echo $ivf_embryology_chart_view->Day1Sperm->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day1Sperm->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day1PN->Visible) { // Day1PN ?>
	<tr id="r_Day1PN">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1PN"><?php echo $ivf_embryology_chart_view->Day1PN->caption() ?></span></td>
		<td data-name="Day1PN" <?php echo $ivf_embryology_chart_view->Day1PN->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PN">
<span<?php echo $ivf_embryology_chart_view->Day1PN->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day1PN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day1PB->Visible) { // Day1PB ?>
	<tr id="r_Day1PB">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1PB"><?php echo $ivf_embryology_chart_view->Day1PB->caption() ?></span></td>
		<td data-name="Day1PB" <?php echo $ivf_embryology_chart_view->Day1PB->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PB">
<span<?php echo $ivf_embryology_chart_view->Day1PB->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day1PB->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
	<tr id="r_Day1Pronucleus">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Pronucleus"><?php echo $ivf_embryology_chart_view->Day1Pronucleus->caption() ?></span></td>
		<td data-name="Day1Pronucleus" <?php echo $ivf_embryology_chart_view->Day1Pronucleus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Pronucleus">
<span<?php echo $ivf_embryology_chart_view->Day1Pronucleus->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day1Pronucleus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
	<tr id="r_Day1Nucleolus">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Nucleolus"><?php echo $ivf_embryology_chart_view->Day1Nucleolus->caption() ?></span></td>
		<td data-name="Day1Nucleolus" <?php echo $ivf_embryology_chart_view->Day1Nucleolus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Nucleolus">
<span<?php echo $ivf_embryology_chart_view->Day1Nucleolus->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day1Nucleolus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day1Halo->Visible) { // Day1Halo ?>
	<tr id="r_Day1Halo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Halo"><?php echo $ivf_embryology_chart_view->Day1Halo->caption() ?></span></td>
		<td data-name="Day1Halo" <?php echo $ivf_embryology_chart_view->Day1Halo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Halo">
<span<?php echo $ivf_embryology_chart_view->Day1Halo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day1Halo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day2SiNo->Visible) { // Day2SiNo ?>
	<tr id="r_Day2SiNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2SiNo"><?php echo $ivf_embryology_chart_view->Day2SiNo->caption() ?></span></td>
		<td data-name="Day2SiNo" <?php echo $ivf_embryology_chart_view->Day2SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2SiNo">
<span<?php echo $ivf_embryology_chart_view->Day2SiNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day2SiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day2CellNo->Visible) { // Day2CellNo ?>
	<tr id="r_Day2CellNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2CellNo"><?php echo $ivf_embryology_chart_view->Day2CellNo->caption() ?></span></td>
		<td data-name="Day2CellNo" <?php echo $ivf_embryology_chart_view->Day2CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2CellNo">
<span<?php echo $ivf_embryology_chart_view->Day2CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day2CellNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day2Frag->Visible) { // Day2Frag ?>
	<tr id="r_Day2Frag">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Frag"><?php echo $ivf_embryology_chart_view->Day2Frag->caption() ?></span></td>
		<td data-name="Day2Frag" <?php echo $ivf_embryology_chart_view->Day2Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Frag">
<span<?php echo $ivf_embryology_chart_view->Day2Frag->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day2Frag->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day2Symmetry->Visible) { // Day2Symmetry ?>
	<tr id="r_Day2Symmetry">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Symmetry"><?php echo $ivf_embryology_chart_view->Day2Symmetry->caption() ?></span></td>
		<td data-name="Day2Symmetry" <?php echo $ivf_embryology_chart_view->Day2Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Symmetry">
<span<?php echo $ivf_embryology_chart_view->Day2Symmetry->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day2Symmetry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
	<tr id="r_Day2Cryoptop">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Cryoptop"><?php echo $ivf_embryology_chart_view->Day2Cryoptop->caption() ?></span></td>
		<td data-name="Day2Cryoptop" <?php echo $ivf_embryology_chart_view->Day2Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Cryoptop">
<span<?php echo $ivf_embryology_chart_view->Day2Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day2Cryoptop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day2Grade->Visible) { // Day2Grade ?>
	<tr id="r_Day2Grade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Grade"><?php echo $ivf_embryology_chart_view->Day2Grade->caption() ?></span></td>
		<td data-name="Day2Grade" <?php echo $ivf_embryology_chart_view->Day2Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Grade">
<span<?php echo $ivf_embryology_chart_view->Day2Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day2Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day2End->Visible) { // Day2End ?>
	<tr id="r_Day2End">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2End"><?php echo $ivf_embryology_chart_view->Day2End->caption() ?></span></td>
		<td data-name="Day2End" <?php echo $ivf_embryology_chart_view->Day2End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2End">
<span<?php echo $ivf_embryology_chart_view->Day2End->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day2End->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day3Sino->Visible) { // Day3Sino ?>
	<tr id="r_Day3Sino">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Sino"><?php echo $ivf_embryology_chart_view->Day3Sino->caption() ?></span></td>
		<td data-name="Day3Sino" <?php echo $ivf_embryology_chart_view->Day3Sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Sino">
<span<?php echo $ivf_embryology_chart_view->Day3Sino->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day3Sino->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day3CellNo->Visible) { // Day3CellNo ?>
	<tr id="r_Day3CellNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3CellNo"><?php echo $ivf_embryology_chart_view->Day3CellNo->caption() ?></span></td>
		<td data-name="Day3CellNo" <?php echo $ivf_embryology_chart_view->Day3CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3CellNo">
<span<?php echo $ivf_embryology_chart_view->Day3CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day3CellNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day3Frag->Visible) { // Day3Frag ?>
	<tr id="r_Day3Frag">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Frag"><?php echo $ivf_embryology_chart_view->Day3Frag->caption() ?></span></td>
		<td data-name="Day3Frag" <?php echo $ivf_embryology_chart_view->Day3Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Frag">
<span<?php echo $ivf_embryology_chart_view->Day3Frag->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day3Frag->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day3Symmetry->Visible) { // Day3Symmetry ?>
	<tr id="r_Day3Symmetry">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Symmetry"><?php echo $ivf_embryology_chart_view->Day3Symmetry->caption() ?></span></td>
		<td data-name="Day3Symmetry" <?php echo $ivf_embryology_chart_view->Day3Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Symmetry">
<span<?php echo $ivf_embryology_chart_view->Day3Symmetry->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day3Symmetry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day3ZP->Visible) { // Day3ZP ?>
	<tr id="r_Day3ZP">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3ZP"><?php echo $ivf_embryology_chart_view->Day3ZP->caption() ?></span></td>
		<td data-name="Day3ZP" <?php echo $ivf_embryology_chart_view->Day3ZP->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3ZP">
<span<?php echo $ivf_embryology_chart_view->Day3ZP->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day3ZP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day3Vacoules->Visible) { // Day3Vacoules ?>
	<tr id="r_Day3Vacoules">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Vacoules"><?php echo $ivf_embryology_chart_view->Day3Vacoules->caption() ?></span></td>
		<td data-name="Day3Vacoules" <?php echo $ivf_embryology_chart_view->Day3Vacoules->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Vacoules">
<span<?php echo $ivf_embryology_chart_view->Day3Vacoules->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day3Vacoules->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day3Grade->Visible) { // Day3Grade ?>
	<tr id="r_Day3Grade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Grade"><?php echo $ivf_embryology_chart_view->Day3Grade->caption() ?></span></td>
		<td data-name="Day3Grade" <?php echo $ivf_embryology_chart_view->Day3Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Grade">
<span<?php echo $ivf_embryology_chart_view->Day3Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day3Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
	<tr id="r_Day3Cryoptop">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Cryoptop"><?php echo $ivf_embryology_chart_view->Day3Cryoptop->caption() ?></span></td>
		<td data-name="Day3Cryoptop" <?php echo $ivf_embryology_chart_view->Day3Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Cryoptop">
<span<?php echo $ivf_embryology_chart_view->Day3Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day3Cryoptop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day3End->Visible) { // Day3End ?>
	<tr id="r_Day3End">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3End"><?php echo $ivf_embryology_chart_view->Day3End->caption() ?></span></td>
		<td data-name="Day3End" <?php echo $ivf_embryology_chart_view->Day3End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3End">
<span<?php echo $ivf_embryology_chart_view->Day3End->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day3End->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day4SiNo->Visible) { // Day4SiNo ?>
	<tr id="r_Day4SiNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4SiNo"><?php echo $ivf_embryology_chart_view->Day4SiNo->caption() ?></span></td>
		<td data-name="Day4SiNo" <?php echo $ivf_embryology_chart_view->Day4SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4SiNo">
<span<?php echo $ivf_embryology_chart_view->Day4SiNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day4SiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day4CellNo->Visible) { // Day4CellNo ?>
	<tr id="r_Day4CellNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4CellNo"><?php echo $ivf_embryology_chart_view->Day4CellNo->caption() ?></span></td>
		<td data-name="Day4CellNo" <?php echo $ivf_embryology_chart_view->Day4CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4CellNo">
<span<?php echo $ivf_embryology_chart_view->Day4CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day4CellNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day4Frag->Visible) { // Day4Frag ?>
	<tr id="r_Day4Frag">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Frag"><?php echo $ivf_embryology_chart_view->Day4Frag->caption() ?></span></td>
		<td data-name="Day4Frag" <?php echo $ivf_embryology_chart_view->Day4Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Frag">
<span<?php echo $ivf_embryology_chart_view->Day4Frag->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day4Frag->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day4Symmetry->Visible) { // Day4Symmetry ?>
	<tr id="r_Day4Symmetry">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Symmetry"><?php echo $ivf_embryology_chart_view->Day4Symmetry->caption() ?></span></td>
		<td data-name="Day4Symmetry" <?php echo $ivf_embryology_chart_view->Day4Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Symmetry">
<span<?php echo $ivf_embryology_chart_view->Day4Symmetry->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day4Symmetry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day4Grade->Visible) { // Day4Grade ?>
	<tr id="r_Day4Grade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Grade"><?php echo $ivf_embryology_chart_view->Day4Grade->caption() ?></span></td>
		<td data-name="Day4Grade" <?php echo $ivf_embryology_chart_view->Day4Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Grade">
<span<?php echo $ivf_embryology_chart_view->Day4Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day4Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
	<tr id="r_Day4Cryoptop">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Cryoptop"><?php echo $ivf_embryology_chart_view->Day4Cryoptop->caption() ?></span></td>
		<td data-name="Day4Cryoptop" <?php echo $ivf_embryology_chart_view->Day4Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Cryoptop">
<span<?php echo $ivf_embryology_chart_view->Day4Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day4Cryoptop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day4End->Visible) { // Day4End ?>
	<tr id="r_Day4End">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4End"><?php echo $ivf_embryology_chart_view->Day4End->caption() ?></span></td>
		<td data-name="Day4End" <?php echo $ivf_embryology_chart_view->Day4End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4End">
<span<?php echo $ivf_embryology_chart_view->Day4End->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day4End->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day5CellNo->Visible) { // Day5CellNo ?>
	<tr id="r_Day5CellNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5CellNo"><?php echo $ivf_embryology_chart_view->Day5CellNo->caption() ?></span></td>
		<td data-name="Day5CellNo" <?php echo $ivf_embryology_chart_view->Day5CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5CellNo">
<span<?php echo $ivf_embryology_chart_view->Day5CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day5CellNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day5ICM->Visible) { // Day5ICM ?>
	<tr id="r_Day5ICM">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5ICM"><?php echo $ivf_embryology_chart_view->Day5ICM->caption() ?></span></td>
		<td data-name="Day5ICM" <?php echo $ivf_embryology_chart_view->Day5ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5ICM">
<span<?php echo $ivf_embryology_chart_view->Day5ICM->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day5ICM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day5TE->Visible) { // Day5TE ?>
	<tr id="r_Day5TE">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5TE"><?php echo $ivf_embryology_chart_view->Day5TE->caption() ?></span></td>
		<td data-name="Day5TE" <?php echo $ivf_embryology_chart_view->Day5TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5TE">
<span<?php echo $ivf_embryology_chart_view->Day5TE->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day5TE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day5Observation->Visible) { // Day5Observation ?>
	<tr id="r_Day5Observation">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Observation"><?php echo $ivf_embryology_chart_view->Day5Observation->caption() ?></span></td>
		<td data-name="Day5Observation" <?php echo $ivf_embryology_chart_view->Day5Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Observation">
<span<?php echo $ivf_embryology_chart_view->Day5Observation->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day5Observation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day5Collapsed->Visible) { // Day5Collapsed ?>
	<tr id="r_Day5Collapsed">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Collapsed"><?php echo $ivf_embryology_chart_view->Day5Collapsed->caption() ?></span></td>
		<td data-name="Day5Collapsed" <?php echo $ivf_embryology_chart_view->Day5Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Collapsed">
<span<?php echo $ivf_embryology_chart_view->Day5Collapsed->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day5Collapsed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
	<tr id="r_Day5Vacoulles">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Vacoulles"><?php echo $ivf_embryology_chart_view->Day5Vacoulles->caption() ?></span></td>
		<td data-name="Day5Vacoulles" <?php echo $ivf_embryology_chart_view->Day5Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Vacoulles">
<span<?php echo $ivf_embryology_chart_view->Day5Vacoulles->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day5Vacoulles->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day5Grade->Visible) { // Day5Grade ?>
	<tr id="r_Day5Grade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Grade"><?php echo $ivf_embryology_chart_view->Day5Grade->caption() ?></span></td>
		<td data-name="Day5Grade" <?php echo $ivf_embryology_chart_view->Day5Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Grade">
<span<?php echo $ivf_embryology_chart_view->Day5Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day5Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day6CellNo->Visible) { // Day6CellNo ?>
	<tr id="r_Day6CellNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6CellNo"><?php echo $ivf_embryology_chart_view->Day6CellNo->caption() ?></span></td>
		<td data-name="Day6CellNo" <?php echo $ivf_embryology_chart_view->Day6CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6CellNo">
<span<?php echo $ivf_embryology_chart_view->Day6CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day6CellNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day6ICM->Visible) { // Day6ICM ?>
	<tr id="r_Day6ICM">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6ICM"><?php echo $ivf_embryology_chart_view->Day6ICM->caption() ?></span></td>
		<td data-name="Day6ICM" <?php echo $ivf_embryology_chart_view->Day6ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6ICM">
<span<?php echo $ivf_embryology_chart_view->Day6ICM->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day6ICM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day6TE->Visible) { // Day6TE ?>
	<tr id="r_Day6TE">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6TE"><?php echo $ivf_embryology_chart_view->Day6TE->caption() ?></span></td>
		<td data-name="Day6TE" <?php echo $ivf_embryology_chart_view->Day6TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6TE">
<span<?php echo $ivf_embryology_chart_view->Day6TE->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day6TE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day6Observation->Visible) { // Day6Observation ?>
	<tr id="r_Day6Observation">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Observation"><?php echo $ivf_embryology_chart_view->Day6Observation->caption() ?></span></td>
		<td data-name="Day6Observation" <?php echo $ivf_embryology_chart_view->Day6Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Observation">
<span<?php echo $ivf_embryology_chart_view->Day6Observation->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day6Observation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day6Collapsed->Visible) { // Day6Collapsed ?>
	<tr id="r_Day6Collapsed">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Collapsed"><?php echo $ivf_embryology_chart_view->Day6Collapsed->caption() ?></span></td>
		<td data-name="Day6Collapsed" <?php echo $ivf_embryology_chart_view->Day6Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Collapsed">
<span<?php echo $ivf_embryology_chart_view->Day6Collapsed->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day6Collapsed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
	<tr id="r_Day6Vacoulles">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Vacoulles"><?php echo $ivf_embryology_chart_view->Day6Vacoulles->caption() ?></span></td>
		<td data-name="Day6Vacoulles" <?php echo $ivf_embryology_chart_view->Day6Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Vacoulles">
<span<?php echo $ivf_embryology_chart_view->Day6Vacoulles->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day6Vacoulles->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day6Grade->Visible) { // Day6Grade ?>
	<tr id="r_Day6Grade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Grade"><?php echo $ivf_embryology_chart_view->Day6Grade->caption() ?></span></td>
		<td data-name="Day6Grade" <?php echo $ivf_embryology_chart_view->Day6Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Grade">
<span<?php echo $ivf_embryology_chart_view->Day6Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day6Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
	<tr id="r_Day6Cryoptop">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Cryoptop"><?php echo $ivf_embryology_chart_view->Day6Cryoptop->caption() ?></span></td>
		<td data-name="Day6Cryoptop" <?php echo $ivf_embryology_chart_view->Day6Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Cryoptop">
<span<?php echo $ivf_embryology_chart_view->Day6Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day6Cryoptop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->EndSiNo->Visible) { // EndSiNo ?>
	<tr id="r_EndSiNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndSiNo"><?php echo $ivf_embryology_chart_view->EndSiNo->caption() ?></span></td>
		<td data-name="EndSiNo" <?php echo $ivf_embryology_chart_view->EndSiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndSiNo">
<span<?php echo $ivf_embryology_chart_view->EndSiNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->EndSiNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->EndingDay->Visible) { // EndingDay ?>
	<tr id="r_EndingDay">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingDay"><?php echo $ivf_embryology_chart_view->EndingDay->caption() ?></span></td>
		<td data-name="EndingDay" <?php echo $ivf_embryology_chart_view->EndingDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingDay">
<span<?php echo $ivf_embryology_chart_view->EndingDay->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->EndingDay->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->EndingCellStage->Visible) { // EndingCellStage ?>
	<tr id="r_EndingCellStage">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingCellStage"><?php echo $ivf_embryology_chart_view->EndingCellStage->caption() ?></span></td>
		<td data-name="EndingCellStage" <?php echo $ivf_embryology_chart_view->EndingCellStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingCellStage">
<span<?php echo $ivf_embryology_chart_view->EndingCellStage->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->EndingCellStage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->EndingGrade->Visible) { // EndingGrade ?>
	<tr id="r_EndingGrade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingGrade"><?php echo $ivf_embryology_chart_view->EndingGrade->caption() ?></span></td>
		<td data-name="EndingGrade" <?php echo $ivf_embryology_chart_view->EndingGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingGrade">
<span<?php echo $ivf_embryology_chart_view->EndingGrade->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->EndingGrade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->EndingState->Visible) { // EndingState ?>
	<tr id="r_EndingState">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingState"><?php echo $ivf_embryology_chart_view->EndingState->caption() ?></span></td>
		<td data-name="EndingState" <?php echo $ivf_embryology_chart_view->EndingState->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingState">
<span<?php echo $ivf_embryology_chart_view->EndingState->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->EndingState->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_TidNo"><?php echo $ivf_embryology_chart_view->TidNo->caption() ?></span></td>
		<td data-name="TidNo" <?php echo $ivf_embryology_chart_view->TidNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_TidNo">
<span<?php echo $ivf_embryology_chart_view->TidNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->DidNO->Visible) { // DidNO ?>
	<tr id="r_DidNO">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_DidNO"><?php echo $ivf_embryology_chart_view->DidNO->caption() ?></span></td>
		<td data-name="DidNO" <?php echo $ivf_embryology_chart_view->DidNO->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart_view->DidNO->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->DidNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
	<tr id="r_ICSiIVFDateTime">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ICSiIVFDateTime"><?php echo $ivf_embryology_chart_view->ICSiIVFDateTime->caption() ?></span></td>
		<td data-name="ICSiIVFDateTime" <?php echo $ivf_embryology_chart_view->ICSiIVFDateTime->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ICSiIVFDateTime">
<span<?php echo $ivf_embryology_chart_view->ICSiIVFDateTime->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->ICSiIVFDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
	<tr id="r_PrimaryEmbrologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_PrimaryEmbrologist"><?php echo $ivf_embryology_chart_view->PrimaryEmbrologist->caption() ?></span></td>
		<td data-name="PrimaryEmbrologist" <?php echo $ivf_embryology_chart_view->PrimaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_PrimaryEmbrologist">
<span<?php echo $ivf_embryology_chart_view->PrimaryEmbrologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->PrimaryEmbrologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
	<tr id="r_SecondaryEmbrologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_SecondaryEmbrologist"><?php echo $ivf_embryology_chart_view->SecondaryEmbrologist->caption() ?></span></td>
		<td data-name="SecondaryEmbrologist" <?php echo $ivf_embryology_chart_view->SecondaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SecondaryEmbrologist">
<span<?php echo $ivf_embryology_chart_view->SecondaryEmbrologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->SecondaryEmbrologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Incubator->Visible) { // Incubator ?>
	<tr id="r_Incubator">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Incubator"><?php echo $ivf_embryology_chart_view->Incubator->caption() ?></span></td>
		<td data-name="Incubator" <?php echo $ivf_embryology_chart_view->Incubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Incubator">
<span<?php echo $ivf_embryology_chart_view->Incubator->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Incubator->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->location->Visible) { // location ?>
	<tr id="r_location">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_location"><?php echo $ivf_embryology_chart_view->location->caption() ?></span></td>
		<td data-name="location" <?php echo $ivf_embryology_chart_view->location->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_location">
<span<?php echo $ivf_embryology_chart_view->location->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->location->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->OocyteNo->Visible) { // OocyteNo ?>
	<tr id="r_OocyteNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_OocyteNo"><?php echo $ivf_embryology_chart_view->OocyteNo->caption() ?></span></td>
		<td data-name="OocyteNo" <?php echo $ivf_embryology_chart_view->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_OocyteNo">
<span<?php echo $ivf_embryology_chart_view->OocyteNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->OocyteNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Stage->Visible) { // Stage ?>
	<tr id="r_Stage">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Stage"><?php echo $ivf_embryology_chart_view->Stage->caption() ?></span></td>
		<td data-name="Stage" <?php echo $ivf_embryology_chart_view->Stage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Stage">
<span<?php echo $ivf_embryology_chart_view->Stage->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Stage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Remarks"><?php echo $ivf_embryology_chart_view->Remarks->caption() ?></span></td>
		<td data-name="Remarks" <?php echo $ivf_embryology_chart_view->Remarks->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Remarks">
<span<?php echo $ivf_embryology_chart_view->Remarks->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitrificationDate->Visible) { // vitrificationDate ?>
	<tr id="r_vitrificationDate">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitrificationDate"><?php echo $ivf_embryology_chart_view->vitrificationDate->caption() ?></span></td>
		<td data-name="vitrificationDate" <?php echo $ivf_embryology_chart_view->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitrificationDate">
<span<?php echo $ivf_embryology_chart_view->vitrificationDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitrificationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
	<tr id="r_vitriPrimaryEmbryologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist"><?php echo $ivf_embryology_chart_view->vitriPrimaryEmbryologist->caption() ?></span></td>
		<td data-name="vitriPrimaryEmbryologist" <?php echo $ivf_embryology_chart_view->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?php echo $ivf_embryology_chart_view->vitriPrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
	<tr id="r_vitriSecondaryEmbryologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist"><?php echo $ivf_embryology_chart_view->vitriSecondaryEmbryologist->caption() ?></span></td>
		<td data-name="vitriSecondaryEmbryologist" <?php echo $ivf_embryology_chart_view->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?php echo $ivf_embryology_chart_view->vitriSecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
	<tr id="r_vitriEmbryoNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriEmbryoNo"><?php echo $ivf_embryology_chart_view->vitriEmbryoNo->caption() ?></span></td>
		<td data-name="vitriEmbryoNo" <?php echo $ivf_embryology_chart_view->vitriEmbryoNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriEmbryoNo">
<span<?php echo $ivf_embryology_chart_view->vitriEmbryoNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriEmbryoNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->thawReFrozen->Visible) { // thawReFrozen ?>
	<tr id="r_thawReFrozen">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawReFrozen"><?php echo $ivf_embryology_chart_view->thawReFrozen->caption() ?></span></td>
		<td data-name="thawReFrozen" <?php echo $ivf_embryology_chart_view->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawReFrozen">
<span<?php echo $ivf_embryology_chart_view->thawReFrozen->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->thawReFrozen->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
	<tr id="r_vitriFertilisationDate">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriFertilisationDate"><?php echo $ivf_embryology_chart_view->vitriFertilisationDate->caption() ?></span></td>
		<td data-name="vitriFertilisationDate" <?php echo $ivf_embryology_chart_view->vitriFertilisationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriFertilisationDate">
<span<?php echo $ivf_embryology_chart_view->vitriFertilisationDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriFertilisationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriDay->Visible) { // vitriDay ?>
	<tr id="r_vitriDay">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriDay"><?php echo $ivf_embryology_chart_view->vitriDay->caption() ?></span></td>
		<td data-name="vitriDay" <?php echo $ivf_embryology_chart_view->vitriDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriDay">
<span<?php echo $ivf_embryology_chart_view->vitriDay->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriDay->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriStage->Visible) { // vitriStage ?>
	<tr id="r_vitriStage">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriStage"><?php echo $ivf_embryology_chart_view->vitriStage->caption() ?></span></td>
		<td data-name="vitriStage" <?php echo $ivf_embryology_chart_view->vitriStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriStage">
<span<?php echo $ivf_embryology_chart_view->vitriStage->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriStage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriGrade->Visible) { // vitriGrade ?>
	<tr id="r_vitriGrade">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriGrade"><?php echo $ivf_embryology_chart_view->vitriGrade->caption() ?></span></td>
		<td data-name="vitriGrade" <?php echo $ivf_embryology_chart_view->vitriGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGrade">
<span<?php echo $ivf_embryology_chart_view->vitriGrade->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriGrade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriIncubator->Visible) { // vitriIncubator ?>
	<tr id="r_vitriIncubator">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriIncubator"><?php echo $ivf_embryology_chart_view->vitriIncubator->caption() ?></span></td>
		<td data-name="vitriIncubator" <?php echo $ivf_embryology_chart_view->vitriIncubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriIncubator">
<span<?php echo $ivf_embryology_chart_view->vitriIncubator->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriIncubator->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriTank->Visible) { // vitriTank ?>
	<tr id="r_vitriTank">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriTank"><?php echo $ivf_embryology_chart_view->vitriTank->caption() ?></span></td>
		<td data-name="vitriTank" <?php echo $ivf_embryology_chart_view->vitriTank->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriTank">
<span<?php echo $ivf_embryology_chart_view->vitriTank->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriTank->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriCanister->Visible) { // vitriCanister ?>
	<tr id="r_vitriCanister">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriCanister"><?php echo $ivf_embryology_chart_view->vitriCanister->caption() ?></span></td>
		<td data-name="vitriCanister" <?php echo $ivf_embryology_chart_view->vitriCanister->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCanister">
<span<?php echo $ivf_embryology_chart_view->vitriCanister->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriCanister->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriGobiet->Visible) { // vitriGobiet ?>
	<tr id="r_vitriGobiet">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriGobiet"><?php echo $ivf_embryology_chart_view->vitriGobiet->caption() ?></span></td>
		<td data-name="vitriGobiet" <?php echo $ivf_embryology_chart_view->vitriGobiet->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGobiet">
<span<?php echo $ivf_embryology_chart_view->vitriGobiet->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriGobiet->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriViscotube->Visible) { // vitriViscotube ?>
	<tr id="r_vitriViscotube">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriViscotube"><?php echo $ivf_embryology_chart_view->vitriViscotube->caption() ?></span></td>
		<td data-name="vitriViscotube" <?php echo $ivf_embryology_chart_view->vitriViscotube->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriViscotube">
<span<?php echo $ivf_embryology_chart_view->vitriViscotube->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriViscotube->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
	<tr id="r_vitriCryolockNo">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriCryolockNo"><?php echo $ivf_embryology_chart_view->vitriCryolockNo->caption() ?></span></td>
		<td data-name="vitriCryolockNo" <?php echo $ivf_embryology_chart_view->vitriCryolockNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockNo">
<span<?php echo $ivf_embryology_chart_view->vitriCryolockNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriCryolockNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
	<tr id="r_vitriCryolockColour">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriCryolockColour"><?php echo $ivf_embryology_chart_view->vitriCryolockColour->caption() ?></span></td>
		<td data-name="vitriCryolockColour" <?php echo $ivf_embryology_chart_view->vitriCryolockColour->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockColour">
<span<?php echo $ivf_embryology_chart_view->vitriCryolockColour->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->vitriCryolockColour->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->thawDate->Visible) { // thawDate ?>
	<tr id="r_thawDate">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawDate"><?php echo $ivf_embryology_chart_view->thawDate->caption() ?></span></td>
		<td data-name="thawDate" <?php echo $ivf_embryology_chart_view->thawDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDate">
<span<?php echo $ivf_embryology_chart_view->thawDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->thawDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<tr id="r_thawPrimaryEmbryologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawPrimaryEmbryologist"><?php echo $ivf_embryology_chart_view->thawPrimaryEmbryologist->caption() ?></span></td>
		<td data-name="thawPrimaryEmbryologist" <?php echo $ivf_embryology_chart_view->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?php echo $ivf_embryology_chart_view->thawPrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<tr id="r_thawSecondaryEmbryologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawSecondaryEmbryologist"><?php echo $ivf_embryology_chart_view->thawSecondaryEmbryologist->caption() ?></span></td>
		<td data-name="thawSecondaryEmbryologist" <?php echo $ivf_embryology_chart_view->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?php echo $ivf_embryology_chart_view->thawSecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->thawET->Visible) { // thawET ?>
	<tr id="r_thawET">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawET"><?php echo $ivf_embryology_chart_view->thawET->caption() ?></span></td>
		<td data-name="thawET" <?php echo $ivf_embryology_chart_view->thawET->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawET">
<span<?php echo $ivf_embryology_chart_view->thawET->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->thawET->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->thawAbserve->Visible) { // thawAbserve ?>
	<tr id="r_thawAbserve">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawAbserve"><?php echo $ivf_embryology_chart_view->thawAbserve->caption() ?></span></td>
		<td data-name="thawAbserve" <?php echo $ivf_embryology_chart_view->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawAbserve">
<span<?php echo $ivf_embryology_chart_view->thawAbserve->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->thawAbserve->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->thawDiscard->Visible) { // thawDiscard ?>
	<tr id="r_thawDiscard">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawDiscard"><?php echo $ivf_embryology_chart_view->thawDiscard->caption() ?></span></td>
		<td data-name="thawDiscard" <?php echo $ivf_embryology_chart_view->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDiscard">
<span<?php echo $ivf_embryology_chart_view->thawDiscard->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->thawDiscard->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->ETCatheter->Visible) { // ETCatheter ?>
	<tr id="r_ETCatheter">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETCatheter"><?php echo $ivf_embryology_chart_view->ETCatheter->caption() ?></span></td>
		<td data-name="ETCatheter" <?php echo $ivf_embryology_chart_view->ETCatheter->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETCatheter">
<span<?php echo $ivf_embryology_chart_view->ETCatheter->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->ETCatheter->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->ETDifficulty->Visible) { // ETDifficulty ?>
	<tr id="r_ETDifficulty">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETDifficulty"><?php echo $ivf_embryology_chart_view->ETDifficulty->caption() ?></span></td>
		<td data-name="ETDifficulty" <?php echo $ivf_embryology_chart_view->ETDifficulty->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDifficulty">
<span<?php echo $ivf_embryology_chart_view->ETDifficulty->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->ETDifficulty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->ETEasy->Visible) { // ETEasy ?>
	<tr id="r_ETEasy">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETEasy"><?php echo $ivf_embryology_chart_view->ETEasy->caption() ?></span></td>
		<td data-name="ETEasy" <?php echo $ivf_embryology_chart_view->ETEasy->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEasy">
<span<?php echo $ivf_embryology_chart_view->ETEasy->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->ETEasy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->ETComments->Visible) { // ETComments ?>
	<tr id="r_ETComments">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETComments"><?php echo $ivf_embryology_chart_view->ETComments->caption() ?></span></td>
		<td data-name="ETComments" <?php echo $ivf_embryology_chart_view->ETComments->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETComments">
<span<?php echo $ivf_embryology_chart_view->ETComments->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->ETComments->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->ETDoctor->Visible) { // ETDoctor ?>
	<tr id="r_ETDoctor">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETDoctor"><?php echo $ivf_embryology_chart_view->ETDoctor->caption() ?></span></td>
		<td data-name="ETDoctor" <?php echo $ivf_embryology_chart_view->ETDoctor->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDoctor">
<span<?php echo $ivf_embryology_chart_view->ETDoctor->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->ETDoctor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->ETEmbryologist->Visible) { // ETEmbryologist ?>
	<tr id="r_ETEmbryologist">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETEmbryologist"><?php echo $ivf_embryology_chart_view->ETEmbryologist->caption() ?></span></td>
		<td data-name="ETEmbryologist" <?php echo $ivf_embryology_chart_view->ETEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEmbryologist">
<span<?php echo $ivf_embryology_chart_view->ETEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->ETEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->ETDate->Visible) { // ETDate ?>
	<tr id="r_ETDate">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETDate"><?php echo $ivf_embryology_chart_view->ETDate->caption() ?></span></td>
		<td data-name="ETDate" <?php echo $ivf_embryology_chart_view->ETDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDate">
<span<?php echo $ivf_embryology_chart_view->ETDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->ETDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_embryology_chart_view->Day1End->Visible) { // Day1End ?>
	<tr id="r_Day1End">
		<td class="<?php echo $ivf_embryology_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1End"><?php echo $ivf_embryology_chart_view->Day1End->caption() ?></span></td>
		<td data-name="Day1End" <?php echo $ivf_embryology_chart_view->Day1End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1End">
<span<?php echo $ivf_embryology_chart_view->Day1End->viewAttributes() ?>><?php echo $ivf_embryology_chart_view->Day1End->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_embryology_chart_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_embryology_chart_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_embryology_chart_view->terminate();
?>
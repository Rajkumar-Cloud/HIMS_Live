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
$ivf_embryology_chart_delete = new ivf_embryology_chart_delete();

// Run the page
$ivf_embryology_chart_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_embryology_chart_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_embryology_chartdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_embryology_chartdelete = currentForm = new ew.Form("fivf_embryology_chartdelete", "delete");
	loadjs.done("fivf_embryology_chartdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_embryology_chart_delete->showPageHeader(); ?>
<?php
$ivf_embryology_chart_delete->showMessage();
?>
<form name="fivf_embryology_chartdelete" id="fivf_embryology_chartdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_embryology_chart_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_embryology_chart_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_embryology_chart_delete->id->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_id" class="ivf_embryology_chart_id"><?php echo $ivf_embryology_chart_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->RIDNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo"><?php echo $ivf_embryology_chart_delete->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Name->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name"><?php echo $ivf_embryology_chart_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ARTCycle->Visible) { // ARTCycle ?>
		<th class="<?php echo $ivf_embryology_chart_delete->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle"><?php echo $ivf_embryology_chart_delete->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->SpermOrigin->Visible) { // SpermOrigin ?>
		<th class="<?php echo $ivf_embryology_chart_delete->SpermOrigin->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin"><?php echo $ivf_embryology_chart_delete->SpermOrigin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<th class="<?php echo $ivf_embryology_chart_delete->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique"><?php echo $ivf_embryology_chart_delete->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->IndicationForART->Visible) { // IndicationForART ?>
		<th class="<?php echo $ivf_embryology_chart_delete->IndicationForART->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART"><?php echo $ivf_embryology_chart_delete->IndicationForART->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0sino->Visible) { // Day0sino ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day0sino->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino"><?php echo $ivf_embryology_chart_delete->Day0sino->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day0OocyteStage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage"><?php echo $ivf_embryology_chart_delete->Day0OocyteStage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day0PolarBodyPosition->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition"><?php echo $ivf_embryology_chart_delete->Day0PolarBodyPosition->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0Breakage->Visible) { // Day0Breakage ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day0Breakage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage"><?php echo $ivf_embryology_chart_delete->Day0Breakage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0Attempts->Visible) { // Day0Attempts ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day0Attempts->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts"><?php echo $ivf_embryology_chart_delete->Day0Attempts->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day0SPZMorpho->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho"><?php echo $ivf_embryology_chart_delete->Day0SPZMorpho->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day0SPZLocation->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation"><?php echo $ivf_embryology_chart_delete->Day0SPZLocation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day0SpOrgin->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin"><?php echo $ivf_embryology_chart_delete->Day0SpOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day5Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop"><?php echo $ivf_embryology_chart_delete->Day5Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1Sperm->Visible) { // Day1Sperm ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day1Sperm->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm"><?php echo $ivf_embryology_chart_delete->Day1Sperm->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1PN->Visible) { // Day1PN ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day1PN->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN"><?php echo $ivf_embryology_chart_delete->Day1PN->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1PB->Visible) { // Day1PB ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day1PB->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB"><?php echo $ivf_embryology_chart_delete->Day1PB->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day1Pronucleus->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus"><?php echo $ivf_embryology_chart_delete->Day1Pronucleus->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day1Nucleolus->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus"><?php echo $ivf_embryology_chart_delete->Day1Nucleolus->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1Halo->Visible) { // Day1Halo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day1Halo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo"><?php echo $ivf_embryology_chart_delete->Day1Halo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2SiNo->Visible) { // Day2SiNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day2SiNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo"><?php echo $ivf_embryology_chart_delete->Day2SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2CellNo->Visible) { // Day2CellNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day2CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo"><?php echo $ivf_embryology_chart_delete->Day2CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2Frag->Visible) { // Day2Frag ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day2Frag->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag"><?php echo $ivf_embryology_chart_delete->Day2Frag->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2Symmetry->Visible) { // Day2Symmetry ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day2Symmetry->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry"><?php echo $ivf_embryology_chart_delete->Day2Symmetry->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day2Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop"><?php echo $ivf_embryology_chart_delete->Day2Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2Grade->Visible) { // Day2Grade ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day2Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade"><?php echo $ivf_embryology_chart_delete->Day2Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2End->Visible) { // Day2End ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day2End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End"><?php echo $ivf_embryology_chart_delete->Day2End->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Sino->Visible) { // Day3Sino ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day3Sino->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino"><?php echo $ivf_embryology_chart_delete->Day3Sino->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3CellNo->Visible) { // Day3CellNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day3CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo"><?php echo $ivf_embryology_chart_delete->Day3CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Frag->Visible) { // Day3Frag ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day3Frag->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag"><?php echo $ivf_embryology_chart_delete->Day3Frag->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Symmetry->Visible) { // Day3Symmetry ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day3Symmetry->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry"><?php echo $ivf_embryology_chart_delete->Day3Symmetry->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3ZP->Visible) { // Day3ZP ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day3ZP->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP"><?php echo $ivf_embryology_chart_delete->Day3ZP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Vacoules->Visible) { // Day3Vacoules ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day3Vacoules->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules"><?php echo $ivf_embryology_chart_delete->Day3Vacoules->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Grade->Visible) { // Day3Grade ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day3Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade"><?php echo $ivf_embryology_chart_delete->Day3Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day3Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop"><?php echo $ivf_embryology_chart_delete->Day3Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3End->Visible) { // Day3End ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day3End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End"><?php echo $ivf_embryology_chart_delete->Day3End->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4SiNo->Visible) { // Day4SiNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day4SiNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo"><?php echo $ivf_embryology_chart_delete->Day4SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4CellNo->Visible) { // Day4CellNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day4CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo"><?php echo $ivf_embryology_chart_delete->Day4CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4Frag->Visible) { // Day4Frag ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day4Frag->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag"><?php echo $ivf_embryology_chart_delete->Day4Frag->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4Symmetry->Visible) { // Day4Symmetry ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day4Symmetry->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry"><?php echo $ivf_embryology_chart_delete->Day4Symmetry->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4Grade->Visible) { // Day4Grade ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day4Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade"><?php echo $ivf_embryology_chart_delete->Day4Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day4Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop"><?php echo $ivf_embryology_chart_delete->Day4Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4End->Visible) { // Day4End ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day4End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End"><?php echo $ivf_embryology_chart_delete->Day4End->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5CellNo->Visible) { // Day5CellNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day5CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo"><?php echo $ivf_embryology_chart_delete->Day5CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5ICM->Visible) { // Day5ICM ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day5ICM->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM"><?php echo $ivf_embryology_chart_delete->Day5ICM->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5TE->Visible) { // Day5TE ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day5TE->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE"><?php echo $ivf_embryology_chart_delete->Day5TE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5Observation->Visible) { // Day5Observation ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day5Observation->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation"><?php echo $ivf_embryology_chart_delete->Day5Observation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5Collapsed->Visible) { // Day5Collapsed ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day5Collapsed->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed"><?php echo $ivf_embryology_chart_delete->Day5Collapsed->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day5Vacoulles->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles"><?php echo $ivf_embryology_chart_delete->Day5Vacoulles->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5Grade->Visible) { // Day5Grade ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day5Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade"><?php echo $ivf_embryology_chart_delete->Day5Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6CellNo->Visible) { // Day6CellNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day6CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo"><?php echo $ivf_embryology_chart_delete->Day6CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6ICM->Visible) { // Day6ICM ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day6ICM->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM"><?php echo $ivf_embryology_chart_delete->Day6ICM->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6TE->Visible) { // Day6TE ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day6TE->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE"><?php echo $ivf_embryology_chart_delete->Day6TE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6Observation->Visible) { // Day6Observation ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day6Observation->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation"><?php echo $ivf_embryology_chart_delete->Day6Observation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6Collapsed->Visible) { // Day6Collapsed ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day6Collapsed->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed"><?php echo $ivf_embryology_chart_delete->Day6Collapsed->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day6Vacoulles->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles"><?php echo $ivf_embryology_chart_delete->Day6Vacoulles->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6Grade->Visible) { // Day6Grade ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day6Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade"><?php echo $ivf_embryology_chart_delete->Day6Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day6Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop"><?php echo $ivf_embryology_chart_delete->Day6Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->EndSiNo->Visible) { // EndSiNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->EndSiNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo"><?php echo $ivf_embryology_chart_delete->EndSiNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->EndingDay->Visible) { // EndingDay ?>
		<th class="<?php echo $ivf_embryology_chart_delete->EndingDay->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay"><?php echo $ivf_embryology_chart_delete->EndingDay->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->EndingCellStage->Visible) { // EndingCellStage ?>
		<th class="<?php echo $ivf_embryology_chart_delete->EndingCellStage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage"><?php echo $ivf_embryology_chart_delete->EndingCellStage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->EndingGrade->Visible) { // EndingGrade ?>
		<th class="<?php echo $ivf_embryology_chart_delete->EndingGrade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade"><?php echo $ivf_embryology_chart_delete->EndingGrade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->EndingState->Visible) { // EndingState ?>
		<th class="<?php echo $ivf_embryology_chart_delete->EndingState->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState"><?php echo $ivf_embryology_chart_delete->EndingState->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo"><?php echo $ivf_embryology_chart_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->DidNO->Visible) { // DidNO ?>
		<th class="<?php echo $ivf_embryology_chart_delete->DidNO->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO"><?php echo $ivf_embryology_chart_delete->DidNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
		<th class="<?php echo $ivf_embryology_chart_delete->ICSiIVFDateTime->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime"><?php echo $ivf_embryology_chart_delete->ICSiIVFDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
		<th class="<?php echo $ivf_embryology_chart_delete->PrimaryEmbrologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist"><?php echo $ivf_embryology_chart_delete->PrimaryEmbrologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
		<th class="<?php echo $ivf_embryology_chart_delete->SecondaryEmbrologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist"><?php echo $ivf_embryology_chart_delete->SecondaryEmbrologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Incubator->Visible) { // Incubator ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Incubator->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator"><?php echo $ivf_embryology_chart_delete->Incubator->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->location->Visible) { // location ?>
		<th class="<?php echo $ivf_embryology_chart_delete->location->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_location" class="ivf_embryology_chart_location"><?php echo $ivf_embryology_chart_delete->location->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->OocyteNo->Visible) { // OocyteNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->OocyteNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo"><?php echo $ivf_embryology_chart_delete->OocyteNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Stage->Visible) { // Stage ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Stage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage"><?php echo $ivf_embryology_chart_delete->Stage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Remarks->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks"><?php echo $ivf_embryology_chart_delete->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitrificationDate->Visible) { // vitrificationDate ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitrificationDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate"><?php echo $ivf_embryology_chart_delete->vitrificationDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriPrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist"><?php echo $ivf_embryology_chart_delete->vitriPrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriSecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist"><?php echo $ivf_embryology_chart_delete->vitriSecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriEmbryoNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo"><?php echo $ivf_embryology_chart_delete->vitriEmbryoNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawReFrozen->Visible) { // thawReFrozen ?>
		<th class="<?php echo $ivf_embryology_chart_delete->thawReFrozen->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen"><?php echo $ivf_embryology_chart_delete->thawReFrozen->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriFertilisationDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate"><?php echo $ivf_embryology_chart_delete->vitriFertilisationDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriDay->Visible) { // vitriDay ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriDay->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay"><?php echo $ivf_embryology_chart_delete->vitriDay->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriStage->Visible) { // vitriStage ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriStage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage"><?php echo $ivf_embryology_chart_delete->vitriStage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriGrade->Visible) { // vitriGrade ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriGrade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade"><?php echo $ivf_embryology_chart_delete->vitriGrade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriIncubator->Visible) { // vitriIncubator ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriIncubator->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator"><?php echo $ivf_embryology_chart_delete->vitriIncubator->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriTank->Visible) { // vitriTank ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriTank->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank"><?php echo $ivf_embryology_chart_delete->vitriTank->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriCanister->Visible) { // vitriCanister ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriCanister->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister"><?php echo $ivf_embryology_chart_delete->vitriCanister->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriGobiet->Visible) { // vitriGobiet ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriGobiet->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet"><?php echo $ivf_embryology_chart_delete->vitriGobiet->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriViscotube->Visible) { // vitriViscotube ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriViscotube->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube"><?php echo $ivf_embryology_chart_delete->vitriViscotube->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriCryolockNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo"><?php echo $ivf_embryology_chart_delete->vitriCryolockNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
		<th class="<?php echo $ivf_embryology_chart_delete->vitriCryolockColour->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour"><?php echo $ivf_embryology_chart_delete->vitriCryolockColour->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawDate->Visible) { // thawDate ?>
		<th class="<?php echo $ivf_embryology_chart_delete->thawDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate"><?php echo $ivf_embryology_chart_delete->thawDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<th class="<?php echo $ivf_embryology_chart_delete->thawPrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist"><?php echo $ivf_embryology_chart_delete->thawPrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<th class="<?php echo $ivf_embryology_chart_delete->thawSecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist"><?php echo $ivf_embryology_chart_delete->thawSecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawET->Visible) { // thawET ?>
		<th class="<?php echo $ivf_embryology_chart_delete->thawET->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET"><?php echo $ivf_embryology_chart_delete->thawET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawAbserve->Visible) { // thawAbserve ?>
		<th class="<?php echo $ivf_embryology_chart_delete->thawAbserve->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve"><?php echo $ivf_embryology_chart_delete->thawAbserve->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawDiscard->Visible) { // thawDiscard ?>
		<th class="<?php echo $ivf_embryology_chart_delete->thawDiscard->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard"><?php echo $ivf_embryology_chart_delete->thawDiscard->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETCatheter->Visible) { // ETCatheter ?>
		<th class="<?php echo $ivf_embryology_chart_delete->ETCatheter->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter"><?php echo $ivf_embryology_chart_delete->ETCatheter->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETDifficulty->Visible) { // ETDifficulty ?>
		<th class="<?php echo $ivf_embryology_chart_delete->ETDifficulty->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty"><?php echo $ivf_embryology_chart_delete->ETDifficulty->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETEasy->Visible) { // ETEasy ?>
		<th class="<?php echo $ivf_embryology_chart_delete->ETEasy->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy"><?php echo $ivf_embryology_chart_delete->ETEasy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETComments->Visible) { // ETComments ?>
		<th class="<?php echo $ivf_embryology_chart_delete->ETComments->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments"><?php echo $ivf_embryology_chart_delete->ETComments->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETDoctor->Visible) { // ETDoctor ?>
		<th class="<?php echo $ivf_embryology_chart_delete->ETDoctor->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor"><?php echo $ivf_embryology_chart_delete->ETDoctor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETEmbryologist->Visible) { // ETEmbryologist ?>
		<th class="<?php echo $ivf_embryology_chart_delete->ETEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist"><?php echo $ivf_embryology_chart_delete->ETEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETDate->Visible) { // ETDate ?>
		<th class="<?php echo $ivf_embryology_chart_delete->ETDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate"><?php echo $ivf_embryology_chart_delete->ETDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1End->Visible) { // Day1End ?>
		<th class="<?php echo $ivf_embryology_chart_delete->Day1End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End"><?php echo $ivf_embryology_chart_delete->Day1End->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_embryology_chart_delete->RecordCount = 0;
$i = 0;
while (!$ivf_embryology_chart_delete->Recordset->EOF) {
	$ivf_embryology_chart_delete->RecordCount++;
	$ivf_embryology_chart_delete->RowCount++;

	// Set row properties
	$ivf_embryology_chart->resetAttributes();
	$ivf_embryology_chart->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_embryology_chart_delete->loadRowValues($ivf_embryology_chart_delete->Recordset);

	// Render row
	$ivf_embryology_chart_delete->renderRow();
?>
	<tr <?php echo $ivf_embryology_chart->rowAttributes() ?>>
<?php if ($ivf_embryology_chart_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_embryology_chart_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_id" class="ivf_embryology_chart_id">
<span<?php echo $ivf_embryology_chart_delete->id->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->RIDNo->Visible) { // RIDNo ?>
		<td <?php echo $ivf_embryology_chart_delete->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo">
<span<?php echo $ivf_embryology_chart_delete->RIDNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_embryology_chart_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name">
<span<?php echo $ivf_embryology_chart_delete->Name->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ARTCycle->Visible) { // ARTCycle ?>
		<td <?php echo $ivf_embryology_chart_delete->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle">
<span<?php echo $ivf_embryology_chart_delete->ARTCycle->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->SpermOrigin->Visible) { // SpermOrigin ?>
		<td <?php echo $ivf_embryology_chart_delete->SpermOrigin->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin">
<span<?php echo $ivf_embryology_chart_delete->SpermOrigin->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->SpermOrigin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td <?php echo $ivf_embryology_chart_delete->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique">
<span<?php echo $ivf_embryology_chart_delete->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->IndicationForART->Visible) { // IndicationForART ?>
		<td <?php echo $ivf_embryology_chart_delete->IndicationForART->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART">
<span<?php echo $ivf_embryology_chart_delete->IndicationForART->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->IndicationForART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0sino->Visible) { // Day0sino ?>
		<td <?php echo $ivf_embryology_chart_delete->Day0sino->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino">
<span<?php echo $ivf_embryology_chart_delete->Day0sino->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day0sino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<td <?php echo $ivf_embryology_chart_delete->Day0OocyteStage->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage">
<span<?php echo $ivf_embryology_chart_delete->Day0OocyteStage->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
		<td <?php echo $ivf_embryology_chart_delete->Day0PolarBodyPosition->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition">
<span<?php echo $ivf_embryology_chart_delete->Day0PolarBodyPosition->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day0PolarBodyPosition->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0Breakage->Visible) { // Day0Breakage ?>
		<td <?php echo $ivf_embryology_chart_delete->Day0Breakage->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage">
<span<?php echo $ivf_embryology_chart_delete->Day0Breakage->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day0Breakage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0Attempts->Visible) { // Day0Attempts ?>
		<td <?php echo $ivf_embryology_chart_delete->Day0Attempts->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts">
<span<?php echo $ivf_embryology_chart_delete->Day0Attempts->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day0Attempts->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
		<td <?php echo $ivf_embryology_chart_delete->Day0SPZMorpho->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho">
<span<?php echo $ivf_embryology_chart_delete->Day0SPZMorpho->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day0SPZMorpho->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
		<td <?php echo $ivf_embryology_chart_delete->Day0SPZLocation->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation">
<span<?php echo $ivf_embryology_chart_delete->Day0SPZLocation->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day0SPZLocation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
		<td <?php echo $ivf_embryology_chart_delete->Day0SpOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin">
<span<?php echo $ivf_embryology_chart_delete->Day0SpOrgin->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day0SpOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
		<td <?php echo $ivf_embryology_chart_delete->Day5Cryoptop->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop">
<span<?php echo $ivf_embryology_chart_delete->Day5Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day5Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1Sperm->Visible) { // Day1Sperm ?>
		<td <?php echo $ivf_embryology_chart_delete->Day1Sperm->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm">
<span<?php echo $ivf_embryology_chart_delete->Day1Sperm->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day1Sperm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1PN->Visible) { // Day1PN ?>
		<td <?php echo $ivf_embryology_chart_delete->Day1PN->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN">
<span<?php echo $ivf_embryology_chart_delete->Day1PN->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day1PN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1PB->Visible) { // Day1PB ?>
		<td <?php echo $ivf_embryology_chart_delete->Day1PB->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB">
<span<?php echo $ivf_embryology_chart_delete->Day1PB->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day1PB->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
		<td <?php echo $ivf_embryology_chart_delete->Day1Pronucleus->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus">
<span<?php echo $ivf_embryology_chart_delete->Day1Pronucleus->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day1Pronucleus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
		<td <?php echo $ivf_embryology_chart_delete->Day1Nucleolus->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus">
<span<?php echo $ivf_embryology_chart_delete->Day1Nucleolus->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day1Nucleolus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1Halo->Visible) { // Day1Halo ?>
		<td <?php echo $ivf_embryology_chart_delete->Day1Halo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo">
<span<?php echo $ivf_embryology_chart_delete->Day1Halo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day1Halo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2SiNo->Visible) { // Day2SiNo ?>
		<td <?php echo $ivf_embryology_chart_delete->Day2SiNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo">
<span<?php echo $ivf_embryology_chart_delete->Day2SiNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day2SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2CellNo->Visible) { // Day2CellNo ?>
		<td <?php echo $ivf_embryology_chart_delete->Day2CellNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo">
<span<?php echo $ivf_embryology_chart_delete->Day2CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day2CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2Frag->Visible) { // Day2Frag ?>
		<td <?php echo $ivf_embryology_chart_delete->Day2Frag->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag">
<span<?php echo $ivf_embryology_chart_delete->Day2Frag->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day2Frag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2Symmetry->Visible) { // Day2Symmetry ?>
		<td <?php echo $ivf_embryology_chart_delete->Day2Symmetry->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry">
<span<?php echo $ivf_embryology_chart_delete->Day2Symmetry->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day2Symmetry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
		<td <?php echo $ivf_embryology_chart_delete->Day2Cryoptop->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop">
<span<?php echo $ivf_embryology_chart_delete->Day2Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day2Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2Grade->Visible) { // Day2Grade ?>
		<td <?php echo $ivf_embryology_chart_delete->Day2Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade">
<span<?php echo $ivf_embryology_chart_delete->Day2Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day2Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day2End->Visible) { // Day2End ?>
		<td <?php echo $ivf_embryology_chart_delete->Day2End->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End">
<span<?php echo $ivf_embryology_chart_delete->Day2End->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day2End->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Sino->Visible) { // Day3Sino ?>
		<td <?php echo $ivf_embryology_chart_delete->Day3Sino->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino">
<span<?php echo $ivf_embryology_chart_delete->Day3Sino->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day3Sino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3CellNo->Visible) { // Day3CellNo ?>
		<td <?php echo $ivf_embryology_chart_delete->Day3CellNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo">
<span<?php echo $ivf_embryology_chart_delete->Day3CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day3CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Frag->Visible) { // Day3Frag ?>
		<td <?php echo $ivf_embryology_chart_delete->Day3Frag->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag">
<span<?php echo $ivf_embryology_chart_delete->Day3Frag->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day3Frag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Symmetry->Visible) { // Day3Symmetry ?>
		<td <?php echo $ivf_embryology_chart_delete->Day3Symmetry->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry">
<span<?php echo $ivf_embryology_chart_delete->Day3Symmetry->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day3Symmetry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3ZP->Visible) { // Day3ZP ?>
		<td <?php echo $ivf_embryology_chart_delete->Day3ZP->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP">
<span<?php echo $ivf_embryology_chart_delete->Day3ZP->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day3ZP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Vacoules->Visible) { // Day3Vacoules ?>
		<td <?php echo $ivf_embryology_chart_delete->Day3Vacoules->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules">
<span<?php echo $ivf_embryology_chart_delete->Day3Vacoules->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day3Vacoules->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Grade->Visible) { // Day3Grade ?>
		<td <?php echo $ivf_embryology_chart_delete->Day3Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade">
<span<?php echo $ivf_embryology_chart_delete->Day3Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day3Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
		<td <?php echo $ivf_embryology_chart_delete->Day3Cryoptop->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop">
<span<?php echo $ivf_embryology_chart_delete->Day3Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day3Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day3End->Visible) { // Day3End ?>
		<td <?php echo $ivf_embryology_chart_delete->Day3End->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End">
<span<?php echo $ivf_embryology_chart_delete->Day3End->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day3End->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4SiNo->Visible) { // Day4SiNo ?>
		<td <?php echo $ivf_embryology_chart_delete->Day4SiNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo">
<span<?php echo $ivf_embryology_chart_delete->Day4SiNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day4SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4CellNo->Visible) { // Day4CellNo ?>
		<td <?php echo $ivf_embryology_chart_delete->Day4CellNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo">
<span<?php echo $ivf_embryology_chart_delete->Day4CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day4CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4Frag->Visible) { // Day4Frag ?>
		<td <?php echo $ivf_embryology_chart_delete->Day4Frag->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag">
<span<?php echo $ivf_embryology_chart_delete->Day4Frag->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day4Frag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4Symmetry->Visible) { // Day4Symmetry ?>
		<td <?php echo $ivf_embryology_chart_delete->Day4Symmetry->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry">
<span<?php echo $ivf_embryology_chart_delete->Day4Symmetry->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day4Symmetry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4Grade->Visible) { // Day4Grade ?>
		<td <?php echo $ivf_embryology_chart_delete->Day4Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade">
<span<?php echo $ivf_embryology_chart_delete->Day4Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day4Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
		<td <?php echo $ivf_embryology_chart_delete->Day4Cryoptop->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop">
<span<?php echo $ivf_embryology_chart_delete->Day4Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day4Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day4End->Visible) { // Day4End ?>
		<td <?php echo $ivf_embryology_chart_delete->Day4End->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End">
<span<?php echo $ivf_embryology_chart_delete->Day4End->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day4End->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5CellNo->Visible) { // Day5CellNo ?>
		<td <?php echo $ivf_embryology_chart_delete->Day5CellNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo">
<span<?php echo $ivf_embryology_chart_delete->Day5CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day5CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5ICM->Visible) { // Day5ICM ?>
		<td <?php echo $ivf_embryology_chart_delete->Day5ICM->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM">
<span<?php echo $ivf_embryology_chart_delete->Day5ICM->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day5ICM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5TE->Visible) { // Day5TE ?>
		<td <?php echo $ivf_embryology_chart_delete->Day5TE->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE">
<span<?php echo $ivf_embryology_chart_delete->Day5TE->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day5TE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5Observation->Visible) { // Day5Observation ?>
		<td <?php echo $ivf_embryology_chart_delete->Day5Observation->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation">
<span<?php echo $ivf_embryology_chart_delete->Day5Observation->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day5Observation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5Collapsed->Visible) { // Day5Collapsed ?>
		<td <?php echo $ivf_embryology_chart_delete->Day5Collapsed->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed">
<span<?php echo $ivf_embryology_chart_delete->Day5Collapsed->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day5Collapsed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
		<td <?php echo $ivf_embryology_chart_delete->Day5Vacoulles->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles">
<span<?php echo $ivf_embryology_chart_delete->Day5Vacoulles->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day5Vacoulles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day5Grade->Visible) { // Day5Grade ?>
		<td <?php echo $ivf_embryology_chart_delete->Day5Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade">
<span<?php echo $ivf_embryology_chart_delete->Day5Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day5Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6CellNo->Visible) { // Day6CellNo ?>
		<td <?php echo $ivf_embryology_chart_delete->Day6CellNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo">
<span<?php echo $ivf_embryology_chart_delete->Day6CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day6CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6ICM->Visible) { // Day6ICM ?>
		<td <?php echo $ivf_embryology_chart_delete->Day6ICM->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM">
<span<?php echo $ivf_embryology_chart_delete->Day6ICM->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day6ICM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6TE->Visible) { // Day6TE ?>
		<td <?php echo $ivf_embryology_chart_delete->Day6TE->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE">
<span<?php echo $ivf_embryology_chart_delete->Day6TE->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day6TE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6Observation->Visible) { // Day6Observation ?>
		<td <?php echo $ivf_embryology_chart_delete->Day6Observation->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation">
<span<?php echo $ivf_embryology_chart_delete->Day6Observation->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day6Observation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6Collapsed->Visible) { // Day6Collapsed ?>
		<td <?php echo $ivf_embryology_chart_delete->Day6Collapsed->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed">
<span<?php echo $ivf_embryology_chart_delete->Day6Collapsed->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day6Collapsed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
		<td <?php echo $ivf_embryology_chart_delete->Day6Vacoulles->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles">
<span<?php echo $ivf_embryology_chart_delete->Day6Vacoulles->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day6Vacoulles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6Grade->Visible) { // Day6Grade ?>
		<td <?php echo $ivf_embryology_chart_delete->Day6Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade">
<span<?php echo $ivf_embryology_chart_delete->Day6Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day6Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
		<td <?php echo $ivf_embryology_chart_delete->Day6Cryoptop->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop">
<span<?php echo $ivf_embryology_chart_delete->Day6Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day6Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->EndSiNo->Visible) { // EndSiNo ?>
		<td <?php echo $ivf_embryology_chart_delete->EndSiNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo">
<span<?php echo $ivf_embryology_chart_delete->EndSiNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->EndSiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->EndingDay->Visible) { // EndingDay ?>
		<td <?php echo $ivf_embryology_chart_delete->EndingDay->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay">
<span<?php echo $ivf_embryology_chart_delete->EndingDay->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->EndingDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->EndingCellStage->Visible) { // EndingCellStage ?>
		<td <?php echo $ivf_embryology_chart_delete->EndingCellStage->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage">
<span<?php echo $ivf_embryology_chart_delete->EndingCellStage->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->EndingCellStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->EndingGrade->Visible) { // EndingGrade ?>
		<td <?php echo $ivf_embryology_chart_delete->EndingGrade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade">
<span<?php echo $ivf_embryology_chart_delete->EndingGrade->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->EndingGrade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->EndingState->Visible) { // EndingState ?>
		<td <?php echo $ivf_embryology_chart_delete->EndingState->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState">
<span<?php echo $ivf_embryology_chart_delete->EndingState->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->EndingState->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_embryology_chart_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo">
<span<?php echo $ivf_embryology_chart_delete->TidNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->DidNO->Visible) { // DidNO ?>
		<td <?php echo $ivf_embryology_chart_delete->DidNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart_delete->DidNO->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->DidNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
		<td <?php echo $ivf_embryology_chart_delete->ICSiIVFDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime">
<span<?php echo $ivf_embryology_chart_delete->ICSiIVFDateTime->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->ICSiIVFDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
		<td <?php echo $ivf_embryology_chart_delete->PrimaryEmbrologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist">
<span<?php echo $ivf_embryology_chart_delete->PrimaryEmbrologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->PrimaryEmbrologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
		<td <?php echo $ivf_embryology_chart_delete->SecondaryEmbrologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist">
<span<?php echo $ivf_embryology_chart_delete->SecondaryEmbrologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->SecondaryEmbrologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Incubator->Visible) { // Incubator ?>
		<td <?php echo $ivf_embryology_chart_delete->Incubator->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator">
<span<?php echo $ivf_embryology_chart_delete->Incubator->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Incubator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->location->Visible) { // location ?>
		<td <?php echo $ivf_embryology_chart_delete->location->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_location" class="ivf_embryology_chart_location">
<span<?php echo $ivf_embryology_chart_delete->location->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->location->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->OocyteNo->Visible) { // OocyteNo ?>
		<td <?php echo $ivf_embryology_chart_delete->OocyteNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo">
<span<?php echo $ivf_embryology_chart_delete->OocyteNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->OocyteNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Stage->Visible) { // Stage ?>
		<td <?php echo $ivf_embryology_chart_delete->Stage->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage">
<span<?php echo $ivf_embryology_chart_delete->Stage->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Stage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Remarks->Visible) { // Remarks ?>
		<td <?php echo $ivf_embryology_chart_delete->Remarks->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks">
<span<?php echo $ivf_embryology_chart_delete->Remarks->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitrificationDate->Visible) { // vitrificationDate ?>
		<td <?php echo $ivf_embryology_chart_delete->vitrificationDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate">
<span<?php echo $ivf_embryology_chart_delete->vitrificationDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitrificationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?php echo $ivf_embryology_chart_delete->vitriPrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?php echo $ivf_embryology_chart_delete->vitriSecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriEmbryoNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo">
<span<?php echo $ivf_embryology_chart_delete->vitriEmbryoNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriEmbryoNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawReFrozen->Visible) { // thawReFrozen ?>
		<td <?php echo $ivf_embryology_chart_delete->thawReFrozen->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen">
<span<?php echo $ivf_embryology_chart_delete->thawReFrozen->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->thawReFrozen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriFertilisationDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate">
<span<?php echo $ivf_embryology_chart_delete->vitriFertilisationDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriFertilisationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriDay->Visible) { // vitriDay ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriDay->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay">
<span<?php echo $ivf_embryology_chart_delete->vitriDay->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriStage->Visible) { // vitriStage ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriStage->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage">
<span<?php echo $ivf_embryology_chart_delete->vitriStage->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriGrade->Visible) { // vitriGrade ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriGrade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade">
<span<?php echo $ivf_embryology_chart_delete->vitriGrade->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriGrade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriIncubator->Visible) { // vitriIncubator ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriIncubator->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator">
<span<?php echo $ivf_embryology_chart_delete->vitriIncubator->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriIncubator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriTank->Visible) { // vitriTank ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriTank->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank">
<span<?php echo $ivf_embryology_chart_delete->vitriTank->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriTank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriCanister->Visible) { // vitriCanister ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriCanister->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister">
<span<?php echo $ivf_embryology_chart_delete->vitriCanister->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriCanister->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriGobiet->Visible) { // vitriGobiet ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriGobiet->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet">
<span<?php echo $ivf_embryology_chart_delete->vitriGobiet->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriGobiet->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriViscotube->Visible) { // vitriViscotube ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriViscotube->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube">
<span<?php echo $ivf_embryology_chart_delete->vitriViscotube->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriViscotube->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriCryolockNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo">
<span<?php echo $ivf_embryology_chart_delete->vitriCryolockNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriCryolockNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
		<td <?php echo $ivf_embryology_chart_delete->vitriCryolockColour->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour">
<span<?php echo $ivf_embryology_chart_delete->vitriCryolockColour->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->vitriCryolockColour->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawDate->Visible) { // thawDate ?>
		<td <?php echo $ivf_embryology_chart_delete->thawDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate">
<span<?php echo $ivf_embryology_chart_delete->thawDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->thawDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<td <?php echo $ivf_embryology_chart_delete->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?php echo $ivf_embryology_chart_delete->thawPrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<td <?php echo $ivf_embryology_chart_delete->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?php echo $ivf_embryology_chart_delete->thawSecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawET->Visible) { // thawET ?>
		<td <?php echo $ivf_embryology_chart_delete->thawET->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET">
<span<?php echo $ivf_embryology_chart_delete->thawET->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->thawET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawAbserve->Visible) { // thawAbserve ?>
		<td <?php echo $ivf_embryology_chart_delete->thawAbserve->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve">
<span<?php echo $ivf_embryology_chart_delete->thawAbserve->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->thawAbserve->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->thawDiscard->Visible) { // thawDiscard ?>
		<td <?php echo $ivf_embryology_chart_delete->thawDiscard->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard">
<span<?php echo $ivf_embryology_chart_delete->thawDiscard->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->thawDiscard->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETCatheter->Visible) { // ETCatheter ?>
		<td <?php echo $ivf_embryology_chart_delete->ETCatheter->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter">
<span<?php echo $ivf_embryology_chart_delete->ETCatheter->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->ETCatheter->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETDifficulty->Visible) { // ETDifficulty ?>
		<td <?php echo $ivf_embryology_chart_delete->ETDifficulty->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty">
<span<?php echo $ivf_embryology_chart_delete->ETDifficulty->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->ETDifficulty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETEasy->Visible) { // ETEasy ?>
		<td <?php echo $ivf_embryology_chart_delete->ETEasy->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy">
<span<?php echo $ivf_embryology_chart_delete->ETEasy->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->ETEasy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETComments->Visible) { // ETComments ?>
		<td <?php echo $ivf_embryology_chart_delete->ETComments->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments">
<span<?php echo $ivf_embryology_chart_delete->ETComments->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->ETComments->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETDoctor->Visible) { // ETDoctor ?>
		<td <?php echo $ivf_embryology_chart_delete->ETDoctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor">
<span<?php echo $ivf_embryology_chart_delete->ETDoctor->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->ETDoctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETEmbryologist->Visible) { // ETEmbryologist ?>
		<td <?php echo $ivf_embryology_chart_delete->ETEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist">
<span<?php echo $ivf_embryology_chart_delete->ETEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->ETEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->ETDate->Visible) { // ETDate ?>
		<td <?php echo $ivf_embryology_chart_delete->ETDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate">
<span<?php echo $ivf_embryology_chart_delete->ETDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->ETDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_delete->Day1End->Visible) { // Day1End ?>
		<td <?php echo $ivf_embryology_chart_delete->Day1End->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCount ?>_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End">
<span<?php echo $ivf_embryology_chart_delete->Day1End->viewAttributes() ?>><?php echo $ivf_embryology_chart_delete->Day1End->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_embryology_chart_delete->Recordset->moveNext();
}
$ivf_embryology_chart_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_embryology_chart_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_embryology_chart_delete->showPageFooter();
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
$ivf_embryology_chart_delete->terminate();
?>
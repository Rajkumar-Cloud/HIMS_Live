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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_embryology_chartdelete = currentForm = new ew.Form("fivf_embryology_chartdelete", "delete");

// Form_CustomValidate event
fivf_embryology_chartdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_embryology_chartdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_embryology_chartdelete.lists["x_Day0PolarBodyPosition"] = <?php echo $ivf_embryology_chart_delete->Day0PolarBodyPosition->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day0PolarBodyPosition"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day0PolarBodyPosition->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day0Breakage"] = <?php echo $ivf_embryology_chart_delete->Day0Breakage->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day0Breakage"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day0Breakage->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day0Attempts"] = <?php echo $ivf_embryology_chart_delete->Day0Attempts->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day0Attempts"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day0Attempts->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day0SPZMorpho"] = <?php echo $ivf_embryology_chart_delete->Day0SPZMorpho->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day0SPZMorpho"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day0SPZMorpho->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day0SPZLocation"] = <?php echo $ivf_embryology_chart_delete->Day0SPZLocation->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day0SPZLocation"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day0SPZLocation->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day0SpOrgin"] = <?php echo $ivf_embryology_chart_delete->Day0SpOrgin->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day0SpOrgin"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day0SpOrgin->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day5Cryoptop"] = <?php echo $ivf_embryology_chart_delete->Day5Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day5Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day5Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day1PN"] = <?php echo $ivf_embryology_chart_delete->Day1PN->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day1PN"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day1PN->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day1PB"] = <?php echo $ivf_embryology_chart_delete->Day1PB->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day1PB"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day1PB->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day1Pronucleus"] = <?php echo $ivf_embryology_chart_delete->Day1Pronucleus->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day1Pronucleus"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day1Pronucleus->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day1Nucleolus"] = <?php echo $ivf_embryology_chart_delete->Day1Nucleolus->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day1Nucleolus"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day1Nucleolus->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day1Halo"] = <?php echo $ivf_embryology_chart_delete->Day1Halo->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day1Halo"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day1Halo->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day2End"] = <?php echo $ivf_embryology_chart_delete->Day2End->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day2End"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day2End->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day3Frag"] = <?php echo $ivf_embryology_chart_delete->Day3Frag->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day3Frag"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day3Frag->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day3Symmetry"] = <?php echo $ivf_embryology_chart_delete->Day3Symmetry->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day3Symmetry"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day3Symmetry->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day3ZP"] = <?php echo $ivf_embryology_chart_delete->Day3ZP->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day3ZP"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day3ZP->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day3Vacoules"] = <?php echo $ivf_embryology_chart_delete->Day3Vacoules->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day3Vacoules"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day3Vacoules->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day3Grade"] = <?php echo $ivf_embryology_chart_delete->Day3Grade->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day3Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day3Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day3Cryoptop"] = <?php echo $ivf_embryology_chart_delete->Day3Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day3Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day3Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day3End"] = <?php echo $ivf_embryology_chart_delete->Day3End->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day3End"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day3End->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day4Cryoptop"] = <?php echo $ivf_embryology_chart_delete->Day4Cryoptop->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day4Cryoptop"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day4Cryoptop->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day4End"] = <?php echo $ivf_embryology_chart_delete->Day4End->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day4End"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day4End->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day5ICM"] = <?php echo $ivf_embryology_chart_delete->Day5ICM->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day5ICM"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day5ICM->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day5TE"] = <?php echo $ivf_embryology_chart_delete->Day5TE->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day5TE"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day5TE->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day5Observation"] = <?php echo $ivf_embryology_chart_delete->Day5Observation->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day5Observation"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day5Observation->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day5Collapsed"] = <?php echo $ivf_embryology_chart_delete->Day5Collapsed->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day5Collapsed"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day5Collapsed->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day5Vacoulles"] = <?php echo $ivf_embryology_chart_delete->Day5Vacoulles->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day5Vacoulles"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day5Vacoulles->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day5Grade"] = <?php echo $ivf_embryology_chart_delete->Day5Grade->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day5Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day5Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day6ICM"] = <?php echo $ivf_embryology_chart_delete->Day6ICM->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day6ICM"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day6ICM->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day6TE"] = <?php echo $ivf_embryology_chart_delete->Day6TE->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day6TE"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day6TE->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day6Observation"] = <?php echo $ivf_embryology_chart_delete->Day6Observation->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day6Observation"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day6Observation->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day6Collapsed"] = <?php echo $ivf_embryology_chart_delete->Day6Collapsed->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day6Collapsed"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day6Collapsed->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day6Vacoulles"] = <?php echo $ivf_embryology_chart_delete->Day6Vacoulles->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day6Vacoulles"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day6Vacoulles->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day6Grade"] = <?php echo $ivf_embryology_chart_delete->Day6Grade->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day6Grade"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day6Grade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_EndingDay"] = <?php echo $ivf_embryology_chart_delete->EndingDay->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_EndingDay"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->EndingDay->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_EndingGrade"] = <?php echo $ivf_embryology_chart_delete->EndingGrade->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_EndingGrade"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->EndingGrade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_EndingState"] = <?php echo $ivf_embryology_chart_delete->EndingState->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_EndingState"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->EndingState->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Stage"] = <?php echo $ivf_embryology_chart_delete->Stage->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Stage"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Stage->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_thawReFrozen[]"] = <?php echo $ivf_embryology_chart_delete->thawReFrozen->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_thawReFrozen[]"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->thawReFrozen->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_vitriDay"] = <?php echo $ivf_embryology_chart_delete->vitriDay->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_vitriDay"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->vitriDay->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_vitriGrade"] = <?php echo $ivf_embryology_chart_delete->vitriGrade->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_vitriGrade"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->vitriGrade->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_thawET"] = <?php echo $ivf_embryology_chart_delete->thawET->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_thawET"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->thawET->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_ETDifficulty"] = <?php echo $ivf_embryology_chart_delete->ETDifficulty->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_ETDifficulty"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->ETDifficulty->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_ETEasy[]"] = <?php echo $ivf_embryology_chart_delete->ETEasy->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_ETEasy[]"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->ETEasy->options(FALSE, TRUE)) ?>;
fivf_embryology_chartdelete.lists["x_Day1End"] = <?php echo $ivf_embryology_chart_delete->Day1End->Lookup->toClientList() ?>;
fivf_embryology_chartdelete.lists["x_Day1End"].options = <?php echo JsonEncode($ivf_embryology_chart_delete->Day1End->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_embryology_chart_delete->showPageHeader(); ?>
<?php
$ivf_embryology_chart_delete->showMessage();
?>
<form name="fivf_embryology_chartdelete" id="fivf_embryology_chartdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_embryology_chart_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_embryology_chart_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_embryology_chart_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_embryology_chart->id->Visible) { // id ?>
		<th class="<?php echo $ivf_embryology_chart->id->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_id" class="ivf_embryology_chart_id"><?php echo $ivf_embryology_chart->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_embryology_chart->RIDNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo"><?php echo $ivf_embryology_chart->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_embryology_chart->Name->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name"><?php echo $ivf_embryology_chart->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->ARTCycle->Visible) { // ARTCycle ?>
		<th class="<?php echo $ivf_embryology_chart->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle"><?php echo $ivf_embryology_chart->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->SpermOrigin->Visible) { // SpermOrigin ?>
		<th class="<?php echo $ivf_embryology_chart->SpermOrigin->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin"><?php echo $ivf_embryology_chart->SpermOrigin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<th class="<?php echo $ivf_embryology_chart->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique"><?php echo $ivf_embryology_chart->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->IndicationForART->Visible) { // IndicationForART ?>
		<th class="<?php echo $ivf_embryology_chart->IndicationForART->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART"><?php echo $ivf_embryology_chart->IndicationForART->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0sino->Visible) { // Day0sino ?>
		<th class="<?php echo $ivf_embryology_chart->Day0sino->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino"><?php echo $ivf_embryology_chart->Day0sino->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<th class="<?php echo $ivf_embryology_chart->Day0OocyteStage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage"><?php echo $ivf_embryology_chart->Day0OocyteStage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
		<th class="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition"><?php echo $ivf_embryology_chart->Day0PolarBodyPosition->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Breakage->Visible) { // Day0Breakage ?>
		<th class="<?php echo $ivf_embryology_chart->Day0Breakage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage"><?php echo $ivf_embryology_chart->Day0Breakage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Attempts->Visible) { // Day0Attempts ?>
		<th class="<?php echo $ivf_embryology_chart->Day0Attempts->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts"><?php echo $ivf_embryology_chart->Day0Attempts->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
		<th class="<?php echo $ivf_embryology_chart->Day0SPZMorpho->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho"><?php echo $ivf_embryology_chart->Day0SPZMorpho->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
		<th class="<?php echo $ivf_embryology_chart->Day0SPZLocation->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation"><?php echo $ivf_embryology_chart->Day0SPZLocation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
		<th class="<?php echo $ivf_embryology_chart->Day0SpOrgin->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin"><?php echo $ivf_embryology_chart->Day0SpOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop"><?php echo $ivf_embryology_chart->Day5Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Sperm->Visible) { // Day1Sperm ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Sperm->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm"><?php echo $ivf_embryology_chart->Day1Sperm->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PN->Visible) { // Day1PN ?>
		<th class="<?php echo $ivf_embryology_chart->Day1PN->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN"><?php echo $ivf_embryology_chart->Day1PN->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PB->Visible) { // Day1PB ?>
		<th class="<?php echo $ivf_embryology_chart->Day1PB->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB"><?php echo $ivf_embryology_chart->Day1PB->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Pronucleus->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus"><?php echo $ivf_embryology_chart->Day1Pronucleus->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Nucleolus->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus"><?php echo $ivf_embryology_chart->Day1Nucleolus->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Halo->Visible) { // Day1Halo ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Halo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo"><?php echo $ivf_embryology_chart->Day1Halo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2SiNo->Visible) { // Day2SiNo ?>
		<th class="<?php echo $ivf_embryology_chart->Day2SiNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo"><?php echo $ivf_embryology_chart->Day2SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2CellNo->Visible) { // Day2CellNo ?>
		<th class="<?php echo $ivf_embryology_chart->Day2CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo"><?php echo $ivf_embryology_chart->Day2CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Frag->Visible) { // Day2Frag ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Frag->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag"><?php echo $ivf_embryology_chart->Day2Frag->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Symmetry->Visible) { // Day2Symmetry ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Symmetry->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry"><?php echo $ivf_embryology_chart->Day2Symmetry->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop"><?php echo $ivf_embryology_chart->Day2Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Grade->Visible) { // Day2Grade ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade"><?php echo $ivf_embryology_chart->Day2Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2End->Visible) { // Day2End ?>
		<th class="<?php echo $ivf_embryology_chart->Day2End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End"><?php echo $ivf_embryology_chart->Day2End->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Sino->Visible) { // Day3Sino ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Sino->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino"><?php echo $ivf_embryology_chart->Day3Sino->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3CellNo->Visible) { // Day3CellNo ?>
		<th class="<?php echo $ivf_embryology_chart->Day3CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo"><?php echo $ivf_embryology_chart->Day3CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Frag->Visible) { // Day3Frag ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Frag->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag"><?php echo $ivf_embryology_chart->Day3Frag->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Symmetry->Visible) { // Day3Symmetry ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Symmetry->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry"><?php echo $ivf_embryology_chart->Day3Symmetry->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3ZP->Visible) { // Day3ZP ?>
		<th class="<?php echo $ivf_embryology_chart->Day3ZP->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP"><?php echo $ivf_embryology_chart->Day3ZP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Vacoules->Visible) { // Day3Vacoules ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Vacoules->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules"><?php echo $ivf_embryology_chart->Day3Vacoules->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Grade->Visible) { // Day3Grade ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade"><?php echo $ivf_embryology_chart->Day3Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop"><?php echo $ivf_embryology_chart->Day3Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3End->Visible) { // Day3End ?>
		<th class="<?php echo $ivf_embryology_chart->Day3End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End"><?php echo $ivf_embryology_chart->Day3End->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4SiNo->Visible) { // Day4SiNo ?>
		<th class="<?php echo $ivf_embryology_chart->Day4SiNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo"><?php echo $ivf_embryology_chart->Day4SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4CellNo->Visible) { // Day4CellNo ?>
		<th class="<?php echo $ivf_embryology_chart->Day4CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo"><?php echo $ivf_embryology_chart->Day4CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Frag->Visible) { // Day4Frag ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Frag->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag"><?php echo $ivf_embryology_chart->Day4Frag->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Symmetry->Visible) { // Day4Symmetry ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Symmetry->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry"><?php echo $ivf_embryology_chart->Day4Symmetry->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Grade->Visible) { // Day4Grade ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade"><?php echo $ivf_embryology_chart->Day4Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop"><?php echo $ivf_embryology_chart->Day4Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4End->Visible) { // Day4End ?>
		<th class="<?php echo $ivf_embryology_chart->Day4End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End"><?php echo $ivf_embryology_chart->Day4End->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5CellNo->Visible) { // Day5CellNo ?>
		<th class="<?php echo $ivf_embryology_chart->Day5CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo"><?php echo $ivf_embryology_chart->Day5CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5ICM->Visible) { // Day5ICM ?>
		<th class="<?php echo $ivf_embryology_chart->Day5ICM->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM"><?php echo $ivf_embryology_chart->Day5ICM->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5TE->Visible) { // Day5TE ?>
		<th class="<?php echo $ivf_embryology_chart->Day5TE->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE"><?php echo $ivf_embryology_chart->Day5TE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Observation->Visible) { // Day5Observation ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Observation->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation"><?php echo $ivf_embryology_chart->Day5Observation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Collapsed->Visible) { // Day5Collapsed ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Collapsed->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed"><?php echo $ivf_embryology_chart->Day5Collapsed->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Vacoulles->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles"><?php echo $ivf_embryology_chart->Day5Vacoulles->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Grade->Visible) { // Day5Grade ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade"><?php echo $ivf_embryology_chart->Day5Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6CellNo->Visible) { // Day6CellNo ?>
		<th class="<?php echo $ivf_embryology_chart->Day6CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo"><?php echo $ivf_embryology_chart->Day6CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6ICM->Visible) { // Day6ICM ?>
		<th class="<?php echo $ivf_embryology_chart->Day6ICM->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM"><?php echo $ivf_embryology_chart->Day6ICM->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6TE->Visible) { // Day6TE ?>
		<th class="<?php echo $ivf_embryology_chart->Day6TE->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE"><?php echo $ivf_embryology_chart->Day6TE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Observation->Visible) { // Day6Observation ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Observation->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation"><?php echo $ivf_embryology_chart->Day6Observation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Collapsed->Visible) { // Day6Collapsed ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Collapsed->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed"><?php echo $ivf_embryology_chart->Day6Collapsed->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Vacoulles->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles"><?php echo $ivf_embryology_chart->Day6Vacoulles->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Grade->Visible) { // Day6Grade ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade"><?php echo $ivf_embryology_chart->Day6Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop"><?php echo $ivf_embryology_chart->Day6Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->EndSiNo->Visible) { // EndSiNo ?>
		<th class="<?php echo $ivf_embryology_chart->EndSiNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo"><?php echo $ivf_embryology_chart->EndSiNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingDay->Visible) { // EndingDay ?>
		<th class="<?php echo $ivf_embryology_chart->EndingDay->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay"><?php echo $ivf_embryology_chart->EndingDay->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingCellStage->Visible) { // EndingCellStage ?>
		<th class="<?php echo $ivf_embryology_chart->EndingCellStage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage"><?php echo $ivf_embryology_chart->EndingCellStage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingGrade->Visible) { // EndingGrade ?>
		<th class="<?php echo $ivf_embryology_chart->EndingGrade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade"><?php echo $ivf_embryology_chart->EndingGrade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingState->Visible) { // EndingState ?>
		<th class="<?php echo $ivf_embryology_chart->EndingState->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState"><?php echo $ivf_embryology_chart->EndingState->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_embryology_chart->TidNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo"><?php echo $ivf_embryology_chart->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->DidNO->Visible) { // DidNO ?>
		<th class="<?php echo $ivf_embryology_chart->DidNO->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO"><?php echo $ivf_embryology_chart->DidNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
		<th class="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime"><?php echo $ivf_embryology_chart->ICSiIVFDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
		<th class="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist"><?php echo $ivf_embryology_chart->PrimaryEmbrologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
		<th class="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist"><?php echo $ivf_embryology_chart->SecondaryEmbrologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Incubator->Visible) { // Incubator ?>
		<th class="<?php echo $ivf_embryology_chart->Incubator->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator"><?php echo $ivf_embryology_chart->Incubator->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->location->Visible) { // location ?>
		<th class="<?php echo $ivf_embryology_chart->location->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_location" class="ivf_embryology_chart_location"><?php echo $ivf_embryology_chart->location->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
		<th class="<?php echo $ivf_embryology_chart->OocyteNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo"><?php echo $ivf_embryology_chart->OocyteNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Stage->Visible) { // Stage ?>
		<th class="<?php echo $ivf_embryology_chart->Stage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage"><?php echo $ivf_embryology_chart->Stage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $ivf_embryology_chart->Remarks->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks"><?php echo $ivf_embryology_chart->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitrificationDate->Visible) { // vitrificationDate ?>
		<th class="<?php echo $ivf_embryology_chart->vitrificationDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate"><?php echo $ivf_embryology_chart->vitrificationDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
		<th class="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist"><?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
		<th class="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist"><?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
		<th class="<?php echo $ivf_embryology_chart->vitriEmbryoNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo"><?php echo $ivf_embryology_chart->vitriEmbryoNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->thawReFrozen->Visible) { // thawReFrozen ?>
		<th class="<?php echo $ivf_embryology_chart->thawReFrozen->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen"><?php echo $ivf_embryology_chart->thawReFrozen->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
		<th class="<?php echo $ivf_embryology_chart->vitriFertilisationDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate"><?php echo $ivf_embryology_chart->vitriFertilisationDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriDay->Visible) { // vitriDay ?>
		<th class="<?php echo $ivf_embryology_chart->vitriDay->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay"><?php echo $ivf_embryology_chart->vitriDay->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriStage->Visible) { // vitriStage ?>
		<th class="<?php echo $ivf_embryology_chart->vitriStage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage"><?php echo $ivf_embryology_chart->vitriStage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGrade->Visible) { // vitriGrade ?>
		<th class="<?php echo $ivf_embryology_chart->vitriGrade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade"><?php echo $ivf_embryology_chart->vitriGrade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriIncubator->Visible) { // vitriIncubator ?>
		<th class="<?php echo $ivf_embryology_chart->vitriIncubator->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator"><?php echo $ivf_embryology_chart->vitriIncubator->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriTank->Visible) { // vitriTank ?>
		<th class="<?php echo $ivf_embryology_chart->vitriTank->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank"><?php echo $ivf_embryology_chart->vitriTank->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCanister->Visible) { // vitriCanister ?>
		<th class="<?php echo $ivf_embryology_chart->vitriCanister->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister"><?php echo $ivf_embryology_chart->vitriCanister->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGobiet->Visible) { // vitriGobiet ?>
		<th class="<?php echo $ivf_embryology_chart->vitriGobiet->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet"><?php echo $ivf_embryology_chart->vitriGobiet->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriViscotube->Visible) { // vitriViscotube ?>
		<th class="<?php echo $ivf_embryology_chart->vitriViscotube->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube"><?php echo $ivf_embryology_chart->vitriViscotube->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
		<th class="<?php echo $ivf_embryology_chart->vitriCryolockNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo"><?php echo $ivf_embryology_chart->vitriCryolockNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
		<th class="<?php echo $ivf_embryology_chart->vitriCryolockColour->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour"><?php echo $ivf_embryology_chart->vitriCryolockColour->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDate->Visible) { // thawDate ?>
		<th class="<?php echo $ivf_embryology_chart->thawDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate"><?php echo $ivf_embryology_chart->thawDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<th class="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist"><?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<th class="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist"><?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->thawET->Visible) { // thawET ?>
		<th class="<?php echo $ivf_embryology_chart->thawET->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET"><?php echo $ivf_embryology_chart->thawET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->thawAbserve->Visible) { // thawAbserve ?>
		<th class="<?php echo $ivf_embryology_chart->thawAbserve->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve"><?php echo $ivf_embryology_chart->thawAbserve->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDiscard->Visible) { // thawDiscard ?>
		<th class="<?php echo $ivf_embryology_chart->thawDiscard->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard"><?php echo $ivf_embryology_chart->thawDiscard->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->ETCatheter->Visible) { // ETCatheter ?>
		<th class="<?php echo $ivf_embryology_chart->ETCatheter->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter"><?php echo $ivf_embryology_chart->ETCatheter->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDifficulty->Visible) { // ETDifficulty ?>
		<th class="<?php echo $ivf_embryology_chart->ETDifficulty->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty"><?php echo $ivf_embryology_chart->ETDifficulty->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEasy->Visible) { // ETEasy ?>
		<th class="<?php echo $ivf_embryology_chart->ETEasy->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy"><?php echo $ivf_embryology_chart->ETEasy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->ETComments->Visible) { // ETComments ?>
		<th class="<?php echo $ivf_embryology_chart->ETComments->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments"><?php echo $ivf_embryology_chart->ETComments->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDoctor->Visible) { // ETDoctor ?>
		<th class="<?php echo $ivf_embryology_chart->ETDoctor->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor"><?php echo $ivf_embryology_chart->ETDoctor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEmbryologist->Visible) { // ETEmbryologist ?>
		<th class="<?php echo $ivf_embryology_chart->ETEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist"><?php echo $ivf_embryology_chart->ETEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDate->Visible) { // ETDate ?>
		<th class="<?php echo $ivf_embryology_chart->ETDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate"><?php echo $ivf_embryology_chart->ETDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1End->Visible) { // Day1End ?>
		<th class="<?php echo $ivf_embryology_chart->Day1End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End"><?php echo $ivf_embryology_chart->Day1End->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_embryology_chart_delete->RecCnt = 0;
$i = 0;
while (!$ivf_embryology_chart_delete->Recordset->EOF) {
	$ivf_embryology_chart_delete->RecCnt++;
	$ivf_embryology_chart_delete->RowCnt++;

	// Set row properties
	$ivf_embryology_chart->resetAttributes();
	$ivf_embryology_chart->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_embryology_chart_delete->loadRowValues($ivf_embryology_chart_delete->Recordset);

	// Render row
	$ivf_embryology_chart_delete->renderRow();
?>
	<tr<?php echo $ivf_embryology_chart->rowAttributes() ?>>
<?php if ($ivf_embryology_chart->id->Visible) { // id ?>
		<td<?php echo $ivf_embryology_chart->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_id" class="ivf_embryology_chart_id">
<span<?php echo $ivf_embryology_chart->id->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->RIDNo->Visible) { // RIDNo ?>
		<td<?php echo $ivf_embryology_chart->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo">
<span<?php echo $ivf_embryology_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Name->Visible) { // Name ?>
		<td<?php echo $ivf_embryology_chart->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name">
<span<?php echo $ivf_embryology_chart->Name->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td<?php echo $ivf_embryology_chart->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle">
<span<?php echo $ivf_embryology_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->SpermOrigin->Visible) { // SpermOrigin ?>
		<td<?php echo $ivf_embryology_chart->SpermOrigin->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin">
<span<?php echo $ivf_embryology_chart->SpermOrigin->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->SpermOrigin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td<?php echo $ivf_embryology_chart->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique">
<span<?php echo $ivf_embryology_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->IndicationForART->Visible) { // IndicationForART ?>
		<td<?php echo $ivf_embryology_chart->IndicationForART->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART">
<span<?php echo $ivf_embryology_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->IndicationForART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0sino->Visible) { // Day0sino ?>
		<td<?php echo $ivf_embryology_chart->Day0sino->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino">
<span<?php echo $ivf_embryology_chart->Day0sino->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0sino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<td<?php echo $ivf_embryology_chart->Day0OocyteStage->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage">
<span<?php echo $ivf_embryology_chart->Day0OocyteStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
		<td<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition">
<span<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Breakage->Visible) { // Day0Breakage ?>
		<td<?php echo $ivf_embryology_chart->Day0Breakage->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage">
<span<?php echo $ivf_embryology_chart->Day0Breakage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0Breakage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Attempts->Visible) { // Day0Attempts ?>
		<td<?php echo $ivf_embryology_chart->Day0Attempts->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts">
<span<?php echo $ivf_embryology_chart->Day0Attempts->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0Attempts->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
		<td<?php echo $ivf_embryology_chart->Day0SPZMorpho->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho">
<span<?php echo $ivf_embryology_chart->Day0SPZMorpho->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SPZMorpho->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
		<td<?php echo $ivf_embryology_chart->Day0SPZLocation->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation">
<span<?php echo $ivf_embryology_chart->Day0SPZLocation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SPZLocation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
		<td<?php echo $ivf_embryology_chart->Day0SpOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin">
<span<?php echo $ivf_embryology_chart->Day0SpOrgin->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SpOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
		<td<?php echo $ivf_embryology_chart->Day5Cryoptop->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop">
<span<?php echo $ivf_embryology_chart->Day5Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Sperm->Visible) { // Day1Sperm ?>
		<td<?php echo $ivf_embryology_chart->Day1Sperm->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm">
<span<?php echo $ivf_embryology_chart->Day1Sperm->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Sperm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PN->Visible) { // Day1PN ?>
		<td<?php echo $ivf_embryology_chart->Day1PN->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN">
<span<?php echo $ivf_embryology_chart->Day1PN->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1PN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PB->Visible) { // Day1PB ?>
		<td<?php echo $ivf_embryology_chart->Day1PB->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB">
<span<?php echo $ivf_embryology_chart->Day1PB->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1PB->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
		<td<?php echo $ivf_embryology_chart->Day1Pronucleus->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus">
<span<?php echo $ivf_embryology_chart->Day1Pronucleus->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Pronucleus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
		<td<?php echo $ivf_embryology_chart->Day1Nucleolus->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus">
<span<?php echo $ivf_embryology_chart->Day1Nucleolus->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Nucleolus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Halo->Visible) { // Day1Halo ?>
		<td<?php echo $ivf_embryology_chart->Day1Halo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo">
<span<?php echo $ivf_embryology_chart->Day1Halo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Halo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2SiNo->Visible) { // Day2SiNo ?>
		<td<?php echo $ivf_embryology_chart->Day2SiNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo">
<span<?php echo $ivf_embryology_chart->Day2SiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2CellNo->Visible) { // Day2CellNo ?>
		<td<?php echo $ivf_embryology_chart->Day2CellNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo">
<span<?php echo $ivf_embryology_chart->Day2CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Frag->Visible) { // Day2Frag ?>
		<td<?php echo $ivf_embryology_chart->Day2Frag->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag">
<span<?php echo $ivf_embryology_chart->Day2Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Frag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Symmetry->Visible) { // Day2Symmetry ?>
		<td<?php echo $ivf_embryology_chart->Day2Symmetry->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry">
<span<?php echo $ivf_embryology_chart->Day2Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Symmetry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
		<td<?php echo $ivf_embryology_chart->Day2Cryoptop->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop">
<span<?php echo $ivf_embryology_chart->Day2Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Grade->Visible) { // Day2Grade ?>
		<td<?php echo $ivf_embryology_chart->Day2Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade">
<span<?php echo $ivf_embryology_chart->Day2Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2End->Visible) { // Day2End ?>
		<td<?php echo $ivf_embryology_chart->Day2End->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End">
<span<?php echo $ivf_embryology_chart->Day2End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2End->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Sino->Visible) { // Day3Sino ?>
		<td<?php echo $ivf_embryology_chart->Day3Sino->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino">
<span<?php echo $ivf_embryology_chart->Day3Sino->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Sino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3CellNo->Visible) { // Day3CellNo ?>
		<td<?php echo $ivf_embryology_chart->Day3CellNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo">
<span<?php echo $ivf_embryology_chart->Day3CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Frag->Visible) { // Day3Frag ?>
		<td<?php echo $ivf_embryology_chart->Day3Frag->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag">
<span<?php echo $ivf_embryology_chart->Day3Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Frag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Symmetry->Visible) { // Day3Symmetry ?>
		<td<?php echo $ivf_embryology_chart->Day3Symmetry->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry">
<span<?php echo $ivf_embryology_chart->Day3Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Symmetry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3ZP->Visible) { // Day3ZP ?>
		<td<?php echo $ivf_embryology_chart->Day3ZP->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP">
<span<?php echo $ivf_embryology_chart->Day3ZP->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3ZP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Vacoules->Visible) { // Day3Vacoules ?>
		<td<?php echo $ivf_embryology_chart->Day3Vacoules->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules">
<span<?php echo $ivf_embryology_chart->Day3Vacoules->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Vacoules->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Grade->Visible) { // Day3Grade ?>
		<td<?php echo $ivf_embryology_chart->Day3Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade">
<span<?php echo $ivf_embryology_chart->Day3Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
		<td<?php echo $ivf_embryology_chart->Day3Cryoptop->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop">
<span<?php echo $ivf_embryology_chart->Day3Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3End->Visible) { // Day3End ?>
		<td<?php echo $ivf_embryology_chart->Day3End->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End">
<span<?php echo $ivf_embryology_chart->Day3End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3End->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4SiNo->Visible) { // Day4SiNo ?>
		<td<?php echo $ivf_embryology_chart->Day4SiNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo">
<span<?php echo $ivf_embryology_chart->Day4SiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4CellNo->Visible) { // Day4CellNo ?>
		<td<?php echo $ivf_embryology_chart->Day4CellNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo">
<span<?php echo $ivf_embryology_chart->Day4CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Frag->Visible) { // Day4Frag ?>
		<td<?php echo $ivf_embryology_chart->Day4Frag->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag">
<span<?php echo $ivf_embryology_chart->Day4Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Frag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Symmetry->Visible) { // Day4Symmetry ?>
		<td<?php echo $ivf_embryology_chart->Day4Symmetry->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry">
<span<?php echo $ivf_embryology_chart->Day4Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Symmetry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Grade->Visible) { // Day4Grade ?>
		<td<?php echo $ivf_embryology_chart->Day4Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade">
<span<?php echo $ivf_embryology_chart->Day4Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
		<td<?php echo $ivf_embryology_chart->Day4Cryoptop->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop">
<span<?php echo $ivf_embryology_chart->Day4Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4End->Visible) { // Day4End ?>
		<td<?php echo $ivf_embryology_chart->Day4End->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End">
<span<?php echo $ivf_embryology_chart->Day4End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4End->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5CellNo->Visible) { // Day5CellNo ?>
		<td<?php echo $ivf_embryology_chart->Day5CellNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo">
<span<?php echo $ivf_embryology_chart->Day5CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5ICM->Visible) { // Day5ICM ?>
		<td<?php echo $ivf_embryology_chart->Day5ICM->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM">
<span<?php echo $ivf_embryology_chart->Day5ICM->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5ICM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5TE->Visible) { // Day5TE ?>
		<td<?php echo $ivf_embryology_chart->Day5TE->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE">
<span<?php echo $ivf_embryology_chart->Day5TE->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5TE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Observation->Visible) { // Day5Observation ?>
		<td<?php echo $ivf_embryology_chart->Day5Observation->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation">
<span<?php echo $ivf_embryology_chart->Day5Observation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Observation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Collapsed->Visible) { // Day5Collapsed ?>
		<td<?php echo $ivf_embryology_chart->Day5Collapsed->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed">
<span<?php echo $ivf_embryology_chart->Day5Collapsed->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Collapsed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
		<td<?php echo $ivf_embryology_chart->Day5Vacoulles->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles">
<span<?php echo $ivf_embryology_chart->Day5Vacoulles->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Vacoulles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Grade->Visible) { // Day5Grade ?>
		<td<?php echo $ivf_embryology_chart->Day5Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade">
<span<?php echo $ivf_embryology_chart->Day5Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6CellNo->Visible) { // Day6CellNo ?>
		<td<?php echo $ivf_embryology_chart->Day6CellNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo">
<span<?php echo $ivf_embryology_chart->Day6CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6ICM->Visible) { // Day6ICM ?>
		<td<?php echo $ivf_embryology_chart->Day6ICM->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM">
<span<?php echo $ivf_embryology_chart->Day6ICM->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6ICM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6TE->Visible) { // Day6TE ?>
		<td<?php echo $ivf_embryology_chart->Day6TE->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE">
<span<?php echo $ivf_embryology_chart->Day6TE->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6TE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Observation->Visible) { // Day6Observation ?>
		<td<?php echo $ivf_embryology_chart->Day6Observation->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation">
<span<?php echo $ivf_embryology_chart->Day6Observation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Observation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Collapsed->Visible) { // Day6Collapsed ?>
		<td<?php echo $ivf_embryology_chart->Day6Collapsed->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed">
<span<?php echo $ivf_embryology_chart->Day6Collapsed->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Collapsed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
		<td<?php echo $ivf_embryology_chart->Day6Vacoulles->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles">
<span<?php echo $ivf_embryology_chart->Day6Vacoulles->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Vacoulles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Grade->Visible) { // Day6Grade ?>
		<td<?php echo $ivf_embryology_chart->Day6Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade">
<span<?php echo $ivf_embryology_chart->Day6Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
		<td<?php echo $ivf_embryology_chart->Day6Cryoptop->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop">
<span<?php echo $ivf_embryology_chart->Day6Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->EndSiNo->Visible) { // EndSiNo ?>
		<td<?php echo $ivf_embryology_chart->EndSiNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo">
<span<?php echo $ivf_embryology_chart->EndSiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndSiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingDay->Visible) { // EndingDay ?>
		<td<?php echo $ivf_embryology_chart->EndingDay->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay">
<span<?php echo $ivf_embryology_chart->EndingDay->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingCellStage->Visible) { // EndingCellStage ?>
		<td<?php echo $ivf_embryology_chart->EndingCellStage->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage">
<span<?php echo $ivf_embryology_chart->EndingCellStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingCellStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingGrade->Visible) { // EndingGrade ?>
		<td<?php echo $ivf_embryology_chart->EndingGrade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade">
<span<?php echo $ivf_embryology_chart->EndingGrade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingGrade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingState->Visible) { // EndingState ?>
		<td<?php echo $ivf_embryology_chart->EndingState->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState">
<span<?php echo $ivf_embryology_chart->EndingState->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingState->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_embryology_chart->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo">
<span<?php echo $ivf_embryology_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->DidNO->Visible) { // DidNO ?>
		<td<?php echo $ivf_embryology_chart->DidNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO">
<span<?php echo $ivf_embryology_chart->DidNO->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->DidNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
		<td<?php echo $ivf_embryology_chart->ICSiIVFDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime">
<span<?php echo $ivf_embryology_chart->ICSiIVFDateTime->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ICSiIVFDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
		<td<?php echo $ivf_embryology_chart->PrimaryEmbrologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist">
<span<?php echo $ivf_embryology_chart->PrimaryEmbrologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->PrimaryEmbrologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
		<td<?php echo $ivf_embryology_chart->SecondaryEmbrologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist">
<span<?php echo $ivf_embryology_chart->SecondaryEmbrologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->SecondaryEmbrologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Incubator->Visible) { // Incubator ?>
		<td<?php echo $ivf_embryology_chart->Incubator->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator">
<span<?php echo $ivf_embryology_chart->Incubator->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Incubator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->location->Visible) { // location ?>
		<td<?php echo $ivf_embryology_chart->location->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_location" class="ivf_embryology_chart_location">
<span<?php echo $ivf_embryology_chart->location->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->location->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
		<td<?php echo $ivf_embryology_chart->OocyteNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo">
<span<?php echo $ivf_embryology_chart->OocyteNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->OocyteNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Stage->Visible) { // Stage ?>
		<td<?php echo $ivf_embryology_chart->Stage->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage">
<span<?php echo $ivf_embryology_chart->Stage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Stage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Remarks->Visible) { // Remarks ?>
		<td<?php echo $ivf_embryology_chart->Remarks->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks">
<span<?php echo $ivf_embryology_chart->Remarks->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitrificationDate->Visible) { // vitrificationDate ?>
		<td<?php echo $ivf_embryology_chart->vitrificationDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate">
<span<?php echo $ivf_embryology_chart->vitrificationDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitrificationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
		<td<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
		<td<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
		<td<?php echo $ivf_embryology_chart->vitriEmbryoNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo">
<span<?php echo $ivf_embryology_chart->vitriEmbryoNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriEmbryoNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawReFrozen->Visible) { // thawReFrozen ?>
		<td<?php echo $ivf_embryology_chart->thawReFrozen->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen">
<span<?php echo $ivf_embryology_chart->thawReFrozen->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawReFrozen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
		<td<?php echo $ivf_embryology_chart->vitriFertilisationDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate">
<span<?php echo $ivf_embryology_chart->vitriFertilisationDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriFertilisationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriDay->Visible) { // vitriDay ?>
		<td<?php echo $ivf_embryology_chart->vitriDay->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay">
<span<?php echo $ivf_embryology_chart->vitriDay->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriStage->Visible) { // vitriStage ?>
		<td<?php echo $ivf_embryology_chart->vitriStage->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage">
<span<?php echo $ivf_embryology_chart->vitriStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGrade->Visible) { // vitriGrade ?>
		<td<?php echo $ivf_embryology_chart->vitriGrade->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade">
<span<?php echo $ivf_embryology_chart->vitriGrade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriGrade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriIncubator->Visible) { // vitriIncubator ?>
		<td<?php echo $ivf_embryology_chart->vitriIncubator->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator">
<span<?php echo $ivf_embryology_chart->vitriIncubator->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriIncubator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriTank->Visible) { // vitriTank ?>
		<td<?php echo $ivf_embryology_chart->vitriTank->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank">
<span<?php echo $ivf_embryology_chart->vitriTank->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriTank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCanister->Visible) { // vitriCanister ?>
		<td<?php echo $ivf_embryology_chart->vitriCanister->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister">
<span<?php echo $ivf_embryology_chart->vitriCanister->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCanister->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGobiet->Visible) { // vitriGobiet ?>
		<td<?php echo $ivf_embryology_chart->vitriGobiet->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet">
<span<?php echo $ivf_embryology_chart->vitriGobiet->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriGobiet->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriViscotube->Visible) { // vitriViscotube ?>
		<td<?php echo $ivf_embryology_chart->vitriViscotube->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube">
<span<?php echo $ivf_embryology_chart->vitriViscotube->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriViscotube->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
		<td<?php echo $ivf_embryology_chart->vitriCryolockNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo">
<span<?php echo $ivf_embryology_chart->vitriCryolockNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCryolockNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
		<td<?php echo $ivf_embryology_chart->vitriCryolockColour->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour">
<span<?php echo $ivf_embryology_chart->vitriCryolockColour->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCryolockColour->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDate->Visible) { // thawDate ?>
		<td<?php echo $ivf_embryology_chart->thawDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate">
<span<?php echo $ivf_embryology_chart->thawDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<td<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<td<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawET->Visible) { // thawET ?>
		<td<?php echo $ivf_embryology_chart->thawET->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET">
<span<?php echo $ivf_embryology_chart->thawET->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawAbserve->Visible) { // thawAbserve ?>
		<td<?php echo $ivf_embryology_chart->thawAbserve->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve">
<span<?php echo $ivf_embryology_chart->thawAbserve->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawAbserve->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDiscard->Visible) { // thawDiscard ?>
		<td<?php echo $ivf_embryology_chart->thawDiscard->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard">
<span<?php echo $ivf_embryology_chart->thawDiscard->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawDiscard->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETCatheter->Visible) { // ETCatheter ?>
		<td<?php echo $ivf_embryology_chart->ETCatheter->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter">
<span<?php echo $ivf_embryology_chart->ETCatheter->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETCatheter->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDifficulty->Visible) { // ETDifficulty ?>
		<td<?php echo $ivf_embryology_chart->ETDifficulty->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty">
<span<?php echo $ivf_embryology_chart->ETDifficulty->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDifficulty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEasy->Visible) { // ETEasy ?>
		<td<?php echo $ivf_embryology_chart->ETEasy->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy">
<span<?php echo $ivf_embryology_chart->ETEasy->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETEasy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETComments->Visible) { // ETComments ?>
		<td<?php echo $ivf_embryology_chart->ETComments->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments">
<span<?php echo $ivf_embryology_chart->ETComments->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETComments->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDoctor->Visible) { // ETDoctor ?>
		<td<?php echo $ivf_embryology_chart->ETDoctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor">
<span<?php echo $ivf_embryology_chart->ETDoctor->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDoctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEmbryologist->Visible) { // ETEmbryologist ?>
		<td<?php echo $ivf_embryology_chart->ETEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist">
<span<?php echo $ivf_embryology_chart->ETEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDate->Visible) { // ETDate ?>
		<td<?php echo $ivf_embryology_chart->ETDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate">
<span<?php echo $ivf_embryology_chart->ETDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1End->Visible) { // Day1End ?>
		<td<?php echo $ivf_embryology_chart->Day1End->cellAttributes() ?>>
<span id="el<?php echo $ivf_embryology_chart_delete->RowCnt ?>_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End">
<span<?php echo $ivf_embryology_chart->Day1End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1End->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_embryology_chart_delete->terminate();
?>
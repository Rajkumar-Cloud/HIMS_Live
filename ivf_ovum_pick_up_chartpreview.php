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
WriteHeader(FALSE, "utf-8");

// Create page object
$ivf_ovum_pick_up_chart_preview = new ivf_ovum_pick_up_chart_preview();

// Run the page
$ivf_ovum_pick_up_chart_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_ovum_pick_up_chart_preview->Page_Render();
?>
<?php $ivf_ovum_pick_up_chart_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_ovum_pick_up_chart"><!-- .card -->
<?php if ($ivf_ovum_pick_up_chart_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_ovum_pick_up_chart_preview->renderListOptions();

// Render list options (header, left)
$ivf_ovum_pick_up_chart_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_ovum_pick_up_chart->id->Visible) { // id ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->id) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->id->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->id->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->id->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->id->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->RIDNo->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->RIDNo->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->RIDNo->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->RIDNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->RIDNo->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Name->Visible) { // Name ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Name) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Name->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->Name->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Name->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Name->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->ARTCycle) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->ARTCycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->ARTCycle->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ARTCycle->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->ARTCycle->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Consultant) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Consultant->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->Consultant->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Consultant->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->Consultant->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Consultant->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Consultant->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Consultant->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->TotalDoseOfStimulation) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Protocol->Visible) { // Protocol ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Protocol) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Protocol->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->Protocol->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Protocol->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->Protocol->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Protocol->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Protocol->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Protocol->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->Visible) { // TriggerDateTime ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->TriggerDateTime) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->TriggerDateTime->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->TriggerDateTime->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OPUDateTime->Visible) { // OPUDateTime ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->OPUDateTime) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->OPUDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->OPUDateTime->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->OPUDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->OPUDateTime->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->HoursAfterTrigger) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->HoursAfterTrigger->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->HoursAfterTrigger->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumE2->Visible) { // SerumE2 ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->SerumE2) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->SerumE2->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->SerumE2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->SerumE2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->SerumE2->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->SerumE2->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->SerumE2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->SerumE2->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumP4->Visible) { // SerumP4 ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->SerumP4) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->SerumP4->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->SerumP4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->SerumP4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->SerumP4->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->SerumP4->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->SerumP4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->SerumP4->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->FORT->Visible) { // FORT ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->FORT) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->FORT->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->FORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->FORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->FORT->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->FORT->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->FORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->FORT->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->ExperctedOocytes) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->ExperctedOocytes->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->ExperctedOocytes->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->OocytesRetreivalRate) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->OocytesRetreivalRate->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->OocytesRetreivalRate->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Anesthesia->Visible) { // Anesthesia ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Anesthesia) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->Anesthesia->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Anesthesia->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Anesthesia->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Anesthesia->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->TrialCannulation) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->TrialCannulation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->TrialCannulation->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TrialCannulation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->TrialCannulation->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->UCL->Visible) { // UCL ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->UCL) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->UCL->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->UCL->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->UCL->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->UCL->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->UCL->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->UCL->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->UCL->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Angle->Visible) { // Angle ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Angle) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Angle->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->Angle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Angle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->Angle->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Angle->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Angle->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Angle->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->EMS->Visible) { // EMS ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->EMS) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->EMS->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->EMS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->EMS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->EMS->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->EMS->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->EMS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->EMS->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Cannulation->Visible) { // Cannulation ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Cannulation) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Cannulation->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->Cannulation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Cannulation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->Cannulation->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Cannulation->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Cannulation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->Cannulation->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->PlanT->Visible) { // PlanT ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->PlanT) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->PlanT->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->PlanT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->PlanT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->PlanT->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->PlanT->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->PlanT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->PlanT->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDate->Visible) { // ReviewDate ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->ReviewDate) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->ReviewDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->ReviewDate->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ReviewDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->ReviewDate->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->ReviewDoctor) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->ReviewDoctor->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->ReviewDoctor->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->TidNo) == "") { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TidNo->headerCellClass() ?>"><?php echo $ivf_ovum_pick_up_chart->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_ovum_pick_up_chart->TidNo->Name ?>" data-sort-order="<?php echo $ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->TidNo->Name && $ivf_ovum_pick_up_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_preview->SortField == $ivf_ovum_pick_up_chart->TidNo->Name) { ?><?php if ($ivf_ovum_pick_up_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_ovum_pick_up_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_ovum_pick_up_chart_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_ovum_pick_up_chart_preview->RecCount = 0;
$ivf_ovum_pick_up_chart_preview->RowCnt = 0;
while ($ivf_ovum_pick_up_chart_preview->Recordset && !$ivf_ovum_pick_up_chart_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_ovum_pick_up_chart_preview->RecCount++;
	$ivf_ovum_pick_up_chart_preview->RowCnt++;
	$ivf_ovum_pick_up_chart_preview->CssStyle = "";
	$ivf_ovum_pick_up_chart_preview->loadListRowValues($ivf_ovum_pick_up_chart_preview->Recordset);

	// Render row
	$ivf_ovum_pick_up_chart_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_ovum_pick_up_chart_preview->resetAttributes();
	$ivf_ovum_pick_up_chart_preview->renderListRow();

	// Render list options
	$ivf_ovum_pick_up_chart_preview->renderListOptions();
?>
	<tr<?php echo $ivf_ovum_pick_up_chart_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_ovum_pick_up_chart_preview->ListOptions->render("body", "left", $ivf_ovum_pick_up_chart_preview->RowCnt);
?>
<?php if ($ivf_ovum_pick_up_chart->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_ovum_pick_up_chart->id->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->id->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_ovum_pick_up_chart->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_ovum_pick_up_chart->Name->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->Name->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ARTCycle->Visible) { // ARTCycle ?>
		<!-- ARTCycle -->
		<td<?php echo $ivf_ovum_pick_up_chart->ARTCycle->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ARTCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Consultant->Visible) { // Consultant ?>
		<!-- Consultant -->
		<td<?php echo $ivf_ovum_pick_up_chart->Consultant->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Consultant->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
		<!-- TotalDoseOfStimulation -->
		<td<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Protocol->Visible) { // Protocol ?>
		<!-- Protocol -->
		<td<?php echo $ivf_ovum_pick_up_chart->Protocol->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->Protocol->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Protocol->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
		<!-- NumberOfDaysOfStimulation -->
		<td<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->Visible) { // TriggerDateTime ?>
		<!-- TriggerDateTime -->
		<td<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OPUDateTime->Visible) { // OPUDateTime ?>
		<!-- OPUDateTime -->
		<td<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
		<!-- HoursAfterTrigger -->
		<td<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumE2->Visible) { // SerumE2 ?>
		<!-- SerumE2 -->
		<td<?php echo $ivf_ovum_pick_up_chart->SerumE2->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->SerumE2->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->SerumE2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumP4->Visible) { // SerumP4 ?>
		<!-- SerumP4 -->
		<td<?php echo $ivf_ovum_pick_up_chart->SerumP4->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->SerumP4->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->SerumP4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->FORT->Visible) { // FORT ?>
		<!-- FORT -->
		<td<?php echo $ivf_ovum_pick_up_chart->FORT->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->FORT->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->FORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
		<!-- ExperctedOocytes -->
		<td<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
		<!-- NoOfOocytesRetrieved -->
		<td<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
		<!-- OocytesRetreivalRate -->
		<td<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Anesthesia->Visible) { // Anesthesia ?>
		<!-- Anesthesia -->
		<td<?php echo $ivf_ovum_pick_up_chart->Anesthesia->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->Anesthesia->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Anesthesia->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<!-- TrialCannulation -->
		<td<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->UCL->Visible) { // UCL ?>
		<!-- UCL -->
		<td<?php echo $ivf_ovum_pick_up_chart->UCL->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->UCL->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->UCL->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Angle->Visible) { // Angle ?>
		<!-- Angle -->
		<td<?php echo $ivf_ovum_pick_up_chart->Angle->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->Angle->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Angle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->EMS->Visible) { // EMS ?>
		<!-- EMS -->
		<td<?php echo $ivf_ovum_pick_up_chart->EMS->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->EMS->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->EMS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Cannulation->Visible) { // Cannulation ?>
		<!-- Cannulation -->
		<td<?php echo $ivf_ovum_pick_up_chart->Cannulation->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->Cannulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Cannulation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
		<!-- NoOfOocytesRetrievedd -->
		<td<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->PlanT->Visible) { // PlanT ?>
		<!-- PlanT -->
		<td<?php echo $ivf_ovum_pick_up_chart->PlanT->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->PlanT->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->PlanT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDate->Visible) { // ReviewDate ?>
		<!-- ReviewDate -->
		<td<?php echo $ivf_ovum_pick_up_chart->ReviewDate->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->ReviewDate->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ReviewDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<!-- ReviewDoctor -->
		<td<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_ovum_pick_up_chart->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_ovum_pick_up_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_ovum_pick_up_chart_preview->ListOptions->render("body", "right", $ivf_ovum_pick_up_chart_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_ovum_pick_up_chart_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_ovum_pick_up_chart_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_ovum_pick_up_chart_preview->Pager)) $ivf_ovum_pick_up_chart_preview->Pager = new PrevNextPager($ivf_ovum_pick_up_chart_preview->StartRec, $ivf_ovum_pick_up_chart_preview->DisplayRecs, $ivf_ovum_pick_up_chart_preview->TotalRecs) ?>
<?php if ($ivf_ovum_pick_up_chart_preview->Pager->RecordCount > 0 && $ivf_ovum_pick_up_chart_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_ovum_pick_up_chart_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_ovum_pick_up_chart_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_ovum_pick_up_chart_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_ovum_pick_up_chart_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_ovum_pick_up_chart_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_ovum_pick_up_chart_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_ovum_pick_up_chart_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_ovum_pick_up_chart_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_ovum_pick_up_chart_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_ovum_pick_up_chart_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_ovum_pick_up_chart_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_ovum_pick_up_chart_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_ovum_pick_up_chart_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_ovum_pick_up_chart_preview->Recordset)
	$ivf_ovum_pick_up_chart_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_ovum_pick_up_chart_preview->terminate();
?>
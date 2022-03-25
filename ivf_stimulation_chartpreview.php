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
$ivf_stimulation_chart_preview = new ivf_stimulation_chart_preview();

// Run the page
$ivf_stimulation_chart_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_chart_preview->Page_Render();
?>
<?php $ivf_stimulation_chart_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_stimulation_chart"><!-- .card -->
<?php if ($ivf_stimulation_chart_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_stimulation_chart_preview->renderListOptions();

// Render list options (header, left)
$ivf_stimulation_chart_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_stimulation_chart->id->Visible) { // id ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->id) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->id->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->id->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->id->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->id->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RIDNo->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RIDNo->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RIDNo->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RIDNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RIDNo->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Name->Visible) { // Name ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Name) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Name->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Name->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Name->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Name->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ARTCycle) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ARTCycle->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ARTCycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ARTCycle->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ARTCycle->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ARTCycle->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ARTCycle->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->FemaleFactor->Visible) { // FemaleFactor ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->FemaleFactor) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->FemaleFactor->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->FemaleFactor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->FemaleFactor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->FemaleFactor->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->FemaleFactor->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FemaleFactor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->FemaleFactor->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->MaleFactor->Visible) { // MaleFactor ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->MaleFactor) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->MaleFactor->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->MaleFactor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->MaleFactor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->MaleFactor->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->MaleFactor->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->MaleFactor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->MaleFactor->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Protocol->Visible) { // Protocol ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Protocol) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Protocol->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Protocol->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Protocol->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Protocol->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Protocol->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Protocol->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Protocol->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SemenFrozen->Visible) { // SemenFrozen ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SemenFrozen) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->SemenFrozen->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->SemenFrozen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->SemenFrozen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->SemenFrozen->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SemenFrozen->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SemenFrozen->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SemenFrozen->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->A4ICSICycle->Visible) { // A4ICSICycle ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->A4ICSICycle) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->A4ICSICycle->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->A4ICSICycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->A4ICSICycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->A4ICSICycle->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->A4ICSICycle->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->A4ICSICycle->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->A4ICSICycle->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TotalICSICycle->Visible) { // TotalICSICycle ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TotalICSICycle) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->TotalICSICycle->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->TotalICSICycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->TotalICSICycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->TotalICSICycle->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TotalICSICycle->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TotalICSICycle->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TotalICSICycle->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TypeOfInfertility) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->TypeOfInfertility->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->TypeOfInfertility->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->TypeOfInfertility->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->TypeOfInfertility->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TypeOfInfertility->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TypeOfInfertility->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TypeOfInfertility->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Duration->Visible) { // Duration ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Duration) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Duration->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Duration->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Duration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Duration->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Duration->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Duration->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Duration->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->LMP->Visible) { // LMP ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->LMP) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->LMP->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->LMP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->LMP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->LMP->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->LMP->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->LMP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->LMP->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RelevantHistory->Visible) { // RelevantHistory ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RelevantHistory) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RelevantHistory->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RelevantHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RelevantHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RelevantHistory->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RelevantHistory->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RelevantHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RelevantHistory->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->IUICycles->Visible) { // IUICycles ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->IUICycles) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->IUICycles->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->IUICycles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->IUICycles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->IUICycles->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->IUICycles->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->IUICycles->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->IUICycles->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->AFC->Visible) { // AFC ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->AFC) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->AFC->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->AFC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->AFC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->AFC->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->AFC->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->AFC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->AFC->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->AMH->Visible) { // AMH ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->AMH) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->AMH->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->AMH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->AMH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->AMH->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->AMH->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->AMH->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->AMH->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->FBMI->Visible) { // FBMI ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->FBMI) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->FBMI->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->FBMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->FBMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->FBMI->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->FBMI->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FBMI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->FBMI->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->MBMI->Visible) { // MBMI ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->MBMI) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->MBMI->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->MBMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->MBMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->MBMI->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->MBMI->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->MBMI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->MBMI->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->OvarianVolumeRT) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->OvarianVolumeRT->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->OvarianVolumeRT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->OvarianVolumeRT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->OvarianVolumeRT->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->OvarianVolumeRT->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OvarianVolumeRT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->OvarianVolumeRT->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->OvarianVolumeLT) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->OvarianVolumeLT->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->OvarianVolumeLT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->OvarianVolumeLT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->OvarianVolumeLT->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->OvarianVolumeLT->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OvarianVolumeLT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->OvarianVolumeLT->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DAYSOFSTIMULATION) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DAYSOFSTIMULATION->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DAYSOFSTIMULATION->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DOSEOFGONADOTROPINS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DOSEOFGONADOTROPINS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DOSEOFGONADOTROPINS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->INJTYPE->Visible) { // INJTYPE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->INJTYPE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->INJTYPE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->INJTYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->INJTYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->INJTYPE->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->INJTYPE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->INJTYPE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->INJTYPE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ANTAGONISTDAYS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ANTAGONISTDAYS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ANTAGONISTDAYS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ANTAGONISTSTARTDAY) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ANTAGONISTSTARTDAY->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ANTAGONISTSTARTDAY->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GROWTHHORMONE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GROWTHHORMONE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GROWTHHORMONE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GROWTHHORMONE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GROWTHHORMONE->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GROWTHHORMONE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GROWTHHORMONE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GROWTHHORMONE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->PRETREATMENT->Visible) { // PRETREATMENT ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->PRETREATMENT) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->PRETREATMENT->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->PRETREATMENT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->PRETREATMENT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->PRETREATMENT->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->PRETREATMENT->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PRETREATMENT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->PRETREATMENT->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SerumP4->Visible) { // SerumP4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SerumP4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->SerumP4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->SerumP4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->SerumP4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->SerumP4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SerumP4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SerumP4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SerumP4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->FORT->Visible) { // FORT ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->FORT) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->FORT->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->FORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->FORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->FORT->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->FORT->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->FORT->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->MedicalFactors->Visible) { // MedicalFactors ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->MedicalFactors) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->MedicalFactors->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->MedicalFactors->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->MedicalFactors->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->MedicalFactors->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->MedicalFactors->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->MedicalFactors->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->MedicalFactors->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SCDate->Visible) { // SCDate ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SCDate) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->SCDate->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->SCDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->SCDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->SCDate->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SCDate->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SCDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SCDate->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianSurgery->Visible) { // OvarianSurgery ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->OvarianSurgery) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->OvarianSurgery->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->OvarianSurgery->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->OvarianSurgery->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->OvarianSurgery->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->OvarianSurgery->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OvarianSurgery->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->OvarianSurgery->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->PreProcedureOrder) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->PreProcedureOrder->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->PreProcedureOrder->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->PreProcedureOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->PreProcedureOrder->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->PreProcedureOrder->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PreProcedureOrder->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->PreProcedureOrder->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERR->Visible) { // TRIGGERR ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TRIGGERR) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->TRIGGERR->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->TRIGGERR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->TRIGGERR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->TRIGGERR->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TRIGGERR->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TRIGGERR->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TRIGGERR->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TRIGGERDATE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->TRIGGERDATE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->TRIGGERDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->TRIGGERDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->TRIGGERDATE->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TRIGGERDATE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TRIGGERDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TRIGGERDATE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ATHOMEorCLINIC) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ATHOMEorCLINIC->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ATHOMEorCLINIC->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->OPUDATE->Visible) { // OPUDATE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->OPUDATE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->OPUDATE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->OPUDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->OPUDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->OPUDATE->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->OPUDATE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OPUDATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->OPUDATE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ALLFREEZEINDICATION) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ALLFREEZEINDICATION->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ALLFREEZEINDICATION->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ERA->Visible) { // ERA ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ERA) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ERA->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ERA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ERA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ERA->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ERA->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ERA->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ERA->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGTA->Visible) { // PGTA ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->PGTA) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->PGTA->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->PGTA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->PGTA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->PGTA->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->PGTA->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PGTA->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->PGTA->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGD->Visible) { // PGD ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->PGD) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->PGD->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->PGD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->PGD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->PGD->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->PGD->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PGD->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->PGD->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATEOFET->Visible) { // DATEOFET ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DATEOFET) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DATEOFET->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DATEOFET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DATEOFET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DATEOFET->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DATEOFET->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DATEOFET->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DATEOFET->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ET->Visible) { // ET ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ET) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ET->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ET->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ET->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ET->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ET->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ESET->Visible) { // ESET ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ESET) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ESET->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ESET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ESET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ESET->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ESET->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ESET->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ESET->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOET->Visible) { // DOET ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DOET) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DOET->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DOET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DOET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DOET->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DOET->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DOET->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DOET->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SEMENPREPARATION) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->SEMENPREPARATION->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->SEMENPREPARATION->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->SEMENPREPARATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->SEMENPREPARATION->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SEMENPREPARATION->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SEMENPREPARATION->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SEMENPREPARATION->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->REASONFORESET->Visible) { // REASONFORESET ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->REASONFORESET) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->REASONFORESET->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->REASONFORESET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->REASONFORESET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->REASONFORESET->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->REASONFORESET->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->REASONFORESET->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->REASONFORESET->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Expectedoocytes->Visible) { // Expectedoocytes ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Expectedoocytes) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Expectedoocytes->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Expectedoocytes->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Expectedoocytes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Expectedoocytes->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Expectedoocytes->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Expectedoocytes->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Expectedoocytes->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate1->Visible) { // StChDate1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate2->Visible) { // StChDate2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate3->Visible) { // StChDate3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate4->Visible) { // StChDate4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate5->Visible) { // StChDate5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate6->Visible) { // StChDate6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate7->Visible) { // StChDate7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate8->Visible) { // StChDate8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate9->Visible) { // StChDate9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate10->Visible) { // StChDate10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate11->Visible) { // StChDate11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate12->Visible) { // StChDate12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate13->Visible) { // StChDate13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay1->Visible) { // CycleDay1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay2->Visible) { // CycleDay2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay3->Visible) { // CycleDay3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay4->Visible) { // CycleDay4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay5->Visible) { // CycleDay5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay6->Visible) { // CycleDay6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay7->Visible) { // CycleDay7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay8->Visible) { // CycleDay8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay9->Visible) { // CycleDay9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay10->Visible) { // CycleDay10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay11->Visible) { // CycleDay11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay12->Visible) { // CycleDay12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay13->Visible) { // CycleDay13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay1->Visible) { // StimulationDay1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay2->Visible) { // StimulationDay2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay3->Visible) { // StimulationDay3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay4->Visible) { // StimulationDay4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay5->Visible) { // StimulationDay5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay6->Visible) { // StimulationDay6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay7->Visible) { // StimulationDay7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay8->Visible) { // StimulationDay8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay9->Visible) { // StimulationDay9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay10->Visible) { // StimulationDay10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay11->Visible) { // StimulationDay11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay12->Visible) { // StimulationDay12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay13->Visible) { // StimulationDay13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet1->Visible) { // Tablet1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet2->Visible) { // Tablet2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet3->Visible) { // Tablet3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet4->Visible) { // Tablet4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet5->Visible) { // Tablet5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet6->Visible) { // Tablet6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet7->Visible) { // Tablet7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet8->Visible) { // Tablet8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet9->Visible) { // Tablet9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet10->Visible) { // Tablet10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet11->Visible) { // Tablet11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet12->Visible) { // Tablet12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet13->Visible) { // Tablet13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH1->Visible) { // RFSH1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH2->Visible) { // RFSH2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH3->Visible) { // RFSH3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH4->Visible) { // RFSH4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH5->Visible) { // RFSH5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH6->Visible) { // RFSH6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH7->Visible) { // RFSH7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH8->Visible) { // RFSH8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH9->Visible) { // RFSH9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH10->Visible) { // RFSH10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH11->Visible) { // RFSH11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH12->Visible) { // RFSH12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH13->Visible) { // RFSH13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG1->Visible) { // HMG1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG2->Visible) { // HMG2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG3->Visible) { // HMG3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG4->Visible) { // HMG4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG5->Visible) { // HMG5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG6->Visible) { // HMG6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG7->Visible) { // HMG7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG8->Visible) { // HMG8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG9->Visible) { // HMG9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG10->Visible) { // HMG10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG11->Visible) { // HMG11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG12->Visible) { // HMG12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG13->Visible) { // HMG13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH1->Visible) { // GnRH1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH2->Visible) { // GnRH2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH3->Visible) { // GnRH3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH4->Visible) { // GnRH4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH5->Visible) { // GnRH5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH6->Visible) { // GnRH6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH7->Visible) { // GnRH7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH8->Visible) { // GnRH8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH9->Visible) { // GnRH9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH10->Visible) { // GnRH10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH11->Visible) { // GnRH11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH12->Visible) { // GnRH12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH13->Visible) { // GnRH13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E21->Visible) { // E21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E22->Visible) { // E22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E23->Visible) { // E23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E24->Visible) { // E24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E25->Visible) { // E25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E26->Visible) { // E26 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E26) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E26->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E26->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E26->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E26->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E26->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E26->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E26->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E27->Visible) { // E27 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E27) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E27->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E27->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E27->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E27->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E27->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E27->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E27->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E28->Visible) { // E28 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E28) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E28->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E28->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E28->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E28->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E28->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E28->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E28->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E29->Visible) { // E29 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E29) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E29->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E29->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E29->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E29->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E29->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E29->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E29->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E210->Visible) { // E210 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E210) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E210->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E210->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E210->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E210->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E210->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E210->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E210->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E211->Visible) { // E211 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E211) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E211->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E211->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E211->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E211->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E211->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E211->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E211->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E212->Visible) { // E212 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E212) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E212->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E212->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E212->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E212->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E212->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E212->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E212->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E213->Visible) { // E213 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E213) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E213->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E213->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E213->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E213->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E213->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E213->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E213->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P41->Visible) { // P41 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P41) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P41->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P41->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P41->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P41->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P41->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P41->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P41->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P42->Visible) { // P42 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P42) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P42->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P42->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P42->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P42->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P42->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P42->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P42->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P43->Visible) { // P43 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P43) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P43->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P43->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P43->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P43->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P43->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P43->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P43->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P44->Visible) { // P44 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P44) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P44->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P44->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P44->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P44->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P44->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P44->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P44->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P45->Visible) { // P45 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P45) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P45->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P45->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P45->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P45->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P45->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P45->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P45->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P46->Visible) { // P46 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P46) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P46->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P46->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P46->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P46->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P46->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P46->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P46->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P47->Visible) { // P47 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P47) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P47->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P47->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P47->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P47->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P47->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P47->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P47->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P48->Visible) { // P48 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P48) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P48->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P48->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P48->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P48->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P48->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P48->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P48->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P49->Visible) { // P49 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P49) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P49->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P49->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P49->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P49->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P49->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P49->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P49->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P410->Visible) { // P410 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P410) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P410->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P410->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P410->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P410->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P410->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P410->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P410->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P411->Visible) { // P411 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P411) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P411->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P411->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P411->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P411->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P411->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P411->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P411->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P412->Visible) { // P412 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P412) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P412->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P412->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P412->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P412->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P412->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P412->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P412->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P413->Visible) { // P413 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P413) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P413->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P413->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P413->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P413->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P413->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P413->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P413->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt1->Visible) { // USGRt1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt2->Visible) { // USGRt2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt3->Visible) { // USGRt3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt4->Visible) { // USGRt4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt5->Visible) { // USGRt5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt6->Visible) { // USGRt6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt7->Visible) { // USGRt7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt8->Visible) { // USGRt8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt9->Visible) { // USGRt9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt10->Visible) { // USGRt10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt11->Visible) { // USGRt11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt12->Visible) { // USGRt12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt13->Visible) { // USGRt13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt1->Visible) { // USGLt1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt2->Visible) { // USGLt2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt3->Visible) { // USGLt3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt4->Visible) { // USGLt4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt5->Visible) { // USGLt5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt6->Visible) { // USGLt6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt7->Visible) { // USGLt7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt8->Visible) { // USGLt8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt9->Visible) { // USGLt9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt10->Visible) { // USGLt10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt11->Visible) { // USGLt11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt12->Visible) { // USGLt12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt13->Visible) { // USGLt13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM1->Visible) { // EM1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM2->Visible) { // EM2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM3->Visible) { // EM3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM4->Visible) { // EM4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM5->Visible) { // EM5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM6->Visible) { // EM6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM7->Visible) { // EM7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM8->Visible) { // EM8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM9->Visible) { // EM9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM10->Visible) { // EM10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM11->Visible) { // EM11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM12->Visible) { // EM12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM13->Visible) { // EM13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others1->Visible) { // Others1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others2->Visible) { // Others2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others3->Visible) { // Others3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others4->Visible) { // Others4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others5->Visible) { // Others5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others6->Visible) { // Others6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others7->Visible) { // Others7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others8->Visible) { // Others8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others9->Visible) { // Others9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others10->Visible) { // Others10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others11->Visible) { // Others11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others12->Visible) { // Others12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others13->Visible) { // Others13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR1->Visible) { // DR1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR1->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR2->Visible) { // DR2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR2->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR3->Visible) { // DR3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR3->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR4->Visible) { // DR4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR4->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR5->Visible) { // DR5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR5->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR6->Visible) { // DR6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR6->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR6->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR7->Visible) { // DR7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR7->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR7->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR8->Visible) { // DR8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR8->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR8->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR9->Visible) { // DR9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR9->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR9->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR10->Visible) { // DR10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR10->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR10->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR11->Visible) { // DR11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR11->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR11->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR12->Visible) { // DR12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR12->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR12->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR13->Visible) { // DR13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR13->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR13->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TidNo) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->TidNo->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->TidNo->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TidNo->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TidNo->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Convert->Visible) { // Convert ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Convert) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Convert->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Convert->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Convert->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Convert->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Convert->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Convert->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Convert->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Consultant) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Consultant->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Consultant->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Consultant->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Consultant->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Consultant->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Consultant->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Consultant->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->InseminatinTechnique) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->InseminatinTechnique->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->InseminatinTechnique->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->InseminatinTechnique->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->InseminatinTechnique->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->InseminatinTechnique->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->InseminatinTechnique->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->IndicationForART->Visible) { // IndicationForART ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->IndicationForART) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->IndicationForART->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->IndicationForART->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->IndicationForART->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->IndicationForART->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->IndicationForART->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->IndicationForART->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->IndicationForART->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Hysteroscopy) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Hysteroscopy->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Hysteroscopy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Hysteroscopy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Hysteroscopy->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Hysteroscopy->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Hysteroscopy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Hysteroscopy->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EndometrialScratching) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EndometrialScratching->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EndometrialScratching->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EndometrialScratching->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EndometrialScratching->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EndometrialScratching->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EndometrialScratching->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EndometrialScratching->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TrialCannulation) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->TrialCannulation->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->TrialCannulation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->TrialCannulation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->TrialCannulation->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TrialCannulation->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TrialCannulation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TrialCannulation->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CYCLETYPE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CYCLETYPE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CYCLETYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CYCLETYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CYCLETYPE->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CYCLETYPE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CYCLETYPE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CYCLETYPE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HRTCYCLE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HRTCYCLE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HRTCYCLE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HRTCYCLE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HRTCYCLE->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HRTCYCLE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HRTCYCLE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HRTCYCLE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->OralEstrogenDosage) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->OralEstrogenDosage->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->OralEstrogenDosage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->OralEstrogenDosage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->OralEstrogenDosage->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->OralEstrogenDosage->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OralEstrogenDosage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->OralEstrogenDosage->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->VaginalEstrogen) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->VaginalEstrogen->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->VaginalEstrogen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->VaginalEstrogen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->VaginalEstrogen->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->VaginalEstrogen->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->VaginalEstrogen->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->VaginalEstrogen->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GCSF->Visible) { // GCSF ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GCSF) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GCSF->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GCSF->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GCSF->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GCSF->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GCSF->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GCSF->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GCSF->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ActivatedPRP) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ActivatedPRP->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ActivatedPRP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ActivatedPRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ActivatedPRP->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ActivatedPRP->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ActivatedPRP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ActivatedPRP->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->UCLcm->Visible) { // UCLcm ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->UCLcm) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->UCLcm->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->UCLcm->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->UCLcm->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->UCLcm->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->UCLcm->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->UCLcm->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->UCLcm->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DATOFEMBRYOTRANSFER) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->NOOFEMBRYOSTHAWED) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DAYOFEMBRYOS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DAYOFEMBRYOS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DAYOFEMBRYOS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaAdmin->Visible) { // ViaAdmin ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ViaAdmin) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ViaAdmin->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ViaAdmin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ViaAdmin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ViaAdmin->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ViaAdmin->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ViaAdmin->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ViaAdmin->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ViaStartDateTime) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ViaStartDateTime->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ViaStartDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ViaStartDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ViaStartDateTime->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ViaStartDateTime->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ViaStartDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ViaStartDateTime->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaDose->Visible) { // ViaDose ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ViaDose) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ViaDose->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ViaDose->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ViaDose->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ViaDose->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ViaDose->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ViaDose->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ViaDose->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->AllFreeze->Visible) { // AllFreeze ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->AllFreeze) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->AllFreeze->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->AllFreeze->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->AllFreeze->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->AllFreeze->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->AllFreeze->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->AllFreeze->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->AllFreeze->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TreatmentCancel->Visible) { // TreatmentCancel ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TreatmentCancel) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->TreatmentCancel->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->TreatmentCancel->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->TreatmentCancel->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->TreatmentCancel->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TreatmentCancel->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TreatmentCancel->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TreatmentCancel->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ProgesteroneAdmin) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ProgesteroneAdmin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ProgesteroneAdmin->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ProgesteroneAdmin->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ProgesteroneAdmin->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ProgesteroneStart) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ProgesteroneStart->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ProgesteroneStart->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ProgesteroneStart->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ProgesteroneStart->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ProgesteroneStart->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ProgesteroneStart->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ProgesteroneStart->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ProgesteroneDose) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ProgesteroneDose->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ProgesteroneDose->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ProgesteroneDose->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ProgesteroneDose->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ProgesteroneDose->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ProgesteroneDose->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ProgesteroneDose->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate14->Visible) { // StChDate14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate15->Visible) { // StChDate15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate16->Visible) { // StChDate16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate17->Visible) { // StChDate17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate18->Visible) { // StChDate18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate19->Visible) { // StChDate19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate20->Visible) { // StChDate20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate21->Visible) { // StChDate21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate22->Visible) { // StChDate22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate23->Visible) { // StChDate23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate24->Visible) { // StChDate24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate25->Visible) { // StChDate25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StChDate25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StChDate25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StChDate25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay14->Visible) { // CycleDay14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay15->Visible) { // CycleDay15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay16->Visible) { // CycleDay16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay17->Visible) { // CycleDay17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay18->Visible) { // CycleDay18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay19->Visible) { // CycleDay19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay20->Visible) { // CycleDay20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay21->Visible) { // CycleDay21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay22->Visible) { // CycleDay22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay23->Visible) { // CycleDay23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay24->Visible) { // CycleDay24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay25->Visible) { // CycleDay25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->CycleDay25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->CycleDay25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->CycleDay25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay14->Visible) { // StimulationDay14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay15->Visible) { // StimulationDay15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay16->Visible) { // StimulationDay16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay17->Visible) { // StimulationDay17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay18->Visible) { // StimulationDay18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay19->Visible) { // StimulationDay19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay20->Visible) { // StimulationDay20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay21->Visible) { // StimulationDay21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay22->Visible) { // StimulationDay22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay23->Visible) { // StimulationDay23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay24->Visible) { // StimulationDay24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay25->Visible) { // StimulationDay25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->StimulationDay25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->StimulationDay25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->StimulationDay25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet14->Visible) { // Tablet14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet15->Visible) { // Tablet15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet16->Visible) { // Tablet16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet17->Visible) { // Tablet17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet18->Visible) { // Tablet18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet19->Visible) { // Tablet19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet20->Visible) { // Tablet20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet21->Visible) { // Tablet21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet22->Visible) { // Tablet22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet23->Visible) { // Tablet23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet24->Visible) { // Tablet24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet25->Visible) { // Tablet25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Tablet25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Tablet25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Tablet25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH14->Visible) { // RFSH14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH15->Visible) { // RFSH15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH16->Visible) { // RFSH16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH17->Visible) { // RFSH17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH18->Visible) { // RFSH18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH19->Visible) { // RFSH19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH20->Visible) { // RFSH20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH21->Visible) { // RFSH21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH22->Visible) { // RFSH22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH23->Visible) { // RFSH23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH24->Visible) { // RFSH24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH25->Visible) { // RFSH25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->RFSH25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->RFSH25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->RFSH25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG14->Visible) { // HMG14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG15->Visible) { // HMG15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG16->Visible) { // HMG16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG17->Visible) { // HMG17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG18->Visible) { // HMG18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG19->Visible) { // HMG19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG20->Visible) { // HMG20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG21->Visible) { // HMG21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG22->Visible) { // HMG22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG23->Visible) { // HMG23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG24->Visible) { // HMG24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG25->Visible) { // HMG25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HMG25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HMG25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HMG25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH14->Visible) { // GnRH14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH15->Visible) { // GnRH15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH16->Visible) { // GnRH16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH17->Visible) { // GnRH17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH18->Visible) { // GnRH18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH19->Visible) { // GnRH19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH20->Visible) { // GnRH20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH21->Visible) { // GnRH21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH22->Visible) { // GnRH22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH23->Visible) { // GnRH23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH24->Visible) { // GnRH24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH25->Visible) { // GnRH25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->GnRH25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->GnRH25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->GnRH25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P414->Visible) { // P414 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P414) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P414->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P414->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P414->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P414->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P414->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P414->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P414->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P415->Visible) { // P415 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P415) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P415->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P415->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P415->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P415->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P415->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P415->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P415->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P416->Visible) { // P416 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P416) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P416->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P416->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P416->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P416->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P416->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P416->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P416->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P417->Visible) { // P417 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P417) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P417->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P417->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P417->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P417->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P417->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P417->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P417->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P418->Visible) { // P418 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P418) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P418->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P418->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P418->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P418->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P418->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P418->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P418->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P419->Visible) { // P419 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P419) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P419->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P419->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P419->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P419->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P419->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P419->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P419->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P420->Visible) { // P420 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P420) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P420->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P420->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P420->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P420->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P420->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P420->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P420->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P421->Visible) { // P421 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P421) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P421->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P421->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P421->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P421->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P421->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P421->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P421->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P422->Visible) { // P422 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P422) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P422->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P422->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P422->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P422->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P422->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P422->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P422->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P423->Visible) { // P423 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P423) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P423->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P423->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P423->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P423->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P423->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P423->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P423->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P424->Visible) { // P424 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P424) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P424->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P424->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P424->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P424->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P424->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P424->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P424->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P425->Visible) { // P425 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P425) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->P425->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->P425->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->P425->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->P425->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P425->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P425->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->P425->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt14->Visible) { // USGRt14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt15->Visible) { // USGRt15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt16->Visible) { // USGRt16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt17->Visible) { // USGRt17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt18->Visible) { // USGRt18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt19->Visible) { // USGRt19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt20->Visible) { // USGRt20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt21->Visible) { // USGRt21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt22->Visible) { // USGRt22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt23->Visible) { // USGRt23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt24->Visible) { // USGRt24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt25->Visible) { // USGRt25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGRt25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGRt25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGRt25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt14->Visible) { // USGLt14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt15->Visible) { // USGLt15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt16->Visible) { // USGLt16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt17->Visible) { // USGLt17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt18->Visible) { // USGLt18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt19->Visible) { // USGLt19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt20->Visible) { // USGLt20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt21->Visible) { // USGLt21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt22->Visible) { // USGLt22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt23->Visible) { // USGLt23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt24->Visible) { // USGLt24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt25->Visible) { // USGLt25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->USGLt25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->USGLt25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->USGLt25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM14->Visible) { // EM14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM15->Visible) { // EM15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM16->Visible) { // EM16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM17->Visible) { // EM17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM18->Visible) { // EM18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM19->Visible) { // EM19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM20->Visible) { // EM20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM21->Visible) { // EM21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM22->Visible) { // EM22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM23->Visible) { // EM23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM24->Visible) { // EM24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM25->Visible) { // EM25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EM25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EM25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EM25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EM25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others14->Visible) { // Others14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others15->Visible) { // Others15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others16->Visible) { // Others16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others17->Visible) { // Others17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others18->Visible) { // Others18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others19->Visible) { // Others19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others20->Visible) { // Others20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others21->Visible) { // Others21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others22->Visible) { // Others22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others23->Visible) { // Others23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others24->Visible) { // Others24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others25->Visible) { // Others25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->Others25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->Others25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->Others25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->Others25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR14->Visible) { // DR14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR14->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR14->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR15->Visible) { // DR15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR15->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR15->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR16->Visible) { // DR16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR16->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR16->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR17->Visible) { // DR17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR17->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR17->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR18->Visible) { // DR18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR18->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR18->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR19->Visible) { // DR19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR19->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR19->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR20->Visible) { // DR20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR20->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR20->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR21->Visible) { // DR21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR21->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR21->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR22->Visible) { // DR22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR22->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR22->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR23->Visible) { // DR23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR23->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR23->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR24->Visible) { // DR24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR24->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR24->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR25->Visible) { // DR25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DR25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DR25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DR25->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR25->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DR25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E214->Visible) { // E214 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E214) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E214->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E214->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E214->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E214->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E214->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E214->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E214->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E215->Visible) { // E215 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E215) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E215->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E215->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E215->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E215->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E215->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E215->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E215->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E216->Visible) { // E216 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E216) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E216->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E216->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E216->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E216->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E216->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E216->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E216->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E217->Visible) { // E217 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E217) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E217->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E217->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E217->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E217->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E217->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E217->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E217->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E218->Visible) { // E218 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E218) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E218->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E218->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E218->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E218->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E218->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E218->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E218->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E219->Visible) { // E219 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E219) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E219->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E219->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E219->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E219->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E219->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E219->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E219->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E220->Visible) { // E220 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E220) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E220->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E220->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E220->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E220->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E220->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E220->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E220->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E221->Visible) { // E221 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E221) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E221->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E221->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E221->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E221->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E221->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E221->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E221->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E222->Visible) { // E222 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E222) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E222->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E222->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E222->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E222->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E222->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E222->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E222->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E223->Visible) { // E223 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E223) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E223->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E223->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E223->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E223->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E223->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E223->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E223->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E224->Visible) { // E224 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E224) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E224->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E224->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E224->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E224->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E224->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E224->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E224->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E225->Visible) { // E225 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E225) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->E225->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->E225->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->E225->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->E225->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E225->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E225->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->E225->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EEETTTDTE->Visible) { // EEETTTDTE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EEETTTDTE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EEETTTDTE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EEETTTDTE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EEETTTDTE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EEETTTDTE->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EEETTTDTE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EEETTTDTE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EEETTTDTE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->bhcgdate->Visible) { // bhcgdate ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->bhcgdate) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->bhcgdate->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->bhcgdate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->bhcgdate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->bhcgdate->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->bhcgdate->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->bhcgdate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->bhcgdate->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TUBAL_PATENCY) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->TUBAL_PATENCY->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TUBAL_PATENCY->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TUBAL_PATENCY->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TUBAL_PATENCY->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HSG->Visible) { // HSG ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HSG) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->HSG->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->HSG->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->HSG->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->HSG->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HSG->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HSG->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->HSG->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DHL->Visible) { // DHL ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DHL) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->DHL->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->DHL->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->DHL->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->DHL->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DHL->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DHL->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->DHL->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->UTERINE_PROBLEMS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->UTERINE_PROBLEMS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->UTERINE_PROBLEMS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->W_COMORBIDS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->W_COMORBIDS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->W_COMORBIDS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->W_COMORBIDS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->W_COMORBIDS->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->W_COMORBIDS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->W_COMORBIDS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->W_COMORBIDS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->H_COMORBIDS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->H_COMORBIDS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->H_COMORBIDS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->H_COMORBIDS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->H_COMORBIDS->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->H_COMORBIDS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->H_COMORBIDS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->H_COMORBIDS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SEXUAL_DYSFUNCTION) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TABLETS->Visible) { // TABLETS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TABLETS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->TABLETS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->TABLETS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->TABLETS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->TABLETS->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TABLETS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TABLETS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->TABLETS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->FOLLICLE_STATUS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->FOLLICLE_STATUS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->FOLLICLE_STATUS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->NUMBER_OF_IUI) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->NUMBER_OF_IUI->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->NUMBER_OF_IUI->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->PROCEDURE->Visible) { // PROCEDURE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->PROCEDURE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->PROCEDURE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->PROCEDURE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->PROCEDURE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->PROCEDURE->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->PROCEDURE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PROCEDURE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->PROCEDURE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->LUTEAL_SUPPORT) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->LUTEAL_SUPPORT->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->LUTEAL_SUPPORT->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ONGOING_PREG) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->ONGOING_PREG->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->ONGOING_PREG->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->ONGOING_PREG->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->ONGOING_PREG->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ONGOING_PREG->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ONGOING_PREG->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->ONGOING_PREG->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EDD_Date->Visible) { // EDD_Date ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EDD_Date) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart->EDD_Date->headerCellClass() ?>"><?php echo $ivf_stimulation_chart->EDD_Date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart->EDD_Date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_stimulation_chart->EDD_Date->Name ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EDD_Date->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EDD_Date->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart->EDD_Date->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_stimulation_chart_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_stimulation_chart_preview->RecCount = 0;
$ivf_stimulation_chart_preview->RowCnt = 0;
while ($ivf_stimulation_chart_preview->Recordset && !$ivf_stimulation_chart_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_stimulation_chart_preview->RecCount++;
	$ivf_stimulation_chart_preview->RowCnt++;
	$ivf_stimulation_chart_preview->CssStyle = "";
	$ivf_stimulation_chart_preview->loadListRowValues($ivf_stimulation_chart_preview->Recordset);

	// Render row
	$ivf_stimulation_chart_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_stimulation_chart_preview->resetAttributes();
	$ivf_stimulation_chart_preview->renderListRow();

	// Render list options
	$ivf_stimulation_chart_preview->renderListOptions();
?>
	<tr<?php echo $ivf_stimulation_chart_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_stimulation_chart_preview->ListOptions->render("body", "left", $ivf_stimulation_chart_preview->RowCnt);
?>
<?php if ($ivf_stimulation_chart->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_stimulation_chart->id->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->id->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_stimulation_chart->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_stimulation_chart->Name->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Name->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ARTCycle->Visible) { // ARTCycle ?>
		<!-- ARTCycle -->
		<td<?php echo $ivf_stimulation_chart->ARTCycle->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ARTCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->FemaleFactor->Visible) { // FemaleFactor ?>
		<!-- FemaleFactor -->
		<td<?php echo $ivf_stimulation_chart->FemaleFactor->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->FemaleFactor->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FemaleFactor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->MaleFactor->Visible) { // MaleFactor ?>
		<!-- MaleFactor -->
		<td<?php echo $ivf_stimulation_chart->MaleFactor->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->MaleFactor->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MaleFactor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Protocol->Visible) { // Protocol ?>
		<!-- Protocol -->
		<td<?php echo $ivf_stimulation_chart->Protocol->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Protocol->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Protocol->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SemenFrozen->Visible) { // SemenFrozen ?>
		<!-- SemenFrozen -->
		<td<?php echo $ivf_stimulation_chart->SemenFrozen->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->SemenFrozen->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SemenFrozen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->A4ICSICycle->Visible) { // A4ICSICycle ?>
		<!-- A4ICSICycle -->
		<td<?php echo $ivf_stimulation_chart->A4ICSICycle->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->A4ICSICycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->A4ICSICycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TotalICSICycle->Visible) { // TotalICSICycle ?>
		<!-- TotalICSICycle -->
		<td<?php echo $ivf_stimulation_chart->TotalICSICycle->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->TotalICSICycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TotalICSICycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
		<!-- TypeOfInfertility -->
		<td<?php echo $ivf_stimulation_chart->TypeOfInfertility->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->TypeOfInfertility->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TypeOfInfertility->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Duration->Visible) { // Duration ?>
		<!-- Duration -->
		<td<?php echo $ivf_stimulation_chart->Duration->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Duration->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Duration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->LMP->Visible) { // LMP ?>
		<!-- LMP -->
		<td<?php echo $ivf_stimulation_chart->LMP->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->LMP->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->LMP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RelevantHistory->Visible) { // RelevantHistory ?>
		<!-- RelevantHistory -->
		<td<?php echo $ivf_stimulation_chart->RelevantHistory->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RelevantHistory->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RelevantHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->IUICycles->Visible) { // IUICycles ?>
		<!-- IUICycles -->
		<td<?php echo $ivf_stimulation_chart->IUICycles->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->IUICycles->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->IUICycles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->AFC->Visible) { // AFC ?>
		<!-- AFC -->
		<td<?php echo $ivf_stimulation_chart->AFC->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->AFC->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AFC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->AMH->Visible) { // AMH ?>
		<!-- AMH -->
		<td<?php echo $ivf_stimulation_chart->AMH->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->AMH->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AMH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->FBMI->Visible) { // FBMI ?>
		<!-- FBMI -->
		<td<?php echo $ivf_stimulation_chart->FBMI->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->FBMI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FBMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->MBMI->Visible) { // MBMI ?>
		<!-- MBMI -->
		<td<?php echo $ivf_stimulation_chart->MBMI->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->MBMI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MBMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
		<!-- OvarianVolumeRT -->
		<td<?php echo $ivf_stimulation_chart->OvarianVolumeRT->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->OvarianVolumeRT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianVolumeRT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
		<!-- OvarianVolumeLT -->
		<td<?php echo $ivf_stimulation_chart->OvarianVolumeLT->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->OvarianVolumeLT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianVolumeLT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
		<!-- DAYSOFSTIMULATION -->
		<td<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
		<!-- DOSEOFGONADOTROPINS -->
		<td<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->INJTYPE->Visible) { // INJTYPE ?>
		<!-- INJTYPE -->
		<td<?php echo $ivf_stimulation_chart->INJTYPE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->INJTYPE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->INJTYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
		<!-- ANTAGONISTDAYS -->
		<td<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
		<!-- ANTAGONISTSTARTDAY -->
		<td<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
		<!-- GROWTHHORMONE -->
		<td<?php echo $ivf_stimulation_chart->GROWTHHORMONE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GROWTHHORMONE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GROWTHHORMONE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->PRETREATMENT->Visible) { // PRETREATMENT ?>
		<!-- PRETREATMENT -->
		<td<?php echo $ivf_stimulation_chart->PRETREATMENT->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->PRETREATMENT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PRETREATMENT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SerumP4->Visible) { // SerumP4 ?>
		<!-- SerumP4 -->
		<td<?php echo $ivf_stimulation_chart->SerumP4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->SerumP4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SerumP4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->FORT->Visible) { // FORT ?>
		<!-- FORT -->
		<td<?php echo $ivf_stimulation_chart->FORT->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->FORT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->MedicalFactors->Visible) { // MedicalFactors ?>
		<!-- MedicalFactors -->
		<td<?php echo $ivf_stimulation_chart->MedicalFactors->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->MedicalFactors->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MedicalFactors->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SCDate->Visible) { // SCDate ?>
		<!-- SCDate -->
		<td<?php echo $ivf_stimulation_chart->SCDate->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->SCDate->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SCDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianSurgery->Visible) { // OvarianSurgery ?>
		<!-- OvarianSurgery -->
		<td<?php echo $ivf_stimulation_chart->OvarianSurgery->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->OvarianSurgery->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianSurgery->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
		<!-- PreProcedureOrder -->
		<td<?php echo $ivf_stimulation_chart->PreProcedureOrder->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->PreProcedureOrder->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PreProcedureOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERR->Visible) { // TRIGGERR ?>
		<!-- TRIGGERR -->
		<td<?php echo $ivf_stimulation_chart->TRIGGERR->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->TRIGGERR->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TRIGGERR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
		<!-- TRIGGERDATE -->
		<td<?php echo $ivf_stimulation_chart->TRIGGERDATE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->TRIGGERDATE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TRIGGERDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
		<!-- ATHOMEorCLINIC -->
		<td<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->OPUDATE->Visible) { // OPUDATE ?>
		<!-- OPUDATE -->
		<td<?php echo $ivf_stimulation_chart->OPUDATE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->OPUDATE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OPUDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
		<!-- ALLFREEZEINDICATION -->
		<td<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ERA->Visible) { // ERA ?>
		<!-- ERA -->
		<td<?php echo $ivf_stimulation_chart->ERA->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ERA->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ERA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGTA->Visible) { // PGTA ?>
		<!-- PGTA -->
		<td<?php echo $ivf_stimulation_chart->PGTA->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->PGTA->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PGTA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGD->Visible) { // PGD ?>
		<!-- PGD -->
		<td<?php echo $ivf_stimulation_chart->PGD->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->PGD->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PGD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATEOFET->Visible) { // DATEOFET ?>
		<!-- DATEOFET -->
		<td<?php echo $ivf_stimulation_chart->DATEOFET->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DATEOFET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DATEOFET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ET->Visible) { // ET ?>
		<!-- ET -->
		<td<?php echo $ivf_stimulation_chart->ET->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ESET->Visible) { // ESET ?>
		<!-- ESET -->
		<td<?php echo $ivf_stimulation_chart->ESET->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ESET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ESET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOET->Visible) { // DOET ?>
		<!-- DOET -->
		<td<?php echo $ivf_stimulation_chart->DOET->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DOET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DOET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
		<!-- SEMENPREPARATION -->
		<td<?php echo $ivf_stimulation_chart->SEMENPREPARATION->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->SEMENPREPARATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SEMENPREPARATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->REASONFORESET->Visible) { // REASONFORESET ?>
		<!-- REASONFORESET -->
		<td<?php echo $ivf_stimulation_chart->REASONFORESET->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->REASONFORESET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->REASONFORESET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Expectedoocytes->Visible) { // Expectedoocytes ?>
		<!-- Expectedoocytes -->
		<td<?php echo $ivf_stimulation_chart->Expectedoocytes->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Expectedoocytes->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Expectedoocytes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate1->Visible) { // StChDate1 ?>
		<!-- StChDate1 -->
		<td<?php echo $ivf_stimulation_chart->StChDate1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate2->Visible) { // StChDate2 ?>
		<!-- StChDate2 -->
		<td<?php echo $ivf_stimulation_chart->StChDate2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate3->Visible) { // StChDate3 ?>
		<!-- StChDate3 -->
		<td<?php echo $ivf_stimulation_chart->StChDate3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate4->Visible) { // StChDate4 ?>
		<!-- StChDate4 -->
		<td<?php echo $ivf_stimulation_chart->StChDate4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate5->Visible) { // StChDate5 ?>
		<!-- StChDate5 -->
		<td<?php echo $ivf_stimulation_chart->StChDate5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate6->Visible) { // StChDate6 ?>
		<!-- StChDate6 -->
		<td<?php echo $ivf_stimulation_chart->StChDate6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate7->Visible) { // StChDate7 ?>
		<!-- StChDate7 -->
		<td<?php echo $ivf_stimulation_chart->StChDate7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate8->Visible) { // StChDate8 ?>
		<!-- StChDate8 -->
		<td<?php echo $ivf_stimulation_chart->StChDate8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate9->Visible) { // StChDate9 ?>
		<!-- StChDate9 -->
		<td<?php echo $ivf_stimulation_chart->StChDate9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate10->Visible) { // StChDate10 ?>
		<!-- StChDate10 -->
		<td<?php echo $ivf_stimulation_chart->StChDate10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate11->Visible) { // StChDate11 ?>
		<!-- StChDate11 -->
		<td<?php echo $ivf_stimulation_chart->StChDate11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate12->Visible) { // StChDate12 ?>
		<!-- StChDate12 -->
		<td<?php echo $ivf_stimulation_chart->StChDate12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate13->Visible) { // StChDate13 ?>
		<!-- StChDate13 -->
		<td<?php echo $ivf_stimulation_chart->StChDate13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay1->Visible) { // CycleDay1 ?>
		<!-- CycleDay1 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay2->Visible) { // CycleDay2 ?>
		<!-- CycleDay2 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay3->Visible) { // CycleDay3 ?>
		<!-- CycleDay3 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay4->Visible) { // CycleDay4 ?>
		<!-- CycleDay4 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay5->Visible) { // CycleDay5 ?>
		<!-- CycleDay5 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay6->Visible) { // CycleDay6 ?>
		<!-- CycleDay6 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay7->Visible) { // CycleDay7 ?>
		<!-- CycleDay7 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay8->Visible) { // CycleDay8 ?>
		<!-- CycleDay8 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay9->Visible) { // CycleDay9 ?>
		<!-- CycleDay9 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay10->Visible) { // CycleDay10 ?>
		<!-- CycleDay10 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay11->Visible) { // CycleDay11 ?>
		<!-- CycleDay11 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay12->Visible) { // CycleDay12 ?>
		<!-- CycleDay12 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay13->Visible) { // CycleDay13 ?>
		<!-- CycleDay13 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay1->Visible) { // StimulationDay1 ?>
		<!-- StimulationDay1 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay2->Visible) { // StimulationDay2 ?>
		<!-- StimulationDay2 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay3->Visible) { // StimulationDay3 ?>
		<!-- StimulationDay3 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay4->Visible) { // StimulationDay4 ?>
		<!-- StimulationDay4 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay5->Visible) { // StimulationDay5 ?>
		<!-- StimulationDay5 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay6->Visible) { // StimulationDay6 ?>
		<!-- StimulationDay6 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay7->Visible) { // StimulationDay7 ?>
		<!-- StimulationDay7 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay8->Visible) { // StimulationDay8 ?>
		<!-- StimulationDay8 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay9->Visible) { // StimulationDay9 ?>
		<!-- StimulationDay9 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay10->Visible) { // StimulationDay10 ?>
		<!-- StimulationDay10 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay11->Visible) { // StimulationDay11 ?>
		<!-- StimulationDay11 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay12->Visible) { // StimulationDay12 ?>
		<!-- StimulationDay12 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay13->Visible) { // StimulationDay13 ?>
		<!-- StimulationDay13 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet1->Visible) { // Tablet1 ?>
		<!-- Tablet1 -->
		<td<?php echo $ivf_stimulation_chart->Tablet1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet2->Visible) { // Tablet2 ?>
		<!-- Tablet2 -->
		<td<?php echo $ivf_stimulation_chart->Tablet2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet3->Visible) { // Tablet3 ?>
		<!-- Tablet3 -->
		<td<?php echo $ivf_stimulation_chart->Tablet3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet4->Visible) { // Tablet4 ?>
		<!-- Tablet4 -->
		<td<?php echo $ivf_stimulation_chart->Tablet4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet5->Visible) { // Tablet5 ?>
		<!-- Tablet5 -->
		<td<?php echo $ivf_stimulation_chart->Tablet5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet6->Visible) { // Tablet6 ?>
		<!-- Tablet6 -->
		<td<?php echo $ivf_stimulation_chart->Tablet6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet7->Visible) { // Tablet7 ?>
		<!-- Tablet7 -->
		<td<?php echo $ivf_stimulation_chart->Tablet7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet8->Visible) { // Tablet8 ?>
		<!-- Tablet8 -->
		<td<?php echo $ivf_stimulation_chart->Tablet8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet9->Visible) { // Tablet9 ?>
		<!-- Tablet9 -->
		<td<?php echo $ivf_stimulation_chart->Tablet9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet10->Visible) { // Tablet10 ?>
		<!-- Tablet10 -->
		<td<?php echo $ivf_stimulation_chart->Tablet10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet11->Visible) { // Tablet11 ?>
		<!-- Tablet11 -->
		<td<?php echo $ivf_stimulation_chart->Tablet11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet12->Visible) { // Tablet12 ?>
		<!-- Tablet12 -->
		<td<?php echo $ivf_stimulation_chart->Tablet12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet13->Visible) { // Tablet13 ?>
		<!-- Tablet13 -->
		<td<?php echo $ivf_stimulation_chart->Tablet13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH1->Visible) { // RFSH1 ?>
		<!-- RFSH1 -->
		<td<?php echo $ivf_stimulation_chart->RFSH1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH2->Visible) { // RFSH2 ?>
		<!-- RFSH2 -->
		<td<?php echo $ivf_stimulation_chart->RFSH2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH3->Visible) { // RFSH3 ?>
		<!-- RFSH3 -->
		<td<?php echo $ivf_stimulation_chart->RFSH3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH4->Visible) { // RFSH4 ?>
		<!-- RFSH4 -->
		<td<?php echo $ivf_stimulation_chart->RFSH4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH5->Visible) { // RFSH5 ?>
		<!-- RFSH5 -->
		<td<?php echo $ivf_stimulation_chart->RFSH5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH6->Visible) { // RFSH6 ?>
		<!-- RFSH6 -->
		<td<?php echo $ivf_stimulation_chart->RFSH6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH7->Visible) { // RFSH7 ?>
		<!-- RFSH7 -->
		<td<?php echo $ivf_stimulation_chart->RFSH7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH8->Visible) { // RFSH8 ?>
		<!-- RFSH8 -->
		<td<?php echo $ivf_stimulation_chart->RFSH8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH9->Visible) { // RFSH9 ?>
		<!-- RFSH9 -->
		<td<?php echo $ivf_stimulation_chart->RFSH9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH10->Visible) { // RFSH10 ?>
		<!-- RFSH10 -->
		<td<?php echo $ivf_stimulation_chart->RFSH10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH11->Visible) { // RFSH11 ?>
		<!-- RFSH11 -->
		<td<?php echo $ivf_stimulation_chart->RFSH11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH12->Visible) { // RFSH12 ?>
		<!-- RFSH12 -->
		<td<?php echo $ivf_stimulation_chart->RFSH12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH13->Visible) { // RFSH13 ?>
		<!-- RFSH13 -->
		<td<?php echo $ivf_stimulation_chart->RFSH13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG1->Visible) { // HMG1 ?>
		<!-- HMG1 -->
		<td<?php echo $ivf_stimulation_chart->HMG1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG2->Visible) { // HMG2 ?>
		<!-- HMG2 -->
		<td<?php echo $ivf_stimulation_chart->HMG2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG3->Visible) { // HMG3 ?>
		<!-- HMG3 -->
		<td<?php echo $ivf_stimulation_chart->HMG3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG4->Visible) { // HMG4 ?>
		<!-- HMG4 -->
		<td<?php echo $ivf_stimulation_chart->HMG4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG5->Visible) { // HMG5 ?>
		<!-- HMG5 -->
		<td<?php echo $ivf_stimulation_chart->HMG5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG6->Visible) { // HMG6 ?>
		<!-- HMG6 -->
		<td<?php echo $ivf_stimulation_chart->HMG6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG7->Visible) { // HMG7 ?>
		<!-- HMG7 -->
		<td<?php echo $ivf_stimulation_chart->HMG7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG8->Visible) { // HMG8 ?>
		<!-- HMG8 -->
		<td<?php echo $ivf_stimulation_chart->HMG8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG9->Visible) { // HMG9 ?>
		<!-- HMG9 -->
		<td<?php echo $ivf_stimulation_chart->HMG9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG10->Visible) { // HMG10 ?>
		<!-- HMG10 -->
		<td<?php echo $ivf_stimulation_chart->HMG10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG11->Visible) { // HMG11 ?>
		<!-- HMG11 -->
		<td<?php echo $ivf_stimulation_chart->HMG11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG12->Visible) { // HMG12 ?>
		<!-- HMG12 -->
		<td<?php echo $ivf_stimulation_chart->HMG12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG13->Visible) { // HMG13 ?>
		<!-- HMG13 -->
		<td<?php echo $ivf_stimulation_chart->HMG13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH1->Visible) { // GnRH1 ?>
		<!-- GnRH1 -->
		<td<?php echo $ivf_stimulation_chart->GnRH1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH2->Visible) { // GnRH2 ?>
		<!-- GnRH2 -->
		<td<?php echo $ivf_stimulation_chart->GnRH2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH3->Visible) { // GnRH3 ?>
		<!-- GnRH3 -->
		<td<?php echo $ivf_stimulation_chart->GnRH3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH4->Visible) { // GnRH4 ?>
		<!-- GnRH4 -->
		<td<?php echo $ivf_stimulation_chart->GnRH4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH5->Visible) { // GnRH5 ?>
		<!-- GnRH5 -->
		<td<?php echo $ivf_stimulation_chart->GnRH5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH6->Visible) { // GnRH6 ?>
		<!-- GnRH6 -->
		<td<?php echo $ivf_stimulation_chart->GnRH6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH7->Visible) { // GnRH7 ?>
		<!-- GnRH7 -->
		<td<?php echo $ivf_stimulation_chart->GnRH7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH8->Visible) { // GnRH8 ?>
		<!-- GnRH8 -->
		<td<?php echo $ivf_stimulation_chart->GnRH8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH9->Visible) { // GnRH9 ?>
		<!-- GnRH9 -->
		<td<?php echo $ivf_stimulation_chart->GnRH9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH10->Visible) { // GnRH10 ?>
		<!-- GnRH10 -->
		<td<?php echo $ivf_stimulation_chart->GnRH10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH11->Visible) { // GnRH11 ?>
		<!-- GnRH11 -->
		<td<?php echo $ivf_stimulation_chart->GnRH11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH12->Visible) { // GnRH12 ?>
		<!-- GnRH12 -->
		<td<?php echo $ivf_stimulation_chart->GnRH12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH13->Visible) { // GnRH13 ?>
		<!-- GnRH13 -->
		<td<?php echo $ivf_stimulation_chart->GnRH13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E21->Visible) { // E21 ?>
		<!-- E21 -->
		<td<?php echo $ivf_stimulation_chart->E21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E22->Visible) { // E22 ?>
		<!-- E22 -->
		<td<?php echo $ivf_stimulation_chart->E22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E23->Visible) { // E23 ?>
		<!-- E23 -->
		<td<?php echo $ivf_stimulation_chart->E23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E24->Visible) { // E24 ?>
		<!-- E24 -->
		<td<?php echo $ivf_stimulation_chart->E24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E25->Visible) { // E25 ?>
		<!-- E25 -->
		<td<?php echo $ivf_stimulation_chart->E25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E26->Visible) { // E26 ?>
		<!-- E26 -->
		<td<?php echo $ivf_stimulation_chart->E26->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E26->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E26->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E27->Visible) { // E27 ?>
		<!-- E27 -->
		<td<?php echo $ivf_stimulation_chart->E27->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E27->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E27->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E28->Visible) { // E28 ?>
		<!-- E28 -->
		<td<?php echo $ivf_stimulation_chart->E28->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E28->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E28->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E29->Visible) { // E29 ?>
		<!-- E29 -->
		<td<?php echo $ivf_stimulation_chart->E29->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E29->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E29->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E210->Visible) { // E210 ?>
		<!-- E210 -->
		<td<?php echo $ivf_stimulation_chart->E210->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E210->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E210->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E211->Visible) { // E211 ?>
		<!-- E211 -->
		<td<?php echo $ivf_stimulation_chart->E211->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E211->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E211->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E212->Visible) { // E212 ?>
		<!-- E212 -->
		<td<?php echo $ivf_stimulation_chart->E212->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E212->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E212->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E213->Visible) { // E213 ?>
		<!-- E213 -->
		<td<?php echo $ivf_stimulation_chart->E213->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E213->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E213->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P41->Visible) { // P41 ?>
		<!-- P41 -->
		<td<?php echo $ivf_stimulation_chart->P41->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P41->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P41->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P42->Visible) { // P42 ?>
		<!-- P42 -->
		<td<?php echo $ivf_stimulation_chart->P42->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P42->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P42->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P43->Visible) { // P43 ?>
		<!-- P43 -->
		<td<?php echo $ivf_stimulation_chart->P43->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P43->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P43->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P44->Visible) { // P44 ?>
		<!-- P44 -->
		<td<?php echo $ivf_stimulation_chart->P44->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P44->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P44->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P45->Visible) { // P45 ?>
		<!-- P45 -->
		<td<?php echo $ivf_stimulation_chart->P45->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P45->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P45->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P46->Visible) { // P46 ?>
		<!-- P46 -->
		<td<?php echo $ivf_stimulation_chart->P46->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P46->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P46->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P47->Visible) { // P47 ?>
		<!-- P47 -->
		<td<?php echo $ivf_stimulation_chart->P47->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P47->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P47->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P48->Visible) { // P48 ?>
		<!-- P48 -->
		<td<?php echo $ivf_stimulation_chart->P48->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P48->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P48->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P49->Visible) { // P49 ?>
		<!-- P49 -->
		<td<?php echo $ivf_stimulation_chart->P49->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P49->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P49->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P410->Visible) { // P410 ?>
		<!-- P410 -->
		<td<?php echo $ivf_stimulation_chart->P410->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P410->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P410->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P411->Visible) { // P411 ?>
		<!-- P411 -->
		<td<?php echo $ivf_stimulation_chart->P411->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P411->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P411->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P412->Visible) { // P412 ?>
		<!-- P412 -->
		<td<?php echo $ivf_stimulation_chart->P412->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P412->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P412->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P413->Visible) { // P413 ?>
		<!-- P413 -->
		<td<?php echo $ivf_stimulation_chart->P413->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P413->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P413->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt1->Visible) { // USGRt1 ?>
		<!-- USGRt1 -->
		<td<?php echo $ivf_stimulation_chart->USGRt1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt2->Visible) { // USGRt2 ?>
		<!-- USGRt2 -->
		<td<?php echo $ivf_stimulation_chart->USGRt2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt3->Visible) { // USGRt3 ?>
		<!-- USGRt3 -->
		<td<?php echo $ivf_stimulation_chart->USGRt3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt4->Visible) { // USGRt4 ?>
		<!-- USGRt4 -->
		<td<?php echo $ivf_stimulation_chart->USGRt4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt5->Visible) { // USGRt5 ?>
		<!-- USGRt5 -->
		<td<?php echo $ivf_stimulation_chart->USGRt5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt6->Visible) { // USGRt6 ?>
		<!-- USGRt6 -->
		<td<?php echo $ivf_stimulation_chart->USGRt6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt7->Visible) { // USGRt7 ?>
		<!-- USGRt7 -->
		<td<?php echo $ivf_stimulation_chart->USGRt7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt8->Visible) { // USGRt8 ?>
		<!-- USGRt8 -->
		<td<?php echo $ivf_stimulation_chart->USGRt8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt9->Visible) { // USGRt9 ?>
		<!-- USGRt9 -->
		<td<?php echo $ivf_stimulation_chart->USGRt9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt10->Visible) { // USGRt10 ?>
		<!-- USGRt10 -->
		<td<?php echo $ivf_stimulation_chart->USGRt10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt11->Visible) { // USGRt11 ?>
		<!-- USGRt11 -->
		<td<?php echo $ivf_stimulation_chart->USGRt11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt12->Visible) { // USGRt12 ?>
		<!-- USGRt12 -->
		<td<?php echo $ivf_stimulation_chart->USGRt12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt13->Visible) { // USGRt13 ?>
		<!-- USGRt13 -->
		<td<?php echo $ivf_stimulation_chart->USGRt13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt1->Visible) { // USGLt1 ?>
		<!-- USGLt1 -->
		<td<?php echo $ivf_stimulation_chart->USGLt1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt2->Visible) { // USGLt2 ?>
		<!-- USGLt2 -->
		<td<?php echo $ivf_stimulation_chart->USGLt2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt3->Visible) { // USGLt3 ?>
		<!-- USGLt3 -->
		<td<?php echo $ivf_stimulation_chart->USGLt3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt4->Visible) { // USGLt4 ?>
		<!-- USGLt4 -->
		<td<?php echo $ivf_stimulation_chart->USGLt4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt5->Visible) { // USGLt5 ?>
		<!-- USGLt5 -->
		<td<?php echo $ivf_stimulation_chart->USGLt5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt6->Visible) { // USGLt6 ?>
		<!-- USGLt6 -->
		<td<?php echo $ivf_stimulation_chart->USGLt6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt7->Visible) { // USGLt7 ?>
		<!-- USGLt7 -->
		<td<?php echo $ivf_stimulation_chart->USGLt7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt8->Visible) { // USGLt8 ?>
		<!-- USGLt8 -->
		<td<?php echo $ivf_stimulation_chart->USGLt8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt9->Visible) { // USGLt9 ?>
		<!-- USGLt9 -->
		<td<?php echo $ivf_stimulation_chart->USGLt9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt10->Visible) { // USGLt10 ?>
		<!-- USGLt10 -->
		<td<?php echo $ivf_stimulation_chart->USGLt10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt11->Visible) { // USGLt11 ?>
		<!-- USGLt11 -->
		<td<?php echo $ivf_stimulation_chart->USGLt11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt12->Visible) { // USGLt12 ?>
		<!-- USGLt12 -->
		<td<?php echo $ivf_stimulation_chart->USGLt12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt13->Visible) { // USGLt13 ?>
		<!-- USGLt13 -->
		<td<?php echo $ivf_stimulation_chart->USGLt13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM1->Visible) { // EM1 ?>
		<!-- EM1 -->
		<td<?php echo $ivf_stimulation_chart->EM1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM2->Visible) { // EM2 ?>
		<!-- EM2 -->
		<td<?php echo $ivf_stimulation_chart->EM2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM3->Visible) { // EM3 ?>
		<!-- EM3 -->
		<td<?php echo $ivf_stimulation_chart->EM3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM4->Visible) { // EM4 ?>
		<!-- EM4 -->
		<td<?php echo $ivf_stimulation_chart->EM4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM5->Visible) { // EM5 ?>
		<!-- EM5 -->
		<td<?php echo $ivf_stimulation_chart->EM5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM6->Visible) { // EM6 ?>
		<!-- EM6 -->
		<td<?php echo $ivf_stimulation_chart->EM6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM7->Visible) { // EM7 ?>
		<!-- EM7 -->
		<td<?php echo $ivf_stimulation_chart->EM7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM8->Visible) { // EM8 ?>
		<!-- EM8 -->
		<td<?php echo $ivf_stimulation_chart->EM8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM9->Visible) { // EM9 ?>
		<!-- EM9 -->
		<td<?php echo $ivf_stimulation_chart->EM9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM10->Visible) { // EM10 ?>
		<!-- EM10 -->
		<td<?php echo $ivf_stimulation_chart->EM10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM11->Visible) { // EM11 ?>
		<!-- EM11 -->
		<td<?php echo $ivf_stimulation_chart->EM11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM12->Visible) { // EM12 ?>
		<!-- EM12 -->
		<td<?php echo $ivf_stimulation_chart->EM12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM13->Visible) { // EM13 ?>
		<!-- EM13 -->
		<td<?php echo $ivf_stimulation_chart->EM13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others1->Visible) { // Others1 ?>
		<!-- Others1 -->
		<td<?php echo $ivf_stimulation_chart->Others1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others2->Visible) { // Others2 ?>
		<!-- Others2 -->
		<td<?php echo $ivf_stimulation_chart->Others2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others3->Visible) { // Others3 ?>
		<!-- Others3 -->
		<td<?php echo $ivf_stimulation_chart->Others3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others4->Visible) { // Others4 ?>
		<!-- Others4 -->
		<td<?php echo $ivf_stimulation_chart->Others4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others5->Visible) { // Others5 ?>
		<!-- Others5 -->
		<td<?php echo $ivf_stimulation_chart->Others5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others6->Visible) { // Others6 ?>
		<!-- Others6 -->
		<td<?php echo $ivf_stimulation_chart->Others6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others7->Visible) { // Others7 ?>
		<!-- Others7 -->
		<td<?php echo $ivf_stimulation_chart->Others7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others8->Visible) { // Others8 ?>
		<!-- Others8 -->
		<td<?php echo $ivf_stimulation_chart->Others8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others9->Visible) { // Others9 ?>
		<!-- Others9 -->
		<td<?php echo $ivf_stimulation_chart->Others9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others10->Visible) { // Others10 ?>
		<!-- Others10 -->
		<td<?php echo $ivf_stimulation_chart->Others10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others11->Visible) { // Others11 ?>
		<!-- Others11 -->
		<td<?php echo $ivf_stimulation_chart->Others11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others12->Visible) { // Others12 ?>
		<!-- Others12 -->
		<td<?php echo $ivf_stimulation_chart->Others12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others13->Visible) { // Others13 ?>
		<!-- Others13 -->
		<td<?php echo $ivf_stimulation_chart->Others13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR1->Visible) { // DR1 ?>
		<!-- DR1 -->
		<td<?php echo $ivf_stimulation_chart->DR1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR2->Visible) { // DR2 ?>
		<!-- DR2 -->
		<td<?php echo $ivf_stimulation_chart->DR2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR3->Visible) { // DR3 ?>
		<!-- DR3 -->
		<td<?php echo $ivf_stimulation_chart->DR3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR4->Visible) { // DR4 ?>
		<!-- DR4 -->
		<td<?php echo $ivf_stimulation_chart->DR4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR5->Visible) { // DR5 ?>
		<!-- DR5 -->
		<td<?php echo $ivf_stimulation_chart->DR5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR6->Visible) { // DR6 ?>
		<!-- DR6 -->
		<td<?php echo $ivf_stimulation_chart->DR6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR7->Visible) { // DR7 ?>
		<!-- DR7 -->
		<td<?php echo $ivf_stimulation_chart->DR7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR8->Visible) { // DR8 ?>
		<!-- DR8 -->
		<td<?php echo $ivf_stimulation_chart->DR8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR9->Visible) { // DR9 ?>
		<!-- DR9 -->
		<td<?php echo $ivf_stimulation_chart->DR9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR10->Visible) { // DR10 ?>
		<!-- DR10 -->
		<td<?php echo $ivf_stimulation_chart->DR10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR11->Visible) { // DR11 ?>
		<!-- DR11 -->
		<td<?php echo $ivf_stimulation_chart->DR11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR12->Visible) { // DR12 ?>
		<!-- DR12 -->
		<td<?php echo $ivf_stimulation_chart->DR12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR13->Visible) { // DR13 ?>
		<!-- DR13 -->
		<td<?php echo $ivf_stimulation_chart->DR13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_stimulation_chart->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Convert->Visible) { // Convert ?>
		<!-- Convert -->
		<td<?php echo $ivf_stimulation_chart->Convert->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Convert->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Convert->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Consultant->Visible) { // Consultant ?>
		<!-- Consultant -->
		<td<?php echo $ivf_stimulation_chart->Consultant->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Consultant->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<!-- InseminatinTechnique -->
		<td<?php echo $ivf_stimulation_chart->InseminatinTechnique->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->InseminatinTechnique->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->IndicationForART->Visible) { // IndicationForART ?>
		<!-- IndicationForART -->
		<td<?php echo $ivf_stimulation_chart->IndicationForART->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->IndicationForART->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<!-- Hysteroscopy -->
		<td<?php echo $ivf_stimulation_chart->Hysteroscopy->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Hysteroscopy->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Hysteroscopy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<!-- EndometrialScratching -->
		<td<?php echo $ivf_stimulation_chart->EndometrialScratching->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EndometrialScratching->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EndometrialScratching->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<!-- TrialCannulation -->
		<td<?php echo $ivf_stimulation_chart->TrialCannulation->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TrialCannulation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<!-- CYCLETYPE -->
		<td<?php echo $ivf_stimulation_chart->CYCLETYPE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CYCLETYPE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CYCLETYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<!-- HRTCYCLE -->
		<td<?php echo $ivf_stimulation_chart->HRTCYCLE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HRTCYCLE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HRTCYCLE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<!-- OralEstrogenDosage -->
		<td<?php echo $ivf_stimulation_chart->OralEstrogenDosage->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->OralEstrogenDosage->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OralEstrogenDosage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<!-- VaginalEstrogen -->
		<td<?php echo $ivf_stimulation_chart->VaginalEstrogen->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->VaginalEstrogen->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->VaginalEstrogen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GCSF->Visible) { // GCSF ?>
		<!-- GCSF -->
		<td<?php echo $ivf_stimulation_chart->GCSF->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GCSF->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GCSF->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<!-- ActivatedPRP -->
		<td<?php echo $ivf_stimulation_chart->ActivatedPRP->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ActivatedPRP->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ActivatedPRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->UCLcm->Visible) { // UCLcm ?>
		<!-- UCLcm -->
		<td<?php echo $ivf_stimulation_chart->UCLcm->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->UCLcm->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->UCLcm->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
		<!-- DATOFEMBRYOTRANSFER -->
		<td<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<!-- DAYOFEMBRYOTRANSFER -->
		<td<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<!-- NOOFEMBRYOSTHAWED -->
		<td<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<!-- NOOFEMBRYOSTRANSFERRED -->
		<td<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<!-- DAYOFEMBRYOS -->
		<td<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<!-- CRYOPRESERVEDEMBRYOS -->
		<td<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaAdmin->Visible) { // ViaAdmin ?>
		<!-- ViaAdmin -->
		<td<?php echo $ivf_stimulation_chart->ViaAdmin->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ViaAdmin->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaAdmin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
		<!-- ViaStartDateTime -->
		<td<?php echo $ivf_stimulation_chart->ViaStartDateTime->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ViaStartDateTime->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaStartDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaDose->Visible) { // ViaDose ?>
		<!-- ViaDose -->
		<td<?php echo $ivf_stimulation_chart->ViaDose->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ViaDose->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaDose->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->AllFreeze->Visible) { // AllFreeze ?>
		<!-- AllFreeze -->
		<td<?php echo $ivf_stimulation_chart->AllFreeze->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->AllFreeze->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AllFreeze->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TreatmentCancel->Visible) { // TreatmentCancel ?>
		<!-- TreatmentCancel -->
		<td<?php echo $ivf_stimulation_chart->TreatmentCancel->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->TreatmentCancel->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TreatmentCancel->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
		<!-- ProgesteroneAdmin -->
		<td<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
		<!-- ProgesteroneStart -->
		<td<?php echo $ivf_stimulation_chart->ProgesteroneStart->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ProgesteroneStart->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneStart->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
		<!-- ProgesteroneDose -->
		<td<?php echo $ivf_stimulation_chart->ProgesteroneDose->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ProgesteroneDose->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneDose->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate14->Visible) { // StChDate14 ?>
		<!-- StChDate14 -->
		<td<?php echo $ivf_stimulation_chart->StChDate14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate15->Visible) { // StChDate15 ?>
		<!-- StChDate15 -->
		<td<?php echo $ivf_stimulation_chart->StChDate15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate16->Visible) { // StChDate16 ?>
		<!-- StChDate16 -->
		<td<?php echo $ivf_stimulation_chart->StChDate16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate17->Visible) { // StChDate17 ?>
		<!-- StChDate17 -->
		<td<?php echo $ivf_stimulation_chart->StChDate17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate18->Visible) { // StChDate18 ?>
		<!-- StChDate18 -->
		<td<?php echo $ivf_stimulation_chart->StChDate18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate19->Visible) { // StChDate19 ?>
		<!-- StChDate19 -->
		<td<?php echo $ivf_stimulation_chart->StChDate19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate20->Visible) { // StChDate20 ?>
		<!-- StChDate20 -->
		<td<?php echo $ivf_stimulation_chart->StChDate20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate21->Visible) { // StChDate21 ?>
		<!-- StChDate21 -->
		<td<?php echo $ivf_stimulation_chart->StChDate21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate22->Visible) { // StChDate22 ?>
		<!-- StChDate22 -->
		<td<?php echo $ivf_stimulation_chart->StChDate22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate23->Visible) { // StChDate23 ?>
		<!-- StChDate23 -->
		<td<?php echo $ivf_stimulation_chart->StChDate23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate24->Visible) { // StChDate24 ?>
		<!-- StChDate24 -->
		<td<?php echo $ivf_stimulation_chart->StChDate24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate25->Visible) { // StChDate25 ?>
		<!-- StChDate25 -->
		<td<?php echo $ivf_stimulation_chart->StChDate25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StChDate25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay14->Visible) { // CycleDay14 ?>
		<!-- CycleDay14 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay15->Visible) { // CycleDay15 ?>
		<!-- CycleDay15 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay16->Visible) { // CycleDay16 ?>
		<!-- CycleDay16 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay17->Visible) { // CycleDay17 ?>
		<!-- CycleDay17 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay18->Visible) { // CycleDay18 ?>
		<!-- CycleDay18 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay19->Visible) { // CycleDay19 ?>
		<!-- CycleDay19 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay20->Visible) { // CycleDay20 ?>
		<!-- CycleDay20 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay21->Visible) { // CycleDay21 ?>
		<!-- CycleDay21 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay22->Visible) { // CycleDay22 ?>
		<!-- CycleDay22 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay23->Visible) { // CycleDay23 ?>
		<!-- CycleDay23 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay24->Visible) { // CycleDay24 ?>
		<!-- CycleDay24 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay25->Visible) { // CycleDay25 ?>
		<!-- CycleDay25 -->
		<td<?php echo $ivf_stimulation_chart->CycleDay25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->CycleDay25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay14->Visible) { // StimulationDay14 ?>
		<!-- StimulationDay14 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay15->Visible) { // StimulationDay15 ?>
		<!-- StimulationDay15 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay16->Visible) { // StimulationDay16 ?>
		<!-- StimulationDay16 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay17->Visible) { // StimulationDay17 ?>
		<!-- StimulationDay17 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay18->Visible) { // StimulationDay18 ?>
		<!-- StimulationDay18 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay19->Visible) { // StimulationDay19 ?>
		<!-- StimulationDay19 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay20->Visible) { // StimulationDay20 ?>
		<!-- StimulationDay20 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay21->Visible) { // StimulationDay21 ?>
		<!-- StimulationDay21 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay22->Visible) { // StimulationDay22 ?>
		<!-- StimulationDay22 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay23->Visible) { // StimulationDay23 ?>
		<!-- StimulationDay23 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay24->Visible) { // StimulationDay24 ?>
		<!-- StimulationDay24 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay25->Visible) { // StimulationDay25 ?>
		<!-- StimulationDay25 -->
		<td<?php echo $ivf_stimulation_chart->StimulationDay25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->StimulationDay25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet14->Visible) { // Tablet14 ?>
		<!-- Tablet14 -->
		<td<?php echo $ivf_stimulation_chart->Tablet14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet15->Visible) { // Tablet15 ?>
		<!-- Tablet15 -->
		<td<?php echo $ivf_stimulation_chart->Tablet15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet16->Visible) { // Tablet16 ?>
		<!-- Tablet16 -->
		<td<?php echo $ivf_stimulation_chart->Tablet16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet17->Visible) { // Tablet17 ?>
		<!-- Tablet17 -->
		<td<?php echo $ivf_stimulation_chart->Tablet17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet18->Visible) { // Tablet18 ?>
		<!-- Tablet18 -->
		<td<?php echo $ivf_stimulation_chart->Tablet18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet19->Visible) { // Tablet19 ?>
		<!-- Tablet19 -->
		<td<?php echo $ivf_stimulation_chart->Tablet19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet20->Visible) { // Tablet20 ?>
		<!-- Tablet20 -->
		<td<?php echo $ivf_stimulation_chart->Tablet20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet21->Visible) { // Tablet21 ?>
		<!-- Tablet21 -->
		<td<?php echo $ivf_stimulation_chart->Tablet21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet22->Visible) { // Tablet22 ?>
		<!-- Tablet22 -->
		<td<?php echo $ivf_stimulation_chart->Tablet22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet23->Visible) { // Tablet23 ?>
		<!-- Tablet23 -->
		<td<?php echo $ivf_stimulation_chart->Tablet23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet24->Visible) { // Tablet24 ?>
		<!-- Tablet24 -->
		<td<?php echo $ivf_stimulation_chart->Tablet24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet25->Visible) { // Tablet25 ?>
		<!-- Tablet25 -->
		<td<?php echo $ivf_stimulation_chart->Tablet25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Tablet25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH14->Visible) { // RFSH14 ?>
		<!-- RFSH14 -->
		<td<?php echo $ivf_stimulation_chart->RFSH14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH15->Visible) { // RFSH15 ?>
		<!-- RFSH15 -->
		<td<?php echo $ivf_stimulation_chart->RFSH15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH16->Visible) { // RFSH16 ?>
		<!-- RFSH16 -->
		<td<?php echo $ivf_stimulation_chart->RFSH16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH17->Visible) { // RFSH17 ?>
		<!-- RFSH17 -->
		<td<?php echo $ivf_stimulation_chart->RFSH17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH18->Visible) { // RFSH18 ?>
		<!-- RFSH18 -->
		<td<?php echo $ivf_stimulation_chart->RFSH18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH19->Visible) { // RFSH19 ?>
		<!-- RFSH19 -->
		<td<?php echo $ivf_stimulation_chart->RFSH19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH20->Visible) { // RFSH20 ?>
		<!-- RFSH20 -->
		<td<?php echo $ivf_stimulation_chart->RFSH20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH21->Visible) { // RFSH21 ?>
		<!-- RFSH21 -->
		<td<?php echo $ivf_stimulation_chart->RFSH21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH22->Visible) { // RFSH22 ?>
		<!-- RFSH22 -->
		<td<?php echo $ivf_stimulation_chart->RFSH22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH23->Visible) { // RFSH23 ?>
		<!-- RFSH23 -->
		<td<?php echo $ivf_stimulation_chart->RFSH23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH24->Visible) { // RFSH24 ?>
		<!-- RFSH24 -->
		<td<?php echo $ivf_stimulation_chart->RFSH24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH25->Visible) { // RFSH25 ?>
		<!-- RFSH25 -->
		<td<?php echo $ivf_stimulation_chart->RFSH25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->RFSH25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG14->Visible) { // HMG14 ?>
		<!-- HMG14 -->
		<td<?php echo $ivf_stimulation_chart->HMG14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG15->Visible) { // HMG15 ?>
		<!-- HMG15 -->
		<td<?php echo $ivf_stimulation_chart->HMG15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG16->Visible) { // HMG16 ?>
		<!-- HMG16 -->
		<td<?php echo $ivf_stimulation_chart->HMG16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG17->Visible) { // HMG17 ?>
		<!-- HMG17 -->
		<td<?php echo $ivf_stimulation_chart->HMG17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG18->Visible) { // HMG18 ?>
		<!-- HMG18 -->
		<td<?php echo $ivf_stimulation_chart->HMG18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG19->Visible) { // HMG19 ?>
		<!-- HMG19 -->
		<td<?php echo $ivf_stimulation_chart->HMG19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG20->Visible) { // HMG20 ?>
		<!-- HMG20 -->
		<td<?php echo $ivf_stimulation_chart->HMG20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG21->Visible) { // HMG21 ?>
		<!-- HMG21 -->
		<td<?php echo $ivf_stimulation_chart->HMG21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG22->Visible) { // HMG22 ?>
		<!-- HMG22 -->
		<td<?php echo $ivf_stimulation_chart->HMG22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG23->Visible) { // HMG23 ?>
		<!-- HMG23 -->
		<td<?php echo $ivf_stimulation_chart->HMG23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG24->Visible) { // HMG24 ?>
		<!-- HMG24 -->
		<td<?php echo $ivf_stimulation_chart->HMG24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG25->Visible) { // HMG25 ?>
		<!-- HMG25 -->
		<td<?php echo $ivf_stimulation_chart->HMG25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HMG25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH14->Visible) { // GnRH14 ?>
		<!-- GnRH14 -->
		<td<?php echo $ivf_stimulation_chart->GnRH14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH15->Visible) { // GnRH15 ?>
		<!-- GnRH15 -->
		<td<?php echo $ivf_stimulation_chart->GnRH15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH16->Visible) { // GnRH16 ?>
		<!-- GnRH16 -->
		<td<?php echo $ivf_stimulation_chart->GnRH16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH17->Visible) { // GnRH17 ?>
		<!-- GnRH17 -->
		<td<?php echo $ivf_stimulation_chart->GnRH17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH18->Visible) { // GnRH18 ?>
		<!-- GnRH18 -->
		<td<?php echo $ivf_stimulation_chart->GnRH18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH19->Visible) { // GnRH19 ?>
		<!-- GnRH19 -->
		<td<?php echo $ivf_stimulation_chart->GnRH19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH20->Visible) { // GnRH20 ?>
		<!-- GnRH20 -->
		<td<?php echo $ivf_stimulation_chart->GnRH20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH21->Visible) { // GnRH21 ?>
		<!-- GnRH21 -->
		<td<?php echo $ivf_stimulation_chart->GnRH21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH22->Visible) { // GnRH22 ?>
		<!-- GnRH22 -->
		<td<?php echo $ivf_stimulation_chart->GnRH22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH23->Visible) { // GnRH23 ?>
		<!-- GnRH23 -->
		<td<?php echo $ivf_stimulation_chart->GnRH23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH24->Visible) { // GnRH24 ?>
		<!-- GnRH24 -->
		<td<?php echo $ivf_stimulation_chart->GnRH24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH25->Visible) { // GnRH25 ?>
		<!-- GnRH25 -->
		<td<?php echo $ivf_stimulation_chart->GnRH25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->GnRH25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P414->Visible) { // P414 ?>
		<!-- P414 -->
		<td<?php echo $ivf_stimulation_chart->P414->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P414->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P414->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P415->Visible) { // P415 ?>
		<!-- P415 -->
		<td<?php echo $ivf_stimulation_chart->P415->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P415->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P415->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P416->Visible) { // P416 ?>
		<!-- P416 -->
		<td<?php echo $ivf_stimulation_chart->P416->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P416->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P416->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P417->Visible) { // P417 ?>
		<!-- P417 -->
		<td<?php echo $ivf_stimulation_chart->P417->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P417->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P417->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P418->Visible) { // P418 ?>
		<!-- P418 -->
		<td<?php echo $ivf_stimulation_chart->P418->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P418->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P418->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P419->Visible) { // P419 ?>
		<!-- P419 -->
		<td<?php echo $ivf_stimulation_chart->P419->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P419->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P419->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P420->Visible) { // P420 ?>
		<!-- P420 -->
		<td<?php echo $ivf_stimulation_chart->P420->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P420->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P420->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P421->Visible) { // P421 ?>
		<!-- P421 -->
		<td<?php echo $ivf_stimulation_chart->P421->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P421->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P421->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P422->Visible) { // P422 ?>
		<!-- P422 -->
		<td<?php echo $ivf_stimulation_chart->P422->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P422->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P422->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P423->Visible) { // P423 ?>
		<!-- P423 -->
		<td<?php echo $ivf_stimulation_chart->P423->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P423->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P423->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P424->Visible) { // P424 ?>
		<!-- P424 -->
		<td<?php echo $ivf_stimulation_chart->P424->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P424->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P424->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P425->Visible) { // P425 ?>
		<!-- P425 -->
		<td<?php echo $ivf_stimulation_chart->P425->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->P425->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P425->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt14->Visible) { // USGRt14 ?>
		<!-- USGRt14 -->
		<td<?php echo $ivf_stimulation_chart->USGRt14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt15->Visible) { // USGRt15 ?>
		<!-- USGRt15 -->
		<td<?php echo $ivf_stimulation_chart->USGRt15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt16->Visible) { // USGRt16 ?>
		<!-- USGRt16 -->
		<td<?php echo $ivf_stimulation_chart->USGRt16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt17->Visible) { // USGRt17 ?>
		<!-- USGRt17 -->
		<td<?php echo $ivf_stimulation_chart->USGRt17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt18->Visible) { // USGRt18 ?>
		<!-- USGRt18 -->
		<td<?php echo $ivf_stimulation_chart->USGRt18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt19->Visible) { // USGRt19 ?>
		<!-- USGRt19 -->
		<td<?php echo $ivf_stimulation_chart->USGRt19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt20->Visible) { // USGRt20 ?>
		<!-- USGRt20 -->
		<td<?php echo $ivf_stimulation_chart->USGRt20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt21->Visible) { // USGRt21 ?>
		<!-- USGRt21 -->
		<td<?php echo $ivf_stimulation_chart->USGRt21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt22->Visible) { // USGRt22 ?>
		<!-- USGRt22 -->
		<td<?php echo $ivf_stimulation_chart->USGRt22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt23->Visible) { // USGRt23 ?>
		<!-- USGRt23 -->
		<td<?php echo $ivf_stimulation_chart->USGRt23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt24->Visible) { // USGRt24 ?>
		<!-- USGRt24 -->
		<td<?php echo $ivf_stimulation_chart->USGRt24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt25->Visible) { // USGRt25 ?>
		<!-- USGRt25 -->
		<td<?php echo $ivf_stimulation_chart->USGRt25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGRt25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt14->Visible) { // USGLt14 ?>
		<!-- USGLt14 -->
		<td<?php echo $ivf_stimulation_chart->USGLt14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt15->Visible) { // USGLt15 ?>
		<!-- USGLt15 -->
		<td<?php echo $ivf_stimulation_chart->USGLt15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt16->Visible) { // USGLt16 ?>
		<!-- USGLt16 -->
		<td<?php echo $ivf_stimulation_chart->USGLt16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt17->Visible) { // USGLt17 ?>
		<!-- USGLt17 -->
		<td<?php echo $ivf_stimulation_chart->USGLt17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt18->Visible) { // USGLt18 ?>
		<!-- USGLt18 -->
		<td<?php echo $ivf_stimulation_chart->USGLt18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt19->Visible) { // USGLt19 ?>
		<!-- USGLt19 -->
		<td<?php echo $ivf_stimulation_chart->USGLt19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt20->Visible) { // USGLt20 ?>
		<!-- USGLt20 -->
		<td<?php echo $ivf_stimulation_chart->USGLt20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt21->Visible) { // USGLt21 ?>
		<!-- USGLt21 -->
		<td<?php echo $ivf_stimulation_chart->USGLt21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt22->Visible) { // USGLt22 ?>
		<!-- USGLt22 -->
		<td<?php echo $ivf_stimulation_chart->USGLt22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt23->Visible) { // USGLt23 ?>
		<!-- USGLt23 -->
		<td<?php echo $ivf_stimulation_chart->USGLt23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt24->Visible) { // USGLt24 ?>
		<!-- USGLt24 -->
		<td<?php echo $ivf_stimulation_chart->USGLt24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt25->Visible) { // USGLt25 ?>
		<!-- USGLt25 -->
		<td<?php echo $ivf_stimulation_chart->USGLt25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->USGLt25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM14->Visible) { // EM14 ?>
		<!-- EM14 -->
		<td<?php echo $ivf_stimulation_chart->EM14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM15->Visible) { // EM15 ?>
		<!-- EM15 -->
		<td<?php echo $ivf_stimulation_chart->EM15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM16->Visible) { // EM16 ?>
		<!-- EM16 -->
		<td<?php echo $ivf_stimulation_chart->EM16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM17->Visible) { // EM17 ?>
		<!-- EM17 -->
		<td<?php echo $ivf_stimulation_chart->EM17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM18->Visible) { // EM18 ?>
		<!-- EM18 -->
		<td<?php echo $ivf_stimulation_chart->EM18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM19->Visible) { // EM19 ?>
		<!-- EM19 -->
		<td<?php echo $ivf_stimulation_chart->EM19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM20->Visible) { // EM20 ?>
		<!-- EM20 -->
		<td<?php echo $ivf_stimulation_chart->EM20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM21->Visible) { // EM21 ?>
		<!-- EM21 -->
		<td<?php echo $ivf_stimulation_chart->EM21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM22->Visible) { // EM22 ?>
		<!-- EM22 -->
		<td<?php echo $ivf_stimulation_chart->EM22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM23->Visible) { // EM23 ?>
		<!-- EM23 -->
		<td<?php echo $ivf_stimulation_chart->EM23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM24->Visible) { // EM24 ?>
		<!-- EM24 -->
		<td<?php echo $ivf_stimulation_chart->EM24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM25->Visible) { // EM25 ?>
		<!-- EM25 -->
		<td<?php echo $ivf_stimulation_chart->EM25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EM25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others14->Visible) { // Others14 ?>
		<!-- Others14 -->
		<td<?php echo $ivf_stimulation_chart->Others14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others15->Visible) { // Others15 ?>
		<!-- Others15 -->
		<td<?php echo $ivf_stimulation_chart->Others15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others16->Visible) { // Others16 ?>
		<!-- Others16 -->
		<td<?php echo $ivf_stimulation_chart->Others16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others17->Visible) { // Others17 ?>
		<!-- Others17 -->
		<td<?php echo $ivf_stimulation_chart->Others17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others18->Visible) { // Others18 ?>
		<!-- Others18 -->
		<td<?php echo $ivf_stimulation_chart->Others18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others19->Visible) { // Others19 ?>
		<!-- Others19 -->
		<td<?php echo $ivf_stimulation_chart->Others19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others20->Visible) { // Others20 ?>
		<!-- Others20 -->
		<td<?php echo $ivf_stimulation_chart->Others20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others21->Visible) { // Others21 ?>
		<!-- Others21 -->
		<td<?php echo $ivf_stimulation_chart->Others21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others22->Visible) { // Others22 ?>
		<!-- Others22 -->
		<td<?php echo $ivf_stimulation_chart->Others22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others23->Visible) { // Others23 ?>
		<!-- Others23 -->
		<td<?php echo $ivf_stimulation_chart->Others23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others24->Visible) { // Others24 ?>
		<!-- Others24 -->
		<td<?php echo $ivf_stimulation_chart->Others24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others25->Visible) { // Others25 ?>
		<!-- Others25 -->
		<td<?php echo $ivf_stimulation_chart->Others25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->Others25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR14->Visible) { // DR14 ?>
		<!-- DR14 -->
		<td<?php echo $ivf_stimulation_chart->DR14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR15->Visible) { // DR15 ?>
		<!-- DR15 -->
		<td<?php echo $ivf_stimulation_chart->DR15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR16->Visible) { // DR16 ?>
		<!-- DR16 -->
		<td<?php echo $ivf_stimulation_chart->DR16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR17->Visible) { // DR17 ?>
		<!-- DR17 -->
		<td<?php echo $ivf_stimulation_chart->DR17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR18->Visible) { // DR18 ?>
		<!-- DR18 -->
		<td<?php echo $ivf_stimulation_chart->DR18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR19->Visible) { // DR19 ?>
		<!-- DR19 -->
		<td<?php echo $ivf_stimulation_chart->DR19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR20->Visible) { // DR20 ?>
		<!-- DR20 -->
		<td<?php echo $ivf_stimulation_chart->DR20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR21->Visible) { // DR21 ?>
		<!-- DR21 -->
		<td<?php echo $ivf_stimulation_chart->DR21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR22->Visible) { // DR22 ?>
		<!-- DR22 -->
		<td<?php echo $ivf_stimulation_chart->DR22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR23->Visible) { // DR23 ?>
		<!-- DR23 -->
		<td<?php echo $ivf_stimulation_chart->DR23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR24->Visible) { // DR24 ?>
		<!-- DR24 -->
		<td<?php echo $ivf_stimulation_chart->DR24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR25->Visible) { // DR25 ?>
		<!-- DR25 -->
		<td<?php echo $ivf_stimulation_chart->DR25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DR25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E214->Visible) { // E214 ?>
		<!-- E214 -->
		<td<?php echo $ivf_stimulation_chart->E214->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E214->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E214->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E215->Visible) { // E215 ?>
		<!-- E215 -->
		<td<?php echo $ivf_stimulation_chart->E215->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E215->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E215->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E216->Visible) { // E216 ?>
		<!-- E216 -->
		<td<?php echo $ivf_stimulation_chart->E216->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E216->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E216->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E217->Visible) { // E217 ?>
		<!-- E217 -->
		<td<?php echo $ivf_stimulation_chart->E217->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E217->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E217->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E218->Visible) { // E218 ?>
		<!-- E218 -->
		<td<?php echo $ivf_stimulation_chart->E218->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E218->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E218->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E219->Visible) { // E219 ?>
		<!-- E219 -->
		<td<?php echo $ivf_stimulation_chart->E219->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E219->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E219->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E220->Visible) { // E220 ?>
		<!-- E220 -->
		<td<?php echo $ivf_stimulation_chart->E220->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E220->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E220->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E221->Visible) { // E221 ?>
		<!-- E221 -->
		<td<?php echo $ivf_stimulation_chart->E221->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E221->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E221->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E222->Visible) { // E222 ?>
		<!-- E222 -->
		<td<?php echo $ivf_stimulation_chart->E222->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E222->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E222->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E223->Visible) { // E223 ?>
		<!-- E223 -->
		<td<?php echo $ivf_stimulation_chart->E223->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E223->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E223->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E224->Visible) { // E224 ?>
		<!-- E224 -->
		<td<?php echo $ivf_stimulation_chart->E224->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E224->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E224->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E225->Visible) { // E225 ?>
		<!-- E225 -->
		<td<?php echo $ivf_stimulation_chart->E225->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->E225->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E225->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EEETTTDTE->Visible) { // EEETTTDTE ?>
		<!-- EEETTTDTE -->
		<td<?php echo $ivf_stimulation_chart->EEETTTDTE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EEETTTDTE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EEETTTDTE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->bhcgdate->Visible) { // bhcgdate ?>
		<!-- bhcgdate -->
		<td<?php echo $ivf_stimulation_chart->bhcgdate->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->bhcgdate->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->bhcgdate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
		<!-- TUBAL_PATENCY -->
		<td<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HSG->Visible) { // HSG ?>
		<!-- HSG -->
		<td<?php echo $ivf_stimulation_chart->HSG->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->HSG->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HSG->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DHL->Visible) { // DHL ?>
		<!-- DHL -->
		<td<?php echo $ivf_stimulation_chart->DHL->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->DHL->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DHL->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
		<!-- UTERINE_PROBLEMS -->
		<td<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
		<!-- W_COMORBIDS -->
		<td<?php echo $ivf_stimulation_chart->W_COMORBIDS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->W_COMORBIDS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->W_COMORBIDS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
		<!-- H_COMORBIDS -->
		<td<?php echo $ivf_stimulation_chart->H_COMORBIDS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->H_COMORBIDS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->H_COMORBIDS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
		<!-- SEXUAL_DYSFUNCTION -->
		<td<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TABLETS->Visible) { // TABLETS ?>
		<!-- TABLETS -->
		<td<?php echo $ivf_stimulation_chart->TABLETS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->TABLETS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TABLETS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
		<!-- FOLLICLE_STATUS -->
		<td<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
		<!-- NUMBER_OF_IUI -->
		<td<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->PROCEDURE->Visible) { // PROCEDURE ?>
		<!-- PROCEDURE -->
		<td<?php echo $ivf_stimulation_chart->PROCEDURE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->PROCEDURE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PROCEDURE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
		<!-- LUTEAL_SUPPORT -->
		<td<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
		<!-- SPECIFIC_MATERNAL_PROBLEMS -->
		<td<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
		<!-- ONGOING_PREG -->
		<td<?php echo $ivf_stimulation_chart->ONGOING_PREG->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->ONGOING_PREG->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ONGOING_PREG->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EDD_Date->Visible) { // EDD_Date ?>
		<!-- EDD_Date -->
		<td<?php echo $ivf_stimulation_chart->EDD_Date->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart->EDD_Date->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EDD_Date->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_stimulation_chart_preview->ListOptions->render("body", "right", $ivf_stimulation_chart_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_stimulation_chart_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_stimulation_chart_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_stimulation_chart_preview->Pager)) $ivf_stimulation_chart_preview->Pager = new PrevNextPager($ivf_stimulation_chart_preview->StartRec, $ivf_stimulation_chart_preview->DisplayRecs, $ivf_stimulation_chart_preview->TotalRecs) ?>
<?php if ($ivf_stimulation_chart_preview->Pager->RecordCount > 0 && $ivf_stimulation_chart_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_stimulation_chart_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_stimulation_chart_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_stimulation_chart_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_stimulation_chart_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_stimulation_chart_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_stimulation_chart_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_stimulation_chart_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_stimulation_chart_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_stimulation_chart_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_stimulation_chart_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_stimulation_chart_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_stimulation_chart_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_stimulation_chart_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_stimulation_chart_preview->Recordset)
	$ivf_stimulation_chart_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_stimulation_chart_preview->terminate();
?>
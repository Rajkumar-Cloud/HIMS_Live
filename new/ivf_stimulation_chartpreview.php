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
<?php if ($ivf_stimulation_chart_preview->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_stimulation_chart"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_stimulation_chart_preview->renderListOptions();

// Render list options (header, left)
$ivf_stimulation_chart_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_stimulation_chart_preview->id->Visible) { // id ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->id) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->id->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->id->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->id->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->id->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RIDNo->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RIDNo->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RIDNo->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RIDNo->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Name->Visible) { // Name ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Name) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Name->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Name->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Name->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Name->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ARTCycle) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ARTCycle->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ARTCycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ARTCycle->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ARTCycle->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ARTCycle->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->FemaleFactor->Visible) { // FemaleFactor ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->FemaleFactor) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->FemaleFactor->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->FemaleFactor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->FemaleFactor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->FemaleFactor->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->FemaleFactor->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->FemaleFactor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->FemaleFactor->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->MaleFactor->Visible) { // MaleFactor ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->MaleFactor) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->MaleFactor->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->MaleFactor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->MaleFactor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->MaleFactor->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->MaleFactor->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->MaleFactor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->MaleFactor->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Protocol->Visible) { // Protocol ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Protocol) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Protocol->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Protocol->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Protocol->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Protocol->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Protocol->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Protocol->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Protocol->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SemenFrozen->Visible) { // SemenFrozen ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->SemenFrozen) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SemenFrozen->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->SemenFrozen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SemenFrozen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->SemenFrozen->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SemenFrozen->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->SemenFrozen->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SemenFrozen->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->A4ICSICycle->Visible) { // A4ICSICycle ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->A4ICSICycle) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->A4ICSICycle->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->A4ICSICycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->A4ICSICycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->A4ICSICycle->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->A4ICSICycle->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->A4ICSICycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->A4ICSICycle->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TotalICSICycle->Visible) { // TotalICSICycle ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->TotalICSICycle) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TotalICSICycle->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->TotalICSICycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TotalICSICycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->TotalICSICycle->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TotalICSICycle->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->TotalICSICycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TotalICSICycle->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->TypeOfInfertility) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TypeOfInfertility->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->TypeOfInfertility->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TypeOfInfertility->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->TypeOfInfertility->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TypeOfInfertility->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->TypeOfInfertility->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TypeOfInfertility->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Duration->Visible) { // Duration ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Duration) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Duration->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Duration->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Duration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Duration->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Duration->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Duration->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Duration->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->LMP->Visible) { // LMP ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->LMP) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->LMP->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->LMP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->LMP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->LMP->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->LMP->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->LMP->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RelevantHistory->Visible) { // RelevantHistory ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RelevantHistory) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RelevantHistory->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RelevantHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RelevantHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RelevantHistory->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RelevantHistory->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RelevantHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RelevantHistory->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->IUICycles->Visible) { // IUICycles ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->IUICycles) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->IUICycles->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->IUICycles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->IUICycles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->IUICycles->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->IUICycles->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->IUICycles->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->IUICycles->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->AFC->Visible) { // AFC ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->AFC) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->AFC->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->AFC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->AFC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->AFC->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->AFC->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->AFC->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->AFC->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->AMH->Visible) { // AMH ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->AMH) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->AMH->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->AMH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->AMH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->AMH->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->AMH->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->AMH->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->AMH->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->FBMI->Visible) { // FBMI ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->FBMI) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->FBMI->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->FBMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->FBMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->FBMI->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->FBMI->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->FBMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->FBMI->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->MBMI->Visible) { // MBMI ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->MBMI) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->MBMI->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->MBMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->MBMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->MBMI->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->MBMI->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->MBMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->MBMI->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->OvarianVolumeRT) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->OvarianVolumeRT->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->OvarianVolumeRT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->OvarianVolumeRT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->OvarianVolumeRT->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->OvarianVolumeRT->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->OvarianVolumeRT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->OvarianVolumeRT->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->OvarianVolumeLT) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->OvarianVolumeLT->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->OvarianVolumeLT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->OvarianVolumeLT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->OvarianVolumeLT->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->OvarianVolumeLT->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->OvarianVolumeLT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->OvarianVolumeLT->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DAYSOFSTIMULATION) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DAYSOFSTIMULATION->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DAYSOFSTIMULATION->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DAYSOFSTIMULATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DAYSOFSTIMULATION->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DAYSOFSTIMULATION->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DAYSOFSTIMULATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DAYSOFSTIMULATION->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->INJTYPE->Visible) { // INJTYPE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->INJTYPE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->INJTYPE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->INJTYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->INJTYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->INJTYPE->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->INJTYPE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->INJTYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->INJTYPE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ANTAGONISTDAYS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ANTAGONISTDAYS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ANTAGONISTDAYS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ANTAGONISTDAYS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ANTAGONISTDAYS->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ANTAGONISTDAYS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ANTAGONISTDAYS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ANTAGONISTDAYS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GROWTHHORMONE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GROWTHHORMONE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GROWTHHORMONE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GROWTHHORMONE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GROWTHHORMONE->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GROWTHHORMONE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GROWTHHORMONE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GROWTHHORMONE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->PRETREATMENT->Visible) { // PRETREATMENT ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->PRETREATMENT) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->PRETREATMENT->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->PRETREATMENT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->PRETREATMENT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->PRETREATMENT->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->PRETREATMENT->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->PRETREATMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->PRETREATMENT->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SerumP4->Visible) { // SerumP4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->SerumP4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SerumP4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->SerumP4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SerumP4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->SerumP4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SerumP4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->SerumP4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SerumP4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->FORT->Visible) { // FORT ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->FORT) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->FORT->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->FORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->FORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->FORT->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->FORT->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->FORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->FORT->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->MedicalFactors->Visible) { // MedicalFactors ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->MedicalFactors) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->MedicalFactors->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->MedicalFactors->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->MedicalFactors->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->MedicalFactors->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->MedicalFactors->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->MedicalFactors->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->MedicalFactors->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SCDate->Visible) { // SCDate ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->SCDate) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SCDate->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->SCDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SCDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->SCDate->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SCDate->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->SCDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SCDate->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->OvarianSurgery->Visible) { // OvarianSurgery ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->OvarianSurgery) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->OvarianSurgery->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->OvarianSurgery->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->OvarianSurgery->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->OvarianSurgery->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->OvarianSurgery->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->OvarianSurgery->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->OvarianSurgery->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->PreProcedureOrder) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->PreProcedureOrder->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->PreProcedureOrder->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->PreProcedureOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->PreProcedureOrder->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->PreProcedureOrder->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->PreProcedureOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->PreProcedureOrder->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TRIGGERR->Visible) { // TRIGGERR ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->TRIGGERR) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TRIGGERR->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->TRIGGERR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TRIGGERR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->TRIGGERR->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TRIGGERR->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->TRIGGERR->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TRIGGERR->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->TRIGGERDATE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TRIGGERDATE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->TRIGGERDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TRIGGERDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->TRIGGERDATE->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TRIGGERDATE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->TRIGGERDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TRIGGERDATE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ATHOMEorCLINIC) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ATHOMEorCLINIC->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ATHOMEorCLINIC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ATHOMEorCLINIC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ATHOMEorCLINIC->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ATHOMEorCLINIC->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ATHOMEorCLINIC->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ATHOMEorCLINIC->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->OPUDATE->Visible) { // OPUDATE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->OPUDATE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->OPUDATE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->OPUDATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->OPUDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->OPUDATE->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->OPUDATE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->OPUDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->OPUDATE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ALLFREEZEINDICATION) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ALLFREEZEINDICATION->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ALLFREEZEINDICATION->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ALLFREEZEINDICATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ALLFREEZEINDICATION->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ALLFREEZEINDICATION->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ALLFREEZEINDICATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ALLFREEZEINDICATION->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ERA->Visible) { // ERA ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ERA) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ERA->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ERA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ERA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ERA->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ERA->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ERA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ERA->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->PGTA->Visible) { // PGTA ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->PGTA) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->PGTA->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->PGTA->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->PGTA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->PGTA->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->PGTA->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->PGTA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->PGTA->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->PGD->Visible) { // PGD ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->PGD) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->PGD->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->PGD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->PGD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->PGD->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->PGD->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->PGD->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->PGD->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DATEOFET->Visible) { // DATEOFET ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DATEOFET) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DATEOFET->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DATEOFET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DATEOFET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DATEOFET->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DATEOFET->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DATEOFET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DATEOFET->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ET->Visible) { // ET ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ET) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ET->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ET->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ET->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ET->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ESET->Visible) { // ESET ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ESET) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ESET->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ESET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ESET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ESET->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ESET->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ESET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ESET->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DOET->Visible) { // DOET ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DOET) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DOET->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DOET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DOET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DOET->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DOET->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DOET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DOET->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->SEMENPREPARATION) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SEMENPREPARATION->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->SEMENPREPARATION->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SEMENPREPARATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->SEMENPREPARATION->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SEMENPREPARATION->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->SEMENPREPARATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SEMENPREPARATION->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->REASONFORESET->Visible) { // REASONFORESET ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->REASONFORESET) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->REASONFORESET->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->REASONFORESET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->REASONFORESET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->REASONFORESET->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->REASONFORESET->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->REASONFORESET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->REASONFORESET->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Expectedoocytes->Visible) { // Expectedoocytes ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Expectedoocytes) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Expectedoocytes->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Expectedoocytes->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Expectedoocytes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Expectedoocytes->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Expectedoocytes->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Expectedoocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Expectedoocytes->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate1->Visible) { // StChDate1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate2->Visible) { // StChDate2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate3->Visible) { // StChDate3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate4->Visible) { // StChDate4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate5->Visible) { // StChDate5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate6->Visible) { // StChDate6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate7->Visible) { // StChDate7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate8->Visible) { // StChDate8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate9->Visible) { // StChDate9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate10->Visible) { // StChDate10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate11->Visible) { // StChDate11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate12->Visible) { // StChDate12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate13->Visible) { // StChDate13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay1->Visible) { // CycleDay1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay2->Visible) { // CycleDay2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay3->Visible) { // CycleDay3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay4->Visible) { // CycleDay4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay5->Visible) { // CycleDay5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay6->Visible) { // CycleDay6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay7->Visible) { // CycleDay7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay8->Visible) { // CycleDay8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay9->Visible) { // CycleDay9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay10->Visible) { // CycleDay10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay11->Visible) { // CycleDay11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay12->Visible) { // CycleDay12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay13->Visible) { // CycleDay13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay1->Visible) { // StimulationDay1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay2->Visible) { // StimulationDay2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay3->Visible) { // StimulationDay3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay4->Visible) { // StimulationDay4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay5->Visible) { // StimulationDay5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay6->Visible) { // StimulationDay6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay7->Visible) { // StimulationDay7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay8->Visible) { // StimulationDay8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay9->Visible) { // StimulationDay9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay10->Visible) { // StimulationDay10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay11->Visible) { // StimulationDay11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay12->Visible) { // StimulationDay12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay13->Visible) { // StimulationDay13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet1->Visible) { // Tablet1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet2->Visible) { // Tablet2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet3->Visible) { // Tablet3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet4->Visible) { // Tablet4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet5->Visible) { // Tablet5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet6->Visible) { // Tablet6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet7->Visible) { // Tablet7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet8->Visible) { // Tablet8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet9->Visible) { // Tablet9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet10->Visible) { // Tablet10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet11->Visible) { // Tablet11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet12->Visible) { // Tablet12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet13->Visible) { // Tablet13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH1->Visible) { // RFSH1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH2->Visible) { // RFSH2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH3->Visible) { // RFSH3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH4->Visible) { // RFSH4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH5->Visible) { // RFSH5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH6->Visible) { // RFSH6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH7->Visible) { // RFSH7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH8->Visible) { // RFSH8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH9->Visible) { // RFSH9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH10->Visible) { // RFSH10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH11->Visible) { // RFSH11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH12->Visible) { // RFSH12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH13->Visible) { // RFSH13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG1->Visible) { // HMG1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG2->Visible) { // HMG2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG3->Visible) { // HMG3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG4->Visible) { // HMG4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG5->Visible) { // HMG5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG6->Visible) { // HMG6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG7->Visible) { // HMG7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG8->Visible) { // HMG8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG9->Visible) { // HMG9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG10->Visible) { // HMG10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG11->Visible) { // HMG11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG12->Visible) { // HMG12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG13->Visible) { // HMG13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH1->Visible) { // GnRH1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH2->Visible) { // GnRH2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH3->Visible) { // GnRH3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH4->Visible) { // GnRH4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH5->Visible) { // GnRH5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH6->Visible) { // GnRH6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH7->Visible) { // GnRH7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH8->Visible) { // GnRH8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH9->Visible) { // GnRH9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH10->Visible) { // GnRH10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH11->Visible) { // GnRH11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH12->Visible) { // GnRH12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH13->Visible) { // GnRH13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E21->Visible) { // E21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E22->Visible) { // E22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E23->Visible) { // E23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E24->Visible) { // E24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E25->Visible) { // E25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E26->Visible) { // E26 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E26) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E26->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E26->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E26->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E26->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E26->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E26->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E26->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E27->Visible) { // E27 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E27) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E27->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E27->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E27->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E27->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E27->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E27->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E27->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E28->Visible) { // E28 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E28) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E28->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E28->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E28->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E28->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E28->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E28->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E28->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E29->Visible) { // E29 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E29) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E29->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E29->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E29->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E29->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E29->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E29->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E29->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E210->Visible) { // E210 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E210) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E210->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E210->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E210->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E210->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E210->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E210->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E210->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E211->Visible) { // E211 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E211) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E211->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E211->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E211->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E211->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E211->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E211->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E211->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E212->Visible) { // E212 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E212) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E212->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E212->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E212->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E212->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E212->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E212->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E212->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E213->Visible) { // E213 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E213) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E213->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E213->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E213->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E213->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E213->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E213->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E213->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P41->Visible) { // P41 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P41) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P41->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P41->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P41->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P41->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P41->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P41->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P41->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P42->Visible) { // P42 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P42) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P42->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P42->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P42->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P42->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P42->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P42->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P42->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P43->Visible) { // P43 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P43) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P43->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P43->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P43->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P43->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P43->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P43->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P43->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P44->Visible) { // P44 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P44) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P44->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P44->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P44->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P44->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P44->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P44->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P44->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P45->Visible) { // P45 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P45) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P45->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P45->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P45->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P45->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P45->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P45->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P45->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P46->Visible) { // P46 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P46) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P46->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P46->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P46->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P46->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P46->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P46->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P46->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P47->Visible) { // P47 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P47) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P47->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P47->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P47->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P47->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P47->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P47->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P47->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P48->Visible) { // P48 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P48) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P48->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P48->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P48->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P48->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P48->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P48->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P48->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P49->Visible) { // P49 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P49) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P49->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P49->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P49->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P49->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P49->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P49->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P49->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P410->Visible) { // P410 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P410) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P410->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P410->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P410->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P410->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P410->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P410->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P410->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P411->Visible) { // P411 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P411) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P411->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P411->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P411->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P411->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P411->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P411->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P411->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P412->Visible) { // P412 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P412) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P412->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P412->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P412->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P412->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P412->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P412->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P412->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P413->Visible) { // P413 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P413) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P413->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P413->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P413->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P413->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P413->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P413->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P413->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt1->Visible) { // USGRt1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt2->Visible) { // USGRt2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt3->Visible) { // USGRt3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt4->Visible) { // USGRt4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt5->Visible) { // USGRt5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt6->Visible) { // USGRt6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt7->Visible) { // USGRt7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt8->Visible) { // USGRt8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt9->Visible) { // USGRt9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt10->Visible) { // USGRt10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt11->Visible) { // USGRt11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt12->Visible) { // USGRt12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt13->Visible) { // USGRt13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt1->Visible) { // USGLt1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt2->Visible) { // USGLt2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt3->Visible) { // USGLt3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt4->Visible) { // USGLt4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt5->Visible) { // USGLt5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt6->Visible) { // USGLt6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt7->Visible) { // USGLt7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt8->Visible) { // USGLt8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt9->Visible) { // USGLt9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt10->Visible) { // USGLt10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt11->Visible) { // USGLt11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt12->Visible) { // USGLt12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt13->Visible) { // USGLt13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM1->Visible) { // EM1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM2->Visible) { // EM2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM3->Visible) { // EM3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM4->Visible) { // EM4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM5->Visible) { // EM5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM6->Visible) { // EM6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM7->Visible) { // EM7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM8->Visible) { // EM8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM9->Visible) { // EM9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM10->Visible) { // EM10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM11->Visible) { // EM11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM12->Visible) { // EM12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM13->Visible) { // EM13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others1->Visible) { // Others1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others2->Visible) { // Others2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others3->Visible) { // Others3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others4->Visible) { // Others4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others5->Visible) { // Others5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others6->Visible) { // Others6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others7->Visible) { // Others7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others8->Visible) { // Others8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others9->Visible) { // Others9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others10->Visible) { // Others10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others11->Visible) { // Others11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others12->Visible) { // Others12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others13->Visible) { // Others13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR1->Visible) { // DR1 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR1) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR1->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR1->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR1->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR1->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR2->Visible) { // DR2 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR2) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR2->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR2->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR2->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR2->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR3->Visible) { // DR3 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR3) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR3->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR3->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR3->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR3->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR4->Visible) { // DR4 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR4) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR4->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR4->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR4->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR4->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR5->Visible) { // DR5 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR5) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR5->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR5->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR5->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR5->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR6->Visible) { // DR6 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR6) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR6->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR6->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR6->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR6->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR6->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR7->Visible) { // DR7 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR7) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR7->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR7->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR7->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR7->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR7->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR8->Visible) { // DR8 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR8) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR8->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR8->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR8->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR8->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR8->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR9->Visible) { // DR9 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR9) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR9->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR9->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR9->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR9->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR9->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR10->Visible) { // DR10 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR10) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR10->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR10->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR10->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR10->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR10->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR11->Visible) { // DR11 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR11) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR11->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR11->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR11->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR11->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR11->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR12->Visible) { // DR12 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR12) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR12->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR12->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR12->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR12->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR12->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR13->Visible) { // DR13 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR13) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR13->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR13->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR13->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR13->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR13->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->TidNo) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TidNo->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->TidNo->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TidNo->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TidNo->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Convert->Visible) { // Convert ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Convert) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Convert->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Convert->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Convert->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Convert->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Convert->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Convert->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Convert->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Consultant) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Consultant->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Consultant->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Consultant->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Consultant->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Consultant->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Consultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Consultant->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->InseminatinTechnique) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->InseminatinTechnique->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->InseminatinTechnique->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->InseminatinTechnique->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->InseminatinTechnique->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->InseminatinTechnique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->InseminatinTechnique->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->IndicationForART->Visible) { // IndicationForART ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->IndicationForART) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->IndicationForART->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->IndicationForART->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->IndicationForART->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->IndicationForART->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->IndicationForART->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->IndicationForART->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->IndicationForART->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Hysteroscopy) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Hysteroscopy->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Hysteroscopy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Hysteroscopy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Hysteroscopy->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Hysteroscopy->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Hysteroscopy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Hysteroscopy->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EndometrialScratching) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EndometrialScratching->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EndometrialScratching->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EndometrialScratching->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EndometrialScratching->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EndometrialScratching->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EndometrialScratching->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EndometrialScratching->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->TrialCannulation) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TrialCannulation->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->TrialCannulation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TrialCannulation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->TrialCannulation->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TrialCannulation->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->TrialCannulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TrialCannulation->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CYCLETYPE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CYCLETYPE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CYCLETYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CYCLETYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CYCLETYPE->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CYCLETYPE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CYCLETYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CYCLETYPE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HRTCYCLE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HRTCYCLE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HRTCYCLE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HRTCYCLE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HRTCYCLE->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HRTCYCLE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HRTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HRTCYCLE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->OralEstrogenDosage) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->OralEstrogenDosage->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->OralEstrogenDosage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->OralEstrogenDosage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->OralEstrogenDosage->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->OralEstrogenDosage->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->OralEstrogenDosage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->OralEstrogenDosage->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->VaginalEstrogen) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->VaginalEstrogen->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->VaginalEstrogen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->VaginalEstrogen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->VaginalEstrogen->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->VaginalEstrogen->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->VaginalEstrogen->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->VaginalEstrogen->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GCSF->Visible) { // GCSF ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GCSF) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GCSF->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GCSF->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GCSF->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GCSF->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GCSF->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GCSF->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GCSF->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ActivatedPRP) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ActivatedPRP->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ActivatedPRP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ActivatedPRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ActivatedPRP->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ActivatedPRP->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ActivatedPRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ActivatedPRP->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->UCLcm->Visible) { // UCLcm ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->UCLcm) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->UCLcm->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->UCLcm->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->UCLcm->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->UCLcm->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->UCLcm->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->UCLcm->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->UCLcm->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DAYOFEMBRYOS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DAYOFEMBRYOS->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DAYOFEMBRYOS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DAYOFEMBRYOS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ViaAdmin->Visible) { // ViaAdmin ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ViaAdmin) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ViaAdmin->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ViaAdmin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ViaAdmin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ViaAdmin->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ViaAdmin->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ViaAdmin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ViaAdmin->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ViaStartDateTime) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ViaStartDateTime->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ViaStartDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ViaStartDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ViaStartDateTime->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ViaStartDateTime->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ViaStartDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ViaStartDateTime->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ViaDose->Visible) { // ViaDose ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ViaDose) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ViaDose->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ViaDose->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ViaDose->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ViaDose->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ViaDose->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ViaDose->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ViaDose->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->AllFreeze->Visible) { // AllFreeze ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->AllFreeze) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->AllFreeze->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->AllFreeze->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->AllFreeze->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->AllFreeze->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->AllFreeze->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->AllFreeze->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->AllFreeze->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TreatmentCancel->Visible) { // TreatmentCancel ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->TreatmentCancel) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TreatmentCancel->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->TreatmentCancel->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TreatmentCancel->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->TreatmentCancel->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TreatmentCancel->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->TreatmentCancel->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TreatmentCancel->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ProgesteroneAdmin) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ProgesteroneAdmin->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ProgesteroneAdmin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ProgesteroneAdmin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ProgesteroneAdmin->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ProgesteroneAdmin->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ProgesteroneAdmin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ProgesteroneAdmin->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ProgesteroneStart) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ProgesteroneStart->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ProgesteroneStart->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ProgesteroneStart->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ProgesteroneStart->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ProgesteroneStart->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ProgesteroneStart->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ProgesteroneStart->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ProgesteroneDose) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ProgesteroneDose->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ProgesteroneDose->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ProgesteroneDose->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ProgesteroneDose->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ProgesteroneDose->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ProgesteroneDose->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ProgesteroneDose->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate14->Visible) { // StChDate14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate15->Visible) { // StChDate15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate16->Visible) { // StChDate16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate17->Visible) { // StChDate17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate18->Visible) { // StChDate18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate19->Visible) { // StChDate19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate20->Visible) { // StChDate20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate21->Visible) { // StChDate21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate22->Visible) { // StChDate22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate23->Visible) { // StChDate23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate24->Visible) { // StChDate24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate25->Visible) { // StChDate25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StChDate25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StChDate25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StChDate25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StChDate25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StChDate25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StChDate25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay14->Visible) { // CycleDay14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay15->Visible) { // CycleDay15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay16->Visible) { // CycleDay16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay17->Visible) { // CycleDay17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay18->Visible) { // CycleDay18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay19->Visible) { // CycleDay19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay20->Visible) { // CycleDay20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay21->Visible) { // CycleDay21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay22->Visible) { // CycleDay22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay23->Visible) { // CycleDay23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay24->Visible) { // CycleDay24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay25->Visible) { // CycleDay25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->CycleDay25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->CycleDay25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->CycleDay25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->CycleDay25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->CycleDay25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->CycleDay25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay14->Visible) { // StimulationDay14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay15->Visible) { // StimulationDay15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay16->Visible) { // StimulationDay16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay17->Visible) { // StimulationDay17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay18->Visible) { // StimulationDay18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay19->Visible) { // StimulationDay19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay20->Visible) { // StimulationDay20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay21->Visible) { // StimulationDay21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay22->Visible) { // StimulationDay22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay23->Visible) { // StimulationDay23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay24->Visible) { // StimulationDay24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay25->Visible) { // StimulationDay25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->StimulationDay25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->StimulationDay25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->StimulationDay25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->StimulationDay25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->StimulationDay25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->StimulationDay25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet14->Visible) { // Tablet14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet15->Visible) { // Tablet15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet16->Visible) { // Tablet16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet17->Visible) { // Tablet17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet18->Visible) { // Tablet18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet19->Visible) { // Tablet19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet20->Visible) { // Tablet20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet21->Visible) { // Tablet21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet22->Visible) { // Tablet22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet23->Visible) { // Tablet23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet24->Visible) { // Tablet24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet25->Visible) { // Tablet25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Tablet25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Tablet25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Tablet25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Tablet25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Tablet25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Tablet25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH14->Visible) { // RFSH14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH15->Visible) { // RFSH15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH16->Visible) { // RFSH16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH17->Visible) { // RFSH17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH18->Visible) { // RFSH18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH19->Visible) { // RFSH19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH20->Visible) { // RFSH20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH21->Visible) { // RFSH21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH22->Visible) { // RFSH22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH23->Visible) { // RFSH23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH24->Visible) { // RFSH24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH25->Visible) { // RFSH25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->RFSH25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->RFSH25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->RFSH25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->RFSH25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->RFSH25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->RFSH25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG14->Visible) { // HMG14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG15->Visible) { // HMG15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG16->Visible) { // HMG16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG17->Visible) { // HMG17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG18->Visible) { // HMG18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG19->Visible) { // HMG19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG20->Visible) { // HMG20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG21->Visible) { // HMG21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG22->Visible) { // HMG22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG23->Visible) { // HMG23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG24->Visible) { // HMG24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG25->Visible) { // HMG25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HMG25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HMG25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HMG25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HMG25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HMG25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HMG25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH14->Visible) { // GnRH14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH15->Visible) { // GnRH15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH16->Visible) { // GnRH16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH17->Visible) { // GnRH17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH18->Visible) { // GnRH18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH19->Visible) { // GnRH19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH20->Visible) { // GnRH20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH21->Visible) { // GnRH21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH22->Visible) { // GnRH22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH23->Visible) { // GnRH23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH24->Visible) { // GnRH24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH25->Visible) { // GnRH25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->GnRH25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->GnRH25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->GnRH25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->GnRH25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->GnRH25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->GnRH25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P414->Visible) { // P414 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P414) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P414->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P414->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P414->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P414->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P414->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P414->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P414->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P415->Visible) { // P415 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P415) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P415->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P415->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P415->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P415->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P415->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P415->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P415->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P416->Visible) { // P416 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P416) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P416->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P416->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P416->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P416->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P416->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P416->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P416->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P417->Visible) { // P417 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P417) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P417->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P417->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P417->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P417->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P417->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P417->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P417->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P418->Visible) { // P418 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P418) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P418->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P418->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P418->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P418->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P418->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P418->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P418->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P419->Visible) { // P419 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P419) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P419->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P419->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P419->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P419->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P419->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P419->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P419->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P420->Visible) { // P420 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P420) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P420->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P420->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P420->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P420->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P420->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P420->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P420->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P421->Visible) { // P421 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P421) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P421->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P421->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P421->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P421->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P421->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P421->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P421->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P422->Visible) { // P422 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P422) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P422->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P422->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P422->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P422->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P422->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P422->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P422->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P423->Visible) { // P423 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P423) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P423->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P423->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P423->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P423->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P423->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P423->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P423->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P424->Visible) { // P424 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P424) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P424->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P424->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P424->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P424->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P424->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P424->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P424->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P425->Visible) { // P425 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->P425) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P425->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->P425->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->P425->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->P425->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P425->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->P425->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->P425->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt14->Visible) { // USGRt14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt15->Visible) { // USGRt15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt16->Visible) { // USGRt16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt17->Visible) { // USGRt17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt18->Visible) { // USGRt18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt19->Visible) { // USGRt19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt20->Visible) { // USGRt20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt21->Visible) { // USGRt21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt22->Visible) { // USGRt22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt23->Visible) { // USGRt23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt24->Visible) { // USGRt24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt25->Visible) { // USGRt25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGRt25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGRt25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGRt25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGRt25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGRt25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGRt25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt14->Visible) { // USGLt14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt15->Visible) { // USGLt15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt16->Visible) { // USGLt16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt17->Visible) { // USGLt17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt18->Visible) { // USGLt18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt19->Visible) { // USGLt19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt20->Visible) { // USGLt20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt21->Visible) { // USGLt21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt22->Visible) { // USGLt22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt23->Visible) { // USGLt23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt24->Visible) { // USGLt24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt25->Visible) { // USGLt25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->USGLt25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->USGLt25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->USGLt25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->USGLt25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->USGLt25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->USGLt25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM14->Visible) { // EM14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM15->Visible) { // EM15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM16->Visible) { // EM16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM17->Visible) { // EM17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM18->Visible) { // EM18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM19->Visible) { // EM19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM20->Visible) { // EM20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM21->Visible) { // EM21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM22->Visible) { // EM22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM23->Visible) { // EM23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM24->Visible) { // EM24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM25->Visible) { // EM25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EM25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EM25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EM25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EM25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EM25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EM25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others14->Visible) { // Others14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others15->Visible) { // Others15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others16->Visible) { // Others16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others17->Visible) { // Others17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others18->Visible) { // Others18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others19->Visible) { // Others19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others20->Visible) { // Others20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others21->Visible) { // Others21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others22->Visible) { // Others22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others23->Visible) { // Others23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others24->Visible) { // Others24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others25->Visible) { // Others25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->Others25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->Others25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->Others25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->Others25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->Others25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->Others25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR14->Visible) { // DR14 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR14) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR14->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR14->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR14->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR14->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR14->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR15->Visible) { // DR15 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR15) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR15->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR15->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR15->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR15->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR15->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR16->Visible) { // DR16 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR16) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR16->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR16->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR16->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR16->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR16->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR17->Visible) { // DR17 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR17) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR17->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR17->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR17->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR17->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR17->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR18->Visible) { // DR18 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR18) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR18->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR18->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR18->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR18->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR18->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR19->Visible) { // DR19 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR19) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR19->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR19->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR19->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR19->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR19->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR20->Visible) { // DR20 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR20) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR20->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR20->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR20->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR20->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR20->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR21->Visible) { // DR21 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR21) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR21->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR21->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR21->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR21->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR21->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR22->Visible) { // DR22 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR22) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR22->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR22->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR22->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR22->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR22->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR23->Visible) { // DR23 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR23) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR23->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR23->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR23->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR23->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR23->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR24->Visible) { // DR24 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR24) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR24->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR24->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR24->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR24->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR24->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR25->Visible) { // DR25 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DR25) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR25->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DR25->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DR25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DR25->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR25->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DR25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DR25->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E214->Visible) { // E214 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E214) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E214->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E214->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E214->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E214->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E214->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E214->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E214->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E215->Visible) { // E215 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E215) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E215->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E215->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E215->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E215->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E215->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E215->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E215->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E216->Visible) { // E216 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E216) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E216->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E216->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E216->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E216->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E216->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E216->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E216->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E217->Visible) { // E217 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E217) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E217->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E217->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E217->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E217->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E217->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E217->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E217->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E218->Visible) { // E218 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E218) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E218->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E218->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E218->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E218->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E218->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E218->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E218->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E219->Visible) { // E219 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E219) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E219->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E219->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E219->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E219->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E219->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E219->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E219->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E220->Visible) { // E220 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E220) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E220->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E220->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E220->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E220->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E220->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E220->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E220->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E221->Visible) { // E221 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E221) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E221->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E221->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E221->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E221->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E221->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E221->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E221->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E222->Visible) { // E222 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E222) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E222->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E222->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E222->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E222->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E222->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E222->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E222->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E223->Visible) { // E223 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E223) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E223->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E223->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E223->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E223->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E223->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E223->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E223->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E224->Visible) { // E224 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E224) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E224->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E224->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E224->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E224->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E224->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E224->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E224->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E225->Visible) { // E225 ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->E225) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E225->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->E225->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->E225->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->E225->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E225->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->E225->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->E225->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EEETTTDTE->Visible) { // EEETTTDTE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EEETTTDTE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EEETTTDTE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EEETTTDTE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EEETTTDTE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EEETTTDTE->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EEETTTDTE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EEETTTDTE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EEETTTDTE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->bhcgdate->Visible) { // bhcgdate ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->bhcgdate) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->bhcgdate->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->bhcgdate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->bhcgdate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->bhcgdate->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->bhcgdate->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->bhcgdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->bhcgdate->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->TUBAL_PATENCY) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TUBAL_PATENCY->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->TUBAL_PATENCY->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TUBAL_PATENCY->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->TUBAL_PATENCY->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TUBAL_PATENCY->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->TUBAL_PATENCY->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TUBAL_PATENCY->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HSG->Visible) { // HSG ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->HSG) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HSG->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->HSG->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->HSG->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->HSG->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HSG->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->HSG->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->HSG->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DHL->Visible) { // DHL ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->DHL) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DHL->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->DHL->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->DHL->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->DHL->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DHL->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->DHL->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->DHL->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->UTERINE_PROBLEMS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->UTERINE_PROBLEMS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->UTERINE_PROBLEMS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->UTERINE_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->UTERINE_PROBLEMS->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->UTERINE_PROBLEMS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->UTERINE_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->UTERINE_PROBLEMS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->W_COMORBIDS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->W_COMORBIDS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->W_COMORBIDS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->W_COMORBIDS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->W_COMORBIDS->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->W_COMORBIDS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->W_COMORBIDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->W_COMORBIDS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->H_COMORBIDS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->H_COMORBIDS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->H_COMORBIDS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->H_COMORBIDS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->H_COMORBIDS->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->H_COMORBIDS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->H_COMORBIDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->H_COMORBIDS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TABLETS->Visible) { // TABLETS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->TABLETS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TABLETS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->TABLETS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->TABLETS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->TABLETS->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TABLETS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->TABLETS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->TABLETS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->FOLLICLE_STATUS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->FOLLICLE_STATUS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->FOLLICLE_STATUS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->FOLLICLE_STATUS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->FOLLICLE_STATUS->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->FOLLICLE_STATUS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->FOLLICLE_STATUS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->FOLLICLE_STATUS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->NUMBER_OF_IUI) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->NUMBER_OF_IUI->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->NUMBER_OF_IUI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->NUMBER_OF_IUI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->NUMBER_OF_IUI->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->NUMBER_OF_IUI->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->NUMBER_OF_IUI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->NUMBER_OF_IUI->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->PROCEDURE->Visible) { // PROCEDURE ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->PROCEDURE) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->PROCEDURE->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->PROCEDURE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->PROCEDURE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->PROCEDURE->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->PROCEDURE->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->PROCEDURE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->PROCEDURE->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->LUTEAL_SUPPORT) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->LUTEAL_SUPPORT->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->LUTEAL_SUPPORT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->LUTEAL_SUPPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->LUTEAL_SUPPORT->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->LUTEAL_SUPPORT->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->LUTEAL_SUPPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->LUTEAL_SUPPORT->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->ONGOING_PREG) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ONGOING_PREG->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->ONGOING_PREG->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->ONGOING_PREG->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->ONGOING_PREG->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ONGOING_PREG->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->ONGOING_PREG->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->ONGOING_PREG->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EDD_Date->Visible) { // EDD_Date ?>
	<?php if ($ivf_stimulation_chart->SortUrl($ivf_stimulation_chart_preview->EDD_Date) == "") { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EDD_Date->headerCellClass() ?>"><?php echo $ivf_stimulation_chart_preview->EDD_Date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_stimulation_chart_preview->EDD_Date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_stimulation_chart_preview->EDD_Date->Name) ?>" data-sort-order="<?php echo $ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EDD_Date->Name && $ivf_stimulation_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart_preview->EDD_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart_preview->SortField == $ivf_stimulation_chart_preview->EDD_Date->Name) { ?><?php if ($ivf_stimulation_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$ivf_stimulation_chart_preview->RowCount = 0;
while ($ivf_stimulation_chart_preview->Recordset && !$ivf_stimulation_chart_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_stimulation_chart_preview->RecCount++;
	$ivf_stimulation_chart_preview->RowCount++;
	$ivf_stimulation_chart_preview->CssStyle = "";
	$ivf_stimulation_chart_preview->loadListRowValues($ivf_stimulation_chart_preview->Recordset);

	// Render row
	$ivf_stimulation_chart->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_stimulation_chart_preview->resetAttributes();
	$ivf_stimulation_chart_preview->renderListRow();

	// Render list options
	$ivf_stimulation_chart_preview->renderListOptions();
?>
	<tr <?php echo $ivf_stimulation_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_stimulation_chart_preview->ListOptions->render("body", "left", $ivf_stimulation_chart_preview->RowCount);
?>
<?php if ($ivf_stimulation_chart_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_stimulation_chart_preview->id->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->id->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_stimulation_chart_preview->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RIDNo->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_stimulation_chart_preview->Name->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Name->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ARTCycle->Visible) { // ARTCycle ?>
		<!-- ARTCycle -->
		<td<?php echo $ivf_stimulation_chart_preview->ARTCycle->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ARTCycle->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ARTCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->FemaleFactor->Visible) { // FemaleFactor ?>
		<!-- FemaleFactor -->
		<td<?php echo $ivf_stimulation_chart_preview->FemaleFactor->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->FemaleFactor->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->FemaleFactor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->MaleFactor->Visible) { // MaleFactor ?>
		<!-- MaleFactor -->
		<td<?php echo $ivf_stimulation_chart_preview->MaleFactor->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->MaleFactor->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->MaleFactor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Protocol->Visible) { // Protocol ?>
		<!-- Protocol -->
		<td<?php echo $ivf_stimulation_chart_preview->Protocol->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Protocol->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Protocol->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SemenFrozen->Visible) { // SemenFrozen ?>
		<!-- SemenFrozen -->
		<td<?php echo $ivf_stimulation_chart_preview->SemenFrozen->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->SemenFrozen->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->SemenFrozen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->A4ICSICycle->Visible) { // A4ICSICycle ?>
		<!-- A4ICSICycle -->
		<td<?php echo $ivf_stimulation_chart_preview->A4ICSICycle->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->A4ICSICycle->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->A4ICSICycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TotalICSICycle->Visible) { // TotalICSICycle ?>
		<!-- TotalICSICycle -->
		<td<?php echo $ivf_stimulation_chart_preview->TotalICSICycle->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->TotalICSICycle->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->TotalICSICycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
		<!-- TypeOfInfertility -->
		<td<?php echo $ivf_stimulation_chart_preview->TypeOfInfertility->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->TypeOfInfertility->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->TypeOfInfertility->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Duration->Visible) { // Duration ?>
		<!-- Duration -->
		<td<?php echo $ivf_stimulation_chart_preview->Duration->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Duration->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Duration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->LMP->Visible) { // LMP ?>
		<!-- LMP -->
		<td<?php echo $ivf_stimulation_chart_preview->LMP->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->LMP->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->LMP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RelevantHistory->Visible) { // RelevantHistory ?>
		<!-- RelevantHistory -->
		<td<?php echo $ivf_stimulation_chart_preview->RelevantHistory->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RelevantHistory->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RelevantHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->IUICycles->Visible) { // IUICycles ?>
		<!-- IUICycles -->
		<td<?php echo $ivf_stimulation_chart_preview->IUICycles->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->IUICycles->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->IUICycles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->AFC->Visible) { // AFC ?>
		<!-- AFC -->
		<td<?php echo $ivf_stimulation_chart_preview->AFC->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->AFC->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->AFC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->AMH->Visible) { // AMH ?>
		<!-- AMH -->
		<td<?php echo $ivf_stimulation_chart_preview->AMH->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->AMH->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->AMH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->FBMI->Visible) { // FBMI ?>
		<!-- FBMI -->
		<td<?php echo $ivf_stimulation_chart_preview->FBMI->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->FBMI->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->FBMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->MBMI->Visible) { // MBMI ?>
		<!-- MBMI -->
		<td<?php echo $ivf_stimulation_chart_preview->MBMI->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->MBMI->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->MBMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
		<!-- OvarianVolumeRT -->
		<td<?php echo $ivf_stimulation_chart_preview->OvarianVolumeRT->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->OvarianVolumeRT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->OvarianVolumeRT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
		<!-- OvarianVolumeLT -->
		<td<?php echo $ivf_stimulation_chart_preview->OvarianVolumeLT->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->OvarianVolumeLT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->OvarianVolumeLT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
		<!-- DAYSOFSTIMULATION -->
		<td<?php echo $ivf_stimulation_chart_preview->DAYSOFSTIMULATION->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DAYSOFSTIMULATION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DAYSOFSTIMULATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
		<!-- DOSEOFGONADOTROPINS -->
		<td<?php echo $ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->INJTYPE->Visible) { // INJTYPE ?>
		<!-- INJTYPE -->
		<td<?php echo $ivf_stimulation_chart_preview->INJTYPE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->INJTYPE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->INJTYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
		<!-- ANTAGONISTDAYS -->
		<td<?php echo $ivf_stimulation_chart_preview->ANTAGONISTDAYS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ANTAGONISTDAYS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ANTAGONISTDAYS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
		<!-- ANTAGONISTSTARTDAY -->
		<td<?php echo $ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
		<!-- GROWTHHORMONE -->
		<td<?php echo $ivf_stimulation_chart_preview->GROWTHHORMONE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GROWTHHORMONE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GROWTHHORMONE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->PRETREATMENT->Visible) { // PRETREATMENT ?>
		<!-- PRETREATMENT -->
		<td<?php echo $ivf_stimulation_chart_preview->PRETREATMENT->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->PRETREATMENT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->PRETREATMENT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SerumP4->Visible) { // SerumP4 ?>
		<!-- SerumP4 -->
		<td<?php echo $ivf_stimulation_chart_preview->SerumP4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->SerumP4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->SerumP4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->FORT->Visible) { // FORT ?>
		<!-- FORT -->
		<td<?php echo $ivf_stimulation_chart_preview->FORT->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->FORT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->FORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->MedicalFactors->Visible) { // MedicalFactors ?>
		<!-- MedicalFactors -->
		<td<?php echo $ivf_stimulation_chart_preview->MedicalFactors->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->MedicalFactors->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->MedicalFactors->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SCDate->Visible) { // SCDate ?>
		<!-- SCDate -->
		<td<?php echo $ivf_stimulation_chart_preview->SCDate->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->SCDate->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->SCDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->OvarianSurgery->Visible) { // OvarianSurgery ?>
		<!-- OvarianSurgery -->
		<td<?php echo $ivf_stimulation_chart_preview->OvarianSurgery->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->OvarianSurgery->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->OvarianSurgery->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
		<!-- PreProcedureOrder -->
		<td<?php echo $ivf_stimulation_chart_preview->PreProcedureOrder->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->PreProcedureOrder->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->PreProcedureOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TRIGGERR->Visible) { // TRIGGERR ?>
		<!-- TRIGGERR -->
		<td<?php echo $ivf_stimulation_chart_preview->TRIGGERR->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->TRIGGERR->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->TRIGGERR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
		<!-- TRIGGERDATE -->
		<td<?php echo $ivf_stimulation_chart_preview->TRIGGERDATE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->TRIGGERDATE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->TRIGGERDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
		<!-- ATHOMEorCLINIC -->
		<td<?php echo $ivf_stimulation_chart_preview->ATHOMEorCLINIC->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ATHOMEorCLINIC->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ATHOMEorCLINIC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->OPUDATE->Visible) { // OPUDATE ?>
		<!-- OPUDATE -->
		<td<?php echo $ivf_stimulation_chart_preview->OPUDATE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->OPUDATE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->OPUDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
		<!-- ALLFREEZEINDICATION -->
		<td<?php echo $ivf_stimulation_chart_preview->ALLFREEZEINDICATION->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ALLFREEZEINDICATION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ALLFREEZEINDICATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ERA->Visible) { // ERA ?>
		<!-- ERA -->
		<td<?php echo $ivf_stimulation_chart_preview->ERA->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ERA->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ERA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->PGTA->Visible) { // PGTA ?>
		<!-- PGTA -->
		<td<?php echo $ivf_stimulation_chart_preview->PGTA->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->PGTA->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->PGTA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->PGD->Visible) { // PGD ?>
		<!-- PGD -->
		<td<?php echo $ivf_stimulation_chart_preview->PGD->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->PGD->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->PGD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DATEOFET->Visible) { // DATEOFET ?>
		<!-- DATEOFET -->
		<td<?php echo $ivf_stimulation_chart_preview->DATEOFET->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DATEOFET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DATEOFET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ET->Visible) { // ET ?>
		<!-- ET -->
		<td<?php echo $ivf_stimulation_chart_preview->ET->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ESET->Visible) { // ESET ?>
		<!-- ESET -->
		<td<?php echo $ivf_stimulation_chart_preview->ESET->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ESET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ESET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DOET->Visible) { // DOET ?>
		<!-- DOET -->
		<td<?php echo $ivf_stimulation_chart_preview->DOET->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DOET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DOET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
		<!-- SEMENPREPARATION -->
		<td<?php echo $ivf_stimulation_chart_preview->SEMENPREPARATION->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->SEMENPREPARATION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->SEMENPREPARATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->REASONFORESET->Visible) { // REASONFORESET ?>
		<!-- REASONFORESET -->
		<td<?php echo $ivf_stimulation_chart_preview->REASONFORESET->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->REASONFORESET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->REASONFORESET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Expectedoocytes->Visible) { // Expectedoocytes ?>
		<!-- Expectedoocytes -->
		<td<?php echo $ivf_stimulation_chart_preview->Expectedoocytes->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Expectedoocytes->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Expectedoocytes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate1->Visible) { // StChDate1 ?>
		<!-- StChDate1 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate2->Visible) { // StChDate2 ?>
		<!-- StChDate2 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate3->Visible) { // StChDate3 ?>
		<!-- StChDate3 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate4->Visible) { // StChDate4 ?>
		<!-- StChDate4 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate5->Visible) { // StChDate5 ?>
		<!-- StChDate5 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate6->Visible) { // StChDate6 ?>
		<!-- StChDate6 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate7->Visible) { // StChDate7 ?>
		<!-- StChDate7 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate8->Visible) { // StChDate8 ?>
		<!-- StChDate8 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate9->Visible) { // StChDate9 ?>
		<!-- StChDate9 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate10->Visible) { // StChDate10 ?>
		<!-- StChDate10 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate11->Visible) { // StChDate11 ?>
		<!-- StChDate11 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate12->Visible) { // StChDate12 ?>
		<!-- StChDate12 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate13->Visible) { // StChDate13 ?>
		<!-- StChDate13 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay1->Visible) { // CycleDay1 ?>
		<!-- CycleDay1 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay2->Visible) { // CycleDay2 ?>
		<!-- CycleDay2 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay3->Visible) { // CycleDay3 ?>
		<!-- CycleDay3 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay4->Visible) { // CycleDay4 ?>
		<!-- CycleDay4 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay5->Visible) { // CycleDay5 ?>
		<!-- CycleDay5 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay6->Visible) { // CycleDay6 ?>
		<!-- CycleDay6 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay7->Visible) { // CycleDay7 ?>
		<!-- CycleDay7 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay8->Visible) { // CycleDay8 ?>
		<!-- CycleDay8 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay9->Visible) { // CycleDay9 ?>
		<!-- CycleDay9 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay10->Visible) { // CycleDay10 ?>
		<!-- CycleDay10 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay11->Visible) { // CycleDay11 ?>
		<!-- CycleDay11 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay12->Visible) { // CycleDay12 ?>
		<!-- CycleDay12 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay13->Visible) { // CycleDay13 ?>
		<!-- CycleDay13 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay1->Visible) { // StimulationDay1 ?>
		<!-- StimulationDay1 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay2->Visible) { // StimulationDay2 ?>
		<!-- StimulationDay2 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay3->Visible) { // StimulationDay3 ?>
		<!-- StimulationDay3 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay4->Visible) { // StimulationDay4 ?>
		<!-- StimulationDay4 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay5->Visible) { // StimulationDay5 ?>
		<!-- StimulationDay5 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay6->Visible) { // StimulationDay6 ?>
		<!-- StimulationDay6 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay7->Visible) { // StimulationDay7 ?>
		<!-- StimulationDay7 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay8->Visible) { // StimulationDay8 ?>
		<!-- StimulationDay8 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay9->Visible) { // StimulationDay9 ?>
		<!-- StimulationDay9 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay10->Visible) { // StimulationDay10 ?>
		<!-- StimulationDay10 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay11->Visible) { // StimulationDay11 ?>
		<!-- StimulationDay11 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay12->Visible) { // StimulationDay12 ?>
		<!-- StimulationDay12 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay13->Visible) { // StimulationDay13 ?>
		<!-- StimulationDay13 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet1->Visible) { // Tablet1 ?>
		<!-- Tablet1 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet2->Visible) { // Tablet2 ?>
		<!-- Tablet2 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet3->Visible) { // Tablet3 ?>
		<!-- Tablet3 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet4->Visible) { // Tablet4 ?>
		<!-- Tablet4 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet5->Visible) { // Tablet5 ?>
		<!-- Tablet5 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet6->Visible) { // Tablet6 ?>
		<!-- Tablet6 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet7->Visible) { // Tablet7 ?>
		<!-- Tablet7 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet8->Visible) { // Tablet8 ?>
		<!-- Tablet8 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet9->Visible) { // Tablet9 ?>
		<!-- Tablet9 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet10->Visible) { // Tablet10 ?>
		<!-- Tablet10 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet11->Visible) { // Tablet11 ?>
		<!-- Tablet11 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet12->Visible) { // Tablet12 ?>
		<!-- Tablet12 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet13->Visible) { // Tablet13 ?>
		<!-- Tablet13 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH1->Visible) { // RFSH1 ?>
		<!-- RFSH1 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH2->Visible) { // RFSH2 ?>
		<!-- RFSH2 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH3->Visible) { // RFSH3 ?>
		<!-- RFSH3 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH4->Visible) { // RFSH4 ?>
		<!-- RFSH4 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH5->Visible) { // RFSH5 ?>
		<!-- RFSH5 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH6->Visible) { // RFSH6 ?>
		<!-- RFSH6 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH7->Visible) { // RFSH7 ?>
		<!-- RFSH7 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH8->Visible) { // RFSH8 ?>
		<!-- RFSH8 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH9->Visible) { // RFSH9 ?>
		<!-- RFSH9 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH10->Visible) { // RFSH10 ?>
		<!-- RFSH10 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH11->Visible) { // RFSH11 ?>
		<!-- RFSH11 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH12->Visible) { // RFSH12 ?>
		<!-- RFSH12 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH13->Visible) { // RFSH13 ?>
		<!-- RFSH13 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG1->Visible) { // HMG1 ?>
		<!-- HMG1 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG2->Visible) { // HMG2 ?>
		<!-- HMG2 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG3->Visible) { // HMG3 ?>
		<!-- HMG3 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG4->Visible) { // HMG4 ?>
		<!-- HMG4 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG5->Visible) { // HMG5 ?>
		<!-- HMG5 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG6->Visible) { // HMG6 ?>
		<!-- HMG6 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG7->Visible) { // HMG7 ?>
		<!-- HMG7 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG8->Visible) { // HMG8 ?>
		<!-- HMG8 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG9->Visible) { // HMG9 ?>
		<!-- HMG9 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG10->Visible) { // HMG10 ?>
		<!-- HMG10 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG11->Visible) { // HMG11 ?>
		<!-- HMG11 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG12->Visible) { // HMG12 ?>
		<!-- HMG12 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG13->Visible) { // HMG13 ?>
		<!-- HMG13 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH1->Visible) { // GnRH1 ?>
		<!-- GnRH1 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH2->Visible) { // GnRH2 ?>
		<!-- GnRH2 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH3->Visible) { // GnRH3 ?>
		<!-- GnRH3 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH4->Visible) { // GnRH4 ?>
		<!-- GnRH4 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH5->Visible) { // GnRH5 ?>
		<!-- GnRH5 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH6->Visible) { // GnRH6 ?>
		<!-- GnRH6 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH7->Visible) { // GnRH7 ?>
		<!-- GnRH7 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH8->Visible) { // GnRH8 ?>
		<!-- GnRH8 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH9->Visible) { // GnRH9 ?>
		<!-- GnRH9 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH10->Visible) { // GnRH10 ?>
		<!-- GnRH10 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH11->Visible) { // GnRH11 ?>
		<!-- GnRH11 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH12->Visible) { // GnRH12 ?>
		<!-- GnRH12 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH13->Visible) { // GnRH13 ?>
		<!-- GnRH13 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E21->Visible) { // E21 ?>
		<!-- E21 -->
		<td<?php echo $ivf_stimulation_chart_preview->E21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E22->Visible) { // E22 ?>
		<!-- E22 -->
		<td<?php echo $ivf_stimulation_chart_preview->E22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E23->Visible) { // E23 ?>
		<!-- E23 -->
		<td<?php echo $ivf_stimulation_chart_preview->E23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E24->Visible) { // E24 ?>
		<!-- E24 -->
		<td<?php echo $ivf_stimulation_chart_preview->E24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E25->Visible) { // E25 ?>
		<!-- E25 -->
		<td<?php echo $ivf_stimulation_chart_preview->E25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E26->Visible) { // E26 ?>
		<!-- E26 -->
		<td<?php echo $ivf_stimulation_chart_preview->E26->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E26->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E26->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E27->Visible) { // E27 ?>
		<!-- E27 -->
		<td<?php echo $ivf_stimulation_chart_preview->E27->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E27->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E27->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E28->Visible) { // E28 ?>
		<!-- E28 -->
		<td<?php echo $ivf_stimulation_chart_preview->E28->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E28->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E28->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E29->Visible) { // E29 ?>
		<!-- E29 -->
		<td<?php echo $ivf_stimulation_chart_preview->E29->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E29->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E29->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E210->Visible) { // E210 ?>
		<!-- E210 -->
		<td<?php echo $ivf_stimulation_chart_preview->E210->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E210->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E210->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E211->Visible) { // E211 ?>
		<!-- E211 -->
		<td<?php echo $ivf_stimulation_chart_preview->E211->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E211->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E211->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E212->Visible) { // E212 ?>
		<!-- E212 -->
		<td<?php echo $ivf_stimulation_chart_preview->E212->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E212->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E212->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E213->Visible) { // E213 ?>
		<!-- E213 -->
		<td<?php echo $ivf_stimulation_chart_preview->E213->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E213->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E213->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P41->Visible) { // P41 ?>
		<!-- P41 -->
		<td<?php echo $ivf_stimulation_chart_preview->P41->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P41->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P41->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P42->Visible) { // P42 ?>
		<!-- P42 -->
		<td<?php echo $ivf_stimulation_chart_preview->P42->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P42->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P42->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P43->Visible) { // P43 ?>
		<!-- P43 -->
		<td<?php echo $ivf_stimulation_chart_preview->P43->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P43->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P43->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P44->Visible) { // P44 ?>
		<!-- P44 -->
		<td<?php echo $ivf_stimulation_chart_preview->P44->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P44->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P44->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P45->Visible) { // P45 ?>
		<!-- P45 -->
		<td<?php echo $ivf_stimulation_chart_preview->P45->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P45->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P45->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P46->Visible) { // P46 ?>
		<!-- P46 -->
		<td<?php echo $ivf_stimulation_chart_preview->P46->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P46->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P46->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P47->Visible) { // P47 ?>
		<!-- P47 -->
		<td<?php echo $ivf_stimulation_chart_preview->P47->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P47->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P47->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P48->Visible) { // P48 ?>
		<!-- P48 -->
		<td<?php echo $ivf_stimulation_chart_preview->P48->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P48->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P48->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P49->Visible) { // P49 ?>
		<!-- P49 -->
		<td<?php echo $ivf_stimulation_chart_preview->P49->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P49->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P49->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P410->Visible) { // P410 ?>
		<!-- P410 -->
		<td<?php echo $ivf_stimulation_chart_preview->P410->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P410->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P410->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P411->Visible) { // P411 ?>
		<!-- P411 -->
		<td<?php echo $ivf_stimulation_chart_preview->P411->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P411->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P411->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P412->Visible) { // P412 ?>
		<!-- P412 -->
		<td<?php echo $ivf_stimulation_chart_preview->P412->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P412->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P412->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P413->Visible) { // P413 ?>
		<!-- P413 -->
		<td<?php echo $ivf_stimulation_chart_preview->P413->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P413->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P413->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt1->Visible) { // USGRt1 ?>
		<!-- USGRt1 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt2->Visible) { // USGRt2 ?>
		<!-- USGRt2 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt3->Visible) { // USGRt3 ?>
		<!-- USGRt3 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt4->Visible) { // USGRt4 ?>
		<!-- USGRt4 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt5->Visible) { // USGRt5 ?>
		<!-- USGRt5 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt6->Visible) { // USGRt6 ?>
		<!-- USGRt6 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt7->Visible) { // USGRt7 ?>
		<!-- USGRt7 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt8->Visible) { // USGRt8 ?>
		<!-- USGRt8 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt9->Visible) { // USGRt9 ?>
		<!-- USGRt9 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt10->Visible) { // USGRt10 ?>
		<!-- USGRt10 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt11->Visible) { // USGRt11 ?>
		<!-- USGRt11 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt12->Visible) { // USGRt12 ?>
		<!-- USGRt12 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt13->Visible) { // USGRt13 ?>
		<!-- USGRt13 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt1->Visible) { // USGLt1 ?>
		<!-- USGLt1 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt2->Visible) { // USGLt2 ?>
		<!-- USGLt2 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt3->Visible) { // USGLt3 ?>
		<!-- USGLt3 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt4->Visible) { // USGLt4 ?>
		<!-- USGLt4 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt5->Visible) { // USGLt5 ?>
		<!-- USGLt5 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt6->Visible) { // USGLt6 ?>
		<!-- USGLt6 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt7->Visible) { // USGLt7 ?>
		<!-- USGLt7 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt8->Visible) { // USGLt8 ?>
		<!-- USGLt8 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt9->Visible) { // USGLt9 ?>
		<!-- USGLt9 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt10->Visible) { // USGLt10 ?>
		<!-- USGLt10 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt11->Visible) { // USGLt11 ?>
		<!-- USGLt11 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt12->Visible) { // USGLt12 ?>
		<!-- USGLt12 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt13->Visible) { // USGLt13 ?>
		<!-- USGLt13 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM1->Visible) { // EM1 ?>
		<!-- EM1 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM2->Visible) { // EM2 ?>
		<!-- EM2 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM3->Visible) { // EM3 ?>
		<!-- EM3 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM4->Visible) { // EM4 ?>
		<!-- EM4 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM5->Visible) { // EM5 ?>
		<!-- EM5 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM6->Visible) { // EM6 ?>
		<!-- EM6 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM7->Visible) { // EM7 ?>
		<!-- EM7 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM8->Visible) { // EM8 ?>
		<!-- EM8 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM9->Visible) { // EM9 ?>
		<!-- EM9 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM10->Visible) { // EM10 ?>
		<!-- EM10 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM11->Visible) { // EM11 ?>
		<!-- EM11 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM12->Visible) { // EM12 ?>
		<!-- EM12 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM13->Visible) { // EM13 ?>
		<!-- EM13 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others1->Visible) { // Others1 ?>
		<!-- Others1 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others2->Visible) { // Others2 ?>
		<!-- Others2 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others3->Visible) { // Others3 ?>
		<!-- Others3 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others4->Visible) { // Others4 ?>
		<!-- Others4 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others5->Visible) { // Others5 ?>
		<!-- Others5 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others6->Visible) { // Others6 ?>
		<!-- Others6 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others7->Visible) { // Others7 ?>
		<!-- Others7 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others8->Visible) { // Others8 ?>
		<!-- Others8 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others9->Visible) { // Others9 ?>
		<!-- Others9 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others10->Visible) { // Others10 ?>
		<!-- Others10 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others11->Visible) { // Others11 ?>
		<!-- Others11 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others12->Visible) { // Others12 ?>
		<!-- Others12 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others13->Visible) { // Others13 ?>
		<!-- Others13 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR1->Visible) { // DR1 ?>
		<!-- DR1 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR1->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR2->Visible) { // DR2 ?>
		<!-- DR2 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR2->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR3->Visible) { // DR3 ?>
		<!-- DR3 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR3->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR4->Visible) { // DR4 ?>
		<!-- DR4 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR4->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR5->Visible) { // DR5 ?>
		<!-- DR5 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR5->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR6->Visible) { // DR6 ?>
		<!-- DR6 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR6->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR7->Visible) { // DR7 ?>
		<!-- DR7 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR7->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR8->Visible) { // DR8 ?>
		<!-- DR8 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR8->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR9->Visible) { // DR9 ?>
		<!-- DR9 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR9->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR10->Visible) { // DR10 ?>
		<!-- DR10 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR10->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR11->Visible) { // DR11 ?>
		<!-- DR11 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR11->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR12->Visible) { // DR12 ?>
		<!-- DR12 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR12->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR13->Visible) { // DR13 ?>
		<!-- DR13 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR13->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_stimulation_chart_preview->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->TidNo->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Convert->Visible) { // Convert ?>
		<!-- Convert -->
		<td<?php echo $ivf_stimulation_chart_preview->Convert->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Convert->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Convert->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Consultant->Visible) { // Consultant ?>
		<!-- Consultant -->
		<td<?php echo $ivf_stimulation_chart_preview->Consultant->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Consultant->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Consultant->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<!-- InseminatinTechnique -->
		<td<?php echo $ivf_stimulation_chart_preview->InseminatinTechnique->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->InseminatinTechnique->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->IndicationForART->Visible) { // IndicationForART ?>
		<!-- IndicationForART -->
		<td<?php echo $ivf_stimulation_chart_preview->IndicationForART->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->IndicationForART->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->IndicationForART->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<!-- Hysteroscopy -->
		<td<?php echo $ivf_stimulation_chart_preview->Hysteroscopy->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Hysteroscopy->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Hysteroscopy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<!-- EndometrialScratching -->
		<td<?php echo $ivf_stimulation_chart_preview->EndometrialScratching->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EndometrialScratching->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EndometrialScratching->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TrialCannulation->Visible) { // TrialCannulation ?>
		<!-- TrialCannulation -->
		<td<?php echo $ivf_stimulation_chart_preview->TrialCannulation->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->TrialCannulation->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->TrialCannulation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<!-- CYCLETYPE -->
		<td<?php echo $ivf_stimulation_chart_preview->CYCLETYPE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CYCLETYPE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CYCLETYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<!-- HRTCYCLE -->
		<td<?php echo $ivf_stimulation_chart_preview->HRTCYCLE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HRTCYCLE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HRTCYCLE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<!-- OralEstrogenDosage -->
		<td<?php echo $ivf_stimulation_chart_preview->OralEstrogenDosage->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->OralEstrogenDosage->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->OralEstrogenDosage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<!-- VaginalEstrogen -->
		<td<?php echo $ivf_stimulation_chart_preview->VaginalEstrogen->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->VaginalEstrogen->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->VaginalEstrogen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GCSF->Visible) { // GCSF ?>
		<!-- GCSF -->
		<td<?php echo $ivf_stimulation_chart_preview->GCSF->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GCSF->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GCSF->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<!-- ActivatedPRP -->
		<td<?php echo $ivf_stimulation_chart_preview->ActivatedPRP->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ActivatedPRP->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ActivatedPRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->UCLcm->Visible) { // UCLcm ?>
		<!-- UCLcm -->
		<td<?php echo $ivf_stimulation_chart_preview->UCLcm->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->UCLcm->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->UCLcm->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
		<!-- DATOFEMBRYOTRANSFER -->
		<td<?php echo $ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<!-- DAYOFEMBRYOTRANSFER -->
		<td<?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<!-- NOOFEMBRYOSTHAWED -->
		<td<?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<!-- NOOFEMBRYOSTRANSFERRED -->
		<td<?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<!-- DAYOFEMBRYOS -->
		<td<?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DAYOFEMBRYOS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<!-- CRYOPRESERVEDEMBRYOS -->
		<td<?php echo $ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ViaAdmin->Visible) { // ViaAdmin ?>
		<!-- ViaAdmin -->
		<td<?php echo $ivf_stimulation_chart_preview->ViaAdmin->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ViaAdmin->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ViaAdmin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
		<!-- ViaStartDateTime -->
		<td<?php echo $ivf_stimulation_chart_preview->ViaStartDateTime->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ViaStartDateTime->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ViaStartDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ViaDose->Visible) { // ViaDose ?>
		<!-- ViaDose -->
		<td<?php echo $ivf_stimulation_chart_preview->ViaDose->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ViaDose->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ViaDose->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->AllFreeze->Visible) { // AllFreeze ?>
		<!-- AllFreeze -->
		<td<?php echo $ivf_stimulation_chart_preview->AllFreeze->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->AllFreeze->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->AllFreeze->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TreatmentCancel->Visible) { // TreatmentCancel ?>
		<!-- TreatmentCancel -->
		<td<?php echo $ivf_stimulation_chart_preview->TreatmentCancel->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->TreatmentCancel->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->TreatmentCancel->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
		<!-- ProgesteroneAdmin -->
		<td<?php echo $ivf_stimulation_chart_preview->ProgesteroneAdmin->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ProgesteroneAdmin->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ProgesteroneAdmin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
		<!-- ProgesteroneStart -->
		<td<?php echo $ivf_stimulation_chart_preview->ProgesteroneStart->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ProgesteroneStart->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ProgesteroneStart->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
		<!-- ProgesteroneDose -->
		<td<?php echo $ivf_stimulation_chart_preview->ProgesteroneDose->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ProgesteroneDose->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ProgesteroneDose->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate14->Visible) { // StChDate14 ?>
		<!-- StChDate14 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate15->Visible) { // StChDate15 ?>
		<!-- StChDate15 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate16->Visible) { // StChDate16 ?>
		<!-- StChDate16 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate17->Visible) { // StChDate17 ?>
		<!-- StChDate17 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate18->Visible) { // StChDate18 ?>
		<!-- StChDate18 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate19->Visible) { // StChDate19 ?>
		<!-- StChDate19 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate20->Visible) { // StChDate20 ?>
		<!-- StChDate20 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate21->Visible) { // StChDate21 ?>
		<!-- StChDate21 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate22->Visible) { // StChDate22 ?>
		<!-- StChDate22 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate23->Visible) { // StChDate23 ?>
		<!-- StChDate23 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate24->Visible) { // StChDate24 ?>
		<!-- StChDate24 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StChDate25->Visible) { // StChDate25 ?>
		<!-- StChDate25 -->
		<td<?php echo $ivf_stimulation_chart_preview->StChDate25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StChDate25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StChDate25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay14->Visible) { // CycleDay14 ?>
		<!-- CycleDay14 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay15->Visible) { // CycleDay15 ?>
		<!-- CycleDay15 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay16->Visible) { // CycleDay16 ?>
		<!-- CycleDay16 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay17->Visible) { // CycleDay17 ?>
		<!-- CycleDay17 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay18->Visible) { // CycleDay18 ?>
		<!-- CycleDay18 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay19->Visible) { // CycleDay19 ?>
		<!-- CycleDay19 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay20->Visible) { // CycleDay20 ?>
		<!-- CycleDay20 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay21->Visible) { // CycleDay21 ?>
		<!-- CycleDay21 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay22->Visible) { // CycleDay22 ?>
		<!-- CycleDay22 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay23->Visible) { // CycleDay23 ?>
		<!-- CycleDay23 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay24->Visible) { // CycleDay24 ?>
		<!-- CycleDay24 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->CycleDay25->Visible) { // CycleDay25 ?>
		<!-- CycleDay25 -->
		<td<?php echo $ivf_stimulation_chart_preview->CycleDay25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->CycleDay25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->CycleDay25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay14->Visible) { // StimulationDay14 ?>
		<!-- StimulationDay14 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay15->Visible) { // StimulationDay15 ?>
		<!-- StimulationDay15 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay16->Visible) { // StimulationDay16 ?>
		<!-- StimulationDay16 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay17->Visible) { // StimulationDay17 ?>
		<!-- StimulationDay17 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay18->Visible) { // StimulationDay18 ?>
		<!-- StimulationDay18 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay19->Visible) { // StimulationDay19 ?>
		<!-- StimulationDay19 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay20->Visible) { // StimulationDay20 ?>
		<!-- StimulationDay20 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay21->Visible) { // StimulationDay21 ?>
		<!-- StimulationDay21 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay22->Visible) { // StimulationDay22 ?>
		<!-- StimulationDay22 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay23->Visible) { // StimulationDay23 ?>
		<!-- StimulationDay23 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay24->Visible) { // StimulationDay24 ?>
		<!-- StimulationDay24 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->StimulationDay25->Visible) { // StimulationDay25 ?>
		<!-- StimulationDay25 -->
		<td<?php echo $ivf_stimulation_chart_preview->StimulationDay25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->StimulationDay25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->StimulationDay25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet14->Visible) { // Tablet14 ?>
		<!-- Tablet14 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet15->Visible) { // Tablet15 ?>
		<!-- Tablet15 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet16->Visible) { // Tablet16 ?>
		<!-- Tablet16 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet17->Visible) { // Tablet17 ?>
		<!-- Tablet17 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet18->Visible) { // Tablet18 ?>
		<!-- Tablet18 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet19->Visible) { // Tablet19 ?>
		<!-- Tablet19 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet20->Visible) { // Tablet20 ?>
		<!-- Tablet20 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet21->Visible) { // Tablet21 ?>
		<!-- Tablet21 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet22->Visible) { // Tablet22 ?>
		<!-- Tablet22 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet23->Visible) { // Tablet23 ?>
		<!-- Tablet23 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet24->Visible) { // Tablet24 ?>
		<!-- Tablet24 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Tablet25->Visible) { // Tablet25 ?>
		<!-- Tablet25 -->
		<td<?php echo $ivf_stimulation_chart_preview->Tablet25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Tablet25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Tablet25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH14->Visible) { // RFSH14 ?>
		<!-- RFSH14 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH15->Visible) { // RFSH15 ?>
		<!-- RFSH15 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH16->Visible) { // RFSH16 ?>
		<!-- RFSH16 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH17->Visible) { // RFSH17 ?>
		<!-- RFSH17 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH18->Visible) { // RFSH18 ?>
		<!-- RFSH18 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH19->Visible) { // RFSH19 ?>
		<!-- RFSH19 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH20->Visible) { // RFSH20 ?>
		<!-- RFSH20 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH21->Visible) { // RFSH21 ?>
		<!-- RFSH21 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH22->Visible) { // RFSH22 ?>
		<!-- RFSH22 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH23->Visible) { // RFSH23 ?>
		<!-- RFSH23 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH24->Visible) { // RFSH24 ?>
		<!-- RFSH24 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->RFSH25->Visible) { // RFSH25 ?>
		<!-- RFSH25 -->
		<td<?php echo $ivf_stimulation_chart_preview->RFSH25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->RFSH25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->RFSH25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG14->Visible) { // HMG14 ?>
		<!-- HMG14 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG15->Visible) { // HMG15 ?>
		<!-- HMG15 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG16->Visible) { // HMG16 ?>
		<!-- HMG16 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG17->Visible) { // HMG17 ?>
		<!-- HMG17 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG18->Visible) { // HMG18 ?>
		<!-- HMG18 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG19->Visible) { // HMG19 ?>
		<!-- HMG19 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG20->Visible) { // HMG20 ?>
		<!-- HMG20 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG21->Visible) { // HMG21 ?>
		<!-- HMG21 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG22->Visible) { // HMG22 ?>
		<!-- HMG22 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG23->Visible) { // HMG23 ?>
		<!-- HMG23 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG24->Visible) { // HMG24 ?>
		<!-- HMG24 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HMG25->Visible) { // HMG25 ?>
		<!-- HMG25 -->
		<td<?php echo $ivf_stimulation_chart_preview->HMG25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HMG25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HMG25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH14->Visible) { // GnRH14 ?>
		<!-- GnRH14 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH15->Visible) { // GnRH15 ?>
		<!-- GnRH15 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH16->Visible) { // GnRH16 ?>
		<!-- GnRH16 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH17->Visible) { // GnRH17 ?>
		<!-- GnRH17 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH18->Visible) { // GnRH18 ?>
		<!-- GnRH18 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH19->Visible) { // GnRH19 ?>
		<!-- GnRH19 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH20->Visible) { // GnRH20 ?>
		<!-- GnRH20 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH21->Visible) { // GnRH21 ?>
		<!-- GnRH21 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH22->Visible) { // GnRH22 ?>
		<!-- GnRH22 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH23->Visible) { // GnRH23 ?>
		<!-- GnRH23 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH24->Visible) { // GnRH24 ?>
		<!-- GnRH24 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->GnRH25->Visible) { // GnRH25 ?>
		<!-- GnRH25 -->
		<td<?php echo $ivf_stimulation_chart_preview->GnRH25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->GnRH25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->GnRH25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P414->Visible) { // P414 ?>
		<!-- P414 -->
		<td<?php echo $ivf_stimulation_chart_preview->P414->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P414->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P414->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P415->Visible) { // P415 ?>
		<!-- P415 -->
		<td<?php echo $ivf_stimulation_chart_preview->P415->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P415->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P415->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P416->Visible) { // P416 ?>
		<!-- P416 -->
		<td<?php echo $ivf_stimulation_chart_preview->P416->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P416->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P416->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P417->Visible) { // P417 ?>
		<!-- P417 -->
		<td<?php echo $ivf_stimulation_chart_preview->P417->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P417->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P417->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P418->Visible) { // P418 ?>
		<!-- P418 -->
		<td<?php echo $ivf_stimulation_chart_preview->P418->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P418->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P418->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P419->Visible) { // P419 ?>
		<!-- P419 -->
		<td<?php echo $ivf_stimulation_chart_preview->P419->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P419->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P419->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P420->Visible) { // P420 ?>
		<!-- P420 -->
		<td<?php echo $ivf_stimulation_chart_preview->P420->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P420->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P420->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P421->Visible) { // P421 ?>
		<!-- P421 -->
		<td<?php echo $ivf_stimulation_chart_preview->P421->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P421->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P421->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P422->Visible) { // P422 ?>
		<!-- P422 -->
		<td<?php echo $ivf_stimulation_chart_preview->P422->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P422->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P422->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P423->Visible) { // P423 ?>
		<!-- P423 -->
		<td<?php echo $ivf_stimulation_chart_preview->P423->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P423->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P423->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P424->Visible) { // P424 ?>
		<!-- P424 -->
		<td<?php echo $ivf_stimulation_chart_preview->P424->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P424->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P424->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->P425->Visible) { // P425 ?>
		<!-- P425 -->
		<td<?php echo $ivf_stimulation_chart_preview->P425->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->P425->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->P425->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt14->Visible) { // USGRt14 ?>
		<!-- USGRt14 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt15->Visible) { // USGRt15 ?>
		<!-- USGRt15 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt16->Visible) { // USGRt16 ?>
		<!-- USGRt16 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt17->Visible) { // USGRt17 ?>
		<!-- USGRt17 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt18->Visible) { // USGRt18 ?>
		<!-- USGRt18 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt19->Visible) { // USGRt19 ?>
		<!-- USGRt19 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt20->Visible) { // USGRt20 ?>
		<!-- USGRt20 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt21->Visible) { // USGRt21 ?>
		<!-- USGRt21 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt22->Visible) { // USGRt22 ?>
		<!-- USGRt22 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt23->Visible) { // USGRt23 ?>
		<!-- USGRt23 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt24->Visible) { // USGRt24 ?>
		<!-- USGRt24 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGRt25->Visible) { // USGRt25 ?>
		<!-- USGRt25 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGRt25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGRt25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGRt25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt14->Visible) { // USGLt14 ?>
		<!-- USGLt14 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt15->Visible) { // USGLt15 ?>
		<!-- USGLt15 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt16->Visible) { // USGLt16 ?>
		<!-- USGLt16 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt17->Visible) { // USGLt17 ?>
		<!-- USGLt17 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt18->Visible) { // USGLt18 ?>
		<!-- USGLt18 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt19->Visible) { // USGLt19 ?>
		<!-- USGLt19 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt20->Visible) { // USGLt20 ?>
		<!-- USGLt20 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt21->Visible) { // USGLt21 ?>
		<!-- USGLt21 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt22->Visible) { // USGLt22 ?>
		<!-- USGLt22 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt23->Visible) { // USGLt23 ?>
		<!-- USGLt23 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt24->Visible) { // USGLt24 ?>
		<!-- USGLt24 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->USGLt25->Visible) { // USGLt25 ?>
		<!-- USGLt25 -->
		<td<?php echo $ivf_stimulation_chart_preview->USGLt25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->USGLt25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->USGLt25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM14->Visible) { // EM14 ?>
		<!-- EM14 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM15->Visible) { // EM15 ?>
		<!-- EM15 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM16->Visible) { // EM16 ?>
		<!-- EM16 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM17->Visible) { // EM17 ?>
		<!-- EM17 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM18->Visible) { // EM18 ?>
		<!-- EM18 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM19->Visible) { // EM19 ?>
		<!-- EM19 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM20->Visible) { // EM20 ?>
		<!-- EM20 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM21->Visible) { // EM21 ?>
		<!-- EM21 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM22->Visible) { // EM22 ?>
		<!-- EM22 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM23->Visible) { // EM23 ?>
		<!-- EM23 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM24->Visible) { // EM24 ?>
		<!-- EM24 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EM25->Visible) { // EM25 ?>
		<!-- EM25 -->
		<td<?php echo $ivf_stimulation_chart_preview->EM25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EM25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EM25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others14->Visible) { // Others14 ?>
		<!-- Others14 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others15->Visible) { // Others15 ?>
		<!-- Others15 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others16->Visible) { // Others16 ?>
		<!-- Others16 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others17->Visible) { // Others17 ?>
		<!-- Others17 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others18->Visible) { // Others18 ?>
		<!-- Others18 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others19->Visible) { // Others19 ?>
		<!-- Others19 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others20->Visible) { // Others20 ?>
		<!-- Others20 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others21->Visible) { // Others21 ?>
		<!-- Others21 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others22->Visible) { // Others22 ?>
		<!-- Others22 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others23->Visible) { // Others23 ?>
		<!-- Others23 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others24->Visible) { // Others24 ?>
		<!-- Others24 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->Others25->Visible) { // Others25 ?>
		<!-- Others25 -->
		<td<?php echo $ivf_stimulation_chart_preview->Others25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->Others25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->Others25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR14->Visible) { // DR14 ?>
		<!-- DR14 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR14->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR15->Visible) { // DR15 ?>
		<!-- DR15 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR15->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR16->Visible) { // DR16 ?>
		<!-- DR16 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR16->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR17->Visible) { // DR17 ?>
		<!-- DR17 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR17->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR18->Visible) { // DR18 ?>
		<!-- DR18 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR18->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR19->Visible) { // DR19 ?>
		<!-- DR19 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR19->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR20->Visible) { // DR20 ?>
		<!-- DR20 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR20->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR21->Visible) { // DR21 ?>
		<!-- DR21 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR21->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR22->Visible) { // DR22 ?>
		<!-- DR22 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR22->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR23->Visible) { // DR23 ?>
		<!-- DR23 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR23->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR24->Visible) { // DR24 ?>
		<!-- DR24 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR24->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DR25->Visible) { // DR25 ?>
		<!-- DR25 -->
		<td<?php echo $ivf_stimulation_chart_preview->DR25->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DR25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DR25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E214->Visible) { // E214 ?>
		<!-- E214 -->
		<td<?php echo $ivf_stimulation_chart_preview->E214->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E214->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E214->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E215->Visible) { // E215 ?>
		<!-- E215 -->
		<td<?php echo $ivf_stimulation_chart_preview->E215->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E215->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E215->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E216->Visible) { // E216 ?>
		<!-- E216 -->
		<td<?php echo $ivf_stimulation_chart_preview->E216->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E216->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E216->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E217->Visible) { // E217 ?>
		<!-- E217 -->
		<td<?php echo $ivf_stimulation_chart_preview->E217->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E217->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E217->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E218->Visible) { // E218 ?>
		<!-- E218 -->
		<td<?php echo $ivf_stimulation_chart_preview->E218->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E218->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E218->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E219->Visible) { // E219 ?>
		<!-- E219 -->
		<td<?php echo $ivf_stimulation_chart_preview->E219->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E219->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E219->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E220->Visible) { // E220 ?>
		<!-- E220 -->
		<td<?php echo $ivf_stimulation_chart_preview->E220->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E220->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E220->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E221->Visible) { // E221 ?>
		<!-- E221 -->
		<td<?php echo $ivf_stimulation_chart_preview->E221->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E221->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E221->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E222->Visible) { // E222 ?>
		<!-- E222 -->
		<td<?php echo $ivf_stimulation_chart_preview->E222->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E222->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E222->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E223->Visible) { // E223 ?>
		<!-- E223 -->
		<td<?php echo $ivf_stimulation_chart_preview->E223->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E223->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E223->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E224->Visible) { // E224 ?>
		<!-- E224 -->
		<td<?php echo $ivf_stimulation_chart_preview->E224->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E224->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E224->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->E225->Visible) { // E225 ?>
		<!-- E225 -->
		<td<?php echo $ivf_stimulation_chart_preview->E225->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->E225->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->E225->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EEETTTDTE->Visible) { // EEETTTDTE ?>
		<!-- EEETTTDTE -->
		<td<?php echo $ivf_stimulation_chart_preview->EEETTTDTE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EEETTTDTE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EEETTTDTE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->bhcgdate->Visible) { // bhcgdate ?>
		<!-- bhcgdate -->
		<td<?php echo $ivf_stimulation_chart_preview->bhcgdate->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->bhcgdate->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->bhcgdate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
		<!-- TUBAL_PATENCY -->
		<td<?php echo $ivf_stimulation_chart_preview->TUBAL_PATENCY->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->TUBAL_PATENCY->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->TUBAL_PATENCY->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->HSG->Visible) { // HSG ?>
		<!-- HSG -->
		<td<?php echo $ivf_stimulation_chart_preview->HSG->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->HSG->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->HSG->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->DHL->Visible) { // DHL ?>
		<!-- DHL -->
		<td<?php echo $ivf_stimulation_chart_preview->DHL->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->DHL->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->DHL->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
		<!-- UTERINE_PROBLEMS -->
		<td<?php echo $ivf_stimulation_chart_preview->UTERINE_PROBLEMS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->UTERINE_PROBLEMS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->UTERINE_PROBLEMS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
		<!-- W_COMORBIDS -->
		<td<?php echo $ivf_stimulation_chart_preview->W_COMORBIDS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->W_COMORBIDS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->W_COMORBIDS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
		<!-- H_COMORBIDS -->
		<td<?php echo $ivf_stimulation_chart_preview->H_COMORBIDS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->H_COMORBIDS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->H_COMORBIDS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
		<!-- SEXUAL_DYSFUNCTION -->
		<td<?php echo $ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->TABLETS->Visible) { // TABLETS ?>
		<!-- TABLETS -->
		<td<?php echo $ivf_stimulation_chart_preview->TABLETS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->TABLETS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->TABLETS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
		<!-- FOLLICLE_STATUS -->
		<td<?php echo $ivf_stimulation_chart_preview->FOLLICLE_STATUS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->FOLLICLE_STATUS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->FOLLICLE_STATUS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
		<!-- NUMBER_OF_IUI -->
		<td<?php echo $ivf_stimulation_chart_preview->NUMBER_OF_IUI->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->NUMBER_OF_IUI->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->NUMBER_OF_IUI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->PROCEDURE->Visible) { // PROCEDURE ?>
		<!-- PROCEDURE -->
		<td<?php echo $ivf_stimulation_chart_preview->PROCEDURE->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->PROCEDURE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->PROCEDURE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
		<!-- LUTEAL_SUPPORT -->
		<td<?php echo $ivf_stimulation_chart_preview->LUTEAL_SUPPORT->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->LUTEAL_SUPPORT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->LUTEAL_SUPPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
		<!-- SPECIFIC_MATERNAL_PROBLEMS -->
		<td<?php echo $ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
		<!-- ONGOING_PREG -->
		<td<?php echo $ivf_stimulation_chart_preview->ONGOING_PREG->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->ONGOING_PREG->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->ONGOING_PREG->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_preview->EDD_Date->Visible) { // EDD_Date ?>
		<!-- EDD_Date -->
		<td<?php echo $ivf_stimulation_chart_preview->EDD_Date->cellAttributes() ?>>
<span<?php echo $ivf_stimulation_chart_preview->EDD_Date->viewAttributes() ?>><?php echo $ivf_stimulation_chart_preview->EDD_Date->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_stimulation_chart_preview->ListOptions->render("body", "right", $ivf_stimulation_chart_preview->RowCount);
?>
	</tr>
<?php
	$ivf_stimulation_chart_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $ivf_stimulation_chart_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_stimulation_chart_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($ivf_stimulation_chart_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$ivf_stimulation_chart_preview->showPageFooter();
if (Config("DEBUG"))
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
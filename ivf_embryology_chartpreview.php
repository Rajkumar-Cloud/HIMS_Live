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
$ivf_embryology_chart_preview = new ivf_embryology_chart_preview();

// Run the page
$ivf_embryology_chart_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_embryology_chart_preview->Page_Render();
?>
<?php $ivf_embryology_chart_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_embryology_chart"><!-- .card -->
<?php if ($ivf_embryology_chart_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_embryology_chart_preview->renderListOptions();

// Render list options (header, left)
$ivf_embryology_chart_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_embryology_chart->id->Visible) { // id ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->id) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->id->headerCellClass() ?>"><?php echo $ivf_embryology_chart->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->id->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->id->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->id->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->RIDNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->RIDNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->RIDNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->RIDNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->RIDNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Name->Visible) { // Name ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Name) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Name->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Name->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Name->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Name->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->ARTCycle) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->ARTCycle->headerCellClass() ?>"><?php echo $ivf_embryology_chart->ARTCycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->ARTCycle->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ARTCycle->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ARTCycle->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ARTCycle->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->SpermOrigin->Visible) { // SpermOrigin ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->SpermOrigin) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->SpermOrigin->headerCellClass() ?>"><?php echo $ivf_embryology_chart->SpermOrigin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->SpermOrigin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->SpermOrigin->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->SpermOrigin->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->SpermOrigin->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->SpermOrigin->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->InseminatinTechnique) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->InseminatinTechnique->headerCellClass() ?>"><?php echo $ivf_embryology_chart->InseminatinTechnique->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->InseminatinTechnique->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->InseminatinTechnique->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->InseminatinTechnique->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->InseminatinTechnique->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->IndicationForART->Visible) { // IndicationForART ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->IndicationForART) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->IndicationForART->headerCellClass() ?>"><?php echo $ivf_embryology_chart->IndicationForART->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->IndicationForART->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->IndicationForART->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->IndicationForART->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->IndicationForART->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->IndicationForART->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0sino->Visible) { // Day0sino ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0sino) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0sino->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day0sino->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0sino->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day0sino->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0sino->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0sino->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0sino->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0OocyteStage) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0OocyteStage->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day0OocyteStage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0OocyteStage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day0OocyteStage->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0OocyteStage->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0OocyteStage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0OocyteStage->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0PolarBodyPosition) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day0PolarBodyPosition->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0PolarBodyPosition->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0PolarBodyPosition->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0PolarBodyPosition->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Breakage->Visible) { // Day0Breakage ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0Breakage) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0Breakage->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day0Breakage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0Breakage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day0Breakage->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0Breakage->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0Breakage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0Breakage->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Attempts->Visible) { // Day0Attempts ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0Attempts) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0Attempts->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day0Attempts->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0Attempts->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day0Attempts->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0Attempts->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0Attempts->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0Attempts->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0SPZMorpho) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0SPZMorpho->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day0SPZMorpho->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0SPZMorpho->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day0SPZMorpho->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0SPZMorpho->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0SPZMorpho->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0SPZMorpho->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0SPZLocation) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0SPZLocation->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day0SPZLocation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0SPZLocation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day0SPZLocation->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0SPZLocation->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0SPZLocation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0SPZLocation->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day0SpOrgin) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0SpOrgin->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day0SpOrgin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day0SpOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day0SpOrgin->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0SpOrgin->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day0SpOrgin->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day0SpOrgin->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5Cryoptop) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Cryoptop->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day5Cryoptop->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day5Cryoptop->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5Cryoptop->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Cryoptop->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5Cryoptop->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Sperm->Visible) { // Day1Sperm ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1Sperm) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Sperm->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day1Sperm->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Sperm->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day1Sperm->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1Sperm->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Sperm->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1Sperm->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PN->Visible) { // Day1PN ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1PN) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1PN->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day1PN->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1PN->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day1PN->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1PN->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1PN->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1PN->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PB->Visible) { // Day1PB ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1PB) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1PB->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day1PB->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1PB->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day1PB->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1PB->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1PB->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1PB->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1Pronucleus) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Pronucleus->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day1Pronucleus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Pronucleus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day1Pronucleus->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1Pronucleus->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Pronucleus->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1Pronucleus->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1Nucleolus) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Nucleolus->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day1Nucleolus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Nucleolus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day1Nucleolus->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1Nucleolus->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Nucleolus->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1Nucleolus->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Halo->Visible) { // Day1Halo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1Halo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Halo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day1Halo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1Halo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day1Halo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1Halo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1Halo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1Halo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2SiNo->Visible) { // Day2SiNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2SiNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2SiNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day2SiNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day2SiNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2SiNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2SiNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2SiNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2CellNo->Visible) { // Day2CellNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2CellNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2CellNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day2CellNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day2CellNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2CellNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2CellNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2CellNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Frag->Visible) { // Day2Frag ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2Frag) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Frag->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day2Frag->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Frag->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day2Frag->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2Frag->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Frag->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2Frag->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Symmetry->Visible) { // Day2Symmetry ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2Symmetry) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Symmetry->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day2Symmetry->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Symmetry->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day2Symmetry->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2Symmetry->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Symmetry->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2Symmetry->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2Cryoptop) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Cryoptop->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day2Cryoptop->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day2Cryoptop->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2Cryoptop->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Cryoptop->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2Cryoptop->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Grade->Visible) { // Day2Grade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2Grade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Grade->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day2Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day2Grade->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2Grade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2Grade->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2Grade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2End->Visible) { // Day2End ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day2End) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2End->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day2End->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day2End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day2End->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2End->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day2End->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day2End->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Sino->Visible) { // Day3Sino ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Sino) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Sino->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day3Sino->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Sino->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day3Sino->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Sino->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Sino->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Sino->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3CellNo->Visible) { // Day3CellNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3CellNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3CellNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day3CellNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day3CellNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3CellNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3CellNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3CellNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Frag->Visible) { // Day3Frag ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Frag) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Frag->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day3Frag->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Frag->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day3Frag->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Frag->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Frag->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Frag->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Symmetry->Visible) { // Day3Symmetry ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Symmetry) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Symmetry->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day3Symmetry->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Symmetry->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day3Symmetry->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Symmetry->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Symmetry->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Symmetry->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3ZP->Visible) { // Day3ZP ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3ZP) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3ZP->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day3ZP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3ZP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day3ZP->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3ZP->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3ZP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3ZP->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Vacoules->Visible) { // Day3Vacoules ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Vacoules) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Vacoules->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day3Vacoules->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Vacoules->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day3Vacoules->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Vacoules->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Vacoules->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Vacoules->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Grade->Visible) { // Day3Grade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Grade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Grade->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day3Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day3Grade->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Grade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Grade->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Grade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3Cryoptop) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Cryoptop->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day3Cryoptop->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day3Cryoptop->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Cryoptop->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3Cryoptop->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3Cryoptop->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3End->Visible) { // Day3End ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day3End) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3End->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day3End->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day3End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day3End->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3End->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day3End->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day3End->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4SiNo->Visible) { // Day4SiNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4SiNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4SiNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day4SiNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day4SiNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4SiNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4SiNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4SiNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4CellNo->Visible) { // Day4CellNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4CellNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4CellNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day4CellNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day4CellNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4CellNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4CellNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4CellNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Frag->Visible) { // Day4Frag ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4Frag) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Frag->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day4Frag->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Frag->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day4Frag->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4Frag->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Frag->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4Frag->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Symmetry->Visible) { // Day4Symmetry ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4Symmetry) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Symmetry->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day4Symmetry->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Symmetry->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day4Symmetry->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4Symmetry->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Symmetry->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4Symmetry->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Grade->Visible) { // Day4Grade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4Grade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Grade->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day4Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day4Grade->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4Grade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Grade->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4Grade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4Cryoptop) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Cryoptop->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day4Cryoptop->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day4Cryoptop->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4Cryoptop->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4Cryoptop->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4Cryoptop->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4End->Visible) { // Day4End ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day4End) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4End->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day4End->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day4End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day4End->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4End->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day4End->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day4End->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5CellNo->Visible) { // Day5CellNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5CellNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5CellNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day5CellNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day5CellNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5CellNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5CellNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5CellNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5ICM->Visible) { // Day5ICM ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5ICM) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5ICM->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day5ICM->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5ICM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day5ICM->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5ICM->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5ICM->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5ICM->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5TE->Visible) { // Day5TE ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5TE) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5TE->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day5TE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5TE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day5TE->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5TE->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5TE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5TE->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Observation->Visible) { // Day5Observation ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5Observation) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Observation->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day5Observation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Observation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day5Observation->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5Observation->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Observation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5Observation->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Collapsed->Visible) { // Day5Collapsed ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5Collapsed) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Collapsed->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day5Collapsed->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Collapsed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day5Collapsed->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5Collapsed->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Collapsed->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5Collapsed->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5Vacoulles) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Vacoulles->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day5Vacoulles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Vacoulles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day5Vacoulles->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5Vacoulles->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Vacoulles->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5Vacoulles->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Grade->Visible) { // Day5Grade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day5Grade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Grade->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day5Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day5Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day5Grade->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5Grade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day5Grade->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day5Grade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6CellNo->Visible) { // Day6CellNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6CellNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6CellNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day6CellNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day6CellNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6CellNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6CellNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6CellNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6ICM->Visible) { // Day6ICM ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6ICM) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6ICM->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day6ICM->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6ICM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day6ICM->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6ICM->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6ICM->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6ICM->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6TE->Visible) { // Day6TE ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6TE) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6TE->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day6TE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6TE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day6TE->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6TE->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6TE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6TE->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Observation->Visible) { // Day6Observation ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6Observation) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Observation->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day6Observation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Observation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day6Observation->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6Observation->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Observation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6Observation->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Collapsed->Visible) { // Day6Collapsed ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6Collapsed) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Collapsed->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day6Collapsed->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Collapsed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day6Collapsed->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6Collapsed->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Collapsed->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6Collapsed->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6Vacoulles) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Vacoulles->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day6Vacoulles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Vacoulles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day6Vacoulles->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6Vacoulles->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Vacoulles->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6Vacoulles->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Grade->Visible) { // Day6Grade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6Grade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Grade->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day6Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day6Grade->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6Grade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Grade->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6Grade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day6Cryoptop) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Cryoptop->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day6Cryoptop->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day6Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day6Cryoptop->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6Cryoptop->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day6Cryoptop->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day6Cryoptop->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->EndSiNo->Visible) { // EndSiNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->EndSiNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->EndSiNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->EndSiNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->EndSiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->EndSiNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->EndSiNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndSiNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->EndSiNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingDay->Visible) { // EndingDay ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->EndingDay) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->EndingDay->headerCellClass() ?>"><?php echo $ivf_embryology_chart->EndingDay->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->EndingDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->EndingDay->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->EndingDay->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingDay->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->EndingDay->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingCellStage->Visible) { // EndingCellStage ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->EndingCellStage) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->EndingCellStage->headerCellClass() ?>"><?php echo $ivf_embryology_chart->EndingCellStage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->EndingCellStage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->EndingCellStage->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->EndingCellStage->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingCellStage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->EndingCellStage->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingGrade->Visible) { // EndingGrade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->EndingGrade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->EndingGrade->headerCellClass() ?>"><?php echo $ivf_embryology_chart->EndingGrade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->EndingGrade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->EndingGrade->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->EndingGrade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingGrade->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->EndingGrade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingState->Visible) { // EndingState ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->EndingState) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->EndingState->headerCellClass() ?>"><?php echo $ivf_embryology_chart->EndingState->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->EndingState->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->EndingState->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->EndingState->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->EndingState->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->EndingState->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->TidNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->TidNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->TidNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->TidNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->TidNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->DidNO->Visible) { // DidNO ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->DidNO) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->DidNO->headerCellClass() ?>"><?php echo $ivf_embryology_chart->DidNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->DidNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->DidNO->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->DidNO->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->DidNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->DidNO->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->ICSiIVFDateTime) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->headerCellClass() ?>"><?php echo $ivf_embryology_chart->ICSiIVFDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->ICSiIVFDateTime->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ICSiIVFDateTime->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ICSiIVFDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ICSiIVFDateTime->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->PrimaryEmbrologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart->PrimaryEmbrologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->PrimaryEmbrologist->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->PrimaryEmbrologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->PrimaryEmbrologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->PrimaryEmbrologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->SecondaryEmbrologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart->SecondaryEmbrologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->SecondaryEmbrologist->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->SecondaryEmbrologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->SecondaryEmbrologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->SecondaryEmbrologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Incubator->Visible) { // Incubator ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Incubator) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Incubator->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Incubator->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Incubator->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Incubator->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Incubator->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Incubator->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Incubator->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->location->Visible) { // location ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->location) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->location->headerCellClass() ?>"><?php echo $ivf_embryology_chart->location->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->location->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->location->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->location->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->location->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->location->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->OocyteNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->OocyteNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->OocyteNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->OocyteNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->OocyteNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->OocyteNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->OocyteNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->OocyteNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Stage->Visible) { // Stage ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Stage) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Stage->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Stage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Stage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Stage->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Stage->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Stage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Stage->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Remarks->Visible) { // Remarks ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Remarks) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Remarks->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Remarks->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Remarks->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Remarks->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Remarks->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Remarks->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Remarks->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitrificationDate->Visible) { // vitrificationDate ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitrificationDate) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitrificationDate->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitrificationDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitrificationDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitrificationDate->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitrificationDate->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitrificationDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitrificationDate->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriPrimaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriPrimaryEmbryologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriPrimaryEmbryologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriSecondaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriSecondaryEmbryologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriSecondaryEmbryologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriEmbryoNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriEmbryoNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriEmbryoNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriEmbryoNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriEmbryoNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriEmbryoNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriEmbryoNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriEmbryoNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawReFrozen->Visible) { // thawReFrozen ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawReFrozen) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->thawReFrozen->headerCellClass() ?>"><?php echo $ivf_embryology_chart->thawReFrozen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->thawReFrozen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->thawReFrozen->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawReFrozen->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawReFrozen->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawReFrozen->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriFertilisationDate) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriFertilisationDate->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriFertilisationDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriFertilisationDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriFertilisationDate->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriFertilisationDate->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriFertilisationDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriFertilisationDate->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriDay->Visible) { // vitriDay ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriDay) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriDay->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriDay->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriDay->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriDay->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriDay->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriDay->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriStage->Visible) { // vitriStage ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriStage) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriStage->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriStage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriStage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriStage->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriStage->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriStage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriStage->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGrade->Visible) { // vitriGrade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriGrade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriGrade->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriGrade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriGrade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriGrade->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriGrade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriGrade->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriGrade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriIncubator->Visible) { // vitriIncubator ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriIncubator) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriIncubator->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriIncubator->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriIncubator->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriIncubator->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriIncubator->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriIncubator->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriIncubator->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriTank->Visible) { // vitriTank ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriTank) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriTank->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriTank->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriTank->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriTank->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriTank->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriTank->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriTank->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCanister->Visible) { // vitriCanister ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriCanister) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriCanister->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriCanister->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriCanister->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriCanister->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriCanister->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriCanister->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriCanister->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGobiet->Visible) { // vitriGobiet ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriGobiet) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriGobiet->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriGobiet->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriGobiet->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriGobiet->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriGobiet->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriGobiet->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriGobiet->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriViscotube->Visible) { // vitriViscotube ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriViscotube) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriViscotube->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriViscotube->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriViscotube->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriViscotube->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriViscotube->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriViscotube->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriViscotube->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriCryolockNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriCryolockNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriCryolockNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriCryolockNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriCryolockNo->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriCryolockNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriCryolockNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriCryolockNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->vitriCryolockColour) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriCryolockColour->headerCellClass() ?>"><?php echo $ivf_embryology_chart->vitriCryolockColour->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->vitriCryolockColour->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->vitriCryolockColour->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriCryolockColour->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->vitriCryolockColour->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->vitriCryolockColour->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDate->Visible) { // thawDate ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawDate) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->thawDate->headerCellClass() ?>"><?php echo $ivf_embryology_chart->thawDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->thawDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->thawDate->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawDate->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawDate->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawPrimaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawPrimaryEmbryologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawPrimaryEmbryologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawSecondaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawSecondaryEmbryologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawSecondaryEmbryologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawET->Visible) { // thawET ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawET) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->thawET->headerCellClass() ?>"><?php echo $ivf_embryology_chart->thawET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->thawET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->thawET->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawET->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawET->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawET->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawAbserve->Visible) { // thawAbserve ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawAbserve) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->thawAbserve->headerCellClass() ?>"><?php echo $ivf_embryology_chart->thawAbserve->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->thawAbserve->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->thawAbserve->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawAbserve->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawAbserve->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawAbserve->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDiscard->Visible) { // thawDiscard ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->thawDiscard) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->thawDiscard->headerCellClass() ?>"><?php echo $ivf_embryology_chart->thawDiscard->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->thawDiscard->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->thawDiscard->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawDiscard->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->thawDiscard->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->thawDiscard->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETCatheter->Visible) { // ETCatheter ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETCatheter) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->ETCatheter->headerCellClass() ?>"><?php echo $ivf_embryology_chart->ETCatheter->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->ETCatheter->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->ETCatheter->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETCatheter->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETCatheter->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETCatheter->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDifficulty->Visible) { // ETDifficulty ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETDifficulty) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->ETDifficulty->headerCellClass() ?>"><?php echo $ivf_embryology_chart->ETDifficulty->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->ETDifficulty->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->ETDifficulty->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETDifficulty->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETDifficulty->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETDifficulty->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEasy->Visible) { // ETEasy ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETEasy) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->ETEasy->headerCellClass() ?>"><?php echo $ivf_embryology_chart->ETEasy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->ETEasy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->ETEasy->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETEasy->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETEasy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETEasy->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETComments->Visible) { // ETComments ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETComments) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->ETComments->headerCellClass() ?>"><?php echo $ivf_embryology_chart->ETComments->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->ETComments->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->ETComments->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETComments->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETComments->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETComments->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDoctor->Visible) { // ETDoctor ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETDoctor) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->ETDoctor->headerCellClass() ?>"><?php echo $ivf_embryology_chart->ETDoctor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->ETDoctor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->ETDoctor->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETDoctor->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETDoctor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETDoctor->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEmbryologist->Visible) { // ETEmbryologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->ETEmbryologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart->ETEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->ETEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->ETEmbryologist->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETEmbryologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETEmbryologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETEmbryologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDate->Visible) { // ETDate ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->ETDate) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->ETDate->headerCellClass() ?>"><?php echo $ivf_embryology_chart->ETDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->ETDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->ETDate->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETDate->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->ETDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->ETDate->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1End->Visible) { // Day1End ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart->Day1End) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1End->headerCellClass() ?>"><?php echo $ivf_embryology_chart->Day1End->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart->Day1End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_embryology_chart->Day1End->Name ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1End->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_embryology_chart->Day1End->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart->Day1End->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_embryology_chart_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_embryology_chart_preview->RecCount = 0;
$ivf_embryology_chart_preview->RowCnt = 0;
while ($ivf_embryology_chart_preview->Recordset && !$ivf_embryology_chart_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_embryology_chart_preview->RecCount++;
	$ivf_embryology_chart_preview->RowCnt++;
	$ivf_embryology_chart_preview->CssStyle = "";
	$ivf_embryology_chart_preview->loadListRowValues($ivf_embryology_chart_preview->Recordset);

	// Render row
	$ivf_embryology_chart_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_embryology_chart_preview->resetAttributes();
	$ivf_embryology_chart_preview->renderListRow();

	// Render list options
	$ivf_embryology_chart_preview->renderListOptions();
?>
	<tr<?php echo $ivf_embryology_chart_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_embryology_chart_preview->ListOptions->render("body", "left", $ivf_embryology_chart_preview->RowCnt);
?>
<?php if ($ivf_embryology_chart->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_embryology_chart->id->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->id->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_embryology_chart->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_embryology_chart->Name->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Name->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ARTCycle->Visible) { // ARTCycle ?>
		<!-- ARTCycle -->
		<td<?php echo $ivf_embryology_chart->ARTCycle->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ARTCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->SpermOrigin->Visible) { // SpermOrigin ?>
		<!-- SpermOrigin -->
		<td<?php echo $ivf_embryology_chart->SpermOrigin->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->SpermOrigin->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->SpermOrigin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<!-- InseminatinTechnique -->
		<td<?php echo $ivf_embryology_chart->InseminatinTechnique->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->InseminatinTechnique->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->IndicationForART->Visible) { // IndicationForART ?>
		<!-- IndicationForART -->
		<td<?php echo $ivf_embryology_chart->IndicationForART->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->IndicationForART->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0sino->Visible) { // Day0sino ?>
		<!-- Day0sino -->
		<td<?php echo $ivf_embryology_chart->Day0sino->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day0sino->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0sino->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<!-- Day0OocyteStage -->
		<td<?php echo $ivf_embryology_chart->Day0OocyteStage->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day0OocyteStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0OocyteStage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
		<!-- Day0PolarBodyPosition -->
		<td<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0PolarBodyPosition->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Breakage->Visible) { // Day0Breakage ?>
		<!-- Day0Breakage -->
		<td<?php echo $ivf_embryology_chart->Day0Breakage->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day0Breakage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0Breakage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0Attempts->Visible) { // Day0Attempts ?>
		<!-- Day0Attempts -->
		<td<?php echo $ivf_embryology_chart->Day0Attempts->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day0Attempts->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0Attempts->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
		<!-- Day0SPZMorpho -->
		<td<?php echo $ivf_embryology_chart->Day0SPZMorpho->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day0SPZMorpho->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SPZMorpho->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
		<!-- Day0SPZLocation -->
		<td<?php echo $ivf_embryology_chart->Day0SPZLocation->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day0SPZLocation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SPZLocation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
		<!-- Day0SpOrgin -->
		<td<?php echo $ivf_embryology_chart->Day0SpOrgin->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day0SpOrgin->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day0SpOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
		<!-- Day5Cryoptop -->
		<td<?php echo $ivf_embryology_chart->Day5Cryoptop->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day5Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Sperm->Visible) { // Day1Sperm ?>
		<!-- Day1Sperm -->
		<td<?php echo $ivf_embryology_chart->Day1Sperm->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day1Sperm->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Sperm->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PN->Visible) { // Day1PN ?>
		<!-- Day1PN -->
		<td<?php echo $ivf_embryology_chart->Day1PN->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day1PN->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1PN->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1PB->Visible) { // Day1PB ?>
		<!-- Day1PB -->
		<td<?php echo $ivf_embryology_chart->Day1PB->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day1PB->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1PB->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
		<!-- Day1Pronucleus -->
		<td<?php echo $ivf_embryology_chart->Day1Pronucleus->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day1Pronucleus->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Pronucleus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
		<!-- Day1Nucleolus -->
		<td<?php echo $ivf_embryology_chart->Day1Nucleolus->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day1Nucleolus->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Nucleolus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1Halo->Visible) { // Day1Halo ?>
		<!-- Day1Halo -->
		<td<?php echo $ivf_embryology_chart->Day1Halo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day1Halo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1Halo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2SiNo->Visible) { // Day2SiNo ?>
		<!-- Day2SiNo -->
		<td<?php echo $ivf_embryology_chart->Day2SiNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day2SiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2CellNo->Visible) { // Day2CellNo ?>
		<!-- Day2CellNo -->
		<td<?php echo $ivf_embryology_chart->Day2CellNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day2CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Frag->Visible) { // Day2Frag ?>
		<!-- Day2Frag -->
		<td<?php echo $ivf_embryology_chart->Day2Frag->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day2Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Frag->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Symmetry->Visible) { // Day2Symmetry ?>
		<!-- Day2Symmetry -->
		<td<?php echo $ivf_embryology_chart->Day2Symmetry->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day2Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Symmetry->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
		<!-- Day2Cryoptop -->
		<td<?php echo $ivf_embryology_chart->Day2Cryoptop->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day2Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2Grade->Visible) { // Day2Grade ?>
		<!-- Day2Grade -->
		<td<?php echo $ivf_embryology_chart->Day2Grade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day2Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day2End->Visible) { // Day2End ?>
		<!-- Day2End -->
		<td<?php echo $ivf_embryology_chart->Day2End->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day2End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day2End->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Sino->Visible) { // Day3Sino ?>
		<!-- Day3Sino -->
		<td<?php echo $ivf_embryology_chart->Day3Sino->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day3Sino->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Sino->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3CellNo->Visible) { // Day3CellNo ?>
		<!-- Day3CellNo -->
		<td<?php echo $ivf_embryology_chart->Day3CellNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day3CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Frag->Visible) { // Day3Frag ?>
		<!-- Day3Frag -->
		<td<?php echo $ivf_embryology_chart->Day3Frag->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day3Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Frag->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Symmetry->Visible) { // Day3Symmetry ?>
		<!-- Day3Symmetry -->
		<td<?php echo $ivf_embryology_chart->Day3Symmetry->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day3Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Symmetry->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3ZP->Visible) { // Day3ZP ?>
		<!-- Day3ZP -->
		<td<?php echo $ivf_embryology_chart->Day3ZP->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day3ZP->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3ZP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Vacoules->Visible) { // Day3Vacoules ?>
		<!-- Day3Vacoules -->
		<td<?php echo $ivf_embryology_chart->Day3Vacoules->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day3Vacoules->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Vacoules->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Grade->Visible) { // Day3Grade ?>
		<!-- Day3Grade -->
		<td<?php echo $ivf_embryology_chart->Day3Grade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day3Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
		<!-- Day3Cryoptop -->
		<td<?php echo $ivf_embryology_chart->Day3Cryoptop->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day3Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day3End->Visible) { // Day3End ?>
		<!-- Day3End -->
		<td<?php echo $ivf_embryology_chart->Day3End->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day3End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day3End->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4SiNo->Visible) { // Day4SiNo ?>
		<!-- Day4SiNo -->
		<td<?php echo $ivf_embryology_chart->Day4SiNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day4SiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4CellNo->Visible) { // Day4CellNo ?>
		<!-- Day4CellNo -->
		<td<?php echo $ivf_embryology_chart->Day4CellNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day4CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Frag->Visible) { // Day4Frag ?>
		<!-- Day4Frag -->
		<td<?php echo $ivf_embryology_chart->Day4Frag->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day4Frag->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Frag->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Symmetry->Visible) { // Day4Symmetry ?>
		<!-- Day4Symmetry -->
		<td<?php echo $ivf_embryology_chart->Day4Symmetry->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day4Symmetry->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Symmetry->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Grade->Visible) { // Day4Grade ?>
		<!-- Day4Grade -->
		<td<?php echo $ivf_embryology_chart->Day4Grade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day4Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
		<!-- Day4Cryoptop -->
		<td<?php echo $ivf_embryology_chart->Day4Cryoptop->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day4Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day4End->Visible) { // Day4End ?>
		<!-- Day4End -->
		<td<?php echo $ivf_embryology_chart->Day4End->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day4End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day4End->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5CellNo->Visible) { // Day5CellNo ?>
		<!-- Day5CellNo -->
		<td<?php echo $ivf_embryology_chart->Day5CellNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day5CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5ICM->Visible) { // Day5ICM ?>
		<!-- Day5ICM -->
		<td<?php echo $ivf_embryology_chart->Day5ICM->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day5ICM->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5ICM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5TE->Visible) { // Day5TE ?>
		<!-- Day5TE -->
		<td<?php echo $ivf_embryology_chart->Day5TE->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day5TE->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5TE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Observation->Visible) { // Day5Observation ?>
		<!-- Day5Observation -->
		<td<?php echo $ivf_embryology_chart->Day5Observation->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day5Observation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Observation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Collapsed->Visible) { // Day5Collapsed ?>
		<!-- Day5Collapsed -->
		<td<?php echo $ivf_embryology_chart->Day5Collapsed->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day5Collapsed->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Collapsed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
		<!-- Day5Vacoulles -->
		<td<?php echo $ivf_embryology_chart->Day5Vacoulles->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day5Vacoulles->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Vacoulles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day5Grade->Visible) { // Day5Grade ?>
		<!-- Day5Grade -->
		<td<?php echo $ivf_embryology_chart->Day5Grade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day5Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day5Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6CellNo->Visible) { // Day6CellNo ?>
		<!-- Day6CellNo -->
		<td<?php echo $ivf_embryology_chart->Day6CellNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day6CellNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6ICM->Visible) { // Day6ICM ?>
		<!-- Day6ICM -->
		<td<?php echo $ivf_embryology_chart->Day6ICM->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day6ICM->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6ICM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6TE->Visible) { // Day6TE ?>
		<!-- Day6TE -->
		<td<?php echo $ivf_embryology_chart->Day6TE->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day6TE->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6TE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Observation->Visible) { // Day6Observation ?>
		<!-- Day6Observation -->
		<td<?php echo $ivf_embryology_chart->Day6Observation->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day6Observation->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Observation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Collapsed->Visible) { // Day6Collapsed ?>
		<!-- Day6Collapsed -->
		<td<?php echo $ivf_embryology_chart->Day6Collapsed->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day6Collapsed->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Collapsed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
		<!-- Day6Vacoulles -->
		<td<?php echo $ivf_embryology_chart->Day6Vacoulles->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day6Vacoulles->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Vacoulles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Grade->Visible) { // Day6Grade ?>
		<!-- Day6Grade -->
		<td<?php echo $ivf_embryology_chart->Day6Grade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day6Grade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
		<!-- Day6Cryoptop -->
		<td<?php echo $ivf_embryology_chart->Day6Cryoptop->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day6Cryoptop->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day6Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->EndSiNo->Visible) { // EndSiNo ?>
		<!-- EndSiNo -->
		<td<?php echo $ivf_embryology_chart->EndSiNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->EndSiNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndSiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingDay->Visible) { // EndingDay ?>
		<!-- EndingDay -->
		<td<?php echo $ivf_embryology_chart->EndingDay->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->EndingDay->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingCellStage->Visible) { // EndingCellStage ?>
		<!-- EndingCellStage -->
		<td<?php echo $ivf_embryology_chart->EndingCellStage->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->EndingCellStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingCellStage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingGrade->Visible) { // EndingGrade ?>
		<!-- EndingGrade -->
		<td<?php echo $ivf_embryology_chart->EndingGrade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->EndingGrade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingGrade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->EndingState->Visible) { // EndingState ?>
		<!-- EndingState -->
		<td<?php echo $ivf_embryology_chart->EndingState->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->EndingState->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->EndingState->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_embryology_chart->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->DidNO->Visible) { // DidNO ?>
		<!-- DidNO -->
		<td<?php echo $ivf_embryology_chart->DidNO->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->DidNO->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->DidNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
		<!-- ICSiIVFDateTime -->
		<td<?php echo $ivf_embryology_chart->ICSiIVFDateTime->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->ICSiIVFDateTime->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ICSiIVFDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
		<!-- PrimaryEmbrologist -->
		<td<?php echo $ivf_embryology_chart->PrimaryEmbrologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->PrimaryEmbrologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->PrimaryEmbrologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
		<!-- SecondaryEmbrologist -->
		<td<?php echo $ivf_embryology_chart->SecondaryEmbrologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->SecondaryEmbrologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->SecondaryEmbrologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Incubator->Visible) { // Incubator ?>
		<!-- Incubator -->
		<td<?php echo $ivf_embryology_chart->Incubator->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Incubator->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Incubator->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->location->Visible) { // location ?>
		<!-- location -->
		<td<?php echo $ivf_embryology_chart->location->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->location->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->location->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
		<!-- OocyteNo -->
		<td<?php echo $ivf_embryology_chart->OocyteNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->OocyteNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->OocyteNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Stage->Visible) { // Stage ?>
		<!-- Stage -->
		<td<?php echo $ivf_embryology_chart->Stage->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Stage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Stage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Remarks->Visible) { // Remarks ?>
		<!-- Remarks -->
		<td<?php echo $ivf_embryology_chart->Remarks->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Remarks->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Remarks->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitrificationDate->Visible) { // vitrificationDate ?>
		<!-- vitrificationDate -->
		<td<?php echo $ivf_embryology_chart->vitrificationDate->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitrificationDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitrificationDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
		<!-- vitriPrimaryEmbryologist -->
		<td<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriPrimaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
		<!-- vitriSecondaryEmbryologist -->
		<td<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriSecondaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
		<!-- vitriEmbryoNo -->
		<td<?php echo $ivf_embryology_chart->vitriEmbryoNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriEmbryoNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriEmbryoNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawReFrozen->Visible) { // thawReFrozen ?>
		<!-- thawReFrozen -->
		<td<?php echo $ivf_embryology_chart->thawReFrozen->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->thawReFrozen->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawReFrozen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
		<!-- vitriFertilisationDate -->
		<td<?php echo $ivf_embryology_chart->vitriFertilisationDate->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriFertilisationDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriFertilisationDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriDay->Visible) { // vitriDay ?>
		<!-- vitriDay -->
		<td<?php echo $ivf_embryology_chart->vitriDay->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriDay->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriStage->Visible) { // vitriStage ?>
		<!-- vitriStage -->
		<td<?php echo $ivf_embryology_chart->vitriStage->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriStage->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriStage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGrade->Visible) { // vitriGrade ?>
		<!-- vitriGrade -->
		<td<?php echo $ivf_embryology_chart->vitriGrade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriGrade->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriGrade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriIncubator->Visible) { // vitriIncubator ?>
		<!-- vitriIncubator -->
		<td<?php echo $ivf_embryology_chart->vitriIncubator->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriIncubator->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriIncubator->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriTank->Visible) { // vitriTank ?>
		<!-- vitriTank -->
		<td<?php echo $ivf_embryology_chart->vitriTank->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriTank->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriTank->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCanister->Visible) { // vitriCanister ?>
		<!-- vitriCanister -->
		<td<?php echo $ivf_embryology_chart->vitriCanister->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriCanister->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCanister->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriGobiet->Visible) { // vitriGobiet ?>
		<!-- vitriGobiet -->
		<td<?php echo $ivf_embryology_chart->vitriGobiet->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriGobiet->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriGobiet->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriViscotube->Visible) { // vitriViscotube ?>
		<!-- vitriViscotube -->
		<td<?php echo $ivf_embryology_chart->vitriViscotube->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriViscotube->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriViscotube->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
		<!-- vitriCryolockNo -->
		<td<?php echo $ivf_embryology_chart->vitriCryolockNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriCryolockNo->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCryolockNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
		<!-- vitriCryolockColour -->
		<td<?php echo $ivf_embryology_chart->vitriCryolockColour->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->vitriCryolockColour->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->vitriCryolockColour->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDate->Visible) { // thawDate ?>
		<!-- thawDate -->
		<td<?php echo $ivf_embryology_chart->thawDate->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->thawDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<!-- thawPrimaryEmbryologist -->
		<td<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawPrimaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<!-- thawSecondaryEmbryologist -->
		<td<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawSecondaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawET->Visible) { // thawET ?>
		<!-- thawET -->
		<td<?php echo $ivf_embryology_chart->thawET->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->thawET->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawAbserve->Visible) { // thawAbserve ?>
		<!-- thawAbserve -->
		<td<?php echo $ivf_embryology_chart->thawAbserve->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->thawAbserve->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawAbserve->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->thawDiscard->Visible) { // thawDiscard ?>
		<!-- thawDiscard -->
		<td<?php echo $ivf_embryology_chart->thawDiscard->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->thawDiscard->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->thawDiscard->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETCatheter->Visible) { // ETCatheter ?>
		<!-- ETCatheter -->
		<td<?php echo $ivf_embryology_chart->ETCatheter->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->ETCatheter->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETCatheter->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDifficulty->Visible) { // ETDifficulty ?>
		<!-- ETDifficulty -->
		<td<?php echo $ivf_embryology_chart->ETDifficulty->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->ETDifficulty->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDifficulty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEasy->Visible) { // ETEasy ?>
		<!-- ETEasy -->
		<td<?php echo $ivf_embryology_chart->ETEasy->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->ETEasy->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETEasy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETComments->Visible) { // ETComments ?>
		<!-- ETComments -->
		<td<?php echo $ivf_embryology_chart->ETComments->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->ETComments->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETComments->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDoctor->Visible) { // ETDoctor ?>
		<!-- ETDoctor -->
		<td<?php echo $ivf_embryology_chart->ETDoctor->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->ETDoctor->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDoctor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETEmbryologist->Visible) { // ETEmbryologist ?>
		<!-- ETEmbryologist -->
		<td<?php echo $ivf_embryology_chart->ETEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->ETEmbryologist->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->ETDate->Visible) { // ETDate ?>
		<!-- ETDate -->
		<td<?php echo $ivf_embryology_chart->ETDate->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->ETDate->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->ETDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart->Day1End->Visible) { // Day1End ?>
		<!-- Day1End -->
		<td<?php echo $ivf_embryology_chart->Day1End->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart->Day1End->viewAttributes() ?>>
<?php echo $ivf_embryology_chart->Day1End->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_embryology_chart_preview->ListOptions->render("body", "right", $ivf_embryology_chart_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_embryology_chart_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_embryology_chart_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_embryology_chart_preview->Pager)) $ivf_embryology_chart_preview->Pager = new PrevNextPager($ivf_embryology_chart_preview->StartRec, $ivf_embryology_chart_preview->DisplayRecs, $ivf_embryology_chart_preview->TotalRecs) ?>
<?php if ($ivf_embryology_chart_preview->Pager->RecordCount > 0 && $ivf_embryology_chart_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_embryology_chart_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_embryology_chart_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_embryology_chart_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_embryology_chart_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_embryology_chart_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_embryology_chart_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_embryology_chart_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_embryology_chart_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_embryology_chart_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_embryology_chart_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_embryology_chart_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_embryology_chart_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_embryology_chart_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_embryology_chart_preview->Recordset)
	$ivf_embryology_chart_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_embryology_chart_preview->terminate();
?>
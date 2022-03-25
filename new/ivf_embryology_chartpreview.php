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
<?php if ($ivf_embryology_chart_preview->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_embryology_chart"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_embryology_chart_preview->renderListOptions();

// Render list options (header, left)
$ivf_embryology_chart_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_embryology_chart_preview->id->Visible) { // id ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->id) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->id->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->id->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->id->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->id->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->RIDNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->RIDNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->RIDNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->RIDNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Name->Visible) { // Name ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Name) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Name->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Name->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Name->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Name->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->ARTCycle) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ARTCycle->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->ARTCycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->ARTCycle->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ARTCycle->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ARTCycle->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->SpermOrigin->Visible) { // SpermOrigin ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->SpermOrigin) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->SpermOrigin->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->SpermOrigin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->SpermOrigin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->SpermOrigin->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->SpermOrigin->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->SpermOrigin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->SpermOrigin->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->InseminatinTechnique) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->InseminatinTechnique->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->InseminatinTechnique->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->InseminatinTechnique->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->InseminatinTechnique->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->InseminatinTechnique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->InseminatinTechnique->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->IndicationForART->Visible) { // IndicationForART ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->IndicationForART) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->IndicationForART->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->IndicationForART->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->IndicationForART->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->IndicationForART->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->IndicationForART->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->IndicationForART->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->IndicationForART->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0sino->Visible) { // Day0sino ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day0sino) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0sino->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day0sino->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0sino->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day0sino->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0sino->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day0sino->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0sino->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day0OocyteStage) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0OocyteStage->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day0OocyteStage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0OocyteStage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day0OocyteStage->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0OocyteStage->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day0OocyteStage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0OocyteStage->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day0PolarBodyPosition) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0PolarBodyPosition->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day0PolarBodyPosition->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0PolarBodyPosition->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day0PolarBodyPosition->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0PolarBodyPosition->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day0PolarBodyPosition->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0PolarBodyPosition->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0Breakage->Visible) { // Day0Breakage ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day0Breakage) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0Breakage->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day0Breakage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0Breakage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day0Breakage->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0Breakage->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day0Breakage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0Breakage->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0Attempts->Visible) { // Day0Attempts ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day0Attempts) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0Attempts->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day0Attempts->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0Attempts->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day0Attempts->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0Attempts->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day0Attempts->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0Attempts->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day0SPZMorpho) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0SPZMorpho->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day0SPZMorpho->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0SPZMorpho->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day0SPZMorpho->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0SPZMorpho->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day0SPZMorpho->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0SPZMorpho->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day0SPZLocation) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0SPZLocation->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day0SPZLocation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0SPZLocation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day0SPZLocation->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0SPZLocation->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day0SPZLocation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0SPZLocation->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day0SpOrgin) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0SpOrgin->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day0SpOrgin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day0SpOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day0SpOrgin->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0SpOrgin->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day0SpOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day0SpOrgin->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day5Cryoptop) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5Cryoptop->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day5Cryoptop->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day5Cryoptop->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5Cryoptop->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day5Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5Cryoptop->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1Sperm->Visible) { // Day1Sperm ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day1Sperm) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1Sperm->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day1Sperm->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1Sperm->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day1Sperm->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1Sperm->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day1Sperm->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1Sperm->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1PN->Visible) { // Day1PN ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day1PN) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1PN->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day1PN->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1PN->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day1PN->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1PN->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day1PN->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1PN->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1PB->Visible) { // Day1PB ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day1PB) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1PB->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day1PB->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1PB->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day1PB->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1PB->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day1PB->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1PB->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day1Pronucleus) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1Pronucleus->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day1Pronucleus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1Pronucleus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day1Pronucleus->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1Pronucleus->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day1Pronucleus->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1Pronucleus->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day1Nucleolus) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1Nucleolus->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day1Nucleolus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1Nucleolus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day1Nucleolus->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1Nucleolus->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day1Nucleolus->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1Nucleolus->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1Halo->Visible) { // Day1Halo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day1Halo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1Halo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day1Halo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1Halo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day1Halo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1Halo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day1Halo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1Halo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2SiNo->Visible) { // Day2SiNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day2SiNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2SiNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day2SiNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day2SiNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2SiNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day2SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2SiNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2CellNo->Visible) { // Day2CellNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day2CellNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2CellNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day2CellNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day2CellNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2CellNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day2CellNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2CellNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2Frag->Visible) { // Day2Frag ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day2Frag) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2Frag->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day2Frag->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2Frag->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day2Frag->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2Frag->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day2Frag->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2Frag->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2Symmetry->Visible) { // Day2Symmetry ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day2Symmetry) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2Symmetry->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day2Symmetry->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2Symmetry->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day2Symmetry->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2Symmetry->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day2Symmetry->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2Symmetry->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day2Cryoptop) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2Cryoptop->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day2Cryoptop->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day2Cryoptop->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2Cryoptop->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day2Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2Cryoptop->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2Grade->Visible) { // Day2Grade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day2Grade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2Grade->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day2Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day2Grade->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2Grade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day2Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2Grade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2End->Visible) { // Day2End ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day2End) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2End->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day2End->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day2End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day2End->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2End->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day2End->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day2End->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Sino->Visible) { // Day3Sino ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day3Sino) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Sino->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day3Sino->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Sino->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day3Sino->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Sino->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day3Sino->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Sino->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3CellNo->Visible) { // Day3CellNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day3CellNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3CellNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day3CellNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day3CellNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3CellNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day3CellNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3CellNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Frag->Visible) { // Day3Frag ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day3Frag) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Frag->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day3Frag->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Frag->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day3Frag->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Frag->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day3Frag->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Frag->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Symmetry->Visible) { // Day3Symmetry ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day3Symmetry) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Symmetry->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day3Symmetry->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Symmetry->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day3Symmetry->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Symmetry->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day3Symmetry->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Symmetry->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3ZP->Visible) { // Day3ZP ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day3ZP) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3ZP->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day3ZP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3ZP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day3ZP->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3ZP->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day3ZP->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3ZP->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Vacoules->Visible) { // Day3Vacoules ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day3Vacoules) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Vacoules->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day3Vacoules->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Vacoules->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day3Vacoules->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Vacoules->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day3Vacoules->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Vacoules->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Grade->Visible) { // Day3Grade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day3Grade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Grade->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day3Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day3Grade->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Grade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day3Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Grade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day3Cryoptop) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Cryoptop->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day3Cryoptop->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day3Cryoptop->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Cryoptop->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day3Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3Cryoptop->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3End->Visible) { // Day3End ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day3End) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3End->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day3End->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day3End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day3End->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3End->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day3End->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day3End->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4SiNo->Visible) { // Day4SiNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day4SiNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4SiNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day4SiNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day4SiNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4SiNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day4SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4SiNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4CellNo->Visible) { // Day4CellNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day4CellNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4CellNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day4CellNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day4CellNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4CellNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day4CellNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4CellNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4Frag->Visible) { // Day4Frag ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day4Frag) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4Frag->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day4Frag->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4Frag->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day4Frag->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4Frag->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day4Frag->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4Frag->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4Symmetry->Visible) { // Day4Symmetry ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day4Symmetry) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4Symmetry->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day4Symmetry->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4Symmetry->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day4Symmetry->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4Symmetry->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day4Symmetry->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4Symmetry->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4Grade->Visible) { // Day4Grade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day4Grade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4Grade->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day4Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day4Grade->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4Grade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day4Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4Grade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day4Cryoptop) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4Cryoptop->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day4Cryoptop->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day4Cryoptop->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4Cryoptop->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day4Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4Cryoptop->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4End->Visible) { // Day4End ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day4End) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4End->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day4End->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day4End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day4End->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4End->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day4End->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day4End->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5CellNo->Visible) { // Day5CellNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day5CellNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5CellNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day5CellNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day5CellNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5CellNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day5CellNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5CellNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5ICM->Visible) { // Day5ICM ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day5ICM) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5ICM->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day5ICM->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5ICM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day5ICM->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5ICM->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day5ICM->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5ICM->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5TE->Visible) { // Day5TE ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day5TE) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5TE->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day5TE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5TE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day5TE->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5TE->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day5TE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5TE->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5Observation->Visible) { // Day5Observation ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day5Observation) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5Observation->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day5Observation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5Observation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day5Observation->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5Observation->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day5Observation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5Observation->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5Collapsed->Visible) { // Day5Collapsed ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day5Collapsed) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5Collapsed->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day5Collapsed->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5Collapsed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day5Collapsed->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5Collapsed->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day5Collapsed->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5Collapsed->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day5Vacoulles) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5Vacoulles->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day5Vacoulles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5Vacoulles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day5Vacoulles->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5Vacoulles->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day5Vacoulles->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5Vacoulles->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5Grade->Visible) { // Day5Grade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day5Grade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5Grade->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day5Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day5Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day5Grade->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5Grade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day5Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day5Grade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6CellNo->Visible) { // Day6CellNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day6CellNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6CellNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day6CellNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day6CellNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6CellNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day6CellNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6CellNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6ICM->Visible) { // Day6ICM ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day6ICM) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6ICM->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day6ICM->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6ICM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day6ICM->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6ICM->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day6ICM->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6ICM->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6TE->Visible) { // Day6TE ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day6TE) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6TE->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day6TE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6TE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day6TE->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6TE->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day6TE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6TE->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6Observation->Visible) { // Day6Observation ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day6Observation) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6Observation->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day6Observation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6Observation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day6Observation->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6Observation->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day6Observation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6Observation->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6Collapsed->Visible) { // Day6Collapsed ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day6Collapsed) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6Collapsed->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day6Collapsed->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6Collapsed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day6Collapsed->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6Collapsed->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day6Collapsed->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6Collapsed->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day6Vacoulles) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6Vacoulles->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day6Vacoulles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6Vacoulles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day6Vacoulles->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6Vacoulles->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day6Vacoulles->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6Vacoulles->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6Grade->Visible) { // Day6Grade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day6Grade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6Grade->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day6Grade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day6Grade->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6Grade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day6Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6Grade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day6Cryoptop) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6Cryoptop->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day6Cryoptop->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day6Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day6Cryoptop->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6Cryoptop->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day6Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day6Cryoptop->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->EndSiNo->Visible) { // EndSiNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->EndSiNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->EndSiNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->EndSiNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->EndSiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->EndSiNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->EndSiNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->EndSiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->EndSiNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->EndingDay->Visible) { // EndingDay ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->EndingDay) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->EndingDay->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->EndingDay->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->EndingDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->EndingDay->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->EndingDay->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->EndingDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->EndingDay->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->EndingCellStage->Visible) { // EndingCellStage ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->EndingCellStage) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->EndingCellStage->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->EndingCellStage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->EndingCellStage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->EndingCellStage->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->EndingCellStage->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->EndingCellStage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->EndingCellStage->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->EndingGrade->Visible) { // EndingGrade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->EndingGrade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->EndingGrade->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->EndingGrade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->EndingGrade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->EndingGrade->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->EndingGrade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->EndingGrade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->EndingGrade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->EndingState->Visible) { // EndingState ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->EndingState) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->EndingState->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->EndingState->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->EndingState->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->EndingState->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->EndingState->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->EndingState->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->EndingState->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->TidNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->TidNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->TidNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->TidNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->TidNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->DidNO->Visible) { // DidNO ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->DidNO) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->DidNO->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->DidNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->DidNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->DidNO->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->DidNO->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->DidNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->DidNO->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->ICSiIVFDateTime) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ICSiIVFDateTime->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->ICSiIVFDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ICSiIVFDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->ICSiIVFDateTime->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ICSiIVFDateTime->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->ICSiIVFDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ICSiIVFDateTime->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->PrimaryEmbrologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->PrimaryEmbrologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->PrimaryEmbrologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->PrimaryEmbrologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->PrimaryEmbrologist->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->PrimaryEmbrologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->PrimaryEmbrologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->PrimaryEmbrologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->SecondaryEmbrologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->SecondaryEmbrologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->SecondaryEmbrologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->SecondaryEmbrologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->SecondaryEmbrologist->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->SecondaryEmbrologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->SecondaryEmbrologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->SecondaryEmbrologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Incubator->Visible) { // Incubator ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Incubator) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Incubator->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Incubator->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Incubator->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Incubator->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Incubator->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Incubator->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Incubator->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->location->Visible) { // location ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->location) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->location->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->location->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->location->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->location->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->location->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->location->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->location->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->OocyteNo->Visible) { // OocyteNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->OocyteNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->OocyteNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->OocyteNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->OocyteNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->OocyteNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->OocyteNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->OocyteNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->OocyteNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Stage->Visible) { // Stage ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Stage) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Stage->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Stage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Stage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Stage->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Stage->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Stage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Stage->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Remarks->Visible) { // Remarks ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Remarks) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Remarks->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Remarks->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Remarks->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Remarks->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Remarks->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Remarks->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitrificationDate->Visible) { // vitrificationDate ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitrificationDate) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitrificationDate->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitrificationDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitrificationDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitrificationDate->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitrificationDate->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitrificationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitrificationDate->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriPrimaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriPrimaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriPrimaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriPrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriPrimaryEmbryologist->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriPrimaryEmbryologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriPrimaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriPrimaryEmbryologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriSecondaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriSecondaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriSecondaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriSecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriSecondaryEmbryologist->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriSecondaryEmbryologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriSecondaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriSecondaryEmbryologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriEmbryoNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriEmbryoNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriEmbryoNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriEmbryoNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriEmbryoNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriEmbryoNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriEmbryoNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriEmbryoNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawReFrozen->Visible) { // thawReFrozen ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->thawReFrozen) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawReFrozen->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->thawReFrozen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawReFrozen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->thawReFrozen->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawReFrozen->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->thawReFrozen->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawReFrozen->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriFertilisationDate) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriFertilisationDate->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriFertilisationDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriFertilisationDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriFertilisationDate->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriFertilisationDate->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriFertilisationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriFertilisationDate->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriDay->Visible) { // vitriDay ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriDay) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriDay->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriDay->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriDay->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriDay->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriDay->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriStage->Visible) { // vitriStage ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriStage) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriStage->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriStage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriStage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriStage->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriStage->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriStage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriStage->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriGrade->Visible) { // vitriGrade ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriGrade) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriGrade->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriGrade->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriGrade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriGrade->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriGrade->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriGrade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriGrade->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriIncubator->Visible) { // vitriIncubator ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriIncubator) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriIncubator->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriIncubator->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriIncubator->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriIncubator->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriIncubator->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriIncubator->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriIncubator->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriTank->Visible) { // vitriTank ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriTank) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriTank->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriTank->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriTank->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriTank->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriTank->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriTank->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriTank->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriCanister->Visible) { // vitriCanister ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriCanister) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriCanister->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriCanister->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriCanister->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriCanister->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriCanister->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriCanister->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriCanister->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriGobiet->Visible) { // vitriGobiet ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriGobiet) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriGobiet->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriGobiet->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriGobiet->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriGobiet->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriGobiet->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriGobiet->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriGobiet->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriViscotube->Visible) { // vitriViscotube ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriViscotube) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriViscotube->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriViscotube->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriViscotube->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriViscotube->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriViscotube->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriViscotube->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriViscotube->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriCryolockNo) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriCryolockNo->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriCryolockNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriCryolockNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriCryolockNo->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriCryolockNo->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriCryolockNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriCryolockNo->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->vitriCryolockColour) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriCryolockColour->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->vitriCryolockColour->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->vitriCryolockColour->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->vitriCryolockColour->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriCryolockColour->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->vitriCryolockColour->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->vitriCryolockColour->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawDate->Visible) { // thawDate ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->thawDate) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawDate->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->thawDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->thawDate->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawDate->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->thawDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawDate->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->thawPrimaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawPrimaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->thawPrimaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawPrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->thawPrimaryEmbryologist->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawPrimaryEmbryologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->thawPrimaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawPrimaryEmbryologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->thawSecondaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawSecondaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->thawSecondaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawSecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->thawSecondaryEmbryologist->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawSecondaryEmbryologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->thawSecondaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawSecondaryEmbryologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawET->Visible) { // thawET ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->thawET) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawET->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->thawET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->thawET->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawET->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->thawET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawET->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawAbserve->Visible) { // thawAbserve ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->thawAbserve) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawAbserve->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->thawAbserve->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawAbserve->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->thawAbserve->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawAbserve->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->thawAbserve->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawAbserve->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawDiscard->Visible) { // thawDiscard ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->thawDiscard) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawDiscard->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->thawDiscard->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->thawDiscard->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->thawDiscard->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawDiscard->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->thawDiscard->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->thawDiscard->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETCatheter->Visible) { // ETCatheter ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->ETCatheter) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETCatheter->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->ETCatheter->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETCatheter->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->ETCatheter->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETCatheter->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->ETCatheter->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETCatheter->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETDifficulty->Visible) { // ETDifficulty ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->ETDifficulty) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETDifficulty->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->ETDifficulty->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETDifficulty->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->ETDifficulty->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETDifficulty->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->ETDifficulty->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETDifficulty->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETEasy->Visible) { // ETEasy ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->ETEasy) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETEasy->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->ETEasy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETEasy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->ETEasy->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETEasy->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->ETEasy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETEasy->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETComments->Visible) { // ETComments ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->ETComments) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETComments->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->ETComments->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETComments->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->ETComments->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETComments->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->ETComments->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETComments->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETDoctor->Visible) { // ETDoctor ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->ETDoctor) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETDoctor->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->ETDoctor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETDoctor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->ETDoctor->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETDoctor->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->ETDoctor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETDoctor->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETEmbryologist->Visible) { // ETEmbryologist ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->ETEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETEmbryologist->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->ETEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->ETEmbryologist->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETEmbryologist->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->ETEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETEmbryologist->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETDate->Visible) { // ETDate ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->ETDate) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETDate->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->ETDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->ETDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->ETDate->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETDate->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->ETDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->ETDate->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1End->Visible) { // Day1End ?>
	<?php if ($ivf_embryology_chart->SortUrl($ivf_embryology_chart_preview->Day1End) == "") { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1End->headerCellClass() ?>"><?php echo $ivf_embryology_chart_preview->Day1End->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_embryology_chart_preview->Day1End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_embryology_chart_preview->Day1End->Name) ?>" data-sort-order="<?php echo $ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1End->Name && $ivf_embryology_chart_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_embryology_chart_preview->Day1End->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_embryology_chart_preview->SortField == $ivf_embryology_chart_preview->Day1End->Name) { ?><?php if ($ivf_embryology_chart_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_embryology_chart_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$ivf_embryology_chart_preview->RowCount = 0;
while ($ivf_embryology_chart_preview->Recordset && !$ivf_embryology_chart_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_embryology_chart_preview->RecCount++;
	$ivf_embryology_chart_preview->RowCount++;
	$ivf_embryology_chart_preview->CssStyle = "";
	$ivf_embryology_chart_preview->loadListRowValues($ivf_embryology_chart_preview->Recordset);

	// Render row
	$ivf_embryology_chart->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_embryology_chart_preview->resetAttributes();
	$ivf_embryology_chart_preview->renderListRow();

	// Render list options
	$ivf_embryology_chart_preview->renderListOptions();
?>
	<tr <?php echo $ivf_embryology_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_embryology_chart_preview->ListOptions->render("body", "left", $ivf_embryology_chart_preview->RowCount);
?>
<?php if ($ivf_embryology_chart_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_embryology_chart_preview->id->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->id->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_embryology_chart_preview->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->RIDNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_embryology_chart_preview->Name->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Name->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ARTCycle->Visible) { // ARTCycle ?>
		<!-- ARTCycle -->
		<td<?php echo $ivf_embryology_chart_preview->ARTCycle->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->ARTCycle->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->ARTCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->SpermOrigin->Visible) { // SpermOrigin ?>
		<!-- SpermOrigin -->
		<td<?php echo $ivf_embryology_chart_preview->SpermOrigin->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->SpermOrigin->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->SpermOrigin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<!-- InseminatinTechnique -->
		<td<?php echo $ivf_embryology_chart_preview->InseminatinTechnique->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->InseminatinTechnique->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->IndicationForART->Visible) { // IndicationForART ?>
		<!-- IndicationForART -->
		<td<?php echo $ivf_embryology_chart_preview->IndicationForART->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->IndicationForART->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->IndicationForART->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0sino->Visible) { // Day0sino ?>
		<!-- Day0sino -->
		<td<?php echo $ivf_embryology_chart_preview->Day0sino->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day0sino->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day0sino->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<!-- Day0OocyteStage -->
		<td<?php echo $ivf_embryology_chart_preview->Day0OocyteStage->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day0OocyteStage->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day0OocyteStage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
		<!-- Day0PolarBodyPosition -->
		<td<?php echo $ivf_embryology_chart_preview->Day0PolarBodyPosition->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day0PolarBodyPosition->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day0PolarBodyPosition->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0Breakage->Visible) { // Day0Breakage ?>
		<!-- Day0Breakage -->
		<td<?php echo $ivf_embryology_chart_preview->Day0Breakage->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day0Breakage->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day0Breakage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0Attempts->Visible) { // Day0Attempts ?>
		<!-- Day0Attempts -->
		<td<?php echo $ivf_embryology_chart_preview->Day0Attempts->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day0Attempts->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day0Attempts->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
		<!-- Day0SPZMorpho -->
		<td<?php echo $ivf_embryology_chart_preview->Day0SPZMorpho->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day0SPZMorpho->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day0SPZMorpho->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
		<!-- Day0SPZLocation -->
		<td<?php echo $ivf_embryology_chart_preview->Day0SPZLocation->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day0SPZLocation->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day0SPZLocation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
		<!-- Day0SpOrgin -->
		<td<?php echo $ivf_embryology_chart_preview->Day0SpOrgin->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day0SpOrgin->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day0SpOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
		<!-- Day5Cryoptop -->
		<td<?php echo $ivf_embryology_chart_preview->Day5Cryoptop->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day5Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day5Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1Sperm->Visible) { // Day1Sperm ?>
		<!-- Day1Sperm -->
		<td<?php echo $ivf_embryology_chart_preview->Day1Sperm->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day1Sperm->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day1Sperm->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1PN->Visible) { // Day1PN ?>
		<!-- Day1PN -->
		<td<?php echo $ivf_embryology_chart_preview->Day1PN->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day1PN->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day1PN->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1PB->Visible) { // Day1PB ?>
		<!-- Day1PB -->
		<td<?php echo $ivf_embryology_chart_preview->Day1PB->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day1PB->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day1PB->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
		<!-- Day1Pronucleus -->
		<td<?php echo $ivf_embryology_chart_preview->Day1Pronucleus->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day1Pronucleus->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day1Pronucleus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
		<!-- Day1Nucleolus -->
		<td<?php echo $ivf_embryology_chart_preview->Day1Nucleolus->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day1Nucleolus->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day1Nucleolus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1Halo->Visible) { // Day1Halo ?>
		<!-- Day1Halo -->
		<td<?php echo $ivf_embryology_chart_preview->Day1Halo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day1Halo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day1Halo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2SiNo->Visible) { // Day2SiNo ?>
		<!-- Day2SiNo -->
		<td<?php echo $ivf_embryology_chart_preview->Day2SiNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day2SiNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day2SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2CellNo->Visible) { // Day2CellNo ?>
		<!-- Day2CellNo -->
		<td<?php echo $ivf_embryology_chart_preview->Day2CellNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day2CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day2CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2Frag->Visible) { // Day2Frag ?>
		<!-- Day2Frag -->
		<td<?php echo $ivf_embryology_chart_preview->Day2Frag->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day2Frag->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day2Frag->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2Symmetry->Visible) { // Day2Symmetry ?>
		<!-- Day2Symmetry -->
		<td<?php echo $ivf_embryology_chart_preview->Day2Symmetry->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day2Symmetry->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day2Symmetry->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
		<!-- Day2Cryoptop -->
		<td<?php echo $ivf_embryology_chart_preview->Day2Cryoptop->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day2Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day2Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2Grade->Visible) { // Day2Grade ?>
		<!-- Day2Grade -->
		<td<?php echo $ivf_embryology_chart_preview->Day2Grade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day2Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day2Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day2End->Visible) { // Day2End ?>
		<!-- Day2End -->
		<td<?php echo $ivf_embryology_chart_preview->Day2End->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day2End->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day2End->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Sino->Visible) { // Day3Sino ?>
		<!-- Day3Sino -->
		<td<?php echo $ivf_embryology_chart_preview->Day3Sino->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day3Sino->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day3Sino->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3CellNo->Visible) { // Day3CellNo ?>
		<!-- Day3CellNo -->
		<td<?php echo $ivf_embryology_chart_preview->Day3CellNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day3CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day3CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Frag->Visible) { // Day3Frag ?>
		<!-- Day3Frag -->
		<td<?php echo $ivf_embryology_chart_preview->Day3Frag->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day3Frag->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day3Frag->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Symmetry->Visible) { // Day3Symmetry ?>
		<!-- Day3Symmetry -->
		<td<?php echo $ivf_embryology_chart_preview->Day3Symmetry->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day3Symmetry->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day3Symmetry->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3ZP->Visible) { // Day3ZP ?>
		<!-- Day3ZP -->
		<td<?php echo $ivf_embryology_chart_preview->Day3ZP->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day3ZP->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day3ZP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Vacoules->Visible) { // Day3Vacoules ?>
		<!-- Day3Vacoules -->
		<td<?php echo $ivf_embryology_chart_preview->Day3Vacoules->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day3Vacoules->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day3Vacoules->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Grade->Visible) { // Day3Grade ?>
		<!-- Day3Grade -->
		<td<?php echo $ivf_embryology_chart_preview->Day3Grade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day3Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day3Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
		<!-- Day3Cryoptop -->
		<td<?php echo $ivf_embryology_chart_preview->Day3Cryoptop->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day3Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day3Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day3End->Visible) { // Day3End ?>
		<!-- Day3End -->
		<td<?php echo $ivf_embryology_chart_preview->Day3End->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day3End->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day3End->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4SiNo->Visible) { // Day4SiNo ?>
		<!-- Day4SiNo -->
		<td<?php echo $ivf_embryology_chart_preview->Day4SiNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day4SiNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day4SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4CellNo->Visible) { // Day4CellNo ?>
		<!-- Day4CellNo -->
		<td<?php echo $ivf_embryology_chart_preview->Day4CellNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day4CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day4CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4Frag->Visible) { // Day4Frag ?>
		<!-- Day4Frag -->
		<td<?php echo $ivf_embryology_chart_preview->Day4Frag->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day4Frag->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day4Frag->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4Symmetry->Visible) { // Day4Symmetry ?>
		<!-- Day4Symmetry -->
		<td<?php echo $ivf_embryology_chart_preview->Day4Symmetry->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day4Symmetry->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day4Symmetry->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4Grade->Visible) { // Day4Grade ?>
		<!-- Day4Grade -->
		<td<?php echo $ivf_embryology_chart_preview->Day4Grade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day4Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day4Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
		<!-- Day4Cryoptop -->
		<td<?php echo $ivf_embryology_chart_preview->Day4Cryoptop->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day4Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day4Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day4End->Visible) { // Day4End ?>
		<!-- Day4End -->
		<td<?php echo $ivf_embryology_chart_preview->Day4End->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day4End->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day4End->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5CellNo->Visible) { // Day5CellNo ?>
		<!-- Day5CellNo -->
		<td<?php echo $ivf_embryology_chart_preview->Day5CellNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day5CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day5CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5ICM->Visible) { // Day5ICM ?>
		<!-- Day5ICM -->
		<td<?php echo $ivf_embryology_chart_preview->Day5ICM->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day5ICM->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day5ICM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5TE->Visible) { // Day5TE ?>
		<!-- Day5TE -->
		<td<?php echo $ivf_embryology_chart_preview->Day5TE->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day5TE->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day5TE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5Observation->Visible) { // Day5Observation ?>
		<!-- Day5Observation -->
		<td<?php echo $ivf_embryology_chart_preview->Day5Observation->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day5Observation->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day5Observation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5Collapsed->Visible) { // Day5Collapsed ?>
		<!-- Day5Collapsed -->
		<td<?php echo $ivf_embryology_chart_preview->Day5Collapsed->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day5Collapsed->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day5Collapsed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
		<!-- Day5Vacoulles -->
		<td<?php echo $ivf_embryology_chart_preview->Day5Vacoulles->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day5Vacoulles->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day5Vacoulles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day5Grade->Visible) { // Day5Grade ?>
		<!-- Day5Grade -->
		<td<?php echo $ivf_embryology_chart_preview->Day5Grade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day5Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day5Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6CellNo->Visible) { // Day6CellNo ?>
		<!-- Day6CellNo -->
		<td<?php echo $ivf_embryology_chart_preview->Day6CellNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day6CellNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day6CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6ICM->Visible) { // Day6ICM ?>
		<!-- Day6ICM -->
		<td<?php echo $ivf_embryology_chart_preview->Day6ICM->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day6ICM->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day6ICM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6TE->Visible) { // Day6TE ?>
		<!-- Day6TE -->
		<td<?php echo $ivf_embryology_chart_preview->Day6TE->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day6TE->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day6TE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6Observation->Visible) { // Day6Observation ?>
		<!-- Day6Observation -->
		<td<?php echo $ivf_embryology_chart_preview->Day6Observation->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day6Observation->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day6Observation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6Collapsed->Visible) { // Day6Collapsed ?>
		<!-- Day6Collapsed -->
		<td<?php echo $ivf_embryology_chart_preview->Day6Collapsed->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day6Collapsed->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day6Collapsed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
		<!-- Day6Vacoulles -->
		<td<?php echo $ivf_embryology_chart_preview->Day6Vacoulles->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day6Vacoulles->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day6Vacoulles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6Grade->Visible) { // Day6Grade ?>
		<!-- Day6Grade -->
		<td<?php echo $ivf_embryology_chart_preview->Day6Grade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day6Grade->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day6Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
		<!-- Day6Cryoptop -->
		<td<?php echo $ivf_embryology_chart_preview->Day6Cryoptop->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day6Cryoptop->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day6Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->EndSiNo->Visible) { // EndSiNo ?>
		<!-- EndSiNo -->
		<td<?php echo $ivf_embryology_chart_preview->EndSiNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->EndSiNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->EndSiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->EndingDay->Visible) { // EndingDay ?>
		<!-- EndingDay -->
		<td<?php echo $ivf_embryology_chart_preview->EndingDay->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->EndingDay->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->EndingDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->EndingCellStage->Visible) { // EndingCellStage ?>
		<!-- EndingCellStage -->
		<td<?php echo $ivf_embryology_chart_preview->EndingCellStage->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->EndingCellStage->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->EndingCellStage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->EndingGrade->Visible) { // EndingGrade ?>
		<!-- EndingGrade -->
		<td<?php echo $ivf_embryology_chart_preview->EndingGrade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->EndingGrade->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->EndingGrade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->EndingState->Visible) { // EndingState ?>
		<!-- EndingState -->
		<td<?php echo $ivf_embryology_chart_preview->EndingState->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->EndingState->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->EndingState->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_embryology_chart_preview->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->TidNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->DidNO->Visible) { // DidNO ?>
		<!-- DidNO -->
		<td<?php echo $ivf_embryology_chart_preview->DidNO->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->DidNO->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->DidNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
		<!-- ICSiIVFDateTime -->
		<td<?php echo $ivf_embryology_chart_preview->ICSiIVFDateTime->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->ICSiIVFDateTime->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->ICSiIVFDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
		<!-- PrimaryEmbrologist -->
		<td<?php echo $ivf_embryology_chart_preview->PrimaryEmbrologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->PrimaryEmbrologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->PrimaryEmbrologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
		<!-- SecondaryEmbrologist -->
		<td<?php echo $ivf_embryology_chart_preview->SecondaryEmbrologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->SecondaryEmbrologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->SecondaryEmbrologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Incubator->Visible) { // Incubator ?>
		<!-- Incubator -->
		<td<?php echo $ivf_embryology_chart_preview->Incubator->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Incubator->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Incubator->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->location->Visible) { // location ?>
		<!-- location -->
		<td<?php echo $ivf_embryology_chart_preview->location->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->location->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->location->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->OocyteNo->Visible) { // OocyteNo ?>
		<!-- OocyteNo -->
		<td<?php echo $ivf_embryology_chart_preview->OocyteNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->OocyteNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->OocyteNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Stage->Visible) { // Stage ?>
		<!-- Stage -->
		<td<?php echo $ivf_embryology_chart_preview->Stage->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Stage->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Stage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Remarks->Visible) { // Remarks ?>
		<!-- Remarks -->
		<td<?php echo $ivf_embryology_chart_preview->Remarks->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Remarks->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Remarks->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitrificationDate->Visible) { // vitrificationDate ?>
		<!-- vitrificationDate -->
		<td<?php echo $ivf_embryology_chart_preview->vitrificationDate->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitrificationDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitrificationDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
		<!-- vitriPrimaryEmbryologist -->
		<td<?php echo $ivf_embryology_chart_preview->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriPrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriPrimaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
		<!-- vitriSecondaryEmbryologist -->
		<td<?php echo $ivf_embryology_chart_preview->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriSecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriSecondaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
		<!-- vitriEmbryoNo -->
		<td<?php echo $ivf_embryology_chart_preview->vitriEmbryoNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriEmbryoNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriEmbryoNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawReFrozen->Visible) { // thawReFrozen ?>
		<!-- thawReFrozen -->
		<td<?php echo $ivf_embryology_chart_preview->thawReFrozen->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->thawReFrozen->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->thawReFrozen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
		<!-- vitriFertilisationDate -->
		<td<?php echo $ivf_embryology_chart_preview->vitriFertilisationDate->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriFertilisationDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriFertilisationDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriDay->Visible) { // vitriDay ?>
		<!-- vitriDay -->
		<td<?php echo $ivf_embryology_chart_preview->vitriDay->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriDay->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriStage->Visible) { // vitriStage ?>
		<!-- vitriStage -->
		<td<?php echo $ivf_embryology_chart_preview->vitriStage->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriStage->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriStage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriGrade->Visible) { // vitriGrade ?>
		<!-- vitriGrade -->
		<td<?php echo $ivf_embryology_chart_preview->vitriGrade->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriGrade->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriGrade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriIncubator->Visible) { // vitriIncubator ?>
		<!-- vitriIncubator -->
		<td<?php echo $ivf_embryology_chart_preview->vitriIncubator->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriIncubator->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriIncubator->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriTank->Visible) { // vitriTank ?>
		<!-- vitriTank -->
		<td<?php echo $ivf_embryology_chart_preview->vitriTank->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriTank->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriTank->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriCanister->Visible) { // vitriCanister ?>
		<!-- vitriCanister -->
		<td<?php echo $ivf_embryology_chart_preview->vitriCanister->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriCanister->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriCanister->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriGobiet->Visible) { // vitriGobiet ?>
		<!-- vitriGobiet -->
		<td<?php echo $ivf_embryology_chart_preview->vitriGobiet->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriGobiet->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriGobiet->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriViscotube->Visible) { // vitriViscotube ?>
		<!-- vitriViscotube -->
		<td<?php echo $ivf_embryology_chart_preview->vitriViscotube->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriViscotube->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriViscotube->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
		<!-- vitriCryolockNo -->
		<td<?php echo $ivf_embryology_chart_preview->vitriCryolockNo->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriCryolockNo->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriCryolockNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
		<!-- vitriCryolockColour -->
		<td<?php echo $ivf_embryology_chart_preview->vitriCryolockColour->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->vitriCryolockColour->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->vitriCryolockColour->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawDate->Visible) { // thawDate ?>
		<!-- thawDate -->
		<td<?php echo $ivf_embryology_chart_preview->thawDate->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->thawDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->thawDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<!-- thawPrimaryEmbryologist -->
		<td<?php echo $ivf_embryology_chart_preview->thawPrimaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->thawPrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->thawPrimaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<!-- thawSecondaryEmbryologist -->
		<td<?php echo $ivf_embryology_chart_preview->thawSecondaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->thawSecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->thawSecondaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawET->Visible) { // thawET ?>
		<!-- thawET -->
		<td<?php echo $ivf_embryology_chart_preview->thawET->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->thawET->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->thawET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawAbserve->Visible) { // thawAbserve ?>
		<!-- thawAbserve -->
		<td<?php echo $ivf_embryology_chart_preview->thawAbserve->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->thawAbserve->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->thawAbserve->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->thawDiscard->Visible) { // thawDiscard ?>
		<!-- thawDiscard -->
		<td<?php echo $ivf_embryology_chart_preview->thawDiscard->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->thawDiscard->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->thawDiscard->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETCatheter->Visible) { // ETCatheter ?>
		<!-- ETCatheter -->
		<td<?php echo $ivf_embryology_chart_preview->ETCatheter->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->ETCatheter->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->ETCatheter->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETDifficulty->Visible) { // ETDifficulty ?>
		<!-- ETDifficulty -->
		<td<?php echo $ivf_embryology_chart_preview->ETDifficulty->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->ETDifficulty->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->ETDifficulty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETEasy->Visible) { // ETEasy ?>
		<!-- ETEasy -->
		<td<?php echo $ivf_embryology_chart_preview->ETEasy->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->ETEasy->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->ETEasy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETComments->Visible) { // ETComments ?>
		<!-- ETComments -->
		<td<?php echo $ivf_embryology_chart_preview->ETComments->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->ETComments->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->ETComments->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETDoctor->Visible) { // ETDoctor ?>
		<!-- ETDoctor -->
		<td<?php echo $ivf_embryology_chart_preview->ETDoctor->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->ETDoctor->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->ETDoctor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETEmbryologist->Visible) { // ETEmbryologist ?>
		<!-- ETEmbryologist -->
		<td<?php echo $ivf_embryology_chart_preview->ETEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->ETEmbryologist->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->ETEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->ETDate->Visible) { // ETDate ?>
		<!-- ETDate -->
		<td<?php echo $ivf_embryology_chart_preview->ETDate->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->ETDate->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->ETDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_embryology_chart_preview->Day1End->Visible) { // Day1End ?>
		<!-- Day1End -->
		<td<?php echo $ivf_embryology_chart_preview->Day1End->cellAttributes() ?>>
<span<?php echo $ivf_embryology_chart_preview->Day1End->viewAttributes() ?>><?php echo $ivf_embryology_chart_preview->Day1End->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_embryology_chart_preview->ListOptions->render("body", "right", $ivf_embryology_chart_preview->RowCount);
?>
	</tr>
<?php
	$ivf_embryology_chart_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $ivf_embryology_chart_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_embryology_chart_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($ivf_embryology_chart_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$ivf_embryology_chart_preview->showPageFooter();
if (Config("DEBUG"))
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